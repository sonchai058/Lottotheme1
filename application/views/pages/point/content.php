<style type="text/css">
.sticky-top, .bg-dark {
    padding: 13px !important;
}
</style>
<div class="container-fluid">
<br/>
    <div class="col-xs-12">
        <h4>โบนัสพิเศษ</h4>
        <h6 style="font-size:14px">เมื่อล็อคอินติดต่อกันตามเงื่อนไข</h6>
        <hr/>

        <div class="row">
        <?php
            foreach($bonus_rate as $i=>$data) {
                $bg = "bg-white";
                if($i<$count) {
                    $bg = "bg-success"; 
                }
        ?>
            <div class="col-xs-2 shadow-lg p-3 mb-1 <?php echo $bg;?> rounded text-center" style="font-size: 14px">
                <i style="color:#F1C40F !important" class="fa fa-star" aria-hidden="true"></i><br/>
                <span style="font-size:12px; color: #333232 !important;">วันที่ <?php echo $data['day_count'];?></span><br/>
                <?php echo number_format($data['point_bonus'],2);?>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
</div>