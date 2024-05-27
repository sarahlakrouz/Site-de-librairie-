-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 28 avr. 2024 à 15:14
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arbrealivre`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telephone` bigint NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adresse_livraison` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adresse_facturation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ID_user` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`nom`, `prenom`, `sexe`, `telephone`, `email`, `motdepasse`, `adresse_livraison`, `adresse_facturation`, `ID_user`) VALUES
('MHIBEL', 'LOTFI', 'homme', 889, 'mhibellotfi@gmail.com', '', '24 rue des bois', '24 rue des bois', 1),
('Khaoui', 'Rim', 'femme', 7, 'rim.khaoui@gmail.com', 'Ls062004****', 'NIEZI', 'JEBUA', 2),
('Yjvjen', 'Jnduz', 'homme', 783423023, 'sarahlak@gmail.com', 'Ls062004****', 'ninaina', 'vzeeznv', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` ( 
  `ID_com` int NOT NULL AUTO_INCREMENT,
  `ID_user` int NOT NULL,
  `ISBN` int NOT NULL,
  `commentaire` varchar(1000) NOT NULL,
  `note` int NOT NULL,
  PRIMARY KEY (`ID_com`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`ID_com`, `ID_user`, `ISBN`, `commentaire`, `note`) VALUES
(1, 2, 0, 'Roman agréable à lire', 4),
(5, 2, 6598, 'Roman agréable à lire', 4),
(4, 2, 6598, 'erer', 1),
(6, 2, 728919, 'J\'ai passé un excellent moment en lisant ce livre.', 5);

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `ISBN` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `date_de_publication` date NOT NULL,
  `Nombre_de_pages` int NOT NULL,
  `Resume` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prix` double NOT NULL,
  `Langue` varchar(255) NOT NULL,
  `quantité` int NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=MyISAM AUTO_INCREMENT=8709323 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`ISBN`, `Titre`, `auteur`, `genre`, `edition`, `date_de_publication`, `Nombre_de_pages`, `Resume`, `Prix`, `Langue`, `quantité`, `image`) VALUES
(728919, 'Hadès et Perséphone - Tome 01', 'Scarlett St Sclair', 'Mythologie grecque', 'Hugo Roman', '2022-05-03', 372, 'Perséphone n\'est la déesse du printemps qu\'en titre. Depuis qu\'elle est toute petite, les fleurs se ratatinent à son contact. Après s\' être installée à New Athens, elle espérait mener une vie discrète, dans la peau d\'une journaliste mortelle. Tout change lorsqu\'elle s\'assied dans une boîte de nuit clandestine pour jouer une partie de cartes avec un étranger hypnotique et mystérieux. Hadès, le dieu des morts, a bâti un empire du jeu dans le monde des mortels et ses paris favoris sont réputés impossibles. Mais rien ne l\'a jamais intrigué autant que la déesse qui lui offre une aubaine laquelle il ne peut résister. ', 18, 'français', 3, 0x48616465732d65742d506572736570686f6e652d546f6d652d312e6a7067),
(6598, 'Le royaume enchante', 'Russel Banks', 'Roman', 'Actes SUD', '2024-01-03', 400, 'En 1971, Harley Mann, alors âgé de quatre-vingt-un ans, confie son histoire tragique à un magnétophone. Bande après bande, chapitre après chapitre, il revisite son adolescence et raconte l’installation de sa famille dans les marécages de Floride – à quelques encâblures de ce qui allait devenir Disney World – pour rejoindre une communauté de Shakers, pieuse et abstinente.', 23, 'français', 2, 0x726f7961756d65656e6368616e74652e6a706567),
(648281, 'La promesse du dragon ', 'Elizabeth Lim', 'Fantastique', 'Rageot', '2024-03-13', 608, 'Shiori, princesse de Kiata, a fait une promesse à sa belle-mère qu’elle compte bien tenir : retrouver le propriétaire légitime de la perle de dragon qu’elle a en sa possession. Pour cela, elle doit se rendre au royaume des dragons, dans les profondeurs de la mer Taijin, laissant derrière elle ses frères et son fiancé, Takkan… Mais la pierre attire bien des convoitises, et Shiori va devoir se battre pour éviter qu’elle ne tombe entre de mauvaises mains. ', 24, 'français', 0, 0x70726f6d657373652e6a706567),
(472891, 'Economie rurale', 'Caton', 'Roman historique', 'Actes SUD', '2004-04-13', 230, 'Caton mena une carrière militaire et politique brillante. L\'intransigeance de ses convictions morales et son patriotisme exacerbé en firent une figure légendaire de Rome. Connu sous le nom de De re rustica ou celui de De agricultura, l\'Economie rurale est le plus ancien ouvrage en prose latine subsistant et le seul de Caton qui nous soit parvenu entier. ', 10, 'français', 5, 0x45636f6e6f6d69652d727572616c652e6a7067),
(870932, 'Un soir d\'été', 'Philippe Besson', 'Roman', 'Julliard', '2024-01-04', 208, '', 20, 'français', 7, 0x556e736f6972646574652e6a7067),
(647382, 'Le Livre des Rois ', 'Ferdowsi', 'Epopée', 'SINDBAD', '2002-05-07', 200, 'Cette épopée nationale persane est d\'un genre sans doute unique au monde. Ce n\'est pas l\'histoire d\'une brève crise, comme la colère d\'Achille ou l\'accrochage de Roncevaux, ni même d\'une longue aventure. C\'est celle de l\'univers (ou de l\'Iran, la distinction n\'est pas toujours évidente) depuis la création jusqu\'à la conquête arabe au milieu du VIIe siècle de notre ère. Très tôt Le Livre des Rois s\'est imposé et a rejeté dans l\'ombre les récits antérieurs. Depuis près de mille ans, on n\'a cessé de le lire, de le réciter, de le copier ; des manuscrits calligraphiés pour des princes ont été ornés des enluminures les plus somptueuses. Aujourd\'hui encore, dans des cafés populaires, des récitateurs le racontent. Les Iraniens lisent Ferdowsi, poète du Xe siècle, comme nous lisons Ronsard ou Montaigne', 28, 'français', 10, 0x6c69767265646573726f69732e6a706567),
(8709322, 'Nous nous verrons en août', ' Gabriel García Márquez', 'Roman', 'Garsset', '2024-03-13', 144, 'Chaque seize août, Ana Magdalena Bach prend un ferry pour se rendre sur une île des Caraïbes où est enterrée sa mère. Malgré la splendeur d’une lagune peuplée de hérons bleus, elle se contente de déposer un bouquet de glaïeuls sur sa tombe, ne passe qu’une nuit dans le vieil Hotel del Senador et retourne chez elle avec le bac du lendemain. Mais l’été de ses quarante-six ans, ses habitudes sont bouleversées. Le soir du seize août, Ana Magdalena remarque un homme qui finit par lui offrir un verre sur un fond de boléro. Lorsqu’elle se retrouve avec lui dans sa chambre, elle réalise que c’est la première fois qu’elle trompe son mari Domenico.Prise pour une prostituée par cet homme dont elle ne connaît même pas le nom, Ana Magdalena repense sans cesse à lui. Enfin de retour sur l’île, le seize août suivant, Ana Magdalena ne retrouve pas son amant. Débute néanmoins une nouvelle phase de sa vie où chaque été, elle connaîtra une nouvelle aventure. De l’évêque en vacances au tueur en série en', 19, 'français', 6, 0x4e6f75732d6e6f75732d766572726f6e732d656e2d616f75742e6a7067),
(738292, 'Une façon d\'aimer', ' Dominique Barbéris ', 'Roman', 'Gallimard', '2023-08-17', 208, '', 20, 'français', 14, 0x756e65666163642761696d65722e6a7067),
(156723, 'Queen of Fennbirn', 'Kendare Blake', 'Roman Young Adult', 'Leha Heds', '2024-02-22', 240, 'QUATRE REINES. TROIS SOEURS. DEUX HISTOIRES. UN LIVRE.\r\n\r\nDécouvrez l’histoires des reines les plus célèbres de Fennbirn avant que leur destin ne soit décidé et leur héritage écrit : Katharine, la reine revenante. Mirabella, la puissante élémentaire. Arsinoé, la naturaliste ratée. Elsabet, l’oracle folle.\r\n\r\nLes jeunes reines : Mirabella, Arsinoé, et Katharine n’ont pas toujours échafaudé des plans pour s’entretuer. Elles ont même vécu ensemble. Simplement trois sœurs, seules dans un val. Découvrez un rare aperçu du temps où les reines triplées vivaient ensemble après leur naissance, une brève période durant laquelle, elles se protégeaient et s’aimaient. De leur naissance au jour de leur séparation, voici l’histoire de la vie des trois sœurs… avant qu’elle ne soit mise en jeu !\r\n\r\nLa reine oracle : Le règne légendaire de la dernière reine oracle est marqué par le sang et l’horreur. Paranoïaque, dépourvue de pitié, et complètement folle, la méfiance obsessionnelle d’Elsabet a mené au ma', 20, 'anglais', 10, 0x517565656e732d6f662d46656e6e6269722e6a706567);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
