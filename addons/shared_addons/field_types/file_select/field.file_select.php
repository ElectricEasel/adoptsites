<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * PyroStreams File Select Field Type
 *
 * @package		PyroCMS\addons\shared_addons\Field Types
 * @author		Don Gilbert
 */
class Field_file_select
{
	/**
	 * @var array Author Information
	 */
	public $author = array(
		'name' => 'Don Gilbert',
		'url' => 'http://dongilbert.net'
	);

	/**
	 * @var string Version Number
	 */
	public $version = '1.0';

	/**
	 * @var string Field Type Name
	 */
	public $field_type_name = 'File Select';

	/*
	 * @var string Field Type Slug
	 */
	public $field_type_slug = 'file_select';

	/**
	 * @var string DB Column Type (varchar|text|int)
	 */
	public $db_col_type = 'varchar';

	/**
	 * Automatically injected global CI Instance
	 *
	 * @var MY_Controller
	 */
	public $CI;

	/**
	 * Holds the initialized state for this field.
	 *
	 * @var bool
	 */
	protected static $initialized = false;

	/**
	 * Output form input
	 *
	 * @param array $data Array of data about the current field.
	 * Example: [
	 *              'form_slug' => 'current_field_slug',
	 *              'custom' => [], // array of custom data
	 *              'value' => 'value of field if present',
	 *              'max_length' => null // actual max length if set
	 *          ]
	 *
	 * @return string
	 */
	public function form_output(array $data = array())
	{
		$this->initialize();

		if (isset($data['value']))
		{
			$data['preview'] = '/files/thumb/' . $data['value'] . '/200/150/fit';
		}
		else
		{
			$data['preview'] = 'http://placehold.it/200x150.png';
		}

		return $this->loadView('input', $data);
	}

	/**
	 * Method to lazy load the content of the file select modal via AJAX.
	 *
	 * Accessible via XHR @ /streams_core/public_ajax/field/file_select/modal
	 *
	 * @return string
	 */
	public function ajax_modal()
	{
		$this->CI->load->library('files/files');
		$this->CI->lang->load('files/files');
		$data = array();

		$data['files'] = $this->CI->file_m->get_all();

		return $this->loadView('modal', $data);
	}

	// Here be dragons!
	//------------------------------------------

	/**
	 * Initialize the field by adding the CSS and JS.
	 *
	 * @return void
	 */
	protected function initialize()
	{
		if (! self::$initialized)
		{
			$this
				->addJs('file_select.js')
				->addCss('file_select.css');

			self::$initialized = true;
		}
	}

	/**
	 * Convenience method for adding a CSS file.
	 *
	 * @param string $file The file to add.
	 *
	 * @return Field_file_select
	 */
	protected function addCss($file)
	{
		$this->CI->type->add_css($this->field_type_slug, $file);

		return $this;
	}

	/**
	 * Convenience method for adding a JS file.
	 *
	 * @param string $file The file to add.
	 *
	 * @return Field_file_select
	 */
	protected function addJs($file)
	{
		$this->CI->type->add_js($this->field_type_slug, $file);

		return $this;
	}

	/**
	 * Convenience method for loading a view.
	 *
	 * @param string $file The view file to parse and load.
	 * @param array  $data An array of data to pass to the view.
	 *
	 * @return string The rendered view file.
	 */
	protected function loadView($view, $data = array())
	{
		$this->CI->load->library('parser');

		$content = $this->CI->type->load_view($this->field_type_slug, $view, $data, true);

		return $this->CI->parser->parse_string($content, $data, true);
	}
}
