<?php

class Merek_barang_model{

    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function postDataMerekBarang($data)
{

    // Insert data into mst_jenis_barang
    $queryMerekBarang = "INSERT INTO mst_merek_barang (nama_merek_barang, kode_merek_barang) VALUES (:nama_merek_barang, :kode_merek_barang)";
    $this->db->query($queryMerekBarang);
    $this->db->bind('nama_merek_barang', $data['kode_merek_barang']);
    $this->db->bind('kode_merek_barang', $data['kode_merek_barang']);
    $this->db->execute();
   

    return $this->db->rowCount();
}

public function getDataMerekBarang() {
    $tampilView = "SELECT * FROM mst_merek_barang;";
    $this->db->query($tampilView);

    return $this->db->resultSet();

}

public function hapusMerekBarang($id_merek_barang){
    $this->db->query("DELETE FROM mst_merek_barang WHERE id_merek_barang = :id_merek_barang;");
    $this->db->bind("id_merek_barang", $id_merek_barang);

    $this->db->execute();


    return $this->db->resultSet();
    }

    public function getUbah($id_merek_barang) {
        $tampilView = "SELECT * FROM mst_merek_barang WHERE id_merek_barang = :id_merek_barang;";
        $this->db->query($tampilView);
        $this->db->bind("id_merek_barang", $id_merek_barang);

        return $this->db->single();
    
    }

    public function ubahMerekBarang($data)
    {
    
        // Insert data into mst_jenis_barang
        $queryJenisBarang = "UPDATE mst_merek_barang SET nama_merek_barang = :nama_merek_barang, kode_merek_barang=:kode_merek__barang WHERE id_merek_barang = :id_merek_barang";
        $this->db->query($queryJenisBarang);
        $this->db->bind('nama_merek_barang', $data['nama_merek_barang']);
        $this->db->bind('kode_merek_barang', $data['kode_merek_barang']);
        $this->db->bind('id_merek_barang', $data['id_merek_barang']);

        $this->db->execute();
       
    
        return $this->db->rowCount();
    }

    public function cariDataMerekBarang(){
        $keyword = $_POST['keyword'];
        $query= "SELECT * FROM mst_merek_barang WHERE nama_merek_barang LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();

    }
}