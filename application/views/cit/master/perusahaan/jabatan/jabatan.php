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
                                    <h2>Daftar Jabatan<?= $nama == null ? '': ' Dari '.$nama ?></h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="pull-right tooltip-show">
                                        <button data-toggle="modal" data-target="#modal" data-nama="<?= $nama ?>" data-jenus="<?= $data[0]{'id_jenus'} ?>" data-departement="<?= $id_departement ?>" data-menu="add" class="btn btn-primary rounded" style="width:100%"><i class="fa fa-plus"></i> Tambah</button>
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
                                                        <th style="text-align:center">Nama Departement</th>
                                                        <th style="text-align:center">Nama Jabatan</th>
                                                        <th style=" width:200px; text-align:center"></th>
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
                                                        <td><?= $n{'departement_nama'}?></td>
                                                        <td><?= $n{'jabatan_nama'}?></td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <button class="btn btn-primary rounded btn-block btn-lg" data-nama="<?= $nama ?>" data-departement="<?= $id_departement ?>" data-id="<?= $n{'id_jabatan'} ?>" data-menu="jobdesc" data-target="#modal" data-toggle="modal" title="View Job Description"><i class="fa fa-eye"> Daftar Job Description</i></button>
                                                                    <!-- <button class="btn btn-primary rounded btn-block btn-lg" onclick="window.location.href='<?= base_url() ?>lubangenak/perusahaan/jabatan/<?= encrypt_url($n{'id_departement'}) ?>&<?= encrypt_url($n{'departement_nama'}) ?>'" title="View Standart Level"><i class="fa fa-eye">  Daftar Job Description</i></button> -->
                                                             </div>
                                                        </td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <button class="btn btn-primary btn-circle btn-icon" data-jenus="<?= $n{'id_jenus'} ?>" data-nama="<?= $nama ?>" data-departement="<?= $id_departement ?>" data-id="<?= $n{'id_jabatan'} ?>" data-menu="edit" data-target="#modal" data-toggle="modal" title="Edit"><i class="fa fa-edit"></i></button>
                                                                <button class="btn btn-primary btn-circle btn-icon" data-jenus="<?= $n{'id_jenus'} ?>" data-nama="<?= $nama ?>" data-departement="<?= $id_departement ?>" data-id="<?= $n{'id_jabatan'} ?>" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++;} ?>
                                                </tbody>
                                            </table>
                                        </div><!--panel body end-->
                                        <!-- <button class="btn btn-warning rounded btn-block btn-lg" onclick="window.location.href='<?= base_url() ?>lubangenak/perusahaan/level/<?= encrypt_url($id)?>&<?= NULL?>'" title="View Standart Level"><i class="fa fa-arrow-left">  Kembali Ke Daftar Standart Level Perusahaan</i></button> -->
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
        var departement = $(e.relatedTarget).data('departement'); 
        var nama = $(e.relatedTarget).data('nama'); 
        var jenus = $(e.relatedTarget).data('jenus'); 
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : "get",
            url : '<?php echo base_url() ?>lubangenak/perusahaan/jabatan/action/modal',
            data :  {id : rowid, menu : menu, departement : departement, nama : nama, jenus : jenus},
            success : function(data){
                $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    });


</script>