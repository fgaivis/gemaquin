<?php
class ClientsController extends BusinessAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Clients';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');
	
/**
 * Paginate / Index Ordering
 *
 * @var array
 * @access public
 */	
	public $paginate = array('limit' => 50, 'order' => array('Client.name' => 'asc'));

/**
 * Index for client.
 *
 * @access public
 */
	public function index() {
		$this->Client->recursive = 0;
		$this->set('clients', $this->paginate());
	}

/**
 * View for client.
 *
 * @param string $id, client id
 * @access public
 */
	public function view($id = null) {
		try {
			$client = $this->Client->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('client'));
	}

/**
 * Add for client.
 *
 * @access public
 */
	public function add() {
		try {
			$result = $this->Client->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The client has been saved', true));
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
 * Edit for client.
 *
 * @param string $id, client id
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Client->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Client saved', true));
				$this->redirect(array('action' => 'view', $this->Client->data['Client']['id']));

			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}

	}

/**
 * Delete for client.
 *
 * @param string $id, client id
 * @access public
 */
	public function delete($id = null) {
		try {
		    $result = $this->Client->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Client deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Client->data['client'])) {
			$this->set('client', $this->Client->data['client']);
		}
	}

}
?>

