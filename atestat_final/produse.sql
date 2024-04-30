-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mart. 31, 2021 la 02:50 PM
-- Versiune server: 10.4.14-MariaDB
-- Versiune PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `database_atestat`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produse`
--

CREATE TABLE `produse` (
  `id_prod` int(40) NOT NULL,
  `denumire` varchar(255) NOT NULL,
  `descriere` varchar(255) NOT NULL,
  `pret` int(40) NOT NULL,
  `stoc` int(40) NOT NULL,
  `categorie` int(40) NOT NULL,
  `imagine` varchar(255) NOT NULL,
  `discount` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `produse`
--

INSERT INTO `produse` (`id_prod`, `denumire`, `descriere`, `pret`, `stoc`, `categorie`, `imagine`, `discount`) VALUES
(1, 'Galerie Admisie Din Fibra De Carbon ALPHA ', 'inca nu, dar cu siguranta nu o sa fie :)', 1800, 32, 5, 'local/admisie4.jpg', 10),
(2, 'Turbina Garret 60mm', 'inca nu, dar cu siguranta nu o sa fie :)', 2300, 32, 1, 'local/turbina1.jpeg', 0),
(3, 'Turbina Garret 40mm', 'inca nu, dar cu siguranta nu o sa fie :)', 1980, 32, 1, 'local/turbina2.jpeg', 0),
(4, 'Turbina ProTuning P1', 'inca nu, dar cu siguranta nu o sa fie :)', 2134, 121, 1, 'local/turbina3.jpeg', 20),
(5, 'Turbina ProTuning P2 Pro', 'inca nu, dar cu siguranta nu o sa fie :)', 2300, 12, 1, 'local/turbina4.jpeg', 0),
(6, 'Turbina ProTuning P3', 'inca nu, dar cu siguranta nu o sa fie :)', 2900, 0, 1, 'local/turbina5.jpeg', 0),
(7, 'Intercooler ProTech Z1', 'inca nu, dar cu siguranta nu o sa fie :)', 400, 21, 1, 'local/intercular1.jpeg', 0),
(8, 'Intercooler ProTech Z2 50mm', 'inca nu, dar cu siguranta nu o sa fie :)', 670, 32, 1, 'local/intercular2.jpeg', 5),
(9, 'Intercooler ProTech Z3 60mm', 'inca nu, dar cu siguranta nu o sa fie :)', 390, 324, 1, 'local/intercular3.jpeg', 0),
(10, 'Compresor SuperCharger Magnuson', 'inca nu, dar cu siguranta nu o sa fie :)', 4500, 13, 1, 'local/charger1.jpg', 0),
(11, 'Compresor SuperCharger ProAlpha', 'inca nu, dar cu siguranta nu o sa fie :)', 3900, 4, 1, 'local/charger2.jpg', 0),
(12, 'Piston Duraluminiu 60mm', 'inca nu, dar cu siguranta nu o sa fie :)', 450, 0, 2, 'local/piston1.jpg', 10),
(13, 'Piston Duraluminiu Diesel 65mm', 'inca nu, dar cu siguranta nu o sa fie :)', 390, 224, 2, 'local/piston2.jpg', 0),
(14, 'Set Piston Aluminiu 50mm + Biela Titan 120mm', 'inca nu, dar cu siguranta nu o sa fie :)', 890, 45, 2, 'local/piston3.jpg', 0),
(15, 'Set 4 Pistoane Aluminiu 60mm + 4 Biele Titan 131mm', 'inca nu, dar cu siguranta nu o sa fie :)', 3000, 24, 2, 'local/piston4.jpg', 0),
(16, 'Biela Titan 120mm x 30mm', 'inca nu, dar cu siguranta nu o sa fie :)', 700, 32, 2, 'local/biela1.jpg', 15),
(17, 'Biela Aluminiu 130mm x 41mm', 'inca nu, dar cu siguranta nu o sa fie :)', 900, 432, 2, 'local/biela3.jpg', 0),
(18, 'Set 4 Biele Titan 140mm x 40mm', 'inca nu, dar cu siguranta nu o sa fie :)', 2000, 0, 2, 'local/biela2.jpg', 0),
(19, 'Set 2 Axe Came 700mm', 'inca nu, dar cu siguranta nu o sa fie :)', 1800, 234, 3, 'local/ax1.jpg', 0),
(20, 'Set 2 Axe Came 730mm Pro', 'inca nu, dar cu siguranta nu o sa fie :)', 1800, 43, 3, 'local/ax2.jpeg', 10),
(21, 'Set 2 Axe Came 820mm ProTuning', 'inca nu, dar cu siguranta nu o sa fie :)', 1300, 432, 3, 'local/ax3.jpg', 0),
(22, 'Set 4 Axe Came 790mm Cosworth', 'inca nu, dar cu siguranta nu o sa fie :)', 2180, 43, 3, 'local/ax4.jpg', 0),
(23, 'Ax Came CrowCams 800mm', 'inca nu, dar cu siguranta nu o sa fie :)', 600, 0, 3, 'local/ax5.jpg', 0),
(24, 'Set Complet Supape Ferrea (10 bucati)', 'inca nu, dar cu siguranta nu o sa fie :)', 700, 43, 4, 'local/supapa1.jpg', 5),
(25, 'Set Complet Supape Ferrea (24 bucati) Pentru V8', 'inca nu, dar cu siguranta nu o sa fie :)', 2000, 543, 4, 'local/supapa2.jpg', 0),
(26, 'Set 2 Supape Ferrea S1', 'inca nu, dar cu siguranta nu o sa fie :)', 490, 324, 4, 'local/supapa3.jpg', 0),
(27, 'Galerie Admisie Din Fibra De Carbon ProV8', 'inca nu, dar cu siguranta nu o sa fie :)', 2700, 43, 5, 'local/admisie1.jpg', 25),
(28, 'Galerie Admisie Din Fibra De Cal', 'inca nu, dar cu siguranta nu o sa fie :)', 1800, 231, 5, 'local/admisie3.jpg', 0),
(29, 'Galerie Admisie Din Fibra De Carbon ProTuning 2JZ', 'inca nu, dar cu siguranta nu o sa fie :)', 1680, 1223, 5, 'local/admisie2.jpg', 0),
(30, 'Galerie Evacuare Pro1', 'inca nu, dar cu siguranta nu o sa fie :)', 980, 98, 6, 'local/ex1.jpg', 10),
(31, 'Galerie Evacuare HKS', 'inca nu, dar cu siguranta nu o sa fie :)', 1100, 42, 6, 'local/ex2.jpg', 0),
(32, 'Set Galerie Evacuare LS2', 'inca nu, dar cu siguranta nu o sa fie :)', 1800, 76, 6, 'local/ex3.jpg', 0),
(33, 'Cutie Viteze Secventiala 5+1', 'inca nu, dar cu siguranta nu o sa fie :)', 2300, 34, 7, 'local/gear2.jpg', 10),
(34, 'Cutie Viteze Secventiala 6+1 HKS', 'inca nu, dar cu siguranta nu o sa fie :)', 3400, 78, 7, 'local/gear3.jpg', 0),
(35, 'Cutie Viteze Secventiala 5+1 SQK', 'inca nu, dar cu siguranta nu o sa fie :)', 2980, 34, 7, 'local/gear4.jpg', 0),
(36, 'Cutie Viteze Secventiala 4+1 SS', 'inca nu, dar cu siguranta nu o sa fie :)', 1900, 76, 7, 'local/gear5.jpg', 15),
(37, 'Cutie Viteze Secventiala 6+1 MAX Shift', 'inca nu, dar cu siguranta nu o sa fie :)', 3600, 5, 7, 'local/gear6.jpg', 0),
(38, 'Kit Protoxid De Azot NOS1', 'inca nu, dar cu siguranta nu o sa fie :)', 800, 54, 8, 'local/nos1.jpg', 0),
(39, 'Kit Protoxid De Azot ProN', 'inca nu, dar cu siguranta nu o sa fie :)', 1200, 21, 8, 'local/nos2.jpg', 5),
(42, 'Butelie Protoxid De Azot', 'inca nu, dar cu siguranta nu o sa fie :)', 290, 321, 8, 'local/nos3.jpg', 0);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `produse`
--
ALTER TABLE `produse`
  MODIFY `id_prod` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
