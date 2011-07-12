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
 * Index for purchase order.
 *
 * @access public
 */
	public function index() {
		$this->PurchaseOrder->recursive = 0;
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
		$organizations = $this->PurchaseOrder->Provider->find('list');
		$this->set(compact('organizations'));
	}

	public function send() {
		$result = $this->PurchaseOrder->send($this->data);
		if ($result === true) {
            //TODO Enviar correo al encargado
            $this->Session->setFlash(__('The purchase order has been send', true));
		} else {
		    $this->Session->setFlash(__('An error has occurred sending the purchase order', true));
		}
	    $this->redirect(array('action' => 'view',$this->data['PurchaseOrder']['id']));
	}

	public function fill_items($organization_id) {
		$items = $this->PurchaseOrder->Provider->ItemsOrganization->find('all',array(
			'contain'=>'Item',
			'conditions' => array(
				'organization_id'=>$organization_id
			)
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

