<?php
/* SalesOrders Test cases generated on: 2011-07-30 19:07:51 : 1312069971*/
App::import('Controller', 'orders.SalesOrders');

App::import('Lib', 'Templates.AppTestCase');
class SalesOrdersControllerTestCase extends AppTestCase {
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
		$this->SalesOrders = AppMock::getTestController('SalesOrdersController');
		$this->SalesOrders->constructClasses();
		$this->SalesOrders->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new SalesOrderFixture();
		$this->record = array('SalesOrder' => $fixture->records[0]);
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
		unset($this->SalesOrders);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->SalesOrders->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->SalesOrders->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->SalesOrders, 'SalesOrdersController');
		//$this->assertIsA($this->SalesOrders->SalesOrder, 'SalesOrder');
	}



	
}
?>