<?php
/* Configurations Test cases generated on: 2012-04-18 21:28:32 : 1334800712*/
App::import('Controller', 'Business.Configurations');

class TestConfigurationsController extends ConfigurationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ConfigurationsControllerTestCase extends CakeTestCase {
	function startTest() {
		$this->Configurations =& new TestConfigurationsController();
		$this->Configurations->constructClasses();
	}

	function endTest() {
		unset($this->Configurations);
		ClassRegistry::flush();
	}

}
