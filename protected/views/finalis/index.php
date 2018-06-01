<?php
/* @var $this SiteController */

$this->pageTitle='Finalis Mawapres Tahun '.Yii::app()->params['tahun'];
?>

<style media="screen">
.user-pic{
    display: inline-block;
    vertical-align: middle;
    height: 30px;
    border-radius: 100px !important;
}
</style>

<div class="row-fluid">
    <div class="span8 offset2">
        <?php if(Jadwal::isPengumumanOpen()): ?>
            <div class="well bordered-dashed-1 text-left">
                <h4>PENGUMUMAN FINALIS MAWAPRES NASIONAL TAHUN <?php echo Yii::app()->params['tahun'];?></h4>
                <p>
                    Sebagai tahapan pemilihan Mahasiswa Berprestasi Tahun 2018, Tim Juri telah melaksanakan
                    penilaian tahap awal pada tanggal 24-25 Mei 2018 dan telah menghasilkan finalis yang akan
                    diundang untuk mengikuti penilaian tahap akhir sebanyak 26 mahasiswa yang terdiri atas 17
                    (tujuh belas) mahasiswa Program Sarjana dan 9 (sembilan) mahasiswa dari Program Diploma
                    sebagaimana terlampir.
                <p>
                    Kepada perguruan tinggi dan peserta yang telah ditetapkan sebagai Finalis Pemilihan
                    Mahasiswa Berprestasi Tingkat Nasional Tahun 2018 kami ucapkan selamat, dan kepada
                    yang belum berhasil hal ini merupakan pengalaman yang sangat berharga sebagai
                    pembelajaran mengukir prestasi mahasiswa di masa yang akan datang. Kepada Pimpinan
                    Perguruan Tinggi yang tidak mengirimkan peserta, kami mohon memberi informasi tentang
                    alasan tidak mengirim peserta ke tingkat nasional untuk kami jadikan evaluasi program.
                </p>
                <p>
                    Kami mohon agar Saudara menyampaikan kepada para Finalis Pemilihan Mahasiswa
                    Berprestasi Tingkat Nasional Tahun 2018 agar segera mempersiapkan diri guna mengikuti
                    pemilihan Mahasiswa Berprestasi Tingkat Nasional Tahap Akhir yang akan diselenggarakan
                    tanggal 09-12 Juli 2018 di Solo. Undangan akan disampaikan dalam waktu yang tidak terlalu
                    lama
                </p>
                <hr>
                <p class="text-center">
                    Klik tautan berikut ini untuk unduh Surat Resmi Pengumuman Finalis Mahasiswa Berprestasi
                    Tahun <?php echo Yii::app()->params['tahun'];?>.
                </p>
                <p class="text-center">
                    <?php echo CHtml::link('Unduh Surat Resmi Pengumuman Finalis Mawapres Nasional '.Yii::app()->params['tahun'],
                        'http://belmawa.ristekdikti.go.id/wp-content/uploads/2018/05/Surat-Pengumuman-Finalis-Pilmapres-2018-1-2.pdf',array(
                        'class'=>'btn red large',
                        'target'=>'_blank'
                    )); ?>

                    <?php /*echo CHtml::link('Unduh Undangan Resmi Finalis '.Yii::app()->params['tahun'],'https://drive.google.com/file/d/0B-6rFy0S6Z9jNFAyYzNQSzkyX28/view?usp=sharing',array(
                        'class'=>'btn red btn-lg'
                    )); */?>
                </p>
                <hr>
                <!--
                <p class="text-center">Bagi peserta yang lolos tahap selanjutnya, silahkan melakukan konfirmasi kehadiran dan mengisi kelengkapan final pada tautan dibawah ini</p>
                -->
                <p class="text-center">
                    <?php /*echo CHtml::link('KONFIRMASI KEHADIRAN FINALIS',array('finalis/konfirmasi'),array(
                        'class'=>'btn red btn-lg'
                    )); */?>
                </p>
                <!--<p class="bold text-center text-error">
    				Pengisian konfirmasi kehadiran paling lambat tanggal 13 Juni 2017 Pukul 24:00 WIB
    			</p>-->
            </div>

            <?php if(Jadwal::isMasukanPublicOpen()): ?>
                <hr>
                <div class="well text-left">
                    <h4>Masukan Publik</h4>
                    <p>
                        Dalam rangka mendorong peningkatan budaya akademik khususnya kompetisi di kalangan mahasiswa,
                        salah satu program yang dilaksanakan oleh Ditjen Pembelajaran dan Kemahasiswaan adalah Pemilihan Mahasiswa Berprestasi.
                        Salah satu kriteria pemilihan adalah kompetensi mahasiswa dalam menulis artikel ilmiah yang salah satu syaratnya
                        adalah "merupakan karya sendiri dan tidak mengandung plagiasi".
                    </p>
                    <p>
                        Sebagai upaya untuk memenuhi kriteria tersebut panitia pemilihan, selain melakukan "tracker" terkait plagiarisme,
                        juga melakukan uji publik untuk mendapatkan masukan dan atau laporan dari masyarakat.
                        Berikut adalah 26 karya tulis para finalis untuk mendapatkan masukan atau laporan.
                    </p>
                
                    <p>
                        Terima kasih.
                    </p>
                    <p style="color:#999999;"><small>
                        Untuk memberi masukan publik, silahkan memilih menu "Review KTI" pada kolom sebelah kanan pada daftar finalis
                            dibawah. Kemudian Anda dapat memberi masukan pada kolom komentar pada bagian bawah laman.
                    </small></p>
                </div>
            <?php endif; ?>

            <hr>
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#sarjana" data-toggle="tab">SARJANA</a></li>
                    <li class=""><a href="#diploma" data-toggle="tab">DIPLOMA</a></li>
                </ul>
                <div class="tab-content" style="min-height:300px">
                    <div class="tab-pane active" id="sarjana">
                        <div class="text-center">
                            <h4>FINALIS SARJANA</h4>
                            <p>
                                Beri masukan untuk finalis mawapres nasional tahun <?php echo Yii::app()->params['tahun'] ?> jenjang sarjana
                            </p>
                        </div>
                        <?php if(count($sarjana)>0): ?>
                            <div class="well bordered-dashed-1">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="uppercase">
                                            <th width="10px">
                                                No
                                            </th>
                                            <th colspan="2">
                                                Nama Peserta
                                            </th>
                                            <th>
                                                Asal Perguruan Tinggi
                                            </th>
                                            <th width="90px">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach ($sarjana as $data):?>
                                            <tr>
                                                <td>
                                                    <?php echo $i++; ?>
                                                </td>
                                                <td style="width:30px;padding-right: 3px;">
                                                    <img class="user-pic" src="<?php echo $data->getPhotoSource()?>">
                                                </td>
                                                <td>
                                                    <?php echo $data->NAMA; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->PT->NAMA; ?>
                                                </td>
                                                <td>
                                                    <?php echo CHtml::link('Review KTI <i class="icon-arrow-right"></i>',array('finalis/view','id'=>$data->ID_PESERTA),array(
                                                        'class'=>'btn mini blue'
                                                    )); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info">
                                Belum ada finalis.
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane" id="diploma">
                        <div class="text-center">
                            <h4>FINALIS DIPLOMA</h4>
                            <p>
                                Beri masukan untuk finalis mawapres nasional tahun <?php echo Yii::app()->params['tahun'] ?> jenjang diploma
                            </p>
                        </div>
                        <?php if(count($diploma)>0): ?>
                            <div class="well bordered-dashed-1">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="uppercase">
                                            <th width="10px">
                                                No
                                            </th>
                                            <th colspan="2">
                                                Nama Peserta
                                            </th>
                                            <th>
                                                Asal Perguruan Tinggi
                                            </th>
                                            <th width="90px">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php foreach ($diploma as $data):?>
                                            <tr>
                                                <td>
                                                    <?php echo $i++; ?>
                                                </td>
                                                <td style="width:30px;padding-right: 3px;">
                                                    <img class="user-pic" src="<?php echo $data->getPhotoSource()?>">
                                                </td>
                                                <td>
                                                    <?php echo $data->NAMA; ?>
                                                </td>
                                                <td>
                                                    <?php echo $data->PT->NAMA; ?>
                                                </td>
                                                <td>
                                                    <?php echo CHtml::link('Review KTI <i class="icon-arrow-right"></i>',array('finalis/view','id'=>$data->ID_PESERTA),array(
                                                        'class'=>'btn mini blue'
                                                    )); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info">
                                Belum ada finalis.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-info">
                <h5>Peserta yang lolos tahap selanjutnya akan diumumkan pada tanggal 30 Juni 2016</h5>
            </div>
        <?php endif; ?>

    </div>
</div>
