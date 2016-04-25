<?php
/* @var $this m_siswaController */
/* @var $model m_siswa */
/* @var $form CActiveForm */

$this->pageTitle='Ubah Password';
$this->breadcrumbs=array(
    'Beranda'=>array('default/index'),
	$this->pageTitle
);
?>

<div class="row-fluid">
    <div class="span6 offset3">
        <div class="well well-smoke bordered-dashed-1 bordered-radius-1">
            <h4>UBAH PASSWORD</h4>
            <?php echo @Yii::app()->user->getFlash('info');?>
            <?php echo $this->renderPartial('ubahpassword/_form', array('model'=>$model)); ?>
        </div>
    </div>
</div>
