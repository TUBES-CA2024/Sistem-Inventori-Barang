<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        
    button:hover {
        cursor: pointer;
        opacity: 0.9;
    }

    button {
        width: 150px;
        height: 47px;
        border-radius: 8px;
        background-color: #0c1740;
        color: white;
        font-family: "Poppins", sans-serif;
        font-weight: 500;
        font-size: 15px;
        border: none;
    }

  
    .buttons-excel,
    .buttons-print,
    .buttons-copy,
    .buttons-csv,
    .buttons-colvis{
        box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        background-color: #0c1740;
        width: 170px;
        border: none;
    }

    .buttons-excel:hover,
    .buttons-print:hover,
    .buttons-csv:hover,
    .buttons-copy:hover,
    .buttons-colvis:hover{
        background-color: #0c1740;
    }
    </style>
</head>
<body>

<div class="card-body p-3">
    <div class="header" style="display: flex; padding:20px;">
        <img src="<?=BASEURL;?>img/logo bg putih.svg" alt="logo" />
        <div class="button"
            style="padding-top:10px; width:100%; display:flex; align-items:end; gap:10px; flex-direction:column;">
            <button style="box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5); font-weight:600;"
            onclick="location.href='<?=BASEURL?>peminjaman'"><i class="fa-solid fa-arrow-left" style="color: #ffffff; margin-right:10px;"></i>Kembali</button>
        </div>
    </div>
    <div style="height:100%; padding:20px;box-shadow: 5px 5px 10px 0px rgba(0, 0, 0, 0.5); border-radius:10px;">
    <h2>Data Peminjaman Terpilih</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul Kegiatan</th>
                <th>Tanggal Pengajuan</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
       
<tbody>
    <?php $i = 1; ?>
    <?php foreach ($data['peminjaman'] as $row): ?>
        <tr style="font-size: 14px;">
            <td scope="row" class="px-2"><?= $i++; ?></td>
            <td class="p-2" style="text-transform: capitalize;"><?= $row['judul_kegiatan']; ?></td>
            <td class="p-2"><?= $row['tanggal_pengajuan']; ?></td>
            <td class="p-2"><?= $row['tanggal_peminjaman']; ?></td>
            <td class="p-2"><?= $row['tanggal_pengembalian']; ?></td>
            <td class="p-2"><?= $row['jumlah']; ?></td>
            <td class="p-2"><?= $row['spesifikasi']; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
    </table>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            window.print();
        }, 500);
    });
    </script>

</body>
</html>
