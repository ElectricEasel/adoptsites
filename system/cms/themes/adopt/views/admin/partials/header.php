<noscript>
	<span>AdoptSites requires that JavaScript be turned on for many of the functions to work correctly. Please turn JavaScript on and reload the page.</span>
</noscript>

<div class="navbar navbar-inverse navbar-static-top">
	<div class="navbar-inner">
		<div class="container" style="padding:20px 0;">
			<?php echo anchor('', Asset::img('as-logo.png', 'view site'), 'target="_blank"') ?>
			<ul class="nav pull-right">
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">
						<i class="icon white icon-user"></i>
						Actions
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href=""><i class="icon icon-cogwheel"></i>My Account & Billing</a>
						</li>
						<li>
							<a href=""><i class="icon icon-stats"></i>My AdoptSite Stats</a>
						</li>
						<li>
							<a href=""><i class="icon icon-power"></i>Logout</a>
						</li>
						<li>
							<a href=""><i class="icon icon-circle_info"></i>Help</a>
						</li>
					</ul>
				</li>
				<a class="btn btn-primary" href="#" target="_blank">Visit Site</a>
			</ul>
		</div>
	</div>
</div>

<div class="subbar">
	<div class="wrapper">
		<div class="subbar-inner">
			<h2><?php echo $module_details['name'] ? anchor('admin/'.$module_details['slug'], $module_details['name']) : lang('global:dashboard') ?></h2>
		
			<small>
				<?php if ( $this->uri->segment(2) ) { echo '<span class="divider">&nbsp; | &nbsp;</span>'; } ?>
				<?php echo $module_details['description'] ? $module_details['description'] : '' ?>
				<?php if ( $this->uri->segment(2) ) { echo '<span class="divider">&nbsp; | &nbsp;</span>'; } ?>
				<?php if($module_details['slug']): ?>
				<?php echo anchor('admin/help/'.$module_details['slug'], lang('help_label'), array('title' => $module_details['name'].'&nbsp;'.lang('help_label'), 'class' => 'modal')); ?>
				<?php endif; ?>
			</small>
			
			<?php file_partial('shortcuts') ?>
	
		</div>
	</div>
</div>

<?php if ( ! empty($module_details['sections'])) file_partial('sections') ?>
