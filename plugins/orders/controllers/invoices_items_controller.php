<?php
class InvoicesItemsController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'InvoicesItems';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for invoices item.
 * 
 * @access public
 */
	public function index() {
		$this->InvoicesItem->recursive = 0;
		$this->set('invoicesItems', $this->paginate()); 
	}

/**
 * View for invoices item.
 *
 * @param string $id, invoices item id 
 * @access public
 */
	public function view($id = null) {
		try {
			$invoicesItem = $this->InvoicesItem->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('invoicesItem')); 
	}

/**
 * Add for invoices item.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->InvoicesItem->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The invoices item has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$invoices = $this->InvoicesItem->Invoice->find('list');
		$items = $this->InvoicesItem->Item->find('list');
		$this->set(compact('invoices', 'items'));
 
	}

/**
 * Edit for invoices item.
 *
 * @param string $id, invoices item id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->InvoicesItem->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Invoices Item saved', true));
				$this->redirect(array('action' => 'view', $this->InvoicesItem->data['InvoicesItem']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$invoices = $this->InvoicesItem->Invoice->find('list');
		$items = $this->InvoicesItem->Item->find('list');
		$this->set(compact('invoices', 'items'));
 
	}

/**
 * Delete for invoices item.
 *
 * @param string $id, invoices item id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->InvoicesItem->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Invoices item deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->InvoicesItem->data['invoicesItem'])) {
			$this->set('invoicesItem', $this->InvoicesItem->data['invoicesItem']);
		}
	}

}
?>