<?php
class DeliveryNotesController extends OrdersAppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'DeliveryNotes';


/**
 * Index for delivery note.
 * 
 * @access public
 */
	public function index() {
		$this->DeliveryNote->recursive = 0;
		$this->set('deliveryNotes', $this->paginate()); 
	}

/**
 * View for delivery note.
 *
 * @param string $id, delivery note id 
 * @access public
 */
	public function view($id = null) {
		try {
			$deliveryNote = $this->DeliveryNote->view($id);
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('deliveryNote')); 
	}

/**
 * Add for delivery note.
 * 
 * @access public
 */
	public function add() {
        if ($this->data['DeliveryNote']['sales_order_id'] == null) {
            $this->Session->setFlash('You should indicate a sales order id');
            $this->redirect(array('action' => 'index'));
        }
        try {
            $result = $this->DeliveryNote->add($this->data);
            if ($result === true) {
                $this->Session->setFlash(__('The delivery note has been saved', true));
                $this->redirect(array('action' => 'index'));
            }
        } catch (OutOfBoundsException $e) {
            $this->Session->setFlash($e->getMessage());
        } catch (Exception $e) {
            $this->Session->setFlash($e->getMessage());
            $this->redirect(array('action' => 'index'));
        }
       $salesOrder = $this->DeliveryNote->SalesOrder->find('first', array('contain' => array('InventoryItem.Item'), 'conditions' => array('SalesOrder.id' => $this->data['DeliveryNote']['sales_order_id'])));
        $this->set(compact('salesOrder'));
 
	}

/**
 * Edit for delivery note.
 *
 * @param string $id, delivery note id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->DeliveryNote->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Delivery Note saved', true));
				$this->redirect(array('action' => 'view', $this->DeliveryNote->data['DeliveryNote']['id']));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$salesOrders = $this->DeliveryNote->SalesOrder->find('list');
		$invItemsSalesOrders = $this->DeliveryNote->InvItemsSalesOrder->find('list');
		$this->set(compact('salesOrders', 'invItemsSalesOrders'));
 
	}

/**
 * Delete for delivery note.
 *
 * @param string $id, delivery note id 
 * @access public
 */
	public function delete($id = null) {
		try {
			$result = $this->DeliveryNote->validateAndDelete($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Delivery note deleted', true));
				$this->redirect(array('action' => 'index'));
			}
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->DeliveryNote->data['deliveryNote'])) {
			$this->set('deliveryNote', $this->DeliveryNote->data['deliveryNote']);
		}
	}

}
?>