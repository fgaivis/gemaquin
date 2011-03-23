<?php
/* Address Test cases generated on: 2011-03-23 19:03:37 : 1300923217*/
App::import('Model', 'business.Address');

App::import('Lib', 'Templates.AppTestCase');
class AddressTestCase extends AppTestCase {
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
		$this->Address = AppMock::getTestModel('Address');
		$fixture = new AddressFixture();
		$this->record = array('Address' => $fixture->records[0]);
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
		unset($this->Address);
		ClassRegistry::flush();
	}

/**
 * Test adding a Address 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['Address']['id']);
		$result = $this->Address->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['Address']['id']);
			//unset($data['Address']['title']);
			$result = $this->Address->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Address 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->Address->edit('address-1', null);

		$expected = $this->Address->read(null, 'address-1');
		$this->assertEqual($result['Address'], $expected['Address']);

		// put invalidated data here
		$data = $this->record;
		//$data['Address']['title'] = null;

		$result = $this->Address->edit('address-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->Address->edit('address-1', $data);
		$this->assertTrue($result);

		$result = $this->Address->read(null, 'address-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['Address']['title'], $data['Address']['title']);

		try {
			$this->Address->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Address 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->Address->view('address-1');
		$this->assertTrue(isset($result['Address']));
		$this->assertEqual($result['Address']['id'], 'address-1');

		try {
			$result = $this->Address->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Address 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->Address->validateAndDelete('invalidAddressId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Address');
		}
		try {
			$postData = array(
				'Address' => array(
					'confirm' => 0));
			$result = $this->Address->validateAndDelete('address-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Address');
		}

		$postData = array(
			'Address' => array(
				'confirm' => 1));
		$result = $this->Address->validateAndDelete('address-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>