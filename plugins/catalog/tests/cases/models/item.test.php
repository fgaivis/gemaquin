<?php
/* Item Test cases generated on: 2011-03-13 08:03:11 : 1300022711*/
App::import('Model', 'catalog.Item');

App::import('Lib', 'Templates.AppTestCase');
class ItemTestCase extends AppTestCase {
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
		$this->Item = AppMock::getTestModel('Item');
		$fixture = new ItemFixture();
		$this->record = array('Item' => $fixture->records[0]);
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
		unset($this->Item);
		ClassRegistry::flush();
	}

/**
 * Test adding a Item 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['Item']['id']);
		$result = $this->Item->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['Item']['id']);
			//unset($data['Item']['title']);
			$result = $this->Item->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Item 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->Item->edit('item-1', null);

		$expected = $this->Item->read(null, 'item-1');
		$this->assertEqual($result['Item'], $expected['Item']);

		// put invalidated data here
		$data = $this->record;
		//$data['Item']['title'] = null;

		$result = $this->Item->edit('item-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->Item->edit('item-1', $data);
		$this->assertTrue($result);

		$result = $this->Item->read(null, 'item-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['Item']['title'], $data['Item']['title']);

		try {
			$this->Item->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Item 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->Item->view('item-1');
		$this->assertTrue(isset($result['Item']));
		$this->assertEqual($result['Item']['id'], 'item-1');

		try {
			$result = $this->Item->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Item 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->Item->validateAndDelete('invalidItemId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Item');
		}
		try {
			$postData = array(
				'Item' => array(
					'confirm' => 0));
			$result = $this->Item->validateAndDelete('item-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Item');
		}

		$postData = array(
			'Item' => array(
				'confirm' => 1));
		$result = $this->Item->validateAndDelete('item-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>