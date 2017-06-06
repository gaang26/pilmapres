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
			<!--<h4>Konfirmasi Kehadiran Finalis Mawapres Nasional 2016</h4>
			<p>
				Pengisian konfirmasi kehadiran telah ditutup
			</p>-->
			 <p>
				Konfirmasi kehadiran finalis mawapres nasional <?php echo Yii::app()->params['tahun'];?> dapat diisi melalui tautan dibawah ini.
			</p>
			<p>
				<a href="https://goo.gl/forms/UqGpH702YK8oy2ap1" target="_blank" class="btn red btn-lg">Konfirmasi Kehadiran Finalis</a>
			</p>
			<p class="bold text-error">
				Pengisian konfirmasi kehadiran paling lambat tanggal 20 Juni 2017 Pukul 24:00 WIB
			</p>
		</div>
		<?php echo CHtml::link('<i class="icon-arrow-left"></i> Kembali',array('finalis/index'),array('class'=>'btn yellow','style'=>'margin-top:-3px;')); ?>
	</div>
</div>
