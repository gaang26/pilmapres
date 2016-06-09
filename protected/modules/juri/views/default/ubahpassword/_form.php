<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'ubah-password-form',
    'enableAjaxValidation'=>false,
)); ?>

    <?php //echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'OLD'); ?>
        <?php echo $form->passwordField($model,'OLD',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'OLD'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'NEW'); ?>
        <?php echo $form->passwordField($model,'NEW',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'NEW'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'REPEAT'); ?>
        <?php echo $form->passwordField($model,'REPEAT',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'REPEAT'); ?>
    </div>


    <div class="form-group buttons">
        <?php echo CHtml::submitButton('SIMPAN PERUBAHAN',array('class'=>'btn blue')); ?>
        <?php echo CHtml::link('KEMBALI',array('default/index'),array(
            'class'=>'btn yellow'
        )); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
