<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is the multi-site management module
 *
 * @author 		Jerel Unruh - PyroCMS Dev Team
 * @website		http://unruhdesigns.com
 * @package 	PyroCMS Premium
 * @subpackage 	Site Manager Module
 */
class Create extends Sites_Controller
{
	public function __construct()
	{
		// First off set the db prefix
		$this->db->set_dbprefix('core_');

		// If we're on the MSM then we turn the session table off.
		$this->config->set_item('sess_use_database', false);

		// If using a URL not defined as a site, set this to stop the world ending
		defined('SITE_REF') or define('SITE_REF', 'core');

		// make sure they've ran the installer before trying to view our shiny panel
		$this->db->table_exists('sites') or redirect('installer');

		defined('ADMIN_THEME') or define('ADMIN_THEME', 'create');

		defined('MSMPATH') or redirect('404');

		// define folders that we need to create for each new site
		ci()->locations = $this->locations = array(
			APPPATH.'cache'	=> array(
				'simplepie'
			),
			'addons' => array(
				'modules',
				'widgets',
				'themes',
			),
			'uploads'	=> array(),
		);

		// Since we don't need to lock the lang with a setting like /admin and
		// the front-end we just define CURRENT_LANGUAGE exactly the same as AUTO_LANGUAGE
		defined('CURRENT_LANGUAGE') OR define('CURRENT_LANGUAGE', AUTO_LANGUAGE);

		// Load the Language files ready for output
		$this->lang->load(array('admin', 'buttons', 'global', 'sites/sites', 'users/user'));

		// Load all the required classes
		$this->load->model(array('sites_m', 'user_m', 'settings_m'));

		$this->load->library(array('session', 'form_validation', 'settings/settings'));
		$this->load->dbforge();

		// Work out module, controller and method and make them accessable throught the CI instance
		ci()->module = $this->module = $this->router->fetch_module();
		ci()->controller = $this->controller = $this->router->fetch_class();
		ci()->method = $this->method = $this->router->fetch_method();
		ci()->module_details = $this->module_details = array('slug' => 'sites');

		// Load helpers
		$this->load->helper('admin_theme');
		$this->load->helper('file');
		$this->load->helper('number');
		$this->load->helper('date');
		$this->load->helper('cookie');

		// Load ion_auth config so our user's settings (password length, etc) are in sync
		$this->load->config('users/ion_auth');

		// Set the theme as a path for Asset library
		Asset::add_path('theme', ADDONPATH . 'modules/create/themes/'.ADMIN_THEME.'/');
		Asset::set_path('theme');

		$this->template->add_theme_location(ADDONPATH . 'modules/create/themes/');

		// Template configuration
		$this->template
			->append_css('theme::common.css')
			->append_js('jquery/jquery.cooki.js')
			->enable_parser(false)
			->set('super_username', $this->session->userdata('super_username'))
			->set_theme(ADMIN_THEME)
			->set_layout('default', 'admin');

		// Set the validation rules
		$val_rules = array(
			array(
				  'field' => 'id',
			),
			array(
				'field'	=>	'user_id',
			),
			array(
				'field' => 'name',
				'label' => 'lang:site.descriptive_name',
				'rules' => 'trim|max_length[100]|required'
			),
			array(
				'field' => 'domain',
				'label' => 'lang:site.domain',
				'rules' => 'trim|callback__valid_domain|max_length[100]|required'
			),
			array(
				'field' => 'ref',
				'label' => 'lang:site.ref',
				'rules' => 'trim|alpha_dash|callback__underscore|min_length[1]|max_length[20]|required'
			),
			array(
				'field' => 'username',
				'label'	=> 'lang:user_username',
				'rules'	=> 'trim|required'
			),
			array(
				'field' => 'first_name',
				'label'	=> 'lang:user_first_name',
				'rules'	=> 'trim|required'
			),
			array(
				'field' => 'last_name',
				'label'	=> 'lang:user_last_name',
				'rules'	=> 'trim|required'
			),
			array(
				'field' => 'email',
				'label'	=> 'lang:user_email',
				'rules'	=> 'trim|required|valid_email'
			)
		);

		$val_create = array(
			array(
				'field' => 'password',
				'label'	=> 'lang:user_password',
				'rules'	=> 'trim|min_length[6]|required'
			)
		);

		$val_edit = array(
			array(
				'field' => 'password',
				'label'	=> 'lang:user_password',
				'rules'	=> 'trim'
			)
		);

		$this->site_validation_rules = array_merge($val_rules, ($this->method == 'create') ? $val_create : $val_edit);
	}

	/**
	 * List all sites
	 */
	public function index($offset = 0)
	{
		// Load the view
		$this->template
			->title('Create New Adopt Site')
			->set('description', lang('site:edit_site_desc'))
			->build('index');
	}

	/**
	 * Create the database records and all folders for a new site
	 */
	public function create()
	{
		$data = new stdClass();

		// Set the validation rules
		$this->form_validation->set_rules($this->site_validation_rules);

		if ($this->form_validation->run())
		{
			$ref = $this->input->post('ref');

			$this->load->config('migration');
			$this->load->library('module_import', $ref);

			// make sure there aren't orphaned folders from a previous install
			foreach ($this->locations AS $folder_check => $sub_folders)
			{

				if (is_dir($folder_check.'/'.$ref))
				{
					$data->messages['error'] = sprintf(lang('site:folder_exists'), $folder_check.'/'.$ref);

					foreach ($this->site_validation_rules AS $rule)
					{
						$data->{$rule['field']} = set_value($rule['field']);
					}

					// Load the view
					$this->template
						->title(lang('site:sites'), lang('site:create_site'))
						->set('description', lang('site:create_site_desc'))
						->build('form', $data);

					return;
				}
			}

			// make sure it doesn't already exist
			if ($this->sites_m->get_by('domain', $this->input->post('domain')))
			{
				$data->messages['notice'] = sprintf(lang('site:exists'), $this->input->post('domain'));
			}
			else
			{
				// Try to create the site
				$message = $this->sites_m->create_site($this->input->post());

				if ($message === true)
				{
					// All good...
					$this->session->set_flashdata('success', lang('site:create_success'));
					redirect('sites');
				}
				// There must be folders that aren't writeable
				elseif (is_array($message))
				{
					$html = '<ul>';

					foreach ($message AS $line)
					{
						$html .= '<li>' . $line . '</li>';
					}

					$html .= '</ul>';

					$data->messages['notice'] = sprintf(lang('site:create_manually'), $line);
				}
				else
				{
					$data->messages['error'] = lang('site:db_error');
				}
			}
		}

		foreach ($this->site_validation_rules as $rule)
		{
			$data->{$rule['field']} = set_value($rule['field']);
		}

		if (empty($data->domain))
		{
			$data->domain = preg_replace('#^www\.#', '', $this->input->server('SERVER_NAME'));
		}

		// Load the view
		$this->template
			->title(lang('site:sites'), lang('site:create_site'))
			->set('description', lang('site:create_site_desc'))
			->build('form', $data);
	}

	/**
	 * Nothing much... just edit an existing site
	 */
	public function edit($id = 0)
	{
		$data = $this->sites_m->get_site($id);

		// Set the validation rules
		$this->form_validation->set_rules($this->site_validation_rules);

		if ($this->form_validation->run())
		{
			$ref = $this->input->post('ref');

			// make sure it doesn't already exist
			if ($other = $this->sites_m->get_by('domain', $this->input->post('domain')) AND
				$data->id !== $other->id)
			{
				$data->messages['notice'] = sprintf(lang('site:exists'), $this->input->post('domain'));
			}
			elseif ( ($message = $this->sites_m->edit_site($this->input->post(), $data)) === true)
			{
				// All good...
				$this->session->set_flashdata('success', sprintf(lang('site:edit_success'), $data->name));
				redirect('sites');
			}
			elseif (is_array($message))
			{
				$html = '<ul>';

				foreach ($message AS $old => $new)
				{
					$html .= '<li>' . sprintf(lang('site:rename_manually'), $old, $new) . '</li>';
				}

				$html .= '</ul>';

				$data->messages['notice'] = sprintf(lang('site:rename_notice'), $html);
			}
			else
			{
				// couldn't save the record
				$data->messages['error'] = lang('site:db_error');
			}
		}

		// Load the view
		$this->template->title(lang('site:sites'), sprintf(lang('site:edit_site'), $data->name))
						->build('form', $data);
	}

	/**
	 * Redirects the admin to an extra confirmation page
	 */
	public function delete($id = 0)
	{
		if ($id > 0)
		{
			redirect('sites/confirm/'.$id);
		}
		redirect('sites');
	}

	/**
	 * If they're absolutely certain then we'll trash the site
	 */
	public function confirm($id = '')
	{
		$data = new stdClass();
		$site = $this->sites_m->get($id);

		if ($this->input->post('id') and $this->input->post('btnAction'))
		{
			$message = $this->sites_m->delete_site($id, $site);

			if ($message === true)
			{
				$this->session->set_flashdata('success', lang('site:site_deleted'));
				redirect('sites');
			}
			elseif (is_array($message))
			{
				$html = '<ul>';

				foreach ($message AS $folder)
				{
					$html .= '<li>' . $folder . '</li>';
				}

				$html .= '</ul>';

				$data->messages['notice'] = sprintf(lang('site:delete_manually'), $html);
			}
			else
			{
				// couldn't delete the record
				$data->messages['error'] = lang('site:delete_error');
			}
		}
		$this->template->set_layout('modal')
			->build('confirm', $site);
	}

	/**
	 * Get a few stats about the site
	 *
	 * @param	string	$id	The site id to fetch stats for
	 */
	public function stats($id = 0)
	{
		$data = new stdClass();
		$data->stats = $this->sites_m->get_stats($id);

		$this->template->set_layout('modal')
			->build('stats', $data);
	}

	/**
	 * Toggle the site's active/disabled status
	 *
	 * @param	string	$site_ref
	 * @param	int		$state	The checkbox state
	 * @return	bool
	 */
	public function status()
	{
		if ($this->sites_m->update_by('ref', $this->input->post('site_ref'), array('active' => $this->input->post('state'))) )
		{
			return print(json_encode(array('status' => 'success')));
		}
		else
		{
			return print(json_encode(array('status' => 'error')));
		}
	}

	public function _valid_domain($url)
	{
		return preg_replace('([^a-z0-9:._-]+)', '', $url);
	}

	public function _underscore($ref)
	{
		return str_replace('-', '_', $ref);
	}
}
