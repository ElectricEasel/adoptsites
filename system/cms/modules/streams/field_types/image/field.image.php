<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * PyroStreams Image Field Type
 *
 * @package		PyroStreams
 * @author		Parse19
 * @copyright	Copyright (c) 2011, Parse19
 * @license		http://parse19.com/pyrostreams/license
 * @link		http://parse19.com/pyrostreams
 */
class Field_image
{
	public $field_type_name 		= 'Image';
	
	public $field_type_slug			= 'image';
	
	public $db_col_type				= 'int';

	public $custom_parameters		= array('folder', 'resize_width', 'resize_height', 'allowed_types');

	public $version					= '1.0';

	public $author					= array('name'=>'Parse19', 'url'=>'http://parse19.com');

	public $lang					= array(
	
		'en'	=> array(
				'folder'		=> 'Upload Folder',
				'resize_width'	=> 'Resize Width',
				'resize_height'	=> 'Resize Height',
				'allowed_types'	=> 'Allowed Types'
		)
	
	);			
	
	public $input_is_file				= TRUE;

	// --------------------------------------------------------------------------
	
	function __construct()
	{
		$this->CI =& get_instance();
	}
	
	// --------------------------------------------------------------------------

	/**
	 * Output form input
	 *
	 * @param	array
	 * @param	array
	 * @return	string
	 */
	public function form_output( $params )
	{
		$this->CI->load->config('files/files');
		
		// Output the image
		
		// Get the file
		
		$this->CI->db->limit(1);
		$this->CI->db->where('id', $params['value']);
		$db_obj = $this->CI->db->get('files');
		
		$out = '';
		
		if( $db_obj->num_rows() != 0 ):
			
			// Div for the PyroCMS admin
			/*if( $this->CI->uri->segment(1) == 'admin' ):
			
				$out .= '<div style="float: left;">';
				
			endif;*/

			$out .= $this->_output_thumb( $db_obj->row(), TRUE ).br();
	
		else:
		
			$out .= '';
		
		endif;
		
		// Output the actual used value
		
		if( is_numeric($params['value']) ):
		
			$out .= form_hidden( $params['form_slug'], $params['value'] );
		
		else:

			$out .= form_hidden( $params['form_slug'], 'dummy' );
		
		endif;

		$options['name'] 	= $params['form_slug'];
		$options['name'] 	= $params['form_slug'].'_file';

		//if( $this->CI->uri->segment(1) == 'admin' ): $out .= '</div>'; endif;
		
		return $out .= form_upload( $options );
	}

	// --------------------------------------------------------------------------

	/**
	 * Process before saving to database
	 *
	 * @access	public
	 * @param	array
	 * @param	obj
	 * @return	string
	 */
	public function pre_save( $input, $field )
	{	
		// Only go through the pre_save upload if there is a file ready to go
		if( isset($_FILES[$field->field_slug.'_file']['name']) && $_FILES[$field->field_slug.'_file']['name'] != '' ):
		
			// Do nothing
			
		else:
		
			// If we have a file already just return that value
			if( is_numeric($this->CI->input->post( $field->field_slug )) ):
		
				return $this->CI->input->post( $field->field_slug );
		
			else:
			
				return;
			
			endif;
				
		endif;
	
		$this->CI->load->model('files/file_m');
		
		$this->CI->load->config('files/files');

		// Set upload data
		$upload_config['upload_path'] 		= FCPATH . $this->CI->config->item('files_folder') . '/';
		
		// Set allowed types to all if there is none
		if(trim($field->field_data['allowed_types']) == ''):

			$upload_config['allowed_types'] 	= '*';
		
		else:
		
			$upload_config['allowed_types'] 	= $field->field_data['allowed_types'];
		
		endif;

		// Do the upload

		$this->CI->load->library('upload', $upload_config);

		if( ! $this->CI->upload->do_upload( $field->field_slug . '_file' ) ):
		
			$this->CI->session->set_flashdata('notice', 'The following errors occurred when adding your file: '.$this->CI->upload->display_errors());	
			
			return;
		
		else:
		
			$image = $this->CI->upload->data();
			
			// We are going to use the PyroCMS way here.
			
			$this->CI->load->library('image_lib');
			
			$img_config = array();
			
			// -------------------------------------
			// No matter what, we make a thumb
			// -------------------------------------
			
			if( $image['image_width'] > 200 ):
					
				$img_config['source_image']		= FCPATH . $this->CI->config->item('files_folder') . '/'.$image['file_name'];
				$img_config['create_thumb'] 	= TRUE;
				$img_config['maintain_ratio'] 	= TRUE;
				$img_config['width']	 		= 200;
				$img_config['height']	 		= 1;
				$img_config['master_dim']	 	= 'width';
				
				$this->CI->image_lib->initialize($img_config);
				
				$this->CI->image_lib->resize();
							
				$this->CI->image_lib->clear();

			endif;
			
			// -------------------------------------
			// Resize
			// -------------------------------------
			
			if( is_numeric($field->field_data['resize_width']) ):
			
				$img_config['source_image']		= FCPATH . $this->CI->config->item('files_folder') . '/'.$image['file_name'];
				$img_config['quality']			= '100%';
				$img_config['create_thumb'] 	= FALSE;
				$img_config['maintain_ratio'] 	= TRUE;
				$img_config['width']	 		= $field->field_data['resize_width'];
				
				if( is_numeric($field->field_data['resize_height']) ):
				
					// We are using a hard numeric value for the resize h&w
					$img_config['height']	 		= $field->field_data['resize_height'];
					$img_config['maintain_ratio']	= FALSE;
					
				else:
				
					// We need to come close to what the height is, because
					// they left that blank
					
					$scale = $image['image_width'] / $img_config['width'];
					
					$img_config['height']	 		= $image['image_height']/$scale;
					$img_config['maintain_ratio']	= TRUE;
				
				endif;
				
				$this->CI->image_lib->initialize($img_config);
				
				$this->CI->image_lib->resize();

				$this->CI->image_lib->clear();
			
			endif;
			
			// Use resized numbers for the files module.
			if( isset($img_config['width']) and is_numeric($img_config['width']) ):
			
				$image['image_width'] = $img_config['width'];
			
			endif;

			if( isset($img_config['height']) and is_numeric($img_config['height']) ):
			
				$image['image_height'] = $img_config['height'];
			
			endif;
			
			// Insert the data
			$this->CI->file_m->insert(array(
				'folder_id' 		=> $field->field_data['folder'],
				'user_id' 			=> $this->CI->current_user->id,
				'type' 				=> 'i',
				'name' 				=> $image['file_name'],
				'description' 		=> '',
				'filename' 			=> $image['file_name'],
				'extension' 		=> $image['file_ext'],
				'mimetype' 			=> $image['file_type'],
				'filesize' 			=> $image['file_size'],
				'width' 			=> (int) $image['image_width'],
				'height' 			=> (int) $image['image_height'],
				'date_added' 		=> time(),
			));
		
			$id = $this->CI->db->insert_id();
			
			// Return the ID
			return $id;
			
		endif;			
	}

	// --------------------------------------------------------------------------

	/**
	 * Process before outputting
	 *
	 * @access	public
	 * @param	array
	 * @return	string
	 */	
	public function pre_output( $input, $params )
	{
		$this->CI->load->config('files/files');
		
		$this->CI->db->limit(1);
		$this->CI->db->where('id', $input);
		$db_obj = $this->CI->db->get('files');
		
		if( $db_obj->num_rows() > 0 ):
				
			return $this->_output_thumb( $db_obj->row(), FALSE );
	
		endif;
	}

	// --------------------------------------------------------------------------

	/**
	 * Process before outputting for the plugin
	 *
	 * This creates an array of data to be merged with the
	 * tag array so relationship data can be called with
	 * a {field.column} syntax
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	array
	 */
	public function pre_output_plugin( $prefix, $input, $params )
	{
		$image_data = array();
	
		$this->CI->load->config('files/files');
		$this->CI->load->helper('html');
		
		$this->CI->db->limit(1);
		$this->CI->db->where('id', $input);
		$db_obj = $this->CI->db->get('files');
		
		if( $db_obj->num_rows() > 0 ):
		
			$image = $db_obj->row();
			
			$full = $this->CI->config->item('files_folder') . '/' . $image->name;
		
			$image_data[rtrim($prefix, '.')]	= base_url().$full;
			$image_data[$prefix.'filename']		= $image->name;
			$image_data[$prefix.'image']		= base_url().$full;
			$image_data[$prefix.'img']			= img( array('alt'=>$image->name, 'src'=>$full) );
			$image_data[$prefix.'ext']			= $image->extension;
			$image_data[$prefix.'mimetype']		= $image->mimetype;
			$image_data[$prefix.'width']		= $image->width;
			$image_data[$prefix.'height']		= $image->height;

			//If there is a thumb, add it.
			$path 			= FCPATH . $this->CI->config->item('files_folder');
			$plain_name 	= str_replace($image->extension, '', $image->filename);
			
			if( file_exists( $path . '/'.$plain_name.'_thumb'.$image->extension ) ):
			
				$image_data[$prefix.'thumb']		= base_url().$this->CI->config->item('files_folder') . '/' . $plain_name.'_thumb' . $image->extension;
				$image_data[$prefix.'thumb_img']	= img( array('alt'=>$image->name, 'src'=> $this->CI->config->item('files_folder') . '/' . $plain_name.'_thumb' . $image->extension) );
				
			else:
			
				// The image may be small enough to be it's own thumb, so let's
				// put that in there anyways
				
				$image_data[$prefix.'thumb']		= base_url().$full;
				$image_data[$prefix.'thumb_img']	= img( array('alt'=>$image->name, 'src'=>$full) );
						
			endif;
			
		else:
		
			// We want just blank if there is no image.
		
			$image_data[rtrim($prefix, '.')]	= NULL;
			$image_data[$prefix.'filename']		= NULL;
			$image_data[$prefix.'image']		= NULL;
			$image_data[$prefix.'img']			= NULL;
			$image_data[$prefix.'ext']			= NULL;
			$image_data[$prefix.'mimetype']		= NULL;
			$image_data[$prefix.'width']		= NULL;
			$image_data[$prefix.'height']		= NULL;
			$image_data[$prefix.'thumb']		= NULL;
			$image_data[$prefix.'thumb_img']	= NULL;
	
		endif;
		
		return $image_data;
	}

	// --------------------------------------------------------------------------
	
	/**
	 * Output thumb
	 *
	 * Used mostly for the back end
	 *
	 * @access	private
	 * @param	obj
	 * @param	bool
	 * @return	string
	 */
	private function _output_thumb( $image, $scale = FALSE )
	{	
		$message = '';
	
		$this->CI->load->helper('html');

		$path 			= FCPATH . $this->CI->config->item('files_folder');
		$plain_name 	= str_replace($image->extension, '', $image->filename);
	
		$image_config = array(
		          'alt' 		=> $image->name,
		          'title' 		=> $image->name
		);
			
		if( file_exists( $path . '/'.$plain_name.'_thumb'.$image->extension ) ):
	
			$use_link = TRUE;
		
			$image_config['src']	= $this->CI->config->item('files_folder').'/'.$plain_name.'_thumb'.$image->extension;
					
		elseif( file_exists( $path . '/'.$image->name ) ):
		
			$use_link = FALSE;

			$image_config['src']	= $this->CI->config->item('files_folder').'/'.$image->name;
			
		else:
		
		endif;
		
		if( $use_link ):
		
			return '<a href="'.$this->CI->config->item('files_folder').$image->name.'" target="_blank">'.img( $image_config ).'</a>'.br();
		
		else:
		
			return img( $image_config ).br();
		
		endif;

		
	}

	// --------------------------------------------------------------------------

	/**
	 * Choose a folder to upload to.
	 */	
	public function param_folder( $value = '' )
	{
		// Get the folders
		
		$this->CI->load->model('files/file_folders_m');
		
		$tree = $this->CI->file_folders_m->get_folders();
		
		$tree = (array)$tree;
		
		if( !$tree ):
		
			return '<em>You need to set an upload folder before you can upload files.</em>';
		
		endif;
		
		$choices = array();
		
		foreach( $tree as $tree_item ):
		
			// We are doing this to be backwards compat
			// with PyroStreams 1.1 and below where 
			// This is an array, not an object
			$tree_item = (object)$tree_item;
			
			$choices[$tree_item->id] = $tree_item->name;
		
		endforeach;
	
		return form_dropdown( 'folder', $choices, $value );
	}

	// --------------------------------------------------------------------------

	/**
	 * Param Resize Width
	 *
	 * @return	string
	 */
	public function param_resize_width( $value = '' )
	{
		return form_input('resize_width', $value);
	}

	// --------------------------------------------------------------------------

	/**
	 * Param Resize Height
	 *
	 * @return	string
	 */
	public function param_resize_height( $value = '' )
	{
		return form_input('resize_height', $value);
	}

	// --------------------------------------------------------------------------

	/**
	 * Param Allowed Types
	 *
	 * @return	string
	 */
	public function param_allowed_types( $value = '' )
	{
		return form_input('allowed_types', $value);
	}
	
}

/* End of file field.image.php */