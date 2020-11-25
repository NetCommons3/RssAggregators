<?php
/**
 * RssAggregatorsItem Test Case
 *
* @author Noriko Arai <arai@nii.ac.jp>
* @author Your Name <yourname@domain.com>
* @link http://www.netcommons.org NetCommons Project
* @license http://www.netcommons.org/license.txt NetCommons License
* @copyright Copyright 2014, NetCommons Project
 */

App::uses('RssAggregatorsItem', 'RssAggregators.Model');

/**
 * Summary for RssAggregatorsItem Test Case
 */
class RssAggregatorsItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rss_aggregators.rss_aggregators_item',
		'plugin.rss_aggregators.rss_aggregators_feed'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RssAggregatorsItem = ClassRegistry::init('RssAggregators.RssAggregatorsItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RssAggregatorsItem);

		parent::tearDown();
	}

}
