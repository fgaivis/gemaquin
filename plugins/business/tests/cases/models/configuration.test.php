<?php
/* Configuration Test cases generated on: 2012-04-18 21:24:29 : 1334800469*/
App::import('Model', 'Business.Configuration');

class ConfigurationTestCase extends CakeTestCase {
	function startTest() {
		$this->Configuration =& ClassRegistry::init('Configuration');
	}

	function endTest() {
		unset($this->Configuration);
		ClassRegistry::flush();
	}

}
