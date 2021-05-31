-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 31, 2021 alle 15:17
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
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac.', 18, 3);

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
(12, 'https://images-na.ssl-images-amazon.com/images/I/51clTrXCI8L._AC_.jpg', 'Blues Brother', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-05-24', 0, 3, 2),
(13, 'https://cdn3.volusion.com/bxqxk.xvupj/v/vspfiles/photos/ROCK_868-2.jpg?v-cache=1333139669', 'Eric Clapton', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-05-24', 2, 3, 2),
(17, 'https://images-na.ssl-images-amazon.com/images/I/614ma-mN79L._AC_SY741_.jpg', 'Stevie ray', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-06-06', 1, 1, 2),
(18, 'https://images-na.ssl-images-amazon.com/images/I/513iyuE3xaL._AC_.jpg', 'BB KING', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-06-04', 997, 1, 2),
(19, 'https://www.prints4u.net/wp-content/uploads/2020/01/Halsey-039.jpg', 'Halsey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-03-15', 498, 1, 3),
(20, 'https://phenomenon.it/sites/default/files/events/locandina-2017-10/Schermata%202016-03-22%20alle%2017.23.24.png', 'Gemitaiz', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus euismod diam in augue aliquam, ac pulvinar ligula volutpat. Phasellus lobortis, ante vulputate porta faucibus, metus felis tempus nunc, vel pretium libero sem ut augue. Mauris consectetur dolor tellus, in maximus felis euismod ac. Phasellus eu diam malesuada, condimentum nisl quis, iaculis sapien. Praesent ac lobortis tortor. Fusce mattis elementum felis, vitae efficitur magna tristique eu. In pulvinar nunc mi, ut fermentum tellus ullamcorper quis. Curabitur semper tempor nulla, vel blandit dolor porta id.', '2021-05-08', 397, 1, 4);

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
(12, 3),
(13, 3);

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
(31, 18, 'test@test.com');

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
(3, 'Stefano', 'Bavota', 'test@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2),
(4, 'test', 'test', 'test2@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2),
(5, 'matteo', 'del papa', 'test@test3.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `eventi`
--
ALTER TABLE `eventi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `music_type`
--
ALTER TABLE `music_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
