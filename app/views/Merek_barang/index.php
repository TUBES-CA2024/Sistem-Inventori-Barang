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
                    $data['id_user'] = $_SESSION['id_user'];
                    $profile_data = $this->model("User_model")->profile($data);

                    if (isset($profile_data['foto'])) {
                        $foto_profil = $profile_data['foto'];
                        echo '<img src="' . $foto_profil . '" alt="profile" style="border-radius: 50%; height: 100px; width: 100px; object-fit:cover;">';
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
                <li class="keluar" style="margin-top: 40px;">
                <div class="btn-group dropright">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" onmouseover="this.style.backgroundColor='#CAD6FF'" onmouseout="this.style.backgroundColor='transparent'"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-gear" style="color: #ffffff;"></i>Pengaturan </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" onclick="location.href='<?=BASEURL?>Profil'" type="button" style="margin-top: 10px; color:black;">
                                <i class="fa-regular fa-user"></i>Profil</button>
                            <button class="dropdown-item" 
                                style="color: black; margin-top: 0;" data-toggle="modal"
                                    data-target="#konfirmasiKeluar">
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
    <div class="modal fade" id="konfirmasiKeluar" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 15px;">
                        <div class="modal-body"
                            style="display: flex;justify-content: center; flex-direction: column; align-items: center;">
                         
                            <lottie-player src="https://lottie.host/48c004f8-57cd-4acb-a04a-de46793ba7dc/jUGVFL9qIO.json" background="##FFFFFF" speed="1" style="width: 250px; height: 250px" loop autoplay direction="1" mode="normal"></lottie-player>
                            <p style="color:#385161; opacity: 0.6; font-weight: 500; font-size: medium;">Apakah anda yakin ingin keluar?</p>
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
            <table class="table table-hover table-sm" style="box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5); border-radius: 5px;">
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
                        <td class="p-2" style="text-transform: capitalize;"><?= $row['nama_merek_barang']; ?></td>
                        <td class="p-2"><?= $row['kode_merek_barang']; ?></td>
                        <td class="p-2" style="display: flex;">
                            <!-- hapus -->
                            <a 
                                class="btn d-flex align-items-center justify-content-center"
                                data-toggle="modal" data-target="#konfirmasiHapus">
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
                    <div class="modal-content" style="border-radius:15px">
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
                                        <input type="text" name="nama_merek_barang" id="nama_merek_barang" style="width: 250px; text-transform: capitalize;" required>
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

    <div class="modal fade" id="konfirmasiHapus" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 15px;">
                        <div class="modal-body"
                            style="display: flex;justify-content: center; flex-direction: column; align-items: center;">
                         
                            <lottie-player
                                src="https://lottie.host/482b772b-9f0c-4065-b54d-dcc81da3b212/Dmb3I1o98u.json"
                                background="##FFFFFF" speed="1" style="width: 250px; height: 250px" loop autoplay
                                direction="1" mode="normal"></lottie-player>
                            <p style="color:#385161; opacity: 0.6; font-weight: 500; font-size: medium;">Apakah anda yakin ingin menghapus item ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" style="width: 100px;"
                                data-dismiss="modal">Batal</button>
                            <button type="button" style="width: 100px;" class="btn btn-danger"
                                onclick="location.href='<?= BASEURL; ?>MerekBarang/hapus/<?=$row['id_merek_barang'];?>'">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>


</div>