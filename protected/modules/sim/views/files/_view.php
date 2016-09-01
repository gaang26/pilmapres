<?php
/* @var $this FilesController */
/* @var $data Files */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_FILE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_FILE), array('view', 'id'=>$data->ID_FILE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA_FILE')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA_FILE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TIPE_FILE')); ?>:</b>
	<?php echo CHtml::encode($data->TIPE_FILE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KETERANGAN')); ?>:</b>
	<?php echo CHtml::encode($data->KETERANGAN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FILE_PATH')); ?>:</b>
	<?php echo CHtml::encode($data->FILE_PATH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_INPUT')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_INPUT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_UPDATE); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	*/ ?>

</div>