<?php
        if (!isset($_SESSION['login']) || ($_SESSION['id_role'] == '1')) {
          header("Location:" . BASEURL . "Login");
          exit;
        }    
?>
<div class="body-beranda">
    <div class="side-bar">
        <div class="profil">
            <div class="logo">
                <img src="<?=BASEURL;?>img/logo bg hitam.svg" alt="logo" />
            </div>
            <div class="data-profil">
            <?php
                    $data['id_user'] = $_SESSION['id_user'];
                    $profile_data = $this->model("User_model")->profile($data);

                    if (isset($profile_data['foto'])) {
                        $foto_profil = $profile_data['foto'];
                        echo '<img src="' . BASEURL . $foto_profil . '" alt="profile" style="border-radius: 50%; height: 100px; width: 100px; object-fit:cover;">';
                    } else {
                        echo '<img src="' . BASEURL . 'img/PersonCircle.png" alt="profile" style="width: 100px; height: 100px; border-radius:50%;">';
                        }
                        
               echo '<div class="detail-data-profil">';
               if (isset($profile_data['nama_user']) && isset($profile_data['role'])) {
                $nama = $profile_data['nama_user'];
                $role = $profile_data['role'];
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
                <li class="keluar">
                <button onclick="location.href='<?=BASEURL;?>Logout'">
                        <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff"></i>
                        Keluar
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="content-beranda" style="overflow-y: auto;">
            <h3 id="title">Merek Barang</h3>
            <div class="flash" style="width: 40%; margin-left:15px;">
                <?php Flasher::flash();?>
            </div>
            <div class="btn-fitur" style="display: flex; justify-content:space-between;">
                <button data-toggle="modal" class="btn-tambah-merek" data-target="#modalTambah" style="box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
                    <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Tambah
                </button>
                <div class="search" style="width:350px">
                    <form action="<?=BASEURL;?>MerekBarang/cari" method="post">
                    <div class="input-group mb-3" style="box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary" type="submit" id="btn-cari" style="width: 60px;"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
  </div>
  <input  type="text" class="form-control" placeholder="Cari..." name="keyword" id="keyword" style="height: 45px;" autocomplete="off">
</div>
                    </form>
                </div>
            </div>
            <table class="table table-hover table-sm" style="box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
                <thead class="table-info">
                    <tr>
                        <th scope="col" class="p-2">No.</th>
                        <th scope="col" class="p-2">Merek barang</th>
                        <th scope="col" class="p-2">Kode merek</th>
                        <th scope="col" class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data['dataTampilMerekBarang'] as $row): ?>
                    <tr>
                        <th scope="row" class="p-2"><?= $i++; ?></th>
                        <td class="p-2"><?= $row['nama_merek_barang']; ?></td>
                        <td class="p-2"><?= $row['kode_merek_barang']; ?></td>
                        <td class="p-2" style="display: flex;">
                            <!-- hapus -->
                            <a href="<?= BASEURL; ?>MerekBarang/hapus/<?=$row['id_merek_barang'];?>"
                                class="btn d-flex align-items-center justify-content-center"
                                onclick="return confirm('yakin');">
                                <i class="fa-solid fa-trash-can fa-lg" style="color: #cc3030;"></i>
                            </a>
                            <!-- ubah -->
                            <a href="<?= BASEURL; ?>/MerekBarang/ubah/<?=$row['id_merek_barang'];?>"
                                class="btn d-flex align-items-center justify-content-center tampilMerekBarangUbah" data-toggle="modal"
                                data-target="#modalTambah"
                                data-id="<?=$row['id_merek_barang'];?>">
                                <i class="fa-solid fa-pen-to-square fa-lg" style="color: #30cc30;"></i>
                            </a>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="height: 550px; border-radius:15px">
                        <div class="modal-header">
                            <h5 class="modal-title title-merek">Tambah Merek Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body body-merek">
                                <form action="<?=BASEURL?>MerekBarang/tambahMerekBarang" method="post">
                                <input type="hidden" name="id_merek_barang" id="id_merek_barang">
                                    <div class="nama_merek_barang">
                                        <label for="nama_merek_barang">Merek barang</label>
                                        <br>
                                        <input type="text" name="nama_merek_barang" id="nama_merek_barang" style="width: 250px;" required>
                                    </div>
                                    <br>
                                    <div class="kode_merek_barang">
                                        <label for="kode_merek_barang">Kode merek</label>
                                        <br>
                                        <input type="text" name="kode_merek_barang" id="kode_merek_barang" minlength="3" maxlength="3" required  oninput="validasiInput(this)" placeholder="cth: 00x">
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