<?php
// Load file koneksi database
require_once '../config/database.php';

try {
    // Panggil fungsi koneksi
    $conn = getConnection();

    if ($conn) {
        echo "Koneksi berhasil";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}