-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 juin 2022 à 01:51
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_ECommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `Admin`
--

CREATE TABLE `Admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nom` varchar(50) DEFAULT NULL,
  `admin_login` varchar(50) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Admin`
--

INSERT INTO `Admin` (`admin_id`, `admin_nom`, `admin_login`, `admin_password`, `admin_img`) VALUES
(1, 'Barry', 'boubacar@test.com', 'bouba', NULL),
(2, NULL, '', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Auteur`
--

CREATE TABLE `Auteur` (
  `auteur_id` int(11) NOT NULL,
  `auteur_nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Auteur`
--

INSERT INTO `Auteur` (`auteur_id`, `auteur_nom`) VALUES
(1, 'amadou hampaté ba'),
(3, 'CAMARA LAYE'),
(4, 'VICTOR HUGO'),
(5, 'STENDHAL'),
(6, 'ALBERT CAMUS'),
(7, 'J.K ROWLING'),
(8, 'GEORGE MARTIN'),
(9, 'SELIM AISSEL'),
(10, 'BILL FINGER'),
(13, 'HAJIME ISAYAMA'),
(14, 'MASASHI KISHIMOTO'),
(15, 'SEYDOU BADIAN KOUYATE'),
(16, 'JAMILA ABITAR');

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `categorie_id` int(11) NOT NULL,
  `categorie_nom` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`categorie_id`, `categorie_nom`) VALUES
(1, 'LA LITTERATURE'),
(4, 'ROMAN'),
(5, 'LE SPIRITUEL'),
(7, 'MANGA'),
(8, 'POESIE');

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `commande_id` int(11) NOT NULL,
  `livre_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `commande_date` date NOT NULL,
  `mode_livraison` varchar(30) NOT NULL,
  `mode_payement` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Livre`
--

CREATE TABLE `Livre` (
  `livre_id` int(11) NOT NULL,
  `livre_nom` varchar(50) NOT NULL,
  `livre_description` text NOT NULL,
  `prix` float NOT NULL,
  `livre_img` varchar(50) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_Auteur` int(11) DEFAULT NULL,
  `date_Ajout` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Livre`
--

INSERT INTO `Livre` (`livre_id`, `livre_nom`, `livre_description`, `prix`, `livre_img`, `quantite`, `etat`, `id_categorie`, `id_Auteur`, `date_Ajout`) VALUES
(8, 'ETRANGE DESTIN DE WANGRIN', 'A la fois conte et roman, mémoires, livre d\'histoire, ce texte à l\'ecriture flamboyante nous plonge dans l\'histoire de wangrin un jeune ayant connue gloire et tristesse, ce reçu parle du bien et du mal .....', 16, 'Wangrin.jpg', 4, NULL, 1, 1, '2022-05-25'),
(9, 'AMKOULLEL ENFANT PEUL', 'En Afrique quand un vieillard meurt c\'est une bibliothèque qui brûle.\" La célèbre formule prononcée en 1962 par Amadou Hampâté Bâ à ..', 30, 'Amkoullel-l-enfant-peul.jpg', 0, NULL, 1, 1, '2022-05-26'),
(10, 'PAS DE PETITE QUERELLE', 'C\'est l\'histoire d\'un homme qui se fait happer le pied par un crocodile qu\'il vient de sauver d\'un incendie de brousse. Déçu par le comportement du crocodile, il en appelle au jugement d\'une jument ...', 20, 'querel.jpg', 1, NULL, 1, 1, '2022-05-28'),
(11, 'LE THRONE DE FER', 'Neuf familles nobles rivalisent pour le contrôle du Trône de Fer dans les sept royaumes de Westeros. Pendant ce temps, des anciennes créatures mythiques oubliées reviennent pour faire des ravages.', 32, 'Game of throne.jpg', 12, NULL, 4, 8, '2022-05-28'),
(12, 'HARRY POTTER', 'cet ouvrage nous plonge dans un monde fantaisie, de magie, qui suit le parcours d\'un jeune garçon ayant perdu ses parents jeune, il ira dans le monde de magie a fin de suivre leur trace....', 27, 'harry_Poter.jpg', 20, NULL, 4, 7, '2022-05-29'),
(14, 'SCIENCE DE LEVEIL SPIRITUEL', 'Decouvrez comment ...........', 3, 'livreSpirituel0.jpg', 11, NULL, 5, 9, '2022-06-03'),
(15, 'JOKER', 'blablabla......', 32, 'joker.jpg', 4, NULL, 4, 10, '2022-06-03'),
(16, 'ATTACK DES TITANS', 'blaballlllllll', 35, 'snk.jpg', 7, 1, 7, 13, '2022-06-10'),
(17, 'NARUTO', 'blabla....', 48, 'Naruto.jpg', 4, 1, 7, 14, '2022-06-10'),
(18, 'SOUS ORAGE', 'blabla', 41, 'sous orage.jpg', 6, 1, 1, 15, '2022-06-10'),
(19, 'AUBE SOUS LES DUNES', 'blablabla', 4, 'aube.png', 4, 1, 8, 16, '2022-06-10');

-- --------------------------------------------------------

--
-- Structure de la table `Paiements`
--

CREATE TABLE `Paiements` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_status` text NOT NULL,
  `payment_amount` text NOT NULL,
  `payment_currency` text NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payer_email` text DEFAULT NULL,
  `payer_nom` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Paiements`
--

INSERT INTO `Paiements` (`id`, `payment_id`, `payment_status`, `payment_amount`, `payment_currency`, `payment_date`, `payer_email`, `payer_nom`) VALUES
(1, 'H8EGNEEAJAGW6', 'COMPLETED', '5.00', 'USD', '2022-06-08 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(2, 'H8EGNEEAJAGW6', 'COMPLETED', '5.00', 'USD', '2022-06-08 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(3, 'H8EGNEEAJAGW6', 'COMPLETED', '5.00', 'USD', '2022-06-08 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(4, 'H8EGNEEAJAGW6', 'COMPLETED', '5.00', 'USD', '2022-06-08 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(5, 'H8EGNEEAJAGW6', 'COMPLETED', '5.00', 'USD', '2022-06-08 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(6, 'H8EGNEEAJAGW6', 'COMPLETED', '5.00', 'USD', '2022-06-08 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(7, 'H8EGNEEAJAGW6', 'COMPLETED', '50.00', 'USD', '2022-06-10 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(8, 'H8EGNEEAJAGW6', 'COMPLETED', '50.00', 'USD', '2022-06-10 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(9, 'H8EGNEEAJAGW6', 'COMPLETED', '50.00', 'USD', '2022-06-10 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(10, 'H8EGNEEAJAGW6', 'COMPLETED', '50.00', 'USD', '2022-06-10 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(11, 'H8EGNEEAJAGW6', 'COMPLETED', '50.00', 'USD', '2022-06-10 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(12, 'H8EGNEEAJAGW6', 'COMPLETED', '50.00', 'USD', '2022-06-10 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe'),
(13, 'H8EGNEEAJAGW6', 'COMPLETED', '50.00', 'USD', '2022-06-10 00:00:00', 'sb-zymsh16959036@personal.example.com', 'John Doe');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `user_nom` varchar(50) NOT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_tel` varchar(50) NOT NULL,
  `user_adresse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`user_id`, `user_nom`, `user_login`, `user_password`, `user_tel`, `user_adresse`) VALUES
(1, 'traore', 'traore@gmail.com', 'traore', '0644628285', 'Marrakech'),
(2, 'breezy', 'breezy@gmail.com', 'breezy', '0644628285', 'Rabat');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `Auteur`
--
ALTER TABLE `Auteur`
  ADD PRIMARY KEY (`auteur_id`);

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`commande_id`),
  ADD KEY `livre_Com` (`livre_id`),
  ADD KEY `user_com` (`user_id`);

--
-- Index pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD PRIMARY KEY (`livre_id`),
  ADD KEY `cat_livre` (`id_categorie`),
  ADD KEY `aut_livre` (`id_Auteur`);

--
-- Index pour la table `Paiements`
--
ALTER TABLE `Paiements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `login_unique` (`user_login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Auteur`
--
ALTER TABLE `Auteur`
  MODIFY `auteur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `commande_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Livre`
--
ALTER TABLE `Livre`
  MODIFY `livre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `Paiements`
--
ALTER TABLE `Paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `livre_Com` FOREIGN KEY (`livre_id`) REFERENCES `Livre` (`livre_id`),
  ADD CONSTRAINT `user_com` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`);

--
-- Contraintes pour la table `Livre`
--
ALTER TABLE `Livre`
  ADD CONSTRAINT `aut_livre` FOREIGN KEY (`id_Auteur`) REFERENCES `Auteur` (`auteur_id`),
  ADD CONSTRAINT `cat_livre` FOREIGN KEY (`id_categorie`) REFERENCES `Categorie` (`categorie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
