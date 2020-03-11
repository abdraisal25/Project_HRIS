<style>
    #accordion .panel {
    border-radius: 0;
    border: 0;
    margin-top: 0px;
  }
  #accordion a {
    display: block;
    padding: 10px 15px;
    border-bottom: 1px solid #fff;
    text-decoration: none;
  }
  #accordion .panel-heading a.collapsed:hover{
    background-color: #36c6d3;
    color: white;
    transition: all 0.2s ease-in;
  }
  #accordion .panel-heading a.collapsed:hover::before,
  #accordion .panel-heading a.collapsed:focus::before {
    color: white;
  }
  #accordion .panel-heading {
    padding: 0;
    border-radius: 0px;
    text-align: center;
  }
  #accordion .panel-heading a:not(.collapsed) {
    color: white;
    /* background-color: #36c6d3; */
    transition: all 0.2s ease-in;
  }
  
  /* Add Indicator fontawesome icon to the left */
  #accordion .panel-heading .accordion-toggle::before {
    font-family: 'FontAwesome';
    content: '\f00d';
    float: left;
    color: white;
    font-weight: lighter;
    transform: rotate(0deg);
    transition: all 0.2s ease-in;
  }
  #accordion .panel-heading .accordion-toggle.collapsed::before {
    color: #444;
    transform: rotate(-135deg);
    transition: all 0.2s ease-in;
  }
</style>

<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
        <div class="notif-data" data-notif="<?= $this->session->flashdata('notif') ?>"></div>
        <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row mail-header">
                        <div class="col-md-6">
                            <h2>Biodata <?= $nama ?> </h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="accordion" class="panel-group">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#data" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Data Pribadi</a>
                                        </h4>
                                    </div>
                                    <div id="data" class="panel-collapse collapse">
                                        <table class="table table-hover">
                                            <tbody>
                                            <?php foreach($data['data'] as $n){ ?>
                                                <tr>
                                                    <th scope="row" width="20%">Nomor Induk Pegawai</th>
                                                    <td width="80%">: <?= $n{'user_nip'}?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">No. KTP</th>
                                                    <td width="80%">: <?= $n{'user_ktp'}?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">NPWP</th>
                                                    <td width="80%">: <?= $n{'user_npwp'}?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">Email</th>
                                                    <td width="80%">: <?= $n{'user_email'}?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">Nama Lengkap</th>
                                                    <td width="80%">: <?= $n{'user_nama'}?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">Tempat, Tanggal Lahir</th>
                                                    <td width="80%">: <?= $n{'user_tempat_lahir'}?>  <?= $n{'user_tanggal_lahir'} == NULL ? '': ', '.date("d F Y",strtotime($n{'user_tanggal_lahir'}))   ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">Telepon</th>
                                                    <td width="80%">: <?= $n{'user_telp'}?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">Jenis Kelamin</th>
                                                    <td width="80%">: <?= $n{'user_kelamin'}?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">Golongan Darah</th>
                                                    <td width="80%">: <?= $n{'user_darah'}?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">Agama</th>
                                                    <td width="80%">: <?= $n{'user_agama'}?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">Status Perkawinan</th>
                                                    <td width="80%">: <?= $n{'user_perkawinan'}?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row" width="20%">Alamat</th>
                                                    <td width="80%">: <?= $n{'user_alamat'}?></td>
                                                </tr>
                                            <?php } ?> 
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2" class="text-center">
                                                        <button class="btn btn-info rounded btn-block btn-lg" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-biodata="data" data-menu="add" data-target="#modal" data-toggle="modal" title="Tambah Data Pribadi"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#keluarga" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Data Keluarga</a>
                                        </h4>
                                    </div>
                                    <div id="keluarga" class="panel-collapse collapse">
                                        <table class="table table-hover">
                                            <?php if(!empty($data['keluarga'])){ ?>
                                            <thead>
                                                <tr>
                                                    <th width="10%">Hubungan</th>
                                                    <th width="25%">Nama</th>
                                                    <th width="15%">Jenis Kelamin</th>
                                                    <th width="25%">Tempat, Tanggal Lahir</th>
                                                    <th width="10%">Pendidikan</th>
                                                    <th width="10%">Telepon</th>
                                                    <th width="5%"></th>
                                                </tr>
                                            </thead>
                                            <?php } ?>
                                            <tbody>
                                            <?php
                                                $no=1;
                                                foreach($data['keluarga'] as $n){
                                            ?>
                                                <tr>
                                                    <td><?= $n{'keluarga_hubungan'} ?></td>
                                                    <td><?= $n{'keluarga_nama'} ?></td>
                                                    <td><?= $n{'keluarga_kelamin'} ?></td>
                                                    <td><?= $n{'keluarga_tempat_lahir'} ?>, <?= date("d F Y",strtotime($n{'keluarga_tanggal_lahir'}))?></td>
                                                    <td><?= $n{'keluarga_pendidikan'} ?></td>
                                                    <td><?= $n{'keluarga_telp'} ?></td>
                                                    <td>
                                                        <div class="ui-buttons" style="text-align:center">
                                                            <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $id_user ?>" data-key="<?= $n{'id_keluarga'} ?>" data-nama="<?= $nama ?>" data-biodata="keluarga" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $no++;} ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="7" class="text-center">
                                                        <button class="btn btn-info rounded btn-block btn-lg" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-biodata="keluarga" data-menu="add" data-target="#modal" data-toggle="modal" title="Tambah Data Pribadi"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#pendidikan" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Data Pendidikan</a>
                                        </h4>
                                    </div>
                                    <div id="pendidikan" class="panel-collapse collapse">
                                        <table class="table table-hover">
                                        <?php if(!empty($data['pendidikan'])){ ?>
                                            <thead>
                                                <tr>
                                                    <th width="10%">Jenjang</th>
                                                    <th width="30%">Institusi Pendidikan</th>
                                                    <th width="15%">Kota</th>
                                                    <th width="10%">Jurusan</th>
                                                    <th width="25%">Periode</th>
                                                    <th width="5%">Nilai</th>
                                                    <th width="5%"></th>
                                                </tr>
                                            </thead>
                                            <?php } ?>
                                            <tbody>
                                            <?php
                                                $no=1;
                                                foreach($data['pendidikan'] as $n){
                                            ?>
                                                <tr>
                                                    <td><?= $n{'pendidikan_level'} ?></td>
                                                    <td><?= $n{'pendidikan_institusi'} ?></td>
                                                    <td><?= $n{'pendidikan_kota'} ?></td>
                                                    <td><?= $n{'pendidikan_jurusan'} ?></td>
                                                    <td><?=  date("F Y",strtotime($n{'pendidikan_mulai'})).' - '. date("F Y",strtotime($n{'pendidikan_selesai'})) ?> </td>
                                                    <td><?= $n{'pendidikan_ipk'} ?></td>
                                                    <td>
                                                        <div class="ui-buttons" style="text-align:center">
                                                            <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $id_user ?>" data-key="<?= $n{'id_pendidikan'} ?>" data-nama="<?= $nama ?>" data-biodata="pendidikan" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $no++;} ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="7" class="text-center">
                                                        <button class="btn btn-info rounded btn-block btn-lg" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-biodata="pendidikan" data-menu="add" data-target="#modal" data-toggle="modal" title="Tambah Data Pribadi"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#pengalaman" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Data Pengalaman Kerja</a>
                                        </h4>
                                    </div>
                                    <div id="pengalaman" class="panel-collapse collapse">
                                        <table class="table table-hover">
                                            <?php if(!empty($data['pengalaman'])){ ?>
                                            <thead>
                                                <tr>
                                                    <th width="20%">Periode</th>
                                                    <th width="20%">Nama Perusahaan</th>
                                                    <th width="15%">Jenis Usaha</th>
                                                    <th width="20%">Alamat</th>
                                                    <th width="15%">Jabatan</th>
                                                    <th width="10%"></th>
                                                </tr>
                                            </thead>
                                            <?php } ?>
                                            <tbody>
                                            <?php
                                                foreach($data['pengalaman'] as $n){
                                            ?>
                                                <tr>
                                                    <!-- <th scope="row">1</th> -->
                                                    <td><?= date("F Y",strtotime($n{'pengalaman_mulai'})).' - '. date("F Y",strtotime($n{'pengalaman_selesai'}))?></td>
                                                    <td><?= $n{'pengalaman_perusahaan'} ?></td>
                                                    <td><?= $n{'pengalaman_jenus'} ?></td>
                                                    <td><?= $n{'pengalaman_alamat'} ?></td>
                                                    <td><?= $n{'pengalaman_jabatan'} ?></td>
                                                    <td width="100px">
                                                        <div class="ui-buttons" style="text-align:center">
                                                            <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $id_user ?>" data-key="<?= $n{'id_pengalaman'} ?>" data-nama="<?= $nama ?>" data-biodata="pengalaman" data-menu="view" data-target="#modal" data-toggle="modal" title="Edit"><i class="fa fa-eye"></i></button>
                                                            <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $id_user ?>" data-key="<?= $n{'id_pengalaman'} ?>" data-nama="<?= $nama ?>" data-biodata="pengalaman" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?> 
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="6" class="text-center">
                                                        <button class="btn btn-info rounded btn-block btn-lg" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-biodata="pengalaman" data-menu="add" data-target="#modal" data-toggle="modal" title="Tambah Data Pribadi"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#organisasi" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"> Data Organisasi</a>
                                        </h4>
                                    </div>
                                    <div id="organisasi" class="panel-collapse collapse">
                                        <table class="table table-hover">
                                            <?php if(!empty($data['organisasi'])){ ?>
                                            <thead>
                                                <tr>
                                                    <th width="20%">Periode</th>
                                                    <th width="25%">Nama Perusahaan</th>
                                                    <th width="10%">Jabatan</th>
                                                    <th width="35%">Deskripsi Jabatan</th>
                                                    <th width="10%"></th>
                                                </tr>
                                            </thead>
                                            <?php } ?>
                                            <tbody>
                                            <?php
                                                foreach($data['organisasi'] as $n) {
                                            ?>
                                                <tr>
                                                    <td><?= date("F Y",strtotime($n{'organisasi_mulai'})).' - '. date("F Y",strtotime($n{'organisasi_selesai'})) ?></td>
                                                   <td><?= $n{'organisasi_nama'} ?></td>
                                                    <td><?= $n{'organisasi_jabatan'} ?></td>
                                                    <td><?= $n{'organisasi_deskripsi'} ?></td>
                                                    <td>
                                                        <div class="ui-buttons" style="text-align:center">
                                                            <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $id_user ?>" data-key="<?= $n{'id_organisasi'} ?>" data-nama="<?= $nama ?>" data-biodata="organisasi" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $no++;} ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" class="text-center">
                                                        <button class="btn btn-info rounded btn-block btn-lg" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-biodata="organisasi" data-menu="add" data-target="#modal" data-toggle="modal" title="Tambah Data Pribadi"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#change" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Ganti Password</a>
                                        </h4>
                                    </div>
                                    <div id="change" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <form class="class-horizontal style-form" action="<?php echo site_url(). 'perusahaan/user/biodata/action/change' ?>" method="post" enctype="multipart/form-data">
                                                <div class="row form-group">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Password Lama</label>
                                                        <div class="col-lg-10"><input type="password" minlength="8" required name="old" placeholder="Masukan Password Lama Anda" class="form-control"></div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="form-group">
                                                        <label class="col-lg-2 control-label">Password Baru</label>
                                                        <div class="col-lg-10"><input type="password" minlength="8" required name="new" placeholder="Masukan Password Baru Anda" class="form-control"></div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <input type="hidden" name="user" value="<?= $nama ?>">
                                                    <input type="hidden" name="id" value="<?= $id_user ?>">
                                                    <button type="submit" name="simpan" class="btn btn-primary rounded btn-lg btn-block"><i class="fa fa-check"></i> Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
        var nama = $(e.relatedTarget).data('nama');
        var key = $(e.relatedTarget).data('key');
        var menu = $(e.relatedTarget).data('menu');
        var biodata = $(e.relatedTarget).data('biodata');
        // alert(rowid)
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : "get",
            url : '<?php echo base_url() ?>perusahaan/user/biodata/action/modal',
            data :  {id : rowid, menu : menu, biodata : biodata, key : key, nama : nama},
            success : function(data){
                $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    });


</script>