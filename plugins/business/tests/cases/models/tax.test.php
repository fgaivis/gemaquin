<?php
/* Tax Test cases generated on: 2013-08-16 14:08:40 : 1376679160*/
App::import('Model', 'Business.Tax');

App::import('Lib', 'Templates.AppTestCase');
class TaxTestCase extends AppTestCase {
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
		$this->Tax = AppMock::getTestModel('Tax');
		$fixture = new TaxFixture();
		$this->record = array('Tax' => $fixture->records[0]);
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
		unset($this->Tax);
		ClassRegistry::flush();
	}

/**
 * Test adding a Tax 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['Tax']['id']);
		$result = $this->Tax->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['Tax']['id']);
			//unset($data['Tax']['title']);
			$result = $this->Tax->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Tax 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->Tax->edit('tax-1', null);

		$expected = $this->Tax->read(null, 'tax-1');
		$this->assertEqual($result['Tax'], $expected['Tax']);

		// put invalidated data here
		$data = $this->record;
		//$data['Tax']['title'] = null;

		$result = $this->Tax->edit('tax-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->Tax->edit('tax-1', $data);
		$this->assertTrue($result);

		$result = $this->Tax->read(null, 'tax-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['Tax']['title'], $data['Tax']['title']);

		try {
			$this->Tax->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Tax 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->Tax->view('tax-1');
		$this->assertTrue(isset($result['Tax']));
		$this->assertEqual($result['Tax']['id'], 'tax-1');

		try {
			$result = $this->Tax->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Tax 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->Tax->validateAndDelete('invalidTaxId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Tax');
		}
		try {
			$postData = array(
				'Tax' => array(
					'confirm' => 0));
			$result = $this->Tax->validateAndDelete('tax-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Tax');
		}

		$postData = array(
			'Tax' => array(
				'confirm' => 1));
		$result = $this->Tax->validateAndDelete('tax-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>