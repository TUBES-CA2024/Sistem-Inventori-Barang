<?php

class Peminjaman_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getSubBarang()
    {
        $query = "SELECT * FROM mst_jenis_barang ORDER BY sub_barang";
        $this->db->query($query);
        return $this->db->resultSet();
    }
}
