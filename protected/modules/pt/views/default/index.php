<?php
/* @var $this DefaultController */

$this->pageTitle = 'Beranda Perguruan Tinggi';
// $this->breadcrumbs=array(
// 	$this->pageTitle,
// );
?>


<div class="row-fluid">
	<div class="span8 offset2">
		<?php echo Yii::app()->user->getFlash('info'); ?>
		<div class="alert alert-info">
			<?php
			if(WebUser::isPTN()){
				echo 'Anda bisa mendaftarkan 2 mahasiswa berprestasi dari perguruan tinggi Anda. <br>Terdiri dari 1 mahasiswa dari jenjang SARJANA, dan 1 mahasiswa dari jenjang DIPLOMA.';
			}else{
				echo 'Anda bisa mendaftarkan 1 mahasiswa berprestasi dari jenjang DIPLOMA';
			}
			?>
		</div>
	</div>
</div>

<?php
$user = Yii::app()->user->getState('id_user');
$role_user = Yii::app()->user->getState('role');

$peserta_sarjana = Peserta::getPeserta($user,$role_user,Peserta::SARJANA);
$peserta_diploma = Peserta::getPeserta($user,$role_user,Peserta::DIPLOMA);
?>

<div class="row-fluid">
	<?php if(WebUser::isPTN()){?>
		<?php if($peserta_sarjana!==null){ ?>
			<div class="span4 offset2">
				<div class="well well-smoke bordered-dashed-1 text-center">
					<div class="v-card text-center">
						<div class="image-container">
							<?php echo $peserta_sarjana->getPhoto(); ?>
						</div>

						<div class="profile-container">
							<p class="nama">
								<?php echo $peserta_sarjana->NAMA; ?>
							</p>
							<p class="pin">
								<?php echo 'PIN: '.$peserta_sarjana->PIN; ?>
							</p>
							<p class="jurusan">
								<?php echo $peserta_sarjana->JENJANG; ?> - <?php echo $peserta_sarjana->Prodi->NAMA_PRODI; ?>
							</p>

							<p class="nama-pt">
								<?php echo Yii::app()->user->getState('nama_pt'); ?>
							</p>
						</div>
					</div>
					<?php echo CHtml::link('SELENGKAPNYA',array('mahasiswa/view','id'=>$peserta_sarjana->ID_PESERTA),array(
						'class'=>'btn btn-large blue btn-block'
					)); ?>
				</div>
			</div>
		<?php }else{ ?>
			<div class="span4 offset2">
				<div class="well well-smoke bordered-dashed-1 text-center">
					<div class="v-card text-center">
						<div class="image-container">
							<img src="<?php echo Yii::app()->request->baseUrl?>/images/profilethumb.png" alt="" />
						</div>
					</div>
					<?php echo CHtml::link('<i class="icon-plus"></i> DAFTARKAN MAHASISWA SARJANA',array('mahasiswa/daftar','jenjang'=>Peserta::SARJANA),array(
						'class'=>'btn blue btn-block'
					)); ?>
				</div>
			</div>
		<?php } ?>
		<?php if($peserta_diploma!==null){ ?>
			<div class="span4">
				<div class="well well-smoke bordered-dashed-1 text-center">
					<div class="v-card text-center">
						<div class="image-container">
							<?php echo $peserta_diploma->getPhoto(); ?>
						</div>

						<div class="profile-container">
							<p class="nama">
								<?php echo $peserta_diploma->NAMA; ?>
							</p>
							<p class="pin">
								<?php echo 'PIN: '.$peserta_diploma->PIN; ?>
							</p>
							<p class="jurusan">
								<?php echo $peserta_diploma->JENJANG; ?> - <?php echo $peserta_diploma->Prodi->NAMA_PRODI; ?>
							</p>
							<p class="nama-pt">
								<?php echo Yii::app()->user->getState('nama_pt'); ?>
							</p>
						</div>
					</div>
					<?php echo CHtml::link('SELENGKAPNYA',array('mahasiswa/view','id'=>$peserta_diploma->ID_PESERTA),array(
						'class'=>'btn btn-large blue btn-block'
					)); ?>
				</div>
			</div>
		<?php }else{ ?>
			<div class="span4">
				<div class="well well-smoke bordered-dashed-1 text-center">
					<div class="v-card text-center">
						<div class="image-container">
							<img src="<?php echo Yii::app()->request->baseUrl?>/images/profilethumb.png" alt="" />
						</div>
					</div>
					<?php echo CHtml::link('<i class="icon-plus"></i> DAFTARKAN MAHASISWA DIPLOMA',array('mahasiswa/daftar','jenjang'=>Peserta::DIPLOMA),array(
						'class'=>'btn blue btn-block'
					)); ?>
				</div>
			</div>
		<?php } ?>
	<?php }else{ ?>
		<div class="span4 offset4">
			<div class="well well-smoke bordered-dashed-1 text-center">
				<?php echo CHtml::link('<i class="icon-plus"></i> DAFTARKAN MAHASISWA DIPLOMA',array('mahasiswa/daftar','jenjang'=>Peserta::DIPLOMA),array(
					'class'=>'btn blue'
				)); ?>
			</div>
		</div>
	<?php } ?>
</div>
