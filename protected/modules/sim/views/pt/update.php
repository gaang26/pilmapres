<?php
/* @var $this PtController */
/* @var $model MasterPT */

$this->breadcrumbs=array(
	'Master Pts'=>array('index'),
	$model->ID_PT=>array('view','id'=>$model->ID_PT),
	'Update',
);

$this->menu=array(
	array('label'=>'List MasterPT', 'url'=>array('index')),
	array('label'=>'Create MasterPT', 'url'=>array('create')),
	array('label'=>'View MasterPT', 'url'=>array('view', 'id'=>$model->ID_PT)),
	array('label'=>'Manage MasterPT', 'url'=>array('admin')),
);
?>

<h1>Update MasterPT <?php echo $model->ID_PT; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>