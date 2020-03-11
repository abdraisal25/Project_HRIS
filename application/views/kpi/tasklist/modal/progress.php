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
        <p class="heading lead col-md-8">Tambah Progress Tasklist</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'kpi/tasklist/action/progress' ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tasklist</label>
                        <div class="col-lg-10">
                            <input type="text" required name="progress" placeholder="Masukan Tasklist" class="form-control">
                            <input type="hidden" required name="tasklist" value="<?= $id_tasklist ?>" class="form-control">
                            <input type="hidden" required name="user" value="<?= $id_user ?>" class="form-control">
                            <input type="hidden" required name="nama" value="<?= $nama ?>" class="form-control">    
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Catatan</label>
                        <div class="col-lg-10">
                            <textarea name="catatan" cols="88" rows="3" placeholder="Masukan Catatan Progress Tasklist"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Kategori</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" required name="status" id="status" style="width:100%">
                            <option disabled selected value></option>
                                <option <?= $data[0]{'tasklist_status'} == "Belum Selesai" ? 'selected':'' ?> value="Belum Selesai">Belum Selesai</option>
                                <option <?= $data[0]{'tasklist_status'} == "Selesai" ? 'selected':'' ?> value="Selesai">Selesai</option>
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
    $('#status').select2({
        allowClear : true,
        placeholder : "Pilih Status"
    });
});
</script>