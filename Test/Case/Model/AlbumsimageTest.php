<?php
App::uses('Albumsimage', 'Model');

/**
 * Albumsimage Test Case
 *
 */
class AlbumsimageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.albumsimage'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Albumsimage = ClassRegistry::init('Albumsimage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Albumsimage);

		parent::tearDown();
	}

}
