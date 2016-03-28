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
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <div class="row-fluid">
        <div class="span8 offset2">
            <div class="well well-white bordered-dashed-1">
                <?php echo Yii::app()->user->getFlash('info'); ?>

                <?php //echo $form->errorSummary($model); ?>

                <h4>Informasi Karya Tulis Ilmiah</h4>
                <blockquote class="note"><small>Masukkan informasi karya tulis ilmiah Anda pada kolom-kolom yang tersedia dibawah ini:</small>
                </blockquote>

                <div class="row">
            		<?php echo $form->labelEx($model,'JUDUL_KTI'); ?>
            		<?php echo $form->textField($model,'JUDUL_KTI',array('class'=>'input-block-level')); ?>
            		<?php echo $form->error($model,'JUDUL_KTI'); ?>
            	</div>

                <div class="row">
                    <?php echo $form->labelEx($model,'ID_TOPIK'); ?>
                    <?php echo $form->dropDownList($model,'ID_TOPIK',MasterTopik::optionsTopik($model->JENJANG),array(
                        'class'=>'input-block-level select',
                        'prompt'=>'Pilih topik karya tulis...'
                    )); ?>
                    <?php echo $form->error($model,'ID_TOPIK'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'BIDANG'); ?>
                    <?php echo $form->dropDownList($model,'BIDANG',Peserta::optionsBidang(),array(
                        'class'=>'input-block-level select',
                        'prompt'=>'Pilih bidang karya tulis ilmiah...'
                    )); ?>
                    <?php echo $form->error($model,'BIDANG'); ?>
                </div>

                <div class="row">
            		<?php echo $form->labelEx($model,'RINGKASAN'); ?>
            		<?php //echo $form->textArea($model,'RINGKASAN',array('class'=>'input-block-level')); ?>
                    <?php $this->widget('bootstrap.widgets.BootWysiwyg',array(
                        'model'=>$model,
                        'attribute'=>'RINGKASAN',
                        'buttons'=>array(
                            'font-styles',
                            'emphasis'
                        ),
                        'htmlOptions'=>array(
                            'class'=>'textarea input-block-level',
                            //'style'=>'width: 97%',
                            'rows'=>20
                        ),
                    )); ?>
            		<?php echo $form->error($model,'RINGKASAN'); ?>
            	</div>

                <?php
                if($model->FILE_KTI!=null||$model->FILE_KTI!=''){
                    ?>
                    <div>
                        <h5 style="padding:0px; margin-top:0px;">File Karya Tulis Ilmiah sudah terunggah</h5>
                        <div class="">
                            <?php echo CHtml::link('<i class="icon-download-alt"></i> UNDUH FILE KARYA TULIS ILMIAH',array('kti/unduh'),array(
                                'class'=>'btn red'
                            )); ?>
                            <button type="button" class="btn yellow" name="button" onclick="$('#unggah-file').toggle()"><i class="icon-pencil"></i> PERBARUI FILE</button>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="row" style="<?php echo ($model->FILE_KTI!=null||$model->FILE_KTI!='')?'display:none':''; ?>" id="unggah-file">
                    <?php echo $form->labelEx($model,'FILE_KTI'); ?>
                    <small>Ekstensi Karya tulis ilmiah dalam format .pdf (Maks. 10 MB)</small><br>
                    <?php echo $form->fileField($model,'FILE_KTI',array('class'=>'uniform-file')); ?>
                    <?php echo $form->error($model,'FILE_KTI'); ?>
                </div>

                <hr>
                <div class="row buttons">
                    <?php echo CHtml::submitButton('SIMPAN KARYA TULIS ILMIAH',array('class'=>'btn blue btn-large btn-block')); ?>
                </div>

            </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$(document).ready(function(){
    $('.tanggal_lahir_sarjana').datepicker({
        startDate: "01-01-1993",
        format: 'yyyy-mm-dd',
        autoclose: true,
        startView: 2
    });

    $('.tanggal_lahir_diploma').datepicker({
        startDate: "01-01-1994",
        format: 'yyyy-mm-dd',
        autoclose: true,
        startView: 2
    });
});
</script>
