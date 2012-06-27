<?php
App::uses('SongsConcert', 'Model');

/**
 * SongsConcert Test Case
 *
 */
class SongsConcertTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.songs_concert', 'app.song', 'app.artist', 'app.user', 'app.concert', 'app.group', 'app.users_group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SongsConcert = ClassRegistry::init('SongsConcert');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SongsConcert);

		parent::tearDown();
	}

}
