<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Gallery extends Module {

	public $version = '1.0';

	public function info()
	{
		return array(
			'name' => array(
				'en' => 'Gallery'
			),
			'description' => array(
				'en' => 'The galleries module is a simple module that lets users display images from Files.'
			),
			'frontend' => true,
			'backend' => false
		);
	}

	public function install()
	{
		return true;
	}

	public function uninstall()
	{
		return true;
	}


	public function upgrade($old_version)
	{
		return true;
	}

	public function help()
	{
		return true;
	}
}
/* End of file details.php */