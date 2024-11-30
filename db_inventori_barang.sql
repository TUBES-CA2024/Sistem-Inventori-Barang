-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2024 pada 06.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

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
-- Stand-in struktur untuk tampilan `detail_barang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_barang` (
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jenis_barang`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.mst_jenis_barang: #1932 - Table 'db_inventori.mst_jenis_barang' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.mst_jenis_barang: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`mst_jenis_barang`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_kondisi_barang`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.mst_kondisi_barang: #1932 - Table 'db_inventori.mst_kondisi_barang' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.mst_kondisi_barang: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`mst_kondisi_barang`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_lokasi_penyimpanan`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.mst_lokasi_penyimpanan: #1932 - Table 'db_inventori.mst_lokasi_penyimpanan' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.mst_lokasi_penyimpanan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`mst_lokasi_penyimpanan`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_merek_barang`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.mst_merek_barang: #1932 - Table 'db_inventori.mst_merek_barang' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.mst_merek_barang: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`mst_merek_barang`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_role`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.mst_role: #1932 - Table 'db_inventori.mst_role' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.mst_role: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`mst_role`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_satuan`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.mst_satuan: #1932 - Table 'db_inventori.mst_satuan' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.mst_satuan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`mst_satuan`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_status`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.mst_status: #1932 - Table 'db_inventori.mst_status' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.mst_status: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`mst_status`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_barang`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.trx_barang: #1932 - Table 'db_inventori.trx_barang' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.trx_barang: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`trx_barang`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_data_user`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.trx_data_user: #1932 - Table 'db_inventori.trx_data_user' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.trx_data_user: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`trx_data_user`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_jabatan`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.trx_jabatan: #1932 - Table 'db_inventori.trx_jabatan' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.trx_jabatan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`trx_jabatan`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_peminjaman`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.trx_peminjaman: #1932 - Table 'db_inventori.trx_peminjaman' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.trx_peminjaman: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`trx_peminjaman`' at line 1

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_user`
--
-- Kesalahan membaca struktur untuk tabel db_inventori.trx_user: #1932 - Table 'db_inventori.trx_user' doesn't exist in engine
-- Kesalahan membaca data untuk tabel db_inventori.trx_user: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_inventori`.`trx_user`' at line 1

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_barang`
--
DROP TABLE IF EXISTS `detail_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_barang`  AS SELECT `trx_barang`.`id_barang` AS `id_barang`, `trx_barang`.`foto_barang` AS `foto_barang`, `mst_jenis_barang`.`sub_barang` AS `sub_barang`, `mst_merek_barang`.`nama_merek_barang` AS `nama_merek_barang`, `mst_kondisi_barang`.`kondisi_barang` AS `kondisi_barang`, `trx_barang`.`jumlah_barang` AS `jumlah_barang`, `mst_satuan`.`nama_satuan` AS `nama_satuan`, `trx_barang`.`deskripsi_barang` AS `deskripsi_barang`, `trx_barang`.`tgl_pengadaan_barang` AS `tgl_pengadaan_barang`, `trx_barang`.`kode_barang` AS `kode_barang`, `trx_barang`.`keterangan_label` AS `keterangan_label`, `mst_lokasi_penyimpanan`.`nama_lokasi_penyimpanan` AS `nama_lokasi_penyimpanan`, `trx_barang`.`deskripsi_detail_lokasi` AS `deskripsi_detail_lokasi`, `mst_status`.`status` AS `status`, `trx_barang`.`status_peminjaman` AS `status_peminjaman`, `trx_barang`.`qr_code` AS `qr_code` FROM ((((((`trx_barang` join `mst_jenis_barang` on(`trx_barang`.`id_jenis_barang` = `mst_jenis_barang`.`id_jenis_barang`)) join `mst_merek_barang` on(`trx_barang`.`id_merek_barang` = `mst_merek_barang`.`id_merek_barang`)) join `mst_satuan` on(`trx_barang`.`id_satuan` = `mst_satuan`.`id_satuan`)) join `mst_kondisi_barang` on(`trx_barang`.`id_kondisi_barang` = `mst_kondisi_barang`.`id_kondisi_barang`)) join `mst_lokasi_penyimpanan` on(`trx_barang`.`id_lokasi_penyimpanan` = `mst_lokasi_penyimpanan`.`id_lokasi_penyimpanan`)) join `mst_status` on(`trx_barang`.`id_status` = `mst_status`.`id_status`)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
