<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'htmlOptions'=>array(
        'class'=>'table table-bordered table-striped'
    ),
    'itemTemplate'=>'<tr><th width="180px">{label}</th><td>{value}</td></tr>',
    'attributes'=>array(
        'JUDUL_KTI',
        array(
            'label'=>'Topik Karya Tulis',
            'type'=>'raw',
            'value'=>($model->Topik!==null)?$model->Topik->JUDUL:''
        ),
        'BIDANG',
        // array(
        //     'label'=>'Karya Tulis Ilmiah',
        //     'type'=>'raw',
        //     'value'=>'<a class="btn red" href="javascript:void(0)" onclick="readFile()">BACA FILE KARYA TULIS ILMIAH</a> '.CHtml::link('UNDUH FILE KTI',array('mahasiswa/unduhkti','id'=>$model->ID_PESERTA),array('class'=>'btn btn-success')).' <br><small>*Jika file tidak terbaca, silahkan tekan tombol "BACA FILE KARYA TULIS ILMIAH" berulang kali sampai file dapat terbaca.</small><br> <a href="http://mawapres.dikti.go.id/file/portofolio/'.str_replace('+','%20',urlencode($model->FILE_KTI)).'" id="embedURL"></a>',
        //     'visible'=>!$model->isKaryaTulisEmpty(),
        // ),
    ),
)); ?>

<div class="well well-smoke">
    <h4>File Karya Tulis Ilmiah</h4>
    <a class="btn blue" href="javascript:void(0)" onclick="readFile()"><i class="fa fa-eye"></i> BACA FILE KARYA TULIS ILMIAH</a>
    <?php echo CHtml::link('<i class="fa fa-download"></i> UNDUH FILE KTI',array('peserta/unduhkti','id'=>$model->ID_PESERTA),array('class'=>'btn btn-success')) ?>
    <br><small>*Jika file tidak terbaca, silahkan tekan tombol "BACA FILE KARYA TULIS ILMIAH" berulang kali sampai file dapat terbaca.</small><br> <a href="http://mawapres.dikti.go.id/file/kti/<?php echo str_replace('+','%20',urlencode($model->FILE_KTI)); ?>" id="embedURL"></a>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'htmlOptions'=>array(
        'class'=>'table table-bordered table-striped'
    ),
    'itemTemplate'=>'<tr><th width="180px">{label}</th><td>{value}</td></tr>',
    'attributes'=>array(
        array(
            'label'=>'Ringkasan KTI',
            'type'=>'raw',
            'value'=>$model->RINGKASAN,
        ),
    ),
)); ?>


<script type="text/javascript">
function readFile(){
    var screenResolution = $(window).height();
    $('#embedURL-gdocsviewer').remove();
    //$('#embedURL').gdocsViewer({width:'100%',height:screenResolution});
    $('#embedURL').gdocsViewer({width:780,height:screenResolution});
}
</script>
