<?php
/* @var $this m_siswaController */
/* @var $model m_siswa */
/* @var $form CActiveForm */

$this->pageTitle='Ubah Password';
$this->breadcrumbs=array(
	$this->pageTitle
);
?>


<!-- BEGIN: -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-pencil font-blue-sharp"></i>
            <span class="uppercase font-blue-sharp">Ubah Password</span>
        </div>
    </div>
    <div class="portlet-body">
        <?php echo @Yii::app()->user->getFlash('info');?>
        <div class="row">
            <div class="col-md-6">
                <?php echo $this->renderPartial('ubahpassword/_form', array('model'=>$model)); ?>
            </div>
        </div>
    </div>
</div>
<!-- END: -->
