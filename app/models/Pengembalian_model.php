<?php
class Pengembalian_model
{
    private $db;
    private $table = "trx_pengembalian";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengembalian()
    {
        $query = "SELECT 
                    k.id_pengembalian, 
                    p.nama_peminjam, 
                    p.tanggal_peminjaman, 
                    p.tanggal_pengembalian, 
                    jb.sub_barang, 
                    COALESCE(k.status_pengembalian, 'Belum Dikembalikan') AS status_pengembalian, 
                    k.keterangan 
                  FROM trx_peminjaman p
                  LEFT JOIN trx_pengembalian k ON p.id_peminjaman = k.id_peminjaman
                  JOIN mst_jenis_barang jb ON p.id_jenis_barang = jb.id_jenis_barang
                  WHERE p.status = 'disetujui'
                  ORDER BY p.nama_peminjam";

        $this->db->query($query);
        return $this->db->resultSet();
    }
}
