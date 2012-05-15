<?php
class InventoryItem extends InventoryAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'InventoryItem';

/**
 * Validation parameters - initialized in constructor
 *
 * @var array
 * @access public
 */
	public $validate = array();

/**
 * belongsTo association
 *
 * @var array $belongsTo 
 * @access public
 */
	public $belongsTo = array(
		'InventoryEntry' => array(
			'className' => 'Inventory.InventoryEntry',
			'foreignKey' => 'inventory_entry_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Item' => array(
			'className' => 'Catalog.Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PurchaseOrder' => array(
			'className' => 'Orders.PurchaseOrder',
			'foreignKey' => 'purchase_order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


/**
 * Constructor
 *
 * @param mixed $id Model ID
 * @param string $table Table name
 * @param string $ds Datasource
 * @access public
 */
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'item_id' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Item', true))),
			'batch' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Batch', true))),
			'expiration_date' => array(
				'date' => array('rule' => array('date'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a  Expitarion Date', true))),
			'quantity' => array(
				'numeric' => array('rule' => array('numeric'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Quantity', true))),
		);
	}	

/**
 * Adds a new record to the database
 *
 * @param array post data, should be Contoller->data
 * @return array
 * @access public
 */
	public function add($data = null) {
		if (!empty($data)) {
			$this->create();
			$result = $this->saveAll($data);
			if ($result !== false) {
				ClassRegistry::init('Inventory.Inventory')->add($data);
				return true;
			} else {
				throw new OutOfBoundsException(__('Could not save the inventoryItem, please check your inputs.', true));
			}
			return $return;
		}
	}

    public function beforeSave() {
		if (!$this->id) {
			ClassRegistry::init('Orders.PurchaseOrder')->checkEntryItems($this->data[$this->alias]['purchase_order_id'], $this->data);			
			$this->data[$this->alias]['quantity_left'] = $this->data[$this->alias]['quantity'];
		}
		if (!empty($this->data[$this->alias]['file']) && $this->data[$this->alias]['file']['error'] == 0) {
			$newPath = APP . 'webroot' . DS . 'files' . DS . 'certificates' . DS;
			if (count(explode('.', $this->data[$this->alias]['file']['name'])) > 1) {
				$ext = array_pop(explode('.', $this->data[$this->alias]['file']['name']));	
			} else {
				$ext = array_pop(explode('/', $this->data[$this->alias]['file']['type']));	
			}
			move_uploaded_file($this->data[$this->alias]['file']['tmp_name'], $newPath . $this->id . '.' . $ext);
			$this->data[$this->alias]['certificate'] = $this->id . '.' . $ext;
		}
        return true;
    }

/**
 * Edits an existing Inventory Item.
 *
 * @param string $id, inventory item id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$inventoryItem = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($inventoryItem)) {
			throw new OutOfBoundsException(__('Invalid Inventory Item', true));
		}
		$this->set($inventoryItem);

		if (!empty($data)) {
			$this->set($data);
			$result = $this->save(null, true);
			if ($result) {
				$this->data = $result;
				return true;
			} else {
				return $data;
			}
		} else {
			return $inventoryItem;
		}
	}

/**
 * Returns the record of a Inventory Item.
 *
 * @param string $id, inventory item id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$inventoryItem = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($inventoryItem)) {
			throw new OutOfBoundsException(__('Invalid Inventory Item', true));
		}

		return $inventoryItem;
	}

/**
 * Validates the deletion
 *
 * @param string $id, inventory item id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$inventoryItem = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($inventoryItem)) {
			throw new OutOfBoundsException(__('Invalid Inventory Item', true));
		}

		$this->data['inventoryItem'] = $inventoryItem;
		if (!empty($data)) {
			$data['InventoryItem']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['InventoryItem']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Inventory Item', true));
		}
	}
	
	public function decrement($id, $quantity) {
		$item = $this->read(array('quantity_left', 'item_id', 'batch'), $id);
		if ($item[$this->alias]['quantity_left'] < $quantity) {
			throw new Exception(__('No enough quantity left for this item', true));
		}
		$this->id = $id;
		$this->saveField('quantity_left', $item[$this->alias]['quantity_left'] - $quantity);
		ClassRegistry::init('Inventory.Inventory')->decrement($item[$this->alias]['item_id'], $item[$this->alias]['batch'], $quantity);
	}
	
	public function decrementExistance($id, $quantity) {
		//echo '<br/><br/><br/>';		
		$item = $this->read(array('quantity', 'item_id', 'batch'), $id);
		if ($item[$this->alias]['quantity'] < $quantity) {
			throw new Exception(__('No enough quantity left for this item', true));
		}
		//print_r($item);
		//echo '<br/><br/><br/>';
		//exit();
		$this->id = $id;
		$this->saveField('quantity', $item[$this->alias]['quantity'] - $quantity);
		ClassRegistry::init('Inventory.Inventory')->decrementExistance($item[$this->alias]['item_id'], $item[$this->alias]['batch'], $quantity);
	}
	
	public function recalculateQty($so_item_id, $id, $quantity) {
		$inv_item_so = ClassRegistry::init('Orders.InvItemsSalesOrder')->find('first',
			array(
				'conditions' => array('InvItemsSalesOrder.id' => $so_item_id),		
			)
		);
		
		if(!empty($inv_item_so)) {
			$qty_ordered = $inv_item_so['InvItemsSalesOrder']['quantity'];
			$item = $this->read(array('quantity_left', 'item_id', 'batch'), $id);
			$qty_recalculation = $item[$this->alias]['quantity_left'] + $qty_ordered; 
			
			if ($qty_recalculation < $quantity) {
				throw new Exception(__('No enough quantity left for this item', true));
			}
			$this->id = $id;
			$this->saveField('quantity_left', $qty_recalculation - $quantity);
			ClassRegistry::init('Inventory.Inventory')->recalculateQty($item[$this->alias]['item_id'], $item[$this->alias]['batch'], $quantity, $qty_ordered);	
		} else {
			$this->decrement($id, $quantity);
		}
	}

	public function resetQuantities($so_item_id, $id, $quantity, $deletion = true) {
		$inv_item_so = ClassRegistry::init('Orders.InvItemsSalesOrder')->find('first',
			array(
				'conditions' => array('InvItemsSalesOrder.id' => $so_item_id),		
			)
		);
		
		if(!empty($inv_item_so) && $deletion) {
			$qty_ordered = $inv_item_so['InvItemsSalesOrder']['quantity'];
			$item = $this->read(array('quantity_left', 'item_id', 'batch'), $id);
			$qty_recalculation = $item[$this->alias]['quantity_left'] + $qty_ordered; 
			
			$this->id = $id;
			$this->saveField('quantity_left', $qty_recalculation);
			ClassRegistry::init('Inventory.Inventory')->resetQuantities($item[$this->alias]['item_id'], $item[$this->alias]['batch'], $quantity, $qty_ordered);	
		} else {
			if(!empty($inv_item_so)) {
				$qty_remaining = $inv_item_so['InvItemsSalesOrder']['quantity_remaining'];
				$item = $this->read(array('quantity_left', 'item_id', 'batch'), $id);
				$qty_recalc = $item[$this->alias]['quantity_left'] + $qty_remaining;
				
				$this->id = $id;
				$this->saveField('quantity_left', $qty_recalc);
				ClassRegistry::init('Inventory.Inventory')->resetQuantities($item[$this->alias]['item_id'], $item[$this->alias]['batch'], $quantity, $qty_remaining);
			}
		}
	}
	
	public function saveAttachments($items) {
		$this->getDataSource()->begin($this);
		foreach ($items[$this->alias] as $item) {
			$this->create();
			$this->save($item, false, array('id', 'certificate'));
		}
		$this->getDataSource()->commit($this);
		return true;
	}
}
