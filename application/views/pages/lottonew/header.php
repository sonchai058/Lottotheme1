<nav class="navbar navbar-inverse" style="/*margin-top: 50px;*/">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand text-center;" href="#"><img style="margin-top:-15px;" src="<?php echo base_url('assets/images/logo1.png');?>" width="52" height="" alt="lotto88" title="lotto88" class="logo__img"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
        <li class="<?php if($page_content == 'lottonew/content_index'){?> active <?php }?>"><a href="<?php echo site_url();?>">หน้าแรก</a></li>
        <!--
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
            </ul>
        </li>
        -->
        <li class="<?php if($page_content == 'lottonew/content'){?> active <?php }?>"><a href="<?php echo site_url('lottonew');?>">แทงหวย</a></li>
        <li class="<?php if($page_content == 'lottonew/content_index2'){?> active <?php }?>"><a href="<?php echo site_url('lottonew/index2');?>">ประกาศผล</a></li>
        <li><a href="<?php echo site_url('deposit');?>">ฝากเงิน</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('transaction')?>"><span class="glyphicon glyphicon-log-in"></span> USER <span id="headTop">-</span> ฿</a></li>
        </ul>
        </div>
    </div>
    </nav>