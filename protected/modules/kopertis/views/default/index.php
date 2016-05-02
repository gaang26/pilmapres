<?php
/* @var $this DefaultController */

$this->pageTitle = 'Beranda Kopertis ';
// $this->breadcrumbs=array(
// 	$this->module->id,
// );
?>

<div class="row-fluid">
	<div class="span8 offset2">
		<div class="alert alert-info">
			<h4>Anda dapat mendaftarkan sebanyak <?php echo Yii::app()->user->getState('kuota'); ?> mahasiswa berprestasi tingkat SARJANA</h4>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span8 offset2">
		<?php for ($i=1; $i <= Yii::app()->user->getState('kuota'); $i++): ?>
			<div class="well well-smoke bordered-dashed-1 text-center">
				<div class="row-fluid">
					<div class="span4">
						<div class="v-card text-center">
							<div class="image-container">
								<img src="<?php echo Yii::app()->request->baseUrl?>/images/profilethumb.png" alt="" />
							</div>
						</div>
					</div>
					<div class="span8">
						<?php echo CHtml::link('<i class="icon-plus"></i> DAFTARKAN',array('mahasiswa/daftar','jenjang'=>Peserta::SARJANA),array(
							'class'=>'btn btn-large blue btn-block'
						)); ?>
					</div>
				</div>
			</div>
		<?php endfor; ?>

	</div>
</div>
