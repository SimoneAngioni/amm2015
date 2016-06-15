-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Giu 15, 2016 alle 15:40
-- Versione del server: 10.1.9-MariaDB
-- Versione PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amm15-angionisimone`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id_carrello` int(4) NOT NULL,
  `veicolo_id` int(4) NOT NULL,
  `utente_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id_utenti` int(4) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id_utenti`, `nome`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'utente', 'utente');

-- --------------------------------------------------------

--
-- Struttura della tabella `veicolo`
--

CREATE TABLE `veicolo` (
  `id` int(5) NOT NULL,
  `targa` varchar(8) NOT NULL,
  `modello` varchar(255) NOT NULL,
  `immagine` varchar(2000) NOT NULL,
  `descrizione` varchar(2000) NOT NULL,
  `prezzo` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `veicolo`
--

INSERT INTO `veicolo` (`id`, `targa`, `modello`, `immagine`, `descrizione`, `prezzo`) VALUES
(2, '12345', 'Cavallo', 'http://aforisticamente.com/wp-content/uploads/2014/12/cavallo_a.jpg', 'Ciao Sono un bel Cavallo', '300.000'),
(3, 'CL121BS', 'Fiat Idea', 'http://www.viarural.com.ar/viarural.com.ar/insumosagropecuarios/ganaderos/vehiculos/fiat/idea/verde-colores-idea.png', 'utilitaria', '14503.000');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id_carrello`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id_utenti`);

--
-- Indici per le tabelle `veicolo`
--
ALTER TABLE `veicolo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id_carrello` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id_utenti` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `veicolo`
--
ALTER TABLE `veicolo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
