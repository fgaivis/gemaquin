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

/**
 * Index for inventory entry.
 * 
 * @access public
 */
	public function index() {
		$this->InventoryEntry->recursive = 0;
		$this->set('inventoryEntries', $this->paginate()); 
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
				//$this->redirect('/');
			}
		}
		$purchaseOrders = $this->InventoryEntry->PurchaseOrder->find('list');
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