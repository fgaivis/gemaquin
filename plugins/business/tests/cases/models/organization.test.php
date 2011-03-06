<?php
/* Organization Test cases generated on: 2011-03-05 21:03:21 : 1299375201*/
App::import('Model', 'business.Organization');

App::import('Lib', 'Templates.AppTestCase');
class OrganizationTestCase extends AppTestCase {
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
		$this->Organization = AppMock::getTestModel('Organization');
		$fixture = new OrganizationFixture();
		$this->record = array('Organization' => $fixture->records[0]);
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
		unset($this->Organization);
		ClassRegistry::flush();
	}

/**
 * Test adding a Organization 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['Organization']['id']);
		$result = $this->Organization->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['Organization']['id']);
			//unset($data['Organization']['title']);
			$result = $this->Organization->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Organization 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->Organization->edit('organization-1', null);

		$expected = $this->Organization->read(null, 'organization-1');
		$this->assertEqual($result['Organization'], $expected['Organization']);

		// put invalidated data here
		$data = $this->record;
		//$data['Organization']['title'] = null;

		$result = $this->Organization->edit('organization-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->Organization->edit('organization-1', $data);
		$this->assertTrue($result);

		$result = $this->Organization->read(null, 'organization-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['Organization']['title'], $data['Organization']['title']);

		try {
			$this->Organization->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Organization 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->Organization->view('organization-1');
		$this->assertTrue(isset($result['Organization']));
		$this->assertEqual($result['Organization']['id'], 'organization-1');

		try {
			$result = $this->Organization->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Organization 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->Organization->validateAndDelete('invalidOrganizationId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Organization');
		}
		try {
			$postData = array(
				'Organization' => array(
					'confirm' => 0));
			$result = $this->Organization->validateAndDelete('organization-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Organization');
		}

		$postData = array(
			'Organization' => array(
				'confirm' => 1));
		$result = $this->Organization->validateAndDelete('organization-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>