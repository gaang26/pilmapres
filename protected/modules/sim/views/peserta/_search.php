<?php
/* @var $this PesertaController */
/* @var $model Peserta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<div class="col-xs-12 col-md-4">
			<div class="form-group">
				<?php echo $form->label($model,'PIN'); ?>
				<?php echo $form->textField($model,'PIN',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
			</div>

			<div class="form-group">
				<?php echo $form->label($model,'NAMA'); ?>
				<?php echo $form->textField($model,'NAMA',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			</div>

			<div class="form-group">
				<?php echo $form->label($model,'JENIS_KELAMIN'); ?>
				<?php echo $form->dropDownList($model,'JENIS_KELAMIN',array(''=>'Semua')+$model->optionsJenisKelamin(),array('class'=>'form-control select2me')); ?>
			</div>
		</div>
		<div class="col-xs-12 col-md-4">
			<div class="form-group">
				<?php echo $form->label($model,'ID_PT'); ?>
				<?php echo $form->dropDownList($model,'ID_PT',array(''=>'Semua')+MasterPT::optionsAll(),array('class'=>'form-control select2me')); ?>
			</div>

			<div class="form-group">
				<?php echo $form->label($model,'JENJANG'); ?>
				<?php echo $form->dropDownList($model,'JENJANG',array(''=>'Semua')+$model->optionsJenjang(),array('class'=>'form-control select2me')); ?>
			</div>

			<div class="form-group">
				<?php echo $form->label($model,'ID_PRODI'); ?>
				<?php echo $form->dropDownList($model,'ID_PRODI',array(''=>'Semua')+MasterProdi::optionsAll(),array('class'=>'form-control select2me')); ?>
			</div>
		</div>
	</div>



	<div class="form-group">
		<?php echo CHtml::submitButton('Tampilkan Hasil',array('class'=>'btn green')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
