<div class="row-fluid margin-top-20">
	<div class="span6 offset3 text-center">
		<h4>LOGIN PESERTA/PTN/PTS/KOPERTIS</h4>
		<p>
			Silahkan login dengan memilih menu-menu berikut ini
		</p>
	</div>
</div>

<div class="row-fluid margin-top-20">
	<div class="span2 offset3">
		<a href="<?php echo Yii::app()->createUrl('/peserta/default/index')?>">
			<div class="step blue">
				<div class="step-number">
					<i class="icon-user"></i>
				</div>
				<div class="step-title">
					PESERTA
				</div>
				<div class="step-content">
					Login peserta mawapres
				</div>
			</div>
		</a>
	</div>
	<div class="span2">
		<a href="<?php echo Yii::app()->createUrl('/pt/default/index')?>">
			<div class="step blue">
				<div class="step-number">
					<i class="icon-user"></i>
				</div>
				<div class="step-title">
					PTN/PTS
				</div>
				<div class="step-content">
					Login pengelola perguruan tinggi negeri/swasta
				</div>

			</div>
		</a>

	</div>
	<div class="span2">
		<a href="<?php echo Yii::app()->createUrl('/kopertis/default/index')?>">
			<div class="step blue">
				<div class="step-number">
					<i class="icon-user"></i>
				</div>
				<div class="step-title">
					KOPERTIS
				</div>
				<div class="step-content">
					Login pengelola kopertis wilayah
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
