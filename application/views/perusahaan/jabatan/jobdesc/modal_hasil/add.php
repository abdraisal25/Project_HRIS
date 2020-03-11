
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
    color : #000;
}
</style>
<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Tambah Tujuan Jabatan</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'perusahaan/jabatan/jobdesc/action/insert_jobdesc' ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Hasil Kerja</label>
                        <div class="col-lg-10">
                            <textarea name="hasil" cols="88" required rows="3" placeholder="Masukan Hasil Kerja Jabatan"></textarea>
                            <input type="hidden" value="<?= $nama ?>" name="nama">
                            <input type="hidden" value="<?= $key ?>" name="key">
                            <input type="hidden" value="<?= $fitur ?>" name="jobdesc">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Periode</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="periode" id="periode" style="width:100%">
                                <option></option>
                                <option value="Harian">Harian</option>
                                <option value="Mingguan">Mingguan</option>
                                <option value="Tahunan">Tahunan</option>
                                <option value="Sesuai Kebutuhan">Sesuai Kebutuhan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tujuan Hasil Kerja</label>
                        <div class="col-lg-10">
                            <textarea name="tujuan" cols="88" required rows="3" placeholder="Masukan Tujuan Hasil Kerja"></textarea>
                        </div>
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
    $('#periode').select2({
        placeholder : "Pilih Periode",
        allowClear : true
    });
});
</script>