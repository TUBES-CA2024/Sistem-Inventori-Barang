function uppercaseInput() {
  var inputElement = document.getElementById("kode_sub");
  inputElement.value = inputElement.value.toUpperCase();
}

function validasiInput(input) {
  // Menghapus karakter non-angka menggunakan ekspresi reguler
  input.value = input.value.replace(/[^0-9]/g, "");
}

function cetak() {
  window.print();
}

//jenis barang
$(function () {
  $(".btn-tambah").on("click", function () {
    $(".modal-title").html("Tambah Jenis Barang");
  });

  $(".tampilJenisBarangUbah").on("click", function () {
    $(".modal-title").html("Ubah Jenis Barang");
    $(".modal-body form").attr(
      "action",
      "http://localhost/inventori/public/JenisBarang/ubahJenisBarang"
    );
    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/inventori/public/JenisBarang/getUbah",
      data: {
        id_jenis_barang: id,
      },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#sub_barang").val(data.sub_barang);
        $("#grup_sub").val(data.grup_sub);
        $("#kode_sub").val(data.kode_sub);
        $("#id_jenis_barang").val(data.id_jenis_barang);
      },
    });
  });
});

//merek barang
$(function () {
  $(".btn-tambah-merek").on("click", function () {
    $(".title-merek").html("Tambah Merek Barang");
  });

  $(".tampilMerekBarangUbah").on("click", function () {
    $(".title-merek").html("Ubah Merek Barang");
    $(".body-merek form").attr(
      "action",
      "http://localhost/inventori/public/MerekBarang/ubahMerekBarang"
    );
    const id = $(this).data("id");

    $.ajax({
      url: "http://localhost/inventori/public/MerekBarang/getUbah",
      data: {
        id_merek_barang: id,
      },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#nama_merek_barang").val(data.nama_merek_barang);
        $("#kode_merek_barang").val(data.kode_merek_barang);
        $("#id_merek_barang").val(data.id_merek_barang);
      },
    });
  });

  // $(".btn-tambah-barang").on("click", function () {
  //   $("#title-barang").html("Tambah Barang");
  // });

  // $(".tampilBarangUbah").on("click", function () {
  //   $("#title-barang").html("Ubah Data Barang");
  //   $(".body-barang form").attr(
  //     "action",
  //     "http://localhost/inventori/public/Beranda/ubahBarang"
  //   );
  //   const id = $(this).data("id");
  //   console.log(id);
  //   $.ajax({
  //     url: "http://localhost/inventori/public/Beranda/getUbah",
  //     data: {
  //       id_barang: id,
  //     },
  //     method: "post",
  //     dataType: "json",
  //     success: function (data) {
  //       $("#id_barang").val(data.id_barang);
  //       $("#id_jenis_barang").val(data.sub_barang);
  //       $("#nama_merek_barang").val(data.id_merek_barang);
  //       $("#id_kondisi_barang").val(data.kondisi_barang);
  //       $("#jumlah_barang").val(data.jumlah_barang);
  //       $("#id_satuan").val(data.satuan);
  //       $("#deskripsi_barang").val(data.deskripsi_barang);
  //       $("#tgl_pengadaan_barang").val(data.tgl_pengadaan_barang);
  //       $("#keterangan_label").val(data.keterangan_label);
  //       $("#id_lokasi_penyimpanan").val(data.lokasi_penyimpanan);
  //       $("#deskripsi_detail_lokasi").val(data.deskripsi_detail_lokasi);
  //       $("#status").val(data.id_status);
  //       $("#status_peminjaman").val(data.status_pinjam);
  //       $("#barang_ke").val(data.barang_ke);
  //       $("#total_barang").val(data.total_barang);
  //     },
  //   });
  // });
});
