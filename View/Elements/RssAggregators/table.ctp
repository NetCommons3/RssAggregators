<header class="row">
  <div class="col-sm-8">
		<ul class="nav nav-pills">
			<li role="presentation" class="active"><a href="#">投稿数</a></li>
			<li role="presentation"><a href="#">アクセス数</a></li>
			<li role="presentation"><a href="#">アクセス数/生徒数</a></li>
		</ul>
	</div>
  <div class="col-sm-4 text-right">
		<div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				週 <span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
				<li><a href="#">週</a></li>
				<li><a href="#">月</a></li>
				<li><a href="#">年</a></li>
			</ul>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-default">
				<span class="glyphicon glyphicon-filter" aria-hidden="true"></span> 地図で絞り込む
			</button>
		</div>
	</div>
</header>

<?php $canvasId = uniqid(); ?>
<canvas id="<?php echo $canvasId; ?>" style="width: 100%; height: 200px; margin-bottom: 2em;"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
	var randomScalingFactor = function() {
		return Math.floor(Math.random() * 10);
	};

	var config = {
		type: 'line',
		data: {
			labels: ['MM-01', 'MM-02', 'MM-03', 'MM-04', 'MM-05', 'MM-06', 'MM-07'],
			datasets: [{
				label: 'あなたの学校',
				backgroundColor: '#337ab7',
				borderColor: '#337ab7',
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
				fill: false,
			}, {
				label: 'A学校',
				fill: false,
				backgroundColor: '#5cb85c',
				borderColor: '#5cb85c',
				borderDash: [9, 3, 3, 3],
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
			}, {
				label: 'B学校',
				fill: false,
				backgroundColor: '#5bc0de',
				borderColor: '#5bc0de',
				borderDash: [9, 3],
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
			}, {
				label: 'C学校',
				fill: false,
				backgroundColor: '#f0ad4e',
				borderColor: '#f0ad4e',
				borderDash: [3, 3],
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
			}]
		},
		options: {
			responsive: true,
			title: {
				display: false,
				text: 'Chart.js Line Chart'
			},
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			hover: {
				mode: 'nearest',
				intersect: true
			},
			scales: {
				xAxes: [{
					display: true,
				}],
				yAxes: [{
					display: true,
					scaleLabel: {
						display: true,
						labelString: '投稿数'
					}
				}]
			}
		}
	};

	var context = document.getElementById('<?php echo $canvasId; ?>').getContext('2d');
	new Chart(context, config);
</script>

<table class="table table-striped">
	<tr>
		<th>学校名 <span class="glyphicon glyphicon-sort text-muted" aria-hidden="true"></span></th>
		<th>投稿数 <span class="glyphicon glyphicon-sort-by-attributes-alt" aria-hidden="true"></span></th>
		<th>アクセス数 <span class="glyphicon glyphicon-sort text-muted" aria-hidden="true"></span></th>
		<th>アクセス数/生徒数 <span class="glyphicon glyphicon-sort text-muted" aria-hidden="true"></span></th>
	</tr>
	<?php foreach (array_slice($rssAggregatorSchools, 0, 4) as $school => $count) : ?>
		<?php if (empty($count)) continue; /* Skip "全ての学校". */ ?>
		<tr>
			<td><?php echo $school; ?></td>
			<td><?php echo $count; ?></td>
			<td><?php echo 'null'; ?></td>
			<td><?php echo 'null'; ?></td>
		</tr>
	<?php endforeach; ?>
	<tr class="info">
		<td>あなたの学校</td>
		<td>0</td>
		<td>0</td>
		<td>0</td>
	</tr>
</table>

<hr style="margin-top: 3em;">