<?php
/* InvoicesNote Test cases generated on: 2011-12-21 04:12:02 : 1324442222*/
App::import('Model', 'Orders.InvoicesNote');

App::import('Lib', 'Templates.AppTestCase');
class InvoicesNoteTestCase extends AppTestCase {
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
		$this->InvoicesNote = AppMock::getTestModel('InvoicesNote');
		$fixture = new InvoicesNoteFixture();
		$this->record = array('InvoicesNote' => $fixture->records[0]);
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
		unset($this->InvoicesNote);
		ClassRegistry::flush();
	}

/**
 * Test adding a Invoices Note 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['InvoicesNote']['id']);
		$result = $this->InvoicesNote->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['InvoicesNote']['id']);
			//unset($data['InvoicesNote']['title']);
			$result = $this->InvoicesNote->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Invoices Note 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->InvoicesNote->edit('invoicesnote-1', null);

		$expected = $this->InvoicesNote->read(null, 'invoicesnote-1');
		$this->assertEqual($result['InvoicesNote'], $expected['InvoicesNote']);

		// put invalidated data here
		$data = $this->record;
		//$data['InvoicesNote']['title'] = null;

		$result = $this->InvoicesNote->edit('invoicesnote-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->InvoicesNote->edit('invoicesnote-1', $data);
		$this->assertTrue($result);

		$result = $this->InvoicesNote->read(null, 'invoicesnote-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['InvoicesNote']['title'], $data['InvoicesNote']['title']);

		try {
			$this->InvoicesNote->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Invoices Note 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->InvoicesNote->view('invoicesnote-1');
		$this->assertTrue(isset($result['InvoicesNote']));
		$this->assertEqual($result['InvoicesNote']['id'], 'invoicesnote-1');

		try {
			$result = $this->InvoicesNote->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Invoices Note 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->InvoicesNote->validateAndDelete('invalidInvoicesNoteId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Invoices Note');
		}
		try {
			$postData = array(
				'InvoicesNote' => array(
					'confirm' => 0));
			$result = $this->InvoicesNote->validateAndDelete('invoicesnote-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Invoices Note');
		}

		$postData = array(
			'InvoicesNote' => array(
				'confirm' => 1));
		$result = $this->InvoicesNote->validateAndDelete('invoicesnote-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>