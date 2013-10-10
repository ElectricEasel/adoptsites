<?php echo form_open_multipart(uri_string(), 'class="streams_form"'); ?>

<?php foreach($fieldsets as $tab => $fieldset) : ?>
<div id="<?php echo $tab; ?>">
	<section class="title">
		<h4><?php echo ucwords(str_replace('-', ' ', $tab)); ?></h4>
	</section>
	<div class="well" id="<?php echo $tab; ?>">
		<div class="row-fluid">
			<?php foreach($fieldset as $field) :
				$currentField = $fields[$field]; ?>
			<div class="<?php echo $currentField['input_slug']; ?>">
				<label for="<?php echo $currentField['input_slug'];?>">
					<?php echo $this->fields->translate_label($currentField['input_title']);?> <?php echo $currentField['required'];?>
					<?php if (!empty($currentField['instructions'])) : ?>
					<br /><small><?php echo $this->fields->translate_label($currentField['instructions']); ?></small>
					<?php endif; ?>
				</label>
				<div class="input">
					<?php echo $currentField['input']; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="footer">
		<button type="submit" class="btn btn-primary btn-large">
			Save Changes
		</button>
	</div>
</div>
<?php endforeach; ?>

<?php if ($mode == 'edit'){ ?><input type="hidden" value="1" name="row_edit_id" /><?php } ?>

<?php echo form_close();?>