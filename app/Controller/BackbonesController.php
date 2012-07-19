<?php
App::uses('AppController', 'Controller');
/**
 * Songs Controller
 *
 * @property Song $Song
 */

class BackbonesController extends AppController {
	public $uses = array('Song');
	public $viewClass = 'Json';
	public $components = array('RequestHandler');
	public $name = 'Backbones';

	public function view($id = null) {
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

}
