<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$date = Carbon\Carbon::now();
		echo $date->locale('th')->diffForHumans();
	}
}
