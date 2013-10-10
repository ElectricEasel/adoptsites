<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends Public_Controller
{

    /**
     * The constructor
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('about');
        $this->load->driver('Streams');
        $this->template->append_css('module::about.css');
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
        $params = array(
            'stream' => 'about',
            'namespace' => 'about'
        );

        $about = $this->streams->entries->get_entries($params);

	    // Get the one and only entry
	    $data['about'] = $about['entries'][0];

        // Build the page
        $this->template->title($this->module_details['name'])
                ->build('index', $data);
    }

}

/* End of file faq.php */
