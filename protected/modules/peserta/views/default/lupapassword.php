<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Lupa Password';
$this->breadcrumbs=array(
    'Login Peserta'=>array('default/login'),
	$this->pageTitle,
);
?>
<div class="row-fluid">
    <div class="span6 offset3">
        <div class="well well-smoke bordered-dashed-1">
            <h4><?php echo $this->pageTitle; ?></h4>

            <?php echo Yii::app()->user->getFlash('info'); ?>
            <div class="form">

            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'peserta-form',
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
                            <?php echo $form->labelEx($model,'EMAIL'); ?>
                            <?php echo $form->textField($model,'EMAIL',array('class'=>'input-block-level')); ?>
                            <?php echo $form->error($model,'EMAIL'); ?>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info">
                    Link reset password akan dikirimkan ke email yang Anda masukkan diatas. Pastikan bahwa email tersebut masih aktif dan Anda mempunyai akses ke email tersebut.
                </div>

                <div class="row buttons">
                    <?php echo CHtml::submitButton('Reset Password',array('class'=>'btn blue')); ?>
                    <?php echo CHtml::link('<i class="icon-arrow-left"></i> Kembali',array('default/login'),array('class'=>'btn yellow','style'=>'margin-top:-3px;')); ?>
                </div>

            <?php $this->endWidget(); ?>

            </div><!-- form -->
        </div>
    </div>
</div>
