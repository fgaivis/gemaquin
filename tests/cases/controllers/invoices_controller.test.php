<?php
/* Invoices Test cases generated on: 2011-07-16 13:07:15 : 1310839035*/
App::import('Controller', 'Invoices');

App::import('Lib', 'Templates.AppTestCase');
class InvoicesControllerTestCase extends AppTestCase {
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
		$this->Invoices = AppMock::getTestController('InvoicesController');
		$this->Invoices->constructClasses();
		$this->Invoices->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new InvoiceFixture();
		$this->record = array('Invoice' => $fixture->records[0]);
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
		unset($this->Invoices);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->Invoices->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->Invoices->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	public function testInstance() {
		$this->assertIsA($this->Invoices, 'InvoicesController');
		//$this->assertIsA($this->Invoices->Invoice, 'Invoice');
	}


/**
 * testIndex
 *
 * @return void
 * @access public
 */
	public function testIndex() {
		$this->Invoices->index();
		$this->assertTrue(!empty($this->Invoices->viewVars['invoices']));
	}

/**
 * testAdd
 *
 * @return void
 * @access public
 */
	public function testAdd() {
		$this->Invoices->data = $this->record;
		unset($this->Invoices->data['Invoice']['id']);
		$this->Invoices->add();
		$this->Invoices->expectRedirect(array('action' => 'index'));
		$this->assertFlash('The invoice has been saved');
		$this->Invoices->expectExactRedirectCount();
	}

/**
 * testEdit
 *
 * @return void
 * @access public
 */
	public function testEdit() {
		$this->Invoices->edit('invoice-1');
		$this->assertEqual($this->Invoices->data['Invoice'], $this->record['Invoice']);

		$this->Invoices->data = $this->record;
		$this->Invoices->edit('invoice-1');
		$this->Invoices->expectRedirect(array('action' => 'view', 1));
		$this->assertFlash('Invoice saved');
		$this->Invoices->expectExactRedirectCount();
	}

/**
 * testView
 *
 * @return void
 * @access public
 */
	public function testView() {
		$this->Invoices->view('invoice-1');
		$this->assertTrue(!empty($this->Invoices->viewVars['invoice']));

		$this->Invoices->view('WRONG-ID');
		$this->Invoices->expectRedirect(array('action' => 'index'));
		$this->assertFlash('Invalid Invoice');
		$this->Invoices->expectExactRedirectCount();
	}

/**
 * testDelete
 *
 * @return void
 * @access public
 */
	public function testDelete() {
		$this->Invoices->delete('WRONG-ID');
		$this->Invoices->expectRedirect(array('action' => 'index'));
		$this->assertFlash('Invalid Invoice');

		$this->Invoices->delete('invoice-1');
		$this->assertTrue(!empty($this->Invoices->viewVars['invoice']));

		$this->Invoices->data = array('Invoice' => array('confirmed' => 1));
		$this->Invoices->delete('invoice-1');
		$this->Invoices->expectRedirect(array('action' => 'index'));
		$this->assertFlash('Invoice deleted');
		$this->Invoices->expectExactRedirectCount();
	}


	
}
?>