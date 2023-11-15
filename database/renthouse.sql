-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2023 pada 06.08
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renthouse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `add_property`
--

CREATE TABLE `add_property` (
  `property_id` int(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `vdc_municipality` varchar(50) NOT NULL,
  `ward_no` int(10) NOT NULL,
  `tole` varchar(100) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `estimated_price` bigint(10) NOT NULL,
  `total_rooms` int(10) NOT NULL,
  `bedroom` int(10) NOT NULL,
  `living_room` int(10) NOT NULL,
  `kitchen` int(10) NOT NULL,
  `bathroom` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `booked` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `add_property`
--

INSERT INTO `add_property` (`property_id`, `country`, `province`, `zone`, `district`, `city`, `vdc_municipality`, `ward_no`, `tole`, `contact_no`, `property_type`, `estimated_price`, `total_rooms`, `bedroom`, `living_room`, `kitchen`, `bathroom`, `description`, `latitude`, `longitude`, `owner_id`, `booked`) VALUES
(123, 'Nepal', 'Bagmati Pradesh', 'Bagmati', 'Taplejung', 'Kirtipur', 'Municipality', 3, 'palifal', 9860462146, 'Full House Rent', 2000000, 2, 3, 3, 3, 3, 'nmjhvgc', 27.679130, 85.327872, 1, ''),
(124, 'Nepal', 'Gandaki Pradesh', 'Gandaki', 'Kaski', 'Pokhara', 'Municipality', 14, 'Lakeside', 9803480519, 'Full House Rent', 2000000, 15, 5, 2, 2, 7, 'This is a beautiful property located near Lakeside, Pokhara.', 27.679130, 85.327872, 1, ''),
(125, 'Nepal', 'Province No. 1', 'Bheri', 'Panchthar', 'BANDA ACEH', '', 0, 'asd', 0, 'Full House Rent', 123123123, 1, 1, 1, 1, 1, '1', 5.568923, 95.362562, 2, 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'nikeshtiwari3230@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `tenant_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `booked` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`tenant_id`, `property_id`, `booked`) VALUES
(18, 125, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `owner_id` int(255) NOT NULL,
  `tenant_id` int(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`owner_id`, `tenant_id`, `message`) VALUES
(1, 18, 'hello'),
(2, 18, 'hai za\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `owner`
--

INSERT INTO `owner` (`owner_id`, `full_name`, `email`, `password`, `phone_no`, `address`, `id_type`, `id_photo`) VALUES
(1, 'Nikesh Tiwari', 'nikeshtiwari3230@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 987654321, 'Kirtipur-3', 'Citizenship', 'owner-photo/nikesh.png'),
(2, 'eki', 'eki@gmail.com', '202cb962ac59075b964b07152d234b70', 123123123, '123', 'Driving Licence', 'owner-photo/WhatsApp Image 2021-08-17 at 16.18.23.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `property_photo`
--

CREATE TABLE `property_photo` (
  `property_photo_id` int(12) NOT NULL,
  `p_photo` varchar(500) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `property_photo`
--

INSERT INTO `property_photo` (`property_photo_id`, `p_photo`, `property_id`) VALUES
(174, 'product-photo/a.jpg', 123),
(175, 'product-photo/b.jpg', 123),
(176, 'product-photo/b.jpg', 124),
(177, 'product-photo/a.jpg', 124),
(178, 'product-photo/Screenshot 2022-11-26 223337.jpg', 125);

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int(5) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`review_id`, `comment`, `rating`, `property_id`) VALUES
(5, 'This property is very nice.', 5, 123),
(6, 'I love this property.', 4, 124),
(7, 'ssoo good', 5, 123),
(8, 'this properties so niceee', 4, 125);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `full_name`, `email`, `password`, `phone_no`, `address`, `id_type`, `id_photo`) VALUES
(17, 'Nikesh Tiwari', 'nikeshtiwari3230@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 987654321, 'Kirtipur-3', 'Citizenship', 'tenant-photo/nikesh.png'),
(18, 'zaki', 'zaki@gmail.com', '202cb962ac59075b964b07152d234b70', 123123123, 'zaki', 'Citizenship', 'tenant-photo/WhatsApp Image 2021-08-17 at 16.18.23.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `add_property`
--
ALTER TABLE `add_property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indeks untuk tabel `property_photo`
--
ALTER TABLE `property_photo`
  ADD PRIMARY KEY (`property_photo_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indeks untuk tabel `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `add_property`
--
ALTER TABLE `add_property`
  MODIFY `property_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `property_photo`
--
ALTER TABLE `property_photo`
  MODIFY `property_photo_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `add_property`
--
ALTER TABLE `add_property`
  ADD CONSTRAINT `add_property_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`owner_id`);

--
-- Ketidakleluasaan untuk tabel `property_photo`
--
ALTER TABLE `property_photo`
  ADD CONSTRAINT `property_photo_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`);

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
