<div class="">
	<section class="title">
		<h4>Journal Entries <?php // echo lang('blog:posts_title') ?></h4>
	</section>

	<section class="item">
		<div class="content">
			<?php if ($blog) : ?>
				<?php // echo $this->load->view('admin/partials/filters') ?>
				<div class="clearfix journal-overview-intro">
				<p class="icon icon-pen pull-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<a class="btn btn-primary pull-right" href="/admin/blog/create/">Add New Post</a>
				</div>
				<?php echo form_open('admin/blog/action') ?>
					<div id="filter-stage">
						<?php echo $this->load->view('admin/modules/blog/admin/tables/posts') ?>
					</div>
				<?php echo form_close() ?>
			<?php else : ?>
				<div class="no_data"><?php echo lang('blog:currently_no_posts') ?></div>
			<?php endif ?>
		</div>
		<div class="expand">
			<a class="btn btn-primary" href="">See More</a>
		</div>
	</section>
	
</div>
