<?php

class ImporterShell extends Shell {

	public function main() {
		$this->clients();
		$this->providers();
		$this->items();
	}

	public function clients() {
		$Client = ClassRegistry::init('Business.Client');
		$Client->Behaviors->attach('Utils.CsvImport', array('delimiter' => ','));
		$Client->importCSV(CONFIGS . 'clients.csv');
	}

	public function providers() {
		$Provider = ClassRegistry::init('Business.Provider');
		$Provider->Behaviors->attach('Utils.CsvImport', array('delimiter' => ','));
		$Provider->importCSV(CONFIGS . 'providers.csv');
	}

	public function items() {
		$Item = ClassRegistry::init('Catalog.Item');
		$Item->Behaviors->attach('Utils.CsvImport', array('delimiter' => ','));
		$Item->validate = array();
		$Item->importCSV(CONFIGS . 'items.csv');
	}
}