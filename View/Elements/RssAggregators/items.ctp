<?php

/**
 * view rss items element
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

<?php if ($rssAggregatorItems) : ?>
	<?php foreach ($rssAggregatorItems as $item) : ?>
		<article>
			<h3 class="clearfix">
				<a href="<?php echo h($item["RssAggregatorsItem"]["url"]); ?>" target="_blank">
					<?php echo h($item["RssAggregatorsItem"]["title"]); ?>
				</a>
				<div class="pull-right">
					<?php echo $this->Date->dateFormat($item["RssAggregatorsItem"]["publish_start"]); ?>
				</div>
			</h3>
			<div class="text-muted rss-aggregator-summary">
				<?php echo h($item["RssAggregatorsItem"]["display_summary"]); ?>
			</div>
			<h3 class="clearfix">
				<div class="pull-right">
					<a href="https://<?php echo h($item["RssAggregatorsFeed"]["url"]); ?>" target="_blank">
						<?php echo h($item["RssAggregatorsFeed"]["school"]); ?>
					</a>
				</div>
			</h3>
		</article>
	<?php endforeach; ?>
<?php else : ?>
		<article>
			<?php echo __d('rss_aggregators', 'Feed Not Found.'); ?>
		</article>
<?php endif;