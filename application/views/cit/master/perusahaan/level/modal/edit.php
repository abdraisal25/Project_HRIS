<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Edit Standart Level</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'lubangenak/perusahaan/level/action/update' ?>" method="post" enctype="multipart/form-data">
                <?php foreach($data as $n) { ?>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nama</label>
                        <div class="col-lg-10">
                            <input type="text" value=<?= $n{'level_nama'}?> required name="nama" placeholder="Masukan Nama Standart Level" class="form-control">
                            <input type="hidden" value=<?= $n{'id_level'}?> required name="id">
                            <input type="hidden" value=<?= $jenus ?> required name="jenus">
                            <input type="hidden" required name="judul" value="<?= $nama ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="modal-footer justify-content-center">
                    <button type="submit" name="simpan" class="btn btn-primary rounded btn-lg btn-block"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!--Footer-->
</div>