<?php
/* @var $this BeritaController */
/* @var $model Berita */
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
				<?php echo $form->label($model,'JUDUL'); ?>
				<?php echo $form->textField($model,'JUDUL',array('class'=>'form-control')); ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<?php echo $form->label($model,'BERITA'); ?>
				<?php echo $form->textField($model,'BERITA',array('class'=>'form-control')); ?>
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
		<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
