<?php
class SalesOrder extends AppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'SalesOrder';

/**
 * Display field name
 *
 * @var string
 * @access public
 */
	public $displayField = 'number';
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
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Invoice' => array(
			'className' => 'Invoice',
			'foreignKey' => 'invoice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasMany = array(
			'InvItemsSalesOrder' => array(
				'className' => 'Orders.InvItemsSalesOrder',
				'foreignKey' => 'sales_order_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
			),
	);
/**
 * HABTM association
 *
 * @var array $hasAndBelongsToMany
 * @access public
 */

	public $hasAndBelongsToMany = array(
		'InventoryItem' => array(
			'className' => 'InventoryItem',
			'joinTable' => 'inv_items_sales_orders',
			'foreignKey' => 'sales_order_id',
			'associationForeignKey' => 'inventory_item_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
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
			'number' => array(
				'numeric' => array('rule' => array('numeric'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Number', true))),
			'organization_id' => array(
				'uuid' => array('rule' => array('uuid'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Organization', true))),
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
				throw new OutOfBoundsException(__('Could not save the salesOrder, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Sales Order.
 *
 * @param string $id, sales order id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$salesOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($salesOrder)) {
			throw new OutOfBoundsException(__('Invalid Sales Order', true));
		}
		$this->set($salesOrder);

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
			return $salesOrder;
		}
	}

/**
 * Returns the record of a Sales Order.
 *
 * @param string $id, sales order id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$salesOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($salesOrder)) {
			throw new OutOfBoundsException(__('Invalid Sales Order', true));
		}

		return $salesOrder;
	}

/**
 * Validates the deletion
 *
 * @param string $id, sales order id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$salesOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($salesOrder)) {
			throw new OutOfBoundsException(__('Invalid Sales Order', true));
		}

		$this->data['salesOrder'] = $salesOrder;
		if (!empty($data)) {
			$data['SalesOrder']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['SalesOrder']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Sales Order', true));
		}
	}


}
?>