<?php
/* Organizations Test cases generated on: 2011-03-05 21:03:36 : 1299376416*/
App::import('Controller', 'business.Organizations');

App::import('Lib', 'Templates.AppTestCase');
class OrganizationsControllerTestCase extends AppTestCase {
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
		$this->Organizations = AppMock::getTestController('OrganizationsController');
		$this->Organizations->constructClasses();
		$this->Organizations->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new OrganizationFixture();
		$this->record = array('Organization' => $fixture->records[0]);
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
		unset($this->Organizations);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->Organizations->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->Organizations->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->Organizations, 'OrganizationsController');
		//$this->assertIsA($this->Organizations->Organization, 'Organization');
	}



	
}
?>