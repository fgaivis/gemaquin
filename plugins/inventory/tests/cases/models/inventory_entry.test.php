<?php
/* InventoryEntry Test cases generated on: 2011-07-02 22:07:12 : 1309645452*/
App::import('Model', 'inventory.InventoryEntry');

App::import('Lib', 'Templates.AppTestCase');
class InventoryEntryTestCase extends AppTestCase {
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
		$this->InventoryEntry = AppMock::getTestModel('InventoryEntry');
		$fixture = new InventoryEntryFixture();
		$this->record = array('InventoryEntry' => $fixture->records[0]);
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
		unset($this->InventoryEntry);
		ClassRegistry::flush();
	}

/**
 * Test adding a Inventory Entry 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['InventoryEntry']['id']);
		$result = $this->InventoryEntry->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['InventoryEntry']['id']);
			//unset($data['InventoryEntry']['title']);
			$result = $this->InventoryEntry->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Inventory Entry 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->InventoryEntry->edit('inventoryentry-1', null);

		$expected = $this->InventoryEntry->read(null, 'inventoryentry-1');
		$this->assertEqual($result['InventoryEntry'], $expected['InventoryEntry']);

		// put invalidated data here
		$data = $this->record;
		//$data['InventoryEntry']['title'] = null;

		$result = $this->InventoryEntry->edit('inventoryentry-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->InventoryEntry->edit('inventoryentry-1', $data);
		$this->assertTrue($result);

		$result = $this->InventoryEntry->read(null, 'inventoryentry-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['InventoryEntry']['title'], $data['InventoryEntry']['title']);

		try {
			$this->InventoryEntry->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Inventory Entry 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->InventoryEntry->view('inventoryentry-1');
		$this->assertTrue(isset($result['InventoryEntry']));
		$this->assertEqual($result['InventoryEntry']['id'], 'inventoryentry-1');

		try {
			$result = $this->InventoryEntry->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Inventory Entry 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->InventoryEntry->validateAndDelete('invalidInventoryEntryId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Inventory Entry');
		}
		try {
			$postData = array(
				'InventoryEntry' => array(
					'confirm' => 0));
			$result = $this->InventoryEntry->validateAndDelete('inventoryentry-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Inventory Entry');
		}

		$postData = array(
			'InventoryEntry' => array(
				'confirm' => 1));
		$result = $this->InventoryEntry->validateAndDelete('inventoryentry-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>