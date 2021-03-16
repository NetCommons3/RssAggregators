<?php

/**
 * RssAggregators Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @author Wataru Nishimoto <watura@willbooster.com>
 * @author Kazunori Sakamoto <exkazuu@willbooster.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('RssAggregatorsAppController', 'RssAggregators.Controller');

/**
 * RssAggregators Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons3\RssAggregators\Controller
 */
class RssAggregatorsController extends RssAggregatorsAppController {

/**
 * use model
 *
 * @var array
 */
	public $uses = [
		'RssAggregators.RssAggregatorsFeed',
		'RssAggregators.RssAggregatorsItem',
	];

/**
 * use component
 *
 * @var array
 */
	public $components = [
		'Pages.PageLayout',
	];

/**
 * 使用するHelpers
 *
 * @var array
 */
	public $helpers = array(
		'NetCommons.Date',
		'Paginator',
		'NetCommons.DisplayNumber',
	);

/**
 * beforeFilter
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();

		$rssAggregatorSetting = array(
			'display_number' => 5,
		);

		if (isset($this->params['named']["limit"])) {
			$rssAggregatorSetting["display_number"] = $this->params['named']["limit"];
		}

		if (isset($this->params['named']["prefecture_id"])) {
			$rssAggregatorSetting["prefecture_id"] = $this->params['named']["prefecture_id"];
		}

		if (isset($this->params['named']["city_id"])) {
			$rssAggregatorSetting["city_id"] = $this->params['named']["city_id"];
		}

		if (isset($this->params['named']["school"])) {
			$rssAggregatorSetting["school"] = $this->params['named']["school"];
		}

		$this->set('rssAggregatorSetting', $rssAggregatorSetting);

		if ($this->request->is('xml')) {
			$this->Components->unload('Pages.PageLayout');
		}
	}

/**
 * view
 *
 * @return void
 */
	public function index() {
		if (CurrentLib::isSettingMode()) {
			$this->view = 'cannot_edit';
		}

		$rssAggregatorItems = $this->__getFeedInfomation();
		$this->set('rssAggregatorItems', $rssAggregatorItems);
	}

/**
 * Get feed information
 *
 * @return array
 */
	private function __getFeedInfomation() {
		$rssAggregatorSetting = $this->viewVars['rssAggregatorSetting'];

		$itemsConds = array(
			'plugin_key' => 'blogs',
		);

		$schoolsConds = array(
			'rss_aggregators_item_count >' => 0,
		);

		$prefecturesConds = array(
			'rss_aggregators_item_count >' => 0,
		);

		$cityConds = array(
			'rss_aggregators_item_count >' => 0,
		);

		if (
			isset($rssAggregatorSetting['school'])
			&& '全ての学校' != $rssAggregatorSetting['school']
		) {
			$itemsConds['school'] = $rssAggregatorSetting['school'];
		} else {
			$rssAggregatorSetting['school'] = '全ての学校';
		}

		if (
			isset($rssAggregatorSetting['prefecture_id'])
			&& $rssAggregatorSetting['prefecture_id'] != '0'
		) {
			$itemsConds['prefecture_id'] = $rssAggregatorSetting['prefecture_id'];
			$schoolsConds['prefecture_id'] = $rssAggregatorSetting['prefecture_id'];
			$cityConds['prefecture_id'] = $rssAggregatorSetting['prefecture_id'];
		} else {
			$rssAggregatorSetting['prefecture_id'] = '0';
			$cityConds['city_id'] = '0';
		}

		if (
			isset($rssAggregatorSetting['city_id'])
			&& $rssAggregatorSetting['city_id'] != '0'
		) {
			$schoolsConds['city_id'] = $rssAggregatorSetting['city_id'];
			$itemsConds['city_id'] = $rssAggregatorSetting['city_id'];
		}

		$items = $this->RssAggregatorsItem->find('all', array(
			'conditions' => $itemsConds,
			'order' => array('publish_start DESC'),
			'limit' => (int)$rssAggregatorSetting['display_number'],
		));

		$schools = $this->RssAggregatorsFeed->find('list', array(
			'fields' => array('school', 'rss_aggregators_item_count'),
			'order' => array('rss_aggregators_item_count DESC'),
			'conditions' => $schoolsConds,
		));

		$prefectures = $this->RssAggregatorsFeed->find('list', array(
			'fields' => array('prefecture_id', 'prefecture'),
			'conditions' => $prefecturesConds,
			'order' => array('prefecture_id')
		));

		$cities = $this->RssAggregatorsFeed->find('list', array(
			'fields' => array('city_id', 'city'),
			'conditions' => $cityConds,
			'order' => array('city_id')
		));

		$this->set('rssAggregatorSetting', $rssAggregatorSetting);
		$this->set('rssAggregatorSchools', Hash::merge(array('全ての学校' => ''), $schools));
		$this->set('rssAggregatorPrefectures', Hash::merge(array('都道府県を選択'), $prefectures));
		$this->set('rssAggregatorCities', Hash::merge(array('市町村を選択'), $cities));

		return $items;
	}
}
