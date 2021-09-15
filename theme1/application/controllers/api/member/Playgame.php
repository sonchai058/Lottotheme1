<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Playgame extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('process/Balance_model', 'balancem');
        $this->load->model('process/Logs_model', 'logsm');
        header("Content-type:application/json");
        $this->game_account = game_account();

       

    } 
    // public function playjoker($game_code) {
    //     $this->load->model('process/Member_model', 'member_md');
 
    //     $api= $this->member_md->playgame_api1($game_code); 
    //     header('Content-Type: application/json');
    //     echo json_encode($api);
    //     exit();
    // }
    public function playniki($game_code) {
        if ($game_code != "") {
            $this->load->model('process/Member_model', 'member_md');
 
            $api= $this->member_md->playgame_api2($game_code); 
            header('Content-Type: application/json');
            echo json_encode($api);
            exit();
        }
        else {
            exit();
        }
    }
}

/* End of file Transfer.php */
/* Location: ./application/controllers/api/member/Transfer.php */
