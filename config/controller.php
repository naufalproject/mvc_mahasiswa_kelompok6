<?php

class Controller
{
    // =========================
    // Load View
    // =========================
    public function view($view, $data = [])
    {
        // Ubah array menjadi variabel
        extract($data);

        // Path file view
        $viewFile = '../app/views/' . $view . '.php';

        // Cek apakah view ada
        if (file_exists($viewFile)) {

            require_once $viewFile;

        } else {

            echo "View <b>$view</b> tidak ditemukan!";
        }
    }

    // =========================
    // Load Model
    // =========================
    public function model($model)
    {
        // Path file model
        $modelFile = '../app/models/' . $model . '.php';

        // Cek apakah model ada
        if (file_exists($modelFile)) {

            require_once $modelFile;

            return new $model;

        } else {

            echo "Model <b>$model</b> tidak ditemukan!";
        }
    }
}