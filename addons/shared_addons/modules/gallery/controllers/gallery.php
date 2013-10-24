<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * The gallery module enables users to create albums, upload photos and manage their existing albums.
 *
 * @author 		PyroCMS Dev Team
 * @package 	PyroCMS
 * @subpackage 	Gallery Module
 * @category 	Modules
 * @license 	Apache License v2.0
 *
 * @property    File_folders_m $file_folders_m
 * @property    File_m $file_m
 */
class Gallery extends Public_Controller
{
	/**
	 * Constructor method
	 *
	 * @author PyroCMS Dev Team
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->add_package_path(APPPATH . 'modules/files');
		
		// Load the required classes
		$this->load->model('file_m');
		$this->load->model('file_folders_m');
		$this->load->helper('html');
		
		//Load pagination library
		$this->load->library('pagination');
	}

	public function index()
	{
		$folders = $this->file_folders_m->get_folders();

		foreach ($folders as $folder)
		{
			$folder->files = $this->file_m->get_many_by('folder_id', $folder->id);
		}

		$this->template
			->append_js('module::masonry.min.js')
			->append_js('module::imagesloaded.min.js')
			->append_js('module::gallery.js')
			->title($this->module_details['name'])
	        ->set('albums', $folders)
	        ->build('index');
	}
}