<?php

/**
 * 学校の絞り込み
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

<span class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		<?php echo $rssAggregatorCities[$rssAggregatorSetting['city_id']]; ?>
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<?php foreach ($rssAggregatorCities as $cityId => $city) : ?>
			<li>
				<?php
				$params = ['city_id' => $cityId, 'school' => '全ての学校'];
				echo $this->Paginator->link($city, $params);
				?>
			</li>
		<?php endforeach; ?>
	</ul>
</span>