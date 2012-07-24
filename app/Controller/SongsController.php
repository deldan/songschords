<?php

App::uses('CakePdf', 'CakePdf.Pdf');
App::uses('AppController', 'Controller');
/**
 * Songs Controller
 *
 * @property Song $Song
 */

class SongsController extends AppController {

	public $components = array('Chords');
	public $pdfConfig = array('engine' => 'CakePdf.Tcpdf');

	public function addSong() {
		if ($this->request->is('post')) {
			$this->Song->create();
			$this->request->data['Song']['user_id'] = $this->Auth->user('id');

			$this->request->data['Song']['song'] = $this->Chords->searchChords($this->request->data['Song']['song']);
			if ($this->Song->save($this->request->data)) {
				$this->Session->setFlash(__('The song has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The song could not be saved. Please, try again.'));
			}
		}
		$artists = $this->Song->Artist->find('list');
		$users = $this->Song->User->find('list');
		$concerts = $this->Song->Concert->find('list');
		$this->set(compact('artists', 'users', 'concerts'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Song->recursive = 0;
		$this->set('songs', $this->paginate('Song'));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Song->recursive = 2;
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		$this->set('song', $this->Song->read(null, $id));	
		$comentarios = $this->Song->Comment->find('all', array('conditions' => array('Comment.song_id' => $this->Song->id),'order' => array('Comment.id DESC')));
		$this->set('comentarios', $comentarios);	
	}

	public function backbone($id = 1) {
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		$song = $this->Song->read(null, $id);
		$cancion['name'] = $song['Song']['title'];
		$cancion['song'] = $song['Song']['song'];
		$this->set('song', $cancion);
		$this->set('_serialize', 'song');
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Song->create();
			if ($this->Song->save($this->request->data)) {
				$this->Session->setFlash(__('The song has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The song could not be saved. Please, try again.'));
			}
		}
		$artists = $this->Song->Artist->find('list');
		$users = $this->Song->User->find('list');
		$concerts = $this->Song->Concert->find('list');
		$this->set(compact('artists', 'users', 'concerts'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Song->save($this->request->data)) {
				$this->Session->setFlash(__('The song has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The song could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Song->read(null, $id);
		}
		$artists = $this->Song->Artist->find('list');
		$users = $this->Song->User->find('list');
		$concerts = $this->Song->Concert->find('list');
		$this->set(compact('artists', 'users', 'concerts'));
	}

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
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		if ($this->Song->delete()) {
			$this->Session->setFlash(__('Song deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Song was not deleted'));
		$this->redirect(array('action' => 'index'));
	}*/
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Song->recursive = 0;
		$this->set('songs', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		$this->set('song', $this->Song->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Song->create();
			if ($this->Song->save($this->request->data)) {
				$this->Session->setFlash(__('The song has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The song could not be saved. Please, try again.'));
			}
		}
		$artists = $this->Song->Artist->find('list');
		$users = $this->Song->User->find('list');
		$concerts = $this->Song->Concert->find('list');
		$this->set(compact('artists', 'users', 'concerts'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Song->save($this->request->data)) {
				$this->Session->setFlash(__('The song has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The song could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Song->read(null, $id);
		}
		$artists = $this->Song->Artist->find('list');
		$users = $this->Song->User->find('list');
		$concerts = $this->Song->Concert->find('list');
		$this->set(compact('artists', 'users', 'concerts'));
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
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		if ($this->Song->delete()) {
			$this->Session->setFlash(__('Song deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Song was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
