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
                                    <h2>Daftar Admin Departement</h2>
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
                                                        <th style=" width:30px; text-align:center">No.</th>
                                                        <th style=" text-align:center">Divisi</th>
                                                        <th style=" text-align:center">Departement</th>
                                                        <th style=" width:150px;text-align:center"></th>
                                                        <th style=" width:150px;text-align:center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $no = 1;
                                                    foreach($data as $n){ 
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $n{'divisi_nama'} ?></td>
                                                        <td><?= $n{'departement_nama'} ?></td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <button class="btn btn-success rounded btn-block btn-lg"  data-id="<?= $n{'key_jabatan'} ?>" data-target="#modal" data-toggle="modal" title="Create Account"><i class="fa fa-plus"></i> Create Account</button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <a href="<?= base_url() ?>perusahaan/admin/member/<?= encrypt_url($n{'key_jabatan'}) ?>&<?= encrypt_url($n{'jabatan_nama'}) ?>"><button class="btn btn-info rounded btn-block btn-lg" title="Data Karyawan"><i class="fa fa-user"></i> Data Member</button></a>
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
            url : '<?php echo base_url() ?>perusahaan/admin/modal',
            data :  {id : rowid, menu : menu},
            success : function(data){
                $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    });


</script>