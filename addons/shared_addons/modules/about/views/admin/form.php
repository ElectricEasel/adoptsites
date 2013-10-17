<?php echo form_open_multipart(uri_string(), 'class="streams_form"'); ?>
<div id="about-form" class="custom-stream-form">
	<div id="snapshot">
		<section class="title">
			<h4>Snapshot</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['preferred_race']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['preferred_gender']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['preferred_age']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['type_of_adoption']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['special_needs']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['state']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['family_type']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="our-story">
		<section class="title">
			<h4>Our Story</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<p>Some description text here blah blah blah blah blah blah blah blah.</p>
					<p><a href="#">Not Sure What To Say? See A Sample &raquo;</a></p>
				</div>
				<div class="span3">
					<?php echo $this->load->view('about/partials/field', $fields['our_story_photo']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php echo $this->load->view('about/partials/field', $fields['our_story']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="our-home">
		<section class="title">
			<h4>Our Home</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<p>Some description text here blah blah blah blah blah blah blah blah.</p>
					<p><a href="#">Not Sure What To Say? See A Sample &raquo;</a></p>
				</div>
				<div class="span3">
					<?php echo $this->load->view('about/partials/field', $fields['our_home_photo']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php echo $this->load->view('about/partials/field', $fields['our_home']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="parent-1">
		<section class="title">
			<h4>Parent 1</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<p>Some description text here blah blah blah blah blah blah blah blah.</p>
					<p><a href="#">Not Sure What To Say? See A Sample &raquo;</a></p>
				</div>
				<div class="span3">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_about_photo']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_about']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_education']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_profession']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_religion']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_age']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_ethnicity']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_fav_sport']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_fav_holiday']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_fav_book']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_fav_school_subhect']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_fav_childhood_toy']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_fav_tradition']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_1_fav_family_activity']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="parent-2">
		<section class="title">
			<h4>Parent 2</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<p>Some description text here blah blah blah blah blah blah blah blah.</p>
					<p><a href="#">Not Sure What To Say? See A Sample &raquo;</a></p>
				</div>
				<div class="span3">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_about_photo']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_about']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_education']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_profession']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_religion']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_age']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_ethnicity']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_fav_sport']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_fav_holiday']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_fav_book']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_fav_school_subhect']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_fav_childhood_toy']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_fav_tradition']); ?>
				</div>
				<div class="span4">
					<?php echo $this->load->view('about/partials/field', $fields['parent_2_fav_family_activity']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="our-children">
		<section class="title">
			<h4>Our Children</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<p>Some description text here blah blah blah blah blah blah blah blah.</p>
					<p><a href="#">Not Sure What To Say? See A Sample &raquo;</a></p>
				</div>
				<div class="span3">
					<?php echo $this->load->view('about/partials/field', $fields['our_children_photo']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php echo $this->load->view('about/partials/field', $fields['our_children']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="our-family-traditions">
		<section class="title">
			<h4>Our Family Traditions</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<p>Some description text here blah blah blah blah blah blah blah blah.</p>
					<p><a href="#">Not Sure What To Say? See A Sample &raquo;</a></p>
				</div>
				<div class="span3">
					<?php echo $this->load->view('about/partials/field', $fields['our_family_traditions_photo']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php echo $this->load->view('about/partials/field', $fields['our_family_traditions']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="our-extended-family">
		<section class="title">
			<h4>Our Extended Family</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<p>Some description text here blah blah blah blah blah blah blah blah.</p>
					<p><a href="#">Not Sure What To Say? See A Sample &raquo;</a></p>
				</div>
				<div class="span3">
					<?php echo $this->load->view('about/partials/field', $fields['our_extended_family_photo']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php echo $this->load->view('about/partials/field', $fields['our_extended_family']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="what-led-us-to-adoption">
		<section class="title">
			<h4>What Led Us To Adoption </h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<p>Some description text here blah blah blah blah blah blah blah blah.</p>
					<p><a href="#">Not Sure What To Say? See A Sample &raquo;</a></p>
				</div>
				<div class="span3">
					<?php echo $this->load->view('about/partials/field', $fields['what_led_us_to_adoption_photo']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php echo $this->load->view('about/partials/field', $fields['what_led_us_to_adoption']); ?>
				</div>
			</div>
		</div>
		<div class="footer">
			<button type="submit" class="btn btn-primary">
				Save Changes
			</button>
		</div>
	</div>
	<div id="what-we-do-for-fun">
		<section class="title">
			<h4>What We Do For Fun</h4>
		</section>
		<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<p>Some description text here blah blah blah blah blah blah blah blah.</p>
					<p><a href="#">Not Sure What To Say? See A Sample &raquo;</a></p>
				</div>
				<div class="span3">
					<?php echo $this->load->view('about/partials/field', $fields['what_we_do_for_fun_photo']); ?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<?php echo $this->load->view('about/partials/field', $fields['what_we_do_for_fun']); ?>
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
