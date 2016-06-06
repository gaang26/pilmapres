<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->renderPartial('home/slider'); ?>

<div class="row-fluid">
    <div class="span8 offset2">
        <div class="alert alert-error">
            <h4>PERHATIAN!</h4>
            <p>
                Bagi peserta yang belum melengkapi berkas, diberikan kesempatan untuk melengkapi berkas paling lambat tanggal 7 Juni 2016 Pukul 24:00 WIB.
            </p>
            <p>
                Jika Anda mengalami kendala teknis silahkan hubungi: <b>mawapres.dikti@gmail.com</b>
            </p>
        </div>
    </div>
</div>


<?php $this->renderPartial('home/tema'); ?>

<?php $this->renderPartial('home/login'); ?>

<?php $this->renderPartial('home/stats'); ?>

<?php $this->renderPartial('pages/jadwal'); ?>
