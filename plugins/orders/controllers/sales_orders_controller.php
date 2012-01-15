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

    public $components = array('Search.Prg');

    public $presetVars = array(
        array('field' => 'from_date', 'type' => 'value', 'modelField' => 'from_date'),
        array('field' => 'to_date', 'type' => 'value', 'modelField' => 'to_date'),
    );
/**
 * Index for sales order.
 * 
 * @access public
 */
	public function index($isReport = false) {
        if ($isReport) {
            $this->layout = 'print';
        }
        $this->set('isReport', $isReport);
        $this->Prg->commonProcess();
        $this->paginate['conditions'] = $this->SalesOrder->parseCriteria($this->passedArgs);
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
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
		}
		$organizations = $this->SalesOrder->Client->find('list', array('order' => 'name'));
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
		$items = $this->SalesOrder->InventoryItem->find('all',array(
			'contain'=>'Item',
			'conditions' => array(
				'InventoryItem.quantity_left >' => 0
			)
		));
		$this->set(compact('items'));
	}

    public function best_selling_quantity($isReport = false) {
        if ($isReport) {
            $this->layout = 'print';
        }
        $items = $this->SalesOrder->bestSellingQuantity();
        $this->set('items', $items);
        $this->set('isReport', $isReport);
    }

    public function best_selling($isReport = false) {
        if ($isReport) {
            $this->layout = 'print';
        }
        $items = $this->SalesOrder->bestSelling();
        $this->set('items', $items);
        $this->set('isReport', $isReport);
    }

}
?>