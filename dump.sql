-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 avr. 2023 à 15:50
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cybercine`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `IdComment` int(11) NOT NULL,
  `DateAdded` date NOT NULL,
  `Comment` text NOT NULL,
  `Approved` int(11) NOT NULL,
  `IdMovie` int(11) NOT NULL,
  `Pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`IdComment`, `DateAdded`, `Comment`, `Approved`, `IdMovie`, `Pseudo`) VALUES
(1, '2023-04-21', 'Super film !!', 0, 4, 'Delph'),
(2, '2023-04-21', 'Un peu long, déçue par la fin', 0, 10, 'Delph'),
(3, '2023-04-21', 'une belle histoire, je recommande', 0, 7, 'Delph'),
(4, '2023-04-21', 'Bof ...', 0, 1, 'Delph'),
(5, '2023-04-21', 'Pas mal', 0, 4, 'Jeannot'),
(6, '2023-04-21', 'A voir et à revoir !!', 0, 2, 'Jeannot'),
(7, '2023-04-21', 'Très intéressant', 0, 10, 'Jeannot'),
(8, '2023-04-21', 'Une légende !!!', 0, 1, 'Jeannot'),
(9, '2023-04-21', 'Un film captivant', 0, 6, 'Jeannot'),
(10, '2023-04-21', 'Génial', 0, 3, 'Delph');

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `IdGenre` int(11) NOT NULL,
  `Category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`IdGenre`, `Category`) VALUES
(1, 'Drame'),
(2, 'Comédie'),
(3, 'Thriller'),
(4, 'Policier'),
(5, 'Romance');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `IdMovie` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `ReleaseDate` int(11) NOT NULL,
  `Director` varchar(50) NOT NULL,
  `Synopsis` text NOT NULL,
  `Casting` varchar(50) NOT NULL,
  `Picture` varchar(50) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `DateAdded` date NOT NULL,
  `IdGenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`IdMovie`, `Title`, `ReleaseDate`, `Director`, `Synopsis`, `Casting`, `Picture`, `Duration`, `DateAdded`, `IdGenre`) VALUES
(1, 'The social network', 2010, 'David Fincher', 'Une soirée bien arrosée d&#039;octobre 2003, Mark Zuckerberg, un étudiant qui vient de se faire plaquer par sa petite amie, pirate le système informatique de l&#039;Université de Harvard pour créer un site, une base de données de toutes les filles du campus. Il affiche côte à côte deux photos et demande à l&#039;utilisateur de voter pour la plus canon. Il baptise le site Facemash. Le succès est instantané : l&#039;information se diffuse à la vitesse de l&#039;éclair et le site devient viral, détruisant tout le système de Harvard et générant une controverse sur le campus à cause de sa misogynie. Mark est accusé d&#039;avoir violé intentionnellement la sécurité, les droits de reproduction et le respect de la vie privée. C&#039;est pourtant à ce moment qu&#039;est né ce qui deviendra Facebook. Peu après, Mark crée thefacebook.com, qui se répand comme une trainée de poudre d&#039;un écran à l&#039;autre d&#039;abord à Harvard, puis s&#039;ouvre aux principales universités des États-Unis, de l&#039;Ivy League à Silicon Valley, avant de gagner le monde entier...\r\nCette invention révolutionnaire engendre des conflits passionnés. Quels ont été les faits exacts, qui peut réellement revendiquer la paternité du réseau social planétaire ? Ce qui s&#039;est imposé comme l&#039;une des idées phares du XXIe siècle va faire exploser l&#039;amitié de ses pionniers et déclencher des affrontements aux enjeux colossaux...\r\n', 'Jesse Eisenberg, Andrew Garfield, Justin Timberlak', 'TheSocialNetwork.jpg', '120', '2023-04-01', 1),
(2, 'Imitation game', 2014, 'Morten Tyldum', '1940 : Alan Turing, mathématicien, cryptologue, est chargé par le gouvernement Britannique de percer le secret de la célèbre machine de cryptage allemande Enigma, réputée inviolable.', 'Benedict Cumberbatch, Keira Knightley, Mark Strong', 'TheImitationGame.jpg', '114', '2023-04-19', 1),
(3, 'Effacer l’historique', 2020, 'Gustave Kervern, Benoît Delépine', 'Dans un lotissement en province, trois voisins sont en prise avec les nouvelles technologies et les réseaux sociaux. Il y a Marie, victime de chantage avec une sextape, Bertrand, dont la fille est harcelée au lycée, et Christine, chauffeur VTC dépitée de voir que les notes de ses clients refusent de décoller.Ensemble, ils décident de partir en guerre contre les géants d’internet. Une bataille foutue d&#039;avance, quoique...', 'Blanche Gardin, Denis Podalydès, Corinne Masiero', 'EffacerLhistorique.jpg', '106', '2023-04-04', 2),
(4, 'The circle', 2017, 'James Ponsoldt', 'Les Etats-Unis, dans un futur proche. Mae est engagée chez The Circle, le groupe de nouvelles technologies et de médias sociaux le plus puissant au monde. Pour elle, c&#039;est une opportunité en or ! Tandis qu&#039;elle prend de plus en plus de responsabilités, le fondateur de l&#039;entreprise, Eamon Bailey, l&#039;encourage à participer à une expérience révolutionnaire qui bouscule les limites de la vie privée, de l&#039;éthique et des libertés individuelles. Désormais, les choix que fait Mae dans le cadre de cette expérience impactent l&#039;avenir de ses amis, de ses proches et de l&#039;humanité tout entière…', 'Emma Watson, Tom Hanks, John Boyega', 'TheCircle.jpg', '210', '2023-12-04', 3),
(5, 'Snowden', 2016, 'Oliver Stone', 'Patriote idéaliste et enthousiaste, le jeune Edward Snowden semble réaliser son rêve quand il rejoint les équipes de la CIA puis de la NSA. Il découvre alors au cœur des Services de Renseignements américains l’ampleur insoupçonnée de la cyber-surveillance. Violant la Constitution, soutenue par de grandes entreprises, la NSA collecte des montagnes de données et piste toutes les formes de télécommunications à un niveau planétaire.\r\nChoqué par cette intrusion systématique dans nos vies privées, Snowden décide de rassembler des preuves et de tout divulguer. Devenu lanceur d’alerte, il sacrifiera sa liberté et sa vie privée.\r\nEn juin 2013, deux journalistes prennent le risque de le rencontrer dans une chambre d’hôtel à Hong Kong. Une course contre la montre s’engage pour analyser les preuves irréfutables présentées par Snowden avant leur publication.\r\nLes révélations qui vont être faites dans cette pièce seront au cœur du plus grand scandale d’espionnage de l’histoire des États-Unis.\r\n', 'Joseph Gordon-Levitt, Shailene Woodley, Melissa Le', 'Snowden.jpg', '135', '2023-03-26', 3),
(6, 'Firewall', 2006, 'Richard Loncraine', 'Jack Stanfield est l&#039;un des meilleurs experts en sécurité informatique des Etats-Unis. Cadre supérieur d&#039;une grande banque de Seattle, il a mis au point un &quot;pare-feu&quot; ultrasophistiqué, qu&#039;aucun hacker n&#039;a jamais réussi à pénétrer. Depuis plusieurs mois, sa famille est espionnée à son insu par un chef de bande aussi ingénieux que déterminé. L&#039;homme qui se fait appeler Bill Cox connaît tout de Jack, sa femme Beth et leurs deux enfants. Et il est maintenant prêt à récolter le fruit de son labeur.\nA la tête de six hommes armés, le gangster force la porte des Stanfield et prend en otages Beth et les enfants. Pour sauver sa famille d&#039;une mort certaine, Jack va devoir neutraliser son propre firewall, détourner 100 millions de dollars et les virer avant 24 heures sur le compte off-shore de Cox...\n', 'Harrison Ford, Paul Bettany, Virginia Madsen', 'Firewall.jpg', '104', '2023-03-26', 4),
(7, 'Her', 2014, 'Spike Jonze', 'Los Angeles, dans un futur proche. Theodore Twombly, un homme sensible au caractère complexe, est inconsolable suite à une rupture difficile. Il fait alors l&#039;acquisition d&#039;un programme informatique ultramoderne, capable de s&#039;adapter à la personnalité de chaque utilisateur. En lançant le système, il fait la connaissance de &#039;Samantha&#039;, une voix féminine intelligente, intuitive et étonnamment drôle. Les besoins et les désirs de Samantha grandissent et évoluent, tout comme ceux de Theodore, et peu à peu, ils tombent amoureux…', 'Joaquin Phoenix, Scarlett Johansson, Amy Adams', 'Her.jpg', '126', '2023-04-06', 5),
(8, 'Hacker', 2015, 'Michael Mann', 'À Hong Kong, la centrale nucléaire de Chai Wan a été hackée. Un logiciel malveillant, sous la forme d’un outil d’administration à distance ou RAT (Remote Access Tool), a ouvert la porte à un autre malware plus puissant qui a détruit le système de refroidissement de la centrale, provoquant la fissure d’un caisson de confinement et la fusion de son coeur. Aucune tentative d’extorsion de fonds ou de revendication politique n’a été faite. Ce qui a motivé cet acte criminel reste un mystère. \r\nUn groupe de hauts gradés de l’APL (Armée populaire de libération chinoise) charge le capitaine Dawai Chen, spécialiste de la défense contre les cyberattaques, de retrouver et de neutraliser l’auteur de ce crime. \r\nÀ Chicago, le Mercantile Trade Exchange (CME) est hacké, provoquant l’inflation soudaine des prix du soja. \r\nCarol Barrett, une agente chevronnée du FBI, encourage ses supérieurs à associer leurs efforts à ceux de la Chine. Mais le capitaine Chen est loin de l’idée qu’elle s’en était faite. Formé au MIT, avec une parfaite maîtrise de l’anglais, l’officier chinois insiste pour que ses homologues américains libèrent sur le champ un célèbre hacker détenu en prison : Nicholas Hathaway.\r\n', 'Chris Hemsworth, Tang Wei, Leehom Wang', 'hacker.jpg', '133', '0000-00-00', 3),
(10, 'Jobs', 2013, 'Joshua Michael Stern', 'Partout sur la Terre, Steve Jobs est célébré comme un créateur de génie dont les inventions ont révolutionné notre façon de vivre et de percevoir notre monde. Il est aussi connu comme l’un des chefs d’entreprise les plus charismatiques et les plus inspirants qui soient.\r\nMais qui connaît l’homme derrière l’icône ? Qui sait quel parcours humain se cache derrière la destinée de ce visionnaire d’exception ? De l’abandon de ses études universitaires au formidable succès de sa société, voici l’incroyable ascension de Steve Jobs, co-créateur d’Apple Inc., l&#039;un des entrepreneurs les plus créatifs et respectés du XXIe siècle.\r\n', 'Ashton Kutcher, Dermot Mulroney, Josh Gad', 'Jobs.jpg', '133', '2023-04-13', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `IdRating` int(11) NOT NULL,
  `DateAdded` date NOT NULL,
  `Rating` int(11) NOT NULL,
  `IdMovie` int(11) NOT NULL,
  `Pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`IdRating`, `DateAdded`, `Rating`, `IdMovie`, `Pseudo`) VALUES
(1, '2023-04-21', 5, 4, 'Delph'),
(2, '2023-04-21', 2, 10, 'Delph'),
(3, '2023-04-21', 4, 7, 'Delph'),
(4, '2023-04-21', 1, 1, 'Delph'),
(5, '2023-04-21', 3, 4, 'Jeannot'),
(6, '2023-04-21', 5, 2, 'Jeannot'),
(7, '2023-04-21', 5, 10, 'Jeannot'),
(8, '2023-04-21', 5, 1, 'Jeannot'),
(9, '2023-04-21', 4, 6, 'Jeannot'),
(10, '2023-04-21', 5, 3, 'Delph');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Pseudo` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Pseudo`, `Email`, `Password`, `Name`, `Firstname`, `Role`) VALUES
('Admin', 'AdminKercode@live.fr', '$2y$10$BJujXldZ6X3IjTDfGldfVOo8kT/IGcbaWdVq9BSr76A8PhCeQRJJi', 'Kercode', 'Admin', 1),
('Delph', 'delphinesanchezp@live.fr', '$2y$10$ab.N66X934EAWLzetiwZo.UsYpjIeJiNOd/AR1Z8FRaywhKEly4wO', 'Sanchez', 'Delphine', 0),
('Jeannot', 'jeannot@live.fr', '$2y$10$7lyIGFtDbwRZ9URM/tm4ru9UM0PlNI5FJGBEbQyCwZDAc3.GlE/tW', 'Le Bon', 'Jean', 0),
('Jeff', 'jeanfrancois.lebrun@live.fr', '$2y$10$aROjTVNZNx7G4UYjCpoV1e3EsVpGvN3pn8Bwdh/gFqhCVcWEIObzm', 'Le Brun', 'Jean-François', 0),
('Polo', 'paul.robert@outlook.fr', '$2y$10$h21NC9ohvXU6bCTOAs5wOusXLsmUiPCb1B2tzbQC13wRyiW/Fik0.', 'Robert', 'Paul', 0),
('Valérie du 35', 'valeriedu35@hotmail.fr', '$2y$10$x0BlKvQabS45vEwoLcukyOpgNYn593NIJhQNM8sLiR5Cu1OTJLUzK', 'Robert', 'Valérie', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`IdComment`),
  ADD KEY `IdMovie` (`IdMovie`),
  ADD KEY `Pseudo` (`Pseudo`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`IdGenre`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`IdMovie`),
  ADD KEY `IdGenre` (`IdGenre`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`IdRating`),
  ADD KEY `IdMovie` (`IdMovie`),
  ADD KEY `Pseudo` (`Pseudo`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `IdComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `IdGenre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `IdMovie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `IdRating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`IdMovie`) REFERENCES `movies` (`IdMovie`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`Pseudo`) REFERENCES `users` (`Pseudo`);

--
-- Contraintes pour la table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`IdGenre`) REFERENCES `genres` (`IdGenre`);

--
-- Contraintes pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`IdMovie`) REFERENCES `movies` (`IdMovie`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`Pseudo`) REFERENCES `users` (`Pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
