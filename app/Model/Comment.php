<?php

class Comment extends AppModel {
   
    public $name = 'Comment';

    public $validate = array(
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Song' => array(
			'className' => 'Song',
			'foreignKey' => 'song_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}

?>