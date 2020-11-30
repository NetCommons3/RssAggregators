<?php

/**
 * RssAggregatorsFeed Test Case
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Wataru Nishimoto <watura@willbooster.com>
 * @author Kazunori Sakamoto <exkazuu@willbooster.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('RssAggregatorsFeed', 'RssAggregators.Model');

/**
 * Summary for RssAggregatorsFeed Test Case
 */
class RssAggregatorsFeedTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rss_aggregators.rss_aggregators_feed',
		'plugin.rss_aggregators.rss_aggregators_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RssAggregatorsFeed = ClassRegistry::init('RssAggregators.RssAggregatorsFeed');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RssAggregatorsFeed);

		parent::tearDown();
	}

/**
 * testUpdateRssAggregatorsFeedsIfNeeded method
 *
 * @return void
 */
	public function testUpdateRssAggregatorsFeedsIfNeeded() {
	}

/**
 * testUpdateRssAggregatorsFeed method
 *
 * @return void
 */
	public function testUpdateRssAggregatorsFeed() {
	}
}
