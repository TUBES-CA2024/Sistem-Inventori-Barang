<?php 

class DetailBarang extends Controller {
    public function index() {
        $data['judul'] = 'Detail Barang';
    
        // Ambil model
        $DetailBarangModel = $this->model('Detail_barang_model');
    
        // Ambil semua data terkait barang
        $data += [
            'kondisiBarang' => $DetailBarangModel->getKondisiBarang(),
            'satuan' => $DetailBarangModel->getSatuan(),
            'status' => $DetailBarangModel->getStatus(),
            'sub_barang' => $DetailBarangModel->getSubBarang(),
            'nama_merek_barang' => $DetailBarangModel->getMerekBarang(),
            'lokasiPenyimpanan' => $DetailBarangModel->getLokasiPenyimpanan()
        ];
    
        // Ambil data user
        $data['id_user'] = $_SESSION['id_user'];
        $data['profile'] = $this->model("User_model")->profile($data);
    
        // Ambil filter dari GET atau POST
        $lokasi_id = $_GET['id_lokasi'] ?? $_POST['lokasi'] ?? null;
        $jenis_barang_id = $_GET['id_jenis_barang'] ?? $_POST['sub_barang'] ?? null;
        $merek_barang_id = $_GET['id_merek_barang'] ?? $_POST['merek_barang'] ?? null;
    
        // Jika merek_barang dipilih, ambil data berdasarkan merek_barang
        if (!empty($merek_barang_id)) {
            $data['dataTampilBarang'] = $DetailBarangModel->getDataBarangByMerek($merek_barang_id);
        } 
        // Jika sub_barang dipilih, ambil data berdasarkan sub_barang
        else if (!empty($jenis_barang_id)) {
            $data['dataTampilBarang'] = $DetailBarangModel->getDataBarangBySubBarang($jenis_barang_id);
        } 
        // Jika lokasi dipilih tetapi sub_barang tidak dipilih, filter berdasarkan lokasi
        else if (!empty($lokasi_id)) {
            $data['dataTampilBarang'] = $DetailBarangModel->getDataBarangByLokasi($lokasi_id);
        } 
        // Jika tidak ada filter, ambil semua barang
        else {
            $data['dataTampilBarang'] = $DetailBarangModel->getDataBarang();
        }
    
        // Load tampilan
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('DetailBarang/index', $data);
        $this->view('templates/footer');
    }
    
    public function detail($id_barang) {
        $data['judul'] = 'Detail Barang';
        
        // Mengambil data kondisi barang dari model
        $DetailBarangModel = $this->model('Detail_barang_model');
        $data['dataTampilDetailBarang'] = $DetailBarangModel->getDetailDataBarang($id_barang);

        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('DetailBarang/index', $data);
        $this->view('templates/footer');
    }

    public function tambahBarang(){
        if($this->model('Detail_barang_model')->postDataBarang($_POST) > 0){
                Flasher::setFlash('Barang', 'berhasil', ' diTambahkan', 'success');
                header('Location: '. BASEURL . 'DetailBarang');
                exit;
            }
        
        else {
            Flasher::setFlash('Barang', 'gagal', ' diTambahkan </br>barang sudah ada', 'danger');
            header('Location: '. BASEURL . 'DetailBarang');
            exit;
        }
    }

    public function hapus($id_barang){
        try{
            if($this->model('Detail_barang_model')->hapusBarang($id_barang) > 0){
                Flasher::setFlash('Barang', 'berhasil', ' dihapus', 'success');
                header('Location: '. BASEURL . 'DetailBarang');
                exit;
            }

        }catch(PDOException $e){
            Flasher::setFlash('Barang', 'gagal', ' dihapus', 'danger');
            header('Location: '. BASEURL . 'DetailBarang');
            exit;
        }
    }

    public function getUbah(){
        echo json_encode( $this->model('Detail_barang_model')->getUbah($_POST['id_barang']));
    }

    public function ubahBarang(){
        if($this->model('Detail_barang_model')->ubahBarang($_POST) > 0){
            Flasher::setFlash('Barang', 'berhasil', ' diUbah', 'success');
            header('Location: '. BASEURL . 'DetailBarang');
            exit;
        }
        else{
            Flasher::setFlash('Barang', 'gagal', ' diUbah </br>barang sudah ada', 'danger');
            header('Location: '. BASEURL . 'DetailBarang');
            exit;
        }
    }

    public function cari(){
        $data['judul'] = 'Detail Barang';
        
        $DetailBarangModel = $this->model('Detail_barang_model');
        $data['dataTampilBarang'] = $DetailBarangModel->cariDataBarang();
        $data['id_user'] = $_SESSION['id_user'];
        $data['profile'] = $this->model("User_model")->profile($data);
        
        // Memanggil view transaksi barang
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', data: $data);
        $this->view('DetailBarang/index', $data);
        $this->view('templates/footer');
    }

    public function cetak() {
        if(isset($_POST) && !empty($_POST)){
            $data['judul'] = 'Detail Barang';
    
            $data['dataCetak'] = $this->model('Detail_barang_model')->cetak($_POST);
            $this->view('templates/header', $data);
            $this->view('DetailBarang/print', $data);
            $this->view('templates/footer');
        } else {
            Flasher::setFlash('Data barang', 'gagal', ' diCetak </br> Pilih data barang', 'danger');
            header('Location: '. BASEURL . 'DetailBarang');
            exit;
        }
    }

}
