<?php

/**
 * RssAggregatorsSchool Test Case
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Wataru Nishimoto <watura@willbooster.com>
 * @author Kazunori Sakamoto <exkazuu@willbooster.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('RssAggregatorsSchool', 'RssAggregators.Model');

/**
 * Summary for RssAggregatorsSchool Test Case
 */
class RssAggregatorsSchoolTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.rss_aggregators.rss_aggregators_school',
		'plugin.rss_aggregators.rss_aggregators_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RssAggregatorsSchool = ClassRegistry::init('RssAggregators.RssAggregatorsSchool');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RssAggregatorsSchool);

		parent::tearDown();
	}
}
