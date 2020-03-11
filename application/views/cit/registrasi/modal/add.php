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
        <p class="heading lead col-md-8">Tambah Perusahaan</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" enctype="multipart/form-data" id="regis">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10"><input type="email" required id="email" name="email" placeholder="Masukan Email Perusahaan" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Jenis</label>
                        <div class="col-lg-10">
                            <select class="js-example-basic-single" name="jenis" id="jenis" style="width:100%">
                            <option></option>
                            <?php foreach($jenus as $g): ?>
                                <option value="<?= $g{'id_jenus'} ?>"><?= $g{'jenus_nama'} ?></option>
                            <?php endforeach ; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Nama</label>
                        <div class="col-lg-10"><input type="text" required name="nama" placeholder="Masukan Nama Perusahaan" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Alamat</label>
                        <div class="col-lg-10">
                            <textarea name="alamat" cols="88" rows="3" placeholder="Masukan Alamat Perusahaan"></textarea>
                            <!-- <input type="text" required name="nama" placeholder="Masukan Nama Perusahaan" class="form-control"> -->
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Telepon</label>
                        <div class="col-lg-10"><input type="text" required name="telp" placeholder="Masukan Telepon Perusahaan" class="form-control"></div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Logo</label>
                        <div class="col-lg-10"><input type="file" accept="image/*" style="height:auto" name="logo" class="form-control"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" id="simpan" class="btn btn-primary rounded btn-lg btn-block"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!--Footer-->
</div>

<script>
$(document).ready(function() {
    $('#jenis').select2({
        placeholder : "Pilih Jenis Perusahaan",
        allowClear : true
    });

    $('#regis').submit(function(e){
        e.preventDefault();
        var data = new FormData($(this)[0]);
        var email = $('#email').val();
        Swal.fire({
            width: '600px',
            title: 'Mengirim Pesan '+email+' !!!',
            allowOutsideClick :false,
            allowEscapeKey :false,
            allowEnterKey :false,
            confirmButtonText: 'Send',
            showLoaderOnConfirm: true,
            preConfirm: function(regis){
                return $.ajax({
                        url: '<?php echo base_url() ?>lubangenak/registrasi/insert',
                        type : 'POST',
                        data : data,
                        contentType : false,
                        processData : false
                    });
            },
            allowOutsideClick: () => !Swal.isLoading(),
        }).then(function(regis){
            if(regis.value == 'true'){
                Swal.fire({
                    title: 'Pesan Berhasil Terkirim ',
                    text: '',
                    icon: 'success',
                    customClass: "myClass",
                    allowOutsideClick :false,
                    allowEscapeKey :false,
                    allowEnterKey :false,
                    showConfirmButton: false,
                    timer: 2500
                }).then((result) => {
                    window.location.href = "<?php echo base_url() ?>lubangenak/registrasi"
                })
            }else{
                Swal.fire({
                    title: email+' Sudah Tersedia',
                    text: '',
                    icon: 'error',
                    customClass: "myClass",
                    showConfirmButton: false,
                    timer: 2500
                })
            }
        });
    });
});
</script>