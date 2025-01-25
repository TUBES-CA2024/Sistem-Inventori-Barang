<?php
class Peminjaman extends Controller {
    public function index() {
        if (!isset($_SESSION)) {
            session_start(); // Ensure the session starts
        }
    
        if (!isset($_SESSION['id_user'])) {
            // Redirect if user is not logged in
            header('Location: ' . BASEURL . 'Login');
            exit;
        }
    
        $data['judul'] = 'Peminjaman';
        $data['id_user'] = $_SESSION['id_user'];
        $data['profile'] = $this->model("User_model")->profile($data);
    
        // Create an instance of the Peminjaman model
        $TambahPeminjamanModel = $this->model('Peminjaman_model');
        
        // Fetch the jenis barang options from the model
        $data['sub_barang'] = $TambahPeminjamanModel->getSubBarang();
        
        // Fetch all peminjaman data to display in the table
        $data['peminjaman'] = $TambahPeminjamanModel->getPeminjamanBarang(); // This now includes 'sub_barang'
    
        // Convert tanggal_pengajuan to Indonesian format (d-m-Y H:i:s)
        foreach ($data['peminjaman'] as &$peminjaman) {
            $peminjaman['tanggal_pengajuan'] = date('d-m-Y H:i:s', strtotime($peminjaman['tanggal_pengajuan']));
        }
    
        // Load the views
        $this->view('templates/header', data: $data);
        $this->view('templates/sidebar', data: $data);
        $this->view('Peminjaman/index', $data);
        $this->view('templates/footer');
    }
    
    
    public function tambahPeminjaman() {
        // Validate if all required keys are available
        $requiredKeys = ['judul_kegiatan', 'tanggal_peminjaman', 'tanggal_pengembalian', 'id_jenis_barang', 'jumlah_peminjaman', 'keterangan_peminjaman'];
        
        // Check if each key is present in $_POST and is not empty (except 'tanggal_pengajuan' which is optional)
        foreach ($requiredKeys as $key) {
            if (!isset($_POST[$key]) || empty($_POST[$key])) {
                // If any field is missing or empty, set flash message and redirect
                Flasher::setFlash('Input data tidak lengkap. Pastikan semua field terisi.', 'gagal', '', 'danger');
                header('Location: ' . BASEURL . 'Peminjaman');
                exit;
            }
        }
        
        // Cek apakah tanggal_pengembalian lebih awal dari tanggal_peminjaman
        if (strtotime($_POST['tanggal_pengembalian']) < strtotime($_POST['tanggal_peminjaman'])) {
            // Jika tanggal pengembalian lebih awal, tampilkan pesan error
            Flasher::setFlash('Tanggal pengembalian tidak boleh lebih awal dari tanggal peminjaman.', 'gagal', '', 'danger');
            header('Location: ' . BASEURL . 'Peminjaman');
            exit;
        }
    
        // Pastikan status ada, jika tidak set default 'diproses'
        if (!isset($_POST['status'])) {
            $_POST['status'] = 'diproses'; // Set default 'diproses' jika tidak ada status
        }
    
        // Ensure the key 'jenis_barang' is renamed to 'id_jenis_barang' if it exists in the form data
        if (isset($_POST['jenis_barang'])) {
            $_POST['id_jenis_barang'] = $_POST['jenis_barang'];  // Rename 'jenis_barang' to 'id_jenis_barang'
            unset($_POST['jenis_barang']); // Remove the original 'jenis_barang' key
        }
    
        // Insert the new peminjaman data directly without checking for duplicates
        if ($this->model('Peminjaman_model')->postDataPeminjaman($_POST) > 0) {
            Flasher::setFlash('Peminjaman berhasil ditambahkan.', 'success', '', 'success');
        } else {
            Flasher::setFlash('Peminjaman gagal ditambahkan.', 'danger', '', 'danger');
        }
    
        // After inserting, call the index method to refresh the data on the page
        $this->index(); // Reload the data and pass it to the view
    }
    
    public function hapusPeminjaman($id_peminjaman) {
        // Debugging: Cek apakah id_peminjaman diterima dengan benar
        var_dump($id_peminjaman); // Memastikan id_peminjaman diterima dengan benar
        
        if (!isset($id_peminjaman) || empty($id_peminjaman)) {
            Flasher::setFlash('ID tidak valid', 'gagal', '', 'danger');
            header('Location: ' . BASEURL . 'Peminjaman');
            exit;
        }
    
        // Panggil model untuk menghapus data peminjaman berdasarkan id_peminjaman
        if ($this->model('Peminjaman_model')->hapusDataPeminjaman($id_peminjaman) > 0) {
            Flasher::setFlash('Peminjaman berhasil dihapus.', 'success', '', 'success');
        } else {
            Flasher::setFlash('Peminjaman gagal dihapus.', 'danger', '', 'danger');
        }
    
        header('Location: ' . BASEURL . 'Peminjaman');
        exit;
    }
    
    
    
}

