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
        <p class="heading lead col-md-8">Tambah Jabatan</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'lubangenak/perusahaan/jabatan/action/insert' ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Parent Jabatan</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="parent" id="parent" style="width:100%">
                            <option disabled selected value></option>
                            <?php foreach($parent as $g): ?>
                                <option value="<?= $g{'id_jabatan'} ?>"><?= $g{'jabatan_nama'} ?></option>
                            <?php endforeach ; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Jabatan</label>
                        <div class="col-lg-10">
                            <input type="text" required name="nama" placeholder="Masukan Nama Jabatan" class="form-control">
                            <input type="hidden" required name="departement" value="<?= $departement ?>" class="form-control">
                            <input type="hidden" required name="judul" value="<?= $nama ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Standart Level</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="level" id="level" style="width:100%">
                            <option disabled selected value></option>
                            <?php foreach($level as $g): ?>
                                <option value="<?= $g{'id_level'} ?>"><?= $g{'level_nama'} ?></option>
                            <?php endforeach ; ?>
                            </select>
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
    $('.js-example-basic-single').select2({
        allowClear : true,
        placeholder : "Pilih Salah Satu"
    });
});
</script>