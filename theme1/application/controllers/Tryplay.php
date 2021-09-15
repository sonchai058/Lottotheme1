<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tryplay extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }


    public function index()
    {
        is_allow_browser();
        $this->load->view('pages/tryplay/content', $data, false);
    }
}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */
