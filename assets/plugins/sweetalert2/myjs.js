const flashData = $('.flash-data').data('flashdata');

if(flashData){
    Swal.fire({
        title:'Sukses',
        text: flashData,
        icon: 'success',
        type:'success'
    })
}

const flashGagal = $('.flash-data-gagal').data('flashdatagagal');
 
if (flashGagal) {
    Swal.fire({
        title: 'Gagal',
        text: flashGagal,
        icon: 'error',
        type: 'error'
    });
}
 
const daftar = $('.flash-daftar').data('flashdaftar');
 
if (daftar) {
    Swal.fire({
        title: 'Sukses',
        text: 'Daftar Berhasil!',
        icon: 'success',
        type: 'success'
    });
}

// tombol-hapus
$('.btn-danger').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah Anda yakin akan menghapus data?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
 
});