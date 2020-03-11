const status = $('.notif-data').data('notif');
console.log(status)
if(status){
    Swal.fire({
        title : 'Tunggu Sebentar Saja !!!',
        html : 'Sedang Proses Selama <b></b> detik.',
        allowOutsideClick :false,
        allowEscapeKey :false,
        allowEnterKey :false,
        timer: 1000,
        timerProgressBar: true,
        onBeforeOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
                const content = Swal.getContent()
                if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                        b.textContent = Swal.getTimerLeft()
                    }
                }
            }, 100)
        },onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        if(result.dismiss === Swal.DismissReason.timer){
            if(status == "gagal"){
                Swal.fire({
                    title: 'Username Atau Password Tidak Terdaftar',
                    text: 'Coba Ulangi Kembali!!!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2500
                })
            }
        }else{
            Swal.fire({
                title: 'Terjadi Kesalahan Coba Ulangi Kembali',
                text: '',
                icon: 'info',
                showConfirmButton: false,
                timer: 2000,
            })
        }
    });
}