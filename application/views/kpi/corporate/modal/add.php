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
.select2-container.select2-container-disabled .select2-choice {
  background-color: #ddd;
  border-color: #a8a8a8;
}

.table {
  table-layout: fixed;
  word-wrap: break-word;
}

#periode{
    color : #fff;

}

</style>

<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Tambah Corporate</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'kpi/corporate/action/insert' ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Periode</label>
                        <div class="col-lg-10"><input type="text" id="basicDate" name="output" placeholder="Select Periode . . . " class="form-control" data-input></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Kategori</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" required name="kategori" id="kategori" style="width:100%">
                            <option disabled selected value></option>
                            <?php foreach($kategori as $g): ?>
                                <option value="<?= $g{'id_kategori'} ?>"><?= $g{'kategori_nama'} ?></option>
                            <?php endforeach ; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Isi</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" required name="perspektife" id="perspektife" style="width:100%">
                            <option disabled selected value=""></option>
                            
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Target</label>
                        <div class="col-lg-10"><input type="text" required name="target" id="target" placeholder="Masukan Target Corporate" class="form-control num"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Satuan</label>
                        <div class="col-lg-10"><input type="text" required name="satuan" placeholder="Masukan Satuan Target" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Bobot</label>
                        <div class="col-lg-10">
                            <input type="text" required name="bobot" placeholder="Masukan Bobot Penilaian" class="form-control num">
                            <!-- <span id="note"></span> -->
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Cara Hitung</label>
                        <div class="col-lg-10">
                            <input type="hidden" value="<?= $nama ?>" required name="nama">
                            <input type="hidden" value="<?= $id_user ?>" required name="user">
                            <textarea name="keterangan" cols="106" rows="2" placeholder="Masukan Keterangan Corporate"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Penilaian</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" required name="penilaian" id="penilaian" style="width:100%">
                                <option disabled selected value></option>
                                <option value="Persentase">Persentase</option>
                                <option value="Jumlah">Jumlah</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group" id="nilai">
                    <div class="form-group">
                        <div class="bsc-tbl-cls">
                            <table class="table table-cl table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="background-color:#f0ad4e">4</th>
                                        <th class="text-center" style="background-color:#f0ad4e">5</th>
                                        <th class="text-center" style="background-color:#f0ad4e">6</th>
                                        <th class="text-center" style="background-color:#22bb33">7</th>
                                        <th class="text-center" style="background-color:#22bb33">8</th>
                                        <th class="text-center" style="background-color:#22bb33">9</th>
                                        <th class="text-center" style="background-color:#22bb33">10</th>
                                        <th class="text-center" style="background-color:#5bc0de">11</th>
                                        <th class="text-center" style="background-color:#5bc0de">12</th>
                                        <th class="text-center" style="background-color:#5bc0de">13</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    <tr>
                                        <td class="text-center"><input name="n1" required id="n1" data-index="1" style="background-color:#464552" type="text" class="form-control num indicator"></td>
                                        <td class="text-center"><input name="n2" id="n2" data-index="2" style="background-color:#464552" type="text" class="form-control num indicator"></td>
                                        <td class="text-center"><input name="n3" id="n3" data-index="3" style="background-color:#464552" type="text" class="form-control num indicator"></td>
                                        <td class="text-center"><input name="n4" id="n4" data-index="4" style="background-color:#464552" type="text" class="form-control num indicator"></td>
                                        <td class="text-center"><input name="n5" id="n5" data-index="5" style="background-color:#464552" type="text" class="form-control num indicator"></td>
                                        <td class="text-center"><input name="n6" id="n6" data-index="6" style="background-color:#464552" type="text" class="form-control num indicator"></td>
                                        <td class="text-center"><input name="n7" id="n7" data-index="7" style="background-color:#464552" readonly type="text" class="form-control"></td>
                                        <td class="text-center"><input name="n8" id="n8" data-index="8" style="background-color:#464552" type="text" class="form-control num indicator"></td>
                                        <td class="text-center"><input name="n9" id="n9" data-index="9" style="background-color:#464552" type="text" class="form-control num indicator"></td>
                                        <td class="text-center"><input name="n10" id="n10" data-index="10" style="background-color:#464552" type="text" class="form-control num indicator"></td>
                                    </tr>
                                </tbody>
                            </table>
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
    var perspektife = <?= json_encode($perspektife) ?>;
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth();
    var date = now.getDate();
    var start = new Date(year, month + 1);
    var end = new Date(year + 1, month);
    
    $("#basicDate").flatpickr({
        altInput: false,
        enableTime: false,
        dateFormat: "F Y",
        minDate : start,
        maxDate : end
    });

    $('#kategori').select2({
        placeholder : "Pilih Kategori"
    });
    
    $('#penilaian').select2({
        disabled: 'readonly',
        placeholder : "Pilih Kategori Penilaian"
    });

    var initPerspektife = (perspektife) => {
        $('#perspektife').select2({
            disabled: 'readonly',
            tags:true,
            placeholder : "Pilih Isi Perspektife",
            perspektife
        });
    }

    initPerspektife();
    $('#kategori').val(null).trigger('change');
    $(document).on('select2:select','#kategori', function (e) {
    $('#perspektife').prop("disabled", false);
        $('#perspektife').html('');
        perspektife.filter(x => x.id_kategori == e.params.data.id)
                    .map(x => new Option (x.corporate_nama, x.id_corporate, false, false))
                    .forEach(x => $('#perspektife').append(x).trigger('change'));

    });

    $(document).on('keydown','.num', function(e){
        -1!==$
        .inArray(e.keyCode,[46,8,9,27,13,110,190,189]) || /65|67|86|88/
        .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
        || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
        && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
    });

    
    $(document).on('keyup','#target', function(e){
        if($(this).val() != ''){
            $('#penilaian').prop("disabled", false);
        }else{
            $('#penilaian').prop("disabled", true);
            $('#penilaian').val(null).trigger('change');
            $('#n7').val(null);
        }
    });
    
    $('.indicator').prop("disabled", true);
    $(document).on('select2:select','#penilaian', function (e) {
        $('.indicator').prop("disabled", false);
        if(e.params.data.id == 'Persentase'){
            $('#n7').val(100);
        }else{
            $('#n7').val($('#target').val());
        }
    });
    
});
</script>