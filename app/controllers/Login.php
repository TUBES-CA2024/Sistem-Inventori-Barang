<?php

class Login extends Controller {
    public function index(){
        session_start();
        
        // Cek apakah pengguna sudah login, jika ya, redirect ke halaman Beranda
        if (isset($_SESSION['email'])) {
            header("Location:" . BASEURL . "/Beranda");
            exit;
        }

        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('Login/index');
        $this->view('templates/footer');
    }
        
    public function login(){
        $email = $_POST['email'];
        $password = $_POST['kata-sandi'];    
        
        $data['login'] = $this->model("User_model")->getUser($email, $password);
        
        session_start();
        if ($data['login'] == NULL) {
            echo "<script>alert('email dan password tidak terdaftar');window.location='" . BASEURL . "/';</script>";
            exit;
        } else {
            // Perbaikan: $_SESSION['email'] harus diisi dengan $email, bukan $data['email']['password']
            $_SESSION['email'] = $email;
            header("Location:" . BASEURL . "/Beranda");
        }
    }
}
