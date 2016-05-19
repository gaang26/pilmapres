<?php
/* @var $this PtController */
/* @var $model MasterPT */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<?php echo $form->label($model,'ID_PT'); ?>
				<?php echo $form->textField($model,'ID_PT',array('class'=>'form-control')); ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<?php echo $form->label($model,'KODE_PT'); ?>
				<?php echo $form->textField($model,'KODE_PT',array('class'=>'form-control')); ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<?php echo $form->label($model,'KOPERTIS'); ?>
				<?php echo $form->dropDownList($model,'KOPERTIS',array(''=>'Semua')+MasterKopertis::optionsAll(),array('class'=>'form-control')); ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<?php echo $form->label($model,'NAMA'); ?>
				<?php echo $form->textField($model,'NAMA',array('class'=>'form-control')); ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<?php echo $form->label($model,'IS_NEGERI'); ?>
				<?php echo $form->dropDownList($model,'IS_NEGERI',array(''=>'Semua')+$model->optionsNegeri(),array('class'=>'form-control')); ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<?php echo $form->label($model,'STATUS'); ?>
				<?php echo $form->dropDownList($model,'STATUS',array(''=>'Semua')+$model->optionsStatus(),array('class'=>'form-control')); ?>
			</div>
		</div>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'btn blue')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
