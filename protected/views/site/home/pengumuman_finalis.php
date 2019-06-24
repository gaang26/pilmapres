<div class="row-fluid">
    <div class="span8 offset2 margin-top-20">
        <?php if(Jadwal::isPengumumanOpen()):?>
            <div class="well text-center">
                <h4>PENGUMUMAN FINALIS MAWAPRES NASIONAL <?php echo Yii::app()->params['tahun'];?></h4>
                <div class="">
                    Peserta yang lolos tahap selanjutnya dapat dilihat pada alamat dibawah ini.
                </div>
                <div class="margin-top-20">
                    <?php echo CHtml::link('LIHAT FINALIS MAWAPRES NASIONAL '.Yii::app()->params['tahun'],array('finalis/index'),array(
                        'class'=>'btn red btn-lg'
                    ));?>
                </div>
            </div>
        <?php endif;?>
    </div>
</div>