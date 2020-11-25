<?php
/**
 * RSSフィード更新シェル
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AppShell', 'Console/Command');
App::uses('SiteBuildMngCommandExec', 'SiteBuildManager.Lib');

/**
 * RSSフィード更新シェル
 *
 * @property SchoolInformation $SchoolInformation
 * @package NetCommons3\RssAggregators\Console\Command
 */
class UpdateSchoolFeedsShell extends AppShell {

/**
 * JSON フォーマット
 *
 * @var int
 */
	const JSON_FORMAT = JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;

/**
 * use model
 *
 * @var array
 */
	public $uses = [
		'RssAggregators.RssAggregatorsItem',
		'RssAggregators.RssAggregatorsFeed',
	];

/**
 * メイン処理
 *
 * @return void
 */
	public function main() {
		Configure::load('RssAggregators.school_list');
		$school_list = Configure::read('school_list');
		// try {
		foreach($school_list as $school) {
			// DB に school_list を反映する
			$this->RssAggregatorsFeed->updateRssAggregatorsFeed($school);
		}
		$count = $this->RssAggregatorsFeed->updateRssAggregatorsFeedsIfNeeded();

		$this->out('<success>' . $count["feeds"] . ' 件の Feed から ' . $count["items"] . ' 件取得しました</success>');
		return true;
	}
}
