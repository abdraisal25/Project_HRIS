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
        <p class="heading lead col-md-8">Tambah Data Keluarga</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'perusahaan/user/biodata/action/insert' ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Hubungan</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="hubungan" id="hubungan" style="width:100%">
                                <option value=""></option>
                                <option value="Orang Tua">Orang Tua</option>
                                <option value="Suami / Istri">Suami / Istri</option>
                                <option value="Kakak">Kakak</option>
                                <option value="Adik">Adik</option>
                                <option value="Anak">Anak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nama Lengkap</label>
                        <div class="col-lg-10">
                            <input type="hidden" name="fitur" value="<?= $fitur ?>">
                            <input type="hidden" name="user" value="<?= $nama ?>">
                            <input type="hidden" name="id" value="<?= $id_user ?>">
                            <input type="text" required name="nama" placeholder="Masukan Nama Lengkap" class="form-control">
                        </div>
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
                        <label class="col-lg-2 control-label">Tempat Lahir</label>
                        <div class="col-lg-10">
                            <input type="text" required name="tpt_lahir" placeholder="Masukan Tempat Lahir" class="form-control">
                        </div>
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
                        <label class="col-lg-2 control-label">Pendidikan</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="pendidikan" id="pendidikan" style="width:100%">
                                <option value=""></option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA / SMK">SMA / SMK</option>
                                <option value="Strata-1">Strata-1</option>
                                <option value="Strata-2">Strata-2</option>
                                <option value="Strata-3">Strata-3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">No. Telp</label>
                        <div class="col-lg-10"><input type="text" required name="telp" placeholder="Masukan Nomor Telepon" class="form-control"></div>
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