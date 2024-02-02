<?php

class KelolaAkun extends Controller {
    
    public function index() {
        // if(!isset($_SESSION['login'])){
        //     header("Location:" . BASEURL . "Login");
        //     exit;
        // }
        $data['judul'] = 'Kelola Akun';
        
        // Mengambil data kondisi barang dari model
        $userModel = $this->model('User_model');

        $data['dataTampilUser']= $userModel->tampilUser();

        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Kelola_akun/index', $data);
        $this->view('templates/footer');
    }


    public function hapusUser($id_user){
        if($this->model('User_model')->hapusUser($id_user) > 0){
            Flasher::setFlash('User', 'berhasil', ' dihapus', 'success');
            header('Location: '. BASEURL . 'Kelola_akun');
            exit;
        }else{
            Flasher::setFlash('User', 'gagal', ' dihapus', 'danger');
            header('Location: '. BASEURL . 'Kelola_akun');
            exit;
        }
    }

    public function getUbah(){
       echo json_encode( $this->model('User_model')->getUbah($_POST['id_user']));
    }

    public function ubahUser(){
            if($this->model('User_model')->updateUser($_POST) > 0){
                Flasher::setFlash('Data User', 'berhasil', ' diUbah', 'success');
                header('Location: '. BASEURL . 'Kelola_akun');
                exit;
            } else {
            Flasher::setFlash('User_model', 'gagal', ' diUbah', 'danger');
            header('Location: '. BASEURL . 'Kelola_akun');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = 'Data User';
        
        // Mengambil data kondisi barang dari model
        $tampilUser = $this->model('User_model');

        $data['dataTampilUser']= $tampilUser->cariUser();

        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Kelola_akun/index', $data);
        $this->view('templates/footer');
    }

    public function getRole(){
        echo json_encode( $this->model('User_model')->getRole($_POST['id_user']));
     }

    public function ubahRole()
    {      
        $ubahRole =  $this->model('User_model')->ubahRole($_POST);   
       if($ubahRole > 0){
        Flasher::setFlash('Role', 'berhasil', ' diUbah', 'success');
        header('Location: '. BASEURL . 'Kelola_akun');
        exit;
    } else {
    Flasher::setFlash('Role', 'gagal', ' diUbah', 'danger');
    header('Location: '. BASEURL . 'Kelola_akun');
    exit;
}
    
}
    
    
}

