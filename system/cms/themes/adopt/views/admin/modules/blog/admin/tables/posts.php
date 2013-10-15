	<ul class="container-fluid nopad journal-entries-list">
		<?php foreach ($blog as $post) : ?>
		<li class="row-fluid post clearfix">
			<div class="span2">
				<div class="image-shadow">
					<img src="http://www.adoptsites.loc/system/cms/themes/adopt/img/dashboard_sample.jpg"/>
				</div>
			</div>
			<div class="span10">
				<h6><?php echo $post->title ?></h6>
				<p><?php echo $post->intro ?></p>
				<a href="<?php echo site_url('admin/blog/edit/' . $post->id) ?>" title="<?php echo lang('global:edit')?>" class="btn btn-gray"><?php echo lang('global:edit')?></a>
				<a href="<?php echo site_url('admin/blog/delete/' . $post->id) ?>" title="<?php echo lang('global:delete')?>" class="btn btn-red"><?php echo lang('global:delete')?></a>
			</div>
		</li>
		<?php endforeach ?>
	</ul>

	<?php $this->load->view('admin/partials/pagination') ?>

	<br>

	<div class="table_action_buttons">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete', 'publish'))) ?>
	</div>