<?php
class OrganizationsController extends BusinessAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Organizations';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for organization.
 * 
 * @access public
 */
	public function index() {
		$this->Organization->recursive = 0;
		$this->set('organizations', $this->paginate()); 
	}

/**
 * View for organization.
 *
 * @param string $id, organization id 
 * @access public
 */
	public function view($id = null) {
		try {
			$organization = $this->Organization->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('organization')); 
	}

/**
 * Add for organization.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->Organization->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The organization has been saved', true));
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
 * Edit for organization.
 *
 * @param string $id, organization id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Organization->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Organization saved', true));
				$this->redirect(array('action' => 'view', $this->Organization->data['Organization']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
 
	}

/**
 * Delete for organization.
 *
 * @param string $id, organization id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->Organization->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Organization deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Organization->data['organization'])) {
			$this->set('organization', $this->Organization->data['organization']);
		}
	}

}
?>