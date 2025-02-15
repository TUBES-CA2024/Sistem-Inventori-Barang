<?php
class peminjaman extends Controller
{
    public function index()
    {
        $data['judul'] = 'Peminjaman';
        $data['id_user'] = $_SESSION['id_user'];
        $data['profile'] = $this->model("User_model")->profile($data);

        $TambahPeminjamanModel = $this->model('Peminjaman_model');
        $data['peminjaman'] = $TambahPeminjamanModel->getDataPeminjaman();
        $data['sub_barang'] = $TambahPeminjamanModel->getSubBarang();
        $this->view('templates/header', $data);
        $this->view('Peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function tambahPeminjaman(){
        // var_dump($_POST);
        if($this->model('Peminjaman_model')->tambahDataPeminjaman($_POST) > 0){
            header('Location: ' . BASEURL . 'Peminjaman');
            exit;
        }
    }


    public function delete($id)
{
    if ($this->model('Peminjaman_model')->hapusDataPeminjaman($id) > 0) {
        Flasher::setFlash('Peminjaman', 'berhasil', ' diHapus', 'success');
        header('Location: '. BASEURL . 'Peminjaman');
        exit;
    } else {
        Flasher::setFlash('Peminjaman', 'gagal', ' dihapus', 'danger');
        header('Location: '. BASEURL . 'Peminjaman');
        exit;
    }
}
//     public function hapus($id)
// {
//     if ($this->model('Peminjaman_model')->hapusDataPeminjaman($id) > 0) {
//         Flasher::setFlash('Peminjaman', 'berhasil', ' dihapus', 'success');
//         header('Location: ' . BASEURL . '/peminjaman');
//         exit;
//     } else {
//         Flasher::setFlash('Peminjaman', 'gagal', ' dihapus', 'danger');
//         header('Location: '. BASEURL . '/Peminjaman');
//         exit;
//     }
// }

public function ubahPeminjaman()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id_peminjaman'];

        $data = $this->model('Peminjaman_model')->getPeminjamanById($id);
            echo json_encode($data);
    }
}



public function ubah(){
    if($this->model('Peminjaman_model')->ubahDataPeminjaman($_POST) > 0){
        Flasher::setFlash('Peminjaman', 'berhasil', ' diubah', 'success');
        header('Location: ' . BASEURL . '/peminjaman');
        exit;
    } else {
        Flasher::setFlash('Peminjaman', 'gagal', ' diubah', 'danger');
        header('Location: '. BASEURL . '/Peminjaman');
        exit;
    }
}

}
