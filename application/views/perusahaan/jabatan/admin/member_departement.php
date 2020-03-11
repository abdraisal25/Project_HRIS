<!--start main content-->
<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row mail-header">
                                <div class="col-md-8">
                                    <h2>Daftar Karyawan Pada Departement <?= $this->session->userdata('jabatan')[0]['departement_nama'] ?></h2>
                                </div>
                                <div class="col-md-4">
                                    <div class="pull-right tooltip-show">
                                        <button data-personal="data" data-toggle="modal" data-target="#modal" data-menu="add" class="btn btn-primary rounded" style="width:100%"><i class="fa fa-plus"></i> Tambah User</button>
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
                                                        <th style=" text-align:center">Jabatan</th>
                                                        <th style=" text-align:center">Email</th>
                                                        <th style=" text-align:center">Nama</th>
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
                                                        <td><?= $n{'jabatan_nama'}?></td>
                                                        <td><?= $n{'user_email'}?></td>
                                                        <td><?= $n{'user_nama'}?></td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <a href="<?= base_url() ?>perusahaan/user/biodata/<?= $n{'user_nama'} ?>/<?= encrypt_url($n{'id_user'}) ?>"><button class="btn btn-info rounded btn-block btn-lg" title="Data Karyawan"><i class="fa fa-user"></i> Biodata Karyawan</button></a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <!-- <a href="<?= base_url() ?>perusahaan/user/reset/<?= $n{'user_email'} ?>/<?= $n{'id_user'} ?>"><button id="change" class="btn btn-default rounded btn-block btn-lg" title="Ganti Password"><i class="fa fa-user"></i> Ganti Password</button></a> -->
                                                                <button id="change" user="<?= $n{'id_user'} ?>" email="<?= $n{'user_email'} ?>" class="btn btn-default rounded btn-block btn-lg" title="Ganti Password"><i class="fa fa-user"></i> Ganti Password</button>
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
            var personal = $(e.relatedTarget).data('personal');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "get",
                url : '<?php echo base_url() ?>perusahaan/user/modal',
                data :  {id : rowid, menu : menu, personal : personal},
                success : function(data){
                    $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
                }
            });
        });

        $('#change').on('click', function(e){
            var email = $(this).attr('email');
            var id = $(this).attr('user');
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
                        url :  '<?= base_url() ?>perusahaan/user/reset/'+email+'/'+id
                    });
            },
            allowOutsideClick: () => !Swal.isLoading(),
            })
            .then(function(regis){
                console.log(regis)
                if(regis.value == 'true'){
                    Swal.fire({
                        title: 'Pesan Berhasil Terkirim ',
                        text: '',
                        icon: 'success',
                        customClass: "myClass",
                        allowOutsideClick :false,
                        allowEscapeKey :false,
                        allowEnterKey :false,
                        showConfirmButton: false,
                        timer: 2500
                    }).then((result) => {
                        window.location.href = "<?php echo base_url() ?>perusahaan/user"
                    })
                }else{
                    Swal.fire({
                        title: 'Gagal Terkirim ke'+email,
                        text: '',
                        icon: 'error',
                        customClass: "myClass",
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            });
        });
    });


</script>