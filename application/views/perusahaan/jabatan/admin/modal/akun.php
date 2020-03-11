<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Create Account</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" id="regis" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-10">
                            <input type="email" required id="email" name="email" placeholder="Masukan Email Penggunan Akun" class="form-control">
                            <input type="hidden" required name="key" value="<?= $key ?>" class="form-control">
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
                        url: '<?php echo site_url(). 'perusahaan/admin/create' ?>',
                        type : 'POST',
                        data : data,
                        contentType : false,
                        processData : false
                    });
            },
            allowOutsideClick: () => !Swal.isLoading(),
        }).then(function(regis){
            // console.log(regis.value);
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
                    window.location.href = "<?php echo base_url() ?>perusahaan/admin"
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