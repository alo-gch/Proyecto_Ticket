-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2021 a las 03:16:13
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tickets_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attention_schedules`
--

CREATE TABLE `attention_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `attention_schedules`
--

INSERT INTO `attention_schedules` (`id`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, '09:00:00', '16:00:00', '2021-01-23 06:53:48', '2021-01-23 06:53:48'),
(2, '00:00:00', '11:00:00', '2021-01-23 06:56:35', '2021-01-23 06:56:35'),
(3, '00:00:00', '23:00:00', '2021-01-23 06:56:59', '2021-01-23 06:56:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cash_receipts`
--

CREATE TABLE `cash_receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cash_receipts`
--

INSERT INTO `cash_receipts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin_cash', '2021-01-23 06:53:48', '2021-01-23 06:53:48'),
(2, 'Pagos', '2021-01-23 06:57:25', '2021-01-23 06:57:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_09_215715_create_cash_receipts_table', 1),
(2, '2014_10_10_215641_create_roles_table', 1),
(3, '2014_10_10_215649_create_peoples_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2021_01_17_215741_create_attention_schedules_table', 1),
(8, '2021_01_17_215836_create_type_tickets_table', 1),
(9, '2021_01_17_215858_create_tickets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peoples`
--

CREATE TABLE `peoples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_surname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_surname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cash_receipt_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `peoples`
--

INSERT INTO `peoples` (`id`, `first_name`, `second_name`, `first_surname`, `second_surname`, `phone`, `cash_receipt_id`, `created_at`, `updated_at`) VALUES
(1, 'Alondra', 'Geovvana', 'Chavez', 'Hernandez', '9613310195', 1, '2021-01-23 06:53:48', '2021-01-23 06:53:48'),
(2, 'Demostración', 'Demostracion', 'Demostracion', 'Demostracion', '9611606240', 2, '2021-01-23 06:57:52', '2021-01-25 02:13:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-01-23 06:53:48', '2021-01-23 06:53:48'),
(2, 'cajero', '2021-01-23 06:53:48', '2021-01-23 06:53:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `solution` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayed_on_screen` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_ticket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `status`, `solution`, `displayed_on_screen`, `user_id`, `type_ticket_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'cerrar', 1, 2, 1, '2021-01-23 06:58:06', '2021-01-23 06:59:45'),
(2, 2, 'adssadas', 1, 2, 2, '2021-01-23 06:58:09', '2021-01-23 07:00:00'),
(3, 2, 'pasodakda', 1, 2, 1, '2021-01-23 06:58:11', '2021-01-23 06:59:53'),
(4, 0, NULL, 0, NULL, 1, '2021-01-25 02:14:27', '2021-01-25 02:14:27'),
(5, 0, NULL, 0, NULL, 2, '2021-01-25 02:14:30', '2021-01-25 02:14:30'),
(6, 0, NULL, 0, NULL, 2, '2021-01-25 02:14:31', '2021-01-25 02:14:31'),
(7, 0, NULL, 0, NULL, 2, '2021-01-25 02:14:32', '2021-01-25 02:14:32'),
(8, 0, NULL, 0, NULL, 2, '2021-01-25 02:14:32', '2021-01-25 02:14:32'),
(9, 0, NULL, 0, NULL, 2, '2021-01-25 02:14:33', '2021-01-25 02:14:33'),
(10, 0, NULL, 0, NULL, 2, '2021-01-25 02:14:34', '2021-01-25 02:14:34'),
(11, 0, NULL, 0, NULL, 2, '2021-01-25 02:14:34', '2021-01-25 02:14:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_tickets`
--

CREATE TABLE `type_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `type_tickets`
--

INSERT INTO `type_tickets` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pagos', '2021-01-23 06:56:11', '2021-01-23 06:56:11'),
(2, 'Retiros', '2021-01-23 06:56:16', '2021-01-23 06:56:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enrollment` int(10) UNSIGNED NOT NULL,
  `people_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `enrollment`, `people_id`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '2021-01-23 06:53:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 123456789, 1, 1, 'g9LH8cb8Zb', '2021-01-23 06:53:48', '2021-01-23 06:53:48'),
(2, 'demo@gmail.com', NULL, '$2y$10$XnLJUdQCxlTpYCO987dIqute5gbFyDFd6/NkpUBt7wrz4gYMsMuq6', 12345, 2, 2, NULL, '2021-01-23 06:57:52', '2021-01-25 02:13:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attention_schedules`
--
ALTER TABLE `attention_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cash_receipts`
--
ALTER TABLE `cash_receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peoples_cash_receipt_id_foreign` (`cash_receipt_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`),
  ADD KEY `tickets_type_ticket_id_foreign` (`type_ticket_id`);

--
-- Indices de la tabla `type_tickets`
--
ALTER TABLE `type_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_people_id_foreign` (`people_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `attention_schedules`
--
ALTER TABLE `attention_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cash_receipts`
--
ALTER TABLE `cash_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `type_tickets`
--
ALTER TABLE `type_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peoples`
--
ALTER TABLE `peoples`
  ADD CONSTRAINT `peoples_cash_receipt_id_foreign` FOREIGN KEY (`cash_receipt_id`) REFERENCES `cash_receipts` (`id`);

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_type_ticket_id_foreign` FOREIGN KEY (`type_ticket_id`) REFERENCES `type_tickets` (`id`),
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_people_id_foreign` FOREIGN KEY (`people_id`) REFERENCES `peoples` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
