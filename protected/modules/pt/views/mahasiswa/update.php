<?php
/* @var $this MahasiswaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	$model->ID_PESERTA=>array('view','id'=>$model->ID_PESERTA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Peserta', 'url'=>array('index')),
	array('label'=>'Create Peserta', 'url'=>array('create')),
	array('label'=>'View Peserta', 'url'=>array('view', 'id'=>$model->ID_PESERTA)),
	array('label'=>'Manage Peserta', 'url'=>array('admin')),
);
?>

<h1>Update Peserta <?php echo $model->ID_PESERTA; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>