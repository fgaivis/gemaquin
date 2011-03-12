<?php
/* Contact Test cases generated on: 2011-03-05 21:03:37 : 1299376417*/
App::import('Model', 'business.Contact');

App::import('Lib', 'Templates.AppTestCase');
class ContactTestCase extends AppTestCase {
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
		$this->Contact = AppMock::getTestModel('Contact');
		$fixture = new ContactFixture();
		$this->record = array('Contact' => $fixture->records[0]);
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
		unset($this->Contact);
		ClassRegistry::flush();
	}

/**
 * Test adding a Contact 
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$data = $this->record;
		unset($data['Contact']['id']);
		$result = $this->Contact->add($data);
		$this->assertTrue($result);
		
		try {
			$data = $this->record;
			unset($data['Contact']['id']);
			//unset($data['Contact']['title']);
			$result = $this->Contact->add($data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
		
	}

/**
 * Test editing a Contact 
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$result = $this->Contact->edit('contact-1', null);

		$expected = $this->Contact->read(null, 'contact-1');
		$this->assertEqual($result['Contact'], $expected['Contact']);

		// put invalidated data here
		$data = $this->record;
		//$data['Contact']['title'] = null;

		$result = $this->Contact->edit('contact-1', $data);
		$this->assertEqual($result, $data);

		$data = $this->record;

		$result = $this->Contact->edit('contact-1', $data);
		$this->assertTrue($result);

		$result = $this->Contact->read(null, 'contact-1');

		// put record specific asserts here for example
		// $this->assertEqual($result['Contact']['title'], $data['Contact']['title']);

		try {
			$this->Contact->edit('wrong_id', $data);
			$this->fail('No exception');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test viewing a single Contact 
 *
 * @return void
 * @access public
 */
	public function testView() {
		$result = $this->Contact->view('contact-1');
		$this->assertTrue(isset($result['Contact']));
		$this->assertEqual($result['Contact']['id'], 'contact-1');

		try {
			$result = $this->Contact->view('wrong_id');
			$this->fail('No exception on wrong id');
		} catch (OutOfBoundsException $e) {
			$this->pass('Correct exception thrown');
		}
	}

/**
 * Test ValidateAndDelete method for a Contact 
 *
 * @return void
 * @access public
 */
	public function testValidateAndDelete() {
		try {
			$postData = array();
			$this->Contact->validateAndDelete('invalidContactId', $postData);
		} catch (OutOfBoundsException $e) {
			$this->assertEqual($e->getMessage(), 'Invalid Contact');
		}
		try {
			$postData = array(
				'Contact' => array(
					'confirm' => 0));
			$result = $this->Contact->validateAndDelete('contact-1', $postData);
		} catch (Exception $e) {
			$this->assertEqual($e->getMessage(), 'You need to confirm to delete this Contact');
		}

		$postData = array(
			'Contact' => array(
				'confirm' => 1));
		$result = $this->Contact->validateAndDelete('contact-1', $postData);
		$this->assertTrue($result);
	}
	
}
?>