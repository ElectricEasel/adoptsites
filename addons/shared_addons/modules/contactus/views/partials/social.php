
<div class="<?php echo $input_slug; ?>">
	<label for="<?php echo $input_slug; ?>">
		<?php echo $this->fields->translate_label($input_title), $required; ?>
	</label>
	<div class="input-prepend">
		<span class="add-on">
			<i class="social-icon facebook"></i>
		</span>
		<?php echo $input; ?>
	</div>
</div>