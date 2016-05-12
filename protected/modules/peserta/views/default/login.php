<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Login Peserta';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="row-fluid">
	<div class="span6">
		<blockquote><h4>Keterangan</h4>
			<ol>
				<li>PIN dan Password peserta didapatkan dari perguruan tinggi yang mendaftarkan Anda pada sistem mawapres nasional yang dikirimkan melalui email.</li>
				<li>Jika Anda belum mempunyai PIN dan Password, silahkan menghubungi pihak pengelola mawapres perguruan tinggi Anda agar didaftarkan pada sistem mawapres nasional.</li>
			</ol>
		</blockquote>
	</div>
	<div class="span6">
		<div class="well well-smoke bordered-dashed-1">
			<?php echo Yii::app()->user->getFlash('info'); ?>
			<h2>Login Peserta</h2>

			<p>Silahkan isi form berikut dengan akun peserta yang Anda dapatkan dari perguruan tinggi:</p>

			<div class="form text-left">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>

				<div class="row">
					<?php echo $form->labelEx($model,'pin'); ?>
					<?php echo $form->textField($model,'pin'); ?>
					<?php echo $form->error($model,'pin'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password'); ?>
					<?php echo $form->error($model,'password'); ?>
				</div>

				<div class="row rememberMe compactRadioGroup">
					<?php echo $form->checkBox($model,'rememberMe'); ?>
					<?php echo $form->label($model,'rememberMe'); ?>
					<?php echo $form->error($model,'rememberMe'); ?>
				</div>

				<div class="row buttons">
					<?php echo CHtml::submitButton('Masuk',array('class'=>'btn blue')); ?>
					<?php echo CHtml::link('<i class="icon-arrow-left"></i> Kembali',array('/site/index'),array('class'=>'btn yellow','style'=>'margin-top:-3px;')); ?>
				</div>

			<?php $this->endWidget(); ?>

			</div><!-- form -->
			<div class="row-fluid">
				<div class="span6">

					<?php echo CHtml::link('Lupa Password?',array('default/lupapassword')); ?>
				</div>
				<div class="span6">

				</div>
			</div>
		</div>
	</div>
</div>
