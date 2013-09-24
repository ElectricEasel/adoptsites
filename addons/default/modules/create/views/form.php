<?php if ($this->method === 'newsite'): ?>
<h3><?php echo lang('site:create_site'); ?></h3>
<?php else: ?>
<h3><?php echo sprintf(lang('site:edit_site'), $name); ?></h3>
<?php endif; ?>

<?php echo form_open(uri_string(), 'class="crud"'); ?>

	<ol class="user">
		<h4><?php echo lang('site:first_admin'); ?></h4>

		<li class="<?php echo alternator('', 'even'); ?>">
			<?php echo form_label(lang('user:first_name'), 'first_name'); ?>
			<?php echo form_input('first_name', set_value('first_name', $first_name), 'class="required"'); ?>
		</li>

		<li class="<?php echo alternator('', 'even'); ?>">
			<?php echo form_label(lang('user:last_name'), 'last_name'); ?>
			<?php echo form_input('last_name', set_value('last_name', $last_name), 'class="required"'); ?>
		</li>

		<li class="<?php echo alternator('', 'even'); ?>">
			<?php echo form_label(lang('global:email'), 'email'); ?>
			<?php echo form_input('email', set_value('email', $email), 'class="required"'); ?>
		</li>

		<li class="<?php echo alternator('', 'even'); ?>">
			<?php echo form_label(lang('global:password'), 'password'); ?>
			<?php echo form_password('password', set_value('password', $password), 'class="required"'); ?>
		</li>
	</ol>

	<ol class="site">
		<?php echo form_hidden('id', $id); ?>
		<?php echo form_hidden('user_id', $user_id); ?>

		<h4><?php echo lang('site:site_details'); ?></h4>

		<li class="<?php echo alternator('even', ''); ?>">
			<?php echo form_label(lang('site:domain'), 'domain'); ?>
			<?php echo form_input('domain', set_value('domain', $domain), 'class="required"'); ?>
		</li>
	</ol>

	<div class="buttons align-right padding-top">
		<button class="btn btn-primary" type="submit">Submit</button>
	</div>

<?php echo form_close(); ?>