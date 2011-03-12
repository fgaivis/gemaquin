<?php
/* Contacts Test cases generated on: 2011-03-05 21:03:37 : 1299376417*/
App::import('Controller', 'business.Contacts');

App::import('Lib', 'Templates.AppTestCase');
class ContactsControllerTestCase extends AppTestCase {
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
		$this->Contacts = AppMock::getTestController('ContactsController');
		$this->Contacts->constructClasses();
		$this->Contacts->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new ContactFixture();
		$this->record = array('Contact' => $fixture->records[0]);
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
		unset($this->Contacts);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->Contacts->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->Contacts->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->Contacts, 'ContactsController');
		//$this->assertIsA($this->Contacts->Contact, 'Contact');
	}



	
}
?>