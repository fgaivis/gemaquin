<?php
class ItemsPurchaseOrdersController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'ItemsPurchaseOrders';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for items purchase order.
 * 
 * @access public
 */
	public function index() {
		$this->ItemsPurchaseOrder->recursive = 0;
		$this->set('itemsPurchaseOrders', $this->paginate()); 
	}

/**
 * View for items purchase order.
 *
 * @param string $id, items purchase order id 
 * @access public
 */
	public function view($id = null) {
		try {
			$itemsPurchaseOrder = $this->ItemsPurchaseOrder->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('itemsPurchaseOrder')); 
	}

/**
 * Add for items purchase order.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->ItemsPurchaseOrder->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The items purchase order has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$items = $this->ItemsPurchaseOrder->Item->find('list');
		$purchaseOrders = $this->ItemsPurchaseOrder->PurchaseOrder->find('list');
		$this->set(compact('items', 'purchaseOrders'));
 
	}

/**
 * Edit for items purchase order.
 *
 * @param string $id, items purchase order id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->ItemsPurchaseOrder->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Items Purchase Order saved', true));
				$this->redirect(array('action' => 'view', $this->ItemsPurchaseOrder->data['ItemsPurchaseOrder']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$items = $this->ItemsPurchaseOrder->Item->find('list');
		$purchaseOrders = $this->ItemsPurchaseOrder->PurchaseOrder->find('list');
		$this->set(compact('items', 'purchaseOrders'));
 
	}

/**
 * Delete for items purchase order.
 *
 * @param string $id, items purchase order id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->ItemsPurchaseOrder->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Items purchase order deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->ItemsPurchaseOrder->data['itemsPurchaseOrder'])) {
			$this->set('itemsPurchaseOrder', $this->ItemsPurchaseOrder->data['itemsPurchaseOrder']);
		}
	}

}
?>