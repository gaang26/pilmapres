<?php
/* @var $this JadwalController */
/* @var $model Jadwal */

$this->breadcrumbs=array(
	'Jadwals'=>array('index'),
	$model->ID_JADWAL,
);

$this->menu=array(
	array('label'=>'List Jadwal', 'url'=>array('index')),
	array('label'=>'Create Jadwal', 'url'=>array('create')),
	array('label'=>'Update Jadwal', 'url'=>array('update', 'id'=>$model->ID_JADWAL)),
	array('label'=>'Delete Jadwal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_JADWAL),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jadwal', 'url'=>array('admin')),
);
?>

<h1>View Jadwal #<?php echo $model->ID_JADWAL; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_JADWAL',
		'KETERANGAN',
		'TANGGAL_MULAI',
		'TANGGAL_SELESAI',
		'JAM_MULAI',
		'JAM_SELESAI',
		'TANGGAL_INPUT',
		'TANGGAL_UPDATE',
		'STATUS',
	),
)); ?>
