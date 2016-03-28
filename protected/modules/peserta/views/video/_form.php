<?php
/* @var $this BiodataController */
/* @var $model Peserta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'peserta-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <div class="row-fluid">
        <div class="span8 offset2">
            <div class="well well-white bordered-dashed-1">
                <?php echo Yii::app()->user->getFlash('info'); ?>
                <h4>Video kemampuan bahasa inggris</h4>
                <?php //echo $form->errorSummary($model); ?>

                <blockquote class="note"><small>Masukkan full url video yang telah Anda unggah di youtube.
                    Pastikan bahwa video yang Anda upload di youtube sudah Anda publish sehingga dapat terbaca pada sistem ini. Jika video Anda tidak dapat diputar, maka akan dianggap tidak menyertakan video kemampuan bahasa inggris.<br>
                    Contoh url: http://www.youtube.com/watch?v=dNmuUOpBX7Q</small>
                </blockquote>
                <div class="row">
                    <?php echo $form->labelEx($model,'VIDEO_RINGKASAN'); ?>
                    <?php echo $form->textField($model,'VIDEO_RINGKASAN',array(
                        'class'=>'input-block-level',
                    )); ?>
                    <p class="hint">
                        <small>Contoh: http://www.youtube.com/watch?v=dNmuUOpBX7Q</small>
                    </p>
                    <?php echo $form->error($model,'VIDEO_RINGKASAN'); ?>
                </div>

                <?php
                if(!$model->isVideoEmpty()){
                    echo '<h4>Hasil video</h4>';
                    echo $model->getEmbedLink($model->VIDEO_RINGKASAN,'100%','315');
                }
                ?>
                <hr>
                <div class="row buttons">
                    <?php echo CHtml::submitButton(($model->isVideoEmpty())?'SIMPAN VIDEO':'SIMPAN PERUBAHAN',array('class'=>'btn blue btn-large btn-block')); ?>
                </div>
                <div class="text-right">
                    <?php echo CHtml::link('Entri data prestasi >>',array('prestasi/index')); ?>
                </div>
            </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
