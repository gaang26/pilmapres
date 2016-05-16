<?php
/* @var $this UserController */
/* @var $model User */
$this->pageTitle = 'Tambah User Admin';
$this->breadcrumbs=array(
    'Manajemen User Admin'=>array('user/admin'),
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
        <?php $this->renderPartial('admin/_form', array('model'=>$model)); ?>
    </div>
</div>
<!-- END: -->
