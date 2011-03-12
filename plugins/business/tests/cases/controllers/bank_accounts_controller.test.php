<?php
/* BankAccounts Test cases generated on: 2011-03-05 21:03:37 : 1299376417*/
App::import('Controller', 'business.BankAccounts');

App::import('Lib', 'Templates.AppTestCase');
class BankAccountsControllerTestCase extends AppTestCase {
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
		$this->BankAccounts = AppMock::getTestController('BankAccountsController');
		$this->BankAccounts->constructClasses();
		$this->BankAccounts->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new BankAccountFixture();
		$this->record = array('BankAccount' => $fixture->records[0]);
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
		unset($this->BankAccounts);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->BankAccounts->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->BankAccounts->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->BankAccounts, 'BankAccountsController');
		//$this->assertIsA($this->BankAccounts->BankAccount, 'BankAccount');
	}



	
}
?>