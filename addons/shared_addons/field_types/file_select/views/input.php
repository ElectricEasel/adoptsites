<div class="input-append">
	<input class="span3" type="text" id="<?php echo $form_slug; ?>" name="<?php echo $form_slug; ?>" />
	<button type="button" class="btn btn-primary" onclick="FileSelect.modal('<?php echo $form_slug; ?>');">
		Associate Photo
	</button>
</div>
<div class="modal fade" id="modal_<?php echo $form_slug; ?>" data-remote="/streams_core/public_ajax/field/file_select/modal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Associate Photo</h3>
	</div>
	<div class="modal-body">
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		<button type="button" class="btn btn-primary" onclick="FileSelect.select('<?php echo $form_slug; ?>');">Ok</button>
	</div>
</div>