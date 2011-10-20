<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 */
class AppController extends Controller {

/**
 * Components
 *
 * @var array
 * @access public
 */
	public $components = array('Auth', 'RequestHandler', 'Session', 'Cookie');

/**
 * Helpers
 *
 * @var array
 * @access public
 */
	public $helpers = array('Session', 'Html', 'AutoJavascript', 'Js', 'Time', 'Number');

/**
 * Object constructor - Adds the Debugkit panel if in development mode
 *
 */
	public function __construct() {
		if (Configure::read('debug')) {
			$this->components[] = 'DebugKit.Toolbar';
		}
		parent::__construct();
	}

/**
 * Before filter callback
 *
 * @return void
 * @access public
 */
	public function beforeFilter() {
		$this->_setupAuth();
		$this->_beforeFilterAuth();
	}

/**
 * Setup Authentication
 *
 * @return void
 * @access protected
 */
	protected function _setupAuth() {
		$this->Auth->authorize = 'controller';
		$this->Auth->fields = array('username' => 'email', 'password' => 'passwd');
		$this->Auth->loginAction = array('plugin' => 'users', 'admin' => false, 'controller' => 'users', 'action' => 'login');
		$this->Auth->loginRedirect = '/';
		$this->Auth->logoutRedirect = '/';
		$this->Auth->authError = __('Sorry, but you need to be logged in to access this location.', true);
		$this->Auth->loginError = __('Invalid credentials. Please try again or create an account.', true);
		$this->Auth->autoRedirect = false;
		$this->Auth->userModel = 'User';
		$this->Auth->authenticate = null;
		$this->Auth->sessionKey = 'Auth.User';
		$this->Auth->userScope = array(
			'User.email_authenticated' => 1,
			'User.active' => 1
		);
	}

/**
 * beforeFilterAuth
 *
 * @access public
 * @return void
 */
	protected function _beforeFilterAuth() {
		$this->Cookie->domain = env('HTTP_BASE');
		$this->Cookie->name = 'rememberMe';
		$cookie = $this->Cookie->read('User');

		if (!empty($cookie) && !$this->Auth->user()) {
			$data['User'][$this->Auth->fields['username']] = $cookie[$this->Auth->fields['username']];
			$data['User'][$this->Auth->fields['password']] = $cookie[$this->Auth->fields['password']];
			$this->Auth->login($data);
		}
	}

/**
 * isAuthorized Auth callback
 *
 * @return boolean Whether the user is authorized to access the current page or not
 * @access public
 */
	public function isAuthorized() {
		$authorized = true;
		return $authorized;
	}

/**
 * Before render callback
 *
 * @return void
 * @access public
 */
	public function beforeRender() {
		$userData = $this->Auth->user();
		$this->set('userData', $userData);
	}

/**
 * Returns true if the action was called with requestAction()
 *
 * @return boolean
 * @access public
 */
	public function isRequestedAction() {
		return array_key_exists('requested', $this->params);
	}


/**
 * Renders the json view if the request is preferred as json. Otherwise operats as a normal redirect
 *
 * @param mixed $url A string or array-based URL pointing to another location within the app,
 *     or an absolute URL
 * @param integer $status Optional HTTP status code (eg: 404)
 * @param boolean $exit If true, exit() will be called after the redirect
 * @return mixed void if $exit = false. Terminates script if $exit = true
 * @access public
 */
	function redirect($url, $status = null, $exit = true) {
		if (!empty($this->params['url']['ext']) && $this->params['url']['ext'] == 'json') {
			$this->set('redirectUrl', $url);
			echo $this->render();
			$exit && $this->_stop();
		}
		parent::redirect($url, $status, $exit);
	}
}

