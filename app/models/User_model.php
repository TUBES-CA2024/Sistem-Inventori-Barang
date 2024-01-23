<?php

class User_model{

    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    
    public function tambahUser($data){
        $password = $_POST['password'];
        $confirmPassword = $_POST['konfirmasi-password'];

        if($password === $confirmPassword){
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
    $uploadDirectory = '../app/views/img/foto-profile';
    $uploadedFile = $_FILES['foto']['tmp_name'];
    $newFileName = $uploadDirectory . $_FILES['foto']['name'];

    move_uploaded_file($uploadedFile, $newFileName);

    

 
        // Perhatikan bahwa parameter 'foto' harus ada di VALUES, meskipun nilainya NULL
        $queryData = "INSERT INTO trx_data_user (id_user, foto, nama_user, unit_user, nips_nidn_user, no_hp_user, jenis_kelamin, alamat) VALUES (:id_user, :foto, :nama_user, :unit_user, :nips_nidn_user, :no_hp_user, :jenis_kelamin, :alamat)";
        $this->db->query($queryData);
        $this->db->bind('id_user', $idUser);
        $this->db->bind('foto', $newFileName);
        $this->db->bind('nama_user', $data['nama_user']);
        $this->db->bind('unit_user', $data['unit_user']);
        $this->db->bind('nips_nidn_user', $data['nips_nidn_user']);
        $this->db->bind('no_hp_user', $data['no_hp_user']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->execute();

        return $this->db->rowCount();
    } else{
        $errorMessage = "Password dan konfirmasi password tidak cocok. Silakan coba lagi.";

        // Menampilkan notifikasi menggunakan JavaScript
        echo "<script>alert('$errorMessage');</script>";
            
    }
    }

    public function getUser($email, $password){
        $this->db->query("SELECT * FROM trx_user WHERE email = :email");
        $this->db->bind("email", $email);
        
        $user = $this->db->single(); // Ambil data user dari database
        
        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Password cocok, kembalikan data user
                return $user;
            }
        }
    
        // Jika tidak ada user atau password tidak cocok, kembalikan NULL
        return NULL;
    }


    }
    
