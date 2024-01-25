<div class="body-beranda">
      <div class="side-bar">
        <div class="profil">
          <div class="logo">
            <img src="<?=BASEURL;?>img/logo bg hitam.svg" alt="logo" />
          </div>
          <div class="data-profil">
            <img src="<?=BASEURL;?>img/PersonCircle.png" alt="profile" style="width: 80px; height:80px" />
            <div class="detail-data-profil">
              <p id="nama">Profile</p>
              <p id="role">User</p>
            </div>
          </div>
        </div>
        <hr />
        <div class="menu">
          <ul>
            <li class="beranda">
              <button href="">
                <i class="fa-solid fa-house" style="color: #0c1740"></i>
                Beranda
              </button>
            </li>
            <li class="peminjaman">
              <button href="#">
                <i class="fa-solid fa-box" style="color: #ffffff"></i>
                Peminjaman
              </button>
            </li>
            <li class="riwayat-peminjaman">
              <button href="#">
                <i
                  class="fa-solid fa-clock-rotate-left"
                  style="color: #ffffff"
                ></i>
                Riwayat peminjaman
              </button>
            </li>
            <li class="validasi-peminjaman">
              <button href="#">
                <i
                  class="fa-solid fa-file-circle-check"
                  style="color: #ffffff"
                ></i>
                Validasi peminjaman
              </button>
            </li>
            <li class="kelola-akun">
              <button href="#">
                <i class="fa-solid fa-users-gear" style="color: #ffffff"></i>
                Kelola akun
              </button>
            </li>
            <li class="keluar">
              <button href="#">
                <i
                  class="fa-solid fa-arrow-right-from-bracket"
                  style="color: #ffffff"
                ></i>
                Keluar
              </button>
            </li>
          </ul>
        </div>
      </div>
      <div class="content">
        <div class="content-beranda" style="overflow: auto;">
          <h3 id="title" >Beranda</h3>
          <div class="btn-fitur">
            <button data-toggle="modal" data-target="#modalTambah">
              <i class="fa-solid fa-plus" style="color: #ffffff"></i> Tambah
            </button>
            <div class="search"></div>
          </div>
          <table class="table table-hover table-sm" >
            <thead>
              <tr>
                <th scope="col" class="px-2">No.</th>
                <th scope="col" class="px-2">Kode barang</th>
                <th scope="col" class="px-2">Jenis barang</th>
                <th scope="col" class="px-2">Merek</th>
                <th scope="col" class="px-2">Deskripsi barang</th>
                <th scope="col" class="px-2">Jumlah</th>
                <th scope="col" class="px-2">Satuan</th>
                <th scope="col" class="px-2">Status pinjam</th>
                <th scope="col" class="px-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data['dataTampilBarang'] as $row): ?>
            <tr>
                <th scope="row" class="px-2"><?= $i++; ?></th>
                <td class="px-2"><?= $row['kode_barang']; ?></td>
                <td class="px-2"><?= $row['sub_barang']; ?></td>
                <td class="px-2"><?= $row['nama_merek_barang']; ?></td>
                <td class="px-2"><?= $row['deskripsi_barang']; ?></td>
                <td class="px-2"><?= $row['jumlah_barang']; ?></td>
                <td class="px-2"><?= $row['nama_satuan']; ?></td>
                <td class="px-2"><?= $row['status_peminjaman']; ?></td>
                <td class="px-2" style="display: flex; gap: 10px;">
                  <button style="background-color: transparent; border:none;"><i class="fa-solid fa-circle-info" style="color: #2f4eca;"></i></button>
                  <button style="background-color: transparent; border:none;"><i class="fa-solid fa-pen-to-square" style="color: #30cc30;"></i></button>
                  <button style="background-color: transparent; border:none;"><i class="fa-solid fa-trash-can" style="color: #cc3030;"></i></button>
                </td>

            </tr>
        <?php endforeach; ?>
              <!-- <tr>
                <td scope="row">1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
              </tr> -->
            </tbody>
          </table>
          <form action="<?=BASEURL?>Beranda/tambahBarang" method="post">
          <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
              <div class="modal-content" style="width: 900px; height:650px">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalTambahLabel">Tambah barang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="input-kiri">
                    <div class="sub_barang">
                      <label for="sub_barang">
                        Jenis barang
                      </label>
                      <input type="text" name="sub_barang" id="sub_barang">
                    </div>
                    <div class="kode_sub">
                          <label for="kode_sub">Kode sub</label>
                          <br>
                          <input type="text" name="kode_sub" id="kode_sub" maxlength="3" required oninput="uppercaseInput()">
                    </div>

                    <div class="jumlah">
                      <label for="jumlah">jumlah</label>
                      <br>
                      <input type="number" name="jumlah" id="jumlah" required min="0">
                    </div>
                    <div class="barang_ke">
                      <label for="barang_ke">Barang ke-</label>
                      <br>
                      <input type="number" name="barang_ke" id="barang_ke" required min="0">
                    </div>
                    <div class="kondisi_barang">
                      <label for="kondisi_barang">Kondisi barang</label>
                      <br>
                      <select name="kondisi_barang" id="kondisi_barang" required>
                      <?php foreach ($data['kondisiBarang'] as $option) { ?>
                        <option value="<?php echo $option['id_kondisi_barang']; ?>"><?php echo $option['kondisi_barang']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="tgl_pengadaan_barang">
                      <label for="tgl_pengadaan_barang">Tgl pengadaan</label>
                      <br>
                      <input type="date" name="tgl_pengadaan_barang" id="tgl_pengadaan_barang" required>
                    </div>
                  </div>
                  <div class="input-tengah" style="display: flex; flex-direction: column; gap: 20px;">
                    <div class="merek">
                      <label for="nama_merek_barang">Merek</label>
                      <br>
                      <input type="text" name="nama_merek_barang" id="nama_merek_barang">
                    </div>
                    <div class="grup_sub">
                        <label for="grup_sub">Grup sub</label>
                        <br>
                        <select name="grup_sub" id="grup_sub">
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
                    <div class="satuan">
                      <label for="satuan">Satuan</label>
                      <br>
                      <select name="satuan" id="satuan" required>
                      <?php foreach ($data['satuan'] as $option) { ?>
                        <option value="<?php echo $option['id_satuan']; ?>"><?php echo $option['nama_satuan']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="lokasi_penyimpanan">
                      <label for="lokasi_penyimpanan">Lokasi penyimpanan</label>
                      <select name="lokasi_penyimpanan" id="lokasi_penyimpanan" required>
                      <?php foreach ($data['lokasiPenyimpanan'] as $option) { ?>
                        <option value="<?php echo $option['id_lokasi_penyimpanan']; ?>"><?php echo $option['nama_lokasi_penyimpanan']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="status">
                      <label for="status">Status</label>
                      <br>
                      <select name="status" id="status">
                      <?php foreach ($data['status'] as $option) { ?>
                        <option value="<?php echo $option['id_status']; ?>"><?php echo $option['status']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="keterangan_label">
                      <label for="keterangan_label">Keterangan label</label>
                      <br>
                      <select name="keterangan_label" id="keterangan_label" required>
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option>
                      </select>
                    </div>
                  </div>
                  <div class="input-kanan">
                    <div class="deskripsi">
                      <label for="deskripsi_barang">Deskripsi barang</label>
                      <br>
                      <input type="text" name="deskripsi_barang" id="deskripsi_barang">
                    </div>
                    <div class="kode_merek">
                      <label for="kode_merek_barang">Kode merek</label>
                      <input type="text" name="kode_merek_barang" id="kode_merek_barang" maxlength="3" minlength="3" >
                    </div>
                    <div class="total_barang">
                      <label for="total_barang">Total Barang</label>
                      <br>
                      <input type="number" name="total_barang" id="total_barang" min="0" required>
                    </div>
                    <div class="deskripsi_detail_lokasi">
                      <label for="deskripsi_detail_lokasi">Detail penyimpanan</label>
                      <input type="text" name="deskripsi_detail_lokasi" id="deskripsi_detail_lokasi">
                    </div>
                    <div class="status_pinjam">
                      <label for="status_pinjam">Status pinjam</label>
                      <br>
                      <select name="status_pinjam" id="status_pinjam">
                        <option value="bisa">Bisa</option>
                        <option value="tidak bisa">Tidak bisa</option>
                      </select>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="submit" id="kirim">Kirim</button>
                    </div>
                  </div>
              </div>
              </form>
          </div>
    </div>