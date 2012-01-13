<?php
class CreditNote extends OrdersAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'CreditNote';

/**
 * Validation parameters - initialized in constructor
 *
 * @var array
 * @access public
 */
	public $validate = array();

	public $hasAndBelongsToMany = array(
		'Invoice' => array(
			'className' => 'Orders.Invoice',
			'foreignKey' => 'note_id',
			'associationForeignKey' => 'invoice_id',
			'with' => 'Order.InvoicesNote',
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
			'note' => array(
				'required' => array('rule' => array('notEmpty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a note', true))),
			'amount' => array(
				'required' => array('rule' => array('numeric'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter the amount', true))),
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
				throw new OutOfBoundsException(__('Could not save the creditNote, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Credit Note.
 *
 * @param string $id, credit note id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$creditNote = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($creditNote)) {
			throw new OutOfBoundsException(__('Invalid Credit Note', true));
		}
		$this->set($creditNote);

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
			return $creditNote;
		}
	}

/**
 * Returns the record of a Credit Note.
 *
 * @param string $id, credit note id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$creditNote = $this->find('first', array(
			'contain' => array('Invoice' => 'Organization'),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($creditNote)) {
			throw new OutOfBoundsException(__('Invalid Credit Note', true));
		}

		return $creditNote;
	}

/**
 * Validates the deletion
 *
 * @param string $id, credit note id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$creditNote = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($creditNote)) {
			throw new OutOfBoundsException(__('Invalid Credit Note', true));
		}

		$this->data['creditNote'] = $creditNote;
		if (!empty($data)) {
			$data['CreditNote']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['CreditNote']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Credit Note', true));
		}
	}


}
?>