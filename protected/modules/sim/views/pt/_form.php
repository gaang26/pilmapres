<?php
/* @var $this PtController */
/* @var $model MasterPT */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'master-pt-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'KODE_PT'); ?>
		<?php echo $form->textField($model,'KODE_PT',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'KODE_PT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA'); ?>
		<?php echo $form->textField($model,'NAMA',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'NAMA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IS_NEGERI'); ?>
		<?php echo $form->textField($model,'IS_NEGERI'); ?>
		<?php echo $form->error($model,'IS_NEGERI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KOPERTIS'); ?>
		<?php echo $form->textField($model,'KOPERTIS'); ?>
		<?php echo $form->error($model,'KOPERTIS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->