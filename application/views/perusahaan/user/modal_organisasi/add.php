<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Tambah Data Organisasi</p>
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
                        <label class="col-lg-2 control-label">Nama Organisasi</label>
                        <div class="col-lg-10">
                            <input type="hidden" name="fitur" value="<?= $fitur ?>">
                            <input type="hidden" name="user" value="<?= $nama ?>">
                            <input type="hidden" name="id" value="<?= $id_user ?>">
                            <input type="text" required name="nama" placeholder="Masukan Nama Organisasi" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Jabatan</label>
                        <div class="col-lg-10">
                            <input type="text" required name="jabatan" placeholder="Masukan Jabatan" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Deskripsi Jabatan</label>
                        <div class="col-lg-10"><textarea name="deskripsi" cols="88" required rows="3" placeholder="Masukan Deskripsi Jabatan"></textarea></div>
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