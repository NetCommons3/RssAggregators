<?php

/**
 * 学校の絞り込み（期間）
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

<?php
	$ranges = ['week' => '週', 'month' => '月'];
?>

<span class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<?php echo $ranges[$rssAggregatorSetting['range']]; ?>
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
		<?php foreach ($ranges as $rangeId => $range) : ?>
			<li>
				<?php
					$params = ['range' => $rangeId];
					if (isset($this->Paginator->params['named']['limit'])) {
						$params['limit'] = $this->Paginator->params['named']['limit'];
					}
					echo $this->Paginator->link($range, $params);
				?>
			</li>
		<?php endforeach; ?>
	</ul>
</span>
