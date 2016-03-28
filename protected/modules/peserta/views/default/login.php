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
	<div class="span6 offset3">
		<div class="well well-smoke bordered-dashed-1 text-center">
			<h2>Login Peserta</h2>

			<p>Please fill out the following form with your login credentials:</p>

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
					<?php echo $form->textField($model,'pin',array('class'=>'input-block-level')); ?>
					<?php echo $form->error($model,'pin'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password',array('class'=>'input-block-level')); ?>
					<?php echo $form->error($model,'password'); ?>
				</div>

				<div class="row rememberMe compactRadioGroup">
					<?php echo $form->checkBox($model,'rememberMe'); ?>
					<?php echo $form->label($model,'rememberMe'); ?>
					<?php echo $form->error($model,'rememberMe'); ?>
				</div>

				<div class="row buttons">
					<?php echo CHtml::submitButton('Masuk',array('class'=>'btn blue btn-block')); ?>
				</div>

			<?php $this->endWidget(); ?>
			<div class="row-fluid">
				<div class="span6">
					<?php echo CHtml::link('Lupa Password?',array('default/lupapassword')); ?>
				</div>
				<div class="span6">

				</div>
			</div>
			</div><!-- form -->
		</div>
	</div>
</div>
