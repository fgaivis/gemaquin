<?php

App::import('Model', 'Business.Organization');

class Provider extends Organization {

	public $actsAs = array('Utils.Inheritable');

    public function validateAndDelete($id = null, $data = array()) {
		$provider = $this->find('first', array(
			'conditions' => array(
				"{$this->alias}.{$this->primaryKey}" => $id,
				)));

		if (empty($provider)) {
			throw new OutOfBoundsException(__('Invalid Provider', true));
		}

		$this->data['provider'] = $provider;
		if (!empty($data)) {
			$data['Provider']['id'] = $id;
			$tmp = $this->validate;
			$this->validate = array(
				'id' => array('rule' => 'notEmpty'),
				'confirm' => array('rule' => '[1]'));

			$this->set($data);
			if ($this->validates()) {
				if ($this->delete($data['Provider']['id'])) {
					return true;
				}
			}
			$this->validate = $tmp;
			throw new Exception(__('You need to confirm to delete this Provider', true));
		}
	}
}

