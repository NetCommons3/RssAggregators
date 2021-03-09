<header>
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
</header>

<table class="table table-striped">
	<tr>
		<th>学校名</th>
		<th>アクセス数/生徒数</th>
		<th>アクセス数</th>
		<th>投稿数</th>
	</tr>
	<?php foreach (array_slice($rssAggregatorSchools, 0, 4) as $school => $count) : ?>
		<?php if (empty($count)) continue; /* Skip "全ての学校". */ ?>
		<tr>
			<td><?php echo $school; ?></td>
			<td><?php echo 'null'; ?></td>
			<td><?php echo 'null'; ?></td>
			<td><?php echo $count; ?></td>
		</tr>
	<?php endforeach; ?>
</table>

<?php $canvasId = uniqid(); ?>
<canvas id="<?php echo $canvasId; ?>" style="width: 100%; height: 200px; margin-bottom: 1em;"></canvas>
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
				label: 'A学校',
				backgroundColor: 'rgb(255, 99, 132)',
				borderColor: 'rgb(255, 99, 132)',
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
				label: 'B学校',
				fill: false,
				backgroundColor: 'rgb(54, 162, 235)',
				borderColor: 'rgb(54, 162, 235)',
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
						labelString: 'アクセス数'
					}
				}]
			}
		}
	};

	var context = document.getElementById('<?php echo $canvasId; ?>').getContext('2d');
	new Chart(context, config);
</script>