-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2021 pada 06.33
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ponpes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `judul_berita` varchar(225) NOT NULL,
  `isi_berita` text NOT NULL,
  `foto_berita` varchar(225) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp(),
  `pengirim_berita` varchar(225) NOT NULL,
  `tampilkan_berita` int(11) NOT NULL,
  `views` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `id_kategori`, `id_program`, `judul_berita`, `isi_berita`, `foto_berita`, `tanggal_input`, `pengirim_berita`, `tampilkan_berita`, `views`) VALUES
(10, 4, 1, 'judul 1', 'abc def ghi jkl mno pqr stu vwx yz abc def ghi jkl mno pqr stu vwx yz abc def ghi jkl mno pqr stu vwx yz abc def ghi jkl mno pqr stu vwx yz abc def ghi jkl mno pqr stu vwx yz abc def ghi jkl mno pqr stu vwx yz abc def ghi jkl mno pqr stu vwx yz abc def ghi jkl mno pqr stu vwx yz', '1.png', '2021-03-09 22:28:57', 'rizki awaludin', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_brosur`
--

CREATE TABLE `tb_brosur` (
  `id_brosur` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `foto_brosur` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_eskul`
--

CREATE TABLE `tb_eskul` (
  `id_eskul` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `nama_eskul` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_eskul`
--

INSERT INTO `tb_eskul` (`id_eskul`, `id_program`, `nama_eskul`, `foto`, `keterangan`) VALUES
(4, 1, 'kegiatan 1', '1.png', 'ini kegiatan 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `nama_fasilitas` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id_fasilitas`, `id_program`, `nama_fasilitas`, `foto`, `keterangan`) VALUES
(7, 1, 'fasilitas 1', '1.png', 'ini fasilitas 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_foto` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_foto`, `id_program`, `foto`, `keterangan`) VALUES
(7, 1, '1.png', 'ini foto pertama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `nama_guru` varchar(225) NOT NULL,
  `foto_guru` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `mengajar_sejak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_informasi_website`
--

CREATE TABLE `tb_informasi_website` (
  `id` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `logo_website` varchar(225) NOT NULL,
  `moto` varchar(225) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_telepon` varchar(50) NOT NULL,
  `nomor_whatsapp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `background` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_informasi_website`
--

INSERT INTO `tb_informasi_website` (`id`, `id_program`, `nama_website`, `logo_website`, `moto`, `email`, `nomor_telepon`, `nomor_whatsapp`, `alamat`, `background`) VALUES
(1, 1, 'ASHIDDIQIYAH 10', 'logo_ponpes.png', 'Ponpesas', 'aas@sms.com', '1010101', '0101010', 'Jl. Mariwati No. 10 Km 8, Cikanyere, Sukaresmi, Cianjur, 43254.', 'mt.jpg'),
(2, 2, 'MA', 'WhatsApp_Image_2021-03-02_at_09_26_261.jpeg', 'apasi', 'asas@asas.assa', '120821', '12080821', 'ashjas', 'WhatsApp_Image_2021-02-24_at_15_01_30.jpeg'),
(3, 3, 'MTS', 'WhatsApp_Image_2021-03-02_at_09_26_262.jpeg', 'asdakjsd', 'ahsjhas@ajdgh.as', '876876', '8768768', 'hajshd', ''),
(4, 4, 'ma', 'logo_ponpes2.png', 'ajksd', 'ashdgjga@jhasgdhj.com', '019309183', '019809128', 'uahskjhas', 'logo_ponpes1.png'),
(5, 5, 'MI', 'WhatsApp_Image_2021-03-02_at_09_26_264.jpeg', 'ajkshjkds', 'rizkiawaludin323@gmail.com', '111', '11', 'gvhnb', ''),
(6, 6, 'PTQ', 'WhatsApp_Image_2021-03-02_at_09_26_263.jpeg', 'ajkshjkds', 'repnas@gmail.com', '1212', '1212', 'tgr', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_berita`
--

CREATE TABLE `tb_kategori_berita` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_berita`
--

INSERT INTO `tb_kategori_berita` (`id_kategori`, `kategori`) VALUES
(4, 'kerajinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `judul_prestasi` varchar(225) NOT NULL,
  `jenis_prestasi` varchar(100) NOT NULL,
  `nama_siswa` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_prestasi`
--

INSERT INTO `tb_prestasi` (`id_prestasi`, `id_program`, `judul_prestasi`, `jenis_prestasi`, `nama_siswa`, `foto`, `keterangan`) VALUES
(6, 1, 'balap karung', 'non akademik', 'siswa 1', '1.png', 'ini siswa 1 menang balap karung ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `profil_pengasuh` text NOT NULL,
  `foto_pengasuh` varchar(225) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `struktur_organisasi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id`, `id_program`, `sejarah`, `profil_pengasuh`, `foto_pengasuh`, `visi`, `misi`, `struktur_organisasi`) VALUES
(1, 1, 'ini sejarah sekolah saya ya teman kuu\r\n-2\r\n-3\r\naaaakuuuuuu\r\nsuka\r\nkamu\r\nbajigur', 'Bermula dengan coba-coba\r\nkemudian lancar\r\ndan berkelanjutan', 'gambar.jpg', 'ini visi ku hmm', 'ini misi ku hahahaha', 'landscape-road-trees-fall-wallpaper-preview.jpg'),
(3, 2, 'lorem', 'ipsum', 'gambar1.jpg', 'ipsum', 'lorem', 'cc164d560cf5846b4642d6174381cdda.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_program_pendidikan`
--

CREATE TABLE `tb_program_pendidikan` (
  `id_program` int(11) NOT NULL,
  `kode` varchar(225) NOT NULL,
  `nama_pendidikan` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `keterangan_pendidikan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_program_pendidikan`
--

INSERT INTO `tb_program_pendidikan` (`id_program`, `kode`, `nama_pendidikan`, `logo`, `keterangan_pendidikan`) VALUES
(1, 'PONPES', 'Pondok Pesantren Asshiddiqiyah 10', 'logo_ponpes.png', 'ini adalah pondok pesantren  asshiddiqiyah 10'),
(2, 'MA', 'Madrasah Aliyah', 'logo_ponpes1.png', 'ini adalah madrasah aliyah'),
(3, 'MTS', 'Madrasah Tsanawiyah', 'logo_ponpes2.png', 'ini adalah madrasah tsanawiyah'),
(4, 'SMK', 'Sekolah Menengah Kejuruan', 'logo_ponpes3.png', 'ini adalah Sekolah Menengah Kejurusan'),
(5, 'MI', 'Madrasah Diniyah', 'logo_ponpes4.png', 'ini adalah madrasah diniyah'),
(6, 'PTQ', 'Program Tahfidz Qur\'an', 'logo_ponpes5.png', 'ini adalah program tahfidz qur\'an');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sambutan`
--

CREATE TABLE `tb_sambutan` (
  `id_sambutan` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `isi_sambutan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sambutan`
--

INSERT INTO `tb_sambutan` (`id_sambutan`, `id_program`, `foto`, `isi_sambutan`) VALUES
(1, 2, 'gambar.jpg', 'Assalamu\'alaikum Wr. Wb\r\n\r\nMadrasah aliyah ini didirikan pada tahun sekian loh'),
(4, 1, 'cc164d560cf5846b4642d6174381cdda.jpg', 'assalamualaikum wr wb\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_slider`
--

INSERT INTO `tb_slider` (`id_slider`, `id_program`, `foto`) VALUES
(2, 2, 'about.jpg'),
(3, 1, 'image_3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`) VALUES
(2, 'rizki', 'iki', '$2y$10$4YmHno2rJQ1/4YqFV70MvuhizpovnTKEnz28y2Wux0zeJJkUnw.XO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tb_brosur`
--
ALTER TABLE `tb_brosur`
  ADD PRIMARY KEY (`id_brosur`);

--
-- Indeks untuk tabel `tb_eskul`
--
ALTER TABLE `tb_eskul`
  ADD PRIMARY KEY (`id_eskul`);

--
-- Indeks untuk tabel `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_informasi_website`
--
ALTER TABLE `tb_informasi_website`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_program_pendidikan`
--
ALTER TABLE `tb_program_pendidikan`
  ADD PRIMARY KEY (`id_program`);

--
-- Indeks untuk tabel `tb_sambutan`
--
ALTER TABLE `tb_sambutan`
  ADD PRIMARY KEY (`id_sambutan`);

--
-- Indeks untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_brosur`
--
ALTER TABLE `tb_brosur`
  MODIFY `id_brosur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_eskul`
--
ALTER TABLE `tb_eskul`
  MODIFY `id_eskul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_informasi_website`
--
ALTER TABLE `tb_informasi_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_berita`
--
ALTER TABLE `tb_kategori_berita`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_program_pendidikan`
--
ALTER TABLE `tb_program_pendidikan`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_sambutan`
--
ALTER TABLE `tb_sambutan`
  MODIFY `id_sambutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
