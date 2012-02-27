<?php
class ProvidersController extends BusinessAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Providers';

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
	public $paginate = array('limit' => 50, 'order' => array('Provider.name' => 'asc'));

/**
 * Index for provider.
 *
 * @access public
 */
	public function index() {
		$this->Provider->recursive = 0;
		$this->set('providers', $this->paginate());
	}

/**
 * View for provider.
 *
 * @param string $id, provider id
 * @access public
 */
	public function view($id = null) {
		try {
			$provider = $this->Provider->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('provider'));
	}

/**
 * Add for provider.
 *
 * @access public
 */
	public function add() {
		try {
			$result = $this->Provider->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The provider has been saved', true));
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
 * Edit for provider.
 *
 * @param string $id, provider id
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Provider->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Provider saved', true));
				$this->redirect(array('action' => 'view', $this->Provider->data['Provider']['id']));

			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}

	}

/**
 * Delete for provider.
 *
 * @param string $id, provider id
 * @access public
 */
	public function delete($id = null) {
		try {
		    $result = $this->Provider->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Provider deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Provider->data['provider'])) {
			$this->set('provider', $this->Provider->data['provider']);
		}
	}

}
?>

