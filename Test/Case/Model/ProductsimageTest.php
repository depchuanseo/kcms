<?php
App::uses('Productsimage', 'Model');

/**
 * Productsimage Test Case
 *
 */
class ProductsimageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.productsimage'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Productsimage = ClassRegistry::init('Productsimage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Productsimage);

		parent::tearDown();
	}

}
