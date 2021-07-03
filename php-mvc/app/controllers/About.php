<?php
// membuat kelas About yang extends ke kelas Controller
class About extends Controller{
    // index
    public function index($nama = 'Rafi gunawan', $pekerjaan = 'Mahasiswa', $umur = 21){
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About';
        $this->view('layouts/header', $data);
        $this->view('about/index', $data);
        $this->view('layouts/footer');
    }

    // page
    public function page()
    {
        $data['judul'] = 'Pages';
        $this->view('layouts/header', $data);
        $this->view('about/page', $data);
        $this->view('layouts/footer');
    }
}