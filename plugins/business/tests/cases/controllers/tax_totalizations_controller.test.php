<?php
/* TaxTotalizations Test cases generated on: 2013-09-12 11:09:48 : 1379000688*/
App::import('Controller', 'Business.TaxTotalizations');

App::import('Lib', 'Templates.AppTestCase');
class TaxTotalizationsControllerTestCase extends AppTestCase {
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
		$this->TaxTotalizations = AppMock::getTestController('TaxTotalizationsController');
		$this->TaxTotalizations->constructClasses();
		$this->TaxTotalizations->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new TaxTotalizationFixture();
		$this->record = array('TaxTotalization' => $fixture->records[0]);
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
		unset($this->TaxTotalizations);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->TaxTotalizations->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->TaxTotalizations->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->TaxTotalizations, 'TaxTotalizationsController');
		//$this->assertIsA($this->TaxTotalizations->TaxTotalization, 'TaxTotalization');
	}



	
}
?>