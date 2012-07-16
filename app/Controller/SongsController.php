<?php
App::uses('AppController', 'Controller');
/**
 * Songs Controller
 *
 * @property Song $Song
 */
class SongsController extends AppController {

    private $type = 'sharps';
    private $notes = array(
            'scale' => array(
              'C'  => 1,
              'C#' => 2,
              'Db' => 2,
              'D'  => 3,
              'D#' => 4,
              'Eb' => 4,
              'E'  => 5,
              'Fb' => 5,
              'F'  => 6,
              'F#' => 7,
              'Gb' => 7,
              'G'  => 8,
              'G#' => 9,
              'Ab' => 9,
              'A'  => 10,
              'A#' => 11,
              'Bb' => 11,
              'B'  => 12,
              'Cb' => 12
            ),
		      'flats'  => array(1 => 'C', 'Db', 'D', 'Eb', 'E', 'F', 'Gb', 'G', 'Ab', 'A', 'Bb', 'B'),
		      'sharps' => array(1 => 'C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B')
   );

	private $search = '`([ABCDEFG][b#]?(?=\s(?![a-zH-Z])|(?=(2|5|6|7|9|11|13|6\/9|7\-5|7\-9|7\#5|7\#9|7‌​\+5|7\+9|7b5|7b9|7sus2|7sus4|add2|add4|add9|aug|dim|dim7|m\|maj7|m6|m7|m7b5|m9|m1‌​1|m13|maj7|maj9|maj11|maj13|mb5|m|sus|sus2|sus4|\))(?=(\s|\/)))|(?=(\/|\.|-|\(|\)))))`';
	private $search2 = '`([ABCDEFG][b#]?[m]?[\(]?(2|5|6|7|9|11|13|6\/9|7\-5|7\-9|7\#5|7\#9|7\+5|7\+9|7b5|7b9|7sus2|7sus4|add2|add4|add9|aug|dim|dim7|m\|maj7|m6|m7|m7b5|m9|m11|m13|maj7|maj9|maj11|maj13|mb5|m|sus|sus2|sus4)?(\))?)(?=\s|\.|\)|-|\/)`';  
	private $formattedChords = array();
	private $replacementChords = array();
	private $song;

	public function addSong() {
		if ($this->request->is('post')) {
			$this->Song->create();
			$this->request->data['Song']['user_id'] = $this->Auth->user('id');

			$this->request->data['Song']['song'] = $this->searchChords($this->request->data['Song']['song']);
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
     
    private function searchChords($song = null) {         
		
		$this->song = $song;        
	    preg_match_all($this->search, $this->song, $song_chords);

	    $u = array_unique($song_chords[0]);
	    foreach ($u as $chord){
	            if (strlen($chord) > 1  && ($chord{1} == "b" || $chord{1} == "#"))
	                    array_push($this->formattedChords,substr($chord,0, 2));
	            else
	                    array_push($this->formattedChords,substr($chord,0, 1));
	    }
	    
	    foreach($this->formattedChords as &$note){
	            $note = "/\|".$note."\|/";
	    }
	    $this->song = preg_replace($this->formattedChords, $this->replacementChords, $this->song);
	    $html= preg_replace($this->search2,'<a>$1</a>',$this->song);

		return $html;
    }


	private function countNotes( $linea) {
    
    $count = 0;
    $nota = array ('C', ' D ', 'E', 'F', 'G', 'A', 'B', 'Do', 'Re', 'Mi', 'Fa', 'Sol', 'La', 'Si', 'Do'); 

	    foreach ($nota as $substring) {
	    	$count += substr_count( $linea, $substring);
	    }
			echo "<br>";
	    echo "Número de notas:";
	    echo $count;
		if ($count>"2"){
					echo "<br>";
					echo "Hay más notas";
				}else{
					echo "<br>";	
					echo "Hay más palabras";
				}

	}

	public function readSong(){
		
		$archivo = "archivo"; 
		$contenido = file_get_contents($archivo);
		$lineas = explode("\n",$contenido);
		foreach ($lineas as $linea) {

			$this->countNotes($linea);

			echo "<br>";	
			echo $linea."\n"; 
			echo "<br>";
			echo "Número de palabras :";
			echo str_word_count($linea, 0, '#');
			echo "<br>";
		}
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
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid song'));
		}
		$this->set('song', $this->Song->read(null, $id));
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
