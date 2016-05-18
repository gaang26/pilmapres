<?php
/* @var $this JadwalController */
/* @var $data Jadwal */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_JADWAL')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_JADWAL), array('view', 'id'=>$data->ID_JADWAL)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KETERANGAN')); ?>:</b>
	<?php echo CHtml::encode($data->KETERANGAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_MULAI')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_MULAI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_SELESAI')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_SELESAI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JAM_MULAI')); ?>:</b>
	<?php echo CHtml::encode($data->JAM_MULAI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JAM_SELESAI')); ?>:</b>
	<?php echo CHtml::encode($data->JAM_SELESAI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_INPUT')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_INPUT); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_UPDATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>