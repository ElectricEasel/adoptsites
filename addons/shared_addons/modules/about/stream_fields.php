<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

return array(
    array(
        'name' => 'Preferred Race',
        'slug' => 'preferred_race',
        'type' => 'choice',
	    'fieldset' => 'snapshot',
        'extra' => array(
		    'choice_type' => 'dropdown',
	        'default_value' => 'No Preference',
		    'choice_data' =>
		        'Caucasian
				Hispanic
				Asian
				Native American
				African American / Caucasian
				African American / Hispanic
				Hispanic / Caucasian
				Hispanic / Other
				Asian / Caucasian
				Other',
	    )
    ),
    array(
	    'name' => 'Preferred Gender',
	    'slug' => 'preferred_gender',
	    'type' => 'choice',
	    'fieldset' => 'snapshot',
	    'extra' => array(
		    'choice_type' => 'dropdown',
		    'default_value' => 'No Preference',
		    'choice_data' =>
			    'Boy
				Girl'
	    )
    ),
	array(
		'name' => 'Preferred Age',
		'slug' => 'preferred_age',
		'type' => 'choice',
		'fieldset' => 'snapshot',
		'extra' => array(
			'choice_type' => 'dropdown',
			'default_value' => 'No Preference',
			'choice_data' =>
				'0-3 months
				3-6 months
				6-12 months
				12-18 months
				18-24 months'
		)
	),
	array(
		'name' => 'Type of Adoption',
		'slug' => 'type_of_adoption',
		'type' => 'choice',
		'fieldset' => 'snapshot',
		'extra' => array(
			'choice_type' => 'dropdown',
			'default_value' => 'No Preference',
			'choice_data' =>
				'Open
				Closed
				Semi-Open'
		)
	),
	array(
		'name' => 'Special Needs',
		'slug' => 'special_needs',
		'type' => 'choice',
		'fieldset' => 'snapshot',
		'extra' => array(
			'choice_type' => 'dropdown',
			'default_value' => 'No Preference',
			'choice_data' =>
				'Yes
				No'
		)
	),
	array(
		'name' => 'State',
		'slug' => 'state',
		'type' => 'state',
	    'fieldset' => 'snapshot',
	),
	array(
		'name' => 'Family Type',
		'slug' => 'family_type',
		'type' => 'choice',
		'fieldset' => 'snapshot',
		'extra' => array(
			'choice_type' => 'dropdown',
			'default_value' => 'Please Select',
			'choice_data' =>
				'Single
				Married
				LGBT'
		)
	),

	// Our Story
	//----------
	array(
		'name' => 'Our Story Photo',
		'slug' => 'our_story_photo',
		'fieldset' => 'our-story',
		'type' => 'file_select'
	),
	array(
		'name' => 'Our Story',
		'slug' => 'our_story',
		'fieldset' => 'our-story',
		'type' => 'textarea'
	),

	// Our Home
	//---------
	array(
		'name' => 'Our Home Photo',
		'slug' => 'our_home_photo',
		'fieldset' => 'our-home',
		'type' => 'file_select'
	),
	array(
		'name' => 'Our Home',
		'slug' => 'our_home',
		'fieldset' => 'our-home',
		'type' => 'textarea',
	),

	// Parent 1
	//---------
	array(
		'name' => 'About Parent 1 Photo',
		'slug' => 'parent_1_about_photo',
		'fieldset' => 'parent-1',
		'type' => 'file_select'
	),
	array(
		'name' => 'About Parent 1',
		'slug' => 'parent_1_about',
		'fieldset' => 'parent-1',
		'type' => 'textarea'
	),
	array (
		'name' => 'Parent 1 Education',
		'slug' => 'parent_1_education',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Profession',
		'slug' => 'parent_1_profession',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Religion',
		'slug' => 'parent_1_religion',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Age',
		'slug' => 'parent_1_age',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Ethnicity',
		'slug' => 'parent_1_ethnicity',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Favorite Sport',
		'slug' => 'parent_1_fav_sport',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Favorite Holiday',
		'slug' => 'parent_1_fav_holiday',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Favorite Book',
		'slug' => 'parent_1_fav_book',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Favorite School Subject',
		'slug' => 'parent_1_fav_school_subhect',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Favorite Childhood Toy',
		'slug' => 'parent_1_fav_childhood_toy',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Favorite Tradition',
		'slug' => 'parent_1_fav_tradition',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 1 Favorite Family Activity',
		'slug' => 'parent_1_fav_family_activity',
		'fieldset' => 'parent-1',
		'type' => 'text'
	),

	// Parent 2
	//---------
	array(
		'name' => 'About Parent 2 Photo',
		'slug' => 'parent_2_about_photo',
		'fieldset' => 'parent-2',
		'type' => 'file_select'
	),
	array(
		'name' => 'About Parent 2',
		'slug' => 'parent_2_about',
		'fieldset' => 'parent-2',
		'type' => 'textarea'
	),
	array (
		'name' => 'Parent 2 Education',
		'slug' => 'parent_2_education',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Profession',
		'slug' => 'parent_2_profession',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Religion',
		'slug' => 'parent_2_religion',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Age',
		'slug' => 'parent_2_age',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Ethnicity',
		'slug' => 'parent_2_ethnicity',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Favorite Sport',
		'slug' => 'parent_2_fav_sport',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Favorite Holiday',
		'slug' => 'parent_2_fav_holiday',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Favorite Book',
		'slug' => 'parent_2_fav_book',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Favorite School Subject',
		'slug' => 'parent_2_fav_school_subhect',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Favorite Childhood Toy',
		'slug' => 'parent_2_fav_childhood_toy',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Favorite Tradition',
		'slug' => 'parent_2_fav_tradition',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),
	array (
		'name' => 'Parent 2 Favorite Family Activity',
		'slug' => 'parent_2_fav_family_activity',
		'fieldset' => 'parent-2',
		'type' => 'text'
	),

	// Our Children
	//-------------
	array(
		'name' => 'Our Children Photo',
		'slug' => 'our_children_photo',
		'fieldset' => 'our-children',
		'type' => 'file_select'
	),
	array(
		'name' => 'Our Children',
		'slug' => 'our_children',
		'fieldset' => 'our-children',
		'type' => 'textarea'
	),

	// Our Family Traditions
	//----------------------
	array(
		'name' => 'Our Family Traditions Photo',
		'slug' => 'our_family_traditions_photo',
		'fieldset' => 'our-family-traditions',
		'type' => 'file_select'
	),
	array(
		'name' => 'Our Family Traditions',
		'slug' => 'our_family_traditions',
		'fieldset' => 'our-family-traditions',
		'type' => 'textarea'
	),

	// Our Extended Family
	//--------------------
	array(
		'name' => 'Our Extended Family Photo',
		'slug' => 'our_extended_family_photo',
		'fieldset' => 'our-extended-family',
		'type' => 'file_select'
	),
	array(
		'name' => 'Our Extended Family',
		'slug' => 'our_extended_family',
		'fieldset' => 'our-extended-family',
		'type' => 'textarea'
	),

	// What led us to adoption
	//------------------------
	array(
		'name' => 'What Led Us To Adoption Photo',
		'slug' => 'what_led_us_to_adoption_photo',
		'fieldset' => 'what-led-us-to-adoption',
		'type' => 'file_select'
	),
	array(
		'name' => 'What Led Us To Adoption',
		'slug' => 'what_led_us_to_adoption',
		'fieldset' => 'what-led-us-to-adoption',
		'type' => 'textarea'
	),

	// What we do for fun
	//-------------------
	array(
		'name' => 'What We Do For Fun Photo',
		'slug' => 'what_we_do_for_fun_photo',
		'fieldset' => 'what-we-do-for-fun',
		'type' => 'file_select'
	),
	array(
		'name' => 'What We Do For Fun',
		'slug' => 'what_we_do_for_fun',
		'fieldset' => 'what-we-do-for-fun',
		'type' => 'textarea'
	),
);