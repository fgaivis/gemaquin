<?php
/* Items Test cases generated on: 2011-03-13 08:03:22 : 1300022722*/
App::import('Controller', 'catalog.Items');

App::import('Lib', 'Templates.AppTestCase');
class ItemsControllerTestCase extends AppTestCase {
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
		$this->Items = AppMock::getTestController('ItemsController');
		$this->Items->constructClasses();
		$this->Items->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new ItemFixture();
		$this->record = array('Item' => $fixture->records[0]);
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
		unset($this->Items);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->Items->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->Items->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->Items, 'ItemsController');
		//$this->assertIsA($this->Items->Item, 'Item');
	}



	
}
?>