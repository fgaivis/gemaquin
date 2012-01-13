<?php
/* DebitNotes Test cases generated on: 2011-12-21 04:12:26 : 1324443086*/
App::import('Controller', 'Orders.DebitNotes');

App::import('Lib', 'Templates.AppTestCase');
class DebitNotesControllerTestCase extends AppTestCase {
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
		$this->DebitNotes = AppMock::getTestController('DebitNotesController');
		$this->DebitNotes->constructClasses();
		$this->DebitNotes->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new DebitNoteFixture();
		$this->record = array('DebitNote' => $fixture->records[0]);
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
		unset($this->DebitNotes);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->DebitNotes->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->DebitNotes->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->DebitNotes, 'DebitNotesController');
		//$this->assertIsA($this->DebitNotes->DebitNote, 'DebitNote');
	}



	
}
?>