<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Edit Hasil Kerja</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'perusahaan/jabatan/jobdesc/action/update_jobdesc' ?>" method="post" enctype="multipart/form-data">
                <?php foreach($data as $n) { ?>
                    <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Hasil Kerja</label>
                        <div class="col-lg-10">
                            <textarea name="hasil" cols="88" required rows="3" placeholder="Masukan Hasil Kerja Jabatan"><?= $n{'hasil_judul'} ?></textarea>
                            <input type="hidden" value="<?= $nama ?>" name="nama">
                            <input type="hidden" value="<?= $key ?>" name="key">
                            <input type="hidden" value="<?= $n{'id_hasil'} ?>" name="id">
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
                                <option <?= $n{'hasil_periode'} == 'Harian' ? 'Selected':''?> value="Harian">Harian</option>
                                <option <?= $n{'hasil_periode'} == 'Mingguan' ? 'Selected':''?> value="Mingguan">Mingguan</option>
                                <option <?= $n{'hasil_periode'} == 'Tahunan' ? 'Selected':''?> value="Tahunan">Tahunan</option>
                                <option <?= $n{'hasil_periode'} == 'Sesuai Kebutuhan' ? 'Selected':''?> value="Sesuai Kebutuhan">Sesuai Kebutuhan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Tujuan Hasil Kerja</label>
                        <div class="col-lg-10">
                            <textarea name="tujuan" cols="88" required rows="3" placeholder="Masukan Tujuan Hasil Kerja"><?= $n{'hasil_tujuan'} ?></textarea>
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

<script>
$(document).ready(function() {
    $('#periode').select2({
        placeholder : "Pilih Periode",
        allowClear : true
    });
});
</script>