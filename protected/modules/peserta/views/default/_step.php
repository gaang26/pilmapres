<?php
$status_biodata = '';
$status_kti = '';
$status_prestasi = '';
$status_video = '';

$peserta = Peserta::model()->findByPk(Yii::app()->user->getState('id_peserta'));

if(!$peserta->isBiodataEmpty()){
    $status_biodata = 'done';
}else if($this->id=='biodata' && $this->action->id=='update'){
    $status_biodata = 'active';
}

if(!$peserta->isKaryaTulisEmpty()){
    $status_kti = 'done';
}else if($this->id=='kti' && $this->action->id=='update'){
    $status_kti = 'active';
}

if(!$peserta->isPrestasiEmpty()){
    $status_prestasi = 'done';
}else if($this->id=='prestasi' && $this->action->id=='tambah'){
    $status_prestasi = 'active';
}

if(!$peserta->isVideoEmpty()){
    $status_video = 'done';
}else if($this->id=='video' && $this->action->id=='update'){
    $status_video = 'active';
}
?>

<div class="row-fluid">
	<div class="span2 offset2">
		<a href="<?php echo Yii::app()->createUrl('peserta/biodata/index')?>">
			<div class="step <?php echo $status_biodata; ?>">
				<div class="step-number">
					1
				</div>
				<div class="step-title">
					BIODATA
				</div>
				<div class="step-content">
					Melengkapi biodata peserta
				</div>
			</div>
		</a>
	</div>
	<div class="span2">
		<a href="<?php echo Yii::app()->createUrl('peserta/kti/index')?>">
			<div class="step <?php echo $status_kti; ?>">
				<div class="step-number">
					2
				</div>
				<div class="step-title">
					KARYA TULIS
				</div>
				<div class="step-content">
					Melengkapi informasi karya tulis
				</div>

			</div>
		</a>

	</div>
	<div class="span2">
		<a href="<?php echo Yii::app()->createUrl('peserta/prestasi/index')?>">
			<div class="step <?php echo $status_prestasi; ?>">
				<div class="step-number">
					3
				</div>
				<div class="step-title">
					PRESTASI
				</div>
				<div class="step-content">
					Melengkapi prestasi unggulan
				</div>
			</div>
		</a>
	</div>
	<div class="span2">
		<a href="<?php echo Yii::app()->createUrl('peserta/video/index')?>">
			<div class="step <?php echo $status_video; ?>">
				<div class="step-number">
					4
				</div>
				<div class="step-title">
					VIDEO
				</div>
				<div class="step-content">
					Video kemampuan B.Inggris
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
