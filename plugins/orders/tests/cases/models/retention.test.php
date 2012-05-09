<?php
/* Retention Test cases generated on: 2012-05-09 11:05:01 : 1336579381*/
App::import('Model', 'Orders.Retention');

App::import('Lib', 'Templates.AppTestCase');
class RetentionTestCase extends AppTestCase {
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
		$this->Retention = AppMock::getTestModel('Retention');
		$fixture = new RetentionFixture();
		$this->record = array('Retention' => $fixture->records[0]);
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
		unset($this->Retention);
		ClassRegistry::flush();
	}

/**
 * Test adding a Retention 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['Retention']['id']);
		$result = $this->Retention->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['Retention']['id']);
			//unset($data['Retention']['title']);
			$result = $this->Retention->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Retention 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->Retention->edit('retention-1', null);

		$expected = $this->Retention->read(null, 'retention-1');
		$this->assertEqual($result['Retention'], $expected['Retention']);

		// put invalidated data here
		$data = $this->record;
		//$data['Retention']['title'] = null;

		$result = $this->Retention->edit('retention-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->Retention->edit('retention-1', $data);
		$this->assertTrue($result);

		$result = $this->Retention->read(null, 'retention-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['Retention']['title'], $data['Retention']['title']);

		try {
			$this->Retention->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Retention 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->Retention->view('retention-1');
		$this->assertTrue(isset($result['Retention']));
		$this->assertEqual($result['Retention']['id'], 'retention-1');

		try {
			$result = $this->Retention->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Retention 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->Retention->validateAndDelete('invalidRetentionId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Retention');
		}
		try {
			$postData = array(
				'Retention' => array(
					'confirm' => 0));
			$result = $this->Retention->validateAndDelete('retention-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Retention');
		}

		$postData = array(
			'Retention' => array(
				'confirm' => 1));
		$result = $this->Retention->validateAndDelete('retention-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>