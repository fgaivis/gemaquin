<?php
class PurchaseOrder extends AppModel {

/**
 * Purchase Order Statuses
 */
	const DRAFT = 'DRAFT';
	const SENT = 'SENT';
	const APPROVED = 'APPROVED';
	const PREINVOICED = 'PREINVOICED'; //FACTURA PROFORMA PARA CADIVI. SE GUARDAN CAMPOS ADICIONALES TALES COMO: NRO PLANILLA, SEGURO, ENVIO, PESO, NACIONALIZACION,
	const INVOICED = 'INVOICED';
	const DISPATCHED = 'DISPATCHED';
	const RECEIVED = 'RECEIVED';
	const COMPLETED = 'COMPLETED';
	const VOID = 'VOID';

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
		'Provider' => array(
			'className' => 'Business.Provider',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Invoice' => array(
			'className' => 'Orders.Invoice',
			'foreignKey' => 'invoice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PreInvoice' => array(
			'className' => 'Orders.Invoice',
			'foreignKey' => 'draft_invoice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)	
	);

	public $hasMany = array(
		'ItemsPurchaseOrder' => array(
			'className' => 'Orders.ItemsPurchaseOrder',
			'foreignKey' => 'purchase_order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'ItemsPurchaseOrder.item_id',
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
		'Item' => array(
			'className' => 'Catalog.Item',
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
			'insertQuery' => '',
			'with' => 'Orders.ItemsPurchaseOrder'
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
			'organization_id' => array(
				'NotEmpty' => array('rule' => 'notEmpty','message'=>__('Provider is required',true))
			)
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
			if (!empty($data['ItemsPurchaseOrder'])){
			    $result = $this->saveAll($data);
			    if ($result !== false) {
				    $this->data = array_merge($data, $result);
				    return true;
			    } else {
				    throw new OutOfBoundsException(__('Could not save the purchaseOrder, please check your inputs.', true));
			    }
			} else {
                throw new OutOfBoundsException(__('A purchase order must have at least one item', true));
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

		if (!empty($data['ItemsPurchaseOrder'])){
			$data['PurchaseOrder']['id'] = $id;
			$this->ItemsPurchaseOrder->deleteAll(array('purchase_order_id' => $id));
			$result = $this->saveAll($data);
			if ($result !== false) {
				$this->data = $data;
				return true;
			} else {
				throw new OutOfBoundsException(__('Could not save the purchaseOrder, please check your inputs.', true));
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

	public function send($data) {
	    $data['PurchaseOrder']['status'] = PurchaseOrder::SENT;
		$result = $this->save($data);
		if ($result) {
            return true;
        } else {
            return false;
        }
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

