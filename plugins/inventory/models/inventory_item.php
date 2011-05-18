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
		'Item' => array(
			'className' => 'Catalog.Item',
			'foreignKey' => 'item_id',
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
			if (isset($data[0])) {
				foreach ($data as &$item) {
					$inStock = $this->find('first', array(
						'fields' => array('id', 'quantity'),
						'recursive' => -1,
						'conditions' => array(
							'item_id' => $item['item_id'],
							'batch' => $item['batch']
						)
					));
					if ($inStock) {
						$item['id'] = $inStock[$this->alias]['id'];
						$item['quantity'] += $inStock[$this->alias]['quantity'];
					}
				}
			}
			$this->create();
			$result = $this->saveAll($data);
			if ($result !== false) {
				$this->data = array_merge($data, $result);
				return true;
			} else {
				throw new OutOfBoundsException(__('Could not save the inventoryItem, please check your inputs.', true));
			}
			return $return;
		}
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


}
?>