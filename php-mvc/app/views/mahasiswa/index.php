<div class="container mt-4">
    <div class="row mb-3">
      <div class="col-6">
        <button type="button" class="btn btn-primary tombolTambah" data-toggle="modal" data-target="#formModal">
              Tambah Data Mahasiswa
        </button>
      </div>
    </div>
    <div class="row">
      <div class="div col-6">
        <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari mahasiswa..." name="keyword" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h1 class="my-3">Daftar Mahasiswa</h1>
            <?php foreach ($data['mhs'] as $mhs) : ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right ml-1 tombolHapus">Hapus</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success float-right ml-1 tombolUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a>
                        <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right ml-1">Detail</a>
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
      <div class="modal-body">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukan nama" name="nama">
        </div>
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="number" class="form-control" id="nim" placeholder="Masukan nim" name="nim">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Masukan email" name="email">
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
            <option disabled selected class="defaultOption">Pilih Jurusan</option>
            <option value="Teknik Komputer">Teknik Komputer</option>
            <option value="Teknik Mesin">Teknik Mesin</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Elektronika">Teknik Elektronika</option>
            <option value="Perhotelan">Perhotelan</option>
            <option value="Akutansi">Akutansi</option>
            <option value="Farmasi">Farmasi</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
      </div>
    </form>
    </div>
  </div>
</div>