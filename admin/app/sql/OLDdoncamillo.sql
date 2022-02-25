-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 16 fév. 2022 à 14:16
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
-- Base de données : `doncamillo`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `tags` text,
  `cover_image` varchar(255) NOT NULL,
  `date_publication` varchar(50) NOT NULL,
  `intro_text` text NOT NULL,
  `body_texts` text,
  `body_titles` text,
  `body_images` text,
  `body_galeries` text,
  `body_cta` text,
  `body_links` text,
  `body_videos` text,
  `body_pdf` text,
  `body_html_element` text,
  `lectures` int(11) DEFAULT '0',
  `auteur` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `is_active` tinyint(4) DEFAULT '0',
  `featured` tinyint(4) DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `id_categorie`, `title`, `tags`, `cover_image`, `date_publication`, `intro_text`, `body_texts`, `body_titles`, `body_images`, `body_galeries`, `body_cta`, `body_links`, `body_videos`, `body_pdf`, `body_html_element`, `lectures`, `auteur`, `id_user`, `is_active`, `featured`, `slug`) VALUES
(17, 6, 'sunt in culpa qui officia deserunt mollit', 'a:2:{i:0;i:11;i:1;i:12;}', 'uploads/photos/covers/cover_image_7Cnv4b.jpg', '23-02-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:2:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:3:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";i:7;s:46:\"Excepteur sint occaecat cupidatat non proident\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_JDQia1.jpg\";}', 'a:1:{i:11;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_JQIlJb.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_MKXf8j.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_GU9kK4.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_2Uy1Ao.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_zDdZG7.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_WV6P5k.jpg\";}}', 'a:1:{i:6;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_0Jd8Fu.jpg\";}}', 'N;', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:9;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_JarcVO.pdf\";}}', 'a:1:{i:10;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', 59, 'Benjamin Tronchet', 1, 1, 1, 'sunt-in-culpa-qui-officia-deserunt-mollit'),
(18, 5, 'Lorem ipsum dolor sit amet, consectetur adipisci', 'a:3:{i:0;i:4;i:1;i:6;i:2;i:11;}', 'uploads/photos/covers/cover_image_Ki83ox.jpg', '25-02-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:2:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:3:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";i:7;s:46:\"Excepteur sint occaecat cupidatat non proident\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_stgdea.jpg\";}', 'a:1:{i:11;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_zHONKn.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_Ia2axo.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_lpPVIz.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_DYk3Sa.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_FfnzBO.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_YnP4Oa.jpg\";}}', 'a:1:{i:6;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_YS4rwB.jpg\";}}', 'N;', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:9;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_9daeiO.pdf\";}}', 'a:1:{i:10;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', NULL, 'Benjamin Tronchet', 1, 1, NULL, 'lorem-ipsum-dolor-sit-amet-consectetur-adipisci'),
(19, 4, 'incididunt ut labore et dolore magna aliqua', 'a:3:{i:0;i:11;i:1;i:12;i:2;i:13;}', 'uploads/photos/covers/cover_image_7zl36C.jpg', '01-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:1:{i:2;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:1:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_oBHiHb.jpg\";}', 'a:1:{i:5;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_3mWIAY.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_Ina5QG.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_91eQ7z.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_vSErMa.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_oecF1A.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_FYwJHJ.jpg\";}}', 'a:1:{i:7;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_ONgzLC.jpg\";}}', 'a:1:{i:4;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:9;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_3D9CEb.pdf\";}}', 'a:1:{i:6;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', NULL, 'Benjamin Tronchet', 1, 1, 1, 'incididunt-ut-labore-et-dolore-magna-aliqua'),
(20, 6, 'Ut enim ad minim veniam, quis nostrud exercit', 'a:3:{i:0;i:4;i:1;i:11;i:2;i:13;}', 'uploads/photos/covers/cover_image_YHzsfv.jpg', '03-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:2:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:1:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_srdyy6.jpg\";}', 'a:1:{i:10;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_anxDs3.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_1FEjLP.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_khKVls.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_sqy6Mw.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_9I1RMe.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_M6iuff.jpg\";}}', 'a:1:{i:4;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_ErxLMw.jpg\";}}', 'a:1:{i:9;a:2:{s:5:\"label\";s:19:\"Visitez Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:6;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:7;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_yggrK2.pdf\";}}', 'a:1:{i:8;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', NULL, 'Benjamin Tronchet', 1, 1, NULL, 'ut-enim-ad-minim-veniam-quis-nostrud-exercit'),
(21, 5, 'ullamco laboris nisi ut aliquip ex ea commodo consec', 'a:4:{i:0;i:4;i:1;i:5;i:2;i:11;i:3;i:12;}', 'uploads/photos/covers/cover_image_QUzuV4.jpg', '11-02-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:2:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:6;s:896:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:2:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_T6hBut.jpg\";}', 'a:1:{i:11;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_AMqCuM.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_xQsEXK.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_wk26JT.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_AGBCzz.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_hKE0M7.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_XNHK70.jpg\";}}', 'a:1:{i:7;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_PBx5cl.jpg\";}}', 'a:1:{i:5;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:9;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_EkFbif.pdf\";}}', 'a:1:{i:10;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', NULL, 'Benjamin Tronchet', 1, 1, NULL, 'ullamco-laboris-nisi-ut-aliquip-ex-ea-commodo-consec'),
(22, 4, 'consectetur adipiscing elit, sed do eiusmod tempor', 'a:3:{i:0;i:7;i:1;i:6;i:2;i:8;}', 'uploads/photos/covers/cover_image_3igLHP.jpg', '10-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:2:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:1:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_pemivR.jpg\";}', 'a:1:{i:7;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_MxCDCu.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_S5rhN4.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_JtR2c3.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_jXmA7n.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_0lKN9f.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_DFcSAY.jpg\";}}', 'a:1:{i:6;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_zeabyN.jpg\";}}', 'a:1:{i:4;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:9;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_BBHELV.pdf\";}}', 'a:1:{i:10;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', NULL, 'Benjamin Tronchet', 1, 1, NULL, 'consectetur-adipiscing-elit-sed-do-eiusmod-tempor'),
(23, 4, 'Sed ut perspiciatis unde omnis iste natus error', 'a:3:{i:0;i:7;i:1;i:11;i:2;i:6;}', 'uploads/photos/covers/cover_image_XjsQA6.jpg', '11-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:3:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:11;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:4:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";i:7;s:46:\"Excepteur sint occaecat cupidatat non proident\";i:10;s:46:\"Excepteur sint occaecat cupidatat non proident\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_6IBnEm.jpg\";}', 'a:1:{i:14;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_JMKwv6.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_BcKU0M.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_Aeo5M0.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_MN6u3F.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_U5QUUR.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_qJVsVg.jpg\";}}', 'a:1:{i:9;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_phxw95.jpg\";}}', 'a:1:{i:6;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:12;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_r4QNWr.pdf\";}}', 'a:1:{i:13;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', 2, 'Benjamin Tronchet', 1, 1, 1, 'sed-ut-perspiciatis-unde-omnis-iste-natus-error'),
(24, 5, 'labore et dolore magna aliqua', 'a:4:{i:0;i:7;i:1;i:12;i:2;i:13;i:3;i:6;}', 'uploads/photos/covers/cover_image_ap9mIT.jpg', '07-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:3:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:10;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:3:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";i:9;s:46:\"Excepteur sint occaecat cupidatat non proident\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_g2uzuq.jpg\";}', 'a:1:{i:13;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_c4DTmU.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_kSwI0g.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_Yu1uKf.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_9YLcjK.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_YqAG9f.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_KIlW6a.jpg\";}}', 'a:1:{i:8;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_uaYgc2.jpg\";}}', 'a:1:{i:6;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:7;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:11;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_jqbONL.pdf\";}}', 'a:1:{i:12;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', 7, 'Benjamin Tronchet', 1, 1, 1, 'labore-et-dolore-magna-aliqua'),
(25, 6, 'esse cillum dolore eu fugiat nulla pariatur', 'a:3:{i:0;i:7;i:1;i:8;i:2;i:4;}', 'uploads/photos/covers/cover_image_IBsd6r.jpg', '15-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:3:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:11;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:4:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";i:7;s:46:\"Excepteur sint occaecat cupidatat non proident\";i:10;s:46:\"Excepteur sint occaecat cupidatat non proident\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_sBxNPG.jpg\";}', 'a:1:{i:14;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_Pismib.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_AEV0Oq.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_bcCiye.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_gcO3KH.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_G7682e.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_w0kOiE.jpg\";}}', 'a:1:{i:9;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_U0YJGP.jpg\";}}', 'a:1:{i:6;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:12;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_RgeLf9.pdf\";}}', 'a:1:{i:13;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', 48, 'Benjamin Tronchet', 1, 1, 1, 'esse-cillum-dolore-eu-fugiat-nulla-pariatur');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `name`, `slug`) VALUES
(4, 'Catégorie1', 'categorie1'),
(5, 'Catégorie2', 'categorie2'),
(6, 'Catégorie3', 'categorie3');

-- --------------------------------------------------------

--
-- Structure de la table `categories_menu`
--

DROP TABLE IF EXISTS `categories_menu`;
CREATE TABLE IF NOT EXISTS `categories_menu` (
  `id_categorie_menu` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `plats` text CHARACTER SET utf8,
  `sous_categories` text CHARACTER SET utf8,
  `is_sous_categorie` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_categorie_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories_menu`
--

INSERT INTO `categories_menu` (`id_categorie_menu`, `name`, `plats`, `sous_categories`, `is_sous_categorie`) VALUES
(3, 'Catégorie menu 3 - avec une sous-catégorie', 'a:1:{i:1;s:1:\"3\";}', 'a:2:{i:2;s:1:\"2\";i:3;s:2:\"10\";}', NULL),
(4, 'Catégorie menu 4', 'N;', NULL, 0),
(10, 'Catégorie menu 6 - sous-catégorie', 'a:3:{i:1;s:1:\"3\";i:2;s:1:\"1\";i:3;s:1:\"3\";}', NULL, 1),
(22, 'Menu Presto', 'N;', 'N;', NULL),
(23, 'Antipasti', 'N;', 'N;', NULL),
(24, 'Insalate', 'N;', 'N;', NULL),
(25, 'Pasta ou gnocchi', 'N;', 'N;', NULL),
(26, 'Secondi piatti', 'a:2:{i:1;s:1:\"6\";i:2;s:1:\"7\";}', 'N;', NULL),
(27, 'Nos coupes glacées', 'a:2:{i:1;s:1:\"8\";i:2;s:1:\"9\";}', 'N;', 1),
(28, 'Desserts', 'N;', 'a:1:{i:1;s:2:\"27\";}', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_publication` varchar(60) NOT NULL,
  `content` mediumtext NOT NULL,
  `id_article` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `name`, `email`, `date_publication`, `content`, `id_article`, `is_active`) VALUES
(3, 'Tronchet Benjamin', 'benjamin@melting-k.fr', '16-03-2021', 'Test de commentaire sur un article.', 25, 1),
(7, 'Benjamin Melting K', 'galinier@melting-k.fr', '17-03-2021', 'Test de commentaire n°2', 25, 1);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `categories_menu` text CHARACTER SET utf8,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `categories_menu`) VALUES
(1, 'a:5:{i:1;s:2:\"22\";i:2;s:2:\"23\";i:3;s:2:\"24\";i:4;s:2:\"28\";i:5;s:2:\"26\";}');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `url_admin` varchar(255) NOT NULL,
  `srcimg` varchar(50) NOT NULL,
  `colorimg` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`id`, `name`, `email`, `domain`, `url`, `url_admin`, `srcimg`, `colorimg`) VALUES
(1, 'Le Don Camillo', 'direction-pamiers@doncamillo-restaurants.fr', 'doncamillo-restaurants.fr', 'http://www.doncamillo-restaurants.fr', 'http://www.doncamillo-restaurants.fr/admin-mag', 'img/logo.png', '#FFFFFF');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

DROP TABLE IF EXISTS `plats`;
CREATE TABLE IF NOT EXISTS `plats` (
  `id_plat` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8 NOT NULL,
  `descriptif` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`id_plat`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id_plat`, `title`, `descriptif`, `price`) VALUES
(1, 'Plat 2', 'description plat 2', '22.5'),
(3, 'Plat 1', 'description plat 1', '24'),
(4, 'Plat 3', 'description plat 3', '16'),
(5, 'Plat 4', 'description plat 4', '18'),
(6, 'Magret de canard entier', '(350gr hors cuisson)', '21'),
(7, 'Burger Don K', 'Pain maison, sauce burger, oignons confits, steak haché (250gr), bethmale, poitrine de porc', '16'),
(8, 'Dame Blanche', '(3 boules vanille, chocolat chaud, chantilly, biscuit)', '7'),
(9, 'Café liégeois', '(Glace café, glace vanille, expresso, chantilly, biscuit)', '7');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id_tag`, `slug`, `name`) VALUES
(4, 'tag1', 'tag1'),
(5, 'tag2', 'tag2'),
(6, 'tag3', 'tag3'),
(7, 'tag4', 'tag4'),
(8, 'tag5', 'tag5'),
(11, 'tag6', 'tag6'),
(12, 'tag7', 'tag7'),
(13, 'tag8', 'tag8');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `lastname`, `firstname`, `role`, `email`, `password`) VALUES
(1, 'Tronchet', 'Benjamin', 0, 'benjamin@melting-k.fr', '$2y$10$UIi8cRfydQ9oOPDLfZ1DnuM02VJGhMpLYy9svrjkB3VD01iDThaEK'),
(2, 'Galinier', 'Romain', 1, 'galinier@melting-k.fr', '$2y$10$jY4ESN.WzgV9agjbF5lwdemIcpS4IbX9NiJVCOtC4tOXsBLTSFzmO'),
(3, 'Nom client', 'Prénom client', 0, 'direction-pamiers@doncamillo-restaurants.fr', '$2y$10$u34LcTFfZALW9Alaie4a4evUghT1IYEnVPalaBylHMn9Neb9NguOO');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `Categorie used in article` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
