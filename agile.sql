-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 03, 2021 alle 15:34
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agile`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `argument`
--

CREATE TABLE `argument` (
  `id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `eventi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `argument`
--

INSERT INTO `argument` (`id`, `answer`, `eventi_id`, `user_id`) VALUES
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', 18, 4),
(11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat.', 8, 3),
(12, 's, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', 18, 1),
(17, 'prova test test', 18, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi`
--

CREATE TABLE `eventi` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `data` date NOT NULL,
  `posti` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `eventi`
--

INSERT INTO `eventi` (`id`, `img`, `name`, `description`, `data`, `posti`, `user_id`, `music_type_id`) VALUES
(8, 'https://i.pinimg.com/originals/94/07/26/94072609a95da2eb1a41c3356f81aff8.jpg', 'Bowie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-05-24', 0, 3, 1),
(12, 'https://images-na.ssl-images-amazon.com/images/I/51clTrXCI8L._AC_.jpg', 'Blues Brother', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-05-24', 97, 3, 2),
(13, 'https://cdn3.volusion.com/bxqxk.xvupj/v/vspfiles/photos/ROCK_868-2.jpg?v-cache=1333139669', 'Eric Clapton', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-05-24', 1, 3, 2),
(17, 'https://images-na.ssl-images-amazon.com/images/I/614ma-mN79L._AC_SY741_.jpg', 'Stevie ray', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-06-06', 900, 1, 2),
(18, 'https://images-na.ssl-images-amazon.com/images/I/513iyuE3xaL._AC_.jpg', 'BB KING', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-06-04', 991, 1, 2),
(19, 'https://www.prints4u.net/wp-content/uploads/2020/01/Halsey-039.jpg', 'Halsey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-06-10', 497, 1, 3),
(20, 'https://phenomenon.it/sites/default/files/events/locandina-2017-10/Schermata%202016-03-22%20alle%2017.23.24.png', 'Gemitaiz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-07-09', 400, 1, 4),
(27, 'https://images.wolfgangsvault.com/m/large/F462-PO/shuggie-otis-poster-jul-7-2001.webp', 'shuggie otis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-07-16', 99, 1, 2),
(28, 'https://images.wolfgangsvault.com/m/large/F183-PO/buddy-guy-poster-apr-8-1995.webp', 'buddy guy', 'ff', '2021-08-03', 67, 3, 2),
(29, 'https://www.newageclub.it/site/wp-content/uploads/2015/09/nitro-01.jpg', 'nitro', 'asdasg', '2021-09-23', 77, 3, 4),
(30, 'http://www.umbria24.it/app/uploads/2017/09/Locandina-2-settembre-2017-732x1024.jpg', 'salmo', 'adf', '2021-10-20', 666, 3, 4),
(31, 'https://www.newageclub.it/site/wp-content/uploads/2018/04/MADMAN.jpg', 'mad man', 'asdgfasgv', '2021-11-25', 221, 3, 4),
(32, 'https://www.shiningproduction.com/wp-content/uploads/2019/11/nayttriplo-217x300.jpg', 'nayt', 'adgfag', '2021-06-03', 77, 3, 4),
(33, 'https://i0.wp.com/www.blogdellamusica.eu/wp-content/uploads/2017/12/lo-spettro-biografia-fabri-fibra.jpg?ssl=1', 'fabri fibra', 'asdgv', '2021-07-10', 67, 3, 4),
(34, 'https://images.wolfgangsvault.com/m/large/ZZZ012813-PO/ac-dc-poster-1983.webp', 'ac dc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum sapien ac consectetur eleifend. Praesent quis mi nec sapien tincidunt sollicitudin vitae eget ante. Proin sit amet nibh semper, tempor orci ut, tincidunt mi. Donec faucibus maximus neque eu efficitur. Nulla tincidunt porttitor tellus eget gravida. Pellentesque consequat commodo ipsum vitae lacinia. Proin in nulla eu eros ullamcorper laoreet et a neque. Praesent varius dolor ac ligula laoreet, quis ullamcorper orci ornare. In feugiat ullamcorper tellus, hendrerit accumsan nisl auctor at. Etiam varius leo in nunc commodo rutrum. Pellentesque ullamcorper ultrices scelerisque. Pellentesque sit amet pharetra purus. Sed fermentum laoreet tortor id ultricies. Duis cursus ultricies urna vel ullamcorper. Mauris viverra nisi et nisl rutrum, sit amet luctus erat accumsan.', '2021-07-05', 666, 4, 1),
(35, 'https://i.pinimg.com/originals/4e/7f/bc/4e7fbc53dec04636eb43c837c2ce8d79.png', 'nirvana', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum sapien ac consectetur eleifend. Praesent quis mi nec sapien tincidunt sollicitudin vitae eget ante. Proin sit amet nibh semper, tempor orci ut, tincidunt mi. Donec faucibus maximus neque eu efficitur. Nulla tincidunt porttitor tellus eget gravida. Pellentesque consequat commodo ipsum vitae lacinia. Proin in nulla eu eros ullamcorper laoreet et a neque. Praesent varius dolor ac ligula laoreet, quis ullamcorper orci ornare. In feugiat ullamcorper tellus, hendrerit accumsan nisl auctor at. Etiam varius leo in nunc commodo rutrum. Pellentesque ullamcorper ultrices scelerisque. Pellentesque sit amet pharetra purus. Sed fermentum laoreet tortor id ultricies. Duis cursus ultricies urna vel ullamcorper. Mauris viverra nisi et nisl rutrum, sit amet luctus erat accumsan.', '2021-12-30', 221, 4, 1),
(36, 'https://radiogold.it/wp-content/uploads/2018/10/locandina-maneskin.jpg', 'maneskin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum sapien ac consectetur eleifend. Praesent quis mi nec sapien tincidunt sollicitudin vitae eget ante. Proin sit amet nibh semper, tempor orci ut, tincidunt mi. Donec faucibus maximus neque eu efficitur. Nulla tincidunt porttitor tellus eget gravida. Pellentesque consequat commodo ipsum vitae lacinia. Proin in nulla eu eros ullamcorper laoreet et a neque. Praesent varius dolor ac ligula laoreet, quis ullamcorper orci ornare. In feugiat ullamcorper tellus, hendrerit accumsan nisl auctor at. Etiam varius leo in nunc commodo rutrum. Pellentesque ullamcorper ultrices scelerisque. Pellentesque sit amet pharetra purus. Sed fermentum laoreet tortor id ultricies. Duis cursus ultricies urna vel ullamcorper. Mauris viverra nisi et nisl rutrum, sit amet luctus erat accumsan.', '2021-06-30', 77, 4, 1),
(37, 'https://wmnf.s3.amazonaws.com/wp-content/uploads/2019/05/Zeppelin50th_1-382x600.jpg', 'led zeppelin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum sapien ac consectetur eleifend. Praesent quis mi nec sapien tincidunt sollicitudin vitae eget ante. Proin sit amet nibh semper, tempor orci ut, tincidunt mi. Donec faucibus maximus neque eu efficitur. Nulla tincidunt porttitor tellus eget gravida. Pellentesque consequat commodo ipsum vitae lacinia. Proin in nulla eu eros ullamcorper laoreet et a neque. Praesent varius dolor ac ligula laoreet, quis ullamcorper orci ornare. In feugiat ullamcorper tellus, hendrerit accumsan nisl auctor at. Etiam varius leo in nunc commodo rutrum. Pellentesque ullamcorper ultrices scelerisque. Pellentesque sit amet pharetra purus. Sed fermentum laoreet tortor id ultricies. Duis cursus ultricies urna vel ullamcorper. Mauris viverra nisi et nisl rutrum, sit amet luctus erat accumsan.', '2022-10-03', 77, 4, 1),
(38, 'https://images-na.ssl-images-amazon.com/images/I/71k-UEAqfVL._AC_SL1000_.jpg', 'Stefano Bavota', 'gjk', '2021-06-03', 66, 4, 1),
(39, 'https://www.arthipo.com/image/cache/catalog/poster/music/music60-beyonce-poster-singer-sarkici-sanatci-afis-muzik-1000x1000.jpg', 'beyonce', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum sapien ac consectetur eleifend. Praesent quis mi nec sapien tincidunt sollicitudin vitae eget ante. Proin sit amet nibh semper, tempor orci ut, tincidunt mi. Donec faucibus maximus neque eu efficitur. Nulla tincidunt porttitor tellus eget gravida. Pellentesque consequat commodo ipsum vitae lacinia. Proin in nulla eu eros ullamcorper laoreet et a neque. Praesent varius dolor ac ligula laoreet, quis ullamcorper orci ornare. In feugiat ullamcorper tellus, hendrerit accumsan nisl auctor at. Etiam varius leo in nunc commodo rutrum. Pellentesque ullamcorper ultrices scelerisque. Pellentesque sit amet pharetra purus. Sed fermentum laoreet tortor id ultricies. Duis cursus ultricies urna vel ullamcorper. Mauris viverra nisi et nisl rutrum, sit amet luctus erat accumsan.', '2022-07-03', 221, 4, 3),
(40, 'https://mir-s3-cdn-cf.behance.net/project_modules/disp/88959216613827.562aebbbdd1b0.png', 'bruno mars', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum sapien ac consectetur eleifend. Praesent quis mi nec sapien tincidunt sollicitudin vitae eget ante. Proin sit amet nibh semper, tempor orci ut, tincidunt mi. Donec faucibus maximus neque eu efficitur. Nulla tincidunt porttitor tellus eget gravida. Pellentesque consequat commodo ipsum vitae lacinia. Proin in nulla eu eros ullamcorper laoreet et a neque. Praesent varius dolor ac ligula laoreet, quis ullamcorper orci ornare. In feugiat ullamcorper tellus, hendrerit accumsan nisl auctor at. Etiam varius leo in nunc commodo rutrum. Pellentesque ullamcorper ultrices scelerisque. Pellentesque sit amet pharetra purus. Sed fermentum laoreet tortor id ultricies. Duis cursus ultricies urna vel ullamcorper. Mauris viverra nisi et nisl rutrum, sit amet luctus erat accumsan.', '2021-10-27', 99, 4, 3),
(41, 'https://images-na.ssl-images-amazon.com/images/I/71tGfmq5h8L._AC_SL1500_.jpg', 'ariana grande', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum sapien ac consectetur eleifend. Praesent quis mi nec sapien tincidunt sollicitudin vitae eget ante. Proin sit amet nibh semper, tempor orci ut, tincidunt mi. Donec faucibus maximus neque eu efficitur. Nulla tincidunt porttitor tellus eget gravida. Pellentesque consequat commodo ipsum vitae lacinia. Proin in nulla eu eros ullamcorper laoreet et a neque. Praesent varius dolor ac ligula laoreet, quis ullamcorper orci ornare. In feugiat ullamcorper tellus, hendrerit accumsan nisl auctor at. Etiam varius leo in nunc commodo rutrum. Pellentesque ullamcorper ultrices scelerisque. Pellentesque sit amet pharetra purus. Sed fermentum laoreet tortor id ultricies. Duis cursus ultricies urna vel ullamcorper. Mauris viverra nisi et nisl rutrum, sit amet luctus erat accumsan.', '2021-07-01', 69, 4, 3),
(42, 'https://images.justwatch.com/poster/239195216/s718', 'shawn mends', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum sapien ac consectetur eleifend. Praesent quis mi nec sapien tincidunt sollicitudin vitae eget ante. Proin sit amet nibh semper, tempor orci ut, tincidunt mi. Donec faucibus maximus neque eu efficitur. Nulla tincidunt porttitor tellus eget gravida. Pellentesque consequat commodo ipsum vitae lacinia. Proin in nulla eu eros ullamcorper laoreet et a neque. Praesent varius dolor ac ligula laoreet, quis ullamcorper orci ornare. In feugiat ullamcorper tellus, hendrerit accumsan nisl auctor at. Etiam varius leo in nunc commodo rutrum. Pellentesque ullamcorper ultrices scelerisque. Pellentesque sit amet pharetra purus. Sed fermentum laoreet tortor id ultricies. Duis cursus ultricies urna vel ullamcorper. Mauris viverra nisi et nisl rutrum, sit amet luctus erat accumsan.', '2022-10-19', 221, 4, 3),
(43, 'https://i.pinimg.com/originals/a3/5e/ef/a35eefb3ca573a7090466f04e9aa69ef.jpg', 'ed sheeran', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin condimentum sapien ac consectetur eleifend. Praesent quis mi nec sapien tincidunt sollicitudin vitae eget ante. Proin sit amet nibh semper, tempor orci ut, tincidunt mi. Donec faucibus maximus neque eu efficitur. Nulla tincidunt porttitor tellus eget gravida. Pellentesque consequat commodo ipsum vitae lacinia. Proin in nulla eu eros ullamcorper laoreet et a neque. Praesent varius dolor ac ligula laoreet, quis ullamcorper orci ornare. In feugiat ullamcorper tellus, hendrerit accumsan nisl auctor at. Etiam varius leo in nunc commodo rutrum. Pellentesque ullamcorper ultrices scelerisque. Pellentesque sit amet pharetra purus. Sed fermentum laoreet tortor id ultricies. Duis cursus ultricies urna vel ullamcorper. Mauris viverra nisi et nisl rutrum, sit amet luctus erat accumsan.', '2022-10-03', 99, 4, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `favorites`
--

CREATE TABLE `favorites` (
  `eventi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `favorites`
--

INSERT INTO `favorites` (`eventi_id`, `user_id`) VALUES
(8, 1),
(12, 3),
(13, 1),
(17, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `music_type`
--

CREATE TABLE `music_type` (
  `id` int(11) NOT NULL,
  `genere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `music_type`
--

INSERT INTO `music_type` (`id`, `genere`) VALUES
(1, 'Rock'),
(2, 'Blues'),
(3, 'Pop'),
(4, 'Rap');

-- --------------------------------------------------------

--
-- Struttura della tabella `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `eventi_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `register`
--

INSERT INTO `register` (`id`, `eventi_id`, `email`) VALUES
(25, 20, 'test@test.com'),
(26, 20, 'test2@test.it'),
(27, 12, 'test2@test.com'),
(28, 19, 'test2@test.it'),
(29, 18, 'test2@test.com'),
(30, 19, 'test@test.com'),
(31, 18, 'test@test.com'),
(32, 13, 'test@test.com'),
(36, 12, 'anna.barassi@virgilio.it'),
(37, 12, 'test@test.com'),
(39, 19, 'cristianobombardo@hotmail.it'),
(44, 18, 'cristianobombardo@hotmail.it'),
(45, 12, 'cristianobombardo@hotmail.it'),
(46, 20, 'cristianobombardo@hotmail.it');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `music_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `nome`, `cognome`, `email`, `password`, `user_type_id`, `music_type_id`) VALUES
(1, 'stefano', 'bavota', 'cristianobombardo@hotmail.it', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1),
(3, 'stefano', 'bavota', 'test@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 1),
(4, 'test', 'test', 'test2@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 4),
(5, 'matteo', 'del papa', 'test3@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Regular');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `argument`
--
ALTER TABLE `argument`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `eventi_id` (`eventi_id`);

--
-- Indici per le tabelle `eventi`
--
ALTER TABLE `eventi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `music_type_id` (`music_type_id`);

--
-- Indici per le tabelle `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`eventi_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `music_type`
--
ALTER TABLE `music_type`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventi_id` (`eventi_id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_type_id` (`user_type_id`),
  ADD KEY `music_type_id` (`music_type_id`);

--
-- Indici per le tabelle `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `argument`
--
ALTER TABLE `argument`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `eventi`
--
ALTER TABLE `eventi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT per la tabella `music_type`
--
ALTER TABLE `music_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `argument`
--
ALTER TABLE `argument`
  ADD CONSTRAINT `argument_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `argument_ibfk_2` FOREIGN KEY (`eventi_id`) REFERENCES `eventi` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `eventi`
--
ALTER TABLE `eventi`
  ADD CONSTRAINT `eventi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `eventi_ibfk_2` FOREIGN KEY (`music_type_id`) REFERENCES `music_type` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`eventi_id`) REFERENCES `eventi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`eventi_id`) REFERENCES `eventi` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`music_type_id`) REFERENCES `music_type` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
