-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 07:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_akunmhs` int(11) NOT NULL,
  `status_kehadiran` enum('Hadir','Izin','Sakit','Dispen') NOT NULL,
  `jam_masuk` time(6) NOT NULL,
  `id_jadwal` varchar(11) NOT NULL,
  `id_sesi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_akunmhs`, `status_kehadiran`, `jam_masuk`, `id_jadwal`, `id_sesi`) VALUES
(1, 1, 'Hadir', '09:20:15.000000', '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id_admin` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `last_login` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id_admin`, `nim`, `nama`, `email`, `password`, `last_login`) VALUES
(1001, 216151001, 'Irfan Noor Hidayat', 'irfannoorh@gmail.com', '$2y$10$0nILSA/CWZ7AwFUHcgf2E.6k0qgnvz2kHQ0qIzIBvsvbj.FEicn2S', '2023-06-13 14:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `akun_mahasiswa`
--

CREATE TABLE `akun_mahasiswa` (
  `id_akun` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_mahasiswa`
--

INSERT INTO `akun_mahasiswa` (`id_akun`, `nim`, `email`, `username`, `password`) VALUES
(1, 216151001, 'irfannoorh@gmail.com', 'irfannoorh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `kode_dosen` varchar(3) DEFAULT NULL,
  `nipn` varchar(30) DEFAULT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`kode_dosen`, `nipn`, `nama_dosen`, `nohp`) VALUES
('MFA', '19760116 200112 1 003', 'M. Farman Andrijasa, S.Kom., M.Kom.', '0811557369'),
('IRW', '19771123 200212 1 003', 'Irwansyah, S.Kom, M.Cs', '081349613941'),
('DNC', '19800704 200604 1 002', 'Damar Nucahyono, ST., M.Eng.', '081229504888'),
('ARH', '19750506 200812 1 003', 'Ahmad Rofiq Hakim, S.Pd., M.Kom.', '081347236063'),
('NAH', '19750301 200801 1 014', 'Noor Alam Hadiwijaya, ST,.M.Cs.', '082157147850'),
('BBG', '19870218 201903 1 006', 'Bambang Cahyono, S.Pd., M.Kom', '085250675384'),
('ATY', '19690828 200501 1 002', 'Agus Triyono, ST, MT', '081234564808'),
('FRM', '19870308 200801 1 002', 'Farindika Metandi, BCompSc., MM., M.Cs.', '085246023808'),
('ASR', '19700809 199903 1 001', 'Ansar Rizal, ST., M.Kom', '08125381942'),
('RHO', '19780823 200312 1 001', 'Rheo Malani, S.Kom, M.Kom', '08125843149'),
('ABW', '19830120 200801 1 006', 'Arief Bramanto Wicaksono Putra, S.ST., MT', '081347023452'),
('AGW', '19810805 200501 1 003', 'Agusma Wajiansyah, SST., MT.', '081350092747'),
('MUL', '19750213 200801 1 007', 'Mulyanto, S.Kom., M.Cs', '082158874786'),
('AFO', '19691023 199802 1 001', 'Achmad Fanany Onnilita Gaffar, ST., MT.', '08125823062'),
('ATP', '19730614 200112 1 003', 'Anton Topadang, S.Kom., M.Cs.', '081392407411'),
('AAG', '19800322 200212 2 001', 'Asrina Astagani, ST., MT, ', '081355330010'),
('BDY', '19781210 200212 2 011', 'Bedi Suprapty, S.Kom., M.Kom.', '081254712330'),
('DSB', '19661109 199103 1 004', 'Didi Susilo Budi Utomo, ST., M.Sc', '082255586124'),
('HRP', '19730106 200212 1 003', 'Hari  Purwadi, ST., MT .', '0816213943'),
('KBU', '19760112 200212 1 001', 'Karyo Budi Utomo, S.Kom., M.Eng.', '08125486335'),
('MZR', '19790412 200501 1 002', 'M. Zainul Rohman, SST., MT. ', '081255550523'),
('RHT', '19711205 200312 1 001', 'Rihartanto, ST.', '081347508808'),
('SPR', '19760427 200501 1 001', 'Supriadi, SST., MT. ', '081347543575'),
('TIN', '19800816 200312 2 002', 'Tien Rahayu Tulili, ST. ,M.Tech.', '08125443303'),
('TMB', '19711127 200112 1 001', 'Tommy Bustomi, S.Kom., M.Kom.', '0811589559'),
('YSN', '19760619 200212 2 005', 'Yusni Nyura, S.Kom., M.Kom', '081350431910'),
('WES', '19910205 202012 2 003', 'Wahyuni Eka Sari, S.Kom., M.Eng', '085250433530'),
('AGD', '19910813 202012 1 004', 'Agusdi Syafrizal,S.Kom.,M.T', '082176766686'),
('SBN', '19880302 202203 1 003', 'Subhan Hartanto, M.Kom', '081274135165'),
('IRN', '19841231 200910 1 003', 'Irwan', '081253989879'),
('SSN', '19770427 200112 2 003', 'Susanna, S.Kom, M. Eng', '081347911525'),
('DDY', '19880515 200101 1 004', 'Dedi Hariyadi, S.Kom', '085250927152'),
('NZR', '19851101 201404 1 001', 'Rachmat Nazar, A.Md', '081350842211');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(11) NOT NULL,
  `id_matkul` varchar(11) NOT NULL,
  `hari` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `mulai` time(6) NOT NULL,
  `akhir` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_matkul`, `hari`, `mulai`, `akhir`) VALUES
('1', 'TEO-STAPOB', 'Monday', '16:50:00.000000', '18:30:00.000000'),
('10', 'PRA-DPWEB', 'Wednesday', '16:50:00.000000', '22:30:00.000000'),
('2', 'TEO-KEJAR', 'Tuesday', '07:30:00.000000', '09:10:00.000000'),
('3', 'PRA-KEJAR', 'Tuesday', '09:10:00.000000', '13:15:00.000000'),
('4', 'TEO-DATING', 'Tuesday', '13:15:00.000000', '14:55:00.000000'),
('5', 'PRA-DATING', 'Tuesday', '14:55:00.000000', '20:50:00.000000'),
('6', 'TEO-BASING', 'Tuesday', '20:50:00.000000', '22:30:00.000000'),
('7', 'TEO-DSP', 'Wednesday', '07:30:00.000000', '09:10:00.000000'),
('8', 'PRA-DSP', 'Wednesday', '09:10:00.000000', '14:55:00.000000'),
('9', 'TEO-DPWEB', 'Wednesday', '14:55:00.000000', '16:50:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `log_absensi`
--

CREATE TABLE `log_absensi` (
  `id_absensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_absensi`
--

INSERT INTO `log_absensi` (`id_absensi`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `log_sesi`
--

CREATE TABLE `log_sesi` (
  `id_sesi` int(11) NOT NULL,
  `tanggal_sesi` datetime NOT NULL,
  `id_matkul` varchar(11) NOT NULL,
  `kode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_sesi`
--

INSERT INTO `log_sesi` (`id_sesi`, `tanggal_sesi`, `id_matkul`, `kode`) VALUES
(1, '2023-05-30 09:20:53', 'TEO-BASING', 'jsbciher fhcervifq3hvkeyyd ihe');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nomor_absen` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jeniskelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nomor_absen`, `nama`, `jeniskelamin`, `foto`) VALUES
(216151001, 1, 'Irfan Noor Hidayat', 'Laki-laki', 'placeholder.jpg'),
(216151004, 2, 'Nurul Muhlisa', 'Perempuan', 'placeholder.jpg'),
(216151005, 3, 'Niken Aguilera', 'Perempuan', 'placeholder.jpg'),
(216151006, 4, 'Dwi Rahma Ariati', 'Perempuan', 'placeholder.jpg'),
(216151007, 5, 'Muhammad Fadillah Ramadhan', 'Laki-laki', 'placeholder.jpg'),
(216151009, 6, 'Muhammad Adrian Fahreza', 'Laki-laki', 'placeholder.jpg'),
(216151010, 7, 'Dany Adrian Leda', 'Laki-laki', 'placeholder.jpg'),
(216151011, 8, 'Salsabila Nur Cahya', 'Perempuan', 'placeholder.jpg'),
(216151012, 9, 'Wisnu Septian Indriyatno', 'Laki-laki', 'placeholder.jpg'),
(216151013, 10, 'Sri Wulandari', 'Perempuan', 'placeholder.jpg'),
(216151014, 11, 'Anis Fida Rahmawati', 'Perempuan', 'placeholder.jpg'),
(216151015, 12, 'Ibnu Syamsi Mustofani', 'Laki-laki', 'placeholder.jpg'),
(216151016, 13, 'Firja Anani', 'Laki-laki', 'placeholder.jpg'),
(216151017, 14, 'Bagas Arya Pratama', 'Laki-laki', 'placeholder.jpg'),
(216151018, 15, 'Andi Surya Alhadi Labolo', 'Laki-laki', 'placeholder.jpg'),
(216151019, 16, 'Tio Faturrahman Fiqri', 'Laki-laki', 'placeholder.jpg'),
(216151020, 17, 'Hanna Nur Sadifa', 'Perempuan', 'placeholder.jpg'),
(216151021, 18, 'Niken Ayu Kusuma Putri', 'Perempuan', 'placeholder.jpg'),
(216151023, 19, 'Sri Ajeng Kartika', 'Perempuan', 'placeholder.jpg'),
(216151024, 20, 'Zidane Abbas Mallaniung', 'Laki-laki', 'placeholder.jpg'),
(216151025, 21, 'Yolanda Septiani', 'Perempuan', 'placeholder.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` varchar(11) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `jenis_matkul` enum('Praktik','Teori') NOT NULL,
  `id_dosen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`, `jenis_matkul`, `id_dosen`) VALUES
('PRA-DATING', 'Praktik Basis Data Tingkat Lanjut', 'Praktik', 'NAH'),
('PRA-DPWEB', 'Praktik Desain & Pemrograman Web', 'Praktik', 'RHO'),
('PRA-DSP', 'Praktik Digital Signal Processing (DSP)', 'Praktik', 'ABW'),
('PRA-KEJAR', 'Praktik Keamanan Data & Jaringan', 'Praktik', 'ABW'),
('TEO-BASING', 'Bahasa Inggris (English for Scientific Purpose)', 'Teori', 'ABW'),
('TEO-DATING', 'Basis Data Tingkat Lanjut', 'Teori', 'NAH'),
('TEO-DPWEB', 'Desain & Pemrograman Web', 'Teori', 'RHO'),
('TEO-DSP', 'Digital Signal Processing (DSP)', 'Teori', 'ABW'),
('TEO-KEJAR', 'Keamanan Data & Jaringan', 'Teori', 'ABW'),
('TEO-STAPOB', 'Statistika & Probabilistik', 'Teori', 'MUL');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_06_15_055520_create_absensi_table', 0),
(2, '2023_06_15_055520_create_akun_admin_table', 0),
(3, '2023_06_15_055520_create_akun_mahasiswa_table', 0),
(4, '2023_06_15_055520_create_dosen_table', 0),
(5, '2023_06_15_055520_create_jadwal_table', 0),
(6, '2023_06_15_055520_create_log_absensi_table', 0),
(7, '2023_06_15_055520_create_log_sesi_table', 0),
(8, '2023_06_15_055520_create_mahasiswa_table', 0),
(9, '2023_06_15_055520_create_matkul_table', 0),
(10, '2023_06_15_055520_create_rekapan_sementara_table', 0),
(11, '2023_06_15_055520_create_rekapan_tetap_table', 0),
(12, '2023_06_15_055523_add_foreign_keys_to_absensi_table', 0),
(13, '2023_06_15_055523_add_foreign_keys_to_akun_admin_table', 0),
(14, '2023_06_15_055523_add_foreign_keys_to_akun_mahasiswa_table', 0),
(15, '2023_06_15_055523_add_foreign_keys_to_jadwal_table', 0),
(16, '2023_06_15_055523_add_foreign_keys_to_log_absensi_table', 0),
(17, '2023_06_15_055523_add_foreign_keys_to_log_sesi_table', 0),
(18, '2023_06_15_055523_add_foreign_keys_to_matkul_table', 0),
(19, '2023_06_15_055523_add_foreign_keys_to_rekapan_sementara_table', 0),
(20, '2023_06_15_055523_add_foreign_keys_to_rekapan_tetap_table', 0),
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(29, '2023_06_15_061526_create_users_table', 1),
(30, '2023_06_15_061529_add_foreign_keys_to_users_table', 1),
(31, '2023_06_15_073116_create_users_table', 2),
(32, '2023_06_15_073119_add_foreign_keys_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekapan_sementara`
--

CREATE TABLE `rekapan_sementara` (
  `id_rekap` int(11) NOT NULL,
  `id_matkul` varchar(11) NOT NULL,
  `tanggal_rekapan_dibuat` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekapan_sementara`
--

INSERT INTO `rekapan_sementara` (`id_rekap`, `id_matkul`, `tanggal_rekapan_dibuat`, `status`) VALUES
(1, 'TEO-BASING', '2023-05-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rekapan_tetap`
--

CREATE TABLE `rekapan_tetap` (
  `id_rekap` int(11) NOT NULL,
  `id_matkul` varchar(11) NOT NULL,
  `tanggal_rekapan_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekapan_tetap`
--

INSERT INTO `rekapan_tetap` (`id_rekap`, `id_matkul`, `tanggal_rekapan_dibuat`) VALUES
(1, 'TEO-BASING', '2023-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `roles` enum('Admin-Mahasiswa','Mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login`, `roles`) VALUES
(1005, 216151001, 'Irfan Noor Hidayat', 'irfannoorh@gmail.com', NULL, '$2y$10$yXaXXBlcgyW5OJtxaDeq1.RSHcaboHLeybegJv8Oy8737RHPLvAWq', NULL, '2023-06-19 19:43:40', '2023-06-20 03:52:13', '20-06-23 11:52:13', 'Admin-Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_matkul` (`id_jadwal`),
  ADD KEY `akunmhs` (`id_akunmhs`),
  ADD KEY `sesiabsen` (`id_sesi`);

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id_admin`) USING BTREE,
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `akun_mahasiswa`
--
ALTER TABLE `akun_mahasiswa`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `nim_akunmhs` (`nim`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD KEY `kode_dosen` (`kode_dosen`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `idmatkul` (`id_matkul`);

--
-- Indexes for table `log_absensi`
--
ALTER TABLE `log_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `log_sesi`
--
ALTER TABLE `log_sesi`
  ADD PRIMARY KEY (`id_sesi`),
  ADD KEY `nomor_matkul` (`id_matkul`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `kode_dosen` (`id_dosen`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekapan_sementara`
--
ALTER TABLE `rekapan_sementara`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `idmatkulrekapan` (`id_matkul`);

--
-- Indexes for table `rekapan_tetap`
--
ALTER TABLE `rekapan_tetap`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_matkul_rekaptetap` (`id_matkul`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `nimmhsadmin` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_sesi`
--
ALTER TABLE `log_sesi`
  MODIFY `id_sesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekapan_sementara`
--
ALTER TABLE `rekapan_sementara`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `akunmhs` FOREIGN KEY (`id_akunmhs`) REFERENCES `akun_mahasiswa` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sesiabsen` FOREIGN KEY (`id_sesi`) REFERENCES `log_sesi` (`id_sesi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD CONSTRAINT `nim` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akun_mahasiswa`
--
ALTER TABLE `akun_mahasiswa`
  ADD CONSTRAINT `nim_akunmhs` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `idmatkul` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log_absensi`
--
ALTER TABLE `log_absensi`
  ADD CONSTRAINT `id_absensi_log` FOREIGN KEY (`id_absensi`) REFERENCES `absensi` (`id_absensi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log_sesi`
--
ALTER TABLE `log_sesi`
  ADD CONSTRAINT `nomor_matkul` FOREIGN KEY (`id_matkul`) REFERENCES `jadwal` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `kode_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`kode_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekapan_sementara`
--
ALTER TABLE `rekapan_sementara`
  ADD CONSTRAINT `idmatkulrekapan` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekapan_tetap`
--
ALTER TABLE `rekapan_tetap`
  ADD CONSTRAINT `id_matkul_rekaptetap` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `nimmhsadmin` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
