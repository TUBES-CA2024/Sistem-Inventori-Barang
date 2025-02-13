<?php
class Pengembalian_model {
    private $db;
    private $table = "trx_pengembalian";

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllPengembalian() {
        $query = "SELECT 
                    p.nama_peminjam, 
                    p.tanggal_peminjaman, 
                    p.tanggal_pengembalian, 
                    jb.sub_barang, 
                    k.status_pengembalian, 
                    k.keterangan 
                  FROM trx_pengembalian k
                  JOIN trx_peminjaman p ON k.id_peminjaman = p.id_peminjaman
                  JOIN mst_jenis_barang jb ON p.id_jenis_barang = jb.id_jenis_barang
                  ORDER BY p.nama_peminjam";

        $this->db->query($query);
        return $this->db->resultSet();
    }
}
