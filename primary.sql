CREATE TABLE `assignments` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `workspace_id` int(10) UNSIGNED NOT NULL,
                               `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                               `course_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                               `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                               `marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                               `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                               `start_date` date DEFAULT NULL,
                               `end_date` date DEFAULT NULL,
                               `status` enum('Draft','Published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
                               `description` text COLLATE utf8mb4_unicode_ci,
                               `notes` text COLLATE utf8mb4_unicode_ci,
                               `message` longtext COLLATE utf8mb4_unicode_ci,
                               `members` text COLLATE utf8mb4_unicode_ci,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `assignment_marks` (
                                    `id` bigint(20) UNSIGNED NOT NULL,
                                    `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                    `course_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                    `assignment_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                    `student_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                    `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `status` enum('Marked','Unmarked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Marked',
                                    `comments` text COLLATE utf8mb4_unicode_ci,
                                    `notes` text COLLATE utf8mb4_unicode_ci,
                                    `message` longtext COLLATE utf8mb4_unicode_ci,
                                    `created_at` timestamp NULL DEFAULT NULL,
                                    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `assignment_submissions` (
                                          `id` bigint(20) UNSIGNED NOT NULL,
                                          `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                                          `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                          `course_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                          `assignment_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                          `student_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                          `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                          `marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                          `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                          `start_date` date DEFAULT NULL,
                                          `end_date` date DEFAULT NULL,
                                          `status` enum('Marked','Unmarked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Marked',
                                          `description` text COLLATE utf8mb4_unicode_ci,
                                          `notes` text COLLATE utf8mb4_unicode_ci,
                                          `message` longtext COLLATE utf8mb4_unicode_ci,
                                          `members` text COLLATE utf8mb4_unicode_ci,
                                          `created_at` timestamp NULL DEFAULT NULL,
                                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `blogs` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `workspace_id` int(10) UNSIGNED NOT NULL,
                         `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                         `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `notes` text COLLATE utf8mb4_unicode_ci,
                         `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `calendars` (
                             `id` bigint(20) UNSIGNED NOT NULL,
                             `workspace_id` int(10) UNSIGNED NOT NULL,
                             `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                             `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `start_date` datetime DEFAULT NULL,
                             `end_date` datetime DEFAULT NULL,
                             `description` text COLLATE utf8mb4_unicode_ci,
                             `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `created_at` timestamp NULL DEFAULT NULL,
                             `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `carts` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `product_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                         `quantity` int(10) UNSIGNED NOT NULL DEFAULT '0',
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `certificate_receives` (
                                        `id` bigint(20) UNSIGNED NOT NULL,
                                        `certificate_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                        `student_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                        `created_at` timestamp NULL DEFAULT NULL,
                                        `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `certificate_templates` (
                                         `id` bigint(20) UNSIGNED NOT NULL,
                                         `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                                         `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                         `workspace_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                         `course_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                         `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                         `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                         `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                         `border_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                         `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                         `description` text COLLATE utf8mb4_unicode_ci,
                                         `created_at` timestamp NULL DEFAULT NULL,
                                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `contact_sections` (
                                    `id` bigint(20) UNSIGNED NOT NULL,
                                    `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                    `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `created_at` timestamp NULL DEFAULT NULL,
                                    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `courses` (
                           `id` bigint(20) UNSIGNED NOT NULL,
                           `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `workspace_id` int(10) UNSIGNED NOT NULL,
                           `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                           `category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                           `price` decimal(8,2) UNSIGNED DEFAULT NULL,
                           `price_monthly` decimal(8,2) UNSIGNED DEFAULT NULL,
                           `price_yearly` decimal(8,2) UNSIGNED DEFAULT NULL,
                           `price_two_years` decimal(8,2) UNSIGNED DEFAULT NULL,
                           `price_three_years` decimal(8,2) UNSIGNED DEFAULT NULL,
                           `deadline` date DEFAULT NULL,
                           `outcomes` text COLLATE utf8mb4_unicode_ci,
                           `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `summary` text COLLATE utf8mb4_unicode_ci,
                           `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `description` text COLLATE utf8mb4_unicode_ci,
                           `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `certificate` enum('No','Yes','Optional') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
                           `status` enum('Draft','Published','Unpublished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
                           `level` enum('Beginner','Intermediate','Advanced') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Beginner',
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `course_categories` (
                                     `id` bigint(20) UNSIGNED NOT NULL,
                                     `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                     `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                     `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
                                     `description` text COLLATE utf8mb4_unicode_ci,
                                     `created_at` timestamp NULL DEFAULT NULL,
                                     `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `course_comments` (
                                   `id` bigint(20) UNSIGNED NOT NULL,
                                   `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `visitor_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `student_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `agent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `course_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `message` text COLLATE utf8mb4_unicode_ci,
                                   `is_private` tinyint(1) NOT NULL DEFAULT '0',
                                   `agent_can_view` tinyint(1) NOT NULL DEFAULT '1',
                                   `created_at` timestamp NULL DEFAULT NULL,
                                   `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `course_purchases` (
                                    `id` bigint(20) UNSIGNED NOT NULL,
                                    `course_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                    `student_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                    `created_at` timestamp NULL DEFAULT NULL,
                                    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `course_reviews` (
                                  `id` bigint(20) UNSIGNED NOT NULL,
                                  `visitor_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                  `student_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                  `agent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                  `course_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                  `star_count` tinyint(3) UNSIGNED NOT NULL,
                                  `review` text COLLATE utf8mb4_unicode_ci,
                                  `is_private` tinyint(1) NOT NULL DEFAULT '0',
                                  `agent_can_view` tinyint(1) NOT NULL DEFAULT '1',
                                  `created_at` timestamp NULL DEFAULT NULL,
                                  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `course_student_relations` (
                                            `id` bigint(20) UNSIGNED NOT NULL,
                                            `course_id` bigint(20) UNSIGNED NOT NULL,
                                            `student_id` bigint(20) UNSIGNED NOT NULL,
                                            `created_at` timestamp NULL DEFAULT NULL,
                                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `credit_cards` (
                                `id` bigint(20) UNSIGNED NOT NULL,
                                `user_id` int(10) UNSIGNED NOT NULL,
                                `gateway_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                `gateway_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                `created_at` timestamp NULL DEFAULT NULL,
                                `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `customers` (
                             `id` bigint(20) UNSIGNED NOT NULL,
                             `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `workspace_id` int(10) UNSIGNED NOT NULL,
                             `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                             `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
                             `type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
                             `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `created_at` timestamp NULL DEFAULT NULL,
                             `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `documents` (
                             `id` bigint(20) UNSIGNED NOT NULL,
                             `workspace_id` int(10) UNSIGNED NOT NULL,
                             `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                             `related_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `related_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                             `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                             `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                             `created_at` timestamp NULL DEFAULT NULL,
                             `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `ebook_purchases` (
                                   `id` bigint(20) UNSIGNED NOT NULL,
                                   `product_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `student_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `created_at` timestamp NULL DEFAULT NULL,
                                   `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `ebook_reviews` (
                                 `id` bigint(20) UNSIGNED NOT NULL,
                                 `visitor_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                 `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                 `student_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                 `agent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                 `product_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                 `star_count` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
                                 `review` text COLLATE utf8mb4_unicode_ci,
                                 `is_private` tinyint(1) NOT NULL DEFAULT '0',
                                 `agent_can_view` tinyint(1) NOT NULL DEFAULT '1',
                                 `created_at` timestamp NULL DEFAULT NULL,
                                 `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `workspace_id` int(10) UNSIGNED NOT NULL,
                               `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
                               `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
                               `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                               `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
                               `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `landing_pages` (
                                 `id` bigint(20) UNSIGNED NOT NULL,
                                 `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                 `hero_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `hero_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `hero_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature1_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature1_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature1_one_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature1_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature1_two_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature1_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature1_three_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature1_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature1_four_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature1_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature1_five_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature1_six` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature1_six_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature1_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature1_image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature1_image_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `testimonial_sidecard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `testimonial1_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `testimonial1_student_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `testimonial1_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `testimonial1_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `testimonial2_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `testimonial2_student_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `testimonial2_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `testimonial2_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature2_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature2_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature2_one_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature2_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature2_two_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature2_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature2_three_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature2_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature2_four_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature2_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature2_five_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature2_six` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature2_six_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature2_seven` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature2_seven_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `feature2_eight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `feature2_eight_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `partners_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `partners_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `partners_paragraph` text COLLATE utf8mb4_unicode_ci,
                                 `calltoaction_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `calltoaction_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `story1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `story1_paragrapgh` text COLLATE utf8mb4_unicode_ci,
                                 `story1_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `story2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `story2_paragrapgh` text COLLATE utf8mb4_unicode_ci,
                                 `story2_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                 `created_at` timestamp NULL DEFAULT NULL,
                                 `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `lessons` (
                           `id` bigint(20) UNSIGNED NOT NULL,
                           `workspace_id` int(10) UNSIGNED NOT NULL,
                           `course_id` int(10) UNSIGNED NOT NULL,
                           `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                           `description` text COLLATE utf8mb4_unicode_ci,
                           `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `order` int(10) UNSIGNED NOT NULL DEFAULT '0',
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `messages` (
                            `id` bigint(20) UNSIGNED NOT NULL,
                            `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                            `contents` text COLLATE utf8mb4_unicode_ci,
                            `message` text COLLATE utf8mb4_unicode_ci,
                            `type` enum('Admin','Student') COLLATE utf8mb4_unicode_ci NOT NULL,
                            `from_id` int(10) UNSIGNED DEFAULT NULL,
                            `student_id` int(10) UNSIGNED DEFAULT NULL,
                            `to_id` int(10) UNSIGNED DEFAULT NULL,
                            `time` datetime DEFAULT NULL,
                            `read` tinyint(1) DEFAULT NULL,
                            `sent` tinyint(1) DEFAULT NULL,
                            `attachment_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
                              `id` int(10) UNSIGNED NOT NULL,
                              `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `notes` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `workspace_id` int(10) UNSIGNED NOT NULL,
                         `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                         `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `notes` text COLLATE utf8mb4_unicode_ci,
                         `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `orders` (
                          `id` bigint(20) UNSIGNED NOT NULL,
                          `product_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                          `student_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                          `quantity` int(10) UNSIGNED NOT NULL DEFAULT '0',
                          `order_total` decimal(8,2) NOT NULL DEFAULT '0.00',
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `order_items` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `quantity` int(10) UNSIGNED NOT NULL DEFAULT '0',
                               `order_id` int(10) UNSIGNED NOT NULL,
                               `item_id` int(10) UNSIGNED NOT NULL,
                               `price` decimal(8,2) NOT NULL DEFAULT '0.00',
                               `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `line_total` decimal(8,2) NOT NULL DEFAULT '0.00',
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
                                   `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `payment_gateways` (
                                    `id` bigint(20) UNSIGNED NOT NULL,
                                    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `api_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                    `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `api_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `api_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `public_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `private_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `description` text COLLATE utf8mb4_unicode_ci,
                                    `instruction` text COLLATE utf8mb4_unicode_ci,
                                    `active` tinyint(1) NOT NULL DEFAULT '1',
                                    `live` tinyint(1) NOT NULL DEFAULT '1',
                                    `created_at` timestamp NULL DEFAULT NULL,
                                    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `privacy_policies` (
                                    `id` bigint(20) UNSIGNED NOT NULL,
                                    `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                    `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                    `date` date DEFAULT NULL,
                                    `description` text COLLATE utf8mb4_unicode_ci,
                                    `created_at` timestamp NULL DEFAULT NULL,
                                    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `products` (
                            `id` bigint(20) UNSIGNED NOT NULL,
                            `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `workspace_id` int(10) UNSIGNED NOT NULL,
                            `admin_id` int(10) UNSIGNED NOT NULL,
                            `category_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                            `course_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                            `lesson_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                            `price` decimal(8,2) UNSIGNED DEFAULT NULL,
                            `outcomes` text COLLATE utf8mb4_unicode_ci,
                            `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `summary` text COLLATE utf8mb4_unicode_ci,
                            `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `author_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `author_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `description` text COLLATE utf8mb4_unicode_ci,
                            `author_description` text COLLATE utf8mb4_unicode_ci,
                            `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `type` enum('Subscription','Free','Onetime') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Free',
                            `status` enum('Draft','Publish','Unpublished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Draft',
                            `level` enum('Beginner','Intermediate','Advanced') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Beginner',
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `project_replies` (
                                   `id` bigint(20) UNSIGNED NOT NULL,
                                   `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `workspace_id` int(10) UNSIGNED NOT NULL,
                                   `visitor_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `agent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `project_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                                   `message` text COLLATE utf8mb4_unicode_ci,
                                   `is_private` tinyint(1) NOT NULL DEFAULT '0',
                                   `agent_can_view` tinyint(1) NOT NULL DEFAULT '1',
                                   `created_at` timestamp NULL DEFAULT NULL,
                                   `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `settings` (
                            `id` bigint(20) UNSIGNED NOT NULL,
                            `workspace_id` int(10) UNSIGNED NOT NULL,
                            `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `value` text COLLATE utf8mb4_unicode_ci,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `workspace_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
    (1, 1, 'company_name', 'CloudOnex', '2022-08-14 07:21:01', '2022-08-14 07:21:01');

CREATE TABLE `students` (
                            `id` bigint(20) UNSIGNED NOT NULL,
                            `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                            `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
                            `type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
                            `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `password_reset_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `bio` text COLLATE utf8mb4_unicode_ci,
                            `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `email_verified_at` timestamp NULL DEFAULT NULL,
                            `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `last_login` datetime DEFAULT NULL,
                            `last_conversion` datetime DEFAULT NULL,
                            `last_conversion_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `terms` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                         `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `date` date DEFAULT NULL,
                         `description` text COLLATE utf8mb4_unicode_ci,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `workspace_id` int(10) UNSIGNED NOT NULL,
                         `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `password_reset_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `email_verified_at` timestamp NULL DEFAULT NULL,
                         `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                         `last_login` datetime DEFAULT NULL,
                         `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `super_admin` tinyint(1) NOT NULL DEFAULT '0',
                         `last_conversion` datetime DEFAULT NULL,
                         `last_conversion_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `workspace_id`, `first_name`, `last_name`, `email`, `phone_number`, `password_reset_key`, `mobile_number`, `twitter`, `facebook`, `linkedin`, `address_1`, `address_2`, `zip`, `city`, `state`, `country`, `email_verified_at`, `password`, `last_login`, `language`, `photo`, `cover_photo`, `super_admin`, `last_conversion`, `last_conversion_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
    (1, 1, 'Jason', 'M', 'demo@cloudonex.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$imwOwRWp4imX7l1CoGTst.IHEqwl6rGwCciA8M1qv8Pfyjp3fnmlm', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-08-14 07:21:01', '2022-08-14 07:21:01');

CREATE TABLE `workspaces` (
                              `id` bigint(20) UNSIGNED NOT NULL,
                              `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `plan_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                              `owner_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
                              `active` tinyint(1) NOT NULL DEFAULT '1',
                              `subscribed` tinyint(1) NOT NULL DEFAULT '0',
                              `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                              `subscription_start_date` date DEFAULT NULL,
                              `next_renewal_date` date DEFAULT NULL,
                              `price` decimal(8,2) UNSIGNED DEFAULT NULL,
                              `trial` tinyint(1) NOT NULL DEFAULT '1',
                              `trial_start_date` date DEFAULT NULL,
                              `trial_end_date` date DEFAULT NULL,
                              `created_at` timestamp NULL DEFAULT NULL,
                              `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `workspaces` (`id`, `name`, `plan_id`, `owner_id`, `active`, `subscribed`, `term`, `subscription_start_date`, `next_renewal_date`, `price`, `trial`, `trial_start_date`, `trial_end_date`, `created_at`, `updated_at`) VALUES
    (1, 'CloudOnex', 0, 0, 1, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2022-08-14 07:21:01', '2022-08-14 07:21:01');


ALTER TABLE `assignments`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `assignment_marks`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `assignment_submissions`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `blogs`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `calendars`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `carts`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `certificate_receives`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `certificate_templates`
    ADD PRIMARY KEY (`id`);

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

ALTER TABLE `courses`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `course_categories`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `course_comments`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `course_purchases`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `course_reviews`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `course_student_relations`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `credit_cards`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `customers`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `documents`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `ebook_purchases`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `ebook_reviews`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `failed_jobs`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

ALTER TABLE `landing_pages`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `lessons`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `messages`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `migrations`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `notes`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `order_items`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `password_resets`
    ADD KEY `password_resets_email_index` (`email`);

ALTER TABLE `payment_gateways`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `privacy_policies`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `project_replies`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `settings`
    ADD PRIMARY KEY (`id`);

ALTER TABLE `students`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_password_reset_key_unique` (`password_reset_key`);

ALTER TABLE `terms`
    ADD PRIMARY KEY (`id`);

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

ALTER TABLE `workspaces`
    ADD PRIMARY KEY (`id`);


ALTER TABLE `assignments`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `assignment_marks`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `assignment_submissions`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `blogs`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `calendars`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `carts`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `certificate_receives`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `certificate_templates`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `contact_sections`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `courses`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `course_categories`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `course_comments`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `course_purchases`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `course_reviews`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `course_student_relations`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `credit_cards`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `customers`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `documents`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `ebook_purchases`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `ebook_reviews`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `failed_jobs`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `landing_pages`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `lessons`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `messages`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `migrations`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

ALTER TABLE `notes`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `orders`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `order_items`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `payment_gateways`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `privacy_policies`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `products`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `project_replies`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `settings`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `students`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `terms`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `workspaces`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;