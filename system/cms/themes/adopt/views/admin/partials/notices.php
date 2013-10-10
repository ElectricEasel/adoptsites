<?php if ($this->session->flashdata('error')): ?>
<div class="alert alert-error animated fadeIn">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Error: </strong><?php echo $this->session->flashdata('error'); ?>
</div>
<?php endif; ?>

<?php if (validation_errors()): ?>
<div class="alert alert-error animated fadeIn">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Error: </strong><?php echo validation_errors(); ?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['error'])): ?>
<div class="alert alert-error animated fadeIn">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Error: </strong><?php echo $messages['error']; ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('notice')): ?>
<div class="alert alert-warning animated fadeIn">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Warning: </strong><?php echo $this->session->flashdata('notice');?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['notice'])): ?>
<div class="alert alert-warning animated fadeIn">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Warning: </strong><?php echo $messages['notice']; ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success animated fadeIn">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Success: </strong><?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<?php if ( ! empty($messages['success'])): ?>
<div class="alert alert-success animated fadeIn">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>Success: </strong><?php echo $messages['success']; ?>
</div>
<?php endif;

	/**
	 * Admin Notification Event
	 */
	Events::trigger('admin_notification');
	
?>