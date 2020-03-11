<!--start main content-->
<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row mail-header">
                                <div class="col-md-10">
                                    <h2>Daftar Corporate <?= $data == null ? '': ' Dari '.$data[0]{'kategori_nama'}.' ('.$data[0]{'jenus_nama'}.')' ?></h2>
                                </div>
                                <div class="col-md-2">
                                    <div class="pull-right tooltip-show">
                                        <button data-toggle="modal" data-nama="<?= $jenus ?>" data-target="#modal" data-kategori="<?= $id ?>" data-menu="add" class="btn btn-primary rounded" style="width:100%"><i class="fa fa-plus"></i> Tambah</button>
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
                                                        <th style=" width:35px; text-align:center">No.</th>
                                                        <!-- <th style="text-align:center">Kategori</th> -->
                                                        <th style="text-align:center">Corporate</th>
                                                        <!-- <th style=" width:200px; text-align:center"></th> -->
                                                        <th style=" width:150px; text-align:center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $no = 1;
                                                    foreach($data as $n){
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <!-- <td><?= $n{'kategori_nama'}?></td> -->
                                                        <td><?= $n{'corporate_nama'}?></td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <button class="btn btn-primary btn-circle btn-icon" data-nama="<?= $jenus ?>" data-kategori="<?= $id ?>" data-id="<?= $n{'id_corporate'} ?>" data-menu="edit" data-target="#modal" data-toggle="modal" title="Edit"><i class="fa fa-edit"></i></button>
                                                                <button class="btn btn-primary btn-circle btn-icon" data-nama="<?= $jenus ?>" data-kategori="<?= $id ?>" data-id="<?= $n{'id_corporate'} ?>" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++;} ?>
                                                </tbody>
                                            </table>
                                        </div><!--panel body end-->
                                        <!-- <button class="btn btn-warning rounded btn-block btn-lg" onclick="window.location.href='<?= base_url() ?>lubangenak/perusahaan/jenis'" title="View Standart Corporate"><i class="fa fa-arrow-left">  Kembali Ke Daftar Jenis Usaha Perusahaan</i></button> -->

                                    </div>
                                </div>
                            </div><!--row end-->
                        </div>
                    </div>
                </div><!--col-md-12 end-->
            </div><!--row end-->
        </div><!--container end-->


    <div class="modal fade animated rubberBand" tabindex="-1" id="modal" role="dialog"  aria-labelledby="myModalLabel">
        <div class="modal-dialog modals-large" style="max-width:600px;" id="fetched-data-add">
            
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#datatable').dataTable();

        $('#modal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        var menu = $(e.relatedTarget).data('menu');
        var kategori = $(e.relatedTarget).data('kategori'); 
        var nama = $(e.relatedTarget).data('nama'); 
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : "get",
            url : '<?php echo base_url() ?>lubangenak/kpi/corporate/action/modal',
            data :  {id : rowid, menu : menu, kategori : kategori, nama : nama},
            success : function(data){
                $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    });


</script>