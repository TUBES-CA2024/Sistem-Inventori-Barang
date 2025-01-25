



<?php

class Peminjaman_model {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function postDataPeminjaman($data) {
        // Tambahkan timestamp saat ini jika 'tanggal_pengajuan' tidak disertakan
        if (!isset($data['tanggal_pengajuan'])) {
            $data['tanggal_pengajuan'] = date('d-m-Y H:i:s'); // Format MySQL datetime
        }
    
        // Pastikan semua key yang diperlukan ada dalam array data
        $requiredKeys = ['judul_kegiatan', 'tanggal_pengajuan', 'tanggal_peminjaman', 'tanggal_pengembalian', 'id_jenis_barang', 'jumlah_peminjaman', 'keterangan_peminjaman'];
        foreach ($requiredKeys as $key) {
            if (!isset($data[$key])) {
                throw new Exception("Key '$key' tidak ada dalam data.");
            }
        }

        // Set nilai default untuk 'status' jika tidak ada dalam data
        if (!isset($data['status'])) {
            $data['status'] = 'diproses'; // Nilai default untuk status
        }

        // Query untuk memasukkan data peminjaman baru
        $queryPeminjaman = "INSERT INTO trx_peminjaman 
                            (judul_kegiatan,  tanggal_peminjaman, tanggal_pengembalian, id_jenis_barang, jumlah_peminjaman, keterangan_peminjaman ) 
                            VALUES (:judul_kegiatan, :tanggal_peminjaman, :tanggal_pengembalian, :id_jenis_barang, :jumlah_peminjaman, :keterangan_peminjaman)";
    
        $this->db->query($queryPeminjaman);
        $this->db->bind('judul_kegiatan', $data['judul_kegiatan']);
        // $this->db->bind('tanggal_pengajuan', $data['tanggal_pengajuan']); // Bind tanggal_pengajuan
        $this->db->bind('tanggal_peminjaman', $data['tanggal_peminjaman']);
        $this->db->bind('tanggal_pengembalian', $data['tanggal_pengembalian']);
        $this->db->bind('id_jenis_barang', $data['id_jenis_barang']);
        $this->db->bind('jumlah_peminjaman', $data['jumlah_peminjaman']);
        $this->db->bind('keterangan_peminjaman', $data['keterangan_peminjaman']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function getPeminjamanBarang() {
        // Query untuk mengambil sub_barang dan informasi peminjaman dari trx_peminjaman
        $query = "SELECT trx_peminjaman.*, mst_jenis_barang.sub_barang 
                  FROM trx_peminjaman 
                  JOIN mst_jenis_barang ON trx_peminjaman.id_jenis_barang = mst_jenis_barang.id_jenis_barang";
        
        $this->db->query($query);
        return $this->db->resultSet();  // Hasil query yang akan mengembalikan sub_barang
    }
    


    public function getSubBarang() {
        $query = "SELECT id_jenis_barang, sub_barang FROM mst_jenis_barang ORDER BY sub_barang";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function hapusDataPeminjaman($id) {
        // Debugging: Cek apakah id diterima dengan benar
        var_dump($id); // Memastikan id diterima dengan benar
        
        // Ubah kolom 'id' menjadi 'id_peminjaman' sesuai dengan nama kolom yang ada di tabel
        $queryHapus = "DELETE FROM trx_peminjaman WHERE id_peminjaman = :id_peminjaman";
        $this->db->query($queryHapus);
        
        // Bind parameter 'id_peminjaman' ke query
        $this->db->bind('id_peminjaman', $id);
    
        $this->db->execute();
    
        return $this->db->rowCount(); // Memastikan query dieksekusi dengan benar
    }
    
    
}

