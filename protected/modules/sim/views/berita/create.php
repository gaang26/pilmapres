<?php
/* @var $this BeritaController */
/* @var $model Berita */
$this->pageTitle = 'Buat Berita';
$this->breadcrumbs=array(
	'Berita'=>array('index'),
	$this->pageTitle,
);
?>


<!-- BEGIN: -->
<div class="portlet light bordered">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-plus font-blue-sharp"></i>
			<span class="uppercase font-blue-sharp"><?php echo $this->pageTitle; ?></span>
		</div>
	</div>
	<div class="portlet-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>
<!-- END: -->
