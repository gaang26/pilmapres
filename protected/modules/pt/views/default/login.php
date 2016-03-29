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
