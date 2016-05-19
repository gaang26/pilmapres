<?php
/* @var $this PtController */
/* @var $model MasterPT */

$this->breadcrumbs=array(
	'Master Pts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MasterPT', 'url'=>array('index')),
	array('label'=>'Manage MasterPT', 'url'=>array('admin')),
);
?>

<h1>Create MasterPT</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>