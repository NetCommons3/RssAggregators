<?php 
/**
 * Schema file
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @author Wataru Nishimoto <watura@willbooster.com>
 * @author Kazunori Sakamoto <exkazuu@willbooster.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright NetCommons Project
 */

/**
 * Schema file
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @author Wataru Nishimoto <watura@willbooster.com>
 * @author Kazunori Sakamoto <exkazuu@willbooster.com>
 * @package NetCommons\Topics\Config\Schema
 * @SuppressWarnings(PHPMD.LongVariable)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class RssAggregatorsSchema extends CakeSchema {

/**
 * Database connection
 *
 * @var string
 */
	public $connection = 'master';

/**
 * before
 *
 * @param array $event event
 * @return bool
 */
	public function before($event = array()) {
		return true;
	}

/**
 * after
 *
 * @param array $event event
 * @return void
 */
	public function after($event = array()) {
	}

/**
 * rss_aggregators_feeds table
 *
 * @var array
 */
	public $rss_aggregators_feeds = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID'),
		'url' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'School ID', 'charset' => 'utf8mb4'),
		'organization_id' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'School ID', 'charset' => 'utf8mb4'),
		'organization' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'リンク', 'charset' => 'utf8mb4'),
		'school_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'リンク', 'charset' => 'utf8mb4'),
		'school' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'リンク', 'charset' => 'utf8mb4'),
		'prefecture_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'リンク', 'charset' => 'utf8mb4'),
		'prefecture' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'リンク', 'charset' => 'utf8mb4'),
		'city_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'リンク', 'charset' => 'utf8mb4'),
		'city' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'リンク', 'charset' => 'utf8mb4'),
		'type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'リンク', 'charset' => 'utf8mb4'),
		'rss_aggregators_item_count' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'item count'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);

/**
 * rss_aggregators_items table
 *
 * @var array
 */
	public $rss_aggregators_items = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID'),
		'rss_aggregators_feed_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'comment' => 'RSSリーダーID'),
		'block_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'comment' => 'Block ID'),
		'category_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'Category ID'),
		'content_key' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'comment' => 'Content Key'),
		'plugin_key' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'Plugin Key', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
		'display_title' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'タイトル', 'charset' => 'utf8mb4'),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'タイトル', 'charset' => 'utf8mb4'),
		'url' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => 'リンク', 'charset' => 'utf8mb4'),
		'summary' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '要約', 'charset' => 'utf8mb4'),
		'display_summary' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '要約', 'charset' => 'utf8mb4'),
		'publish_start' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '公開開始日付'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '最終更新日時'),
		'is_active' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);

}
