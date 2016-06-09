<?php
/* @var $this KomentarController */
/* @var $komentar Komentar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'komentar-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->hiddenField($komentar,'ID_PESERTA'); ?>
    <?php echo $form->hiddenField($komentar,'ID_JURI'); ?>
    <?php echo $form->hiddenField($komentar,'BIDANG',array(
        'value'=>$bidang
    )); ?>

    <div class="form-group">
        <?php echo $form->labelEx($komentar,'KOMENTAR'); ?>
        <?php echo $form->textArea($komentar,'KOMENTAR',array('rows'=>4,'class'=>'form-control')); ?>
        <?php echo $form->error($komentar,'KOMENTAR'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton('Kirim Komentar',array('class'=>'btn blue')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
