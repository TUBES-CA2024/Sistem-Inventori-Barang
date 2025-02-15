<?php
if (!isset($_SESSION['login'])) {
    header("Location:" . BASEURL . "Login");
    exit;
}
?>

<script src=" https://code.jquery.com/jquery-3.7.0.js"></script>

<div class="body-beranda">
    <div class="side-bar">
        <div class="profil">
            <div class="logo">
                <img src="<?= BASEURL; ?>img/logo bg hitam.svg" alt="logo" />
            </div>
            <div class="data-profil">
                <?php

                $foto_profil = $data['profile']['foto'];
                if ($foto_profil == "../public/img/foto-profile/") {
                    echo '<img src="' . BASEURL . $foto_profil . '/user.svg' . '" alt="profile" style="border-radius: 50%; height: 100px; width: 100px; object-fit:cover;">';
                } else {
                    echo '<img src="' . BASEURL . $foto_profil . '" alt="profile" style="border-radius: 50%; height: 100px; width: 100px; object-fit:cover;">';
                }

                echo '<div class="detail-data-profil">';
                if (isset($data['profile']['nama_user']) && isset($data['profile']['role'])) {
                    $nama = $data['profile']['nama_user'];
                    $role = $data['profile']['role'];
                    echo '<p style="color: white; font-weight: 600; margin-bottom:0;">' . $nama . '</p>
                      <p style="color: white; font-size: 13px;">' . $role . '</p></div>';
                }

                ?>

            </div>
        </div>
        <hr />
        <div class="menu">
            <ul>
                <li class="beranda">
                    <button onclick="location.href='<?=BASEURL;?>Beranda'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                        </svg>
                        Beranda
                    </button>
                </li>
                <?php
                    if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2')) {
                        echo '<li class="tambah-jenis-barang">
                            <button onclick="location.href=\''.BASEURL.'JenisBarang\'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box2-fill" viewBox="0 0 16 16">
                                <path d="M3.75 0a1 1 0 0 0-.8.4L.1 4.2a.5.5 0 0 0-.1.3V15a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4.5a.5.5 0 0 0-.1-.3L13.05.4a1 1 0 0 0-.8-.4zM15 4.667V5H1v-.333L1.5 4h6V1h1v3h6z"/>
                                </svg>
                                Jenis barang
                            </button>
                        </li>';
                    }
                ?>
                <?php
                    if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2')) {
                echo '<li class="tambah-merek-barang">
                    <button onclick="location.href=\''.BASEURL.'merekBarang\'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-upc" viewBox="1 0 16 16">
                        <path d="M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z"/>
                        </svg>
                        Merek barang

                    </button>
                </li>';
                    }
                    ?>
                <?php
                    if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2')) {
                echo '<li class="tambah-peminjaman-barang">
                    <button onclick="location.href=\'' . BASEURL . 'peminjaman\'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus-fill" viewBox="-1 0 16 16">
                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0"/>
                    </svg>
                        Peminjaman
                    </button>
                </li>';
                    }
                    ?>
                <?php
                if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3')) {
                echo '<li class="kelola-akun">
                    <button onclick="location.href=\''.BASEURL.'KelolaAkun\'">
                        <i class="fa-solid fa-users-gear" style="color: #ffffff"></i>
                        Kelola akun
                    </button>
                </li>';
                }
                ?>
                <li class="keluar" style="margin-top: 40px;">
                    <div class="btn-group dropright">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" onmouseover="this.style.backgroundColor='#CAD6FF'"
                            onmouseout="this.style.backgroundColor='transparent'">
                            <i class="fa-solid fa-gear" style="color: #ffffff;"></i>Pengaturan </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" onclick="location.href='<?=BASEURL?>Profil'" type="button"
                                style="margin-top: 10px; color:black;">
                                <i class="fa-regular fa-user"></i>Profil</button>
                            <button class="dropdown-item" data-toggle="modal" data-target="#konfirmasiKeluar"
                                style="color: black; margin-top: 0;">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Keluar
                            </button>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="content-beranda" style="overflow: hidden;">
            <h1 id="title" style="padding: 0px;margin: 40px 0px 40px 150px;">Peminjaman</h1>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                style="
            color: white;
            background-color: #0c1740;
            border: none;
            border-radius: 8px;
            margin: 40px 40px;
            height: 35px;
            width: 180px;
            font-size: 15px;
            font-weight: 400;
             box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);
             ">
                <i class="fa-solid fa-plus" style="color: #ffffff; "></i>
                &ensp;Tambah
            </button>

            <div style="max-height: 360px; overflow-y:auto;box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5); border-radius:5px;">
                <table id="myTable" class="table table-hover table-sm"
                    style=" width:100%;">
                    <thead class="table-info">
                        <tr>
                            <th scope="col" class="p-2">No.</th>
                            <th scope="col" class="p-2">Judul Kegiatan</th>
                            <th scope="col" class="p-2">Tanggal Pengajuan</th>
                            <th scope="col" class="p-2">Tanggal Peminjaman</th>
                            <th scope="col" class="p-2">Tanggal Pengembalian</th>
                            <th scope="col" class="p-2">Jumlah</th>
                            <th scope="col" class="p-2">Keterangan</th>
                            <th scope="col" class="p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data['peminjaman'] as $row): ?>
                            <tr style="font-size: 14px;">
                                <td scope="row" class="px-2"><?= $i++; ?></td>
                                <td class="p-2" style="text-transform: capitalize;"><?= $row['judul_kegiatan']; ?></td>
                                <td class="p-2"><?= $row['tanggal_pengajuan']; ?></td>
                                <td class="p-2"><?= $row['tanggal_peminjaman']; ?></td>
                                <td class="p-2"><?= $row['tanggal_pengembalian']; ?></td>
                                <td class="p-2"><?= $row['jumlah']; ?></td>
                                <td class="p-2"><?= $row['spesifikasi']; ?></td>
                                <td class="p-2" style="display: flex;">
                                    <!-- hapus -->
                                    <a href="<?= BASEURL; ?>/peminjaman/delete/<?= $row['id_peminjaman']; ?>" class="btn d-flex align-items-center justify-content-center" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fa-solid fa-trash-can fa-lg" style="color: #cc3030;"></i>
                                    </a>


                                    <!-- ubah -->
                                    <a href="<?= BASEURL; ?>/JenisBarang/ubah/<?=$row['id_jenis_barang'];?>" 
                                    class="btn d-flex align-items-center justify-content-center tampilUbahPeminjaman"
                                        data-toggle="modal"
                                        data-target="#modalEdit"
                                        data-id="<?= $row['id_peminjaman']; ?>">
                                        <i class="fa-solid fa-pen-to-square fa-lg" style="color: #30cc30;"></i>
                                    </a>
                                    <script>
                                     $(function() {
                                        $('.tampilUbahPeminjaman').on('click', function() {
                                            const id = $(this).data('id');
            
                                            $.ajax({
                                                url: 'http://localhost/tubes_lab/Sistem-Inventori-Barang/public/peminjaman/ubahPeminjaman',
                                                data: { id_peminjaman: id }, // Sesuaikan dengan PHP
                                                method: 'POST',
                                                dataType: 'json',
                                                success: function(data) {

                                                        $("#id_peminjaman").val(data.id_peminjaman);
                                                        $("#judul_kegiatan").val(data.judul_kegiatan);
                                                        $("#tanggal_pengajuan").val(data.tanggal_pengajuan);
                                                        $("#tanggal_peminjaman").val(data.tanggal_peminjaman);
                                                        $("#tanggal_pengembalian").val(data.tanggal_pengembalian);
                                                        $("#jenis_barang").val(data.id_jenis_barang);
                                                        $("#jumlah").val(data.jumlah);
                                                        $("#spesifikasi").val(data.spesifikasi);
                                                },
                                            });
                                        });
                                    });
                                    </script>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content" style="border-radius: 15px;">
                                                <form action="<?= BASEURL; ?>/peminjaman/update" method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditLabel">Edit Data Peminjaman</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" id="id_peminjaman" name="id_peminjaman">
                                                        <div class="form-group">
                                                            <label for="judul_kegiatan">Judul Kegiatan</label>
                                                            <input type="text" class="form-control" id="judul_kegiatan" name="judul_kegiatan">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                                                            <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                                            <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_mulai">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggal_pengembalian">Sampai Tanggal</label>
                                                            <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_terakhir">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="jenis_barang">Jenis Barang</label>
                                                            <select class="form-control" name="jenis_barang" id="jenis_barang">
                                                                <?php foreach ($data['sub_barang'] as $barang): ?>
                                                                    <option value="<?= $barang['id_jenis_barang']; ?>">
                                                                        <?= $barang['sub_barang']; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="jumlah">Jumlah</label>
                                                            <input type="number" class="form-control" id="jumlah" name="jumlah_peminjaman">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="spesifikasi">Keterangan</label>
                                                            <input type="text" class="form-control" id="spesifikasi" name="keterangan_peminjaman">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="
                    color: white;
                    background-color: #0c1740;
                    border: none;
                    border-radius: 8px;
                    margin: 10px 10px;
                    height: 35px;
                    width: 150px;
                    font-size: 15px;
                    font-weight: 400;
                    box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);
                    ">Kirim</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>




            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="tambahPeminjaman" aria-hidden="true">
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
                                    <div class="content-modal" style="display: flex; justify-content: space-around; gap: 20px;">
                                        <div class="sisi_kiri" style="margin: 0px 0px 0px 50px;">
                                        <input type="hidden" id="id_peminjaman" name="id_peminjaman">
                                            <div class="judul_kegiatan" style="margin-top: 30px;">
                                                <label for="judul_kegiatan">Judul Kegiatan</label><br>
                                                <input type="text" name="judul_kegiatan" id="judul_kegiatan" style="width: 250px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                            <div class="tanggal_pengajuan" style="margin-top: 30px;">
                                                <label for="tanggal_pengajuan">Tanggal Pengajuan</label><br>
                                                <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" style="width: 250px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                            <div class="tanggal_mulai" style="margin-top: 30px;">
                                                <label for="mulai_tanggal">Mulai Dari Tanggal</label><br>
                                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" style="width: 250px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                        </div>
                                        <div class="sisi_kanan" style="margin: 0px 80px 0px 0px; display: flex; flex-direction: column; align-items: center;">
                                            <img src="<?= BASEURL ?>img/happy robot assistant.svg" alt="" width="130px height: 35px;">
                                            <div class="tanggal_terakhir">
                                                <label for="sampai_tanggal" style="margin-top: 55px;">Sampai Tanggal</label><br>
                                                <input type="date" name="tanggal_terakhir" id="tanggal_terakhir" style="width: 400px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sisi_bawah" style="display: flex; flex-direction: column; gap: 20px;">
                                        <div class="input-group" style="display: flex; gap: 20px; align-items: center; justify-content: center; margin-top: 30px;">
                                            <div class="jenis_barang">
                                                <label for="jenis_barang">Jenis Barang</label><br>
                                                <select name="jenis_barang" class="jenis_barang_select" style="height: 35px; width: 250px; border-radius: 8px; background-color: rgba(202, 214, 255, 0.4); border: none; padding-left: 15px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);" required>
                                                    <option>-- Pilih --</option>
                                                    <?php foreach ($data['sub_barang'] as $option) { ?>
                                                        <option value="<?php echo $option['id_jenis_barang'] ?>"><?php echo $option['sub_barang'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="jumlah_peminjaman" style="margin-left: 15%;">
                                                <label for="jumlah_peminjaman">Jumlah</label><br>
                                                <input type="number" id="jumlah_peminjaman" name="jumlah_peminjaman" class="jumlah_input" style="width: 80px; height: 35px; border-radius: 8px; background-color: rgba(202, 214, 255, 0.4); border: none; padding-left: 10px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                            <div class="keterangan_peminjaman">
                                                <label for="keterangan_peminjaman">Keterangan</label><br>
                                                <input type="text" id="keterangan_peminjaman" name="keterangan_peminjaman" class="keterangan_input" style="width: 250px; height: 35px; border-radius: 8px; background-color: rgba(202, 214, 255, 0.4); border: none; padding-left: 10px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                                            </div>
                                            <div class="tombol-tambah-peminjaman">
                                                <button type="button" style="background-color: #0c1740; color: white; border-radius: 50%; height: 40px; width: 40px; display: flex; align-items: center; justify-content: center; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2); cursor: pointer; margin-top: 30px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-plus" viewBox="0 0 16 16">
                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        const tambahButton = document.querySelector('.tombol-tambah-peminjaman');
                                        const parentContainer = document.querySelector('.sisi_bawah');

                                        tambahButton.addEventListener('click', () => {
                                            const newInputGroup = document.createElement('div');
                                            newInputGroup.classList.add('input-group');
                                            newInputGroup.style.display = 'flex';
                                            newInputGroup.style.alignItems = 'center';
                                            newInputGroup.style.justifyContent = 'center';
                                            newInputGroup.style.gap = '20px';
                                            newInputGroup.style.marginTop = '15px';

                                            // Jenis Barang
                                            const jenisDiv = document.createElement('div');
                                            const jenisLabel = document.createElement('label');
                                            jenisLabel.innerText = 'Jenis Barang';
                                            const breakLine1 = document.createElement('br');
                                            const jenisSelect = document.createElement('select');
                                            jenisSelect.classList.add('jenis_barang_select');
                                            jenisSelect.style.height = '35px';
                                            jenisSelect.style.width = '250px';
                                            jenisSelect.style.borderRadius = '8px';
                                            jenisSelect.style.backgroundColor = 'rgba(202, 214, 255, 0.4)';
                                            jenisSelect.style.border = 'none';
                                            jenisSelect.style.paddingLeft = '15px';
                                            jenisSelect.style.boxShadow = '0px 5px 5px 0px rgba(0, 0, 0, 0.2)';
                                            jenisSelect.innerHTML = `<?php foreach ($data["sub_barang"] as $option) { ?> 
                                    <option value="<?php echo $option["id_jenis_barang"] ?>">
                                        <?php echo $option["sub_barang"] ?>
                                    </option> 
                                 <?php } ?>`;
                                            jenisDiv.append(jenisLabel, breakLine1, jenisSelect);

                                            // Jumlah
                                            const jumlahDiv = document.createElement('div');
                                            const jumlahLabel = document.createElement('label');
                                            jumlahLabel.innerText = 'Jumlah';
                                            const breakLine2 = document.createElement('br');
                                            const jumlahInput = document.createElement('input');
                                            jumlahInput.type = 'number';
                                            jumlahInput.style.width = '80px';
                                            jumlahInput.style.height = '35px';
                                            jumlahInput.style.borderRadius = '8px';
                                            jumlahInput.style.backgroundColor = 'rgba(202, 214, 255, 0.4)';
                                            jumlahInput.style.border = 'none';
                                            jumlahInput.style.paddingLeft = '10px';
                                            jumlahInput.style.boxShadow = '0px 5px 5px 0px rgba(0, 0, 0, 0.2)';
                                            jumlahDiv.style.marginLeft = '14%';
                                            jumlahDiv.append(jumlahLabel, breakLine2, jumlahInput);

                                            // Keterangan
                                            const keteranganDiv = document.createElement('div');
                                            const keteranganLabel = document.createElement('label');
                                            keteranganLabel.innerText = 'Keterangan';
                                            const breakLine3 = document.createElement('br');
                                            const keteranganInput = document.createElement('input');
                                            keteranganInput.type = 'text';
                                            keteranganInput.style.width = '250px';
                                            keteranganInput.style.height = '35px';
                                            keteranganInput.style.borderRadius = '8px';
                                            keteranganInput.style.backgroundColor = 'rgba(202, 214, 255, 0.4)';
                                            keteranganInput.style.border = 'none';
                                            keteranganInput.style.paddingLeft = '10px';
                                            keteranganInput.style.boxShadow = '0px 5px 5px 0px rgba(0, 0, 0, 0.2)';
                                            keteranganDiv.append(keteranganLabel, breakLine3, keteranganInput);

                                            // Tombol Hapus
                                            const hapusButton = document.createElement('button');
                                            hapusButton.style.marginTop = '20px';
                                            hapusButton.style.backgroundColor = '#ff4c4c';
                                            hapusButton.style.color = 'white';
                                            hapusButton.style.border = 'none';
                                            hapusButton.style.padding = '10px';
                                            hapusButton.style.borderRadius = '50%';
                                            hapusButton.style.cursor = 'pointer';
                                            hapusButton.style.boxShadow = '0px 5px 5px 0px rgba(0, 0, 0, 0.2)';
                                            hapusButton.style.display = 'flex';
                                            hapusButton.style.alignItems = 'center';
                                            hapusButton.style.justifyContent = 'center';

                                            // Menambahkan ikon trash
                                            hapusButton.innerHTML = `
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            `;

                                            // Event listener untuk menghapus baris
                                            hapusButton.addEventListener('click', () => {
                                                newInputGroup.remove();
                                            });

                                            // Tambahkan elemen ke dalam grup
                                            newInputGroup.append(jenisDiv, jumlahDiv, keteranganDiv, hapusButton);

                                            // Tambahkan ke parent container
                                            parentContainer.appendChild(newInputGroup);
                                        });
                                    </script>

                                </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn-kirim-peminjaman"
                                style="
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="errorMessage" class="alert alert-danger" style="display: none;"></div>
    </div>
</div>

<?php

var_dump($_POST);

