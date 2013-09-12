<?php
class TaxTotalizationsController extends BusinessAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'TaxTotalizations';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for tax totalization.
 * 
 * @access public
 */
	public function index() {
		$this->TaxTotalization->recursive = 0;
		$this->set('taxTotalizations', $this->paginate()); 
	}

/**
 * View for tax totalization.
 *
 * @param string $id, tax totalization id 
 * @access public
 */
	public function view($id = null) {
		try {
			$taxTotalization = $this->TaxTotalization->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('taxTotalization')); 
	}

/**
 * Add for tax totalization.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->TaxTotalization->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The tax totalization has been saved', true));
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
 * Edit for tax totalization.
 *
 * @param string $id, tax totalization id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->TaxTotalization->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Tax Totalization saved', true));
				$this->redirect(array('action' => 'view', $this->TaxTotalization->data['TaxTotalization']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
 
	}

/**
 * Delete for tax totalization.
 *
 * @param string $id, tax totalization id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->TaxTotalization->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Tax totalization deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->TaxTotalization->data['taxTotalization'])) {
			$this->set('taxTotalization', $this->TaxTotalization->data['taxTotalization']);
		}
	}

}
?>