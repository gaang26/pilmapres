<!-- BEGIN HEADER -->
<div class="front-header">
    <div class="container">
        <div class="navbar">
            <div class="navbar-inner">

                <!-- BEGIN LOGO (you can use logo image instead of text)-->
                <a class="brand logo-v1" href="<?php echo Yii::app()->createUrl('/site/index');?>">
                    <!-- <p style="margin-top:15px"><?php echo strtoupper(Yii::app()->name);?></p> -->
                    <!-- <p style="margin-top:17px;">SISTEM AKADEMI KOMUNITAS</p> -->
                    <img src="<?php echo Yii::app()->request->baseUrl;?>/images/logo_2019.png" id="logoimg" alt="Pilmapres 2017" style="height:50px; margin-top:5px">
                </a>
                <!-- END LOGO -->

                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a class="btn btn-navbar" style="margin-top:17px" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->

                <?php
                require_once('navigation_front.php');
                /*if(isset($this->module) && $this->module->id=='siakad'){
                    require_once('navigation_siakad.php');
                }else{
                    require_once('navigation_front.php');
                }*/
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER
