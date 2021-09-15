<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use GuzzleHttp\Pool;
// use GuzzleHttp\Client;
// use GuzzleHttp\Psr7\Request;

class Wheel_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->dbf = $this->load->database('db_front', true);
        $this->dbb = $this->load->database('db_back', true);

        $this->dbf->cache_on();
        $this->dbb->cache_on();
    }

    public function setPointToday($p=10,$member_id) {

        $rs = $this->dbb->query("select *  from tb_game_points where DATE(datetime) = '".date("Y-m-d")."' AND type = 'debit' AND chanel=2 AND member_id='{$member_id}' AND status=1 order by datetime DESC limit 1")->result_array(); 
        if(isset($rs[0])) {
            return false;
        }else {
            $bonus_rate = $this->getBonusRate();

            $date_dest = date("Y-m-d"); 
            $date_sort = date("Y-m-d", strtotime("-30 day",strtotime($date_dest)));
            $rs = $this->dbb->query("select * from tb_game_points where (DATE(datetime)>='{$date_sort}' AND DATE(datetime)<='{$date_dest}') AND type = 'debit' AND chanel=2 AND member_id='{$member_id}' AND status=1 order by datetime DESC")->result_array(); 
            $p = 1;
            $count = 1;
            $previousDate = "";
    
            foreach($rs as $key=>$data) {
                $nowDate = substr($data['datetime'],0,10);
                if($key==0) {
                    $previousDate = substr($data['datetime'],0,10);
                    continue;
                }
                $dd_date = date("Y-m-d", strtotime("-1 day",strtotime($previousDate)));
                
                if($nowDate==$dd_date) {
                    $previousDate = $nowDate;
                    $count++;
                }else {
                    break;
                }
            }

            foreach($bonus_rate as $key=>$data) {
                if($data['day_count']==$count) {
                    $p = $data['point_bonus'];
                    break;
                }
            }

            $id = $this->dbb->insert('tb_game_points',array(
                "datetime"=>date("Y-m-d H:i:s"),
                "point"=>$p,
                "type"=>"debit",
                "chanel"=>2,
                "member_id"=>$member_id
            ));
            

            return $p;
        }
    }

    public function setPointWin($p=3,$member_id,$pwin=0) {
        //
        $id1 = $this->dbb->insert('tb_game_points',array(
            "datetime"=>date("Y-m-d H:i:s"),
            "point"=>((-1)*$p),
            "type"=>"credit",
            "chanel"=>1,
            "member_id"=>$member_id
        ));
        //
        $id2 = $this->dbb->insert('tb_game_points',array(
            "datetime"=>date("Y-m-d H:i:s"),
            "point"=>$pwin,
            "type"=>"debit",
            "chanel"=>1,
            "member_id"=>$member_id
        ));

        return array($id1,$id2);
    }

    public function getPoint($member_id='') {
        $rs = $this->dbb->query("select sum(point) as num from tb_game_points where member_id='{$member_id}' AND status=1")->result_array(); 
        if(isset($rs[0]['num'])) {
            return number_format($rs[0]['num'],2);
        }else {
            return 0;
        }
    }

    public function getBonusRate() {
        $rs = $this->dbb->query("select * from tb_bonus_rate")->result_array(); 
        return $rs;
    }

    public function getBonusOrderCountHist($member_id='') {
        $date_dest = date("Y-m-d"); 
        $date_sort = date("Y-m-d", strtotime("-30 day",strtotime($date_dest)));
        $rs = $this->dbb->query("select * from tb_game_points where (DATE(datetime)>='{$date_sort}' AND DATE(datetime)<='{$date_dest}') AND type = 'debit' AND chanel=2 AND member_id='{$member_id}' AND status=1 order by datetime DESC")->result_array(); 
        $count = 1;
        $previousDate = "";

        foreach($rs as $key=>$data) {
            $nowDate = substr($data['datetime'],0,10);
            if($key==0) {
                $previousDate = substr($data['datetime'],0,10);
                continue;
            }
            $dd_date = date("Y-m-d", strtotime("-1 day",strtotime($previousDate)));
            
            if($nowDate==$dd_date) {
                $previousDate = $nowDate;
                $count++;
            }else {
                break;
            }
        }
        return $count;
    }

}

/* End of file Lotto_model.php */
/* Location: ./application/models/process/Lotto_model.php */
