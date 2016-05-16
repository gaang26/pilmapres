<?php
/* @var $this PesertaController */
/* @var $model Peserta */
$this->pageTitle = 'Edit Data Peserta';
$this->breadcrumbs=array(
	'Peserta'=>array('peserta/index'),
	$model->NAMA=>array('peserta/view','id'=>$model->ID_PESERTA),
	$this->pageTitle,
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
