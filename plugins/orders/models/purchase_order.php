<?php
class PurchaseOrder extends AppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'PurchaseOrder';

/**
 * Display field name
 *
 * @var string
 * @access public
 */
	public $displayField = 'number';

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
/**
 * HABTM association
 *
 * @var array $hasAndBelongsToMany
 * @access public
 */

	public $hasAndBelongsToMany = array(
		'Item' => array(
			'className' => 'Item',
			'joinTable' => 'items_purchase_orders',
			'foreignKey' => 'purchase_order_id',
			'associationForeignKey' => 'item_id',
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
				throw new OutOfBoundsException(__('Could not save the purchaseOrder, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Purchase Order.
 *
 * @param string $id, purchase order id
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$purchaseOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($purchaseOrder)) {
			throw new OutOfBoundsException(__('Invalid Purchase Order', true));
		}
		$this->set($purchaseOrder);

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
			return $purchaseOrder;
		}
	}

/**
 * Returns the record of a Purchase Order.
 *
 * @param string $id, purchase order id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$purchaseOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($purchaseOrder)) {
			throw new OutOfBoundsException(__('Invalid Purchase Order', true));
		}

		return $purchaseOrder;
	}

/**
 * Validates the deletion
 *
 * @param string $id, purchase order id
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$purchaseOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($purchaseOrder)) {
			throw new OutOfBoundsException(__('Invalid Purchase Order', true));
		}

		$this->data['purchaseOrder'] = $purchaseOrder;
		if (!empty($data)) {
			$data['PurchaseOrder']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['PurchaseOrder']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Purchase Order', true));
		}
	}


}
?>

