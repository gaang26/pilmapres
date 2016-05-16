<?php
/* @var $this UserController */
/* @var $model User */
$this->pageTitle = 'Koreksi User Kopertis';
$this->breadcrumbs=array(
    'Manajemen User Kopertis'=>array('user/kopertis'),
    $this->pageTitle,
);

?>


<!-- BEGIN: -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-user font-blue-sharp"></i>
            <span class="uppercase font-blue-sharp"><?php echo $this->pageTitle; ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <?php $this->renderPartial('kopertis/_form', array('model'=>$model)); ?>
    </div>
</div>
<!-- END: -->
