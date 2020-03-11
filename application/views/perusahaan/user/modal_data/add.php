<style>
.select2-container--default .select2-selection--single{
    background-color : #1b1a26;
    color : #fff;
    border : 1;  
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    color : #fff;
}
.select2-container--default .select2-selection--single .select2-selection__placeholder{
    color : #fff;
}
.select2-results__option--highlighted,
.select2-results__option:hover{
	background:#36c6d3 !important;
}
.select2-results{
    background-color : #fff;
}
.select2-dropdown {
    color : #464552;
}
</style>

<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Biodata Data Pribadi</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'perusahaan/user/biodata/action/insert' ?>" method="post" enctype="multipart/form-data">
                <?php foreach($data as $n){ ?>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">NIP</label>
                        <div class="col-lg-10">
                            <input type="hidden" name="fitur" value="<?= $fitur ?>">
                            <input type="hidden" name="key" value="<?= $n{'key_jabatan'} ?>">
                            <input type="hidden" name="user" value="<?= $nama ?>">
                            <input type="hidden" name="username" value="<?= $n{'user_username'} ?>">
                            <input type="hidden" name="password" value="<?= $n{'user_password'} ?>">
                            <input type="hidden" name="id" value="<?= $id_user ?>">
                            <input type="text" required name="nip"  value="<?= $n{'user_nip'} ?>" placeholder="Masukan Nomor Induk Pegawai" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">No. KTP</label>
                        <div class="col-lg-10"><input type="text" value="<?= $n{'user_ktp'} ?>" required name="ktp" placeholder="Masukan Nomor KTP" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10"><input type="email" readonly value="<?= $n{'user_email'} ?>" required name="email" placeholder="Masukan Email" style="background-color:#464552" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nama Lengkap</label>
                        <div class="col-lg-10"><input type="text" value="<?= $n{'user_nama'} ?>" required name="nama" placeholder="Masukan Nama Lengkap" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">No. Telp</label>
                        <div class="col-lg-10"><input type="text" value="<?= $n{'user_telp'} ?>" required name="telp" placeholder="Masukan Nomor Telepon" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Jenis Kelamin</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="jekel" id="jekel" style="width:100%">
                                <option <?= $n{'user_kelamin'} == NULL ? 'selected':'' ?> value=""></option>
                                <option <?= $n{'user_kelamin'} == 'Laki - Laki' ? 'selected':'' ?> value="Laki - Laki">Laki - Laki</option>
                                <option <?= $n{'user_kelamin'} == 'Perempuan' ? 'selected':'' ?> value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Golongan Darah</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="darah" id="darah" style="width:100%">
                                <option <?= $n{'user_darah'} == NULL ? 'selected':'' ?> value=""></option>
                                <option <?= $n{'user_darah'} == 'A' ? 'selected':'' ?> value="A">A</option>
                                <option <?= $n{'user_darah'} == 'B' ? 'selected':'' ?> value="B">B</option>
                                <option <?= $n{'user_darah'} == 'O' ? 'selected':'' ?> value="O">O</option>
                                <option <?= $n{'user_darah'} == 'AB' ? 'selected':'' ?> value="AB">AB</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tempat Lahir</label>
                        <div class="col-lg-10"><input type="text" value="<?= $n{'user_tempat_lahir'} ?>" required name="tpt_lahir" placeholder="Masukan Tempat Lahir" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tanggal Lahir</label>
                        <div class="col-lg-10"><input type="date" value="<?= $n{'user_tanggal_lahir'} ?>" required name="tgl_lahir" placeholder="Date Picker" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Agama</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="agama" id="agama" style="width:100%">
                                <option <?= $n{'user_agama'} == NULL ? 'selected':'' ?> value=""></option>
                                <option <?= $n{'user_agama'} == 'Islam' ? 'selected':'' ?> value="Islam">Islam</option>
                                <option <?= $n{'user_agama'} == 'Kristen' ? 'selected':'' ?> value="Kristen">Kristen</option>
                                <option <?= $n{'user_agama'} == 'Katolik' ? 'selected':'' ?> value="Katolik">Katolik</option>
                                <option <?= $n{'user_agama'} == 'Hindu' ? 'selected':'' ?> value="Hindu">Hindu</option>
                                <option <?= $n{'user_agama'} == 'Budha' ? 'selected':'' ?> value="Budha">Budha</option>
                                <option <?= $n{'user_agama'} == 'Konghucu' ? 'selected':'' ?> value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Status Perkawinan</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="perkawinan" id="perkawainan" style="width:100%">
                                <option <?= $n{'user_perkawinan'} == NULL ? 'selected':'' ?> value=""></option>
                                <option <?= $n{'user_perkawinan'} == 'Lajang' ? 'selected':'' ?> value="Lajang">Lajang</option>
                                <option <?= $n{'user_perkawinan'} == 'Menikah' ? 'selected':'' ?> value="Menikah">Menikah</option>
                                <option <?= $n{'user_perkawinan'} == 'Cerai' ? 'selected':'' ?> value="Cerai">Cerai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Alamat</label>
                        <div class="col-lg-10"><textarea name="alamat" cols="88" required rows="3" placeholder="Masukan Alamat Tempat Tinggal"><?= $n{'user_alamat'} ?></textarea></div>
                    </div>
                </div>
                <?php } ?>
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