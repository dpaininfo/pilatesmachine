-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : espacehefp.mysql.db
-- Généré le : jeu. 10 juil. 2025 à 23:38
-- Version du serveur : 8.4.5-5
-- Version de PHP : 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espacehefp`
--
CREATE DATABASE IF NOT EXISTS `espacehefp` DEFAULT CHARACTER SET utf8mb4;
USE `espacehefp`;

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `NOABONNEMENT` int NOT NULL,
  `DATEDEBUT` date NOT NULL,
  `NBSEANCESRESTANTES` int DEFAULT NULL,
  `JOURSADDITIONNELS` int NOT NULL,
  `NOFORFAIT` int NOT NULL,
  `NOADHERENT` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `abonnement`
--

INSERT INTO `abonnement` (`NOABONNEMENT`, `DATEDEBUT`, `NBSEANCESRESTANTES`, `JOURSADDITIONNELS`, `NOFORFAIT`, `NOADHERENT`) VALUES
(812, '2024-11-20', -1, 0, 1, 575),
(813, '2024-09-24', -1, 0, 2, 648),
(814, '2024-09-18', -1, 0, 4, 488),
(815, '2024-09-10', -1, 0, 6, 514),
(816, '2024-10-07', -1, 0, 6, 164),
(817, '2025-02-28', -1, 0, 3, 698),
(818, '2024-11-12', -1, 0, 1, 348),
(819, '2024-09-25', -1, 0, 5, 533),
(820, '2025-01-20', -1, 0, 1, 285),
(821, '2024-11-16', -1, 0, 1, 322),
(822, '2024-10-14', -1, 0, 1, 77),
(823, '2024-11-07', -1, 0, 3, 673),
(824, '2024-10-11', -1, 0, 4, 198),
(825, '2024-11-04', -1, 0, 1, 513),
(826, '2025-03-11', -1, 0, 6, 199),
(827, '2025-01-09', -1, 0, 6, 690),
(828, '2024-11-04', -1, 0, 4, 3),
(829, '2024-10-07', -1, 0, 3, 665),
(830, '2024-10-07', -1, 0, 3, 664),
(831, '2025-01-12', -1, 0, 6, 694),
(832, '2024-09-27', -1, 0, 1, 74),
(833, '2024-10-03', -1, 0, 6, 76),
(834, '2024-09-23', -1, 0, 1, 511),
(835, '2024-09-29', -1, 0, 1, 201),
(836, '2024-12-09', -1, 0, 1, 451),
(837, '2024-10-02', -1, 0, 1, 658),
(838, '2024-09-13', -1, 0, 6, 388),
(839, '2024-09-05', -1, 0, 6, 178),
(840, '2024-09-03', -1, 0, 4, 44),
(841, '2024-09-17', -1, 0, 6, 632),
(842, '2024-09-06', -1, 0, 6, 489),
(843, '2025-02-27', -1, 0, 1, 4),
(844, '2024-09-26', -1, 0, 1, 509),
(845, '2024-10-19', -1, 0, 3, 395),
(846, '2024-09-17', -1, 0, 1, 625),
(847, '2024-11-20', -1, 0, 1, 36),
(848, '2024-10-04', -1, 0, 1, 660),
(849, '2025-06-18', -1, 0, 1, 464),
(850, '2024-09-16', -1, 0, 4, 635),
(851, '2024-10-16', -1, 0, 1, 7),
(852, '2025-01-27', -1, 0, 1, 254),
(853, '2024-09-11', -1, 0, 6, 612),
(854, '2024-01-19', -1, 0, 6, 586),
(855, '2024-09-30', -1, 0, 6, 668),
(856, '2024-11-04', -1, 0, 1, 255),
(857, '2024-10-07', -1, 0, 2, 527),
(858, '2025-01-16', -1, 0, 1, 691),
(859, '2024-10-02', -1, 0, 4, 504),
(860, '2024-10-01', -1, 0, 1, 545),
(861, '2024-11-04', -1, 0, 1, 674),
(862, '2025-02-26', -1, 0, 6, 696),
(863, '2024-10-14', -1, 0, 4, 8),
(864, '2024-10-26', -1, 0, 1, 204),
(865, '2024-11-06', -1, 0, 1, 567),
(866, '2025-01-23', -1, 0, 6, 693),
(867, '2024-12-02', -1, 0, 1, 411),
(868, '2024-11-05', -1, 0, 4, 433),
(869, '2024-09-23', -1, 0, 3, 256),
(870, '2024-09-23', -1, 0, 1, 686),
(871, '2024-09-29', -1, 0, 1, 111),
(872, '2025-04-01', -1, 0, 1, 704),
(873, '2024-09-05', -1, 0, 2, 478),
(874, '2024-06-17', -1, 0, 1, 305),
(875, '2024-10-05', -1, 0, 1, 521),
(876, '2024-10-06', -1, 0, 6, 669),
(877, '2025-02-26', -1, 0, 1, 582),
(878, '2024-11-10', -1, 0, 6, 225),
(879, '2024-09-10', -1, 0, 1, 526),
(880, '2025-01-31', -1, 0, 1, 572),
(881, '2025-03-10', -1, 0, 1, 699),
(882, '2024-09-24', -1, 0, 1, 646),
(883, '2024-09-30', -1, 0, 6, 536),
(884, '2024-10-19', -1, 0, 3, 374),
(885, '2024-10-19', -1, 0, 3, 375),
(886, '2024-09-17', -1, 0, 1, 630),
(887, '2024-09-30', -1, 0, 1, 654),
(888, '2024-10-12', -1, 0, 3, 528),
(889, '2024-10-12', -1, 0, 3, 484),
(890, '2024-10-10', -1, 0, 1, 670),
(891, '2024-12-10', -1, 0, 6, 682),
(892, '2024-10-21', -1, 0, 1, 380),
(893, '2024-11-24', -1, 0, 1, 466),
(894, '2024-09-25', -1, 0, 4, 9),
(895, '2024-10-29', -1, 0, 1, 163),
(896, '2024-10-10', -1, 0, 1, 124),
(897, '2024-10-09', -1, 0, 6, 48),
(898, '2024-10-10', -1, 0, 1, 663),
(899, '2024-09-09', -1, 0, 1, 620),
(900, '2025-06-09', -1, 0, 1, 711),
(901, '2024-11-18', -1, 0, 1, 259),
(902, '2024-11-18', -1, 0, 1, 516),
(903, '2024-09-05', -1, 0, 2, 38),
(904, '2024-10-01', -1, 0, 1, 365),
(905, '2025-04-28', -1, 0, 5, 481),
(906, '2025-04-29', -1, 0, 1, 229),
(907, '2024-09-18', -1, 0, 1, 459),
(908, '2024-09-17', -1, 0, 2, 354),
(909, '2024-10-19', -1, 0, 3, 394),
(910, '2024-11-13', -1, 0, 1, 230),
(911, '2024-10-20', -1, 0, 1, 12),
(912, '2024-11-24', -1, 0, 6, 556),
(913, '2024-11-12', -1, 0, 1, 401),
(914, '2024-11-04', -1, 0, 1, 675),
(915, '2024-09-09', -1, 0, 4, 485),
(916, '2024-10-15', -1, 0, 1, 195),
(917, '2024-11-24', -1, 0, 1, 150),
(918, '2025-03-27', -1, 0, 1, 208),
(919, '2024-09-30', -1, 0, 4, 52),
(920, '2024-10-31', -1, 0, 2, 143),
(921, '2024-11-13', -1, 0, 1, 209),
(922, '2024-11-14', -1, 0, 3, 400),
(923, '2024-11-14', -1, 0, 3, 573),
(924, '2024-09-16', -1, 0, 1, 624),
(925, '2025-01-09', -1, 0, 1, 689),
(926, '2024-11-04', -1, 0, 1, 125),
(927, '2024-11-04', -1, 0, 3, 79),
(928, '2024-11-04', -1, 0, 3, 210),
(929, '2024-11-04', -1, 0, 1, 317),
(930, '2024-11-10', -1, 0, 1, 576),
(931, '2025-01-22', -1, 0, 1, 373),
(932, '2024-10-20', -1, 0, 1, 371),
(933, '2024-10-07', -1, 0, 4, 662),
(934, '2024-10-19', -1, 0, 4, 13),
(935, '2024-11-03', -1, 0, 1, 563),
(936, '2024-10-18', -1, 0, 4, 671),
(937, '2025-02-01', -1, 0, 1, 593),
(938, '2025-04-01', -1, 0, 6, 703),
(939, '2024-11-20', -1, 0, 1, 96),
(940, '2024-11-05', -1, 0, 1, 16),
(941, '2024-11-05', -1, 0, 1, 167),
(942, '2024-11-05', -1, 0, 1, 168),
(943, '2024-10-10', -1, 0, 1, 355),
(944, '2025-03-26', -1, 0, 6, 326),
(945, '2025-04-01', -1, 0, 1, 705),
(946, '2024-09-09', -1, 0, 1, 391),
(947, '2024-09-18', -1, 0, 1, 649),
(948, '2024-09-16', -1, 0, 1, 687),
(949, '2024-10-15', -1, 0, 4, 188),
(950, '2024-11-10', -1, 0, 1, 93),
(951, '2024-09-23', -1, 0, 5, 631),
(952, '2024-09-23', -1, 0, 5, 17),
(953, '2024-10-19', -1, 0, 3, 419),
(954, '2024-10-19', -1, 0, 3, 418),
(955, '2025-04-08', -1, 0, 1, 604),
(956, '2024-10-05', -1, 0, 4, 18),
(957, '2024-09-23', -1, 0, 1, 650),
(958, '2024-09-24', -1, 0, 1, 190),
(959, '2024-09-23', -1, 0, 2, 647),
(960, '2024-10-04', -1, 0, 2, 222),
(961, '2024-10-03', -1, 0, 1, 239),
(962, '2024-09-16', -1, 0, 6, 447),
(963, '2024-09-03', -1, 0, 2, 462),
(964, '2024-10-03', -1, 0, 1, 539),
(965, '2024-05-13', -1, 0, 1, 610),
(966, '2024-10-03', -1, 0, 3, 238),
(967, '2025-02-27', -1, 0, 1, 428),
(968, '2024-10-09', -1, 0, 1, 57),
(969, '2024-09-16', -1, 0, 1, 621),
(970, '2024-10-24', -1, 0, 1, 245),
(971, '2024-09-17', -1, 0, 2, 641),
(972, '2024-10-04', -1, 0, 1, 247),
(973, '2024-10-11', -1, 0, 1, 667),
(974, '2024-11-14', -1, 0, 2, 70),
(975, '2024-10-04', -1, 0, 4, 21),
(976, '2025-01-29', -1, 0, 1, 695),
(977, '2024-10-12', -1, 0, 6, 55),
(978, '2024-11-19', -1, 0, 1, 680),
(979, '2024-10-19', -1, 0, 1, 393),
(980, '2024-11-06', -1, 0, 3, 243),
(981, '2024-11-06', -1, 0, 3, 242),
(982, '2025-03-04', -1, 0, 1, 194),
(983, '2024-09-30', -1, 0, 4, 653),
(984, '2024-09-19', -1, 0, 2, 639),
(985, '1025-01-22', -1, 0, 1, 588),
(986, '2024-09-10', -1, 0, 6, 22),
(987, '2024-09-16', -1, 0, 1, 619),
(988, '2024-10-07', -1, 0, 6, 684),
(989, '2024-09-24', -1, 0, 1, 645),
(990, '2024-11-16', -1, 0, 1, 192),
(991, '2024-10-18', -1, 0, 5, 223),
(992, '2024-10-18', -1, 0, 5, 170),
(993, '2024-09-17', -1, 0, 2, 290),
(994, '2024-11-13', -1, 0, 1, 133),
(995, '2024-10-04', -1, 0, 1, 709),
(996, '2025-04-22', -1, 0, 4, 241),
(997, '2025-03-26', -1, 0, 5, 701),
(998, '2025-03-26', -1, 0, 5, 702),
(999, '2024-10-25', -1, 0, 3, 534),
(1000, '2024-09-23', -1, 0, 6, 54),
(1001, '2024-09-16', -1, 0, 5, 493),
(1002, '2024-11-25', -1, 0, 1, 557),
(1003, '2024-09-30', -1, 0, 6, 59),
(1004, '2025-02-03', -1, 0, 5, 453),
(1005, '2024-09-16', -1, 0, 1, 623),
(1006, '2024-11-06', -1, 0, 1, 685),
(1007, '2024-09-19', -1, 0, 2, 421),
(1008, '2024-09-17', -1, 0, 1, 487),
(1009, '2024-09-04', -1, 0, 1, 318),
(1010, '2024-09-26', -1, 0, 2, 642),
(1011, '2024-10-15', -1, 0, 1, 309),
(1012, '2024-10-23', -1, 0, 1, 265),
(1013, '2024-09-11', -1, 0, 1, 622),
(1014, '2024-10-13', -1, 0, 1, 212),
(1015, '2024-09-05', -1, 0, 1, 611),
(1016, '2025-05-26', -1, 0, 1, 710),
(1017, '2024-12-12', -1, 0, 2, 377),
(1018, '2024-09-09', -1, 0, 1, 570),
(1019, '2024-11-19', -1, 0, 1, 679),
(1020, '2025-01-13', -1, 0, 1, 284),
(1021, '2025-01-08', -1, 0, 1, 266),
(1022, '2025-01-16', -1, 0, 1, 590),
(1023, '2024-11-18', -1, 0, 4, 213),
(1024, '2025-03-10', -1, 0, 1, 700),
(1025, '2024-09-30', -1, 0, 6, 661),
(1026, '2024-10-14', -1, 0, 6, 31),
(1027, '2024-11-14', -1, 0, 1, 387),
(1028, '2024-11-08', -1, 0, 1, 345),
(1029, '2025-05-01', -1, 0, 3, 708),
(1030, '2025-05-02', -1, 0, 3, 707),
(1031, '2024-11-26', -1, 0, 2, 215),
(1032, '2024-09-05', -1, 0, 1, 267),
(1033, '2024-09-30', -1, 0, 1, 656),
(1034, '2024-09-30', -1, 0, 1, 655),
(1035, '2025-01-15', -1, 0, 4, 147),
(1036, '2024-10-07', -1, 0, 4, 666),
(1037, '2024-10-17', -1, 0, 1, 672),
(1038, '2024-09-18', -1, 0, 6, 651),
(1039, '2024-09-09', -1, 0, 2, 378),
(1040, '2025-01-08', -1, 0, 1, 688),
(1041, '2024-09-16', -1, 0, 5, 617),
(1042, '2024-09-16', -1, 0, 5, 618),
(1043, '2024-09-19', -1, 0, 1, 629),
(1044, '2024-09-11', -1, 0, 5, 614),
(1045, '2025-01-13', -1, 0, 1, 692),
(1046, '2024-10-10', -1, 0, 6, 233),
(1047, '2024-09-24', -1, 0, 1, 519),
(1048, '2024-09-18', -1, 0, 1, 547),
(1049, '2025-02-03', -1, 0, 5, 454),
(1050, '2024-09-23', -1, 0, 1, 637),
(1051, '2024-09-07', -1, 0, 3, 615),
(1052, '2024-11-07', -1, 0, 1, 104),
(1053, '2024-09-16', -1, 0, 1, 616),
(1054, '2024-11-06', -1, 0, 4, 234),
(1055, '2024-11-06', -1, 0, 1, 327),
(1056, '2024-10-02', -1, 0, 1, 659),
(1057, '2024-10-15', -1, 0, 1, 25),
(1058, '2024-09-19', -1, 0, 2, 640),
(1059, '2025-06-11', -1, 0, 1, 712),
(1060, '2024-11-08', -1, 0, 1, 368),
(1061, '2024-09-06', -1, 0, 6, 515),
(1062, '2024-09-05', -1, 0, 1, 92),
(1063, '2024-09-17', -1, 0, 1, 501),
(1064, '2024-09-22', -1, 0, 1, 638),
(1065, '2024-09-23', -1, 0, 1, 634),
(1066, '2025-01-15', -1, 0, 3, 420),
(1067, '2025-01-06', -1, 0, 3, 291),
(1068, '2024-09-19', -1, 0, 1, 628),
(1069, '2024-11-06', -1, 0, 6, 681),
(1070, '2024-09-27', -1, 0, 1, 94),
(1071, '2025-05-24', -1, 0, 1, 427),
(1072, '2024-10-23', -1, 0, 1, 372),
(1073, '2024-09-30', -1, 0, 1, 216),
(1074, '2024-08-30', -1, 0, 6, 495),
(1075, '2025-01-10', -1, 0, 1, 115),
(1076, '2024-09-17', -1, 0, 6, 626),
(1077, '2024-09-23', -1, 0, 6, 633),
(1078, '2024-09-10', -1, 0, 6, 535),
(1079, '2025-04-24', -1, 0, 1, 307),
(1080, '2025-04-24', -1, 0, 3, 306),
(1081, '2025-04-30', -1, 0, 1, 706),
(1082, '2024-10-14', -1, 0, 2, 29),
(1083, '2024-09-30', -1, 0, 1, 657),
(1084, '2025-03-04', -1, 0, 1, 279),
(1085, '2024-09-23', -1, 0, 1, 644),
(1086, '2024-11-04', -1, 0, 1, 270),
(1087, '2024-09-24', -1, 0, 1, 643),
(1088, '2024-10-12', -1, 0, 4, 219),
(1089, '2024-10-04', -1, 0, 1, 347),
(1090, '2024-11-18', -1, 0, 5, 678),
(1091, '2024-11-18', -1, 0, 5, 677),
(1092, '2024-09-13', -1, 0, 3, 538),
(1093, '2024-09-12', -1, 0, 5, 613),
(1094, '2024-11-08', -1, 0, 1, 236),
(1095, '2024-10-09', -1, 0, 1, 237),
(1096, '2024-09-19', -1, 0, 1, 627),
(1097, '2024-09-10', -1, 0, 4, 510),
(1098, '2024-01-14', -1, 0, 1, 300),
(1099, '2024-10-18', -1, 0, 4, 71),
(1100, '2024-11-18', -1, 0, 1, 574);

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `NOADHERENT` int NOT NULL,
  `NOM` varchar(50) CHARACTER SET utf8mb4  NOT NULL,
  `PRENOM` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `EMAILADHERENT` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `MDPADHERENT` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `MDPMODIFIE` tinyint NOT NULL,
  `DATENAISSANCE` date DEFAULT NULL,
  `ADRESSE` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `CODEPOSTAL` int NOT NULL,
  `VILLE` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `TEL` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`NOADHERENT`, `NOM`, `PRENOM`, `EMAILADHERENT`, `MDPADHERENT`, `MDPMODIFIE`, `DATENAISSANCE`, `ADRESSE`, `CODEPOSTAL`, `VILLE`, `TEL`) VALUES
(3, 'BILLON', 'Marie-Pierre', 'marie-pierre.billon@wanadoo.fr', 'qjlUF5q3te', 0, '1949-01-09', '12 rue Charbonnerie', 22000, 'ST BRIEUC', 670094288),
(4, 'BRACQ', 'Aude', 'audesoulaine@hotmail.com', 'WmnBEnh2Ya', 0, '1977-10-02', '4 rue Jean XXII', 22000, 'ST BRIEUC', 660811077),
(7, 'CHARNAY', 'Valérie', 'valerie.charnay422@orange.fr', '5caSXQfzVM', 0, '1978-10-27', '10 rue Kléber', 22000, 'ST BRIEUC', 607156276),
(8, 'CORVELLER', 'Hélène', 'corveller.h@orange.fr', 'zhUPRQK2mw', 0, '1983-11-23', '37B rue Adolphe Le Bail', 22190, 'PLERIN', 613972209),
(9, 'FESSELIER', 'Alain', 'alain.fesselier@free.fr', 'WVlHaOHdAH', 0, '1968-08-19', '6 rue Jean Jaurès', 22970, 'PLOUMAGOAR', 681454146),
(12, 'GODE', 'Elise', 'elise.gode@hotmail.fr', 'RQUO7Tby27', 0, '1986-04-23', '1 rue de Querre Courtel', 22520, 'BINIC', 684023507),
(13, 'JAFFRAIN PICQUET', 'Josie', 'josie.jaffrain@gmail.com', 'P43X9Fs0Am', 0, '1952-06-02', '34 bis rue des Grèves', 22360, 'LANGUEUX', 608831675),
(16, 'JUILLAN', 'Béatrice', 'juillanjm@wanadoo.fr', 'imHOFo86w3', 0, '1956-09-14', '28 rue des Capucins', 22000, 'ST BRIEUC', 680013871),
(17, 'LE BAILLIF', 'Thu', 'thungtram@yahoo.fr', 'lgx3288cLf', 0, '1975-01-07', '7 rue Cardenoual', 22000, 'ST BRIEUC', 664830889),
(18, 'LE BOURDAIS', 'Anne-Lise', 'anne-lise.bernert@orange.fr', 'f1gMrfCrpf', 0, '1986-05-06', '24 rue du Commandant L\'Herminier', 22190, 'PLERIN', 673001352),
(21, 'LE NOUVEL', 'Fabienne', 'guilbaud22@aol.com', '6jzE2JY3fy', 0, '1965-06-27', '29 rue du Docteur Calmette', 22950, 'TREGUEUX', 626870219),
(22, 'LEGER', 'Madeleine', 'madeleineleger@sfr.fr', '9TdwHJdny5', 0, '1941-02-27', '6 rue Saint Benoît', 22000, 'ST BRIEUC', 615094721),
(25, 'RUELLAN', 'Liliane', 'liliane.ruellan@free.fr', 'x11nWMjeBr', 0, '1953-05-26', '22 rue Docteur Calmette', 22000, 'ST BRIEUC', 609312378),
(29, 'TIEC', 'Michel', 'michel.tiec@wanadoo.fr', 'FGOUDK7MbZ', 0, '1951-09-15', '12 rue Antoine Mazier', 22960, 'PLEDRAN', 764560847),
(31, 'PAIN', 'Delphine', 'delphine.pain@yahoo.fr', 'C7dNhEhqHP', 0, '1977-05-27', '4 bis rue Charles Le Maoût', 22000, 'ST BRIEUC', 628065738),
(36, 'BRUNEL', 'Kristen', 'pyk.brunel@free.fr', 'Pk0lUI26Wh', 0, '1974-08-29', '31 rue du Clos Simon', 22440, 'PLOUFRAGAN', 651061991),
(38, 'GEFFRIAUD', 'Alain', 'alaingeffriaud@gmail.com', 'F0t93BMkR7', 0, '1957-04-15', '1 rue François Jegou', 22190, 'PLERIN', 788208051),
(44, 'BOUREL', 'Sylvie', 'sbourel@pepscolor.com', 'yLbVf8etj7', 0, '1963-01-02', '42 rue Paul Bert', 22000, 'ST BRIEUC', 647943407),
(48, 'FOUILLEUX', 'Emmanuelle', 'fouilleux.emmanuelle@free.fr', '77YsRejkfO', 0, '1969-03-27', '2 Impasse Coêtlogon', 22000, 'ST BRIEUC', 660893172),
(52, 'HEDAN', 'Sophie', 'so.hedan@laposte.net', 'gUL7bK8An3', 0, '1975-05-09', '49 rue de Penthièvre', 22000, 'ST BRIEUC', 603456626),
(54, 'LUCAS', 'Viviane', 'vjmlucas@orange.fr', 'jdkJPGY8qp', 0, '1959-08-31', '13 rue Magellan', 22000, 'ST BRIEUC', 676883887),
(55, 'LE PAGE', 'Soizic', 'cyrilleetsoizic.lepage@gmail.com', '65kpltpwAs', 0, '1979-09-26', '14 rue du Vau Briend', 22440, 'LA MEAUGON', 633300350),
(57, 'LE GARFF', 'Gwenaelle', 'gwenlegarff@gmail.com', '9SDmkx4wy7', 0, '1971-01-02', '6 rue d\'Aquitaine', 22360, 'LANGUEUX', 687764823),
(59, 'MAHE', 'Valérie', 'pierre.valerie.mahe@orange.fr', 'oB4e7wzsRZ', 0, '1961-11-28', '6 rue de la Longuercie', 22520, 'BINIC', 677326465),
(70, 'LE NORMAND', 'Armelle', 'gilleno@orange.fr', 'KZCSFMLFOE', 0, '1948-10-16', '7 rue de Berrien', 22000, 'ST BRIEUC', 676577348),
(71, 'WINCKEL', 'Claudine', 'claudinewinckel@sfr.fr', 'pzpMbgrw1P', 0, '1962-01-27', '16 rue du clos louis', 22000, 'ST BRIEUC', 687384289),
(74, 'BOIVIN', 'Lisenn', 'lisennboivin@gmail.com', 'i2MbhORXTm', 0, '1981-04-25', '20 rue de la Ville Comand', 22190, 'PLERIN', 672039308),
(76, 'BOLORE', 'Frédéric', 'fredbolore@gmail.com', 'fnCw0kM1yc', 0, '1973-12-20', '4 rue de Ven Clod', 22170, 'LANRODEC', 760124988),
(77, 'BERROD', 'Delphine', 'd.berrod@laposte.net', 'a9L5sOkYab', 0, '1969-06-05', '25 rue des Tourelles', 22520, 'BINIC', 649229940),
(79, 'HOFFBECK', 'Armelle', 'famille.hoffbeck@laposte.net', 'AIKcH8sEPQ', 0, '1963-10-16', '13 rue Molière', 22000, 'ST BRIEUC', 781507123),
(92, 'SAUDEAU', 'Anne-Marie', 'saudeau.nane@hotmail.com', 'kVmh55sJvj', 0, '1960-03-07', '38 rue Chateaubriand', 22000, 'ST BRIEUC', 616185367),
(93, 'LANOE', 'Maryse', 'maryse.lanoe@free.fr', 'agT42UnhJi', 0, '1961-10-19', '13 bis Bd Herault', 22000, 'ST BRIEUC', 683836573),
(94, 'TABORE', 'Marie-Agnès', 'tabore.marieagnes@gmail.com', 'VnhfNmtfNK', 0, '1957-04-17', '15 rue Majellan', 22000, 'ST BRIEUC', 682993514),
(96, 'JOUANNY', 'Daniel', 'rhoxanne@infonie.fr', 'pNjQsBVGr7', 0, '1961-06-03', '26 rue du Tertre botrel', 22440, 'PLOUFRAGAN', 781658921),
(104, 'RICHARD', 'Christine', 'philipperichard2@wanadoo.fr', 'l1bflPdEpF', 0, '1959-07-27', '11 rue Beranger', 22000, 'ST BRIEUC', 684305985),
(111, 'DANIEL', 'Gwenola', 'gwenola.daniel@gmail.com', 'p8HW0tbDKc', 0, '1962-02-25', '1 Ter rue des Hillionnais', 22000, 'ST BRIEUC', 632481723),
(115, 'TERTRE', 'Marie', 'marie.tertre@caf.fr', 'BOWJePqmjw', 0, '1954-01-17', '31 rue Abbé Garnier', 22000, 'ST BRIEUC', 296940899),
(124, 'FONTAINE', 'Sandrine', 'sand.fontaine@free.fr', 'wZHWMr96gM', 0, '1967-11-07', '22 Belle Vue', 22940, 'PLAINTEL', 661558640),
(125, 'HERVO', 'Lauriane', 'hervo.lauriane@gmail.com', 'kWt7PjEg5m', 0, '1993-09-03', '5 rue Gaston Ramon', 22000, 'ST BRIEUC', 665677285),
(133, 'LESVENAN', 'Gwenaelle', 'gwenlesvenan@yahoo.fr', 'CtNkhi0bic', 0, '1978-05-11', '95 rue du Légué', 22000, 'ST BRIEUC', 683441900),
(143, 'HELLEU', 'Marie-Andrée', 'mahelleu@gmail.com', '93w1m9qWxw', 0, '1955-08-31', '2 Ter Rue Edgar Quinet', 22000, 'ST BRIEUC', 642730243),
(147, 'PLUSQUELLEC COUEPEL', 'Claudine', 'claudine.plusquellec@hotmail.fr', 'k0OcdFohxZ', 0, '1957-11-29', '12 Impasse Albert Camus', 22950, 'TREGUEUX', 630445984),
(150, 'HASCOET', 'Delphine', 'delphine.hascoet@gmail.com', 'qoMtzCbCTh', 0, '1979-12-31', '17 rue Ferdinand Buisson', 22000, 'ST BRIEUC', 661343876),
(163, 'FONTAINE', 'Laetitia', 'laetis.fontaine@orange.fr', 'r87eE8nls8', 0, '1981-12-05', '11 Le Quartier du Bois', 22940, 'PLAINTEL', 625031753),
(164, 'ATTORESI', 'Mathilde', 'mathilde22423@gmail.com', '0rqK1f9roo', 0, '1987-05-23', '51c rue Mathurin Morin', 22360, 'SAINT BRENDEN', 626635665),
(167, 'JUILLAN', 'Jean-Michel', NULL, 'jv4SoZmthh', 0, NULL, '28 rue des Capucins', 22000, 'ST BRIEUC', NULL),
(168, 'JUILLAN', 'Marie-Charlotte', NULL, 'RM2p3aeBsy', 0, NULL, '28 rue des Capucins', 22000, 'ST BRIEUC', NULL),
(170, 'LEPRINCE', 'Marie Annick', 'leprince.dominique@free.fr', 'r9YkOFM8Xk', 0, '1958-02-19', '7 rue Lamennais', 22000, 'ST BRIEUC', 673511435),
(178, 'BOURDON', 'Séverine', 'sevbourdon@yahoo.fr', 'oxZZEoylRK', 0, '1971-12-18', '3 résidence des Bas Mont', 44390, 'LES TOUCHES', 664824994),
(188, 'LANGLOIS', 'Marina', 'luc.langlois2@wanadoo.fr', 'NuKVoylrg1', 0, '1965-02-27', '12 Hent Sant Erwan', 22500, 'KERFOT', 668696424),
(190, 'LE BOUVIER', 'Brigitte', 'brigitte.lebouvierln@gmail.com', 'cQ7ZHYWREO', 0, '1958-05-28', '16 rue Jean Jaurès', 22000, 'ST BRIEUC', 673573266),
(192, 'LENROUE TOULLEC', 'Adeline', 'adeline.lenroue@gmail.com', 'lgaD6CXMXj', 0, '1978-05-11', '2 allée de Groix', 22950, 'TREGUEUX', 688457969),
(194, 'LE RIGOLEUR', 'Carole', 'lerigoleur.eric@orange.fr', 'wNe27StIVo', 0, '1973-07-25', '26 rue des Bosses', 22440, 'PLOUFRAGAN', 686965956),
(195, 'HAMON', 'Cécile', 'aziliz_h@hotmail.com', 'kul3V0lXPO', 0, '1980-12-23', '44 rue de la Falaise', 22190, 'PLERIN', 664334661),
(198, 'BESCOND', 'Laurence', 'laurence.bescond@sfr.fr', 'BVGSpTNddd', 0, '1965-05-09', '21 Bd Gambetta', 22000, 'ST BRIEUC', 620615507),
(199, 'BESNARD', 'Marion', 'besnard.ma@gmail.com', 'HeJrw7h3HM', 0, '1990-12-07', '30 rue Louis Jouvet', 22000, 'ST BRIEUC', 668152882),
(201, 'BOUDET', 'Muriel', 'muriel.boudet@laposte.net', 'oXQuXdLvGV', 0, '1962-12-10', '8 rue du 8 mai 1945', 22120, 'HILLION', 666755229),
(204, 'COTTE', 'Anne', 'anne.cotte22@gmail.com', 'sREO7eLfJf', 0, '1972-06-08', '10 rue du Frêche', 22120, 'QUESSOY', 698466918),
(208, 'HAUDECOEUR', 'Gael', 'gael.haudecoeur@ac-rennes.fr', 'mlwojZEDRM', 0, '1971-03-27', 'Le Moulin Neuf', 22410, 'PLOURHAN', 695465038),
(209, 'HELLIO', 'Monique', 'helios6@wanadoo.fr', 'KwvHa5pd2s', 0, '1951-06-11', '13 rue des Champs Roux', 22360, 'LANGUEUX', 688992076),
(210, 'HOFFBECK', 'Pierre', 'famille.hoffbeck@laposte.net', '6X4BlFCj9U', 0, '1961-05-16', '13 rue Molière', 22000, 'ST BRIEUC', 663882122),
(212, 'MERLE', 'Erwan', 'erwanmerle@yahoo.fr', '9yYewXQY2F', 0, '1972-10-27', 'Les Tertres', 22120, 'YFFINIAC', 660185045),
(213, 'MORVAN', 'Sylvie', '22slgmor@gmail.com', 'FFfuizQKj4', 0, '1961-08-09', '1 La Ville Hervieux', 22950, 'TREGUEUX', 683721154),
(215, 'PINAULT', 'Annie', 'annie.pinault@orange.fr', '1Qm4ShMf4W', 0, '1951-08-26', '13 rue Cdt d\'Estienne D\'ormes', 22000, 'ST BRIEUC', 616726784),
(216, 'TALINEAU LAUNAY', 'Monique', 'ghery.mlaunay@sfr.fr', '3H4XOzzOH2', 0, '1948-03-07', '6 Impasse des Coudriers', 22950, 'TREGUEUX', 689695824),
(219, 'TRAITEUR', 'Ghislaine', 'ghislaine.traiteur@orange.fr', '9A1tjRuz0P', 0, '1956-05-14', '10 rue des Portes', 22120, 'HILLION', 652363444),
(222, 'LE BRIS', 'Isabelle', 'zabou.lebas@gmail.com', '0IvwE1usfZ', 0, '1961-02-11', '22A rue Aristide Briand', 22000, 'ST BRIEUC', 687888534),
(223, 'LEPRINCE', 'Dominique', 'leprince.dominique@free.fr', 'BQFengvqBx', 0, '1957-08-31', '7 rue Lamennais', 22000, 'ST BRIEUC', 673633219),
(225, 'DELOURME', 'Typhaine', 'typhdelourme@gmail.com', 'Q4hewT6lV2', 0, '1979-10-09', '17 rue des plantes', 35700, 'RENNES', 677786526),
(229, 'GELARD', 'Marielle', 'mariellegelard@gmail.com', 'MuveIfbbnU', 0, '1966-01-31', 'Les portes d\'en bas', 22960, 'PLEDRAN', 643369611),
(230, 'GOARIN', 'Anne Cécile', 'acgoarin@gmail.com', 'SVhvSbrOo1', 0, '1978-01-23', '45 bis rue du Port', 22000, 'ST BRIEUC', 662206981),
(233, 'RAMOND', 'Stéphanie', 'stephanie.ramond@gmail.com', '7nlN6rjeF7', 0, '1981-08-08', '2 rue du rocher goeland', 22440, 'PLOUFRAGAN', 630076418),
(234, 'RIOUX', 'Céline', 'celinerioux@sfr.fr', 'CKJCBTRnDL', 0, '1975-03-02', '7 résidence des Peupliers', 22170, 'PLOUAGAT', 670408812),
(236, 'VERRE', 'Julie', 'juliv20@yahoo.fr', 'qnHxK5j553', 0, '1979-07-20', '22 Bis rue du Pré Chesnay', 22000, 'ST BRIEUC', 678475465),
(237, 'VINCENT', 'Marie', 'marievincent86@gmail.com', 'iMivcrgGnP', 0, '1978-01-25', '35H Bd Laënnec', 22000, 'ST BRIEUC', 607105819),
(238, 'LE FRANCOIS', 'Philippe', 'philocath@live.fr', '2RrdNNPV56', 0, '1968-05-18', '9 impasse Surcouf', 22190, 'PLERIN', 672873485),
(239, 'LE CHANU', 'Alain', 'alain.lechanu@sfr.fr', 'PiR8dJu2tI', 0, '1944-09-23', '53 rue Kerguelen', 22190, 'PLERIN', 609561685),
(241, 'LOHEZIC', 'Marie-Claire', 'marieclaire.lohezic@gmail.com', 'HOP2KOvITo', 0, '1956-07-30', '1 chemin de la Ville Jégu', 22940, 'ST JULIEN', 686728736),
(242, 'LE RAY', 'Pierrick', 'PLR1@sfr.fr', 'bznbgLjEsb', 0, '1954-04-07', '3 rue Armel beaufils', 22000, 'ST BRIEUC', 785444418),
(243, 'LE RAY', 'Jacqueline', 'plr1@sfr.fr', 's9zxYXd9yH', 0, '1953-02-21', '3 rue Armel Beaufils', 22000, 'ST BRIEUC', 668158807),
(245, 'LE JEUNE', 'Laurence', 'laurencelejeune220@gmail.com', 'qc62jlwwpV', 0, '1964-08-10', '18 rue Jean Jaurès', 22000, 'ST BRIEUC', 616679257),
(247, 'LE MOIGNE', 'Sylvie', 'sylviegaroche@orange.fr', 'kU9ePaVMqa', 0, '1965-05-20', '39 rue de la Micauclerie', 22000, 'ST BRIEUC', 685497891),
(254, 'CHERIAUX', 'Janine', 'cheriaux.j@wanadoo.fr', '8dncWvGs3T', 0, '1954-05-06', '10 route de Carberon', 22120, 'HILLION', 689935872),
(255, 'COLLINET', 'Pascale', 'pascale.collinet1@orange.fr', 'yQhdDJ4HIk', 0, '1960-07-06', '104 rue de Quintin', 22000, 'ST BRIEUC', 672011441),
(256, 'CREACH', 'Catherine', 'philocath@live.fr', 'qIPDUcsYFd', 0, '1970-09-30', '9 impasse surcouf', 22190, 'PLERIN', 616167040),
(259, 'GAUTIER DALLEMAGNE', 'Dominique', 'dominique.dallemagne@orange.fr', 'u0ca7Rwx9N', 0, '1966-05-23', '11 rue albert thomas', 22000, 'ST BRIEUC', 683166495),
(265, 'MEDOC', 'Nicole', 'nico.medoc@hotmail.fr', 'v718kfJLLh', 0, '1982-10-14', '29 Le quartier d\'en haut', 22960, 'PLEDRAN', 607405395),
(266, 'MOREAU', 'Soizic', 'soizicmoreau@hotmail.com', 'Ygwf2BrY8W', 0, '1975-11-25', '79 Bd Hoche', 22000, 'ST BRIEUC', 663043221),
(267, 'PIQUARD', 'Chantal', 'chpiquard@yahoo.fr', 'rtv2xIEL4M', 0, '1953-05-30', '184 rue Paul Bert', 22000, 'ST BRIEUC', 783585374),
(270, 'TOUILIN', 'Dominique', 'dominique_touilin@yahoo.fr', '0fSl85skWJ', 0, '1956-01-10', '21 rue Félix Le Dantec', 22000, 'ST BRIEUC', 641133089),
(279, 'TOSTIVINT', 'Gaïd', 'gaidtostivint@gmail.com', 'SR6iWuyzWZ', 0, '1961-06-18', '19 rue Claude Bernard', 22000, 'ST BRIEUC', 679972516),
(284, 'MOREAU', 'Francette', 'francette.moreau@wanadoo.fr', 'A9a8KPeojC', 0, '1960-07-01', '14 Bd Hoche', 22000, 'ST BRIEUC', 789888587),
(285, 'BENOIST', 'Régine', 'dbenoist22@wanadoo.fr', 'ZbX1MpVVQG', 0, '1958-10-10', '13 impasse Louis michel', 22950, 'TREGUEUX', 608656437),
(290, 'LESNE', 'Jean', 'jean.lesne@laposte.net', '2DKR63DKup', 0, '1950-06-25', '34 rue du Port', 22370, 'PLENEUF VAL ANDRE', 660734412),
(291, 'SOLA', 'Isabelle', 'ic-sola@wanadoo.fr', 'MzAaBtvbFh', 0, '1960-03-08', '1 rue Danton', 22000, 'ST BRIEUC', 645229848),
(300, 'VOLAND', 'Christine', 'dominique.mazzalovo@orange.fr', '7i5DvX4SyF', 0, '1958-04-09', '58 Bd Hoche', 22000, 'ST BRIEUC', 685194003),
(305, 'DE L\'YSLE', 'Nelly', 'nel2lil@hotmail.fr', 'AUGWmiXDYV', 0, '1972-10-25', '2 rue des Rozelais', 22800, 'SAINT DONAN', 677832124),
(306, 'THOMAS', 'Fabien', 'fabien.thomas22@gmail.com', '8P3T1joGjr', 0, '1970-04-17', '45 rue de la Corderie', 22000, 'ST BRIEUC', 684770855),
(307, 'THOMAS', 'Christelle', 'christelle.thomas22@gmail.com', 'k3ubeU3f6N', 0, '1971-06-30', '45 rue de la Corderie', 22000, 'ST BRIEUC', 698928021),
(309, 'MEAR', 'Claudie', 'claudie.mear@neuf.fr', 'ncfncAVZY9', 0, '1959-01-23', '29 rue Albert Thomas', 22000, 'ST BRIEUC', 663141959),
(317, 'HOUZE', 'Jacky', 'houzejv5@wanadoo.fr', '74yWqLezoM', 0, '1960-08-23', '15 rue de L\'Argoat', 22000, 'ST BRIEUC', 630495945),
(318, 'MASSON', 'Karine', 'karine.masson88@orange.fr', 'oVvvq3aD8F', 0, '1976-11-17', '77 La Chénaie de Péron', 22960, 'PLEDRAN', 689864983),
(322, 'BERECIBAR', 'Elaia', 'elaia.berecibar@mailo.com', 'TRKylmrnpW', 0, '1982-06-10', '32 rue Cuverville', 22000, 'ST BRIEUC', 634641653),
(326, 'KOTOV', 'Sylvie', 'sylvie.kotov@gmail.com', 'ZYbLoYLKqg', 0, '1967-01-01', 'Le Champ Court', 22590, 'PORDIC', 682269159),
(327, 'ROUAULT', 'Paulette', 'jacquesrouault@live.fr', 'PwQWPjG2UT', 0, '1950-04-24', '2 Venelle Du Pissot', 22800, 'QUINTIN', 633088756),
(345, 'PERROT', 'Joël', 'perrot22@gmail.com', '8wLjA7sEoo', 0, '1956-09-29', '3 rue Ambroise Paré', 22120, 'POMMERET', 645405601),
(347, 'TREHIOU', 'Gwenola', 'gwenolatrehiou@gmail.com', 'hUaS9RnlxM', 0, '1965-12-02', '26 rue Jean Jaurès', 22000, 'ST BRIEUC', 695082887),
(348, 'BAGOT', 'Céline', '7linebag@gmail.com', 'J9xOQuGsEv', 0, '1978-01-25', '4 rue Per Jakez Helias', 22960, 'PLEDRAN', 679431976),
(354, 'GIGUELAY', 'Elisabeth', 'pierreetelizabeth@orange.fr', 'ijhntPmRGu', 0, '1941-01-20', '12 rue de Normandie', 22000, 'ST BRIEUC', 296943449),
(355, 'KERGARAVAT', 'Anne-Laure', 'amlor@hotmail.fr', 'jhBU3ViwAC', 0, '1979-06-07', '32 rue du Docteur Rochard', 22000, 'ST BRIEUC', 662291098),
(365, 'GEFFROY', 'Servane', 'servane.geffroy@gmail.com', 'hsI0E18AHT', 0, '1978-04-10', '4 allée des Rochettes', 22950, 'TREGUEUX', 624452914),
(368, 'SARZEAUD', 'Marion', 'marion.sarzeaud@gmail.com', 'dHQxyeBAN6', 0, '1994-06-15', '47 rue Pasteur', 22950, 'TREGUEUX', 761585237),
(371, 'ITALIEN', 'Annette', 'nanouck1@orange.fr', 'VXqoEOLYbn', 0, '1962-09-20', '9 rue Guy Mahé', 22000, 'ST BRIEUC', 786505982),
(372, 'TALBOURDET', 'Elodie', 'elodie.talbourdet@yahoo.fr', 'ERhBdoz1XC', 0, '1985-01-12', '44 C rue de Penthièvre', 22000, 'ST BRIEUC', 682686614),
(373, 'HYDRIO HORVAIS', 'Jacqueline', 'jacqueline.hydrio@orange.fr', 'jwgSmop6Dp', 0, '1955-08-31', '19 rue des Epines Blanches', 22360, 'LANGUEUX', 673332779),
(374, 'DONIO', 'Christophe', 'cdonio@free.fr', 'orPTpGqR9f', 0, '1966-05-03', '19 rue Mathurin Meheut', 22950, 'TREGUEUX', 674865549),
(375, 'DONIO', 'Nathalie', 'cdonio@free.fr', 'u54q1iQjCj', 0, '1969-06-13', '19 rue Mathurin Meheut', 22950, 'TREGUEUX', 664120937),
(377, 'MICHAUD', 'Béatrice', 'michaud.beatrice@gmail.com', 'UIqLdOLSnM', 0, '1956-01-17', '6 Le Vaulaudy', 22150, 'ST CARREUC', 617111879),
(378, 'POULALIOU', 'Anaïk', 'anaick.poulaliou@gmai.com', 'njLL59Uf7B', 0, '1963-01-02', '22 rue des Bleuets', 22440, 'PLOUFRAGAN', 620991300),
(380, 'FERNANDEZ', 'Marina', 'margo.nana@hotmail.fr', '2ErGdaA6VO', 0, '1965-11-17', '33C Bd Laënnec', 22000, 'ST BRIEUC', 666554243),
(387, 'PELTIER', 'Sandra', 'peltiersandra@yahoo.fr', 'sQzcNqxCpf', 0, '1977-02-02', '14 rue ferdinand buisson', 22000, 'ST BRIEUC', 664477702),
(388, 'BOURDON', 'Nathalie', 'nathaliebourdon.50@gmail.com', 'qw2cGb2NEU', 0, '1966-05-11', '14 bis rue Jules Ferry', 45400, 'FLEURY LES AUBRAIS', 663986620),
(391, 'LABELLIE', 'Claire', 'claire_labellie@hotmail.com', 'LoDNKFTMao', 0, '1983-11-12', '1 rue des Bouleaux', 22440, 'PLOUFRAGAN', 675433686),
(393, 'LE POULLOUIN', 'Laetitia', 'lepoullouinlaeti@aol.fr', 'GQDwtKmGTk', 0, '1985-07-02', '44 Le Heussard', 22960, 'PLEDRAN', 685198076),
(394, 'GLEMATS', 'Stéphanie', 'stephanie.glemats@neuf.fr', 'SAgmM0azuX', 0, '1976-09-06', 'impasse du cloet d\'en bas', 22440, 'PLOUFRAGAN', 296765844),
(395, 'BROUSSEY', 'Benoît', 'benoit.broussey@neuf.fr', 'HQuycFPyio', 0, '1976-05-07', 'impasse du cloet d\'en bas', 22440, 'PLOUFRAGAN', 619176264),
(400, 'HENNEQUIN', 'Anne', 'anne.burel.h@gmail.com', 'zjfgGKnMqG', 0, '1974-07-09', '12 Bd Clemenceau', 22000, 'ST BRIEUC', 612201581),
(401, 'GOURET', 'Delphine', 'gouretdelphine@gmail.com', 'fBMMY7JvWS', 0, '1979-01-26', 'rue St Laurent', 22410, 'NOTRE DAME DE LA COUR', 785264433),
(411, 'COURRET', 'Cécile', 'courretcecile@gmail.com', '4j8RahcXQO', 0, '1963-03-11', '9 rue François Menez', 22000, 'ST BRIEUC', 663385624),
(418, 'LE BEGUEC', 'Yann', 'yann.lebeguec@yahoo.fr', '1t94DrPJwQ', 0, '1981-01-29', '5 rue du Telegraphe', 22170, 'PLERNEUF', 615648562),
(419, 'LE BEGUEC', 'Marianne', 'marianne.lebeguec@lilo.org', 'YR57DMFSf4', 0, '1984-04-13', '5 rue du Télégraphe', 22170, 'PLERNEUF', 666967445),
(420, 'SOLA', 'Christian', 'ic-sola@wanadoo.fr', 'UksOgCjVHy', 0, '1956-07-21', '1 rue Danton', 22000, 'ST BRIEUC', 638864800),
(421, 'MARTIN', 'Josiane', 'louis.martin62@orange.fr', 'cHqSL9vCTZ', 0, '1944-07-02', '10 rue d\'Argoat', 22440, 'PLOUFRAGAN', 296786342),
(427, 'TAILLARD', 'Valérie', 'valerietaillard@orange.fr', 'jEJ1OifipM', 0, '1969-01-31', '15 rue Paul Eluard', 22000, 'ST BRIEUC', 626110916),
(428, 'LE FUR', 'Mélanie', 'melanielefur@hotmail.fr', '0KlIKcRijw', 0, '1989-02-08', '21/23 rue Mathurin Meheut', 22000, 'ST BRIEUC', 678747432),
(433, 'COURSIN', 'Michelle', 'michelle.coursin@bbox.fr', 'IcoDGpLpKV', 0, '1952-09-21', '5 rue Zéwoïdi Fleurid', 22000, 'ST BRIEUC', 665486314),
(447, 'LE CHAPELAIN', 'Fabienne', 'fabienne.lechapelain@yahoo.fr', 'Idhav5LXwk', 0, '1979-05-26', 'Kerjulien', 56130, 'MARZAN', 661543016),
(451, 'BOUDET', 'Valentin', 'v.boudet10@laposte.net', 'NdQ0LcCbBB', 0, '1992-02-10', '18 rue Léon Blum', 22000, 'ST BRIEUC', 638763499),
(453, 'MARIETTE', 'Nicolas', 'nicolasmariette@orange.fr', 'wuf8QcAxDJ', 0, '1979-11-24', '24 rue de Provence', 22440, 'PLOUFRAGAN', 673149030),
(454, 'REIS', 'Ricardo', 'ricardoareis@hotmail.fr', 'Awec0JuZpk', 0, '2022-10-18', '24 rue de Provence', 22440, 'PLOUFRAGAN', 617161541),
(459, 'GERARD', 'Brigitte', 'vayer.brigitte22@orange.fr', 'WVVTJGnuGk', 0, '1952-12-05', '16 rue du Rgt Bezier La Fosse', 22000, 'ST BRIEUC', 663735250),
(462, 'LE CLANCHE', 'Sylvie', 'sylvieleclanche@orange.fr', 'Oz9G6A5pW8', 0, '1958-09-05', '6 rue de Normandie', 22000, 'ST BRIEUC', 630244145),
(464, 'CAROZZANI', 'Marie-Line', 'carozzani@wanadoo.fr', 'x9s2aw3Toy', 0, '1958-12-27', '15 Impasse du Pré Palais', 22190, 'PLERIN', 673556616),
(466, 'FERRY', 'Christine', 'chris.ferry@yahoo.fr', '8wl1qPVyf5', 0, '1974-05-21', '18 rue Abbé Josselin', 22000, 'ST BRIEUC', 610677790),
(478, 'DAYOT HELLIO', 'Marie-Hélène', 'marylenedayot@orange.fr', 'tFXwhrVnKD', 0, '1950-10-29', '17 rue Victor Rault', 22000, 'ST BRIEUC', 676594083),
(481, 'GELARD', 'Charlotte', 'charlottegelard@gmail.com', 'GBMBN7glZc', 0, '1990-05-05', '34 rue Xavier Grall C32', 35700, 'RENNES', 608136662),
(484, 'DUVIGNEAU', 'Françoise', 'françoise.duvigneau@outlook.fr', '6RSf40O3Kv', 0, '1966-10-26', '11 rue Paul Bert', 22000, 'ST BRIEUC', 678357356),
(485, 'GUITTON', 'Solenne', 'guittonsolenne@gmail.com', 'PY8XwqthkZ', 0, '1986-07-24', '3 rue Saint Just', 22000, 'ST BRIEUC', 783835826),
(487, 'MARTIN', 'Liliane', 'liliane.martin70@orange.fr', 'eVbVrP3mUg', 0, '1947-01-06', '17 rue Sergent Lemée', 22000, 'ST BRIEUC', 683536417),
(488, 'ARHANT', 'Isabelle', 'isabelle.arhant@gmail.com', 'LzgtLJjD0w', 0, '1963-01-10', '2 impasse des Petrels', 22520, 'BINIC', 689229790),
(489, 'BOUVET', 'Françoise', 'fb.pub@hotmail.com', 'YmNmIq5j0n', 0, '1975-05-03', '5 La Touche Jaguay', 22960, 'PLEDRAN', 662564591),
(493, 'LUCE', 'Arno', 'arnoluce@gmail.com', 'HitAlK09Iv', 0, '1980-12-31', '40A rue Jules Ferry', 22000, 'ST BRIEUC', 695047009),
(495, 'TALLE', 'Laetitia', 'laetitia.talle13@gmail.com', 'pQYKwW3hiM', 0, '1986-05-13', '8 rue Saint Melaine', 44390, 'LES TOUCHES', 672964681),
(501, 'SEVENO', 'Maryse', 'seveno.maryse@brox.fr', 'vv1sQnEvRZ', 0, '1968-07-23', '18 rue des combattants', 22440, 'PLOUFRAGAN', 621732312),
(504, 'CONSTANT', 'Soizic', 'soizic@dezzig.com', 'wjbYL9nHzg', 0, '1975-08-02', '17 rue des Ajoncs', 22940, 'ST JULIEN', 610979692),
(509, 'BRIFFAUD', 'Nadège', 'nadbrif@outlook.fr', 'rCPdwkUfBJ', 0, '1982-06-06', '12 rue du Coin', 22400, 'COETMIEUX', 682374022),
(510, 'VOISINE', 'Marianne', 'mariannevoisine@free.fr', 'tBjzAMIIi2', 0, '1980-06-09', '18 rue de la Ville Jouyaux', 22950, 'TREGUEUX', 662506186),
(511, 'BOUCHARD', 'Laurence', 'laurence.bouchard@gmail.com', 'lpgYYZMv3V', 0, '1967-06-10', '11 rue des Ecrivains', 22120, 'QUESSOY', 682379888),
(513, 'BESNARD', 'Evelyne', 'besnardevelyne@orange.fr', '1WJrjrNuwI', 0, '1961-12-17', '3 rue Louis Helary', 22000, 'ST BRIEUC', 698966946),
(514, 'ARNOU', 'Hélène', 'elen.arnou@gmail.com', 'xZX33Mp4VZ', 0, '1965-04-08', '5 rue du Champ Thebault', 35250, 'CHASNE SUR ILLET', 671343165),
(515, 'SATIE', 'Claire', 'clairesatie@sfr.fr', 'K8UOl7ThaM', 0, '1970-06-01', '14 rue du Clos Fayet', 22590, 'PORDIC', 615798204),
(516, 'GAUVRIT', 'Françoise', 'fan.fan.2201@gmail.com', 'S0YJxjPnWU', 0, '1960-01-30', '1 rue de la Voix Thomas', 22800, 'ST DONAN', 627302545),
(519, 'RAULT', 'Isabelle', 'isabelle.rt2@orange.fr', 'Sgltgjav53', 0, '1967-04-02', '25 bis rue des Quartiers', 22440, 'PLOUFRAGAN', 665286350),
(521, 'DE LAVALETTE', 'Aude', 'aude.delavalette@gmail.com', '1LkN4TTgYo', 0, '1968-09-10', '21 rue Racine', 22000, 'ST BRIEUC', 668937928),
(526, 'DESOCHE', 'Catherine', 'kty.desoche@orange.fr', 'RDwVTsiHsF', 0, '1959-03-02', '26 rue Louis Jouvet', 22000, 'ST BRIEUC', 670778068),
(527, 'CONAN', 'Sylviane', 'sylvianeconan@yahoo.fr', 'L5rQfcWIgX', 0, '1960-01-30', '2 rue Jacques Brel', 22360, 'LANGUEUX', 664480018),
(528, 'DUVIGNEAU', 'Franck', 'franck.duvigneau041@orange.fr', '5AMiNib0rX', 0, '1966-06-22', '11 rue Paul Bert', 22000, 'ST BRIEUC', 689654159),
(533, 'BAILLIARD', 'Myriam', 'bailliard.myriam@orange.fr', 'Bo4bszoAXu', 0, '1966-01-30', '33 Le Clos Goufon', 22170, 'PLELO', 665145659),
(534, 'LORENT', 'Gilles', 'gilles.lorent@wanadoo.fr', '6AL5D8xtY1', 0, '1962-08-12', '33 Le Clos Goujon', 22170, 'PLELO', 675134017),
(535, 'THIBAULT', 'Pierrick', 'apas.pierrick@gmail.com', 'Ynl46mdYqE', 0, '1989-06-28', '14 passage du Clos Gobellier', 49610, 'JUIGNE SUR LOIRE', 659084457),
(536, 'DOCEUL', 'Melissa', 'melissa_doceul@hotmail.fr', 'cDOpWoQ1PD', 0, '1985-04-03', '1 rue Marin Labbé', 14530, 'LUC SUR MER', 650055361),
(538, 'VAUCHELET', 'Anne', 'annevauchelet@gmail.com', '8UxdcsmTsB', 0, '1972-10-16', '13 rue Jules Ferry', 22000, 'ST BRIEUC', 662766015),
(539, 'LE FEVRE', 'Françoise', 'francoiselefevre@aliceadsl.fr', 'I2CeWttrm1', 0, '1959-06-06', '15 rue Victor Hugo', 22000, 'ST BRIEUC', 677757743),
(545, 'COPY', 'Christelle', 'christell.copy@gmail.com', 'atyTsAf3dt', 0, '1989-03-04', '21 rue Jean-Marie Pelt', 22190, 'PLERIN', 679951117),
(547, 'REDON', 'Francette', 'francettebernard@orange.fr', 'ni0bi0UEs6', 0, '1957-03-27', '6 rue du Manoir de la Hazaie', 22950, 'TREGUEUX', 638102340),
(556, 'GOMEZ', 'Fabienne', 'gomezfabienne@yahoo.fr', 'gImtcawGR9', 0, '1976-01-16', '19 rue du Bourg', 22440, 'LA MEAUGON', 618292510),
(557, 'MACE', 'Monique', 'moniquemace@hotmail.fr', 'iy9wbjI9Z1', 0, '1957-06-03', '52 rue des Ligneries', 22000, 'ST BRIEUC', 633368492),
(563, 'JAFFRES', 'Nathalie', 'nathalie.jaffres@wanadoo.fr', 'twytopFgL4', 0, '1971-10-05', '5 rue du Maine', 22440, 'PLOUFRAGAN', 677864340),
(567, 'COTTU', 'Sandrine', 'sarduin22@gmail.com', 'hq1ZSMP63u', 0, '1975-07-25', '39 Bd Arago', 22000, 'ST BRIEUC', 771876542),
(570, 'MICHEL', 'Annaïk', 'annaik.michel@gmail.com', '6m2pJp3nGN', 0, '1967-01-02', '79 rue Jules Ferry', 22000, 'ST BRIEUC', 608496693),
(572, 'DESURY', 'Patricia', 'patriciadesury@gmail.com', 'X7W65kXNLp', 0, '1970-11-18', 'Lanricat N°10', 22940, 'PLAINTEL', 622976867),
(573, 'HENNEQUIN', 'Yves', 'yvesnk1@gmail.com', 'vxm3le3skl', 0, '1973-04-30', '12 Bd Clemenceau', 22000, 'ST BRIEUC', 687420059),
(574, 'ZEGGAI', 'Rabiha', 'zeggai.rabiha@orange.fr', 'ZPT8v2PPmB', 0, '1969-12-20', '28 Bd Waldeck Rousseau', 22000, 'ST BRIEUC', 664104690),
(575, 'ALDERSEBAES', 'Pauline', 'pauline.aldersedaes@gmail.com', '3X7sfksg5b', 0, '1998-03-03', '71 Les Landes', 22960, 'PLÉDRAN', 761154810),
(576, 'HUET', 'Charlotte', 'charlottehuet@gmail.com', 'kEwqpoa70L', 0, '1976-07-18', '16 rue Blaise Pascal', 22000, 'ST BRIEUC', 628478027),
(582, 'DELAGE', 'Claudine', 'claudine.hascoet@wanadoo.fr', 'GCZJXqLRAt', 0, '1956-10-18', '13 bis Bd Clémenceau', 22000, 'ST BRIEUC', 687712636),
(586, 'CHEVASSON', 'Eric', 'eric.chevasson@wanadoo.fr', '2p5qVpIK8b', 0, '1966-04-27', '2 chemin de la Guelle', 63430, 'LES MARTRES D\'ARTIERE', 687167589),
(588, 'LEGENDRE', 'Régine', 'regine_legendre@gmail.com', '1TrzYgkphI', 0, '1959-01-30', '4 Impasse du Grand Tréfou', 22440, 'PLOUFRAGAN', 676041059),
(590, 'MORICE', 'Béatrice', 'beatrice.morice123@gmail.com', 'sEXm5uaFOT', 0, '1978-08-24', '71 rue Jules Ferry', 22000, 'ST BRIEUC', 778794587),
(593, 'JARDIN', 'Anne-Chantal', 'actrehin29@gmail.com', 'jxuEatbJhx', 0, '1958-08-24', '19 rue Abbé Josselin', 22000, 'ST BRIEUC', 682805665),
(604, 'LE BOUCHER', 'Sophie', 'leboucher.sophie@gmail.com', '0ZF4toQBMp', 0, '1987-01-28', '10 rue Houvenagle', 22000, 'ST BRIEUC', 624600566),
(610, 'LE FLOHIC', 'Alain', 'alain.leflohic@mailo.com', 'R78Dlqwtvc', 0, '1953-11-01', '56 rue Luzel', 22000, 'ST BRIEUC', 679691307),
(611, 'MERLET', 'Aurélie', 'aurmerlet@hotmail.com', 'ta7esfJTTS', 0, '1977-07-31', '14 rue des Islandais', 22000, 'ST BRIEUC', 664854702),
(612, 'CHEVALLIER', 'Chantal', 'chantal.chevallier64@orange.fr', '05Pe6jXHA2', 0, '1961-07-20', '6 Lieu Dit Crevel', 29590, 'LOPEREC', 670767056),
(613, 'VERGNAUD', 'Sylvain', 'sylvergnaud@neuf.fr', 'lbID0wn4yr', 0, '1974-02-03', '62 rue André Malraux', 22950, 'TREGUEUX', 607957278),
(614, 'QUINQU', 'Bénédicte', 'bquin@neuf.fr', 'RA15T72Egt', 0, '1971-06-08', '62 rue André Malraux', 22950, 'TREGUEUX', 672113851),
(615, 'RENAUDINEAU', 'Vincent', 'vrenaudineau@gmail.com', 'olbxNL20vx', 0, '1972-08-27', '13 rue Jules Ferry', 22000, 'ST BRIEUC', 675815846),
(616, 'RIESTER', 'Marie-Hélène', 'riester.mh@orange.fr', 'nw4wBwIO9J', 0, '1956-09-04', '2 bis rue des Villes Cadorées', 22440, 'PLOUFRAGAN', 642808199),
(617, 'PRIGENT', 'Alain', 'aprigent@acpnet.fr', 'KQkagbTyeP', 0, '1967-04-26', '3 rue Condorcet', 22000, 'ST BRIEUC', 625311202),
(618, 'PRIGENT', 'Cécile', 'cprigent@acpnet.fr', 'Zz2S2R1WhS', 0, '1967-12-21', '3 rue Condorcet', 22000, 'ST BRIEUC', 609881415),
(619, 'LELIONNAIS', 'Marylène', 'marylenelelionnais@hotmail.fr', 'A9LuXiu85j', 0, '1957-12-01', '8 rue Jean Mermoz', 22440, 'PLOUFRAGAN', 662753231),
(620, 'GALLIEN', 'Pauline', 'paulinegallien@gmail.com', 'CCAlJxMSjn', 0, '1984-05-16', '37 Bd Clemenceau', 22000, 'ST BRIEUC', 630952018),
(621, 'LE GORJU', 'Virginie', 'virginielegorju@yahoo.fr', 'PURIgHcVt1', 0, '1983-06-03', '25 Bis rue des Cotrelles', 22440, 'PLOUFRAGAN', 686525686),
(622, 'MERCERAY', 'Dewy', 'dewymercerais@hotmail.fr', 'D6C9WveZTf', 0, '1977-02-01', '56 Bd Pasteur', 22000, 'ST BRIEUC', 663338491),
(623, 'MARJOT', 'Celia', 'celia.marjot@orange.fr', 'WfuFdvI6LI', 0, '2001-05-16', '12 rue de la Croix Bertrand', 22120, 'YFFINIAC', 648968393),
(624, 'HENRY', 'Isabelle', 'isabellezw@hotmail.fr', 'FjxZ25txRg', 0, '1966-01-10', '41 rue Coëtlogon', 22000, 'ST BRIEUC', 684235714),
(625, 'BRULON', 'Marina', 'marinalanoe@hotmail.fr', 'laYyMZdAbg', 0, '1978-09-10', '12 rue des Bormes', 22440, 'PLOUFRAGAN', 688777999),
(626, 'TEXIER', 'Isabelle', 'isa.texier@gmail.com', 't34rzE8fjI', 0, '1971-10-09', '9 Bis Impasse du Goelo', 22440, 'PLOUFRAGAN', 601988196),
(627, 'VINCENT', 'Virginie', 'virginie.vincent.2242@gmail.com', 'xHKYQbwIJm', 0, '1978-09-09', '12 rue d\'Auvergne', 22950, 'TREGUEUX', 662068776),
(628, 'SOLIGNAC', 'Flore', 'flore-56@live.fr', 'dNSEiucPWI', 0, '1991-08-19', '21 rue de la Fontaine', 22440, 'TREMUSON', 648364085),
(629, 'QUEMENER', 'Nadège', 'nadegequemener@orange.fr', 'MPvvzKA0BT', 0, '1976-05-02', '13 rue des Mimosas', 22950, 'TREGUEUX', 675205743),
(630, 'DORE', 'Odile', 'odiledore@hotmail.com', 'YH6hXWfmD6', 0, '1967-02-21', '43 rue du Viaduc', 22190, 'PLERIN', 679374309),
(631, 'LE BAILLIF', 'Stéphane', 'thungtram@yahoo.fr', 'CqmouRJqoa', 0, '1975-06-03', '7 rue Cardenoual', 22000, 'ST BRIEUC', 663703930),
(632, 'BOURIEAU', 'Héléna', 'helena.bourieau@gmail.com', 'Diyamf4SBq', 0, '1985-04-30', '68 rue du Haut Fief', 85610, 'CUGAND', 643834171),
(633, 'THELIER', 'Yannick', 'ye.thelier@sfr.fr', 'sWliJIPdjl', 0, '1969-09-27', '21 rue Saint Quay', 22170, 'PLELO', 676674969),
(634, 'SIMON', 'Marie-Pierre', 'simon.mariepierre@outlook.fr', 'Y03Kdfcs5v', 0, '1963-11-18', '14 rue Jean Métairie', 22000, 'ST BRIEUC', 783466040),
(635, 'CHAISE', 'Nathalie', 'nathchaise@outlook.fr', 'DknZGXQoiL', 0, '1965-03-25', '10 La Ville Fini', 22120, 'HILLION', 675990094),
(637, 'RENAUD', 'Alix', 'alix.marchal@live.fr', 'XYYNk6fwoX', 0, '1991-06-26', '72 rue du Roselier', 22190, 'PLERIN', 660351495),
(638, 'SIMON', 'Florence', 'florencesimon@free.fr', 'KDXSXa2g2n', 0, '2024-09-22', '12 rue Flaubert', 22000, 'ST BRIEUC', 635945990),
(639, 'LECLAIRE', 'Alain', 'alain.leclaire@laposte.net', 'bTQDhGfNrO', 0, '1957-03-02', '52 Bd Waldeck Rousseau', 22000, 'ST BRIEUC', 682346261),
(640, 'SALOMON', 'Jean-Pascal', 'jean-pascal.salomon@laposte.net', 'oiXFzy2flJ', 0, '1969-04-16', '52 Bd Waldeck Rousseau', 22000, 'ST BRIEUC', 617226307),
(641, 'LE MEE', 'Nicole', 'nicolelemee@yahoo.fr', '0Tk0Ir7JNp', 0, NULL, '22 rue des Grinsailles', 22440, 'PLOUFRAGAN', 681866342),
(642, 'MAZZALOVO', 'Chantal', 'chantal.mazzalovo@orange.fr', 'YIeJotI0xn', 0, '1958-12-11', '38D rue Bellevue', 22190, 'PLERIN', 667451112),
(643, 'TOUPIN', 'Georges', 'georges.toupin@wanadoo.fr', 'QvQ18wnu3B', 0, '1958-05-09', '11 rue de la Ville Morel', 22590, 'PORDIC', 766339601),
(644, 'TOUCHEFEU', 'Myriam', 'myriamtouchefeu@yahoo.fr', 'cuDzDwxiod', 0, '1979-02-01', '8 rue de Rohan', 22000, 'ST BRIEUC', 2147483647),
(645, 'LEMOINE', 'Céline', 'lceline739@gmail.com', 'zV82tRJIYS', 0, '1988-05-10', '11 rue Eric Tabarly', 22960, 'PLEDRAN', 614781240),
(646, 'DINAHET', 'Stéphanie', 'dinahet.bestaux@hotmail.fr', '94V48R4jxI', 0, '1967-07-22', '19 rue de la Roche Jano', 22000, 'ST BRIEUC', 604169574),
(647, 'LE BRET', 'Rémi', 'remi.lebret@orange.fr', 'hphWfmyjB9', 0, '1953-02-27', '43 rue des Pervenches', 22440, 'PLOUFRAGAN', 663804933),
(648, 'ANGOUJARD', 'Marie', 'rangoujard@gmail.com', 'rywJckos68', 0, '1948-08-15', '104 rue de Quintin', 22000, 'SAINT-BRIEUC', 687273745),
(649, 'LAINE', 'Michaël', 'mickael.laine4@orange.fr', 'xz8QJtRr11', 0, '1973-08-11', '11 la Cornillière', 22940, 'PLAINTEL', 613466608),
(650, 'LE BOURHIS', 'Morgane', 'morganelebourhis@hotmail.fr', 'NkFwnyJOR8', 0, '1979-10-20', '99 rue de la Tour', 22190, 'PLERIN', 607836561),
(651, 'POTIN BEAULIEU', 'Véronique', 'potin.veronique@gmail.com', '2BF38AEKid', 0, '1974-03-20', '20 lot Route de St Ambroise', 22860, 'PLOURIVO', 686335082),
(653, 'LE ROUX', 'Marianne', 'yayouchcka@gmail.com', 'i9Pj4XfGmu', 0, '1991-02-23', '2 Ter Impasse des Dalliots', 22410, 'TREVENEUC', 762538664),
(654, 'DUROCHER', 'Capucine', 'cd2301@live.fr', 'KxqtDvar4y', 0, '1996-01-23', '21 rue de Gouedic', 22000, 'ST BRIEUC', 627811588),
(655, 'PLESTAN', 'Monique', 'monique.plestan@gmail.com', 'kAJgTwFHsL', 0, '1968-02-08', '89 Bd Hoche', 22000, 'ST BRIEUC', 644353759),
(656, 'PIROU', 'Marjorie', 'marjoriepirou@gmail.com', 'p0u3MtylxT', 0, '1990-01-25', '15B rue de la Ville Hamonet', 22440, 'TREMUSON', 642186096),
(657, 'TILLY', 'Catherine', 'catherinetilly22@gmail.com', 'MZfPGVGAIZ', 0, '1972-05-22', '7 rue de la Ville Gaudin', 22190, 'PLERIN', 629389147),
(658, 'BOULAIRE', 'Corinne', 'corinne.boulaire@yahoo.fr', 'tzvohlh4oL', 0, '1963-03-20', '27 rue des Mésanges', 22590, 'PORDIC', 637785960),
(659, 'ROUXEL', 'Sylvie', 'sylvie.baron919@orange.fr', 'vfyOBkwf61', 0, '1963-09-03', '38 Ter rue du Port', 22000, 'ST BRIEUC', 675700536),
(660, 'CARON', 'Véronique', 'v.caron4@aliceadsl.fr', 'po2FPbDZuK', 0, '1955-06-13', '52 rue Jean Jaurès', 22000, 'ST BRIEUC', 677194722),
(661, 'NOVAKOVIC', 'Alexia', 'alexia.novakovic@hotmail.fr', 'qxGzQgNa85', 0, '1975-05-02', '14 rue des Petites Filles Dieu', 28000, 'CHARTRES', 620846202),
(662, 'JACOB', 'Delphine', '22valy@orange.fr', 'eTWzzRKbXp', 0, '1980-03-14', '9 chemin des Bernains', 22520, 'BINIC', 669181213),
(663, 'GALLAIS', 'Sophie', 'sophie.gallais1980@gmail.com', 'XkA3HZT7GN', 0, '1980-07-04', '1 rue de la Côte à Moussu', 22000, 'ST BRIEUC', 602255306),
(664, 'BLONDEAU', 'Jean-Baptiste', 'jibidi@hotmail.fr', '03k7ceuQ9l', 0, '1974-05-01', '21 La Touche', 22800, 'PLAINE HAUTE', 631887769),
(665, 'BLONDEAU', 'Aurore', 'lysson.aurore@gmail.com', 'byn3C4kRSo', 0, '1988-04-28', '21 La Touche', 22800, 'PLAINE HAUTE', 682933709),
(666, 'POISSON', 'Marie-Anne', 'marieanne.poisson63@outlook.fr', 'xC2NrQ1VQF', 0, '1965-01-10', '34 rue des Vallées', 22950, 'TREGUEUX', 630872986),
(667, 'LE MOUAL', 'Aurélie', 'alm4@laposte.net', 'V4kQRaeZ8Q', 0, '1981-03-19', '104 St Guihen', 22150, 'ST CARREUC', 673383552),
(668, 'CHOTARD', 'Elise', 'elisechotard@yahoo.fr', 'LqvuszVsnY', 0, '1983-04-12', '14 rue de la Monaco', 37210, 'VOUVRAY', 608865705),
(669, 'DEBOIS', 'Gwenola', 'debois.gwenola@laposte.net', 'Xn5uPQ5QTj', 0, '1977-05-08', '133 rue de Larmor', 56100, 'LORIENT', 630896907),
(670, 'FALKENSTEIN', 'Laurence', 'laurence.falk22@gmail.com', 'V71vNeJqFt', 0, '1984-11-24', '3 rue Roses rouges', 22360, 'LANGUEUX', 689985733),
(671, 'JANLESBAUPIN', 'Valérie', 'valerie.janlesbaupin@gmail.com', 'qknMrC39Dp', 0, '1964-09-19', '15 rue de la Croisée', 22440, 'PLOUFRAGAN', 673531250),
(672, 'PONROY', 'Bérengère', 'berengereponroy@live.fr', 'QyGy3ZoZpm', 0, '1984-08-30', 'Le Coudray A', 22170, 'PLOUVARA', 668118853),
(673, 'BERTHELOT', 'Jean-Pierre', 'jpb@alicedls.fr', 'apKwWWZgOU', 0, '1958-10-15', '15 rue Victor Hugo', 22000, 'ST BRIEUC', 630901097),
(674, 'CORBEL', 'Virginie', 'virginie_corbel@orange.fr', 'GGb1PIvwky', 0, '1974-08-29', '2 Kerlidec', 22290, 'TRESSIGNAUX', 632671108),
(675, 'GUENVEUR', 'Valérie', 'boutiqueophelie@orange.fr', 'GhFjgVbQH2', 0, '1964-02-23', '18 rue du 19 mars 1962', 22440, 'PLOUFRAGAN', 631928698),
(677, 'TRUPOT', 'Thierry', 'thierry.trupot@gmail.com', 'qd8C1J2eXU', 0, '1961-02-01', '25 Clio', 22800, 'PLAINE HAUTE', 645135456),
(678, 'TRUPOT', 'Claudine', 'claudine.trupot@wanadoo.fr', 'j2G4KqFOJF', 0, '1961-09-23', '25 Clio', 22800, 'PLAINE HAUTE', 296420623),
(679, 'MORCELLO', 'Lena', 'lenamorcello@gmail.com', 'hwaeXUiYx5', 0, '1986-09-17', '42 bis Impasse Cordière', 22000, 'ST BRIEUC', 658344266),
(680, 'LE PEVEDIC', 'Rachel', 'lepevedic.rachel@orange.fr', 'sdiYD3p4Sc', 0, '1970-02-13', '37 rue Lafaillette', 22000, 'ST BRIEUC', 673689328),
(681, 'SUTEAU', 'Noémie', 'noemie.che@hotmail.fr', 'FhHXY0NTCQ', 0, '1984-08-05', 'Ty Nevez', 22160, 'BULAT PESTIVIEN', 631858324),
(682, 'FERCHAUD', 'Marie-Anne', 'maarnou@hotmail.com', 'JrTDjsHNbG', 0, '1981-08-06', '3 La Grande Yvoie', 85290, 'ST LAURENT SUR SEVRE', 628073373),
(684, 'LEMESLE', 'Catherine', 'catherine.lemesle@ouest-france.fr', '3BgF24mDkJ', 0, '1964-05-27', '27 rue du Goelo', 22000, 'SAINT-BRIEUC', 640153055),
(685, 'MARQUET', 'Eve', 'lomia.atelier@gmail.com', 'mqspnHT9ir', 0, '1988-01-12', '43 rue Abbé Garnier', 22000, 'SAINT-BRIEUC', 679806687),
(686, 'CREPIEUX', 'Sandra', 'sandrahourdin@gmail.com', 'i3hX8NAjFQ', 0, '1987-12-14', '5 rue des Hauts Champs', 22190, 'PLÉRIN', 672475103),
(687, 'LANDELLE', 'Claire', 'claire01080607@gmail.com', 'zVd1LjCxqM', 0, '1985-07-22', '45 rue de la Ville Pipe D\'or', 22190, 'PLÉRIN', 686121210),
(688, 'PRESSE', 'Isabelle', 'presseisabelle@gmail.com', 'VloNrp3DhL', 0, '1970-05-18', '9 La Gare', 22940, 'PLAINTEL', 667606915),
(689, 'HENRY', 'Marie', 'mariechristinanosybe@gmail.com', '1FrvYzM5gZ', 0, '2003-12-22', '46 rue Edmond Rostand', 22000, 'SAINT-BRIEUC', 609724675),
(690, 'BESSEAU', 'Cannelle', 'cannellebesseau@orange.fr', '8e1uxgqZn7', 0, '2000-11-26', '29 rue de la Bauregie', 44230, 'SAINT-SÉBASTIEN-SUR-LOIRE', 617940833),
(691, 'CONNAN', 'Eléonore', 'eleonoreconnan@gmail.com', 'n2CuHcHeW8', 0, '1992-01-01', '15 rue du Verger', 22950, 'TRÉGUEUX', 688252223),
(692, 'RABET', 'Yolande', 'yolanderabet@gmail.com', 'P3I1yjcaOk', 0, '1963-06-22', '17 rue Victor Rault Appart G2', 22000, 'SAINT-BRIEUC', 769867712),
(693, 'COUAPAULT', 'Charline', 'charline.couapault@yahoo.com', 'I1regvEEO7', 0, '1983-09-28', '8 Impasse des Quartiers', 22400, 'PLANGUENOUAL', 608502200),
(694, 'BLOUET', 'Nathalie', 'nblouet@outlook.com', 's5FiiN7gTo', 0, '1967-09-08', '11 Allée Sarah Vaughan', 44600, 'SAINT-NAZAIRE', NULL),
(695, 'LE PAGE', 'Olivier', 'olepage22@gmail.com', 'utz3zIlj4o', 0, '1968-10-19', '3 rue de Merlet', 22440, 'PLOUFRAGAN', 676054738),
(696, 'CORMIER', 'Danielle', 'michel-cormier@wanadoo.fr', 'mo5FYN1GCh', 0, '1958-10-13', '10 avenue des Rosaires', 22190, 'PLÉRIN', 640370654),
(698, 'ATTORRESI', 'MARC', 'marc.attorresi4@gmail.com', 'nF7QeQGI7j', 0, '1988-06-16', '51 C rue Mathurin Morin', 22360, 'LANGUEUX', 643835761),
(699, 'DIDIER', 'Marie', 'mariefrancedidier29@gmail.com', 'ADoRlLhIUw', 0, '1961-04-29', NULL, 22000, 'SAINT-BRIEUC', 607379260),
(700, 'NOURRY', 'Maelle', 'nourrymaelle@hotmail.fr', 'ujkAVR9zsB', 0, '2001-04-04', '37 rue Lafayette', 22000, 'SAINT-BRIEUC', 767697353),
(701, 'LOQUIN', 'Dominique', 'dloquin22@gmail.com', 'zY8VYuVDOd', 0, '1962-05-26', '1 Impasse Le Petit Bois', 22120, 'YFFINIAC', 670646232),
(702, 'LOQUIN', 'Sylvie', 'sloquin22@gmail.com', '5Cb3mRyPMa', 0, '1962-10-20', '1 Impasse Le Petit Bois', 22120, 'YFFINIAC', 786822006),
(703, 'JARNIAS', 'Sylvie', 'sylvie.j48@orange.fr', 'twGXtL8M53', 0, '1970-10-17', '1 Chemin des Peupliers', 26200, 'MONTÉLIMAR', 617208913),
(704, 'DASILVA ALFONSO', 'Silvia', 'silviadasilvaalfonso@gmail.com', 'WLE1cKP7Tm', 0, '1978-08-10', '19 rue du Gasset', 22440, 'PLOUFRAGAN', 660026730),
(705, 'KOUKEZIAN', 'Francoise', 'koukezian@gmail.com', 'slLPIHuOAm', 0, '1957-09-08', '6 rue Maurice Bouladoux', 22000, 'SAINT-BRIEUC', 770430269),
(706, 'THOMASSE', 'Marie Laure', 'marie.kam@hotmail.fr', 'rwZtHkAVV3', 0, '1976-01-15', '12 rue François Jegou', 22190, 'PLÉRIN', 630978905),
(707, 'PICHERIT', 'Emmanuelle', 'brunemma08@orange.fr', 'O3mIpgQel3', 0, '1961-08-01', '3 rue Jean Moulin', 22000, 'SAINT-BRIEUC', 672761246),
(708, 'PICHERIT', 'Bruno', 'bruno.picherit@orange.fr', 'hmIqflMuft', 0, '2025-05-01', '3 rue Jean Moulin', 22000, 'SAINT-BRIEUC', 608118874),
(709, 'LEVENEZ', 'Christian', 'christian.levenez@neuf.fr', '8bmMrdH3bo', 0, '1963-02-01', '12 rue Docteur Roux', 22000, 'SAINT-BRIEUC', 750974559),
(710, 'MEUNIER', 'Marie', 'm_france_guillin@hotmail.com', 'SjInGwZcZm', 0, '1989-12-08', '37 rue Jean Jaurès', 22000, 'SAINT-BRIEUC', 688510963),
(711, 'GARNIER', 'Beatrice', 'bea.garnier@gmail.com', 'SWtT7gq2Gy', 0, '1968-01-06', '4 rue Bir Hakim', 22000, 'SAINT-BRIEUC', 665497246),
(712, 'SARRAZIN', 'Brigitte', 'brigitte2235@orange.fr', '4yadXlWcI1', 0, '1965-04-13', '15 rue du Tertre Cotin', 22000, 'SAINT-BRIEUC', 686843416);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `EMAILADMIN` varchar(50) NOT NULL,
  `MDPADMIN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`EMAILADMIN`, `MDPADMIN`) VALUES
('efpcoach22@gmail.com', 'Fitness6!');

-- --------------------------------------------------------

--
-- Structure de la table `etre_present`
--

CREATE TABLE `etre_present` (
  `NOABONNEMENT` int NOT NULL,
  `NOJOUR` int NOT NULL,
  `HEUREDEBUTSEANCE` time NOT NULL,
  `DATESEANCE` date NOT NULL,
  `HEUREVALIDATION` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `forfait`
--

CREATE TABLE `forfait` (
  `NOFORFAIT` int NOT NULL,
  `LIBELLEFORFAIT` varchar(100) NOT NULL,
  `PRIX` int DEFAULT NULL,
  `DUREE` int NOT NULL,
  `NBSEANCES` int DEFAULT NULL,
  `MACHINE` tinyint(1) NOT NULL,
  `VISIO` tinyint(1) NOT NULL,
  `SALLE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `forfait`
--

INSERT INTO `forfait` (`NOFORFAIT`, `LIBELLEFORFAIT`, `PRIX`, `DUREE`, `NBSEANCES`, `MACHINE`, `VISIO`, `SALLE`) VALUES
(1, '40 séances', 290, 12, 40, 0, 1, 1),
(2, 'Senior', 260, 12, 40, 0, 1, 1),
(3, 'Couple 40 séances', 500, 12, 40, 0, 1, 1),
(4, 'Séances illimitées', 360, 12, NULL, 0, 1, 1),
(5, 'Couple séances illimitées', 540, 12, NULL, 0, 1, 1),
(6, 'Webcam illimitée', 220, 12, NULL, 0, 1, 1),
(7, 'Machines 4 mois', 150, 4, 10, 1, 0, 0),
(8, 'Machines 12 mois', 330, 12, 30, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE `jour` (
  `NOJOUR` int NOT NULL,
  `LIBELLEJOUR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`NOJOUR`, `LIBELLEJOUR`) VALUES
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(4, 'Jeudi'),
(5, 'Vendredi'),
(6, 'Samedi'),
(7, 'Dimanche');

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

CREATE TABLE `parametres` (
  `NBMACHINES` int NOT NULL,
  `NBADHERENTSMACHINE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `parametres`
--

INSERT INTO `parametres` (`NBMACHINES`, `NBADHERENTSMACHINE`) VALUES
(4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `NOJOUR` int NOT NULL,
  `HEUREDEBUTSEANCE` time NOT NULL,
  `HEUREFINSEANCE` time DEFAULT NULL,
  `NOTYPESEANCE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`NOJOUR`, `HEUREDEBUTSEANCE`, `HEUREFINSEANCE`, `NOTYPESEANCE`) VALUES
(1, '09:00:00', '09:45:00', 5),
(1, '10:00:00', '10:45:00', 2),
(1, '11:00:00', '11:45:00', 1),
(1, '12:30:00', '13:15:00', 1),
(1, '18:00:00', '18:45:00', 7),
(1, '19:00:00', '19:45:00', 1),
(2, '09:45:00', '10:45:00', 6),
(2, '10:45:00', '11:45:00', 8),
(2, '14:30:00', '15:30:00', 4),
(2, '17:45:00', '18:30:00', 5),
(2, '18:45:00', '19:30:00', 2),
(2, '19:45:00', '20:45:00', 1),
(3, '09:00:00', '09:45:00', 5),
(3, '10:00:00', '10:45:00', 1),
(3, '11:00:00', '11:45:00', 3),
(3, '18:00:00', '18:45:00', 7),
(3, '19:00:00', '19:45:00', 3),
(3, '19:45:00', '20:45:00', 8),
(4, '12:30:00', '13:15:00', 3),
(4, '14:30:00', '15:30:00', 4),
(4, '18:00:00', '18:45:00', 1),
(4, '19:00:00', '19:45:00', 5),
(4, '20:00:00', '20:45:00', 2),
(5, '09:00:00', '09:45:00', 5),
(5, '10:00:00', '10:45:00', 1),
(5, '11:00:00', '11:45:00', 2),
(5, '12:30:00', '13:15:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `seance_machine`
--

CREATE TABLE `seance_machine` (
  `NOJOUR` int NOT NULL,
  `HEUREDEBUTSEANCE` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `seance_machine`
--

INSERT INTO `seance_machine` (`NOJOUR`, `HEUREDEBUTSEANCE`) VALUES
(1, '09:00:00'),
(2, '17:45:00'),
(3, '09:00:00'),
(4, '19:00:00'),
(5, '09:00:00'),
(5, '12:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `seance_standard`
--

CREATE TABLE `seance_standard` (
  `NOJOUR` int NOT NULL,
  `HEUREDEBUTSEANCE` time NOT NULL,
  `ENVISIO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `seance_standard`
--

INSERT INTO `seance_standard` (`NOJOUR`, `HEUREDEBUTSEANCE`, `ENVISIO`) VALUES
(1, '10:00:00', 1),
(1, '11:00:00', 1),
(1, '12:30:00', 1),
(1, '18:00:00', 0),
(1, '19:00:00', 1),
(2, '09:45:00', 1),
(2, '10:45:00', 1),
(2, '14:30:00', 1),
(2, '18:45:00', 1),
(2, '19:45:00', 1),
(3, '10:00:00', 1),
(3, '11:00:00', 1),
(3, '18:00:00', 0),
(3, '19:00:00', 1),
(3, '19:45:00', 1),
(4, '12:30:00', 1),
(4, '14:30:00', 1),
(4, '18:00:00', 1),
(4, '20:00:00', 1),
(5, '10:00:00', 1),
(5, '11:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `s_inscrire`
--

CREATE TABLE `s_inscrire` (
  `NOABONNEMENT` int NOT NULL,
  `NOJOUR` int NOT NULL,
  `HEUREDEBUTSEANCE` time NOT NULL,
  `DATESEANCE` date NOT NULL,
  `DATEHEUREDESINSCRIPTION` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `typeseance`
--

CREATE TABLE `typeseance` (
  `NOTYPESEANCE` int NOT NULL,
  `LIBELLETYPESEANCE` varchar(50) NOT NULL,
  `DESCRIPTIONTYPESEANCE` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typeseance`
--

INSERT INTO `typeseance` (`NOTYPESEANCE`, `LIBELLETYPESEANCE`, `DESCRIPTIONTYPESEANCE`) VALUES
(1, 'Pilates Fondamental', 'Méthode douce de renforcement musculaire adaptée à tous.'),
(2, 'Pilates Intermédiaire', 'Augmentez vos objectifs avec des mouvements progressifs.'),
(3, 'Pilates Advanced', 'La finalité du Pilates avec ses 35 mouvements.'),
(4, 'Pilates Seniors', 'Mouvements alliant stabilité, respiration, équilibre pour mieux vieillir.'),
(5, 'Pilates Machines', 'Séances en petit groupe sur les appareils Reformer.'),
(6, 'Body Vital', 'Idéal pour ceux qui démarrent la remise en forme et les actifs qui veulent travailler cardio, force et flexibilité.'),
(7, 'Boxing Santé', 'Cardio et renforcement musculaire alliant Pilates et boxing pour le maintien d\'une forme énergique.'),
(8, 'Aéro Pilates', 'Associe des mouvements de yoga, tai chi, Pilates pour acquérir force, flexibilité, centration et calme.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`NOABONNEMENT`),
  ADD KEY `NOFORFAIT` (`NOFORFAIT`),
  ADD KEY `NOADHERENT` (`NOADHERENT`);

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`NOADHERENT`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`EMAILADMIN`);

--
-- Index pour la table `etre_present`
--
ALTER TABLE `etre_present`
  ADD PRIMARY KEY (`NOABONNEMENT`,`NOJOUR`,`HEUREDEBUTSEANCE`,`DATESEANCE`),
  ADD KEY `NOJOUR` (`NOJOUR`,`HEUREDEBUTSEANCE`);

--
-- Index pour la table `forfait`
--
ALTER TABLE `forfait`
  ADD PRIMARY KEY (`NOFORFAIT`);

--
-- Index pour la table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`NOJOUR`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`NOJOUR`,`HEUREDEBUTSEANCE`),
  ADD KEY `NOTYPESEANCE` (`NOTYPESEANCE`);

--
-- Index pour la table `seance_machine`
--
ALTER TABLE `seance_machine`
  ADD PRIMARY KEY (`NOJOUR`,`HEUREDEBUTSEANCE`);

--
-- Index pour la table `seance_standard`
--
ALTER TABLE `seance_standard`
  ADD PRIMARY KEY (`NOJOUR`,`HEUREDEBUTSEANCE`);

--
-- Index pour la table `s_inscrire`
--
ALTER TABLE `s_inscrire`
  ADD PRIMARY KEY (`NOABONNEMENT`,`NOJOUR`,`HEUREDEBUTSEANCE`,`DATESEANCE`),
  ADD KEY `NOJOUR` (`NOJOUR`,`HEUREDEBUTSEANCE`);

--
-- Index pour la table `typeseance`
--
ALTER TABLE `typeseance`
  ADD PRIMARY KEY (`NOTYPESEANCE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `NOABONNEMENT` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `NOADHERENT` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=713;

--
-- AUTO_INCREMENT pour la table `forfait`
--
ALTER TABLE `forfait`
  MODIFY `NOFORFAIT` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `jour`
--
ALTER TABLE `jour`
  MODIFY `NOJOUR` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `typeseance`
--
ALTER TABLE `typeseance`
  MODIFY `NOTYPESEANCE` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `abonnement_ibfk_1` FOREIGN KEY (`NOFORFAIT`) REFERENCES `forfait` (`NOFORFAIT`),
  ADD CONSTRAINT `abonnement_ibfk_2` FOREIGN KEY (`NOADHERENT`) REFERENCES `adherent` (`NOADHERENT`);

--
-- Contraintes pour la table `etre_present`
--
ALTER TABLE `etre_present`
  ADD CONSTRAINT `etre_present_ibfk_1` FOREIGN KEY (`NOABONNEMENT`) REFERENCES `abonnement` (`NOABONNEMENT`),
  ADD CONSTRAINT `etre_present_ibfk_2` FOREIGN KEY (`NOJOUR`,`HEUREDEBUTSEANCE`) REFERENCES `seance_standard` (`NOJOUR`, `HEUREDEBUTSEANCE`);

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`NOJOUR`) REFERENCES `jour` (`NOJOUR`),
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`NOTYPESEANCE`) REFERENCES `typeseance` (`NOTYPESEANCE`);

--
-- Contraintes pour la table `seance_machine`
--
ALTER TABLE `seance_machine`
  ADD CONSTRAINT `seance_machine_ibfk_1` FOREIGN KEY (`NOJOUR`,`HEUREDEBUTSEANCE`) REFERENCES `seance` (`NOJOUR`, `HEUREDEBUTSEANCE`);

--
-- Contraintes pour la table `seance_standard`
--
ALTER TABLE `seance_standard`
  ADD CONSTRAINT `seance_standard_ibfk_1` FOREIGN KEY (`NOJOUR`,`HEUREDEBUTSEANCE`) REFERENCES `seance` (`NOJOUR`, `HEUREDEBUTSEANCE`);

--
-- Contraintes pour la table `s_inscrire`
--
ALTER TABLE `s_inscrire`
  ADD CONSTRAINT `s_inscrire_ibfk_1` FOREIGN KEY (`NOABONNEMENT`) REFERENCES `abonnement` (`NOABONNEMENT`),
  ADD CONSTRAINT `s_inscrire_ibfk_2` FOREIGN KEY (`NOJOUR`,`HEUREDEBUTSEANCE`) REFERENCES `seance_machine` (`NOJOUR`, `HEUREDEBUTSEANCE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
