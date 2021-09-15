
                
<div class="form-sm container">
    <div class="custom-tabs">

        <ul class="nav nav-tabs nav-justified" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link  active"  data-toggle="pill" role="tab" aria-controls="pills-withdraw" aria-selected="true">Games</a>
            </li>
           
        </ul>
       <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="pills-withdraw-tab">
                <div class="tab-content" >
                <!-- <div class="balance-circle d-flex flex-column justify-content-center align-items-center">
                    <a href="activity" class="" target="_self">
                        <div class="btn-free">ฟรี</div>
                    </a>
                    <i class="fal fa-wallet fa-2x pb-2 text-white"></i>
                    <span class="text-muted">กระเป๋าเงิน</span>
                    <div class="pb-2 text-white">
                        <a href="transaction" class="text-white" target="_self">
                            <span id="total_balance" class="fs-xl">
                                <i class="fal fa-sync fa-spin"></i>
                            </span>
                            THB
                        </a>
                    </div>
                </div>  -->
                </div>
                <div role="tabpanel" aria-hidden="false" class="tab-pane active"><div><div class="transfer"><div class="transfer-list row">
                
                <div class="col-4 col-sm-4 p-0"><a href="/playgame/joker" class="" target="_self"><div class="transfer-item"><figure style="text-align: center;"><img style="width: auto;max-height: 50px;text-align: center;" src="<?php echo base_url();?>/assets/images/joker.png" alt=""></figure> <div class="d-flex flex-column text-center"><span>Joker</span> <?php if ($useragent1 != null) { echo $credit_agent1.'฿';} else { echo 'ยังไม่มีบัญชี';} ?></div></div></a></div> 
                <div class="col-4 col-sm-4 p-0"><a href="/playgame/imi" class="" target="_self"><div class="transfer-item"><figure style="text-align: center;"><img style="width: auto;max-height: 50px;text-align: center;" src="<?php echo base_url();?>/assets/images/imi.png" alt=""></figure> <div class="d-flex flex-column text-center"><span>IMI</span> <?php if ($useragent2 != null) { echo $credit_agent2.'฿';} else { echo 'ยังไม่มีบัญชี';} ?></div></div></a></div> 
                <div class="col-4 col-sm-4 p-0"><a href="/playgame/ufabet" class="" target="_self"><div class="transfer-item"><figure style="text-align: center;"><img style="width: auto;max-height: 50px;text-align: center;" src="<?php echo base_url();?>/assets/images/ufabet.png" alt=""></figure> <div class="d-flex flex-column text-center"><span>Ufabet</span> <?php if ($useragent3 != null) { echo $credit_agent3.'฿';} else { echo 'ยังไม่มีบัญชี';} ?></div></div></a></div></div><!----></div>
 
            </div> 
        </div>
    </div>
</div>

<?php echo js_res('js/jquery.min.js'); ?>
<?php echo js_res('js/bootstrap.min.js'); ?>
