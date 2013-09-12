<?php
class TaxTotalization extends BusinessAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'TaxTotalization';

/**
 * Validation parameters - initialized in constructor
 *
 * @var array
 * @access public
 */
	public $validate = array();



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
			'year' => array(
				'numeric' => array('rule' => array('numeric'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Year', true))),
			'month' => array(
				'numeric' => array('rule' => array('numeric'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Month', true))),
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
				throw new OutOfBoundsException(__('Could not save the taxTotalization, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Tax Totalization.
 *
 * @param string $id, tax totalization id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$taxTotalization = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($taxTotalization)) {
			throw new OutOfBoundsException(__('Invalid Tax Totalization', true));
		}
		$this->set($taxTotalization);

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
			return $taxTotalization;
		}
	}

/**
 * Returns the record of a Tax Totalization.
 *
 * @param string $id, tax totalization id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$taxTotalization = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($taxTotalization)) {
			throw new OutOfBoundsException(__('Invalid Tax Totalization', true));
		}

		return $taxTotalization;
	}

/**
 * Validates the deletion
 *
 * @param string $id, tax totalization id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$taxTotalization = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($taxTotalization)) {
			throw new OutOfBoundsException(__('Invalid Tax Totalization', true));
		}

		$this->data['taxTotalization'] = $taxTotalization;
		if (!empty($data)) {
			$data['TaxTotalization']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['TaxTotalization']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Tax Totalization', true));
		}
	}


}
?>