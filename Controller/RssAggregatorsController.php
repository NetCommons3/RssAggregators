<?php
/**
 * RssAggregators Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
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

		if(isset($this->params['named']["limit"])) {
			$rssAggregatorSetting["display_number"] = $this->params['named']["limit"];
		}

		if(isset($this->params['named']["prefecture_id"])) {
			$rssAggregatorSetting["prefecture_id"] = $this->params['named']["prefecture_id"];
		}

		if(isset($this->params['named']["school"])) {
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

		$rssAggregatorItems = $this->get();
		$this->set('rssAggregatorItems', $rssAggregatorItems);
	}

/**
 * Get site information
 *
 * @return array
 */
	private function get() {
		$rssAggregatorSetting = $this->viewVars['rssAggregatorSetting'];

		$items_conditions = array(
			'plugin_key' => 'blogs',
		);

		$schools_conditions = array(
			'rss_aggregators_item_count >' => 0,
		);

		$prefectures_conditions = array(
			'rss_aggregators_item_count >' => 0,
		);

		if (isset($rssAggregatorSetting['school']) && '全ての学校' != $rssAggregatorSetting['school']) {
			$rssAggregatorSetting['school'] = $rssAggregatorSetting['school'];
			$items_conditions['school'] = $rssAggregatorSetting['school'];
		} else {
			$rssAggregatorSetting['school'] = '全ての学校';
		}

		if (isset($rssAggregatorSetting['prefecture_id']) && $rssAggregatorSetting['prefecture_id'] != '0') {
			$items_conditions['prefecture_id'] = $rssAggregatorSetting['prefecture_id'];
			$schools_conditions['prefecture_id'] = $rssAggregatorSetting['prefecture_id'];
		} else {
			$rssAggregatorSetting['prefecture_id'] = '0';
		}

		$items = $this->RssAggregatorsItem->find('all', array(
			'conditions' => $items_conditions,
			'order' => array('publish_start DESC'),
			'limit' => (int) $rssAggregatorSetting['display_number'],
		));

		$schools = $this->RssAggregatorsFeed->find('list', array(
			'fields' => array('school', 'rss_aggregators_item_count'),
			'order' => array('rss_aggregators_item_count DESC'),
			'conditions' => $schools_conditions,
		));

		$prefectures = $this->RssAggregatorsFeed->find('list', array(
			'fields' => array('prefecture_id', 'prefecture'),
			'conditions' => $prefectures_conditions,
			'order' => array('prefecture_id')
		));


		$this->set('rssAggregatorSetting', $rssAggregatorSetting);
		$this->set('rssAggregatorSchools', Hash::merge(array('全ての学校' => ''), $schools));
		$this->set('rssAggregatorPrefectures', Hash::merge(array('都道府県を選択'), $prefectures));

		return $items;
	}
}