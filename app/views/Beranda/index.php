<?php
        if (!isset($_SESSION['login'])) {
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
                <?php
                    if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2')) {
                        echo '<li class="tambah-jenis-barang">
                            <button onclick="location.href=\''.BASEURL.'JenisBarang\'">
                                <i class="fa-solid fa-box" style="color: #ffffff"></i>
                                Jenis barang
                            </button>
                        </li>';
                    }
                ?>
                <?php
                    if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2')) {
                echo '<li class="tambah-merek-barang">
                    <button onclick="location.href=\''.BASEURL.'merekBarang\'">
                        <i class="fa-solid fa-barcode" style="color: #ffffff;"></i>
                        Merek barang
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
                            <button class="dropdown-item"  data-toggle="modal"
                                    data-target="#konfirmasiKeluar"
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
            <h1 id="title">Beranda</h1>
            <div class="flash" style="width: 40%; margin-left:15px;">
                <?php Flasher::flash();?>
            </div>

            <div class="btn-fitur" style="display: flex; justify-content:space-between;">
                <div style="display: flex; gap:10px;">
                    <button onclick="location.href='<?=BASEURL?>Beranda/cetak'; checkbox();"
                        style="box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);"><i class="fa-solid fa-print"
                            style="color: #ffffff;margin-right:10px;"></i>Cetak</button>
                    <?php
                if (isset($_SESSION['login']) && $_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2') {
                    echo  '<button data-toggle="modal" class="btn-tambah-barang" data-target="#modalTambah" style="box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
                    <i class="fa-solid fa-plus" style="color: #ffffff; "></i> Tambah
                </button>';
            }
            ?>
                </div>
                <div class="search" style="width:350px; background-color:transparent;">
                    <form action="<?=BASEURL;?>Beranda/cari" method="post">
                        <div class="input-group mb-3" style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="submit" id="btn-cari"
                                    style="width: 60px;"><i class="fa-solid fa-magnifying-glass"
                                        style="color: #ffffff;"></i></button>
                            </div>
                            <input type="text" class="form-control" placeholder="Cari..." name="keyword" id="keyword"
                                style="height: 45px;" autocomplete="off">
                        </div>
                    </form>
                    <div style="display: flex; align-items: center; gap:10px; justify-content: end;">
                        <input type="checkbox" id="selectAllCheckbox" name="selectAllCheckbox" style="width: 15px;">
                        <label for="selectAllCheckbox" style="margin-top: 7px;">Pilih semua</label>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-sm"
                style=" box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5); border-radius:5px;">
                <thead class="table-info">
                    <tr>
                        <th scope="col" class="p-3">No.</th>
                        <th scope="col" class="p-3">Kode barang</th>
                        <th scope="col" class="p-3">Sub barang</th>
                        <th scope="col" class="p-3">Merek barang</th>
                        <th scope="col" class="p-3">Kondisi barang</th>
                        <th scope="col" class="p-3">Status peminjaman</th>
                        <th scope="col" class="p-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="<?=BASEURL?>Beranda/cetak" method="post" id="formCheckbox">
                        <?php $i = 1; ?>
                        <?php foreach ($data['dataTampilBarang'] as $row): ?>
                        <tr>
                            <th scope="row" class="p-3"><?= $i++; ?></th>
                            <td class="p-3"><?= $row['kode_barang']; ?></td>
                            <td class="p-3" style="text-transform: capitalize;"><?= $row['sub_barang']; ?></td>
                            <td class="p-3" style="text-transform: capitalize;"><?= $row['nama_merek_barang']; ?></td>
                            <td class="p-3"><?= $row['kondisi_barang']; ?></td>
                            <td class="p-3"><?= $row['status_peminjaman']; ?></td>
                            <td class="p-3" style="display: flex;">
                                <?php if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2')): ?>
                                <!-- Hapus -->
                                <a class="btn d-flex align-items-center justify-content-center" data-toggle="modal"
                                    data-target="#konfirmasiHapus">
                                    <i class="fa-solid fa-trash-can fa-lg" style="color: #cc3030;"></i>
                                </a>

                                <!-- Ubah -->
                                <a href="<?= BASEURL ?>Beranda/getUbah/<?= $row['id_barang'] ?>"
                                    class="btn d-flex align-items-center justify-content-center tampilBarangUbah"
                                    data-toggle="modal" data-target="#modalTambah" data-id="<?= $row['id_barang']; ?>">
                                    <i class="fa-solid fa-pen-to-square fa-lg" style="color: #30cc30;"></i>
                                </a>
                                <?php endif; ?>

                                <!-- detail -->
                                <a href="<?= BASEURL; ?>Beranda/detail/<?=$row['id_barang'];?>" data-toggle="modal" data-target="#modalUpdate"
                                    class="btn d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-circle-info fa-lg " style="color: #1250ba;"></i>
                                </a>
                                <input class="checkbox" onclick="tampilCetak()" type="checkbox" id="checkbox"
                                    name="checkbox[]" value="<?=$row['id_barang']?>" style="width:15px">
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </form>
                </tbody>
            </table>
            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="height: 100%;width:900px; border-radius:15px">
                        <div class="modal-header">
                            <h5 class="modal-title" id="title-barang">Tambah Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body body-barang">
                            <form action="<?=BASEURL?>Beranda/tambahBarang" method="post">
                                <input type="hidden" name="id_barang" id="id_barang" value="<?=$row['id_barang']?>">
                                <div style="display: flex; width:100%; gap:20%;">
                                    <div style="margin-top: 8px;">
                                        <div class="sub_barang">
                                            <label for="sub_barang">Sub barang</label>
                                            <br>
                                            <select name="sub_barang" id="sub_barang" style="width: 250px;">
                                                <?php foreach ($data['sub_barang'] as $option) { ?>
                                                <option value="<?php echo $option['id_jenis_barang']?>">
                                                    <?php echo $option['sub_barang'] ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="nama_merek_barang">
                                            <label for="nama_merek_barang">Merek barang</label>
                                            <br>
                                            <select name="nama_merek_barang" id="nama_merek_barang"
                                                style="width: 250px;">
                                                <?php foreach ($data['nama_merek_barang'] as $option) { ?>
                                                <option value="<?php echo $option['id_merek_barang']?>">
                                                    <?php echo $option['nama_merek_barang']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="deskripsi_barang">
                                            <label for="deskripsi_barang">Deskripsi barang</label>
                                            <br>
                                            <input type="text" name="deskripsi_barang" id="deskripsi_barang"
                                                style="width: 250px; text-transform: capitalize;">
                                        </div>
                                        <br>
                                        <div class="jumlah_barang">
                                            <label for="jumlah_barang">Jumlah barang</label>
                                            <br>
                                            <input type="number" name="jumlah_barang" id="jumlah_barang"
                                                style="width: 250px;" min="0" required>
                                        </div>
                                        <br>
                                        <div class="satuan">
                                            <label for="satuan">Satuan</label>
                                            <br>
                                            <select name="satuan" id="satuan" required style="width: 250px;">
                                                <?php foreach ($data['satuan'] as $option) { ?>
                                                <option value="<?php echo $option['id_satuan']; ?>">
                                                    <?php echo $option['nama_satuan']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="barang_ke">
                                            <label for="barang_ke">Barang ke-</label>
                                            <br>
                                            <input type="number" name="barang_ke" id="barang_ke" style="width: 250px;"
                                                min="0" required>
                                        </div>
                                        <br>
                                        <div class="total_barang">
                                            <label for="total_barang">Total barang</label>
                                            <br>
                                            <input type="number" name="total_barang" id="total_barang"
                                                style="width: 250px;" min="0" required>
                                        </div>
                                    </div>
                                    <div style="margin-top: 8px;">
                                        <div class="tgl_pengadaan_barang">
                                            <label for="tgl_pengadaan_barang">Tgl pengadaan</label>
                                            <br>
                                            <input type="date" name="tgl_pengadaan_barang" id="tgl_pengadaan_barang"
                                                style="width: 250px;" required>
                                        </div>
                                        <br>
                                        <div class="lokasi_penyimpanan">
                                            <label for="lokasi_penyimpanan">Lokasi penyimpanan</label>
                                            <br>
                                            <select name="lokasi_penyimpanan" id="lokasi_penyimpanan" required
                                                style="width: 250px;">
                                                <?php foreach ($data['lokasiPenyimpanan'] as $option) { ?>
                                                <option value="<?php echo $option['id_lokasi_penyimpanan']; ?>">
                                                    <?php echo $option['nama_lokasi_penyimpanan']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="deskripsi_detail_lokasi">
                                            <label for="deskripsi_detail_lokasi">Detail penyimpanan</label>
                                            <br>
                                            <input type="text" name="deskripsi_detail_lokasi"
                                                id="deskripsi_detail_lokasi"
                                                style="width: 250px; text-transform: capitalize;">
                                        </div>
                                        <br>
                                        <div class="status" style="margin-top: 10px;">
                                            <label for="status">Status</label>
                                            <br>
                                            <select name="status" id="status" required style="width: 250px;">
                                                <?php foreach ($data['status'] as $option) { ?>
                                                <option value="<?php echo $option['id_status']; ?>">
                                                    <?php echo $option['status']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="kondisi_barang">
                                            <label for="kondisi_barang">Kondisi barang</label>
                                            <br>
                                            <select name="kondisi_barang" id="kondisi_barang" required
                                                style="width: 250px;">
                                                <?php foreach ($data['kondisiBarang'] as $option) { ?>
                                                <option value="<?php echo $option['id_kondisi_barang']; ?>">
                                                    <?php echo $option['kondisi_barang']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="status_pinjam">
                                            <label for="status_pinjam">Status pinjam</label>
                                            <br>
                                            <select name="status_pinjam" id="status_pinjam"
                                                style="width: 250px; margin-top: 5px;">
                                                <option value="bisa">Bisa</option>
                                                <option value="tidak bisa">Tidak bisa</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div class="keterangan_label" style="margin-top:5px">
                                            <label for="keterangan_label">Keterangan label</label>
                                            <br>
                                            <select name="keterangan_label" id="keterangan_label" required
                                                style="width: 250px; margin-top: 5px;">
                                                <option value="sudah">Sudah</option>
                                                <option value="belum">Belum</option>
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer" style="margin-left: 30%;">
                                    <div
                                        style="display: flex; width:100%; align-items: end; justify-content:end; margin-top:50px;">
                                        <button type="submit" id="kirim">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" >
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: 600;">Detail barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php $dataDetail = $data['dataTampilBarang'][0]; ?>
      <div class="modal-body" style="display: flex; gap:50px; font-weight: 500;">
      <style>
       span p{

            opacity: 0.5;
        }
      </style>
      <div>
                        <span>
                            <h6>Kode barang</h6>
                            <p><?= $dataDetail['kode_barang']; ?></p>
                        </span>
                        <span>
                          <h6>Jenis barang</h6>
                          <p style="text-transform: capitalize;"><?=$dataDetail['sub_barang'];?></p>
                        </span>
                        <span>
                          <h6>Merek barang</h6>
                          <p style="text-transform: capitalize;"><?=$dataDetail['nama_merek_barang'];?></p>
                        </span>
                        <span>
                          <h6>Deskripsi Barang</h6>
                          <p style="text-transform: capitalize;"><?=$dataDetail['deskripsi_barang'];?></p>
                        </span>
                        <span>
                          <h6>Jumlah barang</h6>
                          <p><?=$dataDetail['jumlah_barang'];?></p>
                        </span>
                        <span>
                          <h6>Satuan jumlah</h6>
                          <p><?=$dataDetail['nama_satuan'];?></p>
                        </span>
        </div>
        <div>
                    <span>
                          <h6>Tanggal pengadaan</h6>
                          <p><?=$dataDetail['tgl_pengadaan_barang'];?></p>
                        </span>
                        <span>
                          <h6>Lokasi penyimpanan</h6>
                          <p><?=$dataDetail['nama_lokasi_penyimpanan'];?></p>
                        </span>
                        <span>
                          <h6>Detail lokasi penyimpanan</h6>
                          <p style="text-transform: capitalize;"><?=$dataDetail['deskripsi_detail_lokasi'];?></p>
                        </span>
                        <span>
                          <h6>Kondisi barang</h6>
                          <p><?=$dataDetail['kondisi_barang'];?></p>
                        </span>
                        <span>
                          <h6>Status pinjam</h6>
                          <p><?=$dataDetail['status_peminjaman'];?></p>
                        </span>
                        <span>
                          <h6>Keterangan label</h6>
                          <p><?=$dataDetail['keterangan_label'];?></p>
                        </span>
        </div>
      </div>
    </div>
  </div>
</div>



            <div class="modal fade" id="konfirmasiHapus" tabindex="-1" role="dialog" 
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" >
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
                                onclick="location.href='<?= BASEURL ?>Beranda/hapus/<?= $row['id_barang'] ?>'">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>