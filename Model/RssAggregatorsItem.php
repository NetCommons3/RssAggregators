<?php

/**
 * RssAggregatorsItem Model
 *
 * @property RssAggregatorsFeed $RssAggregatorsFeed
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
 * Summary for RssAggregatorsItem Model
 */
class RssAggregatorsItem extends RssAggregatorsAppModel {

/**
 * Use jsonbase config
 *
 * @var string
 */
	public $useDbConfig = 'master';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'rss_aggregators_items';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'rss_aggregators_feed_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'RssAggregatorsFeed' => array(
			'className' => 'RssAggregatorsFeed',
			'foreignKey' => 'rss_aggregators_feed_id',
			'counterCache' => true,
			'counterScope' => array(
				'RssAggregatorsItem.plugin_key' => 'blogs',
			),
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Save data retrieved from json in database
 *
 * @param array $json Data retrieved from json
 * @return void
 */
	public function saveFromJson($json) {
		$item = $this->findByContentKey($json["Topic"]["content_key"]);
		if ($item) {
			$json["id"] = $item["RssAggregatorsItem"]["id"];
			if (
				$item["RssAggregatorsItem"]["modified"] == $json["Topic"]["modified"] &&
				$item["RssAggregatorsItem"]["url"] == $json["Topic"]["url"]
			) {
				return;
			}
		}
		try {
			$this->begin();
			if (isset($json["id"])) {
				$this->set($json["Topic"]);
			} else {
				$this->create($json["Topic"]);
			}
			$this->save();
			$this->commit();
		} catch (Exeption $ex) {
			$this->rollback($ex);
		}
	}
}
