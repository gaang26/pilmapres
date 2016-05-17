<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<?php $baseUrl = Yii::app()->theme->baseUrl;?>
	<meta charset="utf-8"/>
	<title>Sign in Mawapres</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $baseUrl;?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $baseUrl;?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $baseUrl;?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $baseUrl;?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo $baseUrl;?>/assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo $baseUrl;?>/assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $baseUrl;?>/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $baseUrl;?>/assets/admin/layout6/css/layout.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $baseUrl;?>/assets/admin/layout6/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo $baseUrl;?>/assets/admin/layout6/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="<?php echo Yii::app()->request->baseUrl;?>/images/logo_2016.png" alt="logo_2016.png" width="250px" style="background:#eceef1;border-radius:4px;padding:10px;"/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<div class="">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'class'=>'login-form'
		)
	)); ?>

		<h3 class="form-title">Sign In</h3>

		<div class="form-group">
			<?php echo $form->labelEx($model,'email',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
			<?php echo $form->textField($model,'email',array('class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'Username')); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>

		<div class="form-group">
			<?php echo $form->labelEx($model,'password',array('class'=>'control-label visible-ie8 visible-ie9')); ?>
			<?php echo $form->passwordField($model,'password',array('class'=>'form-control form-control-solid placeholder-no-fix','placeholder'=>'Password')); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>

		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Login</button>
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe',array('class'=>'rememberme check','style'=>'margin-left:0px;')); ?>
			<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
		</div>

		<!-- <div class="login-options">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
				</li>
				<li>
					<a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
				</li>
			</ul>
		</div> -->
		<div class="create-account">
			<p>
				<?php echo CHtml::link('Halaman depan',array('/site/index'),array('class'=>'uppercase')); ?>
				<!-- <a href="javascript:;" id="register-btn" class="uppercase">Create an account</a> -->
			</p>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo $baseUrl;?>/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo $baseUrl;?>/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo $baseUrl;?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl;?>/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl;?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl;?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl;?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl;?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo $baseUrl;?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $baseUrl;?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl;?>/assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl;?>/assets/admin/layout6/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo $baseUrl;?>/assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>

<!-- END BODY -->
</html>
