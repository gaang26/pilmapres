<div class="row-fluid">
    <div class="span8 offset2 text-center">
        <h4>PESERTA TERDAFTAR</h4>
        <p>
            Jumlah peserta yang telah terdaftar pada tahun <?php echo Yii::app()->params['tahun']; ?>
        </p>
        <div class="row-fluid">
            <div class="span4">
                <div class="well well-small text-center">
                    <h4><?php echo Peserta::getJumlah(Peserta::SARJANA); ?></h4>
                    <p>
                        Peserta Sarjana
                    </p>
                </div>
            </div>
            <div class="span4">
                <div class="well well-small text-center">
                    <h4><?php echo Peserta::getJumlah(Peserta::DIPLOMA); ?></h4>
                    <p>
                        Peserta Diploma
                    </p>
                </div>
            </div>
            <div class="span4">
                <div class="well well-small text-center">
                    <h4><?php echo Peserta::getJumlah(); ?></h4>
                    <p>
                        Total Peserta
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
