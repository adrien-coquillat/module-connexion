-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 nov. 2020 à 15:29
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(3, 'fefe', 'vafefelue', 'vfealue', 'vafelue'),
(4, 'justinbridou', 'justin', 'bridou', '$2y$10$OllF11GwTm6EDvhnLZzHxuM0x1zPaII6QlFw3nCh4JUQNI6Ymr1UG'),
(18, 'mathissssss', 'mathiss', 'cotorep', '$2y$10$55hShtF.O2Vj6HYeXuAotuIQ46qVvhvatGYPENF8epQpDkZnD8/Da'),
(19, 'shunlezgueg', 'shun', 'shun', '$2y$10$RL3ap8QCVhS5y81sPVVIRO2rlnkdpAGzH0U7aszC7e8LMfrWqHt9S'),
(8, 'ruben13', 'ruben', 'habib', '$2y$10$TEf3LLC4vkB3SAmNOLqukO0OVZzRc32ajXRfgseZqH2mqZmKsJfsW'),
(10, 'mathis13002', 'mathis', 'cottet', '$2y$10$41/EM.Y86ZKpHll1NeH60.ZFxVOCa7I/QSDVSQjG6jQcPBfXJPECe'),
(11, 'rubenleboss', 'ruben', 'habib', '$2y$10$.9DDyyUVdmLr9tGTvO98t.qqgw8o0iJT8cdLws2l/uCA.l/amroLm'),
(12, 'mathis12cm', 'mathis1cm', 'mathis2cm', '$2y$10$vEsRaf/VxlP2LSRHbyDF1eGfYsTbJhnehTr3Isp682rgAWMLbVaRG'),
(13, 'adrien', 'mathis', 'coquet', '$2y$10$dsreRV8GtsIT8YMZpVK9Lu2/s.8dJuoTfHUqFyfg4nVWe82dSi35u'),
(14, 'justinbridou13', 'justin', 'bridou', '$2y$10$CimvNwyDvoUm2Mhv0U81puEgF3p7T5JWDGbpNXpN52a/9dmva9VI6'),
(15, 'mathissss', 'bruh', 'bruh', '$2y$10$7AIPZQWK9a0WpXHtMBAykupYKORD1ORzEZT6VitfLlhWuKmz3z0jm'),
(16, 'marwane', 'marwane', 'marwane', '$2y$10$GcKs0EwFb.uGl0FzoK3ptun3EmCL05a.4cL/CPM9UTCAJM2Ke.hHK'),
(17, 'etiennee', 'etienne', 'junaski', '$2y$10$BGxRzXGY7uBYyGbBSt6ZkuMhNc8iAChs4calb3U8Ttu2b.ykjrmaK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
