<?php
if(!$model->isVideoEmpty()){
    echo '<h4>Video Ringkasan Karya Tulis Dalam Bahasa Inggris</h4>';
    echo $model->getEmbedLink($model->VIDEO_RINGKASAN,'100%','315');
}else{
    echo MyFormatter::alertSuccess('Belum ada video');
}
?>
