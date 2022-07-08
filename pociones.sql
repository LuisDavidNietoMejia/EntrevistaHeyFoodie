-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-07-2022 a las 18:36:54
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pociones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2022_07_07_000000_create_potions_table', 1),
(20, '2022_07_08_000000_create_potion_ingredients_table', 1),
(21, '2022_07_09_000000_create_sales_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `potions`
--

CREATE TABLE `potions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `potions`
--

INSERT INTO `potions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Poción de amor', '2022-07-08 19:50:50', '2022-07-08 19:50:50'),
(2, 'Poción alisadora', '2022-07-08 19:50:50', '2022-07-08 19:50:50'),
(3, 'Poción multijugos', '2022-07-08 19:50:50', '2022-07-08 19:50:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `potion_ingredients`
--

CREATE TABLE `potion_ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `potion_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `potion_ingredients`
--

INSERT INTO `potion_ingredients` (`id`, `name`, `amount`, `price`, `potion_id`, `created_at`, `updated_at`) VALUES
(1, 'Petalos', 2, 2000, 1, '2022-07-08 19:50:50', '2022-07-08 19:50:50'),
(2, 'Sal de mar', 1, 3000, 1, '2022-07-08 19:50:50', '2022-07-08 19:50:50'),
(3, 'Vino', 4, 6000, 1, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(4, 'Polvo magico', 3, 30000, 1, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(5, 'Cenizas', 3, 2500, 2, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(6, 'Aloe vera', 3, 1500, 2, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(7, 'Lagrima de gato', 1, 9000, 2, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(8, 'Jugo magico', 3, 27000, 2, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(9, 'Sanguijuelas', 2, 13000, 3, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(10, 'Polvo de cuerno de bicornio', 1, 65000, 3, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(11, 'Lagrima de gato', 3, 9000, 3, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(12, 'Polvo magico', 2, 30000, 3, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(13, 'Sal de mar', 1, 3000, 3, '2022-07-08 19:50:51', '2022-07-08 19:50:51'),
(14, 'Cenizas', 3, 2500, 3, '2022-07-08 19:50:51', '2022-07-08 19:50:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `sale_date` datetime NOT NULL,
  `potion_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `amount`, `sale`, `sale_date`, `potion_id`, `client_id`, `created_at`, `updated_at`) VALUES
(14, 232, 9512000, '2022-07-02 00:00:00', 1, 1, '2022-07-08 21:44:30', '2022-07-08 22:29:42'),
(15, 1, 40000, '2022-07-15 00:00:00', 2, 1, '2022-07-08 21:45:19', '2022-07-08 21:45:19'),
(16, 2, 80000, '2022-07-15 00:00:00', 2, 1, '2022-07-08 21:45:26', '2022-07-08 21:45:26'),
(17, 2, 82000, '2022-07-09 00:00:00', 1, 2, '2022-07-08 22:11:26', '2022-07-08 22:11:26'),
(18, 3, 123000, '2022-07-09 00:00:00', 1, 2, '2022-07-08 22:11:32', '2022-07-08 22:11:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'luis david', 'nieto mejia', 'luisdavidnietomejia@gmail.com', NULL, '$2y$10$OctNzkxVMkAIC1WAWlKUuexr3YYOMhvfRi/X.r8H7HvDuKuBtPjOO', NULL, NULL, '2022-07-08 19:51:23', '2022-07-08 19:51:23'),
(2, 'maruo', 'kunn', 'maruo@gmail.com', NULL, '$2y$10$P4oFW9b44G3kkuSlJ2WdCO5WbiYJqJp1Om7GbOUuN9tKQsMbGs6vq', NULL, NULL, '2022-07-08 20:08:13', '2022-07-08 20:08:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `potions`
--
ALTER TABLE `potions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `potion_ingredients`
--
ALTER TABLE `potion_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `potion_ingredients_potion_id_foreign` (`potion_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_potion_id_foreign` (`potion_id`),
  ADD KEY `sales_client_id_foreign` (`client_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `potions`
--
ALTER TABLE `potions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `potion_ingredients`
--
ALTER TABLE `potion_ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `potion_ingredients`
--
ALTER TABLE `potion_ingredients`
  ADD CONSTRAINT `potion_ingredients_potion_id_foreign` FOREIGN KEY (`potion_id`) REFERENCES `potions` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `sales_potion_id_foreign` FOREIGN KEY (`potion_id`) REFERENCES `potions` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
