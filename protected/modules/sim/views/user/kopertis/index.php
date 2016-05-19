<?php
$this->pageTitle = 'Manajemen User Kopertis';
$this->breadcrumbs = array(
    $this->pageTitle
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
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
            <i class="fa fa-users font-blue-sharp"></i>
            <span class="uppercase bold font-blue-sharp"><?php echo $this->pageTitle; ?></span>
        </div>
        <div class="actions">
            <?php echo CHtml::link('<i class="fa fa-arrow-left"></i> Lihat semua user',array('user/index'),array(
                'class'=>'btn btn-circle default'
            )); ?>
            <?php echo CHtml::link('<i class="fa fa-search"></i> Cari User','#',array(
                'class'=>'btn btn-circle default search-button'
            )); ?>
            <?php echo CHtml::link('<i class="fa fa-plus"></i> Tambah User',array('user/create','type'=>WebUser::ROLE_KOPERTIS),array(
                'class'=>'btn btn-circle blue'
            )); ?>
        </div>
    </div>
    <div class="portlet-body">
        <?php echo Yii::app()->user->getFlash('info'); ?>
        <div class="search-form" style="display:none">
		<?php $this->renderPartial('kopertis/_search',array(
			'model'=>$user,
		)); ?>
		</div><!-- search-form -->
        <?php $this->widget('zii.widgets.grid.CGridView', array(
		    'id'=>'user-grid',
		    'dataProvider'=>$user->search(),
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
			//'filter'=>$user,
		    'columns'=>array(
		        'NAMA',
		        'EMAIL',
				'HP',
                array(
					'name'=>'TANGGAL_INPUT',
					'type'=>'tanggalWaktu',
					'value'=>'$data->TANGGAL_INPUT'
				),
                array(
					'name'=>'STATUS',
					'type'=>'raw',
					'value'=>'$data->getLabelStatus()'
				),
                array(
					'header'=>'Koreksi',
					'type'=>'raw',
                    'htmlOptions'=>array(
                        'width'=>'100px',
                    ),
					'value'=>'$data->getUpdateButton()'
				),
                array(
					'header'=>'Hapus',
					'type'=>'raw',
                    'htmlOptions'=>array(
                        'width'=>'100px',
                    ),
					'value'=>'$data->getDeleteButton()'
				),
		    ),
		)); ?>


    </div>
</div>
<!-- END: -->
