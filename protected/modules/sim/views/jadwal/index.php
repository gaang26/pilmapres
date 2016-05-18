<?php
/* @var $this JadwalController */
/* @var $model Jadwal */

$this->pageTitle = 'Manajemen Jadwal';
$this->breadcrumbs=array(
	$this->pageTitle
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jadwal-grid').yiiGridView('update', {
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
			<i class="fa fa-calendar font-blue-sharp"></i>
			<span class="uppercase font-blue-sharp"><?php echo $this->pageTitle; ?></span>
		</div>
		<div class="actions">
			<?php /*echo CHtml::link('<i class="fa fa-plus"></i> Tambah Jadwal',array('jadwal/create'),array(
				'class'=>'btn btn-circle blue'
			));*/ ?>
			<?php //echo CHtml::link('Filter','#',array('class'=>'search-button btn btn-circle btn-default')); ?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'jadwal-grid',
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
				'KETERANGAN',
				array(
					'name'=>'TANGGAL_MULAI',
					'type'=>'raw',
					'value'=>'$data->TANGGAL_MULAI." ".$data->JAM_MULAI'
				),
				array(
					'name'=>'TANGGAL_SELESAI',
					'type'=>'raw',
					'value'=>'$data->TANGGAL_SELESAI." ".$data->JAM_SELESAI'
				),
				array(
					'name'=>'STATUS',
					'type'=>'raw',
					'value'=>'$data->getLabelStatus()'
				),
				array(
					'header'=>'',
					'type'=>'raw',
					'htmlOptions'=>array(
						'width'=>'80px'
					),
					'value'=>'$data->getActionButton()'
				)
			),
		)); ?>
	</div>
</div>
<!-- END: -->
