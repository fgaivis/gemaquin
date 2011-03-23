<?php
/* Clients Test cases generated on: 2011-03-23 11:42:44 : 1300896764*/
App::import('Controller', 'business.Clients');

class TestClientsController extends ClientsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ClientsControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Clients =& new TestClientsController();
		$this->Clients->constructClasses();
	}

	function endTest() {
		unset($this->Clients);
		ClassRegistry::flush();
	}

}
?>