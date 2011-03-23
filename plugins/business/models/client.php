<?php

App::import('Model', 'Business.Organization');

class Client extends Organization {

	public $actsAs = array('Utils.Inheritable');
}