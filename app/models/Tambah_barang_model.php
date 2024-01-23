<?php

class Tambah_barang_model{

    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getKondisiBarang() {
        $query = "SELECT * FROM mst_kondisi_barang ORDER BY kondisi_barang";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getSatuan() {
        $query = "SELECT * FROM mst_satuan ORDER BY nama_satuan";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    
    public function getStatus() {
        $query = "SELECT * FROM mst_status ORDER BY status";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getLokasiPenyimpanan() {
        $query = "SELECT * FROM mst_lokasi_penyimpanan ORDER BY nama_lokasi_penyimpanan";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    
    
}