<?php
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

	public $hasMany = array(
		'PurchaseOrder' => array(
			'className' => 'PurchaseOrder',
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
			'joinTable' => 'invoices_items',
			'foreignKey' => 'invoice_id',
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
			'number' => array(
				'numeric' => array('rule' => array('numeric'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Number', true))),
			'organization_id' => array(
				'uuid' => array('rule' => array('uuid'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Organization', true))),
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
			$result = $this->save($data);
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
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

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


}
?>