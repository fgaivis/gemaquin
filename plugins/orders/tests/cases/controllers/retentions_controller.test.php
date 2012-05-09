<?php
/* Retentions Test cases generated on: 2012-05-09 11:05:32 : 1336579412*/
App::import('Controller', 'Orders.Retentions');

App::import('Lib', 'Templates.AppTestCase');
class RetentionsControllerTestCase extends AppTestCase {
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
		$this->Retentions = AppMock::getTestController('RetentionsController');
		$this->Retentions->constructClasses();
		$this->Retentions->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new RetentionFixture();
		$this->record = array('Retention' => $fixture->records[0]);
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
		unset($this->Retentions);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->Retentions->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->Retentions->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->Retentions, 'RetentionsController');
		//$this->assertIsA($this->Retentions->Retention, 'Retention');
	}



	
}
?>