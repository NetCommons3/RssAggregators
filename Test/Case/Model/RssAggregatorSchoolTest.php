<?php
/**
 * RssAggregatorSchool Test Case
 *
* @author Noriko Arai <arai@nii.ac.jp>
* @author Your Name <yourname@domain.com>
* @link http://www.netcommons.org NetCommons Project
* @license http://www.netcommons.org/license.txt NetCommons License
* @copyright Copyright 2014, NetCommons Project
 */

App::uses('RssAggregatorSchool', 'RssAggregators.Model');

/**
 * Summary for RssAggregatorSchool Test Case
 */
class RssAggregatorSchoolTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rss_aggregators.rss_aggregator_school',
		'plugin.rss_aggregators.rss_aggregator_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RssAggregatorSchool = ClassRegistry::init('RssAggregators.RssAggregatorSchool');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RssAggregatorSchool);

		parent::tearDown();
	}

}
