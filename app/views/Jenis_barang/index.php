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
            <h3 id="title">Jenis Barang</h3>
            <div class="flash" style="width: 40%; margin-left:15px;">
                <?php Flasher::flash();?>
            </div>
            <div class="btn-fitur" style="display: flex; justify-content:space-between;">
                <button data-toggle="modal" class="btn-tambah" data-target="#modalTambah" style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
                    <i class="fa-solid fa-plus" style="color: #ffffff"></i> Tambah
                </button>
                <div class="search" style="width:350px">
                    <form action="<?=BASEURL;?>JenisBarang/cari" method="post">
                    <div class="input-group mb-3" style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary " type="submit" id="btn-cari" style="width: 60px;"><i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i></button>
  </div>
  <input  type="text" class="form-control" placeholder="Cari..." name="keyword" id="keyword" style="height: 45px;" autocomplete="off">
</div>
                    </form>
                </div>
            </div>
            <table class="table table-hover table-sm" style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
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
                    <tr>
                        <th scope="row" class="px-2"><?= $i++; ?></th>
                        <td class="p-2"><?= $row['sub_barang']; ?></td>
                        <td class="p-2"><?= $row['grup_sub']; ?></td>
                        <td class="p-2"><?= $row['kode_sub']; ?></td>
                        <td class="p-2"><?= $row['kode_jenis_barang']; ?></td>
                        <td class="p-2" style="display: flex;">
                            <!-- hapus -->
                            <a href="<?= BASEURL; ?>JenisBarang/hapus/<?=$row['id_jenis_barang'];?>"
                                class="btn d-flex align-items-center justify-content-center"
                                onclick="return confirm('yakin');">
                                <i class="fa-solid fa-trash-can fa-lg" style="color: #cc3030;"></i>
                            </a>
                            <!-- ubah -->
                            <a href="<?= BASEURL; ?>/JenisBarang/ubah/<?=$row['id_jenis_barang'];?>"
                                class="btn d-flex align-items-center justify-content-center tampilJenisBarangUbah" data-toggle="modal"
                                data-target="#modalTambah"
                                data-id="<?=$row['id_jenis_barang'];?>">
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
                                        <input type="text" name="sub_barang" id="sub_barang" style="width: 250px;" required>
                                    </div>
                                    <br>
                                    <div class="grup_sub">
                                        <label for="grup_sub">Grup sub</label>
                                        <br>
                                        <select name="grup_sub" id="grup_sub" style="width: 250px;">
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
                                        <input type="text" name="kode_sub" id="kode_sub" style="width: 250px;" required oninput="uppercaseInput(this)" maxlength="3">
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