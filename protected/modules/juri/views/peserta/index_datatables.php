<?php
/* @var $this PesertaController */
/* @var $model Peserta */
$this->pageTitle = 'Peserta';
$this->breadcrumbs=array(
	$this->pageTitle
);
?>

<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-light green-haze" href="<?php echo Yii::app()->createUrl("/juri/peserta/sarjana")?>">
		<div class="visual">
			<i class="fa fa-graduation-cap fa-icon-medium"></i>
		</div>
		<div class="details">
			<div class="number">
                136
			</div>
			<div class="desc">
				Lihat Peserta Sarjana
			</div>
            <div class="desc">
				<?php echo Peserta::getJumlah(Peserta::SARJANA); ?> Total
            </div>
		</div>
		</a>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-light green-haze" href="<?php echo Yii::app()->createUrl("/juri/peserta/diploma")?>">
		<div class="visual">
			<i class="fa fa-graduation-cap fa-icon-medium"></i>
		</div>
		<div class="details">
			<div class="number">
                73
			</div>
			<div class="desc">
				Lihat Peserta Diploma
			</div>
            <div class="desc">
				<?php echo Peserta::getJumlah(Peserta::DIPLOMA); ?> Total
            </div>
		</div>
		</a>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<a class="dashboard-stat dashboard-stat-light green-haze" href="javascript:;">
		<div class="visual">
			<i class="fa fa-graduation-cap fa-icon-medium"></i>
		</div>
		<div class="details">
			<div class="number">
				209
			</div>
			<div class="desc">
				Lihat Semua Peserta
			</div>
            <div class="desc">
				<?php echo Peserta::getJumlah(); ?> Total
            </div>
		</div>
		</a>
	</div>
</div>

<!-- BEGIN: -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-graduation-cap font-blue-sharp"></i>
            <span class="uppercase bold font-blue-sharp">Semua Peserta Melengkapi Berkas</span>
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped" id="akun-grid">
            <thead>
                <tr>
                    <th>#</th>
                    <th>PIN</th>
                    <th>Nama Peserta</th>
                    <th>Asal Perguruan Tinggi</th>
					<th>Bidang</th>
                    <th>Jenjang</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($model)>0):?>
                    <?php $i=1; foreach ($model as $data): ?>
                        <?php if($data->isCompleteJuri()):?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data->PIN; ?></td>
                            <td><?php echo $data->NAMA; ?></td>
                            <td><?php echo $data->PT->NAMA; ?></td>
                            <td><?php echo $data->BIDANG; ?></td>
                            <td><?php echo $data->getProdiView(); ?></td>
                            <td><?php echo CHtml::link('<i class="fa fa-search"></i> Selengkapnya',array('peserta/view','id'=>$data->ID_PESERTA),array(
									'class'=>'btn btn-sm blue'
								)); ?></td>
                        </tr>
						<?php endif;?>
                    <?php endforeach;?>
                <?php endif;?>
                <?php /*$this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dataProvider,
                    'itemView'=>'_view',
                    'template'=>'{items}'
                ));*/ ?>
            </tbody>
        </table>
    </div>
</div>
<!-- END: -->

<script type="text/javascript">
$(document).ready(function(){
    $('#akun-grid').dataTable({
        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "Tidak ada peserta ditampilkan",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "Tidak ada peserta ditampilkan",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "lengthMenu": "Show _MENU_ entries",
            "search": "Cari Peserta:",
            "zeroRecords": "Peserta tidak ditemukan"
        },
        "lengthMenu": [
            [10, 20, 25, -1],
            [10, 20, 25, "All"] // change per page values here
        ],
        "pageLength": 15, // set the initial value,
        "columnDefs": [{  // set default column settings
            'orderable': false,
            'targets': [0,4,5,6]
        }, {
            "searchable": false,
            "targets": [0,6]
        }],
        "order": [
            [2, "asc"]
        ]
    });

	$('.input-small').attr('class','form-control input-inline');
})
</script>
