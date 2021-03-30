<?php

/**
 * 投稿数とアクセス数の一覧
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @author Wataru Nishimoto <watura@willbooster.com>
 * @author Kazunori Sakamoto <exkazuu@willbooster.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<table class="table table-striped">
	<tr>
		<th>学校名</th>
		<th>投稿数</th>
		<th>アクセス数</th>
	</tr>
	<?php foreach ($rssAggregatorSchools as $school) : ?>
		<?php
			if (empty($school['RssAggregatorsFeed']['rss_aggregators_item_count'])) {
				continue;
			}
			$initParmsStr = h(json_encode($school['RssAggregatorsFeed']['url']));
			$initParmsStr .= ', ' . h(json_encode($rssAggregatorSetting['range']));
		?>
		<tr ng-controller="RssAggregatorsItem" ng-init="initialize(<?php echo $initParmsStr; ?>)" ng-cloak>
			<td><?php echo $school['RssAggregatorsFeed']['school']; ?></td>
			<td>{{topicCount}}</td>
			<td>{{pageViewCount}}</td>
		</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('NetCommons.paginator'); ?>

<div class="text-right">
	<a target="_blank" class="btn btn-info btn-xs " href="<?php echo $this->Paginator->url(Hash::merge($this->Paginator->params['named'], ['ext' => 'xml'])); ?>">
		<?php echo __d('topics', 'RSS2.0'); ?>
	</a>
</div>

<hr>
