<?php
$this->pageTitle = $model->NAMA;
$this->breadcrumbs=array(
	'Finalis'=>array('finalis/index'),
    $this->pageTitle
);
?>

<div class="row-fluid">
	<div class="span3">
		<div class="well well-smoke text-center">
			<div class="v-card text-center">
				<div class="image-container">
					<?php echo $model->getPhoto(); ?>
				</div>

				<div class="profile-container">
					<p class="nama">
						<?php echo $model->NAMA; ?>
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
	</div>

	<div class="span9">

		<div class="tabbable">
			<ul class="nav nav-tabs" id="myTab">
				<li><a href="#profil" data-toggle="tab"><i class="icon-user"></i> Profil</a></li>
				<li class="active"><a href="#karyatulis" data-toggle="tab"><i class="icon-file-text"></i> Karya Tulis</a></li>
				<li><a href="#prestasi" data-toggle="tab"><i class="icon-trophy"></i> Prestasi</a></li>
				<li><a href="#video" data-toggle="tab"><i class="icon-film"></i> Video</a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane" id="profil">
					<?php $this->renderPartial('_profil',array('model'=>$model)) ?>
				</div>
				<div class="tab-pane active" id="karyatulis">
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

<?php if(Jadwal::isMasukanPublicOpen()): ?>
    <div id="disqus_thread"></div>
    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://pilmapres2018.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<?php endif; ?>
