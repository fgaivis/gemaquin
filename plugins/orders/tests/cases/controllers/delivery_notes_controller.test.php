<?php
/* DeliveryNotes Test cases generated on: 2012-05-06 16:05:41 : 1336321241*/
App::import('Controller', 'Orders.DeliveryNotes');

App::import('Lib', 'Templates.AppTestCase');
class DeliveryNotesControllerTestCase extends AppTestCase {
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
		$this->DeliveryNotes = AppMock::getTestController('DeliveryNotesController');
		$this->DeliveryNotes->constructClasses();
		$this->DeliveryNotes->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new DeliveryNoteFixture();
		$this->record = array('DeliveryNote' => $fixture->records[0]);
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
		unset($this->DeliveryNotes);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->DeliveryNotes->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->DeliveryNotes->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->DeliveryNotes, 'DeliveryNotesController');
		//$this->assertIsA($this->DeliveryNotes->DeliveryNote, 'DeliveryNote');
	}



	
}
?>