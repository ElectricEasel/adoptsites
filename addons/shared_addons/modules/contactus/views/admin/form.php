<?php echo form_open_multipart(uri_string(), 'class="streams_form"'); ?>
<div id="contact-form" class="custom-stream-form">
	<div id="contact-us">
		<section class="title">
			<h4>Contact Us</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<p>Some description text here blah blah blah blah blah blah blah blah.</p>
					<p><a href="#">Not Sure What To Say? See A Sample &raquo;</a></p>
				</div>
				<div class="span3">
					<?php echo $this->load->view('contactus/partials/field', $fields['contact_us_photo']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php echo $this->load->view('contactus/partials/field', $fields['contact_us']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="your-contact-information">
		<section class="title">
			<h4>Your Contact Information</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->load->view('contactus/partials/field', $fields['bm_phone_number']); ?>
				</div>
				<div class="span6">
					<?php echo $this->load->view('contactus/partials/field', $fields['bm_email_address']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->load->view('contactus/partials/field', $fields['email_address']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="social-media-accounts">
		<section class="title">
			<h4>Social Media Accounts</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->load->view('contactus/partials/social', $fields['facebook']); ?>
				</div>
				<div class="span6">
					<?php echo $this->load->view('contactus/partials/social', $fields['twitter']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->load->view('contactus/partials/social', $fields['flickr']); ?>
				</div>
				<div class="span6">
					<?php echo $this->load->view('contactus/partials/social', $fields['pinterest']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->load->view('contactus/partials/social', $fields['google_plus']); ?>
				</div>
				<div class="span6">
					<?php echo $this->load->view('contactus/partials/social', $fields['instagram']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
</div>
<?php echo ($mode == 'edit') ? form_hidden('row_edit_id', 1) : ''; ?>
<?php echo form_close();?>
