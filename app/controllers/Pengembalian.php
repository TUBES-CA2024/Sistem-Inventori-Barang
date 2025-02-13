<?php
class Pengembalian extends Controller
{
    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Redirect ke login jika user belum login
        if (!isset($_SESSION['id_user'])) {
            header('Location: ' . BASEURL . 'Login');
            exit;
        }

        $data['judul'] = 'Pengembalian';
        $data['id_user'] = $_SESSION['id_user'];
        $data['pengembalian'] = $this->model('Pengembalian_model')->getAllPengembalian();
        $data['profile'] = $this->model("User_model")->profile($data);

        // Load tampilan
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('Pengembalian/index', $data);
        $this->view('templates/footer');
    }
}
