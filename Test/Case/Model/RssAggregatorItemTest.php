<?php
/**
 * RssAggregatorItem Test Case
 *
* @author Noriko Arai <arai@nii.ac.jp>
* @author Your Name <yourname@domain.com>
* @link http://www.netcommons.org NetCommons Project
* @license http://www.netcommons.org/license.txt NetCommons License
* @copyright Copyright 2014, NetCommons Project
 */

App::uses('RssAggregatorItem', 'RssAggregators.Model');

/**
 * Summary for RssAggregatorItem Test Case
 */
class RssAggregatorItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rss_aggregators.rss_aggregator_item',
		'plugin.rss_aggregators.rss_aggregator_school'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RssAggregatorItem = ClassRegistry::init('RssAggregators.RssAggregatorItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RssAggregatorItem);

		parent::tearDown();
	}

}
