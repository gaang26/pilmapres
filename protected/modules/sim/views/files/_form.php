<?php
/* @var $this FilesController */
/* @var $model Files */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'files-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'NAMA_FILE',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->textField($model,'NAMA_FILE',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'NAMA_FILE'); ?>
		</div>
	</div>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'TIPE_FILE',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->textField($model,'TIPE_FILE',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'TIPE_FILE'); ?>
		</div>
	</div>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'KETERANGAN',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->textArea($model,'KETERANGAN',array('rows'=>6,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'KETERANGAN'); ?>
		</div>
	</div>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'FILE_PATH',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->textField($model,'FILE_PATH',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'FILE_PATH'); ?>
		</div>
	</div>

	<div class="form-group row buttons">
		<div class="col-md-3">

		</div>
		<div class="col-md-9">
			<?php echo CHtml::submitButton('Simpan File',array('class'=>'btn blue')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
