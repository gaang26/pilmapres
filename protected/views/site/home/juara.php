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
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#sarjana" data-toggle="tab">SARJANA</a></li>
                    <li class=""><a href="#diploma" data-toggle="tab">DIPLOMA</a></li>
                </ul>
                <div class="tab-content" style="min-height:300px">
                    <div class="tab-pane active" id="sarjana">
                        <div class="text-center">
                            <h4>JUARA SARJANA</h4>
                            <p>
                                Juara mawapres nasional tahun <?php echo Yii::app()->params['tahun'] ?> jenjang sarjana
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
                                                    <?php echo CHtml::link('Lihat <i class="icon-arrow-right"></i>',array('finalis/view','id'=>$data->ID_PESERTA),array(
                                                        'class'=>'btn mini blue'
                                                    )); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane" id="diploma">
                        <div class="text-center">
                            <h4>JUARA DIPLOMA</h4>
                            <p>
                                Juara mawapres nasional tahun <?php echo Yii::app()->params['tahun'] ?> jenjang diploma
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
                                                    <?php echo CHtml::link('Lihat <i class="icon-arrow-right"></i>',array('finalis/view','id'=>$data->ID_PESERTA),array(
                                                        'class'=>'btn mini blue'
                                                    )); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
        <?php endif; ?>

    </div>
</div>
