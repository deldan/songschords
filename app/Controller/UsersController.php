<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

	public $components = array('Password','Email');

	public function beforeFilter(){
	    parent::beforeFilter();
	    $allow = array('login' , 'register', 'resetUserPassword', 'profile');
	    if(Configure::read('debug') > 0) {
	      $allow[] = 'admin_register';
	    }
	    $this->Auth->allow($allow);
	    $this->Auth->autoRedirect = false;
	  }

/**
 * Register method
 *
 * @return void
 */
	public function register() {
		if ($this->request->is('post')) {
			if($this->request->data['User']['service'] == 0){
				$this->Session->setFlash('No ha aceptado los términos de servicio','default', array(), 'error');
				$this->redirect('/registro');
		    }
			if($this->request->data['User']['password'] != $this->request->data['User']['confirm_password']) {
		        $this->Session->setFlash('las contraseñas no coinciden','default', array(), 'error');
		        $this->redirect('/registro');
		    }
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'default', array(), 'success');
				$this->redirect('/login');
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array(),'error');
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	public function login() {
		if($this->request->data) {
			if($this->Auth->login()){
				return $this->redirect('/');
			} else {
				$this->Session->setFlash('Email o contraseña incorrecta', 'default', array(),'warning');
				$this->redirect('/login');
			}
	    }

	}

	public function resetUserPassword(){
		if($this->request->data) {
			$user = $this->User->find('first',array('conditions'=> array('User.email =' => $this->request->data['User']['email'])));
			if(!empty($user)){
				$newpass = $this->Password->generatePassword();
				$this->User->id = $user['User']['id'];
				if($this->User->saveField('password', $newpass)){
				  $this->_sendPasswordMail($user,$newpass);
				  $this->Session->setFlash(__('Tu Nueva contraseña a sido enviada a tu Email'), 'default', array(),'success');
				}
			} else {
				$message = "Email invalido";
				$this->Session->setFlash(__('Email invalido'), 'default', array(),'error');
			}
		}
  	}

	public function logout() {
		$this->Auth->logout();
		return $this->redirect('/');
	}

	public function profile($userid = null) {
		$istheuser = false;
		if($userid == null){
			$userid =$this->Auth->user('id');
			$istheuser = true;
		}
		$this->paginate = array(
                              'Song' => array(
                              	'conditions' => array('user_id' => $userid),
                                  'limit' => 10,
                                  'order' => array('date' => 'desc')
                                )
                              );
		$this->set('songs', $this->paginate('Song'));
		$this->set('istheuser', $istheuser);
	}
/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}*/

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}*/

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	/*public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}*/

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	/*public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}*/
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	private function _sendPasswordMail($user,$password){
	    $this->Email->to = $user['User']['email'];
	    $this->Email->subject = 'Recordatorio de contraseña';
	    $this->Email->from = 'Coctelsong <no-reply@coctelsong.com>';
	    $this->Email->template = 'remember_password';
	    $this->Email->sendAs = 'both';
	    $this->set('user', $user);
	    $this->set('password', $password);
	    $this->Email->send();
	 }
}
