<style>
    .myClass{
        width:400px;
        height:200px;
    }
</style>
<!--start main content-->
<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
        <div class="notif-data" data-notif="<?= $this->session->flashdata('notif') ?>" data-base="<?= base_url() ?>assets/project/images/"></div>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row mail-header">
                                <div class="col-md-6">
                                    <h2>Daftar Perusahaan</h2>
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
                                                        <th style=" width:100px; text-align:center">Logo</th>
                                                        <th style="text-align:center">Nama Perusahaan</th>
                                                        <th style=" width:200px; text-align:center">Status</th>
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
                                                        <td><img height="64px" src="<?php echo base_url() ?>assets/images/<?= $n{'perusahaan_logo'}?>" alt="No Image"></td>
                                                        <td><?= $n{'perusahaan_nama'}?></td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <?php if($n{'perusahaan_status'} == 0){ ?>
                                                                    <button class="btn btn-danger rounded btn-block btn-lg disabled">Non Active</button>
                                                                <?php }else if($n{'perusahaan_status'}  == 1){ ?>
                                                                    <button class="btn btn-success rounded btn-block btn-lg disabled">Active</button>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                             <div class="ui-buttons" style="text-align:center">
                                                                <button class="btn btn-primary rounded btn-block btn-lg" onclick="window.location.href='<?= base_url() ?>lubangenak/perusahaan/level/<?= encrypt_url($n{'id_perusahaan'}) ?>&<?= encrypt_url($n{'perusahaan_nama'}) ?>'" title="View Standart Level"><i class="fa fa-eye">  Biodata Perusahaan</i></button>
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
                url : '<?php echo base_url() ?>lubangenak/registrasi/modal',
                data :  {id : rowid, menu : menu},
                success : function(data){
                    $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    });
</script>