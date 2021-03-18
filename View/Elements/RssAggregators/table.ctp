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
			$this->access = rand(0, 500);
		?>
		<tr>
			<td><?php echo $school['RssAggregatorsFeed']['school']; ?></td>
			<td><?php echo $school['RssAggregatorsFeed']['rss_aggregators_item_count']; ?></td>
			<td><?php echo $this->access ?></td>
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
