<?php

class Beranda_model{

    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getSubBarang() {
        $query = "SELECT * FROM mst_jenis_barang ORDER BY sub_barang";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getMerekBarang() {
        $query = "SELECT * FROM mst_merek_barang ORDER BY nama_merek_barang";
        $this->db->query($query);
        return $this->db->resultSet();
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
 
    
    // Insert data into mst_jenis_barang
    

    $joinKodeJenisBarang = "SELECT (mst_jenis_barang.kode_jenis_barang) FROM trx_barang JOIN mst_jenis_barang ON trx_barang.id_jenis_barang = mst_jenis_barang.id_jenis_barang WHERE mst_jenis_barang.id_jenis_barang = trx_barang.id_jenis_barang";
    $this->db->query($joinKodeJenisBarang);
    $kodeJenisBarang = $this->db->single();
    $kodeJenisBarangString = $kodeJenisBarang['kode_jenis_barang'];

    
    $joinKodeMerekBarang = "SELECT mst_merek_barang.kode_merek_barang FROM trx_barang JOIN mst_merek_barang ON trx_barang.id_merek_barang = mst_merek_barang.id_merek_barang WHERE mst_merek_barang.id_merek_barang = trx_barang.id_merek_barang";
    $this->db->query($joinKodeMerekBarang);
    $kodeMerekBarang = $this->db->single();
    $kodeMerekBarangString = $kodeMerekBarang['kode_merek_barang'];

    

    
    $queryBarang = "INSERT INTO trx_barang (id_jenis_barang, id_merek_barang, id_kondisi_barang, jumlah_barang, id_satuan, deskripsi_barang, tgl_pengadaan_barang, keterangan_label, id_lokasi_penyimpanan, deskripsi_detail_lokasi, id_status, status_peminjaman, kode_barang) VALUES (:id_jenis_barang, :id_merek_barang, :id_kondisi_barang, :jumlah_barang, :id_satuan, :deskripsi_barang, :tgl_pengadaan_barang, :keterangan_label, :id_lokasi_penyimpanan, :deskripsi_detail_lokasi, :id_status, :status_peminjaman, :kode_barang)";
    

    $this->db->query($queryBarang);

    $this->db->query($queryBarang);
    $this->db->bind('id_jenis_barang', $data['sub_barang']);
    $this->db->bind('id_merek_barang', $data['nama_merek_barang']);
    $this->db->bind('id_kondisi_barang', $data['kondisi_barang']);
    $this->db->bind('jumlah_barang', $data['jumlah_barang']);
    $this->db->bind('id_satuan', $data['satuan']);
    $this->db->bind('deskripsi_barang', $data['deskripsi_barang']);
    $this->db->bind('tgl_pengadaan_barang', $data['tgl_pengadaan_barang']);
    $this->db->bind('keterangan_label', $data['keterangan_label']);
    $this->db->bind('id_lokasi_penyimpanan', $data['lokasi_penyimpanan']);
    $this->db->bind('deskripsi_detail_lokasi', $data['deskripsi_detail_lokasi']);
    $this->db->bind('id_status', $data['status']);
    $this->db->bind('status_peminjaman', $data['status_pinjam']);
    
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

$kodeBarang =  date('Y', strtotime($data['tgl_pengadaan_barang'])) . '/' . $romanMonth . '/' .  $kodeJenisBarangString. '/' . $kodeMerekBarangString. '/' . $data['barang-ke'] . '/' . $data['total_barang'];

    $this->db->bind('kode_barang', $kodeBarang);
    $this->db->execute();
   

    return $this->db->rowCount();
}



public function getDataBarang() {
    $tampilView = "SELECT * FROM trx_barang;";
    $this->db->query($tampilView);

    return $this->db->resultSet();

}

public function cekDataBarang($data){
       // Insert data into mst_jenis_barang
       $queryCekBarang = "SELECT COUNT(*) FROM trx_barang WHERE kode_barang = :kode_barang AND id_barang != :id_barang";

       $kodeBarang = $this->postDataBarang($data);

        $this->db->query($queryCekBarang);
        $this->db->bind('kode_barang', $kodeBarang);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->execute();

       return $this->db->single()['COUNT(*)'];
}


public function hapusBarang($id_barang){
    $this->db->query("DELETE FROM trx_barang WHERE id_barang = :id_barang;");
    $this->db->bind("id_barang", $id_barang);

    $this->db->execute();

    return $this->db->resultSet();
    }

    public function getUbah($id_barang) {
        $tampilView = "SELECT * FROM trx_barang WHERE id_barang = :id_barang;";
        $this->db->query($tampilView);
        $this->db->bind("id_barang", $id_barang);

        return $this->db->single();
    
    }

    public function ubahBarang($data)
    {
        $joinKodeJenisBarang = "SELECT mst_jenis_barang.kode_jenis_barang FROM trx_barang JOIN mst_jenis_barang ON trx_barang.id_jenis_barang = mst_jenis_barang.id_jenis_barang";
        $this->db->query($joinKodeJenisBarang);
        $this->db->execute();
    
        $kodeJenisBarang = $this->db->resultSet();
    
        $joinKodeMerekBarang = "SELECT mst_merek_barang.kode_merek_barang FROM trx_barang JOIN mst_merek_barang ON trx_barang.id_merek_barang = mst_merek_barang.id_merek_barang";
        $this->db->query($joinKodeMerekBarang);
        $this->db->execute();
        $kodeMerekBarang = $this->db->resultSet();
        
        $queryBarang = "UPDATE trx_barang SET
        id_jenis_barang = :id_jenis_barang, id_merek_barang = :id_merek_barang, id_kondis_barang = :id_kondis_barang, jumlah_barang = :jumlah_barang, id_satuan = :id_satuan, deskripsi_barang = :deskripsi_barang, tgl_pengadaan_barang = :tgl_pengadaan_barang, keterangan_label = :keterangan_label, id_lokasi_penyimpanan = :id_lokasi_penyimpanan, deskripsi_detail_lokasi = :deskripsi_detail_lokasi, id_status = :id_status, status_peminjaman = :status_peminjaman WHERE id_barang = :id_barang";

$this->db->query($queryBarang);
$this->db->bind('id_jenis_barang', $data['sub_barang']);

$this->db->bind('id_merek_barang', $data['nama_merek_barang']);
$this->db->bind('id_kondisi_barang', $data['kondisi_barang']);
$this->db->bind('jumlah_barang', $data['jumlah_barang']);
$this->db->bind('id_satuan', $data['satuan']);
$this->db->bind('deskripsi_barang', $data['deskripsi_barang']);
$this->db->bind('tgl_pengadaan_barang', $data['tgl_pengadaan_barang']);
$this->db->bind('keterangan_label', $data['keterangan_label']);
$this->db->bind('id_lokasi_penyimpanan', $data['lokasi_penyimpanan']);
$this->db->bind('deskripsi_detail_lokasi', $data['deskripsi_detail_lokasi']);
$this->db->bind('id_status', $data['status']);
$this->db->bind('status_peminjaman', $data['status_pinjam']);

$this->db->execute();


return $this->db->rowCount();
    }
    public function cariDataBarang(){
        $keyword = $_POST['keyword'];
        $query= "SELECT * FROM trx_barang JOIN mst_jenis_barang ON trx_barang.id_jenis_barang = mst_jenis_barang.id_jenis_barang WHERE mst_jenis_barang.id_jenis_barang LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();

    }
}