-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 11:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_`
--

CREATE TABLE `admin_` (
  `id_adm` int(11) NOT NULL,
  `nama_adm` varchar(128) NOT NULL,
  `username_adm` varchar(128) NOT NULL,
  `pass_adm` varchar(128) NOT NULL,
  `level_adm` int(11) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `agama_` varchar(100) NOT NULL,
  `jabatan_` varchar(128) NOT NULL,
  `tpt_lhr` varchar(128) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat_adm` varchar(128) NOT NULL,
  `email_adm` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_`
--

INSERT INTO `admin_` (`id_adm`, `nama_adm`, `username_adm`, `pass_adm`, `level_adm`, `jk`, `agama_`, `jabatan_`, `tpt_lhr`, `tgl_lhr`, `alamat_adm`, `email_adm`, `image`, `is_active`, `date_created`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'perempuan', 'Islam', 'Pembina', 'tj terantang', '2000-02-26', 'Peterongan, Jombang', 'lulukambarwati3@gmail.com', '042_(2).jpg', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_gol` int(11) NOT NULL,
  `nama_gol` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_gol`, `nama_gol`) VALUES
(1, 'tamu'),
(2, 'bantara'),
(3, 'laksana');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sku`
--

CREATE TABLE `jenis_sku` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_sku`
--

INSERT INTO `jenis_sku` (`id_jenis`, `nama_jenis`) VALUES
(1, 'islam'),
(2, 'hindu'),
(3, 'buddha'),
(4, 'katolik'),
(5, 'protestan'),
(6, 'umum'),
(7, 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `level_`
--

CREATE TABLE `level_` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_`
--

INSERT INTO `level_` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'tamu'),
(3, 'bantara'),
(4, 'laksana');

-- --------------------------------------------------------

--
-- Table structure for table `penempuhan_`
--

CREATE TABLE `penempuhan_` (
  `id_tempuh` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `soal_` varchar(1000) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_` varchar(100) NOT NULL,
  `jawaban_` varchar(1000) NOT NULL,
  `tingkat_sku` varchar(128) NOT NULL,
  `tanggal_` date NOT NULL,
  `nilai1_` int(11) DEFAULT NULL,
  `nilai2_` int(11) DEFAULT NULL,
  `nilai3_` int(11) DEFAULT NULL,
  `nilai_akhir` int(11) DEFAULT NULL,
  `hasil_` varchar(100) DEFAULT NULL,
  `catatan_` varchar(1000) NOT NULL,
  `tgl_nilai` date NOT NULL,
  `tempuh_` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan_`
--

CREATE TABLE `penjadwalan_` (
  `id_jadwal` int(11) NOT NULL,
  `materi_` varchar(500) NOT NULL,
  `tanggal_` date NOT NULL,
  `keterangan_` varchar(128) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjadwalan_`
--

INSERT INTO `penjadwalan_` (`id_jadwal`, `materi_`, `tanggal_`, `keterangan_`, `status`) VALUES
(2, 'Pionering', '2022-07-03', 'Bawa tali dan tongkat, tempat di taman jati.', '1'),
(3, 'Sandi-sandi', '2022-07-04', 'bawa peluit, tempat di gor unipdu.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sku_`
--

CREATE TABLE `sku_` (
  `id_sku` int(11) NOT NULL,
  `id_gol` int(11) NOT NULL,
  `jenis_sku` int(11) NOT NULL,
  `nama_sku` varchar(500) NOT NULL,
  `tugas_` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sku_`
--

INSERT INTO `sku_` (`id_sku`, `id_gol`, `jenis_sku`, `nama_sku`, `tugas_`) VALUES
(1, 2, 1, 'Dapat menjelaskan makna rukun islam dan rukun iman', 'Jelaskan tentang rukun iman dan rukun islam, kumpulkan dalm bentuk pdf.'),
(2, 2, 1, 'Mampu menjelaskan makna Sholat berjamaah dan dapat mendirikan Sholat sunah secara individu.', 'bagaimana tata cara sholat sunnah dhuha? buat essay dan kumpulkan dalam bentuk pdf'),
(3, 2, 1, 'Mampu menjelaskan makna berpuasa serta macam-macam puasa.', ''),
(4, 2, 1, 'Tahu tata cara merawat atau mengurus jenazah (Tajhizul Jenazah).', ''),
(5, 2, 1, 'Dapat membaca do\'a Ijab Qobul zakat.', ''),
(6, 2, 1, 'Dapat menghafal minimal sebuah hadist dan menjelaskan hadist tersebut.', ''),
(7, 2, 4, 'Tahu dan paham makna dan arti Gereja Katolik.', ''),
(8, 2, 4, 'Dapat memimpin do\'a dan membangun serta membuat gerakan cinta kasih pada keberagaman agama di luar gereja katolik.', ''),
(9, 2, 5, 'Mendalami hukum kasih dan mengamalkannya dalam kehidupan sehari-hari.', ''),
(10, 2, 2, 'Dapat menjelaskan sejarah perkembangan agama Hindu di Indonesia.', ''),
(11, 2, 2, 'Dapat menjelaskan makna dan hakikat dari tujuan melaksanakan persembahyangan sehari-hari dan hari besar keagamaan hindu.', ''),
(12, 2, 2, 'Dapat menjelaskan maksud dan tujuan kelahiran menjadi manusia menurut agama Hindu.', ''),
(13, 2, 2, 'Dapat menjelaskan makna dan hakekat ajaran Tri Hita Karana dengan pelestarian alam lingkungan.', ''),
(14, 2, 2, 'Dapat mempraktikkan bentuk gerakan Asanas dari Hatta Yoga.', ''),
(15, 2, 2, 'Dapat melafalkan dan mengkidungkan salah satu bentuk Dharma Gita.', ''),
(16, 2, 2, 'Dapat mendeskripsikan struktur, fungsi dan sejarah pura dalam cakupan Sad Kahyangan.', ''),
(17, 2, 3, 'Sadha: Mengungkapkan Buddha Dharma sebagai salah satu agama.', ''),
(19, 2, 3, 'Menjelaskan sejarah Buddha Gotama.', ''),
(20, 2, 3, 'Menjelaskan Tiratana sebagai pelindung.', ''),
(22, 2, 6, 'Berani menyampaikan kritik dan saran dengan sopan dan santun kepada sesama teman', 'Jelaskan mengenai kritik dan saran yang baik, yang seharusnya dilakukan saat sedang bermusyawarah.'),
(23, 2, 6, 'Dapat mengikuti jalannya diskusi dengan baik.', 'Jelaskan hal-hal terkait dengan diskusi yang baik.'),
(24, 2, 6, 'Dapat hidup bersama antara umat beragama dan toleransi dalam bakti.', ''),
(25, 2, 6, 'Mengikuti pertemuan ambalan sekurang-kurangnya 3 kali setiap bulan.', ''),
(26, 2, 6, 'Setia membayar iuran kepada gugus depan, dengan uang yang seluruh atau sebagian diperolehnya dari usaha sendiri.', ''),
(27, 2, 6, 'Dapat berbahasa Indonesia dengan baik dan benar dalam pergaulan sehari-hari.', ''),
(28, 2, 6, 'Telah membantu mengelola kegiatan di Ambalan.', ''),
(29, 2, 6, 'Telah ikut aktif kerja bakti di masyarakt minimal 2 kali.', ''),
(30, 2, 6, 'Dapat menampilkan kesenian daerah di depan umum minimal satu kali.', ''),
(31, 2, 6, 'Mengenal, mengerti dan memahami isi AD & ART Gerakan Pramuka.', ''),
(32, 2, 6, 'Dapat menjelaskan sejarah Kepramukaan Indonesia dan Dunia.', ''),
(33, 2, 6, 'Dapat menggunakan jam, kompas, tanda jejak dan tanda-tanda alam lainnya dalam pengembaraan.', ''),
(34, 2, 6, 'Dapat menjelaskan bentuk pengamalan Pancasila dalam kehidupan sehari-hari.', ''),
(35, 2, 6, 'Dapat menjelaskan tentang organisasi ASEAN dan PBB.', ''),
(36, 2, 6, 'Dapat menjelaskan tentang kewirausahaan.', ''),
(37, 2, 6, 'Dapat mendaur ulang barang tidak terpakai menjadi barang yang bermanfaat.', ''),
(38, 2, 6, 'Dapat menerapkan pengetahuannya tentang tali temali dan pionering dalam kehidupan sehari-hari.', ''),
(39, 2, 6, 'Selalu berolahraga, mampu melakukan olahraga renang gaya bebas dan menguasi 1 (satu) cabang olahraga tim.', ''),
(40, 2, 6, 'Dapat menjelaskan perkembangan fisik antara laki-laki dan perempuan.', ''),
(41, 2, 6, 'Dapat memimpin baris-berbaris sangganya, dapat menjelaskan tentang gerakan baris berbaris kepada anggota sangganya yang terdiri atas gerakan di tempat.', ''),
(42, 2, 6, 'Dapat menyebutkan beberapa penyakit infeksi, degeneratif dan penyakit yang disebabkan perilaku tidak sehat.', ''),
(43, 2, 6, 'Ikut serta dalam perkemahan selama tiga hari berturut-turut.', ''),
(44, 3, 1, 'Dapat menjelaskan makna Rukun Iman dan Rukun Islam di muka pasukan Penggalang atau Satuan Penegak.', 'sebutkan rukun iman dan rukun islam. berikan contohnya dalam kehidupan sehari-hari.'),
(45, 3, 1, 'Dapat menjelaskan hal-hal yang membatalkan sholat dan dapat mendirikan Sholat sunah berjamaah.', ''),
(46, 3, 1, 'Dapat menjelaskan hal-hal yang membatalkan puasa serta dapat melakukan salah satu puasa sunnah.', ''),
(47, 3, 1, 'Memahami tata cara merawat jenazah.', ''),
(48, 3, 1, 'Pernah Menjadi Amil Zakat.', ''),
(49, 3, 1, 'Dapat menghapal ayat tematik, dari al-qur\'an dan mampu menjelaskannya.', ''),
(50, 3, 4, 'Memahami dan mendalami 7 sakramen.', ''),
(51, 3, 4, 'Dapat menghafal dan menghayati akan riwayat salah satu Santo/Santa.', ''),
(52, 3, 4, 'Membahas 10 perintah Allah dilengkapi dengan contoh kehidupan sehari-hari.', ''),
(53, 3, 5, 'Dapat memberi kesaksian di depan jemaat/teman sebaya.', ''),
(54, 3, 5, 'Dapat berpartisipasi aktif dalam pelayanan Gereja sesuai bakat dan kemampuannya.', ''),
(55, 3, 5, 'Telah mengikuti pengajaran Agama (Katekisasi).', ''),
(56, 3, 2, 'Dapat menjelaskan sejarah kerajaan/candi-candi agama Hindu di Indonesia.', ''),
(57, 3, 2, 'Dapat melafalkan dan bertindak sebagai pemimpin persembahyangan Panca Sembah.', ''),
(58, 3, 2, 'Dapat menjelaskan Samsara/Punarbawa atau reinkarnasi sebagai bentuk untuk penyempurnaan kelahiran berikutnya.', ''),
(59, 3, 2, 'Dapat menjelaskan konsep ajaran Asta Brata.', ''),
(60, 3, 2, 'Dapat melakukan gerakan dan menjelaskan fungsi, serta menfaat dari setiap gerakan Yoga Asanas.', ''),
(61, 3, 2, 'Dapat melafalkan dan mengkidungkan lebih dari satu bentuk Dharma Gita.', ''),
(62, 3, 2, 'Dapat menjelaskan bentuk dan fungsi dari seni sakral keagamaan Hindu.', ''),
(63, 3, 3, 'Dapat memimpin dan mengorganisir kebaktian (pagi dan sore) serta perayaan hari-hari besar Agama Buddha; hari Waisak, Asadha, Kathina, Maggapuja).', ''),
(64, 3, 3, 'Saddha: Mendeskripsikan ruang lingkup dan intisari Tripitaka.', ''),
(65, 3, 3, 'Menjelaskan makna dan manfaat puja serta do\'a.', ''),
(66, 3, 3, 'Mendeskripsikan sila sebagai bagian dari jalan mulia berunsur delapan.', ''),
(67, 3, 3, 'Menjelaskan kebenaran yang terdapat dalam tripitaka.', ''),
(68, 3, 6, 'Dapat menerima kritik dari orang lain, serta berani mengeluarkan pendapatnya dengan tertib, sopan dan santun kepada orang-orang di sekitarnya.', 'berikan contoh menerima kritikdengan baik. kumpulkan dalam bentuk pdf'),
(69, 3, 6, 'Dapat mengikuti dan atau memimpin diskusi Ambalan dan mampu mengambil keputusan.', ''),
(70, 3, 6, 'Dapat menjadi penengah (memberi solusi), jika terjadi ketidaksepahaman dalam kelompoknya.', ''),
(71, 3, 6, 'Mengikuti pertemuan Ambalan sekurang-kurangnya 3 kali setiap bulan.', ''),
(72, 3, 6, 'Setia membayar iuran kepada gugus depannya, dengan uang yang seluruhnya atau sebagian diperolehnya dari usaha sendiri, serta membantu Ambalan dalam mengelola administrasi keuangan.', ''),
(73, 3, 6, 'Dapat memimpin rapat dan membuat risalah dengan baik.', ''),
(74, 3, 6, 'Pernah memimpin kegiatan di tingkat Ambalan.', ''),
(75, 3, 6, 'Pernah memimpin kerjaa bakti di masyarakat minimal 2 kali.', ''),
(76, 3, 6, 'Dapat memimpin kelompok dalam menampilkan salah satu jenis kesenian daerah.', ''),
(77, 3, 6, 'Dapat menjelaskan sebagian isi AD & ART Gerakan Pramuka kepada Ambalan.', ''),
(78, 3, 6, 'Dapat menjelaskan di muka umum tentang sejarah kepramukaan Indonesia dan dunia.', ''),
(79, 3, 6, 'Dapat melakukan pengembaraan selama 3 hari dan atau mengatur kehidupaan perkemahan selama minimal 3 hari.', ''),
(80, 3, 6, 'Dapat menjelaskan sejarah, arti, tatacara penggunaan dan kiasan Sang Merah Putih.', ''),
(81, 3, 6, 'Dapat menjelaskan peran Indonesia dalam organisasi ASEAN dan PBB.', ''),
(82, 3, 6, 'Telah memiliki keterampilan kewirausahaan yang dapat menghasilkan uang.', ''),
(83, 3, 6, 'Dapat membuat salah satu jenis peralatan teknologi tepat guna.', ''),
(84, 3, 6, 'Dapat membuat struktur dari keterampilan tali temali dan pionering, yang dapat digunakan masyarakat secara berkelompok.', ''),
(85, 3, 6, 'Selalu berolahraga, dapat melakukan olahraga renang selain gaya bebas dan menguasai 1 (satu) cabang olahraga lainnya.', ''),
(86, 3, 6, 'Dapat memahami dan menjelaskan tentang kesehatan reproduksi.', ''),
(87, 3, 6, 'Dapat mempersiapkan susunan dan pelaksanaan upacara, telah mempersiapkan minimal 3 kali upacara, telah menjadi pelaksana upacara minimal 3 kali.', ''),
(88, 3, 6, 'Dapat menyebutkan penyebab dan cara pencegahan penyakit infeksi, degeneratif dan penyakit yang disebabkan perilaku tidak sehat.', ''),
(89, 3, 6, 'Dapat melakukan pengembaraan selama 3 hari berturut-turut.', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_`
--

CREATE TABLE `user_` (
  `id_usr` int(11) NOT NULL,
  `nama_usr` varchar(128) NOT NULL,
  `username_` varchar(128) NOT NULL,
  `pass_` varchar(128) NOT NULL,
  `level_` int(11) NOT NULL,
  `jk_` enum('laki-laki','perempuan') NOT NULL,
  `agama_` varchar(100) NOT NULL,
  `tempat_lhr` varchar(128) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `alamat_usr` varchar(128) NOT NULL,
  `email_` varchar(128) NOT NULL,
  `image_` varchar(128) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `waktu_tempuh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_`
--

INSERT INTO `user_` (`id_usr`, `nama_usr`, `username_`, `pass_`, `level_`, `jk_`, `agama_`, `tempat_lhr`, `tgl_lhr`, `alamat_usr`, `email_`, `image_`, `tahun_ajaran`, `date_created`, `is_active`, `waktu_tempuh`) VALUES
(1111, 'Luluk Ambarwati', 'user_1111', 'ee11cbb19052e40b07aac0ca060c23ee', 2, 'perempuan', '', '', '0000-00-00', '', '', '', '2018/2019', '2022-07-16', '1', '2022-07-16'),
(1112, 'Laeli Nur A', 'user_1112', 'ee11cbb19052e40b07aac0ca060c23ee', 3, 'perempuan', '', '', '0000-00-00', '', '', '', '2018/2019', '2022-07-16', '1', '2022-07-16'),
(1113, 'Bachtiar', 'user_1113', 'ee11cbb19052e40b07aac0ca060c23ee', 4, 'laki-laki', '', '', '0000-00-00', '', '', '', '2018/2019', '2022-07-16', '1', '2022-07-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_`
--
ALTER TABLE `admin_`
  ADD PRIMARY KEY (`id_adm`),
  ADD UNIQUE KEY `username_adm` (`username_adm`),
  ADD KEY `fk_lvl` (`level_adm`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_gol`);

--
-- Indexes for table `jenis_sku`
--
ALTER TABLE `jenis_sku`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level_`
--
ALTER TABLE `level_`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `penempuhan_`
--
ALTER TABLE `penempuhan_`
  ADD PRIMARY KEY (`id_tempuh`),
  ADD KEY `fk_sku` (`id_soal`),
  ADD KEY `fk_sisw` (`id_siswa`);

--
-- Indexes for table `penjadwalan_`
--
ALTER TABLE `penjadwalan_`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `sku_`
--
ALTER TABLE `sku_`
  ADD PRIMARY KEY (`id_sku`),
  ADD KEY `fk_golongan` (`id_gol`),
  ADD KEY `fk_jenis` (`jenis_sku`);

--
-- Indexes for table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`id_usr`),
  ADD UNIQUE KEY `username_` (`username_`),
  ADD KEY `fk_level` (`level_`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_`
--
ALTER TABLE `admin_`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_gol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_sku`
--
ALTER TABLE `jenis_sku`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level_`
--
ALTER TABLE `level_`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penempuhan_`
--
ALTER TABLE `penempuhan_`
  MODIFY `id_tempuh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `penjadwalan_`
--
ALTER TABLE `penjadwalan_`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sku_`
--
ALTER TABLE `sku_`
  MODIFY `id_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `user_`
--
ALTER TABLE `user_`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4118045;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_`
--
ALTER TABLE `admin_`
  ADD CONSTRAINT `fk_lvl` FOREIGN KEY (`level_adm`) REFERENCES `level_` (`id_level`);

--
-- Constraints for table `penempuhan_`
--
ALTER TABLE `penempuhan_`
  ADD CONSTRAINT `fk_sisw` FOREIGN KEY (`id_siswa`) REFERENCES `user_` (`id_usr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sku` FOREIGN KEY (`id_soal`) REFERENCES `sku_` (`id_sku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sku_`
--
ALTER TABLE `sku_`
  ADD CONSTRAINT `fk_golongan` FOREIGN KEY (`id_gol`) REFERENCES `golongan` (`id_gol`),
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`jenis_sku`) REFERENCES `jenis_sku` (`id_jenis`);

--
-- Constraints for table `user_`
--
ALTER TABLE `user_`
  ADD CONSTRAINT `fk_level` FOREIGN KEY (`level_`) REFERENCES `level_` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
