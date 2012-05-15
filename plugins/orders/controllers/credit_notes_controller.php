<?php
class CreditNotesController extends OrdersAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'CreditNotes';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for credit note.
 * 
 * @access public
 */
	public function index() {
		$this->CreditNote->recursive = 0;
		$this->set('creditNotes', $this->paginate()); 
	}

/**
 * View for credit note.
 *
 * @param string $id, credit note id 
 * @access public
 */
	public function view($id = null) {
		try {
			$creditNote = $this->CreditNote->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('creditNote')); 
	}

/**
 * View for credit note.
 *
 * @param string $id, credit note id 
 * @access public
 */
	public function print_note($id) {
		$this->layout = 'print';
		$this->view($id);
	}

/**
 * Add for credit note.
 * 
 * @access public
 */
	public function add($invoiceId) {
		try {
			if (!empty($this->data)) {
				$this->data['InvoicesNote']['invoice_id'] = $invoiceId;	
			}
			$result = $this->CreditNote->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The credit note has been saved', true));
				$this->redirect(array('controller' => 'invoices', 'action' => 'view', $invoiceId));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('controller' => 'invoices', 'action' => 'view', $invoiceId));
		}
		$invoice = ClassRegistry::init('Orders.Invoice')->find('first', array(
			'conditions' => array('Invoice.id' => $invoiceId)
		));
		$this->set(compact('invoice'));
	}

/**
 * Edit for credit note.
 *
 * @param string $id, credit note id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->CreditNote->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Credit Note saved', true));
				$this->redirect(array('action' => 'view', $this->CreditNote->data['CreditNote']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
	}

/**
 * Delete for credit note.
 *
 * @param string $id, credit note id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->CreditNote->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Credit note deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->CreditNote->data['creditNote'])) {
			$this->set('creditNote', $this->CreditNote->data['creditNote']);
		}
	}

}
?>