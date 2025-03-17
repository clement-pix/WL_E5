-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 17 mars 2025 à 13:56
-- Version du serveur : 10.11.11-MariaDB-0+deb12u1
-- Version de PHP : 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mussetc_WL`
--

-- --------------------------------------------------------

--
-- Structure de la table `Composer`
--

CREATE TABLE `Composer` (
  `id_media` int(11) NOT NULL,
  `id_liste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `id_genre` int(11) NOT NULL,
  `id_media` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_avis`
--

CREATE TABLE `WL_avis` (
  `id_media` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` int(11) NOT NULL,
  `commentaire` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_cache`
--

CREATE TABLE `WL_cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_cache_locks`
--

CREATE TABLE `WL_cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_categorie`
--

CREATE TABLE `WL_categorie` (
  `id_categorie` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_failed_jobs`
--

CREATE TABLE `WL_failed_jobs` (
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
-- Structure de la table `WL_genre`
--

CREATE TABLE `WL_genre` (
  `id_genre` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_jobs`
--

CREATE TABLE `WL_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_job_batches`
--

CREATE TABLE `WL_job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_liste`
--

CREATE TABLE `WL_liste` (
  `id_liste` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_media`
--

CREATE TABLE `WL_media` (
  `id_media` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `lien_image` varchar(255) NOT NULL,
  `date_ajout` date NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_migrations`
--

CREATE TABLE `WL_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_password_reset_tokens`
--

CREATE TABLE `WL_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_Role`
--

CREATE TABLE `WL_Role` (
  `id_role` int(11) NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_sessions`
--

CREATE TABLE `WL_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `WL_users`
--

CREATE TABLE `WL_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pseudo` varchar(50) NOT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Composer`
--
ALTER TABLE `Composer`
  ADD PRIMARY KEY (`id_media`,`id_liste`),
  ADD KEY `Composer_WL_liste0_FK` (`id_liste`);

--
-- Index pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD PRIMARY KEY (`id_genre`,`id_media`),
  ADD KEY `posseder_WL_media0_FK` (`id_media`);

--
-- Index pour la table `WL_avis`
--
ALTER TABLE `WL_avis`
  ADD PRIMARY KEY (`id_media`,`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `WL_cache`
--
ALTER TABLE `WL_cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `WL_cache_locks`
--
ALTER TABLE `WL_cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `WL_categorie`
--
ALTER TABLE `WL_categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `WL_failed_jobs`
--
ALTER TABLE `WL_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wl_failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `WL_genre`
--
ALTER TABLE `WL_genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `WL_jobs`
--
ALTER TABLE `WL_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wl_jobs_queue_index` (`queue`);

--
-- Index pour la table `WL_job_batches`
--
ALTER TABLE `WL_job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `WL_liste`
--
ALTER TABLE `WL_liste`
  ADD PRIMARY KEY (`id_liste`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `WL_media`
--
ALTER TABLE `WL_media`
  ADD PRIMARY KEY (`id_media`),
  ADD KEY `WL_media_WL_categorie_FK` (`id_categorie`);

--
-- Index pour la table `WL_migrations`
--
ALTER TABLE `WL_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `WL_password_reset_tokens`
--
ALTER TABLE `WL_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `WL_Role`
--
ALTER TABLE `WL_Role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `WL_sessions`
--
ALTER TABLE `WL_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wl_sessions_user_id_index` (`user_id`),
  ADD KEY `wl_sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `WL_users`
--
ALTER TABLE `WL_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wl_users_email_unique` (`email`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `WL_categorie`
--
ALTER TABLE `WL_categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `WL_failed_jobs`
--
ALTER TABLE `WL_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `WL_genre`
--
ALTER TABLE `WL_genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `WL_jobs`
--
ALTER TABLE `WL_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `WL_liste`
--
ALTER TABLE `WL_liste`
  MODIFY `id_liste` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `WL_media`
--
ALTER TABLE `WL_media`
  MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `WL_migrations`
--
ALTER TABLE `WL_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `WL_Role`
--
ALTER TABLE `WL_Role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `WL_users`
--
ALTER TABLE `WL_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Composer`
--
ALTER TABLE `Composer`
  ADD CONSTRAINT `Composer_WL_liste0_FK` FOREIGN KEY (`id_liste`) REFERENCES `WL_liste` (`id_liste`),
  ADD CONSTRAINT `Composer_WL_media_FK` FOREIGN KEY (`id_media`) REFERENCES `WL_media` (`id_media`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `posseder_WL_genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `WL_genre` (`id_genre`),
  ADD CONSTRAINT `posseder_WL_media0_FK` FOREIGN KEY (`id_media`) REFERENCES `WL_media` (`id_media`);

--
-- Contraintes pour la table `WL_avis`
--
ALTER TABLE `WL_avis`
  ADD CONSTRAINT `WL_avis_WL_media_FK` FOREIGN KEY (`id_media`) REFERENCES `WL_media` (`id_media`),
  ADD CONSTRAINT `WL_avis_ibfk_1` FOREIGN KEY (`id`) REFERENCES `WL_users` (`id`);

--
-- Contraintes pour la table `WL_liste`
--
ALTER TABLE `WL_liste`
  ADD CONSTRAINT `WL_liste_ibfk_1` FOREIGN KEY (`id`) REFERENCES `WL_users` (`id`);

--
-- Contraintes pour la table `WL_media`
--
ALTER TABLE `WL_media`
  ADD CONSTRAINT `WL_media_WL_categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `WL_categorie` (`id_categorie`);

--
-- Contraintes pour la table `WL_users`
--
ALTER TABLE `WL_users`
  ADD CONSTRAINT `WL_users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `WL_Role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
