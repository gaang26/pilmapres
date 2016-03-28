<?php
/* @var $this DefaultController */

$this->pageTitle = 'Beranda Peserta';
$this->breadcrumbs=array(
	$this->pageTitle
);
?>

<?php $this->renderPartial('_step'); ?>

<div class="row-fluid">
	<div class="span8 offset2">
		<blockquote class="note note-info">Berkas pendaftaran yang Anda kirimkan akan dinilai oleh tim juri pada saat penilaian tahap awal (Desk Evaluation).<br>
			Pengumuman peserta yang lolos untuk penilaian tahap akhir (Final) akan diumumkan pada website ini dan akan di emailkan ke masing-masing peserta yang lolos pada tanggal yang telah ditentukan (Lihat jadwal kegiatan).
		</blockquote>
		<?php
		if($peserta->isComplete()){
			?>
			<!-- <blockquote class="note note-info">Semua berkas pendaftaran telah lengkap.<br>
				Berkas yang Anda kirimkan akan dinilai oleh tim juri.
			</blockquote> -->
			<?php
		}
		?>
	</div>
</div>

<?php $this->renderPartial('../../../../views/site/pages/jadwal'); ?>
