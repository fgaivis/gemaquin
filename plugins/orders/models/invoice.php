<?php
App::import('Model', 'Orders.PurchaseOrder');
App::import('Model', 'Orders.SalesOrder');

class Invoice extends OrdersAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'Invoice';
	
/**
 * Types
 */
	const DRAFT = 'DRAFT';
	const CREDITNOTE = 'CREDITNOTE';
	const DEBITNOTE = 'DEBITNOTE';
	const SALES = 'SALES';
	const PURCHASE = 'PURCHASE';
	const SERVICE = 'SERVICE';
	

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
		)
	);
/**
 * hasMany association
 *
 * @var array $hasMany
 * @access public
 */

	public $hasOne = array(
		'PurchaseOrder' => array(
			'className' => 'Orders.PurchaseOrder',
			'foreignKey' => 'invoice_id',
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
		'PrePurchaseOrder' => array(
			'className' => 'Orders.PurchaseOrder',
			'foreignKey' => 'draft_invoice_id',
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
		'SalesOrder' => array(
			'className' => 'Orders.SalesOrder',
			'foreignKey' => 'invoice_id',
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

	public $hasMany = array(
		'InvoicesItem' => array(
			'className' => 'Orders.InvoicesItem',
			'foreignKey' => 'invoice_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'InvoicesItem.item_id',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
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
			'type' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Type', true))),
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
			if (isset($data['PurchaseOrder'])) {
				$data['PurchaseOrder']['status'] = PurchaseOrder::INVOICED;
			} else if (isset($data['PrePurchaseOrder'])) {
				$data['PrePurchaseOrder']['status'] = PurchaseOrder::PREINVOICED;
			} else if (isset($data['SalesOrder'])) {
				$data['SalesOrder']['status'] = SalesOrder::INVOICED;
			}
			if (!empty($data['InvoicesItem'])) {
				$invoicesItem['InvoicesItem'] = $data['InvoicesItem'];
				unset($data['InvoicesItem']);
			}
			$data['Invoice'] = array_filter($data['Invoice']);
			$resultinv = $this->saveAll($data);
			
			if (!empty($invoicesItem['InvoicesItem'])) {
				foreach ($invoicesItem['InvoicesItem'] as $index => $invoiceItem) {
					$invoicesItem['InvoicesItem'][$index]['invoice_id'] = $this->getLastInsertId();
				}
				$resultitem = $this->InvoicesItem->saveAll($invoicesItem['InvoicesItem']);
			}
			$result = $resultinv && $resultitem;
			if ($result !== false) {
				$this->data = array_merge($data, $result);
				return true;
			} else {
				throw new OutOfBoundsException(__('Could not save the invoice, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Sets the invoice number
 *
 * @return boolean
 */
    public function beforeSave() {
        if (!$this->exists()) {
            $this->data['Invoice']['number'] = $this->_invoiceNumber($this->data['Invoice']['type']);
        }
        return true;
    }

/**
 * Returns the next invoice number for a type
 *
 */
    protected function _invoiceNumber($type) {
        return $this->field('MAX(number)', array('type' => $type)) + 1;
    }

/**
 * Returns the next invoice number for a type
 *
 */
    public function getControlNumber() {
        return str_pad($this->field('MAX(control)') + 1, 11, '0', STR_PAD_LEFT);
    }

/**
 * Edits an existing Invoice.
 *
 * @param string $id, invoice id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$invoice = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($invoice)) {
			throw new OutOfBoundsException(__('Invalid Invoice', true));
		}
		$this->set($invoice);

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
			return $invoice;
		}
	}

/**
 * Returns the record of a Invoice.
 *
 * @param string $id, invoice id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$invoice = $this->find('first', array(
			'contain' => array('InvoicesItem.Item', 'PrePurchaseOrder', 'PurchaseOrder' => 'Provider', 'SalesOrder' => 'Client', 'Organization'),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));
		//debug($invoice);
		//die();
		if (empty($invoice)) {
			throw new OutOfBoundsException(__('Invalid Invoice', true));
		}

		return $invoice;
	}

/**
 * Validates the deletion
 *
 * @param string $id, invoice id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$invoice = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($invoice)) {
			throw new OutOfBoundsException(__('Invalid Invoice', true));
		}

		$this->data['invoice'] = $invoice;
		if (!empty($data)) {
			$data['Invoice']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['Invoice']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Invoice', true));
		}
	}

	public function getDraft($orderId) {
		$this->hasOne['PrePurchaseOrder']['type'] = 'inner';
		$result = $this->find('first', array(
			'contain' => array(
				'InvoicesItem',
				'PrePurchaseOrder' => array(
					'conditions' => array('PrePurchaseOrder.id' => $orderId)
				)
			),
			'conditions' => array('type' => self::DRAFT)
		));
		unset($this->hasOne['PrePurchaseOrder']['type']);
		return $result;
	}
	
	public function findInventoryItem($orderId, $itemId) {
		ClassRegistry::flush();
		$inventoryItem =  ClassRegistry::init('Orders.InvItemsSalesOrder')->find('first', array(
			'contain' => array(
				'InventoryItem' => array(
					'conditions' => array('InventoryItem.item_id' => $itemId))),
			'conditions' => array('InvItemsSalesOrder.sales_order_id' => $orderId)
		));
		return $inventoryItem['InventoryItem'];
	}
	
}
