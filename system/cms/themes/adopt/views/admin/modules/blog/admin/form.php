<?php if ($this->method == 'create'): ?>
<h3>Add Entry</h3>
<?php else: ?>
<h3>Edit Entry</h3>
<?php endif ?>

<?php echo form_open_multipart(site_url() . 'admin/blog/create', array('class' => 'streams_form')); ?>
<section class="title">
	<h4><?php echo lang('blog:content_label') ?></h4>
</section>
<div class="well">
	<div class="form_inputs" id="blog-content-tab">
		<fieldset>
			<div class="row-fluid">
				<div class="span9">
					<label for="title"><?php echo lang('global:title') ?> <span>*</span></label>
					<?php echo form_input('title', htmlspecialchars_decode($post->title), 'maxlength="100" id="title" class="span12"') ?>

					<div class="row-fluid">
						<div class="span6">
							<label for="category_id"><?php echo lang('blog:category_label') ?></label>
							<div class="input">
								<?php echo form_dropdown('category_id', array(lang('blog:no_category_select_label')) + $categories, @$post->category_id, 'class="span12"') ?>
								<br />
								[ <?php echo anchor('admin/blog/categories/create', lang('blog:new_category_label'), 'target="_blank"') ?> ]
							</div>
						</div>
						<div class="span6">
							<label for="status"><?php echo lang('blog:status_label') ?></label>
							<div class="input">
								<?php echo form_dropdown('status', array('draft' => lang('blog:draft_label'), 'live' => lang('blog:live_label')), @$post->status, 'class="span12"') ?>
							</div>
						</div>
					</div>
				</div>
				<div class="span3">
					<ul class="unstyled">
					<?php
					// The only extra field is photo
					echo $this->load->view('admin/partials/streams/form_single_display', array('field' => $stream_fields[0]), true);
					?>
					</ul>
				</div>
			</div>

			<div style="display:none">
				<label for="slug"><?php echo lang('global:slug') ?> <span>*</span></label>
				<div class="input"><?php echo form_input('slug', $post->slug, 'maxlength="100" class="width-20"') ?></div>
			</div>

			<div>
				<label for="body"><?php echo lang('blog:content_label') ?> <span>*</span></label>

				<div class="edit-content">
					<?php echo form_textarea(array('id' => 'body', 'name' => 'body', 'value' => $post->body, 'rows' => 30, 'class' => $post->type)) ?>
				</div>
			</div>
		</fieldset>
	</div>
</div>
<div class="footer">
	<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel'))) ?>
</div>


<?php
// Hidden fields
echo form_hidden('type', 'html');
echo form_hidden('preview_hash', $post->preview_hash);
echo form_hidden('created_on', date('Y-m-d', $post->created_on));
echo form_hidden('created_on_hour', date('H', $post->created_on));
echo form_hidden('created_on_minute', date('i', $post->created_on));
echo form_hidden('keywords');
echo form_hidden('comments_enabled', 'no');

$editId = ($this->method != 'create') ? $post->id : null;
echo form_hidden('row_edit_id', $editId);

echo form_close() ?>