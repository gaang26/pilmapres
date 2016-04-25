<?php
/* @var $this BiodataController */
/* @var $model Peserta */
/* @var $form CActiveForm */
$user_pendaftar = $model->getUserPendaftar();
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

                <h4>Akademik</h4>
                <blockquote class="note"><small>Lengkapi kolom akademik dibawah ini. Jika terdapat kesalahan jenjang dan semester, silahkan hubungi <?php echo $user_pendaftar->NAMA.' melalui email '.$user_pendaftar->EMAIL; ?></small>
                </blockquote>
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
                <blockquote class="note"><small>Lengkapi biodata Anda pada kolom-kolom dibawah ini</small>
                </blockquote>
                <div class="row">
                    <?php echo $form->labelEx($model,'NAMA'); ?>
                    <?php echo $form->textField($model,'NAMA',array('class'=>'input-block-level')); ?>
                    <?php echo $form->error($model,'NAMA'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'JENIS_KELAMIN'); ?>
                    <?php echo $form->dropDownList($model,'JENIS_KELAMIN',Peserta::optionsJenisKelamin(),array(
                        'class'=>'input-block-level','prompt'=>'Pilih jenis kelamin...'
                    )); ?>
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

                <h4>Sosial Media</h4>
                <blockquote class="note"><small>Masukkan informasi sosial media Anda. Kosongkan jika tidak ada.<br>
                    Silahkan dimasukkan username atau url lengkap. Ex: <a href="http://instagram.com/cethol_" target="_blank">http://instagram.com/cethol_</a><br>
                </small>
                </blockquote>
                <?php
                foreach (MasterSosialMedia::getAll() as $data) {
                    echo $form->hiddenField($sosmed,'ID_SOSIAL_MEDIA['.$data->ID_SOSIAL_MEDIA.']',array('value'=>$data->ID_SOSIAL_MEDIA));
                    $existing = $model->getSocialMedia($data->ID_SOSIAL_MEDIA);
                    if($existing!=null){
                        $keterangan = $existing->KETERANGAN;
                    }else{
                        $keterangan = '';
                    }
                    ?>
                    <div class="row-fluid">
                        <div class="span4">
                            <b><?php echo $data->NAMA; ?></b>
                        </div>
                        <div class="span8">
                            <?php echo $form->textField($sosmed,'KETERANGAN['.$data->ID_SOSIAL_MEDIA.']',array(
                                'class'=>'input-block-level',
                                'value'=>$keterangan,
                            )); ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <h4>VALIDASI DATA</h4>
                <blockquote class="note">Silahkan cari profil Anda pada website <a href="http://forlap.dikti.go.id/mahasiswa" target="_blank">forlap.dikti.go.id/mahasiswa</a>, Kemudian masukkan link profil Anda pada kolom dibawah ini.
                    <br>Contoh link profil forlap: <a href="http://forlap.dikti.go.id/mahasiswa/detail/N0JBNzg4NkEtMzYzMy00RDEwLTlBMzktOEY5QUQ5MDc4RUM6" target="_blank">http://forlap.dikti.go.id/mahasiswa/detail/N0JBNzg4NkEtMzYzMy00RDEwLTlBMzktOEY5QUQ5MDc4RUM5</a>
                    <br><small>*Jika profil Anda tidak ditemukan pada website tersebut, silahkan laporkan ke pihak kemahasiswaan perguruan tinggi Anda agar data Anda dilaporkan ke sistem forlap.dikti.go.id</small>
                </blockquote>

                <div class="row">
                    <?php echo $form->labelEx($model,'URL_FORLAP'); ?>
                    <?php echo $form->textField($model,'URL_FORLAP',array('class'=>'input-block-level')); ?>
                    <?php echo $form->error($model,'URL_FORLAP'); ?>
                </div>

                <h4>Foto Profil</h4>
                <blockquote class="note"><small>Unggah foto profil Anda dalam format gambar dengan ukuran maksimal 300KB</small>
                </blockquote>
                <div class="row-fluid">
                    <div class="span3">
                        <div class="">
                            <div class="v-card text-center">
                                <div class="image-container">
                                    <?php echo $model->getPhoto(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span9">
                        <?php
                        if($model->PHOTO!=null||$model->PHOTO!=''){
                            ?>
                            <div>
                                <?php echo $form->labelEx($model,'PHOTO'); ?>
                                <div class="">
                                    <button type="button" class="btn green" name="button" onclick="$('#unggah-file').toggle()"><i class="icon-pencil"></i> PERBARUI FOTO</button>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="row" style="<?php echo ($model->PHOTO!=null||$model->PHOTO!='')?'display:none':''; ?>" id="unggah-file">
                            <?php echo $form->labelEx($model,'PHOTO'); ?>
                            <small>Foto dalam format jpg/jpeg/png dengan ukuran maks 300KB</small><br>
                            <?php echo $form->fileField($model,'PHOTO',array('class'=>'uniform-file')); ?>
                            <?php echo $form->error($model,'PHOTO'); ?>
                        </div>
                    </div>
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
