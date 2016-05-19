<?php
/* @var $this PtController */
/* @var $model MasterPT */

$this->breadcrumbs=array(
	'Master Pts'=>array('index'),
	$model->ID_PT,
);

$this->menu=array(
	array('label'=>'List MasterPT', 'url'=>array('index')),
	array('label'=>'Create MasterPT', 'url'=>array('create')),
	array('label'=>'Update MasterPT', 'url'=>array('update', 'id'=>$model->ID_PT)),
	array('label'=>'Delete MasterPT', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_PT),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterPT', 'url'=>array('admin')),
);
?>

<h1>View MasterPT #<?php echo $model->ID_PT; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_PT',
		'KODE_PT',
		'NAMA',
		'IS_NEGERI',
		'KOPERTIS',
		'STATUS',
	),
)); ?>
