<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Tambah Standart Level</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'lubangenak/perusahaan/level/action/insert' ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Standart Level</label>
                        <div class="col-lg-10">
                            <input type="text" required name="nama" placeholder="Masukan Standart Level" class="form-control">
                            <input type="hidden" required name="jenus" value="<?= $jenus ?>" class="form-control">
                            <input type="hidden" required name="judul" value="<?= $nama ?>" class="form-control">
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
    $('#jenis').select2({
        allowClear : true,
        placeholder : "Pilih Jenis Perusahaan"
    });
   
});
</script>