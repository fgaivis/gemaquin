<?php
class ItemsOrganization extends CatalogAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'ItemsOrganization';

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
		'Item' => array(
			'className' => 'Catalog.Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Organization' => array(
			'className' => 'Business.Organization',
			'foreignKey' => 'organization_id',
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
			'item_id' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Item', true))),
			'organization_id' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Organization', true))),
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
				throw new OutOfBoundsException(__('Could not save the itemsOrganization, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Items Organization.
 *
 * @param string $id, items organization id
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$itemsOrganization = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($itemsOrganization)) {
			throw new OutOfBoundsException(__('Invalid Items Organization', true));
		}
		$this->set($itemsOrganization);

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
			return $itemsOrganization;
		}
	}

/**
 * Returns the record of a Items Organization.
 *
 * @param string $id, items organization id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$itemsOrganization = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($itemsOrganization)) {
			throw new OutOfBoundsException(__('Invalid Items Organization', true));
		}

		return $itemsOrganization;
	}

/**
 * Validates the deletion
 *
 * @param string $id, items organization id
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$itemsOrganization = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($itemsOrganization)) {
			throw new OutOfBoundsException(__('Invalid Items Organization', true));
		}

		$this->data['itemsOrganization'] = $itemsOrganization;
		if (!empty($data)) {
			$data['ItemsOrganization']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['ItemsOrganization']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Items Organization', true));
		}
	}


}
?>

