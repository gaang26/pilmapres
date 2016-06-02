<?php
/* @var $this PesertaController */
/* @var $model Peserta */
$this->pageTitle = 'Peserta';
$this->breadcrumbs=array(
	$this->pageTitle
);
?>

<!-- BEGIN: -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-graduation-cap font-blue-sharp"></i>
            <span class="uppercase bold font-blue-sharp">Peserta Sarjana</span>
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
                    <th>Prodi</th>
                    <th>Kelengkapan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $this->widget('zii.widgets.CListView', array(
                    'dataProvider'=>$dataProvider,
                    'itemView'=>'_view',
                    'template'=>'{items}'
                )); ?>
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
            [10, 25, -1],
            [10, 25, "All"] // change per page values here
        ],
        "pageLength": 15, // set the initial value,
        "columnDefs": [{  // set default column settings
            'orderable': false,
            'targets': [0,4,5,6]
        }, {
            "searchable": false,
            "targets": [0,4,5,6]
        }],
        "order": [
            [2, "asc"]
        ]
    });
})
</script>
