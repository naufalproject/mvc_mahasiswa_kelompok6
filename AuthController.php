<?php

class AuthController extends Controller
{
    // ================= HALAMAN LOGIN =================

   public function login()
{
    $data['title'] = 'Login';

    $this->view('auth/login', $data);
}

    // ================= PROSES LOGIN =================

    public function loginProcess()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }

        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $userModel = $this->model('User');

        $user = $userModel->findByUsername($username);

        if ($user) {

            // password tanpa hash
            if ($password == $user['password']) {

                $_SESSION['user'] = [

                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']

                ];

                header('Location: ' . BASEURL . '/mahasiswa/index');
                exit;
            }
        }

        $_SESSION['error'] = 'Username atau password salah!';

        header('Location: ' . BASEURL . '/auth/login');
        exit;
    }

    // ================= LOGOUT =================

    public function logout()
    {
        session_destroy();

        header('Location: ' . BASEURL . '/auth/login');
        exit;
    }
}