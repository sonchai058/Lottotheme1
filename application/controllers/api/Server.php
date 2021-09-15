<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Server extends CI_Controller {

	public function index()
	{
		header("Content-type:application/json");
		$client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/Agent/']);
		$response = $client->request('GET', 'healthCheck');
		echo $response->getBody();
	}

}

/* End of file Server.php */
/* Location: ./application/controllers/api/Server.php */