<?php
/* @var $this MahasiswaController */
/* @var $model Peserta */
$this->pageTitle = 'Peserta Baru';
$this->breadcrumbs=array(
	//'Beranda'=>array('default/index'),
	$this->pageTitle
);
?>

<div class="row-fluid">
	<div class="span6 offset3">
		<div class="well well-white bordered-dashed-1">
			<h4>Formulir Daftar Peserta Baru</h4>
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
			<?php echo CHtml::link('<< Kembali',array('default/index')); ?>
		</div>
	</div>
</div>
