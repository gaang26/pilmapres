<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'htmlOptions'=>array(
        'class'=>'table table-bordered table-striped'
    ),
    'itemTemplate'=>'<tr><th width="180px">{label}</th><td>{value}</td></tr>',
    'attributes'=>array(
        'JUDUL_KTI',
        'ID_TOPIK',
        'BIDANG',
        array(
            'label'=>'Karya Tulis Ilmiah',
            'type'=>'raw',
            'value'=>'<a class="btn red" href="javascript:void(0)" onclick="readFile()">BACA FILE KARYA TULIS ILMIAH</a> '.CHtml::link('UNDUH FILE KTI',array('peserta/downloadportofolio','id'=>$model->ID_PESERTA),array('class'=>'btn btn-success')).' <br><small>*Jika file tidak terbaca, silahkan tekan tombol "BACA FILE KARYA TULIS ILMIAH" berulang kali sampai file dapat terbaca.</small><br> <a href="http://mawapres.dikti.go.id/file/portofolio/'.str_replace('+','%20',urlencode($model->FILE_KTI)).'" id="embedURL"></a>',
            'visible'=>!$model->isKaryaTulisEmpty(),
        ),
        array(
            'label'=>'Ringkasan KTI',
            'type'=>'raw',
            'value'=>$model->RINGKASAN,
        ),
    ),
)); ?>
