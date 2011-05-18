<?php
/* InventoryItem Test cases generated on: 2011-05-18 20:05:55 : 1305749335*/
App::import('Model', 'Inventory.InventoryItem');

App::import('Lib', 'Templates.AppTestCase');
class InventoryItemTestCase extends AppTestCase {
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
		$this->InventoryItem = AppMock::getTestModel('InventoryItem');
		$fixture = new InventoryItemFixture();
		$this->record = array('InventoryItem' => $fixture->records[0]);
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
		unset($this->InventoryItem);
		ClassRegistry::flush();
	}

/**
 * Test adding a Inventory Item 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['InventoryItem']['id']);
		$result = $this->InventoryItem->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['InventoryItem']['id']);
			//unset($data['InventoryItem']['title']);
			$result = $this->InventoryItem->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Inventory Item 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->InventoryItem->edit('inventoryitem-1', null);

		$expected = $this->InventoryItem->read(null, 'inventoryitem-1');
		$this->assertEqual($result['InventoryItem'], $expected['InventoryItem']);

		// put invalidated data here
		$data = $this->record;
		//$data['InventoryItem']['title'] = null;

		$result = $this->InventoryItem->edit('inventoryitem-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->InventoryItem->edit('inventoryitem-1', $data);
		$this->assertTrue($result);

		$result = $this->InventoryItem->read(null, 'inventoryitem-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['InventoryItem']['title'], $data['InventoryItem']['title']);

		try {
			$this->InventoryItem->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Inventory Item 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->InventoryItem->view('inventoryitem-1');
		$this->assertTrue(isset($result['InventoryItem']));
		$this->assertEqual($result['InventoryItem']['id'], 'inventoryitem-1');

		try {
			$result = $this->InventoryItem->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Inventory Item 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->InventoryItem->validateAndDelete('invalidInventoryItemId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Inventory Item');
		}
		try {
			$postData = array(
				'InventoryItem' => array(
					'confirm' => 0));
			$result = $this->InventoryItem->validateAndDelete('inventoryitem-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Inventory Item');
		}

		$postData = array(
			'InventoryItem' => array(
				'confirm' => 1));
		$result = $this->InventoryItem->validateAndDelete('inventoryitem-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>