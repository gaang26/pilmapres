<?php
/* @var $this PtController */
/* @var $data MasterPT */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PT')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_PT), array('view', 'id'=>$data->ID_PT)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KODE_PT')); ?>:</b>
	<?php echo CHtml::encode($data->KODE_PT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAMA')); ?>:</b>
	<?php echo CHtml::encode($data->NAMA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IS_NEGERI')); ?>:</b>
	<?php echo CHtml::encode($data->IS_NEGERI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KOPERTIS')); ?>:</b>
	<?php echo CHtml::encode($data->KOPERTIS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />


</div>