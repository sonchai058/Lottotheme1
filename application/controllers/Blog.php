<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	// public function index()
	// {
		
	// }

	public function posts()
	{

	}

	public function images($file_name = NULL)
	{
		if(is_null($file_name))
		{
			$data['page_content'] = 'error/404/content';
			$data['page_js'] = 'error/404/js';
			$this->load->view('layout/master_detect', $data, FALSE);
		}
		else
		{
			// $allowed_type = array('');
			// if (!in_array("BB", $allowed_type)) {
			//     echo "BB is not found";
			// }

			$root_path = FCPATH.'assets/images/';
			$file_path = $root_path.$file_name;

			$file_ext = explode(".", strtolower($file_name));

			$handle = fopen($file_path, "rb");
			$contents = fread($handle, filesize($file_path));

			fclose($handle);

			switch($file_ext[1]){
			    case "gif": 
			    	header('Content-Type: image/gif');
					echo $contents;
			    break;
			    case "png": 
			   		header('Content-Type: image/png');
					echo $contents;
			   	break;
			    case "jpeg":
			    case "jpg": 
			    	header("content-type: image/jpeg");
					echo $contents;
			    break;
			    default:
			    	$data['page_content'] = 'error/404/content';
					$data['page_js'] = 'error/404/js';
					$this->load->view('layout/master_detect', $data, FALSE);
					// exit();
			    break;
			}
		}
	}

}

/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */