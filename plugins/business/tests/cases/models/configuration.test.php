<?php
/* Configuration Test cases generated on: 2012-05-09 09:05:56 : 1336572116*/
App::import('Model', 'Business.Configuration');

App::import('Lib', 'Templates.AppTestCase');
class ConfigurationTestCase extends AppTestCase {
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
		$this->Configuration = AppMock::getTestModel('Configuration');
		$fixture = new ConfigurationFixture();
		$this->record = array('Configuration' => $fixture->records[0]);
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
		unset($this->Configuration);
		ClassRegistry::flush();
	}

/**
 * Test adding a Configuration 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['Configuration']['id']);
		$result = $this->Configuration->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['Configuration']['id']);
			//unset($data['Configuration']['title']);
			$result = $this->Configuration->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Configuration 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->Configuration->edit('configuration-1', null);

		$expected = $this->Configuration->read(null, 'configuration-1');
		$this->assertEqual($result['Configuration'], $expected['Configuration']);

		// put invalidated data here
		$data = $this->record;
		//$data['Configuration']['title'] = null;

		$result = $this->Configuration->edit('configuration-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->Configuration->edit('configuration-1', $data);
		$this->assertTrue($result);

		$result = $this->Configuration->read(null, 'configuration-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['Configuration']['title'], $data['Configuration']['title']);

		try {
			$this->Configuration->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Configuration 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->Configuration->view('configuration-1');
		$this->assertTrue(isset($result['Configuration']));
		$this->assertEqual($result['Configuration']['id'], 'configuration-1');

		try {
			$result = $this->Configuration->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Configuration 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->Configuration->validateAndDelete('invalidConfigurationId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Configuration');
		}
		try {
			$postData = array(
				'Configuration' => array(
					'confirm' => 0));
			$result = $this->Configuration->validateAndDelete('configuration-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Configuration');
		}

		$postData = array(
			'Configuration' => array(
				'confirm' => 1));
		$result = $this->Configuration->validateAndDelete('configuration-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>