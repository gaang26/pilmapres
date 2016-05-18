<?php
/* @var $this JadwalController */
/* @var $model Jadwal */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_JADWAL'); ?>
		<?php echo $form->textField($model,'ID_JADWAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KETERANGAN'); ?>
		<?php echo $form->textField($model,'KETERANGAN',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_MULAI'); ?>
		<?php echo $form->textField($model,'TANGGAL_MULAI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_SELESAI'); ?>
		<?php echo $form->textField($model,'TANGGAL_SELESAI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JAM_MULAI'); ?>
		<?php echo $form->textField($model,'JAM_MULAI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JAM_SELESAI'); ?>
		<?php echo $form->textField($model,'JAM_SELESAI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_INPUT'); ?>
		<?php echo $form->textField($model,'TANGGAL_INPUT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_UPDATE'); ?>
		<?php echo $form->textField($model,'TANGGAL_UPDATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->