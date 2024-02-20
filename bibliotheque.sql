-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour bibliotheque
CREATE DATABASE IF NOT EXISTS `bibliotheque` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `bibliotheque`;

-- Listage de la structure de la table bibliotheque. commentaires
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `livre_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commentaires_livre_id_foreign` (`livre_id`),
  KEY `commentaires_user_id_foreign` (`user_id`),
  CONSTRAINT `commentaires_livre_id_foreign` FOREIGN KEY (`livre_id`) REFERENCES `livres` (`id`) ON DELETE CASCADE,
  CONSTRAINT `commentaires_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bibliotheque.commentaires : ~1 rows (environ)
/*!40000 ALTER TABLE `commentaires` DISABLE KEYS */;
INSERT INTO `commentaires` (`id`, `livre_id`, `user_id`, `commentaire`, `note`, `created_at`, `updated_at`) VALUES
	(1, 1, 6, 'ce livre m\'a vraiment aidé à comprendre les bases de python.Mais absence de code pour la démo', 3, '2024-02-19 22:45:34', '2024-02-19 22:45:34');
/*!40000 ALTER TABLE `commentaires` ENABLE KEYS */;

-- Listage de la structure de la table bibliotheque. emprunts
CREATE TABLE IF NOT EXISTS `emprunts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `livre_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `date_emprunt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emprunts_livre_id_foreign` (`livre_id`),
  KEY `emprunts_user_id_foreign` (`user_id`),
  CONSTRAINT `emprunts_livre_id_foreign` FOREIGN KEY (`livre_id`) REFERENCES `livres` (`id`) ON DELETE CASCADE,
  CONSTRAINT `emprunts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bibliotheque.emprunts : ~0 rows (environ)
/*!40000 ALTER TABLE `emprunts` DISABLE KEYS */;
INSERT INTO `emprunts` (`id`, `livre_id`, `user_id`, `date_emprunt`, `created_at`, `updated_at`) VALUES
	(1, 1, 6, '2024-02-20 11:14:32', '2024-02-20 11:14:32', '2024-02-20 11:14:32');
/*!40000 ALTER TABLE `emprunts` ENABLE KEYS */;

-- Listage de la structure de la table bibliotheque. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bibliotheque.failed_jobs : ~0 rows (environ)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Listage de la structure de la table bibliotheque. livres
CREATE TABLE IF NOT EXISTS `livres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auteur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` year(4) NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fichier_pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nombre_disponible` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bibliotheque.livres : ~5 rows (environ)
/*!40000 ALTER TABLE `livres` DISABLE KEYS */;
INSERT INTO `livres` (`id`, `titre`, `auteur`, `annee`, `categorie`, `fichier_pdf`, `Nombre_disponible`, `created_at`, `updated_at`) VALUES
	(1, 'Apprendre python', 'chabi féissal', '2016', 'Informatique', 'exercices-python3.pdf', 4, '2024-02-19 02:52:46', '2024-02-19 02:52:46'),
	(3, 'Rapport_mathématique', 'BABABODI yassirou', '2021', 'Mathématique', 'exercices-orrige.pdf', 4, '2024-02-19 16:52:30', '2024-02-19 16:52:30'),
	(4, 'linux en simple', 'bakary zeid', '2008', 'Informatique', 'cours1.pdf', 13, '2024-02-19 16:53:30', '2024-02-19 16:53:30'),
	(5, 'anglais informatique', 'thierry damstyne', '2020', 'Informatique', 'Anglais_Informatique.pdf', 9, '2024-02-19 17:11:10', '2024-02-19 17:11:10'),
	(6, 'roman1', 'olivier dossou', '2014', 'Roman', 'Thème 11 Système d\'information collaboratifs.pdf', 2, '2024-02-19 17:12:27', '2024-02-19 17:12:27');
/*!40000 ALTER TABLE `livres` ENABLE KEYS */;

-- Listage de la structure de la table bibliotheque. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bibliotheque.migrations : ~7 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_02_19_023347_create_livres_table', 2),
	(6, '2024_02_19_214544_create_commentaires_table', 3),
	(7, '2024_02_20_103638_create_emprunts_table', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table bibliotheque. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bibliotheque.password_resets : ~0 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table bibliotheque. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bibliotheque.personal_access_tokens : ~0 rows (environ)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Listage de la structure de la table bibliotheque. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table bibliotheque.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `prenom`, `email`, `statut`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(4, 'BABABODI Zakiyou', 'Zakiyou', 'zakiyoubababodi@gmail.com', 'admin', NULL, '$2y$10$E1mcVQadHiCAbyOz2JDykupTORi1Vsa4zei5RIcpUVJize.tzkMhO', NULL, '2024-02-19 20:42:31', '2024-02-19 20:42:31'),
	(5, 'BABABODI', 'Nabile', 'nabiloubababodi@gmail.com', 'admin', NULL, '$2y$10$asRMKRavpD5DfjCfas87AOnx2WCAlXUOIo1cZQZOWc6jREIMZ2a8.', NULL, '2024-02-19 20:47:10', '2024-02-19 20:47:10'),
	(6, 'Messi', 'Lionnel', 'lionnel@gmail.com', 'non admin', NULL, '$2y$10$zCaaknvsp1xnyU/jUqvBteS7Ba22fP4AG2.HcaX93cmeMBNXgy8Xi', NULL, '2024-02-19 21:08:00', '2024-02-19 21:08:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
