<style>
    @media print {

        button,
        img {
            display: none;
        }
    }


    button:hover {
        cursor: pointer;
        opacity: 0.9;
    }

    button {
        width: 150px;
        height: 47px;
        border-radius: 8px;
        background-color: #0c1740;
        color: white;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-size: 15px;
        border: none;
    }
</style>
<div class="card-body p-3">
    <div class="header" style="display: flex; padding:20px;">
        <img src="<?=BASEURL;?>img/logo bg putih.svg" alt="logo" />
        <div class="button"
            style="padding-top:10px; width:100%; display:flex; align-items:end; gap:10px; flex-direction:column;">
            <button style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);"
            onclick="location.href='<?=BASEURL?>Beranda'"><i class="fa-solid fa-arrow-left" style="color: #ffffff; margin-right:10px;"></i>Kembali</button>
            <button onclick="cetak()" style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);"><i
                    class="fa-solid fa-print" style="color: #ffffff;margin-right:10px;"></i>Cetak</button>
        </div>
    </div>
    <table class="table table-hover table-sm" style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
        <thead class="table-info">
            <tr>
                <th scope="col" class="p-3">No.</th>
                <th scope="col" class="p-3">Kode barang</th>
                <th scope="col" class="p-3">Sub barang</th>
                <th scope="col" class="p-3">Nama merek</th>
                <th scope="col" class="p-3">Deskripsi barang</th>
                <th scope="col" class="p-3">Jumlah barang</th>
                <th scope="col" class="p-3">Nama satuan</th>
                <th scope="col" class="p-3">Tgl pengadaan</th>
                <th scope="col" class="p-3">Lokasi penyimpanan</th>
                <th scope="col" class="p-3">Detail lokasi</th>
                <th scope="col" class="p-3">Keterangan label</th>
                <th scope="col" class="p-3">Kondisi barang</th>
                <th scope="col" class="p-3">Status peminjaman</th>
            </tr>
        </thead>
        <tbody>
    <?php $i = 1; ?>
    <?php foreach ($data['dataCetak'] as $row): ?>
        
            <tr>
                <th scope="row" class="p-3"><?= $i++; ?></th>
                <td class="p-3"><?= $row['kode_barang']; ?></td>
                <td class="p-3"><?= $row['sub_barang']; ?></td>
                <td class="p-3"><?= $row['nama_merek_barang']; ?></td>
                <td class="p-3"><?= $row['deskripsi_barang']; ?></td>
                <td class="p-3"><?= $row['jumlah_barang']; ?></td>
                <td class="p-3"><?= $row['nama_satuan']; ?></td>
                <td class="p-3"><?= $row['tgl_pengadaan_barang']; ?></td>
                <td class="p-3"><?= $row['nama_lokasi_penyimpanan']; ?></td>
                <td class="p-3"><?= $row['deskripsi_detail_lokasi']; ?></td>
                <td class="p-3"><?= $row['keterangan_label']; ?></td>
                <td class="p-3"><?= $row['kondisi_barang']; ?></td>
                <td class="p-3"><?= $row['status_peminjaman']; ?></td>
            </tr>
        
    <?php endforeach; ?>
</tbody>

    </table>
</div>