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
        <th width="65px">

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
            <?php echo CHtml::link('<i class="fa fa-search"></i> Lihat',array('peserta/prestasi','id'=>$prestasi->ID_PRESTASI),array(
                'class'=>'btn btn-sm green'
            )); ?>
        </td>
    </tr>
    <?php } ?>
</table>
