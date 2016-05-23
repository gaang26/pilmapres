<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <div class="well">
            <img src="<?php echo $model->getPhotoSource();?>" width="100%" alt="" />
        </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'htmlOptions'=>array(
                'class'=>'table table-bordered table-striped'
            ),
            'itemTemplate'=>'<tr><th style="width:180px !important;">{label}</th><td>{value}</td></tr>',
            'attributes'=>array(
                'PIN',
                'PASSWORD',
                array(
                    'label'=>'Asal Perguruan Tinggi',
                    'type'=>'raw',
                    'value'=>$model->PT->NAMA
                ),
                'NIM',
                'Prodi.NAMA_PRODI',
                'JENJANG',
                'SEMESTER',
                'IPK',
                array(
                    'name'=>'URL_FORLAP',
                    'type'=>'raw',
                    'value'=>CHtml::link('LINK PROFIL FORLAP',$model->URL_FORLAP,array('target'=>'_blank'))
                ),
                array(
                    'name'=>'KTM',
                    'type'=>'raw',
                    'value'=>CHtml::link('SCAN KTM','#',array('onclick'=>'showKTM()'))
                ),
                array(
                    'name'=>'SURAT_PENGANTAR',
                    'type'=>'raw',
                    'value'=>CHtml::link('SCAN SURAT PENGANTAR','#',array('onclick'=>'showPengantar()'))
                )
            ),
        )); ?>
    </div>
</div>



<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'htmlOptions'=>array(
        'class'=>'table table-bordered table-striped'
    ),
    'itemTemplate'=>'<tr><th width="180px">{label}</th><td>{value}</td></tr>',
    'attributes'=>array(
        'NAMA',
        array(
            'label'=>'Jenis Kelamin',
            'type'=>'raw',
            'value'=>$model->getJenisKelamin()
        ),
        'TEMPAT_LAHIR',
        array(
            'label'=>'Tanggal Lahir',
            'type'=>'raw',
            'value'=>$model->getTanggalLahir()
        ),
        'ALAMAT',
        array(
            'label'=>'Kota, Provinsi',
            'type'=>'raw',
            'value'=>$model->getWilayah()
        ),
        'EMAIL',
        'HP',
        'WEBSITE',
    ),
)); ?>

<h5>Sosial Media</h5>

<?php if(count($model->SosialMedia)>0): ?>
<table class="table table-striped table-bordered">
    <tr>
        <th width="20px">
            No
        </th>
        <th width="145px">
            Sosial Media
        </th>
        <th>
            Akun
        </th>
    </tr>
    <?php
    $i=1;
    foreach ($model->SosialMedia as $sosmed) {
        echo '<tr>
            <td>'.$i++.'</td>
            <td>'.$sosmed->MasterSosialMedia->NAMA.'</td>
            <td>'.$sosmed->KETERANGAN.'</td>
        </tr>';
    }
    ?>
</table>
<?php else: ?>
    <div class="alert alert-warning">
        Belum ada data
    </div>
<?php endif; ?>

<div class="modal bs-modal-lg" id="file-preview-modal" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title"><span id="modalTitle"></span></h4>
			</div>
			<div class="modal-body">
				<div id="modal-content" style="overflow:auto;">

				</div>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<script type="text/javascript">
// $(document).ready(function(){
//     showModal();
// })
function showKTM(){
    var url = '<?php echo Yii::app()->createUrl("/juri/peserta/ktm"); ?>';
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
    var url = '<?php echo Yii::app()->createUrl("/juri/peserta/pengantar"); ?>';
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
