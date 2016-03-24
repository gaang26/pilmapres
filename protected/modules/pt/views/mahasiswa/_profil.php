<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'htmlOptions'=>array(
        'class'=>'table table-bordered table-striped'
    ),
    'itemTemplate'=>'<tr><th width="180px">{label}</th><td>{value}</td></tr>',
    'attributes'=>array(
        array(
            'label'=>'Asal Perguruan Tinggi',
            'type'=>'raw',
            'value'=>$model->PT->NAMA
        ),
        'NIM',
        'Prodi.NAMA_PRODI',
        'JENJANG',
        'SEMESTER',
        'IPK',
        'SURAT_PENGANTAR',
        'URL_FORLAP',
    ),
)); ?>


<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'htmlOptions'=>array(
        'class'=>'table table-bordered table-striped'
    ),
    'itemTemplate'=>'<tr><th width="180px">{label}</th><td>{value}</td></tr>',
    'attributes'=>array(
        'NAMA',
        array(
            'label'=>'Jenis Kelamin',
            'type'=>'raw',
            'value'=>$model->getJenisKelamin()
        ),
        'TEMPAT_LAHIR',
        array(
            'label'=>'Tanggal Lahir',
            'type'=>'raw',
            'value'=>$model->getTanggalLahir()
        ),
        'ALAMAT',
        array(
            'label'=>'Kota, Provinsi',
            'type'=>'raw',
            'value'=>$model->getWilayah()
        ),
        'EMAIL',
        'HP',
        'WEBSITE',
    ),
)); ?>

<h5>Sosial Media</h5>
<table class="table table-striped table-bordered">
    <tr>
        <th width="20px">
            No
        </th>
        <th width="145px">
            Sosial Media
        </th>
        <th>
            Akun
        </th>
    </tr>
    <?php
    $i=1;
    foreach ($model->SosialMedia as $sosmed) {
        echo '<tr>
            <td>'.$i++.'</td>
            <td>'.$sosmed->MasterSosialMedia->NAMA.'</td>
            <td>'.$sosmed->KETERANGAN.'</td>
        </tr>';
    }
    ?>
</table>
