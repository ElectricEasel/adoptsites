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
		<?php for ($i = 0; $i < 2; $i++) : // iterate twice for dev effect; ?>
		<?php foreach ($themes as $theme) : if (!isset($theme->thumbnail)) continue; ?>
		<div class="item">
			<img src="<?php echo $theme->path; ?>/thumbnail.png" />
			<div class="overlay">
				<span><?php echo $theme->name; ?></span>
				<a href="<?php echo $theme->screenshot ?>" rel="screenshots" title="<?php echo $theme->name ?>" class="button modal"><?php echo lang('buttons:preview') ?></a>
				<button class="button" onclick="setTheme('<?php echo $theme->slug; ?>');">Apply</button>
			</div>
		</div>
		<?php endforeach; ?>
		<?php endfor; ?>
	</div>

	<?php $this->load->view('admin/partials/pagination') ?>

	<?php echo form_close() ?>

<?php else: ?>
	<div class="blank-slate">
		<p><?php echo lang('addons:themes:no_themes_installed') ?></p>
	</div>
<?php endif ?>
</div>