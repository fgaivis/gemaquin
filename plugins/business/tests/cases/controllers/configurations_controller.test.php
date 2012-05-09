<?php
/* Configurations Test cases generated on: 2012-05-09 09:05:30 : 1336572210*/
App::import('Controller', 'Business.Configurations');

App::import('Lib', 'Templates.AppTestCase');
class ConfigurationsControllerTestCase extends AppTestCase {
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
		$this->Configurations = AppMock::getTestController('ConfigurationsController');
		$this->Configurations->constructClasses();
		$this->Configurations->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new ConfigurationFixture();
		$this->record = array('Configuration' => $fixture->records[0]);
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
		unset($this->Configurations);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->Configurations->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->Configurations->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->Configurations, 'ConfigurationsController');
		//$this->assertIsA($this->Configurations->Configuration, 'Configuration');
	}



	
}
?>