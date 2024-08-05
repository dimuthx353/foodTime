-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 10:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_time`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `balance` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `userName`, `item`, `balance`) VALUES
(1, 'kavisha', 'Chilli Chicken', 2840),
(2, 'kavisha', 'Chicken Kottu', 1000),
(3, 'kavisha', 'Chilli Chicken', 2840),
(6, 'kavisha', 'Chilli Chicken', 2840),
(7, 'kavisha', 'Chicken Kottu', 1000),
(8, 'kavisha', 'Chicken Kottu', 1000),
(9, 'kavisha', 'Cheesy Onion', 2840),
(10, 'kavisha', 'Chilli Chicken', 2840),
(17, 'dimuth', 'Chicken Cheese', 1600),
(18, 'dimuth', 'Chicken Kottu', 1000),
(19, 'dimuth', 'Chicken Cheese', 1600);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imgSrc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `itemName`, `category`, `price`, `description`, `imgSrc`) VALUES
(7, 'Seafood Cheese', 'kottu', 1800, 'hese dishes are often regarded as some of the best in theustomers are treate', 'https://hotelsamanala.com/wp-content/uploads/2022/11/Cheese-kottu1-768x768.jpg'),
(8, 'Chicken Cheese', 'kottu', 1600, ' Thisn, stir-fried with a mix of spices and herbs for an extra layer of flavor. All ingredients used in the preparation of this meal are of the best quality, resulting in a tantalizing taste that wi', 'https://hotelsamanala.com/wp-content/uploads/2022/11/Cheese-kottu1-768x768.jpg'),
(9, 'Chicken Kottu', 'kottu', 1000, 'This dish is a combination of fragrant rice and tender chicken, stir-fried with a mix of spices and herbs for an extra layer of flavor. All ingredients used in the preparation of this meal are of the best quality, resulting in a tantalizing taste that wil', 'https://hotelsamanala.com/wp-content/uploads/2022/11/chic-kottu1-768x768.jpg'),
(10, 'Chilli Chicken', 'pizza', 2840, 'A pizza topped with Spicy Chicken, Green Chillies, Onions & Mozzarella', 'https://adminsc.pizzahut.lk//images/mainmenu/9a4b439b-c193-49a0-a946-1a3d6e8f6dd5.jpg'),
(11, 'Cheesy Onion', 'pizza', 2840, 'Rich tomato sauce base topped with cream cheese, onions, green chillies & Mozzarella.', 'https://adminsc.pizzahut.lk//images/mainmenu/bd42b87d-ab7c-42c2-a8af-b461efaad48d.jpg'),
(12, 'Cheesy Tomato', 'pizza', 3000, 'Rich tomato sauce base topped with cream cheese, onions, tomato, green chillies & Mozzarella', 'https://adminsc.pizzahut.lk//images/mainmenu/c0df92e8-c6c1-43bb-8630-ac2631abf5ee.jpg'),
(13, 'Sausage Delight', 'pizza', 2500, 'Chicken sausages & onions with a double layer of cheese.', 'https://adminsc.pizzahut.lk//images/mainmenu/1bf84662-1902-4b94-9078-2da46056904f.jpg'),
(14, 'Chicken Bacon', 'pizza', 2400, 'A flavoursome duo of chicken bacon and spicy potatoes on a fiery base of Nai Miris sauce complemented with crunchy onions and green chillies, topped with a layer of mozzarella cheese', 'https://adminsc.pizzahut.lk//images/mainmenu/e21a91b2-e470-4aae-a5e0-e8a372be2e45.jpg'),
(15, 'Chicken Kabsa (Arabian)', 'rice', 1700, 'The main Ingredients are Rice (Basmati) Chicken, Vegetables, and a mixture of spices -saffron, black pepper, cloves, cardamom, cinnamon, black lime, bay leaves, nutmeg, etc.', 'https://www.foodchow.com/image.php?url=FoodItemImages/4132_2021-09-04_05-38-00001544bc7-5a78-45c6-82d1-a56af2c21d73.jpg&width=150&height=100'),
(16, 'Maqluba (Savory Rice Cake)', 'rice', 1800, 'Main Ingredients - Rice, Chicken, Vegetables', 'https://www.foodchow.com/image.php?url=FoodItemImages/4132_2021-08-16_14-06-39086b5d4f4-c551-4d9d-acc8-87e9b8103caf.jpg&width=150&height=100'),
(17, 'Risotto (Italian)', 'rice', 1200, 'The main Ingredients are Rice, Clove, Garlic, Parmesan Cheese, Prawns', 'https://www.foodchow.com/image.php?url=FoodItemImages/4132_2021-09-04_05-41-560a36b5525-1e33-4abc-8427-fad15b1f06ac.jpg&width=150&height=100'),
(21, 'EH Major', 'ice_cream', 100, 'Elephant House Major Max Orange Popsicle 50Ml', 'https://www.onlinekade.lk/wp-content/uploads/2024/05/18002-300x300.jpg'),
(22, 'EH Major Wonder', 'ice_cream', 160, 'Elephant House Wonder Cone Faluda 120Ml', 'https://www.onlinekade.lk/wp-content/uploads/2024/03/4791066100655-300x300.jpg'),
(23, 'EH Fruit', 'ice_cream', 160, 'Elephant House Fruit&Nut Cup 80Ml', 'https://www.onlinekade.lk/wp-content/uploads/2024/01/4791066000955-300x300.jpg'),
(24, 'Big Mac', 'buger', 160, '590 Cal', 'https://s7d1.scene7.com/is/image/mcdonalds/Header_BigMac_832x472:nutrition-calculator-tile'),
(25, 'Quarter Pounder', 'buger', 460, '520 Cal.', 'https://s7d1.scene7.com/is/image/mcdonalds/DC_202201_0007-005_QuarterPounderwithCheese_832x472:product-header-desktop?wid=830&hei=458&dpr=off');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(40) NOT NULL,
  `userName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(40) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `userName`, `email`, `password`, `status`) VALUES
(1, 'dimuth', 'dimuth@gmail.com', '$2y$10$MwL0U8nVhS9vJxwpajh57.fTzWDU0ywaICqIjCbixJ5aZi4ro1tyq', 1),
(2, 'kavisha', 'kavisha@gmail.com', '$2y$10$Fue7J60u66vWLPM4.kxz6..yOMLX4hoAODaT8jMVzpgew4lM1mNYW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
