<?php

class profil extends Controller{
    public function index(){

        $data['judul'] = 'Profil';

        $this->view('templates/header', $data);
        $this->view('Profil/index');
        $this->view('templates/footer');
    }
}

?>