<?php
/* CreditNote Test cases generated on: 2011-12-21 04:12:48 : 1324441728*/
App::import('Model', 'Orders.CreditNote');

App::import('Lib', 'Templates.AppTestCase');
class CreditNoteTestCase extends AppTestCase {
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
		$this->CreditNote = AppMock::getTestModel('CreditNote');
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
		unset($this->CreditNote);
		ClassRegistry::flush();
	}

/**
 * Test adding a Credit Note 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['CreditNote']['id']);
		$result = $this->CreditNote->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['CreditNote']['id']);
			//unset($data['CreditNote']['title']);
			$result = $this->CreditNote->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Credit Note 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->CreditNote->edit('creditnote-1', null);

		$expected = $this->CreditNote->read(null, 'creditnote-1');
		$this->assertEqual($result['CreditNote'], $expected['CreditNote']);

		// put invalidated data here
		$data = $this->record;
		//$data['CreditNote']['title'] = null;

		$result = $this->CreditNote->edit('creditnote-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->CreditNote->edit('creditnote-1', $data);
		$this->assertTrue($result);

		$result = $this->CreditNote->read(null, 'creditnote-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['CreditNote']['title'], $data['CreditNote']['title']);

		try {
			$this->CreditNote->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Credit Note 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->CreditNote->view('creditnote-1');
		$this->assertTrue(isset($result['CreditNote']));
		$this->assertEqual($result['CreditNote']['id'], 'creditnote-1');

		try {
			$result = $this->CreditNote->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Credit Note 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->CreditNote->validateAndDelete('invalidCreditNoteId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Credit Note');
		}
		try {
			$postData = array(
				'CreditNote' => array(
					'confirm' => 0));
			$result = $this->CreditNote->validateAndDelete('creditnote-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Credit Note');
		}

		$postData = array(
			'CreditNote' => array(
				'confirm' => 1));
		$result = $this->CreditNote->validateAndDelete('creditnote-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>