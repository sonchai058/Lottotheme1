<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;

class Transfers extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        header("Content-type:application/json");

        // $response['status']  = 'error';
        // $response['message'] = 'ปิดระบบโยกเงินชั่วคราว ขออภัยในความไม่สะดวกคะ';

        // echo json_encode($response);
    }

    public function index()
    {

    }

    public function getSlotXoCredit()
    {
        $numRetries = 0;
        $stack      = HandlerStack::create();
        $stack->push(GuzzleRetryMiddleware::factory());
        $client = new Client([
            'handler'                  => $stack,
            'base_uri'                 => 'api6.slot999.com/new/SlotXO',
            'default_retry_multiplier' => 1.5,
            'max_retry_attempts'       => 5,
            'retry_on_status'          => [400],
            'on_retry_callback'        => function ($retryCount) use (&$numRetries) {
                $numRetries = $retryCount;
            },
        ]);
        $response = $client->request('GET', '/GetUserCredit?username=SLOT933419');
        $this->assertEquals(2, $numRetries);
        $this->assertEquals('Good', (string) $response->getBody());

        echo $$response->getBody();
    }
}

/* End of file Transfers.php */
/* Location: ./application/controllers/api/member/Transfers.php */
