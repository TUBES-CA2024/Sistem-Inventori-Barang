<?php

class Register extends Controller {
    public function index(){
        $data['judul'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('Register/index');
        $this->view('templates/footer');
    }

    public function tambah(){
        if($this->model('User_model')->tambahUser($_POST) > 0){
            header('Location: '. BASEURL . '/');
            exit;
        }
    }
        
}