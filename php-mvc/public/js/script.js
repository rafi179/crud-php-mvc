$(function(){
    // tombol Tambah
    $('.tombolTambah').on('click', function(){
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        // mengkosongkan isi input di modal Tambah data
        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('Pilih Jurusan');
    });
    // tombol Ubah
    $('.tombolUbah').on('click', function(){
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        // mengambil isi href kemudian ganti isi attribut action di form
        const href = $(this).attr('href');
        $('.modal-content form').attr('action', href)
        // mengambil id lewat attribut data-id
        const id = $(this).data('id');
        // melakukan request data lewat ajax
        $.ajax({
            url: 'http://localhost:8080/php-mvc/public/mahasiswa/getEdit',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                // menampilkan data ke input ubah data
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
            }
        });
    });
    // tombol Hapus
    $('.tombolHapus').on('click', function(e){
        // mematikan href jika ingin menggunakan sweetalert
        e.preventDefault();
        // mengambil nilai attrubut href 
        const href = $(this).attr('href');
        // sweetalert confirm
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data Mahasiswa akan dihapus",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus data!'
           }).then((result) => {
            if (result.value) {
                // pindah ke halaman delete jika di konfirmasi
                document.location.href = href;
            }
        });
    });
});