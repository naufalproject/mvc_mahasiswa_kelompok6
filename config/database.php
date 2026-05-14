<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'uniska_latihan_mvc_2026');
define('DB_USER', 'root');
define('DB_PASS', '');

// Fungsi ini opsional jika kamu sudah punya class Database di folder core
function getConnection() {
    try {
        // Gunakan konstanta yang sudah di-define di atas
        $conn = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

    } catch (PDOException $e) {
        die("Koneksi database gagal: " . $e->getMessage());
    }
}