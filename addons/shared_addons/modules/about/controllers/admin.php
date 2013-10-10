<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * FAQ Module
 *
 * This is a sample module for PyroCMS
 * that illustrates how to use the streams core API
 * for data management. It is also a fully-functional
 * FAQ module so feel free to use it on your sites.
 *
 * Most of these functions use the Streams API CP driver which
 * is designed to handle repetitive CP tasks, down to even loading the page.
 *
 * @author 		Adam Fairholm - PyroCMS Dev Team
 * @package 	PyroCMS
 * @subpackage 	Streams Sample Module
 *
 * @property Streams $streams
 * @property Fields  $fields
 */
class Admin extends Admin_Controller
{
    // This will set the active section tab
    protected $section = 'about';

    public function __construct()
    {
        parent::__construct();

	    $this->lang->load('about');
        $this->load->driver('Streams');
    }

    /**
     * Create a new FAQ entry
     *
     * We're using the entry_form function
     * to generate the form.
     *
     * @return	void
     */
    public function index()
    {
	    // We're using the streams API to
	    // do data setup.
	    $this->load->driver('Streams');

	    $this->load->language('about/about');

        $extra = array(
            'return' => 'admin/about',
            'success_message' => lang('about:submit_success'),
            'failure_message' => lang('about:submit_failure'),
            'title' => 'lang:about:edit',
         );

	    // Check to see if the original about entry has been created
	    $about = $this->streams->entries->get_entry(1, 'about', 'about');

	    $task = ($about === false) ? 'new' : 'edit';

	    $about = (object) array_map(function ($field) {
			    if (is_array($field))
			    {
			        if (isset($field['value']))
			        {
				        $field = $field['value'];
			        }

				    // For the state select.
				    if (isset($field['abbr']))
				    {
					    $field = $field['abbr'];
				    }
			    }

			    return $field;
		    }, (array) $about);

	    $data = array();
	    $data['fieldsets'] = $this->buildFieldsetArray();
	    $data['fields'] = $this->fields->build_form($this->streams->stream_obj('about', 'about'), $task, $about, false, false, array(), $extra);
	    $data['mode'] = $task;

	    // Make the fields keys the input_slug. This will make it easier to build tabs. Less looping.
	    foreach ($data['fields'] as $k => $v) {
		    $data['fields'][$v['input_slug']] = $v;
		    unset($data['fields'][$k]);
	    }

	    $this->template
		    ->append_js('streams/entry_form.js')
	        ->build('admin/form', $data);
    }

	/**
	 * @return array
	 */
	protected function buildFieldsetArray()
	{
		$fieldsets = array();
		$streamFields = Module_About::getFields();

		foreach ($streamFields as $k => $v)
		{
			if (!isset($fieldsets[$v['fieldset']]))
			{
				$fieldsets[$v['fieldset']] = array();
			}

			$fieldsets[$v['fieldset']][] = $v['slug'];
		}

		return $fieldsets;
	}

}