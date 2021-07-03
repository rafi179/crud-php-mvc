<?php
// membuat controller untuk mahasiswa
class Mahasiswa extends Controller{
    // index
    public function index(){
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('layouts/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('layouts/footer');
    }
    // detail mahasiswa
    public function detail($id){
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('layouts/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('layouts/footer');
    }
    // tambah data mahasiswa
    public function tambah(){
        if($this->model('Mahasiswa_model')->addMahasiswa($_POST) > 0){
            header('Location: ' . BASEURL . '/mahasiswa');
            Flasher::setFlasher('Berhasil', 'ditambahkan', 'success');
            exit;
        }else{
            header('Location: ' . BASEURL . '/mahasiswa');
            Flasher::setFlasher('Gagal', 'ditambahkan', 'danger');
            exit;
        }
    }
    // Hapus data mahasiswa
    public function hapus($id){
        if($this->model('Mahasiswa_model')->deleteMahasiswa($id) > 0){
            header('Location: ' . BASEURL . '/mahasiswa');
            Flasher::setFlasher('Berhasil', 'dihapus', 'success');
            exit;
        }else{
            header('Location: ' . BASEURL . '/mahasiswa');
            Flasher::setFlasher('Gagal', 'dihapus', 'danger');
            exit;
        }
    }
    // Ubah Data mahasiswa
    public function ubah($id){
        if($this->model('Mahasiswa_model')->updateMahasiswa($id, $_POST) > 0){
            header('Location: ' . BASEURL . '/mahasiswa');
            Flasher::setFlasher('Berhasil', 'diubah', 'success');
            exit;
        }else{
            header('Location: ' . BASEURL . '/mahasiswa');
            Flasher::setFlasher('Gagal', 'diubah', 'danger');
            exit;
        }
    }
    // mengambil satu data mahasiswa dengan tipe data json
    public function getEdit(){
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }
    // fungsi cari data mahasiswa
    public function cari(){
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariMahasiswa($_POST['keyword']);
        $this->view('layouts/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('layouts/footer');
    } 
}