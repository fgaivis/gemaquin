<?php
class ContactsController extends BusinessAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Contacts';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for contact.
 * 
 * @access public
 */
	public function index() {
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->paginate()); 
	}

/**
 * View for contact.
 *
 * @param string $id, contact id 
 * @access public
 */
	public function view($id = null) {
		try {
			$contact = $this->Contact->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('contact')); 
	}

/**
 * Add for contact.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->Contact->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The contact has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$organizations = $this->Contact->Organization->find('list');
		$this->set(compact('organizations'));
 
	}

/**
 * Edit for contact.
 *
 * @param string $id, contact id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Contact->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Contact saved', true));
				$this->redirect(array('action' => 'view', $this->Contact->data['Contact']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$organizations = $this->Contact->Organization->find('list');
		$this->set(compact('organizations'));
 
	}

/**
 * Delete for contact.
 *
 * @param string $id, contact id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->Contact->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Contact deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Contact->data['contact'])) {
			$this->set('contact', $this->Contact->data['contact']);
		}
	}

}
?>