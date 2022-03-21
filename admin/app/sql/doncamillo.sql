-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 14, 2022 at 04:18 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `doncamillo_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL,
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
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id_article`, `id_categorie`, `title`, `tags`, `cover_image`, `date_publication`, `intro_text`, `body_texts`, `body_titles`, `body_images`, `body_galeries`, `body_cta`, `body_links`, `body_videos`, `body_pdf`, `body_html_element`, `lectures`, `auteur`, `id_user`, `is_active`, `featured`, `slug`) VALUES
(17, 6, 'sunt in culpa qui officia deserunt mollit', 'a:2:{i:0;i:11;i:1;i:12;}', 'uploads/photos/covers/cover_image_7Cnv4b.jpg', '23-02-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:2:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:3:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";i:7;s:46:\"Excepteur sint occaecat cupidatat non proident\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_JDQia1.jpg\";}', 'a:1:{i:11;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_JQIlJb.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_MKXf8j.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_GU9kK4.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_2Uy1Ao.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_zDdZG7.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_WV6P5k.jpg\";}}', 'a:1:{i:6;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_0Jd8Fu.jpg\";}}', 'N;', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:9;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_JarcVO.pdf\";}}', 'a:1:{i:10;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', 59, 'Benjamin Tronchet', 1, 1, 1, 'sunt-in-culpa-qui-officia-deserunt-mollit'),
(18, 5, 'Lorem ipsum dolor sit amet, consectetur adipisci', 'a:3:{i:0;i:4;i:1;i:6;i:2;i:11;}', 'uploads/photos/covers/cover_image_Ki83ox.jpg', '25-02-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:2:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:3:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";i:7;s:46:\"Excepteur sint occaecat cupidatat non proident\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_stgdea.jpg\";}', 'a:1:{i:11;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_zHONKn.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_Ia2axo.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_lpPVIz.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_DYk3Sa.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_FfnzBO.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_YnP4Oa.jpg\";}}', 'a:1:{i:6;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_YS4rwB.jpg\";}}', 'N;', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:9;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_9daeiO.pdf\";}}', 'a:1:{i:10;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', NULL, 'Benjamin Tronchet', 1, 1, NULL, 'lorem-ipsum-dolor-sit-amet-consectetur-adipisci'),
(19, 4, 'incididunt ut labore et dolore magna aliqua', 'a:3:{i:0;i:11;i:1;i:12;i:2;i:13;}', 'uploads/photos/covers/cover_image_7zl36C.jpg', '01-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:1:{i:2;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:1:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_oBHiHb.jpg\";}', 'a:1:{i:5;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_3mWIAY.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_Ina5QG.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_91eQ7z.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_vSErMa.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_oecF1A.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_FYwJHJ.jpg\";}}', 'a:1:{i:7;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_ONgzLC.jpg\";}}', 'a:1:{i:4;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:9;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_3D9CEb.pdf\";}}', 'a:1:{i:6;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', NULL, 'Benjamin Tronchet', 1, 1, 1, 'incididunt-ut-labore-et-dolore-magna-aliqua'),
(20, 6, 'Ut enim ad minim veniam, quis nostrud exercit', 'a:3:{i:0;i:4;i:1;i:11;i:2;i:13;}', 'uploads/photos/covers/cover_image_YHzsfv.jpg', '03-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:2:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:1:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_srdyy6.jpg\";}', 'a:1:{i:10;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_anxDs3.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_1FEjLP.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_khKVls.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_sqy6Mw.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_9I1RMe.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_M6iuff.jpg\";}}', 'a:1:{i:4;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_ErxLMw.jpg\";}}', 'a:1:{i:9;a:2:{s:5:\"label\";s:19:\"Visitez Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:6;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:7;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_yggrK2.pdf\";}}', 'a:1:{i:8;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', NULL, 'Benjamin Tronchet', 1, 1, NULL, 'ut-enim-ad-minim-veniam-quis-nostrud-exercit'),
(21, 5, 'ullamco laboris nisi ut aliquip ex ea commodo consec', 'a:4:{i:0;i:4;i:1;i:5;i:2;i:11;i:3;i:12;}', 'uploads/photos/covers/cover_image_QUzuV4.jpg', '11-02-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:2:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:6;s:896:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:2:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_T6hBut.jpg\";}', 'a:1:{i:11;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_AMqCuM.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_xQsEXK.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_wk26JT.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_AGBCzz.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_hKE0M7.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_XNHK70.jpg\";}}', 'a:1:{i:7;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_PBx5cl.jpg\";}}', 'a:1:{i:5;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:9;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_EkFbif.pdf\";}}', 'a:1:{i:10;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', NULL, 'Benjamin Tronchet', 1, 1, NULL, 'ullamco-laboris-nisi-ut-aliquip-ex-ea-commodo-consec'),
(22, 4, 'consectetur adipiscing elit, sed do eiusmod tempor', 'a:3:{i:0;i:7;i:1;i:6;i:2;i:8;}', 'uploads/photos/covers/cover_image_3igLHP.jpg', '10-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:2:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:1:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_pemivR.jpg\";}', 'a:1:{i:7;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_MxCDCu.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_S5rhN4.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_JtR2c3.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_jXmA7n.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_0lKN9f.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_DFcSAY.jpg\";}}', 'a:1:{i:6;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_zeabyN.jpg\";}}', 'a:1:{i:4;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:9;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_BBHELV.pdf\";}}', 'a:1:{i:10;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', NULL, 'Benjamin Tronchet', 1, 1, NULL, 'consectetur-adipiscing-elit-sed-do-eiusmod-tempor'),
(23, 4, 'Sed ut perspiciatis unde omnis iste natus error', 'a:3:{i:0;i:7;i:1;i:11;i:2;i:6;}', 'uploads/photos/covers/cover_image_XjsQA6.jpg', '11-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:3:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:11;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:4:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";i:7;s:46:\"Excepteur sint occaecat cupidatat non proident\";i:10;s:46:\"Excepteur sint occaecat cupidatat non proident\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_6IBnEm.jpg\";}', 'a:1:{i:14;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_JMKwv6.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_BcKU0M.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_Aeo5M0.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_MN6u3F.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_U5QUUR.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_qJVsVg.jpg\";}}', 'a:1:{i:9;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_phxw95.jpg\";}}', 'a:1:{i:6;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:12;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_r4QNWr.pdf\";}}', 'a:1:{i:13;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', 3, 'Benjamin Tronchet', 1, 1, 1, 'sed-ut-perspiciatis-unde-omnis-iste-natus-error'),
(24, 5, 'labore et dolore magna aliqua', 'a:4:{i:0;i:7;i:1;i:12;i:2;i:13;i:3;i:6;}', 'uploads/photos/covers/cover_image_ap9mIT.jpg', '07-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:3:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:10;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:3:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";i:9;s:46:\"Excepteur sint occaecat cupidatat non proident\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_g2uzuq.jpg\";}', 'a:1:{i:13;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_c4DTmU.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_kSwI0g.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_Yu1uKf.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_9YLcjK.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_YqAG9f.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_KIlW6a.jpg\";}}', 'a:1:{i:8;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_uaYgc2.jpg\";}}', 'a:1:{i:6;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:7;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:11;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_jqbONL.pdf\";}}', 'a:1:{i:12;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', 7, 'Benjamin Tronchet', 1, 1, 1, 'labore-et-dolore-magna-aliqua'),
(25, 6, 'esse cillum dolore eu fugiat nulla pariatur', 'a:3:{i:0;i:7;i:1;i:8;i:2;i:4;}', 'uploads/photos/covers/cover_image_IBsd6r.jpg', '15-03-2021', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'a:3:{i:2;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:5;s:902:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><br />Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";i:11;s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";}', 'a:4:{i:1;s:47:\"Sed ut perspiciatis unde omnis iste natus error\";i:4;s:50:\"At vero eos et accusamus et iusto odio dignissimos\";i:7;s:46:\"Excepteur sint occaecat cupidatat non proident\";i:10;s:46:\"Excepteur sint occaecat cupidatat non proident\";}', 'a:1:{i:3;s:45:\"uploads/photos/images/image_normal_sBxNPG.jpg\";}', 'a:1:{i:14;a:6:{i:0;s:49:\"uploads/photos/galeries/image_galerie1_Pismib.jpg\";i:1;s:49:\"uploads/photos/galeries/image_galerie2_AEV0Oq.jpg\";i:2;s:49:\"uploads/photos/galeries/image_galerie3_bcCiye.jpg\";i:3;s:49:\"uploads/photos/galeries/image_galerie4_gcO3KH.jpg\";i:4;s:49:\"uploads/photos/galeries/image_galerie5_G7682e.jpg\";i:5;s:49:\"uploads/photos/galeries/image_galerie6_w0kOiE.jpg\";}}', 'a:1:{i:9;a:5:{s:5:\"titre\";s:30:\"Nam libero tempore, cum soluta\";s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"lien\";s:23:\"https://www.lipsum.com/\";s:5:\"texte\";s:201:\"Nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis\";s:5:\"image\";s:41:\"uploads/photos/cta/image_small_U0YJGP.jpg\";}}', 'a:1:{i:6;a:2:{s:5:\"label\";s:19:\"Visiter Lorem Ipsum\";s:4:\"link\";s:23:\"https://www.lipsum.com/\";}}', 'a:1:{i:8;s:43:\"https://www.youtube.com/watch?v=CmzKQ3PSrow\";}', 'a:1:{i:12;a:2:{s:5:\"titre\";s:29:\"Document PDF à télécharger\";s:4:\"file\";s:34:\"uploads/pdf/exemple-pdf_RgeLf9.pdf\";}}', 'a:1:{i:13;s:980:\"<iframe width=\"100%\" height=\"166\" scrolling=\"no\" frameborder=\"no\" allow=\"autoplay\" src=\"https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/82584793&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true\"></iframe><div style=\"font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;\"><a href=\"https://soundcloud.com/lorem-ipsum-podcast\" title=\"Lorem Ipsum Podcast\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast</a> · <a href=\"https://soundcloud.com/lorem-ipsum-podcast/lorem-ipsum-podcast-01-redes\" title=\"Lorem Ipsum Podcast - 01 Redes Sociais\" target=\"_blank\" style=\"color: #cccccc; text-decoration: none;\">Lorem Ipsum Podcast - 01 Redes Sociais</a></div>\";}', 74, 'Benjamin Tronchet', 1, 1, 1, 'esse-cillum-dolore-eu-fugiat-nulla-pariatur');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categorie`, `name`, `slug`) VALUES
(4, 'Catégorie1', 'categorie1'),
(5, 'Catégorie2', 'categorie2'),
(6, 'Catégorie3', 'categorie3');

-- --------------------------------------------------------

--
-- Table structure for table `categories_menu`
--

CREATE TABLE `categories_menu` (
  `id_categorie_menu` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 NOT NULL,
  `plats` text CHARACTER SET utf8,
  `sous_categories` text CHARACTER SET utf8,
  `is_sous_categorie` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_menu`
--

INSERT INTO `categories_menu` (`id_categorie_menu`, `name`, `plats`, `sous_categories`, `is_sous_categorie`) VALUES
(40, 'Notre Planche de Fromages', 'a:1:{i:1;s:2:\"79\";}', 'N;', 1),
(38, 'Nos Coupes Glacées', 'a:5:{i:1;s:2:\"74\";i:2;s:2:\"75\";i:3;s:2:\"76\";i:4;s:2:\"77\";i:5;s:2:\"78\";}', 'N;', 1),
(39, 'Nos Coupes Alcoolisées', 'a:3:{i:1;s:2:\"80\";i:2;s:2:\"81\";i:3;s:2:\"82\";}', 'N;', 1),
(37, 'Nos Crèmes Glacées', 'a:1:{i:1;s:2:\"73\";}', 'N;', 1),
(36, 'Elaborez vos Coupes de Glace', 'a:3:{i:1;s:2:\"70\";i:2;s:2:\"71\";i:3;s:2:\"72\";}', 'N;', 1),
(29, 'Antipasti', 'a:5:{i:1;s:2:\"14\";i:2;s:2:\"15\";i:3;s:2:\"16\";i:4;s:2:\"17\";i:5;s:2:\"18\";}', 'N;', NULL),
(30, 'insalate', 'a:4:{i:1;s:2:\"19\";i:2;s:2:\"20\";i:3;s:2:\"21\";i:4;s:2:\"22\";}', 'N;', NULL),
(31, 'Pasta ou Gnocchi', 'a:10:{i:1;s:2:\"24\";i:2;s:2:\"25\";i:3;s:2:\"26\";i:4;s:2:\"27\";i:5;s:2:\"28\";i:6;s:2:\"29\";i:7;s:2:\"30\";i:8;s:2:\"31\";i:9;s:2:\"32\";i:10;s:2:\"33\";}', 'N;', NULL),
(32, 'Formules Presto - Le midi en semaine', 'a:3:{i:1;s:2:\"34\";i:2;s:2:\"35\";i:3;s:2:\"13\";}', 'N;', NULL),
(33, 'Menu Bambino', 'a:5:{i:1;s:2:\"36\";i:2;s:2:\"37\";i:3;s:2:\"38\";i:4;s:2:\"39\";i:5;s:2:\"40\";}', 'N;', NULL),
(34, 'Secondi Piatti', 'a:9:{i:1;s:2:\"41\";i:2;s:2:\"42\";i:3;s:2:\"43\";i:4;s:2:\"44\";i:5;s:2:\"45\";i:6;s:2:\"46\";i:7;s:2:\"47\";i:8;s:2:\"48\";i:9;s:2:\"49\";}', 'N;', NULL),
(35, 'Pizze Artigianale', 'a:20:{i:1;s:2:\"50\";i:2;s:2:\"51\";i:3;s:2:\"52\";i:4;s:2:\"53\";i:5;s:2:\"54\";i:6;s:2:\"55\";i:7;s:2:\"56\";i:8;s:2:\"57\";i:9;s:2:\"58\";i:10;s:2:\"59\";i:11;s:2:\"60\";i:12;s:2:\"61\";i:13;s:2:\"62\";i:14;s:2:\"63\";i:15;s:2:\"64\";i:16;s:2:\"65\";i:17;s:2:\"66\";i:18;s:2:\"67\";i:19;s:2:\"68\";i:20;s:2:\"69\";}', 'N;', NULL),
(42, 'Gins', 'a:2:{i:1;s:2:\"94\";i:2;s:2:\"95\";}', 'N;', 1),
(43, 'Vodkas', 'a:2:{i:1;s:2:\"96\";i:2;s:2:\"97\";}', 'N;', 1),
(44, 'Rhums', 'a:5:{i:1;s:2:\"98\";i:2;s:2:\"99\";i:3;s:2:\"99\";i:4;s:3:\"100\";i:5;s:3:\"101\";}', 'N;', 1),
(45, 'Whisky', 'a:6:{i:1;s:3:\"102\";i:2;s:3:\"102\";i:3;s:3:\"103\";i:4;s:3:\"104\";i:5;s:3:\"105\";i:6;s:3:\"106\";}', 'N;', 1),
(46, 'Digestifs', 'a:12:{i:1;s:3:\"107\";i:2;s:3:\"108\";i:3;s:3:\"109\";i:4;s:3:\"110\";i:5;s:3:\"111\";i:6;s:3:\"112\";i:7;s:3:\"113\";i:8;s:3:\"114\";i:9;s:3:\"115\";i:10;s:3:\"116\";i:11;s:3:\"117\";i:12;s:3:\"118\";}', 'N;', 1),
(47, 'Softs', 'a:6:{i:1;s:3:\"119\";i:2;s:3:\"120\";i:3;s:3:\"121\";i:4;s:3:\"122\";i:5;s:3:\"123\";i:6;s:3:\"124\";}', 'N;', 1),
(48, 'Eaux Minérales', 'a:2:{i:1;s:3:\"125\";i:2;s:3:\"126\";}', 'N;', 1),
(49, 'Boissons Chaudes', 'a:5:{i:1;s:3:\"127\";i:2;s:3:\"128\";i:3;s:3:\"129\";i:4;s:3:\"130\";i:5;s:3:\"131\";}', 'N;', 1),
(50, 'Apéritifs', 'a:8:{i:1;s:3:\"132\";i:2;s:3:\"133\";i:3;s:3:\"134\";i:4;s:3:\"135\";i:5;s:3:\"136\";i:6;s:3:\"137\";i:7;s:3:\"138\";i:8;s:3:\"139\";}', 'N;', 1),
(51, 'Bières', 'a:6:{i:1;s:3:\"140\";i:2;s:3:\"141\";i:3;s:3:\"142\";i:4;s:3:\"143\";i:5;s:3:\"144\";i:6;s:3:\"145\";}', 'N;', 1),
(52, 'Cocktails', 'a:10:{i:1;s:3:\"146\";i:2;s:3:\"147\";i:3;s:3:\"148\";i:4;s:3:\"149\";i:5;s:3:\"150\";i:6;s:3:\"151\";i:7;s:3:\"152\";i:8;s:3:\"153\";i:9;s:3:\"154\";i:10;s:3:\"155\";}', 'N;', 1),
(53, 'Champagnes', 'a:3:{i:1;s:3:\"156\";i:2;s:3:\"157\";i:3;s:3:\"158\";}', 'N;', 1),
(54, 'Vins Rosés', 'a:5:{i:1;s:3:\"159\";i:2;s:3:\"160\";i:3;s:3:\"161\";i:4;s:3:\"162\";i:5;s:3:\"163\";}', 'N;', 1),
(55, 'Vins Blancs Secs', 'a:1:{i:1;s:3:\"164\";}', 'N;', 1),
(56, 'Vins Blancs Moelleux', 'a:2:{i:1;s:3:\"165\";i:2;s:3:\"166\";}', 'N;', 1),
(57, 'Vins Rouges', 'a:10:{i:1;s:3:\"167\";i:2;s:3:\"168\";i:3;s:3:\"169\";i:4;s:3:\"170\";i:5;s:3:\"171\";i:6;s:3:\"172\";i:7;s:3:\"173\";i:8;s:3:\"174\";i:9;s:3:\"175\";i:10;s:3:\"176\";}', 'N;', 1),
(58, 'Verre de Vin', 'a:1:{i:1;s:3:\"177\";}', 'N;', 1),
(59, 'Nos Desserts', 'a:12:{i:1;s:2:\"83\";i:2;s:2:\"84\";i:3;s:2:\"85\";i:4;s:2:\"86\";i:5;s:2:\"86\";i:6;s:2:\"87\";i:7;s:2:\"88\";i:8;s:2:\"89\";i:9;s:2:\"90\";i:10;s:2:\"91\";i:11;s:2:\"92\";i:12;s:2:\"93\";}', 'a:5:{i:13;s:2:\"36\";i:14;s:2:\"37\";i:15;s:2:\"38\";i:16;s:2:\"39\";i:17;s:2:\"40\";}', NULL),
(60, 'Boissons et Vins', 'N;', 'a:17:{i:1;s:2:\"47\";i:2;s:2:\"48\";i:3;s:2:\"49\";i:4;s:2:\"50\";i:5;s:2:\"51\";i:6;s:2:\"52\";i:7;s:2:\"53\";i:8;s:2:\"54\";i:9;s:2:\"55\";i:10;s:2:\"56\";i:11;s:2:\"57\";i:12;s:2:\"58\";i:13;s:2:\"42\";i:14;s:2:\"43\";i:15;s:2:\"44\";i:16;s:2:\"45\";i:17;s:2:\"46\";}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_publication` varchar(60) NOT NULL,
  `content` mediumtext NOT NULL,
  `id_article` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `name`, `email`, `date_publication`, `content`, `id_article`, `is_active`) VALUES
(3, 'Tronchet Benjamin', 'benjamin@melting-k.fr', '16-03-2021', 'Test de commentaire sur un article.', 25, 1),
(7, 'Benjamin Melting K', 'galinier@melting-k.fr', '17-03-2021', 'Test de commentaire n°2', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `categories_menu` text CHARACTER SET utf8
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `categories_menu`) VALUES
(1, 'a:9:{i:0;s:2:\"32\";i:1;s:2:\"33\";i:2;s:2:\"29\";i:3;s:2:\"30\";i:4;s:2:\"31\";i:5;s:2:\"34\";i:6;s:2:\"35\";i:7;s:2:\"59\";i:8;s:2:\"60\";}');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `url_admin` varchar(255) NOT NULL,
  `srcimg` varchar(50) NOT NULL,
  `colorimg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `email`, `domain`, `url`, `url_admin`, `srcimg`, `colorimg`) VALUES
(1, 'Le Don Camillo', 'direction-pamiers@doncamillo-restaurants.fr', 'doncamillo-restaurants.fr', 'http://www.doncamillo-restaurants.fr', 'http://www.doncamillo-restaurants.fr/admin-mag', 'img/logo.png', '#243648');

-- --------------------------------------------------------

--
-- Table structure for table `plats`
--

CREATE TABLE `plats` (
  `id_plat` int(11) NOT NULL,
  `title` varchar(250) CHARACTER SET utf8 NOT NULL,
  `descriptif` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `is_takeaway` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plats`
--

INSERT INTO `plats` (`id_plat`, `title`, `descriptif`, `price`, `is_takeaway`) VALUES
(13, 'Dessert', '2 boules de glace / Panna cotta / Crème brûlée', '', NULL),
(14, 'Piatto di parma', '', '12', NULL),
(15, 'Bruschetta di pollo', 'Pain, sauce tomate, bethmale, aiguillettes de poulet, aubergine marinée', '14', NULL),
(16, 'CROC DON K', 'Pain, bechamel, jambon, comté', '14', NULL),
(17, 'Carpaccio del Capo préparé', 'Boeuf, burrata, persillade, roquette, copeaux de parmesan, crème de balsamic', '11', NULL),
(18, 'Pain persillé', '', '7', NULL),
(19, 'Quercy', 'Salade, lardons, chévre chaud', '11', NULL),
(20, 'Pollo', 'Salade, poulet pané, tomates cocktail, copeaux de parmesan', '13', NULL),
(21, 'Don Camillo', 'Salade, gésiers confits, manchon de canard, foie gras, magret séché', '14', NULL),
(22, 'Romana', 'Salade, mozzarella panée, tomates cocktail, vinaigre balsamique, persillade', '12', NULL),
(24, 'Salmone', 'Sauce oseille, saumon nature et fumé, parmesan', '14', NULL),
(25, 'Carbonara', 'Jaune d’oeuf, lardons, crème, sel, poivre, parmesan', '12', NULL),
(26, 'Burrata', 'Sauce tomate poivrée, tomates cocktail, basilic, huile d’olive, burrata, parmesan', '13', NULL),
(27, 'Pesto', 'Huile d’olive, pignon de pin, ail, crème, parmesan', '11', NULL),
(28, 'Truffe', 'Sauce champignon, lamelles de truffe, huile de truffe, parmesan', '15', NULL),
(29, 'Pétoncle trito piccante', 'Huile d’olive, pétoncle, piment, ail, cr me, parmesan', '13', NULL),
(30, 'Bolognese', 'Sauce bolognaise, parmesan, sel, poivre', '12', NULL),
(31, 'Lasagne alla bolognese', 'Sauce bolognaise, béchamel, mozzarella, sel, poivre', '13', NULL),
(32, 'Ravioli 4 formaggi', 'Chèvre, parmesan, roquefort, fior di latte, crème', '14', NULL),
(33, 'Ravioli pesto', 'Huile d’olive, pignon de pin, ail, tomates cocktail, fior di latte, crème', '13', NULL),
(34, 'Pasta + Dessert', 'Pasta carbonara / pasta pesto/ pasta bolognese', '11', NULL),
(35, 'Pizza + Dessert', 'Pizza regina / pizza pollame / pizza acciuga', '12', NULL),
(36, 'PLAT + DESSERT', 'jusqu\'à 10 ans', '10', NULL),
(37, 'Steak haché au moment', '', '', NULL),
(38, 'Pizza', '(regina, margherita ou 4 formaggi)', '', NULL),
(39, 'Pasta ou gnocchi', '(sauce bolognaise ou carbonara)', '', NULL),
(40, 'Dessert', 'Glace / Panna cotta / Crème brûlée', '', NULL),
(41, 'Magret de canard entier', '(350gr hors cuisson) - Supplément foie gras 3€', '21', NULL),
(42, 'scaloppina crema', 'Sauce forestière, veau', '16', NULL),
(43, 'Bocconcini', 'Veau, jambon, fior di latte', '17', NULL),
(44, 'Tartare de boeuf', ' (350gr)', '15', NULL),
(45, 'Burger Don K', 'Pain maison, sauce burger, oignons confits, steak hach  (250gr), bethmale, poitrine de porc', '16', NULL),
(46, 'Burger Poulet', 'Pain maison, sauce burger, oignons confits, poulet pané, cheddar, tomate', '15', NULL),
(47, 'SCALOPPINA MILANESE', 'Veau, panure, parmesan', '16', NULL),
(48, 'Accompagnement Secondi piatti', 'Pasta, frites, salade.', '', NULL),
(49, 'Supplément Sauce', 'Roquefort ou poivre vert', '2', NULL),
(50, 'Acciuga', 'Sauce tomate, fior di latte, anchois, olives noires', '11', NULL),
(51, 'Regina', 'Tomate, fior di latte, jambon, champignons, olives noires', '12', NULL),
(52, 'Portofino', 'Tomate, fior di latte, oignons confits, lardons, oeuf, crème liquide', '13', NULL),
(53, 'Don Camillo', 'Tomate, fior di latte, lardons, g siers, magrets', '14', NULL),
(54, 'Calzone', 'Tomate, fior di latte, jambon, champignons, jaune d’oeuf', '13', NULL),
(55, 'Spianata', 'Tomate, fior di latte, oignons confits, spianata, poivrons', '13', NULL),
(56, 'Burger', 'Sauce burger, cheddar, cornichon, viande hach e, tomate cocktail, oignons rouges', '13', NULL),
(57, 'Potager', 'Tomate, oignons confits, courgettes, poivrons frais, tomates cocktail, coeur d’artichaut, fior di latte', '12', NULL),
(58, 'Campagnola', 'Créme liquide, fior di latte, pomme de terre, reblochon, lardons', '13', NULL),
(59, 'Ariégeoise', 'Tomate, fior di latte, confit de canard, bethmale, guanciale (joue de porc poivrée)', '13', NULL),
(60, 'Bolognese', 'Tomate, fior di latte, oignons confits, viande de boeuf, huile d’olive', '13', NULL),
(61, 'Parmigiana', 'Tomate, aubergine marinée, viande de boeuf, fior di latte', '13', NULL),
(62, '4 formaggi', 'Fior di latte, chèvre, camembert, roquefort, crème liquide', '14', NULL),
(63, 'Pollame', 'Crème liquide, fior di latte, oignons confits, blanc de poulet, curry', '13', NULL),
(64, 'Tartufo', 'Duxelle de champignons, burrata, lamelles de truffe, huile de truffe, copeaux de parmesan', '18', NULL),
(65, 'Mozzarella', 'Velouté de tomate, mozzarella di bufala, basilic', '15', NULL),
(66, 'Milano', 'Crème liquide, mozzarella di bufala, cèpes, parmesan, salade, jambon de parme', '18', NULL),
(67, 'Volcano', 'Tomate, mozzarella di bufala, magret, gésier, foie gras poêlé, salade', '18', NULL),
(68, 'Viennese', 'Sauce oseille, filet de saumon, saumon fumé, mozzarella di bufala', '18', NULL),
(69, 'BRESAOLA', 'Sauce tomate, fior di latte, tomate cocktail, roquette, mozzarella di bufala, bresaola, creme de pesto, creme de balsamic', '18', NULL),
(70, 'Coupe 2 Boules', '', '4,5', NULL),
(71, 'Coupe 3 Boules', '', '5,5', NULL),
(72, 'Supplément Chantilly', '', '1', NULL),
(73, 'Vanille/ Café/ Caramel/ Chocolat/ Fraise/Noix de Coco/ Rhum Raisin/ Pistache.', '', '', NULL),
(74, 'Dame Blanche', '(3 boules vanille, chocolat chaud, chantilly, biscuit.)', '7', NULL),
(75, 'Café Liègeois', '(Glace café, glace vanille, expresso, chantilly, biscuit.)', '7', NULL),
(76, 'Chocolat Liégeois', '(Glace chocolat, glace vanille, chocolat chaud, chantilly, biscuit.)', '7', NULL),
(77, 'Pêche Melba', '(Sorbet pêche, glace vanille, 1/2 pêche, coulis fruit rouge, chantilly, biscuit.)', '7', NULL),
(78, 'Super Hélène', '(Sorbet poire, glace vanille, 1/2 poire, chocolat chaud, chantilly, biscuit.)', '7', NULL),
(79, 'Chèvre, Bethmale, Camembert, Roquefort.', '', '6', NULL),
(80, 'Williamine', '(Sorbet poire, eau de vie poire, biscuit.)', '7,5', NULL),
(81, 'Colonel', '(Sobert citron, vodka, biscuit.)', '7,5', NULL),
(82, 'Irish Coffee Glacé', '(Glace vanille, glace café, whisky, expresso, chantilly, biscuit.)', '7,5', NULL),
(83, 'Pain Perdu l’Italienne', '(Pain brioché, caramel, chantilly.)', '7', NULL),
(84, 'Crème brûlée', '', '6', NULL),
(85, 'panna Cotta', '(Coulis fruits rouges/ Chocolat chaud/ Caramel.)', '5', NULL),
(86, 'Tiramisu', '(Demander la saveur du jour à votre serveur.)', '6,50', NULL),
(87, 'Muffin au Nutella', '', '7', NULL),
(88, 'îLE FLOTTANTE', '(Crème anglaise, blanc en neige, pop corn, caramel beurre salé.)', '8', NULL),
(89, 'CRêPE ITALIENNE', '(Crêpe flambée au limoncello, glace vanille.)', '7', NULL),
(90, 'Dessert du Moment', '', '7', NULL),
(91, 'Café Gourmand', '(Demander à votre serveur.)', '6,90', NULL),
(92, 'Champagne Gourmand', '', '12', NULL),
(93, 'Digestif Gourmand', '', '15', NULL),
(94, 'Bombay 4cl', '', '7', NULL),
(95, 'Gin Bosford Rosé 4cl', '', '7', NULL),
(96, 'Grey Goose 4cl', '', '7', NULL),
(97, 'Eristoff 4cl', '', '5', NULL),
(98, 'Don Papa 4cl', '(Philippines)', '8', NULL),
(99, 'Diplomatico 4cl', '(Venezuela)', '8', NULL),
(100, 'Coloma 5 ans 4cl', '(Colombie)', '9', NULL),
(101, 'Havana 3 ans 4cl', '', '5', NULL),
(102, 'Clan Campbell 4cl', '(Ecosse)', '8', NULL),
(103, 'Chivas 12 ans 4cl', '(Ecosse)', '8', NULL),
(104, 'Black Montain numéro 2 4cl', '(France)', '8', NULL),
(105, 'Nikka 4cl', '(Japon)', '10', NULL),
(106, 'Jack Daniel’s 4cl', '(Etats-Unis)', '8', NULL),
(107, 'Amaretto 4cl', '', '5', NULL),
(108, 'Get 27/ Get 31 4cl', '', '5', NULL),
(109, 'Manzana 4cl', '', '5', NULL),
(110, 'Limoncello 4cl', '', '5', NULL),
(111, 'Bailey’s 4cl', '', '5', NULL),
(112, 'Malibu 4cl', '', '5', NULL),
(113, 'Grappa 4cl', '', '5', NULL),
(114, 'Eau de vie Poire 4cl', '', '5', NULL),
(115, 'Eau de vie poire Brana 4cl', '', '10', NULL),
(116, 'Bas Armagnac château Taquiret 4cl', '', '8', NULL),
(117, 'Cognac Hine VSOP 4cl', '', '8', NULL),
(118, 'Calvados Pays d’auge Maison boulard 4cl', '', '8', NULL),
(119, 'Coca /Coca Zero /Fanta / Limonade 33cl', '', '3,50', NULL),
(120, 'Thé Glacé Pêche 25cl', '', '3', NULL),
(121, 'Sirop 3cl', '', '2,50', NULL),
(122, 'Diabolo', '', '3,70', NULL),
(123, 'Jus de Fruit 25cl', '', '3', NULL),
(124, 'Perrier 33cl', '', '3,50', NULL),
(125, 'San Pellegrino', '', '4', NULL),
(126, 'Evian', '', '4', NULL),
(127, 'café', '', '1,90', NULL),
(128, 'Décaféiné', '', '1,90', NULL),
(129, 'Thé', '', '3', NULL),
(130, 'Cappucino', '', '3,50', NULL),
(131, 'Infusion', '', '3', NULL),
(132, 'Martini Rouge / Blanc 7cl', '', '4', NULL),
(133, 'Ricard 2cl', '', '3', NULL),
(134, 'Muscat 7cl', '', '4', NULL),
(135, 'Kir Cassis / Pêche 12cl', '', '4', NULL),
(136, 'Kir Italien 12cl', '', '4', NULL),
(137, 'Porto Blanc / Rouge 7cl', '', '4', NULL),
(138, 'Suze 7cl', '', '4', NULL),
(139, 'Campari 7cl', '', '4', NULL),
(140, '1664 Blonde 25cl', '', '3,50', NULL),
(141, '1664 Blonde 50cl', '', '6', NULL),
(142, 'Grimbergen Blanche 25cl', '', '4', NULL),
(143, 'Grimbergen Blanche 50cl', '', '7', NULL),
(144, 'Biere Artisanale Bouteille 25cl', '', '6,50', NULL),
(145, 'Supplément Sirop', '', '0,20', NULL),
(146, 'Americano', '(3cl campari, 3cl martini rouge, 5cl schweppes, tranche orange)', '8', NULL),
(147, 'Mojito', '(Sucre de canne, feuilles de menthe, citron vert, 4cl rhum blanc Havana, 5cl Perrier, 1cl angostura)', '8', NULL),
(148, 'Caipirinha', '(4cl cacha a, sucre de canne, citron vert)', '8', NULL),
(149, 'Caipiroska', '(4cl vodka, sucre de canne, citron vert)', '8', NULL),
(150, 'Ti punch', '(2cl sirop de sucre de canne, citron vert,5cl rhum blanc Havana)', '8', NULL),
(151, 'Gin Lady fraise', '(Gin ros  4cl, 5cl schweppes, baie de genièvre, anis étoilé, fraise)', '8', NULL),
(152, 'Gin Tonic', '(Gin bombay 4cl, tonic 5cl, tranche de citron)', '8', NULL),
(153, 'Spritz', '(5cl aperol, 5cl prosecco, 4cl eau petillante)', '8', NULL),
(154, 'Saint Germain Spritz', '(4cl saint Germain, 5cl prosecco, 4cl eau petillante)', '8', NULL),
(155, 'Bleu Paillote', '(4cl rhum blanc, cannelle, citron vert, crème de coco, 5cl jus d’ananas, 2cl curaçao)', '8', NULL),
(156, 'Nicolas Feuillate 75cl', '', '50', NULL),
(157, 'Mumm Cordon rouge 75cl', '', '80', NULL),
(158, 'Coupe Champagne 12cl', '', '10', NULL),
(159, 'Domaine Lafage Miraflors 75cl', '', '20', NULL),
(160, 'Château Puech Haut 75cl', '', '30', NULL),
(161, 'Lambrusco Sorbara IGT 75cl', '', '22', NULL),
(162, 'côte de Provence Haut de Masterel 75cl', '', '21', NULL),
(163, 'côte de Provence Haut de Masterel 50cl', '', '14', NULL),
(164, 'Mi-nuit Chardonnay Cote Catalane 75cl', '', '20', NULL),
(165, 'Villa chambre d’amour 75cl', '', '22', NULL),
(166, 'Moscato d’Asti 75cl', '', '22', NULL),
(167, 'Coteaux du Languedoc Pic Saint Loup', '', '21', NULL),
(168, 'Château Villemajou AOP/AOC', '', '32', NULL),
(169, 'Lambrusco Amabile Terra', '', '22', NULL),
(170, 'Luma Nero D’avola DOP 75cl', '', '23', NULL),
(171, 'Corbières AOC/AOP cellier des Demoiselles 50cl', '', '14', NULL),
(172, 'Corbières AOC/AOP cellier des Demoiselles 75cl', '', '19', NULL),
(173, 'Faugères AOC /AOP Insoumis 50cl', '', '14', NULL),
(174, 'Faugères AOC /AOP Insoumis 75cl', '', '20', NULL),
(175, 'Tormaresca di Trentangeli Castel Del Monte Rosso (bio)', '', '32', NULL),
(176, 'Gerard Bertrand Cigalus (bio) Aude Hauterive IGP', '', '55', NULL),
(177, '(rouge/blanc/rosé) 12cl', '', '4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id_tag` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `lastname`, `firstname`, `role`, `email`, `password`) VALUES
(1, 'Feuillard', 'Aurélien', 0, 'aurelien@melting-k.fr', '$2y$10$9f5f6DR3EzNEeOa4tDChqem/qza16qOsL7zXjrjOgZ2281Evya/p.'),
(3, 'Doncamillo', 'Admin', 0, 'admin@doncamillo-restaurants.fr', '$2y$10$bm6fPxbXCtOqx72XqA75aupaR0mYZkHfQJOvMzA56ZUOdmlREtnhm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `categories_menu`
--
ALTER TABLE `categories_menu`
  ADD PRIMARY KEY (`id_categorie_menu`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id_plat`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories_menu`
--
ALTER TABLE `categories_menu`
  MODIFY `id_categorie_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plats`
--
ALTER TABLE `plats`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `Categorie used in article` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`) ON UPDATE NO ACTION;
