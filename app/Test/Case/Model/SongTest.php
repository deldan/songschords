<?php
App::uses('Song', 'Model');

/**
 * Song Test Case
 *
 */
class SongTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.song', 'app.artist', 'app.user', 'app.concert', 'app.group', 'app.users_group', 'app.songs_concert');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Song = ClassRegistry::init('Song');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Song);

		parent::tearDown();
	}

}
