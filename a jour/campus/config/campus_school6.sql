-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 juil. 2024 à 12:46
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `campus_school`
--

-- --------------------------------------------------------

--
-- Structure de la table `appel`
--

CREATE TABLE `appel` (
  `id` int(11) NOT NULL,
  `matricul` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `heure` time(6) NOT NULL,
  `periode` int(255) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `niveau` int(255) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `professeur` varchar(255) NOT NULL,
  `m_eleve` varchar(255) NOT NULL,
  `nom_eleve` varchar(255) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(11) NOT NULL,
  `matricul` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_nais` date NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bureau` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `discipline` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `mot_de_passe` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `matricul`, `nom`, `prenom`, `date_nais`, `telephone`, `email`, `bureau`, `departement`, `discipline`, `image`, `mot_de_passe`) VALUES
(9, 'UN5x0uIME', 'Jean Pierre', 'Marie cure', '1987-02-21', '677345485', 'Jean@gmail.com', 'Vacant', 'informatique', 'Programmation en C', 'uploads/03.jpg', '$2y$10$uyk3A52/9tsnshWFRoD7kumMdQ/t91vLSYYM6QdXqt.NlxOLgx21q'),
(10, 'UNzhifIME', 'Mbanjock', 'Frederick', '1978-01-22', '657744744', 'frederick@gmail.com', '1er', 'informatique', 'Merise I', 'uploads/01.jpg', '$2y$10$0Z8TUmX6.rjPjtRD5CGqnOQUaKjpM/NsaQghtCBZ2H5tJnEX9xQei'),
(11, 'UNgyq2IME', 'Kenkack', 'Bienvenu', '1988-02-21', '655734433', 'bienvenuk@gmail.com', '5e', 'informatique', 'Algorithme et complexite', 'uploads/04.jpg', '$2y$10$cHNdMZwjm5taWWpm5j1p1uLv6IdGhec7U7eeM8IiTaHQ69JkaSsxy'),
(12, 'UNus2uIME', 'Naomie Flore', 'Cambel', '1992-02-21', '673244655', 'Cambelnf@gmail.com', 'Vacant', 'informatique', 'Entrepreneuriat', 'uploads/05.jpg', '$2y$10$NwUYzcCX/o6xRf4fahR1qObAyRUK6J3AXQUbLUyJYTr3ZycafuVIG'),
(13, 'UN5gx4IME', 'Atangana Celine ', 'Dion Maeva', '1994-03-23', '675464657', 'dionc@gmail.com', '3e', 'informatique', 'Projet tutore', 'uploads/02.jpg', '$2y$10$zHtDFV5U3lOAfhWUQA8mae4G.cWsNOOlukPJaUkukDmL48FyWasdi');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `matricule` varchar(10) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `telephone` varchar(9) DEFAULT NULL,
  `filiere` varchar(20) DEFAULT NULL,
  `niveau` varchar(1) DEFAULT NULL,
  `id_qr` varchar(255) NOT NULL,
  `profil` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`matricule`, `Nom`, `Prenom`, `dateofbirth`, `telephone`, `filiere`, `niveau`, `id_qr`, `profil`, `mot_de_passe`) VALUES
('UN1r9mIME', 'Fouda', 'Fryda', '2000-12-04', '655332233', 'MSI', '4', 'qrcodes/UN1r9mIME.png', 'uploads/16.jpg', '$2y$10$ZN1dyHbkZD6GEtU8mvqaOe23Te0t6786xmh7O1Dgg3djO8oCcW06a'),
('UN2fywIME', 'Penda', 'Kevine', '2000-02-11', '655557784', 'DAD', '4', 'qrcodes/UN2fywIME.png', 'uploads/06.jpg', '$2y$10$s/hX.Xh6GuC3S0bxKC4T6emkUsc73hfT027vqZ1O4HeD2pcLlYqfW'),
('UN2utjIME', 'Sandra', 'Ashley', '2000-03-11', '673445577', 'RS', '3', 'qrcodes/UN2utjIME.png', 'uploads/19.jpg', '$2y$10$Luf0GyYJG7T9AZ9fBgDIJeaNe4xovCjnbM.IwBCyxfdHluWrpC.tK'),
('UN2vwoIME', 'Nantcho ', 'Fredy Allandy', '2002-04-19', '671059500', 'DAD', '5', 'qrcodes/UN2vwoIME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.40_e058d1ac.jpg', '$2y$10$JbvgMmLoTcdoENCWPZpde.wQcD0YVlq.6ujdQS2UAIbARyfZCTU22'),
('UN35tbIME', 'Verane', 'Viviane', '2001-12-23', '658887788', 'GL', '3', 'qrcodes/UN35tbIME.png', 'uploads/22.jpg', '$2y$10$7mKqhSiQ9hQHWKTe5aBHK.ivG/VDr7K5yosraO2JB1rioInZGS8Ie'),
('UN4422IME', 'Emma-Loana', 'Eboa Ekwalla', '2002-05-15', '693821936', 'MSI', '5', 'qrcodes/UN4422IME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.38_ad57548a.jpg', '$2y$10$i9n4f8BgQIhFt7nwA/XMzeIxBF5J.PSX/oY9PsxrVdMD/KkA3EvrS'),
('UN5c1tIME', 'Blandi', 'Belle', '2001-09-13', '674556688', 'GL', '3', 'qrcodes/UN5c1tIME.png', 'uploads/24.jpg', '$2y$10$r0ZEDXe1Nnbu.8zx8wyM7.t9orn6VG/PLOoEce4LXleVjUlzClc.6'),
('UNb4feIME', 'Moane Jimbili', 'Evrard', '2002-03-03', '699034281', 'MSI', '5', 'qrcodes/UNb4feIME.png', 'uploads/04.jpg', '$2y$10$veKXhq8YVQqdvbwpDc7LyOzHykGs/fsxzmv0dx3RescpID1E79lFa'),
('UNc87rIME', 'Poupi', 'Ndefo', '2000-04-12', '654556677', 'MSI', '4', 'qrcodes/UNc87rIME.png', 'uploads/18.jpg', '$2y$10$/4U2DqJx31PH8aJdfodRheqI7UK3SSbb7i.1G/T47C7BPEOJ64TJ2'),
('UNcbguIME', 'Belinga', 'Oceana', '2000-02-01', '674545477', 'DAD', '4', 'qrcodes/UNcbguIME.png', 'uploads/08.jpg', '$2y$10$8HfbQMj33vj7VWq0M1XOueiUA15rGsI9OetF1hdrpw4YUOp0.WIZC'),
('UNeitnIME', 'Alexie', 'Kate', '2000-12-21', '655475469', 'DAD', '4', 'qrcodes/UNeitnIME.png', 'uploads/09.jpg', '$2y$10$m4DTkcHc0uJWARI6iT0Nvejq95CJrWjyOkLjT.WOBtX2ymIqK/6g6'),
('UNgnh0IME', 'Djomo', 'Luc Nilson', '2002-09-01', '670342219', 'DAD', '5', 'qrcodes/UNgnh0IME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.38_b9d02054.jpg', '$2y$10$5M4MSTI75NsMrNrCsvWPFuUtKSsT9ZFgIHjfNm9I6gNvzy8uWOmQ6'),
('UNi5mrIME', 'Alexandra', 'Ashley', '2000-05-21', '656667788', 'MSI', '4', 'qrcodes/UNi5mrIME.png', 'uploads/17.jpg', '$2y$10$0N9tS4xNfpdVuurvc.Sxn.ECQZOF1CociLmxHZns2l3iWsx1mPEHy'),
('UNko5sIME', 'Djoemy', 'Clark Youatcha', '2002-01-02', '652610123', 'MSI', '5', 'qrcodes/UNko5sIME.png', 'uploads/01.jpg', '$2y$10$ccT6ZLH1XdBPd0IQdBjC3O4hEYRVjf6nNJBOrxRleiWU9b9gcCOu2'),
('UNkyhfIME', 'Gabrielle', 'Celine', '2004-02-21', '658889977', 'GL', '2', 'qrcodes/UNkyhfIME.png', 'uploads/25.jpg', '$2y$10$.TkIWkYpaDfGGSal6TD0B.b/ZADKsN8.Ns50jsF2G6EuEnRnSNYk2'),
('UNlmxuIME', 'Amougou', 'Gaelle', '2000-02-12', '655775577', 'DAD', '4', 'qrcodes/UNlmxuIME.png', 'uploads/03.jpg', '$2y$10$tEF.0DE5/gQcLt.2RUm/Wep/pf90wcTdPlH0bERWdxba5u2m3OGhq'),
('UNorsdIME', 'Nchedong Lekane', 'Lee van Cabrel', '2002-01-13', '655723288', 'DAD', '5', 'qrcodes/UNorsdIME.png', 'uploads/leevan.jpg', '$2y$10$S8GXzdmyBI6kENgS9zBVAemey0RRhyCnXqTMrPNg/bwBL99uMKu6.'),
('UNr3u0IME', 'Athuro', 'Armand fred', '2000-11-11', '659889977', 'GL', '3', 'qrcodes/UNr3u0IME.png', 'uploads/23.jpg', '$2y$10$Vs7lyzjlEOm49/LFMsdpxelQAT2VZ7EXu4Ssl0cHst2O3YSCascHm'),
('UNsw9pIME', 'Paka Kembou', 'Kevine', '2002-12-15', '691073334', 'DAD', '5', 'qrcodes/UNsw9pIME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.37_3322e1af.jpg', '$2y$10$OurngtE6.vc.KX1lQJHJx.THOG5//B/jiBKc9zKWnCkCr91mKpUqa'),
('UNx55jIME', 'Beyonce', 'Bella', '2001-12-12', '657668899', 'RS', '3', 'qrcodes/UNx55jIME.png', 'uploads/20.jpg', '$2y$10$Vyh2awxszr9q/CqZSsxGgOVNR8TSml3neWh8TLkohvRztdDN6qSLy'),
('UNxgg5IME', 'Derema Njoya', 'Ndam', '2002-02-01', '697798299', 'MSI', '5', 'qrcodes/UNxgg5IME.png', 'uploads/02.jpg', '$2y$10$DF1cJTiz8IhHXdaijhTWSOwWK/cughs/kfZBgzIcApPK5Gj0s9bm6'),
('UNxyoaIME', 'Tayou Sikapin', 'Alan', '2002-04-14', '690368880', 'MSI', '5', 'qrcodes/UNxyoaIME.png', 'uploads/05.jpg', '$2y$10$TYlncpFvltsWfSKwONlYueAjieIVYjHhSsPGRcJN0mcrhONkr9Dk2'),
('UNz57kIME', 'Nono Djomo', 'Marcelle Harlinca', '2002-06-09', '693700209', 'DAD', '5', 'qrcodes/UNz57kIME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.37_9ea523bb.jpg', '$2y$10$X.ST9K0dY9mYMOUqz.HnaO7K2ki/AmFgNClQbgR0C6OgMUWHikJWG'),
('UNzw7tIME', 'Tsakem', 'Dylan', '2002-05-15', '694121029', 'MSI', '5', 'qrcodes/UNzw7tIME.png', 'uploads/23.jpg', '$2y$10$8jm0ugl1SYiO5jmiLzzzSONZnokfiqqfe.mCDZw0vpzjZ1LojBz4S');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id` int(11) NOT NULL,
  `matricul` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `heure` time(6) NOT NULL,
  `periode` int(255) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `niveau` int(255) NOT NULL,
  `matiere` varchar(255) NOT NULL,
  `professeur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id`, `matricul`, `date`, `heure`, `periode`, `filiere`, `niveau`, `matiere`, `professeur`) VALUES
(7, 'CAc7s7APP', '2024-07-18', '12:00:00.000000', 4, 'DAD', 5, 'Dev d\'app Mobile', 'Kenkack');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(10) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `telephone` varchar(9) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(1000) DEFAULT NULL,
  `acreditation` int(11) NOT NULL,
  `profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `Nom`, `Prenom`, `dateofbirth`, `telephone`, `email`, `mot_de_passe`, `acreditation`, `profil`) VALUES
('2', 'Lee', 'Cabrel', '2024-06-01', '654455887', 'Lee@gmail.com', '$2y$10$7D0RsgxqnLYDXTg349RwVOat3lo92uHC30kT/d3zvT1VkLhpDxVRy', 3, 'leevan.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appel`
--
ALTER TABLE `appel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appel`
--
ALTER TABLE `appel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
