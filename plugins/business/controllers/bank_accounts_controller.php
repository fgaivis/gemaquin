<?php
class BankAccountsController extends BusinessAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'BankAccounts';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for bank account.
 * 
 * @access public
 */
	public function index() {
		$this->BankAccount->recursive = 0;
		$this->set('bankAccounts', $this->paginate()); 
	}

/**
 * View for bank account.
 *
 * @param string $id, bank account id 
 * @access public
 */
	public function view($id = null) {
		try {
			$bankAccount = $this->BankAccount->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('bankAccount')); 
	}

/**
 * Add for bank account.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->BankAccount->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The bank account has been saved', true));
				//$this->redirect(array('action' => 'index'));
				$id = $this->BankAccount->data['BankAccount']['organization_id'];
				$organization = $this->BankAccount->Organization->find('first', array('conditions' => array('Organization.id' => $id)));
				if($organization['Organization']['type'] === 'Client'){
					$this->redirect(array('controller' => 'clients', 'action' => 'view', $id));
				}else{
					$this->redirect(array('controller' => 'providers', 'action' => 'view', $id));
				}
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->_setRelated(); 
	}

/**
 * Edit for bank account.
 *
 * @param string $id, bank account id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->BankAccount->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Bank Account saved', true));
				$this->redirect(array('action' => 'view', $this->BankAccount->data['BankAccount']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$this->_setRelated();
	}

/**
 * Delete for bank account.
 *
 * @param string $id, bank account id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->BankAccount->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Bank account deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->BankAccount->data['bankAccount'])) {
			$this->set('bankAccount', $this->BankAccount->data['bankAccount']);
		}
	}

	protected function _setRelated() {
		$organizations = $this->BankAccount->Organization->find('list');
		Configure::load('selectables');
		$currencies = Configure::read('Selectables.currencies');
		$this->set(compact('organizations', 'currencies'));
	}

}
?>