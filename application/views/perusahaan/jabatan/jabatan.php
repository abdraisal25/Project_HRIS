<!--start main content-->
<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
        <div class="notif-data" data-notif="<?= $this->session->flashdata('notif') ?>" data-base="<?= base_url() ?>assets/project/images/"></div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row mail-header">
                                <div class="col-md-6">
                                    <h2>Daftar Jabatan</h2>
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
                                                        <th style=" text-align:center">Divisi</th>
                                                        <th style=" text-align:center">Departement</th>
                                                        <th style=" text-align:center">Jabatan</th>
                                                        <th></th>
                                                        <!-- <th style="text-align:center">Member Of</th> -->
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
                                                        <td><?= $n{'departement_nama'}?></td>
                                                        <td><?= $n{'jabatan_nama'}?></td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <!-- <button class="<?= $jobdesc != null ? 'jobdesc':'' ?> btn btn-info rounded btn-block btn-lg" <?= $jobdesc[0] == NULL ? 'data-menu="jobdesc" data-target="#modal" data-toggle="modal"' : '' ?> data-id="<?= $n{'id_jabatan'} ?>" data-nama="<?= $n{'jabatan_nama'}?>" title="Job Description"><i class="fa fa-briefcase"></i> Job Description</button> -->
                                                                <!-- <button class="jobdesc btn btn-info rounded btn-block btn-lg" data-jabatan="<?= $n{'id_jabatan'} ?>" data-id="<?= $n{'key_jabatan'} ?>" data-nama="<?= $n{'jabatan_nama'}?>" title="Job Description"><i class="fa fa-briefcase"></i> Job Description</button> -->
                                                                <a href="<?= base_url() ?>perusahaan/jabatan/jobdesc/<?= $n{'jabatan_nama'} ?>/<?= encrypt_url($n{'key_jabatan'})?>"><button class="btn btn-default rounded btn-block" title="Item KPI"><i class="fa fa-briefcase"></i> Job Description</button></a>
                                                            </div>
                                                        </td>
                                                        <!-- <td><?= $n{'parent_id'}?></td> -->
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $n{'key_jabatan'} ?>" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
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
                url : '<?php echo base_url() ?>perusahaan/jabatan/modal_jabatan',
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

        $(document).on('click','.jobdesc', function () {
            var rowid = $(this).attr('data-id');
            var key = $(this).attr('data-jabatan');
            var nama = $(this).attr('data-nama');
            $.ajax({
                type : "get",
                url : '<?php echo base_url() ?>perusahaan/jabatan/jobdesc/jobdesc',
                data : {id : rowid, nama : nama, key : key},
                success : function(view){
                    history.pushState({}, ' ');
                    historyStack.push($('.container').html());
                    $('.container').html(view);
                }
            });       
        });
    });


</script>

