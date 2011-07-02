<?php
class ItemsPurchaseOrder extends AppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'ItemsPurchaseOrder';

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
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PurchaseOrder' => array(
			'className' => 'PurchaseOrder',
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
			$result = $this->save($data);
			if ($result !== false) {
				$this->data = array_merge($data, $result);
				return true;
			} else {
				throw new OutOfBoundsException(__('Could not save the itemsPurchaseOrder, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Items Purchase Order.
 *
 * @param string $id, items purchase order id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$itemsPurchaseOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($itemsPurchaseOrder)) {
			throw new OutOfBoundsException(__('Invalid Items Purchase Order', true));
		}
		$this->set($itemsPurchaseOrder);

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
			return $itemsPurchaseOrder;
		}
	}

/**
 * Returns the record of a Items Purchase Order.
 *
 * @param string $id, items purchase order id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$itemsPurchaseOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($itemsPurchaseOrder)) {
			throw new OutOfBoundsException(__('Invalid Items Purchase Order', true));
		}

		return $itemsPurchaseOrder;
	}

/**
 * Validates the deletion
 *
 * @param string $id, items purchase order id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$itemsPurchaseOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($itemsPurchaseOrder)) {
			throw new OutOfBoundsException(__('Invalid Items Purchase Order', true));
		}

		$this->data['itemsPurchaseOrder'] = $itemsPurchaseOrder;
		if (!empty($data)) {
			$data['ItemsPurchaseOrder']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['ItemsPurchaseOrder']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Items Purchase Order', true));
		}
	}


}
?>