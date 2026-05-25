-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 06, 2026 at 04:50 PM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boris`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `price` int NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `image`) VALUES
(7, 'Porsche Carrea 4S', 'The Porsche Carrera 4S is a refined version of the iconic 911, offering a balanced combination of performance and luxury. With its all-wheel drive, it provides enhanced traction and stability, making it suitable for a variety of driving conditions. The 3.8-liter engine delivers impressive power, and the cars precise handling is complemented by its sleek design. Its a well-rounded choice for enthusiasts who seek everyday usability without sacrificing performance.', 70000, 'https://www.carkeys.co.uk/media/13497/porsche-911-carrera-4s-review.jpg?anchor=center&mode=crop&width=1200&height=800'),
(8, 'Porsche Taycan Turbo GT', 'The 2025 Porsche Taycan Turbo GT is an electrifying leap into the future. Powered by dual motors and delivering over 600 horsepower, it reaches 0-60 mph in under 3 seconds, a testament to its track-ready performance. With advanced regenerative braking, an ultra-responsive chassis, and a top speed of 200 mph, the Taycan Turbo GT merges sustainability with Porsches signature driving dynamics. Its cutting-edge technology and range of over 200 miles per charge make it a competitive force in the electric sports sedan market.', 180000, 'https://cdn.hiconsumption.com/wp-content/uploads/2024/03/2025-Porsche-Taycan-Turbo-GT-0-Hero.jpg'),
(9, 'Porsche 959', 'The Porsche 959, introduced in 1986, is a groundbreaking supercar that combined cutting-edge technology with Porsches racing heritage. Initially conceived for Group B rally, it featured a 2.85-liter twin-turbocharged flat-six engine producing 450 horsepower. Its advanced all-wheel-drive system, adjustable suspension, and lightweight construction set new standards for performance and handling. With a top speed of 315 km/h and 0-100 km/h in under 4 seconds, the 959 was one of the fastest production cars of its era, influencing future Porsche models and solidifying its place as a timeless automotive icon.', 700000, 'https://s3.amazonaws.com/excellence/images/jumbo/7477/pi-ch-s-prototype-1.jpg?1651265444'),
(10, 'Porsche 911 997 GT3RS', 'The Porsche 911 997 GT3 RS is one of the most celebrated track-focused 911 models ever built. Introduced as the raw, purist version of the already sharp GT3, the RS pushes the driving experience even further with aggressive lightweighting, sharper aerodynamics, and a chassis tuned for absolute precision. Its 3.6-liter (later 3.8-liter in the 997.2) naturally aspirated flat-six revs eagerly, delivering a thrilling, linear power band that rewards drivers who chase the redline.\r\n            The 997 GT3 RS stands out visually with its wide stance, bold graphics, and signature carbon-fiber wing—functional elements that improve stability at high speeds. A stripped-down interior, firmer suspension, and adjustable components make it a true track weapon. Yet even with its race-ready personality, the car remains engaging and usable on the road.\r\n            Highly regarded for its analog feel, manual gearbox, and direct steering, the 997 GT3 RS is often considered one of the greatest drivers 911s ever made.', 150001, 'https://www.pcarmarket.com/static/media/uploads/galleries/photos/uploads/galleries/40981-piekarski-2010-porsche-911-gt3rs/.thumbnails/Porsche_BaTGT3RS_Whi-3.webp/Porsche_BaTGT3RS_Whi-3-tiny-1200x0.webp'),
(11, 'Porsche Cayenne 1st generation', 'The first-generation Porsche Cayenne, introduced in 2002, was a bold move for the brand, combining luxury SUV attributes with Porsches performance DNA. Powered by a range of engines from V6s to V8s, the Cayenne delivered impressive off-road capability and on-road agility. Its athletic handling, high-quality interior, and robust design made it a top choice for those seeking both practicality and Porsches renowned driving experience in an SUV.', 20000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR7I86dq79qmNm5nUevRsg0r58hbcusUgblTA&s'),
(12, 'Porsche Macan 1st generation', 'The 2015 Porsche Macan Turbo is the performance flagship of the early Macan lineup, combining SUV practicality with true sports-car behavior. It uses a 3.6-liter twin-turbo V6 producing 400 hp, giving the compact SUV sharp acceleration and a thrilling exhaust note. With Porsches precise steering, quick-shifting 7-speed PDK, and all-wheel drive, the Macan Turbo feels planted, agile, and confident in all conditions. Inside, it offers a luxurious, driver-focused interior with high-quality materials and strong comfort. The 2015 Turbo stands out as one of the sportiest SUVs of its time.', 38000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQwtKYp152KpNfvgWWO6TVMtLbrLU9AY499P_IFWcCKZvfBSg19aqtVPwndTADBeVMUTQ&usqp=CAU');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `avatar`) VALUES
(11, 'boris', 'teryan', 'f44@gmail', '$2y$10$eJnT4D1bLvPK.mSOnokbK.N26g1DEhVJSx.b0WT8xgNAgR0xCgjBW', 'https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o='),
(12, 'aa', 'aa', 'aa@aa.aa', '$2y$10$7HHm3N7w7bbrIfl0JjZ2zu7QOn0GpLd3hXDE1f47ngvfNPTmftn5q', 'https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
