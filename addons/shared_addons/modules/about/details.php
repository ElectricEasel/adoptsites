<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class Module_About
 *
 * @property Streams $streams
 */
class Module_About extends Module
{
    public $version = '1.0';

    public function info()
    {
        return array(
            'name' => array(
                'en' => 'About Page'
            ),
            'description' => array(
                'en' => 'About Us Section of the site.'
            ),
            'frontend' => true,
            'backend' => true,
            'menu' => 'content',
            'sections' => array(
                'about' => array(
                    'name' => 'about:about',
                    'uri' => 'admin/about'
                )
            )
        );
    }

    /**
     * Install
     *
     * This function will set up our
     * FAQ/Category streams.
     */
    public function install()
    {
        // We're using the streams API to
        // do data setup.
        $this->load->driver('Streams');

        $this->load->language('about/about');

        // Add about streams
        if ( ! $this->streams->streams->add_stream('lang:about:title', 'about', 'about', 'about_', null)) return false;

	    // Include the fields for this stream.
	    $fields = self::getFields();

	    // Assign all the fields to the 'about' namespace
	    $this->streams->fields->add_fields(array_map(function($field) {
				    $field['namespace'] = $field['assign'] = 'about';

				    return $field;
			    }, $fields));

        return true;
    }

	/**
	 * Method to get the fields array.
	 * @return array
	 */
	public static function getFields()
	{
		return include __DIR__ . '/stream_fields.php';
	}

    /**
     * Uninstall
     *
     * Uninstall our module - this should tear down
     * all information associated with it.
     */
    public function uninstall()
    {
        $this->load->driver('Streams');

        // For this teardown we are using the simple remove_namespace
        // utility in the Streams API Utilties driver.
        $this->streams->utilities->remove_namespace('about');

        return true;
    }

    public function upgrade($old_version)
    {
        return true;
    }

    public function help()
    {
        // Return a string containing help info
        // You could include a file and return it here.
        return "No documentation has been added for this module.<br />Contact the module developer for assistance.";
    }

}