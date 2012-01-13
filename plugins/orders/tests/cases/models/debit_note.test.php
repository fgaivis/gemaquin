<?php
/* DebitNote Test cases generated on: 2011-12-21 04:12:55 : 1324442155*/
App::import('Model', 'Orders.DebitNote');

App::import('Lib', 'Templates.AppTestCase');
class DebitNoteTestCase extends AppTestCase {
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
		$this->DebitNote = AppMock::getTestModel('DebitNote');
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
		unset($this->DebitNote);
		ClassRegistry::flush();
	}

/**
 * Test adding a Debit Note 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['DebitNote']['id']);
		$result = $this->DebitNote->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['DebitNote']['id']);
			//unset($data['DebitNote']['title']);
			$result = $this->DebitNote->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Debit Note 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->DebitNote->edit('debitnote-1', null);

		$expected = $this->DebitNote->read(null, 'debitnote-1');
		$this->assertEqual($result['DebitNote'], $expected['DebitNote']);

		// put invalidated data here
		$data = $this->record;
		//$data['DebitNote']['title'] = null;

		$result = $this->DebitNote->edit('debitnote-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->DebitNote->edit('debitnote-1', $data);
		$this->assertTrue($result);

		$result = $this->DebitNote->read(null, 'debitnote-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['DebitNote']['title'], $data['DebitNote']['title']);

		try {
			$this->DebitNote->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Debit Note 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->DebitNote->view('debitnote-1');
		$this->assertTrue(isset($result['DebitNote']));
		$this->assertEqual($result['DebitNote']['id'], 'debitnote-1');

		try {
			$result = $this->DebitNote->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Debit Note 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->DebitNote->validateAndDelete('invalidDebitNoteId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Debit Note');
		}
		try {
			$postData = array(
				'DebitNote' => array(
					'confirm' => 0));
			$result = $this->DebitNote->validateAndDelete('debitnote-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Debit Note');
		}

		$postData = array(
			'DebitNote' => array(
				'confirm' => 1));
		$result = $this->DebitNote->validateAndDelete('debitnote-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>