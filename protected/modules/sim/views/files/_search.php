<?php
/* @var $this FilesController */
/* @var $model Files */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_FILE'); ?>
		<?php echo $form->textField($model,'ID_FILE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA_FILE'); ?>
		<?php echo $form->textField($model,'NAMA_FILE',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TIPE_FILE'); ?>
		<?php echo $form->textField($model,'TIPE_FILE',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KETERANGAN'); ?>
		<?php echo $form->textArea($model,'KETERANGAN',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FILE_PATH'); ?>
		<?php echo $form->textField($model,'FILE_PATH',array('size'=>60,'maxlength'=>500)); ?>
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