<?php
class InventoryController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Inventory';

    public $components = array('Search.Prg');

    public $presetVars = array(
        array('field' => 'z_quantity', 'type' => 'value', 'modelField' => 'z_quantity'),
    	array('field' => 'gt_quantity', 'type' => 'value', 'modelField' => 'gt_quantity'),
        array('field' => 'lt_quantity', 'type' => 'value', 'modelField' => 'lt_quantity'),
        array('field' => 'organization_id', 'type' => 'value', 'modelField' => 'organization_id'),
    );

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
 * Index for inventory.
 * 
 * @access public
 */
	public function find() {
		$this->Inventory->recursive = 0;
		$this->set('items', $this->paginate()); 
	}

    public function stock($isReport = false) {
        if ($isReport) {
            $this->layout = 'print';
        }
        $this->set('isReport', $isReport);
        $this->Prg->commonProcess();
        
    	$this->passedArgs['z_quantity'] = 1;
        //if(!empty($this->passedArgs)) { print_r($this->passedArgs); }
        $this->paginate['conditions'] = $this->Inventory->parseCriteria($this->passedArgs);
        $this->set('items', $this->paginate());
        $organizations = ClassRegistry::init('Business.Organization')->find('list',array('conditions' => array('Organization.type'=>'Provider'), 'order' => array('name' => 'asc')));
        $this->set(compact('organizations'));
    }
    
/**
 * Add for inventory.
 *
 * @access public
 */
	public function add() {
		try {
			$result = $this->Inventory->add($this->data);
			if ($result === true) {
				$this->Session->setFlash(__('Inventory Item saved', true));
				$this->redirect(array('action' => 'stock'));
								
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$items = $this->Inventory->Item->find('list');
		$this->set(compact('items'));
 
	}
    
/**
 * Edit for inventory.
 *
 * @param string $id, inventory item id 
 * @access public
 */
	public function edit($id = null) {
		try {
			$result = $this->Inventory->edit($id, $this->data);
			if ($result === true) {
				//Cambio los valores de los InventoryItems
				$inventory_item = ClassRegistry::init('InventoryItem');
				$inventory_items = $inventory_item->find('all',array('conditions' => array('InventoryItem.item_id'=>$this->data['Inventory']['item_id'],
										'InventoryItem.batch'=>$this->data['Inventory']['batch'])));
				
				foreach ($inventory_items as $i_item){
					$i_item['InventoryItem']['retest_date'] = $this->data['Inventory']['retest_date'];
					$i_item['InventoryItem']['extension_date'] = $this->data['Inventory']['extension_date'];
					$inventory_item->save($i_item);
				}
				
				$this->Session->setFlash(__('Inventory Item saved', true));
				$this->redirect(array('action' => 'stock'));
								
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
		$items = $this->Inventory->Item->find('list');
		$this->set(compact('items'));
 
	}

}