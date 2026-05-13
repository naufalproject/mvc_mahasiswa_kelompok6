<?php

class HomeController extends Controller
{
    public function index()
    {
        $data['judul'] = 'Halaman Home';

        $this->view('home/index', $data);
    }
}