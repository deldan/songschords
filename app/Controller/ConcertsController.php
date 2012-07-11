<?php
App::uses('AppController', 'Controller');
/**
 * Concerts Controller
 *
 * @property Concert $Concert
 */
class ConcertsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	/*public function index() {
		$this->Concert->recursive = 0;
		$this->set('concerts', $this->paginate());
	}*/

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		$this->Concert->id = $id;
		if (!$this->Concert->exists()) {
			throw new NotFoundException(__('Invalid concert'));
		}
		$this->set('concert', $this->Concert->read(null, $id));
	}*/

/**
 * add method
 *
 * @return void
 */
	/*public function add() {
		if ($this->request->is('post')) {
			$this->Concert->create();
			if ($this->Concert->save($this->request->data)) {
				$this->Session->setFlash(__('The concert has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concert could not be saved. Please, try again.'));
			}
		}
		$groups = $this->Concert->Group->find('list');
		$songs = $this->Concert->Song->find('list');
		$this->set(compact('groups', 'songs'));
	}*/

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	/*public function edit($id = null) {
		$this->Concert->id = $id;
		if (!$this->Concert->exists()) {
			throw new NotFoundException(__('Invalid concert'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Concert->save($this->request->data)) {
				$this->Session->setFlash(__('The concert has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concert could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Concert->read(null, $id);
		}
		$groups = $this->Concert->Group->find('list');
		$songs = $this->Concert->Song->find('list');
		$this->set(compact('groups', 'songs'));
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
		$this->Concert->id = $id;
		if (!$this->Concert->exists()) {
			throw new NotFoundException(__('Invalid concert'));
		}
		if ($this->Concert->delete()) {
			$this->Session->setFlash(__('Concert deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Concert was not deleted'));
		$this->redirect(array('action' => 'index'));
	}*/
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Concert->recursive = 0;
		$this->set('concerts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Concert->id = $id;
		if (!$this->Concert->exists()) {
			throw new NotFoundException(__('Invalid concert'));
		}
		$this->set('concert', $this->Concert->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Concert->create();
			if ($this->Concert->save($this->request->data)) {
				$this->Session->setFlash(__('The concert has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concert could not be saved. Please, try again.'));
			}
		}
		$groups = $this->Concert->Group->find('list');
		$songs = $this->Concert->Song->find('list');
		$this->set(compact('groups', 'songs'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Concert->id = $id;
		if (!$this->Concert->exists()) {
			throw new NotFoundException(__('Invalid concert'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Concert->save($this->request->data)) {
				$this->Session->setFlash(__('The concert has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The concert could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Concert->read(null, $id);
		}
		$groups = $this->Concert->Group->find('list');
		$songs = $this->Concert->Song->find('list');
		$this->set(compact('groups', 'songs'));
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
		$this->Concert->id = $id;
		if (!$this->Concert->exists()) {
			throw new NotFoundException(__('Invalid concert'));
		}
		if ($this->Concert->delete()) {
			$this->Session->setFlash(__('Concert deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Concert was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
