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

    public function exportCSV()
{
    $model = $this->model('Mahasiswa');

    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $jurusan = isset($_GET['jurusan']) ? trim($_GET['jurusan']) : '';

    if (!empty($search) || !empty($jurusan)) {
        $mahasiswa = $model->searchAndFilter($search, $jurusan);
    } else {
        $mahasiswa = $model->getAll();
    }

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="data_mahasiswa.csv"');

    $output = fopen('php://output', 'w');

    fputcsv($output, [
        'ID',
        'NPM',
        'Nama Lengkap',
        'Fakultas',
        'Jurusan',
        'Tempat Lahir',
        'Tanggal Lahir',
        'Jenis Kelamin',
        'Status'
    ]);

    foreach ($mahasiswa as $mhs) {

        fputcsv($output, [
            $mhs['id'],
            $mhs['npm'],
            $mhs['nama_lengkap'],
            $mhs['fakultas'],
            $mhs['jurusan'],
            $mhs['tempat_lahir'],
            $mhs['tanggal_lahir'],
            $mhs['jenis_kelamin'],
            $mhs['status_id'] == 1 ? 'Aktif' : 'Nonaktif'
        ]);
    }

    fclose($output);
    exit;
}

public function exportPDF()
{
    require_once '../vendor/autoload.php';

    $model = $this->model('Mahasiswa');

    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $jurusan = isset($_GET['jurusan']) ? trim($_GET['jurusan']) : '';

    if (!empty($search) || !empty($jurusan)) {
        $mahasiswa = $model->searchAndFilter($search, $jurusan);
    } else {
        $mahasiswa = $model->getAll();
    }

    $html = '
    <h2 style="text-align:center;">Data Mahasiswa</h2>

    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>';

    $no = 1;

    foreach ($mahasiswa as $mhs) {

        $html .= '
        <tr>
            <td>'.$no++.'</td>
            <td>'.$mhs['npm'].'</td>
            <td>'.$mhs['nama_lengkap'].'</td>
            <td>'.$mhs['jurusan'].'</td>
            <td>'.$mhs['jenis_kelamin'].'</td>
        </tr>';
    }

    $html .= '
        </tbody>
    </table>';

    $dompdf = new \Dompdf\Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $dompdf->stream('data_mahasiswa.pdf', [
        'Attachment' => true
    ]);
}

    

}