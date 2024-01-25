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
        }else{
         echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Maaf !</strong> Mohon periksa kembali inputan Anda karena terdapat kesalahan.
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>';

        // Pindahkan logika tampilan pesan kesalahan ke bagian tampilan yang sesuai
        // (mungkin menggunakan template engine atau langsung di bagian HTML)


        }
    }
        
}