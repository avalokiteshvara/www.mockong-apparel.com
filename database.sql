-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.20 - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             9.4.0.5131
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mockong-apparel
CREATE DATABASE IF NOT EXISTS `mockong-apparel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mockong-apparel`;

-- Dumping structure for table mockong-apparel.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  `prevent_update` int(10) DEFAULT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.ci_sessions: ~3 rows (approximately)
DELETE FROM `ci_sessions`;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`, `prevent_update`) VALUES
	('4eedbadfb77d04600a0894c66bf82633', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/53.0.2785.143 Chrome/53.0.2785.14', 1480474052, '', NULL),
	('721349063e4b46ac16010a81234ea224', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/53.0.2785.143 Chrome/53.0.2785.14', 1480271303, '', NULL),
	('7511705933951cd1782309da3ac84383', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/53.0.2785.143 Chrome/53.0.2785.14', 1480381103, 'a:4:{s:9:"user_data";s:0:"";s:9:"view_tipe";s:4:"grid";s:4:"sort";s:4:"nama";s:5:"order";s:3:"ASC";}', NULL),
	('b95d6a5f0c84a08c1ad998fee6c69f44', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/53.0.2785.143 Chrome/53.0.2785.14', 1480266061, '', NULL),
	('ec49d6beddc629b2c7571c8e36be254a', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/53.0.2785.143 Chrome/53.0.2785.14', 1480294846, 'a:10:{s:9:"user_data";s:0:"";s:9:"view_tipe";s:4:"grid";s:4:"sort";s:5:"harga";s:5:"order";s:4:"DESC";s:10:"sort-order";s:10:"harga-desc";s:11:"sudah_login";i:1;s:2:"id";s:1:"3";s:12:"nama_lengkap";s:5:"admin";s:5:"email";s:15:"admin@admin.com";s:6:"status";s:5:"ADMIN";}', NULL),
	('fc0a2924553b1c76bb6a853819fb53f0', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/53.0.2785.143 Chrome/53.0.2785.14', 1480325935, 'a:4:{s:9:"user_data";s:0:"";s:9:"view_tipe";s:4:"grid";s:4:"sort";s:4:"nama";s:5:"order";s:3:"ASC";}', NULL);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `tipe` enum('small-text','big-text','image') DEFAULT 'small-text',
  `value` text,
  `img_height` varchar(50) DEFAULT NULL,
  `img_width` varchar(50) DEFAULT NULL,
  `show` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.settings: ~4 rows (approximately)
DELETE FROM `settings`;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `title`, `tipe`, `value`, `img_height`, `img_width`, `show`) VALUES
	(1, 'welcome_greets', 'big-text', 'Mockong Apparel adalah toko online dimana brand fashion favorit Anda berada. Dengan berbelanja fashion di toko online Mockong Apparel Anda dapat menemukan produk fashion eksklusif baik dari berbagai brand terkenal, maupun brand baru di dunia fashion. Mockong Apparel juga memberikan pilihan harga yang fleksibel. Untuk mendapatkan produk yang ekslusif dengan harga yang spesial, Mockong Apparel adalah pusat belanja fashion online yang paling tepat untuk Anda.', NULL, NULL, 'Y'),
	(2, 'tentang_kami_1', 'big-text', 'Toko online Mockong Apparel adalah pusat belanja fashion online terbesar di Indonesia yang dapat menjawab kebutuhan fashion pria dan fashion wanita dengan menawarkan brand-brand terkemuka, baik lokal maupun internasional. Kami menyediakan produk-produk yang selalu mengikuti trend fashion terbaru yang memberikan banyak pilihan untuk menyempurnakan penampilan Anda. Berbagai model sepatu, pakaian bagi pria maupun wanita dapat dengan mudah Anda padukan untuk menemukan kesempurnaan itu. Temukan dan dapatkan koleksi lengkapnya hanya di pusat belanja online fashion, Mockong Apparel.', NULL, NULL, 'Y'),
	(3, 'tentang_kami_2', 'big-text', '<p>Anda pastinya tahu bahwa penampilan belum sempurna tanpa kehadiran sepatu dan aksesoris. Mencari sepatu terbaru dengan kualitas terbaik tidaklah susah. Anda bisa menemukan dengan mudah wedges yang dapat dicocokan dengan dress ataupun gaun yang elegan, atau sepasang sneakers untuk melengkapi gaya kasual Anda. Mockong Apparel merupakan toko online tempat belanja fashion online dimana Anda dapat menemukan semuanya, termasuk baju kerja yang elegan. Jika Anda membutuhkan heels dengan ketinggian tertentu, kami menawarkan banyak pilihan untuk Anda. Untuk para pria juga, kami menawarkan berbagai macam produk diantaranya sneakers, sepatu formal, sepatu boots, sepatu olahraga hingga baju koko. Dengan navigasi pencarian sederhana, daftar koleksi, dan harga yang menarik kami memberikan kemudahan untuk Anda belanja online menemukan barang yang Anda butuhkan. Jadikanlah momen belanja fashion online Anda menjadi aktifitas yang menyenangkan dengan Mockong Apparel.</p>\n', NULL, NULL, 'Y'),
	(4, 'img_tentang_kami_1', 'image', 'spongebob.jpg', NULL, NULL, 'Y'),
	(5, 'img_tentang_kami_2', 'image', 'patrickstar.jpg', NULL, NULL, 'Y');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_barang_masuk
CREATE TABLE IF NOT EXISTS `tbl_barang_masuk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(50) DEFAULT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `nilai_total` double DEFAULT NULL,
  `keterangan` date DEFAULT NULL,
  `masuk_at` date DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_invoice` (`no_invoice`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_barang_masuk: ~0 rows (approximately)
DELETE FROM `tbl_barang_masuk`;
/*!40000 ALTER TABLE `tbl_barang_masuk` DISABLE KEYS */;
INSERT INTO `tbl_barang_masuk` (`id`, `no_invoice`, `nama_pegawai`, `nilai_total`, `keterangan`, `masuk_at`, `update_at`) VALUES
	(1, 'xxxx', 'xxxx', 500000, '0000-00-00', '2016-11-28', '2016-11-28 08:00:29');
/*!40000 ALTER TABLE `tbl_barang_masuk` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_barang_masuk_details
CREATE TABLE IF NOT EXISTS `tbl_barang_masuk_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_barang_masuk` int(11) DEFAULT NULL,
  `kode_produk` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_barang_masuk_details: ~0 rows (approximately)
DELETE FROM `tbl_barang_masuk_details`;
/*!40000 ALTER TABLE `tbl_barang_masuk_details` DISABLE KEYS */;
INSERT INTO `tbl_barang_masuk_details` (`id`, `id_barang_masuk`, `kode_produk`, `jumlah`) VALUES
	(1, 1, 'jb-001', 20);
/*!40000 ALTER TABLE `tbl_barang_masuk_details` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_gambar_produk
CREATE TABLE IF NOT EXISTS `tbl_gambar_produk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gambar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_gambar_produk: ~3 rows (approximately)
DELETE FROM `tbl_gambar_produk`;
/*!40000 ALTER TABLE `tbl_gambar_produk` DISABLE KEYS */;
INSERT INTO `tbl_gambar_produk` (`id`, `kode_produk`, `updated_at`, `gambar`) VALUES
	(1, 'jb-001', '2013-10-24 13:27:29', 'elzatta-Alma-m-Marsya1.jpg'),
	(2, 'jb-001', '2013-10-24 13:27:33', 'elzatta-zahra-m-rafana1.jpg'),
	(4, 'jb-001', '2013-10-24 13:27:35', 'Zaria-m-Nafisa1.jpg');
/*!40000 ALTER TABLE `tbl_gambar_produk` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_kategori
CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `slug` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_kategori: ~10 rows (approximately)
DELETE FROM `tbl_kategori`;
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
INSERT INTO `tbl_kategori` (`id`, `nama`, `gender`, `slug`) VALUES
	(1, 'Jaket Cowok', 'L', 'kategori/jaket-cowok'),
	(2, 'Jaket Cewek', 'P', 'kategori/jaket-cewek'),
	(3, 'Kaos Cowok', 'L', 'kategori/kaos-cowok'),
	(4, 'Kaos Cewek', 'P', 'kategori/kaos-cewek'),
	(5, 'Kemeja Cowok', 'L', 'kategori/kemeja-cowok'),
	(6, 'Kemeja Cewek', 'P', 'kategori/kemeja-cewek'),
	(7, 'Celana Cowok', 'L', 'kategori/celana-cowok'),
	(8, 'Celana Cewek', 'P', 'kategori/celana-cewek'),
	(9, 'Sepatu Cowok', 'L', 'kategori/sepatu-cowok'),
	(10, 'Sepatu Cewek', 'P', 'kategori/sepatu-cewek');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_produk
CREATE TABLE IF NOT EXISTS `tbl_produk` (
  `kode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `id_kategori` tinyint(4) NOT NULL,
  `harga` double NOT NULL,
  `harga_lama` double NOT NULL,
  `promo` enum('Y','N') NOT NULL DEFAULT 'N',
  `gambar` varchar(50) NOT NULL DEFAULT 'no_images.jpg',
  `deskripsi` text NOT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y',
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_produk: ~3 rows (approximately)
DELETE FROM `tbl_produk`;
/*!40000 ALTER TABLE `tbl_produk` DISABLE KEYS */;
INSERT INTO `tbl_produk` (`kode`, `nama`, `slug`, `id_kategori`, `harga`, `harga_lama`, `promo`, `gambar`, `deskripsi`, `aktif`, `tgl_update`) VALUES
	('jb-001', 'Jaket Cewek 001', 'jaket-cewek-001', 2, 50000, 70000, 'Y', 'cd963fb523efd45c7859ccab08bbffce.jpg', 'deskripsi jaket cewek 001', 'Y', '2016-11-28 09:30:12'),
	('jb-002', 'Jaket Cewek 002', 'jaket-cewek-002', 2, 75000, 0, 'N', 'ccb49d02e5bd457556b78e17bf0bcdaa.jpg', 'deskripsi jaket cewek 002', 'Y', '2016-11-28 09:31:16'),
	('jb-003', 'Jaket Cowok 001', 'jaket-cowok-001', 1, 50000, 0, 'N', '9c336becb7ba831de1dde4a5aa26df4e.jpg', 'deskripsi jaket cowok 001', 'Y', '2016-11-28 09:29:02');
/*!40000 ALTER TABLE `tbl_produk` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_produk_viewed
CREATE TABLE IF NOT EXISTS `tbl_produk_viewed` (
  `slug` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `viewed_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_produk_viewed: ~12 rows (approximately)
DELETE FROM `tbl_produk_viewed`;
/*!40000 ALTER TABLE `tbl_produk_viewed` DISABLE KEYS */;
INSERT INTO `tbl_produk_viewed` (`slug`, `ip`, `viewed_at`) VALUES
	('elzatta-alma-m-marsya', '127.0.0.1', '2014-12-11'),
	('elzatta-zahra-m-rafana', '127.0.0.1', '2014-12-11'),
	('elzatta-alma-m-marsya', '127.0.0.1', '2014-12-29'),
	('elzatta-zaria-m-nafisa', '127.0.0.1', '2014-12-29'),
	('elzatta-zaria-m-nafisa', '::1', '2016-11-27'),
	('elzatta-zahra-m-rafana', '::1', '2016-11-27'),
	('elzatta-alma-m-marsya', '::1', '2016-11-27'),
	('elzatta-zaria-m-nafisa', '::1', '2016-11-28'),
	('elzatta-zahra-m-rafana', '::1', '2016-11-28'),
	('elzatta-alma-m-marsya', '::1', '2016-11-28'),
	('jaket-cewek-001', '::1', '2016-11-28'),
	('jaket-cowok-001', '::1', '2016-11-28'),
	('jaket-cewek-001', '::1', '2016-11-30'),
	('jaket-cewek-002', '::1', '2016-11-30');
/*!40000 ALTER TABLE `tbl_produk_viewed` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_range_harga
CREATE TABLE IF NOT EXISTS `tbl_range_harga` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_range_harga: ~3 rows (approximately)
DELETE FROM `tbl_range_harga`;
/*!40000 ALTER TABLE `tbl_range_harga` DISABLE KEYS */;
INSERT INTO `tbl_range_harga` (`id`, `title`, `slug`) VALUES
	(1, 'Rp25.000 - Rp49.000', 'range/25000-49000'),
	(2, 'Rp50.000 - Rp75.000', 'range/50000-75000'),
	(3, 'Rp76.000 - Rp100.000', 'range/76000-100000');
/*!40000 ALTER TABLE `tbl_range_harga` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_review
CREATE TABLE IF NOT EXISTS `tbl_review` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `isi` text NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `accepted` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_review: ~0 rows (approximately)
DELETE FROM `tbl_review`;
/*!40000 ALTER TABLE `tbl_review` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_review` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_trans_details
CREATE TABLE IF NOT EXISTS `tbl_trans_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_trans` int(7) DEFAULT NULL,
  `kode_produk` varchar(50) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL,
  `quantity` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_trans_details: ~0 rows (approximately)
DELETE FROM `tbl_trans_details`;
/*!40000 ALTER TABLE `tbl_trans_details` DISABLE KEYS */;
INSERT INTO `tbl_trans_details` (`id`, `id_trans`, `kode_produk`, `harga_satuan`, `quantity`) VALUES
	(1, 1, 'jb-001', 50000, 1);
/*!40000 ALTER TABLE `tbl_trans_details` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_trans_header
CREATE TABLE IF NOT EXISTS `tbl_trans_header` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `propinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(50) DEFAULT NULL,
  `alamat` text,
  `pesan` text,
  `status` enum('WAITING_PAYMENT','PROCESSING','CANCELED','COMPLETE','PAYMENT_CONFIRMED') DEFAULT 'WAITING_PAYMENT',
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_trans_header: ~0 rows (approximately)
DELETE FROM `tbl_trans_header`;
/*!40000 ALTER TABLE `tbl_trans_header` DISABLE KEYS */;
INSERT INTO `tbl_trans_header` (`id`, `id_user`, `nama`, `email`, `telp`, `propinsi`, `kota`, `kode_pos`, `alamat`, `pesan`, `status`, `update_at`, `created_at`) VALUES
	(1, 1, 'trias fahrudin', 'triasfahrudin@gmail.com', '630245', 'jatim', 'banyuwangi', '65145', 'j.jajangsurat\nnomor 2', '', 'CANCELED', '2016-11-30 07:59:48', '2016-11-30 01:53:16');
/*!40000 ALTER TABLE `tbl_trans_header` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_trans_konfirmasi
CREATE TABLE IF NOT EXISTS `tbl_trans_konfirmasi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_trans` int(7) DEFAULT NULL,
  `tgl_setor` date DEFAULT NULL,
  `metode_bayar` varchar(50) DEFAULT NULL,
  `nama_penyetor` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `jml_transfer` double DEFAULT NULL,
  `metode_kirim` varchar(50) DEFAULT NULL,
  `pesan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_trans_konfirmasi: ~0 rows (approximately)
DELETE FROM `tbl_trans_konfirmasi`;
/*!40000 ALTER TABLE `tbl_trans_konfirmasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trans_konfirmasi` ENABLE KEYS */;

-- Dumping structure for table mockong-apparel.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(50) NOT NULL,
  `propinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('MEMBER','ADMIN') NOT NULL DEFAULT 'MEMBER',
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `kode_aktivasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table mockong-apparel.tbl_user: ~4 rows (approximately)
DELETE FROM `tbl_user`;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id`, `nama_lengkap`, `alamat`, `telp`, `propinsi`, `kota`, `kode_pos`, `tgl_lahir`, `email`, `password`, `status`, `aktif`, `kode_aktivasi`) VALUES
	(2, 'member', 'jl.memberraya', '631245', 'jatim', 'surabaya', '78654', '1981-10-08', 'member@gmail.com', 'aa08769cdcb26674c6706093503ff0a3', 'MEMBER', 'Y', ''),
	(3, 'admin', 'xxxx', '1234567', 'xxxx', 'xxxx', '123456', '0000-00-00', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'Y', '0lsa3NlplhhxmTtp3eFm');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
