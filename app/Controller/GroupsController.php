<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {

public $components = array('Email');
public $uses = array('Group','UsersGroup');

/**
 * add method
 *
 * @return void
 */
	public function create_group() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('Grupo guardado'),'default', array(), 'success');
				$this->redirect("/users/profile");
			} else {
				$this->Session->setFlash(__('No se ha podido guardar. Intentalo de nuevo'),'default', array(), 'error');
			}
		}
		$users = $this->Group->User->find('list');
		$this->set(compact('users'));
	}

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		}
		$users = $this->Group->User->find('list');
		$this->set(compact('users'));
	}*/

/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}*/

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}*/

	public function manage_group($id = null) {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	/*public function edit($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Group->read(null, $id);
		}
		$users = $this->Group->User->find('list');
		$this->set(compact('users'));
	}*/

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Gropo eliminado'));
			$this->redirect("/groups/manage_group");
		}
		$this->Session->setFlash(__('Group was not deleted'));
	}


	public function search_user($groupId = null){
		if($this->request->data) {
			$this->loadModel('User');
			$user = $this->User->find('first',array('conditions'=> array('User.email =' => $this->request->data['User']['email'])));
			if(!empty($user)){
				$this->User->id = $user['User']['id'];
				$group['UsersGroup']['user_id'] = $user['User']['id'];
				$group['UsersGroup']['group_id'] = $this->request->data['User']['groupid'];
				$this->UsersGroup->save($group);
				$this->Session->setFlash(__('Se ha añadido correctamente!'), 'default', array(),'success');
			
			} else {
				$email = $this->request->data['User']['email'];
				$this->User->set($this->request->data);
				if($this->User->validates(array('fieldlist'=>array('email')))){
					$this->_sendGroupRequest($email);
					$this->Session->setFlash(__('Se ha mandado un correo al usuario'), 'default', array(),'success');
				}else{
					$this->Session->setFlash(__('No se ha podido mandar un correo'), 'default', array(),'error');
				}	
			}
	  	}
	  	$this->set('groupid',$groupId);
	}

	private function _sendGroupRequest($email){
		//var_dump($email);
	    $this->Email->to = $email;
	    $this->Email->subject = 'Invitación al grupo de Coctelsong';
	    $this->Email->from = 'Coctelsong <no-reply@coctelsong.com>';
	    $this->Email->template = 'invitation';
	    $this->Email->sendAs = 'both';
	    $this->Email->send();
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		}
		$users = $this->Group->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Group->read(null, $id);
		}
		$users = $this->Group->User->find('list');
		$this->set(compact('users'));
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
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Group deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Group was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
