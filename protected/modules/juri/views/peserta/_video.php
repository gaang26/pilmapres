<?php
if(!$model->isVideoEmpty()){
    echo '<h4>Video Ringkasan Karya Tulis Dalam Bahasa Inggris</h4>';
    echo $model->getEmbedLink($model->VIDEO_RINGKASAN,'100%','515');
}else{
    echo MyFormatter::alertSuccess('Belum ada video');
}
?>

<!-- BEGIN: -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-comments-o font-blue-sharp"></i>
            <span class="uppercase font-blue-sharp">Komentar Juri Video Ringkasan</span>
        </div>
    </div>
    <div class="portlet-body">
        <?php $this->renderPartial('komentar/_form',array(
            'komentar'=>$komentar,
            'model'=>$model,
            'bidang'=>Komentar::VIDEO,
        )); ?>

        <hr>

        <div class="">
            <?php if(count($model->getKomentar(Komentar::VIDEO))>0): ?>
                <?php foreach($model->getKomentar(Komentar::VIDEO) as $data): ?>
                    <blockquote>
                        <h4 style="margin-top:0px;padding-top:0px;"><?php echo $data->KOMENTAR; ?></h4>
                        <small>Oleh <?php echo $data->Juri->NAMA; ?> pada <?php echo $data->getTanggalInputFormatted(); ?></small>
                    </blockquote>
                    <hr>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- END: -->
