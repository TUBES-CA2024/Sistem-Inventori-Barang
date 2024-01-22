<?php

class Login extends Controller {
    public function index(){
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
        }else{
            $_SESSION['nama'] = $data['login']['nama'];
            header("Location:" . BASEURL . "/Beranda");
        }
    }

}