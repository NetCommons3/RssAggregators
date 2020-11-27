<?php
class AddRssAggregatorsModel extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'add_rss_aggregators_model';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array (
				'rss_aggregators_feeds' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID'),
					'url' => array('type' => 'string', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'School ID'),
					'organization_id' => array('type' => 'string', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'School ID'),
					'organization' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'リンク', 'charset' => 'utf8'),
					'school_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'リンク', 'charset' => 'utf8'),
					'school' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'リンク', 'charset' => 'utf8'),
					'prefecture_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'リンク', 'charset' => 'utf8'),
					'prefecture' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'リンク', 'charset' => 'utf8'),
					'city_id' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'リンク', 'charset' => 'utf8'),
					'city' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'リンク', 'charset' => 'utf8'),
					'type' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'リンク', 'charset' => 'utf8'),

					'rss_aggregators_item_count' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'item count'),

					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'rss_aggregators_items' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID'),
					'rss_aggregators_feed_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'comment' => 'RSSリーダーID'),
					'block_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'comment' => 'Block ID'),
					'category_id' => array('type' => 'integer', 'default' => '0', 'unsigned' => false, 'comment' => 'Category ID'),
					'content_key' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'comment' => 'Content Key'),
					'plugin_key' => array('type' => 'string', 'unsigned' => false, 'comment' => 'Plugin Key'),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '作成日時'),
					'display_title' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'タイトル', 'charset' => 'utf8'),
					'title' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'タイトル', 'charset' => 'utf8'),
					'url' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'リンク', 'charset' => 'utf8'),
					'summary' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '要約', 'charset' => 'utf8'),
					'display_summary' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '要約', 'charset' => 'utf8'),
					'publish_start' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '公開開始日付'),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => '最終更新日時'),
					'is_active' => array('type' => 'boolean', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'rss_aggregators_feeds', 'rss_aggregators_items'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
