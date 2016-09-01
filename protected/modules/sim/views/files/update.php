<?php
/* @var $this FilesController */
/* @var $model Files */

$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->ID_FILE=>array('view','id'=>$model->ID_FILE),
	'Update',
);

$this->menu=array(
	array('label'=>'List Files', 'url'=>array('index')),
	array('label'=>'Create Files', 'url'=>array('create')),
	array('label'=>'View Files', 'url'=>array('view', 'id'=>$model->ID_FILE)),
	array('label'=>'Manage Files', 'url'=>array('admin')),
);
?>

<h1>Update Files <?php echo $model->ID_FILE; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>