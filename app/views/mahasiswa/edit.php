<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>

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

    <h2>Edit Mahasiswa</h2>

    
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

    <form action="<?= BASEURL; ?>/mahasiswa/update/<?= $mahasiswa['id']; ?>" method="POST">

       
        <input type="hidden" name="id"
            value="<?= $mahasiswa['id']; ?>">

      
        <label>NPM</label>
        <input type="text" name="npm"
            value="<?= $mahasiswa['npm']; ?>" required>

       
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap"
            value="<?= $mahasiswa['nama_lengkap']; ?>" required>

       
        <label>Fakultas</label>
        <input type="text" name="fakultas"
            value="<?= $mahasiswa['fakultas']; ?>">

       
        <label>Jurusan</label>

        <select name="jurusan" required>

            <option value="Teknik Informatika"
                <?= ($mahasiswa['jurusan'] == 'Teknik Informatika') ? 'selected' : ''; ?>>
                Teknik Informatika
            </option>

            <option value="Sistem Informasi"
                <?= ($mahasiswa['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>
                Sistem Informasi
            </option>

        </select>

       
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir"
            value="<?= $mahasiswa['tempat_lahir']; ?>">

      
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir"
            value="<?= $mahasiswa['tanggal_lahir']; ?>">

       
        <label>Jenis Kelamin</label>

        <div class="radio-group">

            <input type="radio"
                name="jenis_kelamin"
                value="Laki-laki"
                <?= ($mahasiswa['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?>>
            Laki-laki

            <input type="radio"
                name="jenis_kelamin"
                value="Perempuan"
                <?= ($mahasiswa['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>>
            Perempuan

        </div>

       
        <button type="submit">
            Update
        </button>

    </form>

</div>

</body>
</html>