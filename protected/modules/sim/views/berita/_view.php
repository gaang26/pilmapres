<?php
/* @var $this BeritaController */
/* @var $data Berita */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_BERITA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_BERITA), array('view', 'id'=>$data->ID_BERITA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JUDUL')); ?>:</b>
	<?php echo CHtml::encode($data->JUDUL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BERITA')); ?>:</b>
	<?php echo CHtml::encode($data->BERITA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_INPUT')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_INPUT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TANGGAL_UPDATE')); ?>:</b>
	<?php echo CHtml::encode($data->TANGGAL_UPDATE); ?>
	<br />


</div>