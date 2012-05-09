<?php
class Payment extends OrdersAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'Payment';

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
				'uuid' => array('rule' => array('uuid'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Organization', true))),
			'invoice_id' => array(
				'uuid' => array('rule' => array('uuid'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Invoice', true))),
			'type' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Type', true))),
			'payment_type' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Payment Type', true))),
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
				throw new OutOfBoundsException(__('Could not save the payment, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Payment.
 *
 * @param string $id, payment id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$payment = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($payment)) {
			throw new OutOfBoundsException(__('Invalid Payment', true));
		}
		$this->set($payment);

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
			return $payment;
		}
	}

/**
 * Returns the record of a Payment.
 *
 * @param string $id, payment id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$payment = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($payment)) {
			throw new OutOfBoundsException(__('Invalid Payment', true));
		}

		return $payment;
	}

/**
 * Validates the deletion
 *
 * @param string $id, payment id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$payment = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($payment)) {
			throw new OutOfBoundsException(__('Invalid Payment', true));
		}

		$this->data['payment'] = $payment;
		if (!empty($data)) {
			$data['Payment']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['Payment']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Payment', true));
		}
	}


}
?>