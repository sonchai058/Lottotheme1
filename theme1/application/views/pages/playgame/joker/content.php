
<div class="form-sm container"><div class="pt-3"><h3 class="text-primary fs-lg">ขั้นตอนง่าย ๆ ในการเล่น Joker</h3></div> <div><span class="text-primary">ขั้นตอนที่ 1</span> <p class="fs-sm">
                กดปุ่ม "เปิดบัญชี" เพื่อรับรหัสเข้าสู่ระบบและรหัสผ่านของคุณในส่วนด้านล่างของหน้านี้ จากนั้นโอนเงินเข้ากระเป๋าเงิน Joker
            </p></div> <div><span class="text-primary">ขั้นตอนที่ 2</span> <p class="fs-sm">
                ดาวน์โหลด Joker จากลิงค์ดาวน์โหลดด้านล่าง
            </p></div> <div><span class="text-primary">ขั้นตอนที่ 3</span> <p class="fs-sm">
                เปิดแอพในมือถือของคุณและล็อกอินด้วย ID และรหัสผ่านจากด้านล่าง
            </p></div>     
            <?php if ($useragent1 != null): ?>
            <div class="bg-dark p-3 my-4 row"><div class="col-12"><div><div class="row">
            <span class="col-4 col-sm-4">ชื่อผู้ใช้งาน:</span> 
            <div class="d-flex col-8 col-sm-8"><strong id="usergame"><?php echo $useragent1;?></strong> 
            <button data-clipboard-target="#usergame" type="button" class="copy-usergame btn ml-2 btn-outline-secondary btn-sm"><i class="fal fa-copy"></i>
                                คัดลอก
                            </button>
                         
                            </div></div> <div class="row">
                            <span class="col-4 col-sm-4">รหัสผ่าน:</span> 
                            <div class="d-flex col-8 col-sm-8"><strong id="pwdgame"><?php echo $passagent1;?></strong> 
                            <button data-clipboard-target="#pwdgame" type="button" class="copy-pwdgame btn ml-2 btn-outline-secondary btn-sm"><i class="fal fa-copy"></i>
                                คัดลอก
                            </button></div>
                            </div></div></div>
                            <div class="row"><div class="d-flex col-12">
                            <!-- <strong>CREDIT :  <span id="credit"><?php echo $creditagent;?></span></strong> -->
                            </div></div></div> 
                           
            <div>
            
            <button class="btn-block btn btn-lg btn-danger"><?php echo $creditagent;?></button>
            <br>
            <button onclick="trans_all_to_joker();" id="trans_all_to_joker"  type="button" class="btn px-3 btn-success btn-lg btn-block">ย้ายเงินเข้าเกม</button>
            <br>
             <div class="row pb-3">
             
             <div class="col-6"><a rel="noopener" target="_blank" href="http://www.joker123.net/Download?publisher=Joker&amp;platform=iOS" class=""><button class="btn-block btn btn-secondary">ดาวน์โหลด IOS</button></a></div> <div class="col-6"><a rel="noopener" target="_blank" href="http://www.joker123.net/Download?publisher=Joker&amp;platform=Android" class=""><button class="btn-block btn btn-secondary">ดาวน์โหลด ANDROID</button></a></div></div> 
           
            <a rel="noopener" target="_blank" href="https://www.joker123.net/" class=""><button class="btn-block btn btn-lg btn-primary">เข้าหน้าเว็บ</button></a>
            <!-- <div class="bg-dark p-3 my-4 row"><div class="col-12"><div> <button onclick="trans_all_to_joker();" id="trans_all_to_joker"  type="button" class="btn px-3 btn-success btn-lg btn-block">ย้ายเงินเข้าเกม</button></div></div></div> -->
           
                <?php foreach ($gamelist->games as $row): ?> 
                <div>
                    <img src="<?php echo $row->image_url; ?>"> 
                    <div>
                        <h6><?php echo $row->game_name ?></h6> 
                        <small class="text-muted"> <?php echo $row->game_code ?> </small>
                    </div>
                </div>
                <?php endforeach?>


            </div>
            <?php else: ?> 
                <div class="bg-dark p-3 my-4 row"><div class="col-12"><div><button onclick="register_api_1();" id="register_api_1"  type="button" class="btn px-3 btn-light btn-lg btn-block">เปิดบัญชี</button></div></div></div>
            <?php endif ?>
 
   
<?php echo js_res('js/jquery.min.js'); ?>
<?php echo js_res('js/bootstrap.min.js'); ?>

<script>
    $(function(){
        new Clipboard('.copy-usergame');
    });
    $(function(){
        new Clipboard('.copy-pwdgame');
    });
    $('.copy-usergame').on('click', function(){
        toastr_notify('คัดลอก User เรียบร้อยแล้ว');
    });
    $('.copy-pwdgame').on('click', function(){
        toastr_notify('คัดลอก รหัสผ่าน เรียบร้อยแล้ว');
    });
</script>
