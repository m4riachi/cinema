-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 08 déc. 2021 à 10:32
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'amin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4,
  `annee` int(11) NOT NULL,
  `bande_annonce_url` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `titre`, `description`, `annee`, `bande_annonce_url`) VALUES
(17, 'La méthode williams', 'Focus sur la personnalité de l\'entraîneur de tennis Richard Williams, père des joueuses mondiales Vénus et Serena. Il n\'avait aucune expérience dans le sport mais lorsque ses filles ont eu quatre ans, il a élaboré un plan de 78 pages décrivant l\'entraînement des futures championnes. Les sœurs Williams sont devenues deux des plus grandes joueuses de l\'histoire du tennis. Serena est sans conteste la meilleure tenniswoman de tous les temps, avec 23 victoires en tournois du Grand Chelem. Venus Williams a remporté sept titres en Grand Chelem.', 2021, 'eGrlio69L1g'),
(18, 'Clifford', 'Emily a du mal à s\'intégrer au sein de son école. Par hasard, elle découvre un petit chiot rouge qu\'elle nomme Clifford. Par magie, ce dernier subit une poussée de croissance et devient un chien gigantesque qui va attirer l’attention de généticiens cupides...', 2021, 'eGrlio69L1g'),
(19, 'S.o.s. fantômes : l\'héritage', 'Une mère célibataire et ses deux enfants s\'installent dans une petite ville et découvrent peu à peu leur relation avec les chasseurs de fantômes et l\'héritage légué par leur grand-père.', 2021, '9qfhKoz7n1c'),
(20, 'Burning casablanca (zanka contact)', 'Rock star déchue, Larsen Snake revient dans sa Casablanca natale où il fait la rencontre explosive de Rajae, une fille de la rue à la voix d’or. Ils écument les nuits de la ville et tombent éperdument amoureux. Mais leur passion est vite rattrapée par leur passé, et le couple sauvage prend la route du désert pour échapper à ses démons.', 2021, 'eUK4NUB9S4w'),
(21, 'Les tuche 4', 'Après avoir démissionné de son poste de président de la république, Jeff et sa famille sont heureux de retrouver leur village de Bouzolles. A l’approche des fêtes de fin d’année, Cathy demande un unique cadeau : renouer les liens avec sa sœur Maguy, et son mari Jean-Yves avec qui Jeff est fâché depuis 10 ans… La réconciliation aurait pu se dérouler sans problème, sauf que lors d’un déjeuner, Jeff et Jean-Yves, vont une nouvelle fois trouver un sujet de discorde : NOËL. Cette querelle familiale qui n’aurait jamais dû sortir de Bouzolles va se transformer en bras de fer entre Jeff et un géant de la distribution sur Internet.', 2021, 'TCTtdSuj2eo'),
(22, 'Encanto, la fantastique famille madrigal', 'Une comédie musicale centrée sur une jeune fille et sa famille en Colombie, qui ont tous des pouvoirs magiques sauf elle.', 2021, 'bdH6itLQ9-0'),
(23, 'Reminiscence', 'Dans un futur proche, Miami a été submergé par les flots, suite aux effets du changement climatique. Un enquêteur privé, Nick Bannister, est engagé par des clients afin de retrouver leurs précieux souvenirs. Au cours de sa dernière affaire, il tombe éperdument amoureux de sa cliente. À sa disparition, le détective est désemparé et se lance à sa recherche. Il se retrouve alors perdu dans une boucle temporelle et découvre des aspects de sa personnalité qu\'il ne connaissait pas auparavant.', 2021, 'ZPUdwe0U6MM'),
(24, 'Spider-man: no way home', 'La suite des aventures de Spider-Man...', 2021, '7w_w10HVa54'),
(25, 'Matrix resurrections', 'Quatrième volet de la saga Matrix, lancée en 1999.', 2021, 'Tj63xbpKnqo'),
(26, '355', 'Une arme technologique capable de prendre le contrôle de réseaux informatiques tombe entre de mauvaises mains. Les agences de renseignements du monde entier envoient leurs agentes les plus redoutables là où l’arme destructrice a été localisée : à Paris. Leur mission : empêcher des organisations terroristes ou gouvernementales de s’en emparer pour déclencher un conflit mondial. Les espionnes vont devoir choisir entre se combattre ou s’allier…', 2021, '6Kg8tjz2R-k');

-- --------------------------------------------------------

--
-- Structure de la table `film_genre`
--

DROP TABLE IF EXISTS `film_genre`;
CREATE TABLE IF NOT EXISTS `film_genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `film_id` int(10) UNSIGNED NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `film_film_id_fk` (`film_id`),
  KEY `g_genre_id_fk` (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film_genre`
--

INSERT INTO `film_genre` (`id`, `film_id`, `genre_id`) VALUES
(48, 20, 17),
(49, 20, 16),
(50, 20, 6),
(51, 19, 15),
(52, 19, 14),
(53, 19, 13),
(54, 19, 10),
(55, 19, 9),
(56, 19, 1),
(57, 18, 12),
(58, 18, 11),
(59, 18, 10),
(60, 18, 9),
(61, 17, 8),
(62, 17, 7),
(63, 17, 6),
(64, 21, 10),
(65, 22, 16),
(66, 22, 13),
(67, 22, 12),
(68, 22, 11),
(69, 22, 10),
(70, 23, 17),
(71, 23, 15),
(72, 23, 13),
(73, 23, 1),
(74, 24, 15),
(75, 24, 13),
(76, 24, 9),
(77, 24, 1),
(78, 25, 15),
(79, 25, 9),
(80, 25, 1),
(81, 26, 19),
(82, 26, 18);

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `film_id` int(11) UNSIGNED NOT NULL,
  `photo` varchar(300) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `films_film_id_fk` (`film_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`id`, `film_id`, `photo`) VALUES
(10, 17, 'upload/cover-showpage-date-e6b20c-0e34d9-0@1x.jpg'),
(11, 17, 'upload/King_Richard.jpg'),
(12, 17, 'upload/la_methode_williams.jpg'),
(13, 17, 'upload/vignette-portrait-date-c354bd-e9d3ba-0@1x.jpg'),
(16, 18, 'upload/5469519.jpg'),
(17, 19, 'upload/0365804.jpg-c_310_420_x-f_jpg-q_x-xxyxx.jpg'),
(18, 19, 'upload/4423283.jpg'),
(19, 19, 'upload/unnamed.jpg'),
(22, 20, 'upload/unnamed (2).jpg'),
(23, 20, 'upload/unnamed (1).jpg'),
(33, 21, 'upload/1146176-la-bande-annonce-du-quatrieme-volet-de-la-famille-tuche-a-ete-devoilee-le-6-decembre-2020.jpg'),
(34, 21, 'upload/190667.jpeg'),
(40, 22, 'upload/ENCANTO_0.jpg'),
(41, 22, 'upload/0378531.jpg'),
(48, 23, 'upload/MV5BODBkMTNmMmQtYTNlMy00OTRhLWE5MzgtYTZlMTUyYzY1MzkzXkEyXkFqcGdeQXVyNjY1MTg4Mzc@._V1_.jpg'),
(49, 21, 'upload/1146176-la-bande-annonce-du-quatrieme-volet-de-la-famille-tuche-a-ete-devoilee-le-6-decembre-2020.jpg'),
(50, 23, 'upload/1887489.jpg'),
(51, 23, 'upload/Hugh-Jackman-Rebecca-Ferguson-Reminiscence-cast-and-character-guide.jpg'),
(52, 22, 'upload/441d7c1_409022165-encanto-online-use-teaser1-039-00-0283.jpg'),
(53, 20, 'upload/1339214.jpg-r_1280_720-f_jpg-q_x-xxyxx.jpg'),
(54, 18, 'upload/share.png'),
(55, 24, 'upload/Spider-Man_No_Way_Home_JP_Poster.jpg'),
(56, 24, 'upload/spider-man-no-way-home-villains-s.jpg'),
(59, 25, 'upload/3336846.jpg'),
(60, 25, 'upload/16377035805462.jpg'),
(62, 26, 'upload/2331900.jpg'),
(63, 26, 'upload/83490.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `nom`) VALUES
(1, 'Action'),
(6, 'Drame'),
(7, 'Biographie'),
(8, 'Biopic'),
(9, 'Aventure'),
(10, 'Comédie'),
(11, 'Familial'),
(12, 'Animation'),
(13, 'Fantastique'),
(14, 'Horreur'),
(15, 'Science-Fiction'),
(16, 'Musical'),
(17, 'Romance'),
(18, ' Espionnage'),
(19, 'Thriller');

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salle_id` int(11) NOT NULL,
  `film_id` int(11) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `salles_salle_id_fk` (`salle_id`),
  KEY `f_film_id_fk` (`film_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `horaires`
--

INSERT INTO `horaires` (`id`, `salle_id`, `film_id`, `date`, `prix`) VALUES
(3, 3, 20, '2021-12-05 18:00:00', '50.00'),
(4, 3, 20, '2021-12-06 18:00:00', '50.00'),
(5, 2, 20, '2021-12-07 12:00:00', '50.00'),
(6, 2, 20, '2021-12-08 18:00:00', '50.00'),
(7, 3, 19, '2021-12-09 18:00:00', '60.00'),
(8, 3, 19, '2021-12-09 16:00:00', '50.00'),
(9, 2, 19, '2021-12-08 18:00:00', '50.00'),
(10, 2, 19, '2021-12-09 18:00:00', '60.00'),
(11, 3, 18, '2021-12-05 20:00:00', '60.00'),
(12, 3, 18, '2021-12-06 20:00:00', '50.00'),
(13, 2, 18, '2021-12-07 20:00:00', '50.00'),
(14, 2, 18, '2021-12-05 16:00:00', '60.00'),
(15, 2, 18, '2021-12-06 16:00:00', '60.00'),
(16, 3, 17, '2021-12-05 21:00:00', '50.00'),
(17, 3, 17, '2021-12-07 21:00:00', '50.00'),
(18, 2, 17, '2021-12-02 18:00:00', '50.00'),
(19, 3, 21, '2021-12-15 11:00:00', '60.00'),
(20, 3, 21, '2021-12-16 18:00:00', '50.00'),
(21, 3, 21, '2021-12-17 20:00:00', '50.00'),
(22, 2, 21, '2021-12-15 19:00:00', '50.00'),
(23, 2, 21, '2021-12-16 12:00:00', '60.00'),
(24, 2, 21, '2021-12-17 14:00:00', '50.00'),
(25, 2, 21, '2021-12-17 20:00:00', '60.00'),
(26, 3, 22, '2021-12-05 22:00:00', '60.00'),
(27, 3, 22, '2021-12-06 15:00:00', '60.00'),
(28, 3, 22, '2021-12-07 13:00:00', '60.00'),
(29, 2, 22, '2021-12-08 13:00:00', '50.00'),
(30, 2, 22, '2021-12-08 22:00:00', '50.00'),
(31, 2, 22, '2021-12-09 13:00:00', '50.00'),
(32, 2, 22, '2021-12-10 14:00:00', '50.00'),
(33, 2, 22, '2021-12-11 18:00:00', '50.00'),
(34, 2, 22, '2021-12-11 13:00:00', '50.00'),
(35, 3, 23, '2021-12-03 13:00:00', '50.00'),
(36, 3, 23, '2021-12-06 14:00:00', '50.00'),
(37, 3, 23, '2021-12-07 22:00:00', '50.00'),
(38, 3, 23, '2021-12-08 21:00:00', '50.00'),
(39, 2, 23, '2021-12-08 22:00:00', '50.00'),
(40, 2, 23, '2021-12-09 12:00:00', '50.00'),
(41, 2, 23, '2021-12-10 23:00:00', '50.00'),
(42, 2, 23, '2021-12-11 15:00:00', '50.00'),
(43, 2, 23, '2021-12-12 17:00:00', '50.00'),
(44, 3, 24, '2022-01-29 21:00:00', '50.00'),
(45, 2, 24, '2021-12-29 12:00:00', '50.00'),
(46, 3, 24, '2022-01-30 13:00:00', '50.00'),
(47, 3, 25, '2022-01-19 21:00:00', '60.00'),
(48, 2, 25, '2022-01-20 22:00:00', '60.00'),
(49, 3, 26, '2022-01-30 13:00:00', '50.00'),
(50, 3, 26, '2022-01-31 16:00:00', '50.00'),
(51, 2, 26, '2022-01-30 20:00:00', '60.00'),
(52, 2, 26, '2022-01-31 18:00:00', '50.00');

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE IF NOT EXISTS `newsletters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`) VALUES
(1, 'elhoussaine.oufkir@gmail.com'),
(2, 'houssaine@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

DROP TABLE IF EXISTS `salles`;
CREATE TABLE IF NOT EXISTS `salles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `adresse` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salles`
--

INSERT INTO `salles` (`id`, `nom`, `adresse`) VALUES
(2, 'Salle Memico Massira', 'Marrakech massira 1  '),
(3, 'Salle Memico Medina', 'Marrakech rue mamonia 12');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film_genre`
--
ALTER TABLE `film_genre`
  ADD CONSTRAINT `film_film_id_fk` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `g_genre_id_fk` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Contraintes pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `films_film_id_fk` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);

--
-- Contraintes pour la table `horaires`
--
ALTER TABLE `horaires`
  ADD CONSTRAINT `f_film_id_fk` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
