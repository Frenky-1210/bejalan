-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 03:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000005_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_16_042528_create_tours_table', 1),
(6, '2023_11_16_043016_create_wisatas_table', 1),
(7, '2023_11_16_043256_create_pesanans_table', 1),
(8, '2023_11_19_130819_create_terjuals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal` date NOT NULL,
  `waktu_start` time NOT NULL,
  `waktu_end` time NOT NULL,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terjuals`
--

CREATE TABLE `terjuals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `total_harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Unpaid','Paid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tourguide` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengalaman` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `nama_tourguide`, `umur`, `jenis_kelamin`, `pengalaman`, `no_telp`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Frenky', '18', 'Pria', 'Sebagai tour guide di destinasi wisata populer selama tiga tahun, saya memiliki pengalaman yang kaya dalam memberikan pengantar kepada wisatawan lokal dan internasional. Dengan pengetahuan mendalam tentang sejarah, budaya, dan atraksi setempat, saya telah memimpin berbagai jenis tur, termasuk tur bersepeda, tur sejarah, dan tur kuliner.', '0813-6446-8859', 'public/foto_tourguide/5fEO5P4ISDqwQju30HlxJqoquU30IpUNazawKLzS.jpg', '2023-11-24 07:35:34', '2023-11-24 07:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('Admin','User') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `email_verified_at`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '$2y$12$HmPAU3XRM9Sd0RljB4aIsuwj8iduH4Gc0jK2xM7HqnI8RpK4YOuwu', 'Admin@gmail.com', NULL, NULL, 'Admin', '2023-11-24 07:31:40', '2023-11-24 07:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `wisatas`
--

CREATE TABLE `wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tempat_wisata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wisatas`
--

INSERT INTO `wisatas` (`id`, `tempat_wisata`, `lokasi`, `deskripsi`, `sumber_data`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Taman Laman Boenda', 'Jl. Hang Tuah, Tanjungpinang Kota, Kec. Tj. Pinang Kota, Kota Tanjung Pinang, Kepulauan Riau', 'Tanjungpinang merupakan ibu kota Provinsi Kepulauan Riau, Indonesia. Kota Tanjungpinang yang syarat akan sejarah, budaya, dan adat istiadat. Secara geografis kota tanjungpinang terletak pada 00 51’ s/d 00 59’ LU dan 104 23’ s/d 104 34’ BT. Selain itu kota Tanjungpinang memiliki berbagai kegiatan pariwisata salah satunya adalah objek wisata “Laman Boenda” yang terletak di tepi laut kota Tanjungpinang.\r\n\r\nKeunikan yang tersimpan dari Laman Boenda adalah posisi letaknya berhadapan langsung dengan laut, selain itu panorama yang disuguhkan dari pemandangan yang terdapat di laman boenda adalah pemandangan disore hari, pengunjung bisa memanjakan mata dengan melihat matahari terbenam (sunset). Fasilitas yang ada dilaman boenda yaitu tempat bermain untuk anak-anak (perosotan, ayunan dan lain sebagainya), tempat untuk berolahraga serta tempat duduk untuk bersantai.\r\n\r\n\r\n\r\n\r\nPak Emi selaku petugas  taman Laman Boenda mengatakan “kurangnya kesadaran pengunjung terhadap kebersihan, dikarenakan masih banyak ditemukan sampah yang berserakan di sekitar taman”, dan beliau juga berharap kedepannya pengunjung memiliki kesadaran untuk membuang sampah pada tempatnya. Arahan pengelolaan yang diharapkan kedepannya pihak pengelola taman lebih menegaskan lagi aturan untuk pegunjung yang membuang sampah sembarangan serta kedapannya bisa di bangun stand untuk berjualan agar masyarakat yang berjualan lebih tertib dan rapi. Salah satu pengunjung menyarankan agar di taman laman boenda lebih diperbanyak penerangan dan menjaga kebersihan toilet umum.\r\n\r\n\r\n\r\nLaman Boenda saat ini sedang dilakukan reklamasi untuk peluasan wilayah taman, agar lebih besar dan lebih banyak fasilitas menarik yang di  sediakan. Selain dampak positif yang diberikan  dari reklamasi di lokasi Laman Boenda. Terdapat dampak negative yang ihasilkan  bagi lingkungan yang di sebabkan oleh reklamasi tersebut seperti degradasi pantai.\r\n\r\n \r\n\r\nPenulis\r\n\r\nMahasiswa Jurusan Manajemen Sumberdaya Perairan FIKP UMRAH', 'Cahya Sumirat', 'public/foto_destinasi/Y53I541EW9fFIt6Ws2Fdw9isCTXbFiPuEXwR9qMV.jpg', '2023-11-24 07:32:15', '2023-11-24 07:32:15'),
(2, 'Vihara Avalokitesvara Graha', 'Tj. Unggat, Kec. Bukit Bestari, Kota Tanjung Pinang, Kepulauan Riau', 'Vihara Avalokitesvara Graha atau 大观音山梅峰寺 Dà guānyīn shān méi fēngsì merupakan salah satu wihara Buddha di Tanjungpinang, Kepulauan Riau, Indonesia. Wihara ini disebut sebagai wihara terbesar se-Asia Tenggara. Wihara ini dibangun oleh sebuah yayasan komunitas Tionghoa di Tanjungpinang untuk dijadikan sebagai tempat memperdalam ilmu agama, berguru dan belajar para biksu, sangha, dan guru baik yang datang dari daerah lokal maupun dari luar negeri seperti Tiongkok, Singapura, dan Malaysia.\r\nVihara Avalokitesvara Graha berada kurang lebih 14 km dari pusat kota Tanjungpinang. Wihara ini terletak di Kelurahan Air Raja di sebelah kiri Jalan WR Supratman, jalur lintas Tanjungpinang-Tanjung Uban, Batu 14.\r\n\r\nPintu gerbang yang megah dan menjulang tinggi menjadi ciri khas dari wihara ini, dengan buah patung singa menyambut para pengunjung untuk memasuki area wihara ini. Sepanjang jalan masuk, pengunjung akan disuguhi taman yang luas yang ditumbuhi beraneka ragam tumbuhan salah satunya yaitu pohon buah naga.\r\n\r\nVihara Avalokitesvara Graha diresmikan oleh Menteri Agama Republik Indonesia pada bulan Juni 2009. Wihara yang digunakan sebagai tempat ibadah bagi warga keturunan Tionghoa ini juga biasa dijadikan tempat berkunjung bagi wisatawan asing dari Malaysia, Singapura, maupun Thailand. Beberapa wisatawan berpendapat, jika mengunjungi wihara ini, maka sudah tidak lagi terasa berada di Indonesia, namun terasa sudah berada di negara-negara Asia Timur, khususnya Tiongkok. Selain sebagai tempat beribadah bagi warga keturunan Tionghoa, wihara ini juga dijadikan tempat memperdalam ilmu agama.\r\n\r\nUniknya lagi di dalam bangunan utama wihara terdapat sebuah patung Dewi Kuan Yin Phu Sha (观世音菩萨) dalam posisi duduk yang dinobatkan Museum Rekor Indonesia menjadi patung Dewi Kuan Yin terbesar yang ada di dalam ruangan. Tinggi patung itu mencapai 16,8 meter, terbuat dari tembaga dengan berat 40 ton, dan berlapis emas 22 karat. Dalam wihara ini, juga ditambahkan hiasan-hiasan dinding dan patung dewa-dewi setinggi kurang lebih 3,5 - 4 meter yang berdiri sejajar di kiri dan kanan ruangan menghadap patung Dewi Kuan Yin Phu Sha ditambah lagi suasana hening di dalam wihara yang jauh dari keramaian.', 'Wikipedia', 'public/foto_destinasi/DfFl7hcP8Dte6RVQxfYIVJ5w3r7ZONePfpVLHKtb.jpg', '2023-11-24 07:32:34', '2023-11-24 07:32:34'),
(3, 'Trans Studio Garden', 'Jl. Adi Sucipto Kilometer 11', 'Trans Studio Garden Tanjungpinang, merupakan arena hiburan dan bermain sekaligus tujuan wisata dengan konsep outdoor pertama dan terbesar di Kepulauan Riau. Berlokasi di Jalan Adi Sucipto, Kilometer 11, tempat wisata ini berdampingan dengan Aston Tanjungpinang Hotel & Conference Center.Terletak di lokasi yang sangat strategis dan mudah untuk di akses. Tempat ini hanya sekitar 7 menit dari Bandara Internasional Raja Haji Fisabilillah, dan kurang lebih 20 menit dari Pelabuhan Ferry Sri Bintan Pura.Menempati area seluas 1,8 hektar, berbagai fasilitas bisa dinikmati, mulai dari beragam area permainan serta hiburan, taman dengan aneka spot foto instagrammable dan juga tempat bersantap yang beragam.\r\n\r\nTanjungpinang, InfoPublik - Serasa di kawasan Puncak Jabar. Itulah kesan pertama saat memasuki Trans Studio Garden (TSG) Tanjungpinang, Kamis (28/10/2021) sore. Ditata dengan apik, TSG Tanjungpinang memang menawarkan taman bermain berkonsep kebun. \r\n\r\nMereka yang senang berfoto, akan menyukai TSG Tanjungpinang. Begitu masuk ke entri hall, pengunjung pasti ingin langsung berfoto.\r\n\r\nSelain entry gate atau gerbang depan yang apik, entry hall juga dipenuhi mural yang membuat pengunjung serasa berada di Eropa.\r\n\r\nNamun pengunjung bakal tak sabaran untuk masuk. Pasalnya giant wheel sudah menanti untuk dinaiki. “Nanti bisa lihat pemandangan Tanjungpinang dari ketinggian,” ujar Panji Patrimo, Operational Manager TSG Tanjungpinang.\r\n\r\nDi sisi kiri juga ada giant swing. Cocok buat mereka yang punya nyali lebih. Pasalnya pengunjung akan berputar di ketinggian, dengan kecepatan yang lumayan. Selesai dengan dua wahana tersebut, pengunjung dapat berfoto di spot-spot di sekitar wahana.\r\n\r\nSekitaran wahana tersebut juga dipenuhi dengan tanaman, membuat pengunjung serasa berada di kawasan wisata Puncak Bandung. Karena memang TSG Tanjungpinang ini mengambil konsep kebun.\r\n\r\n“TSG Tanjungpinang ini salah satu taman hiburan yang berkonsep kebun. Saat ini semua theme park kita masih berkonsep indoor dan ini satu-satunya yang berkonsep garden,” jelas Panji.\r\n\r\nUntuk melengkapi konsep itu, ada kolam yang dipenuhi dengan ikan koi dan juga bird aviary yang menjadi rumah baru bagi burung-burung endemik.\r\n\r\nJuga ada taman bertemakan jurasic atau dinosaurus. Bagi pecinta aktivitas luar ruangan, juga ada sky riding, water bike dan juga flying fox.\r\n\r\nBuat mereka pecinta permainan, dapat langsung menuju game center. Ada 73 mesin game yang dapat dijajal satu per satu. “Teman-teman nggak akan bosen. Nggak usah takut lapar, ada tempat makan juga,” sebut Panji.\r\n\r\nTSG Tanjungpinang sudah dapat dikunjungi pada pertengahan November mendatang. “Insha Allah akan diluncurkan oleh Gubernur pada 12 November. Beliau begitu support sekali. Pada 13 November sudah bias dikunjungi oleh masyarakat umum,” ujar Wulan Andarini, Bisnis Manager TSG Tanjungpinang.\r\n\r\nUntuk masuk ke TSG pada weekday, cukup membayar tiket masuk sebesar Rp15.000 saja dan Rp25.000 pada weekend. Untuk wahana tambahan outdoor, cukup menambah maksimal Rp30.000 saja. “Untuk game center mulai dari Rp4.900 sampai Rp 25.000,” tambah Wulan.\r\n\r\nSaat ini TSG Tanjungpinang sedang dalam proses finishing. Di mana para pekerja sedang menyelesaikan beberapa sentuhan akhir.\r\n\r\nTermasuk merapikan taman dan spot-spot foto. Buat yang penasaran, segera kosongkan jadwal. Jangan lupa untuk mengunduh aplikasi PeduliLindungi, untuk masuk ke TSG Tanjungpinang. (MC Kepri/toeb)', 'MC PROV KEPULAUAN RIAU', 'public/foto_destinasi/QILjnTPPc3iOCeclC3F4jmkhzlEoyeMxdVqMVrgk.jpg', '2023-11-24 07:32:59', '2023-11-24 07:32:59'),
(4, 'Vihara Pohon Banyan', 'Senggarang, Kec. Tj. Pinang Kota, Kota Tanjung Pinang, Kepulauan Riau', 'Banyak hal yang menjadi alasan wisatawan mengunjungi suatu obyek wisata. Salah satunya karena keunikan tempat tersebut Banyan Tree Temple atau disebut juga klenteng akar pohon yang terletak di Senggarang, Tanjungpinang, Kepulauan Riau.\r\n\r\nklenteng akar pohon yang berumur ratusan tahun ini dililiti oleh akar berjuntai. Akar itu berasal dari pohon beringin besar yang tumbuh di sekitar klenteng. Hal unik itulah yang menarik minat wisatawan untuk datang dan melihat langsung kejadian yang tak biasa tersebut.\r\n\r\nBerdasarkan cerita yang terpampang di plang, klenteng akar pohon ini sudah ada sejak 1811. Dulunya, yang merupakan kediaman Kapiten China, Chiao Ch’en. Setelah tempat tersebut ditinggalkan oleh sang pemilik rumah dan tidak terpakai, warga sekitar berinisiatif menjadikan rumah ibadah mengingat masih banyak warga yang keturunan Tionghoa.\r\n\r\nHingga saat ini masih banyak pemeluk agama Khonghucu yang datang untuk beribadah di klenteng tersebut. Baik yang berasal dari daerah Senggarang maupun dari luar daerah. Ada beberapa ruangan yang dijadikan tempat untuk berdoa dan pembakaran dupa.\r\n\r\nSayangnya, meski sudah menjadi salah satu destinasi wisata, Klenteng Tien Shang Miao terlihat tidak terawat. Banyak cat dinding yang sudah terkelupas dan kusam, terutama pada dinding yang dekat dengan tempat peletakkan dupa. Tak hanya itu, beberapa bagian terlihat lusuh karena banyak barang yang tidak terpakai ditumpuk begitu saja sehingga hampir mirip dengan gudang.\r\n\r\nBahkan beberapa tahun lalu klenteng ini sempat mengalami kerusakan akibat desakan akar pohon beringin. Walaupun keadaan klenteng kurang membuat nyaman, tapi masih banyak saja wisatawan yang datang berkunjung. Ada pula warga sekitar yang memanfaatkan klenteng untuk berkumpul bersama atau sekadar beristirahat.\r\n\r\nAdanya pohon beringin membuat suasana menjadi sejuk dan teduh. Sementara itu, di sekitar klenteng akar pohon masih ada beberapa obyek wisata lain yang sering dikunjungi. Terlebih Senggarang adalah kawasan pecinan di mana dahulu kala imigran dari Tiongkok pertama kali singgah di sana sebelum menyebar ke berbagai pulau di sekitarnya.\r\n\r\nDi sana terdapat 7 klenteng dan 2 vihara. Walaupun sudah banyak penduduk yang memeluk agama Kristen, Buddha, dan Islam, wisatawan masih bisa merasakan kentalnya tradisi kepercayaan Khonghucu, untuk menuju destinasi ini anda bisa membeli paet tour 1 day tanjung pinang yang telah kami sediakan.', 'https://www.sewamobilbintan.com/banyan-tree-temple/', 'public/foto_destinasi/Vq7fmgRD83X7oYHOZFGct8TLwtFHKupsHUan6sV2.jpg', '2023-11-24 07:33:26', '2023-11-24 07:33:26'),
(5, 'Tugu Pensil', 'Jl. Agus Salim, Tanjungpinang Bar., Kec. Tanjungpinang Bar., Kota Tanjung Pinang, Kepulauan Riau', 'Tugu Pensil adalah sebuah tugu berbentuk Pensil, dibangun sebagai simbol pemberantasan buta huruf dan penghargaan bagi tanjungpinang yang dapat membebaskan daerahnya dari buta huruf melalui program Pemberantasan Buta Huruf (PBH) pada tahun 1960-an.\r\n\r\nTugu Pensil berbentuk tugu putih tegak berdiri dengan ujung tugu seperti ujung pensil yang runcing dan disertai bagian bawah yang tidak langsung menyentuh tanah namun diberi alas limas terbalik. Tugu ini dirancang oleh putra daerah bernama Ir Nizar Nasir. Peletakan batu pertamanya dilakukan pada pertengahan tahun 1962 oleh Menteri Pendidikan dan Kebudayaan Indonesia, Prof. Prijono.\r\n\r\nSeiring perkembangan kota tanjungpinang, lokasi tugu pensil dibangun menjadi taman kota, dengan pepohonan rindang, lapangan voli, jogging track, arena fitness, arena olahraga.\r\n\r\nDisekitara daerah tugu pensil yang dahulunya tempat sepi, kini menjadi tempat olahraga di pagi dan sore hari, tempat bersantau sambil belajar dengan penataan ruangnya yang asri.\r\n\r\nPada malam hari, kawasan tugu pensil banyak disinggahi masyarakat ya g menikmati udara dan pemandangan laut di malam hari dan lokasi sekitaran tugu pensil kini berdiri rumah makan, kios-kios kecil.\r\n\r\nPemandangan tugu pensil dari lautan, tampak tulisan ‘Tugu Pensil’ besar dengan prasasti Gurindam 12 karya Raja Ali Haji.\r\n\r\nFasilitas lokasi tugu pensil beruoa gazebo, dermaga kecil, arena bermain, papan reklame, Toilet, tempat sampah, Gerbang taman, bangku taman, dan lampu taman.\r\n\r\nSelain sebagai monumen peringatan, masyarakat kota tanjungpinang dan pendatang sering singgah di tugu pensil untuk aktifitas bermain, belajar, olahraga, rekreasi keluarga, tempat bersantai hingga tempat berfoto bersama teman dan keluarga.\r\n\r\nDemikianlah sekilas tentang kawasan tugu pensil, tempat wisata yang ramah bagi semua usia, sendiri, bersama teman ataupun bersama keluarga.', 'https://www.acikepri.com/2018/03/18/sejarah-tugu-pensil-di-kota-tanjung-pinang-yang-perlu-dikunjungi/', 'public/foto_destinasi/3J03LFEX6gXRlXBVGsKhwFyW2eoOV9eRyoNTZDqc.jpg', '2023-11-24 07:33:50', '2023-11-24 07:33:50'),
(6, 'Gurun Pasir Bintan', 'Jl. Raya Busung, Busung, Kec. Seri Kuala Lobam, Kabupaten Bintan, Kepulauan Riau', 'Gurun Pasir Bintan, Gurun Pasir yang Tengah trend di Desa Busung, Kepulauan Riau dikenal menjadi destinasi wisata yang cukup populer dikalangan wisatawan lokal hingga mancanegara. Daerah ini terdiri dari gugusan kepulauan, yang menawarkan deretan pantai eksotis serta pesona alam memukau. Belakangan ini, terdapat sebuah tempat wisata yang tengah trend dan keindahannya bertebaran di media sosial, tempat tersebut dikenal dengan Gurun Pasir Bintan.\r\n\r\nDisarankan bagi para pengunjung yang hendak bertolak ke Gurun Pasir Bintan, untuk menggunakan kendaraan pribadi/sewa kendaraan, atau dengan membeli paket wisata kami disini. Karena masih belum tersedia angkutan umum yang melintasi jalan tersebut. Lokasinya pun tidak sulit untuk ditemukan, pengendara yang melintasi jalan tersebut pasti akan dengan mudah menjumpai fenomena alam unik yang ada di Kepulauan Riau ini.\r\n\r\nGurun Pasir Bintan ini memang tidak tercipta secara alami, namun dulunya merupakan tempat penambangan pasir yang cukup produktif. Bahkan, pasir hasil tambang juga diekspor hingga ke mancanegara. Entah mengapa, beberapa tahun belakangan ini kegiatan penambangan telah dihentikan dan tempat ini dibiarkan begitu saja.\r\nKeunikan yang ditawarkan Gurun Pasir Bintan ini terletak pada gundukan-gundukan yang seolah tercipta secara alami membentuk gelombang indah layaknya gurun pasir di Timur Tengah. Wisatawan bisa duduk santai diatas bukit-bukit kecil, serta merasakan sensasi berada di tengah padang pasir nan luas. Angin sepoi-sepoi pun senantiasa akan menemani wisatawan selama berada di tempat wisata ini.\r\n\r\nDisaat senja tiba, pesona yang ditawarkan Gurun Pasir Busung ini seolah semakin memancarkan keindahannya. Fenomena bukit-bukit kecil nan unik, seakan menjadi sempurna dengan keindahan matahari tenggelam yang secara perlahan bak ditelan bumi. Seketika akan tercipta nuansa romantis, yang sangat cocok bila dinikmati bersama pasangan tercinta pada saat honeymoon.', 'https://www.sewamobilbintan.com/gurun-pasir/', 'public/foto_destinasi/mojtHVCWNlaBTYsq7cbykkD4zjDrTyw2QvgV7Z6u.jpg', '2023-11-24 07:34:09', '2023-11-24 07:34:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_wisata_id_foreign` (`wisata_id`),
  ADD KEY `pesanans_tour_id_foreign` (`tour_id`);

--
-- Indexes for table `terjuals`
--
ALTER TABLE `terjuals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terjuals_user_id_foreign` (`user_id`),
  ADD KEY `terjuals_pesanan_id_foreign` (`pesanan_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wisatas`
--
ALTER TABLE `wisatas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terjuals`
--
ALTER TABLE `terjuals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wisatas`
--
ALTER TABLE `wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`),
  ADD CONSTRAINT `pesanans_wisata_id_foreign` FOREIGN KEY (`wisata_id`) REFERENCES `wisatas` (`id`);

--
-- Constraints for table `terjuals`
--
ALTER TABLE `terjuals`
  ADD CONSTRAINT `terjuals_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`),
  ADD CONSTRAINT `terjuals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
