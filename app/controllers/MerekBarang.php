<?php

class merekBarang extends Controller {
    
    public function index() {
        if(!isset($_SESSION['login'])){
            header("Location:" . BASEURL . "Login");
            exit;
        }
        $data['judul'] = 'Merek Barang';
        
        // Mengambil data kondisi barang dari model
        $TambahMerekBarangModel = $this->model('Merek_barang_model');

        $data['dataTampilMerekBarang']= $TambahMerekBarangModel->getDataMerekBarang();

        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Merek_barang/index', $data);
        $this->view('templates/footer');
    }

    public function tambahMerekBarang(){
        $cekMerek = $this->model('Merek_barang_model')->cekDataMerekBarang($_POST);
        if(!$cekMerek){
            if($this->model('Merek_barang_model')->postDataMerekBarang($_POST) > 0){
                Flasher::setFlash('Merek Barang', 'berhasil', ' ditambahkan', 'success');
                header('Location: '. BASEURL . 'MerekBarang');
                exit;
            }
        }
        else {
            Flasher::setFlash('Merek Barang', 'gagal', ' ditambahkan </br>Merek barang sudah ada', 'danger');
            header('Location: '. BASEURL . 'MerekBarang');
            exit;
        }
    }

    public function hapus($id_merek_barang){
        if($this->model('Merek_barang_model')->hapusMerekBarang($id_merek_barang) > 0){
            Flasher::setFlash('Merek Barang', 'berhasil', ' dihapus', 'success');
            header('Location: '. BASEURL . 'MerekBarang');
            exit;
        }else{
            Flasher::setFlash('Merek Barang', 'gagal', ' dihapus', 'danger');
            header('Location: '. BASEURL . 'MerekBarang');
            exit;
        }
    }

    public function getUbah(){
       echo json_encode( $this->model('Merek_barang_model')->getUbah($_POST['id_merek_barang']));
    }

    public function ubahMerekBarang(){
        $cekMerek = $this->model('Merek_barang_model')->cekDataMerekBarang($_POST);
        if(!$cekMerek){
            if($this->model('Merek_barang_model')->ubahMerekBarang($_POST) > 0){
                Flasher::setFlash('Merek Barang', 'berhasil', ' diUbah', 'success');
                header('Location: '. BASEURL . 'MerekBarang');
                exit;
            }
        }
        else {
            Flasher::setFlash('Merek Barang', 'gagal', ' diUbah </br>Merek barang sudah ada', 'danger');
            header('Location: '. BASEURL . 'MerekBarang');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = 'Merek Barang';
        
        // Mengambil data kondisi barang dari model
        $TambahMerekBarangModel = $this->model('Merek_barang_model');

        $data['dataTampilMerekBarang']= $TambahMerekBarangModel->cariDataMerekBarang();

        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Merek_barang/index', $data);
        $this->view('templates/footer');
    }
   
}

