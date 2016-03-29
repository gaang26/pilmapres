<?php
/* @var $this PtController */
/* @var $model UserPT */
/* @var $form CActiveForm */
?>

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

        <div>
            <?php echo CHtml::link('Nama Perguruan Tinggi Anda tidak tercantum?',array('daftar/ptbaru')); ?>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span6">
            <div class="row">
                <?php echo $form->labelEx($model,'EMAIL'); ?>
                <?php echo $form->textField($model,'EMAIL',array('class'=>'input-block-level')); ?>
                <?php echo $form->error($model,'EMAIL'); ?>
            </div>
        </div>
        <div class="span6">
            <div class="row">
                <?php echo $form->labelEx($model,'NAMA'); ?>
                <?php echo $form->textField($model,'NAMA',array('class'=>'input-block-level')); ?>
                <?php echo $form->error($model,'NAMA'); ?>
            </div>
        </div>
    </div>



    <div class="row-fluid">
        <div class="span6">
            <div class="row">
                <?php echo $form->labelEx($model,'PASSWORD'); ?>
                <?php echo $form->passwordField($model,'PASSWORD',array('class'=>'input-block-level')); ?>
                <?php echo $form->error($model,'PASSWORD'); ?>
            </div>
        </div>
        <div class="span6">
            <div class="row">
                <?php echo $form->labelEx($model,'PASSWORD_REPEAT'); ?>
                <?php echo $form->passwordField($model,'PASSWORD_REPEAT',array('class'=>'input-block-level')); ?>
                <?php echo $form->error($model,'PASSWORD_REPEAT'); ?>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span6">
            <div class="row">
                <?php echo $form->labelEx($model,'HP'); ?>
                <?php echo $form->textField($model,'HP',array('class'=>'input-block-level')); ?>
                <?php echo $form->error($model,'HP'); ?>
            </div>
        </div>
        <div class="span6">
            <div class="row">
                <?php echo $form->labelEx($model,'TELP'); ?>
                <?php echo $form->textField($model,'TELP',array('class'=>'input-block-level')); ?>
                <?php echo $form->error($model,'TELP'); ?>
            </div>
        </div>
    </div>

    <hr>
	<blockquote style="text-align:justify"><h4>Pernyataan</h4>
		Kami menyatakan bahwa data yang kami masukkan diatas adalah benar adanya.</br>
		Jika terbukti adanya ketidakbenaran data diatas, kami siap jika peserta dari perguruan tinggi kami di diskualifikasi.
	</blockquote>

    <div class="row buttons">
        <?php echo CHtml::submitButton('DAFTAR SEKARANG',array('class'=>'btn blue')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
