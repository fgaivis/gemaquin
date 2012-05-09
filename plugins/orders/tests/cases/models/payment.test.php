<?php
/* Payment Test cases generated on: 2012-05-09 09:05:22 : 1336571302*/
App::import('Model', 'Orders.Payment');

App::import('Lib', 'Templates.AppTestCase');
class PaymentTestCase extends AppTestCase {
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
		$this->Payment = AppMock::getTestModel('Payment');
		$fixture = new PaymentFixture();
		$this->record = array('Payment' => $fixture->records[0]);
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
		unset($this->Payment);
		ClassRegistry::flush();
	}

/**
 * Test adding a Payment 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['Payment']['id']);
		$result = $this->Payment->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['Payment']['id']);
			//unset($data['Payment']['title']);
			$result = $this->Payment->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Payment 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->Payment->edit('payment-1', null);

		$expected = $this->Payment->read(null, 'payment-1');
		$this->assertEqual($result['Payment'], $expected['Payment']);

		// put invalidated data here
		$data = $this->record;
		//$data['Payment']['title'] = null;

		$result = $this->Payment->edit('payment-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->Payment->edit('payment-1', $data);
		$this->assertTrue($result);

		$result = $this->Payment->read(null, 'payment-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['Payment']['title'], $data['Payment']['title']);

		try {
			$this->Payment->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Payment 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->Payment->view('payment-1');
		$this->assertTrue(isset($result['Payment']));
		$this->assertEqual($result['Payment']['id'], 'payment-1');

		try {
			$result = $this->Payment->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Payment 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->Payment->validateAndDelete('invalidPaymentId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Payment');
		}
		try {
			$postData = array(
				'Payment' => array(
					'confirm' => 0));
			$result = $this->Payment->validateAndDelete('payment-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Payment');
		}

		$postData = array(
			'Payment' => array(
				'confirm' => 1));
		$result = $this->Payment->validateAndDelete('payment-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>