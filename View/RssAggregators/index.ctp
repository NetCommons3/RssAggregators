<?php
/**
 * RssAggregator view template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @author Kazunori Sakamoto <exkazuu@willbooster.com>
 * @author Wataru Nishimoto <watura@willbooster.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2021, NetCommons Project
 */

echo $this->NetCommonsHtml->script('/rss_aggregators/js/rss_aggregators.js');
echo $this->NetCommonsHtml->css('/rss_aggregators/css/style.css');
?>

<?php echo $this->element('RssAggregators/header'); ?>
<?php echo $this->element('RssAggregators/table'); ?>

<article>
	<div class="nc-content-list">
		<?php echo $this->element('RssAggregators/items'); ?>
	</div>
</article>