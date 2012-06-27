<?php
App::uses('Concert', 'Model');

/**
 * Concert Test Case
 *
 */
class ConcertTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.concert', 'app.group', 'app.song', 'app.songs_concert');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Concert = ClassRegistry::init('Concert');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Concert);

		parent::tearDown();
	}

}
