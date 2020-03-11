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
                                    <h2>Daftar Karyawan Pada <?= $nama ?></h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="pull-right tooltip-show">
                                        <!-- <button data-id="<?= $id ?>" data-personal="data" data-toggle="modal" data-target="#modal" data-menu="add" class="btn btn-primary rounded" style="width:100%"><i class="fa fa-plus"></i> Tambah User</button> -->
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
                                                        <th style=" width:30px; text-align:center">No.</th>
                                                        <th style=" width:100px; text-align:center">Email</th>
                                                        <th style=" width:200px; text-align:center">Nama</th>
                                                        <th style=" width:100px;text-align:center"></th>
                                                        <th style=" width:100px;text-align:center"></th>
                                                        <th style=" width:100px;text-align:center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php 
                                                    $no = 1;
                                                    foreach($data as $n){
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $n{'user_email'} ?></td>
                                                        <td><?= $n{'user_nama'} ?></td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <a href="<?= base_url() ?>perusahaan/user/biodata/<?= $n{'user_nama'} ?>/<?= encrypt_url($n{'id_user'}) ?>"><button class="btn btn-info rounded btn-block btn-lg" title="Data Karyawan"><i class="fa fa-user"></i> Biodata Karyawan</button></a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <!-- <a href="<?= base_url() ?>perusahaan/user/reset/<?= $n{'user_email'}?>/<?= encrypt_url($n{'id_user'}) ?>"><button class="btn btn-warning rounded btn-block btn-lg" title="Data Karyawan"><i class="fa fa-gear"></i> Reset Password</button></a> -->
                                                                <button class="btn btn-warning rounded btn-block btn-lg reset" data-email="<?= $n{'user_email'}?>" user="<?= encrypt_url($n{'id_user'}) ?>" title="Data Karyawan"><i class="fa fa-gear"></i> Reset Password</button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <?php if($n{'user_status'} == 0){ ?>
                                                                    <button class="btn btn-danger rounded btn-block btn-lg disabled">Non Active</button>
                                                                <?php }else if($n{'user_status'}  == 1){ ?>
                                                                    <button class="btn btn-success rounded btn-block btn-lg disabled">Active</button>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php $no++; } ?>
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
            var personal = $(e.relatedTarget).data('personal');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "get",
                url : '<?php echo base_url() ?>perusahaan/user/modal_user',
                data :  {id : rowid, menu : menu, personal : personal},
                success : function(data){
                    $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
                }
            });
        });
        $(document).on('click','.reset', function() {
            // e.preventDefault();
            let key = <?= json_encode(encrypt_url($key)) ?>;
            let nama = <?= json_encode(encrypt_url($nama)) ?>;
            let email = $(this).attr('data-email');
            let user = $(this).attr('user');
            Swal.fire({
                width: '600px',
                title: 'Mengirim Pesan '+email+' !!!',
                allowOutsideClick :false,
                allowEscapeKey :false,
                allowEnterKey :false,
                confirmButtonText: 'Send',
                showLoaderOnConfirm: true,
                preConfirm: function(regis){
                    return $.ajax({
                            url: '<?= base_url() ?>perusahaan/user/reset/'+email+'/'+user
                        });
                },
                allowOutsideClick: () => !Swal.isLoading(),
            }).then(function(regis){
                // console.log(regis.value);
                if(regis.value == 'true'){
                    Swal.fire({
                        title: 'Pesan Berhasil Terkirim ',
                        text: '',
                        icon: 'success',
                        allowOutsideClick :false,
                        allowEscapeKey :false,
                        allowEnterKey :false,
                        showConfirmButton: false,
                        timer: 2500
                    }).then((result) => {
                        window.location.href = '<?php echo base_url() ?>perusahaan/admin/member/'+key+'&'+nama
                    })
                }else{
                    Swal.fire({
                        title: email+' Gagal Mengirim Pesan',
                        text: '',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            });
        });
    });
</script>