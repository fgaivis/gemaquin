<?php
class ConfigurationsController extends BusinessAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Configurations';

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

/**
 * Index for configuration.
 * 
 * @access public
 */
	public function index() {
		$this->Configuration->recursive = 0;
		$this->set('configurations', $this->paginate()); 
	}

/**
 * View for configuration.
 *
 * @param string $id, configuration id 
 * @access public
 */
	public function view($id = null) {
		try {
			$configuration = $this->Configuration->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('configuration')); 
	}

/**
 * Add for configuration.
 * 
 * @access public
 */
	public function add() {
		try {
			$result = $this->Configuration->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The configuration has been saved', true));
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
 * Edit for configuration.
 *
 * @param string $id, configuration id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Configuration->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Configuration saved', true));
				$this->redirect(array('action' => 'view', $this->Configuration->data['Configuration']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
 
	}

/**
 * Delete for configuration.
 *
 * @param string $id, configuration id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->Configuration->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Configuration deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Configuration->data['configuration'])) {
			$this->set('configuration', $this->Configuration->data['configuration']);
		}
	}

}
?>