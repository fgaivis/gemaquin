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
 * Components
 *
 * @var array
 */
	public $components = array('Search.Prg');


 /**
 * Valid search fields
 *
 * @var array
 */
	public $presetVars = array(
		array('field' => 'code', 'type' => 'value'),
		array('field' => 'name', 'type' => 'value'),
		array('field' => 'fiscalid', 'type' => 'value')
	);

/**
 * Index for client.
 *
 * @access public
 */
	public function index() {
		$this->Prg->commonProcess();
		$this->paginate['conditions'] = $this->Client->parseCriteria($this->passedArgs);
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
		$organization = ClassRegistry::init('Organization');
		$org_code = $organization->find('first', array('fields' => 'MAX(CAST(Organization.code AS SIGNED))'));
		$max_code = $org_code[0]['MAX(CAST(Organization.code AS SIGNED))'] + 1;
		
		$this->set('next_code', $max_code);
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

