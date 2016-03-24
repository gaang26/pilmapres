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
                <p class="note">Fields with <span class="required">*</span> are required.</p>

                <?php //echo $form->errorSummary($model); ?>

                <h4>Akademik</h4>
                <div class="row">
            		<?php echo $form->labelEx($model,'NIM'); ?>
            		<?php echo $form->textField($model,'NIM',array('class'=>'input-block-level')); ?>
            		<?php echo $form->error($model,'NIM'); ?>
            	</div>

                <div class="row">
                    <?php echo $form->labelEx($model,'ID_PRODI'); ?>
                    <?php echo $form->dropDownList($model,'ID_PRODI',MasterProdi::optionsAll(),array(
                        'class'=>'input-block-level select',
                        'prompt'=>'Pilih program studi/jurusan...'
                    )); ?>
                    <?php echo $form->error($model,'ID_PRODI'); ?>
                </div>


                <div class="row-fluid">
                    <div class="span4">
                        <div class="row">
                            <?php echo $form->labelEx($model,'IPK'); ?>
                            <?php echo $form->textField($model,'IPK',array('class'=>'input-block-level')); ?>
                            <?php echo $form->error($model,'IPK'); ?>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="row">
                            <?php echo $form->labelEx($model,'JENJANG'); ?>
                            <?php echo CHtml::textField('jenjang',$model->JENJANG,array('readonly'=>true,'class'=>'input-block-level')); ?>
                            <?php //echo $form->textField($model,'JENJANG',array('size'=>15,'maxlength'=>15)); ?>
                            <?php echo $form->error($model,'JENJANG'); ?>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="row">
                            <?php echo $form->labelEx($model,'SEMESTER'); ?>
                            <?php echo CHtml::textField('semester',$model->SEMESTER,array('readonly'=>true,'class'=>'input-block-level')) ?>
                            <?php //echo $form->textField($model,'SEMESTER',array('class'=>'input-block-level')); ?>
                            <?php echo $form->error($model,'SEMESTER'); ?>
                        </div>
                    </div>

                </div>

                <h4>Biodata</h4>

                <div class="row">
                    <?php echo $form->labelEx($model,'NAMA'); ?>
                    <?php echo $form->textField($model,'NAMA',array('class'=>'input-block-level')); ?>
                    <?php echo $form->error($model,'NAMA'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'JENIS_KELAMIN'); ?>
                    <?php echo $form->dropDownList($model,'JENIS_KELAMIN',Peserta::optionsJenisKelamin(),array('class'=>'input-block-level')); ?>
                    <?php echo $form->error($model,'JENIS_KELAMIN'); ?>
                </div>

                <div class="row-fluid">
                    <div class="span6">
                        <div class="row">
                            <?php echo $form->labelEx($model,'TEMPAT_LAHIR'); ?>
                            <?php echo $form->textField($model,'TEMPAT_LAHIR',array('class'=>'input-block-level')); ?>
                            <?php echo $form->error($model,'TEMPAT_LAHIR'); ?>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="row">
                            <?php echo $form->labelEx($model,'TANGGAL_LAHIR'); ?>
                            <?php
                            if($model->JENJANG==Peserta::SARJANA){
                                $tanggal_lahir = 'tanggal_lahir_sarjana';
                            }else{
                                $tanggal_lahir = 'tanggal_lahir_diploma';
                            }
                            ?>
                            <?php echo $form->textField($model,'TANGGAL_LAHIR',array('class'=>$tanggal_lahir.' input-block-level')); ?>
                            <?php echo $form->error($model,'TANGGAL_LAHIR'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'ALAMAT'); ?>
                    <?php echo $form->textArea($model,'ALAMAT',array('class'=>'input-block-level','rows'=>4)); ?>
                    <?php echo $form->error($model,'ALAMAT'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'ID_KOTA'); ?>
                    <?php echo $form->dropDownList($model,'ID_KOTA',MasterKota::optionsAll(),array(
                        'prompt'=>'Pilih kota...',
                        'class'=>'select input-block-level'
                    )); ?>
                    <?php echo $form->error($model,'ID_KOTA'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'EMAIL'); ?>
                    <?php echo $form->textField($model,'EMAIL',array('class'=>'input-block-level')); ?>
                    <?php echo $form->error($model,'EMAIL'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'HP'); ?>
                    <?php echo $form->textField($model,'HP',array('class'=>'input-block-level')); ?>
                    <?php echo $form->error($model,'HP'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'WEBSITE'); ?>
                    <?php echo $form->textField($model,'WEBSITE',array('class'=>'input-block-level')); ?>
                    <?php echo $form->error($model,'WEBSITE'); ?>
                </div>
                <hr>
                <div class="row buttons">
                    <?php echo CHtml::submitButton('SIMPAN BIODATA',array('class'=>'btn blue btn-large btn-block')); ?>
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
