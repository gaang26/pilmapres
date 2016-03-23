<?php
/* @var $this MahasiswaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Peserta', 'url'=>array('index')),
	array('label'=>'Create Peserta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#peserta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pesertas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'peserta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID_PESERTA',
		'ID_PT',
		'ROLE',
		'PIN',
		'TAHUN',
		'NIM',
		/*
		'NAMA',
		'ID_PRODI',
		'JENJANG',
		'SEMESTER',
		'IPK',
		'EMAIL',
		'HP',
		'TEMPAT_LAHIR',
		'TANGGAL_LAHIR',
		'ALAMAT',
		'ID_KOTA',
		'WEBSITE',
		'PHOTO',
		'JUDUL_KTI',
		'ID_TOPIK',
		'BIDANG',
		'RINGKASAN',
		'VIDEO_RINGKASAN',
		'VIDEO_KESEHARIAN',
		'SURAT_PENGANTAR',
		'URL_FORLAP',
		'KTM',
		'ID_USER',
		'ROLE_USER',
		'TANGGAL_INPUT',
		'TANGGAL_UPDATE',
		'TAHAP_AWAL',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
