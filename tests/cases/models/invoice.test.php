<?php
/* Invoice Test cases generated on: 2011-07-16 13:07:40 : 1310839000*/
App::import('Model', 'Invoice');

App::import('Lib', 'Templates.AppTestCase');
class InvoiceTestCase extends AppTestCase {
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
		$this->Invoice = AppMock::getTestModel('Invoice');
		$fixture = new InvoiceFixture();
		$this->record = array('Invoice' => $fixture->records[0]);
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
		unset($this->Invoice);
		ClassRegistry::flush();
	}

/**
 * Test adding a Invoice 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['Invoice']['id']);
		$result = $this->Invoice->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['Invoice']['id']);
			//unset($data['Invoice']['title']);
			$result = $this->Invoice->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Invoice 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->Invoice->edit('invoice-1', null);

		$expected = $this->Invoice->read(null, 'invoice-1');
		$this->assertEqual($result['Invoice'], $expected['Invoice']);

		// put invalidated data here
		$data = $this->record;
		//$data['Invoice']['title'] = null;

		$result = $this->Invoice->edit('invoice-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->Invoice->edit('invoice-1', $data);
		$this->assertTrue($result);

		$result = $this->Invoice->read(null, 'invoice-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['Invoice']['title'], $data['Invoice']['title']);

		try {
			$this->Invoice->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Invoice 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->Invoice->view('invoice-1');
		$this->assertTrue(isset($result['Invoice']));
		$this->assertEqual($result['Invoice']['id'], 'invoice-1');

		try {
			$result = $this->Invoice->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Invoice 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->Invoice->validateAndDelete('invalidInvoiceId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Invoice');
		}
		try {
			$postData = array(
				'Invoice' => array(
					'confirm' => 0));
			$result = $this->Invoice->validateAndDelete('invoice-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Invoice');
		}

		$postData = array(
			'Invoice' => array(
				'confirm' => 1));
		$result = $this->Invoice->validateAndDelete('invoice-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>