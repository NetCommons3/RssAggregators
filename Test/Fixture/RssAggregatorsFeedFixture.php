<?php
/**
 * RssAggregatorsFeedFixture
 *
* @author Noriko Arai <arai@nii.ac.jp>
* @author Your Name <yourname@domain.com>
* @link http://www.netcommons.org NetCommons Project
* @license http://www.netcommons.org/license.txt NetCommons License
* @copyright Copyright 2014, NetCommons Project
 */

/**
 * Summary for RssAggregatorsFeedFixture
 */
class RssAggregatorsFeedFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
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
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'url' => 'Lorem ipsum dolor sit amet',
			'organization_id' => 'Lorem ipsum dolor sit amet',
			'organization' => 'Lorem ipsum dolor sit amet',
			'school_id' => 'Lorem ipsum dolor sit amet',
			'school' => 'Lorem ipsum dolor sit amet',
			'prefecture_id' => 'Lorem ipsum dolor sit amet',
			'prefecture' => 'Lorem ipsum dolor sit amet',
			'city_id' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'type' => 'Lorem ipsum dolor sit amet'
		),
	);

}
