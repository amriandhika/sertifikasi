-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Jun 2023 pada 08.33
-- Versi server: 10.3.37-MariaDB-cll-lve
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fiwvlmwy_sertifikasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('Draft','Published') NOT NULL DEFAULT 'Draft',
  `description` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `members` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignment_marks`
--

CREATE TABLE `assignment_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `assignment_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` enum('Marked','Unmarked') NOT NULL DEFAULT 'Marked',
  `comments` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `assignment_submissions`
--

CREATE TABLE `assignment_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `assignment_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `marks` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` enum('Marked','Unmarked') NOT NULL DEFAULT 'Marked',
  `description` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `members` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `calendars`
--

CREATE TABLE `calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `certificate_receives`
--

CREATE TABLE `certificate_receives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `certificate_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `certificate_templates`
--

CREATE TABLE `certificate_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `workspace_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `border_color` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `certificate_templates`
--

INSERT INTO `certificate_templates` (`id`, `uuid`, `admin_id`, `workspace_id`, `course_id`, `title`, `signature`, `logo`, `border_color`, `background_color`, `description`, `created_at`, `updated_at`) VALUES
(1, 'e27495a7-174c-422f-b8f6-0499cfc7dbfe', 0, 1, 1, 'Politeknik Meta Industri Cikarang', NULL, 'media/1YjPLvBfh43pw8rVxUWYgq4egPB0BhVEX6903izr.png', '#e6e6e6', '#fafafa', NULL, '2023-06-20 21:42:35', '2023-06-21 04:04:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_sections`
--

CREATE TABLE `contact_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cookie_policies`
--

CREATE TABLE `cookie_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_free` tinyint(1) NOT NULL DEFAULT 0,
  `price` decimal(8,2) UNSIGNED DEFAULT NULL,
  `price_monthly` decimal(8,2) UNSIGNED DEFAULT NULL,
  `price_yearly` decimal(8,2) UNSIGNED DEFAULT NULL,
  `price_two_years` decimal(8,2) UNSIGNED DEFAULT NULL,
  `price_three_years` decimal(8,2) UNSIGNED DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `outcomes` text DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `duration_seconds` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `certificate_template` longtext DEFAULT NULL,
  `certificate_title` varchar(255) DEFAULT NULL,
  `certificate_subtitle` varchar(255) DEFAULT NULL,
  `certificate_description` text DEFAULT NULL,
  `certificate_footer` varchar(255) DEFAULT NULL,
  `certificate_background` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `certificate` enum('No','Yes','Optional') NOT NULL DEFAULT 'No',
  `status` enum('Draft','Published','Unpublished') NOT NULL DEFAULT 'Draft',
  `level` enum('Beginner','Intermediate','Advanced') NOT NULL DEFAULT 'Beginner',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`id`, `uuid`, `workspace_id`, `admin_id`, `category_id`, `is_free`, `price`, `price_monthly`, `price_yearly`, `price_two_years`, `price_three_years`, `deadline`, `outcomes`, `language`, `summary`, `duration`, `duration_seconds`, `name`, `description`, `certificate_template`, `certificate_title`, `certificate_subtitle`, `certificate_description`, `certificate_footer`, `certificate_background`, `image`, `video`, `certificate`, `status`, `level`, `is_featured`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'd641dca1-79a2-46de-afbc-1123dc2253e8', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, '2023-07-22', '[\"Kelas ini merupakan langkah ke-dua Anda untuk menjadi Android Developer.\"]', NULL, '<p><span style=\"color:#3d3d3d;font-family:Quicksand, sans-serif;font-size:16px;background-color:#ffffff;\">Buat aplikasi pertamamu pada Android Studio dengan mempelajari dasar Activity, Intent, View &amp; ViewGroup, Style &amp; Theme sampai RecyclerView.</span></p>', NULL, 0, 'Belajar Membuat Aplikasi Android untuk Pemula', '<p style=\"color:#3f3f46;font-family:Quicksand, sans-serif;font-size:16px;background-color:#ffffff;\">Android merupakan sistem operasi mobile dengan pengguna terbesar di Indonesia, yakni sekitar 90%. Karena itulah banyak perusahaan yang membuat versi Android-nya supaya lebih dekat dengan pelanggannya, seperti Youtube, Facebook, dan Twitter. Perusahaan kecil pun turut membutuhkan aplikasi Android untuk menyelesaikan masalah yang ada. Ini juga menandakan bahwa kebutuhan akan Android developer semakin meningkat. Tak heran, profesi Android developer merupakan 1 dari 5 profesi yang paling diincar perusahaan.</p>\n<ul><li>Sebagian besar masyarakat Indonesia memiliki handphone dengan Android sebagai sistem operasinya, ini merupakan potensi yang besar.</li>\n<li>Android terbukti menjadi solusi untuk permasalahan yang ada di masyarakat, sehingga bisa bermanfaat lebih luas.</li>\n<li>Banyak perusahaan yang membutuhkan Android Developer namun resource yang ada masih sangat sedikit, bahkan dinyatakan darurat.</li>\n<li>Menjadi Android Developer merupakan salah satu pekerjaan yang bisa dilakukan secara freelance, sehingga waktunya bisa lebih fleksibel.</li>\n<li>Android memiliki potensi yang besar untuk menghasilkan uang, seperti melalui iklan Admob, In-App purchase dan membuat proyek aplikasi.</li>\n</ul>\n\n<p><span style=\"font-size:30px;\">Target dan Sasaran Siswa</span>\n</p>\n\n<ul><li>Kelas ini ditujukan bagi pemula yang ingin memulai karirnya di bidang Android Developer dengan mengacu pada standar kompetensi internasional milik Google.</li>\n<li>Kelas dapat diikuti oleh siswa yang melek IT sehingga wajib memiliki dan dapat mengoperasikan komputer dengan baik. </li>\n<li>Kelas ini didesain untuk siswa yang memiliki latar belakang dan pemahaman mengenai pemrograman menggunakan Kotlin atau Java. </li>\n<li>Siswa harus bisa belajar mandiri, berkomitmen, benar-benar punya rasa ingin tahu, dan tertarik pada subjek materi, karena sebaik apa pun materi kelas ini, tidak akan berguna tanpa keseriusan siswa untuk belajar, berlatih, dan mencoba. </li>\n<li>Di akhir kelas, siswa dapat membuat aplikasi Android yang dapat menampilkan list dan detail data.</li>\n</ul>', NULL, NULL, NULL, NULL, NULL, NULL, 'media/aQzptGfMo5I1qsshW3wCFImj2vQ5jq00WRFJcB31.jpg', NULL, 'Yes', 'Published', 'Beginner', 0, '2023-06-20 22:49:50', '2023-06-20 22:49:50', 'belajar-membuat-aplikasi-android-untuk-pemula');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `course_categories`
--

INSERT INTO `course_categories` (`id`, `name`, `slug`, `sort_order`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi', NULL, 0, NULL, '2023-06-20 21:44:23', '2023-06-20 21:44:23'),
(2, 'Industri', NULL, 0, NULL, '2023-06-21 04:05:18', '2023-06-21 04:05:18'),
(3, 'Manajemen', NULL, 0, NULL, '2023-06-21 04:05:34', '2023-06-21 04:05:34'),
(4, 'Farmasi', NULL, 0, NULL, '2023-06-21 04:05:40', '2023-06-21 04:05:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_comments`
--

CREATE TABLE `course_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `visitor_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `agent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `message` text DEFAULT NULL,
  `is_private` tinyint(1) NOT NULL DEFAULT 0,
  `agent_can_view` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_purchases`
--

CREATE TABLE `course_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_reviews`
--

CREATE TABLE `course_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `agent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `star_count` tinyint(3) UNSIGNED NOT NULL,
  `review` text DEFAULT NULL,
  `is_private` tinyint(1) NOT NULL DEFAULT 0,
  `agent_can_view` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_student_relations`
--

CREATE TABLE `course_student_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `credit_cards`
--

CREATE TABLE `credit_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gateway_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `gateway_type` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `company_id` varchar(255) NOT NULL DEFAULT '0',
  `type_id` varchar(255) NOT NULL DEFAULT '0',
  `type` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `related_to` varchar(255) DEFAULT NULL,
  `related_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ebook_purchases`
--

CREATE TABLE `ebook_purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ebook_reviews`
--

CREATE TABLE `ebook_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `agent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `star_count` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `review` text DEFAULT NULL,
  `is_private` tinyint(1) NOT NULL DEFAULT 0,
  `agent_can_view` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `job_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cover_letter` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_pages`
--

CREATE TABLE `landing_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `hero_title` varchar(255) DEFAULT NULL,
  `hero_subtitle` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `hero_paragraph` text DEFAULT NULL,
  `feature1_title` varchar(255) DEFAULT NULL,
  `feature1_subtitle` varchar(255) DEFAULT NULL,
  `feature1_one` varchar(255) DEFAULT NULL,
  `feature1_one_paragraph` text DEFAULT NULL,
  `feature1_two` varchar(255) DEFAULT NULL,
  `feature1_two_paragraph` text DEFAULT NULL,
  `feature1_three` varchar(255) DEFAULT NULL,
  `feature1_three_paragraph` text DEFAULT NULL,
  `feature1_four` varchar(255) DEFAULT NULL,
  `feature1_four_paragraph` text DEFAULT NULL,
  `feature1_five` varchar(255) DEFAULT NULL,
  `feature1_five_paragraph` text DEFAULT NULL,
  `feature1_six` varchar(255) DEFAULT NULL,
  `feature1_six_paragraph` text DEFAULT NULL,
  `feature1_image` varchar(255) DEFAULT NULL,
  `feature1_image_title` varchar(255) DEFAULT NULL,
  `feature1_image_subtitle` varchar(255) DEFAULT NULL,
  `testimonial_sidecard` varchar(255) DEFAULT NULL,
  `testimonial1_image` varchar(255) DEFAULT NULL,
  `testimonial1_student_name` varchar(255) DEFAULT NULL,
  `testimonial1_occupation` varchar(255) DEFAULT NULL,
  `testimonial1_paragraph` text DEFAULT NULL,
  `testimonial2_image` varchar(255) DEFAULT NULL,
  `testimonial2_student_name` varchar(255) DEFAULT NULL,
  `testimonial2_occupation` varchar(255) DEFAULT NULL,
  `testimonial2_paragraph` text DEFAULT NULL,
  `feature2_title` varchar(255) DEFAULT NULL,
  `feature2_subtitle` varchar(255) DEFAULT NULL,
  `feature2_one` varchar(255) DEFAULT NULL,
  `feature2_one_paragraph` text DEFAULT NULL,
  `feature2_two` varchar(255) DEFAULT NULL,
  `feature2_two_paragraph` text DEFAULT NULL,
  `feature2_three` varchar(255) DEFAULT NULL,
  `feature2_three_paragraph` text DEFAULT NULL,
  `feature2_four` varchar(255) DEFAULT NULL,
  `feature2_four_paragraph` text DEFAULT NULL,
  `feature2_five` varchar(255) DEFAULT NULL,
  `feature2_five_paragraph` text DEFAULT NULL,
  `feature2_six` varchar(255) DEFAULT NULL,
  `feature2_six_paragraph` text DEFAULT NULL,
  `feature2_seven` varchar(255) DEFAULT NULL,
  `feature2_seven_paragraph` text DEFAULT NULL,
  `feature2_eight` varchar(255) DEFAULT NULL,
  `feature2_eight_paragraph` text DEFAULT NULL,
  `partners_title` varchar(255) DEFAULT NULL,
  `partners_subtitle` varchar(255) DEFAULT NULL,
  `partners_paragraph` text DEFAULT NULL,
  `calltoaction_title` varchar(255) DEFAULT NULL,
  `calltoaction_subtitle` varchar(255) DEFAULT NULL,
  `story1_title` varchar(255) DEFAULT NULL,
  `story1_paragrapgh` text DEFAULT NULL,
  `story1_image` varchar(255) DEFAULT NULL,
  `story2_title` varchar(255) DEFAULT NULL,
  `story2_paragrapgh` text DEFAULT NULL,
  `story2_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_free` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `duration_seconds` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `file` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `youtube_video` varchar(255) DEFAULT NULL,
  `vimeo_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lesson_completes`
--

CREATE TABLE `lesson_completes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `contents` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `type` enum('Admin','Student') NOT NULL,
  `from_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `to_id` int(10) UNSIGNED DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `sent` tinyint(1) DEFAULT NULL,
  `attachment_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_13_173242_create_documents_table', 1),
(5, '2021_06_15_091441_create_settings_table', 1),
(6, '2021_07_06_212302_create_notes_table', 1),
(7, '2021_07_08_175558_create_calendars_table', 1),
(8, '2021_07_27_190149_create_workspaces_table', 1),
(9, '2021_08_02_202546_create_payment_gateways_table', 1),
(10, '2021_08_03_161432_create_credit_cards_table', 1),
(11, '2022_02_23_185259_create_project_replies_table', 1),
(12, '2022_04_23_093838_create_customers_table', 1),
(13, '2022_05_26_202729_create_courses_table', 1),
(14, '2022_05_26_203010_create_lessons_table', 1),
(15, '2022_05_27_124222_create_course_categories_table', 1),
(16, '2022_05_27_190541_create_landing_pages_table', 1),
(17, '2022_05_27_195222_create_contact_sections_table', 1),
(18, '2022_05_27_224548_create_blogs_table', 1),
(19, '2022_06_01_211858_create_terms_table', 1),
(20, '2022_06_01_212136_create_privacy_policies_table', 1),
(21, '2022_06_07_104357_create_assignments_table', 1),
(22, '2022_06_07_203913_create_products_table', 1),
(23, '2022_06_08_163816_create_students_table', 1),
(24, '2022_06_09_161215_create_course_student_relations_table', 1),
(25, '2022_06_11_104619_create_messages_table', 1),
(26, '2022_06_13_181125_create_assignment_submissions_table', 1),
(27, '2022_06_17_160142_create_certificate_templates_table', 1),
(28, '2022_06_21_190739_create_course_purchases_table', 1),
(29, '2022_06_22_113357_create_certificate_receives_table', 1),
(30, '2022_06_22_113823_create_ebook_purchases_table', 1),
(31, '2022_06_22_210923_create_course_comments_table', 1),
(32, '2022_06_23_121751_create_course_reviews_table', 1),
(33, '2022_06_26_105840_create_ebook_reviews_table', 1),
(34, '2022_06_28_100648_create_assignment_marks_table', 1),
(35, '2022_07_04_181115_create_carts_table', 1),
(36, '2022_07_29_174851_create_orders_table', 1),
(37, '2022_07_29_175055_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `order_total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `order_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `type` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `line_total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `api_name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `api_username` varchar(255) DEFAULT NULL,
  `api_password` varchar(255) DEFAULT NULL,
  `public_key` varchar(255) DEFAULT NULL,
  `private_key` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `instruction` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `live` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `lesson_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `price` decimal(8,2) UNSIGNED DEFAULT NULL,
  `outcomes` text DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_photo` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `author_description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `type` enum('Subscription','Free','Onetime') NOT NULL DEFAULT 'Free',
  `status` enum('Draft','Publish','Unpublished') NOT NULL DEFAULT 'Draft',
  `level` enum('Beginner','Intermediate','Advanced') NOT NULL DEFAULT 'Beginner',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `sort_order`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pemrograman', NULL, 0, NULL, '2023-06-21 04:06:05', '2023-06-21 04:06:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_replies`
--

CREATE TABLE `project_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `visitor_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `agent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `project_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `message` text DEFAULT NULL,
  `is_private` tinyint(1) NOT NULL DEFAULT 0,
  `agent_can_view` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `mark` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `answer` text DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `course_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `student_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_quiz_questions` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_answers_given` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_correct_answers` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_skipped_questions` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_obtained_marks` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `workspace_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'company_name', 'CloudOnex', '2022-08-14 00:21:01', '2022-08-14 00:21:01'),
(2, 1, 'installed_build_id', '5', '2023-06-20 21:36:16', '2023-06-20 21:36:16'),
(3, 1, 'currency', 'IDR', '2023-06-20 21:39:00', '2023-06-20 21:39:00'),
(4, 1, 'landingpage', 'Default', '2023-06-20 21:39:00', '2023-06-20 21:39:00'),
(5, 1, 'custom_script', NULL, '2023-06-20 21:39:00', '2023-06-20 21:39:00'),
(6, 1, 'meta_description', 'Politeknik Meta Industri; Cikarang; Sertifikasi; Magang; Sekolah Vokasi; Mahasiswa; Kelas Karyawan; Cikarang', '2023-06-20 21:39:00', '2023-06-20 21:47:03'),
(7, 1, 'logo', 'media/evxNvlUdWVnVyI2HReK9owm7GhF2n7hKMVo4M7W5.png', '2023-06-20 21:39:00', '2023-06-20 21:41:25'),
(8, 1, 'favicon', 'media/63CmQEpKM0ZvmxUJPVgyj9lAWgvPL2ZcDllNsje0.png', '2023-06-20 21:39:00', '2023-06-20 21:41:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `company_id` varchar(255) NOT NULL DEFAULT '0',
  `type_id` varchar(255) NOT NULL DEFAULT '0',
  `type` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password_reset_key` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `language` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_conversion` datetime DEFAULT NULL,
  `last_conversion_ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password_reset_key` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `last_conversion` datetime DEFAULT NULL,
  `last_conversion_ip` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `timezone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uuid`, `workspace_id`, `first_name`, `last_name`, `email`, `phone_number`, `password_reset_key`, `mobile_number`, `twitter`, `facebook`, `linkedin`, `address_1`, `address_2`, `zip`, `city`, `state`, `country`, `email_verified_at`, `password`, `last_login`, `language`, `photo`, `cover_photo`, `super_admin`, `last_conversion`, `last_conversion_ip`, `remember_token`, `created_at`, `updated_at`, `description`, `timezone`) VALUES
(1, '14bcac10-c752-4f70-92ae-8261eb7e2ea0', 1, 'Andhika', 'Chaniago', 'andhika.it09@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$KpgIVrW1h9eA/KoXBC36O..cgOREQZQWO4KUYE9rbUVuC9GXRle1a', '2023-06-21 04:37:59', NULL, NULL, NULL, 1, NULL, NULL, 'DK6akYCOFt438S5z4NCzcgEPMIP3LPrrq4HDLaYdrJXjMp0blP1CEXvL8uqP', '2022-08-14 00:21:01', '2023-06-20 21:37:59', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `workspaces`
--

CREATE TABLE `workspaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `owner_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `subscribed` tinyint(1) NOT NULL DEFAULT 0,
  `term` varchar(255) DEFAULT NULL,
  `subscription_start_date` date DEFAULT NULL,
  `next_renewal_date` date DEFAULT NULL,
  `price` decimal(8,2) UNSIGNED DEFAULT NULL,
  `trial` tinyint(1) NOT NULL DEFAULT 1,
  `trial_start_date` date DEFAULT NULL,
  `trial_end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `workspaces`
--

INSERT INTO `workspaces` (`id`, `name`, `plan_id`, `owner_id`, `active`, `subscribed`, `term`, `subscription_start_date`, `next_renewal_date`, `price`, `trial`, `trial_start_date`, `trial_end_date`, `created_at`, `updated_at`) VALUES
(1, 'CloudOnex', 0, 0, 1, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-14 00:21:01', '2022-08-14 00:21:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `assignment_marks`
--
ALTER TABLE `assignment_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `certificate_receives`
--
ALTER TABLE `certificate_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `certificate_templates`
--
ALTER TABLE `certificate_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact_sections`
--
ALTER TABLE `contact_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_sections_email_unique` (`email`),
  ADD UNIQUE KEY `contact_sections_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `contact_sections_twitter_unique` (`twitter`),
  ADD UNIQUE KEY `contact_sections_facebook_unique` (`facebook`),
  ADD UNIQUE KEY `contact_sections_linkedin_unique` (`linkedin`),
  ADD UNIQUE KEY `contact_sections_youtube_unique` (`youtube`),
  ADD UNIQUE KEY `contact_sections_address_1_unique` (`address_1`),
  ADD UNIQUE KEY `contact_sections_address_2_unique` (`address_2`),
  ADD UNIQUE KEY `contact_sections_zip_unique` (`zip`),
  ADD UNIQUE KEY `contact_sections_city_unique` (`city`),
  ADD UNIQUE KEY `contact_sections_state_unique` (`state`),
  ADD UNIQUE KEY `contact_sections_country_unique` (`country`);

--
-- Indeks untuk tabel `cookie_policies`
--
ALTER TABLE `cookie_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `course_comments`
--
ALTER TABLE `course_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `course_purchases`
--
ALTER TABLE `course_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `course_student_relations`
--
ALTER TABLE `course_student_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ebook_purchases`
--
ALTER TABLE `ebook_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ebook_reviews`
--
ALTER TABLE `ebook_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_pages`
--
ALTER TABLE `landing_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lesson_completes`
--
ALTER TABLE `lesson_completes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `project_replies`
--
ALTER TABLE `project_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_password_reset_key_unique` (`password_reset_key`);

--
-- Indeks untuk tabel `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `users_password_reset_key_unique` (`password_reset_key`),
  ADD UNIQUE KEY `users_mobile_number_unique` (`mobile_number`),
  ADD UNIQUE KEY `users_twitter_unique` (`twitter`),
  ADD UNIQUE KEY `users_facebook_unique` (`facebook`),
  ADD UNIQUE KEY `users_linkedin_unique` (`linkedin`),
  ADD UNIQUE KEY `users_address_1_unique` (`address_1`),
  ADD UNIQUE KEY `users_address_2_unique` (`address_2`),
  ADD UNIQUE KEY `users_zip_unique` (`zip`),
  ADD UNIQUE KEY `users_city_unique` (`city`),
  ADD UNIQUE KEY `users_state_unique` (`state`),
  ADD UNIQUE KEY `users_country_unique` (`country`);

--
-- Indeks untuk tabel `workspaces`
--
ALTER TABLE `workspaces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `assignment_marks`
--
ALTER TABLE `assignment_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `certificate_receives`
--
ALTER TABLE `certificate_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `certificate_templates`
--
ALTER TABLE `certificate_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact_sections`
--
ALTER TABLE `contact_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cookie_policies`
--
ALTER TABLE `cookie_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `course_comments`
--
ALTER TABLE `course_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `course_purchases`
--
ALTER TABLE `course_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `course_reviews`
--
ALTER TABLE `course_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `course_student_relations`
--
ALTER TABLE `course_student_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ebook_purchases`
--
ALTER TABLE `ebook_purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ebook_reviews`
--
ALTER TABLE `ebook_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `landing_pages`
--
ALTER TABLE `landing_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lesson_completes`
--
ALTER TABLE `lesson_completes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `project_replies`
--
ALTER TABLE `project_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `workspaces`
--
ALTER TABLE `workspaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
