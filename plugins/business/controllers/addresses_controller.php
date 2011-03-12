<?php
class AddressesController extends BusinessAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Addresses';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for address.
 * 
 * @access public
 */
	public function index() {
		$this->Address->recursive = 0;
		$this->set('addresses', $this->paginate()); 
	}

/**
 * View for address.
 *
 * @param string $id, address id 
 * @access public
 */
	public function view($id = null) {
		try {
			$address = $this->Address->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('address')); 
	}

/**
 * Add for address.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->Address->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The address has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$organizations = $this->Address->Organization->find('list');
		$this->set(compact('organizations'));
 
	}

/**
 * Edit for address.
 *
 * @param string $id, address id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Address->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Address saved', true));
				$this->redirect(array('action' => 'view', $this->Address->data['Address']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$organizations = $this->Address->Organization->find('list');
		$this->set(compact('organizations'));
 
	}

/**
 * Delete for address.
 *
 * @param string $id, address id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->Address->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Address deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Address->data['address'])) {
			$this->set('address', $this->Address->data['address']);
		}
	}

}
?>