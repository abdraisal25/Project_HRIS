<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Job Description of <?= $data[0]{'jabatan_nama'} ?></p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <?php foreach($data as $n) { ?>
            <div class="row form-group">
                <!-- <button class="btn btn-primary rounded btn-block btn-lg" onclick="window.location.href='<?= base_url() ?>lubangenak/perusahaan/jabatan/jobdesc/tujuan/<?= encrypt_url($n{'id_jabatan'}) ?>&<?= encrypt_url($n{'jabatan_nama'}) ?>'" title="View Tujuan jabatan"><i class="fa fa-eye">  Daftar Tujuan Jabatan</i></button> -->
                <button class="btn btn-primary rounded btn-block btn-lg" onclick="window.location.href='<?= base_url() ?>lubangenak/perusahaan/jabatan/jobdesc/tjumum/<?= encrypt_url($n{'id_jabatan'}) ?>&<?= encrypt_url($n{'jabatan_nama'}) ?>'" title="View TanggungJawab Umum"><i class="fa fa-eye">  Daftar TanggungJawab Umum</i></button>
                <!-- <button class="btn btn-primary rounded btn-block btn-lg" onclick="window.location.href='<?= base_url() ?>lubangenak/perusahaan/jabatan/jobdesc/wewenang/<?= encrypt_url($n{'id_jabatan'}) ?>&<?= encrypt_url($n{'jabatan_nama'}) ?>'" title="View Wewenang"><i class="fa fa-eye">  Daftar Wewenang</i></button> -->
            </div>
            <?php } ?>
        </div>
    </div>
    <!--Footer-->
</div>