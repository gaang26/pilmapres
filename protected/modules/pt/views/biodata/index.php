<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Biodata';
$this->breadcrumbs=array(
	$this->pageTitle,
);
?>

<div class="row">
    <div class="span8 offset2">
        <div class="well well-smoke bordered-dashed-1">
            <?php echo Yii::app()->user->getFlash('info'); ?>
            <?php $this->renderPartial('_form',array('model'=>$model)); ?>
        </div>
    </div>
</div>
