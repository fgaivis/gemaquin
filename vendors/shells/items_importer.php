<?php

class ItemsImporterShell extends Shell {

	public function main() {
		$this->providers();
		$this->items();
		$this->out('Todo pepito brother!');
	}
	
	public function providers() {
		$Provider = ClassRegistry::init('Business.Provider');
		$Provider->Behaviors->attach('Utils.CsvImport', array('delimiter' => ','));
		$Provider->importCSV(CONFIGS . 'providers_v2.csv');
	}

	public function items() {
		$Item = ClassRegistry::init('Catalog.Item');
		$Item->Behaviors->attach('Utils.CsvImport', array('delimiter' => ','));
		$Item->validate = array();
		$Item->importCSV(CONFIGS . 'items_v2.csv');
	}
}