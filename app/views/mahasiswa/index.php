<div class="container mt-4">

    <h2 class="text-center mb-4">Data Mahasiswa</h2>

    <form method="GET" action="<?= BASEURL; ?>/mahasiswa/index" class="row g-2 mb-3">

        <div class="col-md-4">
            <input type="text" name="search" class="form-control"
                placeholder="Cari NPM / Nama"
                value="<?= isset($search) ? $search : ''; ?>">
        </div>

        <div class="col-md-3">
            <select name="jurusan" class="form-select">
                <option value="">Semua Jurusan</option>
                <option value="Teknik Informatika"
                    <?= (isset($jurusan) && $jurusan == 'Teknik Informatika') ? 'selected' : ''; ?>>
                    Teknik Informatika
                </option>
                <option value="Sistem Informasi"
                    <?= (isset($jurusan) && $jurusan == 'Sistem Informasi') ? 'selected' : ''; ?>>
                    Sistem Informasi
                </option>
            </select>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Cari</button>
        </div>

        <div class="col-md-2">
            <a href="<?= BASEURL; ?>/mahasiswa/index" class="btn btn-secondary w-100">Reset</a>
        </div>

    </form>

    <a href="<?= BASEURL; ?>/mahasiswa/create" class="btn btn-success mb-3">
        Tambah Mahasiswa
    </a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $mhs['npm']; ?></td>
                <td><?= $mhs['nama_lengkap']; ?></td>
                <td><?= $mhs['jurusan']; ?></td>
                <td><?= $mhs['tanggal_lahir_format']; ?></td>
                <td>
                    <a href="<?= BASEURL; ?>/mahasiswa/edit/<?= $mhs['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/delete/<?= $mhs['id']; ?>"
                        onclick="return confirm('Yakin?')"
                        class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>