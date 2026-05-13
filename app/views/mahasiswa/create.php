<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 500px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
        }

        .radio-group {
            margin-top: 10px;
        }

        button {
            margin-top: 15px;
            padding: 10px 15px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Form Tambah Mahasiswa</h2>

    <?php

if (isset($_SESSION['flash'])) {

    echo "
    <div style='
        padding:10px;
        margin-bottom:15px;
        border:1px solid #ccc;
        background-color:#f2f2f2;
    '>
        <strong>" . $_SESSION['flash']['type'] . ":</strong>
        " . $_SESSION['flash']['message'] . "
    </div>
    ";

    unset($_SESSION['flash']);
}
?>

    <form action="<?= BASEURL; ?>/mahasiswa/store" method="POST">

        <!-- NPM -->
        <label>NPM</label>
        <input type="text" name="npm" required>

        <!-- Nama Lengkap -->
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" required>

        <!-- Fakultas -->
        <label>Fakultas</label>
        <input type="text" name="fakultas">

        <!-- Jurusan -->
        <label>Jurusan</label>
        <select name="jurusan" required>
            <option value="">-- Pilih Jurusan --</option>
            <option value="Teknik Informatika">
                Teknik Informatika
            </option>
            <option value="Sistem Informasi">
                Sistem Informasi
            </option>
        </select>

        <!-- Tempat Lahir -->
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir">

        <!-- Tanggal Lahir -->
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir">

        <!-- Jenis Kelamin -->
        <label>Jenis Kelamin</label>

        <div class="radio-group">
            <input type="radio" name="jenis_kelamin" value="Laki-laki">
            Laki-laki

            <input type="radio" name="jenis_kelamin" value="Perempuan">
            Perempuan
        </div>

        <!-- Tombol Submit -->
        <button type="submit">
            Simpan
        </button>

    </form>

</div>

</body>
</html>