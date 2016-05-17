<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <?php $baseUrl = Yii::app()->theme->baseUrl; ?>
    <meta charset="utf-8"/>
    <title><?php echo $this->pageTitle;?> - Mawapres</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl; ?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <link href="<?php echo $baseUrl; ?>/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>

    <!-- BEGIN THEME STYLES -->
    <!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
    <link href="<?php echo $baseUrl; ?>/assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl; ?>/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl; ?>/assets/admin/layout6/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo $baseUrl; ?>/assets/admin/layout6/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-quick-sidebar-over-content">

    <?php require_once('header.php'); ?>
    <!-- PAGE CONTENT BEGIN -->
    <div class="container-fluid">
    	<div class="page-content page-content-popup">
    		<!-- BEGIN PAGE CONTENT FIXED -->
			<div class="page-content-fixed-header">
				<!-- <ul class="page-breadcrumb">
                    <li><a href="#">Applications</a></li>
					<li>Profile</li>
				</ul> -->

                <?php
                if($this->breadcrumbs){
                    echo '<ul class="page-breadcrumb">';
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                        'homeLink'=>CHtml::link('Beranda',array('default/index')),
                        'tagName'=>'li',
                        'separator'=>'',
                        'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                        'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
                    ));
                    echo '</ul>';
                }
                ?>

                <style media="screen">
                .breadcrumbs{
                    margin-top:-30px !important;
                }
                </style>

				<div class="content-header-menu">
    				<!-- BEGIN DROPDOWN AJAX MENU -->
    				<!-- <div class="dropdown-ajax-menu btn-group">
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="fa fa-circle"></i>
							<i class="fa fa-circle"></i>
							<i class="fa fa-circle"></i>
						</button>
						<ul class="dropdown-menu-v2">
							<li> <a href="start.html">Application</a> </li>
							<li> <a href="start.html">Reports</a> </li>
							<li> <a href="start.html">Templates</a> </li>
							<li> <a href="start.html">Settings</a> </li>
						</ul>
					</div> -->
    				<!-- END DROPDOWN AJAX MENU -->
    				<!-- BEGIN MENU TOGGLER -->
    				<button type="button" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
	                    <span class="toggle-icon">
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </span>
	                </button>
    				<!-- END MENU TOGGLER -->
    			</div>
			</div>

			<?php require_once('sidebar.php'); ?>

			<div class="page-fixed-main-content">
                <?php echo $content; ?>
			</div>
    		<!-- END PAGE CONTENT FIXED -->

    		<!-- Copyright BEGIN -->
			<p class="copyright-v2">
                2016 © Mawapres Nasional
            </p>
			<!-- Copyright END -->

    	</div>
    </div>
	<!-- PAGE CONTENT END -->
    <!-- END MAIN LAYOUT -->
    <a href="#index" class="go2top"><i class="icon-arrow-up"></i></a>

    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="<?php echo $baseUrl;?>/assets/global/plugins/respond.min.js"></script>
    <script src="<?php echo $baseUrl;?>/assets/global/plugins/excanvas.min.js"></script>
    <![endif]-->

    <?php
    $cs=Yii::app()->clientScript;

    $cs->scriptMap=array(
        'jquery.js'=>$baseUrl.'/assets/global/plugins/jquery.min.js',
	'jquery.min.js'=>$baseUrl.'/assets/global/plugins/jquery.min.js'
    );

    $cs->registerScriptFile('jquery.js');
    ?>
    <script src="<?php echo $baseUrl;?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <script src="<?php echo $baseUrl;?>/assets/global/plugins/select2/select2.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo $baseUrl; ?>/js/pdfviewer/jquery.gdocsviewer.js"></script>

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo $baseUrl;?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo $baseUrl;?>/assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
    jQuery(document).ready(function() {
       	Metronic.init(); // init metronic core componets
       	Layout.init(); // init layout
        QuickSidebar.init(); // init quick sidebar

        $('.select2me').select();
        $('.select2').select();
        $('.select').select();
    });
    </script>
    <!-- END JAVASCRIPTS -->
    <!-- BEGIN LOAD ANALITYCS HERE -->
    <!-- END LOAD ANALITYCS HERE -->
</body>
<!-- END BODY -->
</html>
