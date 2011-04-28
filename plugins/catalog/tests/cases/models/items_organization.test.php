<?php
/* ItemsOrganization Test cases generated on: 2011-04-27 19:04:51 : 1303947531*/
App::import('Model', 'catalog.ItemsOrganization');

App::import('Lib', 'Templates.AppTestCase');
class ItemsOrganizationTestCase extends AppTestCase {
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
		$this->ItemsOrganization = AppMock::getTestModel('ItemsOrganization');
		$fixture = new ItemsOrganizationFixture();
		$this->record = array('ItemsOrganization' => $fixture->records[0]);
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
		unset($this->ItemsOrganization);
		ClassRegistry::flush();
	}

/**
 * Test adding a Items Organization 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['ItemsOrganization']['id']);
		$result = $this->ItemsOrganization->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['ItemsOrganization']['id']);
			//unset($data['ItemsOrganization']['title']);
			$result = $this->ItemsOrganization->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Items Organization 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->ItemsOrganization->edit('itemsorganization-1', null);

		$expected = $this->ItemsOrganization->read(null, 'itemsorganization-1');
		$this->assertEqual($result['ItemsOrganization'], $expected['ItemsOrganization']);

		// put invalidated data here
		$data = $this->record;
		//$data['ItemsOrganization']['title'] = null;

		$result = $this->ItemsOrganization->edit('itemsorganization-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->ItemsOrganization->edit('itemsorganization-1', $data);
		$this->assertTrue($result);

		$result = $this->ItemsOrganization->read(null, 'itemsorganization-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['ItemsOrganization']['title'], $data['ItemsOrganization']['title']);

		try {
			$this->ItemsOrganization->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Items Organization 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->ItemsOrganization->view('itemsorganization-1');
		$this->assertTrue(isset($result['ItemsOrganization']));
		$this->assertEqual($result['ItemsOrganization']['id'], 'itemsorganization-1');

		try {
			$result = $this->ItemsOrganization->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Items Organization 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->ItemsOrganization->validateAndDelete('invalidItemsOrganizationId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Items Organization');
		}
		try {
			$postData = array(
				'ItemsOrganization' => array(
					'confirm' => 0));
			$result = $this->ItemsOrganization->validateAndDelete('itemsorganization-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Items Organization');
		}

		$postData = array(
			'ItemsOrganization' => array(
				'confirm' => 1));
		$result = $this->ItemsOrganization->validateAndDelete('itemsorganization-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>