<style type="text/css">
    * {
        font-size: 18px;
    }
</style>
<?php
$id        = sess_userdata('id');
$this->dbf = $this->load->database('db_front', true);
$this->dbb = $this->load->database('db_back', true);

// P Noung Edit
$q              = $this->dbf->query("SELECT * FROM `tb_member_deposit_log` WHERE member_id=$id and status= 1");
$w              = $this->dbf->query("SELECT * FROM `tb_member_wallet` WHERE member_id=$id");
$member_account = $this->dbf->query("SELECT topup_first_time FROM `tb_member_account` WHERE id=$id");
$s              = $this->dbf->query("SELECT * FROM `tb_sbobet_account` WHERE member_id=$id"); //$s[username]
$a              = $this->dbf->query("SELECT * FROM `tb_member_deposit_log` WHERE member_id=$id order by id desc limit 1");
if ($a->row()->memo == "") {
    $lastbonus = "bonus_no";
} else {
    $lastbonus = "bonus_yes";
}

$member_bonus_status = $this->dbf->query("SELECT bonus_status FROM `tb_member_account` WHERE id=$id")->row()->bonus_status;
$member_promotion    = $this->dbf->query("SELECT * FROM `tb_member_promotion` WHERE member_id=$id");
$promotion_list      = $this->dbb->query("SELECT * FROM `tb_promotion` WHERE status='1'");
$count_promotion     = $promotion_list->num_rows();
 
// End
?>

<div class="form-lg df-full container">

    <?php if ($this->session->flashdata('err_msg')): ?>
        <div role="alert" class="alert alert-danger alert-dilgissible fade show">
            <ul>
                <li><?php echo $this->session->flashdata('err_msg') ?></li>
            </ul>
        </div>
    <?php endif?>

    <div class="py-3">


    <?php
if ($member_bonus_status == 0) {
    //เปิดใช้โบนัส
    // if ($q->num_rows() > 0) {
        if ($count_promotion <= 0) {
            echo '<div role="alert" class="alert alert-danger alert-dilgissible fade show text-center">
            ประกาศ !! ปิดปรังปรุงระบบโบนัสชั่วคราว ขออภัยในความไม่สะดวก
            </div>';
        } else {
            foreach ($promotion_list->result_array() as $rows) {
                $promotion_id     = $rows['id'];
                $promotion_name   = $rows['promotion_name'];
                $promotion_status = $rows['status'];

                
                $promotion_count_list = $this->dbf->query("SELECT id FROM tb_member_deposit_bonus_log  where promotion_id = '$promotion_id' GROUP BY member_id");
                $count_member_of_promotion     = $promotion_count_list->num_rows(); 
                if ($promotion_id == 1 && $member_account->row()->topup_first_time == 2) {

                    if ($count_promotion > 1) {

                    } else {
                        echo '<div role="alert" class="alert alert-danger alert-dilgissible fade show text-center">
                        ประกาศ !! ปิดปรังปรุงระบบโบนัสชั่วคราว ขออภัยในความไม่สะดวก
                        </div>';
                    }

                } else {

                    echo '<div class="bg-dark rounded-lg d-flex flex-row align-items-center justify-content-between p-3 mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <div>' . $promotion_name . '</div>
                            </div>
                            <div>
                            <a href="';
                    echo base_url('bonus/getbonus_by_id/') . $promotion_id;
                    echo '"><button class="btn modal-show btn-lg btn-outline-primary">
                                    รับโบนัส
                                </button></a>
                                <button class="btn modal-show btn-lg btn-outline-success">
                                รับไปแล้ว '.$count_member_of_promotion.' ท่าน
                            </button>
                                </div>
                        </div>';

                }
            }

        }

    // } else {
    //     echo '<div role="alert" class="alert alert-secondary alert-dilgissible fade show text-center">
    //                     คุณยังไม่มียอดฝาก ไม่สามารถรับโบนัสได้
    //                 </div>';
    // }
} else {
    //ไม่รับโบนัส
    echo '<div role="alert" class="alert alert-danger alert-dilgissible fade show text-center">
    คุณไม่สามารถรับโบนัสได้ เนื่องจากคุณเลือกที่จะไม่รับโบนัส
    </div>';
}

?>

    </div>

</div>
