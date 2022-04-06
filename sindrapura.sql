-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Mar 2022 pada 09.36
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sindrapura`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `role` enum('Pimpinan','Admin') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `id_penduduk`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pimpinan', '2022-03-13 03:05:02', '2022-03-13 11:01:04'),
(4, 5, 'Admin', '2022-03-14 23:20:27', '2022-03-14 23:20:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantuan`
--

CREATE TABLE `bantuan` (
  `id` int(11) NOT NULL,
  `nama_bantuan` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `kuota_penerima` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bantuan`
--

INSERT INTO `bantuan` (`id`, `nama_bantuan`, `keterangan`, `kuota_penerima`, `created_at`, `updated_at`) VALUES
(2, 'Bansos', 'Lorem ipsum dolor sit amet consectetur adispicing elit', 50, '2022-03-11 16:21:09', '2022-03-11 20:48:31'),
(3, 'Anak Yatim', 'Consectetur impedit', 50, '2022-03-11 16:23:26', '2022-03-11 20:49:13'),
(6, 'Molestias vel ut ame', 'Ullamco est asperior', 74, '2022-03-11 20:13:08', '2022-03-12 03:41:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nagari`
--

CREATE TABLE `nagari` (
  `id` int(11) NOT NULL,
  `nagari` varchar(100) NOT NULL,
  `id_pimpinan` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nagari`
--

INSERT INTO `nagari` (`id`, `nagari`, `id_pimpinan`, `visi`, `misi`, `foto`, `logo`, `keterangan`, `email`, `telp`, `created_at`, `updated_at`) VALUES
(1, 'Inderapura Barat', 3, 'The collapse JavaScript plugin is used to show and hide content. Buttons or anchors are used as triggers that are mapped to specific elements you toggle. Collapsing an element will animate the height from it’s current value to 0. Given how CSS handles animations, you cannot use padding on a .collapse element. Instead, use the class as an independent wrapping element.', 'A <button> or <a> can show and hide multiple elements by referencing them with a JQuery selector in its href or data-target attribute. Multiple <button> or <a> can show and hide an element if they each reference it with their href or data-target attribute\r\n\r\nNote that Bootstrap’s current implementation does not cover the various keyboard interactions described in the WAI-ARIA Authoring Practices 1.1 accordion pattern - you will need to include these yourself with custom JavaScript.', '1647233973100.foto.jpg', '164723397399.logo.png', 'Be sure to add aria-expanded to the control element. This attribute explicitly conveys the current state of the collapsible element tied to the control to screen readers and similar assistive technologies. If the collapsible element is closed by default, the attribute on the control element should have a value of aria-expanded=\"false\". If you’ve set the collapsible element to be open by default using the show class, set aria-expanded=\"true\" on the control instead. The plugin will automatically toggle this attribute on the control based on whether or not the collapsible element has been opened or closed (via JavaScript, or because the user triggered another control element also tied to the same collapsbile element). If the control element’s HTML element is not a button (e.g., an <a> or <div>), the attribute role=\"button\" should be added to the element.\r\n\r\nIf your control element is targeting a single collapsible element – i.e. the data-target attribute is pointing to an id selector – you should add the aria-controls attribute to the control element, containing the id of the collapsible element. Modern screen readers and similar assistive technologies make use of this attribute to provide users with additional shortcuts to navigate directly to the collapsible element itself.', 'dummy@yahoo.co.id', '0752 7754 151', '2022-03-13 18:01:38', '2022-03-14 00:53:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(15) NOT NULL,
  `alamat` text DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `stts_perkawinan` varchar(20) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `nik`, `nama`, `password`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `pekerjaan`, `stts_perkawinan`, `pendidikan`, `nohp`, `foto`, `created_at`, `updated_at`) VALUES
(1, '1234567891234567', 'Arrura', '$2y$10$faDDIVb5d/PWGmJpx2a.g.uLN//JnyFKEEuTZRpHijl..cxB8xaGy', 'Payakumbuh', '2000-03-16', 'Perempuan', 'Komplek SAHARA, Kab. 50 Kota', 'Freelancer', 'Belum Kawin', 'Kuliah', '6283899196999', '1647103112100.IMG_20211103_220824.jpg', '2022-03-12 02:55:14', '2022-03-12 09:38:32'),
(3, '1111222233334444', 'Normal People', '$2y$10$.sVeRQ4Stkm/D.gMWRl2ge4LqiFZ3hrLvDlOgFCuFtOWxZLALCx7G', 'Pekanbaru', '1995-09-24', 'Perempuan', 'Pekanbaru', 'Tenaga Pendidik', 'Belum Kawin', 'Kuliah', '083899196999', '164732955799.SKY_20200520_233953_6800348646811846239.jpg', '2022-03-12 11:07:03', '2022-03-15 00:42:01'),
(4, '2345983432947192', 'Quidem tempor velit', '$2y$10$cJ0JWM.7Edsgbmvdv50wseYRUcu4QAGFcHKz55bvirdlpXQn34Sm2', 'Ipsa aut expedita e', '2012-05-01', 'Perempuan', 'Sint esse ut ipsum', 'Repellendus Eiusmod', 'Belum Kawin', 'Kuliah', '234567899678', '1647108466100.IMG_20210307_180043.jpg', '2022-03-12 11:07:46', '2022-03-12 11:07:46'),
(5, '1234567812345678', 'Admin', '$2y$10$Mhm0UDMLeO5UHWaNuGyYr.k.k7f36aW5hTVi1cI9Kubs7aRnPzovq', 'Padang', '2000-04-21', 'Laki-laki', 'Padang', NULL, 'Belum Kawin', 'Kuliah', '34567987575', '1647194356100.IMG_20201103_154552.jpg', '2022-03-13 10:59:16', '2022-03-13 10:59:16'),
(6, '11111111122222222', 'Arga Zulsilfa', '$2y$10$WbYw3h2pda/CtzqFPB0Eh.vclUv.TQz3Uw27OkF6bzWlwUBBj5Fsa', 'Palembang', '2000-01-13', 'Laki-laki', NULL, NULL, 'Belum Kawin', 'Kuliah', '775667586907', NULL, '2022-03-15 01:15:12', '2022-03-15 01:15:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_bantuan`
--

CREATE TABLE `penerima_bantuan` (
  `id` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `id_bantuan` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerima_bantuan`
--

INSERT INTO `penerima_bantuan` (`id`, `id_penduduk`, `id_bantuan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available', '2022-03-12 11:33:02', '2022-03-12 11:49:00'),
(4, 4, 6, 'Qui culpa rem lauda', '2022-03-12 21:07:39', '2022-03-12 21:07:39'),
(5, 4, 2, 'Ut mollitia pariatur', '2022-03-12 21:07:47', '2022-03-12 21:07:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perangkat`
--

CREATE TABLE `perangkat` (
  `id` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `mulai_tugas` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perangkat`
--

INSERT INTO `perangkat` (`id`, `id_penduduk`, `jabatan`, `mulai_tugas`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sekretaris I', '2018-02-06', 'Aktif', '2022-03-12 19:21:49', '2022-03-12 19:21:49'),
(2, 4, 'Bendahara II', '1973-03-01', 'Tidak Aktif', '2022-03-12 19:31:55', '2022-03-12 19:31:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nagari`
--
ALTER TABLE `nagari`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerima_bantuan`
--
ALTER TABLE `penerima_bantuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perangkat`
--
ALTER TABLE `perangkat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `nagari`
--
ALTER TABLE `nagari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `penerima_bantuan`
--
ALTER TABLE `penerima_bantuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `perangkat`
--
ALTER TABLE `perangkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
