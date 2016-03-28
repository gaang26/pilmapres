<?php
$this->pageTitle = 'Prestasi atau Kemampuan Unggulan';
$this->breadcrumbs = array(
    'Beranda'=>array('default/index'),
    $this->pageTitle
);
?>
<?php $this->renderPartial('../default/_step'); ?>

<style media="screen">
dl.list-prestasi{
    margin: 0px;
}
dl.list-prestasi dt{
    background-color: #E5E5E5;
    padding: 5px;
}

dl.list-prestasi dd{
    margin: 0px 0px;
    padding: 5px;
    background-color: #F9F9F9;
    border-left: 2px solid #DDD;
    border-bottom: 1px solid #DDD;
}
</style>

<div class="row-fluid">
    <div class="span8 offset2">
        <?php echo Yii::app()->user->getFlash('info'); ?>
        <div class="well well-smoke bordered-dashed-1 text-center">
            <?php echo CHtml::link('<i class="icon-plus"></i> Tambah Prestasi / Kemampuan Unggulan',array('prestasi/tambah'),array(
                'class'=>'btn blue'
            )); ?>
            <?php echo CHtml::link('<i class="icon-ok"></i> Selesai',array('default/index'),array(
                'class'=>'btn green'
            )); ?>
        </div>

        <blockquote class="note note-info">Anda dapat memasukkan 10 prestasi/kemampuan unggulan. Urutkan sesuai dengan prioritas atau prestasi yang paling membanggakan (prioritas 1 - 10).<br>
        </blockquote>

        <table class="table table-bordered table-striped">
            <tr>
                <th width="5%">
                    Prioritas
                </th>
                <th>
                    Pencapaian
                </th>
                <th>
                    Prestasi
                </th>
                <th>
                    Tahun
                </th>
                <th>
                    Tingkat
                </th>
                <th width="100px">

                </th>
            </tr>
            <?php
            foreach ($model->getPrestasi() as $prestasi) {
            ?>
            <tr>
                <td>
                    <?php echo $prestasi->PRIORITAS; ?>
                </td>
                <td>
                    <?php echo $prestasi->PENCAPAIAN; ?>
                    <!-- <dl class="list-prestasi">
                        <dt>Nama Prestasi</dt>
                        <dd><?php echo $prestasi->NAMA_PRESTASI; ?></dd>

                        <dt>Tahun Perolehan</dt>
                        <dd><?php echo $prestasi->TAHUN; ?></dd>

                        <dt>Pencapaian</dt>
                        <dd><?php echo $prestasi->PENCAPAIAN; ?></dd>

                        <dt>Lembaga Pemberi/Event</dt>
                        <dd><?php echo $prestasi->LEMBAGA; ?></dd>

                        <dt>Individu/Kelompok</dt>
                        <dd><?php echo $prestasi->getLabelJenis(); ?></dd>

                        <dt>Tingkat</dt>
                        <dd><?php echo $prestasi->getLabelTingkat(); ?></dd>
                    </dl> -->
                </td>
                <td>
                    <?php echo $prestasi->NAMA_PRESTASI; ?>
                </td>
                <td>
                    <?php echo $prestasi->TAHUN; ?>
                </td>
                <td>
                    <?php echo $prestasi->getLabelTingkat(); ?>
                </td>
                <td style="text-align:right;">
                    <?php echo CHtml::link('<i class="icon-search"></i>',array('prestasi/view','id'=>$prestasi->ID_PRESTASI),array(
                        'class'=>'btn mini green'
                    )); ?>
                    <?php echo CHtml::link('<i class="icon-pencil"></i>',array('prestasi/update','id'=>$prestasi->ID_PRESTASI),array(
                        'class'=>'btn mini yellow',
                        'title'=>'Koreksi prestasi',
                    )); ?>
                    <?php echo CHtml::link('<i class="icon-trash"></i>','#',array(
                        'submit'=>array('prestasi/hapus','id'=>$prestasi->ID_PRESTASI),
                        'confirm'=>'Apakah Anda yakin ingin menghapus data ini?',
                        'class'=>'btn mini red',
                        'title'=>'Hapus prestasi',
                    )); ?>
                </td>
            </tr>
            <?php } ?>
        </table>
        <!-- <table class="table table-dashed-border table-striped">
            <tr>
                <th style="text-align:center">
                    Prioritas
                </th>
                <th style="text-align:center">
                    Nama Prestasi
                </th>
                <th style="text-align:center">
                    Pencapaian
                </th>
                <th style="text-align:center">
                    Tahun Perolehan
                </th>
                <th style="text-align:center">
                    Lembaga Pemberi/Event
                </th>
                <th style="text-align:center">
                    Individu/Kelompok
                </th>
                <th style="text-align:center">
                    Tingkat
                </th>
            </tr>
            <tr>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
            </tr>
        </table> -->
    </div>
</div>
