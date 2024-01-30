<?php

class User_model
{

    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambahUser($data)
    {
        $password = $_POST['password'];
        $confirmPassword = $_POST['konfirmasi-password'];

        if ($password === $confirmPassword) {
            $queryLogin = "INSERT INTO trx_user (email, password, id_role) VALUES (:email, :password, :id_role)";
            $this->db->query($queryLogin);
            $this->db->bind('email', $data['email']);
            $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
            $this->db->bind('password', $hashedPassword);

            // Menggunakan nilai default 1 jika $data['id_role'] tidak ada
            $idRole = isset($data['id_role']) ? $data['id_role'] : 1;
            $this->db->bind('id_role', $idRole);

            $this->db->execute();
            $idUser = $this->db->lastInsertId();

            // Pindahkan file foto ke folder yang ditentukan
            $uploadDirectory = '../public/img/foto-profile/';
            $uploadedFile = $_FILES['foto']['tmp_name'];
            $newFileName = $uploadDirectory . $_FILES['foto']['name'];

            move_uploaded_file($uploadedFile, $newFileName);

            // Perhatikan bahwa parameter 'foto' harus ada di VALUES, meskipun nilainya NULL
            $queryData = "INSERT INTO trx_data_user (id_user, foto, nama_user, no_hp_user, jenis_kelamin, alamat) VALUES (:id_user, :foto, :nama_user, :no_hp_user, :jenis_kelamin, :alamat)";
            $this->db->query($queryData);
            $this->db->bind('id_user', $idUser);
            $this->db->bind('foto', $newFileName);
            $this->db->bind('nama_user', $data['nama_user']);
            $this->db->bind('no_hp_user', $data['no_hp_user']);
            $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
            $this->db->bind('alamat', $data['alamat']);
            $this->db->execute();

            return $this->db->rowCount();
        } 
    }

    public function getUser($email, $password)
    {
        $this->db->query("SELECT * FROM trx_user WHERE email = :email AND id_role IS NOT NULL");
        $this->db->bind("email", $email);

        $user = $this->db->single(); // Ambil data user dari database

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Password cocok, kembalikan data user
                return $user;
            }
        }
        return NULL;
    }

    public function tampilUser(){
        $tampilView = "SELECT trx_user.email, trx_data_user.foto, trx_data_user.nama_user, trx_data_user.no_hp_user, 
        trx_user.id_user, trx_data_user.id_data_user,trx_data_user.jenis_kelamin, trx_data_user.alamat, mst_role.role FROM trx_user JOIN trx_data_user ON trx_user.id_user = trx_data_user.id_user JOIN mst_role ON trx_user.id_role = mst_role.id_role;";

        $this->db->query($tampilView);
        return $this->db->resultSet();
    }

    public function hapusUser($id_user){
        $this->db->query("DELETE FROM trx_data_user WHERE id_user = :id_user;");
        $this->db->bind("id_user", $id_user);
        $this->db->execute();
        $this->db->query("DELETE FROM trx_user WHERE id_user = :id_user;");
        $this->db->bind("id_user", $id_user);
        $this->db->execute();
    
        return $this->db->resultSet();
    }

    public function getUbah($id_user) {
        $tampilView = "SELECT trx_user.email, trx_data_user.foto, trx_data_user.nama_user, trx_data_user.no_hp_user, trx_data_user.jenis_kelamin, trx_data_user.alamat, mst_role.role FROM trx_user JOIN trx_data_user ON trx_user.id_user = trx_data_user.id_user JOIN mst_role ON trx_user.id_role = mst_role.id_role WHERE id_user = :id_user;";
        $this->db->query($tampilView);
        $this->db->bind("id_user", $id_user);

        return $this->db->single();
    
    }

    public function updateuser($data){
         // Insert data into mst_jenis_barang
         $queryUpdate = "UPDATE trx_data_user SET foto = :foto, nama_user=:nama_user, no_hp_user = :no_hp_user, jenis_kelamin=:jenis_kelamin, alamat = :alamat  WHERE id_user = :id_user";
         $this->db->query($queryUpdate);
         $this->db->bind('foto', $data['foto']);
         $this->db->bind('nama_user', $data['nama_user']);
         $this->db->bind('no_hp_user', $data['no_hp_user']);
         $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
         $this->db->bind('alamat', $data['alamat']);
         $this->db->bind('id_user', $data['id_user']);
         $this->db->execute();
        
     
         return $this->db->rowCount();
    }

    public function cariUser(){
        $keyword = $_POST['keyword'];
        $query= "SELECT * FROM mst_jenis_barang WHERE sub_barang LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();

    }

    public function ubahRole($data)
    {
        // Insert data into trx_user
        $queryUpdateRole = "UPDATE trx_user SET id_role = :id_role WHERE id_user = :id_user";
        $this->db->query($queryUpdateRole);
        $this->db->bind('id_role', $data['id_role']);
        $this->db->bind('id_user', $data['id_user']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    


}
