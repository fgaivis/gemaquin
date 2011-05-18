<?php
class InventoryItemsController extends InventoryAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'InventoryItems';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for inventory item.
 * 
 * @access public
 */
	public function index() {
		$this->InventoryItem->recursive = 0;
		$this->set('inventoryItems', $this->paginate()); 
	}

/**
 * View for inventory item.
 *
 * @param string $id, inventory item id 
 * @access public
 */
	public function view($id = null) {
		try {
			$inventoryItem = $this->InventoryItem->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('inventoryItem')); 
	}

/**
 * Add for inventory item.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->InventoryItem->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The inventory item has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$items = $this->InventoryItem->Item->find('list');
		$this->set(compact('items'));
 
	}

/**
 * Edit for inventory item.
 *
 * @param string $id, inventory item id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->InventoryItem->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Inventory Item saved', true));
				$this->redirect(array('action' => 'view', $this->InventoryItem->data['InventoryItem']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$items = $this->InventoryItem->Item->find('list');
		$this->set(compact('items'));
 
	}

/**
 * Delete for inventory item.
 *
 * @param string $id, inventory item id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->InventoryItem->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Inventory item deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->InventoryItem->data['inventoryItem'])) {
			$this->set('inventoryItem', $this->InventoryItem->data['inventoryItem']);
		}
	}

}
?>