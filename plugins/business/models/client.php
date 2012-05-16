<?php

App::import('Model', 'Business.Organization');

class Client extends Organization {

	public $actsAs = array('Utils.Inheritable');

	public function validateAndDelete($id = null, $data = array()) {
		$client = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($client)) {
			throw new OutOfBoundsException(__('Invalid Client', true));
		}

		$this->data['client'] = $client;
		if (!empty($data)) {
			$data['Client']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['Client']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Client', true));
		}
	}
	
	public function getClientDebt($id){
		$client = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));
		$debt = $client[$this->alias]['actual_debt'];
		return $debt;
	}
	
	public function setClientDebt($id, $total){
		$client = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));
		$new_debt = $client[$this->alias]['actual_debt'] + $total;
		$this->id = $id;
		$this->saveField('actual_debt', $new_debt);
	}
}

