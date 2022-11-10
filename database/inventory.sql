-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Jul 2020 pada 07.05
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_barang`
--

CREATE TABLE `kondisi_barang` (
  `id_kondisi` int(11) NOT NULL,
  `kondisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kondisi_barang`
--

INSERT INTO `kondisi_barang` (`id_kondisi`, `kondisi`) VALUES
(1, 'Bagus'),
(2, 'Perbaikan'),
(3, 'Rusak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` varchar(30) DEFAULT NULL,
  `status_pinjam` varchar(15) DEFAULT NULL,
  `komfirmasi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_barang`, `jumlah`, `tanggal_pinjam`, `tanggal_kembali`, `status_pinjam`, `komfirmasi`) VALUES
(3, 5, 22, '1', '2020-07-30', '2020-07-30', 'Dikembalikan', 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `isi` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi`, `time`) VALUES
(8, 'Ketinggalan Hp ', 'Bagi yang merasa Meninggalkan Hp nya di Lab. RPL untuk segera mengambilnya di Ruang admin/ pak Hadi\r\n', '2020-05-21 15:08:00'),
(9, 'Ketingalan Charger Laptop', 'Bagi mahasiswa yang merasa  tak sengaja meninggalkan Charger Laptop di Laboratorium Rekayasa Perangkat Lunak ( Lab. RPL)  untuk segera di ambil di Admin Lab.\r\n', '2020-05-21 15:09:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alat`
--

CREATE TABLE `tb_alat` (
  `id_alat` int(11) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `id_spesifikasi` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alatkeluar`
--

CREATE TABLE `tb_alatkeluar` (
  `id_alatkeluar` int(11) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `nomor_pengadaan` varchar(30) NOT NULL,
  `document` varchar(200) NOT NULL,
  `id_spesifikasi` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alatkeluar`
--

INSERT INTO `tb_alatkeluar` (`id_alatkeluar`, `kode_barang`, `nama_barang`, `nomor_pengadaan`, `document`, `id_spesifikasi`, `id_kondisi`, `jumlah`, `lokasi`, `tanggal_keluar`) VALUES
(18, 'A2006', 'Personal Computer', '004/PLJ.17.20.20/PL17/KU/2017', 'BERITA_ACARA_MUTASI_BARANG.docx', 4, 3, 2, 'Gudang', '2020-06-23'),
(19, 'A2005', 'Infocus Projector', '004/PLJ.17.20.20/PL17/KU/2015', 'BERITA_ACARA_MUTASI_BARANG.docx', 7, 1, 1, 'lab.KSI', '2020-06-23'),
(20, 'A2004', 'Personal Computer', '004/PLJ.17.20.20/PL17/KU/2017', 'BERITA_ACARA_MUTASI_BARANG.docx', 3, 2, 2, 'Tempat Service', '2020-06-23'),
(21, 'A2003', 'Personal Computer', '004/PLJ.17.20.20/PL17/KU/2019', 'BERITA_ACARA_MUTASI_BARANG.docx', 6, 3, 2, 'Gudang', '2020-06-23'),
(22, 'A2002', 'Stavolt', '004/PLJ.17.20.20/PL17/KU/2018', 'BERITA_ACARA_MUTASI_BARANG.docx', 2, 1, 2, 'lab.KSI', '2020-06-23'),
(23, 'A2001', 'Personal Computer', '002/PLJ.17.20.20/KSI/2016', 'BERITA_ACARA_MUTASI_BARANG.docx', 1, 2, 3, 'Tempat Service', '2020-06-23');

--
-- Trigger `tb_alatkeluar`
--
DELIMITER $$
CREATE TRIGGER `pengeluaran_barang` AFTER INSERT ON `tb_alatkeluar` FOR EACH ROW BEGIN
     UPDATE tb_alatmasuk SET jumlah=jumlah-NEW.jumlah
 WHERE kode_barang=NEW.kode_barang;
 DELETE FROM tb_alatmasuk WHERE jumlah = 0;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_barangkeluar` AFTER UPDATE ON `tb_alatkeluar` FOR EACH ROW BEGIN
     UPDATE tb_alatmasuk SET jumlah=jumlah-NEW.jumlah
 WHERE kode_barang=NEW.kode_barang;
 DELETE FROM tb_alatmasuk WHERE jumlah = 0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alatmasuk`
--

CREATE TABLE `tb_alatmasuk` (
  `id_alatmasuk` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `nomor_pengadaan` varchar(30) NOT NULL,
  `document` varchar(200) NOT NULL,
  `id_spesifikasi` int(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sumber_barang` varchar(60) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_alatmasuk`
--

INSERT INTO `tb_alatmasuk` (`id_alatmasuk`, `kode_barang`, `nama_barang`, `nomor_pengadaan`, `document`, `id_spesifikasi`, `id_kondisi`, `jumlah`, `sumber_barang`, `tanggal_masuk`) VALUES
(18, 'A2001', 'Personal Computer', '002/PLJ.17.20.20/KSI/2016', 'BERITA_ACARA_SERAH_TERIMA_BARANG.docx', 1, 1, 7, 'Lab. KSI', '2020-06-22'),
(21, 'A2004', 'Personal Computer', '004/PLJ.17.20.20/PL17/KU/2017', 'BERITA_ACARA_SERAH_TERIMA_BARANG.docx', 3, 1, 6, 'Lab. KSI', '2020-06-23'),
(22, 'A2005', 'Infocus Projector', '004/PLJ.17.20.20/PL17/KU/2015', 'BERITA_ACARA_SERAH_TERIMA_BARANG.docx', 7, 2, 2, 'Tempat Service', '2020-06-23'),
(23, 'A2006', 'Personal Computer', '002/PLJ.17.20.20/KSI/2018', 'BERITA_ACARA_SERAH_TERIMA_BARANG.docx', 4, 2, 3, 'Tempat Service', '2020-06-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bahan`
--

CREATE TABLE `tb_bahan` (
  `id_bahan` int(11) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bahan`
--

INSERT INTO `tb_bahan` (`id_bahan`, `kode_barang`, `nama_barang`, `jumlah`) VALUES
(1, 'B2001', 'Kertas Memo', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bahankeluar`
--

CREATE TABLE `tb_bahankeluar` (
  `id_bahankeluar` int(11) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `lokasi_tujuan` varchar(30) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bahankeluar`
--

INSERT INTO `tb_bahankeluar` (`id_bahankeluar`, `kode_barang`, `nama_barang`, `jumlah`, `satuan`, `lokasi_tujuan`, `tanggal_keluar`) VALUES
(7, 'B2001', 'Kerta Memo', 2, 'pack', 'Lab.KSI', '2020-06-23'),
(8, 'B2002', 'Bulpoin', 4, 'pack', 'Lab.KSI', '2020-06-23'),
(9, 'B2003', 'Tinta ', 6, '', 'lab rpl', '2020-06-23');

--
-- Trigger `tb_bahankeluar`
--
DELIMITER $$
CREATE TRIGGER `insert` AFTER INSERT ON `tb_bahankeluar` FOR EACH ROW BEGIN
     UPDATE tb_bahanmasuk SET jumlah=jumlah-NEW.jumlah
 WHERE kode_barang=NEW.kode_barang;
 DELETE FROM tb_bahanmasuk WHERE jumlah = 0;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update` AFTER UPDATE ON `tb_bahankeluar` FOR EACH ROW BEGIN
     UPDATE tb_bahanmasuk SET jumlah=jumlah-NEW.jumlah
 WHERE kode_barang=NEW.kode_barang;
 DELETE FROM tb_bahanmasuk WHERE jumlah = 0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bahanmasuk`
--

CREATE TABLE `tb_bahanmasuk` (
  `id_bahanmasuk` int(11) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `asal_barang` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bahanmasuk`
--

INSERT INTO `tb_bahanmasuk` (`id_bahanmasuk`, `kode_barang`, `nama_barang`, `jumlah`, `asal_barang`, `tanggal_masuk`) VALUES
(8, 'B2002', 'Bulpoin', '-6', 'kasubag umum', '2020-06-23'),
(9, 'B2003', 'Tinta  spidol', '6 pack', 'kasubag umum', '2020-06-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_carousel`
--

CREATE TABLE `tb_carousel` (
  `id_carousel` int(11) NOT NULL,
  `nama_carousel` varchar(25) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_carousel`
--

INSERT INTO `tb_carousel` (`id_carousel`, `nama_carousel`, `gambar`) VALUES
(15, 'Kegiatan Biro sistem info', 'IMG-20171108-WA0036.jpg'),
(16, 'Jurusan Teknologi Informa', '20180410_093552.jpg'),
(18, 'Laboratorium RPL', 'lab_rpl.jpg'),
(19, 'Laboratorium Kkomputer', 'lab.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `praktikum` varchar(100) NOT NULL,
  `hari_waktu` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `praktikum`, `hari_waktu`, `tanggal`) VALUES
(2, 'Pemrograman Web', 'Senin, pukul 13.00 - 16.00 WIB', '2020-07-06'),
(3, 'Basis Data', 'Selasa, pukul 07.00 - 09.00 WIB', '2020-07-04'),
(4, 'Sistem Operasi', 'Rabu, pukul 12.00 - 15.00 WIB', '2020-07-04'),
(5, 'Algoritma dan Pemrograman', 'Kamis, pukul 08.00 - 10.00 WIB', '2020-07-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_modul_praktikum`
--

CREATE TABLE `tb_modul_praktikum` (
  `id_modul` int(11) NOT NULL,
  `nama_modul` varchar(30) NOT NULL,
  `document` varchar(200) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `downloaded` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_modul_praktikum`
--

INSERT INTO `tb_modul_praktikum` (`id_modul`, `nama_modul`, `document`, `prodi`, `tahun`, `semester`, `downloaded`) VALUES
(13, 'Proyek sistem informasi', 'Human_Resource_Management1.pdf', 'Manajemen Informatika', '2017', 'Genap', 6),
(14, 'Android Studio', 'BKPM_Aplikasi_Mobile.pdf', 'Manajemen Informatika', '2016', 'Genap', 0),
(15, 'Dasar Manajemen', 'MANAJEMEN_DAN_ORGANISASI.ppt', 'Manajemen Informatika', '2016', 'Genap', 2),
(17, 'Pemrograman Framwork', 'BKPM_Web_Framework.pdf', 'Manajemen Informatika', '2017', 'Genap', 0),
(18, 'Manajemen Basis Data', 'Modul_Basis_Data_0.pdf', 'Manajemen Informatika', '2017', 'Genap', 6),
(19, 'Android Studio', 'BKPM_Aplikasi_Mobile1.pdf', 'Teknik Informatika', '2018', 'Ganjil', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spesifikasi`
--

CREATE TABLE `tb_spesifikasi` (
  `id_spesifikasi` int(11) NOT NULL,
  `spesifikasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_spesifikasi`
--

INSERT INTO `tb_spesifikasi` (`id_spesifikasi`, `spesifikasi`) VALUES
(1, 'Dell Vostro'),
(2, 'Kasugawa 500VA'),
(3, 'Thosiba 2GB'),
(4, 'Lenovo 4GB'),
(5, 'Acer 4GB'),
(6, 'THOSIBA 4GB'),
(7, 'Sony');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `nama` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses`, `nama`) VALUES
(1, 'admin', '6ad4664ba23eac71b5ef5e826ea0c6cd', 'admin', 'Hadi'),
(3, 'kalab', '966676a567d83cf0fbeb8cd5c280a589', 'kalab', 'Kepala Laboratorium'),
(5, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'Fatimah'),
(6, 'e31171151', 'ed82b259b14d934974ae1e713786868d', 'user', 'Umik'),
(7, 'e31171224', 'ed82b259b14d934974ae1e713786868d', 'user', 'Syafrial'),
(8, 'e31171096', 'ed82b259b14d934974ae1e713786868d', 'user', 'Dima Pinteen'),
(9, 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', 'user', 'Wahyu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tb_alat`
--
ALTER TABLE `tb_alat`
  ADD PRIMARY KEY (`id_alat`),
  ADD KEY `id_spesifikasi` (`id_spesifikasi`),
  ADD KEY `id_kondisi` (`id_kondisi`);

--
-- Indexes for table `tb_alatkeluar`
--
ALTER TABLE `tb_alatkeluar`
  ADD PRIMARY KEY (`id_alatkeluar`),
  ADD KEY `id_spesifikasi` (`id_spesifikasi`),
  ADD KEY `id_kondisi` (`id_kondisi`);

--
-- Indexes for table `tb_alatmasuk`
--
ALTER TABLE `tb_alatmasuk`
  ADD PRIMARY KEY (`id_alatmasuk`),
  ADD KEY `id_spesifikasi` (`id_spesifikasi`),
  ADD KEY `id_kondisi` (`id_kondisi`);

--
-- Indexes for table `tb_bahan`
--
ALTER TABLE `tb_bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `tb_bahankeluar`
--
ALTER TABLE `tb_bahankeluar`
  ADD PRIMARY KEY (`id_bahankeluar`);

--
-- Indexes for table `tb_bahanmasuk`
--
ALTER TABLE `tb_bahanmasuk`
  ADD PRIMARY KEY (`id_bahanmasuk`);

--
-- Indexes for table `tb_carousel`
--
ALTER TABLE `tb_carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tb_modul_praktikum`
--
ALTER TABLE `tb_modul_praktikum`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `tb_spesifikasi`
--
ALTER TABLE `tb_spesifikasi`
  ADD PRIMARY KEY (`id_spesifikasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_alat`
--
ALTER TABLE `tb_alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_alatkeluar`
--
ALTER TABLE `tb_alatkeluar`
  MODIFY `id_alatkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_alatmasuk`
--
ALTER TABLE `tb_alatmasuk`
  MODIFY `id_alatmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_bahan`
--
ALTER TABLE `tb_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_bahankeluar`
--
ALTER TABLE `tb_bahankeluar`
  MODIFY `id_bahankeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_bahanmasuk`
--
ALTER TABLE `tb_bahanmasuk`
  MODIFY `id_bahanmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_carousel`
--
ALTER TABLE `tb_carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_modul_praktikum`
--
ALTER TABLE `tb_modul_praktikum`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_spesifikasi`
--
ALTER TABLE `tb_spesifikasi`
  MODIFY `id_spesifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_alat`
--
ALTER TABLE `tb_alat`
  ADD CONSTRAINT `tb_alat_ibfk_1` FOREIGN KEY (`id_spesifikasi`) REFERENCES `tb_spesifikasi` (`id_spesifikasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_alat_ibk_2` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi_barang` (`id_kondisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_alatkeluar`
--
ALTER TABLE `tb_alatkeluar`
  ADD CONSTRAINT `tb_alatkeluar_ibfk_1` FOREIGN KEY (`id_spesifikasi`) REFERENCES `tb_spesifikasi` (`id_spesifikasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_alatkeluar_ibfk_2` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi_barang` (`id_kondisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_alatmasuk`
--
ALTER TABLE `tb_alatmasuk`
  ADD CONSTRAINT `tb_alatmasuk_ibfk_1` FOREIGN KEY (`id_spesifikasi`) REFERENCES `tb_spesifikasi` (`id_spesifikasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_alatmasuk_ibfk_2` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi_barang` (`id_kondisi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
