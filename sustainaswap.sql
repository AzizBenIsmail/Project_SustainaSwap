-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 oct. 2023 à 01:22
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sustainaswap`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_chats`
--

CREATE TABLE `admin_chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `trade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `comment`, `trade_id`, `created_at`, `updated_at`) VALUES
(1, 'Bad expirence', 2, NULL, NULL),
(2, '\"Great trade! I received the items in perfect condition and on time. Thanks for the smooth transaction.\"\n', 3, '2023-10-22 19:29:27', '2023-10-22 19:29:27'),
(3, 'it was a good expirience', 3, '2023-10-22 19:30:31', '2023-10-22 19:30:31');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Brico', 'Le bricolage est une activité manuelle visant à réparer, entretenir, améliorer ou fabriquer de petits objets. On dit d\'une personne habile de ses mains qu\'il est un « bon bricoleur ». À l\'inverse, l\'expression « bricoleur du dimanche » est plus péjorative', '2023-10-21 15:16:57', '2023-10-21 19:52:11'),
(2, 'culture', 'En philosophie, le mot culture désigne ce qui est différent de la nature. En sociologie, comme en éthologie, la culture est définie de façon plus étroite comme « ce qui est commun à un groupe d\'individus » et comme « ce qui le soude »,', '2023-10-21 15:17:03', '2023-10-21 19:53:14'),
(3, 'gardiennage', 'L\'agent de gardiennage assure la surveillance générale d\'un site, prend en charge tous les travaux d\'entretien et de petites réparations dans la limite de ses compétences et remplit des missions de service auprès des locataires et bailleurs du site', '2023-10-21 15:17:08', '2023-10-21 19:53:53'),
(4, 'decor', 'Ensemble des éléments qui décorent un lieu, qui contribuent à l\'aménagement esthétique d\'une habitation : Un décor luxueux', '2023-10-21 15:36:26', '2023-10-21 19:54:10'),
(5, 'matière 1ere', 'Une matière première est une substance d\'origine naturelle qui doit être transformée afin d\'être utilisée dans la fabrication d\'un objet technique', '2023-10-21 19:58:05', '2023-10-21 19:58:05');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'oui je confirme une mauvaise qualité', 3, 1, '2023-10-22 21:06:38', '2023-10-22 21:06:38'),
(2, 'non passable', 3, 1, '2023-10-22 21:06:46', '2023-10-22 21:06:46'),
(3, 'oui cvp', 3, 1, '2023-10-22 21:06:58', '2023-10-22 21:06:58'),
(4, 'une problème au niveau de détecteur', 3, 2, '2023-10-22 21:07:19', '2023-10-22 21:07:19'),
(5, 'oui je valide une mauvaise qualité', 3, 1, '2023-10-22 21:07:43', '2023-10-22 21:07:43'),
(6, 'oui je confirme produit zero .', 3, 1, '2023-10-22 21:07:58', '2023-10-22 21:08:29');

-- --------------------------------------------------------

--
-- Structure de la table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `emailSubject` varchar(255) NOT NULL,
  `emailMessage` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `answeredBy` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_group` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `picture` varchar(255) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `state` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `picture`, `title`, `description`, `state`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '1697915401.jpg', 'Projecteur', 'az az zz', 'Good', 3, 2, '2023-10-21 15:35:59', '2023-10-21 18:49:36'),
(2, '1697915494.jpg', 'plante', 'er erfe', 'Good', 3, 3, '2023-10-21 15:36:12', '2023-10-21 18:11:34'),
(4, '1697907157.jpg', 'marto', 'uiu', 'Good', 3, 1, '2023-10-21 15:52:37', '2023-10-21 15:52:37'),
(5, '1697915652.jpg', 'coleb', 'aza az', 'Good', 3, 1, '2023-10-21 18:14:12', '2023-10-21 18:14:12'),
(6, '1697915682.jpg', 'plante - Verte', 'plante - Verte', 'Good', 3, 3, '2023-10-21 18:14:42', '2023-10-21 18:14:42'),
(7, '1697915762.jpg', 'Plante-Mons', 'Plante - Artificielle - Monstera', 'Medium', 3, 3, '2023-10-21 18:16:02', '2023-10-21 18:47:21'),
(8, '1697915826.jpg', 'mtar9a', 'Plante - Artificielle - Monstera', 'Bad', 3, 1, '2023-10-21 18:17:06', '2023-10-21 18:17:06'),
(9, '1697915846.jpg', 'Monceau Fleurs', 'Monceau Fleurs', 'Good', 3, 3, '2023-10-21 18:17:26', '2023-10-21 18:17:26'),
(10, '1697915981.jpg', 'Un monde juste', 'Un monde plus juste', 'Good', 3, 2, '2023-10-21 18:19:41', '2023-10-21 18:49:25'),
(11, '1697916064.jpg', 'intérieur', 'plante d\'intérieur', 'Medium', 3, 3, '2023-10-21 18:21:04', '2023-10-21 18:47:39'),
(12, '1697916083.jpg', 'livre', 'plante d\'intérieur', 'Good', 3, 2, '2023-10-21 18:21:23', '2023-10-21 18:21:23'),
(13, '1697916152.jpg', 'jardineri', '- La jardineri', 'Good', 3, 3, '2023-10-21 18:22:32', '2023-10-21 18:48:00'),
(14, '1697916178.jpg', 'Plantes salon', 'Plantes de salon', 'Good', 3, 3, '2023-10-21 18:22:58', '2023-10-21 18:48:09'),
(15, '1697916202.jpg', 'vis', 'Plantes de salon', 'Medium', 3, 1, '2023-10-21 18:23:22', '2023-10-21 18:23:22'),
(16, '1697919138.jpg', 'Mreya', 'decor', 'Good', 4, 4, '2023-10-21 19:12:18', '2023-10-21 19:12:18'),
(17, '1697919363.jpg', 'Salon', 'decor', 'Good', 4, 4, '2023-10-21 19:16:03', '2023-10-21 19:16:03'),
(18, '1697920953.jpg', 'Mur', 'Decor', 'Good', 4, 4, '2023-10-21 19:42:33', '2023-10-21 19:42:33'),
(19, '1697922371.jpg', 'Bois', 'Les bois résineux (pin, épicéa, douglas, etc.) Les bois exotiques (ipé, coumarou, padou, etc.) Les bois nobles et feuillus (chêne, châtaignier, etc.)', 'Good', 4, 5, '2023-10-21 20:06:11', '2023-10-21 20:14:01'),
(20, '1697922674.jpg', 'Oil', 'Crude oil prices & gas price charts. Oil price charts for Brent Crude, WTI & oil futures. Energy news covering oil, petroleum, natural gas and investment', 'Bad', 1, 5, '2023-10-21 20:11:14', '2023-10-21 20:11:25'),
(21, '1697922714.jpg', 'ferr', 'Le fer est l\'élément chimique de numéro atomique 26, de symbole Fe. Le corps simple est le métal et le matériau ferromagnétique le plus courant dans la vie quotidienne, le plus souvent sous forme d\'alliages divers.', 'Good', 1, 5, '2023-10-21 20:11:54', '2023-10-21 20:13:38'),
(22, '1697922928.jpg', 'Gold', 'Se dit d\'une couleur jaune-orangé, dorée.', 'Good', 1, 5, '2023-10-21 20:15:28', '2023-10-21 20:15:28');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_09_12_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_14_172220_create_categories_table', 1),
(7, '2023_09_30_002423_create_items_table', 1),
(8, '2023_09_30_002558_create_posts_table', 1),
(9, '2023_09_30_002645_create_comments_table', 1),
(10, '2023_10_15_134050_create_complaints_table', 1),
(11, '2023_10_19_093422_create_trades_table', 1),
(12, '2023_10_20_144555_create_conversations_table', 1),
(13, '2023_10_20_144705_create_messages_table', 1),
(14, '2023_10_21_213133_create_admin_chats_table', 1),
(15, '2023_10_22_193603_create_table_avis', 1),
(16, '2023_10_22_205943_create_msg_admins_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `msg_admins`
--

CREATE TABLE `msg_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image_url`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Miroir', 'mauvaise qualité et les couleur sont cvp', '1698012591.jpg', 4, '2023-10-22 16:39:17', '2023-10-22 21:09:51'),
(2, 'Marto', 'martopiquer ne fonctionne pas', NULL, 3, '2023-10-22 21:06:07', '2023-10-22 21:06:07');

-- --------------------------------------------------------

--
-- Structure de la table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roleName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `roleName`, `created_at`, `updated_at`) VALUES
(1, 'superAdmin', '2023-10-22 22:19:58', '2023-10-22 22:19:58'),
(2, 'Admin', '2023-10-22 22:19:58', '2023-10-22 22:19:58'),
(3, 'user', '2023-10-22 22:19:58', '2023-10-22 22:19:58');

-- --------------------------------------------------------

--
-- Structure de la table `trades`
--

CREATE TABLE `trades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tradeStartDate` date DEFAULT NULL,
  `tradeEndDate` date DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `offered_item_id` bigint(20) UNSIGNED NOT NULL,
  `requested_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trades`
--

INSERT INTO `trades` (`id`, `tradeStartDate`, `tradeEndDate`, `status`, `owner_id`, `offered_item_id`, `requested_item_id`, `created_at`, `updated_at`) VALUES
(2, '2023-10-27', '2023-10-26', 'accepted', 1, 1, 1, '2023-10-22 16:53:48', '2023-10-22 17:33:49'),
(3, '2023-10-27', '2023-10-26', 'pending', 1, 1, 2, '2023-10-22 16:55:51', '2023-10-22 16:55:51'),
(4, '2023-10-25', '2023-10-31', 'accepted', 4, 1, 14, '2023-10-22 17:00:08', '2023-10-22 17:33:59'),
(5, '2023-10-27', '2023-10-28', 'pending', 4, 1, 2, '2023-10-22 17:01:00', '2023-10-22 17:01:00'),
(6, '2023-10-27', '2023-10-30', 'pending', 4, 1, 1, '2023-10-22 17:01:40', '2023-10-22 17:01:40'),
(7, '2023-10-11', '2023-10-02', 'pending', 4, 1, 16, '2023-10-22 18:45:33', '2023-10-22 18:45:33');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `email` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 4,
  `phoneNumber` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `CIN` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstName`, `lastName`, `image`, `email`, `role_id`, `phoneNumber`, `address`, `gender`, `birthDate`, `CIN`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Elyes Boudhina', NULL, NULL, 'default.png', 'e-boudhina@live.fr', 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$mNreH7KSAFTKglhckDVqIeC0T/hsbk1AKBrIsKkTk49f48oQM5gmS', NULL, '2023-10-22 22:19:58', '2023-10-22 22:19:58'),
(2, 'SuperAdmin', NULL, NULL, 'default.png', 'superadmin@admin.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$BAal4NDd0r6tjE4uTKFDuevSu3JxoBJXJirRHCbuair3UUS62Y0vK', NULL, '2023-10-22 22:19:58', '2023-10-22 22:19:58'),
(3, 'Admin', NULL, NULL, 'default.png', 'admin@admin.com', 2, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$vD3GYRldprTstQaB/61CbeFGfVruTrdw2CujQXUUTGstUNsd2PJ3G', NULL, '2023-10-22 22:19:58', '2023-10-22 22:19:58'),
(4, 'Amen', NULL, NULL, 'default.png', 'user@user.com', 3, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$o5IIr.lEFVtlHeWW5jNWY.eAX8OO5.doAnR9.huyyKW7AS.jsn30S', NULL, '2023-10-22 22:19:58', '2023-10-22 22:19:58');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_chats`
--
ALTER TABLE `admin_chats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avis_trade_id_foreign` (`trade_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Index pour la table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_likes_comment_id_foreign` (`comment_id`),
  ADD KEY `comment_likes_user_id_foreign` (`user_id`);

--
-- Index pour la table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_user_id_foreign` (`user_id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `msg_admins`
--
ALTER TABLE `msg_admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Index pour la table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_likes_post_id_foreign` (`post_id`),
  ADD KEY `post_likes_user_id_foreign` (`user_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trades`
--
ALTER TABLE `trades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trades_owner_id_foreign` (`owner_id`),
  ADD KEY `trades_offered_item_id_foreign` (`offered_item_id`),
  ADD KEY `trades_requested_item_id_foreign` (`requested_item_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_chats`
--
ALTER TABLE `admin_chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `msg_admins`
--
ALTER TABLE `msg_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `trades`
--
ALTER TABLE `trades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_trade_id_foreign` FOREIGN KEY (`trade_id`) REFERENCES `trades` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD CONSTRAINT `comment_likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `post_likes`
--
ALTER TABLE `post_likes`
  ADD CONSTRAINT `post_likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `trades`
--
ALTER TABLE `trades`
  ADD CONSTRAINT `trades_offered_item_id_foreign` FOREIGN KEY (`offered_item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `trades_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `trades_requested_item_id_foreign` FOREIGN KEY (`requested_item_id`) REFERENCES `items` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
