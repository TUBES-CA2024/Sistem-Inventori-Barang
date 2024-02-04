<?php
        if (!isset($_SESSION['login'])) {
          header("Location:" . BASEURL . "Login");
          exit;
        }    
?>
<style>
   
    p{
        opacity: 0.5; 
    }
    .card-body{
        display: flex;
        gap: 200px;
    }
    .btn{
        width: 20%;
        margin: 15px;
        background-color: #0C1740;
        color: white;
        border-radius: 8px;
    }

    .btn:hover{
        opacity: 0.9;
        color: white;
    }
    .card-header{
        background-color: #0C1740;
        color: white;

    }
    body{
        background-image: url("<?=BASEURL;?>/img/working-space.svg");
        background-size: cover;
        backdrop-filter: blur(5px);

    }
    .container{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .card{
        box-shadow: 5px 5px 10px 0 rgba(0, 0, 0, 0.3);
    }

</style>
<div class="container">
<div class="card">
  <div class="card-header">
    Detail Barang
  </div>
  <div class="card-body">
        <div>
                        <span>
                            <h6>Kode barang</h6>
                            <p><?= $data['dataTampilBarang']['kode_barang']; ?></p>
                        </span>
                        <span>
                          <h6>Jenis barang</h6>
                          <p style="text-transform: capitalize;"><?=$data['dataTampilBarang']['sub_barang'];?></p>
                        </span>
                        <span>
                          <h6>Merek barang</h6>
                          <p style="text-transform: capitalize;"><?=$data['dataTampilBarang']['nama_merek_barang'];?></p>
                        </span>
                        <span>
                          <h6>Deskripsi Barang</h6>
                          <p style="text-transform: capitalize;"><?=$data['dataTampilBarang']['deskripsi_barang'];?></p>
                        </span>
                        <span>
                          <h6>Jumlah barang</h6>
                          <p><?=$data['dataTampilBarang']['jumlah_barang'];?></p>
                        </span>
                        <span>
                          <h6>Satuan jumlah</h6>
                          <p><?=$data['dataTampilBarang']['nama_satuan'];?></p>
                        </span>
        </div>
        <div>
                    <span>
                          <h6>Tanggal pengadaan</h6>
                          <p><?=$data['dataTampilBarang']['tgl_pengadaan_barang'];?></p>
                        </span>
                        <span>
                          <h6>Lokasi penyimpanan</h6>
                          <p><?=$data['dataTampilBarang']['nama_lokasi_penyimpanan'];?></p>
                        </span>
                        <span>
                          <h6>Detail lokasi penyimpanan</h6>
                          <p style="text-transform: capitalize;"><?=$data['dataTampilBarang']['deskripsi_detail_lokasi'];?></p>
                        </span>
                        <span>
                          <h6>Kondisi barang</h6>
                          <p><?=$data['dataTampilBarang']['kondisi_barang'];?></p>
                        </span>
                        <span>
                          <h6>Status pinjam</h6>
                          <p><?=$data['dataTampilBarang']['status_peminjaman'];?></p>
                        </span>
                        <span>
                          <h6>Keterangan label</h6>
                          <p><?=$data['dataTampilBarang']['keterangan_label'];?></p>
                        </span>
        </div>
        
  </div>
                <a href="<?=BASEURL;?>Beranda" class="btn"><i class="fa-solid fa-arrow-left" style="color: #ffffff; margin-right: 10px;"></i>Kembali</a>
</div>