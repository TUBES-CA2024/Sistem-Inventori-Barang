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

    public function postDataBarang($data)
{
    // Insert data into mst_merek_barang
    $queryMerekBarang = "INSERT INTO mst_merek_barang (nama_merek_barang, kode_merek_barang) VALUES (:nama_merek_barang, :kode_merek_barang)";
    $this->db->query($queryMerekBarang);
    $this->db->bind('nama_merek_barang', $data['nama_merek_barang']);
    $this->db->bind('kode_merek_barang', $data['kode_merek_barang']);
    $this->db->execute();
    $idMerekBarang = $this->db->lastInsertId();

    // Insert data into mst_jenis_barang
    $queryJenisBarang = "INSERT INTO trx_jenis_barang (sub_barang, grup_sub, kode_sub, id_status) VALUES (:sub_barang, :grup_sub, :kode_sub, :id_status)";
    $this->db->query($queryJenisBarang);
    $this->db->bind('sub_barang', $data['sub_barang']);
    $this->db->bind('grup_sub', $data['grup_sub']);
    $this->db->bind('kode_sub', $data['kode_sub']);
    $this->db->bind('id_status', $data['status']); // Assuming id_status is part of $data
    $this->db->execute();
    
    $idJenisBarang = $this->db->lastInsertId();
    
    function angkaRomawi($number)
{
    $romans = [
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    ];

    $result = '';

    foreach ($romans as $roman => $value) {
        $matches = intval($number / $value);
        $result .= str_repeat($roman, $matches);
        $number %= $value;
    }

    return $result;
}


    $month = date('m', strtotime($data['tgl_pengadaan_barang']));
     $romanMonth = angkaRomawi($month);
    
    // Insert data into trx_barang
    $kode_barang = date('Y', strtotime($data['tgl_pengadaan_barang'])) . '/' . $romanMonth . '/' . $data['grup_sub'] . '/' . $data['kode_sub'] . '/' . $data['kode_merek_barang'] . '/' . $data['barang_ke'] . '/' . $data['total_barang'];
    $queryBarang = "INSERT INTO trx_barang (id_jenis_barang, id_merek_barang, id_kondisi_barang, jumlah_barang, id_satuan, deskripsi_barang, tgl_pengadaan_barang, kode_barang, keterangan_label, id_lokasi_penyimpanan, deskripsi_detail_lokasi, status_peminjaman) 
        VALUES (:id_jenis_barang, :id_merek_barang, :id_kondisi_barang, :jumlah_barang, :id_satuan, :deskripsi_barang, :tgl_pengadaan_barang, :kode_barang, :keterangan_label, :lokasi_penyimpanan, :deskripsi_detail_lokasi, :status_peminjaman)";
    $this->db->query($queryBarang);
    $this->db->bind('id_jenis_barang', $idJenisBarang);
    $this->db->bind('id_merek_barang', $idMerekBarang);
    $this->db->bind('id_kondisi_barang', $data['kondisi_barang']); // Assuming id_kondisi_barang is part of $data
    $this->db->bind('id_satuan', $data['satuan']); // Assuming id_satuan is part of $data
    $this->db->bind('jumlah_barang', $data['jumlah']);
    $this->db->bind('deskripsi_barang', $data['deskripsi_barang']);
    $this->db->bind('tgl_pengadaan_barang', $data['tgl_pengadaan_barang']);
    $this->db->bind('kode_barang', $kode_barang);
    $this->db->bind('keterangan_label', $data['keterangan_label']);
    $this->db->bind('lokasi_penyimpanan', $data['lokasi_penyimpanan']);
    $this->db->bind('deskripsi_detail_lokasi', $data['deskripsi_detail_lokasi']);
    $this->db->bind('status_peminjaman', $data['status_pinjam']);
    $this->db->execute();

    return $this->db->rowCount();
}

public function getDataBarang() {
    $tampilView = "SELECT * FROM detail_barang;";
    $this->db->query($tampilView);

    return $this->db->resultSet();

}

public function getDetailDataBarang($id_barang){
    $this->db->query("SELECT * FROM detail_barang WHERE id_barang = :id_barang");
    $this->db->bind("id_barang", $id_barang);
 
    return $this->db->single(); // Pastikan ini mengembalikan array dengan kunci "detail_barang"
}





    
}