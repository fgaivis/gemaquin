<?php

App::import('Model', 'Business.Organization');

class Provider extends Organization {

	public $actsAs = array('Utils.Inheritable');
}