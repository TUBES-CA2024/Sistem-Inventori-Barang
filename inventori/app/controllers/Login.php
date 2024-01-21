<?php

class Login extends Controller {
    public function index(){
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('Login/index');
        $this->view('templates/footer');
    }
}