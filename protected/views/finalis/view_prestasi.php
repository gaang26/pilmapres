<?php
$this->pageTitle = 'Detil Prestasi/Kemampuan Unggulan';
$this->breadcrumbs = array(
    'Finalis'=>array('finalis/index'),
    $model->Peserta->NAMA=>array('finalis/view','id'=>$model->ID_PESERTA),
    $this->pageTitle
);
?>
<div class="row-fluid">
    <div class="span8 offset2">
        <div class="well bordered-dashed-1 text-center">
            <?php echo CHtml::link('<i class="icon-arrow-left"></i> Kembali',array('finalis/view','id'=>$model->ID_PESERTA,'#'=>'prestasi'),array(
                'class'=>'btn'
            )); ?>
        </div>
        <?php echo Yii::app()->user->getFlash('info'); ?>
        <div class="">
            <table class="table table-striped table-dashed-border">
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
                <tr>
                    <th colspan="2">
                        Sertifikat
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo $model->getSertifikat(); ?>
                    </td>
                </tr>
            </table>
            <dl class="list-prestasi">

            </dl>
        </div>
    </div>
</div>
