const status = $('.notif-data').data('notif');

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
            if(status == "simpan" || status == "hapus"){
                Swal.fire({
                    title: 'Data Berhasil Di'+status,
                    text: '',
                    icon: 'success',
                    customClass: "myClass",
                    showConfirmButton: false,
                    timer: 2500
                })
            }else if(status == 'error_regis'){
                Swal.fire({
                    title: 'Email Sudah Tersedia',
                    text: '',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000,
                    customClass: "myClass",
                })
            }else if(status == 'sama'){
                Swal.fire({
                    title: 'Password Lama Tidak Sesuai',
                    text: '',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                })
            }else if(status == 'full'){
                console.log(status)
                Swal.fire({
                    title: 'Jumlah Bobot Melebihi Maksmimum',
                    text: '',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
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