-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 05:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sertifikasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `nama_acara` varchar(255) NOT NULL,
  `deskripsi_acara` text NOT NULL,
  `id_kategori_acara` int(11) NOT NULL,
  `pendaftaran_buka` date NOT NULL,
  `pendaftaran_tutup` date NOT NULL,
  `pelaksanaan_buka` date NOT NULL,
  `pelaksanaan_tutup` date NOT NULL,
  `lokasi_acara` varchar(255) NOT NULL,
  `biaya_acara` float(16,2) NOT NULL,
  `kuota` int(11) NOT NULL,
  `id_status_acara` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `id_koordinator` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `is_valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katolik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `bap`
--

CREATE TABLE `bap` (
  `id_bap` int(11) NOT NULL,
  `id_jadwal_acara` int(11) NOT NULL,
  `total_peserta` int(11) NOT NULL,
  `total_kehadiran` int(11) NOT NULL,
  `total_izin` int(11) NOT NULL,
  `tanpa_keterangan` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `waktu_post` datetime NOT NULL DEFAULT current_timestamp(),
  `terakhir_diubah` datetime NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi`, `penulis`, `waktu_post`, `terakhir_diubah`, `thumbnail`) VALUES
(1, 'Ever too late to lose weight?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-22 00:00:00', '2021-03-31 00:00:00', 'post6.jpg'),
(2, 'Make your fitness Boost with us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-30 00:00:00', '2021-03-31 00:00:00', 'post1.jpg'),
(3, 'Ethernity beauty health diet plan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-25 00:00:00', '2021-03-25 00:00:00', 'post2.jpg'),
(4, 'Ever too late to lose weight?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-08 00:00:00', '2021-03-31 00:00:00', 'post3.jpg'),
(5, 'Make your fitness Boost with us', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-27 00:00:00', '2021-03-18 00:00:00', 'post4.jpg'),
(6, 'Ethernity beauty health diet plan', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, minima.</p>\r\n', 'john stain', '2021-03-19 00:00:00', '2021-03-31 00:00:00', 'post5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_user_from` int(11) NOT NULL,
  `id_user_to` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `is_read` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_dosen` varchar(10) NOT NULL,
  `nidn` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_acara`
--

CREATE TABLE `jadwal_acara` (
  `id_jadwal_acara` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `id_instruktur` int(11) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `ruangan` varchar(128) NOT NULL,
  `materi` varchar(128) NOT NULL,
  `tanggal_acara` date NOT NULL,
  `waktu_dimulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `id_status_acara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_acara`
--

CREATE TABLE `kategori_acara` (
  `id_kategori_acara` int(11) NOT NULL,
  `kategori_acara` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_acara`
--

INSERT INTO `kategori_acara` (`id_kategori_acara`, `kategori_acara`) VALUES
(1, 'Sertifikasi'),
(2, 'Pelatihan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_notifikasi`
--

CREATE TABLE `kategori_notifikasi` (
  `id_kategori_notifikasi` int(11) NOT NULL,
  `kategori_notifikasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_notifikasi`
--

INSERT INTO `kategori_notifikasi` (`id_kategori_notifikasi`, `kategori_notifikasi`) VALUES
(1, 'Notifikasi'),
(2, 'Pendaftaran Baru'),
(3, 'Konfirmasi Pembayaran'),
(4, 'Status Approval'),
(5, 'Sertifikat Selesai'),
(6, 'Berita Baru'),
(7, 'Chat');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
(1, 'D3SI-43-01'),
(2, 'D3SI-43-02'),
(3, 'D3SI-43-03'),
(4, 'D3SI-43-04'),
(5, 'D3SI-44-01'),
(6, 'D3SI-44-02'),
(7, 'D3SI-44-03'),
(8, 'D3SI-44-04'),
(9, 'D3SI-45-01'),
(10, 'D3SI-45-02'),
(11, 'D3SI-45-03'),
(12, 'D3SI-45-04');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_berita`
--

CREATE TABLE `komentar_berita` (
  `id_komentar_berita` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `like_berita`
--

CREATE TABLE `like_berita` (
  `id_like_berita` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_like` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori_notifikasi` int(11) NOT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `waktu_notifikasi` datetime NOT NULL,
  `subjek` varchar(128) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL,
  `id_creator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `id_rekening_tujuan` int(11) NOT NULL,
  `rekening_pengirim` varchar(128) NOT NULL,
  `bank_pengirim` varchar(100) NOT NULL,
  `nama_pengirim` varchar(128) NOT NULL,
  `waktu_transfer` datetime NOT NULL,
  `nominal_transfer` float(14,2) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `is_valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `kode_peserta` varchar(128) NOT NULL,
  `tagihan` float(16,2) NOT NULL,
  `id_status_peserta` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `last_updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `bank`, `no_rekening`, `atas_nama`, `email`) VALUES
(1, 'Mandiri', '1234567890', 'Nadila Rahmatika', 'nadila@gmail.com'),
(2, 'BNI', '0987654321', 'M. Rayhan Hafidz Siregar', 'rayhan@gmail.com'),
(3, 'BCA', '123120491023', 'Nuriffah Syahirah', 'ipeh@gmail.com'),
(4, 'BRI', '0128102380912', 'Andini Septia', 'andini@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `role_advance_access`
--

CREATE TABLE `role_advance_access` (
  `id_role_advance_access` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_user_role_advance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nilai` double(5,2) NOT NULL,
  `sertifikat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `share_berita`
--

CREATE TABLE `share_berita` (
  `id_share_berita` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_acara`
--

CREATE TABLE `status_acara` (
  `id_status_acara` int(11) NOT NULL,
  `status_acara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_acara`
--

INSERT INTO `status_acara` (`id_status_acara`, `status_acara`) VALUES
(1, 'Akan dibuka'),
(2, 'Pendaftaran dibuka'),
(3, 'Pelatihan dibatalkan'),
(4, 'Pelatihan diundur'),
(5, 'Pendaftaran ditutup'),
(6, 'Sedang berlangsung'),
(7, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `status_jadwal`
--

CREATE TABLE `status_jadwal` (
  `id_status_jadwal` int(11) NOT NULL,
  `status_jadwal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_jadwal`
--

INSERT INTO `status_jadwal` (`id_status_jadwal`, `status_jadwal`) VALUES
(1, 'Akan dilaksanakan'),
(2, 'Terlaksana'),
(3, 'Tidak Terlaksana (diundur/dimajukan)'),
(4, 'Tidak Terlaksana (dibatalkan/ditiadakan)');

-- --------------------------------------------------------

--
-- Table structure for table `status_peserta`
--

CREATE TABLE `status_peserta` (
  `id_status_peserta` int(11) NOT NULL,
  `status_peserta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_peserta`
--

INSERT INTO `status_peserta` (`id_status_peserta`, `status_peserta`) VALUES
(1, 'Menunggu Persetujuan'),
(2, 'Ditolak'),
(3, 'Aktif /diterima'),
(4, 'Mengundurkan diri'),
(5, 'Diskualifikasi'),
(6, 'Lulus'),
(7, 'Tidak Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_telepon` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_agama` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `kata_sandi` varchar(256) NOT NULL,
  `id_user_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nomor_telepon`, `alamat`, `id_agama`, `foto`, `kata_sandi`, `id_user_role`, `is_active`, `date_created`) VALUES
(1, 'Muhammad Haitsam', 'haitsam03@gmail.com', 'Laki-laki', 'Madinah', '1999-02-18', '082117503126', 'Jl. Raya Cilamaya, Dusun Kedung Asem, Desa Mekarmaya, Kec. Cilamaya Wetan, Kab. Karawang - Prov. Jawa barat', 1, 'foto3.jpg', '$2y$10$nnK8yYq.2uviklFEBWaXJeYNiUqry476AnbQDAmTo6PoNtKWJGnSK', 0, 1, 1609656473);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(0, 'Developer'),
(1, 'Administrator'),
(2, 'Mahasiswa'),
(3, 'Dosen');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_advance`
--

CREATE TABLE `user_role_advance` (
  `id_user_role_advance` int(11) NOT NULL,
  `role_advance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role_advance`
--

INSERT INTO `user_role_advance` (`id_user_role_advance`, `role_advance`) VALUES
(0, 'None'),
(1, 'Kaprodi'),
(2, 'Koordinator'),
(3, 'Instruktur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `bap`
--
ALTER TABLE `bap`
  ADD PRIMARY KEY (`id_bap`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jadwal_acara`
--
ALTER TABLE `jadwal_acara`
  ADD PRIMARY KEY (`id_jadwal_acara`);

--
-- Indexes for table `kategori_acara`
--
ALTER TABLE `kategori_acara`
  ADD PRIMARY KEY (`id_kategori_acara`);

--
-- Indexes for table `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  ADD PRIMARY KEY (`id_kategori_notifikasi`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD PRIMARY KEY (`id_komentar_berita`);

--
-- Indexes for table `like_berita`
--
ALTER TABLE `like_berita`
  ADD PRIMARY KEY (`id_like_berita`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `role_advance_access`
--
ALTER TABLE `role_advance_access`
  ADD PRIMARY KEY (`id_role_advance_access`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indexes for table `share_berita`
--
ALTER TABLE `share_berita`
  ADD PRIMARY KEY (`id_share_berita`);

--
-- Indexes for table `status_acara`
--
ALTER TABLE `status_acara`
  ADD PRIMARY KEY (`id_status_acara`);

--
-- Indexes for table `status_jadwal`
--
ALTER TABLE `status_jadwal`
  ADD PRIMARY KEY (`id_status_jadwal`);

--
-- Indexes for table `status_peserta`
--
ALTER TABLE `status_peserta`
  ADD PRIMARY KEY (`id_status_peserta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_role_advance`
--
ALTER TABLE `user_role_advance`
  ADD PRIMARY KEY (`id_user_role_advance`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bap`
--
ALTER TABLE `bap`
  MODIFY `id_bap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_acara`
--
ALTER TABLE `jadwal_acara`
  MODIFY `id_jadwal_acara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_acara`
--
ALTER TABLE `kategori_acara`
  MODIFY `id_kategori_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  MODIFY `id_kategori_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  MODIFY `id_komentar_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like_berita`
--
ALTER TABLE `like_berita`
  MODIFY `id_like_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_advance_access`
--
ALTER TABLE `role_advance_access`
  MODIFY `id_role_advance_access` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `share_berita`
--
ALTER TABLE `share_berita`
  MODIFY `id_share_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_acara`
--
ALTER TABLE `status_acara`
  MODIFY `id_status_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status_jadwal`
--
ALTER TABLE `status_jadwal`
  MODIFY `id_status_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_peserta`
--
ALTER TABLE `status_peserta`
  MODIFY `id_status_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role_advance`
--
ALTER TABLE `user_role_advance`
  MODIFY `id_user_role_advance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
