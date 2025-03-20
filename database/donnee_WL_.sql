-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 17 mars 2025 à 14:17
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

--
-- Déchargement des données de la table `WL_categorie`
--

INSERT INTO `WL_categorie` (`id_categorie`, `type`) VALUES
(2, 'Action'),
(3, 'Aventure'),
(4, 'Comédie');

--
-- Déchargement des données de la table `WL_media`
--

INSERT INTO `WL_media` (`id_media`, `titre`, `description`, `lien_image`, `date_ajout`, `id_categorie`) VALUES
(9, 'avatar', 'Malgré sa paralysie, Jake Sully, un ancien marine immobilisé dans un fauteuil roulant, est resté un combattant au plus profond de son être. Il est recruté pour se rendre à des années-lumière de la Terre, sur Pandora, où de puissants groupes industriels exploitent un minerai rarissime destiné à résoudre la crise énergétique sur Terre. Parce que l\'atmosphère de Pandora est toxique pour les humains, ceux-ci ont créé le Programme Avatar, qui permet à des \" pilotes \" humains de lier leur esprit à un avatar, un corps biologique commandé à distance, capable de survivre dans cette atmosphère létale. Ces avatars sont des hybrides créés génétiquement en croisant l\'ADN humain avec celui des Na\'vi, les autochtones de Pandora.', 'storage/images/PzQQ3mQ8FmSZ6yMnS4GgkDniCj8BjUgrPeFdn1Wg.jpg', '2025-03-14', 2),
(10, 'titanic', 'Southampton, 10 avril 1912. Le paquebot le plus grand et le plus moderne du monde, réputé pour son insubmersibilité, le \"Titanic\", appareille pour son premier voyage. Quatre jours plus tard, il heurte un iceberg. A son bord, un artiste pauvre et une grande bourgeoise tombent amoureux.', 'storage/images/xmIPp933nkXoMhLqjKnucaj9Y6yaplaWe6O49Grv.jpg', '2025-03-14', 3),
(11, 'uncharted', 'Nathan Drake, voleur astucieux et intrépide, est recruté par le chasseur de trésors chevronné Victor « Sully » Sullivan pour retrouver la fortune de Ferdinand Magellan, disparue il y a 500 ans. Ce qui ressemble d’abord à un simple casse devient finalement une course effrénée autour du globe pour s’emparer du trésor avant l’impitoyable Moncada, qui est persuadé que sa famille est l’héritière légitime de cette fortune. Si Nathan et Sully réussissent à déchiffrer les indices et résoudre l’un des plus anciens mystères du monde, ils pourraient rafler la somme de 5 milliards de dollars et peut-être même retrouver le frère de Nathan, disparu depuis longtemps… mais encore faudrait-il qu’ils apprennent à travailler ensemble.', 'storage/images/PqluTzaFeQDqeWMaAfiRlfgW6NQZxAAPZEP75rZY.jpg', '2025-03-14', 3),
(12, 'astérix et obélix', 'Nous sommes en 50 avant J.C. L’Impératrice de Chine est emprisonnée suite à un coup d’état fomenté par Deng Tsin Quin, un prince félon.\r\n\r\nAidée par Graindemaïs, le marchand phénicien, et par sa fidèle guerrière Tat Han, la princesse Fu Yi, fille unique de l’impératrice, s’enfuit en Gaule pour demander de l’aide aux deux valeureux guerriers Astérix et Obélix, dotés d’une force surhumaine grâce à leur potion magique.\r\n\r\nNos deux inséparables Gaulois acceptent bien sûr de venir en aide à la Princesse pour sauver sa mère et libérer son pays. Et les voici tous en route pour une grande aventure vers la Chine.\r\n\r\nMais César et sa puissante armée, toujours en soif de conquêtes, ont eux aussi pris la direction de l’Empire du Milieu..', 'storage/images/eWAVhfyANwGxULE57VA7HAVaLFd8XQQy3S4uOzqv.jpg', '2025-03-14', 4),
(13, 'Le Comte de Monte-Cristo', 'Nous sommes en 50 avant J.C. L’Impératrice de Chine est emprisonnée suite à un coup d’état fomenté par Deng Tsin Quin, un prince félon.\r\n\r\nAidée par Graindemaïs, le marchand phénicien, et par sa fidèle guerrière Tat Han, la princesse Fu Yi, fille unique de l’impératrice, s’enfuit en Gaule pour demander de l’aide aux deux valeureux guerriers Astérix et Obélix, dotés d’une force surhumaine grâce à leur potion magique.\r\n\r\nNos deux inséparables Gaulois acceptent bien sûr de venir en aide à la Princesse pour sauver sa mère et libérer son pays. Et les voici tous en route pour une grande aventure vers la Chine.\r\n\r\nVictime d’un complot, le jeune Edmond Dantès est arrêté le jour de son mariage pour un crime qu’il n’a pas commis. Après quatorze ans de détention au château d’If, il parvient à s’évader. Devenu immensément riche, il revient sous l’identité du comte de Monte-Cristo pour se venger des trois hommes qui l’ont trahi.', 'storage/images/GYCOrA6wNxE9jm33NiNBNAhJTNK871VLhR56v7wJ.jpg', '2025-03-14', 3),
(14, 'Tenet', 'Nous sommes en 50 avant J.C. L’Impératrice de Chine est emprisonnée suite à un coup d’état fomenté par Deng Tsin Quin, un prince félon.\r\n\r\nMuni d\'un seul mot – Tenet – et décidé à se battre pour sauver le monde, notre protagoniste sillonne l\'univers crépusculaire de l\'espionnage international. Sa mission le projettera dans une dimension qui dépasse le temps. Pourtant, il ne s\'agit pas d\'un voyage dans le temps, mais d\'un renversement temporel…\r\n\r\nNos deux inséparables Gaulois acceptent bien sûr de venir en aide à la Princesse pour sauver sa mère et libérer son pays. Et les voici tous en route pour une grande aventure vers la Chine.\r\n\r\nVictime d’un complot, le jeune Edmond Dantès est arrêté le jour de son mariage pour un crime qu’il n’a pas commis. Après quatorze ans de détention au château d’If, il parvient à s’évader. Devenu immensément riche, il revient sous l’identité du comte de Monte-Cristo pour se venger des trois hommes qui l’ont trahi.', 'storage/images/b4eAK3AApyGds6oivVZF9BNJXjy8SnJGP0cTzN5t.jpg', '2025-03-14', 2),
(15, 'charlie et la chocolaterie', 'Nous sommes en 50 avant J.C. L’Impératrice de Chine est emprisonnée suite à un coup d’état fomenté par Deng Tsin Quin, un prince félon.\r\n\r\nCharlie est un enfant issu d\'une famille pauvre. Travaillant pour subvenir aux besoins des siens, il doit économiser chaque penny, et ne peut s\'offrir les friandises dont raffolent les enfants de son âge. Pour obtenir son comptant de sucreries, il participe à un concours organisé par l\'inquiétant Willy Wonka, le propriétaire de la fabrique de chocolat de la ville. Celui qui découvrira l\'un des cinq tickets d\'or que Wonka a caché dans les barres de chocolat de sa fabrication gagnera une vie de sucreries.\r\n\r\nNos deux inséparables Gaulois acceptent bien sûr de venir en aide à la Princesse pour sauver sa mère et libérer son pays. Et les voici tous en route pour une grande aventure vers la Chine.\r\n\r\nVictime d’un complot, le jeune Edmond Dantès est arrêté le jour de son mariage pour un crime qu’il n’a pas commis. Après quatorze ans de détention au château d’If, il parvient à s’évader. Devenu immensément riche, il revient sous l’identité du comte de Monte-Cristo pour se venger des trois hommes qui l’ont trahi.', 'storage/images/Nfk80B8LrmHWBrViA2K93sQBcy9CBaG9nl2StaiK.jpg', '2025-03-14', 3),
(17, 'spider-man', 'une araignée humaine', 'storage/images/lR2DZ09DzNypQBgg3EPg600rRLuL6ndXR9tLRnVZ.jpg', '2025-03-15', 2),
(18, 'fast and furious 7', 'Dominic Toretto et sa \"famille\" doivent faire face à Deckard Shaw, bien décidé à se venger de la mort de son frère.', 'storage/images/L6fu3ArySddpCcPHym9iLSFKVId3gpMUjbSH9lhB.jpg', '2025-03-15', 2);

--
-- Déchargement des données de la table `WL_migrations`
--

INSERT INTO `WL_migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_14_104840_add_firstname_to__w_l_users_table', 2);

--
-- Déchargement des données de la table `WL_Role`
--

INSERT INTO `WL_Role` (`id_role`, `label`) VALUES
(1, 'superadmin'),
(2, 'membre'),
(3, 'membreAdmin');

--
-- Déchargement des données de la table `WL_sessions`
--

INSERT INTO `WL_sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('61dOzDuUrObPe9dqC1zK6BA9sezXAfhSljzF8sOp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWRnT3F1M1VXZWd5NlhMeVIwenhZc1RySmZsazNrWUE5NncwVG5qQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742154181),
('7g6kdxWrGqMDnS2OaTXo8WnMzk6W31BZOpPUp8yo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNE5ySjlXRmFwSjNEZE5mWmJ3RDg4dkp4SktlZmRvZklkS2pwc3E3NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742154181),
('jSV4m9sB2n2zEvfwEqdC8O8Tbgdlkl3oHsUS8YGg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUVJbWJHcmJEZWlwS080MmF4YzRac2NFbXMwYllMaUtwbTNWVFNRaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZWRpYS8xOCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742202729),
('LzeSPRT6vVIKptAsSh6bdjYHTW5X4AwnwefVE8gB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDlvaGNLdjhRdklud00yZERxY0pxOHhqMlAzT1lheXROS2N2NmpmTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742217380),
('mLhMsyB8xMieiWccNF5DGH9VciOi2RhJiIh2GvwL', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYlFvTXo1WUEzeEhOVXp5b0hYTEFPbmQyUndpaHljUFVUb1JrcU5MaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1742062746),
('npyT6ME9xJUba0XcJ9B0kE9whLiqXbbFQsB9QAG1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWw5YU5yNnF2Qk9YUnR5WVRGcjRQNVJENWlTWGtnZG9BYm83SlQwcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZWRpYS8xOCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742215209),
('Sbi142L2EQUBvJRbAfPIF12t72A4UrIRjykvzfPy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0xHcUhuVG1Rd0J6T0xDOVdYQm54eEg0cUczcUtQRXI2YkVsS2l4cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZWRpYS8xMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742203022);

--
-- Déchargement des données de la table `WL_users`
--

INSERT INTO `WL_users` (`id`, `name`, `firstname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `pseudo`, `id_role`) VALUES
(6, 'musset', 'clement', 'musset.clement79@gmail.com', NULL, '$2y$12$uTNx3r52gRHmaRSmtTsMne88q3AGx40kyKJMfUguiIwyuvFaMtR4q', NULL, '2025-03-10 15:58:46', '2025-03-15 16:49:24', 'musset', 1),
(7, 'musset', 'clement', 'clement.musset79@gmail.com', NULL, '$2y$12$wz3eTfnzuOY.0awFVoYIruwuCu2li8nyNyiZwvxfrJqTFsQtfLP8e', NULL, '2025-03-10 16:34:03', '2025-03-15 16:44:53', 'clement-pix', 3),
(8, 'prieur', 'batiste', 'batiste.p@gmail.com', NULL, '$2y$12$EsC0ChFX6sAg0otARab2lO.yiR38jZLDBJmq1RYy3J3W39UnThkNu', NULL, '2025-03-14 09:59:56', '2025-03-14 09:59:56', 'tounet', 2);
COMMIT;

--
-- Déchargement des données de la table `WL_avis`
--

INSERT INTO `WL_avis` (`id_media`, `id`, `note`, `commentaire`) VALUES
(10, 6, 3, 'un film cool'),
(10, 7, 3, 'ça va, il y a mieux !'),
(10, 8, 5, '<3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
