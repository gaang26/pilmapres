<?php
/* @var $this PesertaController */
/* @var $model Peserta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'peserta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_PT'); ?>
		<?php echo $form->textField($model,'ID_PT'); ?>
		<?php echo $form->error($model,'ID_PT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ROLE'); ?>
		<?php echo $form->textField($model,'ROLE'); ?>
		<?php echo $form->error($model,'ROLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PIN'); ?>
		<?php echo $form->textField($model,'PIN',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PASSWORD'); ?>
		<?php echo $form->passwordField($model,'PASSWORD',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'PASSWORD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TAHUN'); ?>
		<?php echo $form->textField($model,'TAHUN',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'TAHUN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NIM'); ?>
		<?php echo $form->textField($model,'NIM',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'NIM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA'); ?>
		<?php echo $form->textField($model,'NAMA',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NAMA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_PRODI'); ?>
		<?php echo $form->textField($model,'ID_PRODI'); ?>
		<?php echo $form->error($model,'ID_PRODI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JENJANG'); ?>
		<?php echo $form->textField($model,'JENJANG',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'JENJANG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SEMESTER'); ?>
		<?php echo $form->textField($model,'SEMESTER'); ?>
		<?php echo $form->error($model,'SEMESTER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IPK'); ?>
		<?php echo $form->textField($model,'IPK',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'IPK'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'EMAIL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HP'); ?>
		<?php echo $form->textField($model,'HP',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'HP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JENIS_KELAMIN'); ?>
		<?php echo $form->textField($model,'JENIS_KELAMIN',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'JENIS_KELAMIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TEMPAT_LAHIR'); ?>
		<?php echo $form->textField($model,'TEMPAT_LAHIR',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'TEMPAT_LAHIR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TANGGAL_LAHIR'); ?>
		<?php echo $form->textField($model,'TANGGAL_LAHIR'); ?>
		<?php echo $form->error($model,'TANGGAL_LAHIR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ALAMAT'); ?>
		<?php echo $form->textArea($model,'ALAMAT',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ALAMAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_KOTA'); ?>
		<?php echo $form->textField($model,'ID_KOTA'); ?>
		<?php echo $form->error($model,'ID_KOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'WEBSITE'); ?>
		<?php echo $form->textField($model,'WEBSITE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'WEBSITE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PHOTO'); ?>
		<?php echo $form->textField($model,'PHOTO',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'PHOTO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JUDUL_KTI'); ?>
		<?php echo $form->textField($model,'JUDUL_KTI',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'JUDUL_KTI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FILE_KTI'); ?>
		<?php echo $form->textField($model,'FILE_KTI',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'FILE_KTI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_TOPIK'); ?>
		<?php echo $form->textField($model,'ID_TOPIK'); ?>
		<?php echo $form->error($model,'ID_TOPIK'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BIDANG'); ?>
		<?php echo $form->textField($model,'BIDANG',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'BIDANG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RINGKASAN'); ?>
		<?php echo $form->textArea($model,'RINGKASAN',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'RINGKASAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VIDEO_RINGKASAN'); ?>
		<?php echo $form->textField($model,'VIDEO_RINGKASAN',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'VIDEO_RINGKASAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VIDEO_KESEHARIAN'); ?>
		<?php echo $form->textField($model,'VIDEO_KESEHARIAN',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'VIDEO_KESEHARIAN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SURAT_PENGANTAR'); ?>
		<?php echo $form->textField($model,'SURAT_PENGANTAR',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'SURAT_PENGANTAR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'URL_FORLAP'); ?>
		<?php echo $form->textField($model,'URL_FORLAP',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'URL_FORLAP'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KTM'); ?>
		<?php echo $form->textField($model,'KTM',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'KTM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_USER'); ?>
		<?php echo $form->textField($model,'ID_USER'); ?>
		<?php echo $form->error($model,'ID_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ROLE_USER'); ?>
		<?php echo $form->textField($model,'ROLE_USER'); ?>
		<?php echo $form->error($model,'ROLE_USER'); ?>
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
		<?php echo $form->labelEx($model,'TAHAP_AWAL'); ?>
		<?php echo $form->textField($model,'TAHAP_AWAL'); ?>
		<?php echo $form->error($model,'TAHAP_AWAL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->