<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'ubah-password-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Kolom isian dengan tanda <span class="required">*</span> harus diisi.</p>

    <?php //echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'OLD'); ?>
        <?php echo $form->passwordField($model,'OLD',array('size'=>25)); ?>
        <?php echo $form->error($model,'OLD'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'NEW'); ?>
        <?php echo $form->passwordField($model,'NEW',array('size'=>25)); ?>
        <?php echo $form->error($model,'NEW'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'REPEAT'); ?>
        <?php echo $form->passwordField($model,'REPEAT',array('size'=>25)); ?>
        <?php echo $form->error($model,'REPEAT'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('SIMPAN PERUBAHAN',array('class'=>'btn blue')); ?>
        <?php echo CHtml::link('KEMBALI',array('default/index'),array('class'=>'btn yellow','style'=>'margin-top:-3px;')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
