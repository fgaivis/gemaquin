<?php
class SalesOrder extends AppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'SalesOrder';

/**
 * Sales Order Statuses
 */
	const DRAFT = 'DRAFT';
	const SENT = 'SENT';
	const APPROVED = 'APPROVED';
	const INVOICED = 'INVOICED';
	const DISPATCHED = 'DISPATCHED';
	const RECEIVED = 'RECEIVED';
	const COMPLETED = 'COMPLETED';
	const VOID = 'VOID';

/**
 * Display field name
 *
 * @var string
 * @access public
 */
	public $displayField = 'number';
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
		'Client' => array(
			'className' => 'Business.Client',
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
		)
	);
	
	public $hasMany = array(
		'InvItemsSalesOrder' => array(
			'className' => 'Orders.InvItemsSalesOrder',
			'foreignKey' => 'sales_order_id',
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
		'InventoryItem' => array(
			'className' => 'Inventory.InventoryItem',
			'joinTable' => 'inv_items_sales_orders',
			'foreignKey' => 'sales_order_id',
			'associationForeignKey' => 'inventory_item_id',
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

    public $actsAs = array('Search.Searchable');

    public $filterArgs = array(
        array('name' => 'from_date', 'type' => 'query', 'method' => 'makeFromCondition'),
        array('name' => 'to_date', 'type' => 'query', 'method' => 'makeToCondition'),
    );

    public function makeFromCondition($data = array()) {
        return array('SalesOrder.created >=' => $data['from_date']);
    }

    public function makeToCondition($data = array()) {
        return array('SalesOrder.created <=' => $data['to_date']);
    }

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
				'NotEmpty' => array('rule' => 'notEmpty','message'=>__('Client is required',true))
			));
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
			if (!empty($data['InvItemsSalesOrder'])){
			    $result = $this->saveAll($data);
			    if ($result !== false) {
				    $this->data = array_merge($data, $result);
				    return true;
			    } else {
				    throw new OutOfBoundsException(__('Could not save the Sales Order, please check your inputs.', true));
			    }
			} else {
                throw new OutOfBoundsException(__('A sales order must have at least one item', true));
			}
			return $return;
		}
	}

/**
 * Edits an existing Sales Order.
 *
 * @param string $id, sales order id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$salesOrder = $this->find('first', array(
			'contain' => array('InventoryItem.Item', 'Client', 'Invoice', 'InvItemsSalesOrder'),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($salesOrder)) {
			throw new OutOfBoundsException(__('Invalid Sales Order', true));
		}
		$this->set($salesOrder);

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
			return $salesOrder;
		}
	}

/**
 * Returns the record of a Sales Order.
 *
 * @param string $id, sales order id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$salesOrder = $this->find('first', array(
			'contain' => array('InventoryItem.Item', 'Client', 'Invoice', 'InvItemsSalesOrder'),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));
		if (empty($salesOrder)) {
			throw new OutOfBoundsException(__('Invalid Sales Order', true));
		}

		return $salesOrder;
	}
	
	public function send($data) {
		$data['SalesOrder']['status'] = SalesOrder::SENT;
		$result = $this->save($data);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	
	public function void($id) {
	    $salesOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));
				
		if (empty($salesOrder)) {
			throw new OutOfBoundsException(__('Invalid Sales Order', true));
		}
		
		$salesOrder['SalesOrder']['status'] = PurchaseOrder::VOID;
		$result = $this->save($salesOrder);
		if ($result) {
            return true;
        } else {
            return false;
        }
	}

/**
 * Validates the deletion
 *
 * @param string $id, sales order id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$salesOrder = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($salesOrder)) {
			throw new OutOfBoundsException(__('Invalid Sales Order', true));
		}

		$this->data['salesOrder'] = $salesOrder;
		if (!empty($data)) {
			$data['SalesOrder']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['SalesOrder']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Sales Order', true));
		}
	}


	public function beforeSave() {
		if (!empty($this->data['InvItemsSalesOrder']) && !isset($this->data['SalesOrder']['id'])) {
			foreach ($this->data['InvItemsSalesOrder'] as $item)  {
				ClassRegistry::init('Inventory.InventoryItem')->decrement($item['inventory_item_id'], $item['quantity']);
			}	
		}
		return true;
	}

    public function bestSelling() {
        $sql = 'SELECT Item.name, Item.barcode, Item.sales_factor, Item.package_factor, Category.name, COUNT(InvItemsSalesOrder.id) AS quantity FROM inv_items_sales_orders InvItemsSalesOrder, inventory_items ii, items Item LEFT JOIN categories Category ON Category.id = Item.category_id WHERE Item.id = ii.item_id AND ii.id = InvItemsSalesOrder.inventory_item_id GROUP BY Item.name,Item.barcode ORDER BY quantity DESC';
        $items = $this->query($sql);
        return $items;
    }

    public function bestSellingQuantity() {
        $sql = 'SELECT Item.name, Item.barcode, Item.sales_factor, Item.package_factor, Category.name, SUM( InvItemsSalesOrder.quantity ) AS quantity FROM inv_items_sales_orders InvItemsSalesOrder, inventory_items ii, items Item LEFT JOIN categories Category ON Category.id = Item.category_id WHERE Item.id = ii.item_id AND ii.id = InvItemsSalesOrder.inventory_item_id GROUP BY Item.name,Item.barcode ORDER BY quantity DESC';
        $items = $this->query($sql);
        return $items;
    }
}
?>