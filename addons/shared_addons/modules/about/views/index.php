<div id="profile-intro" class="sub-page about right clearfix">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span6 family-info">
				<h2>About Us</h2>
				<h3>Liam &amp; Julie Snapshot</h3>
				<div class="row-fluid">
					<div class="span7">
						<h5>Adoption Preferences</h5>
						<dl id="adoption-preferences" class="clearfix">
							<dt>Race:</dt>
							<dd>{{ preferred_race.value }}</dd>

							<dt>Gender:</dt>
							<dd>{{ preferred_gender.value }}</dd>

							<dt>Age:</dt>
							<dd>{{ preferred_age.value }}</dd>

							<dt>Special Needs:</dt>
							<dd>{{ special_needs.value }}</dd>

							<dt>Type of Adoption:</dt>
							<dd>{{ type_of_adoption.value }}</dd>
						</dl>
					</div>
					<div class="span5">
						<h5>About Our Family</h5>
						<dl id="about-family" class="clearfix">
							<dt>State:</dt>
							<dd>{{ state.abbr }}</dd>

							<dt>Children:</dt>
							<dd>None</dd>

							<dt>Pets:</dt>
							<dd>One dog and one cat</dd>
						</dl>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="contact clearfix">
					<p>{{ contact.bm_phone_number }} <span class="bull">&bull;</span> <a href="mailto:{{ contact.bm_email_address }}"">{{ contact.bm_email_address }}</a></p>
					<ul class="social">
						{{ if contact.twitter }}
						<li>
							<a href="{{ contact.twitter }}" class="twitter"></a>
						</li>
						{{ endif }}
						{{ if contact.flickr }}
						<li>
							<a href="{{ contact.flickr }}" class="flickr"></a>
						</li>
						{{ endif }}
						{{ if contact.facebook }}
						<li>
							<a href="{{ contact.facebook }}" class="facebook"></a>
						</li>
						{{ endif }}
						{{ if contact.pinterest }}
						<li>
							<a href="{{ contact.pinterest }}" class="pinterest"></a>
						</li>
						{{ endif }}
						{{ if contact.google_plus }}
						<li>
							<a href="{{ contact.google_plus }}" class="googleplus"></a>
						</li>
						{{ endif }}
					</ul>
					<a class="button button-pink" href="{{ site_url }}/contact">Send Us A Message</a>
				</div>
				<div class="main-pic">
					<img src="/files/thumb/{{ our_story_photo }}/585/1000" alt=""/>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<article id="about" class="span9">
			{{ if our_story }}
			<section class="family-story row-fluid clearfix">
				{{ if our_story_photo }}
				<div class="span4">
					<img src="/files/thumb/{{ our_story_photo }}/200/1000" alt=""/>
				</div>
				<div class="span8">
				{{ else }}
				<div class="span12">
				{{ endif }}
					<h3>Our Story</h3>
					<p>{{ our_story }}</p>
				</div>
			</section>
			{{ endif }}
			{{ if our_home }}
			<section class="family-home row-fluid clearfix">
				{{ if our_home_photo }}
				<div class="span4">
					<img src="/files/thumb/{{ our_home_photo }}/200/1000" alt=""/>
				</div>
				<div class="span8">
				{{ else }}
				<div class="span12">
				{{ endif }}
					<h3>Our Home</h3>
					<p>{{ our_home }}</p>
				</div>
			</section>
			{{ endif }}
			{{ if parent_1_about }}
			<section class="about-me row-fluid clearfix">
				{{ if parent_1_about_photo }}
				<div class="span4">
					<img src="/files/thumb/{{ parent_1_about_photo }}/200/1000" alt=""/>
				</div>
				<div class="span8">
				{{ else }}
				<div class="span12">
				{{ endif }}
					<h3>About Liam</h3>
					<p>{{ parent_1_about }}</p>
				</div>
			</section>
			{{ endif }}
			{{ if parent_2_about }}
			<section class="about-spouse row-fluid clearfix">
				{{ if parent_2_about_photo }}
				<div class="span4">
					<img src="/files/thumb/{{ parent_2_about_photo }}/200/1000" alt=""/>
				</div>
				<div class="span8">
					{{ else }}
					<div class="span12">
						{{ endif }}
						<h3>About Julie</h3>
						<p>{{ parent_2_about }}</p>
					</div>
			</section>
			{{ endif }}
			{{ if our_family_traditions }}
			<section class="about-spouse row-fluid clearfix">
				{{ if our_family_traditions_photo }}
				<div class="span4">
					<img src="/files/thumb/{{ our_family_traditions_photo }}/200/1000" alt=""/>
				</div>
				<div class="span8">
				{{ else }}
				<div class="span12">
				{{ endif }}
					<h3>Our Family Traditions</h3>
					<p>{{ our_family_traditions }}</p>
				</div>
			</section>
			{{ endif }}
			{{ if what_we_do_for_fun }}
			<section class="for-fun row-fluid clearfix">
				{{ if what_we_do_for_fun_photo }}
				<div class="span4">
					<img src="/files/thumb/{{ what_we_do_for_fun_photo }}/200/1000" alt=""/>
				</div>
				<div class="span8">
				{{ else }}
				<div class="span12">
				{{ endif }}
					<h3>What We Do For Fun</h3>
					<p>{{ what_we_do_for_fun }}</p>
				</div>
			</section>
			{{ endif }}
			{{ if what_led_us_to_adoption }}
			<section class="led-to-adoption row-fluid clearfix">
				{{ if what_led_us_to_adoption_photo }}
				<div class="span4">
					<img src="/files/thumb/{{ what_led_us_to_adoption_photo }}/200/1000" alt=""/>
				</div>
				<div class="span8">
				{{ else }}
				<div class="span12">
				{{ endif }}
					<h3>What Led Us to Adoption</h3>
					<p>{{ what_led_us_to_adoption }}</p>
				</div>
			</section>
			{{ endif }}
		</article>
		<div id="sidebar" class="span3">
			<aside class="facts my-facts">
				<h4>Facts About <span>Liam</span></h4>
				<dl class="clearfix">
					<dt>Education</dt>
					<dd>{{ parent_1_education }}</dd>

					<dt>Profession</dt>
					<dd>{{ parent_1_profession }}</dd>

					<dt>Religion</dt>
					<dd>{{ parent_1_religion }}</dd>

					<dt>Age</dt>
					<dd>{{ parent_1_age }}</dd>

					<dt>Ethnicity</dt>
					<dd>{{ parent_1_ethnicity }}</dd>

					<dt>Favorite Sport</dt>
					<dd>{{ parent_1_fav_sport }}</dd>

					<dt>Favorite Holiday</dt>
					<dd>{{ parent_1_fav_holiday }}</dd>

					<dt>Favorite Book</dt>
					<dd>{{ parent_1_fav_book }}</dd>

					<dt>Favorite School Subject</dt>
					<dd>{{ parent_1_fav_school_subject }}</dd>

					<dt>Favorite Childhood Toy</dt>
					<dd>{{ parent_1_fav_childhood_toy }}</dd>

					<dt>Favorite Tradition</dt>
					<dd>{{ parent_1_fav_tradition }}</dd>

					<dt>Favorite Family Activity</dt>
					<dd>{{ parent_1_fav_family_activity }}</dd>
				</dl>
			</aside>

			<aside class="facts spouse-facts">
				<h4>Facts About <span>Julie</span></h4>
				<dl class="clearfix">
					<dt>Education</dt>
					<dd>{{ parent_2_education }}</dd>

					<dt>Profession</dt>
					<dd>{{ parent_2_profession }}</dd>

					<dt>Religion</dt>
					<dd>{{ parent_2_religion }}</dd>

					<dt>Age</dt>
					<dd>{{ parent_2_age }}</dd>

					<dt>Ethnicity</dt>
					<dd>{{ parent_2_ethnicity }}</dd>

					<dt>Favorite Sport</dt>
					<dd>{{ parent_2_fav_sport }}</dd>

					<dt>Favorite Holiday</dt>
					<dd>{{ parent_2_fav_holiday }}</dd>

					<dt>Favorite Book</dt>
					<dd>{{ parent_2_fav_book }}</dd>

					<dt>Favorite School Subject</dt>
					<dd>{{ parent_2_fav_school_subject }}</dd>

					<dt>Favorite Childhood Toy</dt>
					<dd>{{ parent_2_fav_childhood_toy }}</dd>

					<dt>Favorite Tradition</dt>
					<dd>{{ parent_2_fav_tradition }}</dd>

					<dt>Favorite Family Activity</dt>
					<dd>{{ parent_2_fav_family_activity }}</dd>
				</dl>
			</aside>
		</div>
	</div>
</div>