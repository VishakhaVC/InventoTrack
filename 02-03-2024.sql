-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 02:37 PM
-- Server version: 8.0.27
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventotrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `admin_password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin'),
(2, 'Vishakha', 'admin1@gmail.com', 'admin1'),
(3, 'Fatema ', 'fatemavaliullah@gmail.com', 'admin2'),
(4, 'Khushi', 'admin3@gmail.com', 'admin3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int NOT NULL,
  `pro_id` varchar(20) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_image` varchar(200) NOT NULL,
  `pro_price` decimal(10,2) NOT NULL,
  `pro_qty` int NOT NULL,
  `pro_subtotal` decimal(10,2) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `pro_id`, `pro_name`, `pro_image`, `pro_price`, `pro_qty`, `pro_subtotal`, `user_id`) VALUES
(45, 'L002', 'Asus TUF Gaming F17', 'l2.png', 56990.00, 7, 398930.00, 3),
(46, 'L001', 'HP Gaming Laptop', 'l1.png', 80990.00, 1, 80990.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_details`) VALUES
(1, 'Laptops', 'Differences in these core components are what distinguish laptop computers. Some core characteristics of laptops are Size, Screen resolution, Processing power, Memory, Durability, Battery life.'),
(2, 'Mobiles', 'Features including Camera, Battery, Display, Sim card, User interface, WiFi connectivity, Memory, Sound, Processor .'),
(3, 'Headphones', 'Headphones are a pair of small speakers used for listening to sound from a computer, music player or other such electronic device. Headphones originally consisted of one speaker for each ear, connected by a band over the head.'),
(7, 'Speakers', 'Specifications for speakers include sound pressure level, nominal input power, input impedance, frequency response, speaker size, and speaker weight.'),
(8, 'Tablets', 'Touchscreen interface that enables you to navigate and interact with the device using your fingers or a stylus. Portability, Connectivity and Compability are its key features.'),
(9, 'Printer', 'Useful computer component for printing documents, photographs, posters and more. Shop from a wide range of laser, inkjet and all-in-one printers at the best prices.'),
(10, 'Television', 'With the rapidly changing technology, it becomes important to upgrade with times. Purchase a Smart TV and enjoy a hassle-free and seamless TV watching experience. Smart TVs are connected to the internet, allowing you to stream various media services and access entertainment apps.                    ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int NOT NULL,
  `feedback_date` date NOT NULL,
  `feedback_ratings` float NOT NULL,
  `feedback_comments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_id` int NOT NULL,
  `product_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_date`, `feedback_ratings`, `feedback_comments`, `user_id`, `product_id`) VALUES
(1, '2024-01-04', 4.5, 'It value for money, fluent performance, battery life could be better . Even at high gaming , keyboard and trackpad area remain cool as ice , only heat dissipation area become hot that\'s perfect . Go for it if you are gamer or high end user.', 3, 'L001'),
(2, '2023-12-25', 4, 'The look and feel of this laptop is premium. The build quality is also very nice. I personally visited multiple shops to get a hold of laptops in this price segment. And finally ended up on this gaming beast. Just go for it.', 3, 'L002'),
(3, '2023-12-28', 4.5, 'Cons Only front camera is not good is like 2mp laptop camera, and weight is 208g, and only support 1080ps on YouTube maximum.\r\n                                                            Pro, back camera is satisfying and screen is on brightest side with loud single speaker.\r\n                                                            Charging is fast with 25 watt takes 1hr15 min 80%.', 3, 'M001'),
(4, '2024-01-10', 5, '-Best part you will enjoy is this has 120hz refresh rate feel so smooth.\r\n                                                            -6 GB Ram which can be increase 6 GB virtual.\r\n                                                            -33w charger come in box that make it best in this price range.', 3, 'M002'),
(5, '2024-01-01', 3.5, 'It works great, sounds nice according to the price, but starts to get uncomfortable after about an hour or so, too tight, maybe because they are new.\r\n                                                            Also, you will have to keep your phone close, the range doesn\'t seem to be more than 3-4 meters and doesn\'t work when there\'s a wall in between phone and headphone', 3, 'H001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manager`
--

CREATE TABLE `tbl_manager` (
  `manager_id` int NOT NULL,
  `manager_name` varchar(20) NOT NULL,
  `manager_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `manager_password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_manager`
--

INSERT INTO `tbl_manager` (`manager_id`, `manager_name`, `manager_email`, `manager_password`) VALUES
(1, 'manager1', 'manager1@gmail.com', 'manager1'),
(2, 'manager2', 'manager2@gmail.com', 'manager2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `orderdetails_id` int NOT NULL,
  `order_quantity` int NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_total_amount` decimal(10,2) NOT NULL,
  `order_id` int NOT NULL,
  `product_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`orderdetails_id`, `order_quantity`, `order_price`, `order_total_amount`, `order_id`, `product_id`) VALUES
(1, 1, 80990.00, 80990.00, 3, 'L001'),
(3, 2, 56990.00, 56990.00, 6, 'L002'),
(4, 2, 2699.00, 5398.00, 6, 'H001'),
(5, 5, 12499.00, 62495.00, 7, 'M002'),
(6, 1, 56990.00, 56990.00, 8, 'L002'),
(7, 2, 14999.00, 29998.00, 8, 'M001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_master`
--

CREATE TABLE `tbl_order_master` (
  `order_id` int NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order_master`
--

INSERT INTO `tbl_order_master` (`order_id`, `order_date`, `order_status`, `user_id`) VALUES
(3, '2024-02-16', 'Pending', 5),
(6, '2024-02-17', 'Confirmed', 5),
(7, '2024-02-16', 'Processing', 3),
(8, '2024-02-17', 'Processing', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` varchar(20) NOT NULL,
  `product_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int NOT NULL,
  `category_id` int NOT NULL,
  `product_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_details`, `product_price`, `product_quantity`, `category_id`, `product_image`) VALUES
('H001', 'JBL Tune 510BT', 'Headphones with Mic, up to 40 Hours Playtime, Pure Bass, Quick Charging, Dual Pairing, Bluetooth 5.0 & Voice Assistant Support for Mobile Phones (Black)', 2699.00, 40, 3, 'h1.png'),
('H002', 'ZEBRONICS New Wired Headphone', 'Over Ear, in-Line MIC, Foldable, 1.5 Meter Cable, for 3.5mm (Mobile | Tablet | Laptop | MAC), Soft Cushion, 40mm Drivers (Black)', 599.00, 35, 3, 'h2.png'),
('H003', 'HAMMER Wireless Bluetooth Headphones with Mic', 'Touch Control, Deep Bass, Upto 18 Hours Playtime, Bluetooth 5.3, Workout/Travel (Cool Grey)', 2299.00, 70, 3, 'h3.png'),
('H004', 'Amazon Basics Headphones', 'Wired Over The Ear Gaming Headphones with Mic | RGB | 7.1 Channel Surround Audio | Remote Control (Black)', 1899.00, 35, 3, 'h4.png'),
('H005', 'Sony MDR-ZX110A', 'Wired On Ear Headphone without Mic (White) | Slim, folding design for easy portability | Warranty: 1 Year', 799.00, 45, 3, 'h5.png'),
('L001', 'HP Gaming Laptop', 'Built with the powerful AMD Ryzen 7 7840HS , 16 GB DDR5-5600 MHz RAM (2 x 8 GB) and 1 TB PCIe Gen4 NVMe TLC M.2 SSD', 80990.00, 20, 1, 'l1.png'),
('L002', 'Asus TUF Gaming F17', 'Intel Core i5-11400H 11th Gen, 17.3-inch (43.94 cm) FHD 144Hz, Gaming Laptop (8GB/512GB SSD/4GB NVIDIA GeForce RTX 2050/Win 11/ RGB Backlit KB/Black/2.60 kg), FX706HF-HX018W.', 56990.00, 25, 1, 'l2.png'),
('L003', 'Dell 15 Laptop', 'Intel Core i5-1135G7 Processor/16GB DDR4/512GB SSD/Intel UHD Graphic/15.6\" (39.562cm) FHD Display/Win 11+MSO 21/15 Month McAfee/Spill-Resistant Keyboard/Carbon/Thin & Light 1.69kg', 47990.00, 55, 1, 'l3.png'),
('L004', 'Samsung Galaxy Book3', 'Core i5 13th Gen 1335U - (16 GB/512 GB SSD/Windows 11 Home) Galaxy Book3 Thin and Light Laptop  (15.6 Inch, Silver, 1.58 Kg, with MS Office)', 67490.00, 70, 1, 'l4.png'),
('L005', 'Apple MacBook Air Laptop', 'M1 chip, 13.3-inch/33.74 cm Retina Display, 8GB RAM, 256GB SSD Storage, Backlit Keyboard, FaceTime HD Camera, Touch ID. Works with iPhone/iPad Gold', 83990.00, 25, 1, 'l5.png'),
('M001', 'Samsung Galaxy M34 5G', 'Prism Silver, 6GB, 128GB) | 120Hz sAMOLED Display | 50MP Triple No Shake Cam | 6000 mAh Battery | 4 Gen OS Upgrade & 5 Year Security Update | 12GB RAM with RAM+ | Android 13 | Without Charger', 14999.00, 50, 2, 'm1.png'),
('M002', 'Realme Narzo 60X 5G', 'Nebula Purple 6GB,128GB Storage | Up to 2TB External Memory | 50 MP AI Primary Camera | Segments only 33W Superwooc Charge', 12499.00, 40, 2, 'm2.png'),
('M003', 'iQOO Z7 Pro 5G', 'Blue Lagoon, 8GB RAM, 128GB Storage) | 3D Curved AMOLED Display | 4nm MediaTek Dimesity 7200 5G Processor | 64MP Aura Light OIS Camera | Segment Slimmest & Lightest Smartphone', 23999.00, 50, 2, 'm3.png'),
('M004', 'Apple iPhone 13', '(128GB) - Blue 15 cm (6.1-inch) Super Retina XDR display | Cinematic mode | Advanced dual-camera system with 12MP Wide and Ultra Wide cameras; Photographic Styles, Smart HDR 4, Night mode, 4K Dolby Vision HDR recording', 51790.00, 60, 2, 'm4.png'),
('M005', 'OnePlus 12', 'Flowy Emerald, 12GB RAM, 256GB Storage | Pristine 2K Display with Aqua Touch | OxygenOS based on Android 14 | Ultra fast charging, unwired | Dual SIM Dual Active, WiFi 7 Ready, Enhanced Wi-Fi, Lower gaming latency, Reduced network recovery time', 64999.00, 45, 2, 'm5.png'),
('P001', 'Epson EcoTank L3211', 'All-in-One Ink Tank Printer (Black) | Space-saving Design, Spill-free Refilling | Print resolution - 5760 x 1440 | (Print, Scan, Copy)', 11499.00, 15, 9, 'p1.png'),
('P002', 'HP Ink Advantage 4278 Printer', 'Automatic Document Feeder (ADF) | Print | Copy | Scan | WiFi | Bluetooth | USB | Simple Setup Smart App | Ideal for Home', 9999.00, 30, 9, 'p2.png'),
('P003', 'HP Smart Tank 580', 'AIO WiFi Colour Printer with 1 Extra Black Ink Bottle (Upto 12000 Black & 6000 Colour Prints) + 1 Year Extended Warranty with PHA Coverage -Print, Scan & Copy', 15449.00, 50, 9, 'p3.png'),
('P004', 'HP Laserjet Pro M126nw', 'All-in-One B&W Printer for Home | Easy Mobile Printing | Monochrome | HP 88A Black LaserJet Toner Cartridge | Rely on peak performance with up to 8000 pages of duty cycle', 21166.00, 45, 9, 'p4.png'),
('P005', 'Canon SELPHY CP1000', 'Compact Photo Printer - White | Dual ID photo printing with extended size options | Compatible with SD and CF cards | ‎1 Lithium Polymer batteries required', 9399.00, 30, 9, 'p5.png'),
('S001', 'boAt Stone 620', 'Bluetooth Speaker with 12W RMS Stereo Sound, 10HRS Playtime, TWS Feature, IPX4, Multi-Compatibility Mode(Black)', 1999.00, 80, 7, 's1.png'),
('S002', 'Zebronics ZEB-COUNTY 3W', 'Wireless Bluetooth Portable Speaker With Supporting Carry Handle, USB, SD Card, AUX, FM & Call Function. (Black)', 499.00, 50, 7, 's2.png'),
('S003', 'Sony HT-S20R', 'Real 5.1ch Dolby Digital Soundbar for TV with subwoofer and Compact Rear Speakers, 5.1ch Home Theatre System (400W,Bluetooth & USB Connectivity, HDMI & Optical connectivity)', 17990.00, 45, 7, 's3.png'),
('S004', 'Echo Dot (5th Gen)', 'Smart speaker with Bigger sound, Motion Detection, Temperature Sensor, Alexa and Bluetooth| Blue', 5499.00, 60, 7, 's4.png'),
('S005', 'Infinity - JBL Clubz Mini', 'Wireless Ultra Portable Mini Speaker with Mic, Deep Bass, Dual Equalizer, Bluetooth 5.0 with Voice Assistant Support for Mobiles (Black)', 898.00, 70, 7, 's5.png'),
('T001', 'TCL Smart Android LED TV 40S5400A', '101 cm (40 inches) Bezel-Less S Series | 2 HDMI Ports to connect set top box, Blu Ray players, gaming console | 1 USB Port| 1 Headphone output | 24 Watts Output | Dolby Audio MS 12 Y', 17990.00, 25, 10, 't1.png'),
('T002', 'Samsung 80 HD Ready Smart LED TV', '80 cm (32 inches) | 20 Watts Output | Dolby Digital Plus | Personal Computer | Screen Share | Music System | Content Guide | Connect Share Movie | LED Panel | Mega Contrast | PurColor | HD Picture Quality | Slim & Stylish Design', 14990.00, 45, 10, 't2.png'),
('T003', 'Redmi Smart LED Fire TV', '80 cm (32 inches) F Series HD | 178 wide viewing angle | 20 Watts Output | Dolby Audio | DTS Virtual: X | DTS-HD | Metal bezel-less Screen | Vivid Picture Engine | Ethernet | 3.5mm earphone Jack', 11499.00, 40, 10, 't3.png'),
('T004', 'Acer Smart LED Google TV', '80 cm (32 inches) Advanced I Series HD | 30 Watts Output | High Fidelity Speakers with Dolby Audio | 5 Sound Modes - Stadium, Standard, Movie, Music, Speech | 16.7 Million Colours | Intelligent Frame Stabilization Engine | HDR10 | Super Brightness | Micro Dimming | Blue Light Reduction', 11999.00, 55, 10, 't4.png'),
('T005', 'LG Smart LED TV', '80 cm (32 inches) HD | 16 Watts Output | 2.0 Ch Speaker | AI Sound (Virtual Surround 5.1 up-mix) | Bluetooth Surround Ready | HD Ready LED Display | Bezel-less Slim Design | HLG, HDR 10 | 1 Year LG India Warranty on the Product', 14990.00, 20, 10, 't5.png'),
('TAB001', 'Samsung Galaxy Tab A9+', '27.94 cm (11.0 inch) Display, RAM 8 GB, ROM 128 GB Expandable, Wi-Fi Tablet, Graphite', 18999.00, 65, 8, 'tab1.png'),
('TAB002', 'OnePlus Pad Go', '28.85cm (11.35 inch) 2.4K 7:5 Ratio ReadFit Eye Care LCD Display, Dolby Atmos Quad Speakers,4G LTE(Calling) + Wi-Fi Connectivity Tablet, 8GB RAM 256 GB Storage Expandable Up-to 1TB', 19999.00, 50, 8, 'tab2.png'),
('TAB003', 'Lenovo Tab M10', 'FHD 3rd Gen| 10.1 Inch (25.65 cm) | 4 GB RAM, 64 GB ROM| Wi-Fi | Full HD Display| Dual Speakers| Octa-Core Processor (Storm Grey)', 10999.00, 70, 8, 'tab3.png'),
('TAB004', 'Realme Pad X WiFi Tablet', '4GB RAM 64GB ROM (Expandable), 27.9cm (11 inch) WUXGA+ Display | 6nm SD Processor | Dolby Atmos Quad Speakers | 8340 mAh Battery | Grey Colour', 17999.00, 35, 8, 'tab4.png'),
('TAB005', 'Samsung Galaxy Tab S8', '27.81cm (11.0\") LCD Display | 4nm Processor | 8,000 mAh Battery | Dolby Atmos Quad Speakers | Android 12.0 | 8GB+128GB | Wi-Fi | S Pen Support | Graphite', 48999.00, 80, 8, 'tab5.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int NOT NULL,
  `stock_quantity` int NOT NULL,
  `stock_price` decimal(10,2) NOT NULL,
  `product_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quantity`, `stock_price`, `product_id`) VALUES
(1, 23, 56990.00, 'L002'),
(2, 20, 80990.00, 'L001'),
(4, 28, 2699.00, 'H001'),
(5, 43, 14999.00, 'M001'),
(6, 35, 12499.00, 'M002'),
(8, 50, 23999.00, 'M003'),
(9, 30, 9999.00, 'P002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int NOT NULL,
  `user_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_fullname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_mobile_number` varchar(10) NOT NULL,
  `user_address` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_fullname`, `user_email`, `user_password`, `user_mobile_number`, `user_address`) VALUES
(3, 'username', 'user name', 'user@email.com', '$2y$10$wE7j3I6Ktni49ASkybfttOU95IH2b0caP.VN8D/sXKz9OsGVs.PoW', '9858745258', '.....                    '),
(5, 'fatema04', 'Fatema Vali', 'fatemavaliullah@gmail.com', '$2y$10$gTm8Bvw1T2Nlobv2nqEVN.ndpRJ03FvGnkPxrBkfXmtwOBqCc28K6', '9712190169', 'Sarkhej, Ahmedabad                    '),
(8, 'rajvi20', 'Rajvi Mehta', 'rajvi20@gmail.com', '$2y$10$MA/R7IopAIvJG9xq1h9BQuDs9lko.XI3AMAi7OUUviQFckKOLdl5m', '9865736894', '20/3 Raj Apartments'),
(9, 'aashu30', 'Aashvi Solanki', 'aashvi3023@gmail.com', '$2y$10$UsYG75e00JkDDo99R/1xRuBEx.jYU.DIwTwPq4q26Wee1kRFcO8bK', '7896898572', '4/1 Shri Flats, Behind Shiv Mandir, Ahmedabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_manager`
--
ALTER TABLE `tbl_manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`orderdetails_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_order_master`
--
ALTER TABLE `tbl_order_master`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `orderdetails_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order_master`
--
ALTER TABLE `tbl_order_master`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `tbl_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_feedback_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order_master` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_master`
--
ALTER TABLE `tbl_order_master`
  ADD CONSTRAINT `tbl_order_master_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `tbl_stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
