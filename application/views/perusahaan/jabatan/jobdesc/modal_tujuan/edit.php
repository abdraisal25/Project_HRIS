<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Edit Tujuan</p>
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
                        <label class="col-lg-2 control-label">Tujuan</label>
                        <div class="col-lg-10">
                            <textarea name="tujuan" cols="88" required rows="3" placeholder="Masukan Tujuan Jabatan"><?= $n{'jobdesc_tujuan'} ?></textarea>
                            <input type="hidden" value="<?= $n{'id_tujuan'} ?>" name="id">
                            <input type="hidden" value="<?= $fitur ?>" name="jobdesc">
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
    var data = <?= json_encode($departement) ?>;
    
    $('#level').select2({
        allowClear : true,
        placeholder : "Pilih Standart Level"
    });
    
    $('#divisi').select2({
        placeholder : "Pilih Divisi",
        allowClear : true
    });

    var initDepartement = (data) => {
        $('#departement').select2({
            placeholder : "Pilih Departement",
            allowClear : true,
            data
        });
    }
    initDepartement();

    $('#divisi').val(null).trigger('change');
    $('#divisi').on('select2:select', function(e){
        var el = $('#departement');

        el.html('');
        data.filter(x => x.id_divisi == e.params.data.id)
                    .map(x => new Option (x.departement_nama, x.id_departement, false, false))
                    .forEach(x => el.append(x).trigger('change'));
    });
    
    $('#member').select2({
        placeholder : "Member Of",
        allowClear : true
    });
});
</script>