-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2023 at 10:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `start_time` date NOT NULL,
  `venue` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_time`, `venue`, `user_id`) VALUES
(1, 'Zemlak LLC', 'Deleniti aut sunt iusto et necessitatibus. Ut minima molestiae est et porro. Quis sint sint vero unde voluptates aperiam aspernatur. Possimus voluptas cum iusto libero hic sed voluptatibus.', '1986-08-23', '38056 Esperanza Trail Apt. 550\nAnkundingbury, NM 42868-2612', 1),
(2, 'Robel Inc1', 'Sit voluptatem totam esse ipsa assumenda sed sequi. Velit quia ut nobis eligendi beatae. Dolor quibusdam nihil ut culpa quisquam. Iste unde in inventore incidunt dolor reprehenderit facere.', '2002-01-03', '600 Leffler Summit Suite 302Kundeburgh, SC 99923-8620', 2),
(3, 'Ullrich, Erdman and Schmeler', 'Qui nobis velit eaque porro. Praesentium maiores sunt est cupiditate. Omnis vitae est rem veritatis.', '2002-12-26', '555 Ernser Cove\nEast Yasminside, MT 61342', 1),
(4, 'Rath Group', 'Sint doloribus ut ut nam dicta officia. Est id necessitatibus molestiae illum. Eius non repellat cupiditate et illum. Omnis velit doloribus odit.', '2012-04-08', '142 Bradtke Motorway\nMilesland, FL 34450', 1),
(5, 'Bode-Stracke', 'Ut velit eum inventore dolorem sunt fuga necessitatibus. In similique ad voluptatibus et aliquam deserunt enim. Consequatur sit recusandae possimus id fuga ipsum consectetur eveniet.', '1974-07-19', '47971 Kurt Junction\nPort Sherwood, MA 73529', 2),
(6, 'Jast, Goyette and Muller', 'Vel ut sit qui occaecati rerum ut. Assumenda beatae rem est excepturi deleniti. Accusamus deleniti ut voluptas. Praesentium blanditiis et modi aut ut quos iusto.', '1971-06-15', '8932 Rudolph Pine Suite 971\nLuciusland, NV 98072-2293', 2),
(7, 'Doyle and Sons', 'Velit veritatis autem maiores maiores at amet non. Nam natus architecto velit nemo. Id et quis quae. Sed porro dolorum qui est rerum placeat.', '1984-02-05', '73670 Ledner Lodge Suite 292\nEast Bradyfort, DC 02070', 1),
(8, 'Welch LLC', 'Voluptatem labore vel autem vitae. Veritatis distinctio reprehenderit qui qui dolorum autem explicabo. Omnis dolores dolor fugiat voluptates. Omnis debitis nam quo eveniet.', '1984-10-15', '631 Stark Locks Suite 053\nSouth Kamronview, WY 62308-2980', 1),
(9, 'Carroll, Schamberger and O\'Hara', 'Velit architecto omnis pariatur incidunt sunt praesentium nihil. Amet est rerum fugit. Cumque velit ipsa nisi minus sunt.', '1975-01-14', '81892 Miller Point Apt. 507\nSouth Broderick, UT 70772-0431', 1),
(10, 'Hansen Inc', 'Inventore aut voluptas sit illum soluta neque officiis. Quis rerum vero voluptatem quia. Doloribus sunt hic molestiae repudiandae ratione. Eum nulla fuga nihil est ab quia.', '1985-05-17', '1716 Green Alley Suite 099\nSouth Lennieshire, SC 00302', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_05_31_205732_create_1496253452_roles_table', 1),
(3, '2017_05_31_205733_create_1496253453_users_table', 1),
(4, '2017_05_31_211005_create_1496254205_events_table', 1),
(5, '2017_05_31_211614_create_1496254574_tickets_table', 1),
(6, '2017_05_31_211803_create_1496254683_payments_table', 1),
(7, '2017_05_31_222713_update_1496258833_payments_table', 1),
(8, '2017_06_01_200859_create_payments_tickets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `merchant` varchar(191) NOT NULL,
  `amount` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments_tickets`
--

CREATE TABLE `payments_tickets` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `tickets_amount` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator (can create other users)', '2019-06-11 16:39:15', '2019-06-11 16:39:15'),
(2, 'Simple user', '2019-06-11 16:39:15', '2019-06-11 16:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `price` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `amount`, `price`) VALUES
(1, 1, 100, 21.00),
(2, 1, 1000, 25.20),
(3, 2, 100, 20.00),
(4, 2, 1000, 24.00),
(5, 3, 100, 20.00),
(6, 3, 1000, 24.00),
(7, 4, 100, 20.00),
(8, 4, 1000, 24.00),
(9, 5, 100, 13.00),
(10, 5, 1000, 15.60),
(11, 6, 100, 10.00),
(12, 6, 1000, 12.00),
(13, 7, 100, 18.00),
(14, 7, 1000, 21.60),
(15, 8, 100, 20.00),
(16, 8, 1000, 24.00),
(17, 9, 100, 13.00),
(18, 9, 1000, 15.60),
(19, 10, 100, 10.00),
(20, 10, 1000, 12.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(1, 'Admin', 'admin@admin.com', 'hello', 1),
(2, 'Antony', 'antonyalappat12345@gmail.com', 'hello', 1),
(3, 'Antony alappat', 'antonyalappat@gmail.com', 'world', 2),
(4, 'Antony alap', 'antonyalappat125@gmail.com', 'hello', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`user_id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_tickets`
--
ALTER TABLE `payments_tickets`
  ADD KEY `payments_tickets_payment_id_foreign` (`payment_id`),
  ADD KEY `payments_tickets_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `41526_592f086e76f1b` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `41521_592f040dd61ce` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments_tickets`
--
ALTER TABLE `payments_tickets`
  ADD CONSTRAINT `payments_tickets_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_tickets_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `41526_592f086e76f1b` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `41521_592f040dd61ce` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
