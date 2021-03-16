<?php

/**
 * ステータスの絞り込み
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @author Wataru Nishimoto <watura@willbooster.com>
 * @author Kazunori Sakamoto <exkazuu@willbooster.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
$named = $this->Paginator->params['named'];
$named['page'] = '1';
$url = NetCommonsUrl::blockUrl($named);
?>

<header class="row">
	<div class="col-sm-8">
		<!-- <?php echo $this->DisplayNumber->dropDownToggle(array(
		'currentLimit' => $rssAggregatorSetting['display_number'],
		'url' => $url
		)); ?> -->
		<?php echo $this->element('RssAggregators/select_prefecture'); ?>
		<?php if(count($rssAggregatorCities) > 1) : ?>
			<?php echo $this->element('RssAggregators/select_city'); ?>
		<?php endif ?>
		<!-- <?php echo $this->element('RssAggregators/select_school'); ?> -->
	</div>
	<div class="col-sm-4 text-right">
		<a target="_blank" class="btn btn-info btn-xs " href="<?php echo $this->Paginator->url(Hash::merge($this->Paginator->params['named'], ['ext' => 'xml'])); ?>">
			<?php echo __d('topics', 'RSS2.0'); ?>
		</a>
	</div>
</header>