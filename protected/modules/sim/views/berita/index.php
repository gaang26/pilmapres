<?php
/* @var $this BeritaController */
/* @var $model Berita */
$this->pageTitle = 'Manajemen Berita';
$this->breadcrumbs=array(
	$this->pageTitle
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#berita-grid').yiiGridView('update', {
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
			<i class="fa fa-file font-blue-sharp"></i>
			<span class="uppercase font-blue-sharp"><?php echo $this->pageTitle ?></span>
		</div>
		<div class="actions">
			<?php echo CHtml::link('<i class="fa fa-search"></i> Cari Berita','#',array('class'=>'btn btn-circle default search-button')); ?>
			<?php echo CHtml::link('<i class="fa fa-plus"></i> Buat Berita',array('berita/create'),array('class'=>'btn btn-circle blue')); ?>
		</div>
	</div>
	<div class="portlet-body">

		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'berita-grid',
			'dataProvider'=>$model->search(),
			//bootstrap styling
			'itemsCssClass'=>'table table-bordered table-striped',
			'pager' => array(
				'header' => '',
				'selectedPageCssClass' => 'active',
				'hiddenPageCssClass' => 'disabled',
				'htmlOptions' => array('class' => ''),
			),
			'pagerCssClass' => 'pagination',
			//end bootstrap styling
			'columns'=>array(
				array(
					'name'=>'JUDUL',
					'type'=>'raw',
					'value'=>'CHtml::link($data->JUDUL,array("berita/update","id"=>$data->ID_BERITA))'
				),
				//'BERITA',
				'STATUS',
				'TANGGAL_INPUT',
				'TANGGAL_UPDATE',
			),
		)); ?>
	</div>
</div>
<!-- END: -->
