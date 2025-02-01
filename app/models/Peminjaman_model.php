<?php

class Peminjaman_model
{
    private $db;
    private $table = 'trx_peminjaman';
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPeminjamanById($id){
        $queryId = "SELECT * FROM " . $this->table . " WHERE id_peminjaman=:id"; 
        $this->db->query($queryId);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getSubBarang()
    {
        $query = "SELECT * FROM mst_jenis_barang ORDER BY sub_barang";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getDataPeminjaman(){
    $tampilPeminjaman = "SELECT * FROM trx_peminjaman;";
    $this->db->query($tampilPeminjaman);

    return $this->db->resultSet();
    }

    public function tambahDataPeminjaman($data) {
    $queryTambahPeminjaman = "INSERT INTO trx_peminjaman (
        id_jenis_barang, judul_kegiatan, tanggal_pengajuan, tanggal_peminjaman, tanggal_pengembalian, jumlah, spesifikasi
    ) 
    VALUES (
        :jenis_barang, :judul_kegiatan, :tanggal_pengajuan, :tanggal_mulai, :tanggal_terakhir, :jumlah_peminjaman, :keterangan_peminjaman
    )";

    $this->db->query($queryTambahPeminjaman);
    $this->db->bind('jenis_barang', $data['jenis_barang']); // Sesuai dengan name di form
    $this->db->bind('judul_kegiatan', $data['judul_kegiatan']);
    $this->db->bind('tanggal_pengajuan', $data['tanggal_pengajuan']);
    $this->db->bind('tanggal_mulai', $data['tanggal_mulai']); // Sesuai dengan name di form
    $this->db->bind('tanggal_terakhir', $data['tanggal_terakhir']);
    $this->db->bind('jumlah_peminjaman', $data['jumlah_peminjaman']);
    $this->db->bind('keterangan_peminjaman', $data['keterangan_peminjaman']);

    $this->db->execute();

    return $this->db->rowCount();
}

public function hapusDataPeminjaman($id)
{
    $queryHapus = "DELETE FROM trx_peminjaman WHERE id_peminjaman = :id";
    $this->db->query($queryHapus);
    $this->db->bind('id', $id);
    $this->db->execute();

    return $this->db->rowCount();
}

public function ubahDataPeminjaman($data)
{
    $query = "UPDATE trx_peminjaman SET 
                id_jenis_barang = :id_jenis_barang, 
                judul_kegiatan = :judul_kegiatan, 
                tanggal_pengajuan = :tanggal_pengajuan, 
                tanggal_peminjaman = :tanggal_mulai, 
                tanggal_pengembalian = :tanggal_terakhir, 
                jumlah = :jumlah_peminjaman, 
                spesifikasi = :keterangan_peminjaman
              WHERE id_peminjaman = :id_peminjaman";

    $this->db->query($query);
    $this->db->bind('id_peminjaman', $data['id_peminjaman']);
    $this->db->bind('id_jenis_barang', $data['jenis_barang']);
    $this->db->bind('judul_kegiatan', $data['judul_kegiatan']);
    $this->db->bind('tanggal_pengajuan', $data['tanggal_pengajuan']);
    $this->db->bind('tanggal_mulai', $data['tanggal_mulai']);
    $this->db->bind('tanggal_terakhir', $data['tanggal_terakhir']);
    $this->db->bind('jumlah_peminjaman', $data['jumlah_peminjaman']);
    $this->db->bind('keterangan_peminjaman', $data['keterangan_peminjaman']);

    $this->db->execute();
    return $this->db->rowCount();
}



// public function ubahDataPeminjaman($data)
// {
//     $queryUbahPeminjaman = "UPDATE trx_peminjaman SET 
//                 id_jenis_barang = :jenis_barang, 
//                 judul_kegiatan = :judul_kegiatan, 
//                 tanggal_pengajuan = :tanggal_pengajuan, 
//                 tanggal_peminjaman = :tanggal_mulai, 
//                 tanggal_pengembalian = :tanggal_terakhir, 
//                 jumlah = :jumlah_peminjaman, 
//                 spesifikasi = :keterangan_peminjaman 
//               WHERE id_peminjaman = :id";

//     $this->db->query($queryUbahPeminjaman);
//     $this->db->bind('jenis_barang', $data['jenis_barang']);
//     $this->db->bind('judul_kegiatan', $data['judul_kegiatan']);
//     $this->db->bind('tanggal_pengajuan', $data['tanggal_pengajuan']);
//     $this->db->bind('tanggal_peminjaman', $data['tanggal_peminjaman']);
//     $this->db->bind('tanggal_pengembalian', $data['tanggal_pengembalian']);
//     $this->db->bind('jumlah', $data['jumlah']);
//     $this->db->bind('keterangan', $data['keterangan']);
//     $this->db->bind('id', $data['id_peminjaman']);

//     $this->db->execute();
//     return $this->db->rowCount();
// }


}
