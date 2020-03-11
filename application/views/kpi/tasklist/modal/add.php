<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Tambah Tasklist</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'kpi/tasklist/action/insert' ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tasklist</label>
                        <div class="col-lg-10">
                            <input type="text" required name="tasklist" placeholder="Masukan Tasklist" class="form-control">
                            <input type="hidden" required name="user" value="<?= $id_user ?>" class="form-control">
                            <input type="hidden" required name="nama" value="<?= $nama ?>" class="form-control">    
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Bobot</label>
                        <div class="col-lg-10">
                            <input type="text" required name="bobot" placeholder="Masukan Bobot Tasklist" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Catatan</label>
                        <div class="col-lg-10">
                            <textarea name="catatan" cols="88" rows="3" placeholder="Masukan Catatan Tasklist"></textarea>
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