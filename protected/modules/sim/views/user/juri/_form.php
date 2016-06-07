<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php //echo $form->errorSummary($model); ?>

    <div class="form-group row">
        <?php echo $form->labelEx($model,'ID_PT',array('class'=>'col-md-2')); ?>
        <div class="col-md-10">
            <?php echo $form->dropDownList($model,'ID_PT',MasterPT::optionsAll(),array('prompt'=>'--Pilih Perguruan Tinggi--','class'=>'form-control select2me')); ?>
            <?php echo $form->error($model,'ID_PT'); ?>
        </div>
    </div>

    <div class="form-group row">
        <?php echo $form->labelEx($model,'NAMA',array('class'=>'col-md-2')); ?>
        <div class="col-md-10">
            <?php echo $form->textField($model,'NAMA',array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'NAMA'); ?>
        </div>
    </div>

    <div class="form-group row">
        <?php echo $form->labelEx($model,'EMAIL',array('class'=>'col-md-2')); ?>
        <div class="col-md-10">
            <?php echo $form->textField($model,'EMAIL',array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'EMAIL'); ?>
        </div>
    </div>


    <?php if($model->isNewRecord): ?>
        <div class="form-group row">
            <?php echo $form->labelEx($model,'PASSWORD',array('class'=>'col-md-2')); ?>
            <div class="col-md-10">
                <?php echo $form->passwordField($model,'PASSWORD',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'PASSWORD'); ?>
            </div>
        </div>

        <div class="form-group row">
            <?php echo $form->labelEx($model,'PASSWORD_REPEAT',array('class'=>'col-md-2')); ?>
            <div class="col-md-10">
                <?php echo $form->passwordField($model,'PASSWORD_REPEAT',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'PASSWORD_REPEAT'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group row">
        <?php echo $form->labelEx($model,'HP',array('class'=>'col-md-2')); ?>
        <div class="col-md-10">
            <?php echo $form->textField($model,'HP',array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'HP'); ?>
        </div>
    </div>

    <div class="form-group row">
        <?php echo $form->labelEx($model,'STATUS',array('class'=>'col-md-2')); ?>
        <div class="col-md-10">
            <?php echo $form->dropDownList($model,'STATUS',$model->optionsStatus(),array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'STATUS'); ?>
        </div>
    </div>

    <div class="form-group row buttons">
        <div class="col-md-10 col-md-offset-2">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'SIMPAN' : 'SIMPAN PERUBAHAN',array('class'=>'btn btn-primary')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
