<?php
class InventoryEntriesController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'InventoryEntries';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');
	
	/*public $presetVars = array(
        array('field' => 'not_empty', 'type' => 'value', 'modelField' => 'z_quantity'),
    );*/
	
/**
 * Paginate / Index Ordering
 *
 * @var array
 * @access public
 */	
	public $paginate = array('limit' => 50, 'order' => array('InventoryEntry.created' => 'desc'));

/**
 * Index for inventory entry.
 * 
 * @access public
 */
	public function index() {
		/*$this->InventoryEntry->recursive = 0;
		$this->set('inventoryEntries', $this->paginate());*/		
		
		$conditionsSubQuery['`InventoryItem`.`inventory_entry_id` <>'] = 0;
		$dbo = $this->InventoryEntry->getDataSource();
		$subQuery = $dbo->buildStatement(
		    array(
		        'fields' => array('`InventoryItem`.`inventory_entry_id`'),
		        'table' => $dbo->fullTableName(ClassRegistry::init('Inventory.InventoryItem')),
		        'alias' => 'InventoryItem',
		        'limit' => null,
		        'offset' => null,
		        'joins' => array(),
		        'conditions' => $conditionsSubQuery,
		        'order' => null,
		        'group' => null
		    ),
		    $this->InventoryEntry
		);
		$subQuery = ' `InventoryEntry`.`id` IN (' . $subQuery . ') ';
		$subQueryExpression = $dbo->expression($subQuery);		
		$conditions[] = $subQueryExpression;
		
		$inventoryEntries = $this->InventoryEntry->find('all', compact('conditions'));
		$this->set('inventoryEntries', $this->paginate($conditions));	
	}

/**
 * View for inventory entry.
 *
 * @param string $id, inventory entry id 
 * @access public
 */
	public function view($id = null) {
		try {
			$inventoryEntry = $this->InventoryEntry->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('inventoryEntry')); 
	}

/**
 * Prepares the database to load a new batch of items
 *
 * @return void
 */
	public function add() {
		if (!empty($this->data)) {
			try {
				$result = $this->InventoryEntry->add(array('InventoryEntry' => array(
					'purchase_order_id' => $this->data['InventoryEntry']['purchase_order_id'],
					'user_id' => $this->Auth->user('id')
				)));

				if ($result === true) {
					$this->redirect(
						array('controller' => 'inventory_items', 'action' => 'add', $this->InventoryEntry->id)
					);
				} else {
					$this->data = $result;
				}
			} catch (OutOfBoundsException $e) {
				$this->Session->setFlash($e->getMessage());
			}
		}
		//TODO Colocar solo las ordenes aun abiertas => No Anuladas y No Completadas
		$purchaseOrders = $this->InventoryEntry->PurchaseOrder->find('list', array(
			'conditions' => array("NOT" => array('PurchaseOrder.status' => array(PurchaseOrder::VOID, PurchaseOrder::COMPLETED))),
			'order' => array('PurchaseOrder.created' => 'desc')));
		$this->set(compact('purchaseOrders'));
	}

/**
 * Edit for inventory entry.
 *
 * @param string $id, inventory entry id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->InventoryEntry->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Inventory Entry saved', true));
				$this->redirect(array('action' => 'view', $this->InventoryEntry->data['InventoryEntry']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$users = $this->InventoryEntry->User->find('list');
		$purchaseOrders = $this->InventoryEntry->PurchaseOrder->find('list');
		$this->set(compact('users', 'purchaseOrders'));
 
	}

/**
 * Delete for inventory entry.
 *
 * @param string $id, inventory entry id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->InventoryEntry->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Inventory entry deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->InventoryEntry->data['inventoryEntry'])) {
			$this->set('inventoryEntry', $this->InventoryEntry->data['inventoryEntry']);
		}
	}

}
?>