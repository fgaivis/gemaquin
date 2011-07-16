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
 * Index for invoice.
 * 
 * @access public
 */
	public function index() {
		$this->Invoice->recursive = 0;
		$this->set('invoices', $this->paginate()); 
	}

/**
 * View for invoice.
 *
 * @param string $id, invoice id 
 * @access public
 */
	public function view($id = null) {
		try {
			$invoice = $this->Invoice->view($id);
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
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$organizations = $this->Invoice->Organization->find('list');
		$items = $this->Invoice->Item->find('list');
		if (isset($this->data['PurchaseOrder'])) {
			//TODO set purchase order
		} else if (isset($this->data['SalesOrder'])) {
			//TODO set sales order
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
		$items = $this->Invoice->Item->find('list');
		$this->set(compact('organizations', 'items'));
 
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

}
?>