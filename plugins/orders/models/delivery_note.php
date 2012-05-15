<?php
class DeliveryNote extends OrdersAppModel {
/**
 * Name
 *
 * @var string $name
 * @access public
 */
	public $name = 'DeliveryNote';

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
		'SalesOrder' => array(
			'className' => 'Orders.SalesOrder',
			'foreignKey' => 'sales_order_id',
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
		'InvItemsSoDlvNote' => array(
			'className' => 'Orders.InvItemsSoDlvNote',
			'foreignKey' => 'delivery_note_id',
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
		'InvItemsSalesOrder' => array(
			'className' => 'Orders.InvItemsSalesOrder',
			'joinTable' => 'inv_items_so_dlv_notes',
			'foreignKey' => 'delivery_note_id',
			'associationForeignKey' => 'inv_items_sales_order_id',
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
			'sales_order_id' => array(
				'uuid' => array('rule' => array('uuid'), 'required' => true, 'allowEmpty' => false, 'message' => __('Please enter a Sales Order', true))),
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
            if (!empty($data['InvItemsSoDlvNote'])){
                foreach($data['InvItemsSoDlvNote'] as $item) {
                    $invItemSo = $this->InvItemsSalesOrder->find('first', array('conditions' => array('InvItemsSalesOrder.id' => $item['inv_items_sales_order_id'])));
                    $invItemSo['InvItemsSalesOrder']['quantity_remaining'] = $invItemSo['InvItemsSalesOrder']['quantity_remaining'] - $item['quantity'];
                    if ($invItemSo['InvItemsSalesOrder']['quantity_remaining'] < 0) {
                        $this->invalidate('quantity', __('Quantity should not be greater than quantity remaining', true));
                        return false;
                    }
                    $invItemSo['InvItemsSalesOrder']['id'] = $item['inv_items_sales_order_id'];
                    $data['InvItemsSalesOrder'][] =  $invItemSo['InvItemsSalesOrder'];
                }
                $result = $this->saveAll($data);
                if ($result !== false) {
                    $this->InvItemsSalesOrder->saveAll($data['InvItemsSalesOrder']);
                    ClassRegistry::flush();
                    $remainingItems = ClassRegistry::init('Orders.InvItemsSalesOrder')->getRemainingItems($data['DeliveryNote']['sales_order_id']);
                    if (empty($remainingItems)) {
                        $salesOrder = array(
                            'SalesOrder' => array(
                                'id' => $data['DeliveryNote']['sales_order_id'],
                                'status' => SalesOrder::DISPATCHED,
                            )
                        );
                        $this->SalesOrder->save($salesOrder);
                    }
                    return true;
                } else {
                    throw new OutOfBoundsException(__('Could not save the Delivery Note, please check your inputs.', true));
                }
            } else {
                throw new OutOfBoundsException(__('A delivery note must have at least one item', true));
            }
			return $return;
		}
	}
	
	public function beforeSave() {
		if (!empty($this->data['InvItemsSalesOrder'])) {
			foreach ($this->data['InvItemsSalesOrder'] as $item)  {
				//print_r($item);
				ClassRegistry::init('Inventory.InventoryItem')->decrementExistance($item['inventory_item_id'], $item['quantity']);
				//exit();
			}	
		}
		return true;		
	}

/**
 * Edits an existing Delivery Note.
 *
 * @param string $id, delivery note id 
 * @param array $data, controller post data usually $this->data
 * @return mixed True on successfully save else post data as array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function edit($id = null, $data = null) {
		$deliveryNote = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($deliveryNote)) {
			throw new OutOfBoundsException(__('Invalid Delivery Note', true));
		}
		$this->set($deliveryNote);

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
			return $deliveryNote;
		}
	}

/**
 * Returns the record of a Delivery Note.
 *
 * @param string $id, delivery note id.
 * @return array
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function view($id = null) {
		$deliveryNote = $this->find('first', array(
			'contain' => array('InvItemsSalesOrder.InventoryItem.Item', 'SalesOrder', 'SalesOrder.Invoice.Organization'),
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id)));
		
		$organization_id = $deliveryNote['SalesOrder']['organization_id'];
		$organization = ClassRegistry::init('Business.Organization')->find('first',
			array('conditions' => array('Organization.id' => $organization_id))
		);
		$addressOrganization = ClassRegistry::init('Business.Contact')->find('first',
			array('conditions' => array('Contact.organization_id' => $organization_id))
		);
		$deliveryNote['Organization'] = $organization['Organization'];
		$deliveryNote['Contact'] = $addressOrganization['Contact'];
		if (empty($deliveryNote)) {
			throw new OutOfBoundsException(__('Invalid Delivery Note', true));
		}
		return $deliveryNote;
	}

/**
 * Validates the deletion
 *
 * @param string $id, delivery note id 
 * @param array $data, controller post data usually $this->data
 * @return boolean True on success
 * @throws OutOfBoundsException If the element does not exists
 * @access public
 */
	public function validateAndDelete($id = null, $data = array()) {
		$deliveryNote = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($deliveryNote)) {
			throw new OutOfBoundsException(__('Invalid Delivery Note', true));
		}

		$this->data['deliveryNote'] = $deliveryNote;
		if (!empty($data)) {
			$data['DeliveryNote']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['DeliveryNote']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Delivery Note', true));
		}
	}


}
?>