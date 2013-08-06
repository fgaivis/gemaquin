<?php
class ItemsController extends CatalogAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Items';

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
	public $paginate = array('limit' => 50, 'order' => array('Item.name' => 'asc'));

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
		array('field' => 'provider_code', 'type' => 'value'),
		array('field' => 'name', 'type' => 'value'),
		array('field' => 'organization_id', 'type' => 'value'),
		array('field' => 'purchase_order', 'type' => 'value')
	);

/**
 * Index for item.
 *
 * @access public
 */
	public function index() {
		$this->Prg->commonProcess();
		$this->paginate['conditions'] = $this->Item->parseCriteria($this->passedArgs);
		$this->Item->recursive = 0;
		$organizations = $this->Item->Organization->find('list',array('conditions' => array('Organization.type'=>'Provider'), 'order' => array('name' => 'asc')));
		$this->set(compact('organizations'));
		$this->set('items', $this->paginate());
	}

/**
 * View for item.
 *
 * @param string $id, item id
 * @access public
 */
	public function view($id = null) {
		try {
			$item = $this->Item->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('item'));
	}

/**
 * Add for item.
 *
 * @access public
 */
	public function add() {
		try {
			$result = $this->Item->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The item has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$categories = $this->Item->Category->find('list', array('order' => array('Category.name' => 'asc')));
		$this->set(compact('categories'));
		$this->set('organizations', $this->Item->Organization->find('list',array('conditions' => array('Organization.type'=>'Provider'), 'order' => array('Organization.name' => 'asc'))));

	}

/**
 * Edit for item.
 *
 * @param string $id, item id
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Item->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Item saved', true));
				$this->redirect(array('action' => 'view', $this->Item->data['Item']['id']));

			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$categories = $this->Item->Category->find('list', array('order' => array('Category.name' => 'asc')));
		$this->set(compact('categories'));
		$this->set('organizations', $this->Item->Organization->find('list',array('conditions' => array('Organization.type'=>'Provider'), 'order' => array('Organization.name' => 'asc'))));

	}

/**
 * Delete for item.
 *
 * @param string $id, item id
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->Item->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Item deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->Item->data['item'])) {
			$this->set('item', $this->Item->data['item']);
		}
	}

}
?>

