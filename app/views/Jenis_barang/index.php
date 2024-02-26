<?php
        if (!isset($_SESSION['login']) || ($_SESSION['id_role'] == '1')) {
          header("Location:" . BASEURL . "Login");
          exit;
        }    
?>

<div class="body-beranda" style="overflow: hidden;">
    <div class="side-bar">
        <div class="profil">
            <div class="logo">
                <img src="<?=BASEURL;?>img/logo bg hitam.svg" alt="logo" />
            </div>
            <div class="data-profil">
                <?php

                        $foto_profil = $data['profile']['foto'];
                        echo '<img src="'. BASEURL . $foto_profil . '" alt="profile" style="border-radius: 50%; height: 100px; width: 100px; object-fit:cover;">';
                        
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
                        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                        Beranda
                    </button>
                </li>
                <li class="tambah-jenis-barang">
                    <button onclick="location.href='<?=BASEURL;?>JenisBarang'">
                        <i class="fa-solid fa-box" style="color: #ffffff"></i>
                        Jenis barang
                    </button>
                </li>
                <li class="tambah-merek-barang">
                    <button onclick="location.href='<?=BASEURL?>merekBarang'">
                        <i class="fa-solid fa-barcode" style="color: #ffffff;"></i>
                        Merek barang
                    </button>
                </li>
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
                <li class="keluar" style="margin-top:40px;">
                    <div class="btn-group dropright">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                            onmouseover="this.style.backgroundColor='#CAD6FF'"
                            onmouseout="this.style.backgroundColor='transparent'" aria-haspopup="true"
                            aria-expanded="false">
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

    <!-- modal keluar -->
    <div class="modal fade" id="konfirmasiKeluar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-body"
                    style="display: flex;justify-content: center; flex-direction: column; align-items: center;">

                    <lottie-player src="https://lottie.host/48c004f8-57cd-4acb-a04a-de46793ba7dc/jUGVFL9qIO.json"
                        background="##FFFFFF" speed="1" style="width: 250px; height: 250px" loop autoplay direction="1"
                        mode="normal"></lottie-player>
                    <p style="color:#385161; opacity: 0.6; font-weight: 500; font-size: medium;">Apakah anda yakin ingin
                        keluar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" style="width: 100px;"
                        data-dismiss="modal">Batal</button>
                    <button type="button" style="width: 100px;" class="btn btn-danger"
                        onclick="location.href='<?=BASEURL;?>Logout'">Keluar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="content-beranda" style="overflow: hidden;">
            <h3 id="title">Jenis Barang</h3>
            <div class="flash" style="width: 40%; margin-left:15px;">
                <?php Flasher::flash();?>
            </div>
            <div class="btn-fitur" style="display: flex; justify-content:space-between;">
                <button data-toggle="modal" class="btn-tambah" data-target="#modalTambah"
                    style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
                    <i class="fa-solid fa-plus" style="color: #ffffff"></i> Tambah
                </button>
                <div class="search" style="width:350px">
                    <form action="<?=BASEURL;?>JenisBarang/cari" method="post">
                        <div class="input-group mb-3" style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary " type="submit" id="btn-cari"
                                    style="width: 60px;"><i class="fa-solid fa-magnifying-glass"
                                        style="color: #ffffff;"></i></button>
                            </div>
                            <input type="text" class="form-control" placeholder="Cari..." name="keyword" id="keyword"
                                style="height: 45px;" autocomplete="off">
                        </div>
                    </form>
                </div>
            </div>
            <div style="max-height: 400px; overflow-y:auto;box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5); border-radius:5px;">
            <table class="table table-hover table-sm">
                <thead class="table-info">
                    <tr>
                        <th scope="col" class="p-2">No.</th>
                        <th scope="col" class="p-2">Sub barang</th>
                        <th scope="col" class="p-2">Grup sub</th>
                        <th scope="col" class="p-2">Kode sub</th>
                        <th scope="col" class="p-2">Kode jenis barang</th>
                        <th scope="col" class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data['dataTampilJenisBarang'] as $row): ?>
                    <tr style="font-size: 14px;">
                        <td scope="row" class="px-2"><?= $i++; ?></td>
                        <td class="p-2" style="text-transform: capitalize;"><?= $row['sub_barang']; ?></td>
                        <td class="p-2"><?= $row['grup_sub']; ?></td>
                        <td class="p-2"><?= $row['kode_sub']; ?></td>
                        <td class="p-2"><?= $row['kode_jenis_barang']; ?></td>
                        <td class="p-2" style="display: flex;">
                            <!-- hapus -->
                            <a class="btn d-flex align-items-center justify-content-center" data-toggle="modal"
                                data-target="#konfirmasiHapus<?=$row['id_jenis_barang'];?>">
                                <i class="fa-solid fa-trash-can fa-lg" style="color: #cc3030;"></i>
                            </a>
                            <!-- ubah -->
                            <a href="<?= BASEURL; ?>/JenisBarang/ubah/<?=$row['id_jenis_barang'];?>"
                                class="btn d-flex align-items-center justify-content-center tampilJenisBarangUbah"
                                data-toggle="modal" data-target="#modalTambah" data-id="<?=$row['id_jenis_barang'];?>">
                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #30cc30;"></i>
                            </a>
                            <div class="modal fade" id="konfirmasiHapus<?=$row['id_jenis_barang'];?>" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content" style="border-radius: 15px;">
                                        <div class="modal-body"
                                            style="display: flex;justify-content: center; flex-direction: column; align-items: center;">
                                            <lottie-player
                                                src="https://lottie.host/482b772b-9f0c-4065-b54d-dcc81da3b212/Dmb3I1o98u.json"
                                                background="##FFFFFF" speed="1" style="width: 250px; height: 250px" loop
                                                autoplay direction="1" mode="normal"></lottie-player>
                                            <p
                                                style="color:#385161; opacity: 0.6; font-weight: 500; font-size: medium;">
                                                Apakah anda yakin ingin menghapus item ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" style="width: 100px;"
                                                data-dismiss="modal">Batal</button>
                                            <button type="button" style="width: 100px;" class="btn btn-danger"
                                                onclick="location.href='<?= BASEURL; ?>JenisBarang/hapus/<?=$row['id_jenis_barang'];?>'">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="height: 550px; border-radius:15px">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Jenis Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=BASEURL?>JenisBarang/tambahJenisBarang" method="post">
                                <input type="hidden" name="id_jenis_barang" id="id_jenis_barang">
                                <div class="sub_barang">
                                    <label for="sub_barang">Sub barang</label>
                                    <br>
                                    <input type="text" name="sub_barang" id="sub_barang" oninput="camelCase()"
                                        style="width: 250px;" required>
                                </div>
                                <br>
                                <div class="grup_sub">
                                    <label for="grup_sub">Grup sub</label>
                                    <br>
                                    <select name="grup_sub" required id="grup_sub" style="width: 250px;">
                                    <option>-- Pilih --</option>    
                                    <option value="C">C</option>
                                        <option value="S">S</option>
                                        <option value="J">J</option>
                                        <option value="F">F</option>
                                        <option value="M">M</option>
                                        <option value="T">T</option>
                                        <option value="K">K</option>
                                        <option value="U">U</option>
                                    </select>
                                </div>
                                <br>
                                <div class="kode_sub">
                                    <label for="kode_sub">Kode sub</label>
                                    <br>
                                    <input type="text" name="kode_sub" id="kode_sub" style="width: 250px;" required
                                        oninput="uppercaseInput(this)" maxlength="3">
                                </div>
                                <br>
                                <br>
                                <div class="modal-footer" style="margin-right: 30%;">
                                </div>
                                <br>
                                <div style="display: flex; width:100%; justify-content: end; align-items: end;">
                                    <button type="submit" id="kirim">Kirim</button>
                                </div>

                        </div>
                    </div>
                    </form>
                </div>
            </div>




        </div>