<?php
/* @var $this SiteController */

$this->pageTitle='Beranda';
?>

<?php //$this->renderPartial('home/slider'); ?>

<!--<div class="row-fluid">
    <div class="span8 offset2 margin-top-20 text-center" style="border-bottom:1px dashed #DDD; padding-bottom: 25px;">
        <h4 style="text-transform: uppercase">Streaming Penganugerahan Mahasiswa Berprestasi</h4>
        <div class="margin-top-10">
            <?php /*echo CHtml::link('BUKA LINK STREAMING','http://youtu.be/btabUUPfJpU',array('class'=>'btn btn-lg red','target'=>'_blank')); */?>
            <p class="margin-top-10" style="font-size: 0.9em">Streaming dimulai pada tanggal 13 Juli 2017 Pukul 19:00 WIB</p>
        </div>
    </div>
</div>-->


<?php /*$this->renderPartial('home/juara',array(
    'sarjana'=>Peserta::getJuara(Peserta::SARJANA),
    'diploma'=>Peserta::getJuara(Peserta::DIPLOMA)
));*/ ?>

<?php //$this->renderPartial('home/login'); ?>

<?php //$this->renderPartial('home/tema_2018'); ?>
<?php $this->renderPartial('home/tema_2019'); ?>
<?php echo (Jadwal::isPengumumanOpen())?$this->renderPartial('home/pengumuman_finalis'):''; ?>

<?php echo $this->renderPartial('home/finalis',array(
    'sarjana'=>Peserta::getPesertaFinalis(Peserta::SARJANA),
    'diploma'=>Peserta::getPesertaFinalis(Peserta::DIPLOMA)
)); ?>

<?php //$this->renderPartial('home/stats'); ?>

<?php //$this->renderPartial('pages/jadwal'); ?>
