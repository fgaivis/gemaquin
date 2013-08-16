<?php
class TaxesController extends BusinessAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Taxes';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for tax.
 * 
 * @access public
 */
	public function index() {
		$this->Tax->recursive = 0;
		$this->set('taxes', $this->paginate()); 
	}

/**
 * View for tax.
 *
 * @param string $id, tax id 
 * @access public
 */
	public function view($id = null) {
		try {
			$tax = $this->Tax->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('tax')); 
	}

/**
 * Add for tax.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->Tax->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The tax has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
 
	}

/**
 * Edit for tax.
 *
 * @param string $id, tax id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Tax->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Tax saved', true));
				$this->redirect(array('action' => 'view', $this->Tax->data['Tax']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
 
	}

/**
 * Delete for tax.
 *
 * @param string $id, tax id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->Tax->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Tax deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Tax->data['tax'])) {
			$this->set('tax', $this->Tax->data['tax']);
		}
	}

}
?>