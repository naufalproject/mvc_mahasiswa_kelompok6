<?php

class Controller
{
    public function view($view, $data = [])
    {
        // 1. Ekstrak data agar bisa langsung dipanggil di view
        extract($data);

        // 2. Tentukan jalur file view
        $viewFile = '../app/views/' . $view . '.php';

        if (file_exists($viewFile)) {
            
            // 3. Ambil isi konten halaman menggunakan Output Buffering
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();

            // 4. Panggil Header (di sini CSS Bootstrap dimuat)
            require_once '../app/views/layouts/header.php';

            // 5. Tampilkan Flash Message (gunakan fungsi flash yang sudah ada)
            $this->flash();

            // 6. Tampilkan isi Konten
            echo $content;

            // 7. Panggil Footer
            require_once '../app/views/layouts/footer.php';

        } else {
            echo "View <b>$view</b> tidak ditemukan!";
        }
    }

    public function model($model)
    {
        $modelFile = '../app/models/' . $model . '.php';

        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $model;
        } else {
            echo "Model <b>$model</b> tidak ditemukan!";
        }
    }

    public function formatTanggalIndonesia($tanggal)
    {
        $bulan = [
            1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $pecah = explode('-', $tanggal);
        return $pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0];
    }

    public function setFlash($type, $message)
    {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public function flash()
    {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            // Menggunakan class Bootstrap agar lebih cantik
            $alertType = ($flash['type'] == 'Success') ? 'success' : 'danger';
            
            echo "
            <div class='container mt-3'>
                <div class='alert alert-{$alertType} alert-dismissible fade show' role='alert'>
                    <strong>{$flash['type']}!</strong> {$flash['message']}
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            </div>
            ";

            unset($_SESSION['flash']);
        }
    }
}