<?php 
// membuat kelas modal untuk mahasiswa
class Mahasiswa_model{
    // properti database 
    private $tabel = 'table_mahasiswa';
    private $db;
    // constructor
    public function __construct(){
        // membuat object database
        $this->db = new Database();
    }
    // fungsi mengabil semua data di database
    public function getAllMahasiswa(){
        // melakukan prepare query
        $this->db->query('SELECT * FROM '. $this->tabel);
        // eksekusi query dan mengambil semua data mahasiswa
        return $this->db->resultAll();
    }
    // fungsi mengabil satu data di database
    public function getMahasiswaById($id){
        // melakukan prepare query
        $this->db->query('SELECT * FROM '. $this->tabel.' WHERE id=:id');
        // melakukan binding value id
        $this->db->bind('id', $id);
        // eksekusi query dan mengambil satu data mahasiswa
        return $this->db->single();
    }
    // fungsi tambah data mahasiswa 
    public function addMahasiswa($data){
        $this->db->query("INSERT INTO $this->tabel VALUES ('' , :nim, :nama, :email, :jurusan)");

        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    // fungsi hapus data Mahasiswa
    public function deleteMahasiswa($id){
        $this->db->query("DELETE FROM $this->tabel WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    // fungsi Update data mahasiswa 
    public function updateMahasiswa($id, $data){
        $this->db->query("UPDATE $this->tabel SET nim=:nim, nama=:nama, email=:email, jurusan=:jurusan WHERE id=:id");
        
        $this->db->bind('id', $id);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    // fungsi mengabil satu data di database
    public function cariMahasiswa($keyword){
    // melakukan prepare query
    $this->db->query("SELECT * FROM $this->tabel WHERE nama LIKE :keyword");
    // melakukan binding value id
    $this->db->bind('keyword', "%$keyword%");
    // eksekusi query dan mengambil satu data mahasiswa
    return $this->db->resultAll();
    }
}