<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Email Template Events Class
 *
 * @package		PyroCMS
 * @subpackage	Email Templates
 * @category	events
 * @author		Stephen Cozart - PyroCMS Dev Team
 */
class Events_Templates {

    protected $ci;

    protected $fallbacks = array();

    public function __construct()
    {
        $this->ci =& get_instance();

        $this->fallbacks = array(
            'comments'	=> array('comments'	=> 'email/comment'),
            'contact'	=> array('contact'	=> 'email/contact')
        );

        //register the email event
        Events::register('email', array($this, 'send_email'));
    }

    public function send_email($data = array())
    {
        $this->ci =& get_instance();

        $slug = $data['slug'];
        unset($data['slug']);

        $this->ci->load->model('templates/email_templates_m');

		//get all email templates
		$templates = $this->ci->email_templates_m->get_templates($slug);

        //make sure we have something to work with
        if ( ! empty($templates))
        {
			$lang	  = isset($data['lang']) ? $data['lang'] : Settings::get('site_lang');
			$from	  = isset($data['from']) ? $data['from'] : Settings::get('server_email');
			$reply_to = isset($data['reply-to']) ? $data['reply-to'] : $from;
			$to		  = isset($data['to']) ? $data['to'] : Settings::get('contact_email');

            $subject = array_key_exists($lang, $templates) ? $templates[$lang]->subject : $templates['en']->subject ;
            $subject = $this->ci->parser->parse_string($subject, $data, TRUE);

            $body = array_key_exists($lang, $templates) ? $templates[$lang]->body : $templates['en']->body ;
            $body = $this->ci->parser->parse_string($body, $data, TRUE);

            $this->ci->email->from($from, $data['name']);
            $this->ci->email->reply_to($reply_to);
            $this->ci->email->to($to);
            $this->ci->email->subject($subject);
            $this->ci->email->message($body);
			
			// To send attachments simply pass an array of file paths in Events::trigger('email')
			// $data['attach'][] = /path/to/file.jpg
			// $data['attach'][] = /path/to/file.zip
			if (isset($data['attach']))
			{
				foreach ($data['attach'] AS $attach)
				{
					$this->ci->email->attach($attach['full_path']);
				}
			}

			return (bool) $this->ci->email->send();
        }

        //return false if we can't find the necessary templates
        return FALSE;
    }
}
/* End of file events.php */