<?php
/* Taxes Test cases generated on: 2013-08-16 14:08:54 : 1376679294*/
App::import('Controller', 'Business.Taxes');

App::import('Lib', 'Templates.AppTestCase');
class TaxesControllerTestCase extends AppTestCase {
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
		$this->Taxes = AppMock::getTestController('TaxesController');
		$this->Taxes->constructClasses();
		$this->Taxes->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new TaxFixture();
		$this->record = array('Tax' => $fixture->records[0]);
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
		unset($this->Taxes);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->Taxes->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->Taxes->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->Taxes, 'TaxesController');
		//$this->assertIsA($this->Taxes->Tax, 'Tax');
	}



	
}
?>