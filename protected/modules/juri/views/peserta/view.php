<?php
/* @var $this MahasiswaController */
/* @var $model Peserta */
$this->pageTitle = $model->NAMA;
$this->breadcrumbs=array(
	'Peserta'=>array('peserta/index'),
	$this->pageTitle
);
?>

<?php echo Yii::app()->user->getFlash('info'); ?>

<div class="row">

	<div class="col-md-12">

		<div class="tabbable">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active"><a href="#profil" data-toggle="tab"><i class="icon-user"></i> Profil</a></li>
				<li><a href="#karyatulis" data-toggle="tab"><i class="icon-docs"></i> Karya Tulis</a></li>
				<li><a href="#prestasi" data-toggle="tab"><i class="icon-trophy"></i> Prestasi</a></li>
				<li><a href="#video" data-toggle="tab"><i class="icon-film"></i> Video</a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="profil">
					<?php $this->renderPartial('_profil',array('model'=>$model)) ?>
				</div>
				<div class="tab-pane" id="karyatulis">
					<?php $this->renderPartial('_karya_tulis',array('model'=>$model,'komentar'=>$komentar)) ?>
				</div>
				<div class="tab-pane" id="prestasi">
					<?php $this->renderPartial('_prestasi',array('model'=>$model,'komentar'=>$komentar)) ?>
				</div>
				<div class="tab-pane" id="video">
					<?php $this->renderPartial('_video',array('model'=>$model,'komentar'=>$komentar)) ?>
				</div>
			</div>
		</div>

		<?php /*$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array(
				'class'=>'table table-striped table-bordered'
			),
			'attributes'=>array(
				'PT.NAMA',
				'ROLE',
				'PIN',
				'TAHUN',
				'NIM',
				'NAMA',
				'ID_PRODI',
				'JENJANG',
				'SEMESTER',
				'IPK',
				'EMAIL',
				'HP',
				'TEMPAT_LAHIR',
				'TANGGAL_LAHIR',
				'ALAMAT',
				'ID_KOTA',
				'WEBSITE',
				'PHOTO',
				'JUDUL_KTI',
				'ID_TOPIK',
				'BIDANG',
				'RINGKASAN',
				'VIDEO_RINGKASAN',
				'VIDEO_KESEHARIAN',
				'SURAT_PENGANTAR',
				'URL_FORLAP',
				'KTM',
				'ID_USER',
				'ROLE_USER',
				'TANGGAL_INPUT',
				'TANGGAL_UPDATE',
				'TAHAP_AWAL',
			),
		));*/ ?>
	</div>
</div>
