<?php
class SalesOrdersController extends OrdersAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'SalesOrders';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for sales order.
 * 
 * @access public
 */
	public function index() {
		$this->SalesOrder->recursive = 0;
		$this->set('salesOrders', $this->paginate()); 
	}

/**
 * View for sales order.
 *
 * @param string $id, sales order id 
 * @access public
 */
	public function view($id = null) {
		try {
			$salesOrder = $this->SalesOrder->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('salesOrder')); 
	}

/**
 * Add for sales order.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->SalesOrder->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The sales order has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$organizations = $this->SalesOrder->Client->find('list');
		//$inventoryItems = $this->SalesOrder->InventoryItem->find('all', array('contain' => array('Item')));
		$this->set(compact('organizations'));
 
	}

/**
 * Edit for sales order.
 *
 * @param string $id, sales order id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->SalesOrder->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Sales Order saved', true));
				$this->redirect(array('action' => 'view', $this->SalesOrder->data['SalesOrder']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$organizations = $this->SalesOrder->Organization->find('list');
		$invoices = $this->SalesOrder->Invoice->find('list');
		$inventoryItems = $this->SalesOrder->InventoryItem->find('list');
		$this->set(compact('organizations', 'invoices', 'inventoryItems'));
 
	}

/**
 * Delete for sales order.
 *
 * @param string $id, sales order id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->SalesOrder->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Sales order deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->SalesOrder->data['salesOrder'])) {
			$this->set('salesOrder', $this->SalesOrder->data['salesOrder']);
		}
	}
	
	public function fill_items() {
		$result = $this->SalesOrder->InventoryItem->find('all',array(
				'contain'=>'Item',
		));
		$result = Set::combine($items,'/Item/id','/Item/name');
// 		foreach($result as $item) {
// 			$items[$item['InventoryItem']['id']] = 'Prueba' . substr($item['InventoryItem']['item_id'], 15, 5); 
// 		}
		$this->set(compact('items'));
	}

}
?>