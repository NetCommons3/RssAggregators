<?php
/**
 * 学校の絞り込み
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<span class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		<?php echo $rssAggregatorPrefectures[$rssAggregatorSetting['prefecture_id']]; ?>
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<?php foreach ($rssAggregatorPrefectures as $prefecture_id => $prefecture) : ?>
			<li>
				<?php
					$params = ['prefecture_id' => $prefecture_id, 'school' => '全ての学校'];
					if (isset($this->Paginator->params['named']['limit'])) {
						$params['limit'] = $this->Paginator->params['named']['limit'];
					}
					echo $this->Paginator->link($prefecture, $params);
				?>
			</li>
		<?php endforeach; ?>
	</ul>
</span>
