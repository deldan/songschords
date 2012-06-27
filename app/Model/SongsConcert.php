<?php
App::uses('AppModel', 'Model');
/**
 * SongsConcert Model
 *
 * @property Song $Song
 * @property Concert $Concert
 */
class SongsConcert extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Song' => array(
			'className' => 'Song',
			'foreignKey' => 'song_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Concert' => array(
			'className' => 'Concert',
			'foreignKey' => 'concert_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
