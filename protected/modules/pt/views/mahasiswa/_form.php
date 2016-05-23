<?php
/* @var $this MahasiswaController */
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

	<p class="note">Kolom isian dengan tanda <span class="required">*</span> wajib diisi.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA'); ?>
		<?php echo $form->textField($model,'NAMA',array('class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'NAMA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NIM'); ?>
		<?php echo $form->textField($model,'NIM',array('class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'NIM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JENJANG'); ?>
		<?php echo $form->textField($model,'JENJANG',array('class'=>'input-block-level','readonly'=>true)); ?>
		<?php echo $form->error($model,'JENJANG'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_PRODI'); ?>
		<?php echo $form->dropDownList($model,'ID_PRODI',MasterProdi::optionsAll(),array(
			'class'=>'input-block-level select',
			'prompt'=>'Pilih program studi/jurusan...'
		)); ?>
		<?php echo $form->error($model,'ID_PRODI'); ?>
	</div>

	<div class="row-fluid">
		<div class="span6">
			<div class="row">
				<?php echo $form->labelEx($model,'SEMESTER'); ?>
				<?php echo $form->dropDownList($model,'SEMESTER',Peserta::optionsSemester($model->JENJANG),array(
					'class'=>'input-block-level',
					'prompt'=>'Pilih semester...',
				)); ?>
				<?php echo $form->error($model,'SEMESTER'); ?>
			</div>
		</div>
		<div class="span6">
			<div class="row">
				<?php echo $form->labelEx($model,'IPK'); ?>
				<?php echo $form->textField($model,'IPK',array('class'=>'input-block-level')); ?>
				<p class="hint">
					Masukkan IPK peserta dalam format desimal. Misalnya: 3.51 (pemisah desimal tanda titik bukan koma)
				</p>
				<?php echo $form->error($model,'IPK'); ?>
			</div>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('class'=>'input-block-level')); ?>
		<?php echo $form->error($model,'EMAIL'); ?>
	</div>
	<hr>
	<blockquote style="text-align:justify"><h4>Pernyataan</h4>
		Kami menyatakan bahwa data yang kami masukkan diatas adalah benar adanya dan sesuai dengan data pada sistem forlap.dikti.go.id.</br>
		Jika terbukti adanya ketidakbenaran data diatas, kami siap jika peserta dari perguruan tinggi kami di diskualifikasi.
	</blockquote>

	<div class="row buttons">
		<?php echo CHtml::submitButton('DAFTARKAN PESERTA',array('class'=>'btn btn-block red')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
