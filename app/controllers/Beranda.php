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
            Flasher::setFlash('Barang', 'berhasil', ' ditambahkan', 'success');
            header('Location: '. BASEURL . 'Beranda');
            exit;
        }else{
            Flasher::setFlash('Barang', 'gagal', ' ditambahkan', 'danger');
            header('Location: '. BASEURL . 'Beranda');
            exit;
        }
    }

    public function detail($id_barang) {
        $data['judul'] = 'Beranda';
        
        // Mengambil data kondisi barang dari model
        $TambahBarangModel = $this->model('Tambah_barang_model');
        $data['dataTampilBarang'] = $TambahBarangModel->getDetailDataBarang($id_barang);


        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Beranda/detail', $data);
        $this->view('templates/footer');
    }

    public function hapus($id_barang){
        if($this->model('Tambah_barang_model')->hapusDataBarang($id_barang) > 0){
            Flasher::setFlash('Barang', 'berhasil', ' dihapus', 'success');
            header('Location: '. BASEURL . 'Beranda');
            exit;
        }else{
            Flasher::setFlash('Barang', 'gagal', ' dihapus', 'danger');
            header('Location: '. BASEURL . 'Beranda');
            exit;
        }
    }


}   
