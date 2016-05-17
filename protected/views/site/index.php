<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->renderPartial('home/slider'); ?>

<div class="row-fluid margin-top-20">
	<div class="span6 offset3 text-center">
		<h4>TEMA PEMILIHAN MAHASISWA BERPRESTASI TINGKAT NASIONAL TAHUN 2016</h4>
		<p style="font-size:1.1em; font-weight:bold;">
			“Iptek dan Inovasi untuk Daya Saing Bangsa”
		</p>
	</div>
</div>

<div class="row-fluid margin-top-20">
    <div class="span4 offset2">
        <div class="well text-center bordered-radius-1">
            <h4>PEDOMAN MAWAPRES SARJANA</h4>
            <p>
                Pedoman mawapres 2016 jenjang sarjana dapat diunduh melalui tautan dibawah ini
            </p>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/file/pendukung/2016/PEDOMAN_MAWAPRES_SARJANA_2016.pdf" target="_blank" class="btn red btn-block"><i class="icon-download-alt"></i> UNDUH PEDOMAN SARJANA</a>
        </div>
    </div>
    <div class="span4">
        <div class="well text-center bordered-radius-1">
            <h4>PEDOMAN MAWAPRES DIPLOMA</h4>
            <p>
                Pedoman mawapres 2016 jenjang diploma dapat diunduh melalui tautan dibawah ini
            </p>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/file/pendukung/2016/PEDOMAN_MAWAPRES_DIPLOMA_2016.pdf" target="_blank" class="btn red btn-block"><i class="icon-download-alt"></i> UNDUH PEDOMAN DIPLOMA</a>
        </div>
    </div>
</div>

<?php //$this->renderPartial('home/slider');?>

<?php //$this->renderPartial('home/login'); ?>

<?php $this->renderPartial('pages/jadwal'); ?>
