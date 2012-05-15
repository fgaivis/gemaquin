<?php
class Inventory extends InventoryAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'Inventory';

	public $useTable = 'inventory';

/**
 * belongsTo association
 *
 * @var array $belongsTo 
 * @access public
 */
	public $belongsTo = array(
		'Item' => array(
			'className' => 'Catalog.Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public $actsAs = array('Search.Searchable');

    public $filterArgs = array(
        array('name' => 'z_quantity', 'type' => 'expression', 'method' => 'makeZQuantityCondition', 'field' => 'Inventory.quantity >= ?'),
    	array('name' => 'gt_quantity', 'type' => 'expression', 'method' => 'makeGTQuantityCondition', 'field' => 'Inventory.quantity >= ?'),
        array('name' => 'lt_quantity', 'type' => 'expression', 'method' => 'makeLTQuantityCondition', 'field' => 'Inventory.quantity <= ?'),
        array('name' => 'organization_id', 'type' => 'query', 'method' => 'makeProviderCondition'),
    );

	public function makeZQuantityCondition($data = array()) {
        return array('Inventory.quantity >=' => $data['z_quantity']);
    }
    
    public function makeGTQuantityCondition($data = array()) {
        return array('Inventory.quantity >=' => $data['gt_quantity']);
    }

    public function makeLTQuantityCondition($data = array()) {
        return array('Inventory.quantity <=' => $data['lt_quantity']);
    }
    
	public function makeProviderCondition($data) {
		$organization = $data['organization_id'];
		$this->bindModel(array('belongsTo' => array(
			'ItemsOrganization' => array(
				'className' => 'Catalog.ItemsOrganization',
				'foreignKey' => false,
				'type' => 'inner',
				'conditions' => array('ItemsOrganization.organization_id' => $organization, 'ItemsOrganization.item_id = Inventory.item_id')
			)
		)), false);
	}

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
			if (isset($data[0])) {
				$newData = array();
				foreach ($data as &$item) {
					$inStock = $this->find('first', array(
						'fields' => array('id', 'quantity', 'availability'),
						'recursive' => -1,
						'conditions' => array(
							'item_id' => $item['item_id'],
							'batch' => $item['batch']
						)
					));
					if ($inStock) {
						$item['id'] = $inStock[$this->alias]['id'];
						$item['availability'] = $inStock[$this->alias]['availability'] + $item['quantity'];
						$item['quantity'] += $inStock[$this->alias]['quantity'];
					}else{
						$item['availability'] = $item['quantity'];
					}
					$newData[]['Inventory'] = $item;
				}
				$data = $newData;
			}
			$this->create();
			$result = $this->saveAll($data);
			if ($result !== false) {
				return true;
			} else {
				throw new OutOfBoundsException(__('Could not save the inventory, please check your inputs.', true));
			}
			return $return;
		}
	}
	
	public function beforeSave() {
		/*print_r($this->data);
		echo '<br/><br/><br/>';
		exit();*/
		if (isset($this->data[$this->alias]['purchase_order_id'])) {
			$individual_cost = ClassRegistry::init('Orders.PurchaseOrder')->getItemPurchaseCost($this->data[$this->alias]['purchase_order_id'], $this->data);			
			if($individual_cost){
				$this->data[$this->alias]['individual_cost'] = $individual_cost;
				$this->data[$this->alias]['purchase_cost'] = $this->data[$this->alias]['quantity'] * $individual_cost;
			}
		}
		/*print_r($this->data);
		echo '<br/><br/><br/>';
		exit();*/
		return true;
	}

/**
 * Edits an existing Inventory.
 *
 * @param string $id, inventory id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$inventory = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($inventory)) {
			throw new OutOfBoundsException(__('Invalid Inventory', true));
		}
		$this->set($inventory);

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
			return $inventory;
		}
	}

/**
 * Returns the record of a Inventory.
 *
 * @param string $id, inventory id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$inventory = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($inventory)) {
			throw new OutOfBoundsException(__('Invalid Inventory', true));
		}

		return $inventory;
	}

/**
 * Validates the deletion
 *
 * @param string $id, inventory id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$inventory = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($inventory)) {
			throw new OutOfBoundsException(__('Invalid Inventory', true));
		}

		$this->data['inventory'] = $inventory;
		if (!empty($data)) {
			$data['Inventory']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['Inventory']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Inventory', true));
		}
	}
	
	public function decrement($itemId, $batch, $quantity) {
		$item = $this->find('first', array(
			'contain' => false,
			'conditions' => array('Inventory.item_id' => $itemId, 'Inventory.batch' => $batch)
		));
		if ($item[$this->alias]['quantity'] < $quantity) {
			throw new Exception(__('No enough quantity left for this item ', true));
		}
		$this->id = $item[$this->alias]['id'];
		$this->saveField('availability', $item[$this->alias]['availability'] - $quantity);
	}
	
	public function decrementExistance($itemId, $batch, $quantity) {
		$item = $this->find('first', array(
			'contain' => false,
			'conditions' => array('Inventory.item_id' => $itemId, 'Inventory.batch' => $batch)
		));
		if ($item[$this->alias]['quantity'] < $quantity) {
			throw new Exception(__('No enough quantity left for this item ', true));
		}
		$this->id = $item[$this->alias]['id'];
		$this->saveField('quantity', $item[$this->alias]['quantity'] - $quantity);
	}
	
	public function recalculateQty($itemId, $batch, $quantity, $qty_ordered) {
		$item = $this->find('first', array(
			'contain' => false,
			'conditions' => array('Inventory.item_id' => $itemId, 'Inventory.batch' => $batch)
		));
		$qty_recalculation = $item[$this->alias]['availability'] + $qty_ordered;
		if ($item[$this->alias]['quantity'] < $quantity) {
			throw new Exception(__('No enough quantity left for this item ', true));
		}
		$this->id = $item[$this->alias]['id'];
		$this->saveField('availability', $qty_recalculation - $quantity);
	}
	
	public function resetQuantities($itemId, $batch, $quantity, $qty_ordered) {
		$item = $this->find('first', array(
			'contain' => false,
			'conditions' => array('Inventory.item_id' => $itemId, 'Inventory.batch' => $batch)
		));
		$qty_recalculation = $item[$this->alias]['availability'] + $qty_ordered;
		$this->id = $item[$this->alias]['id'];
		$this->saveField('availability', $qty_recalculation);
		
	}

}