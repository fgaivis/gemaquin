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
        array('field' => 'gt_quantity', 'type' => 'value', 'modelField' => 'gt_quantity'),
        array('field' => 'lt_quantity', 'type' => 'value', 'modelField' => 'lt_quantity'),
    );

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Html', 'Form');

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
        $this->paginate['conditions'] = $this->Inventory->parseCriteria($this->passedArgs);
        $this->set('items', $this->paginate());
    }

}