<?php
/* Addresses Test cases generated on: 2011-03-05 21:03:38 : 1299376418*/
App::import('Controller', 'business.Addresses');

App::import('Lib', 'Templates.AppTestCase');
class AddressesControllerTestCase extends AppTestCase {
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
		$this->Addresses = AppMock::getTestController('AddressesController');
		$this->Addresses->constructClasses();
		$this->Addresses->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new AddressFixture();
		$this->record = array('Address' => $fixture->records[0]);
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
		unset($this->Addresses);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->Addresses->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->Addresses->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->Addresses, 'AddressesController');
		//$this->assertIsA($this->Addresses->Address, 'Address');
	}



	
}
?>