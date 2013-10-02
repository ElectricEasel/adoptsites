<?php defined('BASEPATH') or die;

class Events_Files
{
	protected $ci;

	public function __construct()
	{
		$this->ci = ci();

		Events::register('file_folder_created', array($this, 'createGalleryFromNewFolder'));
	}

	public function createGalleryFromNewFolder($data)
	{
		// Logic to create a gallery when a new folder is created.

	}
}