<?php
/* BankAccount Test cases generated on: 2011-03-23 19:03:12 : 1300923252*/
App::import('Model', 'business.BankAccount');

App::import('Lib', 'Templates.AppTestCase');
class BankAccountTestCase extends AppTestCase {
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
		$this->BankAccount = AppMock::getTestModel('BankAccount');
		$fixture = new BankAccountFixture();
		$this->record = array('BankAccount' => $fixture->records[0]);
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
		unset($this->BankAccount);
		ClassRegistry::flush();
	}

/**
 * Test adding a Bank Account 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['BankAccount']['id']);
		$result = $this->BankAccount->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['BankAccount']['id']);
			//unset($data['BankAccount']['title']);
			$result = $this->BankAccount->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Bank Account 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->BankAccount->edit('bankaccount-1', null);

		$expected = $this->BankAccount->read(null, 'bankaccount-1');
		$this->assertEqual($result['BankAccount'], $expected['BankAccount']);

		// put invalidated data here
		$data = $this->record;
		//$data['BankAccount']['title'] = null;

		$result = $this->BankAccount->edit('bankaccount-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->BankAccount->edit('bankaccount-1', $data);
		$this->assertTrue($result);

		$result = $this->BankAccount->read(null, 'bankaccount-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['BankAccount']['title'], $data['BankAccount']['title']);

		try {
			$this->BankAccount->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Bank Account 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->BankAccount->view('bankaccount-1');
		$this->assertTrue(isset($result['BankAccount']));
		$this->assertEqual($result['BankAccount']['id'], 'bankaccount-1');

		try {
			$result = $this->BankAccount->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Bank Account 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->BankAccount->validateAndDelete('invalidBankAccountId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Bank Account');
		}
		try {
			$postData = array(
				'BankAccount' => array(
					'confirm' => 0));
			$result = $this->BankAccount->validateAndDelete('bankaccount-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Bank Account');
		}

		$postData = array(
			'BankAccount' => array(
				'confirm' => 1));
		$result = $this->BankAccount->validateAndDelete('bankaccount-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>