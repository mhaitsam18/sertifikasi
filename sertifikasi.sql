-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 02:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_acara_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pendaftaran_buka` datetime NOT NULL,
  `pendaftaran_tutup` datetime NOT NULL,
  `pelaksanaan_buka` datetime NOT NULL,
  `pelaksanaan_tutup` datetime NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` double(16,2) NOT NULL,
  `kuota` int(11) NOT NULL,
  `status_acara_id` bigint(20) UNSIGNED DEFAULT NULL,
  `koordinator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_valid` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id`, `nama`, `deskripsi`, `kategori_acara_id`, `pendaftaran_buka`, `pendaftaran_tutup`, `pelaksanaan_buka`, `pelaksanaan_tutup`, `lokasi`, `biaya`, `kuota`, `status_acara_id`, `koordinator_id`, `prodi_id`, `thumbnail`, `is_valid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pembukaan Seminar Sertifikasi', '<div>Pembukaan Seminar</div>', 1, '2022-03-20 06:31:13', '2022-03-20 06:31:13', '2022-03-20 06:31:13', '2022-03-20 06:31:13', 'Bandung', 150000.00, 1000, 6, 1, NULL, 'thumbnail-acara/seminar.jpg', 1, '2022-03-20 05:33:01', '2022-05-21 07:26:53', NULL),
(2, 'Ngoding Bareng', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem sed quia odio sint vel repudiandae, obcaecati facilis dicta temporibus et sapiente odit velit beatae officia quas aliquam eum. Non aliquid corporis reprehenderit doloribus exercitationem libero aut perferendis itaque voluptas, id temporibus omnis commodi aspernatur distinctio repudiandae debitis. Ipsam odit animi nulla ratione est deleniti, voluptates vero voluptate aspernatur officia impedit culpa molestiae laborum necessitatibus ullam dolores doloribus perspiciatis ut delectus, dicta dolorem cum nostrum neque! Atque illum alias in quisquam asperiores! At ratione ab recusandae magnam fugit accusamus fuga, atque laboriosam distinctio officia nulla magni dolore praesentium amet animi veniam inventore numquam alias iure enim quae dolorum. Fuga aperiam temporibus quos a corporis quae necessitatibus? Unde consequatur repellat corrupti ducimus, cumque fugiat veritatis nesciunt excepturi? Velit aspernatur facilis voluptatum amet magni, quia dolor! Earum nostrum eligendi porro asperiores placeat incidunt corrupti sit, doloribus exercitationem facilis. Consequatur architecto, eos autem ullam laboriosam sint amet porro beatae quaerat? Repellendus eligendi perferendis voluptates quae, officiis illo quos quo sit, esse accusamus libero dignissimos est ipsa corporis recusandae expedita natus quas molestiae nostrum doloremque explicabo veritatis delectus tempora. Cumque modi mollitia, in repellendus dolorem maxime deserunt nesciunt, quos laudantium ipsam nostrum, illum veniam quia velit nemo itaque quasi aspernatur neque optio? Esse saepe veritatis dignissimos dolorem consequatur deserunt optio error? A quisquam suscipit ex esse delectus non sunt reprehenderit quo laborum atque necessitatibus aperiam deleniti blanditiis repudiandae magni voluptatum facilis ab, voluptas itaque cumque, officiis nesciunt earum vitae consectetur! Error aspernatur ducimus hic quae nihil, eum nemo voluptas, fugiat, impedit voluptatum quidem similique. Aliquid modi quidem dolores adipisci eos neque sunt. Repudiandae repellat corrupti minus, nisi dolor perferendis nostrum quisquam totam deleniti quaerat nihil laboriosam placeat ad, iusto voluptate sed tempore! Facere obcaecati delectus quam itaque sed sit corporis porro similique expedita et eligendi inventore, cum voluptatibus adipisci, rerum, dolores consequatur modi? Molestiae illo architecto necessitatibus modi earum molestias error, velit nulla placeat magnam, doloribus veniam quas. Quo, provident. Nesciunt magnam alias id delectus ratione unde aperiam, laborum vitae ab sint architecto, maiores perferendis accusantium aspernatur, odio nihil culpa! Corporis dolorem atque deserunt ducimus voluptates error, repudiandae amet dolorum ratione iusto a consectetur consequatur tempore ipsam, placeat hic. Eveniet, provident molestias quia omnis, distinctio beatae optio quae quos unde cum tempore rerum suscipit maxime quam necessitatibus vitae. Rerum natus, dicta maiores, quidem illo, maxime quam molestiae blanditiis pariatur tempora perferendis magnam nobis. Animi nulla, dignissimos corporis quae facilis possimus veritatis facere omnis sapiente sequi quis ex expedita libero et, dolorem voluptatem alias ipsam earum aliquid nihil tempore sed? Odio eum quae alias, consequuntur nam, blanditiis iure officiis dolore culpa, impedit ipsam assumenda voluptate optio ut quibusdam est ducimus quisquam accusamus. Doloremque dignissimos et ea harum eaque autem libero sequi, quidem, animi veritatis distinctio reiciendis? Aliquid ipsa magni, enim molestiae unde non, molestias voluptatibus dolor ipsam accusantium vero pariatur, praesentium velit quae aliquam quod culpa nobis qui autem accusamus porro incidunt exercitationem. Pariatur officiis dolorum similique a soluta, error obcaecati quasi, aspernatur voluptates possimus vero minima placeat iure explicabo consequuntur! Accusamus tempore modi architecto aliquid, consequatur, dolorem vitae incidunt, sint libero natus rem? Illum accusamus eum quis blanditiis consequatur tempora magnam accusantium perferendis quasi nam. Asperiores inventore perspiciatis tempore odio deleniti voluptates nobis ullam atque ab ducimus ea aliquam quaerat ad sint illum, facere neque molestiae dolorum nesciunt ipsam tenetur numquam alias! Deleniti iure harum laboriosam voluptatibus reprehenderit, magnam facere rerum maiores neque esse cum suscipit accusamus odit id nulla quam animi dolore, ipsum asperiores molestiae sed. Eum molestiae, voluptate optio rerum cum pariatur repellat quasi accusamus nihil commodi! Dolor explicabo magnam ex illo iusto. Iste, voluptates atque. Sequi officia numquam ratione enim minima sunt perferendis exercitationem nam minus libero quisquam sapiente praesentium ipsum, rem deleniti dolores pariatur illum harum ea magnam itaque laboriosam consectetur, quia nesciunt? Sunt facere adipisci, explicabo assumenda, error officiis voluptatem eos optio, magni vero rem nisi quisquam minus eveniet pariatur dolores? Commodi ipsa nobis aliquam, necessitatibus voluptate iusto eius excepturi adipisci, asperiores aperiam quidem, ab autem consequuntur explicabo amet architecto nam totam dignissimos expedita distinctio quia. Nisi adipisci labore alias accusantium qui! Fugit quo voluptate facere reprehenderit quis libero dolores tempora a aperiam exercitationem, facilis inventore quibusdam optio accusamus. Veritatis quis molestias, porro nesciunt doloribus eligendi in dolorum, ab ad aut ipsum voluptatum possimus nostrum tempore aspernatur voluptas officiis pariatur quo inventore nobis iste? Voluptatem unde perferendis aliquid quas temporibus laboriosam voluptate ab odit maxime quidem! Ab voluptates tenetur iure laudantium libero suscipit maiores, reprehenderit placeat consequuntur perspiciatis dicta cum ipsam quibusdam natus nesciunt ullam praesentium culpa delectus minus quasi! Cum at, quia laborum deleniti ducimus porro facilis est voluptatum optio amet minus necessitatibus. Deserunt aperiam delectus, rerum esse vel molestias tempore aspernatur iusto modi consequuntur explicabo ut corrupti excepturi distinctio nesciunt ullam suscipit. Aliquid ducimus repudiandae cumque qui expedita rem sapiente repellendus dignissimos, et tenetur enim. Voluptatibus id quidem facilis reprehenderit, molestias voluptas repellendus? Nesciunt exercitationem quibusdam quasi illum totam ad expedita asperiores assumenda harum minus odio, a doloribus ipsa, nam dicta labore tempore ut. Dolorum voluptatibus voluptatum, similique ad, amet obcaecati recusandae sit in deleniti sed odit alias aspernatur incidunt praesentium? Unde excepturi aliquid qui corrupti adipisci repellendus officiis repudiandae atque nulla facere provident inventore, velit sint! Similique possimus illum eaque aliquam rerum recusandae sunt nisi deleniti facilis eos, harum iure hic aliquid commodi odio dolor consectetur error doloremque laborum. Similique, dolorum accusantium? Veniam assumenda vitae consequatur quae reiciendis, aperiam in, aut repellat ea eveniet eaque distinctio beatae corrupti odit! Quia ad nam totam magni dolorum iusto autem ullam in. Magni ratione eveniet nostrum fuga corporis alias ab. Vitae, autem! Corrupti debitis at, sed rerum est qui consequatur error, molestias quae optio minima laboriosam temporibus obcaecati nisi voluptatem tempora ipsa fugiat eius magnam, consequuntur neque! Sit deleniti fugiat reiciendis perferendis nisi ad fuga placeat quisquam in, at voluptatum quam aperiam. Voluptatem dolores debitis exercitationem similique aspernatur inventore nemo, sed repudiandae! Quis, laborum ipsam perspiciatis assumenda totam commodi enim, corrupti, odio explicabo nam ratione saepe eum officia cupiditate cumque!', 1, '2022-03-31 10:00:00', '2022-04-06 23:59:00', '2022-04-11 07:00:00', '2022-04-23 22:00:00', 'https://meet.google.com/htt-rguu-dmi', 150000.00, 100, 7, 1, NULL, 'thumbnail-acara/azure.jpg', 1, '2022-03-29 03:26:07', '2022-05-21 07:26:51', NULL),
(3, 'Pelatihan Microsoft Azure', 'Berlatih bersama Microsoft, seru dan asyik sekali', 2, '2022-04-01 17:13:35', '2022-04-02 17:13:35', '2022-04-03 17:13:35', '2022-04-09 17:13:35', 'Bandung', 250000.00, 120, 6, 3, NULL, 'thumbnail-acara/azure.jpg', 1, '2022-04-03 10:18:17', '2022-05-02 09:39:40', NULL),
(4, 'Tes EPrT', '<div>Tes EPrT Telkom University Ngoding Bareng Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</div>', 1, '2022-03-01 09:00:00', '2022-04-30 23:59:00', '2022-04-04 07:00:00', '2022-04-09 17:13:35', 'Telkom University', 250000.00, 500, 2, 2, NULL, 'thumbnail-acara/9fVBEs4FYlXHnvOJkQxVzjHdiWp0jom3rvNNZwLa.png', 1, '2022-04-03 10:18:29', '2022-08-01 14:02:10', NULL),
(5, 'Kuliah Umum Analisis Perancangna Sistem Informasi', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>', 1, '2022-07-20 12:00:00', '2022-07-30 12:00:00', '2022-08-01 14:00:00', '2022-08-01 14:00:00', 'https://meet.google.com/htt-rguu-dmi', 0.00, 1000, 2, 1, NULL, 'thumbnail-acara/ur6EWXNP5U054ZOfxoLF04e0NUiaBn9Ee0YxJ20H.jpg', 1, '2022-07-20 04:59:54', '2022-09-01 17:04:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `agama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2022-02-23 06:50:48', '2022-02-23 06:50:48'),
(2, 'Kristen Protestan', '2022-02-23 06:50:48', '2022-02-23 06:50:48'),
(3, 'Kristen Katolik', '2022-02-23 06:50:48', '2022-02-23 06:50:48'),
(4, 'Hindu', '2022-02-23 06:50:48', '2022-02-23 06:50:48'),
(5, 'Buddha', '2022-02-23 06:50:48', '2022-02-23 06:50:48'),
(6, 'Konghucu', '2022-02-23 06:50:48', '2022-02-23 06:50:48'),
(7, 'Yahudi', '2022-02-23 06:50:48', '2022-02-23 06:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis_id` bigint(20) UNSIGNED DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) DEFAULT 0,
  `publish_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `excerpt`, `isi`, `penulis_id`, `thumbnail`, `views`, `publish_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Website Sertifikasi dibuka', 'website-sertifikasi-dibuka', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, quibusdam? Nihil impedit laboriosam adipisci dolore doloremque iusto quisquam in nostrum necessitatibus et? Itaque culpa voluptate ali...', '<div><strong>Lorem ipsum</strong> <em>dolor sit amet consectetur adipisicing elit. Dolorum, quibusdam? </em>Nihil impedit laboriosam adipisci dolore doloremque iusto quisquam in nostrum necessitatibus et? Itaque culpa voluptate alias cumque labore quidem nobis cum! Qui ipsum unde, voluptas ipsam nulla adipisci inventore fugiat temporibus, cum quaerat animi eos impedit enim laborum minus quod explicabo iusto reprehenderit necessitatibus ratione atque blanditiis quo. Quos consectetur assumenda voluptate natus enim dolorum culpa fugit illo. Quam tenetur odio nam ut vel dolor rerum fugiat, iure quae libero architecto labore corporis. Nisi vitae placeat voluptate optio, repellendus necessitatibus neque laborum repellat dolorem? Rem minima deleniti consectetur fugiat! In?</div>', 1, 'thumbnail-berita/w8apoK8utzp58Nzn9L8vYqghey4UDLVuNtLjcYfx.jpg', 0, NULL, '2022-02-28 23:35:34', '2022-04-17 04:57:20', NULL),
(2, 'Ini adalah Berita kedua', 'ini-adalah-berita-kedua', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inv...', '<div><strong>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inventore quos odio quia </strong>pariatur dolore veniam, corrupti quasi, minima soluta. Voluptatum rem consequuntur reiciendis aliquam, totam neque, exercitationem commodi architecto nobis optio iste repudiandae! Architecto, esse voluptates.</div>', 1, 'thumbnail-berita/sPIzoiUk6iQ132W33I2e2vIuuNl2DVd8vr6JdfP7.jpg', 0, '2022-05-21 14:27:14', '2022-03-01 08:11:40', '2022-05-21 07:27:14', NULL),
(3, 'Ini adalah Berita ketiga', 'ini-adalah-berita-ketiga', 'Coba saja kalo jadi Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inv...', '<div>Coba saja kalo jadi Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inv...</div>', 1, 'thumbnail-berita/8fvWbuVGEDq64EodEcppVBGSdRTlcDGYaDxccW3G.jpg', 0, '2022-03-01 15:16:09', '2022-03-01 08:16:10', '2022-03-01 08:16:10', NULL),
(4, 'Percobaan ke empat', 'percobaan-ke-empat', 'coba aja deh Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inv...', '<div>coba aja deh Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inv...</div>', 1, 'thumbnail-berita/g5gduEAlcc54HiGn3F5ScgmHYzsksgMzIo4AOggF.jpg', 0, '2022-03-01 15:54:05', '2022-03-01 08:54:05', '2022-05-21 07:27:35', '2022-05-21 07:27:35'),
(5, 'Percobaan ke lima pasti berhasil', 'percobaan-ke-lima-pasti-berhasil', 'Pasti Berhasil Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam...', '<div>Pasti Berhasil Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inv...</div>', 1, 'thumbnail-berita/UW5ggNYMwR0Xcdoprwq7C4RbsnTAemaSv36VE4Hm.jpg', 1, '2022-05-21 14:29:08', '2022-03-01 09:19:23', '2022-05-21 07:29:08', NULL),
(6, 'Percobaan ke enam, barangkali gagal', 'percobaan-ke-enam-barangkali-gagal', 'Coba coba aja&nbsp; Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inv...', '<div>Coba coba aja&nbsp; Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inv...</div>', 1, 'thumbnail-berita/xYX9fYTlZAK5Gt9ucizrMrSZKZJ8klVh1fOw2QYg.jpg', 9, '2022-03-01 16:25:08', '2022-03-01 09:25:08', '2022-04-20 14:39:33', NULL),
(7, 'Coba terakhir', 'coba-terakhir', 'boleh jadi boleh dicoba Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inv...', '<div>boleh jadi boleh dicoba Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad, autem? Qui odit quae distinctio a fugiat repellat repellendus assumenda quas, velit officia placeat. Dicta, incidunt! Ullam temporibus inv...</div>', 1, 'thumbnail-berita/V0BPlC1LlhD6cqs5SdY9OWfy1fdFHVSDHOKWNx5n.jpg', 5, '2022-03-11 04:34:44', '2022-03-10 21:34:44', '2022-04-20 13:54:25', NULL),
(8, 'Rusia menginvasi 1/4 Ukraina', 'rusia-menginvasi-1-4-ukraina', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolorem harum adipisci magnam illum nam voluptatem nihil fuga, veniam error a expedita eius dolorum possimus explicabo hic. Praesentium, inc...', '<div><strong>Lorem ipsum dolor sit amet</strong> <em>consectetur adipisicing elit.</em> Et dolorem harum adipisci magnam illum nam voluptatem nihil fuga, veniam error a expedita eius dolorum possimus explicabo hic. Praesentium, incidunt nostrum.</div>', 2, 'thumbnail-berita/3QZ1g6kORQA6FbgF6HNkLUw95Y6zejEMzYjY14sl.jpg', 2, '2022-04-20 21:05:47', '2022-04-20 14:05:05', '2022-04-20 14:38:47', NULL),
(9, 'Maling Teriak Maling! Dirjen Bisiki Mendag Mafia Migor Malah Jadi Tersangka', 'maling-teriak-maling-dirjen-bisiki-mendag-mafia-migor-malah-jadi-tersangka', 'Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.', '<div>Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.</div>', 1, 'thumbnail-berita/EgBky4A92Mbzlg9E3dDqTQ0jneZVlUSCDwIf8ftN.jpg', 91, '2022-04-20 21:36:55', '2022-04-20 14:36:55', '2022-08-28 06:25:41', NULL),
(10, 'Mendaki Gunung', 'berita-baru', 'Berita Baru', '<div>Berita Baru</div>', 1, 'thumbnail-berita/al75Zj4aUd6c97mqhBfWm6orO0MNAZKaL5Nm11Lm.jpg', 4, NULL, '2022-05-17 17:52:57', '2022-08-28 07:04:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara`
--

CREATE TABLE `berita_acara` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_acara_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_peserta` int(11) NOT NULL,
  `total_kehadiran` int(11) NOT NULL DEFAULT 0,
  `total_izin` int(11) NOT NULL DEFAULT 0,
  `total_alpa` int(11) NOT NULL DEFAULT 0,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita_acara`
--

INSERT INTO `berita_acara` (`id`, `jadwal_acara_id`, `total_peserta`, `total_kehadiran`, `total_izin`, `total_alpa`, `catatan`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 11, 2, 1, 1, 0, 'Yenny Izin', 0, '2022-05-02 13:15:03', '2022-05-02 13:15:03'),
(2, 15, 1, 1, 0, 0, 'baik baik aja', 0, '2022-08-01 13:23:28', '2022-08-01 13:23:28'),
(3, 32, 1, 1, 0, 0, 'oke', 0, '2022-08-01 13:52:22', '2022-08-01 13:52:22'),
(4, 1, 0, 0, 0, 0, 'ga ada siswa', 0, '2022-08-30 11:10:22', '2022-08-30 11:10:22'),
(9, 6, 1, 0, 1, 0, 'tidak hadir', 0, '2022-08-30 11:21:03', '2022-08-30 11:21:03'),
(10, 2, 0, 0, 0, 0, 'Bagus', 0, '2022-08-30 13:49:41', '2022-08-30 13:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengirim_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penerima_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `share_berita_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `pengirim_id`, `penerima_id`, `pesan`, `is_read`, `share_berita_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 5, 'Saya Nadila', 0, NULL, '2022-08-28 19:30:46', '2022-08-29 19:30:46', NULL),
(2, 5, 3, 'holaaa', 0, NULL, '2022-08-30 07:34:52', '2022-08-30 07:34:52', NULL),
(3, 5, 7, 'oii, jangan so akrab ama pacar gue', 0, NULL, '2022-08-30 08:17:11', '2022-08-30 08:17:11', NULL),
(4, 3, 3, 'apa woy', 0, NULL, '2022-08-30 08:26:00', '2022-08-30 08:26:00', NULL),
(5, 3, 5, 'ih dodol', 0, NULL, '2022-08-30 08:26:43', '2022-08-30 08:26:43', NULL),
(6, 5, 3, 'maneh yang dodol', 0, NULL, '2022-08-30 08:38:09', '2022-08-30 08:38:09', NULL),
(7, 3, 5, 'naha aing ih yang dodol na?', 0, NULL, '2022-08-30 08:38:24', '2022-08-30 08:38:24', NULL),
(8, 3, 5, 'naha aing ih yang dodol na?', 0, NULL, '2022-08-30 08:38:31', '2022-08-30 08:38:31', NULL),
(9, 3, 5, 'haloo', 0, NULL, '2022-08-30 08:48:28', '2022-08-30 08:48:28', NULL),
(10, 5, 3, 'apaaa', 0, NULL, '2022-08-30 08:48:52', '2022-08-30 08:48:52', NULL),
(11, 3, 5, 'tadi', 0, NULL, '2022-08-30 08:49:03', '2022-08-30 08:49:03', NULL),
(12, 5, 3, 'wih berhasil nad', 0, NULL, '2022-08-30 08:49:19', '2022-08-30 08:49:19', NULL),
(13, 3, 5, 'berhasil apa', 0, NULL, '2022-08-30 08:49:30', '2022-08-30 08:49:30', NULL),
(14, 4, 3, 'halo', 0, NULL, '2022-09-02 04:21:09', '2022-09-02 04:21:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kode_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dan_gelar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_kaprodi` tinyint(1) NOT NULL DEFAULT 0,
  `is_koordinator` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `user_id`, `prodi_id`, `kode_dosen`, `nama_dan_gelar`, `nidn`, `nip`, `is_kaprodi`, `is_koordinator`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, NULL, 'WIU', '', '04290674', '14740031', 1, 1, '2022-02-23 06:50:50', '2022-02-23 06:50:50', NULL),
(2, 5, NULL, 'NFS', '', '04291234', '14741234', 0, 1, '2022-02-23 06:50:50', '2022-02-23 06:50:50', NULL),
(3, 6, NULL, 'ANS', '', '04290643', '14740192', 0, 1, '2022-02-23 06:50:50', '2022-02-23 06:50:50', NULL),
(4, 9, NULL, 'MBS', '', '1201310', '12319182', 0, 1, '2022-04-21 08:51:12', '2022-04-21 09:20:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_role_advance`
--

CREATE TABLE `dosen_role_advance` (
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `role_advance_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_role_advance`
--

INSERT INTO `dosen_role_advance` (`dosen_id`, `role_advance_id`) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 3),
(3, 3),
(3, 2);

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
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `singkatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `kode`, `nama`, `singkatan`, `created_at`, `updated_at`) VALUES
(1, '', 'Fakultas Teknik Elektro', 'FTE', '2022-05-15 08:12:46', '2022-05-15 08:12:52'),
(2, '', 'Fakultas Rekayasa Industri', 'FRI', '2022-05-15 08:12:56', '2022-05-15 08:13:00'),
(3, '', 'Fakultas Informatika', 'FIF', '2022-05-15 08:13:03', '2022-05-15 08:13:07'),
(4, '', 'Fakultas Ekonomi dan Bisnis', 'FEB', '2022-05-15 08:13:11', '2022-05-15 08:13:15'),
(5, '', 'Fakultas Komunikasi dan Bisnis', 'FKB', '2022-05-15 08:13:17', '2022-05-15 08:13:24'),
(6, '', 'Fakultas Industri Kreatif', 'FIK', '2022-05-15 08:13:27', '2022-05-15 08:13:30'),
(7, '', 'Fakultas Ilmu Terapan', 'FIT', '2022-05-15 08:13:33', '2022-05-15 08:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acara_id` bigint(20) UNSIGNED NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `acara_id`, `fasilitas`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sertifikat', 'Mendapatkan Sertifikat yang baik', '2022-04-21 06:47:00', '2022-04-21 07:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `instruktur_acara`
--

CREATE TABLE `instruktur_acara` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `acara_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instruktur_acara`
--

INSERT INTO `instruktur_acara` (`id`, `dosen_id`, `acara_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-04-20 14:07:21', '2022-04-20 14:07:21'),
(2, 2, 2, '2022-04-20 14:07:21', '2022-04-20 14:07:21'),
(3, 1, 3, '2022-05-02 09:19:35', '2022-05-02 09:19:35'),
(4, 2, 3, '2022-05-02 09:19:37', '2022-05-02 09:19:37'),
(5, 3, 3, '2022-05-02 09:19:40', '2022-05-02 09:19:40'),
(6, 4, 3, '2022-05-02 09:19:42', '2022-05-02 09:19:42'),
(7, 1, 2, '2022-05-18 07:58:31', '2022-05-18 07:58:31'),
(8, 2, 1, '2022-05-21 07:56:04', '2022-05-21 07:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_acara`
--

CREATE TABLE `jadwal_acara` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_acara_id` bigint(20) UNSIGNED DEFAULT NULL,
  `instruktur_id` bigint(20) UNSIGNED NOT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '#',
  `materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_dimulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `status_jadwal_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_ujian` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_acara`
--

INSERT INTO `jadwal_acara` (`id`, `kelas_acara_id`, `instruktur_id`, `ruangan`, `link`, `materi`, `tanggal`, `waktu_dimulai`, `waktu_selesai`, `status_jadwal_id`, `keterangan`, `is_ujian`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 'BULT  Telkom University', '#', 'Algoritma dasar', '2022-04-14', '10:00:00', '12:00:00', 2, 'To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental', 0, '2022-04-02 03:42:07', '2022-04-16 04:56:38'),
(2, 1, 1, 'BULT  Telkom University', '#', 'Algoritma dasar', '2022-04-09', '12:30:00', '13:30:00', 1, 'To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental', 0, '2022-04-02 04:27:19', '2022-05-02 04:27:01'),
(3, 2, 1, 'BULT  Telkom University', '#', 'Algoritma dasar', '2022-04-08', '12:30:00', '13:30:00', 2, 'To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental', 0, '2022-04-02 04:27:19', '2022-04-16 05:03:05'),
(4, 3, 1, 'BULT  Telkom University', '#', 'Algoritma dasar', '2022-04-08', '12:30:00', '13:30:00', 2, 'To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental', 0, '2022-04-02 04:27:19', '2022-04-16 05:03:10'),
(5, 4, 2, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Algoritma Lanjut', '2022-04-20', '21:00:00', '22:00:00', 2, 'To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental', 0, '2022-04-20 14:08:59', '2022-04-20 14:09:08'),
(6, 4, 2, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Algoritma dasar', '2022-04-25', '15:30:00', '18:00:00', 1, 'To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental', 0, '2022-04-25 05:34:47', '2022-04-25 05:34:47'),
(7, 5, 2, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Algoritma dasar', '2022-04-25', '15:30:00', '18:00:00', 1, 'To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental', 0, '2022-04-25 05:34:47', '2022-04-25 05:34:47'),
(8, 6, 2, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Algoritma dasar', '2022-04-25', '15:30:00', '18:00:00', 2, 'To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental', 0, '2022-04-25 05:34:47', '2022-05-22 15:28:05'),
(9, 8, 3, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure', '2022-05-20', '09:30:00', '10:30:00', 1, 'Oke', 0, '2022-05-02 09:22:20', '2022-05-02 09:22:20'),
(10, 9, 3, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure', '2022-05-20', '09:30:00', '10:30:00', 1, 'Oke', 0, '2022-05-02 09:22:20', '2022-05-02 09:22:20'),
(11, 10, 3, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure', '2022-05-20', '09:30:00', '10:30:00', 2, 'Oke', 0, '2022-05-02 09:22:20', '2022-05-10 15:11:15'),
(12, 11, 3, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure', '2022-05-20', '09:30:00', '10:30:00', 1, 'Oke', 0, '2022-05-02 09:22:20', '2022-05-02 09:22:20'),
(13, 8, 1, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure Lanjutan', '2022-05-23', '18:30:00', '21:00:00', 1, 'Oke', 0, '2022-05-02 09:33:00', '2022-05-02 09:33:00'),
(14, 9, 2, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure Lanjutan', '2022-05-23', '18:30:00', '21:00:00', 1, 'Oke', 0, '2022-05-02 09:33:00', '2022-05-02 09:33:00'),
(15, 10, 3, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure Lanjutan', '2022-05-23', '18:30:00', '21:00:00', 1, 'Oke', 0, '2022-05-02 09:33:00', '2022-05-02 09:33:00'),
(16, 11, 4, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure Lanjutan', '2022-05-23', '18:30:00', '21:00:00', 1, 'Oke', 0, '2022-05-02 09:33:00', '2022-05-02 09:33:00'),
(21, 8, 1, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'azure itu lebih bagus dari googlecollab', '2022-08-02', '20:31:00', '21:31:00', 1, 'Okeee', 0, '2022-08-01 13:37:05', '2022-08-01 13:37:05'),
(22, 9, 2, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'azure itu lebih bagus dari googlecollab', '2022-08-02', '20:31:00', '21:31:00', 1, 'Okeee', 0, '2022-08-01 13:37:05', '2022-08-01 13:37:05'),
(23, 10, 3, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'azure itu lebih bagus dari googlecollab', '2022-08-02', '20:31:00', '21:31:00', 1, 'Okeee', 0, '2022-08-01 13:37:05', '2022-08-01 13:37:05'),
(24, 11, 4, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'azure itu lebih bagus dari googlecollab', '2022-08-02', '20:31:00', '21:31:00', 1, 'Okeee', 0, '2022-08-01 13:37:05', '2022-08-01 13:37:05'),
(25, 8, 3, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'azure itu lebih bagus dari googlecollab', '2022-08-02', '20:31:00', '21:31:00', 1, 'Okeee', 0, '2022-08-01 13:37:26', '2022-08-01 13:37:26'),
(26, 9, 3, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'azure itu lebih bagus dari googlecollab', '2022-08-02', '20:31:00', '21:31:00', 1, 'Okeee', 0, '2022-08-01 13:37:26', '2022-08-01 13:37:26'),
(27, 10, 3, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'azure itu lebih bagus dari googlecollab', '2022-08-02', '20:31:00', '21:31:00', 1, 'Okeee', 0, '2022-08-01 13:37:26', '2022-08-01 13:37:26'),
(28, 11, 3, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'azure itu lebih bagus dari googlecollab', '2022-08-02', '20:31:00', '21:31:00', 1, 'Okeee', 0, '2022-08-01 13:37:26', '2022-08-01 13:37:26'),
(30, 8, 6, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure Lanjutan', '2022-08-16', '01:45:00', '02:45:00', 1, 'okey', 0, '2022-08-01 13:46:15', '2022-08-01 13:46:15'),
(31, 9, 6, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure Lanjutan', '2022-08-16', '01:45:00', '02:45:00', 1, 'okey', 0, '2022-08-01 13:46:15', '2022-08-01 13:46:15'),
(32, 10, 6, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure Lanjutan', '2022-08-16', '01:45:00', '02:45:00', 1, 'okey', 0, '2022-08-01 13:46:15', '2022-08-01 13:46:15'),
(33, 11, 6, 'Google Meet', 'https://meet.google.com/fmz-mahp-aqk', 'Pengenalan Azure Lanjutan', '2022-08-16', '01:45:00', '02:45:00', 1, 'okey', 0, '2022-08-01 13:46:15', '2022-08-01 13:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_acara`
--

CREATE TABLE `kategori_acara` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_acara`
--

INSERT INTO `kategori_acara` (`id`, `kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sertifikasi', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(2, 'Pelatihan', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_notifikasi`
--

CREATE TABLE `kategori_notifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_notifikasi`
--

INSERT INTO `kategori_notifikasi` (`id`, `kategori`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notifikasi', NULL, '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(2, 'Pendaftaran Baru', 1, '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(3, 'Konfirmasi Pembayaran', 1, '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(4, 'Status Approval', 2, '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(5, 'Sertifikat Selesai', 2, '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(6, 'Berita Baru', 2, '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(7, 'Chat', 3, '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'D3SI-43-01', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(2, 'D3SI-43-02', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(3, 'D3SI-43-03', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(4, 'D3SI-43-04', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(5, 'D3SI-44-01', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(6, 'D3SI-44-02', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(7, 'D3SI-44-03', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(8, 'D3SI-44-04', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(9, 'D3SI-45-01', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(10, 'D3SI-45-02', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(11, 'D3SI-45-03', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(12, 'D3SI-45-04', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_acara`
--

CREATE TABLE `kelas_acara` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acara_id` bigint(20) UNSIGNED NOT NULL,
  `instruktur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas_acara`
--

INSERT INTO `kelas_acara` (`id`, `acara_id`, `instruktur_id`, `nama`, `kuota`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'A', 25, '2022-03-31 12:21:51', '2022-03-31 12:21:51'),
(2, 1, 1, 'B', 25, '2022-03-31 13:51:11', '2022-03-31 13:51:11'),
(3, 1, 1, 'C', 25, '2022-03-31 13:51:29', '2022-03-31 13:53:37'),
(4, 2, 2, 'NB-01', 30, '2022-04-02 03:26:21', '2022-09-02 04:10:11'),
(5, 2, 1, 'NB-02', 25, '2022-04-25 03:18:52', '2022-05-18 08:00:18'),
(6, 2, 2, 'NB-03', 25, '2022-04-25 03:18:52', '2022-04-25 03:18:52'),
(7, 1, 1, 'D', 25, '2022-04-25 03:57:07', '2022-04-25 04:25:17'),
(8, 3, 1, 'Azure 1', 25, '2022-05-02 09:20:11', '2022-05-02 09:20:11'),
(9, 3, 2, 'Azure 2', 25, '2022-05-02 09:20:23', '2022-05-02 09:20:23'),
(10, 3, 3, 'Azure 3', 25, '2022-05-02 09:20:36', '2022-05-02 09:20:36'),
(11, 3, 4, 'Azure 4', 25, '2022-05-02 09:20:48', '2022-05-02 09:20:48'),
(12, 1, 1, 'E', 25, '2022-09-02 04:14:48', '2022-09-02 04:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_berita`
--

CREATE TABLE `komentar_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `berita_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar_berita`
--

INSERT INTO `komentar_berita` (`id`, `berita_id`, `user_id`, `komentar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 3, 'Saya mau julid', '2022-04-25 09:28:39', '2022-04-25 09:57:01', '2022-04-25 09:57:01'),
(2, 9, 3, 'boleh saya julid?', '2022-04-25 09:28:51', '2022-05-21 07:31:04', '2022-05-21 07:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `like_berita`
--

CREATE TABLE `like_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `berita_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `like_berita`
--

INSERT INTO `like_berita` (`id`, `berita_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 9, 3, '2022-05-21 07:46:21', '2022-05-21 07:46:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fakultas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prodi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_ktm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ksm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transkip_nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `user_id`, `fakultas_id`, `prodi_id`, `kelas_id`, `nim`, `scan_ktm`, `ksm`, `transkip_nilai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, NULL, NULL, 1, '6701194088', 'ktm-mahasiswa/ktm-nadila.jpeg', 'ksm-mahasiswa/VsJ3B2Tr0kUB6Jx0dEe3pmlUwtZbMNBFKDCZ9KGz.pdf', 'transkip-nilai-mahasiswa/riBXyZMa2Yzo71b554ndLOhU8hHnvtcftVluVxQR.pdf', '2022-02-23 06:50:50', '2022-08-28 09:43:10', NULL),
(2, 7, NULL, NULL, 4, '6701184040', 'ktm-mahasiswa/sNeDOQ1uOufW6l0ntlW5Ipahz65yXXDmWgJd8vLI.jpg', NULL, NULL, '2022-03-11 20:09:51', '2022-03-11 20:09:51', NULL),
(3, 8, NULL, NULL, 9, '1202218458', 'ktm-mahasiswa/djjuc32c7os9ktTC6vBQqxR3ZsR6dLmd1YYYHYGL.jpg', NULL, NULL, '2022-04-15 00:52:52', '2022-04-15 00:52:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acara_id` bigint(20) UNSIGNED NOT NULL,
  `materi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `acara_id`, `materi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pengertian Seminar', '2022-05-11 03:20:45', '2022-05-11 03:21:15'),
(2, 1, 'Penutup', '2022-05-11 03:21:30', '2022-05-11 03:21:30'),
(3, 2, 'Algoritma dasar', '2022-05-11 03:22:21', '2022-05-11 03:22:21'),
(4, 2, 'Algoritma Lanjut', '2022-05-11 03:22:28', '2022-05-11 03:22:28'),
(5, 4, 'Tes EPrT', '2022-05-11 03:45:04', '2022-05-11 03:45:04'),
(6, 3, 'Pengertian Azure', '2022-05-11 03:45:46', '2022-05-11 03:45:46');

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
(1, '2013_02_22_115711_create_roles_table', 1),
(2, '2013_02_23_132729_create_agamas_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_02_22_143716_create_role_advances_table', 1),
(8, '2022_02_22_150301_create_status_pesertas_table', 1),
(9, '2022_02_22_151851_create_status_jadwals_table', 1),
(10, '2022_02_22_160012_create_status_acaras_table', 1),
(11, '2022_02_22_160840_create_rekenings_table', 1),
(12, '2022_02_22_161535_create_kelas_table', 1),
(13, '2022_02_22_161858_create_kategori_notifikasis_table', 1),
(14, '2022_02_22_163829_create_kategori_acaras_table', 1),
(15, '2022_02_22_171156_create_beritas_table', 1),
(16, '2022_02_23_021026_create_chats_table', 1),
(17, '2022_02_23_075146_create_mahasiswas_table', 1),
(18, '2022_02_23_081036_create_dosens_table', 1),
(19, '2022_02_23_081940_create_komentar_beritas_table', 1),
(20, '2022_02_23_082630_create_like_beritas_table', 1),
(21, '2022_02_23_083613_create_notifikasis_table', 1),
(22, '2022_02_23_090033_create_dosen_role_advances_table', 1),
(23, '2022_02_23_091532_create_share_beritas_table', 1),
(24, '2022_02_23_093559_create_acaras_table', 1),
(25, '2022_02_23_103747_create_kelas_acaras_table', 1),
(26, '2022_02_23_103748_create_jadwal_acaras_table', 1),
(27, '2022_02_23_112329_create_pesertas_table', 1),
(28, '2022_02_23_123515_create_ratings_table', 1),
(29, '2022_02_23_131453_create_sertifikats_table', 1),
(30, '2022_02_23_133040_create_berita_acaras_table', 1),
(31, '2022_02_23_133749_create_pembayarans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peserta_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` double(16,2) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL,
  `is_take` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `peserta_id`, `nilai`, `sertifikat`, `is_take`, `created_at`, `updated_at`) VALUES
(1, 2, 90.00, 'sertifikat/kOntuTSLbvw72bY2qACiXkCO3SLXMgT6koulwdgr.jpg', 1, '2022-05-16 09:30:39', '2022-05-21 07:32:34'),
(2, 1, 94.00, 'sertifikat/6701194088_ngoding-bareng.jpg', 0, '2022-05-18 08:01:41', '2022-08-01 14:09:56'),
(3, 3, 78.00, NULL, 0, '2022-05-21 07:57:35', '2022-05-21 07:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_notifikasi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subjek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `creator_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `user_id`, `kategori_notifikasi_id`, `sub_id`, `subjek`, `pesan`, `is_read`, `creator_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 6, 10, 'Berita Baru', 'Doni Mendaki Gunung', 1, 1, '2022-08-28 04:26:51', '2022-08-28 08:05:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peserta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rekening_tujuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rekening_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_transfer` datetime NOT NULL,
  `nominal_transfer` double(16,2) NOT NULL,
  `bukti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `is_valid` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `peserta_id`, `rekening_tujuan_id`, `rekening_pengirim`, `bank_pengirim`, `nama_pengirim`, `waktu_transfer`, `nominal_transfer`, `bukti`, `catatan`, `keterangan`, `is_valid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '0634526114', 'BNI', 'Muhammad Haitsam', '2022-04-20 17:37:00', 150000.00, 'bukti-transfer/r2gMLuVRH5LHdMTIJDQ4FPc8QYxDyHvHukVmMx1Z.jpg', 'Oke', 'Makasih ya', 1, '2022-04-20 10:39:56', '2022-04-21 04:44:32', NULL),
(2, 2, 1, '1234', 'BNI', 'Christine Yenny', '2022-05-02 16:03:00', 250000.00, 'bukti-transfer/im6yzGA5gQk89gLfpkhKO2J1KnDpNM2L7bWpFM7e.jpg', 'Makasih', 'Valid', 1, '2022-05-02 09:03:41', '2022-05-02 09:08:48', NULL),
(3, 3, 2, '1234', 'BNI', 'Rayhan', '2022-05-02 16:12:00', 250000.00, 'bukti-transfer/2L6f6JDEy6G1d389wW0yJCYGu2FBmBSG6kpzx1H6.jpg', NULL, NULL, 1, '2022-05-02 09:12:52', '2022-05-02 09:13:35', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `acara_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tagihan` double(16,2) NOT NULL,
  `sisa_tagihan` float(16,2) NOT NULL,
  `status_peserta_id` bigint(20) UNSIGNED DEFAULT 1,
  `kelas_acara_id` bigint(20) UNSIGNED DEFAULT NULL,
  `berkas_valid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `mahasiswa_id`, `acara_id`, `tagihan`, `sisa_tagihan`, `status_peserta_id`, `kelas_acara_id`, `berkas_valid_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 150000.00, 0.00, 3, 4, NULL, '2022-04-20 02:57:01', '2022-08-28 09:49:56', NULL),
(2, 2, 3, 250000.00, 0.00, 3, 10, NULL, '2022-05-02 09:02:58', '2022-05-16 12:49:55', NULL),
(3, 1, 3, 250000.00, 0.00, 3, 10, NULL, '2022-05-02 09:12:15', '2022-05-02 09:57:27', NULL),
(4, 1, 5, 0.00, 0.00, 3, NULL, '2022-09-01 17:44:42', '2022-09-01 17:04:24', '2022-09-01 17:44:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peserta_id` bigint(20) UNSIGNED NOT NULL,
  `berita_acara_id` bigint(20) UNSIGNED NOT NULL,
  `is_present` tinyint(1) NOT NULL,
  `keterangan` varchar(255) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `peserta_id`, `berita_acara_id`, `is_present`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, 'Sakit', '2022-05-02 13:15:03', '2022-05-02 13:15:03'),
(2, 3, 1, 1, '', '2022-05-02 13:15:03', '2022-05-02 13:15:03'),
(3, 3, 2, 0, '', '2022-08-01 13:23:28', '2022-08-01 13:23:28'),
(4, 3, 3, 1, '', '2022-08-01 13:52:22', '2022-08-01 13:52:22'),
(6, 1, 9, 0, '', '2022-08-30 11:21:03', '2022-08-30 11:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kaprodi_id` bigint(20) UNSIGNED NOT NULL,
  `fakultas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `singkatan`, `nama`, `keterangan`, `kaprodi_id`, `fakultas_id`, `created_at`, `updated_at`) VALUES
(1, 'D3SI', 'D3 Sistem Informasi', 'Akreditasi A', 1, 7, '2022-02-18 10:33:38', '2022-02-18 10:33:38'),
(2, 'D3TE', 'D3 Digital Connectivity', 'Akreditasi Unggul', 1, 7, '2022-02-18 10:33:38', '2022-02-18 10:33:38'),
(3, 'D3TI', 'D3 Teknik Informatika', 'Akreditasi Unggul', 1, 7, '2022-02-18 10:33:38', '2022-02-18 10:33:38'),
(4, 'D3SIA', 'D3 Sistem Informasi Akuntansi', 'Akreditasi A', 1, 7, '2022-02-18 10:33:38', '2022-02-18 10:33:38'),
(5, 'D3TK', 'D3 Teknik Komputer', 'Akreditasi Unggul', 1, 7, '2022-02-18 10:33:38', '2022-02-18 10:33:38'),
(6, 'D3DM', 'D3 Digital Marketing', 'Akreditasi B', 1, 7, '2022-02-18 10:33:38', '2022-02-18 10:33:38'),
(7, 'DCA', 'S1 Terapan Digital Creative Multimedia', 'Akreditasi C', 1, 7, '2022-02-18 10:33:39', '2022-02-18 10:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `acara_id` bigint(20) UNSIGNED DEFAULT NULL,
  `peserta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `komentar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `acara_id`, `peserta_id`, `rating`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 3, 'kek ada yang kurang', '2022-04-24 18:40:04', '2022-04-26 13:39:42'),
(2, 3, 3, 5, 'Mantep banget', '2022-05-21 07:42:28', '2022-05-21 07:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `bank`, `nomor_rekening`, `atas_nama`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mandiri', '1234567890', 'Nadila Rahmatika', 'nadila@gmail.com', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(2, 'BNI', '021389120831', 'M. Rayhan Hafidz Siregar', 'rayhan@gmail.com', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(3, 'BCA', '9382730213', 'Nuriffah Syahirah', 'ipeh@gmail.com', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(4, 'BRI', '0987654321', 'Andini Septia', 'andiniseptia60@gmail.com', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(2, 'Mahasiswa', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(3, 'Dosen', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(4, 'Developer', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_advance`
--

CREATE TABLE `role_advance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_advance`
--

INSERT INTO `role_advance` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kaprodi', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(2, 'Koordinator', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(3, 'Instruktur', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peserta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_take` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `peserta_id`, `nama`, `sertifikat`, `keterangan`, `is_take`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sertifikat Juara 1', 'sertifikat/sertifikat.jpg', 'meraih Juara 1', 0, '2022-05-16 08:25:30', '2022-05-16 08:25:30'),
(2, 3, 'Sertifikat Juara 2', 'sertifikat/sertifikat.jpg', 'meraih Juara 2', 0, '2022-05-16 08:48:32', '2022-05-16 08:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `share_berita`
--

CREATE TABLE `share_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `berita_id` bigint(20) UNSIGNED NOT NULL,
  `via` enum('WhatsApp','Chat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_acara`
--

CREATE TABLE `status_acara` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_acara`
--

INSERT INTO `status_acara` (`id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Akan dibuka', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(2, 'Pendaftaran dibuka', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(3, 'Acara dibatalkan', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(4, 'Acara diundur', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(5, 'Pendaftaran ditutup', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(6, 'Sedang Berlangsung', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(7, 'Selesai', '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_jadwal`
--

CREATE TABLE `status_jadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_jadwal`
--

INSERT INTO `status_jadwal` (`id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Akan dilaksanakan', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(2, 'Terlaksana', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(3, 'Tidak Terlaksana (diundur/dimajukan)', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(4, 'Tidak Terlaksana (dibatalkan/ditiadakan)', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_peserta`
--

CREATE TABLE `status_peserta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_peserta`
--

INSERT INTO `status_peserta` (`id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Menunggu Persetujuan', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(2, 'Ditolak', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(3, 'Aktif / diterima', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(4, 'Mengundurkan diri', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(5, 'Diskualifikasi', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(6, 'Lulus', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL),
(7, 'Tidak Lulus', '2022-02-23 06:50:48', '2022-02-23 06:50:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('Islam','Kristen Protestan','Kristen Katolik','Budha','Hindu','Konghucu','Yahudi') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nomor_telepon`, `alamat`, `agama`, `tentang`, `foto`, `email_verified_at`, `password`, `role_id`, `is_active`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aplikasi Sertifikasi', 'sertifikasi@telkomuniversity.ac.id', 'Laki-laki', 'Telkom University', '1998-02-18', '082117503125', 'Bandung', 'Islam', '<div>Halooo, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, rerum quae, natus, animi et ad quo quos sunt omnis consequuntur voluptate obcaecati at fuga eos doloremque nobis dicta saepe iure.</div>', 'foto-profil/default.jpeg', NULL, '$2y$10$x86ICGWz.LKtEkrnNHX77el3CAJUnV8UsKFc/drKCNK0uQEdH5RJe', 1, 1, NULL, '2022-02-23 06:50:49', '2022-04-21 09:58:13', NULL),
(2, 'M. Rayhan Hafidz Siregar', 'rayhan@tass.telkomuniversity.ac.id', 'Laki-laki', 'Medan', '2000-02-23', '081334015015', 'Medan', 'Islam', 'Halooo, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, rerum quae, natus, animi et ad quo quos sunt omnis consequuntur voluptate obcaecati at fuga eos doloremque nobis dicta saepe iure.', 'foto-profil/default.jpeg', NULL, '$2y$10$o7qBNrjkCYay29mQjUsib.J9LnLq2/wHOyaD4Qgym6ekciSK6aOVW', 1, 1, NULL, '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(3, 'Nadila Rahmatika', 'nadila@student.telkomuniversity.ac.id', 'Perempuan', 'Ngawi', '2000-11-02', '089506531139', 'Bandung', 'Islam', 'Halooo, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, rerum quae, natus, animi et ad quo quos sunt omnis consequuntur voluptate obcaecati at fuga eos doloremque nobis dicta saepe iure.', 'foto-profil/nadila-rahmatika.jpeg', NULL, '$2y$10$Httn7WiV14NDETercevzNedPTIOuxkD4qHRfOt5ehTxiFf4TBqlTu', 2, 1, NULL, '2022-02-23 06:50:49', '2022-03-29 17:03:27', NULL),
(4, 'Wawa Wikusna', 'si.vokasi@tass.telkomuniversity.ac.id', 'Laki-laki', 'Bandung', '1967-02-19', '081320604160', 'Bandung', 'Islam', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, rerum quae, natus, animi et ad quo quos sunt omnis consequuntur voluptate obcaecati at fuga eos doloremque nobis dicta saepe iure.', 'foto-profil/wawa-wikusna.jpeg', NULL, '$2y$10$Ay2mCfiK7fq4wi95MidLN.eTATGAqAV0Ubg.cIQdVaGUvZq1sxsi.', 3, 1, NULL, '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(5, 'Nuriffah Syahirah', 'nuriffah@tass.telkomuniversity.ac.id', 'Perempuan', 'Kota', '2022-02-23', '082274822295', 'Bandung', 'Islam', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, rerum quae, natus, animi et ad quo quos sunt omnis consequuntur voluptate obcaecati at fuga eos doloremque nobis dicta saepe iure.', 'foto-profil/nuriffah-syahirah.jpeg', NULL, '$2y$10$uZXCCWKJjvPrNf4oUCgfGuZ2uvagvGWbrcpqZRk/u5YQ/HVqIlZOO', 3, 1, NULL, '2022-02-23 06:50:49', '2022-02-23 06:50:49', NULL),
(6, 'Calon', 'dutabiawak@tass.telkomuniversity.ac.id', 'Perempuan', 'Jakarta', '2001-08-29', '081285508410', 'Bandung', 'Islam', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, rerum quae, natus, animi et ad quo quos sunt omnis consequuntur voluptate obcaecati at fuga eos doloremque nobis dicta saepe iure.', 'foto-profil/default.jpeg', NULL, '$2y$10$sRWETc/4piP6GgCbOWPHPulwfFxnlSRKNftiAtYyTTIf.pzvB6cXq', 3, 1, NULL, '2022-02-23 06:50:50', '2022-02-23 06:50:50', NULL),
(7, 'Christine Yenny', 'christine@student.telkomuniversity.ac.id', 'Perempuan', 'Kalimantan', '2022-03-02', '082117503120', 'Kalimantan', 'Islam', 'Hebat', 'foto-profil/t0rJoRXfYM2K9QbiuVT3dC668lwnjvwPw81NAGqx.jpg', NULL, '$2y$10$FHhE00gzwdNcH.mlWdtzNerTx0.XcLY.EqMIjQNENT8LY8c5f2Kny', 2, 1, NULL, '2022-03-11 20:09:51', '2022-03-11 20:09:51', NULL),
(8, 'Dudung', 'dudung@student.telkomuniversity.ac.id', 'Laki-laki', 'Bandung', '2022-04-15', '82117503125', 'Bandung', 'Islam', 'Oke', 'foto-profil/X5bWssRfoWQIEXHfa1pQiTyhfEw1PMcYMcly0jwM.jpg', NULL, '$2y$10$3hBRJeOQBaepKOSgVK5J3.OJbKD9ZPmi2u/1zJ/A//o3s0DrV9uHq', 2, 1, NULL, '2022-04-15 00:52:51', '2022-04-15 00:52:51', NULL),
(9, 'Muhammad Barja Sanjaya', 'mbarja@tass.telkomuniversity.ac.id', 'Laki-laki', 'Bandung', '1978-05-19', '081313141120', 'Jl. Bandung', 'Islam', '<div>Dosennya baik banget</div>', 'foto-profil/IkuIiCIxxdjp6lV8Nv1zA8PKCdxfrLOUAw8ooNcy.png', NULL, '$2y$10$I44GuIUTFYHMV8lkbd7jiOJMYD8HLEslmre.mwYVzTo2We4CB8yp2', 3, 1, NULL, '2022-04-21 08:51:12', '2022-04-21 08:51:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acara_kategori_acara_id_foreign` (`kategori_acara_id`),
  ADD KEY `acara_status_acara_id_foreign` (`status_acara_id`),
  ADD KEY `acara_koordinator_id_foreign` (`koordinator_id`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `berita_penulis_id_foreign` (`penulis_id`);

--
-- Indexes for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_acara_jadwal_acara_id_foreign` (`jadwal_acara_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_pengirim_id_foreign` (`pengirim_id`),
  ADD KEY `chat_penerima_id_foreign` (`penerima_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_kode_dosen_unique` (`kode_dosen`),
  ADD UNIQUE KEY `dosen_nidn_unique` (`nidn`),
  ADD UNIQUE KEY `dosen_nip_unique` (`nip`),
  ADD KEY `dosen_user_id_foreign` (`user_id`);

--
-- Indexes for table `dosen_role_advance`
--
ALTER TABLE `dosen_role_advance`
  ADD KEY `dosen_role_advance_dosen_id_foreign` (`dosen_id`),
  ADD KEY `dosen_role_advance_role_advance_id_foreign` (`role_advance_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acara_id` (`acara_id`);

--
-- Indexes for table `instruktur_acara`
--
ALTER TABLE `instruktur_acara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `acara_id` (`acara_id`);

--
-- Indexes for table `jadwal_acara`
--
ALTER TABLE `jadwal_acara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_acara_kelas_acara_id_foreign` (`kelas_acara_id`),
  ADD KEY `jadwal_acara_instruktur_id_foreign` (`instruktur_id`),
  ADD KEY `jadwal_acara_status_jadwal_id_foreign` (`status_jadwal_id`);

--
-- Indexes for table `kategori_acara`
--
ALTER TABLE `kategori_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_acara`
--
ALTER TABLE `kelas_acara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_acara_acara_id_foreign` (`acara_id`),
  ADD KEY `instruktur_id` (`instruktur_id`);

--
-- Indexes for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentar_berita_berita_id_foreign` (`berita_id`),
  ADD KEY `komentar_berita_user_id_foreign` (`user_id`);

--
-- Indexes for table `like_berita`
--
ALTER TABLE `like_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_berita_berita_id_foreign` (`berita_id`),
  ADD KEY `like_berita_user_id_foreign` (`user_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswa_nim_unique` (`nim`),
  ADD KEY `mahasiswa_user_id_foreign` (`user_id`),
  ADD KEY `mahasiswa_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acara_id` (`acara_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasi_user_id_foreign` (`user_id`),
  ADD KEY `notifikasi_kategori_notifikasi_id_foreign` (`kategori_notifikasi_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_peserta_id_foreign` (`peserta_id`),
  ADD KEY `pembayaran_rekening_tujuan_id_foreign` (`rekening_tujuan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `peserta_acara_id_foreign` (`acara_id`),
  ADD KEY `peserta_status_peserta_id_foreign` (`status_peserta_id`),
  ADD KEY `peserta_kelas_acara_id_foreign` (`kelas_acara_id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_acara_id` (`berita_acara_id`),
  ADD KEY `peserta_id` (`peserta_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_acara_id_foreign` (`acara_id`),
  ADD KEY `rating_peserta_id_foreign` (`peserta_id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_advance`
--
ALTER TABLE `role_advance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sertifikat_peserta_id_foreign` (`peserta_id`);

--
-- Indexes for table `share_berita`
--
ALTER TABLE `share_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `share_berita_user_id_foreign` (`user_id`),
  ADD KEY `share_berita_berita_id_foreign` (`berita_id`);

--
-- Indexes for table `status_acara`
--
ALTER TABLE `status_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_jadwal`
--
ALTER TABLE `status_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_peserta`
--
ALTER TABLE `status_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instruktur_acara`
--
ALTER TABLE `instruktur_acara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal_acara`
--
ALTER TABLE `jadwal_acara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kategori_acara`
--
ALTER TABLE `kategori_acara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_notifikasi`
--
ALTER TABLE `kategori_notifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelas_acara`
--
ALTER TABLE `kelas_acara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `like_berita`
--
ALTER TABLE `like_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_advance`
--
ALTER TABLE `role_advance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `share_berita`
--
ALTER TABLE `share_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_acara`
--
ALTER TABLE `status_acara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `status_jadwal`
--
ALTER TABLE `status_jadwal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_peserta`
--
ALTER TABLE `status_peserta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acara`
--
ALTER TABLE `acara`
  ADD CONSTRAINT `acara_kategori_acara_id_foreign` FOREIGN KEY (`kategori_acara_id`) REFERENCES `kategori_acara` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `acara_koordinator_id_foreign` FOREIGN KEY (`koordinator_id`) REFERENCES `dosen` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `acara_status_acara_id_foreign` FOREIGN KEY (`status_acara_id`) REFERENCES `status_acara` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_penulis_id_foreign` FOREIGN KEY (`penulis_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD CONSTRAINT `berita_acara_jadwal_acara_id_foreign` FOREIGN KEY (`jadwal_acara_id`) REFERENCES `jadwal_acara` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_penerima_id_foreign` FOREIGN KEY (`penerima_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_pengirim_id_foreign` FOREIGN KEY (`pengirim_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `dosen_role_advance`
--
ALTER TABLE `dosen_role_advance`
  ADD CONSTRAINT `dosen_role_advance_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_role_advance_role_advance_id_foreign` FOREIGN KEY (`role_advance_id`) REFERENCES `role_advance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`acara_id`) REFERENCES `acara` (`id`);

--
-- Constraints for table `instruktur_acara`
--
ALTER TABLE `instruktur_acara`
  ADD CONSTRAINT `instruktur_acara_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instruktur_acara_ibfk_2` FOREIGN KEY (`acara_id`) REFERENCES `acara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_acara`
--
ALTER TABLE `jadwal_acara`
  ADD CONSTRAINT `jadwal_acara_kelas_acara_id_foreign` FOREIGN KEY (`kelas_acara_id`) REFERENCES `kelas_acara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_acara_status_jadwal_id_foreign` FOREIGN KEY (`status_jadwal_id`) REFERENCES `status_jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas_acara`
--
ALTER TABLE `kelas_acara`
  ADD CONSTRAINT `kelas_acara_acara_id_foreign` FOREIGN KEY (`acara_id`) REFERENCES `acara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_acara_ibfk_1` FOREIGN KEY (`instruktur_id`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD CONSTRAINT `komentar_berita_berita_id_foreign` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_berita_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_berita`
--
ALTER TABLE `like_berita`
  ADD CONSTRAINT `like_berita_berita_id_foreign` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_berita_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`acara_id`) REFERENCES `acara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_kategori_notifikasi_id_foreign` FOREIGN KEY (`kategori_notifikasi_id`) REFERENCES `kategori_notifikasi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `notifikasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_peserta_id_foreign` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_rekening_tujuan_id_foreign` FOREIGN KEY (`rekening_tujuan_id`) REFERENCES `rekening` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_acara_id_foreign` FOREIGN KEY (`acara_id`) REFERENCES `acara` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_kelas_acara_id_foreign` FOREIGN KEY (`kelas_acara_id`) REFERENCES `kelas_acara` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_status_peserta_id_foreign` FOREIGN KEY (`status_peserta_id`) REFERENCES `status_peserta` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`berita_acara_id`) REFERENCES `berita_acara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_acara_id_foreign` FOREIGN KEY (`acara_id`) REFERENCES `acara` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_peserta_id_foreign` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_peserta_id_foreign` FOREIGN KEY (`peserta_id`) REFERENCES `peserta` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `share_berita`
--
ALTER TABLE `share_berita`
  ADD CONSTRAINT `share_berita_berita_id_foreign` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `share_berita_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
