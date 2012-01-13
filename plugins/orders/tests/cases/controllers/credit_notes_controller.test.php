<?php
/* CreditNotes Test cases generated on: 2011-12-21 04:12:05 : 1324443065*/
App::import('Controller', 'Orders.CreditNotes');

App::import('Lib', 'Templates.AppTestCase');
class CreditNotesControllerTestCase extends AppTestCase {
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
		$this->CreditNotes = AppMock::getTestController('CreditNotesController');
		$this->CreditNotes->constructClasses();
		$this->CreditNotes->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new CreditNoteFixture();
		$this->record = array('CreditNote' => $fixture->records[0]);
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
		unset($this->CreditNotes);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->CreditNotes->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->CreditNotes->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->CreditNotes, 'CreditNotesController');
		//$this->assertIsA($this->CreditNotes->CreditNote, 'CreditNote');
	}



	
}
?>