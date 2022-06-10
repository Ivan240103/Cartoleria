-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 18, 2022 alle 13:54
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE Cartoleria;

USE Cartoleria;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartoleria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `idArticolo` int(11) NOT NULL,
  `descrizione` char(100) NOT NULL,
  `prezzo` decimal(5,2) NOT NULL,
  `idProduttore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`idArticolo`, `descrizione`, `prezzo`, `idProduttore`) VALUES
(1, 'biro', '2.50', 1),
(2, 'quaderno', '3.00', 2),
(3, 'gomma', '1.40', 2),
(4, 'temperamatite', '5.20', 2),
(5, 'astuccio', '7.30', 3),
(6, 'puntine da disegno (50)', '1.20', 1),
(7, 'matita', '1.30', 1),
(8, 'bianchetto', '4.40', 4),
(9, 'righello', '2.15', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `autorizzati`
--

CREATE TABLE `autorizzati` (
  `idUtente` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `autorizzati`
--

INSERT INTO `autorizzati` (`idUtente`, `username`, `password`) VALUES
(1, 'root', 'secret'),
(2, 'ivan', 'ivan'),
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `produttore`
--

CREATE TABLE `produttore` (
  `idProduttore` int(11) NOT NULL,
  `denominazione` char(30) NOT NULL,
  `citta` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `produttore`
--

INSERT INTO `produttore` (`idProduttore`, `denominazione`, `citta`) VALUES
(1, 'LINEA srl', 'Bologna'),
(2, 'CART spa', 'Firenze'),
(3, 'CONTENITORS srl', 'Napoli'),
(4, 'BUFFETTI', 'Bologna');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`idArticolo`),
  ADD KEY `ArtProd` (`idProduttore`);

--
-- Indici per le tabelle `autorizzati`
--
ALTER TABLE `autorizzati`
  ADD PRIMARY KEY (`idUtente`);

--
-- Indici per le tabelle `produttore`
--
ALTER TABLE `produttore`
  ADD PRIMARY KEY (`idProduttore`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articoli`
--
ALTER TABLE `articoli`
  MODIFY `idArticolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `autorizzati`
--
ALTER TABLE `autorizzati`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `produttore`
--
ALTER TABLE `produttore`
  MODIFY `idProduttore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `articoli`
--
ALTER TABLE `articoli`
  ADD CONSTRAINT `ArtProd` FOREIGN KEY (`idProduttore`) REFERENCES `produttore` (`idProduttore`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
