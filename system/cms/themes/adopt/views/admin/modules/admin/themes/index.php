<script>
	function setTheme(name) {
		$('[name="theme"]').val(name);
		$('#themeForm').submit();
	}
</script>

<h1>My AdoptSite Template</h1>

<div class="content">
<?php if ($themes):

	// Show the default theme
	foreach ($themes as $theme) :
		if (isset($theme->is_default)) : ?>
	<div id="default-theme" class="blue-bg inset-shadow clearfix">
		<img src="<?php echo $theme->path; ?>/thumbnail.png" />
		<div class="details">
			<h4>My AdoptSite Template</h4>
			<span><?php echo $theme->name; ?></span>
			<p><?php echo $theme->description; ?></p>
		</div>
	</div>
	<?php
		endif;
	endforeach;

	echo form_open('admin/addons/themes/set_default', array(
         'method' => 'post',
	     'id' => 'themeForm'
    ));

	echo form_hidden('method', $this->method);
	echo form_hidden('theme'); ?>
	<div id="theme-box">
		<div class="row-fluid">
		<?php $i = 0; ?>
		<?php for ($k = 0; $k < 2; $k++) : // iterate twice for dev effect; ?>
		<?php foreach ($themes as $theme) : if (!isset($theme->thumbnail)) continue; ?>
		<div class="span4 item">
			<img src="<?php echo $theme->path; ?>/thumbnail.png" />
			<div class="overlay">
				<span><?php echo $theme->name; ?></span>
				<a href="<?php echo $theme->screenshot ?>" title="<?php echo $theme->name ?>" class="btn btn-default"><?php echo lang('buttons:preview') ?></a>
				<button class="btn btn-primary" onclick="setTheme('<?php echo $theme->slug; ?>');">Apply</button>
			</div>
		</div>
		<?php if (++$i % 3 == 0) : ?>
		</div>
		<div class="row-fluid">
		<?php endif; ?>
		<?php endforeach; ?>
		<?php endfor; ?>
		</div>
	</div>

	<?php $this->load->view('admin/partials/pagination') ?>

	<?php echo form_close() ?>

<?php else: ?>
	<div class="blank-slate">
		<p><?php echo lang('addons:themes:no_themes_installed') ?></p>
	</div>
<?php endif ?>
</div>