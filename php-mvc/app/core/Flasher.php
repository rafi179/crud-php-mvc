<?php
// class Flasher
class Flasher{
    // fungsi set Flash message
    public static function setFlasher($pesan, $aksi, $tipe){
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }
    // fungsi memanggil flash message
    public static function flash(){
        if (isset($_SESSION['flash'])){
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">Data Mahasiswa 
                    <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi']. '.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

            unset($_SESSION['flash']);
        }
    }
    // flash message sweetalert
    public static function getSweetFlash(){
        if(isset($_SESSION['flash'])){
            $aksi = $_SESSION['flash']['aksi'];
            $tipe = $_SESSION['flash']['tipe'];
            $pesan = $_SESSION['flash']['pesan'];
            $sweetalert = "<script>
                Swal.fire({
                    title: '$pesan',
                    text: 'Data mahasiswa berhasil $aksi',
                    icon: '$tipe',
                    confirmButtonColor: '#007BFF'
                });
            </script>";
            echo $sweetalert;
            unset($_SESSION['flash']);
        }
    }
}