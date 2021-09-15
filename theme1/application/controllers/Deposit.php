<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deposit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_login();
        is_nothave_username();
        $this->load->model('process/Topup_model', 'topupmd');
        // is_allow_browser();
    }

    public function index()
    {
        $this->load->model('process/Member_model', 'member_md');
        $member_bank    = $this->topupmd->get_member_bank_by_id(sess_userdata('id'));
        $web_config     = $this->member_md->withdraw_config(1);
        $close_register = $web_config->close_register;
        $text_register  = $web_config->text_register;

        $front_title       = $web_config->front_title;
        $front_description = $web_config->front_description;
        $front_keywords    = $web_config->front_keywords;

        $data['title']          = $front_title;
        $data['description']    = $front_description;
        $data['keywords']       = $front_keywords;
        $data['close_register'] = $close_register;
        $data['text_register']  = $text_register;
        $bank_name              = $member_bank->bank_name;
        if ($bank_name == 'SCB') {
            $bank_name = 'BAY';
        }

        $data['bank']        = $this->topupmd->get_admin_bank_from_bank_name($bank_name);
        $data['turn_amount'] = db_userdata('turn_amount');

        // Get Primary Bank
        $primary_bank            = $this->topupmd->get_admin_primary_bank();
        $data['request_deposit'] = $this->Member_model->getRequestDeposit(sess_userdata('id'));

        if (!$data['bank']) {
            $data['bank'] = $this->topupmd->get_admin_bank_from_bank_name($primary_bank);
        }
        $data['truewallet'] = $this->topupmd->get_admin_bank_from_bank_name('TRUEWALLET');
        $data['page_header']  = 'deposit/header';
        $data['page_content'] = 'deposit/content';
        $this->load->view('layout/layout_title', $data, false);
    }

    public function bank($id)
    {
        $data['bank']         = $this->topupmd->get_deposit_bank($id);
        $data['page_header']  = 'deposit/bank/header';
        $data['page_content'] = 'deposit/bank/content';
        $data['page_js']      = 'deposit/bank/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb()
    {
        $data['page_header']  = 'deposit/scb/header';
        $data['page_content'] = 'deposit/scb/content';
        $data['page_js']      = 'deposit/scb/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb1()
    {
        $data['page_header']  = 'deposit/scb1/header';
        $data['page_content'] = 'deposit/scb1/content';
        $data['page_js']      = 'deposit/scb1/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb2()
    {
        $data['page_header']  = 'deposit/scb2/header';
        $data['page_content'] = 'deposit/scb2/content';
        $data['page_js']      = 'deposit/scb2/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb3()
    {
        $data['page_header']  = 'deposit/scb3/header';
        $data['page_content'] = 'deposit/scb3/content';
        $data['page_js']      = 'deposit/scb3/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb4()
    {
        $data['page_header']  = 'deposit/scb4/header';
        $data['page_content'] = 'deposit/scb4/content';
        $data['page_js']      = 'deposit/scb4/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb5()
    {
        $data['page_header']  = 'deposit/scb5/header';
        $data['page_content'] = 'deposit/scb5/content';
        $data['page_js']      = 'deposit/scb5/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb6()
    {
        $data['page_header']  = 'deposit/scb6/header';
        $data['page_content'] = 'deposit/scb6/content';
        $data['page_js']      = 'deposit/scb6/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb7()
    {
        $data['page_header']  = 'deposit/scb7/header';
        $data['page_content'] = 'deposit/scb7/content';
        $data['page_js']      = 'deposit/scb7/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb8()
    {
        $data['page_header']  = 'deposit/scb8/header';
        $data['page_content'] = 'deposit/scb8/content';
        $data['page_js']      = 'deposit/scb8/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb9()
    {
        $data['page_header']  = 'deposit/scb9/header';
        $data['page_content'] = 'deposit/scb9/content';
        $data['page_js']      = 'deposit/scb9/js';
        $this->load->view('layout/master', $data, false);
    }

    public function scb10()
    {
        $data['page_header']  = 'deposit/scb10/header';
        $data['page_content'] = 'deposit/scb10/content';
        $data['page_js']      = 'deposit/scb10/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay()
    {
        $data['page_header']  = 'deposit/bay/header';
        $data['page_content'] = 'deposit/bay/content';
        $data['page_js']      = 'deposit/bay/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay1()
    {
        $data['page_header']  = 'deposit/bay1/header';
        $data['page_content'] = 'deposit/bay1/content';
        $data['page_js']      = 'deposit/bay1/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay2()
    {
        $data['page_header']  = 'deposit/bay2/header';
        $data['page_content'] = 'deposit/bay2/content';
        $data['page_js']      = 'deposit/bay2/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay3()
    {
        $data['page_header']  = 'deposit/bay3/header';
        $data['page_content'] = 'deposit/bay3/content';
        $data['page_js']      = 'deposit/bay3/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay4()
    {
        $data['page_header']  = 'deposit/bay4/header';
        $data['page_content'] = 'deposit/bay4/content';
        $data['page_js']      = 'deposit/bay4/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay5()
    {
        $data['page_header']  = 'deposit/bay5/header';
        $data['page_content'] = 'deposit/bay5/content';
        $data['page_js']      = 'deposit/bay5/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay6()
    {
        $data['page_header']  = 'deposit/bay6/header';
        $data['page_content'] = 'deposit/bay6/content';
        $data['page_js']      = 'deposit/bay6/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay7()
    {
        $data['page_header']  = 'deposit/bay7/header';
        $data['page_content'] = 'deposit/bay7/content';
        $data['page_js']      = 'deposit/bay7/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay8()
    {
        $data['page_header']  = 'deposit/bay8/header';
        $data['page_content'] = 'deposit/bay8/content';
        $data['page_js']      = 'deposit/bay8/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay9()
    {
        $data['page_header']  = 'deposit/bay9/header';
        $data['page_content'] = 'deposit/bay9/content';
        $data['page_js']      = 'deposit/bay9/js';
        $this->load->view('layout/master', $data, false);
    }

    public function bay10()
    {
        $data['page_header']  = 'deposit/bay10/header';
        $data['page_content'] = 'deposit/bay10/content';
        $data['page_js']      = 'deposit/bay10/js';
        $this->load->view('layout/master', $data, false);
    }

    public function request()
    {
        $data['page_header']  = 'deposit/request/header';
        $data['page_content'] = 'deposit/request/content';
        $data['page_js']      = 'deposit/request/js';
        $data['turn_amount']  = db_userdata('turn_amount');

        $this->load->view('layout/master', $data, false);
    }

    public function kbank()
    {
        redirect(base_url('deposit'), 'refresh');
        // $data['page_header'] = 'deposit/kbank/header';
        // $data['page_content'] = 'deposit/kbank/content';
        // $data['page_js'] = 'deposit/kbank/js';
        // $this->load->view('layout/master', $data, FALSE);
    }

    public function kbank1()
    {
        $data['page_header']  = 'deposit/kbank1/header';
        $data['page_content'] = 'deposit/kbank1/content';
        $data['page_js']      = 'deposit/kbank1/js';
        $this->load->view('layout/master', $data, false);
    }

    public function kbank2()
    {
        $data['page_header']  = 'deposit/kbank2/header';
        $data['page_content'] = 'deposit/kbank2/content';
        $data['page_js']      = 'deposit/kbank2/js';
        $this->load->view('layout/master', $data, false);
    }

    public function kbank3()
    {
        $data['page_header']  = 'deposit/kbank3/header';
        $data['page_content'] = 'deposit/kbank3/content';
        $data['page_js']      = 'deposit/kbank3/js';
        $this->load->view('layout/master', $data, false);
    }

    public function kbank4()
    {
        $data['page_header']  = 'deposit/kbank4/header';
        $data['page_content'] = 'deposit/kbank4/content';
        $data['page_js']      = 'deposit/kbank4/js';
        $this->load->view('layout/master', $data, false);
    }

    public function kbank5()
    {
        $data['page_header']  = 'deposit/kbank5/header';
        $data['page_content'] = 'deposit/kbank5/content';
        $data['page_js']      = 'deposit/kbank5/js';
        $this->load->view('layout/master', $data, false);
    }

    public function requestKbank()
    {
        header('Content-Type: application/json');

        $this->load->model('process/Topup_model', 'topupmd');
        $member_id = sess_userdata('id');
        $amount    = $this->input->post('request_amount');

        // echo json_encode($this->input->post());

        if ($amount == '' || $amount == 0) {
            $response['status']  = 'error';
            $response['message'] = 'ไม่สามารถทำรายการได้ กรุณาลองใหม่อีกครั้งค่ะ';
            echo json_encode($response);
            exit();
        }

        $resp = $this->topupmd->put_kbank_request($amount, $member_id);

        if ($resp == false) {
            $response['status']  = 'error';
            $response['message'] = 'ไม่สามารถทำรายการได้ในขณะนี้';
            echo json_encode($response);
        } else {
            $response['status']  = 'success';
            $response['message'] = '';
            $response['data']    = $resp;
            echo json_encode($response);
        }
    }

    public function checkKbank()
    {
        header('Content-Type: application/json');
        $this->load->model('process/Topup_model', 'topupmd');
        $member_id = sess_userdata('id');
        $amount    = $this->input->post('request_amount');
        echo json_encode($this->topupmd->check_kbank_request($member_id, $amount));
    }

    public function request_que()
    {
        header('Content-Type: application/json');

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('process/Topup_model', 'topupmd');
        $member_id         = sess_userdata('id');
        $trans_in_datetime = $this->input->post('deposit_date') . " " . $this->input->post('deposit_hours') . ":" . $this->input->post('deposit_min') . ":00";
        $deposit_account   = (explode("|", $this->input->post('deposit_account')));
        $trans_in_bank     = $deposit_account[0];
        $acc_id            = $deposit_account[1];
        $amount            = $this->input->post('deposit_amount');
        $transection_no    = 'REQ' . sprintf('%06d', $amount) . $trans_in_bank . $acc_id . strtotime($trans_in_datetime) . $member_id;
        $req_trn_arr       = array('transection_no' => $transection_no,
            'trans_in_datetime'                         => $trans_in_datetime,
            'amount'                                    => $amount,
            'bank_id'                                   => null,
            'bank_number'                               => null,
            'name'                                      => null,
            'retrive_datetime'                          => date('Y-m-d H:i:s'),
            'member_id'                                 => $member_id,
            'trans_in_bank'                             => $trans_in_bank,
            'acc_id'                                    => $acc_id,
            'attach'                                    => null);

        // เพิ่ม attach file

        if ($_FILES['fileToUpload']['size'] > 0) {
            $config['upload_path']   = FCPATH . 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '100';
            $config['max_width']     = '1024';
            $config['max_height']    = '768';

            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('fileToUpload')) {
                // Upload failed
                $req_trn_arr['attach'] = "";

            } else {
                $data = array('upload_data' => $this->upload->data());

                if (!empty($data)) {
                    $target_dir    = FCPATH . "/uploads/attach/";
                    $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    $new_file        = md5(time()) . "." . $imageFileType;
                    $new_target_file = $target_dir . $new_file;

                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $new_target_file)) {
                        // $img1 =  $data['upload_data']['file_name'];
                        $req_trn_arr['attach'] = $new_file;
                    } else {
                        $req_trn_arr['attach'] = null;
                    }
                }
            }
        } else {
            /// หา Input ไฟล์ที่ Upload ไม่เจอ
            $req_trn_arr['attach'] = "https://cdn11.bigcommerce.com/s-auu4kfi2d9/stencil/59606710-d544-0136-1d6e-61fd63e82e44/e/0fa64ac0-0314-0137-cf43-1554cd16a871/icons/icon-no-image.svg";
        }

        // เพิ่ม attach file

        $req_status = $this->topupmd->put_request_transection($req_trn_arr);

        if ($req_status === false) {
            $response['status']  = false;
            $response['message'] = 'ตรวจสอบพบรายการซ้ำ';
            echo json_encode($response);
        } else {

            $response['status']  = true;
            $response['message'] = 'ระบบได้ทำการแจ้งไปยังพนักงานเรียบร้อยแล้ว<br>กรุณารอตรวจสอบรายการ 1-3 นาที';
            echo json_encode($response);
        }
    }

    public function request_div()
    {
        $this->load->model('process/Topup_model', 'topupmd');
        $wait_request = $this->topupmd->wait_request_transection(sess_userdata('id'));

        if ($wait_request === true) {
            ?>
		<form action="<?php echo base_url('deposit/request_que'); ?>" id="request_form" method="post" enctype="multipart/form-data" class="form-horizontal text-center animated fadeIn slow" style="margin-top:10px;">
            <label class="font12 font-weight-bold">จำนวนเงินที่โอน</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">฿</span>
                </div>
                <input type="number" name="deposit_amount" class="form-control form-control-lg" value="0" style="font-size:28px !important;">
            </div>
            <label class="font12 font-weight-bold">วันที่</label>
            <div class="input-group mb-3">
                <input type="text" name="deposit_date" id="deposit_date" class="form-control form-control-lg"  style="font-size:28px !important;" placeholder="เลือกวันที่" readonly>
            </div>
            <label class="font12 font-weight-bold">เวลา</label>
            <div class="input-group mb-3">
				<select class="form-control form-control-lg" name="deposit_hours" style="font-size: 26px !important;">
				<option value="--">--</option>
                <?php for ($i = 0; $i <= 23; $i++) {?>
                    <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', $i); ?></option>
                <?php }?>
                </select>
                <label class="col-form-label" style="font-size:16px;font-weight: bolder;">&nbsp;&nbsp;:&nbsp;&nbsp;</label>
				<select class="form-control form-control-lg" name="deposit_min" style="font-size: 26px !important;">
				<option value="--">--</option>
                <?php for ($i = 0; $i <= 59; $i++) {?>
                    <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', $i); ?></option>
                <?php }?>
                </select>
            </div>
                  <p class="text-danger">ยกเลิกใช้บัญชี "ลัดดาวัลย์" และ "สรวิชญ์"</p>
            <label class="font12 font-weight-bold">ช่องทางที่โอนเข้า</label>
            <div class="input-group mb-3">
                <select class="form-control form-control-lg" name="deposit_account" style="font-size: 26px !important;">
				<?php foreach ($bank as $row): ?>
            <option value="<?php echo $row->bank_company; ?>|1"><?php echo $row->bank_company . " - " . $row->account_name; ?></option>
        </a>
        <?php endforeach?>
                </select>
            </div>
			<label class="font12 font-weight-bold">รูปภาพแนบ</label>
                     <input type="file" name="fileToUpload" />
	        <div class="text-center" style="margin: -15px; padding-top:30px;">
	            <button value="submit" name="submit" type="submit" class="btn btn-primary-lg btn-login" style="width: 50%; border-radius: 0 0 0 8px; float: left;">ต่อไป</button>
	            <button type="reset" class="btn btn-lg btn-default" style="border-radius: 0 0 15px 0; width: 50%; float: left;">ยกเลิก</button>
	        </div>
        </form>
        <script type="text/javascript">
        $(document).ready(function() {

        	$('#deposit_date').datepickerInFullscreen({
		        datepicker      : { language : 'th' },
            format          :   'YYYY-MM-DD', // YYYY-MM-DD
            startDate       : -2,
			maxDate         : 0,
		        closeOnChange	: true,
		        fakeInput		: false
	    	});


        	var request_form = $('#request_form');
	    	request_form.submit(function(e) {
	            e.preventDefault();

				var deposit_amount = $('input[name=deposit_amount]').val();
				var deposit_date = $('input[name=deposit_date]').val();
				var today = new Date();
				var month = today.getMonth()+1;
				var currentdate = today.getFullYear()+'-'+(month.toString().padStart(2, "0"))+'-'+today.getDate().toString().padStart(2, "0");
				var currenttime = today.getHours()+'-'+today.getMinutes();
				var date1 = Number(currentdate.replace('-','').replace('-',''));
				var date2 = Number(deposit_date.replace('-','').replace('-',''));

				var deposit_hours = $('select[name=deposit_hours]').val();
				var deposit_min =  $('select[name=deposit_min]').val();
				var time1 = Number(currenttime.replace('-',''))+5;
				var time2 = Number(deposit_hours+''+deposit_min); // + 5min servertime


				// console.log(time1+'---'+time2);
				// var file_upload = $('input[name=fileToUpload]').val();

	            if (!deposit_amount || deposit_amount < 1 || !deposit_date || deposit_hours == '--' || deposit_min == '--'){


					if (!deposit_date){
					$.alert({
	                    bootstrapClasses: {
	                        container: 'container',
	                        containerFluid: 'container-fluid',
	                        row: 'row',
	                    },
	                    theme: 'modern',
	                    content:
	                    '<h3 class="text-dark font18">เกิดข้อผิดพลาด</h3>' +
	                    'กรุณาระบุวันที่'
					});}

				else if (!deposit_amount) {

	                $.alert({
	                    bootstrapClasses: {
	                        container: 'container',
	                        containerFluid: 'container-fluid',
	                        row: 'row',
	                    },
	                    theme: 'modern',
	                    content:
	                    '<h3 class="text-dark font18">เกิดข้อผิดพลาด</h3>' +
	                    'กรุณาใส่จำนวนเงินที่โอนเข้ามา'
					});
				}
				else if (deposit_hours == '--' || deposit_min == '--') {

	                $.alert({
	                    bootstrapClasses: {
	                        container: 'container',
	                        containerFluid: 'container-fluid',
	                        row: 'row',
	                    },
	                    theme: 'modern',
	                    content:
	                    '<h3 class="text-dark font18">เกิดข้อผิดพลาด</h3>' +
	                    'โปรดระบุเวลาโอน'
					});
				}


	else if (!deposit_amount) {

	                $.alert({
	                    bootstrapClasses: {
	                        container: 'container',
	                        containerFluid: 'container-fluid',
	                        row: 'row',
	                    },
	                    theme: 'modern',
	                    content:
	                    '<h3 class="text-dark font18">เกิดข้อผิดพลาด</h3>' +
	                    'กรุณาใส่จำนวนเงินที่โอนเข้ามา'
					});
				}
				else {

	                $.alert({
	                    bootstrapClasses: {
	                        container: 'container',
	                        containerFluid: 'container-fluid',
	                        row: 'row',
	                    },
	                    theme: 'modern',
	                    content:
	                    '<h3 class="text-dark font18">เกิดข้อผิดพลาด</h3>' +
	                    'จำนวนเงินที่โอนเข้ามาไม่ถูกต้อง'
					});
				}


	            }
	            else
	            {
					// compare date
					if (date2 > date1) {
					$.alert({
	                    bootstrapClasses: {
	                        container: 'container',
	                        containerFluid: 'container-fluid',
	                        row: 'row',
	                    },
	                    theme: 'modern',
	                    content:
	                    '<h3 class="text-dark font18">เกิดข้อผิดพลาด</h3>' +
	                    'ไม่สามารถกำหนดวันที่ล่วงหน้าได้'
					});}

                    else {
						if (date1 == date2 && time2 > time1) {
					$.alert({
	                    bootstrapClasses: {
	                        container: 'container',
	                        containerFluid: 'container-fluid',
	                        row: 'row',
	                    },
	                    theme: 'modern',
	                    content:
	                    '<h3 class="text-dark font18">เกิดข้อผิดพลาด</h3>' +
	                    'ไม่สามารถกำหนดเวลาล่วงหน้าได้'
					});
				}
				    else {
						var form = $(this);
					var url = form.attr('action');

	                $.ajax({
	                    type: "POST",
	                    url: url,
	                    dataType: "json",
	                    data: form.serialize(),
	                    success: function(data)
	                    {
	                    	console.log(data);
	                    	if(data.status == true)
	                    	{
	                    		$.alert({
				                    bootstrapClasses: {
				                        container: 'container',
				                        containerFluid: 'container-fluid',
				                        row: 'row',
				                    },
				                    theme: 'modern',
				                    content:
				                    '<h2 class="font20 text-success">ทำรายการสำเร็จ</h2>' + data.message
				                });
	                    	}
	                    	else
	                    	{
	                    		$.alert({
				                    bootstrapClasses: {
				                        container: 'container',
				                        containerFluid: 'container-fluid',
				                        row: 'row',
				                    },
				                    theme: 'modern',
				                    content:
				                    '<h2 class="font20 text-danger">เกิดข้อผิดพลาด</h2>' + data.message
				                });
	                    	}

	                    	$('#request_div').load('<?php echo base_url('deposit/request_div'); ?>');
	                    }
	                });
					}

					} ///compare time

	            }
	        });

        });
        </script>
		<?php
} else {
            ?>
		<div class="animated fadeIn slow" style="margin-top: -20px; padding-top:60px; padding-bottom: 60px; border-radius: 0 0 15px 15px;">
	        <p class="text-center" style="margin:0;" id="waiting_text"><strong class="text-center text-danger font20">พนักงานกำลังตรวจสอบรายการฝากของคุณ<br>กรุณารอประมาณ 1-3 นาที</strong></p>
	    </div>
	    <script type="text/javascript">
	    // $(document).ready(function() {
	    // 	setInterval(function(){
	    // 		$('#request_div').html('');
	    //         $('#request_div').load('<?php echo base_url('deposit/request_div'); ?>');
	    //     }, 10000);
	    // });
	    </script>
		<?php
}
    }

    // public function testKbank()
    // {
    //     header('Content-Type: application/json');
    //     $this->load->model('process/Topup_model','topupmd');
    //     $member_id = sess_userdata('id');
    //     echo json_encode($this->topupmd->check_kbank_request($member_id,'16.01'));
    // }

    // public function kbankStep2()
    // {
    //     $data['page_header'] = 'deposit/kbank-step-2/header';
    //     $data['page_content'] = 'deposit/kbank-step-2/content';
    //     $data['page_js'] = 'deposit/kbank-step-2/js';
    //     $this->load->view('layout/master', $data, FALSE);
    // }

}

/* End of file Deposit.php */
/* Location: ./application/controllers/Deposit.php */
