<!--start main content-->
<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row mail-header">
                                <div class="col-md-11">
                                    <h2>Daftar Item Tasklist dari <?= $nama ?></h2>
                                </div>
                                    <?php if($level == 0) {?>
                                <div class="col-md-1">
                                    <div class="pull-right tooltip-show">
                                        <button data-toggle="modal" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-target="#modal" data-menu="add" class="btn btn-primary rounded" style="width:100%"><i class="fa fa-plus"></i> Tambah</button>
                                    </div>
                                </div>
                                    <?php }?>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <h2><?= $level == 0 ? date('F Y', strtotime('+1 month', strtotime(date('F Y')))) : date('F Y') ?></h2>
                                    </div>
                                    <div class="panel">                       
                                        <div class="panel-body">
                                            <table id="datatable" class="table table-striped dt-responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th style=" width:5%; text-align:center">#</th>
                                                        <th style="text-align:center">Item Tasklist KPI</th>
                                                        <th style=" width:10%; text-align:center">Bobot</th>
                                                        <?php if($level == 1){ ?>
                                                        <th style=" width:10%; text-align:center"></th>
                                                        <?php } ?>
                                                        <th style=" width:10%; text-align:center"></th>
                                                        <th style=" width:15%; text-align:center">Status</th>
                                                        <th style=" width:10%; text-align:center"></th>
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
                                                        <td><?= $n{'tasklist_nama'}?></td>
                                                        <td style="text-align:center"><?= $n{'tasklist_bobot'}?></td>
                                                        <?php if($level == 1){ ?>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center" >
                                                                <button <?= $n{'tasklist_status'} == 'Selesai' ? 'disabled':'' ?> class="btn btn-success btn-block rounded" data-tasklist="<?= $n{'id_tasklist'} ?>" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-menu="progress" data-target="#modal" data-toggle="modal" title="Tambah Progress"><i class="fa fa-edit"> Tambah Progress</i></button>
                                                            </div>
                                                        </td>
                                                        <?php } ?>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center" >
                                                                    <button class="btn btn-primary btn-circle btn-icon" data-tasklist="<?= $n{'id_tasklist'} ?>" data-menu="view" data-target="#modal" data-toggle="modal" title="View Detail"><i class="fa fa-eye"></i></button>
                                                                <?php if($level == 0){ ?>
                                                                    <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-tasklist="<?= $n{'id_tasklist'} ?>" data-menu="delete" data-target="#modal" data-toggle="modal" title="Hapus"><i class="fa fa-trash"></i></button>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                        <td style="text-align:center"><?= $n{'tasklist_status'} ?></td>
                                                        <td>
                                                            <a href="<?= base_url() ?>kpi/tasklist/progress/<?= encrypt_url($n{'id_tasklist'})?>"><button class="btn btn-default rounded btn-block">View Progress <i class="fa fa-arrow-right"></i></button></a>        
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
        <div class="modal-dialog modals-large" style="max-width:1000px;" id="fetched-data-add">
            
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#datatable').dataTable({
            // "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"i><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"p>>>'
            "searching": false,
            "ordering": false,
            "info": false,
            "lengthChange": false
        });
        
        $('#modal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            var menu = $(e.relatedTarget).data('menu');
            var tasklist = $(e.relatedTarget).data('tasklist');
            var nama = $(e.relatedTarget).data('nama');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "get",
                url : '<?php echo base_url() ?>kpi/tasklist/action/modal',
                data :  {id : rowid, menu : menu, tasklist : tasklist, nama : nama},
                success : function(data){
                    $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    });


</script>

