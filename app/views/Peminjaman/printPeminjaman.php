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
    </style>
</head>
<body>

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
            <?php if (!empty($data['printData'])): ?>
                <?php $i = 1; ?>
                <?php foreach ($data['printData'] as $row): ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['judul_kegiatan']; ?></td>
                        <td><?= $row['tanggal_pengajuan']; ?></td>
                        <td><?= $row['tanggal_peminjaman']; ?></td>
                        <td><?= $row['tanggal_pengembalian']; ?></td>
                        <td><?= $row['jumlah']; ?></td>
                        <td><?= $row['spesifikasi']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">Tidak ada data untuk dicetak</td></tr>
            <?php endif; ?>
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
