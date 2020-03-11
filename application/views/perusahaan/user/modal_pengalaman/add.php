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
        <p class="heading lead col-md-8">Tambah Data Pengalaman Kerja</p>
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
                        <label class="col-lg-2 control-label">Periode</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-5">
                                    <input type="month" min="1900" max="2100" required name="mulai" placeholder="datepicker" class="form-control">
                                </div>
                                <div class="col-lg-2 text-center">
                                    <span>s/d</span>
                                </div>
                                <div class="col-lg-5">
                                    <input type="month" min="1900" max="2100" required name="selesai" placeholder="datepicker" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nama Perusahaan</label>
                        <div class="col-lg-10"><input type="text" required name="perusahaan" placeholder="Masukan Nama Perusahaan" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Jenis Usaha</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="jenis" id="jenis" style="width:100%">
                                <option value=""></option>
                                <option value="Manufacture">Manufacture</option>
                                <option value="Jasa">Jasa</option>
                                <option value="Agraris">Agraris</option>
                                <option value="Ekstraktif">Ekstraktif</option>
                                <option value="Dagang">Dagang</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Alamat</label>
                        <input type="hidden" name="fitur" value="<?= $fitur ?>">
                            <input type="hidden" name="user" value="<?= $nama ?>">
                            <input type="hidden" name="id" value="<?= $id_user ?>">
                        <div class="col-lg-10"><textarea name="alamat" cols="88" rows="3" placeholder="Masukan Alamat Perusahaan"></textarea></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Jabatan</label>
                        <div class="col-lg-10"><input type="text" required name="jabatan" placeholder="Masukan Jabatan Terakhir" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Gaji / Bulan</label>
                        <div class="col-lg-10"><input type="text" name="gaji" placeholder="Masukan Penghasilan" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nama Atasan</label>
                        <div class="col-lg-10"><input type="text" name="nama" placeholder="Masukan Nama Ataasan" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Jabatan Atasan</label>
                        <div class="col-lg-10"><input type="gaji" name="atasan" placeholder="Masukan Jabatan Atasan" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Alasan Berhenti</label>
                        <div class="col-lg-10"><textarea name="berhenti" cols="88" required rows="3" placeholder="Masukan Alasan Berhenti"></textarea></div>
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