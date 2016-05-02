<?php
/* @var $this MahasiswaController */
/* @var $model Peserta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_PESERTA'); ?>
		<?php echo $form->textField($model,'ID_PESERTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_PT'); ?>
		<?php echo $form->textField($model,'ID_PT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ROLE'); ?>
		<?php echo $form->textField($model,'ROLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PIN'); ?>
		<?php echo $form->textField($model,'PIN',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TAHUN'); ?>
		<?php echo $form->textField($model,'TAHUN',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NIM'); ?>
		<?php echo $form->textField($model,'NIM',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA'); ?>
		<?php echo $form->textField($model,'NAMA',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_PRODI'); ?>
		<?php echo $form->textField($model,'ID_PRODI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JENJANG'); ?>
		<?php echo $form->textField($model,'JENJANG',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SEMESTER'); ?>
		<?php echo $form->textField($model,'SEMESTER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IPK'); ?>
		<?php echo $form->textField($model,'IPK',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HP'); ?>
		<?php echo $form->textField($model,'HP',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TEMPAT_LAHIR'); ?>
		<?php echo $form->textField($model,'TEMPAT_LAHIR',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TANGGAL_LAHIR'); ?>
		<?php echo $form->textField($model,'TANGGAL_LAHIR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ALAMAT'); ?>
		<?php echo $form->textArea($model,'ALAMAT',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_KOTA'); ?>
		<?php echo $form->textField($model,'ID_KOTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WEBSITE'); ?>
		<?php echo $form->textField($model,'WEBSITE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PHOTO'); ?>
		<?php echo $form->textField($model,'PHOTO',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JUDUL_KTI'); ?>
		<?php echo $form->textField($model,'JUDUL_KTI',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_TOPIK'); ?>
		<?php echo $form->textField($model,'ID_TOPIK'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIDANG'); ?>
		<?php echo $form->textField($model,'BIDANG',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RINGKASAN'); ?>
		<?php echo $form->textArea($model,'RINGKASAN',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VIDEO_RINGKASAN'); ?>
		<?php echo $form->textField($model,'VIDEO_RINGKASAN',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VIDEO_KESEHARIAN'); ?>
		<?php echo $form->textField($model,'VIDEO_KESEHARIAN',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SURAT_PENGANTAR'); ?>
		<?php echo $form->textField($model,'SURAT_PENGANTAR',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'URL_FORLAP'); ?>
		<?php echo $form->textField($model,'URL_FORLAP',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KTM'); ?>
		<?php echo $form->textField($model,'KTM',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_USER'); ?>
		<?php echo $form->textField($model,'ID_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ROLE_USER'); ?>
		<?php echo $form->textField($model,'ROLE_USER'); ?>
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
		<?php echo $form->label($model,'TAHAP_AWAL'); ?>
		<?php echo $form->textField($model,'TAHAP_AWAL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->