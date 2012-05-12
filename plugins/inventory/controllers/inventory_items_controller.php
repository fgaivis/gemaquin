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
	public $helpers = array('Html', 'Form', 'Time');

/**
 * Index for inventory item.
 * 
 * @access public
 */
	public function index($entry) {
		$this->InventoryItem->recursive = 0;
		$this->paginate['conditions'] = array('inventory_entry_id' => $entry);
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
	public function add($entry) {
		try {
			$order = $this->InventoryItem->InventoryEntry->field('purchase_order_id', array('InventoryEntry.id' => $entry));
			if (!$order) {
				throw new Exception(__('Invalid inventory entry', true));
			}
			$result = $this->InventoryItem->add($this->data['InventoryItem']);
			if ($result === true) {
				$this->Session->setFlash(__('The inventory item has been saved', true));
				$this->redirect(array('controller' => 'inventory_items', 'action' => 'load_certificates', $entry));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$transaction = String::uuid();
		$items = $this->InventoryItem->Item->find('all', array(
			'contain' => array(),
			'conditions' => $this->InventoryItem->Item->parseCriteria(array('purchase_order' => $order))
		));
		$order_items = $this->InventoryItem->PurchaseOrder->ItemsPurchaseOrder->find('all', array(
			'contain' => array('Item'),
			'conditions' => array('purchase_order_id' => $order)
		));
		$this->set(compact('order', 'transaction', 'items', 'order_items', 'entry'));
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


	public function report($entry) {
		$this->paginate['contain'] = array(
			'PurchaseOrder' => array('Provider', 'Invoice'),
			'Item'
		);
		$this->index($entry);
		$this->layout = 'print';
	}

	public function load_certificates($entry) {
		if (!empty($this->data)) {
			if ($this->InventoryItem->saveAttachments($this->data)) {
				$this->redirect(array('controller' => 'inventory_entries', 'action' => 'index'));
			}
			$this->Session->setFlash(__('Could not save files', true));
		}
		$this->paginate['limit'] = 10000;
		$this->index($entry);
		if (empty($this->data)) {
			$this->data['InventoryItem'] = Set::classicExtract($this->viewVars['inventoryItems'], '{n}.InventoryItem');
		}
	}

	public function labels($entry) {
		$this->report($entry);
	}

	public function barcode($id) {
		$path = APP . 'vendors';
		ini_set('include_path', $path . PATH_SEPARATOR . ini_get('include_path'));
		include_once 'Zend/Barcode.php';
		$barcodeOptions = array('text' => strtoupper(str_replace('-', '', $id)));
		$renderer = Zend_Barcode::factory('code128', 'image', $barcodeOptions, array());
		$renderer->render();
	}
}