<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        // $this->load->model('Bonus_model','bonusm');
    
        exit();
    }


    public function api1()
    {
        // $this->load->model('Bonus_model','bonusm');
        $this->load->model('process/Member_model', 'member_md');

        // ส้งไป register_api
        $register_api = $this->member_md->register_api_1();
        // $register_api = true;
        if ($register_api == true) {
            // return API true
            $status = 'true';
        } else {
            $status = 'false';
        }

        $summary = (object) array(
            'status' => $status,
            'msg'  => $register_api
        );

        header('Content-Type: application/json');
        echo json_encode($summary);
        exit();
    }

    public function api2()
    {
        // $this->load->model('Bonus_model','bonusm');
        $this->load->model('process/Member_model', 'member_md');

        // ส้งไป register_api
        $register_api = $this->member_md->register_api_2();
        if ($register_api == true) {
            // return API true
            $status = 'true';
        } else {
            $status = 'false';
        }

        $summary = (object) array(
            'status' => $status,
            'msg'  => $register_api
        );

        header('Content-Type: application/json');
        echo json_encode($summary);
        exit();
    }

    public function api3()
    {
        // $this->load->model('Bonus_model','bonusm');
        $this->load->model('process/Member_model', 'member_md');

        // ส้งไป register_api
        $register_api = $this->member_md->register_api_3();
        if ($register_api == true) {
            // return API true
            $status = 'true';
        } else {
            $status = 'false';
        }

        $summary = (object) array(
            'status' => $status,
            'msg'  => $register_api
        );

        header('Content-Type: application/json');
        echo json_encode($summary);
        exit();
    }

    public function api4()
    {
        // $this->load->model('Bonus_model','bonusm');
        $this->load->model('process/Member_model', 'member_md');

        // ส้งไป register_api
        $register_api = $this->member_md->register_api_4();
        if ($register_api == true) {
            // return API true
            $status = 'true';
        } else {
            $status = 'false';
        }

        $summary = (object) array(
            'status' => $status,
            'msg'  => $register_api
        );

        header('Content-Type: application/json');
        echo json_encode($summary);
        exit();
    }
}
