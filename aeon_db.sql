-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 07:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_users`
--

CREATE TABLE `api_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_by` mediumint(9) NOT NULL,
  `token_valid_period` mediumint(9) NOT NULL DEFAULT 10,
  `is_active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `issue_date` varchar(255) DEFAULT NULL,
  `valid_from` varchar(255) DEFAULT NULL,
  `valid_to` varchar(255) DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `manufacturer_id`, `name`, `logo`, `issue_date`, `valid_from`, `valid_to`, `pdf_file`, `created_at`, `updated_at`) VALUES
(5, 1, 'asdf', 'storage/logos/WhatsApp Image 2023-10-10 at 2.00.28 PM_1698410663.jpeg', '2023-10-27', '2023-10-28', '2023-10-29', 'storage/logos/acker_1698410663.pdf', '2023-10-28 00:44:23', '2023-10-28 00:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_manufacturer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `critical_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `critical_id` int(11) DEFAULT NULL,
  `create_pp_meeting_schedule` varchar(191) DEFAULT NULL,
  `pp_meeting_report_upload` varchar(191) DEFAULT NULL,
  `cutting_date_plan` varchar(191) DEFAULT NULL,
  `cutting_date_actual` varchar(191) DEFAULT NULL,
  `embellishment_plan` varchar(191) DEFAULT NULL,
  `embellishment_actual` varchar(191) DEFAULT NULL,
  `Sewing_plan` varchar(191) DEFAULT NULL,
  `Sewing_actual` varchar(191) DEFAULT NULL,
  `washing_complete_plan` varchar(191) DEFAULT NULL,
  `washing_complete_actual` varchar(191) DEFAULT NULL,
  `finishing_complete_plan` varchar(191) DEFAULT NULL,
  `finishing_complete_actual` varchar(191) DEFAULT NULL,
  `sewing_inline_inspection_date_plan` varchar(191) DEFAULT NULL,
  `sewing_inline_inspection_date_actual` varchar(191) DEFAULT NULL,
  `create_inline_inspection_schdule` varchar(191) DEFAULT NULL,
  `sewing_inline_inspection_report_upload` varchar(191) DEFAULT NULL,
  `finishing_inline_inspection_report` varchar(191) DEFAULT NULL,
  `pre_final_date_plan` varchar(191) DEFAULT NULL,
  `pre_final_date_actual` varchar(191) DEFAULT NULL,
  `create_aql_schedule` varchar(191) DEFAULT NULL,
  `pre_final_aql_report_schedule` varchar(191) DEFAULT NULL,
  `final_aql_date_plan` varchar(191) DEFAULT NULL,
  `final_aql_date_actual` varchar(191) DEFAULT NULL,
  `final_aql_report_upload` varchar(191) DEFAULT NULL,
  `production_sample_approval_plan` varchar(191) DEFAULT NULL,
  `production_sample_approval_actual` varchar(191) DEFAULT NULL,
  `production_sample_dispatch` varchar(191) DEFAULT NULL,
  `production_sample_upload` varchar(191) DEFAULT NULL,
  `shipment_booking_with_acs_plan` varchar(191) DEFAULT NULL,
  `shipment_booking_with_acs_actual` varchar(191) DEFAULT NULL,
  `sa_approval_plan` varchar(191) DEFAULT NULL,
  `sa_approval_actual` varchar(191) DEFAULT NULL,
  `ex_factory_date_po` varchar(191) DEFAULT NULL,
  `revised_ex_factory_date` varchar(191) DEFAULT NULL,
  `actual_ex_factory_date` varchar(191) DEFAULT NULL,
  `shipped_units` varchar(191) DEFAULT NULL,
  `orginal_eta_sa_date` varchar(191) DEFAULT NULL,
  `revised_eta_sa_date` varchar(191) DEFAULT NULL,
  `ship_mode_sea_air` varchar(191) DEFAULT NULL,
  `forward_ref` varchar(191) DEFAULT NULL,
  `late_delivery_discounts_crp` varchar(191) DEFAULT NULL,
  `invoice_num` varchar(191) DEFAULT NULL,
  `invoice_create_date` varchar(191) DEFAULT NULL,
  `payment_receive_date` varchar(191) DEFAULT NULL,
  `vendor_last_update_date` varchar(191) DEFAULT NULL,
  `reason_for_change_affect_shipment` varchar(191) DEFAULT NULL,
  `aeon_comments_date` varchar(191) DEFAULT NULL,
  `vendor_comments_date` varchar(191) DEFAULT NULL,
  `sa_eta_5_days` varchar(191) DEFAULT NULL,
  `note` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `critical_paths`
--

CREATE TABLE `critical_paths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `season` varchar(191) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `fabric_type` varchar(191) DEFAULT NULL,
  `block_repeat_initial` varchar(191) DEFAULT NULL,
  `vendor` varchar(191) DEFAULT NULL,
  `manufacture_unit` varchar(191) DEFAULT NULL,
  `plm_number` varchar(191) DEFAULT NULL,
  `purchase_order_number` varchar(191) DEFAULT NULL,
  `style_no` varchar(191) DEFAULT NULL,
  `order_qty` varchar(191) DEFAULT NULL,
  `supplier_price_product_cost` varchar(191) DEFAULT NULL,
  `total_value` varchar(191) DEFAULT NULL,
  `style_description` varchar(191) DEFAULT NULL,
  `care_label_date` varchar(191) DEFAULT NULL,
  `colour` varchar(191) DEFAULT NULL,
  `fabric_ref` varchar(191) DEFAULT NULL,
  `fabric_content` varchar(191) DEFAULT NULL,
  `fabric_weight` varchar(191) DEFAULT NULL,
  `fabric_mill` varchar(191) DEFAULT NULL,
  `lead_times` varchar(191) DEFAULT NULL,
  `treated_as_priority_order` varchar(191) DEFAULT NULL,
  `official_po_sent_plan_date` varchar(191) DEFAULT NULL,
  `official_po_sent_actual_date` varchar(191) DEFAULT NULL,
  `colour_std_print_artwork_sent_to_supplier_plan_date` varchar(191) DEFAULT NULL,
  `colour_std_print_artwork_sent_to_supplier_actual_date` varchar(191) DEFAULT NULL,
  `lab_dip_approval_plan_date` varchar(191) DEFAULT NULL,
  `lab_dip_approval_actual_date` varchar(191) DEFAULT NULL,
  `lab_dip_dispatch_details` varchar(191) DEFAULT NULL,
  `lab_dip_image` varchar(191) DEFAULT NULL,
  `embellishment_s_o_approval_plan_date` varchar(191) DEFAULT NULL,
  `embellishment_s_o_approval_actual_date` varchar(191) DEFAULT NULL,
  `embellishment_s_o_dispatch_details` varchar(191) DEFAULT NULL,
  `embellishment_s_o_image` varchar(191) DEFAULT NULL,
  `fabric_ordered_plan_date` varchar(191) DEFAULT NULL,
  `fabric_ordered_actual_date` varchar(191) DEFAULT NULL,
  `bulk_fabric_knit_down_approval_plan_date` varchar(191) DEFAULT NULL,
  `bulk_fabric_knit_down_approval_actual_date` varchar(191) DEFAULT NULL,
  `bulk_fabric_knit_down_dispatch_details` varchar(191) DEFAULT NULL,
  `bulk_fabric_knit_down_image` varchar(191) DEFAULT NULL,
  `bulk_yarn_fabric_plan_date` varchar(191) DEFAULT NULL,
  `bulk_yarn_fabric_actual_date` varchar(191) DEFAULT NULL,
  `development_photo_sample_sent_plan_date` varchar(191) DEFAULT NULL,
  `development_photo_sample_sent_actual_date` varchar(191) DEFAULT NULL,
  `development_photo_sample_dispatch_details` varchar(191) DEFAULT NULL,
  `development_photo_sample_dispatch_sample_image` varchar(191) DEFAULT NULL,
  `fit_approval_plan` varchar(191) DEFAULT NULL,
  `fit_approval_actual` varchar(191) DEFAULT NULL,
  `fit_dispatch` varchar(191) DEFAULT NULL,
  `fit_sample_image` varchar(191) DEFAULT NULL,
  `size_set_approval` varchar(191) DEFAULT NULL,
  `size_set_actual` varchar(191) DEFAULT NULL,
  `size_set_dispatch` varchar(191) DEFAULT NULL,
  `size_set_image` varchar(191) DEFAULT NULL,
  `pp_approval` varchar(191) DEFAULT NULL,
  `pp_actual` varchar(191) DEFAULT NULL,
  `pp_dispatch` varchar(191) DEFAULT NULL,
  `pp_sample_image` varchar(191) DEFAULT NULL,
  `care_label_approval` varchar(191) DEFAULT NULL,
  `care_label_actual` varchar(191) DEFAULT NULL,
  `material_inhouse_plan` varchar(191) DEFAULT NULL,
  `material_inhouse_actual` varchar(191) DEFAULT NULL,
  `pp_meeting_plan` varchar(191) DEFAULT NULL,
  `pp_meeting_actual` varchar(191) DEFAULT NULL,
  `create_pp_meeting_schedule` text DEFAULT NULL,
  `pp_meeting_report_upload` text DEFAULT NULL,
  `cutting_date_plan` text DEFAULT NULL,
  `cutting_date_actual` text DEFAULT NULL,
  `embellishment_plan` text DEFAULT NULL,
  `embellishment_actual` text DEFAULT NULL,
  `Sewing_plan` text DEFAULT NULL,
  `Sewing_actual` text DEFAULT NULL,
  `washing_complete_plan` text DEFAULT NULL,
  `washing_complete_actual` text DEFAULT NULL,
  `finishing_complete_plan` text DEFAULT NULL,
  `finishing_complete_actual` text DEFAULT NULL,
  `sewing_inline_inspection_date_plan` text DEFAULT NULL,
  `sewing_inline_inspection_date_actual` text DEFAULT NULL,
  `create_inline_inspection_schdule` text DEFAULT NULL,
  `sewing_inline_inspection_report_upload` text DEFAULT NULL,
  `finishing_inline_inspection_report` text DEFAULT NULL,
  `finishing_inline_inspection_date_plan` text DEFAULT NULL,
  `finishing_inline_inspection_date_actual` text DEFAULT NULL,
  `pre_final_date_plan` text DEFAULT NULL,
  `pre_final_date_actual` text DEFAULT NULL,
  `create_aql_schedule` text DEFAULT NULL,
  `pre_final_aql_report_schedule` text DEFAULT NULL,
  `final_aql_date_plan` text DEFAULT NULL,
  `final_aql_date_actual` text DEFAULT NULL,
  `final_aql_report_upload` text DEFAULT NULL,
  `production_sample_approval_plan` text DEFAULT NULL,
  `production_sample_approval_actual` text DEFAULT NULL,
  `production_sample_dispatch` text DEFAULT NULL,
  `production_sample_upload` text DEFAULT NULL,
  `shipment_booking_with_acs_plan` text DEFAULT NULL,
  `shipment_booking_with_acs_actual` text DEFAULT NULL,
  `sa_approval_plan` text DEFAULT NULL,
  `sa_approval_actual` text DEFAULT NULL,
  `ex_factory_date_po` text DEFAULT NULL,
  `revised_ex_factory_date` text DEFAULT NULL,
  `actual_ex_factory_date` text DEFAULT NULL,
  `shipped_units` text DEFAULT NULL,
  `orginal_eta_sa_date` text DEFAULT NULL,
  `revised_eta_sa_date` text DEFAULT NULL,
  `ship_mode_sea_air` text DEFAULT NULL,
  `forward_ref` text DEFAULT NULL,
  `late_delivery_discounts_crp` text DEFAULT NULL,
  `invoice_num` text DEFAULT NULL,
  `invoice_create_date` text DEFAULT NULL,
  `payment_receive_date` text DEFAULT NULL,
  `vendor_last_update_date` text DEFAULT NULL,
  `reason_for_change_affect_shipment` text DEFAULT NULL,
  `aeon_comments_date` text DEFAULT NULL,
  `vendor_comments_date` text DEFAULT NULL,
  `sa_eta_5_days` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `critical_paths`
--

INSERT INTO `critical_paths` (`id`, `po_id`, `brand_id`, `department_id`, `season`, `image`, `fabric_type`, `block_repeat_initial`, `vendor`, `manufacture_unit`, `plm_number`, `purchase_order_number`, `style_no`, `order_qty`, `supplier_price_product_cost`, `total_value`, `style_description`, `care_label_date`, `colour`, `fabric_ref`, `fabric_content`, `fabric_weight`, `fabric_mill`, `lead_times`, `treated_as_priority_order`, `official_po_sent_plan_date`, `official_po_sent_actual_date`, `colour_std_print_artwork_sent_to_supplier_plan_date`, `colour_std_print_artwork_sent_to_supplier_actual_date`, `lab_dip_approval_plan_date`, `lab_dip_approval_actual_date`, `lab_dip_dispatch_details`, `lab_dip_image`, `embellishment_s_o_approval_plan_date`, `embellishment_s_o_approval_actual_date`, `embellishment_s_o_dispatch_details`, `embellishment_s_o_image`, `fabric_ordered_plan_date`, `fabric_ordered_actual_date`, `bulk_fabric_knit_down_approval_plan_date`, `bulk_fabric_knit_down_approval_actual_date`, `bulk_fabric_knit_down_dispatch_details`, `bulk_fabric_knit_down_image`, `bulk_yarn_fabric_plan_date`, `bulk_yarn_fabric_actual_date`, `development_photo_sample_sent_plan_date`, `development_photo_sample_sent_actual_date`, `development_photo_sample_dispatch_details`, `development_photo_sample_dispatch_sample_image`, `fit_approval_plan`, `fit_approval_actual`, `fit_dispatch`, `fit_sample_image`, `size_set_approval`, `size_set_actual`, `size_set_dispatch`, `size_set_image`, `pp_approval`, `pp_actual`, `pp_dispatch`, `pp_sample_image`, `care_label_approval`, `care_label_actual`, `material_inhouse_plan`, `material_inhouse_actual`, `pp_meeting_plan`, `pp_meeting_actual`, `create_pp_meeting_schedule`, `pp_meeting_report_upload`, `cutting_date_plan`, `cutting_date_actual`, `embellishment_plan`, `embellishment_actual`, `Sewing_plan`, `Sewing_actual`, `washing_complete_plan`, `washing_complete_actual`, `finishing_complete_plan`, `finishing_complete_actual`, `sewing_inline_inspection_date_plan`, `sewing_inline_inspection_date_actual`, `create_inline_inspection_schdule`, `sewing_inline_inspection_report_upload`, `finishing_inline_inspection_report`, `finishing_inline_inspection_date_plan`, `finishing_inline_inspection_date_actual`, `pre_final_date_plan`, `pre_final_date_actual`, `create_aql_schedule`, `pre_final_aql_report_schedule`, `final_aql_date_plan`, `final_aql_date_actual`, `final_aql_report_upload`, `production_sample_approval_plan`, `production_sample_approval_actual`, `production_sample_dispatch`, `production_sample_upload`, `shipment_booking_with_acs_plan`, `shipment_booking_with_acs_actual`, `sa_approval_plan`, `sa_approval_actual`, `ex_factory_date_po`, `revised_ex_factory_date`, `actual_ex_factory_date`, `shipped_units`, `orginal_eta_sa_date`, `revised_eta_sa_date`, `ship_mode_sea_air`, `forward_ref`, `late_delivery_discounts_crp`, `invoice_num`, `invoice_create_date`, `payment_receive_date`, `vendor_last_update_date`, `reason_for_change_affect_shipment`, `aeon_comments_date`, `vendor_comments_date`, `sa_eta_5_days`, `note`, `created_at`, `updated_at`) VALUES
(78, 89, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '230', 'Regular Lead Time', '2023-01-19', '2024-01-17', '2023-03-13', NULL, '2023-03-13', NULL, NULL, NULL, '2023-03-20', NULL, NULL, NULL, '2023-02-03', NULL, NULL, NULL, NULL, NULL, '2023-04-09', NULL, '2023-02-24', NULL, NULL, NULL, '2023-03-06', NULL, NULL, NULL, '2023-03-20', NULL, NULL, NULL, '2023-04-03', NULL, NULL, NULL, '2023-04-03', NULL, '2023-04-11', NULL, '2023-04-13', NULL, NULL, NULL, '2023-04-16', NULL, '2023-04-18', NULL, '2023-05-03', NULL, '2023-05-18', NULL, '2023-05-23', NULL, '2023-05-18', NULL, NULL, NULL, NULL, '2023-05-22', NULL, '2023-05-22', NULL, NULL, NULL, '2023-05-25', NULL, NULL, '2023-05-23', NULL, NULL, NULL, '2023-05-11', NULL, '2023-05-27', NULL, '2023-06-01', NULL, NULL, NULL, '2023-07-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(79, 90, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 'Short Lead Time', '', '2024-08-10', '2024-05-09', NULL, '2024-05-09', NULL, NULL, NULL, '2024-05-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05', NULL, '2024-04-22', NULL, NULL, NULL, '2024-05-02', NULL, NULL, NULL, '2024-05-16', NULL, NULL, NULL, '2024-05-30', NULL, NULL, NULL, '2024-05-30', NULL, '2024-06-07', NULL, '2024-06-09', NULL, NULL, NULL, '2024-06-12', NULL, '2024-06-14', NULL, '2024-06-29', NULL, '2024-07-14', NULL, '2024-07-19', NULL, '2024-07-14', NULL, NULL, NULL, NULL, '2024-07-18', NULL, '2024-07-18', NULL, NULL, NULL, '2024-07-21', NULL, NULL, '2024-07-19', NULL, NULL, NULL, '2024-07-07', NULL, '2024-07-23', NULL, '2024-07-28', NULL, NULL, NULL, '2024-09-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 06:55:01', '2024-08-10 06:55:01'),
(80, 91, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', 'Short Lead Time', '', '2024-08-10', '2024-05-09', NULL, '2024-05-09', NULL, NULL, NULL, '2024-05-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-05', NULL, '2024-04-22', NULL, NULL, NULL, '2024-05-02', NULL, NULL, NULL, '2024-05-16', NULL, NULL, NULL, '2024-05-30', NULL, NULL, NULL, '2024-05-30', NULL, '2024-06-07', NULL, '2024-06-09', NULL, NULL, NULL, '2024-06-12', NULL, '2024-06-14', NULL, '2024-06-29', NULL, '2024-07-14', NULL, '2024-07-19', NULL, '2024-07-14', NULL, NULL, NULL, NULL, '2024-07-18', NULL, '2024-07-18', NULL, NULL, NULL, '2024-07-21', NULL, NULL, '2024-07-19', NULL, NULL, NULL, '2024-07-07', NULL, '2024-07-23', NULL, '2024-07-28', NULL, NULL, NULL, '2024-09-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 07:21:17', '2024-08-10 07:21:17'),
(81, 92, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'Short Lead Time', '2024-04-22', '2024-08-12', '2024-05-10', NULL, '2024-05-10', NULL, NULL, NULL, '2024-05-17', NULL, NULL, NULL, '2024-05-07', NULL, NULL, NULL, NULL, NULL, '2024-06-06', NULL, '2024-04-23', NULL, NULL, NULL, '2024-05-03', NULL, NULL, NULL, '2024-05-17', NULL, NULL, NULL, '2024-05-31', NULL, NULL, NULL, '2024-05-31', NULL, '2024-06-08', NULL, '2024-06-10', NULL, NULL, NULL, '2024-06-13', NULL, '2024-06-15', NULL, '2024-06-30', NULL, '2024-07-15', NULL, '2024-07-20', NULL, '2024-07-15', NULL, NULL, NULL, NULL, '2024-07-19', NULL, '2024-07-19', NULL, NULL, NULL, '2024-07-22', NULL, NULL, '2024-07-20', NULL, NULL, NULL, '2024-07-08', NULL, '2024-07-24', NULL, '2024-07-29', NULL, NULL, NULL, '2024-09-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 04:30:03', '2024-08-12 04:30:03'),
(82, 93, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14', 'Short Lead Time', '', '2024-08-12', '2024-05-10', NULL, '2024-05-10', NULL, NULL, NULL, '2024-05-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-06', NULL, '2024-04-23', NULL, NULL, NULL, '2024-05-03', NULL, NULL, NULL, '2024-05-17', NULL, NULL, NULL, '2024-05-31', NULL, NULL, NULL, '2024-05-31', NULL, '2024-06-08', NULL, '2024-06-10', NULL, NULL, NULL, '2024-06-13', NULL, '2024-06-15', NULL, '2024-06-30', NULL, '2024-07-15', NULL, '2024-07-20', NULL, '2024-07-15', NULL, NULL, NULL, NULL, '2024-07-19', NULL, '2024-07-19', NULL, NULL, NULL, '2024-07-22', NULL, NULL, '2024-07-20', NULL, NULL, NULL, '2024-07-08', NULL, '2024-07-24', NULL, '2024-07-29', NULL, NULL, NULL, '2024-09-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 04:48:25', '2024-08-12 04:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(18, '2023_08_27_190901_create_critical_details_table', 2),
(19, '2024_07_31_102113_add_email_to_vendors_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plm` varchar(255) DEFAULT NULL,
  `style_no` varchar(255) DEFAULT NULL,
  `colour` varchar(255) DEFAULT NULL,
  `item_no` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty_ordered` varchar(255) DEFAULT NULL,
  `inner_qty` varchar(255) DEFAULT NULL,
  `outer_case_qty` varchar(255) DEFAULT NULL,
  `supplier_price` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(956, 89, 'PLM-69852', NULL, NULL, '6009226481963', '9', '396', '1', '35', '3.51', '1389.96', '229.00', '2024-01-17 09:01:53', '2024-01-17 09:01:53'),
(957, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 06:55:01', '2024-08-10 06:55:01'),
(958, 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 07:21:17', '2024-08-10 07:21:17'),
(959, 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 04:30:03', '2024-08-12 04:30:03'),
(960, 93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 04:48:25', '2024-08-12 04:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `purchage_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `po_department` varchar(255) DEFAULT NULL,
  `buyer_price` varchar(255) DEFAULT NULL,
  `access_price` varchar(255) DEFAULT NULL,
  `style_note` varchar(255) DEFAULT NULL,
  `vendor_price` varchar(255) DEFAULT NULL,
  `earliest_buyer_date` varchar(255) DEFAULT NULL,
  `buyer_date` varchar(255) DEFAULT NULL,
  `ex_factory_date` varchar(255) DEFAULT NULL,
  `po_no` varchar(255) DEFAULT NULL,
  `plm` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fabric_quality` varchar(255) DEFAULT NULL,
  `fabric_type` text DEFAULT NULL,
  `fabric_content` varchar(255) DEFAULT NULL,
  `approved_date` text DEFAULT NULL,
  `supplier_no` varchar(255) DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `payment_terms` varchar(255) DEFAULT NULL,
  `ship_mode` varchar(255) DEFAULT NULL,
  `care_lavel_date` varchar(255) DEFAULT NULL,
  `stlye_no` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty_ordered` varchar(255) DEFAULT NULL,
  `inner_qty` varchar(255) DEFAULT NULL,
  `outer_case_qty` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) DEFAULT NULL,
  `upload_picture_germent` varchar(255) DEFAULT NULL,
  `upload_artwork` varchar(255) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `item_no` varchar(255) DEFAULT NULL,
  `colour` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchage_orders`
--

INSERT INTO `purchage_orders` (`id`, `buyer_id`, `department_id`, `vendor_id`, `po_department`, `buyer_price`, `access_price`, `style_note`, `vendor_price`, `earliest_buyer_date`, `buyer_date`, `ex_factory_date`, `po_no`, `plm`, `description`, `fabric_quality`, `fabric_type`, `fabric_content`, `approved_date`, `supplier_no`, `supplier_name`, `currency`, `payment_terms`, `ship_mode`, `care_lavel_date`, `stlye_no`, `size`, `qty_ordered`, `inner_qty`, `outer_case_qty`, `value`, `selling_price`, `upload_picture_germent`, `upload_artwork`, `note`, `item_no`, `colour`, `created_at`, `updated_at`) VALUES
(89, 1, 1, 1, NULL, '3.60', '0.20', 'Price : 3.31 + 0.20 = 3.51', '3.31', '2023-06-15', NULL, '2023-06-01', '67166531', 'PLM-69852', 'KNIT DENIM SHORT', 'good', '3', 'very good', '2023-03-07', '14384', 'CREATION LOYAL HONGKONG LIMITED', 'USD', 'TT @ Sight', 'Sea', '2024-01-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/garments/product_image_1705485713.jpeg', NULL, 'note', NULL, NULL, '2024-01-17 09:01:53', '2024-01-17 09:02:25'),
(90, 1, 1, 1, NULL, '3.60', '20', '3.51', '3.45', '2024-08-11', NULL, '2024-07-28', '013456789', 'hh', 'h', 'good', '1', 'yy', '2024-08-15', '0123456789', 'gfhj', '90', 'g', 'h', '2024-08-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/garments/r_1723276501.jfif', 'storage/artworks/Woolworth_1723276501.pdf', 'j', NULL, NULL, '2024-08-10 06:55:01', '2024-08-10 06:55:01'),
(91, 1, 1, 1, NULL, '3.60', '20', '3.51', '3.45', '2024-08-11', NULL, '2024-07-28', '013456789', 'hh', 'h', 'good', '1', 'yy', '2024-08-15', '0123456789', 'gfhj', '90', 'g', 'h', '2024-08-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/garments/r_1723278077.jfif', 'storage/artworks/Woolworth_1723278077.pdf', 'j', NULL, NULL, '2024-08-10 07:21:17', '2024-08-10 07:21:17'),
(92, 1, 1, 1, NULL, '3.60', '20', '3.51', '3.31', '2024-08-12', NULL, '2024-07-29', '01234567', 'hh', 'h', 'good', '2', 'yy', '2024-08-15', '0123456789', 'gfhj', '90', 'g', 'h', '2024-08-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/garments/b1_1723440603.jpg', 'storage/artworks/Woolworth_1723440603.pdf', 'qsdfgh', NULL, NULL, '2024-08-12 04:30:03', '2024-08-12 04:30:03'),
(93, 1, 1, 1, NULL, '3.60', '20', '3.51', '3.31', '2024-08-12', NULL, '2024-07-29', '01234567', 'hh', 'h', 'good', '1', 'yy', '2024-08-14', '0123456789', 'gfhj', '90', 'g', 'h', '2024-08-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'storage/garments/e_1723441705.jfif', 'storage/artworks/Woolworth_1723441705.pdf', 'sa', NULL, NULL, '2024-08-12 04:48:25', '2024-08-12 04:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(15, 3),
(16, 1),
(16, 3),
(17, 1),
(17, 2),
(17, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `token_expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `theme` varchar(30) NOT NULL DEFAULT 'default',
  `buyer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `theme`, `buyer_id`, `vendor_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shourov', 'admin@gmail.com', NULL, '$2y$10$.hotgnoqR2GRFLMWs/p6JOqoAxmIOuJIaog4YFLhUJb/ZNWQORhFK', 'default', NULL, NULL, 'TK2f5Q6Id931m2su4tpWuLSGOr46rbNmOfw2N03yWLvnzyCrILYi7YHbL4tL', '2023-08-26 16:56:08', '2023-08-26 16:56:08'),
(2, 'Admin', 'admin@admin.com', NULL, '$2y$10$Bq8axmHaNUvdjqrDbbQJhORvPhcYQEDjLU8y5SsJT0l0iPJmNLIqu', 'default', NULL, NULL, NULL, '2023-10-10 12:13:21', '2024-01-20 08:27:13'),
(3, 'buyer', 'buyer@gmail.com', NULL, '$2y$10$oz4dVWnJ1mJHvkHbYGy6ROdWxNmF7nM7TlrZ7oosmO4VFJDd566C.', 'default', 1, NULL, NULL, '2023-10-30 23:39:19', '2023-10-30 23:39:19'),
(4, 'Super Admin', 'superadmin@test.com', NULL, '$2y$10$LSaoOi7frqBPA0XKupW8uuI6Op5XgXKPZg.0w6r8L2BcXOQ0RdcM6', 'default', NULL, NULL, NULL, '2024-01-06 13:02:50', '2024-01-06 13:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'MITALI GROUP', 'a@gmail.com', 'storage/logos/e_1722408098.jfif', '2023-08-26 17:06:31', '2024-07-31 05:41:38'),
(3, 'e', 'e@gmail.com', 'storage/logos/download_1722403755.jfif', '2024-07-31 04:29:16', '2024-07-31 04:29:16'),
(6, 'ar', 'ar@gmail.com', 'storage/logos/e_1722420375.jfif', '2024-07-31 04:56:08', '2024-07-31 09:06:15'),
(7, 'arif', 'arif@gmail.com', 'storage/logos/r_1722420344.jfif', '2024-07-31 09:05:44', '2024-07-31 09:05:44'),
(8, 'Dream Diver Software Ltd', 'admin@gmail.com', 'storage/logos/logo_1723275829.png', '2024-08-10 06:43:49', '2024-08-10 06:43:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_users`
--
ALTER TABLE `api_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_users_name_unique` (`name`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_manufacturer_id_foreign` (`manufacturer_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_buyer_department_id_foreign` (`buyer_department_id`),
  ADD KEY `contacts_vendor_manufacturer_id_foreign` (`vendor_manufacturer_id`);

--
-- Indexes for table `critical_details`
--
ALTER TABLE `critical_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `critical_paths`
--
ALTER TABLE `critical_paths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_buyer_id_foreign` (`buyer_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturers_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_po_id_foreign` (`po_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchage_orders`
--
ALTER TABLE `purchage_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchage_orders_buyer_id_foreign` (`buyer_id`),
  ADD KEY `purchage_orders_department_id_foreign` (`department_id`),
  ADD KEY `purchage_orders_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tokens_token_unique` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_buyer_id_foreign` (`buyer_id`),
  ADD KEY `users_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_users`
--
ALTER TABLE `api_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `critical_details`
--
ALTER TABLE `critical_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `critical_paths`
--
ALTER TABLE `critical_paths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=961;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchage_orders`
--
ALTER TABLE `purchage_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
