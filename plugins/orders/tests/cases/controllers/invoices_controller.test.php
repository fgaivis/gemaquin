<?php
/* Invoices Test cases generated on: 2011-07-16 12:07:29 : 1310836109*/
App::import('Controller', 'orders.Invoices');

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
		//$this->assertIsA($this->Invoices->
/*Notice: Undefined variable: currentModelName in /home/ajibarra/work/www/htdocs/gemaquin/plugins/templates/vendors/shells/templates/cakedc/classes/test.ctp on line 157

Call Stack:
    0.0013     517988   1. {main}() /home/ajibarra/work/www/htdocs/cakephp/cake/console/cake.php:0
    0.0013     518984   2. ShellDispatcher->ShellDispatcher() /home/ajibarra/work/www/htdocs/cakephp/cake/console/cake.php:666
    0.0219    2518392   3. ShellDispatcher->dispatch() /home/ajibarra/work/www/htdocs/cakephp/cake/console/cake.php:139
    0.0493    4890452   4. ControllerTask->execute() /home/ajibarra/work/www/htdocs/cakephp/cake/console/cake.php:361
    1.0177    5701380   5. ControllerTask->bakeTest() /home/ajibarra/work/www/htdocs/cakephp/cake/console/libs/tasks/controller.php:97
    1.0177    5701460   6. TestTask->bake() /home/ajibarra/work/www/htdocs/cakephp/cake/console/libs/tasks/controller.php:337
    1.0193    5756740   7. TemplateTask->generate() /home/ajibarra/work/www/htdocs/cakephp/cake/console/libs/tasks/test.php:142
    1.0203    5852388   8. include('/home/ajibarra/work/www/htdocs/gemaquin/plugins/templates/vendors/shells/templates/cakedc/classes/test.ctp') /home/ajibarra/work/www/htdocs/cakephp/cake/console/libs/tasks/template.php:144

, '
Notice: Undefined variable: currentModelName in /home/ajibarra/work/www/htdocs/gemaquin/plugins/templates/vendors/shells/templates/cakedc/classes/test.ctp on line 157

Call Stack:
    0.0013     517988   1. {main}() /home/ajibarra/work/www/htdocs/cakephp/cake/console/cake.php:0
    0.0013     518984   2. ShellDispatcher->ShellDispatcher() /home/ajibarra/work/www/htdocs/cakephp/cake/console/cake.php:666
    0.0219    2518392   3. ShellDispatcher->dispatch() /home/ajibarra/work/www/htdocs/cakephp/cake/console/cake.php:139
    0.0493    4890452   4. ControllerTask->execute() /home/ajibarra/work/www/htdocs/cakephp/cake/console/cake.php:361
    1.0177    5701380   5. ControllerTask->bakeTest() /home/ajibarra/work/www/htdocs/cakephp/cake/console/libs/tasks/controller.php:97
    1.0177    5701460   6. TestTask->bake() /home/ajibarra/work/www/htdocs/cakephp/cake/console/libs/tasks/controller.php:337
    1.0193    5756740   7. TemplateTask->generate() /home/ajibarra/work/www/htdocs/cakephp/cake/console/libs/tasks/test.php:142
    1.0203    5852388   8. include('/home/ajibarra/work/www/htdocs/gemaquin/plugins/templates/vendors/shells/templates/cakedc/classes/test.ctp') /home/ajibarra/work/www/htdocs/cakephp/cake/console/libs/tasks/template.php:144

');*/
	}



	
}
?>