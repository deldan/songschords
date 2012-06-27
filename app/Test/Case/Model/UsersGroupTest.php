<?php
App::uses('UsersGroup', 'Model');

/**
 * UsersGroup Test Case
 *
 */
class UsersGroupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.users_group', 'app.user', 'app.song', 'app.artist', 'app.concert', 'app.group', 'app.songs_concert');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsersGroup = ClassRegistry::init('UsersGroup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersGroup);

		parent::tearDown();
	}

}
