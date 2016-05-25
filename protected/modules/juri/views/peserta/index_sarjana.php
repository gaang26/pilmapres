<?php
/* @var $this PesertaController */
/* @var $model Peserta */
$this->pageTitle = 'Peserta';
$this->breadcrumbs=array(
	$this->pageTitle
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

<!-- BEGIN: -->
<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-graduation-cap font-blue-sharp"></i>
			<span class="uppercase bold font-blue-sharp">Peserta</span>
		</div>
		<div class="actions">
			<?php echo CHtml::link('<i class="fa fa-search"></i> Cari Peserta','#',array(
				'class'=>'search-button btn blue-sharp btn-circle'
			)); ?>
			<?php echo CHtml::link('<i class="fa fa-file-excel-o"></i> Unduh Peserta',array('peserta/export'),array(
				'class'=>'btn btn-circle yellow'
			)); ?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="search-form" style="">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'peserta-grid',
			'dataProvider'=>$model->searchSarjana(),
			//bootstrap styling
			'itemsCssClass'=>'table table-bordered table-striped',
			'pager' => array(
				'header' => '',
				'selectedPageCssClass' => 'active',
				'hiddenPageCssClass' => 'disabled',
				'htmlOptions' => array('class' => 'pagination'),
			),
			'pagerCssClass' => 'pagination',
			//end bootstrap styling
			'columns'=>array(
				'PIN',
				'NAMA',
				array(
					'header'=>'Asal Perguruan Tinggi',
					'type'=>'raw',
					'value'=>'$data->PT->NAMA'
				),
				array(
					'header'=>'Program Studi',
					'type'=>'raw',
					'value'=>'$data->getProdiView()'
				),
				array(
					'header'=>'Kelengkapan',
					'type'=>'raw',
					'value'=>'$data->getLabelKelengkapan()'
				),
				array(
					'header'=>'',
					'type'=>'raw',
					'htmlOptions'=>array(
						'width'=>'50px',
						'style'=>'text-align:center;'
					),
					'value'=>'$data->getActionButton()'
				),
				/*
				'IPK',
				'EMAIL',
				'HP',
				'JENIS_KELAMIN',
				'TEMPAT_LAHIR',
				'TANGGAL_LAHIR',
				'ALAMAT',
				'ID_KOTA',
				'WEBSITE',
				'PHOTO',
				'JUDUL_KTI',
				'FILE_KTI',
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
			),
		)); ?>
	</div>
</div>
<!-- END: -->
