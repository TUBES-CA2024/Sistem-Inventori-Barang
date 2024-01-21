<form action="">
    <div class="body-register">
      <div class="figure-daftar">
        <div class="logo">
          <img src="<?=BASEURL?>img/logo bg putih.svg" alt="logo" />
        </div>
        <div class="content-figure">
          <img
            id="img-figure-daftar"
            src="<?=BASEURL?>img/happy robot assistant.svg"
            alt="figure"
          />
        </div>
      </div>
      <div class="form-daftar-kiri">
        <div class="header">
          <h2>Daftar</h2>
        </div>
        <div class="form">
           
            <div class="nama">
                <label for="nama">Nama Lengkap</label>
                <input
                type="text"
                id="nama"
                placeholder="Masukkan nama lengkap anda"
                maxlength="100"
                required
                />
            </div>
            <div class="nips-nidn">
                <label for="nips_nidn">NIPS/NIDN</label>
                <input
              type="text"
              id="nips/nidn"
              name="nips-nidn"
              placeholder="Masukkan nips/nidn anda"
              maxlength="12"
              required
              />
            </div>
          <div class="email">
            <label for="email">Email</label>
            <input
              type="email"
              name="email"
              placeholder="Masukkan email anda"
              required
            />
          </div>
          <div class="kata-sandi">
            <label for="kata-sandi">Kata sandi</label>
            <input
              type="password"
              name="kata-sandi"
              id="kata-sandi"
              placeholder="Masukkan kata sandi anda"
              required
            />
          </div>
          <div class="konfirmasi-kata-sandi">
            <label for="konfirmasi-kata-sandi">Konfirmasi kata sandi</label>
            <input
              type="password"
              name="konfirmasi-kata-sandi"
              id="konfirmasi-kata-sandi"
              placeholder="Masukkan kata sandi anda"
              required
            />
          </div>
        </div>
      </div>
      <div class="form-daftar-kanan">
        <div class="foto">
          <input
            type="file"
            name="foto"
            id="foto"
            accept="image/*"
            placeholder="Pilih foto"
          />
          <label for="foto">Upload Foto</label>
        </div>
        <div class="jenis-kelamin">
          <div class="laki-laki">
            <input
              type="radio"
              name="jenis-kelamin"
              id="laki-laki"
              value="laki-laki"
              required
            />
            <label for="laki-laki">laki-laki</label>
          </div>
          <div class="perempuan">
            <input
              type="radio"
              name="jenis-kelamin"
              id="perempuan"
              value="perempuan"
              required
            />
            <label for="perempuan">perempuan</label>
          </div>
        </div>
        <div class="unit">
          <label for="unit">Unit</label>
          <input
            type="text"
            name="unit"
            id="unit"
            placeholder="Masukkan unit anda"
            maxlength="50"
            required
          />
        </div>
        <div class="no_hp">
          <label for="no_hp">No. Hp</label>
          <input
            type="text"
            name="no_hp"
            id="no_hp"
            placeholder="Masukkan no. Hp anda"
            required
            maxlength="15"
          />
        </div>
        <div class="alamat">
          <label for="alamat">Alamat</label>
          <input
            type="text"
            name="alamat"
            placeholder="Masukkan alamat anda"
            required
            maxlength="100"
          />
        </div>
   
        <div class="button-daftar">
          <button>Daftar</button>
        </div>
    </div>
    </div>
</form>