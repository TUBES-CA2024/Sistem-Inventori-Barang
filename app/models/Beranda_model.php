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

$kodeBarang =  date('Y', strtotime($data['tgl_pengadaan_barang'])) . '/' . $romanMonth . '/' .  $kodeJenisBarangString. '/' . $kodeMerekBarangString. '/' . $data['barang_ke'] . '/' . $data['total_barang'];

    $this->db->bind('kode_barang', $kodeBarang);
    $this->db->execute();
   

    return $this->db->rowCount();
}



public function getDataBarang() {

    $tampilView = "CALL tampil_data_barang;";
    // $tampilView = "SELECT trx_barang.id_barang,
    // trx_barang.kode_barang,
    // mst_jenis_barang.sub_barang,
    // mst_merek_barang.nama_merek_barang,
    // mst_kondisi_barang.kondisi_barang,
    // trx_barang.jumlah_barang,
    // mst_satuan.nama_satuan,
    // trx_barang.deskripsi_barang,
    // trx_barang.tgl_pengadaan_barang,
    // trx_barang.keterangan_label,
    // mst_lokasi_penyimpanan.nama_lokasi_penyimpanan,
    // trx_barang.deskripsi_detail_lokasi,
    // mst_status.status,
    // trx_barang.status_peminjaman
    // FROM trx_barang 
    // JOIN mst_status ON trx_barang.id_status = mst_status.id_status
    // JOIN mst_jenis_barang ON trx_barang.id_jenis_barang = mst_jenis_barang.id_jenis_barang
    // JOIN mst_merek_barang ON trx_barang.id_merek_barang = mst_merek_barang.id_merek_barang
    // JOIN mst_lokasi_penyimpanan ON trx_barang.id_lokasi_penyimpanan = mst_lokasi_penyimpanan.id_lokasi_penyimpanan
    // JOIN mst_kondisi_barang ON trx_barang.id_kondisi_barang = mst_kondisi_barang.id_kondisi_barang
    // JOIN mst_satuan ON trx_barang.id_satuan = mst_satuan.id_satuan;";
    $this->db->query($tampilView);

    return $this->db->resultSet();

}



public function getDetailDataBarang($id_barang){
        $this->db->query("SELECT * FROM detail_barang WHERE id_barang = :id_barang");
        $this->db->bind("id_barang", $id_barang);
     
        return $this->db->single(); // Pastikan ini mengembalikan array dengan kunci "detail_barang"
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
        try {
        
            $joinKodeJenisBarang = "SELECT (mst_jenis_barang.kode_jenis_barang) FROM trx_barang JOIN mst_jenis_barang ON trx_barang.id_jenis_barang = mst_jenis_barang.id_jenis_barang WHERE  trx_barang.id_jenis_barang = mst_jenis_barang.id_jenis_barang ;";

        $this->db->query($joinKodeJenisBarang);

        $kodeJenisBarang = $this->db->single();
        $kodeJenisBarangString = $kodeJenisBarang['kode_jenis_barang'];
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
        
        try {
            $joinKodeMerekBarang = "SELECT mst_merek_barang.kode_merek_barang FROM trx_barang JOIN mst_merek_barang ON trx_barang.id_merek_barang = mst_merek_barang.id_merek_barang WHERE trx_barang.id_merek_barang = mst_merek_barang.id_merek_barang;";

        $this->db->query($joinKodeMerekBarang);

        $kodeMerekBarang = $this->db->single();
        $kodeMerekBarangString = $kodeMerekBarang['kode_merek_barang'];
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
    
        
        
        $queryBarang = "UPDATE trx_barang SET
        id_jenis_barang = :id_jenis_barang, id_merek_barang = :id_merek_barang, id_kondisi_barang = :id_kondisi_barang, jumlah_barang = :jumlah_barang, id_satuan = :id_satuan, deskripsi_barang = :deskripsi_barang, tgl_pengadaan_barang = :tgl_pengadaan_barang, keterangan_label = :keterangan_label, id_lokasi_penyimpanan = :id_lokasi_penyimpanan, deskripsi_detail_lokasi = :deskripsi_detail_lokasi, id_status = :id_status, status_peminjaman = :status_peminjaman, 
        kode_barang = :kode_barang WHERE id_barang = :id_barang";


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

    function Romawi($number){
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
$romanMonth = Romawi($month);
  
$kodeBarang =  date('Y', strtotime($data['tgl_pengadaan_barang'])) . '/' . $romanMonth . '/' .  $kodeJenisBarangString. '/' . $kodeMerekBarangString. '/' . $data['barang_ke'] . '/' . $data['total_barang'];

$this->db->bind('kode_barang', $kodeBarang);
$this->db->bind('id_barang', $data['id_barang']);
$this->db->execute();
 

return $this->db->rowCount();
}

    public function cariDataBarang(){
        $keyword = $_POST['keyword'];
        $query = "SELECT	
                trx_barang.id_barang,
                mst_jenis_barang.sub_barang,
                mst_merek_barang.nama_merek_barang,      
                mst_kondisi_barang.kondisi_barang,
                trx_barang.jumlah_barang,
                mst_satuan.nama_satuan,
                trx_barang.deskripsi_barang,
                trx_barang.tgl_pengadaan_barang,
                trx_barang.kode_barang,
                trx_barang.keterangan_label,
                mst_lokasi_penyimpanan.nama_lokasi_penyimpanan,
                trx_barang.deskripsi_detail_lokasi,
                trx_barang.status_peminjaman
            FROM 
                trx_barang
            JOIN 
                mst_jenis_barang ON trx_barang.id_jenis_barang = mst_jenis_barang.id_jenis_barang
            JOIN 
                mst_merek_barang ON trx_barang.id_merek_barang = mst_merek_barang.id_merek_barang
            JOIN
                mst_satuan ON trx_barang.id_satuan = mst_satuan.id_satuan
            JOIN 
                mst_kondisi_barang ON trx_barang.id_kondisi_barang = mst_kondisi_barang.id_kondisi_barang
            JOIN 
                mst_lokasi_penyimpanan ON trx_barang.id_lokasi_penyimpanan = mst_lokasi_penyimpanan.id_lokasi_penyimpanan
            WHERE 
                mst_jenis_barang.sub_barang LIKE :keyword
                OR mst_merek_barang.nama_merek_barang LIKE :keyword
                OR mst_lokasi_penyimpanan.nama_lokasi_penyimpanan LIKE :keyword
                OR trx_barang.status_peminjaman LIKE :keyword
                OR trx_barang.kode_barang LIKE :keyword";
        
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
        
    }

    // public function profile($id_user){
    //     $this->db->query("SELECT * FROM trx_data_user WHERE id_user = :id_user");
    //     $this->db->bind("id_user", $id_user);
    //     return $this->db->single(); // Pastikan ini mengembalikan array dengan kunci "detail_barang"

    // }

    public function cetak($id_barang){
        $query = "SELECT   mst_jenis_barang.sub_barang,
        mst_merek_barang.nama_merek_barang,      
        mst_kondisi_barang.kondisi_barang,
        trx_barang.jumlah_barang,
        mst_satuan.nama_satuan,
        trx_barang.deskripsi_barang,
        trx_barang.tgl_pengadaan_barang,
        trx_barang.kode_barang,
        trx_barang.keterangan_label,
        mst_lokasi_penyimpanan.nama_lokasi_penyimpanan,
        trx_barang.deskripsi_detail_lokasi,
        trx_barang.status_peminjaman
    FROM 
        trx_barang
    JOIN 
        mst_jenis_barang ON trx_barang.id_jenis_barang = mst_jenis_barang.id_jenis_barang
    JOIN 
        mst_merek_barang ON trx_barang.id_merek_barang = mst_merek_barang.id_merek_barang
    JOIN
        mst_satuan ON trx_barang.id_satuan = mst_satuan.id_satuan
    JOIN 
        mst_kondisi_barang ON trx_barang.id_kondisi_barang = mst_kondisi_barang.id_kondisi_barang
    JOIN 
        mst_lokasi_penyimpanan ON trx_barang.id_lokasi_penyimpanan = mst_lokasi_penyimpanan.id_lokasi_penyimpanan
    WHERE id_barang = :id_barang";
  

$this->db->query($query);
$this->db->query('id_barang', $id_barang);
$this->db->execute();
$result = $this->db->resultSet();

    return $result;

    }


}







