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

        $data['peminjaman'] = $this->model('PeminjamanModel')->getDataTerpilih();
        $this->view('Peminjaman/printPeminjaman', $data);
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

    public function cetak()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['checkbox'])) {
                $idList = $_POST['checkbox']; // array of selected ids
                // Lanjutkan ke cetak/export view
                $peminjamanTerpilih = $this->model('Peminjaman_model')->getPeminjamanByIds($idList);
                $this->view('peminjaman/printPeminjaman', ['peminjaman' => $peminjamanTerpilih]);

            } else {
                echo "Tidak ada data yang dipilih untuk dicetak.";
            }
        } else {
            header('Location: ' . BASEURL . '/peminjaman');
        }
}

 public function cari() {
    $data['judul'] = 'Peminjaman';
    $data['id_user'] = $_SESSION['id_user'];
    $data['profile'] = $this->model("User_model")->profile($data);

    $keyword = $_POST['keyword'] ?? '';
    $model = $this->model('Peminjaman_model');
    $data['peminjaman'] = $model->cariDataPeminjaman($keyword);

    $this->view('templates/header', $data);
    $this->view('peminjaman/index', $data);
    $this->view('templates/footer');
 }
}