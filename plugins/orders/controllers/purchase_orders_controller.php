<?php
class PurchaseOrdersController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'PurchaseOrders';

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
	public $paginate = array('limit' => 20, 'order' => array('PurchaseOrder.number' => 'desc'));

    public $components = array('Search.Prg');

    public $presetVars = array(
        array('field' => 'number', 'type' => 'value'),
        array('field' => 'invoice', 'type' => 'value'),
        array('field' => 'organization_id', 'type' => 'value'),
        array('field' => 'status', 'type' => 'value'),
    	array('field' => 'from_date', 'type' => 'value', 'modelField' => 'from_date'),
        array('field' => 'to_date', 'type' => 'value', 'modelField' => 'to_date'),
    );
/**
 * Index for purchase order.
 *
 * @access public
 */
    public function index($isReport = false) {
        if ($isReport) {
            $this->layout = 'print';
        }
        $organizations = ClassRegistry::init('Business.Organization')->find('list',array('conditions' => array('Organization.type'=>'Provider'), 'order' => array('name' => 'asc')));
        $this->set(compact('organizations'));
        $this->set('isReport', $isReport);
        $this->Prg->commonProcess();
        $this->paginate['conditions'] = $this->PurchaseOrder->parseCriteria($this->passedArgs);
        $this->set('purchaseOrders', $this->paginate());
    }

/**
 * View for purchase order.
 *
 * @param string $id, purchase order id
 * @access public
 */
	public function view($id = null) {
		try {
			$purchaseOrder = $this->PurchaseOrder->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('purchaseOrder'));
	}

/**
 * Add for purchase order.
 *
 * @access public
 */
	public function add() {
		try {
			$result = $this->PurchaseOrder->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('The purchase order has been saved', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$organizations = $this->PurchaseOrder->Provider->find('list', array('order' => array('name' => 'asc')));
		$this->set(compact('organizations'));
	}

    public function send() {
        $result = $this->PurchaseOrder->send($this->data);
        if ($result === true) {
            //TODO Enviar correo al encargado
            $this->Session->setFlash(__('The purchase order has been sent', true));
        } else {
            $this->Session->setFlash(__('An error has occurred sending the purchase order', true));
        }
        $this->redirect(array('action' => 'view',$this->data['PurchaseOrder']['id']));
    }

    public function complete() {
        $result = $this->PurchaseOrder->complete($this->data);
        if ($result === true) {
            //TODO Enviar correo al encargado
            $this->Session->setFlash(__('The purchase order has been completed', true));
        } else {
            $this->Session->setFlash(__('An error has occurred completing the purchase order', true));
        }
        $this->redirect(array('action' => 'view',$this->data['PurchaseOrder']['id']));
    }
    
	public function preview_print() { //$id
        $this->layout = 'print';
		$this->view($this->data['PurchaseOrder']['id']);
		//$this->view($id);
    }

	public function fill_items($organization_id) {
		$items = $this->PurchaseOrder->Provider->ItemsOrganization->find('all',array(
			'conditions' => array('organization_id' => $organization_id),
			'contain'=> array('Item' => array('order' => array('Item.name' => 'ASC')))
		));
		$items = Set::combine($items,'/Item/id','/Item/name');
		$this->set(compact('items'));
	}


/**
 * Edit for purchase order.
 *
 * @param string $id, purchase order id
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->PurchaseOrder->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Purchase Order saved', true));
				$this->redirect(array('action' => 'view', $this->PurchaseOrder->data['PurchaseOrder']['id']));

			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		
		$organizations = $this->PurchaseOrder->Provider->find('list');
		$invoices = $this->PurchaseOrder->Invoice->find('list');
		$items = $this->PurchaseOrder->Item->find('list');
		$this->set('purchaseOrder', $this->data);
		$this->set(compact('organizations', 'invoices', 'items'));

	}
	
/**
 * Void for purchase order.
 *
 * @param string $id, purchase order id
 * @access public
 */
	public function void($id = null) {
		try {
			$result = $this->PurchaseOrder->void($id);
			if ($result === true) {
            	$this->Session->setFlash(__('Purchase Order void', true));
			} else {
			    $this->Session->setFlash(__('An error has occurred voiding the purchase order', true));
			}
	    	$this->redirect(array('action' => 'view', $id));
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}

	}

/**
 * Delete for purchase order.
 *
 * @param string $id, purchase order id
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->PurchaseOrder->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Purchase order deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->PurchaseOrder->data['purchaseOrder'])) {
			$this->set('purchaseOrder', $this->PurchaseOrder->data['purchaseOrder']);
		}
	}

}
?>

