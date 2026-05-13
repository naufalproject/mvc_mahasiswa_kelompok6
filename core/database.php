<?php

class Database
{
    private static $conn = null;

    public static function getConnection()
    {
        if (self::$conn === null) {

            require_once '../config/database.php';

            try {

                self::$conn = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                    DB_USER,
                    DB_PASS
                );

                self::$conn->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );

            } catch (PDOException $e) {

                die("Koneksi database gagal: " . $e->getMessage());
            }
        }

        return self::$conn;
    }
}