<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.wysihtml5').wysihtml5({
        "stylesheets": ["<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
    });
})
</script>
<?php
/* @var $this BeritaController */
/* @var $model Berita */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'berita-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'JUDUL',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->textField($model,'JUDUL',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'JUDUL'); ?>
		</div>
	</div>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'BERITA',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->textArea($model,'BERITA',array('class'=>'wysihtml5 form-control','rows'=>20)); ?>
			<?php echo $form->error($model,'BERITA'); ?>
		</div>
	</div>

	<div class="form-group row">
		<?php echo $form->labelEx($model,'STATUS',array('class'=>'col-md-3')); ?>
		<div class="col-md-9">
			<?php echo $form->dropDownList($model,'STATUS',$model->optionsStatus(),array(
				'class'=>'form-control',
			)); ?>
			<?php echo $form->error($model,'STATUS'); ?>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-md-3">

		</div>
		<div class="col-md-9">
			<?php echo CHtml::submitButton('SIMPAN BERITA',array('class'=>'btn btn-primary')); ?>
			<?php echo CHtml::link('<i class="fa fa-trash"></i> HAPUS BERITA INI','#',array(
				'class'=>'btn red',
				'submit'=>array('berita/delete','id'=>$model->ID_BERITA),
				'confirm'=>'Anda akan menghapus berita ini. Proses ini tidak dapat dikembalikan. Apakah Anda yakin ingin melanjutkan?'
			)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
