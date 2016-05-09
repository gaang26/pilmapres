<?php
/* @var $this DefaultController */

$this->pageTitle = 'Beranda Kopertis ';
// $this->breadcrumbs=array(
// 	$this->module->id,
// );
?>

<div class="row-fluid">
	<div class="span8 offset2">
		<h3>Selamat Datang, <?php echo Yii::app()->user->nama; ?></h3>
		<div class="alert alert-info">
			<h5>Anda dapat mendaftarkan sebanyak <?php echo Yii::app()->user->getState('kuota'); ?> mahasiswa berprestasi tingkat SARJANA. Kuota ini telah ditetapkan pada pedoman sarjana.</h5>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span8 offset2">
		<!-- begin: menampilkan daftar peserta -->
		<?php foreach ($peserta as $data): ?>
			<div class="well well-smoke">
				<div class="row-fluid">
					<div class="span4">
						<div class="v-card text-center">
							<div class="image-container">
								<img src="<?php echo Yii::app()->request->baseUrl?>/images/profilethumb.png" alt="" />
							</div>
						</div>
					</div>
					<div class="span8">
						<h4><?php echo $data->NAMA; ?></h4>
						<p>
							<?php echo 'PIN: '.$data->PIN; ?>
						</p>
						<p>
							<?php echo $data->JENJANG; ?> - <?php echo $data->Prodi->NAMA_PRODI; ?>
						</p>
						<p>
							<?php echo $data->PT->NAMA; ?>
						</p>
						<p>
							<?php echo CHtml::link('SELENGKAPNYA',array('mahasiswa/view','id'=>$data->ID_PESERTA),array(
								'class'=>'btn btn-large blue btn-block'
							)); ?>
						</p>
					</div>
				</div>

			</div>
		<?php endforeach; ?>
		<!-- end: menampilkan daftar peserta -->
		<!-- begin: menampilkan menu daftarkan peserta -->
		<?php for ($i=count($peserta)+1; $i <= $kopertis->KUOTA; $i++): ?>
			<div class="well well-smoke bordered-dashed-1 text-center">
				<?php echo CHtml::link('<i class="icon-plus"></i> DAFTARKAN PESERTA '.$i,array('mahasiswa/daftar','jenjang'=>Peserta::SARJANA),array(
					'class'=>'btn green btn-block'
				)); ?>
			</div>
		<?php endfor; ?>
		<!-- end: menampilkan menu daftarkan peserta -->
	</div>
</div>
