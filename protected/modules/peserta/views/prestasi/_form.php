<?php
/* @var $this PrestasiController */
/* @var $model Prestasi */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prestasi-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <div class="row-fluid">
        <div class="span8 offset2">
            <div class="well well-smoke bordered-dashed-1">
                <p class="note">Kolom isian dengan tanda <span class="required">*</span> harus diisi.</p>

            	<?php //echo $form->errorSummary($model); ?>

            	<div class="row">
            		<?php echo $form->labelEx($model,'NAMA_PRESTASI'); ?>
            		<?php echo $form->textField($model,'NAMA_PRESTASI',array('class'=>'input-block-level')); ?>
            		<?php echo $form->error($model,'NAMA_PRESTASI'); ?>
            	</div>

                <div class="row">
            		<?php echo $form->labelEx($model,'LEMBAGA'); ?>
            		<?php echo $form->textField($model,'LEMBAGA',array('class'=>'input-block-level')); ?>
            		<?php echo $form->error($model,'LEMBAGA'); ?>
            	</div>

                <div class="row-fluid">
                    <div class="span6">
                        <div class="row">
                            <?php echo $form->labelEx($model,'PENCAPAIAN'); ?>
                            <?php echo $form->dropDownList($model,'PENCAPAIAN',PesertaPrestasi::optionsPencapaian(),array(
                                'prompt'=>'Pilih pencapaian prestasi...',
                                'onchange'=>'showOthersField(this.value)',
                                'class'=>'input-block-level'
                            )); ?>
                            <?php echo $form->error($model,'PENCAPAIAN'); ?>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="row">
                            <?php echo $form->labelEx($model,'TAHUN'); ?>
                            <?php echo $form->dropDownList($model,'TAHUN',PesertaPrestasi::optionsTahun(),array(
                                'class'=>'input-block-level',
                                'prompt'=>'Pilih tahun perolehan...'
                            )); ?>
                            <?php echo $form->error($model,'TAHUN'); ?>
                        </div>
                    </div>

                </div>

            	<script type="text/javascript">
            	function showOthersField(val){
            		if(val=='<?php echo PesertaPrestasi::PENCAPAIAN_LAINNYA;?>'){
            			jQuery('#others').show();
            			jQuery('#others-field').attr('required',true);
            		}
            		else{
            			jQuery('#others').hide();
            			jQuery('#others-field').removeAttr('required');
            		}
            	}
            	</script>

            	<div class="row <?php echo $model->PENCAPAIAN!=PesertaPrestasi::PENCAPAIAN_LAINNYA?'hide':'';?>" id="others">
            		<?php echo $form->labelEx($model,'OTHERS'); ?>
            		<?php echo $form->textField($model,'OTHERS',array('class'=>'input-block-level','id'=>'others-field')); ?>
            		<?php echo $form->error($model,'OTHERS'); ?>
            	</div>

                <div class="row-fluid">
                    <div class="span6">
                        <div class="row">
                    		<?php echo $form->labelEx($model,'JENIS'); ?>
                    		<?php echo $form->dropDownList($model,'JENIS',PesertaPrestasi::optionsJenis(),array(
                                'prompt'=>'Pilih jenis prestasi...',
                                'class'=>'input-block-level'
                            )); ?>
                    		<?php echo $form->error($model,'JENIS'); ?>
                    	</div>
                    </div>
                    <div class="span6">
                        <div class="row">
                    		<?php echo $form->labelEx($model,'TINGKAT'); ?>
                    		<?php echo $form->dropDownList($model,'TINGKAT',PesertaPrestasi::optionsTingkat(),array(
                                'prompt'=>'Pilih tingkat prestasi...',
                                'class'=>'input-block-level'
                            )); ?>
                    		<?php echo $form->error($model,'TINGKAT'); ?>
                    	</div>
                    </div>

                </div>

                <div class="row-fluid">
                    <div class="span6">
                        <div class="row">
                    		<?php echo $form->labelEx($model,'PRIORITAS'); ?>
                    		<?php echo $form->dropDownList($model,'PRIORITAS',PesertaPrestasi::optionsPrioritas(),array('class'=>'input-block-level','prompt'=>'Pilih prioritas prestasi...','min'=>1)); ?>
                    		<?php echo $form->error($model,'PRIORITAS'); ?>
                    	</div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span6">
                        <div class="row">
                            <?php echo $form->labelEx($model,'JUMLAH_PENGHARGAAN'); ?>
                            <?php echo $form->numberField($model,'JUMLAH_PENGHARGAAN',array('class'=>'input-block-level','min'=>1)); ?>
                            <?php echo $form->error($model,'JUMLAH_PENGHARGAAN'); ?>
                        </div>
                    </div>
                </div>

				<div class="row">
            		<?php echo $form->labelEx($model,'KETERANGAN'); ?>
					<p class="hint">
						<small>Berikan keterangan tambahan mengenai prestasi yang Anda entrikan, misalnya informasi mengenai website event yang menyelenggarakan, link poster atau lainnya.</small>
					</p>
            		<?php echo $form->textArea($model,'KETERANGAN',array('class'=>'input-block-level','rows'=>5)); ?>
            		<?php echo $form->error($model,'KETERANGAN'); ?>
            	</div>

            	<div class="row">
            		<?php echo $form->labelEx($model,'FILE_SERTIFIKAT'); ?>
            		<p class="hint">Masukkan file pendukung prestasi/sertifikat(jika ada). format file jpg/jpeg/png ukuran maks. 1MB</p>
            		<?php echo $form->fileField($model,'FILE_SERTIFIKAT',array('class'=>'uniform-file')); ?>
            		<?php echo $form->error($model,'FILE_SERTIFIKAT'); ?>
            	</div>

            	<div class="row buttons">
            		<?php echo CHtml::submitButton($model->isNewRecord ? 'SIMPAN DATA PRESTASI' : 'SIMPAN PERUBAHAN',array('class'=>'btn green')); ?>
					<?php echo CHtml::link('BATAL',array('prestasi/index'),array('class'=>'btn yellow','style'=>'margin-top:-4px;')); ?>
            	</div>
            </div>
        </div>
    </div>


<?php $this->endWidget(); ?>

</div><!-- form -->
