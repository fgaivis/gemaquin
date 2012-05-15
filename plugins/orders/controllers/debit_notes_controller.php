<?php
class DebitNotesController extends OrdersAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'DebitNotes';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for debit note.
 * 
 * @access public
 */
	public function index() {
		$this->DebitNote->recursive = 0;
		$this->set('debitNotes', $this->paginate()); 
	}

/**
 * View for debit note.
 *
 * @param string $id, debit note id 
 * @access public
 */
	public function view($id = null) {
		try {
			$debitNote = $this->DebitNote->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('debitNote')); 
	}

/**
 * View for debit note.
 *
 * @param string $id, credit note id 
 * @access public
 */
	public function print_note($id) {
		$this->layout = 'print';
		$this->view($id);
	}

/**
 * Add for debit note.
 * 
 * @access public
 */
	public function add($invoiceId) {
		try {
			if (!empty($this->data)) {
				$this->data['InvoicesNote']['invoice_id'] = $invoiceId;	
			}
			$result = $this->DebitNote->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The debit note has been saved', true));
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
 * Edit for debit note.
 *
 * @param string $id, debit note id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->DebitNote->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Debit Note saved', true));
				$this->redirect(array('action' => 'view', $this->DebitNote->data['DebitNote']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
	}

/**
 * Delete for debit note.
 *
 * @param string $id, debit note id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->DebitNote->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Debit note deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->DebitNote->data['debitNote'])) {
			$this->set('debitNote', $this->DebitNote->data['debitNote']);
		}
	}

}
?>