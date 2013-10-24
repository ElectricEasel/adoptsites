<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<meta name=viewport content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="robots" content="noindex,nofollow">
	<title><?php echo $this->settings->site_name; ?> - <?php echo lang('login_title');?></title>

	<base href="<?php echo base_url(); ?>"/>
	<meta name="robots" content="noindex, nofollow"/>

	<?php Asset::css('template.css'); ?>

	<?php Asset::js('jquery/jquery.js'); ?>
	<?php Asset::js('bootstrap.min.js'); ?>

	<?php echo Asset::render() ?>
</head>

<body id="login-body">
	<div class="container">
		<div id="login-logo"></div>
		<?php $this->load->view('admin/partials/notices') ?>
		<?php echo form_open('admin/login'); ?>
			<input type="text" name="email" class="input-large" placeholder="<?php echo lang('global:email'); ?>"/>
			<input type="password" name="password" class="input-large" placeholder="<?php echo lang('global:password'); ?>"/>
			<label for="remember-check" class="checkbox inline">
				<input type="checkbox" name="remember" id="remember-check" />
				<?php echo lang('user:remember'); ?>
			</label>
			<button type="submit" class="btn btn-primary btn-large btn-block">LOG IN</button>
		</fieldset>
		<?php echo form_close(); ?>
	</div>
</body>
</html>