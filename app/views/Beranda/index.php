<?php
        if (!isset($_SESSION['login'])) {
          header("Location:" . BASEURL . "Login");
          exit;
        }    
?>
<div class="body-beranda" >
    <div class="side-bar">
        <div class="profil">
            <div class="logo">
                <img src="<?=BASEURL;?>img/logo bg hitam.svg" alt="logo" />
            </div>
            <div class="data-profil">
                <?php
                    
                        $foto_profil = $data['profile']['foto'];
                        if($foto_profil == "../public/img/foto-profile/"){
                            echo '<img src="'. BASEURL . $foto_profil . '/user.svg'. '" alt="profile" style="border-radius: 50%; height: 100px; width: 100px; object-fit:cover;">';
                        }else{
                        echo '<img src="'. BASEURL . $foto_profil . '" alt="profile" style="border-radius: 50%; height: 100px; width: 100px; object-fit:cover;">';
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
            <h1 id="title">Beranda</h1>
            <div class="flash" style="width: 40%; margin-left:15px;">
                <?php Flasher::flash();?>
            </div>

            <div class="btn-fitur" style="display: flex; justify-content:space-between;">
                <div style="display: flex; gap:10px;">
                    <button onclick="location.href='<?=BASEURL?>Beranda/cetak'; checkbox();"
                        style="box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);"><i class="fa-solid fa-file-export" style="color: #ffffff;"></i>Ekspor</button>
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
                        <input type="checkbox" class="checkbox" id="selectAllCheckbox" name="selectAllCheckbox" style="width: 15px;">
                        <label class="checkbox" for="selectAllCheckbox" style="margin-top: 7px;">Pilih semua</label>
                    </div>
                </div>
            </div>
            <div style="max-height: 360px; overflow-y:auto;box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5); border-radius:5px;">
            <table  id="myTable"class="table table-hover table-sm"
                style=" width:100%;">
                <thead class="table-info">
                    <tr>
                        <th scope="col" class="p-2">No.</th>
                        <th scope="col" class="p-2">Foto</th>
                        <th scope="col" class="p-2">Kode barang</th>
                        <th scope="col" class="p-2">Sub barang</th>
                        <th scope="col" class="p-2">Merek barang</th>
                        <th scope="col" class="p-2">Kondisi barang</th>
                        <th scope="col" class="p-2">Status</th>
                        <th scope="col" class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="<?=BASEURL?>Beranda/cetak" method="post" id="formCheckbox">
                        <?php $i = 1; ?>
                        <?php foreach ($data['dataTampilBarang'] as $row): ?>
                        <tr style="font-size: 14px;">
                            <td scope="row" class="p-3"><?= $i++; ?></td>
                            <td class="p-3"><img src="<?=BASEURL.$row['foto_barang'];?>" alt=""
                                    style="width:60px; height:60px;"></td>
                            <td class="p-3"><?= $row['kode_barang'];?></td>
                            <td class="p-3" style="text-transform: capitalize;"><?= $row['sub_barang']; ?></td>
                            <td class="p-3" style="text-transform: capitalize;"><?= $row['nama_merek_barang']; ?></td>
                            <td class="p-3"><?= $row['kondisi_barang']; ?></td>
                            <td class="p-3"><?= $row['status']; ?></td>
                            <td class="p-3" style="display: flex;">
                                <?php if (isset($_SESSION['login']) && ($_SESSION['id_role'] == '3' || $_SESSION['id_role'] == '2')): ?>
                                <!-- Hapus -->
                                <a class="btn d-flex align-items-center justify-content-center" data-toggle="modal"
                                    id="iconHapusBarang" data-target="#konfirmasiHapus<?=$row['id_barang']?>"
                                    data-id="<?=$row['id_barang'];?>">
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
                                <a href="<?= BASEURL; ?>Beranda/detail/<?=$row['id_barang'];?>" data-toggle="modal"
                                    data-target="#modalDetail<?= $row['id_barang']; ?>"
                                    class="btn d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-circle-info fa-lg " style="color: #1250ba;"></i>
                                </a>
                                <input class="checkbox" onclick="tampilCetak()" type="checkbox" id="checkbox"
                                    name="checkbox[]" value="<?=$row['id_barang']?>" style="width:15px">
                                <div class="modal fade" id="konfirmasiHapus<?=$row['id_barang']?>" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content" style="border-radius: 15px;">
                                            <div class="modal-body"
                                                style="display: flex;justify-content: center; flex-direction: column; align-items: center;">

                                                <lottie-player
                                                    src="https://lottie.host/482b772b-9f0c-4065-b54d-dcc81da3b212/Dmb3I1o98u.json"
                                                    background="##FFFFFF" speed="1" style="width: 250px; height: 250px"
                                                    loop autoplay direction="1" mode="normal"></lottie-player>
                                                <p
                                                    style="color:#385161; opacity: 0.6; font-weight: 500; font-size: medium;">
                                                    Apakah anda
                                                    yakin ingin menghapus item ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" style="width: 100px;"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="button" style="width: 100px;" class="btn btn-danger"
                                                    id="konfirmasiHapusBarang"
                                                    onclick="location.href='<?= BASEURL ?>Beranda/hapus/<?= $row['id_barang'] ?>'">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="modalDetail<?= $row['id_barang']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="width: 700px;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"
                                                    style="font-weight: 600;">Detail barang
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body"
                                                style="display: flex; gap:50px; font-weight: 500; width:100%;">
                                                <style>
                                                    span p {
                                                        word-wrap: break-word;
                                                        opacity: 0.5;
                                                    }
                                                </style>
                                                <div style="width: 50%;">
                                                    <span>
                                                        <h6>Foto</h6>
                                                        <img src="<?=BASEURL.$row['foto_barang'];?>" alt=""
                                                            style="width:150px; height:150px;">
                                                    </span>
                                                    <span>
                                                        <h6>Kode barang</h6>
                                                        <p><?= $row['kode_barang']; ?></p>
                                                    </span>
                                                    <span>
                                                        <h6>Jenis barang</h6>
                                                        <p style="text-transform: capitalize;"><?=$row['sub_barang'];?>
                                                        </p>
                                                    </span>
                                                    <span>
                                                        <h6>Merek barang</h6>
                                                        <p style="text-transform: capitalize;">
                                                            <?=$row['nama_merek_barang'];?></p>
                                                    </span>
                                                    <span>
                                                        <h6>Deskripsi Barang</h6>
                                                        <p style="text-transform: capitalize;">
                                                            <?=$row['deskripsi_barang'];?></p>
                                                    </span>
                                                    <span>
                                                        <h6>Jumlah barang</h6>
                                                        <p><?=$row['jumlah_barang'];?></p>
                                                    </span>
                                                    <span>
                                                        <h6>Satuan jumlah</h6>
                                                        <p><?=$row['nama_satuan'];?></p>
                                                    </span>
                                                    <span>
                                                        <h6>Status pinjam</h6>
                                                        <p><?=$row['status_peminjaman'];?></p>
                                                    </span>
                                                </div>
                                                <div style="width: 50%;">
                                                    <span>
                                                        <h6>Qr code</h6>
                                                        <div style="display: flex; flex-direction: column;">
                                                        <img src="<?=BASEURL . $row['qr_code']?>" alt=""
                                                            style="width:200px; height:200px;">
                                                        <a href="<?=BASEURL . $row['qr_code']?>" style="margin-left: 15px;" download>Download</a>
                                                        </div>
                                                    </span>
                                                    <br><br>
                                                    <span>
                                                        <h6>Tanggal pengadaan</h6>
                                                        <p><?=$row['tgl_pengadaan_barang'];?></p>
                                                    </span>
                                                    <span>
                                                        <h6>Lokasi penyimpanan</h6>
                                                        <p><?=$row['nama_lokasi_penyimpanan'];?></p>
                                                    </span>
                                                    <span style="width: 100%;">
                                                        <h6>Detail lokasi penyimpanan</h6>
                                                        <p style="text-transform: capitalize;">
                                                            <?=$row['deskripsi_detail_lokasi'];?>
                                                        </p>
                                                    </span>
                                                    <span>
                                                        <h6>Kondisi barang</h6>
                                                        <p><?=$row['kondisi_barang'];?></p>
                                                    </span>
                                                    
                                                    <span>
                                                        <h6>Keterangan label</h6>
                                                        <p><?=$row['keterangan_label'];?></p>
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </form>
                </tbody>
            </table>
            </div>
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
                            <form action="<?=BASEURL?>Beranda/tambahBarang" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_barang" id="id_barang" value="<?=$row['id_barang']?>">
                                <div style="display: flex; width:100%; gap:20%;">
                                    <div style="margin-top: 8px;">
                                        <div class="foto_barang">
                                            <input type="file" name="foto_barang" id="foto_barang" accept="image/*"
                                                onchange="limitSize()" placeholder="Pilih foto" />
                                            <label for="foto_barang">Upload Foto (Maks 2 MB) </label>
                                        </div>
                                        <br>
                                        <div class="sub_barang">
                                            <label for="sub_barang">Sub barang</label>
                                            <br>
                                            <select name="sub_barang" id="sub_barang" style="width: 250px;" required>
                                            <option>-- Pilih --</option>
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
                                                style="width: 250px;" required>
                                                <option>-- Pilih --</option>
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
                                            <input type="text" name="deskripsi_barang"  id="deskripsi_barang" oninput="camelCase()()"
                                                style="width: 250px;">
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
                                            <option>-- Pilih --</option>    
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
                                                <option>-- Pilih --</option>
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
                                                style="width: 250px;" oninput="camelCase()">
                                        </div>
                                        <br>
                                        <div class="status" style="margin-top: 10px;">
                                            <label for="status">Status</label>
                                            <br>
                                            <select name="status" id="status" required style="width: 250px;">
                                            <option>-- Pilih --</option>   
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
                                                <option>-- Pilih --</option>
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
                                                <option>-- Pilih --</option>
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
                                                <option>-- Pilih --</option>
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
        </div>