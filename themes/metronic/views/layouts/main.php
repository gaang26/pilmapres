<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title><?php echo Yii::app()->name.' - '.$this->pageTitle;?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <?php $baseUrl = Yii::app()->theme->baseUrl; ?>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/form.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl;?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl;?>/assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl;?>/assets/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl;?>/assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl;?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl;?>/assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link href="<?php echo $baseUrl;?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl;?>/assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/chosen/jquery.chosen.css" />


    <link rel="stylesheet" href="<?php echo $baseUrl;?>/assets/plugins/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="<?php echo $baseUrl;?>/assets/plugins/revolution_slider/rs-plugin/css/settings.css" media="screen">
    <link href="<?php echo $baseUrl;?>/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="<?php echo $baseUrl;?>/assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl;?>/images/ristekfavicon.png" />

    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/pdfviewer/jquery.gdocsviewer.js"></script>
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/form.css" rel="stylesheet" type="text/css"/>
    <!-- DATEPICKER -->
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/assets/plugins/bootstrap-datepicker/css/datepicker3.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseUrl;?>/assets/css/custom.css">
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body style="height:100%">
    <!-- BEGIN STYLE CUSTOMIZER -->
    <!-- <div class="color-panel hidden-phone">
        <div class="color-mode-icons icon-color"></div>
        <div class="color-mode-icons icon-color-close"></div>
        <div class="color-mode">
            <p>THEME COLOR</p>
            <ul class="inline">
                <li class="color-blue current color-default" data-style="blue"></li>
                <li class="color-red" data-style="red"></li>
                <li class="color-green" data-style="green"></li>
                <li class="color-orange" data-style="orange"></li>
            </ul>
        </div>
    </div> -->
    <!-- END BEGIN STYLE CUSTOMIZER -->

    <?php require_once('header.php');?>

    <?php
    if($this->id!='site')
        require_once('breadcrumbs.php');
    ?>

    <!-- BEGIN CONTAINER -->
    <div class="container" style="padding-bottom:25px; min-height: 100% !important; height:auto !important; height:100% !important;">
        <?php echo $content;?>
    </div>
    <!-- END CONTAINER -->

    <!-- FOOTER -->
    <?php //require_once('footer.php');?>
    <!-- END FOOTER -->

    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <!--<script src="<?php echo $baseUrl;?>/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>-->
    <script src="<?php echo $baseUrl;?>/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $baseUrl;?>/assets/plugins/back-to-top.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl;?>/assets/plugins/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl;?>/assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl;?>/assets/plugins/hover-dropdown.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl;?>/assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl;?>/assets/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl;?>/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo $baseUrl;?>/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="http://jdewit.github.io/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
    <script src="<?php echo $baseUrl ?>/assets/css/chosen/chosen.jquery.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo $baseUrl;?>/assets/plugins/respond.min.js"></script>
    <![endif]-->
    <!-- END CORE PLUGINS -->
    <script src="<?php echo $baseUrl;?>/assets/scripts/app.js"></script>
    <script src="<?php echo $baseUrl;?>/assets/scripts/index.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
            App.initBxSlider();
            Index.initRevolutionSlider();
            $('.chzn-select').chosen();
            $('.select').chosen();
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>


<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide" id="helpModal" style="width:700px; margin-left:-350px">
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h3 id="myModalLabel"><span id="modalTitle">Bantuan</span></h3>
    </div>
    <div class="modal-body">
        <div id="modalContent">
            <!-- UserVoice JavaScript SDK (only needed once on a page) -->
            <!--
            <script>(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/OhTiz6kPF9Y87NxkGBKxsA.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})()</script>
             -->
            <!-- The Classic Widget will be embeded wherever this div is placed -->
            <div data-uv-inline="classic_widget" data-uv-mode="support" data-uv-primary-color="#cc6d00" data-uv-link-color="#007dbf" data-uv-width="100%" data-uv-height="300px"></div>
            <h4>Hubungi kami</h4>
            <p>Jika Anda mengalami permasalahan atau mempunyai pertanyaan seputar pendaftaran mawapres nasional tahun <?php echo Yii::app()->params['tahun'];?> silahkan hubungi kami melalui email berikut ini<br>
            <h5>mawapres.dikti@gmail.com</h5>
            </p>
            <hr>
            <p>
                <a href="<?php echo Yii::app()->request->baseUrl;?>/file/pendukung/2016/PEDOMAN_MAWAPRES_SARJANA_2016.pdf" target="_blank" class="btn red"><i class="icon-download-alt"></i> UNDUH PEDOMAN SARJANA</a>
                <a href="<?php echo Yii::app()->request->baseUrl;?>/file/pendukung/2016/PEDOMAN_MAWAPRES_DIPLOMA_2016.pdf" target="_blank" class="btn red"><i class="icon-download-alt"></i> UNDUH PEDOMAN DIPLOMA</a>
            </p>
        </div>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn">Tutup</button>
    </div>
</div><!--#myModal-->

<!--Google Analytics-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36867373-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo $baseUrl?>/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl?>/js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery('.fancybox').fancybox({
        padding:0,
        openEffect : 'none',
        closeEffect : 'none',
    });

    jQuery('.select').select2();
})
</script>
