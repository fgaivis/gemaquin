<?php
class InventoryController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Inventory';

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
	public function stock() {
		$this->Inventory->recursive = 0;
		$this->set('items', $this->paginate()); 
	}

}