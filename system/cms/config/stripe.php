<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

defined('STRIPE_ENV') or define('STRIPE_ENV', 'development');

if (STRIPE_ENV === 'development') {
	$config['stripe_public_key'] = 'pk_test_gSDYCF8AVbgEmjrrJb6IOyIM';
	$config['stripe_private_key'] = 'sk_test_B2vU9FJZ7dTEbcFXYBQbD6zV';
} else {
	$config['stripe_public_key'] = 'sk_live_qv5TzzmY1QOlrvGlF8PfQBAp';
	$config['stripe_private_key'] = 'pk_live_cX9kA0XGjauBUQpmrolA20iY';
}