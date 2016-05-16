<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="">

<?php $form=$this->beginWidget('CActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <?php echo $form->label($model,'EMAIL'); ?>
                <?php echo $form->textField($model,'EMAIL',array('class'=>'form-control')); ?>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <?php echo $form->label($model,'NAMA'); ?>
                <?php echo $form->textField($model,'NAMA',array('class'=>'form-control')); ?>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <?php echo $form->label($model,'STATUS'); ?>
                <?php echo $form->dropDownList($model,'STATUS',array(''=>'Semua')+$model->optionsStatus(),array('class'=>'form-control')); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton('Tampilkan Hasil',array('class'=>'btn default')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
