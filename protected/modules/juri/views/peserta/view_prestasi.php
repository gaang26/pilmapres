<?php
$this->pageTitle = 'Detil Prestasi/Kemampuan Unggulan';
$this->breadcrumbs = array(
    'Detil Peserta'=>array('peserta/view','id'=>$model->ID_PESERTA,'#'=>'prestasi'),
    $this->pageTitle
);
?>
<div class="row">
    <div class="col-md-12">
        <?php echo Yii::app()->user->getFlash('info'); ?>
        <div class="">

            <!-- BEGIN: -->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-trophy font-blue-sharp"></i>
                        <span class="uppercase bold font-blue-sharp">Detil Prestasi</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped">
                        <tr>
                            <th width="180px">Nama Prestasi</th>
                            <td><?php echo $model->NAMA_PRESTASI; ?></td>
                        </tr>

                        <tr>
                            <th>Tahun Perolehan</th>
                            <td><?php echo $model->TAHUN; ?></td>
                        </tr>

                        <tr>
                            <th>Pencapaian</th>
                            <td><?php echo $model->PENCAPAIAN; ?></td>
                        </tr>

                        <tr>
                            <th>Lembaga Pemberi/Event</th>
                            <td><?php echo $model->LEMBAGA; ?></td>
                        </tr>

                        <tr>
                            <th>Individu/Kelompok</th>
                            <td><?php echo $model->getLabelJenis(); ?></td>
                        </tr>

                        <tr>
                            <th>Tingkat</th>
                            <td><?php echo $model->getLabelTingkat(); ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan Tambahan</th>
                            <td><?php echo $model->KETERANGAN; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- END: -->

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-center">
        <?php echo $model->getSertifikat(); ?>
    </div>
</div>

<?php echo CHtml::link('<i class="icon-arrow-left"></i> Kembali',array('peserta/view','id'=>$model->ID_PESERTA,'#'=>'prestasi'),array(
    'class'=>'btn default'
)); ?>
