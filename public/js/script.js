function uppercaseInput() {
  var inputElement = document.getElementById("kode_sub");
  inputElement.value = inputElement.value.toUpperCase();
}

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
      data: { id_jenis_barang: id },
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
