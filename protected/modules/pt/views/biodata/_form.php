<?php
/* @var $this UserKopertisController */
/* @var $model UserKopertis */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-kopertis-_form-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // See class documentation of CActiveForm for details on this,
    // you need to use the performAjaxValidation()-method described there.
    'enableAjaxValidation'=>false,
)); ?>
    <h4>Biodata</h4>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php //echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'EMAIL'); ?>
        <?php echo $form->textField($model,'EMAIL'); ?>
        <?php echo $form->error($model,'EMAIL'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'NAMA'); ?>
        <?php echo $form->textField($model,'NAMA'); ?>
        <?php echo $form->error($model,'NAMA'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'HP'); ?>
        <?php echo $form->textField($model,'HP'); ?>
        <?php echo $form->error($model,'HP'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'TELP'); ?>
        <?php echo $form->textField($model,'TELP'); ?>
        <?php echo $form->error($model,'TELP'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Simpan Perubahan',array('class'=>'btn blue')); ?>
        <?php echo CHtml::link('Kembali',array('default/index'),array('class'=>'btn yellow','style'=>'margin-top:-3px;')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
