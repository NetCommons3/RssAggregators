<?php
/**
 * RssAggregatorsItem Model
 *
 * @property RssAggregatorsFeed $RssAggregatorsFeed
 *
* @author Noriko Arai <arai@nii.ac.jp>
* @author Your Name <yourname@domain.com>
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

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

	public function saveFromJson($json) {
		if ($item = $this->findByContentKey($json["Topic"]["content_key"])) {
			$json["id"] = $item["RssAggregatorsItem"]["id"];
			if($item["RssAggregatorsItem"]["modified"] == $json["Topic"]["modified"] &&
				$item["RssAggregatorsItem"]["url"] == $json["Topic"]["url"] ) {
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
