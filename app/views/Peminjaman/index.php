<?php
if (!isset($_SESSION['login'])) {
    header("Location:" . BASEURL . "Login");
    exit;
}
?>
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
                    <button onclick="location.href='<?= BASEURL; ?>Beranda'">
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                        Beranda
                    </button>
                </li>
                <?php
                if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2')) {
                    echo '<li class="tambah-jenis-barang">
                            <button onclick="location.href=\'' . BASEURL . 'JenisBarang\'">
                                <i class="fa-solid fa-box" style="color: #ffffff"></i>
                                Jenis barang
                            </button>
                        </li>';
                }
                ?>
                <?php
                if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2')) {
                    echo '<li class="tambah-merek-barang">
                    <button onclick="location.href=\'' . BASEURL . 'merekBarang\'">
                        <i class="fa-solid fa-barcode" style="color: #ffffff;"></i>
                        Merek barang
                    </button>
                </li>';
                }
                ?>
                <?php
                if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2')) {
                    echo '<li class="tambah-peminjaman-barang">
                    <button onclick="location.href=\'' . BASEURL . 'peminjaman\'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                    </svg>
                        Peminjaman
                    </button>
                </li>';
                }
                ?>
                <?php
                if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3')) {
                    echo '<li class="kelola-akun">
                    <button onclick="location.href=\'' . BASEURL . 'KelolaAkun\'">
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
                            <button class="dropdown-item" onclick="location.href='<?= BASEURL ?>Profil'" type="button"
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
            <div class="form_peminjaman" style="display: flex; justify-content: space-around;">
                <div class="sisi_kiri" style="margin: 0px 0px 0px 50px;">
                    <div class="judul_kegiatan" style="margin-top: 30px;">
                        <label for="judul_kegiatan">Judul Kegiatan</label><br>
                        <input type="text" name="" id="judul_kegiatan" style="width: 250px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                    </div>
                    <div class="tanggal_pengajuan" style="margin-top: 30px;">
                        <label for="tanggal_pengajuan">Tanggal Pengajuan</label><br>
                        <input type="date" name="" id="tanggal_pengajuan" style="width: 250px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                    </div>
                    <div class="mulai_tanggal" style="margin-top: 30px;">
                        <label for="mulai_tanggal">Mulai Dari Tanggal</label><br>
                        <input type="date" name="" id="mulai_tanggal" style="width: 250px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                    </div>
                    <div class="jenis_barang" style="margin-top: 30px;">
                        <label for="jenis_barang">Jenis Barang</label><br>
                        <select name="" id=""
                            style="
                        height: 30px;
                        width: 250px;
                        border-radius: 8px;
                        background-color: rgba(202, 214, 255, 0.4);
                        border: none;
                        padding-left: 15px; 
                        box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);"
                            required>
                            <option selected>Select Option</option>
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                        </select>
                    </div>
                </div>
                <div class="sisi_kanan" style="margin: 0px 80px 0px 0px; display: flex; flex-direction: column; align-items: center;">
                    <img src="<?= BASEURL ?>img/happy robot assistant.svg" alt="" width="130px height: 35px;">
                    <div class="sampai_tanggal">
                        <label for="sampai_tanggal" style="margin-top: 55px;">Sampai Tanggal</label><br>
                        <input type="date" name="" id="sampai_tanggal" style="width: 400px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                    </div>
                    <div class="sisi_bawah" style="display: flex; justify-content: space-between; gap: 20px;">
                        <div class="jumlah_peminjaman" style="margin-top: 30px;">
                            <label for="jumlah_peminjaman">Jumlah</label><br>
                            <input type="number" name="" id="jumlah_peminjman" style="width: 100px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                        </div>
                        <div class="keterangan_peminjaman" style="margin-top: 30px;">
                            <label for="keterangan_peminjaman">Keterangan</label><br>
                            <input type="text" name="" id="keterangan_peminjaman" style="width: 240px; height: 35px; box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);">
                        </div>
                    </div>
                </div>
            </div>
            <button
                style="
                background-color: #0c1740;
                border-radius: 50%;
                margin: 20px 0px 0px 350px;
                box-shadow: 0px 5px 5px 0px rgba(0, 0, 0, 0.2);
                ">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="36"
                    height="36"
                    fill="white"
                    class="bi bi-plus"
                    viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    `
                </svg>
            </button>
            <div>

            </div>
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
        </div>
    </div>

</div>