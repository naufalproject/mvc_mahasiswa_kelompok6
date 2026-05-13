<?php

class MahasiswaController extends Controller
{
    public function index()
    {
        $model = $this->model('Mahasiswa');
        
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $jurusan = isset($_GET['jurusan']) ? trim($_GET['jurusan']) : '';

        if (!empty($search) || !empty($jurusan)) {
            $data['mahasiswa'] = $model->searchAndFilter($search, $jurusan);
        } else {
            $data['mahasiswa'] = $model->getAll();
        }

        foreach ($data['mahasiswa'] as &$mhs) {
            $mhs['tanggal_lahir_format'] = $this->formatTanggalIndonesia($mhs['tanggal_lahir']);
        }

        $data['title'] = 'Daftar Mahasiswa'; // Set judul halaman
        $data['search'] = $search;
        $data['jurusan'] = $jurusan;

        $this->view('mahasiswa/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Mahasiswa';
        $this->view('mahasiswa/create', $data);
    }

    public function store()
    {
    
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {

        header('Location: ' . BASEURL . '/mahasiswa/create');
        exit;
    }

    
    $data = [
        'npm' => trim($_POST['npm']),
        'nama_lengkap' => trim($_POST['nama_lengkap']),
        'fakultas' => trim($_POST['fakultas']),
        'jurusan' => trim($_POST['jurusan']),
        'tempat_lahir' => trim($_POST['tempat_lahir']),
        'tanggal_lahir' => trim($_POST['tanggal_lahir']),
        'jenis_kelamin' => trim($_POST['jenis_kelamin']),
        'status_id' => 1
    ];

    
    $_SESSION['old'] = $data;

    
    $errors = [];

    
    if (empty($data['npm'])) {
        $errors[] = "NPM tidak boleh kosong";
    }

    
    if (empty($data['nama_lengkap'])) {
        $errors[] = "Nama lengkap tidak boleh kosong";
    }

    
    $jurusanValid = [
        'Teknik Informatika',
        'Sistem Informasi'
    ];

    if (!in_array($data['jurusan'], $jurusanValid)) {
        $errors[] = "Jurusan tidak valid";
    }

    
    $jkValid = [
        'Laki-laki',
        'Perempuan'
    ];

    if (!in_array($data['jenis_kelamin'], $jkValid)) {
        $errors[] = "Jenis kelamin tidak valid";
    }

    
    $model = $this->model('Mahasiswa');

    
    if ($model->checkNPM($data['npm'])) {
        $errors[] = "NPM sudah digunakan";
    }

    
    if (!empty($errors)) {

        $_SESSION['error'] = $errors;

        header('Location: ' . BASEURL . '/mahasiswa/create');
        exit;
    }

   
    $result = $model->create($data);

    if ($result) {

        $this->setFlash('Success', 'Data mahasiswa berhasil ditambahkan');

        unset($_SESSION['old']);

        header('Location: ' . BASEURL . '/mahasiswa/index');
        exit;

    } else {

        $this->setFlash('Error', 'Gagal menyimpan data');

        header('Location: ' . BASEURL . '/mahasiswa/create');
        exit;
    }
    }

    public function edit($id)
    {
    $model = $this->model('Mahasiswa');

    $mahasiswa = $model->find($id);

    if (!$mahasiswa) {

        $this->setFlash('Error', 'Data tidak ditemukan');

        header('Location: ' . BASEURL . '/mahasiswa/index');
        exit;
    }

    $data['mahasiswa'] = $mahasiswa;

    $this->view('mahasiswa/edit', $data);
    }

    public function update($id)
    {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {

        header('Location: ' . BASEURL . '/mahasiswa/index');
        exit;
    }

    $data = [
        'npm' => trim($_POST['npm']),
        'nama_lengkap' => trim($_POST['nama_lengkap']),
        'fakultas' => trim($_POST['fakultas']),
        'jurusan' => trim($_POST['jurusan']),
        'tempat_lahir' => trim($_POST['tempat_lahir']),
        'tanggal_lahir' => trim($_POST['tanggal_lahir']),
        'jenis_kelamin' => trim($_POST['jenis_kelamin']),
        'status_id' => 1
    ];

    $errors = [];

    if (empty($data['npm'])) {
        $errors[] = "NPM tidak boleh kosong";
    }

    if (empty($data['nama_lengkap'])) {
        $errors[] = "Nama lengkap tidak boleh kosong";
    }

    $jurusanValid = [
        'Teknik Informatika',
        'Sistem Informasi'
    ];

    if (!in_array($data['jurusan'], $jurusanValid)) {
        $errors[] = "Jurusan tidak valid";
    }

    $jkValid = [
        'Laki-laki',
        'Perempuan'
    ];

    if (!in_array($data['jenis_kelamin'], $jkValid)) {
        $errors[] = "Jenis kelamin tidak valid";
    }

    if (!empty($errors)) {

        $this->setFlash('Error', implode(', ', $errors));

        header('Location: ' . BASEURL . '/mahasiswa/edit/' . $id);
        exit;
    }

    $model = $this->model('Mahasiswa');

    $result = $model->update($id, $data);

    if ($result) {

        $this->setFlash('Success', 'Data berhasil diupdate');

    } else {

        $this->setFlash('Error', 'Gagal update data');
    }

    header('Location: ' . BASEURL . '/mahasiswa/index');
    exit;
    }

    public function delete($id)
    {
    $model = $this->model('Mahasiswa');

    $result = $model->delete($id);

    if ($result) {

        $this->setFlash('Success', 'Data berhasil dihapus');

    } else {

        $this->setFlash('Error', 'Gagal menghapus data');
    }

    header('Location: ' . BASEURL . '/mahasiswa/index');
    exit;
    }

    

}