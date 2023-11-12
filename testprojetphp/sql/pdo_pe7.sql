-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pdo_pe7`
--

-- --------------------------------------------------------

--
-- Structure de la table `anime`
--

DROP TABLE IF EXISTS `anime`;
CREATE TABLE IF NOT EXISTS `anime` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `released_date` date DEFAULT NULL,
  `finished_or_not` tinyint(1) DEFAULT NULL,
  `number_of_episodes` int DEFAULT NULL,
  `animation_studio` varchar(255) DEFAULT NULL,
  `cover_image_anime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `anime`
--

INSERT INTO `anime` (`id`, `name`, `released_date`, `finished_or_not`, `number_of_episodes`, `animation_studio`, `cover_image_anime`) VALUES
(1, 'Attack on Titan', '2013-04-06', 0, 75, 'Wit Studio', 'https://www.nautiljon.com/images/anime/00/60/mini/shingeki_no_kyojin_2406.webp?11699190350'),
(2, 'One Punch Man', '2015-10-05', 1, 24, 'Madhouse', 'https://www.nautiljon.com/images/anime/00/80/mini/one_punch-man_4208.webp?11659712164'),
(3, 'My Hero Academia', '2016-04-03', 0, 116, 'Bones', 'https://www.nautiljon.com/images/anime/00/72/mini/boku_no_hero_academia_4927.webp?11659711076'),
(4, 'Death Note', '2006-10-04', 1, 37, 'Madhouse', 'https://www.nautiljon.com/images/anime/00/08/mini/death_note_180.webp?11683545848'),
(5, 'Fullmetal Alchemist', '2009-04-05', 0, 64, 'Bones', 'https://www.nautiljon.com/images/anime/00/90/mini/fullmetal_alchemist_brotherhood_1109.webp?11668253769'),
(6, 'Cowboy Bebop', '1998-04-03', 1, 26, 'Sunrise', 'https://www.nautiljon.com/images/anime/00/40/mini/cowboy_bebop_4.webp?11643744695'),
(7, 'Steins;Gate', '2011-04-06', 0, 24, 'White Fox', 'https://www.nautiljon.com/images/anime/00/76/mini/steins_gate_1967.webp?11688755439'),
(8, 'Neon Genesis', '1995-10-04', 1, 26, 'Gainax', 'https://www.nautiljon.com/images/anime/00/05/mini/neon_genesis_evangelion_150.webp?11679181168'),
(9, 'Demon Slayer', '2019-04-06', 0, 26, 'Ufotable', 'https://www.nautiljon.com/images/anime/00/87/mini/kimetsu_no_yaiba_7878.webp?11675363938'),
(10, 'Sword Art Online', '2012-07-08', 0, 97, 'A-1 Pictures', 'https://www.nautiljon.com/images/anime/00/43/mini/sword_art_online_2234.webp?11699190567'),
(11, 'Your Lie in April', '2014-10-10', 1, 22, 'A-1 Pictures', 'https://www.nautiljon.com/images/anime/00/67/mini/shigatsu_wa_kimi_no_uso_3476.webp?11625859756'),
(12, 'Hunter x Hunter', '2011-10-02', 0, 148, 'Madhouse', 'https://www.nautiljon.com/images/anime/00/98/mini/hunter_x_hunter_2011_2089.webp?11663620037'),
(13, 'Naruto', '2002-10-03', 1, 220, 'Pierrot', 'https://www.nautiljon.com/images/anime/00/15/mini/naruto_51.webp?11663436838'),
(14, 'Tokyo Ghoul', '2014-07-04', 0, 12, 'Pierrot', 'https://www.nautiljon.com/images/anime/00/28/mini/tokyo_ghoul_3182.webp?11652733582'),
(15, 'Re:Zero', '2016-04-04', 0, 50, 'White Fox', 'https://www.nautiljon.com/images/anime/00/61/mini/re_zero_kara_hajimeru_isekai_seikatsu_4616.webp?11659712236'),
(16, 'One Piece', '1999-10-20', 0, 1000, 'Toei Animation', 'https://www.nautiljon.com/images/anime/00/60/mini/one_piece_6.webp?11699197427');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Aventure'),
(3, 'Biographique'),
(4, 'Comédie'),
(5, 'Crossover'),
(6, 'Drame'),
(7, 'Fantastique'),
(8, 'Fantasy'),
(9, 'Histoires courtes'),
(10, 'Historique'),
(11, 'Horreur'),
(12, 'Isekai'),
(13, 'Mystère'),
(14, 'Nekketsu'),
(15, 'Psychologique'),
(16, 'Romance'),
(17, 'School Life'),
(18, 'Science-Fantasy'),
(19, 'Science-fiction'),
(20, 'Shôjo'),
(21, 'Shônen'),
(22, 'Slice of Life'),
(23, 'Surnaturel'),
(24, 'Thriller'),
(25, 'Tragique');

-- --------------------------------------------------------

--
-- Structure de la table `genre_anime`
--

DROP TABLE IF EXISTS `genre_anime`;
CREATE TABLE IF NOT EXISTS `genre_anime` (
  `id` int NOT NULL AUTO_INCREMENT,
  `anime_id` int DEFAULT NULL,
  `genre_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anime_id` (`anime_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `genre_anime`
--

INSERT INTO `genre_anime` (`id`, `anime_id`, `genre_id`) VALUES
(1, 1, 18),
(2, 1, 19),
(3, 1, 20),
(4, 2, 18),
(5, 2, 20),
(6, 3, 18),
(7, 3, 19),
(8, 3, 20),
(9, 4, 13),
(10, 4, 17),
(11, 4, 18),
(12, 5, 18),
(13, 5, 20),
(14, 6, 13),
(15, 6, 19),
(16, 6, 20),
(17, 7, 14),
(18, 7, 18),
(19, 8, 20),
(20, 8, 23),
(21, 9, 18),
(22, 9, 19),
(23, 9, 20),
(24, 10, 18),
(25, 10, 20),
(26, 11, 19),
(27, 11, 13),
(28, 11, 20),
(29, 12, 18),
(30, 12, 19),
(31, 12, 20),
(32, 13, 18),
(33, 13, 19),
(34, 13, 20),
(35, 14, 18),
(36, 14, 19),
(37, 14, 20),
(38, 15, 18),
(39, 15, 19),
(40, 15, 20),
(41, 16, 18),
(42, 16, 19),
(43, 16, 20);

-- --------------------------------------------------------

--
-- Structure de la table `genre_manga`
--

DROP TABLE IF EXISTS `genre_manga`;
CREATE TABLE IF NOT EXISTS `genre_manga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `manga_id` int DEFAULT NULL,
  `genre_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manga_id` (`manga_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `genre_manga`
--

INSERT INTO `genre_manga` (`id`, `manga_id`, `genre_id`) VALUES
(1, 1, 2),
(2, 1, 20),
(3, 1, 7),
(4, 1, 4),
(5, 2, 2),
(6, 2, 20),
(7, 2, 7),
(8, 2, 4),
(9, 3, 12),
(10, 3, 13),
(11, 3, 24),
(12, 4, 1),
(13, 4, 2),
(14, 4, 5),
(15, 4, 7),
(16, 5, 1),
(17, 5, 2),
(18, 5, 5),
(19, 5, 11),
(20, 11, 21),
(21, 11, 9),
(22, 11, 3),
(23, 12, 18),
(24, 12, 21),
(25, 12, 10),
(26, 13, 20),
(27, 13, 1),
(28, 13, 8),
(29, 14, 17),
(30, 14, 2),
(31, 14, 20),
(32, 15, 16),
(33, 15, 20),
(34, 15, 3),
(35, 16, 22),
(36, 16, 9),
(37, 16, 14),
(38, 17, 20),
(39, 17, 1),
(40, 17, 10),
(41, 18, 19),
(42, 18, 6),
(43, 18, 20),
(44, 19, 15),
(45, 19, 20),
(46, 19, 9),
(47, 20, 20),
(48, 20, 1),
(49, 20, 6),
(50, 6, 16),
(51, 6, 11),
(52, 6, 5),
(53, 6, 17),
(54, 7, 20),
(55, 7, 23),
(56, 7, 8),
(57, 7, 16),
(58, 8, 9),
(59, 8, 17),
(60, 8, 11),
(61, 8, 4),
(62, 9, 9),
(63, 9, 6),
(64, 9, 5),
(65, 9, 5),
(66, 10, 11),
(67, 10, 14),
(68, 10, 10),
(69, 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `manga`
--

DROP TABLE IF EXISTS `manga`;
CREATE TABLE IF NOT EXISTS `manga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `released_date` date DEFAULT NULL,
  `finished_or_not` tinyint(1) DEFAULT NULL,
  `number_of_volumes` int DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `cover_image_volume` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `manga`
--

INSERT INTO `manga` (`id`, `name`, `released_date`, `finished_or_not`, `number_of_volumes`, `author`, `cover_image_volume`) VALUES
(1, 'One Piece', '1997-07-22', 0, 100, 'Eiichiro Oda', 'https://www.nautiljon.com/images/manga/00/11/mini/one_piece_11.webp?11691327581'),
(2, 'Naruto', '1999-09-21', 1, 72, 'Masashi Kishimoto', 'https://www.nautiljon.com/images/manga/00/90/mini/naruto_109.webp?11657705301'),
(3, 'Death Note', '2003-12-01', 1, 12, 'Tsugumi Ohba', 'https://www.nautiljon.com/images/manga/00/81/mini/death_note_18.webp?11694096452'),
(4, 'Fullmetal Alchemist', '2001-07-12', 1, 27, 'Hiromu Arakawa', 'https://www.nautiljon.com/images/manga/00/21/mini/fullmetal_alchemist_12.webp?11694461890'),
(5, 'Attack on Titan', '2009-09-09', 1, 34, 'Hajime Isayama', 'https://www.nautiljon.com/images/manga/00/17/mini/l_attaque_des_titans_1471.webp?11697917975'),
(6, 'One Punch Man', '2012-06-14', 0, 23, 'ONE', 'https://www.nautiljon.com/images/manga/00/17/mini/one-punch_man_1871.webp?11682937603'),
(7, 'Demon Slayer', '2016-02-15', 1, 23, 'Koyoharu Gotouge', 'https://www.nautiljon.com/images/manga/00/75/mini/demon_slayer_6457.webp?11686123461'),
(8, 'My Hero Academia', '2014-07-07', 0, 34, 'Kohei Horikoshi', 'https://www.nautiljon.com/images/manga/00/84/mini/my_hero_academia_4148.webp?11698654544'),
(9, 'Tokyo Revengers', '2017-03-01', 0, 25, 'Ken Wakui', 'https://www.nautiljon.com/images/manga/00/43/mini/tokyo_revengers_9734.webp?11686341045'),
(10, 'Jujutsu Kaisen', '2018-03-05', 0, 20, 'Gege Akutami', 'https://www.nautiljon.com/images/manga/00/61/mini/jujutsu_kaisen_8916.webp?11667943889'),
(11, 'Dr. Stone', '2017-03-06', 0, 24, 'Riichiro Inagaki', 'https://www.nautiljon.com/images/manga/00/90/mini/dr_stone_7109.webp?11698768921'),
(12, 'Black Clover', '2015-02-16', 0, 33, 'Yūki Tabata', 'https://www.nautiljon.com/images/manga/00/24/mini/black_clover_4742.webp?11677855108'),
(13, 'The Promised Neverland', '2016-08-01', 1, 20, 'Kaiu Shirai', 'https://www.nautiljon.com/images/manga/00/77/mini/the_promised_neverland_6677.webp?11665082820'),
(14, 'Haikyuu!!', '2012-02-20', 0, 45, 'Haruichi Furudate', 'https://www.nautiljon.com/images/manga/00/33/mini/haikyu_1433.webp?11665080248'),
(15, 'Hunter x Hunter', '1998-03-03', 1, 36, 'Yoshihiro Togashi', 'https://www.nautiljon.com/images/manga/00/33/mini/hunter_hunter_33.webp?11690017243'),
(16, 'Bleach', '2001-08-07', 1, 74, 'Tite Kubo', 'https://www.nautiljon.com/images/manga/00/44/mini/bleach_44.webp?11657547640');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `profile_picture` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `mdp`, `profile_picture`) VALUES
(8, 'Nix', 'nova@test.com', '$2y$10$l1lYni8R6xVmAwFGWRvA9egJjhe4BTr9xHhSrWCOaXumoS2YM1bFK', 'uploads/lucas_qui_tire_la_languepp.png'),
(10, 'Nix.', 'novab@test.com', '$2y$10$7uC0esYkiv/mfDqYiJJW4e28U6956AmsjTTpQ/wpzq3/nzJ/XxOiq', 'uploads/lucas_qui_tire_la_languepp.png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `anime`
--
ALTER TABLE `anime`
  ADD CONSTRAINT `anime_ibfk_1` FOREIGN KEY (`id`) REFERENCES `genre_anime` (`anime_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `manga_ibfk_1` FOREIGN KEY (`id`) REFERENCES `genre_manga` (`manga_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
