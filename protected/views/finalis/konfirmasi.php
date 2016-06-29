<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Konfirmasi Kehadiran';
$this->breadcrumbs=array(
	$this->pageTitle,
);
?>

<div class="alert alert-info">
    Konfirmasi kehadiran dapat diisi mulai tanggal 11 Juli 2016.
</div>

<?php echo CHtml::link('<i class="icon-arrow-left"></i> Kembali',array('finalis/index'),array('class'=>'btn yellow','style'=>'margin-top:-3px;')); ?>
