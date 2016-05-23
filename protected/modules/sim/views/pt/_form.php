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

	<div class="form-group row">
		<?php echo $form->labelEx($model,'KODE_PT',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->textField($model,'KODE_PT',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'KODE_PT'); ?>
		</div>
	</div>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'NAMA',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->textField($model,'NAMA',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'NAMA'); ?>
		</div>
	</div>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'IS_NEGERI',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->dropDownList($model,'IS_NEGERI',$model->optionsNegeri(),array(
				'class'=>'form-control',
				'prompt'=>'--Pilih jenis PT--'
			)); ?>
			<?php echo $form->error($model,'IS_NEGERI'); ?>
		</div>
	</div>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'KOPERTIS',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->dropDownList($model,'KOPERTIS',MasterKopertis::optionsAll(),array(
				'class'=>'form-control',
				'prompt'=>'--Pilih kopertis--'
			)); ?>
			<?php echo $form->error($model,'KOPERTIS'); ?>
		</div>
	</div>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'STATUS',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->dropDownList($model,'STATUS',$model->optionsStatus(),array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'STATUS'); ?>
		</div>
	</div>

	<div class="form-group row buttons">
		<div class="col-md-3">

		</div>
		<div class="col-md-9">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn blue')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
