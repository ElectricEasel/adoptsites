<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Gallery Plugin
 *
 * Create a list of images
 *
 * @package		PyroCMS
 * @author		Jerel Unruh - PyroCMS Dev Team
 * @copyright	Copyright (c) 2008 - 2010, PyroCMS
 *
 */
class Plugin_Contactus extends Plugin
{
	protected $data = array();

	public function __construct()
	{
		$this->load->driver('Streams');

		$this->populateData();
	}

	protected function populateData()
	{
		$params = array(
			'stream' => 'contactus',
			'namespace' => 'contactus'
		);

		$contactus = $this->streams->entries->get_entries($params);

		if (count($contactus['entries']))
		{
			// Get the one and only entry
			$this->data = $contactus['entries'][0];
		}
	}


	public function __call($name, $args = null)
	{
		if (isset($this->data[$name]))
		{
			return $this->data[$name];
		}

		return null;
	}
}

/* End of file plugin.php */