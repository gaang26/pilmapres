<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->renderPartial('home/slider'); ?>

<div class="row-fluid">
    <div class="span8 offset2 margin-top-20">
        <div class="alert alert-error text-center">
            <h4>PENDAFTARAN PESERTA TELAH DITUTUP.</h4>
        </div>
    </div>
</div>


<?php $this->renderPartial('home/tema'); ?>

<?php $this->renderPartial('home/login'); ?>

<?php $this->renderPartial('home/stats'); ?>

<?php $this->renderPartial('pages/jadwal'); ?>
