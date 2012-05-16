<?php
class DebitNote extends OrdersAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'DebitNote';

/**
 * Validation parameters - initialized in constructor
 *
 * @var array
 * @access public
 */
	public $validate = array();


	public $hasOne = array(
		'InvoicesNote' => array(
			'className' => 'Orders.InvoicesNote',
			'foreignKey' => 'note_id',
			'dependent' => true
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
			$result = $this->saveAll($data);
			if ($result !== false) {
				$this->data = array_merge($data, $result);
				return true;
			} else {
				throw new OutOfBoundsException(__('Could not save the debitNote, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Debit Note.
 *
 * @param string $id, debit note id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$debitNote = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($debitNote)) {
			throw new OutOfBoundsException(__('Invalid Debit Note', true));
		}
		$this->set($debitNote);

		if (!empty($data)) {
			$result = $this->saveAll($data);
			if ($result) {
				$this->data = $result;
				return true;
			} else {
				return $data;
			}
		} else {
			return $debitNote;
		}
	}

/**
 * Returns the record of a Debit Note.
 *
 * @param string $id, debit note id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$debitNote = $this->find('first', array(
			'contain' => array('InvoicesNote' => array('Invoice' => 'SalesOrder')),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));
		
		$organization_id = $debitNote['InvoicesNote']['Invoice']['organization_id'];
		$organization = ClassRegistry::init('Business.Organization')->find('first',
			array('conditions' => array('Organization.id' => $organization_id))
		);
		$addressOrganization = ClassRegistry::init('Business.Contact')->find('first',
			array('conditions' => array('Contact.organization_id' => $organization_id))
		);		
		$debitNote['Organization'] = $organization['Organization'];
		$debitNote['Contact'] = $addressOrganization['Contact'];
		if (empty($debitNote)) {
			throw new OutOfBoundsException(__('Invalid Debit Note', true));
		}

		return $debitNote;
	}

/**
 * Validates the deletion
 *
 * @param string $id, debit note id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$debitNote = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($debitNote)) {
			throw new OutOfBoundsException(__('Invalid Debit Note', true));
		}

		$this->data['debitNote'] = $debitNote;
		if (!empty($data)) {
			$data['DebitNote']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['DebitNote']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Debit Note', true));
		}
	}

/**
 * Sets the note number
 *
 * @return boolean
 */
    public function beforeSave() {
        if (!$this->exists()) {
        	$this->data[$this->alias]['number'] = $this->_generateNumber();
        }	
        return true;
    }

/**
 * Returns the next invoice number for a type
 *
 */
    protected function _generateNumber() {
        return $this->field('MAX(number)') + 1;
    }

}
?>