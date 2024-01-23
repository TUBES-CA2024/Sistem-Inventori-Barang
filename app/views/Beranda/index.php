<div class="body-beranda">
      <div class="side-bar">
        <div class="profil">
          <div class="logo">
            <img src="<?=BASEURL;?>img/logo bg hitam.svg" alt="logo" />
          </div>
          <div class="data-profil">
            <img src="<?=BASEURL;?>img/Ellipse 26.png" alt="profile" />
            <div class="detail-data-profil">
              <p id="nama">Naufal Abiyyu</p>
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
        <div class="content-beranda">
          <h3 id="title">Beranda</h3>
          <div class="btn-fitur">
            <button data-toggle="modal" data-target="#modalTambah">
              <i class="fa-solid fa-plus" style="color: #ffffff"></i> Tambah
            </button>
            <div class="search"></div>
          </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Kode barang</th>
                <th scope="col">Jenis barang</th>
                <th scope="col">Merek</th>
                <th scope="col">Deskripsi barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Satuan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
              </tr>
            </tbody>
          </table>
          <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
              <div class="modal-content" style="width: 900px; height:600px">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalTambahLabel">Tambah barang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="input-kiri">
                    <div class="jenis-barang">
                      <label for="jenis_barang">
                        Jenis barang
                      </label>
                      <input type="text" name="jenis_barang" id="jenis_barang">
                    </div>
                    <div class="kode_sub">
                      <label for="kode_sub">Kode sub</label>
                      <br>
                      <input type="text" name="kode_sub" id="kode_sub" maxlength="3" required oninput="uppercaseInput()">
                    </div>
                    <div class="jumlah">
                      <label for="jumlah">jumlah</label>
                      <br>
                      <input type="number" name="jumlah" id="jumlah" required>
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
                  </div>
                  <div class="input-tengah" style="display: flex; flex-direction: column; gap: 20px;">
                    <div class="merek">
                      <label for="merek">Merek</label>
                      <br>
                      <input type="text" name="merek" id="merek">
                    </div>
                    <div class="grup_sub">
                        <label for="grub_sub">Grub sub</label>
                        <br>
                        <select name="grub_sub" id="gruub_sub">
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
                      <select name="satuan" id="satuan">
                      <?php foreach ($data['satuan'] as $option) { ?>
                        <option value="<?php echo $option['id_satuan']; ?>"><?php echo $option['nama_satuan']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="lokasi_penyimpanan">
                      <label for="lokasi_penyimpanan">Lokasi penyimpanan</label>
                      <select name="lokasi_penyimpanan" id="lokasi_penyimpanan">
                      <?php foreach ($data['lokasiPenyimpanan'] as $option) { ?>
                        <option value="<?php echo $option['id_lokasi_penyimpanan']; ?>"><?php echo $option['nama_lokasi_penyimpanan']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                  </div>
                  <div class="input-kanan">
                    <div class="deskripsi">
                      <label for="deskripsi">Deskripsi</label>
                      <input type="text" name="deskripsi" id="deskripsi">
                    </div>
                    <div class="tgl_pengadaan">
                      <label for="tgl_pengadaan">Tgl pengadaan</label>
                      <input type="date" name="tgl_pengadaan" id="tgl_pengadaaan" required>
                    </div>
                    <div class="kondisi_barang">
                      <label for="kondisi_barang">Kondisi barang</label>
                      <br>
                      <select name="kondisi_barang" id="kondisi_barang">
                      <?php foreach ($data['kondisiBarang'] as $option) { ?>
                        <option value="<?php echo $option['id_kondisi_barang']; ?>"><?php echo $option['kondisi_barang']; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="detail_penyimpanan">
                      <label for="detail_penyimpanan">Detail penyimpanan</label>
                      <input type="text" name="detail_penyimpanan" id="detail_penyimpanan">
                    </div>
                    <div class="keterangan_label">
                      <label for="keterangan_label">Keterangan label</label>
                      <br>
                      <select name="keterangan_label" id="keterangan_label">
                        <option value="sudah">Sudah</option>
                        <option value="belum">Belum</option>
                      </select>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" id="kirim">Kirim</button>
                    </div>
                  </div>
              </div>
      </div>
    </div>