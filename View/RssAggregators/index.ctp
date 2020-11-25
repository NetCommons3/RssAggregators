<?php
echo $this->NetCommonsHtml->css('/rss_aggregators/css/style.css');
?>

<?php echo $this->element('RssAggregators/header'); ?>

<article>
	<div class="nc-content-list">
		<?php echo $this->element('RssAggregators/items'); ?>
	</div>
</article>

