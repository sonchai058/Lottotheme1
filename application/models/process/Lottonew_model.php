<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use GuzzleHttp\Pool;
// use GuzzleHttp\Client;
// use GuzzleHttp\Psr7\Request;

class Lottonew_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->dbf->cache_on();
        $this->dbb->cache_on();
    }
 
    public function save($data_insert)
    { 
        $result = $this->dbb->insert_batch('tb_lotto_member_log', $data_insert);
        if($result){
            return true;
        }
        else {
            return false;
        } 
    } 

    public function cls_lotto_member($lotto_type=1,$date) {
        // $lotto_reward_type
        // $lotto_type
        $member_id = sess_userdata('id');
        // $date_time
        $q = $this->dbb->query("delete from tb_lotto_member_log where lotto_type = {$lotto_type} and member_id = {$member_id} and DATE(lotto_group) = '$date'");
        return $q;
    }
    public function get_lotto_member($lotto_type=1,$date) {
        // $lotto_reward_type
        // $lotto_type
        $member_id = sess_userdata('id');
        // $date_time
        $q = $this->dbb->query("SELECT * FROM tb_lotto_member_log where  member_id = {$member_id} and lotto_type = {$lotto_type} and DATE(lotto_group) = '$date'");
        return $q->result();
    }
    public function get_lotto_reward_type($id='all') {
        if($id=='all') {
            $id = "";
        }else {
            $id = "where id={$id}";
        }
        $q = $this->dbb->query("SELECT * FROM tb_lotto_reward_type {$id}");
        return $q->result();
    }

    public function getRateReward() {
        $q = $this->dbb->query("SELECT a.*,b.description FROM tb_lotto_reward_config as a inner join tb_lotto_reward_type as b on a.lotto_reward_type=b.id and a.status=1")->result();
        if(empty($q)) {
            return array(
                array('min'=>'1','max'=>'500','reward'=>'3.00','lotto_reward_type'=>'0'),
                array('min'=>'501','max'=>'999','reward'=>'2.90','lotto_reward_type'=>'0')
            );
        }else {
            return $q;
        }
    }

    function getLotto_resultSuccess($lotto_type=1,$date="") {
        $num = $this->dbb->query("SELECT * FROM tb_lotto_result where DATE(date_time_closed)='{$date}' AND lotto_type={$lotto_type}")->num_rows();  
        //die(print_r($num));
        if($num>0) {
            return true;
        }else {
            return false;
        }
    }
    function getLotto_resultLastSuccess($lotto_type=1) {
        $rs = $this->dbb->query("SELECT * FROM tb_lotto_result where lotto_type={$lotto_type} order by date_time_closed DESC limit 1")->result();  
        return $rs[0];
    }
    function getLotto_resultLastSuccessByDate($lotto_type=1,$date) {
        $rs = $this->dbb->query("SELECT * FROM tb_lotto_result where lotto_type={$lotto_type} AND DATE(date_time_closed)='{$date}' order by date_time_closed DESC limit 1")->result();  
        return $rs[0];
    }

    public function getLotto_result($lotto_type=1) {
        $lotto_date = $this->dbb->query("SELECT * FROM tb_lotto_date where lotto_type={$lotto_type} AND date_closed >= '".date("Y-m-d")."' AND status=1")->result_array();
        //$lotto_result = $this->dbb->query("SELECT * as num FROM tb_lotto_result")->result();
        if(isset($lotto_date[0]['id'])) {
            foreach($lotto_date as $key=>$data) {
                $lotto_result = $this->dbb->query("SELECT * FROM tb_lotto_result where lotto_type={$lotto_type} AND DATE(date_time_closed)='{$data['date_closed']}'")->result_array();
                
                if(!isset($lotto_result[0]['id'])) {
                    return $data['date_closed'];
                }
            }
        }
        
        $num = $this->dbb->query("SELECT count(date_time_closed) as num FROM tb_lotto_result where lotto_type={$lotto_type} AND YEAR(date_time_closed)='".date("Y")."' and "." MONTH(date_time_closed)='".date('m')."' ")->result();
        $num = $num[0]->num;
        $ret = strtotime(date("Y-m").'-01');
        if($num==2) {
            $ret = date("Y-m-d", strtotime("+1 month", $ret));
        }else if($num==1) {
            $ret = date("Y-m")."-16";
        }else {
            $ret = date("Y-m")."-01";
        } 
        return  $ret;
    }

    public function getLottoWinner($lotto_type=1,$date='') {
        return $this->dbb->query("select * from tb_lotto_winner where lotto_type='{$lotto_type}' AND lotto_group='{$date}'")->result_array(); 
    }

    public function getSuccessMemberLogResult($lotto_type=1,$date='') {
        $lastrow = $this->getLotto_resultLastSuccess(); //ดึงงวดหลังสุดที่ ประกาศรางวัล
        if($date!='') {
            $lastrow = $this->getLotto_resultLastSuccessByDate($lotto_type,$date); //ดึงงวดหลังสุดที่ ประกาศรางวัล
        }

        //clear ภาย Data ในงวด
        $this->dbb->query("delete from tb_lotto_winner where lotto_type='{$lotto_type}' AND lotto_group='{$date}'");
        //clear ภาย Data ในงวด

        if(empty($lastrow)){return array();}
        $result = array();
        $result['3up'] = array('label'=>'3 ตัวบน','num'=>substr($lastrow->special,3,3),'isarray'=>false); //3 ตัวบน / 3 ตัวตรง
        $result['3tod'] = array('label'=>'3 ตัวโต๊ด','num'=>$this->switchNumber(substr($lastrow->special,3,3)),'isarray'=>true);
        $result['3front_1'] = array('label'=> '3 ตัวหน้า','num'=>substr($lastrow->three_front,0,3),'isarray'=>false);
        $result['3front_2'] = array('label'=> '3 ตัวหน้า','num'=>substr($lastrow->three_front,4,3),'isarray'=>false);
        $result['3down_1'] = array('label'=> '3 ตัวล่าง','num'=>substr($lastrow->three_back,0,3),'isarray'=>false);
        $result['3down_2'] = array('label'=> '3 ตัวล่าง','num'=>substr($lastrow->three_back,4,3),'isarray'=>false);
        $result['2up'] = array('label'=> '2 ตัวบน','num'=>substr($lastrow->special,4,2),'isarray'=>false);
        $result['2down'] = array('label'=> '2 ตัวล่าง','num'=>$lastrow->two_down,'isarray'=>false);
        $result['runup'] = array('label'=> 'วิ่งบน','num'=>$this->runCheck(substr($lastrow->special,3,3)),'isarray'=>true);
        $result['rundown'] = array('label'=> 'วิ่งล่าง','num'=>$this->runCheck($lastrow->two_down),'isarray'=>true);

        //die('<pre>'.print_r($result).'</pre>');
        
        $rows = $this->dbb->query("SELECT a.*,b.name,b.description FROM tb_lotto_member_log as a inner join tb_lotto_reward_type as b on a.lotto_reward_type=b.id where a.lotto_type = {$lotto_type} and DATE(a.lotto_group) = '".substr($lastrow->date_time_closed,0,10)."'")->result_array();  
        //die(print_r($rows));
        $ret = array();
        $rw = $this->getRateReward();
        foreach($rows as $key=>$data) {
            foreach($result as $key00=>$data00) { //เช็ึคในตัวเลขออกรางวัล
                if($data00['label']==$data['description']) { // มีเบอร์ที่ถูก
                    //ทำตัวเลขให้ถูกก่อนเช็ค

                    $number = $data['number'];

                    if($data['description'][0]=='3') {
                        if($number<10){
                            $number = '00'.$number;
                        }else if($number<100){
                            $number = '00'.$number;
                        }
                    }else if($data['description'][0]=='2') {
                        if($number<10){
                            $number = '0'.$number;
                        }
                    }
                    //END ทำตัวเลขให้ถูกก่อนเช็ค



                    //เช็คว่าตัวเลขตรงไหม
                    $chk = 0;
                    if($data00['isarray']) {//ถ้าเป็นเลขชุด ที่ต้องเช็ค
                        foreach($data['num'] as $key11=>$data11) {
                            if($data11==$number) {
                                $chk = 1;
                            }
                        }
                    }else { 
                        if($number==$data00['num']) {
                            $chk = 1;
                        }
                    }
                    if($chk==1) {//เช็คอัตราการจ่ายเลขอั้น && เรทรางวัล
                        $data['reward'] = 0;
                        foreach($rw as $key0011 => $data0011) {
                            //console.log(unit+":::"+parseFloat(rateReward[ll].min)+'::'+parseFloat(rateReward[ll].max));
                            if(floatval($data['amount'])>=floatval($data0011->min) && floatval($data['amount'])<=floatval($data0011->max) && $data['lotto_reward_type']==$data0011->lotto_reward_type) {
                                $data['reward'] = floatval($data0011->reward);
                                break;
                            }else {
                                //$data['reward'] =  2.9;
                            }
                        }
                        if($data['reward']==0) {
                            $data['reward'] =  2.9;
                        }
                        
                        $rs = $this->dbb->query("select * from tb_lotto_deprive where lotto_type={$lotto_type} and lotto_reward_type={$data['lotto_reward_type']} and number='{$number}' and lotto_group='{$data['lotto_group']}'")->result_array();
                        $data['deprive'] = false;
                        if(isset($rs[0]['number'])) {
                            $data['reward'] = $rs[0]['reward'];
                            $data['deprive'] = true;
                        }
                        $data['price'] = floatval($data['reward'])*$data['amount'];
                        $mb = $this->dbf->query("SELECT a.*,b.userid,b.username FROM tb_member_account as a INNER JOIN tb_sbobet_account as b on a.id = b.member_id WHERE a.id = '{$data['member_id']}'")->result_array();
                        $data['member_name'] = "";
                        if(isset($mb[0]['username'])){
                            $data['member_name'] = substr($mb[0]['username'],0,5).'****';
                        }
                        $ret[] = array(
                        'member_id'=>$data['member_id'],
                        'member_name'=>$data['member_name'],
                        'number'=>$data['number'],
                        'name'=>$data['name'],
                        'deprive'=>$data['deprive'],
                        'description'=>$data['description'],
                        'amount'=>$data['amount'],
                        'reward'=>$data['reward'],
                        'price'=>$data['price'],
                        'lotto_type'=>$data['lotto_type'],
                        'lotto_reward_type'=> $data['lotto_reward_type'],
                        'lotto_group' => $data['lotto_group'],
                        'member_log' => $data['id'],
                        'date_time_add'=>$data['date_time_add'],
                        'process_time' =>date("Y-m-d H:i:s"),
                        );
                    }
                    //END เช็คว่าตัวเลขตรงไหม
                }
            }
        }
        if(count($ret)>0) {
            $result = $this->dbb->insert_batch('tb_lotto_winner', $ret);
        }
        return $ret;
    }

    public function runCheck($string) {
        $ret = array();
        for($i=0;$i<strlen($string);$i++) {
            $ret[] = $string[$i];
        }
        return $ret;
    }

    public function switchNumber($num) {  //var num = '049'; //ตัวเลขที่ต้องการหาโต๊ด
        $textnum = $num; //แปลงตัวเลขเป็นตัวอักษร
        $numlv1 = []; //ประกาศตัวแปลให้เป็น Array
        $numlv2 = [];
        //จัดการ level 1 โดยการสลับตัวเลข 2 หลักซ้ายสุด
        $numlv1[0]=substr($textnum,0,1).substr($textnum,1,1);
        $numlv1[1]=substr($textnum,1,1).substr($textnum,0,1);
        //จัดการ level 2
        $endnum = substr($textnum,2,1); //จำเลขตัวสุดท้าย
        $num_string = "";
        for($i=0;$i<=(2-1);$i++){ //วนลูปการแทรกตัวเลข ทั้ง 2 ตัวเลขจาก level 1
          $num = substr($numlv1[$i],0,1).' '.substr($numlv1[$i],1,1);
          $numlv2[0] = substr($numlv1[$i],0,1); //แยกตัวเลข หลักแรกออกมา จากตัวเลข level 1
          $numlv2[1] = substr($numlv1[$i],1,1); //แยกตัวเลข หลักที่ 2 ออกมา จากตัวเลข level 1
          //console.log(num_string.trim()+'::'+(endnum+numlv2[0]+numlv2[1]+" "+numlv2[0]+endnum+numlv2[1]+" "+numlv2[0]+numlv2[1]+endnum));
          if(trim($num_string)!=($endnum+$numlv2[0].$numlv2[1]." ".$numlv2[0].$endnum+$numlv2[1]." ".$numlv2[0].$numlv2[1].$endnum)) {
            $num_string = $num_string.' '.$endnum.$numlv2[0].$numlv2[1]." ".$numlv2[0].$endnum.$numlv2[1]." ".$numlv2[0].$numlv2[1].$endnum;
          }
        }
           //แทรกตัวเลขตัวสุดท้าย หน้า กลาง หลัง
           //console.log(endnum+numlv2[0]+numlv2[1]+" "+numlv2[0]+endnum+numlv2[1]+" "+numlv2[0]+numlv2[1]+endnum); //แสดงผล
        $arr = explode(" ",trim($num_string));
        return $arr;
        //console.log(arr.sort());
        //return arr.filter((v, i, a) => a.indexOf(v) === i).sort();
    } 

    public function getHistBill() {
        $member_id = sess_userdata('id');
        $q = $this->dbb->query(" select * from tb_lotto_member_log where member_id={$member_id} group by lotto_group order by lotto_group DESC")->result();
        return $q;
    }
    public function getHistBillOnce($date) {
        $member_id = sess_userdata('id');
        $num = $this->dbb->query(" select lotto_group from tb_lotto_member_log where member_id={$member_id} and lotto_group='{$date}' group by lotto_group")->num_rows();  
        return $num;
    }
    public function getHistBillSum($date) {
        $member_id = sess_userdata('id');
        $rs = $this->dbb->query(" select sum(amount) as sum from tb_lotto_member_log where member_id={$member_id} and lotto_group='{$date}'")->result();  
        return $rs[0]->sum;
    }

    public function histMyNumber($lotto_type=1,$set_id='') {
        $member_id = sess_userdata('id');
        if($set_id!='') {
            $set_id = " id={$set_id} AND ";
        }
        $q = $this->dbb->query("select * from tb_lotto_set_number where {$set_id} member_id={$member_id} and lotto_type={$lotto_type} and status=1 order by date_time_add DESC")->result_array();
        return $q;
    }
    public function histMyNumberList($set_id) {
        $member_id = sess_userdata('id');
        $q = $this->dbb->query("select a.*,b.description from tb_lotto_set_numberlist as a inner join tb_lotto_reward_type as b on a.lotto_reward_type=b.id  where a.set_id={$set_id}")->result_array();
        return $q;
    }
    public function cls_lotto_setnumber_member($set_id) {
        // $lotto_reward_type
        // $lotto_type
        //$member_id = sess_userdata('id');
        // $date_time
        $q = $this->dbb->query("delete from tb_lotto_set_numberlist where set_id = {$set_id}");
        return $q;
    }
    public function dlt_lotto_setnumber_member($set_id) {
        // $lotto_reward_type
        // $lotto_type
        $member_id = sess_userdata('id');
        // $date_time
        $q = $this->dbb->query("delete from tb_lotto_set_numberlist where set_id = {$set_id}");
        $q = $this->dbb->query("delete from tb_lotto_set_number where id = {$set_id}");
        return $q;
    }
    public function save_set_number($data_insert)
    { 
        $result = $this->dbb->insert('tb_lotto_set_number', $data_insert);
        if($result){
            return $this->dbb->insert_id();
        }
        else {
            return false;
        } 
    } 
    public function update_set_number($data_update,$set_id)
    { 
        $result = $this->dbb->update('tb_lotto_set_number', $data_update,array('id'=>$set_id));
        if($result){
            return true;;
        }
        else {
            return false;
        } 
    } 
    public function save_set_numberlist($data_insert)
    { 
        $result = $this->dbb->insert_batch('tb_lotto_set_numberlist', $data_insert);
        if($result){
            return true;
        }
        else {
            return false;
        } 
    } 

    public function updateWallet($CutCreditWallet=0) {
        $q = $this->dbf->query("select wallet_balance from tb_member_wallet where member_id=".sess_userdata('id'))->result_array();
        $amount = 0;
        if(isset($q[0]['wallet_balance'])) {
            $amount = floatval($q[0]['wallet_balance'])-floatval($CutCreditWallet);
        }
        if($amount<1)$amount=0;

        $this->dbf->update('tb_member_wallet', array('wallet_balance' => $amount, 'last_updated' => date('Y-m-d H:i:s')),array('member_id', sess_userdata('id')));
    }


    //การจัดการเลขอั้น
    function getDate_result($lotto_type=1) {
        $rs = $this->dbb->query("SELECT date_closed FROM tb_lotto_date where lotto_type={$lotto_type} and status=1 order by date_closed DESC")->result_array();  
        return $rs;
    }
    public function getDepriveAll($label_arr,$lotto_type=1,$date) {
        $rs = $this->dbb->query("select a.*,b.name,b.description from  tb_lotto_deprive as a inner join tb_lotto_reward_type as b on a.lotto_reward_type=b.id where a.lotto_type={$lotto_type} and a.lotto_group='{$date}' and a.status=1 order by a.lotto_reward_type ASC,a.id ASC")->result_array(); 
        return $rs;
    }
    public function getDeprive($label_arr,$lotto_type=1,$date) {
        $rs0 = $this->dbb->query("select a.*,b.name,b.description from  tb_lotto_deprive as a inner join tb_lotto_reward_type as b on a.lotto_reward_type=b.id where a.lotto_type={$lotto_type} and a.lotto_group='{$date}' and a.status=1 group by b.name")->result(); 
        $ret = array();
        foreach($rs0 as $key=>$data) {
            $arr = explode('_',$label_arr[$data->description]);
            $label = $arr[0].'_'.$arr[1];
            $ret[] = array('numlabel'=>$label,'numtext'=>$data->description,'num'=>array());
        }
        $rs = $this->dbb->query("select a.*,b.name,b.description from  tb_lotto_deprive as a inner join tb_lotto_reward_type as b on a.lotto_reward_type=b.id where a.lotto_type={$lotto_type} and a.lotto_group='{$date}' and a.status=1")->result(); 
        foreach($rs as $key=>$data) {
            $arr = explode('_',$label_arr[$data->description]);
            $label = $arr[0].'_'.$arr[1];
            foreach($ret as $key1=>$data1) {
                if($data1['numlabel']==$label) {
                    $ret[$key1]['num'][] = $data->number.'_'.$data->reward;
                }
            }
        }
        return $ret;
    }

    public function insertDeprive($data_insert = array()) {
        $result = $this->dbb->insert('tb_lotto_deprive', $data_insert);
        if($result){
            return $this->dbb->insert_id();
        }
        else {
            return false;
        } 
    }
    public function updateDeprive($data_update,$id=0)
    { 
        $result = $this->dbb->update('tb_lotto_deprive', $data_update,array('id'=>$id));
        if($result){
            return true;;
        }
        else {
            return false;
        } 
    } 
    public function deleteDeprive($id=0)
    { 
        $result = $this->dbb->update('tb_lotto_deprive', array('status'=>0),array('id'=>$id));
        if($result){
            return true;;
        }
        else {
            return false;
        } 
    } 
    //การจัดการเลขอั้น

    //การจัดการ งวดออกหวยล่วงหน้า
    public function getLottoDateAll($lotto_type=1) {
        $rs = $this->dbb->query("select * from tb_lotto_date where status=1 order by date_closed DESC")->result_array(); 
        return $rs;
    }
    public function insertLottoDate($data_insert = array()) {
        $result = $this->dbb->insert('tb_lotto_date', $data_insert);
        if($result){
            return $this->dbb->insert_id();
        }
        else {
            return false;
        } 
    }
    public function updateLottoDate($data_update,$id=0)
    { 
        $result = $this->dbb->update('tb_lotto_date', $data_update,array('id'=>$id));
        if($result){
            return true;;
        }
        else {
            return false;
        } 
    } 
    public function deleteLottoDate($id=0)
    { 
        $result = $this->dbb->update('tb_lotto_date', array('status'=>0),array('id'=>$id));
        if($result){
            return true;;
        }
        else {
            return false;
        } 
    }
    //การจัดการ งวดออกหวยล่วงหน้า
    
    public function getLottoWinnerAll() {
        $rs = $this->dbb->query("SELECT count(*) as num,tb_lotto_winner.* FROM tb_lotto_winner GROUP by lotto_group order by lotto_group DESC")->result_array();
        return $rs;
    }
    public function insertLottoResult($data_insert = array()) {
        $result = $this->dbb->insert('tb_lotto_result', $data_insert);
        if($result){
            return $this->dbb->insert_id();
        }
        else {
            return false;
        } 
    }
}

/* End of file Lotto_model.php */
/* Location: ./application/models/process/Lotto_model.php */
