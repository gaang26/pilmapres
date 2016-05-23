<?php
/* @var $this PtController */
/* @var $model MasterPT */
$this->pageTitle = 'Manajemen Perguruan Tinggi';
$this->breadcrumbs=array(
	$this->pageTitle
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#master-pt-grid').yiiGridView('update', {
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
			<i class="fa fa-list font-blue-sharp"></i>
			<span class="uppercase font-blue-sharp"><?php echo $this->pageTitle;?></span>
		</div>
		<div class="actions">
			<?php echo CHtml::link('<i class="fa fa-search"></i> Cari Perguruan Tinggi','#',array('class'=>'btn btn-circle default search-button')); ?>
			<?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah Perguruan Tinggi',array('pt/create'),array(
				'class'=>'btn btn-circle blue'
			)); ?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'master-pt-grid',
			'dataProvider'=>$model->search(),
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
				'ID_PT',
				'KODE_PT',
				array(
					'name'=>'NAMA',
					'type'=>'raw',
					'value'=>'CHtml::link($data->NAMA,array("pt/update","id"=>$data->ID_PT))'
				),
				array(
					'name'=>'IS_NEGERI',
					'type'=>'raw',
					'value'=>'$data->getLabelNegeri()'
				),
				array(
					'name'=>'KOPERTIS',
					'type'=>'raw',
					'value'=>'$data->getLabelKopertis()'
				),
				array(
					'name'=>'STATUS',
					'type'=>'raw',
					'value'=>'$data->getLabelStatus()'
				)
			),
		)); ?>
	</div>
</div>
<!-- END: -->
