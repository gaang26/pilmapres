<?php
/* @var $this MahasiswaController */
/* @var $model Peserta */
$this->pageTitle = 'Detil Peserta';
$this->breadcrumbs=array(
	//'Beranda'=>array('default/index'),
	$this->pageTitle
);
?>

<?php Yii::app()->user->getFlash('info'); ?>

<div class="row-fluid">
	<div class="span4">
		<div class="well well-smoke text-center">
			<div class="v-card text-center">
				<div class="image-container">
					<?php echo $model->getPhoto(); ?>
				</div>

				<div class="profile-container">
					<p class="nama">
						<?php echo $model->NAMA; ?>
					</p>
					<p class="pin">
						<?php echo 'PIN: '.$model->PIN; ?>
					</p>
					<p class="jurusan">
						<?php echo $model->JENJANG; ?> - <?php echo $model->Prodi->NAMA_PRODI; ?>
					</p>
					<p class="nama-pt">
						<?php echo Yii::app()->user->getState('nama_pt'); ?>
					</p>
				</div>
			</div>
		</div>

		<div class="alert alert-info">
			Berikan PIN dan PASSWORD dibawah ini kepada peserta yang Anda daftarkan untuk melengkapi berkas-berkas pendaftaran.
		</div>
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-dashed-border">
					<tr>
						<td width="50%" style="text-align:center;">
							<h5>PIN</h5>
						</td>
					</tr>
					<tr>
						<td style="text-align:center;">
							<h4><b class="text-error"><?php echo $model->PIN; ?></b></h4>
						</td>
					</tr>

					<tr>
						<td style="text-align:center;">
							<h5>PASSWORD</h5>
						</td>
					</tr>
					<tr>
						<td style="text-align:center;">
							<h4><b class="text-error"><?php echo $model->PASSWORD; ?></b></h4>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="span8">

		<div class="tabbable">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active"><a href="#profil" data-toggle="tab"><i class="icon-user"></i> Profil</a></li>
				<li><a href="#karyatulis" data-toggle="tab"><i class="icon-file-text"></i> Karya Tulis</a></li>
				<li><a href="#prestasi" data-toggle="tab"><i class="icon-trophy"></i> Prestasi</a></li>
				<li><a href="#video" data-toggle="tab"><i class="icon-film"></i> Video</a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="profil">
					<?php $this->renderPartial('_profil',array('model'=>$model)) ?>
				</div>
				<div class="tab-pane" id="karyatulis">
					<?php $this->renderPartial('_karya_tulis',array('model'=>$model)) ?>
				</div>
				<div class="tab-pane" id="prestasi">
					<?php $this->renderPartial('_prestasi',array('model'=>$model)) ?>
				</div>
				<div class="tab-pane" id="video">
					<?php $this->renderPartial('_video',array('model'=>$model)) ?>
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
