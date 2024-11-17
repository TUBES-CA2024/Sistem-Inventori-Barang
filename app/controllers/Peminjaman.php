<?php
class peminjaman extends Controller{
    public function index(){

        $data['judul'] = 'Peminjaman';
        $data['id_user'] = $_SESSION['id_user'];
        $data['profile'] = $this->model("User_model")->profile($data);

        $this->view('templates/header', $data);
        $this->view('Peminjaman/index', $data);
        $this->view('templates/footer');
    }
}