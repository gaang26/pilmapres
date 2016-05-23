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

	<?php echo $form->errorSummary($model); ?>

	<!-- BEGIN: -->
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-user font-blue-sharp"></i>
				<span class="uppercase font-blue-sharp">Informasi Pribadi</span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="form-group">
				<?php echo $form->labelEx($model,'NAMA'); ?>
				<?php echo $form->textField($model,'NAMA',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'NAMA'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'EMAIL'); ?>
				<?php echo $form->textField($model,'EMAIL',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'EMAIL'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'HP'); ?>
				<?php echo $form->textField($model,'HP',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'HP'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'JENIS_KELAMIN'); ?>
				<?php echo $form->dropDownList($model,'JENIS_KELAMIN',$model->optionsJenisKelamin(),array(
					'class'=>'form-control select2me',
					'prompt'=>'--Pilih jenis kelamin--'
				)); ?>
				<?php echo $form->error($model,'JENIS_KELAMIN'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'TEMPAT_LAHIR'); ?>
				<?php echo $form->textField($model,'TEMPAT_LAHIR',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'TEMPAT_LAHIR'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'TANGGAL_LAHIR'); ?>
				<?php echo $form->textField($model,'TANGGAL_LAHIR',array('class'=>'form-control tanggal_lahir')); ?>
				<?php echo $form->error($model,'TANGGAL_LAHIR'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'ALAMAT'); ?>
				<?php echo $form->textArea($model,'ALAMAT',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'ALAMAT'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'ID_KOTA'); ?>
				<?php echo $form->dropDownList($model,'ID_KOTA',MasterKota::optionsAll(),array(
					'class'=>'form-control select2me',
					'prompt'=>'--Pilih kota--'
				)); ?>
				<?php echo $form->error($model,'ID_KOTA'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'WEBSITE'); ?>
				<?php echo $form->textField($model,'WEBSITE',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'WEBSITE'); ?>
			</div>
		</div>
	</div>
	<!-- END: -->

	<!-- BEGIN: -->
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-graduation-cap font-blue-sharp"></i>
				<span class="uppercase font-blue-sharp">Akademik</span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="form-group">
				<?php echo $form->labelEx($model,'ID_PT'); ?>
				<?php echo $form->dropDownList($model,'ID_PT',MasterPT::optionsAll(),array(
					'class'=>'form-control select2me',
					'prompt'=>'--Pilih perguruan tinggi--'
				)); ?>
				<?php echo $form->error($model,'ID_PT'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'NIM'); ?>
				<?php echo $form->textField($model,'NIM',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'NIM'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'ID_PRODI'); ?>
				<?php echo $form->dropDownList($model,'ID_PRODI',MasterProdi::optionsAll(),array(
					'class'=>'form-control select2me',
					'prompt'=>'--Pilih jurusan--'
				)); ?>
				<?php echo $form->error($model,'ID_PRODI'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'JENJANG'); ?>
				<?php echo $form->dropDownList($model,'JENJANG',$model->optionsJenjang(),array(
					'class'=>'form-control select2me',
					'prompt'=>'--Pilih jenjang--'
				)); ?>
				<?php echo $form->error($model,'JENJANG'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'SEMESTER'); ?>
				<?php echo $form->textField($model,'SEMESTER',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'SEMESTER'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'IPK'); ?>
				<?php echo $form->textField($model,'IPK',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'IPK'); ?>
			</div>
		</div>
	</div>
	<!-- END: -->


	<!-- BEGIN: -->
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-user font-blue-sharp"></i>
				<span class="uppercase font-blue-sharp">Karya Tulis</span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="form-group">
				<?php echo $form->labelEx($model,'JUDUL_KTI'); ?>
				<?php echo $form->textField($model,'JUDUL_KTI',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'JUDUL_KTI'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'FILE_KTI'); ?>
				<?php echo $form->textField($model,'FILE_KTI',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'FILE_KTI'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'ID_TOPIK'); ?>
				<?php echo $form->dropDownList($model,'ID_TOPIK',MasterTopik::optionsTopik($model->JENJANG),array(
					'class'=>'form-control select2me',
					'prompt'=>'--Pilih topik karya tulis'
				)); ?>
				<?php echo $form->error($model,'ID_TOPIK'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'BIDANG'); ?>
				<?php echo $form->dropDownList($model,'BIDANG',$model->optionsBidang(),array(
					'class'=>'form-control select2me',
					'prompt'=>'--Pilih bidang karya tulis--'
				)); ?>
				<?php echo $form->error($model,'BIDANG'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'RINGKASAN'); ?>
				<?php echo $form->textArea($model,'RINGKASAN',array('class'=>'form-control','rows'=>20)); ?>
				<?php echo $form->error($model,'RINGKASAN'); ?>
			</div>
		</div>
	</div>
	<!-- END: -->


	<!-- BEGIN: -->
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-user font-blue-sharp"></i>
				<span class="uppercase font-blue-sharp">Lainnya</span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="form-group">
				<?php echo $form->labelEx($model,'VIDEO_RINGKASAN'); ?>
				<?php echo $form->textField($model,'VIDEO_RINGKASAN',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'VIDEO_RINGKASAN'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'VIDEO_KESEHARIAN'); ?>
				<?php echo $form->textField($model,'VIDEO_KESEHARIAN',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'VIDEO_KESEHARIAN'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'URL_FORLAP'); ?>
				<?php echo $form->textField($model,'URL_FORLAP',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'URL_FORLAP'); ?>
			</div>
		</div>
	</div>
	<!-- END: -->

	<div class="form-group">
		<?php echo CHtml::submitButton('SIMPAN PERUBAHAN',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
