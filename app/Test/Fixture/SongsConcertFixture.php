<?php
/**
 * SongsConcertFixture
 *
 */
class SongsConcertFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'song_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'concert_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1), 'song_id' => array('column' => 'song_id', 'unique' => 0), 'concert_id' => array('column' => 'concert_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'song_id' => 1,
			'concert_id' => 1
		),
	);
}
