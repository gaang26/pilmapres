<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

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

<div class="row-fluid margin-top-20">
	<div class="span6 offset3 text-center">
		<h4>LOGIN PESERTA/PTN/PTS/KOPERTIS</h4>
		<p>
			Silahkan login dengan memilih menu-menu berikut ini
		</p>
	</div>
</div>

<div class="row-fluid margin-top-20">
	<div class="span2 offset3">
		<a href="<?php echo Yii::app()->createUrl('/peserta/default/index')?>">
			<div class="step blue">
				<div class="step-number">
					<i class="icon-user"></i>
				</div>
				<div class="step-title">
					PESERTA
				</div>
				<div class="step-content">
					Login peserta mawapres
				</div>
			</div>
		</a>
	</div>
	<div class="span2">
		<a href="<?php echo Yii::app()->createUrl('/pt/default/index')?>">
			<div class="step blue">
				<div class="step-number">
					<i class="icon-user"></i>
				</div>
				<div class="step-title">
					PTN/PTS
				</div>
				<div class="step-content">
					Login pengelola perguruan tinggi negeri/swasta
				</div>

			</div>
		</a>

	</div>
	<div class="span2">
		<a href="<?php echo Yii::app()->createUrl('/kopertis/default/index')?>">
			<div class="step blue">
				<div class="step-number">
					<i class="icon-user"></i>
				</div>
				<div class="step-title">
					KOPERTIS
				</div>
				<div class="step-content">
					Login pengelola kopertis wilayah
				</div>
			</div>
		</a>
	</div>
</div>


<style media="screen">
a:hover{
	text-decoration: none !important;
}
</style>

<?php $this->renderPartial('pages/jadwal'); ?>
