<?php
class RetentionsController extends OrdersAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Retentions';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for retention.
 * 
 * @access public
 */
	public function index() {
		$this->Retention->recursive = 0;
		$this->set('retentions', $this->paginate()); 
	}

/**
 * View for retention.
 *
 * @param string $id, retention id 
 * @access public
 */
	public function view($id = null) {
		try {
			$retention = $this->Retention->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('retention')); 
	}

/**
 * Add for retention.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->Retention->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The retention has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$organizations = $this->Retention->Organization->find('list');
		$invoices = $this->Retention->Invoice->find('list');
		$this->set(compact('organizations', 'invoices'));
 
	}

/**
 * Edit for retention.
 *
 * @param string $id, retention id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Retention->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Retention saved', true));
				$this->redirect(array('action' => 'view', $this->Retention->data['Retention']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$organizations = $this->Retention->Organization->find('list');
		$invoices = $this->Retention->Invoice->find('list');
		$this->set(compact('organizations', 'invoices'));
 
	}

/**
 * Delete for retention.
 *
 * @param string $id, retention id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->Retention->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Retention deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Retention->data['retention'])) {
			$this->set('retention', $this->Retention->data['retention']);
		}
	}

}
?>