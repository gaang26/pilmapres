<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle='Konfirmasi Kehadiran';
$this->breadcrumbs=array(
	$this->pageTitle,
);
?>

<div class="row-fluid">
	<div class="span8 offset2">
		<div class="well text-center">
			<h4>Konfirmasi Kehadiran Finalis Mawapres Nasional 2016</h4>
			<p>
				Konfirmasi kehadiran finalis mawapres nasional 2016 dapat diisi melalui tautan dibawah ini.
			</p>
			<p>
				<a href="http://goo.gl/forms/1gYWlH1DqmXnU2bg1" target="_blank" class="btn red btn-lg">Konfirmasi Kehadiran Finalis</a>
			</p>
			<p class="bold text-error">
				Pengisian konfirmasi kehadiran paling lambat tanggal 18 Juli 2016 Pukul 24:00 WIB
			</p>
		</div>
		<?php echo CHtml::link('<i class="icon-arrow-left"></i> Kembali',array('finalis/index'),array('class'=>'btn yellow','style'=>'margin-top:-3px;')); ?>
	</div>
</div>
