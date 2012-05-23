<?php
class PaymentsController extends OrdersAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Payments';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for payment.
 * 
 * @access public
 */
	public function index() {
		$this->Payment->recursive = 0;
		$this->set('payments', $this->paginate()); 
	}

/**
 * View for payment.
 *
 * @param string $id, payment id 
 * @access public
 */
	public function view($id = null) {
		try {
			$payment = $this->Payment->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('payment')); 
	}

/**
 * Add for payment.
 * 
 * @access public
 */
	public function add($invoiceId) {
		try {
			$result = $this->Payment->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The payment has been saved', true));
				$this->redirect(array('controller' => 'invoices', 'action' => 'view', $invoiceId));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('controller' => 'invoices', 'action' => 'view', $invoiceId));
		}
		/*$organizations = $this->Payment->Organization->find('list');
		$invoices = $this->Payment->Invoice->find('list');
		$this->set(compact('organizations', 'invoices'));*/
		
		$invoice = ClassRegistry::init('Orders.Invoice')->find('first', array(
			'conditions' => array('Invoice.id' => $invoiceId)
		));
		$this->set(compact('invoice')); 
	}

/**
 * Edit for payment.
 *
 * @param string $id, payment id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Payment->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Payment saved', true));
				$this->redirect(array('action' => 'view', $this->Payment->data['Payment']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$organizations = $this->Payment->Organization->find('list');
		$invoices = $this->Payment->Invoice->find('list');
		$this->set(compact('organizations', 'invoices'));
 
	}

/**
 * Delete for payment.
 *
 * @param string $id, payment id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->Payment->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Payment deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Payment->data['payment'])) {
			$this->set('payment', $this->Payment->data['payment']);
		}
	}

}
?>