-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 01:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fci_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `corrections_reports`
--

CREATE TABLE `corrections_reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluator_checklists`
--

CREATE TABLE `evaluator_checklists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluator_checklists`
--

INSERT INTO `evaluator_checklists` (`id`, `user_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(16, 120, 'Mr Gabriel Nhinda_1631006988_checklist.pdf', '/storage/checklists/Mr Gabriel Nhinda_1631006988_checklist.pdf', '2021-09-07', '2021-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `examiners_reports`
--

CREATE TABLE `examiners_reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `examiners_reports`
--

INSERT INTO `examiners_reports` (`id`, `user_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(7, 120, 'Mr Gabriel Nhinda_1631007554_examinersReport.pdf', '/storage/examiners_reports/Mr Gabriel Nhinda_1631007554_examinersReport.pdf', '2021-09-07', '2021-09-07');

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
-- Table structure for table `fhdc`
--

CREATE TABLE `fhdc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fhdc`
--

INSERT INTO `fhdc` (`id`, `user_id`) VALUES
(15, 119);

-- --------------------------------------------------------

--
-- Table structure for table `final_proposals`
--

CREATE TABLE `final_proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supervisor_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_proposals`
--

INSERT INTO `final_proposals` (`id`, `user_id`, `file_name`, `file_path`, `supervisor_comments`, `created_at`, `updated_at`) VALUES
(29, 120, 'Mr Gabriel Nhinda_1631006668_finalproposal.pdf', '/storage/final_proposals/Mr Gabriel Nhinda_1631006668_finalproposal.pdf', NULL, '2021-09-07 07:20:25', '2021-09-07 07:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `final_thesis`
--

CREATE TABLE `final_thesis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_thesis`
--

INSERT INTO `final_thesis` (`id`, `user_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(14, 120, 'Mr Gabriel Nhinda_1631007315_finalthesis.pdf', '/storage/final_thesis/Mr Gabriel Nhinda_1631007315_finalthesis.pdf', '2021-09-07 07:33:31', '2021-09-07 07:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `hods`
--

CREATE TABLE `hods` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hods`
--

INSERT INTO `hods` (`id`, `user_id`) VALUES
(12, 123);

-- --------------------------------------------------------

--
-- Table structure for table `intentions`
--

CREATE TABLE `intentions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intentions`
--

INSERT INTO `intentions` (`id`, `user_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(14, 120, 'Mr Gabriel Nhinda_1631007211_intention_to_submit.pdf', '/storage/intentions/Mr Gabriel Nhinda_1631007211_intention_to_submit.pdf', '2021-09-07 07:33:31', '2021-09-07 07:33:31');

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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2021_03_23_113703_laratrust_setup_tables', 1),
(21, '2021_05_16_222014_create_students_table', 1),
(26, '2021_05_16_224640_create_supervisors_table', 2),
(27, '2021_05_16_230731_create_proposals_table', 2),
(28, '2021_05_16_230824_create_progress_reports_table', 3),
(29, '2021_05_22_110330_laratrust_setup_tables', 4),
(30, '2021_06_15_122629_hod', 5),
(31, '2021_06_15_164800_fhdc', 6),
(32, '2021_06_18_105719_create_proposal_summaries_table', 7),
(33, '2021_06_18_105757_create_plagiarism_reports_table', 7),
(34, '2021_06_18_105816_create_final_proposals_table', 7),
(35, '2021_06_27_124005_intentions', 8),
(36, '2021_06_27_124149_thesis_summaries', 8),
(37, '2021_06_27_124528_thesis_plagiarism_reports', 8);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(2, 'users-read', 'Read Users', 'Read Users', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(3, 'users-update', 'Update Users', 'Update Users', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2021-05-22 09:08:12', '2021-05-22 09:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plagiarism_reports`
--

CREATE TABLE `plagiarism_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plagiarism_reports`
--

INSERT INTO `plagiarism_reports` (`id`, `user_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(29, 120, 'Mr Gabriel Nhinda_1631006668_plagiarismreport.pdf', '/storage/plagiarism_reports/Mr Gabriel Nhinda_1631006668_plagiarismreport.pdf', '2021-09-07 07:20:25', '2021-09-07 07:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `progress_reports`
--

CREATE TABLE `progress_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission_date` datetime NOT NULL,
  `submission_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission_date` datetime NOT NULL,
  `submission_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_approval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_status`
--

CREATE TABLE `proposal_status` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `supervisor_comments` varchar(255) DEFAULT NULL,
  `hdc_comments` varchar(255) DEFAULT NULL,
  `hod_comments` varchar(255) DEFAULT NULL,
  `attempts` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal_status`
--

INSERT INTO `proposal_status` (`id`, `student_id`, `supervisor_comments`, `hdc_comments`, `hod_comments`, `attempts`, `status`) VALUES
(18, 120, 'APPROVED: Good Work!', 'APPROVED: Good!!', NULL, 2, 'HDC Approved');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_summaries`
--

CREATE TABLE `proposal_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal_summaries`
--

INSERT INTO `proposal_summaries` (`id`, `user_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(31, 120, 'Mr Gabriel Nhinda_1631006668_proposalsummary.pdf', '/storage/proposal_summaries/Mr Gabriel Nhinda_1631006668_proposalsummary.pdf', '2021-09-07 07:20:25', '2021-09-07 07:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'Administrator', 'Administrator', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(2, 'student', 'Student', 'Student', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(3, 'supervisor', 'Supervisor', 'Supervisor', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(4, 'hod', 'Hod', 'Hod', '2021-05-22 09:08:12', '2021-05-22 09:08:12'),
(5, 'fhdc', 'Fhdc', 'Fhdc', '2021-05-22 09:08:13', '2021-05-22 09:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 6, 'App\\Models\\User'),
(5, 119, 'App\\Models\\User'),
(2, 120, 'App\\Models\\User'),
(2, 121, 'App\\Models\\User'),
(3, 122, 'App\\Models\\User'),
(4, 123, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `program` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supervisor_id` int(10) UNSIGNED DEFAULT NULL,
  `co_supervisor_id` int(10) UNSIGNED DEFAULT NULL,
  `evaluator_id` int(11) DEFAULT NULL,
  `co_evaluator_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `program`, `progress`, `department`, `supervisor_id`, `co_supervisor_id`, `evaluator_id`, `co_evaluator_id`, `created_at`, `updated_at`) VALUES
(17, 120, 'Masters', 'Examination', 'Computer Science', 34, NULL, 119, NULL, '2021-07-30 03:02:55', '2021-07-30 03:02:55'),
(18, 121, 'PhD', 'Proposal', 'Informatics', NULL, NULL, NULL, NULL, '2021-07-30 03:03:02', '2021-07-30 03:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` int(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workload` int(10) UNSIGNED DEFAULT NULL,
  `hod_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `user_id`, `department`, `office`, `phone`, `workload`, `hod_id`, `created_at`, `updated_at`) VALUES
(34, 122, 'Computer Science', 'Poly Heights', '+264619862356', NULL, NULL, '2021-07-30 03:03:49', '2021-07-30 03:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `thesis_abstracts`
--

CREATE TABLE `thesis_abstracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thesis_abstracts`
--

INSERT INTO `thesis_abstracts` (`id`, `user_id`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(14, 120, 'Mr Gabriel Nhinda_1631007315_thesisabstract.pdf', '/storage/thesis_abstracts/Mr Gabriel Nhinda_1631007315_thesisabstract.pdf', '2021-09-07 07:33:31', '2021-09-07 07:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `thesis_status`
--

CREATE TABLE `thesis_status` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `supervisor_comments` varchar(255) DEFAULT NULL,
  `hod_comments` varchar(255) DEFAULT NULL,
  `hdc_comments` varchar(255) DEFAULT NULL,
  `attempts` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thesis_status`
--

INSERT INTO `thesis_status` (`id`, `student_id`, `status`, `supervisor_comments`, `hod_comments`, `hdc_comments`, `attempts`) VALUES
(10, 120, 'Examination Complete', 'APPROVED: Great Work!', 'APPROVED: Great Work!!', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Wynne Bowman', 'liviniwu@mailinator.com', NULL, '$2y$10$T/IBbhk4XWuoFMlyY2MFvOzIwyAoUc2HbluC94vMcaYzbRnJMJ2TO', 'Administrator', NULL, '2021-05-22 09:09:42', '2021-05-22 09:09:42'),
(119, 'Prof. Fungai Bhunu Shava', 'fbshava@nust.na', NULL, '$2y$10$LJ1YqueBGH/OM1KyH8wPMuwwoHItKtrklQo8wf1wyyrrS7/poRopq', 'FHDC', NULL, '2021-07-30 03:02:45', '2021-07-30 03:02:45'),
(120, 'Mr Gabriel Nhinda', 'gnhinda@nust.na', NULL, '$2y$10$G6GABTuIeelT7wMeBX43FeT96DKPnmXnnbrck43fU23ltXcHRWRLy', 'Student', NULL, '2021-07-30 03:02:55', '2021-07-30 03:02:55'),
(121, 'Lionel Reid', 'rujigofe@mailinator.com', NULL, '$2y$10$14lS/ae9FyZPRjxwMFoZlOwmRB9avyMUW2v8YYl6DEhqAhV/Jr3Ha', 'Student', NULL, '2021-07-30 03:03:02', '2021-07-30 03:03:02'),
(122, 'Dr Colin Stanley', 'cstanley@nust.na', NULL, '$2y$10$vKJalltDrH66dFPv6K.PrOzkj1EKFhQi4pk7sC3BxLoHuA3KulOce', 'Supervisor', NULL, '2021-07-30 03:03:49', '2021-07-30 03:03:49'),
(123, 'Dr Hamunyela', 'slhamunyela@nust.na', NULL, '$2y$10$//rdEYKoTZsh9Q47GcssGu2LaNdPgTYf0.KsBRSZ2rXN8oAgxbMn2', 'HOD', NULL, '2021-07-30 03:04:01', '2021-07-30 03:04:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `corrections_reports`
--
ALTER TABLE `corrections_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluator_checklists`
--
ALTER TABLE `evaluator_checklists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examiners_reports`
--
ALTER TABLE `examiners_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fhdc`
--
ALTER TABLE `fhdc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fhdc_user_id_foreign` (`user_id`);

--
-- Indexes for table `final_proposals`
--
ALTER TABLE `final_proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `final_proposals_user_id_foreign` (`user_id`);

--
-- Indexes for table `final_thesis`
--
ALTER TABLE `final_thesis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thesis_plagiarism_reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `hods`
--
ALTER TABLE `hods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hod_user_id_foreign` (`user_id`);

--
-- Indexes for table `intentions`
--
ALTER TABLE `intentions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intentions_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `plagiarism_reports`
--
ALTER TABLE `plagiarism_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plagiarism_reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `progress_reports`
--
ALTER TABLE `progress_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `progress_reports_student_id_foreign` (`student_id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_student_id_foreign` (`student_id`);

--
-- Indexes for table `proposal_status`
--
ALTER TABLE `proposal_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_summaries`
--
ALTER TABLE `proposal_summaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_summaries_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_supervisor_id_foreign` (`supervisor_id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisors_user_id_foreign` (`user_id`);

--
-- Indexes for table `thesis_abstracts`
--
ALTER TABLE `thesis_abstracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thesis_summaries_user_id_foreign` (`user_id`);

--
-- Indexes for table `thesis_status`
--
ALTER TABLE `thesis_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `corrections_reports`
--
ALTER TABLE `corrections_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `evaluator_checklists`
--
ALTER TABLE `evaluator_checklists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `examiners_reports`
--
ALTER TABLE `examiners_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fhdc`
--
ALTER TABLE `fhdc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `final_proposals`
--
ALTER TABLE `final_proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `final_thesis`
--
ALTER TABLE `final_thesis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hods`
--
ALTER TABLE `hods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `intentions`
--
ALTER TABLE `intentions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plagiarism_reports`
--
ALTER TABLE `plagiarism_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `progress_reports`
--
ALTER TABLE `progress_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal_status`
--
ALTER TABLE `proposal_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `proposal_summaries`
--
ALTER TABLE `proposal_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `thesis_abstracts`
--
ALTER TABLE `thesis_abstracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `thesis_status`
--
ALTER TABLE `thesis_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fhdc`
--
ALTER TABLE `fhdc`
  ADD CONSTRAINT `fhdc_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `final_proposals`
--
ALTER TABLE `final_proposals`
  ADD CONSTRAINT `final_proposals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `final_thesis`
--
ALTER TABLE `final_thesis`
  ADD CONSTRAINT `thesis_plagiarism_reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hods`
--
ALTER TABLE `hods`
  ADD CONSTRAINT `hod_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `intentions`
--
ALTER TABLE `intentions`
  ADD CONSTRAINT `intentions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plagiarism_reports`
--
ALTER TABLE `plagiarism_reports`
  ADD CONSTRAINT `plagiarism_reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `progress_reports`
--
ALTER TABLE `progress_reports`
  ADD CONSTRAINT `progress_reports_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proposal_summaries`
--
ALTER TABLE `proposal_summaries`
  ADD CONSTRAINT `proposal_summaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `supervisors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `thesis_abstracts`
--
ALTER TABLE `thesis_abstracts`
  ADD CONSTRAINT `thesis_summaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
