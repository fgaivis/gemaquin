<?php
/* InventoryItems Test cases generated on: 2011-05-18 20:05:25 : 1305749365*/
App::import('Controller', 'Inventory.InventoryItems');

App::import('Lib', 'Templates.AppTestCase');
class InventoryItemsControllerTestCase extends AppTestCase {
/**
 * Autoload entrypoint for fixtures dependecy solver
 *
 * @var string
 * @access public
 */
	public $plugin = 'app';

/**
 * Test to run for the test case (e.g array('testFind', 'testView'))
 * If this attribute is not empty only the tests from the list will be executed
 *
 * @var array
 * @access protected
 */
	protected $_testsToRun = array();

/**
 * Start Test callback
 *
 * @param string $method
 * @return void
 * @access public
 */
	public function startTest($method) {
		parent::startTest($method);
		$this->InventoryItems = AppMock::getTestController('InventoryItemsController');
		$this->InventoryItems->constructClasses();
		$this->InventoryItems->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new InventoryItemFixture();
		$this->record = array('InventoryItem' => $fixture->records[0]);
	}

/**
 * End Test callback
 *
 * @param string $method
 * @return void
 * @access public
 */
	public function endTest($method) {
		parent::endTest($method);
		unset($this->InventoryItems);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->InventoryItems->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->InventoryItems->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->InventoryItems, 'InventoryItemsController');
		//$this->assertIsA($this->InventoryItems->InventoryItem, 'InventoryItem');
	}



	
}
?>