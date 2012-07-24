<?php
class CommentsController extends AppController {
    public $name = 'Comments';
    public $components = array('Session');

    public function index() {
        $this->set('comments', $this->Comment->find('all'));
    }

    public function view($id) {
        $this->Comment->id = $id;
        $this->set('comment', $this->Comment->read());

    }

    public function addComment() {
        if ($this->request->is('post')) {
            $this->request->data['Comment']['user_id'] = $this->Auth->user('id');
                if ($this->Comment->save($this->request->data)) {
                    $this->Session->setFlash('Your comment has been saved.');
                    $this->redirect('/cancion/'.$this->request->data['Comment']['song_id']);
                } else {
                    $this->Session->setFlash(__('The song could not be saved. Please, try again.'));
                }   
              
        }
    }
}