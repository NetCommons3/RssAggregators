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
		<?php echo $rssAggregatorSetting['school']; ?>
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<?php foreach ($rssAggregatorSchools as $key => $val) : ?>
			<li>
					<?php echo $this->Paginator->link(
						$key . ' <span class="badge">' . $val . '</span>',
						Hash::merge($this->Paginator->params['named'],
						array('school' => $key)),
						array('escape' => false));
					?>
			</li>
		<?php endforeach; ?>
	</ul>
</span>
