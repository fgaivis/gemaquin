<?php
class InvItemsSoDlvNote extends AppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'InvItemsSoDlvNote';


/**
 * belongsTo association
 *
 * @var array $belongsTo 
 * @access public
 */
	public $belongsTo = array(
		'InvItemsSalesOrders' => array(
			'className' => 'InvItemsSalesOrders',
			'foreignKey' => 'inv_items_sales_orders_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DeliveryNote' => array(
			'className' => 'DeliveryNote',
			'foreignKey' => 'delivery_note_id',
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
				throw new OutOfBoundsException(__('Could not save the invItemsSoDlvNote, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Inv Items So Dlv Note.
 *
 * @param string $id, inv items so dlv note id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$invItemsSoDlvNote = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($invItemsSoDlvNote)) {
			throw new OutOfBoundsException(__('Invalid Inv Items So Dlv Note', true));
		}
		$this->set($invItemsSoDlvNote);

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
			return $invItemsSoDlvNote;
		}
	}

/**
 * Returns the record of a Inv Items So Dlv Note.
 *
 * @param string $id, inv items so dlv note id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$invItemsSoDlvNote = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($invItemsSoDlvNote)) {
			throw new OutOfBoundsException(__('Invalid Inv Items So Dlv Note', true));
		}

		return $invItemsSoDlvNote;
	}

/**
 * Validates the deletion
 *
 * @param string $id, inv items so dlv note id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$invItemsSoDlvNote = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($invItemsSoDlvNote)) {
			throw new OutOfBoundsException(__('Invalid Inv Items So Dlv Note', true));
		}

		$this->data['invItemsSoDlvNote'] = $invItemsSoDlvNote;
		if (!empty($data)) {
			$data['InvItemsSoDlvNote']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['InvItemsSoDlvNote']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Inv Items So Dlv Note', true));
		}
	}


}
?>