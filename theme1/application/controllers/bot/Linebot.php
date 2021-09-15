<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class linebot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->db_front = $this->load->database('db_front', TRUE);
        $this->db_back = $this->load->database('db_back', TRUE);

        $this->db_front->cache_on();
        $this->db_back->cache_on();

        $this->load->helper('curl');
        $this->client = new Client();
        $this->client = new GuzzleHttp\Client(['base_uri' => 'http://api6.slot999.com/live22/']);

        $this->mysqli = new mysqli("localhost", "botttaining", "*hw36pQ2", "botttaining");
        mysqli_set_charset($this->mysqli, "utf8");
        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

private function getProfile($userId){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.line.me/v2/bot/profile/{$userId}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer 407J+3y2IvTK1h/rHwNQYCCX1jS8o+VbYwFTvQ7yWI+orpbtpJ2qMNDPpTjKNEaKnvsqA+PQP715tcPqtlIU2GM4m9f9uh6ZsAbbyCo75sUzyRdOkfzM4zKPurTx2FBtWzkVni7ERt4dExsJ8rDjkAdB04t89/1O/w1cDnyilFU=",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        //print_r($response);
        $data = json_decode($response,true);
        curl_close($curl);
        //print_r($data);
        return $data;
    }



    private  function getGroupProfile($Groupid,$userId){
        $curl = curl_init();
        $strAccessToken = "407J+3y2IvTK1h/rHwNQYCCX1jS8o+VbYwFTvQ7yWI+orpbtpJ2qMNDPpTjKNEaKnvsqA+PQP715tcPqtlIU2GM4m9f9uh6ZsAbbyCo75sUzyRdOkfzM4zKPurTx2FBtWzkVni7ERt4dExsJ8rDjkAdB04t89/1O/w1cDnyilFU=";

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.line.me/v2/bot/group/{$Groupid}/member/{$userId}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer 407J+3y2IvTK1h/rHwNQYCCX1jS8o+VbYwFTvQ7yWI+orpbtpJ2qMNDPpTjKNEaKnvsqA+PQP715tcPqtlIU2GM4m9f9uh6ZsAbbyCo75sUzyRdOkfzM4zKPurTx2FBtWzkVni7ERt4dExsJ8rDjkAdB04t89/1O/w1cDnyilFU=",
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        //print_r($response);
        $data = json_decode($response,true);
        curl_close($curl);
        //print_r($data);
        return $data;
    }


    private function insterData($userId){

        $dataUser = $this->getProfile($userId);

        $sqlInser = "insert into user (lineID,Linename,img)VALUES ('".$userId."','".$dataUser['displayName']."','".$dataUser['pictureUrl']."')";
        if ($result = $this->mysqli->query($sqlInser)) {
            //echo $data;
            return true;
        }else{
            return false;
        }
    }

private function insterTrainBot($question,$answer){
       //. global $mysqli;
        //$dataUser = getProfile($userId);

        $sqlInser = "insert into trainbot (question,answer)VALUES ('".$question."','".$answer."')";
        if ($result = $this->mysqli->query($sqlInser)) {
            //echo $data;
            return true;
        }else{
            return false;
        }
    }

private function updateData($userId){
      //  global $mysqli;
        $dataUser = getProfile($userId);


        $sqlInser = "update user set Linename='".$dataUser['displayName']."',img='".$dataUser['pictureUrl']."' WHERE lineID ='{$userId}'";

        if ($result = $this->mysqli->query($sqlInser)) {
            //echo $data;
            return true;
        }else{
            return false;
        }
    }

    private function checkUser($userId){
       // global $mysqli;

        $sqlCheckItem = "select * from user where lineID ='{$userId}'";
        if($resultItem = $this->mysqli->query($sqlCheckItem)){
            if($resultItem->num_rows ==0){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

private function getTrain($question){
       // global $mysqli;
        $sqlGetAuth = "Select * from trainbot where question = '".trim($question)."' order by id desc limit 1 ";

        if ($result = $this->mysqli->query($sqlGetAuth)) {
            if($result->num_rows > 0){
                while ($row = $result->fetch_row()){
                    $rowData[] = $row;
                }
                $rowData['TotalCount'] =$result->num_rows;
            }
            // $row = $result->fetch_row();
            /* free result set */
            // $file = fopen("test.txt","w");

            // fwrite($file,"hoo".print_r($rowData, true).$sqlGetAuth);
            // fclose($file);
            $result->close();
        }
        return $rowData;
    }

    /**
     *
     */
    public  function run(){
        $strAccessToken = "407J+3y2IvTK1h/rHwNQYCCX1jS8o+VbYwFTvQ7yWI+orpbtpJ2qMNDPpTjKNEaKnvsqA+PQP715tcPqtlIU2GM4m9f9uh6ZsAbbyCo75sUzyRdOkfzM4zKPurTx2FBtWzkVni7ERt4dExsJ8rDjkAdB04t89/1O/w1cDnyilFU=";

        $content = file_get_contents('php://input');
        $arrJson = json_decode($content, true);

        $strUrl = "https://api.line.me/v2/bot/message/reply";

        $arrHeader = array();
        $arrHeader[] = "Content-Type: application/json";
        $arrHeader[] = "Authorization: Bearer {$strAccessToken}";

       /* // print_r($arrHeader);
        if(checkUser($arrJson['events'][0]['source']['userId'])==false){
            insterData($arrJson['events'][0]['source']['userId']);
        }else{
            updateData($arrJson['events'][0]['source']['userId']);
        }*/

        //$sms = $arrJson['events'][0]['message']['text'];
      /*  $file = fopen("test.txt","w");

        fwrite($file,print_r($arrJson,true));
        fclose($file);*/


        $sms = trim($arrJson['events'][0]['message']['text']);

        if($sms == "สวัสดี"){
            $arrPostData = array();
            $dataUser = getProfile($arrJson['events'][0]['source']['userId']);
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            $arrPostData['messages'][0]['text'] = "สวัสดี คุณ​ ".$dataUser['displayName'];
        }elseif($sms == "ชื่ออะไร"){
            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            $arrPostData['messages'][0]['text'] = "ฉันคือ Bot 999 ";
        }elseif($sms == "ทำอะไรได้บ้าง"){
            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            $arrPostData['messages'][0]['text'] = "ยังทำอะไรไม่ได้ เพราะยังไม่ได้สอน";
        }elseif($sms == "Hello"){
            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            $arrPostData['messages'][0]['text'] = "ยินดีที่ได้รู้จักครับผม";
        }elseif($sms == "bbl"){
         /*  $balance = $this->bank_balance();
            $scb_1 = "ไทยพาณิชย์ 1:".$balance['scb_1'];
            $scb_2 = "ไทยพาณิชย์ 2:".$balance['scb_2'];
            $bay = "กรุงศรี 1:".$balance['bay'];

         /*   $file = fopen("test.txt","w");

            fwrite($file,print_r($balance,true));
            fclose($file);*/

          /*  $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            $arrPostData['messages'][0]['text'] = "ยอดคงเหลือ \n\r============\n\r{$scb_1} \n\r{$scb_2}  \n\r{$bay}";*/
            //$arrPostData['messages'][0]['text'] = "ยอดคงเหลือ ไม่รู้หวะ";*/
        }elseif($sms =='sum'){
           /*$summary = $this->summary();

            $reply_token =$arrJson['events'][0]['replyToken'];
            $data = [
                'replyToken' => $reply_token,
                'messages' => [$summary]
            ];
            //print_r($data);
            $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);


            $ch = curl_init($strUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            return;*/
        }elseif($sms =='live22_info'){
            $summary = $this->testbotLive22();

            $reply_token =$arrJson['events'][0]['replyToken'];
            $data = [
                'replyToken' => $reply_token,
                'messages' => [$summary]
            ];
            //print_r($data);
            $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);


            $ch = curl_init($strUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            return;
        }elseif(strpos($sms, 'live22 :') !== false){

            // $_question=str_replace("[","",$pieces[0]);
            if($arrJson['events'][0]['source']['groupId']=='C85a217114780adfcde0c528194102e60'){
                $x_tra = str_replace("live22 ","", $sms);
                $pieces = explode(":", $x_tra);
                $member_id=trim($pieces[1]);

                $datajs = $this->info22($member_id);

                $reply_token =$arrJson['events'][0]['replyToken'];
                $data = [
                    'replyToken' => $reply_token,
                    'messages' => [$datajs]
                ];

                //print_r($data);
                $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

                $ch = curl_init($strUrl);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                $result = curl_exec($ch);
                curl_close($ch);

                return;

            }else{
                $arrPostData = array();
                $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                $arrPostData['messages'][0]['type'] = "text";
                $arrPostData['messages'][0]['text'] = 'อย่ามโนคุณไม่มีสิทธิ์สอนผม อิอิ';
            }

        }elseif(strpos($sms, 'create22 :') !== false){
            if($arrJson['events'][0]['source']['groupId']=='C85a217114780adfcde0c528194102e60'){

                $x_tra = str_replace("create22 ","", $sms);
                $pieces = explode(":", $x_tra);
                // $_question=str_replace("[","",$pieces[0]);
                $member_id=trim($pieces[1]);

                $datajs = $this->registerLive22($member_id);

                $reply_token =$arrJson['events'][0]['replyToken'];
                $data = [
                    'replyToken' => $reply_token,
                    'messages' => [$datajs]
                ];
                //print_r($data);
                $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

                $ch = curl_init($strUrl);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                $result = curl_exec($ch);
                curl_close($ch);

                return;

            }else{
                $arrPostData = array();
                $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                $arrPostData['messages'][0]['type'] = "text";
                $arrPostData['messages'][0]['text'] = 'อย่ามโนคุณไม่มีสิทธิ์สอนผม อิอิ';
            }

        }elseif ($sms =='dt'){
           /* $deposit = $this->deposit();

            $bay_deposit= $deposit['bay_deposit'];
            $text = "สรุปยอดฝากวันนี้ \n\r===========\n\rกรุงศรี = ".number_format($bay_deposit,2,'.',',');
            $text .= "\n\rไทยพาณิชย์ = ".number_format($deposit['scb_deposit'],2,'.',',');
            $text .= "\n\rกสิกรไทย = ".number_format($deposit['kbank_deposit'],2,'.',',');
            $text .= "\n\rManual = ".number_format($deposit['manual_deposit'],2,'.',',');

            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            //$arrPostData['messages'][0]['text'] = "ยอดคงเหลือ {$scb_1} {$scb_2}  {$bay}";
            $arrPostData['messages'][0]['text'] =$text;*/
        }elseif ($sms =='nm'){
           /* $new_member_today_count = $this->new_member_today_count();
            $first_deposit = $this->sum_first_topup();

            //$bay_deposit= $deposit['bay_deposit'];
            $text = "จำนวนผู้สมัครวันนี้ \n\r===========\n\r";
            $text .= "\n\r จำนวน = ".$new_member_today_count." คน";
            $text .= "\n\r ฝากเงินครั้งแรก = ".$first_deposit." คน";
            $percent = ($first_deposit*100)/$new_member_today_count;
            $text .= "\n\r คิดเป็น = ".$percent." %";

            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            //$arrPostData['messages'][0]['text'] = "ยอดคงเหลือ {$scb_1} {$scb_2}  {$bay}";
            $arrPostData['messages'][0]['text'] =$text;*/
        }elseif($sms=='sys'){
            if($arrJson['events'][0]['source']['groupId']=='C85a217114780adfcde0c528194102e60'){


                $text  =$this->getsysytemdata();
                $arrPostData = array();
                $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                $arrPostData['messages'][0]['type'] = "text";
                //$arrPostData['messages'][0]['text'] = "ยอดคงเหลือ {$scb_1} {$scb_2}  {$bay}";
                $arrPostData['messages'][0]['text'] =$text;

            }else{
                $arrPostData = array();
                $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                $arrPostData['messages'][0]['type'] = "text";
                $arrPostData['messages'][0]['text'] = 'อย่ามโนคุณไม่มีสิทธิ์สอนผม อิอิ';
            }



        }elseif ($sms=='/help'){
            $text = "คำสั่งมีดังนี้ \n\r===========";
            $text .= "\n\rnm = จำนวนผู้สมัครวันนี้";
            $text .= "\n\rsys = ข้อมูล server";
            $text .= "\n\rlive22 :รหัส live22 = ตรวจสอบข้อมูลรหัส live22";
            $text .= "\n\rcreate22 :รหัสสมาชิค = ตรวจสอบหากไม่พบจะสร้างไอดี live22 ให้";
            $text .= "\n\rcheck :รหัสสมาชิค = ยอดทั้งหมด";

            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            //$arrPostData['messages'][0]['text'] = "ยอดคงเหลือ {$scb_1} {$scb_2}  {$bay}";
            $arrPostData['messages'][0]['text'] =$text;
        }elseif($sms == "ขอไอดีหน่อย"){
            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";

            $arrPostData['messages'][0]['text'] ="ส่งให้แล้วที่ Admin Group นะจ๊ะ";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$strUrl);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close ($ch);



            if($arrJson['events'][0]['source']['groupId']!=''){
                $sms= "ฉันคือ bot 999 \r\nไอดีของคุณคือ ".$arrJson['events'][0]['source']['userId']."\r\nไอดีกลุ่ม  {$arrJson['events'][0]['source']['groupId']}";
            }else{
                $sms = "ฉันคือ bot 999 ไอดีของคุณคือ ".$arrJson['events'][0]['source']['userId'];
            }
            $dataUser = $this->getGroupProfile($arrJson['events'][0]['source']['groupId'],$arrJson['events'][0]['source']['userId']);
            // sleep(300);
            $file = fopen("test.txt","w");

            fwrite($file,print_r($arrJson,true));
            fclose($file);

            unset($arrPostData);

            $arrPostData = array();
            $arrPostData['to'] = "C8b8c80add7a96a7b10bb21fec124008c";
            $arrPostData['messages'][0]['type'] = "text";
            $arrPostData['messages'][0]['text'] = "{$sms}";
            $strUrl = "https://api.line.me/v2/bot/message/push";
            $this->sendCURL($strUrl,$arrHeader,$arrPostData);
            die();

        }elseif(strpos($sms, 'สอนบอท') !== false) {
            $x_tra = str_replace("สอนบอท","", $sms);
            $pieces = explode("|", $x_tra);
            $_question=str_replace("[","",$pieces[0]);
            $_answer=str_replace("]","",$pieces[1]);
            //Post New Data
            if($arrJson['events'][0]['source']['groupId']=='C8b8c80add7a96a7b10bb21fec124008c'){
                if($_answer !=''){
                    $this->insterTrainBot($_question,$_answer);

                    $arrPostData = array();
                    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                    $arrPostData['messages'][0]['type'] = "text";
                    $arrPostData['messages'][0]['text'] = 'ขอบคุณที่สอนบอท';
                }

            }else{
                $arrPostData = array();
                $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                $arrPostData['messages'][0]['type'] = "text";
                $arrPostData['messages'][0]['text'] = 'อย่ามโนคุณไม่มีสิทธิ์สอนผม อิอิ';
            }


        }elseif(strpos($sms, 'check') !== false) {
            $x_tra = str_replace("check","", $sms);
            $pieces = explode(":", $x_tra);
           // $_question=str_replace("[","",$pieces[0]);
            $member_id=trim($pieces[1]);

            $datajs = $this->getUserBalance($member_id);

            $reply_token =$arrJson['events'][0]['replyToken'];
            $data = [
                'replyToken' => $reply_token,
                'messages' => [$datajs]
            ];
            //print_r($data);
            $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);


            $ch = curl_init($strUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            return;

        }else{
            $answer = $this->getTrain($sms);
            if(count($answer)>0){
                $dataUser = $this->getProfile($arrJson['events'][0]['source']['userId']);
                $text = "@".$dataUser['displayName']."  ".$answer[0][1]."\r\n".$answer[0][2];
                $arrPostData = array();
                $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
                $arrPostData['messages'][0]['type'] = "text";
                $arrPostData['messages'][0]['text'] = $text;
            }
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);

        curl_close ($ch);
        echo "OK";
    }

    public function getUserBalance($member_id)
    {
        //$this->db_front = $this->load->database('db_front', TRUE);

        $slotxo = $this->db_front->query("SELECT * FROM tb_slotxo_account WHERE member_id = $member_id")->row();
        $live22 = $this->db_front->query("SELECT * FROM tb_live22_account WHERE member_id = $member_id")->row();
        $wallet_balance = $this->db_front->query("SELECT * FROM tb_member_wallet WHERE member_id = $member_id")->row()->wallet_balance;





        $live22_balance = $this->live22_balance($live22->username);
        $slotxo_balance = $this->slotxo_balance($slotxo->username);

        $balance = $live22_balance+$slotxo_balance+$wallet_balance;

        return $jsonFlex = ["type"=> "flex",
            "altText"=>"ข้อมูลสมาชิก",
            "contents"=> [
                "type"=> "bubble",
                "header"=> [
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "contents"=> [
                        [
                            "type"=> "text",
                            "text"=> "Member ID : {$member_id}",
                            "size"=> "md",
                            "weight"=> "bold",
                            "color"=> "#20271F"
                        ]
                    ]
                ],
                "hero"=> [
                    "type"=> "image",
                    "url"=> "https://slot999.com//assets/images/logo-slot.png",
                    "size"=> "full",
                    "aspectRatio"=> "20:13",
                    "aspectMode"=> "cover",
                    "action"=> [
                        "type"=> "uri",
                        "label"=> "Action",
                        "uri"=> "https://linecorp.com/"
                    ]
                ],
                "body"=> [
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "spacing"=> "md",
                    "contents"=> [
                        [
                            "type"=> "box",
                            "layout"=> "vertical",
                            "flex"=> 2,
                            "contents"=> [
                                [
                                    "type"=> "text",
                                    "text"=> "Slot XO : {$slotxo_balance} ฿",
                                    "size"=> "md",
                                    "gravity"=> "top"
                                ],
                                [
                                    "type"=> "separator",
                                    "margin"=> "xs"
                                ],
                                [
                                    "type"=> "text",
                                    "text"=> "Live 22  : {$live22_balance} ฿",
                                    "size"=> "md",
                                    "gravity"=> "top"
                                ],
                                [
                                    "type"=> "separator",
                                    "margin"=> "xs"
                                ]
                            ]
                        ]
                    ]
                ],
                "footer"=> [
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "contents"=> [
                        [
                            "type"=> "button",
                            "action"=>  [
                                "type"=> "uri",
                                "label"=> "รวม {$balance} ฿",
                                "uri"=> "https://admins.slot999.com"
                            ]
                        ]
                    ]
                ]
            ]];

    }

    private function live22_balance($username)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://api6.slot999.com/live22/MemberInfo?username=$username");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close ($ch);
        $response = json_decode($response);
        return $response->data->current_balance;
    }

    public function registerLive22($username){
        $live22 = $this->db_front->query("SELECT * FROM tb_live22_account WHERE member_id = $username")->row();
        $memberdata = $this->db_front->query("SELECT * FROM tb_member_account WHERE id = $username")->row();

       // $live22_balance = $this->info22($live22->username);
        $user_fullname = $memberdata->name."  ".$memberdata->surname;

        $username_id = $live22->username;


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://siti22.com/tapi/getbalance",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"agent_id\":\"thslot9\",\n\t\"password\":\"Wut.16881688!@##\",\n\t\"player_id\":\"{$username_id}\",\n\t\"client_ip\":\"68.183.188.75\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        //print_r($response);
        ///$response1 = array();
        if ($err) {
            $response1['status'] = 'error';
            $response1['message'] = 'username not found!';
            // return $response1;
        } else {
            $json = json_decode($response, true);
            //$user_info = array();
            //$user_info['current_balance'] =$json['balance'];

            if(!empty($json['error']) &&  $json['error']!=''){
                $response1['status']='error';
            }else{
                $response1['status']='success';
            }
        }


        if($response1['status']=='error'){

            $response = $this->client->request('POST', 'auto_login');

            //$response->getBody();

            //$res = json_decode($response->getBody());

            $response = $this->client->request('POST', 'AddMember', [
                'form_params' => [
                    'user_id' => $live22->username,
                    'password' => $live22->password,
                    'full_name' => $user_fullname
                ]
            ]);

            //echo $response->getBody();

            $res = json_decode($response->getBody());
            //print_r($res);
            $file = fopen("test.txt","w");

            fwrite($file,print_r($res,true));
            fclose($file);
            if($res->status == 'success')
            {
                $this->db_front = $this->load->database('db_front', TRUE);
                $this->db_front->where('member_id', sess_userdata('id'));
                $this->db_front->update('tb_live22_account',array('status' => '1'));

                $response1['status'] = 'success';
                $response1['message'] = 'update success !';
                $response1['data'] = 'success !!!';
            }else{
                $response1['status'] = 'error';
                $response1['message'] = 'มีข้อมูลอยู่แล้ว!';
                $response1['data'] = 'Error !!!';
            }

        }else{
            $response1['status'] = 'success';
            $response1['message'] = 'มีข้อมูลอยู่แล้ว !'.var_dump($response);
            $response1['data'] = 'Error !!!';
        }

        return $jsonFlex = ["type"=> "flex",
            "altText"=>"update Live22",
            "contents"=> [
                "type"=> "bubble",
                "header"=> [
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "contents"=> [
                        [
                            "type"=> "text",
                            "text"=> "Member ID : {$live22->username}",
                            "size"=> "md",
                            "weight"=> "bold",
                            "color"=> "#20271F"
                        ]
                    ]
                ],
                "body"=> [
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "spacing"=> "md",
                    "contents"=> [
                        [
                            "type"=> "box",
                            "layout"=> "vertical",
                            "flex"=> 2,
                            "contents"=> [
                                [
                                    "type"=> "text",
                                    "text"=> "Status  : {$response1['message']} ",
                                    "size"=> "md",
                                    "gravity"=> "top"
                                ],
                                [
                                    "type"=> "separator",
                                    "margin"=> "xs"
                                ]
                            ]
                        ]
                    ]
                ],
                "footer"=> [
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "contents"=> [
                        [
                            "type"=> "button",
                            "action"=>  [
                                "type"=> "uri",
                                "label"=>$response1['data'],
                                "uri"=> "https://admins.slot999.com"
                            ]
                        ]
                    ]
                ]
            ]];
    }

    public function info22($username)
    {
        $username_id = $username;
        if(empty($username_id))
        {
            $response['status'] = 'error';
            $response['message'] = 'username is empty!';
            echo json_encode($response);
            exit();
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://siti22.com/tapi/getbalance",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"agent_id\":\"thslot9\",\n\t\"password\":\"Wut.16881688!@##\",\n\t\"player_id\":\"{$username_id}\",\n\t\"client_ip\":\"68.183.188.75\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        //print_r($response);
        if ($err) {
            $response1['status'] = 'error';
            $response1['message'] = 'username not found!';
           // return $response1;
        } else {
            $json = json_decode($response, true);
            //$user_info = array();
            $user_info['current_balance'] =$json['balance'];
            //echo $json['success'];
            //echo "<br/>";
            if($json['success'] == 1)
            {

                $response1['status'] = 'success';
                $response1['message'] = 'มีข้อมูลสมาชิคแล้ว! '. $user_info['current_balance'];
                $response1['data'] = $user_info;
            }
            else
            {
                //print_r($json);
                $response1['status'] = 'error';
                $response1['message'] = 'username not found!';
            }
           // return $response1;
        }

        return $jsonFlex = ["type"=> "flex",
            "altText"=>"ข้อมูลสมาชิก",
            "contents"=> [
                "type"=> "bubble",
                "header"=> [
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "contents"=> [
                        [
                            "type"=> "text",
                            "text"=> "Member ID : {$username_id}",
                            "size"=> "md",
                            "weight"=> "bold",
                            "color"=> "#20271F"
                        ]
                    ]
                ],
                "hero"=> [
                    "type"=> "image",
                    "url"=> "https://slot999.com//assets/images/logo-slot.png",
                    "size"=> "full",
                    "aspectRatio"=> "20:13",
                    "aspectMode"=> "cover",
                    "action"=> [
                        "type"=> "uri",
                        "label"=> "Action",
                        "uri"=> "https://linecorp.com/"
                    ]
                ],
                "body"=> [
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "spacing"=> "md",
                    "contents"=> [
                        [
                            "type"=> "box",
                            "layout"=> "vertical",
                            "flex"=> 2,
                            "contents"=> [
                                [
                                    "type"=> "text",
                                    "text"=> "Live 22  : {$response1['message']} ",
                                    "size"=> "md",
                                    "gravity"=> "top"
                                ],
                                [
                                    "type"=> "separator",
                                    "margin"=> "xs"
                                ]
                            ]
                        ]
                    ]
                ],
                "footer"=> [
                    "type"=> "box",
                    "layout"=> "horizontal",
                    "contents"=> [
                        [
                            "type"=> "button",
                            "action"=>  [
                                "type"=> "uri",
                                "label"=> " ตรวจสอบ",
                                "uri"=> "https://admins.slot999.com"
                            ]
                        ]
                    ]
                ]
            ]];


    }

    private function slotxo_balance($username)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://api6.slot999.com/new/SlotXO/GetUserCredit?username=$username");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close ($ch);
        $response = json_decode($response);
        return $response->data->Credit;
    }

    private  function sendCURL($strUrl,$arrHeader,$arrPostData){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);

        // $file = fopen("test.txt","w");

        // fwrite($file,print_r($arrHeader,true));
        // fclose($file);
        curl_close ($ch);
    }

    public function bank_balance()
    {
        $bay = json_decode(file_get_contents('https://slot999.com/new/bankjson/bay_current'));
        $scb_1 = json_decode(file_get_contents('https://slot999.com/new/bankjson/scb_current'));
        $scb_2 = json_decode(file_get_contents('https://slot999.com/new/bankjson/scb_current_2'));

        $balance_arr = array('scb_1' => $scb_1->current_balance.' ฿',
            'scb_2' => $scb_2->current_balance.' ฿',
            'bay' => $bay->current_balance.' ฿');
       // print_r($balance_arr);
        return $balance_arr;
    }

    public function summary()
    {

        $today_deposit = $this->db_front->query("SELECT SUM(amount) AS 'amount' FROM tb_member_deposit_log WHERE DATE(datetime) = DATE(now()) AND channel != 'BONUS'")->row()->amount;
        $today_bonus = $this->db_front->query("SELECT SUM(amount) AS 'amount' FROM tb_member_deposit_log WHERE DATE(datetime) = DATE(now()) AND channel = 'BONUS'")->row()->amount;
        $today_withdraw = $this->db_front->query("SELECT SUM(amount) AS 'amount'  FROM tb_member_withdraw_log WHERE DATE(datetime) = DATE(NOW()) AND status = 1")->row()->amount;
        $month_deposit = $this->db_front->query("SELECT SUM(amount) AS 'amount' FROM tb_member_deposit_log WHERE MONTH(datetime) = MONTH(now()) AND channel != 'BONUS'")->row()->amount;
        $month_withdraw = $this->db_front->query("SELECT SUM(amount) AS 'amount' FROM tb_member_withdraw_log WHERE MONTH(datetime) = MONTH(now()) AND status = 1")->row()->amount;
        $today_income = $today_deposit - $today_withdraw;
        $month_income = $month_deposit - $month_withdraw;

        $arr = array('today_deposit' => $today_deposit,
            'today_bonus' => $today_bonus,
            'today_withdraw' => $today_withdraw,
            'month_deposit' => $month_deposit,
            'month_withdraw' => $month_withdraw,
            'today_income' => $today_income,
            'month_income' => $month_income);

        return $jsonFlex = [
            "type" => "flex",
            "altText" => "สรุปยอด",
            "contents" => [
                "type" => "bubble",
                "direction" => "ltr",
                "header" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "text",
                            "text" => "Today Income",
                            "size" => "lg",
                            "align" => "start",
                            "weight" => "bold",
                            "color" => "#009813"
                        ],
                        [
                            "type" => "text",
                            "text" => number_format($arr['today_income'],2,'.',',')." ฿",
                            "size" => "3xl",
                            "weight" => "bold",
                            "align" => "end",
                            "color" => "#000000"
                        ],
                        [
                            "type" => "text",
                            "text" => "Month Income",
                            "size" => "lg",
                            "weight" => "bold",
                            "color" => "#000000"
                        ],
                        [
                            "type" => "text",
                            "text" => number_format($arr['month_income'],2,'.',',')." ฿",
                            "size" => "lg",
                            "weight" => "bold",
                            "align" => "end",
                            "color" => "#009813"
                        ]
                    ]
                ],
                "body" => [
                    "type" => "box",
                    "layout" => "vertical",
                    "contents" => [
                        [
                            "type" => "separator",
                            "color" => "#C3C3C3"
                        ],
                        [
                            "type" => "box",
                            "layout" => "baseline",
                            "margin" => "lg",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ยอดฝากวันนี้",
                                    "align" => "start",
                                    "color" => "#C3C3C3"
                                ],
                                [
                                    "type" => "text",
                                    "text" => number_format($today_deposit,2,'.',','),
                                    "align" => "start",
                                    "color" => "#000000"
                                ]
                            ]
                        ],
                        [
                            "type" => "box",
                            "layout" => "baseline",
                            "margin" => "lg",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ยอดโบนัสวันนี้",
                                    "color" => "#C3C3C3"
                                ],
                                [
                                    "type" => "text",
                                    "text" => number_format($arr['today_bonus'],2,'.',','),
                                    "align" => "start"
                                ]
                            ]
                        ],
                        [
                            "type" => "box",
                            "layout" => "baseline",
                            "margin" => "lg",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ยอดฝากเดือนนี้",
                                    "color" => "#C3C3C3"
                                ],
                                [
                                    "type" => "text",
                                    "text" => number_format($arr['month_deposit'],2,'.',','),
                                    "align" => "start"
                                ]
                            ]
                        ],
                        [
                            "type" => "box",
                            "layout" => "baseline",
                            "margin" => "lg",
                            "contents" => [
                                [
                                    "type" => "text",
                                    "text" => "ยอดถอนเดือนนี้",
                                    "color" => "#C3C3C3"
                                ],
                                [
                                    "type" => "text",
                                    "text" => number_format($arr['month_withdraw'],2,'.',','),
                                    "align" => "start"
                                ]
                            ]
                        ],
                        [
                            "type" => "separator",
                            "margin" => "lg",
                            "color" => "#C3C3C3"
                        ]
                    ]
                ],
                "footer" => [
                    "type" => "box",
                    "layout" => "horizontal",
                    "contents" => [
                        [
                            "type" => "text",
                            "text" => "เข้าระบบ",
                            "size" => "lg",
                            "align" => "start",
                            "color" => "#0084B6",
                            "action" => [
                                "type" => "uri",
                                "label" => "เข้าระบบ",
                                "uri" => "https://admins.slot999.com/"
                            ]
                        ]
                    ]
                ]
            ]
        ];

       // return $text;

        // echo json_encode($arr);
        // exit();
    }

    private function deposit()
    {
        // header('Content-Type: application/json');

        $bay_deposit = $this->db_back->query("SELECT SUM(amount) AS amount FROM tb_manual_transection WHERE DATE(trans_in_datetime) = DATE(NOW()) AND trans_in_bank = 'BAY'")->row()->amount;
        $scb_deposit = $this->db_back->query("SELECT SUM(amount) AS amount FROM tb_manual_transection WHERE DATE(trans_in_datetime) = DATE(NOW()) AND trans_in_bank = 'SCB'")->row()->amount;
        $kbank_deposit = $this->db_back->query("SELECT SUM(amount) AS amount FROM tb_manual_transection WHERE DATE(trans_in_datetime) = DATE(NOW()) AND trans_in_bank = 'KBANK'")->row()->amount;
        $manual_deposit = $this->db_front->query("SELECT SUM(amount) AS 'amount' FROM tb_member_deposit_log WHERE DATE(datetime) = DATE(now()) AND is_manual = 1")->row()->amount;
        // $manual_deposit = 0;

        $arr = array('bay_deposit' => $bay_deposit,
            'scb_deposit' => $scb_deposit,
            'kbank_deposit' => $kbank_deposit,
            'manual_deposit' => $manual_deposit);
        // echo json_encode($arr);
        // exit();
        return $arr;
    }
    private function new_member_today_count()
    {
        // header("Content-type:application/json");
        $total_member_today = $this->db_front->query("SELECT COUNT(*) AS 'total_member_today' FROM tb_member_account WHERE DATE(regis_date) = DATE(NOW())")->row()->total_member_today;
        // echo json_encode(array('total_member_today' => $total_member_today));
        // exit();
        return $total_member_today;
    }

    private function sum_first_topup()
    {
        // header("Content-type:application/json");
        $regis_form = $this->db_front->query("SELECT COUNT(*) AS 'total',regis_form FROM tb_member_account WHERE topup_first_time != 0 AND DATE(regis_date) = DATE(NOW()) ")->row()->total;


        return $regis_form;
    }

    private function str_to_utf8 ($str) {

        //if (mb_detect_encoding($str, 'UTF-8', true) === false) {
        $str = utf8_encode($str).mb_detect_encoding($str, 'ASCII', true);
        //}

        return $str;
    }

    private  function getsysytemdata(){
        $start_time = microtime(TRUE);

        $free = shell_exec('free');
        $free = (string)trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem, function($value) { return ($value !== null && $value !== false && $value !== ''); }); // removes nulls from array
        $mem = array_merge($mem); // puts arrays back to [0],[1],[2] after filter removes nulls

//print_r($mem); echo '<hr>';
        $memtotal = round($mem[1] / 1000000,2);
        $memused = round($mem[2] / 1000000,2);
        $memfree = round($mem[3] / 1000000,2);

        $membuffer = round($mem[5] / 1000000,2);
        $memcached = round($mem[6] / 1000000,2);

        $memusage = round(($memused - $memcached - $membuffer)/$memtotal*100,2);

        $connections = `netstat -ntu | grep :80 | grep ESTABLISHED | grep -v LISTEN | awk '{print $5}' | cut -d: -f1 | sort | uniq -c | sort -rn | grep -v 127.0.0.1 | wc -l`;
        $totalconnections = `netstat -nt | grep :80 | wc -l`;
        $myconnections = `netstat -nt | grep :3306 | wc -l`;

        $load = sys_getloadavg();
        $cpuload = $load[0];

        $diskfree = round(disk_free_space(".") / 1000000000);
        $disktotal = round(disk_total_space(".") / 1000000000);
        $diskused = round($disktotal - $diskfree);

        $diskusage = round($diskused/$disktotal*100);

        if ($memusage > 85 || $cpuload > 2 || $diskusage > 95) {
            $trafficlight = 'red';
        } elseif ($memusage > 70 || $cpuload > 1 || $diskusage > 85) {
            $trafficlight = 'orange';
        } else {
            $trafficlight = '#2F2';
        }

        $end_time = microtime(TRUE);
        $time_taken = $end_time - $start_time;
        $total_time = round($time_taken,4);

        $txt ="RAM Usage: $memusage
CPU Usage:  $cpuload % 
Hard Disk Usage: $diskusage % 
Established Connections: $connections 
Total Connections: $totalconnections  \n\r
Mysql Connections: $myconnections  
===========
RAM Total: $memtotal GB 
RAM Free: $memfree  GB 
RAM Used: $memused GB 
RAM Buffer: $membuffer GB 
RAM Cached: $memcached GB 
===========
Hard Disk Free: $diskfree GB 
Hard Disk Used: $diskused GB
Hard Disk Total: $disktotal GB
===========
Server Name : {$_SERVER['SERVER_NAME']}
Server Addr : {$_SERVER['SERVER_ADDR']} 
PHP Version:  ".phpversion()."
Load Time: $total_time  sec";

        return $txt;
    }

    private function testbotLive22(){
        $start_time = microtime(TRUE);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://api6.slot999.com/live22/MemberInfo?username=909933419");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close ($ch);
        $response = json_decode($response);

        $end_time = microtime(TRUE);
        $time_taken = $end_time - $start_time;
        $total_time = round($time_taken,4);
        return $jsonFlex = ["type"=> "flex",
                                          "altText"=>"Flex Message",
                                          "contents"=> [
                                                    "type"=> "bubble",
                                            "header"=> [
                                                        "type"=> "box",
                                              "layout"=> "horizontal",
                                              "contents"=> [
                                                [
                                                    "type"=> "text",
                                                  "text"=> "รายงานการทดสอบ",
                                                  "size"=> "md",
                                                  "weight"=> "bold",
                                                  "color"=> "#20271F"
                                                ]
                                              ]
                                            ],
                                            "hero"=> [
                                                        "type"=> "image",
                                              "url"=> "https://slot999.com//assets/images/logo-slot.png",
                                              "size"=> "full",
                                              "aspectRatio"=> "20:13",
                                              "aspectMode"=> "cover",
                                              "action"=> [
                                                            "type"=> "uri",
                                                "label"=> "Action",
                                                "uri"=> "https://linecorp.com/"
                                              ]
                                            ],
                                            "body"=> [
                                                        "type"=> "box",
                                              "layout"=> "horizontal",
                                              "spacing"=> "md",
                                              "contents"=> [
                                                [
                                                    "type"=> "box",
                                                  "layout"=> "vertical",
                                                  "flex"=> 2,
                                                  "contents"=> [
                                                    [
                                                        "type"=> "text",
                                                      "text"=> "Live22 bot api Load $total_time  sec",
                                                      "size"=> "md",
                                                      "gravity"=> "top"
                                                    ],
                                                    [
                                                        "type"=> "separator",
                                                      "margin"=> "xs"
                                                    ]
                                                  ]
                                                ]
                                              ]
                                            ],
                                            "footer"=> [
                                                        "type"=> "box",
                                              "layout"=> "horizontal",
                                              "contents"=> [
                                                [
                                                    "type"=> "button",
                                                  "action"=>  [
                                                    "type"=> "uri",
                                                    "label"=> "เข้าหน้าเว็บ",
                                                    "uri"=> "https://admins.slot999.com"
                                                  ]
                                                ]
                                              ]
                                            ]
                                          ]];

    }


}