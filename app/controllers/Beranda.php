<?php

class Beranda extends Controller {
    
    public function index() {
        if(!isset($_SESSION['login'])){
            header("Location:" . BASEURL . "Login");
            exit;
        }
        $data['judul'] = 'Beranda';
        
        // Mengambil data kondisi barang dari model
        $TambahBarangModel = $this->model('Beranda_model');
        $data['kondisiBarang'] = $TambahBarangModel->getKondisiBarang();
        $data['satuan'] = $TambahBarangModel->getSatuan();
        $data['status'] = $TambahBarangModel->getStatus();
        $data['sub_barang'] = $TambahBarangModel->getSubBarang();
        $data['nama_merek_barang'] = $TambahBarangModel->getMerekBarang();
        $data['lokasiPenyimpanan'] = $TambahBarangModel->getLokasiPenyimpanan();
        $data['dataTampilBarang']= $TambahBarangModel->getDataBarang();

        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Beranda/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id_barang) {
        $data['judul'] = 'Beranda';
        
        // Mengambil data kondisi barang dari model
        $TambahBarangModel = $this->model('Beranda_model');
        $data['dataTampilBarang'] = $TambahBarangModel->getDetailDataBarang($id_barang);


        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Beranda/detail', $data);
        $this->view('templates/footer');
    }

    public function tambahBarang(){
        if($this->model('Beranda_model')->postDataBarang($_POST) > 0){
                Flasher::setFlash('Barang', 'berhasil', ' diTambahkan', 'success');
                header('Location: '. BASEURL . 'Beranda');
                exit;
            }
        
        else {
            Flasher::setFlash('Barang', 'gagal', ' diTambahkan </br>barang sudah ada', 'danger');
            header('Location: '. BASEURL . 'Beranda');
            exit;
        }
    }

    public function hapus($id_barang){
        if($this->model('Beranda_model')->hapusBarang($id_barang) > 0){
            Flasher::setFlash('Barang', 'berhasil', ' dihapus', 'success');
            header('Location: '. BASEURL . 'Beranda');
            exit;
        }else{
            Flasher::setFlash('Barang', 'gagal', ' dihapus', 'danger');
            header('Location: '. BASEURL . 'Beranda');
            exit;
        }
    }

    public function getUbah(){
       echo json_encode( $this->model('Beranda_model')->getUbah($_POST['id_barang']));
    }

    public function ubahBarang(){
        // $this->model('Beranda_model')->ubahBarang($_POST);
       
            if($this->model('Beranda_model')->ubahBarang($_POST) > 0){
                Flasher::setFlash('Barang', 'berhasil', ' diUbah', 'success');
                header('Location: '. BASEURL . 'Beranda');
                exit;
            }
            else {
                Flasher::setFlash('Barang', 'gagal', ' diUbah </br>barang sudah ada', 'danger');
                header('Location: '. BASEURL . 'Beranda');
                exit;
               }
             
    }

    public function cari(){
        $data['judul'] = ' Beranda';
        
        // Mengambil data kondisi barang dari model
        $TambahBarangModel = $this->model('Beranda_model');

        $data['dataTampilBarang']= $TambahBarangModel->cariDataBarang();

        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Beranda/index', $data);
        $this->view('templates/footer');
    }
   
}