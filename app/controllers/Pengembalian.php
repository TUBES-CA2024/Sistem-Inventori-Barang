<?php
class Pengembalian extends Controller
{
    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (!isset($_SESSION['id_user'])) {
            header('Location: ' . BASEURL . 'Login');
            exit;
        }

        $data['judul'] = 'Pengembalian';
        $data['id_user'] = $_SESSION['id_user'];
        $data['pengembalian'] = $this->model('Pengembalian_model')->getAllPengembalian();
        $data['profile'] = $this->model("User_model")->profile($data);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('Pengembalian/index', $data);
        $this->view('templates/footer');
    }

    public function getUbah()
    {
        echo json_encode($this->model('Pengembalian_model')->getUbahPengembalian($_POST['id_pengembalian']));
    }

    public function ubahPengembalian()
    {
        if ($this->model('Pengembalian_model')->updatePengembalian($_POST)) {
            header('Location: ' . BASEURL . 'Pengembalian');
            exit;
        } else {
            echo "Gagal mengubah data pengembalian.";
        }
    }
}
