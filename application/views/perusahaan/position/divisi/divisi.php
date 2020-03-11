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
                                    <h2>Divisi</h2>
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
                                                        <th style=" width:35px; text-align:center">No.</th>
                                                        <th style="text-align:center">Nama</th>
                                                        <th style=" width:200px; text-align:center"></th>
                                                        <th style=" width:100px; text-align:center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $no = 1;
                                                    foreach($data as $n){
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $n{'divisi_nama'}?></td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <button data-id="<?= $n{'id_divisi'} ?>" data-nama="<?= $n{'divisi_nama'}?>" class="departement btn btn-info rounded btn-block btn-lg"> Member List <i class="fa fa-right-arrow"></i></button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $n{'id_divisi'} ?>" data-menu="edit" data-target="#modal" data-toggle="modal" title="Edit"><i class="fa fa-edit"></i></button>
                                                                <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $n{'id_divisi'} ?>" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
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
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "get",
                url : '<?php echo base_url() ?>perusahaan/position/modal_divisi',
                data :  {id : rowid, menu : menu},
                success : function(data){
                    $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
                }
            });
        });

        var historyStack = [];
        window.onpopstate = function(e) {
            if(historyStack.length) {
                var prev = historyStack.pop();
                $('.container').html(prev);
            }
            else history.go(-1);
        };

        $(document).on('click','.departement', function () {
            var rowid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            $.ajax({
                type : "get",
                url : '<?php echo base_url() ?>perusahaan/departement/view',
                data : {id : rowid, nama : nama},
                success : function(view){
                    history.pushState({}, ' ');
                    historyStack.push($('.container').html());
                    $('.container').html(view);
                }
            });       
        });

        

        // if(window.location.hash) {
        //     var id = window.location.hash.replace('#', '');
        //     $.ajax({
        //         type : "get",
        //         url : '<?php echo base_url() ?>perusahaan/departement/view',
        //         data : {id},
        //         success : function(view){
        //             history.pushState({}, ' ');
        //             historyStack.push($('.container').html());
        //             $('.container').html(view);
        //         }
        //     }); 
        // }
    });


</script>