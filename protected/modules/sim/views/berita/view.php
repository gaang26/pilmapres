<?php
/* @var $this BeritaController */
/* @var $model Berita */

$this->breadcrumbs=array(
	'Beritas'=>array('index'),
	$model->ID_BERITA,
);

$this->menu=array(
	array('label'=>'List Berita', 'url'=>array('index')),
	array('label'=>'Create Berita', 'url'=>array('create')),
	array('label'=>'Update Berita', 'url'=>array('update', 'id'=>$model->ID_BERITA)),
	array('label'=>'Delete Berita', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_BERITA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Berita', 'url'=>array('admin')),
);
?>

<h1>View Berita #<?php echo $model->ID_BERITA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_BERITA',
		'JUDUL',
		'BERITA',
		'STATUS',
		'TANGGAL_INPUT',
		'TANGGAL_UPDATE',
	),
)); ?>
