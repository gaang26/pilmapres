<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Reset Password Peserta';
$this->breadcrumbs=array(
	$this->pageTitle,
);
?>

<div class="row-fluid">
    <div class="span6 offset3">
        <div class="well well-smoke bordered-dashed-1">
            <?php echo Yii::app()->user->getFlash('info'); ?>

            <h4>Masukkan Password Baru Anda</h4>
            <div class="form">

            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'user-pt-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
            )); ?>

                <p class="note">Kolom isian dengan tanda <span class="required">*</span> Wajib diisi.</p>

                <?php //echo $form->errorSummary($model); ?>

                <div class="row-fluid">
                    <div class="span12">
                        <div class="row">
                            <?php echo $form->labelEx($model,'NEW_PASSWORD'); ?>
                            <?php echo $form->passwordField($model,'NEW_PASSWORD',array('class'=>'input-block-level')); ?>
                            <?php echo $form->error($model,'NEW_PASSWORD'); ?>
                        </div>
                        <div class="row">
                            <?php echo $form->labelEx($model,'PASSWORD_REPEAT'); ?>
                            <?php echo $form->passwordField($model,'PASSWORD_REPEAT',array('class'=>'input-block-level')); ?>
                            <?php echo $form->error($model,'PASSWORD_REPEAT'); ?>
                        </div>
                    </div>
                </div>

                <div class="row buttons">
                    <?php echo CHtml::submitButton('Reset Password',array('class'=>'btn blue')); ?>
                </div>

            <?php $this->endWidget(); ?>

            </div><!-- form -->
        </div>
    </div>
</div>
