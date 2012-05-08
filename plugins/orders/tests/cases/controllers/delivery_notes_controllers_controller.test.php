<?php
/* DeliveryNotesControllers Test cases generated on: 2012-05-06 16:05:53 : 1336320473*/
App::import('Controller', 'Orders.DeliveryNotesControllers');

App::import('Lib', 'Templates.AppTestCase');
class DeliveryNotesControllersControllerTestCase extends AppTestCase {
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
		$this->DeliveryNotesControllers = AppMock::getTestController('DeliveryNotesControllersController');
		$this->DeliveryNotesControllers->constructClasses();
		$this->DeliveryNotesControllers->params = array(
			'named' => array(),
			'pass' => array(),
			'url' => array());
		$fixture = new DeliveryNotesControllerFixture();
		$this->record = array('DeliveryNotesController' => $fixture->records[0]);
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
		unset($this->DeliveryNotesControllers);
		ClassRegistry::flush();
	}

/**
 * Convenience method to assert Flash messages
 *
 * @return void
 * @access public
 */
	public function assertFlash($message) {
		$flash = $this->DeliveryNotesControllers->Session->read('Message.flash');
		$this->assertEqual($flash['message'], $message);
		$this->DeliveryNotesControllers->Session->delete('Message.flash');
	}

/**
 * Test object instances
 *
 * @return void
 * @access public
 */
	/*public function testInstance() {
		$this->assertIsA($this->DeliveryNotesControllers, 'DeliveryNotesControllersController');
		//$this->assertIsA($this->DeliveryNotesControllers-><pre class="cake-debug"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr1-trace').style.display = (document.getElementById('cakeErr1-trace').style.display == 'none' ? '' : 'none');"><b>Notice</b> (8)</a>: Undefined variable: currentModelName [<b>APP/plugins/templates/vendors/shells/templates/cakedc/classes/test.ctp</b>, line <b>157</b>]<div id="cakeErr1-trace" class="cake-stack-trace" style="display: none;"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr1-code').style.display = (document.getElementById('cakeErr1-code').style.display == 'none' ? '' : 'none')">Code</a> | <a href="javascript:void(0);" onclick="document.getElementById('cakeErr1-context').style.display = (document.getElementById('cakeErr1-context').style.display == 'none' ? '' : 'none')">Context</a><div id="cakeErr1-code" class="cake-code-dump" style="display: none;"><pre><code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;public&nbsp;function&nbsp;testInstance()&nbsp;{</span></code>
<code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$this-&gt;assertIsA($this-&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$className&nbsp;?&gt;</span>,&nbsp;'<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$fullClassName</span><span style="color: #007700">;&nbsp;</span><span style="color: #0000BB">?&gt;</span>');</span></code>
<span class="code-highlight"><code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//$this-&gt;assertIsA($this-&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$className&nbsp;?&gt;</span>-&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$currentModelName&nbsp;?&gt;</span>,&nbsp;'<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$currentModelName&nbsp;?&gt;</span>');</span></code></span></pre></div><pre id="cakeErr1-context" class="cake-context" style="display: none;">$directory	=	"classes"
$filename	=	"test"
$vars	=	null
$themePath	=	"/Users/ajibarra/work/Sites/gemaquin/plugins/templates/vendors/shells/templates/cakedc/"
$templateFile	=	"/Users/ajibarra/work/Sites/gemaquin/plugins/templates/vendors/shells/templates/cakedc/classes/test.ctp"
$className	=	"DeliveryNotesControllers"
$methods	=	array()
$type	=	"Controller"
$fullClassName	=	"DeliveryNotesControllersController"
$mock	=	true
$construction	=	"new TestDeliveryNotesControllersController();
		$this-&gt;DeliveryNotesControllers-&gt;constructClasses();
"
$plugin	=	"Orders."
$fixtures	=	array()
$controllerName	=	"DeliveryNotesControllers"
$actions	=	"scaffold"
$helpers	=	null
$components	=	null
$isScaffold	=	true
$this	=	TemplateTask
TemplateTask::$templateVars = array
TemplateTask::$templatePaths = array
TemplateTask::$Dispatch = ShellDispatcher object
TemplateTask::$interactive = true
TemplateTask::$DbConfig = NULL
TemplateTask::$params = array
TemplateTask::$args = array
TemplateTask::$shell = "bake"
TemplateTask::$className = NULL
TemplateTask::$command = "controller"
TemplateTask::$name = "TemplateTask"
TemplateTask::$alias = "TemplateTask"
TemplateTask::$tasks = array
TemplateTask::$taskNames = array
TemplateTask::$uses = array
$slugged	=	false
$useAppTestCase	=	true
$parentSlugged	=	false
$additionalParams	=	""
$parentIncluded	=	false
$userIncluded	=	false
$implementedMethods	=	array()
$Subtemplate	=	Subtemplate
Subtemplate::$templateVars = array
Subtemplate::$subTemplatePaths = array
Subtemplate::$Dispatch = ShellDispatcher object
Subtemplate::$interactive = true
Subtemplate::$DbConfig = NULL
Subtemplate::$params = array
Subtemplate::$args = array
Subtemplate::$shell = "bake"
Subtemplate::$className = NULL
Subtemplate::$command = "controller"
Subtemplate::$name = "Subtemplate"
Subtemplate::$alias = "Subtemplate"
Subtemplate::$tasks = array
Subtemplate::$taskNames = array
Subtemplate::$uses = array
Subtemplate::$Template = TemplateTask object
$name	=	"DeliveryNotesControllers"
$controllerVaribleName	=	"deliveryNotesControllers"
$modelName	=	"DeliveryNotesController"
$modelVariableName	=	"deliveryNotesController"
$singularHumanName	=	"Delivery Notes Controller"
$_className	=	"DeliveryNotesControllers"
$localConstruction	=	"AppMock::getTestController(&#039;DeliveryNotesControllersController&#039;);
		$this-&gt;DeliveryNotesControllers-&gt;constructClasses();
"</pre><pre class="stack-trace">include - APP/plugins/templates/vendors/shells/templates/cakedc/classes/test.ctp, line 157
TemplateTask::generate() - CORE/cake/console/libs/tasks/template.php, line 144
TestTask::bake() - CORE/cake/console/libs/tasks/test.php, line 142
ControllerTask::bakeTest() - CORE/cake/console/libs/tasks/controller.php, line 337
ControllerTask::execute() - CORE/cake/console/libs/tasks/controller.php, line 97
ShellDispatcher::dispatch() - CORE/cake/console/cake.php, line 361
ShellDispatcher::ShellDispatcher() - CORE/cake/console/cake.php, line 139
[main] - CORE/cake/console/cake.php, line 666</pre></div></pre>, '');
	}



	*/
}
?>