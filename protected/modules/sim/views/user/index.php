<?php
$this->pageTitle = 'Manajemen User';
$this->breadcrumbs = array(
    $this->pageTitle
);
?>


<!-- BEGIN: -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-users font-blue-sharp"></i>
            <span class="uppercase bold font-blue-sharp"><?php echo $this->pageTitle; ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-3 text-center">
                <div class="well">
                    <h4 class="uppercase">User Administrator</h4>
                    <?php echo CHtml::link('Lihat User <i class="fa fa-arrow-right"></i>',array('user/admin'),array(
                        'class'=>'btn blue'
                    )); ?>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="well">
                    <h4 class="uppercase">User Juri</h4>
                    <?php echo CHtml::link('Lihat User <i class="fa fa-arrow-right"></i>',array('user/juri'),array(
                        'class'=>'btn blue'
                    )); ?>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="well">
                    <h4 class="uppercase">User Kopertis</h4>
                    <?php echo CHtml::link('Lihat User <i class="fa fa-arrow-right"></i>',array('user/kopertis'),array(
                        'class'=>'btn blue'
                    )); ?>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="well">
                    <h4 class="uppercase">User PT</h4>
                    <?php echo CHtml::link('Lihat User <i class="fa fa-arrow-right"></i>',array('user/pt'),array(
                        'class'=>'btn blue'
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: -->
