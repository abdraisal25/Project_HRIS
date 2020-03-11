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
        <p class="heading lead col-md-8">Tambah Posisi Jabatan</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'perusahaan/user/create' ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Jabatan</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="jabatan" id="jabatan" style="width:100%">
                            <option disabled selected value></option>
                            <?php foreach($jabatan as $g): ?>
                                <option value="<?= $g{'key_jabatan'} ?>"><?= $g{'jabatan_nama'} ?></option>
                            <?php endforeach ; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" required name="email" placeholder="Masukan Email Karyawan" class="form-control">
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
    $('#jabatan').select2({
        allowClear : true,
        placeholder : "Pilih Jabatan"
    });
});
</script>