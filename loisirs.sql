-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 28 Janvier 2018 à 12:21
-- Version du serveur :  5.5.58-0+deb8u1
-- Version de PHP :  5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `loisirs`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_comment`
--

CREATE TABLE IF NOT EXISTS `t_comment` (
`com_id` int(11) NOT NULL,
  `com_author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `art_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `signale` int(11) NOT NULL,
  `note` varchar(101) COLLATE utf8_unicode_ci NOT NULL DEFAULT '8'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `t_comment`
--

INSERT INTO `t_comment` (`com_id`, `com_author`, `com_content`, `art_id`, `usr_id`, `signale`, `note`) VALUES
(17, '', 'ok', 11, 1, 9, '8'),
(18, '', 'ok', 10, 1, 13, '8'),
(19, '', 'ok pp', 10, 1, 8, '8'),
(20, '', 'oooo', 10, 1, 8, '8'),
(21, '', '<script>alert("Hello! I am an alert box!!");</script>', 10, 1, 11, '8'),
(22, '', 'essai mise en ligne', 3, 1, 3, '8'),
(23, '', 'ok', 5, 1, 3, '8'),
(25, '', 'Portable', 13, 1, 3, '8'),
(26, '', 'ok', 8, 1, 3, '8'),
(27, '', 'Test', 13, 1, 3, '8'),
(28, '', 'ok', 9, 1, 2, '8'),
(29, '', '', 13, 1, 0, '0.3'),
(30, '', 'ok', 13, 1, 1, '4'),
(31, '', 'ok', 13, 1, 1, '4'),
(32, '', 'ok', 13, 1, 1, '9'),
(33, '', 'ok', 13, 1, 1, '9'),
(34, '', 'lieu sympas', 12, 1, 1, '7'),
(35, '', 'ok', 13, 1, 1, '10'),
(36, '', 'ok', 13, 1, 1, '10'),
(37, '', 'ok', 13, 1, 1, '10'),
(38, '', 'ok', 13, 1, 1, '0'),
(39, '', 'cool', 12, 1, 1, '10');

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

CREATE TABLE IF NOT EXISTS `t_loisirs` (
`art_id` int(11) NOT NULL,
  `art_title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `art_content` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `art_position` varchar(142) COLLATE utf8_unicode_ci NOT NULL,
  `art_image` mediumtext COLLATE utf8_unicode_ci COMMENT 'null',
  `prix` int(11) NOT NULL DEFAULT '0',
  `type` varchar(2100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'parc',
  `note` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '8',
  `etat` int(11) NOT NULL DEFAULT '0',
  `lien` varchar(2100) COLLATE utf8_unicode_ci NOT NULL,
  `position_LAT` varchar(101) COLLATE utf8_unicode_ci NOT NULL,
  `position_LNG` varchar(101) COLLATE utf8_unicode_ci NOT NULL,
  `date_debut` varchar(2100) COLLATE utf8_unicode_ci NOT NULL,
  `date_fin` varchar(2100) COLLATE utf8_unicode_ci NOT NULL,
  `distance` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `t_loisirs`
--

INSERT INTO `t_loisirs` (`art_id`, `art_title`, `art_content`, `art_position`, `art_image`, `prix`, `type`, `note`, `etat`, `lien`, `position_LAT`, `position_LNG`, `date_debut`, `date_fin`, `distance`) VALUES
(1, 'Royal kids parc jeux d''intérieur', 'Pour les enfants de 1 à 12 ans avec plus de\r\n1 000 m² climatisé en été et chauffé en hiver.\r\n\r\nQuel que soit le temps, les enfants pourront s''amuser en toute sécurité à l''intérieur de ce royaume pour enfants !\r\n\r\nDe nombreuses activités les attendent : trampolines, tyroliennes, toboggans, piscines à balles, légos géants ainsi que des motos électriques et bien d''autres jeux avec lesquels ils passeront du bon temps !\r\n\r\nPendant ce temps, les parents peuvent se restaurer, boire un café, consulter la lecture mise à disposition ou Internet sur le réseau WiFi gratuit.\r\n\r\n13 parcs en Ile-de-France : Roissy en Brie (77), Lagny sur Marne (77), Elancourt (78),  Maurepas (78), CHilly Mazarin (91), Lisses (91), Bonneuil-sur-Marne (94), Beauchamp (95), St Brice sous forêt (95), Bezons (95), Roissy en France - Paris Nord 2 (95), Eragny (95), Saint Maximin (60).', 'Paris Nord 2 Gestion, Avenue des Nations, Villepinte, France', 'de881da3d33e5e59d27c59b40c220667royal-kids.jpg', 9, '1', '8', 1, 'https://www.royalkids.fr/', '48.974463', '2.514442000000031', '1514751140', '1924978340', 0),
(3, 'Buttes chaumont', 'En matière d’espaces verts et de panoramas, on trouve difficilement mieux que cet immense parc napoléonien, perché sur les hauteurs du nord parisien. Après avoir dévoré la skyline entre deux bouchées de sauciflard, l’orteil du voisin de pelouse trempé dans le verre d’apéro, direction le Rosa Bonheur pour un pichet de rouge au goût de guinguette bobo..\r\n\r\nidéal pour :\r\n• Courir ou pédaler le long des allées\r\n\r\n• Pique-niquer avec vue plongeante sur l''étang et le 19e arrondissement\r\n\r\n• Flâner, bouquiner, nourrir les canards\r\n\r\n• Trinquer au Rosa Bonheur façon bohême', 'Butte Chaumont, Champlan, France', 'bb969afc488bfdfc1f656fc8ab10143ebuttes-chaumont-898675_640.jpg', 0, '0', '8', 1, 'http://google.fr', '48.88094', '2.3827609', '1514751140', '1924978340', 0),
(4, 'Parc bagatelle', 'Non content de renfermer 10 000 rosiers, ce jardin botanique truffé de charme, situé en plein bois de Boulogne, recèle aussi un château, une orangerie, un potager, un étang et une armée de cygnes et de paons. Dépaysement assuré...\r\n\r\nLe spot idéal pour :\r\n\r\n• Se promener parmi les rosiers aux mille noms et aux mille couleurs\r\n\r\n• Voir les paons se pavaner sur les pelouses et les cygnes faire les paons près des cascades artificielles\r\n\r\n• Se perdre dans les labyrinthes d''arbres et de statues\r\n\r\n• S''affaler dans l''herbe à l''ombre des bourgeons', 'Parc de Bagatelle, Route de Sèvres À Neuilly, Paris, France', '16537016903accb2adbccb757d206d831200px-Paris_Bagatelle_Roseraie.jpg', 0, '0', '8', 1, 'http://google.fr', '48.86892', '2.2458381', '1514751140', '1924978340', 0),
(5, 'Jardin dacclimatation', 'L''occasion de s''exercer en pilotage de bateau télécommandé avant de faire un tour à la fête foraine avec les marmots. Toutes les joies du parc d’attractions (ou presque) sont réunies dans le cadre verdoyant du Jardin d’acclimatation, en plein bois de Boulogne. Entre sortie ludique et promenade en famille : un excellent compromis...\r\n\r\nLe spot idéal pour :\r\n\r\n• Se détendre avec les petits à la fermette, parmi les animaux\r\n\r\n• Noyer ses crocs dans une barbe à papa\r\n\r\n• Faire des tours de manège tout en mâchant un peu d''air frais', 'Jardin d''Acclimatation, Paris, France', '3ee75baa19faa415e0577d098a7efc4fflowers-2949742_640.jpg', 0, '0', '8', 1, 'http://google.fr', '48.87784', '2.2606252', '1514751140', '1924978340', 0),
(6, 'Parc André Citroên', 'Délirante, pantagruélique, cette version postmoderne d’un jardin à la française a été conçue par Gilles Clément et Alain Prévost. Inauguré en 1992, ce parc du sud parisien s’étend sur 14 hectares le long de l’ancien site des usines automobiles Citroën...\r\n\r\nLe spot idéal pour :\r\n\r\n• Taquiner son ballon ou son frisby sur les immenses étendues de pelouses\r\n\r\n• Grimper à bord de la montgolfière Eutelsat pour se payer une vue panoramique\r\n\r\n• Courir après ses marmots dans les grands jets d''eau pour échapper à une éventuelle canicule !', 'Parc André Citroën, Rue Cauchy, Paris, France', '8d5353740c858fb6ea98db4f6ceeba747182068164_537900a521_b.jpg', 0, '0', '8', 1, 'http://google.fr', '48.84112', '2.2722549', '1514751140', '1924978340', 0),
(7, 'Parc Monceau', 'Entouré d’appartements haussmanniens, le parc Monceau est une destination prisée des enfants BCBG du quartier, qui viennent s''y promener avec leur nounou. Jardin à la française, il renferme toutes sortes d’édifices loufoques : de la pyramide égyptienne au pont vénitien en passant par le moulin hollandais...\r\n\r\nLe spot idéal pour :\r\n\r\n• Fuir la rigidité des parcs napoléoniens en se perdant parmi les plantes touffues de ce parc éclectique\r\n\r\n• S''affaler dans les pelouses pour écouter le chant des oiseaux\r\n\r\n• Faire un pique-nique loin de la cohue des Buttes Chaumont', 'Parc Monceau, Boulevard de Courcelles, Paris, France', 'b2405926a12634ee0b143ee12820c64dParc_Monceau_20060812_40.jpg', 0, '0', '8', 1, 'http://google.fr', '48.87968', '2.3067663', '1514751140', '1924978340', 0),
(8, 'Jardin des Plantes', 'Bouffée d''air botanique : ce parc de la rive gauche, créé par Louis XIII sur le flanc de la Seine, regorge de spécimens rares, d’arômes enivrants, de couleurs électriques. On traverse sa grille pour échapper à la cohue des quais et se lancer dans un labyrinthe de fleurs...\r\n\r\n\r\nLe spot idéal pour :\r\n\r\n• Flâner au gré des 10 000 espèces de plantes et de fleurs\r\n\r\n• Promener les marmots sous le soleil avant de leur montrer les animaux de la Ménagerie ou les espèces éteintes de la Grande galerie de l''Evolution\r\n\r\n• Se bécoter sur un banc à l''ombre des rosiers', 'Jardin des Plantes, Paris, France', 'd56b444f555762c42424614bf30b897fAllée_de_roses_Jardin_des_Plantes.JPG', 0, '0', '8', 1, 'http://google.fr', '48.84398', '2.3555391', '1514751140', '1924978340', 0),
(9, 'Jardin du Luxembourg', 'Idéal pour un footing bénéfique ou une flânerie entre terrasses néoclassiques et jardins anglais, l’immense parc de la rive gauche est aussi le repère des indétrônables joueurs d’échecs et de tarot du quartier. L''occasion de soutirer quelque tactique de jeu auprès d''un habitué des lieux ?\r\n\r\nLe spot idéal pour :\r\n\r\n• Se bronzer sans se salir les fesses (chaises en fer obligent)\r\n\r\n• Jouer au tennis ou s''offrir un cour particulier de taï-chi\r\n\r\n• Observer les joueurs d''échecs et de tarot\r\n\r\n• Faire flotter son mini-voilier ou son bateau téléguidé dans les bassins', 'Jardin du Luxembourg, Paris, France', '36805884bee973d660842898f0fd2ecfjardin-du-luxembourg-96401_640.jpg', 0, '0', '8', 1, 'http://google.fr', '48.84622', '2.3349718', '1514751140', '1924978340', 0),
(10, 'Parc de la Villette', 'Le plus grand parc de Paris, et l''un des rares à rester ouvert toute la nuit. Un lieu de passage, de repos et de loisirs, dénué de cloisons...\r\n\r\nLe spot idéal pour :\r\n\r\n• Faire du vélo, du roller ou du jogging\r\n\r\n• Jouer au foot sur les immenses pelouses\r\n\r\n• Reposer ses méninges après une visite à la Cité des sciences ou de la musique\r\n\r\n• Pique-niquer avant un spectacle sous la Grande Halle ou au Zénith', 'Parc de la Villette, Avenue Jean Jaurès, Paris, France', '8a88f58b34862660dfd8cec7d33732385478417071_68574f6595_b.jpg', 0, '0', '8', 1, 'http://google.fr', '48.89385', '2.3880713', '1514751140', '1924978340', 0),
(11, 'Coulée verte', 'Rien de tel pour se la couler douce que la Coulée verte (ou « Promenade plantée »). Départ en haut du viaduc de l’avenue Daumesnil pour une balade le long des anciennes voies ferrées du métro aérien Bastille-Vincennes, dont les 5 km regorgent aujourd''hui de verdure. C’est luxuriant de Bastille jusqu’au périph'' de Montempoivre...\r\n\r\nLe spot idéal pour :\r\n\r\n• Se promener en prenant de la hauteur (et en épiant les intérieurs d''apparts haussmanniens)\r\n\r\n• Prendre un bain de soleil au parc de Reuilly\r\n\r\n• Faire du vélo ou du roller le long des voies cyclables qui coulent sous les anciens tunnels de la ligne "V"', 'Parc de la Coulée Verte, Rue Marceau, Paray-Vieille-Poste, France', '1c0c354a5a68fc5ce3cc2368cf436ab5La_coulée_verte_-_parc.JPG', 0, '0', '8', 1, 'http://google.fr', '48.84938', '2.3692773', '1514751140', '1924978340', 0),
(12, 'Parc de Belleville', 'Un coup d’œil à ces pelouses un brin escarpées qui plongent vers la skyline suffit pour se convaincre que le parc de Belleville domine l’une des vues les plus spectaculaires de Paris. Un panorama qu’il fait bon détailler au coucher du soleil, du haut du belvédère, autour d''un apéro ou au détour d’une flânerie...\r\n\r\nLe spot idéal pour :\r\n\r\n• Se délecter d''une des plus belles vues de Paris\r\n\r\n• Siroter un verre sur les pelouses ou au bar du coin, La Mer à boire\r\n\r\n• S''affaler dans l''herbe avec ses puces pour profiter de la connexion wi-fi gratuite\r\n\r\n• S''offrir un concert ou spectacle en plein air dans les arènes', 'Parc de Belleville, Rue des Couronnes, Paris, France', '610e3fc106047dafee46bd92f07556a13860657040_6d990d8c32_b.jpg', 0, '0', '8', 1, 'http://google.com', '48.87107', '2.3825164', '1514751140', '1924978340', 0),
(13, 'musée d''histoire naturelle', 'Découvrez des animaux plus vrais que nature.\r\n\r\nLe musée recense plus de 160 000 espèces.\r\n\r\nEn ce moment;\r\nCabinet de Réalité Virtuelle : Voyage au cœur de l''Évolution, Rencontre avec les médiateurs : plongez à la découverte des coraux et plein d''autre chose vous attende..', 'Grande Galerie de l''Évolution, Rue Geoffroy-Saint-Hilaire, Paris, France', '465151ce0f738cbef1386fb2bf3e7b4bdino.jpg', 0, '0', '8', 1, 'https://www.parisinfo.com/musee-monument-paris/83427/Museum-national-d%27Histoire-naturelle-Grande-Galerie-de-l%E2%80%99Evolution', '48.8418666', '2.356379899999979', '1514751140', '1924978340', 0),
(27, 'dsszq', 'qsdfsdfq', 'qsdqsd', 'imageDefault.jpg', 0, '0', '8', 0, 'qsdqs', '48.856614', '2.3522219000000177', '1514751140', '1924978340', 0),
(28, 'dsszqqdsffaaaaaaaaa', 'qsdfsdfqdsfsqfqdf', 'qsdqsdqsfddsfqsd', 'imageDefault.jpg', 0, '0', '8', 0, 'qsdqs', '48.856614', '2.3522219000000177', '1514751140', '1924978340', 0),
(29, 'circuit Carol', 'Le circuit Carole est une piste de moto et au karting.\r\n\r\nPour l''entrainement et  les fans de vitesse.\r\n\r\nSa piste d''une longueur de 2 055 mètres possède une largeur de 9 mètres. Ce circuit est situé à Tremblay-en-France, dans le département de la Seine-Saint-Denis, près de Paris.', 'Circuit Carole, D40, Tremblay-en-France, France', 'a1772ac62e4d2f4c50389d53c06b3acamoto.jpg', 60, '0', '8', 1, 'http://www.circuit-carole.com/', '48.9787026', '2.5225835999999617', '1514751140', '1924978340', 0),
(30, 'Kingooroo', 'Kingooroo est un parc de jeux d’intérieur pour enfant de 2 ans à 12 ans.\r\n\r\nQu''il pleuve ou qu''il neige vos enfants sont a l’abri dans ce parc ou il peuve jouer et ce défouler  comme il veule.', '51 Rue de Presles, Aubervilliers, France', '25413770f74868f82ba6e412c56844e2kingooroo.jpg', 10, '0', '8', 1, 'https://www.kingooroo.fr/', '48.9078293', '2.395213300000023', '1514751140', '1924978340', 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
`usr_id` int(11) NOT NULL,
  `usr_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usr_password` varchar(88) COLLATE utf8_unicode_ci NOT NULL,
  `usr_salt` varchar(23) COLLATE utf8_unicode_ci NOT NULL,
  `usr_role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`usr_id`, `usr_name`, `usr_password`, `usr_salt`, `usr_role`) VALUES
(1, 'user', '$2y$13$F9v8pl5u5WMrCorP9MLyJeyIsOLj.0/xqKd/hqa5440kyeB7FQ8te', 'YcM=A$nsYzkyeDVjEUa7W9K', 'ROLE_ADMIN'),
(3, 'new', '$2y$13$Bj8sv0ywkNrHdL2KlRnsauN2M44JHILI4RVHuueTf4Kggq3o6JBT2', '527aa597341f65a10508650', 'ROLE_USER'),
(4, 'newok', '$2y$13$Z6npJlqakMAAvP2KmZtRxeF76MSvO.7j/C7qcIltE9d8OANV2b1F.', 'a601225984dafa4615b2b97', 'ROLE_ADMIN'),
(5, 'news', '$2y$13$GH.mcsFoJIUUMcZMOJuDiOfEGQ8TrcdhmfWmbKIfCDwTUa5q5twtq', 'ff08a376821447daeee6c70', 'ROLE_USER'),
(7, 'essai', '$2y$13$OCdnggiNUqmzovhzn0VcwOTlQAd2vCT..XvNprbpINTWKLHtDrt36', '6a6655ac1a06db832b65970', 'ROLE_USER'),
(8, 'lamri', '$2y$13$paDWgZIUOk0I3I9l9c3JEOlAubaUDDnSzKUesSSzivoJA4oa1393q', '28d3d55c8a9ee9bf938c0c5', 'ROLE_ADMIN');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_comment`
--
ALTER TABLE `t_comment`
 ADD PRIMARY KEY (`com_id`), ADD KEY `fk_com_art` (`art_id`), ADD KEY `usr_id` (`usr_id`);

--
-- Index pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
 ADD PRIMARY KEY (`art_id`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
 ADD PRIMARY KEY (`usr_id`), ADD UNIQUE KEY `usr_id_3` (`usr_id`), ADD KEY `usr_id` (`usr_id`), ADD KEY `usr_id_2` (`usr_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_comment`
--
ALTER TABLE `t_comment`
MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_comment`
--
ALTER TABLE `t_comment`
ADD CONSTRAINT `fk_com_art` FOREIGN KEY (`art_id`) REFERENCES `t_loisirs` (`art_id`),
ADD CONSTRAINT `fk_com_usr` FOREIGN KEY (`usr_id`) REFERENCES `t_user` (`usr_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
