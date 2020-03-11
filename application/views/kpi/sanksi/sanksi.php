<!--start main content-->
<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row mail-header">
                                <div class="col-md-6">
                                    <h2>Daftar Sanksi Key Performance Indicator</h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="pull-right tooltip-show">
                                        <button data-toggle="modal" data-target="#modal" data-menu="add" class="btn btn-primary rounded" style="width:100%"><i class="fa fa-plus"></i> Tambah</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <table id="datatable" class="table table-striped dt-responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th style=" width:10%; text-align:center">No.</th>
                                                        <th style=" width:30%; text-align:center">Nama</th>
                                                        <th style=" width:15%; text-align:center">Bobot</th>
                                                        <th style=" width:40%; text-align:center">Keterangan</th>
                                                        <th style=" width:15%; text-align:center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $no = 1;
                                                    foreach($data as $n){
                                                ?>
                                                    <tr>
                                                        <td style="text-align:center"><?= $no ?></td>
                                                        <td style="text-align:center"><?= $n{'sanksi_nama'}?></td>
                                                        <td style="text-align:center"><?= $n{'sanksi_nilai'}?></td>
                                                        <td><?= $n{'sanksi_keterangan'}?></td>
                                                        <td style="text-align:center">
                                                            <div class="ui-buttons">
                                                                <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $n{'id_master_sanksi'} ?>" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++;} ?>
                                                </tbody>
                                            </table>
                                        </div><!--panel body end-->
                                    </div>
                                </div>
                            </div><!--row end-->
                        </div>
                    </div>
                </div><!--col-md-12 end-->
            </div><!--row end-->
        </div><!--container end-->


    <div class="modal fade animated rubberBand" id="modal" role="dialog"  aria-labelledby="myModalLabel">
        <div class="modal-dialog modals-large" style="max-width:600px;" id="fetched-data-add">
            
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#datatable').dataTable();

        $('#modal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            var menu = $(e.relatedTarget).data('menu');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "get",
                url : '<?php echo base_url() ?>kpi/sanksi/action/modal',
                data :  {id : rowid, menu : menu},
                success : function(data){
                    $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    });


</script>