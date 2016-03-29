<?php
/* @var $this DefaultController */

$this->pageTitle = 'Daftar Akun Perguruan Tinggi';
$this->breadcrumbs=array(
	$this->pageTitle,
);
?>


<div class="row-fluid">
    <div class="span8 offset2">
        <div class="well well-smoke bordered-dashed-1">
            <h4>Form Daftar Akun Perguruan Tinggi</h4>

            <blockquote>Form ini untuk pendaftaran perguruan tinggi, bukan untuk peserta mawapres
            </blockquote>
            <?php $this->renderPartial('_form',array('model'=>$model)); ?>
        </div>
    </div>
</div>
