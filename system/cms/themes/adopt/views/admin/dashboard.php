<h1>Welcome, Liam and Julie!</h1>

<div class="row-fluid" id="quick-links" style="display:none;">
<?php if((array_key_exists('comments', $this->permissions) OR $this->current_user->group == 'admin') AND module_enabled('comments')): ?>
	<div class="span3">
		<a class="tooltip-s" title="<?php echo lang('cp:manage_comments') ?>" href="<?php echo site_url('admin/comments') ?>"><?php echo Asset::img('icons/comments.png', lang('cp:manage_comments')) ?></a>
	</div>
<?php endif ?>

<?php if((array_key_exists('pages', $this->permissions) OR $this->current_user->group == 'admin') AND module_enabled('pages')): ?>
		<div class="span3">
		<a class="tooltip-s" title="<?php echo lang('cp:manage_pages') ?>" href="<?php echo site_url('admin/pages') ?>"><?php echo Asset::img('icons/pages.png', lang('cp:manage_pages')) ?></a>
	</div>
<?php endif ?>

<?php if((array_key_exists('files', $this->permissions) OR $this->current_user->group == 'admin') AND module_enabled('files')): ?>
			<div class="span3">
		<a class="tooltip-s" title="<?php echo lang('cp:manage_files') ?>" href="<?php echo site_url('admin/files') ?>"><?php echo Asset::img('icons/files.png', lang('cp:manage_files')) ?></a>
	</div>
<?php endif ?>

<?php if(array_key_exists('users', $this->permissions) OR $this->current_user->group == 'admin'): ?>
	<div class="span3">
		<a class="tooltip-s" title="<?php echo lang('cp:manage_users') ?>" href="<?php echo site_url('admin/users') ?>"><?php echo Asset::img('icons/users.png', lang('cp:manage_users')) ?></a>
	</div>
<?php endif ?>
</div>

<div class="row-fluid" id="quick-links">
	<div class="span3 blue-bg">
		<a href="#">
			<i class="icon icon-picture"></i>
			<span>Add New Photo or Gallery</span>
		</a>
	</div>
	<div class="span3 blue-bg">
		<a href="#">
			<i class="icon icon-pen"></i>
			<span>Add New Journal Entry</span>
		</a>
	</div>
	<div class="span3 blue-bg">
		<a href="#">
			<i class="icon icon-camera"></i>
			<span>Change My Profile Photo</span>
		</a>
	</div>
	<div class="span3 blue-bg">
		<a href="/admin/addons/themes">
			<i class="icon icon-imac"></i>
			<span>Change My AdoptSite Template</span>
		</a>
	</div>
</div>

<div class="row-fluid blue-bg" style="margin-top:15px">
	<div class="span12">
		<section class="title">
			<h4>My AdoptSite Stats</h4>
		</section>
		<section class="item">
			<div class="content">
				<img src="/system/cms/themes/adopt/img/stats.png" alt="Stats" style="width:100%" />
			</div>
		</section>
	</div>
</div>

<!-- Add an extra div to allow the elements within it to be sortable! -->
<div>
	<!-- Dashboard Widgets -->
	{{ widgets:area slug="dashboard" }}

	
	<?php if ((isset($analytic_visits) OR isset($analytic_views)) AND $theme_options->pyrocms_analytics_graph == 'yes'): ?>
	<script type="text/javascript">
	
	$(function($) {
			var visits = <?php echo isset($analytic_visits) ? $analytic_visits : 0 ?>;
			var views = <?php echo isset($analytic_views) ? $analytic_views : 0 ?>;
	
			var buildGraph = function() {
				$.plot($('#analytics'), [{ label: 'Visits', data: visits },{ label: 'Page views', data: views }], {
					lines: { show: true },
					points: { show: true },
					grid: { hoverable: true, backgroundColor: '#fefefe' },
					series: {
						lines: { show: true, lineWidth: 1 },
						shadowSize: 0
					},
					xaxis: { mode: "time" },
					yaxis: { min: 0},
					selection: { mode: "x" }
				});
			}
			// create the analytics graph when the page loads
			buildGraph();
	
			// re-create the analytics graph on window resize
			$(window).resize(function(){
				buildGraph();
			});
			
			function showTooltip(x, y, contents) {
				$('<div id="tooltip">' + contents + '</div>').css( {
					position: 'absolute',
					display: 'none',
					top: y + 5,
					left: x + 5,
					'border-radius': '3px',
					'-moz-border-radius': '3px',
					'-webkit-border-radius': '3px',
					padding: '3px 8px 3px 8px',
					color: '#ffffff',
					background: '#000000',
					opacity: 0.80
				}).appendTo("body").fadeIn(500);
			}
		 
			var previousPoint = null;
			
			$("#analytics").bind("plothover", function (event, pos, item) {
				$("#x").text(pos.x.toFixed(2));
				$("#y").text(pos.y.toFixed(2));
		 
					if (item) {
						if (previousPoint != item.dataIndex) {
							previousPoint = item.dataIndex;
							
							$("#tooltip").remove();
							var x = item.datapoint[0],
								y = item.datapoint[1];
							
							showTooltip(item.pageX, item.pageY,
										item.series.label + " : " + y);
						}
					}
					else {
						$("#tooltip").fadeOut(500);
						previousPoint = null;            
					}
			});
		
		});
	</script>
	<div class="row-fluid">
		<div class="span12">
			<section class="title">
				<h4>Statistics</h4>
			</section>
			<section class="item">
				<div class="content">
					<div id="analytics"></div>
				</div>
			</section>
		</div>
	</div>
</div>
	<?php endif ?>
	<!-- End Analytics -->
<div class="row-fluid" style="margin-top:15px;">
	<!-- Begin RSS Feed -->
	<?php if ( isset($rss_items) AND $theme_options->pyrocms_news_feed == 'yes') : ?>
		<div id="feed" class="span6">

			<section class="title">
				<h4>Recent Blog Posts</h4>
			</section>

			<section class="item">
				<div class="content">
					<ul class="unstyled">
						<?php foreach($rss_items as $rss_item): ?>
							<li class="row-fluid">
								<?php
								$item_date	= strtotime($rss_item->get_date());
								$item_month = date('M', $item_date);
								$item_day	= date('j', $item_date);
								?>

								<div class="date span4">
									<div class="time">
										<span class="month">
											<?php echo $item_month ?>
										</span>
										<span class="day">
											<?php echo $item_day ?>
										</span>
									</div>
								</div>
								<div class="span8">
									<h4><?php echo anchor($rss_item->get_permalink(), $rss_item->get_title(), 'target="_blank"') ?></h4>
								</div>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</section>
		</div>
	<?php endif ?>
	<!-- End RSS Feed -->
	<!-- Begin RSS Feed -->
	<?php if ( isset($rss_items) AND $theme_options->pyrocms_news_feed == 'yes') : ?>
		<div id="feed" class="span6">

			<section class="title">
				<h4>Tutorials</h4>
			</section>

			<section class="item">
				<div class="content">
					<ul class="unstyled">
						<?php foreach($rss_items as $rss_item): ?>
							<li class="row-fluid">
								<?php
								$item_date	= strtotime($rss_item->get_date());
								$item_month = date('M', $item_date);
								$item_day	= date('j', $item_date);
								?>

								<div class="date span4">
									<div class="time">
										<span class="month">
											<?php echo $item_month ?>
										</span>
										<span class="day">
											<?php echo $item_day ?>
										</span>
									</div>
								</div>
								<div class="span8">
									<h4><?php echo anchor($rss_item->get_permalink(), $rss_item->get_title(), 'target="_blank"') ?></h4>
								</div>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</section>
		</div>
	<?php endif ?>
	<!-- End RSS Feed -->
</div>
<!-- End sortable div -->