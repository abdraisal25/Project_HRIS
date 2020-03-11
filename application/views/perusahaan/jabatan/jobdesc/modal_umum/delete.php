<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Hapus Hasil Kerja</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
        <form class="class-horizontal style-form" action="<?php echo site_url(). 'perusahaan/jabatan/jobdesc/action/delete_jobdesc' ?>" method="post">
            <?php foreach($data as $n) { ?>
            <div class="row form-group">
                <p style="text-align: center">Apakah anda ingin mengahapus Hasil Kerja ini?</p>
                <p style="text-align: center"><strong><?= $n{'umum_tj'} ?></strong></p>
            </div>
            <div class="modal-footer justify-content-center">
                <input type="hidden" value="<?= $nama ?>" name="nama">
                <input type="hidden" value="<?= $key ?>" name="key">
                <input type="hidden" value="<?= $n{'id_umum'} ?>" name="id">
                <input type="hidden" value="<?= $fitur ?>" name="jobdesc">
                <button type="submit" name="simpan" class="btn btn-primary rounded btn-lg btn-block"><i class="fa fa-check"></i> Simpan</button>
            </div>
            <?php } ?>
        </form>
        </div>
    </div>
    <!--Footer-->
</div>