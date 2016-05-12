<?php
/* @var $this PesertaController */
/* @var $data Peserta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PESERTA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_PESERTA), array('view', 'id'=>$data->ID_PESERTA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PT')); ?>:</b>
	<?php echo CHtml::encode($data->ID_PT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROLE')); ?>:</b>
	<?php echo CHtml::encode($data->ROLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PIN')); ?>:</b>
	<?php echo CHtml::encode($data->PIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSWORD')); ?>:</b>
	<?php echo CHtml::encode($data->PASSWORD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TAHUN')); ?>:</b>
	<?php echo CHtml::encode($data->TAHUN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIM')); ?>:</b>
	<?php echo CHtml::encode($data->NIM); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PRODI')); ?>:</b>
	<?php echo CHtml::encode($data->ID_PRODI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JENJANG')); ?>:</b>
	<?php echo CHtml::encode($data->JENJANG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SEMESTER')); ?>:</b>
	<?php echo CHtml::encode($data->SEMESTER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IPK')); ?>:</b>
	<?php echo CHtml::encode($data->IPK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HP')); ?>:</b>
	<?php echo CHtml::encode($data->HP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JENIS_KELAMIN')); ?>:</b>
	<?php echo CHtml::encode($data->JENIS_KELAMIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TEMPAT_LAHIR')); ?>:</b>
	<?php echo CHtml::encode($data->TEMPAT_LAHIR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_LAHIR')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_LAHIR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALAMAT')); ?>:</b>
	<?php echo CHtml::encode($data->ALAMAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_KOTA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_KOTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WEBSITE')); ?>:</b>
	<?php echo CHtml::encode($data->WEBSITE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PHOTO')); ?>:</b>
	<?php echo CHtml::encode($data->PHOTO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JUDUL_KTI')); ?>:</b>
	<?php echo CHtml::encode($data->JUDUL_KTI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FILE_KTI')); ?>:</b>
	<?php echo CHtml::encode($data->FILE_KTI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TOPIK')); ?>:</b>
	<?php echo CHtml::encode($data->ID_TOPIK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIDANG')); ?>:</b>
	<?php echo CHtml::encode($data->BIDANG); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RINGKASAN')); ?>:</b>
	<?php echo CHtml::encode($data->RINGKASAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VIDEO_RINGKASAN')); ?>:</b>
	<?php echo CHtml::encode($data->VIDEO_RINGKASAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VIDEO_KESEHARIAN')); ?>:</b>
	<?php echo CHtml::encode($data->VIDEO_KESEHARIAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SURAT_PENGANTAR')); ?>:</b>
	<?php echo CHtml::encode($data->SURAT_PENGANTAR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('URL_FORLAP')); ?>:</b>
	<?php echo CHtml::encode($data->URL_FORLAP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KTM')); ?>:</b>
	<?php echo CHtml::encode($data->KTM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USER')); ?>:</b>
	<?php echo CHtml::encode($data->ID_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROLE_USER')); ?>:</b>
	<?php echo CHtml::encode($data->ROLE_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_INPUT')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_INPUT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_UPDATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TAHAP_AWAL')); ?>:</b>
	<?php echo CHtml::encode($data->TAHAP_AWAL); ?>
	<br />

	*/ ?>

</div>