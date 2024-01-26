<?php

class jenisBarang extends Controller {
    
    public function index() {
        $data['judul'] = 'Jenis Barang';
        
        // Mengambil data kondisi barang dari model
        $TambahJenisBarangModel = $this->model('Tambah_jenis_barang_model');

        $data['dataTampilJenisBarang']= $TambahJenisBarangModel->getDataJenisBarang();

        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Jenis_barang/index', $data);
        $this->view('templates/footer');
    }

    public function tambahJenisBarang(){
        if($this->model('Tambah_jenis_barang_model')->postDataJenisBarang($_POST) > 0){
            Flasher::setFlash('Jenis Barang', 'berhasil', ' ditambahkan', 'success');
            header('Location: '. BASEURL . 'JenisBarang');
            exit;
        }else{
            Flasher::setFlash('Jenis Barang', 'gagal', ' ditambahkan', 'danger');
            header('Location: '. BASEURL . 'JenisBarang');
            exit;
        }
    }

    public function hapus($id_jenis_barang){
        if($this->model('Tambah_jenis_barang_model')->hapusJenisBarang($id_jenis_barang) > 0){
            Flasher::setFlash('Jenis Barang', 'berhasil', ' dihapus', 'success');
            header('Location: '. BASEURL . 'JenisBarang');
            exit;
        }else{
            Flasher::setFlash('Jenis Barang', 'gagal', ' dihapus', 'danger');
            header('Location: '. BASEURL . 'JenisBarang');
            exit;
        }
    }

    public function getUbah(){
       echo json_encode( $this->model('Tambah_jenis_barang_model')->getUbah($_POST['id_jenis_barang']));
    }

    public function ubahJenisBarang(){
        if($this->model('Tambah_jenis_barang_model')->ubahJenisBarang($_POST) > 0){
            Flasher::setFlash('Jenis Barang', 'berhasil', ' diUbah', 'success');
            header('Location: '. BASEURL . 'JenisBarang');
            exit;
        }else{
            Flasher::setFlash('Jenis Barang', 'gagal', ' diUbah', 'danger');
            header('Location: '. BASEURL . 'JenisBarang');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = 'Jenis Barang';
        
        // Mengambil data kondisi barang dari model
        $TambahJenisBarangModel = $this->model('Tambah_jenis_barang_model');

        $data['dataTampilJenisBarang']= $TambahJenisBarangModel->cariDataJenisBarang();

        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('Jenis_barang/index', $data);
        $this->view('templates/footer');
    }
   
}

