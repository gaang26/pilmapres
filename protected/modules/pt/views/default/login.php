<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Login Perguruan Tinggi';
$this->breadcrumbs=array(
	$this->pageTitle,
);
?>

<div class="row-fluid">

	<div class="span6">
		<blockquote><h4>Keterangan</h4>
			<ol>
				<li>Perguruan tinggi yang sudah mendaftar dapat login pada laman ini dengan menggunakan email dan password yang dicantumkan pada saat mendaftar.</li>
				<li>Perguruan tinggi yang belum mempunyai akun dapat mendaftar dengan memilih tautan daftar yang ada pada laman ini.</li>
				<li>Perguruan tinggi negeri dapat mendaftarkan 1 mahasiswa sarjana dan 1 mahasiswa diploma</li>
				<li>Perguruan tinggi swasta dapat mendaftarkan 1 mahasiswa diploma untuk mahasiswa tingkat sarjana akan didaftarkan oleh kopertis setempat.</li>
			</ol>
		</blockquote>
		<div class="well well-smoke bordered-dashed-1">
			<div class="text-center">
				<?php echo CHtml::link('Daftar Akun Perguruan Tinggi',array('daftar/index'),array(
					'class'=>'btn large red'
				)); ?>
			</div>
		</div>
	</div>

	<div class="span6">
		<div class="well well-smoke bordered-dashed-1">
			<?php echo Yii::app()->user->getFlash('info'); ?>
			<h2><?php echo $this->pageTitle; ?></h2>

			<p>Silahkan isi form berikut dengan akun perguruan tinggi Anda:</p>

			<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>

				<div class="row">
					<?php echo $form->labelEx($model,'email'); ?>
					<?php echo $form->textField($model,'email'); ?>
					<?php echo $form->error($model,'email'); ?>
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
					<?php echo CHtml::submitButton('Masuk', array('class'=>'btn blue')); ?>
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
