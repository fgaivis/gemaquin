<?php
/**
 * Copyright 2010, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::import('Controller', 'Users.Users');

/**
 * Users Users Controller
 *
 * @package users
 * @subpackage users.controllers
 */
class AppUsersController extends UsersController {

/**
 * Shows a users profile
 *
 * @param string $slug User Slug
 * @return void
 */
	public function view($slug = null) {
		try {
			//TODO
			//Esta linea se cambio para que funcionara el cambio de password como administrador
			//$this->set('user', $this->User->view($slug));
			$this->data = $this->User->read(null, $slug);
		} catch (Exception $e) {
			$this->Session->setFlash($e->getMessage());
			$this->redirect('/');
		}
	}

/**
 * Search
 *
 * @return void
 */
	public function search() {
		$searchTerm = '';
		$this->Prg->commonProcess($this->modelClass, $this->modelClass, 'search', false);
		
		//TODO Se agrega la variable $by para cuando esta vacio
		$by = '';
		if (!empty($this->params['named']['search'])) {
			$searchTerm = $this->params['named']['search'];
			$by = 'any';
		}
		if (!empty($this->params['named']['username'])) {
			$searchTerm = $this->params['named']['username'];
			$by = 'username';
		}
		if (!empty($this->params['named']['email'])) {
			$searchTerm = $this->params['named']['email'];
			$by = 'email';
		}
		$this->data[$this->modelClass]['search'] = $searchTerm;

		$this->paginate = array(
			'search',
			'limit' => 12,
			'by' => $by,
			'search' => $searchTerm,
			'conditions' => array(
					'AND' => array(
						$this->modelClass . '.active' => 1,
						$this->modelClass . '.email_authenticated' => 1)));

		$this->set('users', $this->paginate($this->modelClass));
		$this->set('searchTerm', $searchTerm);
	}

}
