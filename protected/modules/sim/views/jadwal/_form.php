<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jadwal-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'KETERANGAN'); ?>
		<?php echo $form->textField($model,'KETERANGAN',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'KETERANGAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TANGGAL_MULAI'); ?>
		<?php echo $form->textField($model,'TANGGAL_MULAI'); ?>
		<?php echo $form->error($model,'TANGGAL_MULAI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TANGGAL_SELESAI'); ?>
		<?php echo $form->textField($model,'TANGGAL_SELESAI'); ?>
		<?php echo $form->error($model,'TANGGAL_SELESAI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JAM_MULAI'); ?>
		<?php echo $form->textField($model,'JAM_MULAI'); ?>
		<?php echo $form->error($model,'JAM_MULAI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JAM_SELESAI'); ?>
		<?php echo $form->textField($model,'JAM_SELESAI'); ?>
		<?php echo $form->error($model,'JAM_SELESAI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TANGGAL_INPUT'); ?>
		<?php echo $form->textField($model,'TANGGAL_INPUT'); ?>
		<?php echo $form->error($model,'TANGGAL_INPUT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TANGGAL_UPDATE'); ?>
		<?php echo $form->textField($model,'TANGGAL_UPDATE'); ?>
		<?php echo $form->error($model,'TANGGAL_UPDATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
		<?php echo $form->error($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->