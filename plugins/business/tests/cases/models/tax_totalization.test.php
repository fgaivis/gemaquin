<?php
/* TaxTotalization Test cases generated on: 2013-09-12 11:09:13 : 1378999933*/
App::import('Model', 'Business.TaxTotalization');

App::import('Lib', 'Templates.AppTestCase');
class TaxTotalizationTestCase extends AppTestCase {
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
		$this->TaxTotalization = AppMock::getTestModel('TaxTotalization');
		$fixture = new TaxTotalizationFixture();
		$this->record = array('TaxTotalization' => $fixture->records[0]);
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
		unset($this->TaxTotalization);
		ClassRegistry::flush();
	}

/**
 * Test adding a Tax Totalization 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['TaxTotalization']['id']);
		$result = $this->TaxTotalization->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['TaxTotalization']['id']);
			//unset($data['TaxTotalization']['title']);
			$result = $this->TaxTotalization->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Tax Totalization 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->TaxTotalization->edit('taxtotalization-1', null);

		$expected = $this->TaxTotalization->read(null, 'taxtotalization-1');
		$this->assertEqual($result['TaxTotalization'], $expected['TaxTotalization']);

		// put invalidated data here
		$data = $this->record;
		//$data['TaxTotalization']['title'] = null;

		$result = $this->TaxTotalization->edit('taxtotalization-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->TaxTotalization->edit('taxtotalization-1', $data);
		$this->assertTrue($result);

		$result = $this->TaxTotalization->read(null, 'taxtotalization-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['TaxTotalization']['title'], $data['TaxTotalization']['title']);

		try {
			$this->TaxTotalization->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Tax Totalization 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->TaxTotalization->view('taxtotalization-1');
		$this->assertTrue(isset($result['TaxTotalization']));
		$this->assertEqual($result['TaxTotalization']['id'], 'taxtotalization-1');

		try {
			$result = $this->TaxTotalization->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Tax Totalization 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->TaxTotalization->validateAndDelete('invalidTaxTotalizationId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Tax Totalization');
		}
		try {
			$postData = array(
				'TaxTotalization' => array(
					'confirm' => 0));
			$result = $this->TaxTotalization->validateAndDelete('taxtotalization-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Tax Totalization');
		}

		$postData = array(
			'TaxTotalization' => array(
				'confirm' => 1));
		$result = $this->TaxTotalization->validateAndDelete('taxtotalization-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>