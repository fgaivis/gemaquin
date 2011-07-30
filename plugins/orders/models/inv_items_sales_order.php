<?php
class InvItemsSalesOrder extends AppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'InvItemsSalesOrder';


/**
 * belongsTo association
 *
 * @var array $belongsTo 
 * @access public
 */
	public $belongsTo = array(
		'InventoryItem' => array(
			'className' => 'InventoryItem',
			'foreignKey' => 'inventory_item__id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SalesOrder' => array(
			'className' => 'SalesOrder',
			'foreignKey' => 'sales_order_id',
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
				throw new OutOfBoundsException(__('Could not save the invItemsSalesOrder, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Inv Items Sales Order.
 *
 * @param string $id, inv items sales order id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$invItemsSalesOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($invItemsSalesOrder)) {
			throw new OutOfBoundsException(__('Invalid Inv Items Sales Order', true));
		}
		$this->set($invItemsSalesOrder);

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
			return $invItemsSalesOrder;
		}
	}

/**
 * Returns the record of a Inv Items Sales Order.
 *
 * @param string $id, inv items sales order id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$invItemsSalesOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($invItemsSalesOrder)) {
			throw new OutOfBoundsException(__('Invalid Inv Items Sales Order', true));
		}

		return $invItemsSalesOrder;
	}

/**
 * Validates the deletion
 *
 * @param string $id, inv items sales order id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$invItemsSalesOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($invItemsSalesOrder)) {
			throw new OutOfBoundsException(__('Invalid Inv Items Sales Order', true));
		}

		$this->data['invItemsSalesOrder'] = $invItemsSalesOrder;
		if (!empty($data)) {
			$data['InvItemsSalesOrder']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['InvItemsSalesOrder']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Inv Items Sales Order', true));
		}
	}


}
?>