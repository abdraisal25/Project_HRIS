<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Tambah User Admin</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'perusahaan/admin/departement/insert_data' ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">NIP</label>
                        <div class="col-lg-10">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="text" required name="nip" placeholder="Masukan Nomor Induk Pegawai" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">No. KTP</label>
                        <div class="col-lg-10"><input type="text" required name="ktp" placeholder="Masukan Nomor KTP" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10"><input type="email" required name="email" placeholder="Masukan Email" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nama Lengkap</label>
                        <div class="col-lg-10"><input type="text" required name="nama" placeholder="Masukan Nama Lengkap" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Jenis Kelamin</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="jekel" id="jekel" style="width:100%">
                                <option value=""></option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Golongan Darah</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="darah" id="darah" style="width:100%">
                                <option value=""></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tempat Lahir</label>
                        <div class="col-lg-10"><input type="text" required name="tpt_lahir" placeholder="Masukan Tempat Lahir" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tanggal Lahir</label>
                        <div class="col-lg-10"><input type="date" required name="tgl_lahir" placeholder="Date Picker" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Agama</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="agama" id="agama" style="width:100%">
                                <option value=""></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Status Perkawinan</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="perkawinan" id="perkawainan" style="width:100%">
                                <option value=""></option>
                                <option value="Lajang">Lajang</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Cerai">Cerai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Alamat</label>
                        <div class="col-lg-10"><textarea name="alamat" cols="88" required rows="3" placeholder="Masukan Alamat Tempat Tinggal"></textarea></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" name="simpan" class="btn btn-primary rounded btn-lg btn-block"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!--Footer-->
</div>

<script>
$(document).ready(function() {

    $('.js-example-basic-single').select2({
        placeholder : "Pilih Salah Satu",
        allowClear : true
    });
   
});
</script>