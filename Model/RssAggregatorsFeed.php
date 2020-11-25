<?php
/**
 * RssAggregatorsFeed Model
 *
 * @property RssAggregatorsItem $RssAggregatorsItem
 *
* @author Noriko Arai <arai@nii.ac.jp>
* @author Your Name <yourname@domain.com>
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
			"oshu-public-elementary-school.edumap.jp" // Todo: Update
		];

		$conditions = array(
			'AND' => array(
				'OR' => array(
					array('feed_updated <' => $date->format('Y-m-d H:i:s')),
					array('feed_updated' => NULL),
				),
				'NOT' => array('url' => $ignore),
			),
		);

		$feeds = $this->find('all', array(
			'recursive' => 0,
			'conditions' => $conditions,
		));

		$count = array('feeds' => count($feeds));

		$item_count = 0;
		foreach($feeds as $school) {
			if(in_array($school["RssAggregatorsFeed"]["url"], $ignore)) {
				continue;
			}
			$url = 'https://'. $school["RssAggregatorsFeed"]["url"];
			var_dump($url . '/topics/topics/index/days:7.json');
			$feed = $this->__fetchJsonFile($url . '/topics/topics/index/days:7.json');
			if (!isset($feed["topics"])) {
				continue;
			}
			foreach ($feed["topics"] as $item) {
				$item["Topic"]['author'] = $school["RssAggregatorsFeed"]["school"];
				$item["Topic"]['school_url'] = $url;
				$item["Topic"]['rss_aggregators_feed_id'] = $school["RssAggregatorsFeed"]["id"];
				$this->RssAggregatorsItem->saveFromJson($item);
				$item_count++;
			}
			$date = new DateTime();
			$school["RssAggregatorsFeed"]["feed_updated"] = $date->format('Y-m-d H:i:s');
			$this->updateRssAggregatorsFeed($school["RssAggregatorsFeed"]);
		}
		$count["items"] = $item_count;
		return $count;
	}

/**
 * Fetch Json File form internet
 *
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
 * RssAggregatorsFeed を更新する
 *
 * @return array $rssReader
 */
	public function updateRssAggregatorsFeed($data) {
		try {
			$this->begin();
			$data["feed_updated"] = NULL;
			$this->set($data);
			$this->save();
			$this->commit();
		} catch (Exeption $ex) {
			$this->rollback($ex);
		}
	}
}
