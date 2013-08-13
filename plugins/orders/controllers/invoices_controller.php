<?php
class InvoicesController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Invoices';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');
	
/**
 * Paginate / Index Ordering
 *
 * @var array
 * @access public
 */	
	public $paginate = array('limit' => 20, 'order' => array('Invoice.created' => 'desc'));

    public $components = array('Search.Prg');

    public $presetVars = array(
        array('field' => 'from_date', 'type' => 'value', 'modelField' => 'from_date'),
        array('field' => 'to_date', 'type' => 'value', 'modelField' => 'to_date'),
    );
/**
 * Index for invoice.
 * 
 * @access public
 */
    public function index($isReport = false) {
        if ($isReport) {
            $this->layout = 'print';
        }
        $this->set('isReport', $isReport);
        $this->Prg->commonProcess();
        $this->paginate['conditions'] = $this->Invoice->parseCriteria($this->passedArgs);
        $this->set('invoices', $this->paginate());
    }

/**
 * View for invoice.
 *
 * @param string $id, invoice id 
 * @access public
 */
	public function view($id = null) {
		if (!empty($this->data)) {
			if ($this->Invoice->saveAttachments($this->data)) {
				$this->redirect(array('controller' => 'invoices', 'action' => 'view', $id));
			}
			$this->Session->setFlash(__('Could not save files', true));
		}
		try {
			$invoice = $this->Invoice->view($id);
			if ($invoice['Invoice']['type'] == Invoice::SALES) {
				for($i = 0; $i < count($invoice['InvoicesItem']); $i++){
					$invoice['InvoicesItem'][$i]['InventoryItem'] = $this->Invoice->findInventoryItem($invoice['SalesOrder']['id'], $invoice['InvoicesItem'][$i]['item_id']);
				}
				$payments = $this->Invoice->Payment->find('all',
					array('conditions' => array('Payment.invoice_id' => $id))
				);
				$invoice['Invoice']['Payment'] = $payments;
			} else if ($invoice['Invoice']['type'] == Invoice::PURCHASE || $invoice['Invoice']['type'] == Invoice::SERVICE) {
				$retentions = $this->Invoice->Retention->find('all',
					array('conditions' => array('Retention.invoice_id' => $id))
				);
				$invoice['Invoice']['Retention'] = $retentions;
				$payments = $this->Invoice->Payment->find('all',
					array('conditions' => array('Payment.invoice_id' => $id))
				);
				$invoice['Invoice']['Payment'] = $payments;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('invoice'));
	}

/**
 * Add for invoice.
 * 
 * @access public
 */
	public function add() {
		try {
			if (isset($this->data['Invoice']) && isset($this->data['Invoice']['organization_id'])) {
				$result = $this->Invoice->add($this->data);
				if ($result === true) {
					$this->Session->setFlash(__('The invoice has been saved', true));
					$this->redirect(array('action' => 'index'));
				}
				else {
					$this->Session->setFlash(__('An error has occurred saving the invoice', true));
				}
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$organizations = $this->Invoice->Organization->find('list');
		$items = array();
		if (isset($this->data['PrePurchaseOrder']) || isset($this->data['PurchaseOrder'])) {
			$type = isset($this->data['PrePurchaseOrder']) ? 'PrePurchaseOrder' : 'PurchaseOrder';
			$items = $this->Invoice->PurchaseOrder->ItemsPurchaseOrder->find('all', array(
				'contain' => array('Item'),
				'order' => 'ItemsPurchaseOrder.item_id',
				'conditions' => array(
					'ItemsPurchaseOrder.purchase_order_id' => $this->data[$type]['id'])));
		} else if (isset($this->data['SalesOrder'])) {
			$items = $this->Invoice->SalesOrder->find('first', array(
				'contain' => array('InventoryItem.Item'),
				'conditions' => array(
					'SalesOrder.id' => $this->data['SalesOrder']['id'])));
			$items = $items['InventoryItem'];
			$temp_items = array();
			foreach ($items as $item) {
				$item['purchase_cost'] = ClassRegistry::init('Inventory.Inventory')->getPurchaseCost($item['item_id'], $item['batch']);
				array_push($temp_items,$item);
			}
			$items = $temp_items;
			$this->data['Invoice']['control'] = $this->Invoice->getControlNumber();
		}
		if (isset($this->data['PurchaseOrder']) && count($this->data['Invoice']) === 1) { //Significa que solo esta cargado el tipo del Invoice
			$invoice = $this->Invoice->getDraft($this->data['PurchaseOrder']['id']);
			if ($invoice) {
				$this->data['Invoice'] = $invoice['Invoice'];
				$this->data['InvoicesItem'] = $invoice['InvoicesItem'];
				$this->data['Invoice']['type'] = Invoice::PURCHASE;
			}
		}
		$this->set(compact('organizations', 'items')); 
	}

/**
 * Edit for invoice.
 *
 * @param string $id, invoice id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Invoice->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Invoice saved', true));
				$this->redirect(array('action' => 'view', $this->Invoice->data['Invoice']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$organizations = $this->Invoice->Organization->find('list');
		//$items = $this->Invoice->Item->find('list');
		$this->set(compact('organizations')); //$this->set(compact('organizations', 'items'));
 
	}

/**
 * Delete for invoice.
 *
 * @param string $id, invoice id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->Invoice->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Invoice deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Invoice->data['invoice'])) {
			$this->set('invoice', $this->Invoice->data['invoice']);
		}
	}

	public function print_invoice($id) {
		$this->view($id);
		$this->layout = 'print';
	}
}