<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Lupa Password';
$this->breadcrumbs=array(
    'Login Perguruan Tinggi'=>array('default/login'),
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
                'id'=>'user-pt-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
            )); ?>

                <p class="note">Kolom isian dengan tanda <span class="required">*</span> Wajib diisi.</p>

                <?php //echo $form->errorSummary($model); ?>

                <div class="row">
                    <?php echo $form->labelEx($model,'ID_PT'); ?>
                    <?php echo $form->dropDownList($model,'ID_PT',MasterPT::optionsAll(),array(
                        'class'=>'select input-block-level',
                        'prompt'=>'Pilih perguruan tinggi...'
                    )); ?>
                    <?php echo $form->error($model,'ID_PT'); ?>
                </div>

                <div class="row-fluid">
                    <div class="span12">
                        <div class="row">
                            <?php echo $form->labelEx($model,'EMAIL'); ?>
                            <?php echo $form->textField($model,'EMAIL',array('class'=>'input-block-level')); ?>
                            <?php echo $form->error($model,'EMAIL'); ?>
                        </div>
                    </div>
                    <!-- <div class="span6">
                        <div class="row">
                            <?php echo $form->labelEx($model,'HP'); ?>
                            <?php echo $form->textField($model,'HP',array('class'=>'input-block-level')); ?>
                            <?php echo $form->error($model,'HP'); ?>
                        </div>
                    </div> -->
                </div>

                <div class="row buttons">
                    <?php echo CHtml::submitButton('Reset Password',array('class'=>'btn blue')); ?>
                </div>

            <?php $this->endWidget(); ?>

            </div><!-- form -->

            <hr>

            <?php echo CHtml::link('<i class="icon-arrow-left"></i> Kembali',array('default/login'),array('class'=>'btn mini yellow')); ?>
            <?php echo CHtml::link('Daftar Akun Perguruan Tinggi <i class="icon-arrow-right"></i>',array('daftar/index'),array('class'=>'btn mini red')); ?>
        </div>
    </div>
</div>
