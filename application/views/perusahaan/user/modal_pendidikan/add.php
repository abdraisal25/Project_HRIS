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
        <p class="heading lead col-md-8">Tambah Data Pendidikan</p>
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
                        <label class="col-lg-2 control-label">Jenjang</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="jenjang" id="jenjang" style="width:100%">
                                <option value=""></option>
                                <option value="SMA / SMK">SMA / SMK</option>
                                <option value="Strata-1">Strata-1</option>
                                <option value="Strata-2">Strata-2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Institusi</label>
                        <div class="col-lg-10">
                            <input type="hidden" name="fitur" value="<?= $fitur ?>">
                            <input type="hidden" name="user" value="<?= $nama ?>">
                            <input type="hidden" name="id" value="<?= $id_user ?>">
                            <input type="text" required name="nama" placeholder="Masukan Nama Institusi Pendidikan" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Kota</label>
                        <div class="col-lg-10"><input type="text" required name="kota" placeholder="Masukan Kota Institusi Pendidikan " class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Jurusan</label>
                        <div class="col-lg-10"><input type="text" required name="jurusan" placeholder="Masukan Jurusan" class="form-control"></div>
                    </div>
                </div>
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
                        <label class="col-lg-2 control-label">Nilai</label>
                        <div class="col-lg-10"><input type="text" required name="nilai" placeholder="Masukan Nilai Akhir " class="form-control"></div>
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