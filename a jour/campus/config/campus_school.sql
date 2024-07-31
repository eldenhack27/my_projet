-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 juil. 2024 à 11:13
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
(15, 'UNk5buIME', 'Assu', 'Frederick', '1985-09-21', '654323224', 'frederick@gmail.com', '1er', 'informatique', 'Algorithme et complexite', 'uploads/01.jpg', '$2y$10$ja/oyOD2KOUxjeciUr1AeuoacKy2lompFweM1RTLKfzu6GzKnRhOq'),
(16, 'UN46boIME', 'Agata ', 'Celine', '1994-11-12', '675565656', 'celine@gmail.com', '2e', 'gestion et finance', 'Gestion de carriere professionnelle', 'uploads/02.jpg', '$2y$10$VstBH5uz7cJeOB8XQH6o..8aEUIFMJEf4XWOsrCFzBdEnQpLxKoHq'),
(17, 'UN5qgoIME', 'Gilbert', 'Armand', '1986-07-23', '675474898', 'Armand@gmail.com', '3e', 'informatique', 'Reseau d\'entreprise', 'uploads/03.jpg', '$2y$10$MyPewwtRg5/v6ny3oobCuOtBc9FmNOF7i8c.zATZuwdAZGiF9BihW'),
(18, 'UNamoqIME', 'Tchamaleu', 'Idriss', '1988-02-21', '675676778', 'idriss@gmail.com', '4e', 'gestion et finance', 'Entrepreneuriat', 'uploads/04.jpg', '$2y$10$krhVgBXNzCbIWcbYaF0xDOCgZqBfx3oXQbACvjDzFPMMnJ8qKao92'),
(19, 'UNauamIME', 'Demanou', 'Lucresse', '1995-12-12', '678787799', 'lucresse@gmail.com', 'Vacant', 'informatique', 'Infographie', 'uploads/05.jpg', '$2y$10$hftgPInvXkvElUKoXVkcKuzd4nu1WxnwUKEg29K5rxVMYpk1yzVi2');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `matricule` varchar(10) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `telephone` varchar(9) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `filiere` varchar(20) DEFAULT NULL,
  `niveau` varchar(1) DEFAULT NULL,
  `id_qr` varchar(255) NOT NULL,
  `profil` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `matricule`, `Nom`, `Prenom`, `dateofbirth`, `telephone`, `email`, `filiere`, `niveau`, `id_qr`, `profil`, `mot_de_passe`) VALUES
(1, 'UN1r9mIME', 'Fouda', 'Fryda', '2000-12-04', '655332233', '', 'MSI', '4', 'qrcodes/UN1r9mIME.png', 'uploads/16.jpg', '$2y$10$ZN1dyHbkZD6GEtU8mvqaOe23Te0t6786xmh7O1Dgg3djO8oCcW06a'),
(2, 'UN2fywIME', 'Penda', 'Kevine', '2000-02-11', '655557784', '', 'DAD', '4', 'qrcodes/UN2fywIME.png', 'uploads/06.jpg', '$2y$10$s/hX.Xh6GuC3S0bxKC4T6emkUsc73hfT027vqZ1O4HeD2pcLlYqfW'),
(3, 'UN2utjIME', 'Sandra', 'Ashley', '2000-03-11', '673445577', '', 'RS', '3', 'qrcodes/UN2utjIME.png', 'uploads/19.jpg', '$2y$10$Luf0GyYJG7T9AZ9fBgDIJeaNe4xovCjnbM.IwBCyxfdHluWrpC.tK'),
(4, 'UN35tbIME', 'Verane', 'Viviane', '2001-12-23', '658887788', '', 'GL', '3', 'qrcodes/UN35tbIME.png', 'uploads/22.jpg', '$2y$10$7mKqhSiQ9hQHWKTe5aBHK.ivG/VDr7K5yosraO2JB1rioInZGS8Ie'),
(5, 'UN4422IME', 'Emma-Loana', 'Eboa Ekwalla', '2002-05-15', '693821936', '', 'MSI', '5', 'qrcodes/UN4422IME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.38_ad57548a.jpg', '$2y$10$i9n4f8BgQIhFt7nwA/XMzeIxBF5J.PSX/oY9PsxrVdMD/KkA3EvrS'),
(6, 'UN4yzxIME', 'Nono Djomo', 'Marcelle Harlinca', '1997-06-09', '693700209', 'nonomarcelle@gmail.com', 'DAD', '5', '../../assets/qrcodes/UN4yzxIME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.37_9ea523bb.jpg', '$2y$10$WowStlaizoB75vyxt5Pmoe2KLiPOGdMvgl8PumgJWTM5T30K8o0TW'),
(7, 'UN5c1tIME', 'Blandi', 'Belle', '2001-09-13', '674556688', '', 'GL', '3', 'qrcodes/UN5c1tIME.png', 'uploads/24.jpg', '$2y$10$r0ZEDXe1Nnbu.8zx8wyM7.t9orn6VG/PLOoEce4LXleVjUlzClc.6'),
(8, 'UNb4feIME', 'Moane Jimbili', 'Evrard', '2002-03-03', '699034281', '', 'MSI', '5', 'qrcodes/UNb4feIME.png', 'uploads/04.jpg', '$2y$10$veKXhq8YVQqdvbwpDc7LyOzHykGs/fsxzmv0dx3RescpID1E79lFa'),
(9, 'UNc19pIME', 'Nchedong Lekane ', 'Lee van Cabrel', '2002-01-13', '655723288', 'lekaneleevan2@gmail.com', 'DAD', '5', '../../assets/qrcodes/UNc19pIME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.39_74edd521.jpg', '$2y$10$Py3oWNqq0R8XQWshYmVqpeFoPo9xMWEnHIWt7V1tKerx0MOcfuPoi'),
(10, 'UNc87rIME', 'Poupi', 'Ndefo', '2000-04-12', '654556677', '', 'MSI', '4', 'qrcodes/UNc87rIME.png', 'uploads/18.jpg', '$2y$10$/4U2DqJx31PH8aJdfodRheqI7UK3SSbb7i.1G/T47C7BPEOJ64TJ2'),
(11, 'UNcbguIME', 'Belinga', 'Oceana', '2000-02-01', '674545477', '', 'DAD', '4', 'qrcodes/UNcbguIME.png', 'uploads/08.jpg', '$2y$10$8HfbQMj33vj7VWq0M1XOueiUA15rGsI9OetF1hdrpw4YUOp0.WIZC'),
(12, 'UNeitnIME', 'Alexie', 'Kate', '2000-12-21', '655475469', '', 'DAD', '4', 'qrcodes/UNeitnIME.png', 'uploads/09.jpg', '$2y$10$m4DTkcHc0uJWARI6iT0Nvejq95CJrWjyOkLjT.WOBtX2ymIqK/6g6'),
(13, 'UNi5mrIME', 'Alexandra', 'Ashley', '2000-05-21', '656667788', '', 'MSI', '4', 'qrcodes/UNi5mrIME.png', 'uploads/17.jpg', '$2y$10$0N9tS4xNfpdVuurvc.Sxn.ECQZOF1CociLmxHZns2l3iWsx1mPEHy'),
(14, 'UNko5sIME', 'Djoemy', 'Clark Youatcha', '2002-01-02', '652610123', '', 'MSI', '5', 'qrcodes/UNko5sIME.png', 'uploads/01.jpg', '$2y$10$ccT6ZLH1XdBPd0IQdBjC3O4hEYRVjf6nNJBOrxRleiWU9b9gcCOu2'),
(15, 'UNkyhfIME', 'Gabrielle', 'Celine', '2004-02-21', '658889977', '', 'GL', '2', 'qrcodes/UNkyhfIME.png', 'uploads/25.jpg', '$2y$10$.TkIWkYpaDfGGSal6TD0B.b/ZADKsN8.Ns50jsF2G6EuEnRnSNYk2'),
(16, 'UNlmxuIME', 'Amougou', 'Gaelle', '2000-02-12', '655775577', '', 'DAD', '4', 'qrcodes/UNlmxuIME.png', 'uploads/03.jpg', '$2y$10$tEF.0DE5/gQcLt.2RUm/Wep/pf90wcTdPlH0bERWdxba5u2m3OGhq'),
(17, 'UNr3u0IME', 'Athuro', 'Armand fred', '2000-11-11', '659889977', '', 'GL', '3', 'qrcodes/UNr3u0IME.png', 'uploads/23.jpg', '$2y$10$Vs7lyzjlEOm49/LFMsdpxelQAT2VZ7EXu4Ssl0cHst2O3YSCascHm'),
(18, 'UNvamlIME', 'Nantcho', 'Fredy Allandy', '1999-04-19', '671059500', 'fredy@gmail.com', 'DAD', '5', '../../assets/qrcodes/UNvamlIME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.40_e058d1ac.jpg', '$2y$10$XgQtXwHjXp3WXku0o/vb/.PU2ctgGaXEBqaUAlWjB1fO322SmDRPW'),
(19, 'UNx55jIME', 'Beyonce', 'Bella', '2001-12-12', '657668899', '', 'RS', '3', 'qrcodes/UNx55jIME.png', 'uploads/20.jpg', '$2y$10$Vyh2awxszr9q/CqZSsxGgOVNR8TSml3neWh8TLkohvRztdDN6qSLy'),
(20, 'UNxdr8IME', 'Arthuro', 'Armand', '2001-04-21', '675676778', 'Arthuro@gmail.com', 'GL', '1', 'qrcodes/UNxdr8IME.png', 'uploads/02.jpg', '$2y$10$N7CsIHxm9h3PHE25v4VhIexNXCuY4.pCsxQBainNyv7Nk0AAH8yQO'),
(21, 'UNxgg5IME', 'Derema Njoya', 'Ndam', '2002-02-01', '697798299', '', 'MSI', '5', 'qrcodes/UNxgg5IME.png', 'uploads/02.jpg', '$2y$10$DF1cJTiz8IhHXdaijhTWSOwWK/cughs/kfZBgzIcApPK5Gj0s9bm6'),
(22, 'UNxyelIME', 'Paka Kembou', 'Kevine', '2000-12-15', '691073334', 'kemboutsafack@gmail.com', 'DAD', '5', '../../assets/qrcodes/UNxyelIME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.37_3322e1af.jpg', '$2y$10$D2RTU.C4UK7Kr5uA4IlGd.7Ig/C18aZBwqK8fZHlAd68c7ToB9caG'),
(23, 'UNxyoaIME', 'Tayou Sikapin', 'Alan', '2002-04-14', '690368880', '', 'MSI', '5', 'qrcodes/UNxyoaIME.png', 'uploads/05.jpg', '$2y$10$TYlncpFvltsWfSKwONlYueAjieIVYjHhSsPGRcJN0mcrhONkr9Dk2'),
(24, 'UNzdqnIME', 'Djomo', 'Luc Nilson', '2003-09-01', '670342219', 'djomoluc@gmail.com', 'DAD', '5', '../../assets/qrcodes/UNzdqnIME.png', 'uploads/WhatsApp Image 2024-07-16 à 12.33.38_b9d02054.jpg', '$2y$10$scXao0f64..8QrEGoPszmOGrFIIa0fs/1vNP6xa7S0DFnJ207Sury'),
(25, 'UNzw7tIME', 'Tsakem', 'Dylan', '2002-05-15', '694121029', '', 'MSI', '5', 'qrcodes/UNzw7tIME.png', 'uploads/23.jpg', '$2y$10$8jm0ugl1SYiO5jmiLzzzSONZnokfiqqfe.mCDZw0vpzjZ1LojBz4S');

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
  `matiere` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id`, `matricul`, `date`, `heure`, `periode`, `filiere`, `niveau`, `matiere`) VALUES
(8, 'CAeq7pAPP', '2024-07-25', '18:00:00.000000', 4, 'DAD', 5, 'Algorithme et complexite');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) NOT NULL,
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
(4, 'lee', 'cab', '2002-01-13', '655723288', 'le@gmail.com', '$2y$10$xBMvLDcijsKKcbTCx.yXFeZMGsokYMfmhJyo1oyexWx/Yhde8ecwW', 3, '../../assets/uploads/leevan.jpg');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
