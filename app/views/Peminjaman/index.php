<?php
if (!isset($_SESSION['login'])) {
    header("Location:" . BASEURL . "Login");
    exit;
}
?>

    <div class="content">
        <div class="content-beranda" style="overflow: hidden;">
            <h1 id="title" style="padding: 0px;margin: 40px 0px 40px 150px;">Peminjaman</h1>
            <div class="flash" style="width: 40%; margin-left:15px;">
                <?php Flasher::flash(); ?>
            </div>

            <!-- Button trigger modal -->
            <div class="btn-fitur" style="display: flex; justify-content:space-between;">
            <button data-toggle="modal" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
                <i class="fa-solid fa-plus" style="color: #ffffff"></i> Tambah
            </button>
            
        </div>

        <div style="max-height: 400px; overflow-y:auto;box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5); border-radius:5px; padding: 15px">
        <div style=" display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; ">
                <!-- Dropdown datatables_length -->
                <div class="dataTables_length"
                    style="display: inline-block; font-size: 14px; display: flex; justify-content: space-between; align-items: center;">
                    <label>
                        Show
                        <select name="entries_length" aria-controls="example" class="form-control form-control-sm"
                            style="width: auto; display: inline-block; margin-left: 5px; margin-right: 5px;">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        entries
                    </label>
                </div>

                <!-- Div pencarian -->
                <div style="display: flex; align-items: center; justify-content: flex-end; box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5); border-radius: 8px; overflow: hidden; width: 320px;">
                    <!-- Tombol Pencarian -->
                    <button
                        style="background-color: #0d1a4a; border: none; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; cursor: pointer; border-radius: 4px 0 0 4px;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="20" height="20">
                            <path
                                d="M10 2a8 8 0 016.32 12.9l5.38 5.38a1 1 0 01-1.42 1.42l-5.38-5.38A8 8 0 1110 2zm0 2a6 6 0 100 12 6 6 0 000-12z">
                            </path>
                        </svg>
                    </button>
                    <!-- Input Pencarian -->
                    <input type="text" id="customSearch" class="form-control" placeholder="Cari"
                        style="border: none; outline: none; padding: 10px 15px; font-size: 16px; flex-grow: 1; height: 40px;">
                </div>
            </div>
            <table id="myTable" class="table table-hover table-sm" style="width:100%;">
    <thead class="table-info">
        <tr>
            <th scope="col" class="p-2">No.</th>
            <th scope="col" class="p-2">Judul Kegiatan</th>
            <th scope="col" class="p-2">Tanggal Pengajuan</th>
            <th scope="col" class="p-2">Tanggal Mulai Peminjaman</th>
            <th scope="col" class="p-2">Tanggal Pengembalian</th>
            <th scope="col" class="p-2">Jenis Barang</th>
            <th scope="col" class="p-2">Jumlah Peminjaman</th>
            <th scope="col" class="p-2">Keterangan</th>
            <th scope="col" class="p-2">Status</th> <!-- Kolom status -->
            <th scope="col" class="p-2">Aksi</th> <!-- Kolom aksi -->
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($data['peminjaman'] as $peminjaman) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $peminjaman['judul_kegiatan'] ?></td>
            <td><?= $peminjaman['tanggal_pengajuan'] ?></td>
            <td><?= $peminjaman['tanggal_peminjaman'] ?></td>
            <td><?= $peminjaman['tanggal_pengembalian'] ?></td>
            <td><?= $peminjaman['sub_barang']; ?></td>
            <td><?= $peminjaman['jumlah_peminjaman'] ?></td>
            <td><?= $peminjaman['keterangan_peminjaman'] ?></td>
            <td>
                <!-- Menampilkan status -->
                <?php 
                $status = $peminjaman['status']; 
                echo ucfirst($status); // Menampilkan status dengan kapital pertama
                ?>
            </td>
            <td>
    <!-- Aksi: Edit dan Hapus -->
    <!-- <a href="edit.php?id=<?= $peminjaman['id'] ?>" class="btn btn-warning btn-sm">Edit</a> -->
    <a href="<?= BASEURL; ?>Peminjaman/hapusPeminjaman/<?= $peminjaman['id_peminjaman'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
    </td>


        </tr>
        <?php endforeach; ?>
    </tbody>
</table>



            </div>

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="tambahPeminjaman" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahPeminjaman">Tambah Data Peminjaman</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL ?>/peminjaman/tambahPeminjaman" method="post">

                                <div class="form_peminjaman">
                                    <div class="content-modal"
                                        style="display: flex; justify-content: space-around; gap: 20px;">
                                        <div class="sisi_kiri" style="margin: 0px 0px 0px 50px;">
                                            <div class="judul_kegiatan" style="margin-top: 30px;">
                                                <label for="judul_kegiatan">Judul Kegiatan</label><br>
                                                <input type="text" name="judul_kegiatan" id="judul_kegiatan"
                                                    style="width: 250px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                            <div class="tanggal_pengajuan" style="margin-top: 30px;">
                                                <label for="tanggal_pengajuan">Tanggal Pengajuan</label><br>
                                                <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan"
                                                    value="<?= date('Y-m-d H:i:s'); ?>" readonly
                                                    style="width: 250px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                            <div class="tanggal_peminjaman" style="margin-top: 30px;">
                                                <label for="tanggal_peminjaman">Mulai Dari Tanggal</label><br>
                                                <input type="date" name="tanggal_peminjaman" id="tanggal_peminjaman"
                                                    style="width: 250px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                        </div>
                                        <div class="sisi_kanan"
                                            style="margin: 0px 80px 0px 0px; display: flex; flex-direction: column; align-items: center;">
                                            <img src="<?= BASEURL ?>img/happy robot assistant.svg" alt=""
                                                width="130px height: 35px;">
                                            <div class="tanggal_pengembalian">
                                                <label for="tanggal_pengembalian" style="margin-top: 55px;">Sampai
                                                    Tanggal</label><br>
                                                <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian"
                                                    style="width: 400px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sisi_bawah" style="display: flex; flex-direction: column; gap: 20px;">
                                        <div class="input-group"
                                            style="display: flex; gap: 20px; align-items: center; justify-content: center; margin-top: 30px;">
                                            <div class="jenis_barang">
                                                <label for="id_jenis_barang">Jenis Barang</label><br>
                                                <select name="id_jenis_barang" class="jenis_barang_select"
                                                    style="height: 35px;padding-left: 0px; width: 250px; border-radius: 8px; background-color: rgba(202, 214, 255, 0.4); border: none; padding-left: 15px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);"
                                                    required>
                                                    <option>-- Pilih --</option>
                                                    <?php foreach ($data['sub_barang'] as $option) { ?>
                                                        <option value="<?php echo $option['id_jenis_barang'] ?>">
                                                            <?php echo $option['sub_barang'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="jumlah_peminjaman" style="margin-left: 15%;">
                                                <label for="jumlah_peminjaman">Jumlah</label><br>
                                                <input type="number" id="jumlah_peminjaman" name="jumlah_peminjaman"
                                                    class="jumlah_input"
                                                    style="width: 80px; height: 35px; position: relative; border-radius: 8px; background-color: rgba(202, 214, 255, 0.4); border: none; padding-left: 10px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                            <div class="keterangan_peminjaman">
                                                <label for="keterangan_peminjaman">Keterangan</label><br>
                                                <input type="text" id="keterangan_peminjaman"
                                                    name="keterangan_peminjaman" class="keterangan_input"
                                                    style="width: 250px; position: relative; height: 35px; border-radius: 8px; background-color: rgba(202, 214, 255, 0.4); border: none; padding-left: 10px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn-kirim-peminjaman" style="
                                color: white;
                                background-color: #0c1740;
                                border: none;
                                border-radius: 8px;
                                margin: 40px 40px;
                                float: right;
                                height: 35px;
                                width: 180px;
                                font-size: 15px;
                                font-weight: 400;
                                box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);
                                ">kirim</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>