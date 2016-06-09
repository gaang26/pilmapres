<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'htmlOptions'=>array(
        'class'=>'table table-bordered table-striped'
    ),
    'itemTemplate'=>'<tr><th style="width:180px !important;">{label}</th><td>{value}</td></tr>',
    'attributes'=>array(
        array(
            'label'=>'Asal Perguruan Tinggi',
            'type'=>'raw',
            'value'=>$model->PT->NAMA
        ),
        //'NIM',
        'Prodi.NAMA_PRODI',
        'JENJANG',
        'SEMESTER',
        //'IPK',
        // array(
        //     'name'=>'URL_FORLAP',
        //     'type'=>'raw',
        //     'value'=>CHtml::link('LINK PROFIL FORLAP',$model->URL_FORLAP,array('target'=>'_blank'))
        // ),
        // array(
        //     'name'=>'KTM',
        //     'type'=>'raw',
        //     'value'=>CHtml::link('SCAN KTM','#',array('onclick'=>'showKTM()'))
        // ),
        // array(
        //     'name'=>'SURAT_PENGANTAR',
        //     'type'=>'raw',
        //     'value'=>CHtml::link('SCAN SURAT PENGANTAR','#',array('onclick'=>'showPengantar()'))
        // )
    ),
)); ?>


<div aria-hidden="false" aria-labelledby="file-preview-modal" role="dialog" tabindex="-1" class="modal hide" id="file-preview-modal" style="width:700px; margin-left:-350px">
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h3 id="modal-header"><span id="modalTitle">FILE SCAN</span></h3>
    </div>
    <div class="modal-body">
        <div id="modal-content">
            LOADING...
        </div>
    </div>
    <!-- <div class="modal-footer">
        <button data-dismiss="modal" class="btn mini">Tutup</button>
    </div> -->
</div><!--#myModal-->

<script type="text/javascript">
// $(document).ready(function(){
//     showModal();
// })
function showKTM(){
    var url = '<?php echo Yii::app()->createUrl("/pt/mahasiswa/ktm"); ?>';
    var id = '<?php echo $model->ID_PESERTA; ?>';
    $.ajax({
        url: url,
        data: 'id='+id,
        type: 'get',
        beforeSend:function(){
            showModal();
        },
        success: function(data){
            var result = $.parseJSON(data);
            $('#modal-content').html(result.html);
            $('#modalTitle').html(result.title);
        }
    });
}
function showPengantar(){
    var url = '<?php echo Yii::app()->createUrl("/pt/mahasiswa/pengantar"); ?>';
    var id = '<?php echo $model->ID_PESERTA; ?>';
    $.ajax({
        url: url,
        data: 'id='+id,
        type: 'get',
        beforeSend:function(){
            showModal();
        },
        success: function(data){
            var result = $.parseJSON(data);
            $('#modal-content').html(result.html);
            $('#modalTitle').html(result.title);
        }
    });
}
function showModal(){
    $('#file-preview-modal').modal('show');
}
</script>
