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


	public function searchSong() {
		Configure::write('debug', 0);

		$query = $this->params->query['query'];
		$names = $this->Song->find('all', array('conditions' => array('Song.title LIKE' => '%'.$query.'%'), 'fields' => array('Song.title')));

		foreach ($names as $name) {
		    $results[] = $name["Song"]["title"];
		}

		$response = array(
                 'suggestions' => $results,
                 'query'	   => $query,
                );
	    $this->layout = '';
	    $this->set('response', $response);
	}

	public function addSong($artistId = null,$artistName = null) {
		if ($this->request->is('post')) {
			$this->Song->create();
			$this->request->data['Song']['user_id'] = $this->Auth->user('id');

			$this->request->data['Song']['song'] = $this->Chords->searchChords($this->request->data['Song']['song']);

			$this->request->data['Song']['artist_id'] = $this->addArtist($this->request->data['Song']['name']);

			if ($this->Song->save($this->request->data)) {
				$this->Session->setFlash(__('The song has been saved'));
				$songId = $this->Song->getLastInsertID();
				$this->redirect('/cancion/confirm_song/'.$songId);
			} else {
				$this->Session->setFlash(__('The song could not be saved. Please, try again.'));
			}
		}
		$artists = $this->Song->Artist->find('list');
		$users = $this->Song->User->find('list');
		$concerts = $this->Song->Concert->find('list');
		$this->set(compact('artists', 'users', 'concerts'));
	}

	public function confirmSong($id = null) {
		$this->Song->recursive = 2;
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		$this->set('song', $this->Song->read(null, $id));
		$comentarios = $this->Song->Comment->find('all', array('conditions' => array('Comment.song_id' => $this->Song->id),
															   'order'      => array('Comment.id DESC')));
		$this->set('comentarios', $comentarios);
	}

	private function addArtist($nameArtist = null){
		$idArtist = null;
		$this->loadModel('Artist');
		$artist = $this->Artist->find('first',array('conditions'=> array('Artist.name =' => $this->request->data['Song']['name'])));

		if(!empty($artist)){
			$idArtist = $artist['Artist']['id'];
		} else {
			$artistAdd['Artist']['name'] = $nameArtist;

			$this->Artist->create();
			$this->Artist->save($artistAdd);
			$idArtist = $this->Artist->getLastInsertID();
		}
		return $idArtist;
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
		$comentarios = $this->Song->Comment->find('all', array('conditions' => array('Comment.song_id' => $this->Song->id),
															   'order'      => array('Comment.id DESC')));
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
	// public function add() {
	// 	if ($this->request->is('post')) {
	// 		$this->Song->create();
	// 		if ($this->Song->save($this->request->data)) {
	// 			$this->Session->setFlash(__('The song has been saved'));
	// 			$this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The song could not be saved. Please, try again.'));
	// 		}
	// 	}
	// 	$artists = $this->Song->Artist->find('list');
	// 	$users = $this->Song->User->find('list');
	// 	$concerts = $this->Song->Concert->find('list');
	// 	$this->set(compact('artists', 'users', 'concerts'));
	// }

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

				$this->request->data['Song']['song'] = $this->Chords->searchChords($this->request->data['Song']['song']);

				if ($this->Song->save($this->request->data)) {
				$this->Session->setFlash(__('The song has been saved'));
				$this->redirect('/users/profile/');
			} else {
				$this->Session->setFlash(__('The song could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Song->read(null, $id);
			$cadena_a_renombrar = array("<a>", "</a>");
			$cancion_sin_formato = str_replace($cadena_a_renombrar, "", $this->Song->data['Song']['song']);
			$this->set('song', $cancion_sin_formato);
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
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		if ($this->Song->delete()) {
			$this->Session->setFlash(__('Song deleted'));
			$this->redirect('/users/profile/');
		}
		$this->Session->setFlash(__('Song was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
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
