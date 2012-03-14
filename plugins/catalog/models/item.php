<?php
class Item extends CatalogAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'Item';

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
		'Category' => array(
			'className' => 'Categories.Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasMany = array(
		'InventoryItem' => array(
			'className' => 'Inventory.InventoryItem',
			'foreignKey' => 'item_id',
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

	public $hasAndBelongsToMany = array(
		'Organization' => array(
			'className' => 'Business.Organization',
			'joinTable' => 'items_organizations',
			'foreignKey' => 'item_id',
			'associationForeignKey' => 'organization_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => '',
			'with' => 'Catalog.ItemsOrganization'
		),
		'PurchaseOrder' => array(
			'className' => 'Orders.PurchaseOrder',
			'joinTable' => 'items_purchase_orders',
			'foreignKey' => 'item_id',
			'associationForeignKey' => 'purchase_order_id',
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


	public $actsAs = array('Search.Searchable');


/**
 * Filter args attribute to be used by the Searchable behavior
 *
 * @var array
 * @access public
 */
	public $filterArgs = array(
		array('name' => 'name', 'type' => 'like', 'field' => 'name'),
		array('name' => 'organization_id', 'type' => 'query', 'method' => 'makeProviderCondition'),
		array('name' => 'purchase_order', 'type' => 'query', 'method' => 'makeOrderCondition')
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
			'barcode' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Barcode', true))),
			'package_factor' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Package Factor', true))),
			'sales_factor' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Sales Factor', true))),
			'country' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Country', true))),
			'industry' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Industry', true))),
			'category_id' => array(
				'notempty' => array('rule' => array('notempty'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Category', true))),
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
				throw new OutOfBoundsException(__('Could not save the item, please check your inputs.', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Item.
 *
 * @param string $id, item id
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$item = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($item)) {
			throw new OutOfBoundsException(__('Invalid Item', true));
		}
		$this->set($item);

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
			return $item;
		}
	}

/**
 * Returns the record of a Item.
 *
 * @param string $id, item id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$item = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));

		if (empty($item)) {
			throw new OutOfBoundsException(__('Invalid Item', true));
		}

		return $item;
	}

/**
 * Validates the deletion
 *
 * @param string $id, item id
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$item = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($item)) {
			throw new OutOfBoundsException(__('Invalid Item', true));
		}

		$this->data['item'] = $item;
		if (!empty($data)) {
			$data['Item']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['Item']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Item', true));
		}
	}

	public function makeOrderCondition($data) {
		$order = $data['purchase_order'];
		$this->bindModel(array('belongsTo' => array(
			'ItemsPurchaseOrder' => array(
				'className' => 'Orders.ItemsPurchaseOrder',
				'foreignKey' => false,
				'type' => 'inner',
				'conditions' => array('ItemsPurchaseOrder.purchase_order_id' => $order, 'ItemsPurchaseOrder.item_id = Item.id')
			)
		)), true);
	}
	
	public function makeProviderCondition($data) {
		$organization = $data['organization_id'];
		$this->bindModel(array('belongsTo' => array(
			'ItemsOrganization' => array(
				'className' => 'Catalog.ItemsOrganization',
				'foreignKey' => false,
				'type' => 'inner',
				'conditions' => array('ItemsOrganization.organization_id' => $organization, 'ItemsOrganization.item_id = Item.id')
			)
		)), false);
	}

	public function beforeImport($data) {
		if (!empty($data[$this->alias]['provider'])) {
			$data['Organization']['Organization'][] = $this->Organization->field('id', array('name' => $data[$this->alias]['provider']));
		}
		if (!empty($data[$this->alias]['package_factor'])) {
			$data[$this->alias]['package_factor'] = strtoupper($data[$this->alias]['package_factor']);
		}
		return $data;
	}
}