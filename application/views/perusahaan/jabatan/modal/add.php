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
        <p class="heading lead col-md-8">Tambah Posisi Jabatan</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'perusahaan/jabatan/insert_jabatan' ?>" method="post" enctype="multipart/form-data">
                <!-- <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Level</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="level" id="level" style="width:100%">
                            <option disabled selected value></option>
                            
                            </select>
                        </div>
                    </div>
                </div> -->
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Divisi</label>
                        <div class="col-lg-9">
                            <select class="js-example-basic-single" name="divisi" id="divisi" style="width:100%">
                            <option disabled selected value></option>
                            <?php foreach($divisi as $g): ?>
                                <option value="<?= $g{'id_divisi'} ?>"><?= $g{'divisi_nama'} ?></option>
                            <?php endforeach ; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Departement</label>
                        <div class="col-lg-9">
                            <select class="js-example-basic-single" name="departement" id="departement" style="width:100%">
                            <option disabled selected value=""></option>
                            
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Parent Jabatan</label>
                        <div class="col-lg-9">
                            <select class="js-example-basic-single" name="parent" id="parent" style="width:100%">
                            <option disabled selected value=""></option>

                            </select>
                            <span id="note">* Jika tidak memiliki parent jabatan dapat dilewati</span>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nama Jabatan</label>
                        <div class="col-lg-9">
                            <select class="js-example-basic-single" name="jabatan" id="jabatan" style="width:100%">
                            <option disabled selected value=""></option>
                            
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
    // var divisi = <?= json_encode($divisi) ?>;
    var departement = <?= json_encode($departement) ?>;
    var jabatan = <?= json_encode($jabatan) ?>;
    $('#note').hide();
    $('#divisi').select2({
        placeholder : "Pilih Divisi",
        tags : true,
    });
    
    var initDepartement = (departement) => {
        $('#departement').select2({
            disabled: 'readonly',
            placeholder : "Pilih Departement",
            departement,
            tags : true,
        });
    }

    initDepartement();
    $('#divisi').val(null).trigger('change');
    $(document).on('select2:select','#divisi', function (e) {
    $('#departement').val(null).trigger('change');
        $('#departement').prop("disabled", false);
        departement.filter(x => x.id_divisi == e.params.data.id)
                    .map(x => new Option (x.departement_nama, x.id_departement, false, false))
                    .forEach(x => $('#departement').append(x).trigger('change'));
    });

    var initParent = (jabatan) => {
        $('#parent').select2({
            disabled: 'readonly',
            placeholder : "Pilih Parent Jabatan",
            tags : true,
            jabatan
        });
    }
    
    initParent();
    $('#departement').val(null).trigger('change');
    $(document).on('select2:select','#departement', function (e) {
        if($.isNumeric(e.params.data.id) == true){
            $('#parent').prop("disabled", false);
            $('#note').show();
        }
        $('#jabatan').prop("disabled", false);
        jabatan.filter(x => x.id_departement == e.params.data.id)
                    .map(x => new Option (x.jabatan_nama, x.id_jabatan, false, false))
                    .forEach(x => $('#parent').append(x).trigger('change'));       
    });

    var initJabatan = (jabatan) => {
        $('#jabatan').select2({
            disabled: 'readonly',
            placeholder : "Pilih Nama Jabatan",
            tags : true,
            jabatan
        });
    }

    initJabatan();
    $('#parent').val(null).trigger('change');
    $(document).on('select2:select','#parent', function (e) {
        $('#jabatan').prop("disabled", false);
        jabatan.filter(x => x.parent_id == e.params.data.id)
                    .map(x => new Option (x.jabatan_nama, x.parent_id, false, false))
                    .forEach(x => $('#jabatan').append(x).trigger('change'));       
    });
});
</script>