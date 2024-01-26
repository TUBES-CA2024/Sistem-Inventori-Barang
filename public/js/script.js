function uppercaseInput() {
  var inputElement = document.getElementById("kode_sub");
  inputElement.value = inputElement.value.toUpperCase();
}

function validasiInput(input) {
  // Menghapus karakter non-angka menggunakan ekspresi reguler
  input.value = input.value.replace(/[^0-9]/g, "");
}

$(function () {
  //jenis barang
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

  //merek barang
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
});
