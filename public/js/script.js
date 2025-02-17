function uppercaseInput() {
  let inputElement = $("#kode_sub");
  inputElement.value = inputElement.value.toUpperCase();
}


function camelCase() {
  const inputDeskBarang = $("#deskripsi_barang");
  inputDeskBarang.value =
    inputDeskBarang.value.charAt(0).toUpperCase() +
    inputDeskBarang.value.slice(1);

  const inputDetailLokasi = $("#deskripsi_detail_lokasi");
  inputDetailLokasi.value =
    inputDetailLokasi.value.charAt(0).toUpperCase() +
    inputDetailLokasi.value.slice(1);

  const inputSubBarang = $("#sub_barang");
  inputSubBarang.value =
    inputSubBarang.value.charAt(0).toUpperCase() +
    inputSubBarang.value.slice(1);
}

function validasiInput(input) {
  input.value = input.value.replace(/[^0-9]/g, "");
}


// function cetak() {
//   window.print();
$(function(){

  $('.tombolTambahData').on('click', function(){
    $('#tambahPeminjaman').html('Tambah Data Peminjaman');
    $('.modal-footer button[type=submit]').html('Kirim');

  });

  $('.tampilModalPeminjaman').on('click', function(){
    $('#tambahPeminjaman').html('Ubah Data Peminjaman');
    $('.modal-footer button[type=submit]').html('Simpan Perubahan');
    $('.modal-body form').attr('action','http://localhost/inventori/public/Peminjaman/ubahPeminjaman');

    const id_peminjaman = $(this).data('id');
    console.log(id_peminjaman);
    if (!id_peminjaman) {
        alert('ID peminjaman tidak ditemukan');
        return;
    }

    $.ajax({
        url: "http://localhost/inventori/public/Peminjaman/getUbah",
        data: {id_peminjaman : id_peminjaman},
        method: 'post',
        dataType :'json',
        success :function(data){
            if (data.error) {
                alert(data.error);
                return;
            }

            $('#judul_kegiatan').val(data.judul_kegiatan);
            $('#tanggal_peminjaman').val(data.tanggal_peminjaman);
            $('#tanggal_pengembalian').val(data.tanggal_pengembalian);
            $('#id_jenis_barang').val(data.id_jenis_barang);
            $('#jumlah_peminjaman').val(data.jumlah_peminjaman);
            $('#keterangan_peminjaman').val(data.keterangan_peminjaman);
            $('#id_peminjaman').val(data.id_peminjaman);
        },
        error: function() {
            alert('Terjadi kesalahan saat mengambil data');
        }
    });
});
});

//Modal Edit Pengembalian

$(document).ready(function () {
  $(document).on('click', '.tampilModalPengembalian', function () {
      $('#modalEditPengembalianLabel').html('Ubah Data Pengembalian');
      $('.modal-footer button[type=submit]').html('Simpan Perubahan');
      $('.modal-body form').attr('action', 'http://localhost/inventori/public/Pengembalian/ubahPengembalian');

      const id_pengembalian = $(this).data('id');
      if (!id_pengembalian) {
          alert('ID pengembalian tidak ditemukan');
          return;
      }

      $.ajax({
          url: "http://localhost/inventori/public/Pengembalian/getUbah",
          data: { id_pengembalian: id_pengembalian },
          method: 'POST',
          dataType: 'json',
          success: function (data) {
              $('#status_pengembalian').val(data.status_pengembalian);
              $('#detail_masalah').val(data.detail_masalah);
              $('#id_pengembalian').val(data.id_pengembalian);
              $('#nama_peminjam').val(data.nama_peminjam); 
              $('#tanggal_peminjaman').val(data.tanggal_peminjaman); 
              $('#tanggal_pengembalian').val(data.tanggal_pengembalian); 

              updateKeterangan();
          },
          error: function (xhr, status, error) {
              console.error("AJAX Error:", status, error);
              alert("Terjadi kesalahan saat mengambil data pengembalian.");
          }
      });
  });

  $('#status_pengembalian').on('change', function () {
      updateKeterangan();
  });

  function updateKeterangan() {
      const status = $('#status_pengembalian').val();
      const tanggalPengembalian = new Date($('#tanggal_pengembalian').val());
      const today = new Date();
      let keterangan = '';

      if (status === 'Dikembalikan') {
          if (today <= tanggalPengembalian) {
              keterangan = 'Tepat Waktu';
          } else {
              keterangan = 'Tidak Tepat Waktu';
          }
      } else if (status === 'Hilang' || status === 'Rusak') {
          keterangan = 'Bermasalah';
          $('#detail_masalah').prop('required', true);
      } else {
          if (today > tanggalPengembalian) {
              keterangan = 'Tidak Tepat Waktu';
          }
      }

      $('#keterangan').val(keterangan);
  }
});


  $(document).ready(function () {
    // Event untuk tombol tambah data
    $('.tombolTambahData').on('click', function () {
        $('#tambahPeminjaman').html('Tambah Data Peminjaman');
        $('.modal-footer button[type=submit]').html('Kirim');
    });

    // Event delegation untuk tombol edit peminjaman
    $(document).on('click', '.tampilModalPeminjaman', function () {
        $('#tambahPeminjaman').html('Ubah Data Peminjaman');
        $('.modal-footer button[type=submit]').html('Simpan Perubahan');
        $('.modal-body form').attr('action', 'http://localhost/inventori/public/Peminjaman/ubahPeminjaman');

        // Ambil ID peminjaman dari atribut data-id
        const id_peminjaman = $(this).data('id');

        // Debugging untuk memastikan ID terbaca
        console.log("ID Peminjaman:", id_peminjaman);

        if (!id_peminjaman) {
            alert('ID peminjaman tidak ditemukan');
            return;
        }

        // AJAX untuk mendapatkan data peminjaman berdasarkan ID
        $.ajax({
            url: "http://localhost/inventori/public/Peminjaman/getUbah",
            data: { id_peminjaman: id_peminjaman },
            method: 'POST',
            dataType: 'json',
            success: function (data) {
                console.log("Data dari server:", data); // Debugging

                // Mengisi data ke dalam form modal
                $('#judul_kegiatan').val(data.judul_kegiatan);
                $('#nama_peminjam').val(data.nama_peminjam);
                $('#tanggal_peminjaman').val(data.tanggal_peminjaman);
                $('#tanggal_pengembalian').val(data.tanggal_pengembalian);
                $('#id_jenis_barang').val(data.id_jenis_barang).trigger('change');
                $('#jumlah_peminjaman').val(data.jumlah_peminjaman);
                $('#keterangan_peminjaman').val(data.keterangan_peminjaman);
                $('#status').val(data.status);
                $('#id_peminjaman').val(data.id_peminjaman);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("Terjadi kesalahan saat mengambil data peminjaman.");
            }
        });
    });
  });


  function submitForm() {
    const checkboxes = document.querySelectorAll(".checkbox"); // Mengambil semua checkbox dengan kelas 'checkbox'
    let idbarang = [];

    checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
            idbarang.push(checkbox.value); // Menambahkan nilai ID barang yang tercentang
        }
    });
    console.log(idbarang);
    if (idbarang.length === 0) {
        alert("Pilih setidaknya satu barang untuk diekspor!");
        return;
    }

    // Mengisi nilai input hidden dengan ID barang yang dipilih
    document.getElementById("idbarang").value = idbarang.join(","); // Gabungkan ID barang dengan koma

    // Mengirim form setelah mengisi input hidden
    document.getElementById("formCheckbox").submit();
}

//   function tampilCetak() {
//     const checkboxes = document.querySelectorAll(".checkbox");
//     let idbarang = [];

//     checkboxes.forEach(function (checkbox) {
//         if (checkbox.checked) {
//             idbarang.push(checkbox.value);
//         }
//     });

//     if (idbarang.length === 0) {
//         alert("Pilih setidaknya satu barang untuk diekspor!");
//         return;
//     }

//     console.log(idbarang);

//     // Mengisi nilai idbarang ke input hidden
//     document.getElementById("idbarang").value = idbarang.join(",");

//     // Submit form
//     document.getElementById("formCheckbox").submit();
// }


function checkbox() {
  let form = document.getElementById("formCheckbox");

  form.submit();
}

//jenis barang
$(function () {
  $(".btn-tambah").on("click", function () {
    $(".modal-title").html("Tambah Jenis Barang");
    $(".modal-body form").attr(
      "action",
      "http://localhost/inventori/public/JenisBarang/tambahJenisBarang"
    );
    const data = "";
    $("#sub_barang").val(data.sub_barang);
    $("#grup_sub").val(data.grup_sub);
    $("#kode_sub").val(data.kode_sub);
    $("#id_jenis_barang").val(data.id_jenis_barang);
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
    $(".body-merek form").attr(
      "action",
      "http://localhost/inventori/public/MerekBarang/tambahMerekBarang"
    );
    const data = "";
    $("#nama_merek_barang").val(data.nama_merek_barang);
    $("#kode_merek_barang").val(data.kode_merek_barang);
    $("#id_merek_barang").val(data.id_merek_barang);
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


$(document).ready(function(){
  $('#myTable').DataTable();
  
  $("form#formCheckbox").submit(function(e) {
    const checkboxes = document.querySelectorAll(".checkbox"); // Pilih semua checkbox
    let idbarang = [];

    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            idbarang.push(checkbox.value); // Tambahkan nilai checkbox yang dicentang ke dalam array
        }
    });

    // Jika idbarang berisi data, konversi menjadi JSON dan set nilai pada input hidden
    if (idbarang.length > 0) {
        $("#idbarang").val(JSON.stringify(idbarang)); // Set nilai input tersembunyi menjadi JSON string
    } else {
        // Jika tidak ada data, kirimkan string kosong
        $("#idbarang").val("");
    }
});
});

let myTable = $('#myTable').DataTable({
  dom: 'lrtip', // Menghilangkan search bawaan DataTable
  "bLengthChange": false, // Menonaktifkan opsi show entries
  "bInfo": true // Menonaktifkan informasi total entries
});

$('select[name="entries_length"]').on('change', function () {
  myTable.page.len($(this).val()).draw(); // Atur jumlah entri per halaman
});

// Hubungkan search kustom ke DataTable
$('#customSearch').on('keyup', function () {
  myTable.search(this.value).draw(); // Cari data sesuai input
});



  //data tables
  let table = $("#example").DataTable({
    lengthChange: false,
    searching: true,
    responsive: true,
    scrollY: 350,
    scrollX: 400,
    pageLength: 20,
    deferRender: true,
    scroller: true,
    dom: "Bfrtip",
    buttons: [
      {
        extend: "copy",
        text: '<i class="fa-solid fa-copy" style="color: #ffffff;margin-right:10px;"></i>Salin',
        exportOptions: {
          columns: ":visible",
        },
      },
      {
        extend: "csv",
        text: '<i class="fa-solid fa-file-csv" style="color: #ffffff; margin-right:10px;"></i>Ekspor ke CSV',
        exportOptions: {
          columns: ":visible",
        },
      },
      {
        extend: "excel",
        title: "Data Barang Laboratorium Terpadu Fakultas Ilmu Komputer",
        text: '<i class="fa-solid fa-file-excel" style="color: #ffffff; margin-right:10px;"></i>Ekspor ke Excel',
        exportOptions: {
          columns: ":visible",
        },
      },
      {
          extend: "print",
          title: "",
          text: '<i class="fa-solid fa-print" style="color: #ffffff;  margin-right:10px;"></i>Cetak',
          exportOptions: {
            columns: ":visible",
            stripHtml: false,
            orientation: "landscape",
          },
        customize: function (win) {
          $(win.document.body).prepend(
            '<img src="../img/logo bg putih.svg" style="width:250px;height:250px;">'
          );
          var css =
              "@page { size: A3 landscape; }" +
              "table.dataTable { width: 100% !important; }" +
              "table.dataTable th, table.dataTable td { white-space: nowrap; }",
            head =
              win.document.head || win.document.getElementsByTagName("head")[0],
            style = win.document.createElement("style");

          style.type = "text/css";
          style.media = "print";

          if (style.styleSheet) {
            style.styleSheet.cssText = css;
          } else {
            style.appendChild(win.document.createTextNode(css));
          }

          head.appendChild(style);
        },

        //   // Lakukan hal lain yang diperlukan dengan dokumen PDF
        // },
        // });
        // },
      },
      {//edit search


      },
      {
        extend: "colvis",
        text: "Visibilitas kolom",
      },
    ],
    initComplete: function () {
      // Tambahkan kelas khusus ke elemen input Search
      $("#example_filter input").addClass("custom-search");
    },

  });

//penutup datatable

  table.buttons().container().appendTo("#example_wrapper :eq(0)");

  // set time flasher
  setTimeout(function () {
    $("#flasher").fadeOut("slow");
  }, 3000);

  //ubah profile
  $(".btn-Ubah-profile").on("click", function () {
    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost/inventori/public/Profil/getUbah",
      data: {
        id_user: id,
      },
      method: "post",
      dataType: "json",
      success: function (data) {
        console.log(data);
        $("#id_user").val(data.id_user);
        $("#nama_user").val(data.nama_user);
        $("#no_hp_user").val(data.no_hp_user);
        $("#alamat").val(data.alamat);
        $("#foto").val(data.foto);
      },
    });
  });

  //ubah barang
  $(".btn-tambah-barang").on("click", function () {
    $("#title-barang").html("Tambah Barang");
    $(".body-barang form").attr(
      "action",
      "http://localhost/inventori/public/DetailBarang/tambahBarang"
    );
    const data = "";
    $("#id_barang").val(data.id_barang);
    $("#id_jenis_barang").val(data.sub_barang);
    $("#nama_merek_barang").val(data.id_merek_barang);
    $("#id_kondisi_barang").val(data.kondisi_barang);
    $("#jumlah_barang").val(data.jumlah_barang);
    $("#id_satuan").val(data.satuan);
    $("#deskripsi_barang").val(data.deskripsi_barang);
    $("#tgl_pengadaan_barang").val(data.tgl_pengadaan_barang);
    $("#keterangan_label").val(data.keterangan_label);
    $("#id_lokasi_penyimpanan").val(data.lokasi_penyimpanan);
    $("#deskripsi_detail_lokasi").val(data.deskripsi_detail_lokasi);
    $("#status").val(data.id_status);
    $("#status_peminjaman").val(data.status_pinjam);
    $("#barang_ke").val(data.barang_ke);
    $("#total_barang").val(data.total_barang);
  });

  $(".tampilBarangUbah").on("click", function () {
    $("#title-barang").html("Ubah Data Barang");
    $(".body-barang form").attr(
      "action",
      "http://localhost/inventori/public/DetailBarang/ubahBarang"
    );
    const id = $(this).data("id");
    console.log(id);
    $.ajax({
      url: "http://localhost/inventori/public/DetailBarang/getUbah",
      data: {
        id_barang: id,
      },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id_barang").val(data.id_barang);
        $("#id_jenis_barang").val(data.sub_barang);
        $("#nama_merek_barang").val(data.id_merek_barang);
        $("#id_kondisi_barang").val(data.kondisi_barang);
        $("#jumlah_barang").val(data.jumlah_barang);
        $("#id_satuan").val(data.satuan);
        $("#deskripsi_barang").val(data.deskripsi_barang);
        $("#tgl_pengadaan_barang").val(data.tgl_pengadaan_barang);
        $("#keterangan_label").val(data.keterangan_label);
        $("#id_lokasi_penyimpanan").val(data.lokasi_penyimpanan);
        $("#deskripsi_detail_lokasi").val(data.deskripsi_detail_lokasi);
        $("#status").val(data.id_status);
        $("#status_peminjaman").val(data.status_pinjam);
        $("#barang_ke").val(data.barang_ke);
        $("#total_barang").val(data.total_barang);
      },
    });
  });

  //ubah role
  $(".btnUbahRole").on("click", function () {
    const id_user = $(this).data("user");
    $.ajax({
      url: "http://localhost/inventori/public/KelolaAkun/getRole", // Ubah URL sesuai dengan kebutuhan Anda
      data: {
        id_user: id_user,
      },
      method: "post",
      dataType: "json",
      success: function (data) {
        $("#id_user").val(data.id_user);
        $("#id_role").val(data.id_role);
      },
    });
  });
});

//pilih semua
const selectAllCheckbox = document.getElementById("selectAllCheckbox");
const checkboxes = document.querySelectorAll(".checkbox");
selectAllCheckbox.addEventListener("change", function () {
  checkboxes.forEach((checkbox) => {
    checkbox.checked = selectAllCheckbox.checked;
  });
});

//hover custom untuk halaman active

document.addEventListener("DOMContentLoaded", function () {
  // Ambil path URL saat ini tanpa parameter GET
  let currentPath = window.location.pathname.replace(/^\/|\/$/g, ""); // Hilangkan garis miring di awal & akhir

  // Seleksi semua elemen <li> sidebar
  document.querySelectorAll(".menu ul li").forEach((item) => {
      // Ambil tombol dalam setiap <li>
      let button = item.querySelector("button");

      if (button) {
          // Ambil link dari onclick attribute
          let targetPath = button.getAttribute("onclick").match(/'([^']+)'/)[1];

          // Bandingkan dengan URL saat ini
          if (currentPath.includes(targetPath.replace("<?=BASEURL;?>", "").toLowerCase())) {
              item.classList.add("active"); // Tambahkan kelas "active"
          }
      }
  });
});
