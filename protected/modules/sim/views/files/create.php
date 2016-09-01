<?php
/* @var $this FilesController */
/* @var $model Files */
$this->pageTitle = 'Buat File';
$this->breadcrumbs=array(
	'Manajemen File'=>array('index'),
);
?>


<!-- BEGIN: -->
<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-plus font-blue-sharp"></i>
			<span class="uppercase font-blue-sharp">Buat File</span>
		</div>
	</div>
	<div class="portlet-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>
<!-- END: -->
