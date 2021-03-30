<?php

/**
 * RssAggregatorsFeed Model
 *
 * @property RssAggregatorsItem $RssAggregatorsItem
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Wataru Nishimoto <watura@willbooster.com>
 * @author Kazunori Sakamoto <exkazuu@willbooster.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('RssAggregatorsAppModel', 'RssAggregators.Model');

/**
 * Summary for RssAggregatorsFeed Model
 */
class RssAggregatorsFeed extends RssAggregatorsAppModel {

/**
 * キャッシュタイム
 *
 * @var string
 * @see http://php.net/manual/ja/dateinterval.construct.php
 */
	const CACHE_TIME = 'PT1H';

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'master';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'rss_aggregators_feeds';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'school';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'url' => array(
			'url' => array(
				'rule' => array('url'),
			),
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'RssAggregatorsItem' => array(
			'className' => 'RssAggregatorsItem',
			'foreignKey' => 'rss_aggregators_feed_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * Item データの更新
 * ※最終取得日時が古い場合、RSSを取得し直す
 *
 * @return array
 */
	public function updateRssAggregatorsFeedsIfNeeded() {
		$this->loadModels([
			'RssAggregatorsItem' => 'RssAggregators.RssAggregatorsItem',
		]);

		$date = new DateTime();
		$date->sub(new DateInterval(RssAggregatorsFeed::CACHE_TIME));

		$ignore = [
			"oshu-public-elementary-school.edumap.jp"
		];

		$conditions = array(
			'AND' => array(
				'NOT' => array('url' => $ignore),
			),
		);

		$feeds = $this->find('all', array(
			'recursive' => 0,
			'conditions' => $conditions,
		));

		$count = array('feeds' => count($feeds));

		$itemCount = 0;
		foreach ($feeds as $school) {
			if (in_array($school["RssAggregatorsFeed"]["url"], $ignore)) {
				continue;
			}
			$schoolUrl = 'https://' . $school["RssAggregatorsFeed"]["url"];
			$jsonUrl = $schoolUrl . '/topics/topics/index/days:28.json';
			print ($jsonUrl . "\n");
			$feed = $this->__fetchJsonFile($jsonUrl);
			if (!isset($feed["topics"])) {
				continue;
			}
			foreach ($feed["topics"] as $item) {
				$item["Topic"]['author'] = $school["RssAggregatorsFeed"]["school"];
				$item["Topic"]['school_url'] = $schoolUrl;
				$item["Topic"]['rss_aggregators_feed_id'] = $school["RssAggregatorsFeed"]["id"];
				$this->RssAggregatorsItem->saveFromJson($item);
				$itemCount++;
			}
		}
		$count["items"] = $itemCount;
		return $count;
	}

/**
 * Fetch Json File form internet
 *
 * @param string $url A url to be fetched
 * @return array
 */
	private function __fetchJsonFile($url) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec($curl);
		curl_close($curl);

		return json_decode($json, true);
	}

/**
 * Update RssAggregatorsFeed
 *
 * @param string $data Data to be saved
 * @return array $rssReader
 */
	public function updateRssAggregatorsFeed($data) {
		try {
			$this->begin();
			$this->set($data);
			$this->save();
			$this->commit();
		} catch (Exeption $ex) {
			$this->rollback($ex);
		}
	}
}
