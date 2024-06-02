-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2024 at 09:23 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aeon_younus`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

DROP TABLE IF EXISTS `api_users`;
CREATE TABLE IF NOT EXISTS `api_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` mediumint NOT NULL,
  `token_valid_period` mediumint NOT NULL DEFAULT '10',
  `is_active` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `api_users_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

DROP TABLE IF EXISTS `buyers`;
CREATE TABLE IF NOT EXISTS `buyers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Woolworths (Pty) Ltd', 'storage/logos/profile_1698233218.png', '2023-08-26 17:02:54', '2023-10-25 23:26:58'),
(2, 'MRP', 'storage/logos/MRP-logo_1696919298.jpg', '2023-08-26 17:04:34', '2023-10-12 00:26:49'),
(3, 'Ackermans', 'storage/logos/Ackermans_Logo_1696919329.svg', '2023-10-10 11:28:49', '2023-10-10 11:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
CREATE TABLE IF NOT EXISTS `certificates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `manufacturer_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `certificates_manufacturer_id_foreign` (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `manufacturer_id`, `name`, `logo`, `issue_date`, `valid_from`, `valid_to`, `pdf_file`, `created_at`, `updated_at`) VALUES
(5, 1, 'asdf', 'storage/logos/WhatsApp Image 2023-10-10 at 2.00.28 PM_1698410663.jpeg', '2023-10-27', '2023-10-28', '2023-10-29', 'storage/logos/acker_1698410663.pdf', '2023-10-28 00:44:23', '2023-10-28 00:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_department_id` bigint UNSIGNED DEFAULT NULL,
  `vendor_manufacturer_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_buyer_department_id_foreign` (`buyer_department_id`),
  KEY `contacts_vendor_manufacturer_id_foreign` (`vendor_manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `buyer_department_id`, `vendor_manufacturer_id`, `name`, `email`, `phone`, `profile_image`, `department`, `designation`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'storage/logos/profile_1698233504.png', NULL, NULL, '2023-10-25 23:31:44', '2023-10-25 23:31:44'),
(2, 1, NULL, 'test', 'test@test.com', '123456789', 'storage/logos/profile_1698235738.png', 'asdf', 'asdf', '2023-10-25 23:44:33', '2023-10-26 00:08:58'),
(3, NULL, 1, 'test vendor', 'vendortest@test.com', '123456', 'storage/logos/profile_1698237041.png', 'asdf', 'asdf', '2023-10-26 00:22:33', '2023-10-26 00:30:41'),
(4, NULL, 1, 'asdf', 'asdf@adf.com', '123456789', 'storage/logos/two_profile_1698237027.jpg', 'adsf', 'asdf', '2023-10-26 00:23:56', '2023-10-26 00:30:27'),
(5, NULL, NULL, NULL, NULL, NULL, 'storage/logos/profile_1698233504.png', NULL, NULL, '2023-10-25 23:31:44', '2023-10-25 23:31:44'),
(6, 1, NULL, 'test', 'test@test.com', '123456789', 'storage/logos/profile_1698235738.png', 'asdf', 'asdf', '2023-10-25 23:44:33', '2023-10-26 00:08:58'),
(7, NULL, 1, 'test vendor', 'vendortest@test.com', '123456', 'storage/logos/profile_1698237041.png', 'asdf', 'asdf', '2023-10-26 00:22:33', '2023-10-26 00:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `critical_details`
--

DROP TABLE IF EXISTS `critical_details`;
CREATE TABLE IF NOT EXISTS `critical_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `critical_id` int DEFAULT NULL,
  `create_pp_meeting_schedule` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pp_meeting_report_upload` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cutting_date_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cutting_date_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embellishment_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embellishment_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sewing_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sewing_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `washing_complete_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `washing_complete_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finishing_complete_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finishing_complete_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sewing_inline_inspection_date_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sewing_inline_inspection_date_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_inline_inspection_schdule` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sewing_inline_inspection_report_upload` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finishing_inline_inspection_report` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_final_date_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_final_date_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_aql_schedule` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pre_final_aql_report_schedule` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_aql_date_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_aql_date_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_aql_report_upload` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_sample_approval_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_sample_approval_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_sample_dispatch` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_sample_upload` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipment_booking_with_acs_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipment_booking_with_acs_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_approval_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_approval_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_factory_date_po` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revised_ex_factory_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actual_ex_factory_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_units` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orginal_eta_sa_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revised_eta_sa_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_mode_sea_air` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forward_ref` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `late_delivery_discounts_crp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_num` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_create_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_receive_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_last_update_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_for_change_affect_shipment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aeon_comments_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_comments_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sa_eta_5_days` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `critical_paths`
--

DROP TABLE IF EXISTS `critical_paths`;
CREATE TABLE IF NOT EXISTS `critical_paths` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `po_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `season` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_repeat_initial` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacture_unit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plm_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_order_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_qty` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_price_product_cost` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_label_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_ref` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_content` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_weight` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_mill` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead_times` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treated_as_priority_order` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `official_po_sent_plan_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `official_po_sent_actual_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour_std_print_artwork_sent_to_supplier_plan_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour_std_print_artwork_sent_to_supplier_actual_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_dip_approval_plan_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_dip_approval_actual_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_dip_dispatch_details` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lab_dip_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embellishment_s_o_approval_plan_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embellishment_s_o_approval_actual_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embellishment_s_o_dispatch_details` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embellishment_s_o_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_ordered_plan_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_ordered_actual_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulk_fabric_knit_down_approval_plan_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulk_fabric_knit_down_approval_actual_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulk_fabric_knit_down_dispatch_details` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulk_fabric_knit_down_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulk_yarn_fabric_plan_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulk_yarn_fabric_actual_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `development_photo_sample_sent_plan_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `development_photo_sample_sent_actual_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `development_photo_sample_dispatch_details` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `development_photo_sample_dispatch_sample_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit_approval_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit_approval_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit_dispatch` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit_sample_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_set_approval` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_set_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_set_dispatch` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_set_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pp_approval` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pp_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pp_dispatch` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pp_sample_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_label_approval` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_label_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_inhouse_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_inhouse_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pp_meeting_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pp_meeting_actual` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_pp_meeting_schedule` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pp_meeting_report_upload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cutting_date_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cutting_date_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `embellishment_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `embellishment_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Sewing_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Sewing_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `washing_complete_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `washing_complete_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `finishing_complete_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `finishing_complete_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sewing_inline_inspection_date_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sewing_inline_inspection_date_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `create_inline_inspection_schdule` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sewing_inline_inspection_report_upload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `finishing_inline_inspection_report` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `finishing_inline_inspection_date_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `finishing_inline_inspection_date_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pre_final_date_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pre_final_date_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `create_aql_schedule` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `pre_final_aql_report_schedule` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `final_aql_date_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `final_aql_date_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `final_aql_report_upload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `production_sample_approval_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `production_sample_approval_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `production_sample_dispatch` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `production_sample_upload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shipment_booking_with_acs_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shipment_booking_with_acs_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sa_approval_plan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sa_approval_actual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ex_factory_date_po` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revised_ex_factory_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `actual_ex_factory_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shipped_units` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `orginal_eta_sa_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revised_eta_sa_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ship_mode_sea_air` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `forward_ref` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `late_delivery_discounts_crp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `invoice_num` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `invoice_create_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_receive_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `vendor_last_update_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reason_for_change_affect_shipment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `aeon_comments_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `vendor_comments_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sa_eta_5_days` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `critical_paths`
--

INSERT INTO `critical_paths` (`id`, `po_id`, `brand_id`, `department_id`, `season`, `image`, `fabric_type`, `block_repeat_initial`, `vendor`, `manufacture_unit`, `plm_number`, `purchase_order_number`, `style_no`, `order_qty`, `supplier_price_product_cost`, `total_value`, `style_description`, `care_label_date`, `colour`, `fabric_ref`, `fabric_content`, `fabric_weight`, `fabric_mill`, `lead_times`, `treated_as_priority_order`, `official_po_sent_plan_date`, `official_po_sent_actual_date`, `colour_std_print_artwork_sent_to_supplier_plan_date`, `colour_std_print_artwork_sent_to_supplier_actual_date`, `lab_dip_approval_plan_date`, `lab_dip_approval_actual_date`, `lab_dip_dispatch_details`, `lab_dip_image`, `embellishment_s_o_approval_plan_date`, `embellishment_s_o_approval_actual_date`, `embellishment_s_o_dispatch_details`, `embellishment_s_o_image`, `fabric_ordered_plan_date`, `fabric_ordered_actual_date`, `bulk_fabric_knit_down_approval_plan_date`, `bulk_fabric_knit_down_approval_actual_date`, `bulk_fabric_knit_down_dispatch_details`, `bulk_fabric_knit_down_image`, `bulk_yarn_fabric_plan_date`, `bulk_yarn_fabric_actual_date`, `development_photo_sample_sent_plan_date`, `development_photo_sample_sent_actual_date`, `development_photo_sample_dispatch_details`, `development_photo_sample_dispatch_sample_image`, `fit_approval_plan`, `fit_approval_actual`, `fit_dispatch`, `fit_sample_image`, `size_set_approval`, `size_set_actual`, `size_set_dispatch`, `size_set_image`, `pp_approval`, `pp_actual`, `pp_dispatch`, `pp_sample_image`, `care_label_approval`, `care_label_actual`, `material_inhouse_plan`, `material_inhouse_actual`, `pp_meeting_plan`, `pp_meeting_actual`, `create_pp_meeting_schedule`, `pp_meeting_report_upload`, `cutting_date_plan`, `cutting_date_actual`, `embellishment_plan`, `embellishment_actual`, `Sewing_plan`, `Sewing_actual`, `washing_complete_plan`, `washing_complete_actual`, `finishing_complete_plan`, `finishing_complete_actual`, `sewing_inline_inspection_date_plan`, `sewing_inline_inspection_date_actual`, `create_inline_inspection_schdule`, `sewing_inline_inspection_report_upload`, `finishing_inline_inspection_report`, `finishing_inline_inspection_date_plan`, `finishing_inline_inspection_date_actual`, `pre_final_date_plan`, `pre_final_date_actual`, `create_aql_schedule`, `pre_final_aql_report_schedule`, `final_aql_date_plan`, `final_aql_date_actual`, `final_aql_report_upload`, `production_sample_approval_plan`, `production_sample_approval_actual`, `production_sample_dispatch`, `production_sample_upload`, `shipment_booking_with_acs_plan`, `shipment_booking_with_acs_actual`, `sa_approval_plan`, `sa_approval_actual`, `ex_factory_date_po`, `revised_ex_factory_date`, `actual_ex_factory_date`, `shipped_units`, `orginal_eta_sa_date`, `revised_eta_sa_date`, `ship_mode_sea_air`, `forward_ref`, `late_delivery_discounts_crp`, `invoice_num`, `invoice_create_date`, `payment_receive_date`, `vendor_last_update_date`, `reason_for_change_affect_shipment`, `aeon_comments_date`, `vendor_comments_date`, `sa_eta_5_days`, `note`, `created_at`, `updated_at`) VALUES
(78, 89, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '230', 'Regular Lead Time', '2023-01-19', '2024-01-17', '2023-03-13', NULL, '2023-03-13', NULL, NULL, NULL, '2023-03-20', NULL, NULL, NULL, '2023-02-03', NULL, NULL, NULL, NULL, NULL, '2023-04-09', NULL, '2023-02-24', NULL, NULL, NULL, '2023-03-06', NULL, NULL, NULL, '2023-03-20', NULL, NULL, NULL, '2023-04-03', NULL, NULL, NULL, '2023-04-03', NULL, '2023-04-11', NULL, '2023-04-13', NULL, NULL, NULL, '2023-04-16', NULL, '2023-04-18', NULL, '2023-05-03', NULL, '2023-05-18', NULL, '2023-05-23', NULL, '2023-05-18', NULL, NULL, NULL, NULL, '2023-05-22', NULL, '2023-05-22', NULL, NULL, NULL, '2023-05-25', NULL, NULL, '2023-05-23', NULL, NULL, NULL, '2023-05-11', NULL, '2023-05-27', NULL, '2023-06-01', NULL, NULL, NULL, '2023-07-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-17 09:01:53', '2024-01-17 09:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departments_buyer_id_foreign` (`buyer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `buyer_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '157 - Y/BOYS OUTERWEAR', '2023-08-26 17:05:36', '2023-08-26 17:05:36'),
(2, 2, 'PRE GIRLS', '2023-08-26 17:05:57', '2023-10-10 13:10:39'),
(3, 3, 'WOMENS DENIM', '2023-10-10 12:55:54', '2023-10-10 12:55:54'),
(4, 2, 'PRE BOYS', '2023-10-10 13:10:47', '2023-10-10 13:10:47'),
(5, 2, 'TODDLER GIRLS', '2023-10-10 13:11:08', '2023-10-10 13:11:08'),
(6, 2, 'TODDLER BOYS', '2023-10-10 13:11:25', '2023-10-10 13:11:25'),
(7, 2, 'BIG BOYS', '2023-10-10 13:11:44', '2023-10-10 13:11:44'),
(8, 2, 'BIG GIRLS', '2023-10-10 13:11:55', '2023-10-10 13:11:55'),
(9, 2, 'NURSERY', '2023-10-10 13:12:04', '2023-10-10 13:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manufacturers_vendor_id_foreign` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `vendor_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'TEST UNIT', '2023-09-09 14:21:51', '2023-09-09 14:21:51'),
(2, 1, 'test 22', '2023-10-26 23:09:04', '2023-10-26 23:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_07_24_172910_create_buyers_table', 1),
(2, '2023_07_24_180317_create_vendors_table', 1),
(3, '2023_07_25_000000_create_users_table', 1),
(4, '2023_07_25_000001_create_password_resets_table', 1),
(5, '2023_07_25_000002_create_failed_jobs_table', 1),
(6, '2023_07_25_183451_create_permission_tables', 1),
(7, '2023_07_26_115905_create_api_users_table', 1),
(8, '2023_07_26_131020_create_tokens_table', 1),
(9, '2023_07_31_181353_create_departments_table', 1),
(10, '2023_07_31_181640_create_manufacturers_table', 1),
(11, '2023_07_31_181946_create_certificates_table', 1),
(12, '2023_07_31_182008_create_contacts_table', 1),
(13, '2023_08_03_143000_create_purchage_orders_table', 1),
(14, '2023_08_03_143255_create_order_items_table', 1),
(17, '2023_08_26_234204_create_critical_paths_table', 2),
(18, '2023_08_27_190901_create_critical_details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `po_id` bigint UNSIGNED DEFAULT NULL,
  `plm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_ordered` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inner_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outer_case_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_po_id_foreign` (`po_id`)
) ENGINE=InnoDB AUTO_INCREMENT=957 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `po_id`, `plm`, `style_no`, `colour`, `item_no`, `size`, `qty_ordered`, `inner_qty`, `outer_case_qty`, `supplier_price`, `value`, `selling_price`, `created_at`, `updated_at`) VALUES
(941, 89, 'PLM-69852', '507181134', 'INDIGO', '6009226481819', '2', '653', '1', '35', '3.51', '2292.03', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:02:48'),
(942, 89, 'PLM-69852', NULL, NULL, '6009226481826', '3', '1010', '1', '35', '3.51', '3545.10', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(943, 89, 'PLM-69852', NULL, NULL, '6009226481833', '4', '891', '1', '35', '3.51', '3127.41', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(944, 89, 'PLM-69852', NULL, NULL, '6009226481840', '5', '832', '1', '35', '3.51', '2920.32', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(945, 89, 'PLM-69852', NULL, NULL, '6009226481857', '6', '772', '1', '35', '3.51', '2709.72', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(946, 89, 'PLM-69852', NULL, NULL, '6009226481864', '7', '713', '1', '35', '3.51', '2502.63', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(947, 89, 'PLM-69852', NULL, NULL, '6009226481871', '8', '653', '1', '35', '3.51', '2292.03', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(948, 89, 'PLM-69852', NULL, NULL, '6009226481888', '9', '475', '1', '35', '3.51', '1667.25', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(949, 89, 'PLM-69852', '507181134', 'L.BLUE', '6009226481895', '2', '545', '1', '35', '3.51', '1912.95', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(950, 89, 'PLM-69852', NULL, NULL, '6009226481901', '3', '842', '1', '35', '3.51', '2955.42', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(951, 89, 'PLM-69852', NULL, NULL, '6009226481918', '4', '743', '1', '35', '3.51', '2607.93', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(952, 89, 'PLM-69852', NULL, NULL, '6009226481925', '5', '693', '1', '35', '3.51', '2432.43', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(953, 89, 'PLM-69852', NULL, NULL, '6009226481932', '6', '644', '1', '35', '3.51', '2260.44', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(954, 89, 'PLM-69852', NULL, NULL, '6009226481949', '7', '594', '1', '35', '3.51', '2084.94', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(955, 89, 'PLM-69852', NULL, NULL, '6009226481956', '8', '545', '1', '35', '3.51', '1912.95', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(956, 89, 'PLM-69852', NULL, NULL, '6009226481963', '9', '396', '1', '35', '3.51', '1389.96', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `title`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permission.show', 'Ruxsatlarni ko\'rish', 'web', NULL, NULL),
(2, 'permission.edit', 'Ruxsatlarni o\'zgartirish', 'web', NULL, NULL),
(3, 'permission.add', 'Yangi ruxsat qo\'shish', 'web', NULL, NULL),
(4, 'permission.delete', 'Ruxsatlarni o\'chirish', 'web', NULL, NULL),
(5, 'roles.show', 'Rollarni ko\'rish', 'web', NULL, NULL),
(6, 'roles.edit', 'Rollarni o\'zgartirish', 'web', NULL, NULL),
(7, 'roles.add', 'Rollar qo\'shish', 'web', NULL, NULL),
(8, 'roles.delete', 'Rollarni o\'chirish', 'web', NULL, NULL),
(9, 'user.show', 'Userlarni ko\'rish', 'web', NULL, NULL),
(10, 'user.edit', 'Userlarni o\'zgartirish', 'web', NULL, NULL),
(11, 'user.add', 'Yangi Userlarni qo\'shish', 'web', NULL, NULL),
(12, 'user.delete', 'Userlarni o\'chirish', 'web', NULL, NULL),
(13, 'api-user.add', 'ApiUser Add', 'web', NULL, NULL),
(14, 'api-user.view', 'ApiUser View', 'web', NULL, NULL),
(15, 'api-user.edit', 'ApiUser Edit', 'web', NULL, NULL),
(16, 'api-user-passport.view', 'ApiUser Password view', 'web', NULL, NULL),
(17, 'buyer_critical_path.show', 'buyer critical path show', 'web', '2024-01-20 08:22:09', '2024-01-20 09:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `purchage_orders`
--

DROP TABLE IF EXISTS `purchage_orders`;
CREATE TABLE IF NOT EXISTS `purchage_orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `buyer_id` bigint UNSIGNED DEFAULT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `vendor_id` bigint UNSIGNED DEFAULT NULL,
  `po_department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `style_note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `earliest_buyer_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_factory_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_quality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `fabric_content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_date` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `supplier_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_terms` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_mode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_lavel_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stlye_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_ordered` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inner_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outer_case_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_picture_germent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_artwork` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `item_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchage_orders_buyer_id_foreign` (`buyer_id`),
  KEY `purchage_orders_department_id_foreign` (`department_id`),
  KEY `purchage_orders_vendor_id_foreign` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchage_orders`
--

INSERT INTO `purchage_orders` (`id`, `buyer_id`, `department_id`, `vendor_id`, `po_department`, `buyer_price`, `access_price`, `style_note`, `vendor_price`, `earliest_buyer_date`, `buyer_date`, `ex_factory_date`, `po_no`, `plm`, `description`, `fabric_quality`, `fabric_type`, `fabric_content`, `approved_date`, `supplier_no`, `supplier_name`, `currency`, `payment_terms`, `ship_mode`, `care_lavel_date`, `stlye_no`, `size`, `qty_ordered`, `inner_qty`, `outer_case_qty`, `value`, `selling_price`, `upload_picture_germent`, `upload_artwork`, `note`, `item_no`, `colour`, `created_at`, `updated_at`) VALUES
(89, 1, 1, 1, NULL, '3.60', '0.20', 'Price : 3.31 + 0.20 = 3.51', '3.31', '2023-06-15', NULL, '2023-06-01', '67166531', 'PLM-69852', 'KNIT DENIM SHORT', 'good', '3', 'very good', '2023-03-07', '14384', 'CREATION LOYAL HONGKONG LIMITED', 'USD', 'TT @ Sight', 'Sea', '2024-01-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/garments/product_image_1705485713.jpeg', NULL, 'note', NULL, NULL, '2024-01-17 09:01:53', '2024-01-17 09:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', 'Super Admin', '2023-08-26 16:56:08', '2023-08-26 16:56:08'),
(2, 'buyer', 'web', NULL, '2023-10-31 02:40:30', '2023-10-31 02:40:30'),
(3, 'Admin', 'web', NULL, '2024-01-06 13:03:17', '2024-01-06 13:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(1, 2),
(5, 2),
(9, 2),
(17, 2),
(1, 3),
(2, 3),
(3, 3),
(5, 3),
(6, 3),
(7, 3),
(9, 3),
(10, 3),
(11, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

DROP TABLE IF EXISTS `tokens`;
CREATE TABLE IF NOT EXISTS `tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `api_user_id` int NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_expires_at` timestamp NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tokens_token_unique` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `buyer_id` bigint UNSIGNED DEFAULT NULL,
  `vendor_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_buyer_id_foreign` (`buyer_id`),
  KEY `users_vendor_id_foreign` (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `theme`, `buyer_id`, `vendor_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shourov', 'admin@gmail.com', NULL, '$2y$10$.hotgnoqR2GRFLMWs/p6JOqoAxmIOuJIaog4YFLhUJb/ZNWQORhFK', 'default', NULL, NULL, 'yBqMTgDjlblocyNlpZaOmc45yy4JbjoOfOlqlgXJC559kuIApqoatXsJA9ZG', '2023-08-26 16:56:08', '2023-08-26 16:56:08'),
(2, 'Admin', 'admin@admin.com', NULL, '$2y$10$Bq8axmHaNUvdjqrDbbQJhORvPhcYQEDjLU8y5SsJT0l0iPJmNLIqu', 'default', NULL, NULL, NULL, '2023-10-10 12:13:21', '2024-01-20 08:27:13'),
(3, 'buyer', 'buyer@gmail.com', NULL, '$2y$10$oz4dVWnJ1mJHvkHbYGy6ROdWxNmF7nM7TlrZ7oosmO4VFJDd566C.', 'default', 1, NULL, NULL, '2023-10-30 23:39:19', '2023-10-30 23:39:19'),
(4, 'Super Admin', 'superadmin@test.com', NULL, '$2y$10$LSaoOi7frqBPA0XKupW8uuI6Op5XgXKPZg.0w6r8L2BcXOQ0RdcM6', 'default', NULL, NULL, NULL, '2024-01-06 13:02:50', '2024-01-06 13:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'MITALI GROUP', 'storage/logos/26062023142937_mitali_1696919383.png', '2023-08-26 17:06:31', '2023-10-10 11:29:43');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_buyer_department_id_foreign` FOREIGN KEY (`buyer_department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_vendor_manufacturer_id_foreign` FOREIGN KEY (`vendor_manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD CONSTRAINT `manufacturers_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_po_id_foreign` FOREIGN KEY (`po_id`) REFERENCES `purchage_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchage_orders`
--
ALTER TABLE `purchage_orders`
  ADD CONSTRAINT `purchage_orders_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchage_orders_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchage_orders_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
