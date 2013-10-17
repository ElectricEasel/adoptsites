<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends Public_Controller
{

    /**
     * The constructor
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('contactus');
        $this->load->driver('Streams');
        $this->template->append_css('module::contactus.css');
    }
     /**
     * List all FAQs
     *
     * We are using the Streams API to grab
     * data from the faqs database. It handles
     * pagination as well.
     *
     * @access	public
     * @return	void
     */
    public function index()
    {
	    $data = array();
        $params = array(
            'stream' => 'contactus',
            'namespace' => 'contactus'
        );

        $about = $this->streams->entries->get_entries($params);

	    // Prevent the "undefined index" notice if the about page hasn't been created yet.
	    if (count($about['entries']))
	    {
		    // Get the one and only entry
		    $data = (array) $about['entries'][0];
	    }

        // Build the page
        $this->template
	        ->title($this->module_details['name'])
            ->build('index', $data);
    }

}

/* End of file faq.php */
