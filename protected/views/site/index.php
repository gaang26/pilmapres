<?php
/* @var $this SiteController */

$this->pageTitle='Beranda';
?>

<?php $this->renderPartial('home/slider'); ?>

<!-- <div class="row-fluid">
    <div class="span8 offset2 margin-top-20">
        <?php if(Jadwal::isPengumumanOpen()): ?>
            <div class="well text-center">
                <h4>PENGUMUMAN FINALIS MAWAPRES NASIONAL 2016</h4>
                <div class="">
                    Peserta yang lolos tahap selanjutnya dapat dilihat pada alamat dibawah ini.
                </div>
                <div class="margin-top-20">
                    <?php echo CHtml::link('LIHAT FINALIS MAWAPRES NASIONAL 2016',array('finalis/index'),array(
                        'class'=>'btn red btn-lg'
                    )); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div> -->

<?php /*$this->renderPartial('home/finalis',array(
    'sarjana'=>Peserta::getFinalis(Peserta::SARJANA),
    'diploma'=>Peserta::getFinalis(Peserta::DIPLOMA)
));*/ ?>

<?php $this->renderPartial('home/juara',array(
    'sarjana'=>Peserta::getJuara(Peserta::SARJANA),
    'diploma'=>Peserta::getJuara(Peserta::DIPLOMA)
)); ?>

<?php $this->renderPartial('home/tema'); ?>

<?php //$this->renderPartial('home/login'); ?>

<?php //$this->renderPartial('home/stats'); ?>

<?php $this->renderPartial('pages/jadwal'); ?>
