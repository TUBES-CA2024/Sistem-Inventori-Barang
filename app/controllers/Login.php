<?php

class Login extends Controller {
    public function index(){   
        if(isset($_SESSION['login'])){
            header("Location:" . BASEURL . "Beranda");
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
        
        $data['cekLogin'] = $this->model("User_model")->getUser($email, $password);
        if ($data['cekLogin'] == NULL) {
            Flasher::setFlash('Email dan password', 'tidak', ' terdaftar', 'danger');
            header("Location:" . BASEURL . "Login");
            exit;
        } else {
            // Perbaikan: $_SESSION['email'] harus diisi dengan $email, bukan $data['email']['password']
            $_SESSION['email'] = $email;
            $_SESSION['id_role'] = $data['cekLogin']['id_role'];
            $_SESSION['login'] = true;
            header("Location:" . BASEURL . "Beranda");
        }
    }
}
