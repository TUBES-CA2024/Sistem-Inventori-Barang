-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2024 pada 14.41
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventori`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_kondisi_barang`
--

CREATE TABLE `mst_kondisi_barang` (
  `id_kondisi_barang` int(11) NOT NULL,
  `kondisi_barang` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_kondisi_barang`
--

INSERT INTO `mst_kondisi_barang` (`id_kondisi_barang`, `kondisi_barang`) VALUES
(1, 'Baik'),
(2, 'Rusak - dapat diperbaiki '),
(3, 'Rusak - sedang diperbaiki'),
(4, 'Rusak total'),
(5, 'Sudah terpakai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_lokasi_penyimpanan`
--

CREATE TABLE `mst_lokasi_penyimpanan` (
  `id_lokasi_penyimpanan` int(11) NOT NULL,
  `nama_lokasi_penyimpanan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_lokasi_penyimpanan`
--

INSERT INTO `mst_lokasi_penyimpanan` (`id_lokasi_penyimpanan`, `nama_lokasi_penyimpanan`) VALUES
(1, 'Lab Iot'),
(2, 'Lab StartUp'),
(3, 'Lab Neetworking'),
(4, 'Lab Multimedia'),
(5, 'Lab Computer Vision'),
(6, 'Lab Data Since'),
(7, 'Lab Micro Controller'),
(8, 'Rg PC I'),
(9, 'Rg PC II'),
(10, 'Rg Server'),
(11, 'Gudang'),
(12, 'Rg Laboran'),
(13, 'Rg Asisten Lab'),
(14, 'Rg Riset I'),
(15, 'Rg Riset II'),
(16, 'Rg Riset III'),
(17, 'Rg Kepala Lab I'),
(18, 'Rg Kepala Lab II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_merek_barang`
--

CREATE TABLE `mst_merek_barang` (
  `id_merek_barang` int(11) NOT NULL,
  `nama_merek_barang` varchar(50) DEFAULT NULL,
  `kode_merek_barang` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_role`
--

CREATE TABLE `mst_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_role`
--

INSERT INTO `mst_role` (`id_role`, `role`) VALUES
(1, 'user biasa'),
(2, 'asisten'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_satuan`
--

CREATE TABLE `mst_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_satuan`
--

INSERT INTO `mst_satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'buah'),
(2, 'lusin'),
(3, 'dus'),
(4, 'rangkaian'),
(5, 'kotak'),
(6, 'pack'),
(7, 'box'),
(8, 'roll'),
(9, 'pasang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_status`
--

CREATE TABLE `mst_status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mst_status`
--

INSERT INTO `mst_status` (`id_status`, `status`) VALUES
(1, 'Dipinjam'),
(2, 'Dipindahkan'),
(3, 'Stay'),
(4, 'Rusak'),
(5, 'Bagus'),
(6, 'Baru diganti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_barang`
--

CREATE TABLE `trx_barang` (
  `id_barang` int(11) NOT NULL,
  `id_jenis_barang` int(11) NOT NULL,
  `id_merek_barang` int(11) NOT NULL,
  `id_kondisi_barang` int(11) NOT NULL,
  `jumlah_barang` int(3) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `deskripsi_barang` text DEFAULT NULL,
  `tgl_pengadaan_barang` date NOT NULL,
  `kode_barang` varchar(26) NOT NULL,
  `keterangan_label` enum('Sudah','Belum') DEFAULT NULL,
  `id_lokasi_penyimpanan` int(11) NOT NULL,
  `deskripsi_detail_lokasi` text DEFAULT NULL,
  `status_peminjaman` enum('Bisa','Tidak Bisa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_data_user`
--

CREATE TABLE `trx_data_user` (
  `id_data_user` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `nama_user` varchar(100) NOT NULL,
  `unit_user` varchar(50) NOT NULL,
  `nips_nidn_user` varchar(12) NOT NULL,
  `no_hp_user` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trx_data_user`
--

INSERT INTO `trx_data_user` (`id_data_user`, `id_user`, `foto`, `nama_user`, `unit_user`, `nips_nidn_user`, `no_hp_user`, `jenis_kelamin`, `alamat`) VALUES
(1, 1, '../app/views/img/foto-profileDSC_7788.jpg', 'Furqon Fatahillah', 'labfik', '', '085240153953', 'Laki-laki', 'borong raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_jenis_barang`
--

CREATE TABLE `trx_jenis_barang` (
  `id_jenis_barang` int(11) NOT NULL,
  `sub_barang` varchar(50) DEFAULT NULL,
  `grup_sub` char(1) DEFAULT NULL,
  `kode_sub` varchar(3) DEFAULT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_peminjaman`
--

CREATE TABLE `trx_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_data_user` int(11) NOT NULL,
  `judul_kegiatan` varchar(100) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_awal_peminjaman` date NOT NULL,
  `tgl_akhir_peminjaman` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_pengembalian`
--

CREATE TABLE `trx_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `bukti_pengembalian` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_user`
--

CREATE TABLE `trx_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trx_user`
--

INSERT INTO `trx_user` (`id_user`, `email`, `password`, `id_role`) VALUES
(1, 'furqonfatahillah999@gmail.com', '$2y$10$7.P8D0rif.uiIgxoOvgm4Ol7WkyUdrjcca64h.fexoZKil8/1I.ji', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mst_kondisi_barang`
--
ALTER TABLE `mst_kondisi_barang`
  ADD PRIMARY KEY (`id_kondisi_barang`);

--
-- Indeks untuk tabel `mst_lokasi_penyimpanan`
--
ALTER TABLE `mst_lokasi_penyimpanan`
  ADD PRIMARY KEY (`id_lokasi_penyimpanan`);

--
-- Indeks untuk tabel `mst_merek_barang`
--
ALTER TABLE `mst_merek_barang`
  ADD PRIMARY KEY (`id_merek_barang`);

--
-- Indeks untuk tabel `mst_role`
--
ALTER TABLE `mst_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `mst_satuan`
--
ALTER TABLE `mst_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `mst_status`
--
ALTER TABLE `mst_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `trx_barang`
--
ALTER TABLE `trx_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis_barang` (`id_jenis_barang`),
  ADD KEY `id_merek_barang` (`id_merek_barang`),
  ADD KEY `id_kondisi_barang` (`id_kondisi_barang`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_lokasi_penyimpanan` (`id_lokasi_penyimpanan`);

--
-- Indeks untuk tabel `trx_data_user`
--
ALTER TABLE `trx_data_user`
  ADD PRIMARY KEY (`id_data_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `trx_jenis_barang`
--
ALTER TABLE `trx_jenis_barang`
  ADD PRIMARY KEY (`id_jenis_barang`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `trx_peminjaman`
--
ALTER TABLE `trx_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_data_user` (`id_data_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `trx_pengembalian`
--
ALTER TABLE `trx_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indeks untuk tabel `trx_user`
--
ALTER TABLE `trx_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mst_kondisi_barang`
--
ALTER TABLE `mst_kondisi_barang`
  MODIFY `id_kondisi_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mst_lokasi_penyimpanan`
--
ALTER TABLE `mst_lokasi_penyimpanan`
  MODIFY `id_lokasi_penyimpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `mst_merek_barang`
--
ALTER TABLE `mst_merek_barang`
  MODIFY `id_merek_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_role`
--
ALTER TABLE `mst_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mst_satuan`
--
ALTER TABLE `mst_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mst_status`
--
ALTER TABLE `mst_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `trx_barang`
--
ALTER TABLE `trx_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `trx_data_user`
--
ALTER TABLE `trx_data_user`
  MODIFY `id_data_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `trx_jenis_barang`
--
ALTER TABLE `trx_jenis_barang`
  MODIFY `id_jenis_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `trx_user`
--
ALTER TABLE `trx_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trx_barang`
--
ALTER TABLE `trx_barang`
  ADD CONSTRAINT `trx_barang_ibfk_1` FOREIGN KEY (`id_jenis_barang`) REFERENCES `trx_jenis_barang` (`id_jenis_barang`),
  ADD CONSTRAINT `trx_barang_ibfk_2` FOREIGN KEY (`id_merek_barang`) REFERENCES `mst_merek_barang` (`id_merek_barang`),
  ADD CONSTRAINT `trx_barang_ibfk_3` FOREIGN KEY (`id_kondisi_barang`) REFERENCES `mst_kondisi_barang` (`id_kondisi_barang`),
  ADD CONSTRAINT `trx_barang_ibfk_4` FOREIGN KEY (`id_satuan`) REFERENCES `mst_satuan` (`id_satuan`),
  ADD CONSTRAINT `trx_barang_ibfk_5` FOREIGN KEY (`id_lokasi_penyimpanan`) REFERENCES `mst_lokasi_penyimpanan` (`id_lokasi_penyimpanan`);

--
-- Ketidakleluasaan untuk tabel `trx_data_user`
--
ALTER TABLE `trx_data_user`
  ADD CONSTRAINT `trx_data_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `trx_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `trx_jenis_barang`
--
ALTER TABLE `trx_jenis_barang`
  ADD CONSTRAINT `trx_jenis_barang_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `mst_status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `trx_peminjaman`
--
ALTER TABLE `trx_peminjaman`
  ADD CONSTRAINT `trx_peminjaman_ibfk_1` FOREIGN KEY (`id_data_user`) REFERENCES `trx_data_user` (`id_data_user`),
  ADD CONSTRAINT `trx_peminjaman_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `trx_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `trx_pengembalian`
--
ALTER TABLE `trx_pengembalian`
  ADD CONSTRAINT `trx_pengembalian_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `trx_peminjaman` (`id_peminjaman`);

--
-- Ketidakleluasaan untuk tabel `trx_user`
--
ALTER TABLE `trx_user`
  ADD CONSTRAINT `trx_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `mst_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
