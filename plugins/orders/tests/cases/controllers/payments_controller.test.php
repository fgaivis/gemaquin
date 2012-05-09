<?php
/* Payments Test cases generated on: 2012-05-09 09:05:50 : 1336572350*/
App::import('Controller', 'Orders.Payments');

App::import('Lib', 'Templates.AppTestCase');
class PaymentsControllerTestCase extends AppTestCase {
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
		$this->Payments = AppMock::getTestController('PaymentsController');
		$this->Payments->constructClasses();
		$this->Payments->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new PaymentFixture();
		$this->record = array('Payment' => $fixture->records[0]);
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
		unset($this->Payments);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->Payments->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->Payments->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->Payments, 'PaymentsController');
		//$this->assertIsA($this->Payments->Payment, 'Payment');
	}



	
}
?>