<?php
/* @var $this DefaultController */

$this->pageTitle = 'SIM';
$this->breadcrumbs=array(
	$this->pageTitle
);
$baseUrl = Yii::app()->theme->baseUrl;
?>

<?php echo Yii::app()->user->getFlash('info'); ?>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-light green-haze" href="javascript:;">
		<div class="visual">
			<i class="fa fa-graduation-cap fa-icon-medium"></i>
		</div>
		<div class="details">
			<div class="number">
				670.54
			</div>
			<div class="desc">
				Semua Peserta
			</div>
		</div>
		</a>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-light green-haze" href="javascript:;">
		<div class="visual">
			<i class="fa fa-graduation-cap fa-icon-medium"></i>
		</div>
		<div class="details">
			<div class="number">
				670.54
			</div>
			<div class="desc">
				Peserta Sarjana
			</div>
		</div>
		</a>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-light green-haze" href="javascript:;">
		<div class="visual">
			<i class="fa fa-graduation-cap fa-icon-medium"></i>
		</div>
		<div class="details">
			<div class="number">
				670.54
			</div>
			<div class="desc">
				Peserta Diploma
			</div>
		</div>
		</a>
	</div>
</div>


<!-- BEGIN: -->
<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-user font-blue-sharp"></i>
			<span class="uppercase bold font-blue-sharp">VERIFIKASI USER PERGURUAN TINGGI</span>
		</div>
	</div>
	<div class="portlet-body">
		<?php
		if($userpt->searchPending()->totalItemCount==0){
			echo '<div class="note note-info">Tidak ada user belum diverifikasi</div>';
		}else{
			echo '<div class="note note-info">Sebanyak '.$userpt->searchPending()->totalItemCount.' user belum diverifikasi.</div>';
		}
		?>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
		    'id'=>'user-pt-grid',
		    'dataProvider'=>$userpt->searchPending(),
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
			//'filter'=>$userpt,
		    'columns'=>array(
		        'PT.NAMA',
		        'EMAIL',
		        'NAMA',
				'HP',
		        'TANGGAL_INPUT',
				// array(
				// 	'name'=>'STATUS',
				// 	'type'=>'raw',
				// 	'value'=>'$data->getLabelStatus()'
				// ),
				array(
					'header'=>'Verifikasi',
					'type'=>'raw',
					'value'=>'$data->getAcceptButton()'
				),
				array(
					'header'=>'Tolak',
					'type'=>'raw',
					'value'=>'$data->getRejectButton()'
				)
		        /*'VERIFIKATOR',
		        'TANGGAL_UPDATE',
		        'TOKEN',
		        */
		        // array(
		        //     'class'=>'CButtonColumn',
		        // ),
		    ),
		)); ?>

		<?php echo CHtml::link('Lihat semua user <i class="fa fa-arrow-right"></i>',array('user/index'),array('class'=>'btn green')); ?>
	</div>
</div>
<!-- END: -->
