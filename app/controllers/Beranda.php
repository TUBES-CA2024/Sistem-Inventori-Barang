<?php

class Beranda extends Controller {
    public function index() {
        $data['judul'] = 'Beranda';
        
        // Mengambil data kondisi barang dari model
        $TambahBarangModel = $this->model('Tambah_barang_model');
        $data['kondisiBarang'] = $TambahBarangModel->getKondisiBarang();
        $data['satuan'] = $TambahBarangModel->getSatuan();
        $data['status'] = $TambahBarangModel->getStatus();
        $data['lokasiPenyimpanan'] = $TambahBarangModel->getLokasiPenyimpanan();
        $data['dataTampilBarang']= $TambahBarangModel->getDataBarang();

        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Beranda/index', $data);
        $this->view('templates/footer');
    }

    public function tambahBarang(){
        if($this->model('Tambah_barang_model')->postDataBarang($_POST) > 0){
            header('Location: '. BASEURL . 'Beranda');
            exit;
        }
        
    }
}   
