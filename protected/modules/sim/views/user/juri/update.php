<?php
/* @var $this UserController */
/* @var $model User */
$this->pageTitle = 'Edit User Juri';
$this->breadcrumbs=array(
    'Manajemen User Juri'=>array('user/juri'),
    $this->pageTitle,
);

?>


<!-- BEGIN: -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil font-blue-sharp"></i>
            <span class="uppercase font-blue-sharp"><?php echo $this->pageTitle; ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <?php $this->renderPartial('juri/_form', array('model'=>$model)); ?>
    </div>
</div>
<!-- END: -->
