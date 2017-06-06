-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2017 at 10:10 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cib`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `BranchId` int(11) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` text NOT NULL,
  `Postal_code` varchar(50) NOT NULL,
  `Country` text NOT NULL,
  `Branch_phone` varchar(13) NOT NULL,
  `Date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`BranchId`, `Branch`, `Address`, `City`, `Postal_code`, `Country`, `Branch_phone`, `Date_added`) VALUES
(2, 'TheMicke Branch', '1st Floor, ICEA BUilding,Kenyatta Avenue', 'Kisumu', '90200', 'Uganda', '2240', '2017-05-03 09:30:56'),
(4, 'Gateway Branch', '1st Floor, Gateway Park, Along Mombasa Road', 'Nairobi', 'P.O. Box 58233 - 00200', 'Kenya', '3733', '2017-05-03 14:23:05'),
(5, 'Capital Branch', 'Capital Centre - Along Mombasa', 'Nairobi', 'P.O. Box 722 - 00100', 'Kenya', '4215', '2017-05-03 14:43:30'),
(6, 'Elite Branch', '2nd Floor, I&M Building, Kenyatta Avenue', 'Nairobi', 'P.O. Box 8400 - 00100', 'Kenya', '7103', '2017-05-03 14:47:57'),
(7, 'Head Office', 'CIB House - Moi Avenue, 7th Street', 'Nairobi', 'P.O. Box 42656 - 00100', 'Kenya', '2221', '2017-05-03 14:52:52'),
(8, 'UpperValley Branch', 'Jubilee Arcade Building - Moi Avenue', 'Mombasa', 'P.O. Box 9540 - 80100', 'Kenya', '3810', '2017-05-03 15:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `deleteditems`
--

CREATE TABLE `deleteditems` (
  `itemId` int(50) NOT NULL,
  `itemName` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `itemCategory` varchar(50) NOT NULL,
  `subCategory` varchar(50) NOT NULL,
  `model` varchar(20) NOT NULL,
  `itemImage` varchar(200) NOT NULL DEFAULT 'itemimages/default.png',
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` varchar(20) NOT NULL DEFAULT 'available',
  `boughtTimes` int(5) NOT NULL DEFAULT '0',
  `favorite` varchar(10) NOT NULL DEFAULT 'favorite',
  `olditemId` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleteditems`
--

INSERT INTO `deleteditems` (`itemId`, `itemName`, `description`, `price`, `itemCategory`, `subCategory`, `model`, `itemImage`, `dateAdded`, `availability`, `boughtTimes`, `favorite`, `olditemId`) VALUES
(0, 'Dummy Data', 'jsuihf uhsucha dydtywqtdy wygdyw', 5000, 'Computing', 'Laptop Accessories', 'Beats', 'itemimages/a2f414b603535c3726a8403de2ed99db1492472822.png', '2017-04-17 23:47:32', 'available', 0, 'favorite', 60);

-- --------------------------------------------------------

--
-- Table structure for table `itemcategories`
--

CREATE TABLE `itemcategories` (
  `catid` int(10) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemcategories`
--

INSERT INTO `itemcategories` (`catid`, `cat`, `dateAdded`) VALUES
(1, 'Desktop Accessories', '2017-04-12 14:22:55'),
(6, 'Desktop Stationery', '2017-04-12 20:06:29'),
(7, 'Filing and Archiving', '2017-04-12 20:06:46'),
(8, 'Office Machines and Electronics', '2017-04-12 20:07:01'),
(9, 'Paper Products', '2017-04-12 20:07:20'),
(11, 'Computing', '2017-04-13 13:35:03'),
(14, 'Security Equipment', '2017-04-14 12:40:48'),
(16, 'Kitchen Equipment', '2017-04-14 12:41:46'),
(17, 'Health and Safety', '2017-04-14 13:31:19'),
(18, 'Office Furniture', '2017-04-14 13:32:10'),
(19, 'Cleaning Products', '2017-04-19 16:52:32'),
(20, 'Cooling and Heating', '2017-04-20 06:07:13'),
(21, 'Office Maintenance', '2017-04-20 06:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemId` int(50) NOT NULL,
  `itemName` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `itemCategory` varchar(50) NOT NULL,
  `subCategory` varchar(50) NOT NULL,
  `model` varchar(20) NOT NULL,
  `itemImage` varchar(200) NOT NULL DEFAULT 'itemimages/default.png',
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `availability` varchar(20) NOT NULL DEFAULT 'available',
  `boughtTimes` int(5) NOT NULL DEFAULT '0',
  `favorite` varchar(10) NOT NULL DEFAULT 'notfav'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `itemName`, `description`, `price`, `itemCategory`, `subCategory`, `model`, `itemImage`, `dateAdded`, `availability`, `boughtTimes`, `favorite`) VALUES
(5, 'PIXMA E560 Printer', 'Ink Efficient with WiFi Capability. Print, Scan, Copy. ISO Standard print speed (A4): up to 5.7ipm (colour) / 9.9ipm (mono). Photo Speed (4 x 6&quot;): 44sec (borderless) ', 13000, 'Office Machines and Electronics', 'Printers', 'Pixma', 'itemimages/2a58c7233d2550f0a7f83ae2e950cc8b1492347643.png', '2017-04-16 13:01:06', 'available', 0, 'notfav'),
(6, 'PIXMA MG2570S', 'Affordable All-In-One printer with basic printing, copying and scanning functions. Colour Inkjet printer, copier and scanner \r\nISO standard print speed (A4): up to 8.0ipm mono / 4.0ipm colour', 15500, 'Office Machines and Electronics', 'Printers', 'Pixma', 'itemimages/8a44e1af06641f3304bff106bb5cd3311492348175.png', '2017-04-16 13:09:51', 'available', 0, 'notfav'),
(7, 'FAX-L3000 Printer/Fax Machine', 'Built with superb faxing capabilities for high volume fax users. Copy speed: 14 pages per minute. Fax speed: 3 seconds per page. Laser fax machine, printer and copier.', 21500, 'Office Machines and Electronics', 'Printers and Multifunction Machines', 'Pixma', 'itemimages/1fe645166a12c2ddb331f639972e4cde1492348682.png', '2017-04-16 13:18:08', 'available', 0, 'notfav'),
(8, 'A4 (70gsm) Digital copiers/printers papers', '500 sheets/ream (5/ctn). Premium white paper with consistent performance and reliability for high quality volume copying and printing.', 530, 'Paper Products', 'Copiers and Printers Papers', 'Canon', 'itemimages/1ea0703c51fad27b4513eafba5159cce1492349299.jpg', '2017-04-16 13:28:21', 'available', 0, 'notfav'),
(9, 'A4 (80gsm) Digital copiers/printers papers', 'Premium white paper with consistent performance and reliability for high quality volume copying and printing. Produced using 100% Eucalyptus fibre offering high bulk and opacity.', 600, 'Paper Products', 'Copiers and Printers Papers', 'Canon', 'itemimages/80dc72b397cbfb6c0632b13dd2cb47611492349444.jpg', '2017-04-16 13:30:58', 'available', 0, 'notfav'),
(10, 'ImageCLASS MF3010 Printer', 'The ideal print, scan, copy solution for the home office. Compact and reliable, the imageCLASS MF3010 is the ideal home-office multi-function printer.  Print speed (A4): up to 18ppm. FPOT (A4): 7.8secs. ', 25600, 'Office Machines and Electronics', 'Printers and Multifunction Machines', 'Canon', 'itemimages/0a5515af3854fd69f3d99aaf4ff65b711492349712.png', '2017-04-16 13:35:16', 'available', 0, 'notfav'),
(14, 'Canon LX-MW500 Projector', 'The new Canon LX-MW500 is versatile and features high brightness levels of 5000 lumens, as well as a 3750:1 contrast ratio that delivers vibrant image reproduction even in bright ambient surroundings. Its improved connectivity now enables you to project content directly via MHL and HDMI interface.', 5600, 'Office Machines and Electronics', 'Projectors and Accessories', 'Canon', 'itemimages/1fc80c59825af5b8073e3f892c32ff3e1492368148.png', '2017-04-16 18:42:31', 'available', 0, 'notfav'),
(15, 'Canon LX-MU700 Projector', 'The all-new LX-MU700 projects unparalleled brightness of 7500 Lumens from a dual lamp system. Compatible with 7 different projector lenses. WUXGA (1920 x 1200 pixels)', 6100, 'Office Machines and Electronics', 'Projectors and Accessories', 'Canon', 'itemimages/0d1eef0a1f8190a38301beeff3e9475c1492368217.png', '2017-04-16 18:45:30', 'available', 0, 'notfav'),
(16, 'Canon LV-S300 Projector', 'The LV-S300 is a lightweight and compact model weighing 2.5kg, making it easy to transport and set up. It features enhanced vibrant colour reproduction and lower operating cost due to its air-filter-free feature. 2300:1 contrast ratio for outstanding readability. Brightness: 3000 lumens', 7000, 'Office Machines and Electronics', 'Projectors and Accessories', 'Canon', 'itemimages/cdafb7ef3a755016d2776726d0000b521492368521.png', '2017-04-16 18:48:47', 'available', 0, 'notfav'),
(17, 'LiDE 120 Flatbed Scanner', 'Compact flatbed scanner with SEND to cloud* function. Requires PC connection with Internet Access. Scan resolution: 2400 x 4800dpi. Scan speed (A4, 300dpi): approx. 16secs', 7500, 'Office Machines and Electronics', 'Scanners', 'hp', 'itemimages/0827a34c2866d8128ad8dc5020d474e51492368960.png', '2017-04-16 18:56:04', 'available', 0, 'notfav'),
(18, 'Canon DR-C225 Document Scanner ', 'Maximize desk space with the slim &amp; smart compact scanner. Built  with a minimalist design achieved through the elimination of obstructive tray extensions. Scan size: up to A4. Speed: up to 25ppm / 50ipm (2-sided)', 7200, 'Office Machines and Electronics', 'Scanners', 'Canon', 'itemimages/33b0128a7abdfbd9c3bfaf3a8349a2ce1492369020.png', '2017-04-16 19:00:03', 'available', 0, 'notfav'),
(19, 'Canon DR-F120 Scanner', 'DR-F120 is a highly productive document scanner that supports a variety of paper types. Connect with USB 2.0. Scan size: up to A4(ADF), Legal size (Flatbed). Speed: up to 20ppm / 36ipm ', 5700, 'Office Machines and Electronics', 'Scanners', 'Canon', 'itemimages/a5c8e801c73f21e11ebcc2f293fb58921492369355.png', '2017-04-16 19:04:41', 'available', 0, 'notfav'),
(20, 'Canon RL CL-01S Camera Bag', 'For fast and light shooting adventures, take this slim and sleek shoulder bag with you. While it is lightweight and compact size, it can fit 1 EOS body and 2 EF lenses. With Front pocket for accessories, tough base feet,  adjustable compartments, side pockets for accessories and secure clasp', 3600, 'Office Machines and Electronics', 'Cameras and Accessories', 'Canon', 'itemimages/58ad9b4619e20a24b142856b76d4c9b71492369665.png', '2017-04-16 19:12:16', 'available', 0, 'notfav'),
(21, 'HP Color LaserJet Pro MFP 277 printer', 'Black print speed - Up to 19 ppm, color print speed - Up to 19 ppm. Deliver 33% more prints with Original HP Toner cartridges with JetIntelligence. Enable wireless direct printing from mobile devicesâ€”without accessing the network', 42100, 'Office Machines and Electronics', 'Printers and Multifunction Machines', 'hp', 'itemimages/d231a5c4429422476ded99785ef0e5d81492370243.png', '2017-04-16 19:17:35', 'available', 0, 'notfav'),
(22, 'FAX-L3000 Toner Cartridge', 'FX12 Cartridge (4,500 pages) High quality premium ink', 7045, 'Office Machines and Electronics', 'Toners and Cartridges', 'Canon', 'itemimages/5e56cf8b82d98ef36f889cecf6a98d821492370856.jpeg', '2017-04-16 19:30:38', 'available', 0, 'notfav'),
(23, 'HP Laserjet Color 500', 'Functions - Print, copy, scan, fax only on M575f and M575c models. Black print speed - Up to 31 ppm, color print speed - Up to 31 ppm. Save paper using automatic two-sided printing. \r\nManage jobs using the 8-inch HP Easy Select color touchscreen. ', 23500, 'Office Machines and Electronics', 'Printers and Multifunction Machines', 'hp', 'itemimages/6a932633b5c158e7e7108e9981476ef31492371569.png', '2017-04-16 19:39:35', 'available', 0, 'notfav'),
(24, 'HP 950 & 951 Ink Cartridges', 'Depend on unsurpassed quality and reliability with Original HP ink ', 2500, 'Office Machines and Electronics', 'Toners and Cartridges', 'hp', 'itemimages/b2f78218bbf2c9395b5a671f1bcde8f81492371857.jpg', '2017-04-16 19:45:50', 'available', 0, 'notfav'),
(25, 'HP 932 & 933 Ink Cartridges', 'Depend on unsurpassed quality and reliability with Original HP ink', 3100, 'Office Machines and Electronics', 'Toners and Cartridges', 'hp', 'itemimages/4729727f243f17889c5c18fd2b01f0451492372041.jpg', '2017-04-16 19:48:14', 'available', 0, 'notfav'),
(27, 'Pukka Jotta A5 Notebook', 'This handy Pukka Jotta notebook contains 200 pages of quality 80gsm paper, which is feint ruled for neat note-taking and has perforated pages for easy removal, polypropylene covers and a wire binding. This pack contains 3 black striped A5 notebooks.', 600, 'Paper Products', ' Notebooks and Notepads', 'Pukka', 'itemimages/7d382938141de1331cfd5083901e971f1492372677.jpg', '2017-04-16 20:02:59', 'available', 0, 'notfav'),
(28, 'Q-Connect shorthand notebook', 'This handy shorthand notebook contains 300 pages of 60gsm paper, which is feint ruled for neat note-taking. The notebook is headbound with a spiral binding and sturdy backboard for support. Each notebook measures 203 x 127mm (8 x 5 inches). This pack contains 10 notebooks', 1800, 'Paper Products', ' Notebooks and Notepads', 'Q-Connect', 'itemimages/96ffed781976cbf025b399f656aa336b1492373123.jpg', '2017-04-16 20:07:29', 'available', 0, 'notfav'),
(29, 'Cambridge Everyday A4 Refill Pad', 'These pads are made from 70gsm paper and are glued at the head to a sturdy backboard. Each pad contains 160 pages, which are narrow ruled with a margin and 4 hole punched for quick and easy filing. This pack contains 5 A4 refill pads', 700, 'Paper Products', 'Notebooks and Notepads', 'Cambridge Everyday', 'itemimages/7a5207727b5472f40435461c796be87d1492373543.jpg', '2017-04-16 20:13:50', 'available', 0, 'notfav'),
(30, 'Pukka Neon Signature A4 Project Book', 'Pack of 3 - This black project book provides a contemporary option for all your note taking. The polypropylene covers wipe clean easily and the co-ordinating elastic closure keeps loose papers secure. This project book contains 200 80gsm feint ruled pages', 450, 'Paper Products', 'Notebooks and Notepads', 'Pukka', 'itemimages/2cea38eb699e28a2659e919f7bc857d41492373906.jpg', '2017-04-16 20:18:48', 'available', 0, 'notfav'),
(31, 'Cambridge (A5) Card Cover Notebook', ' Sturdy card cover with metallic shine. Perforated pages for easy tear off. Ruled pages. Sturdy twin-wire to lay your notebook flat on the surface or fold it back, 200 pages, 80gsm paper ', 240, 'Paper Products', 'Notebooks and Notepads', 'Cambridge', 'itemimages/1c73ffb7073135b9381e59cb42b51a961492374266.jpg', '2017-04-16 20:25:24', 'available', 0, 'notfav'),
(32, 'Daily Desk Calendar Tear Off', 'This handy daily desk calendar features a 12 month reference calendar, as well as bold tear off daily date pages for easy reference. The convenient design can be wall or desk mounted for easy access. The calendar measures 150 x 185mm.', 320, 'Desktop Accessories', 'Calendars and Organisation', 'DailyPr', 'itemimages/d20eec75f2d6047ec53a6311fbc2344e1492374613.jpg', '2017-04-16 20:30:56', 'available', 0, 'notfav'),
(33, 'Letts System Desk Calendar', 'Ideal for placing on your work desk for easy date and appointment referencing, this system desk calendar is supplied on a sturdy base which will sit securely on a table top. Designed to be refilled each year, the base only needs to be bought once and features an indentation where a pen can be rested', 550, 'Desktop Accessories', 'Calendars and Organisation', 'Letts', 'itemimages/27512725e8ecdc1cfe41d806129063371492374817.jpg', '2017-04-16 20:34:01', 'available', 0, 'notfav'),
(34, 'Magnetic Drywipe Perpetual Year Planner', 'The ideal wall planner for a busy family or office, this perpetual year planner is magnetic and drywipe, and can be wiped clean and used again year after year. The package includes 120 magnets in 12 different colours, 12 magnetic strips, 1 black drywipe marker and a filing box for the magnets. ', 420, 'Desktop Accessories', 'Calendars and Organisation', 'Exacompta', 'itemimages/5c571fb38bd65f6d5eb5f84ee1dd21ad1492374971.jpg', '2017-04-16 20:36:27', 'available', 0, 'notfav'),
(35, 'Filofax Finsbury A5 Raspberry Organiser', 'The Filofax Finsbury organiser is the solution to all of your needs, combining a high quality notebook, diary and address book. The file includes 1 external pocket as well as 3 horizontal, internal pockets and credit card pockets.', 950, 'Desktop Accessories', 'Calendars and Organisation', 'Filofax', 'itemimages/8294a1fcb14bbc856ab12b61cd371b321492375050.jpg', '2017-04-16 20:38:39', 'available', 0, 'notfav'),
(36, 'Filofax Finsbury A4 Black Organiser', 'The Filofax Finsbury organiser is the solution to all of your needs, combining a high quality notebook, diary and address book. The cover is made of traditional grained leather for an executive finish to your files.', 850, 'Desktop Accessories', 'Calendars and Organisation', 'Filofax', 'itemimages/357134bf2127456be11068a2d187b2ea1492375241.jpg', '2017-04-16 20:41:06', 'available', 0, 'notfav'),
(37, '5-Star Office Bookends', 'Heavy-duty metal bookends. Size: 178mm (7&quot;). Black. Set of 2. Colour: Black', 1540, 'Desktop Accessories', 'Bookends', '5-Star', 'itemimages/b38012126b4e7e0fa8324f83b0514dcb1492375913.jpg', '2017-04-16 20:53:04', 'available', 0, 'notfav'),
(38, 'Q-Connect Stepped Metal Bookend', 'Keeping files and books neat and organised, these Q-Connect Bookends feature a stepped design for strength and reliability. Ideal for offices, the home and retail use, the high quality metal construction is designed for heavy duty, long lasting use. This pack contains one pair of black bookends.', 800, 'Desktop Accessories', 'Bookends', 'Q-Connect', 'itemimages/b4c05ff15d5c75dc83ba0e66db1373031492376081.jpg', '2017-04-16 20:55:17', 'available', 0, 'notfav'),
(39, 'Avery Modular Interlocking Book Rack', 'A functional book rack comprising 4 variable compartments. Interlocking sections allow easy extension of the rack with additional base pieces. WxDxH: 200 x 183 x 190mm. Black.', 3600, 'Desktop Accessories', 'Bookends', 'Avery', 'itemimages/684064d3b3d6b84d35646896e26fb2861492376238.jpg', '2017-04-16 21:00:21', 'available', 0, 'notfav'),
(40, 'Leitz Plus Magazine Rack - A4( Clear)', 'Increased internal capacity, now 70mm. Strong and durable. High front spine wall to retain documents. A4 capacity. WxDxH: 78x278x300mm. Strong and durable. Can be positioned for use vertically or horizontally', 1350, 'Desktop Accessories', 'Books and Magazine Racks', 'Leitz', 'itemimages/01a44f3b5dc537c4d9813f169fdd31651492376741.jpg', '2017-04-16 21:05:46', 'available', 0, 'notfav'),
(41, '5-Star Office Magazine Rack', 'A high quality, everyday range of office accessories. Made from high-impact polystyrene (bins made from polypropylene). Accepts both A4 and foolscap documents, magazines, square cut folders and document wallets. Black', 1800, 'Desktop Accessories', 'Books and Magazine Racks', '5-Star', 'itemimages/1afaf7c34b53e1ec6daabe20afefd3a71492377103.jpg', '2017-04-16 21:11:45', 'available', 0, 'notfav'),
(42, 'Avery Magazine Rack (Blue)', 'Look around your desk. Is it cluttered? Piled high with papers? Pens all over the desk? There are a number of desktop items ranging from these magazine racks to book racks, all designed to help keep your desk tidy.', 850, 'Desktop Accessories', 'Books and Magazine Racks', 'Avery', 'itemimages/3ea732545a9e7523dfc0dfd14c2700ce1492377427.jpg', '2017-04-16 21:18:56', 'available', 0, 'notfav'),
(43, 'Desktop Business Card Holder', 'Desktop Business Card Holder Single Pocket (Clear). Each compartment holds approximately 50 cards. Can be used separately or slotted on to Standard Rigid Literature Sorters. Ideal for reception areas and exhibitions', 320, 'Desktop Accessories', 'Card Holders', 'Buscard', 'itemimages/6bc32dea60821918ac2290c18ce99aa91492377617.jpg', '2017-04-16 21:22:49', 'available', 0, 'notfav'),
(44, 'Q-Connect Business/Name Card Holder', 'Capacity 160 Cards Black. Ensures you always have the information about your business contacts to hand when you need it. With a stylish black cover, you can be sure that this holder is perfect for any modern professional and fits in with any range of office equipment.', 1400, 'Desktop Accessories', 'Card Holders', 'Q-Connect', 'itemimages/e572e8899e611e4cad86b2c497f2fba51492377847.jpg', '2017-04-16 21:25:32', 'available', 0, 'notfav'),
(45, 'Durable Card Holder Pushbox Mono', 'This Durable Pushbox card holder provides an innovative solution for the safe and secure storage of sensitive RFID and chipped cards. The premium plastic fully encloses the card and is transparent for quick and easy identification of contents. A simple slider mechanism provides easy insertion', 220, 'Desktop Accessories', 'Card Holders', 'Durable', 'itemimages/61a7fefa98e5fa942c4f6540a7c91f601492378102.jpg', '2017-04-16 21:30:03', 'available', 0, 'notfav'),
(46, 'Rolodex Classic Rotary Business Card', 'Organises and protects business cards Holds up to 400 cards in durable transparent sleeves Complete with 200 sleeves and 24 coated A-Z index tabs. Black. Pack Dimensions: 175x180x137 mm', 2400, 'Desktop Accessories', 'Card Holders', 'Rolodex', 'itemimages/0d99242475ef3e69c8c9a1ec72c0b46b1492378396.jpg', '2017-04-16 21:33:37', 'available', 0, 'notfav'),
(47, 'Rolodex Plain Refill Cards (Pack of 100)', 'Rolodex Refill Accessories Easily punch your business cards and store them in your Rolodex File White Refill Cards, plain, unlined Size: 57x102mm Packed 100 Pack Dimensions: 57x22x102 mm', 2500, 'Desktop Accessories', 'Card Holders', 'Rolodex', 'itemimages/71301ea3841c2a6779db04ed4ac9e7eb1492378535.jpg', '2017-04-16 21:35:42', 'available', 0, 'notfav'),
(48, 'Duraglas Anti-Glare Desk Mat', 'Transparent, anti-glare desk mat - ideal for keeping notes, messages etc close at hand. Ideal for use where desk or counter surfaces need to appear uncovered. Modern, attractive mat with contoured edges ', 230, 'Desktop Accessories', 'Desk Mats', 'Durable', 'itemimages/97398d3868d315f66834164dcd77295f1492378794.jpg', '2017-04-16 21:41:24', 'available', 0, 'notfav'),
(49, 'Durable Desk Mat with Contoured Edge', 'Black. Robust, non-slip desk mat with contoured edges. Multi-layered production to provide a firm comfortable writing surface. Extremely robust. Provides a smooth writing surface, Foam anti-slip backing', 240, 'Desktop Accessories', 'Desk Mats', 'Durable', 'itemimages/448fcc69a9d8f33635c15df7b2f26bdc1492379069.jpg', '2017-04-16 21:45:37', 'available', 0, 'notfav'),
(51, 'Durable Duraglas Desk Mat (Transparent)', 'Protect board room tables with a transparent, anti-glare desk mat for conference rooms. Featuring a non-slip base, desks and boardroom furniture can be protected from scratches and marks. Transparent Desk Mat ', 250, 'Desktop Accessories', 'Desk Mats', 'Durable', 'itemimages/450cc1ee941c1b5558f3c4d20f989bca1492379482.jpg', '2017-04-16 21:51:57', 'available', 0, 'notfav'),
(52, 'Q-Connect Transparent Desk Mat', 'Q-Connect is an expert when it comes to providing your workplace with solutions that have a high level of quality but are also great value for money. This desk mat is both anti-glare and easy to clean meaning that is completely practical for use in any home or office.', 200, 'Desktop Accessories', 'Desk Mats', 'Q-Connect', 'itemimages/2797c751a2ad0310b510e030b3f9bc661492379677.jpg', '2017-04-16 21:55:09', 'available', 0, 'notfav'),
(53, '5-Star (A4 Foolscap) Desktop Drawer Set', '5 Drawers (Grey/Black). Suitable for A4 and documents measuring up to 260x350mm. Drawer stop, Handle on front right hand side, Modern and professional design ', 4560, 'Desktop Accessories', 'Drawer Sets', '5-Star', 'itemimages/9aa69c6a192ceab74221c6cffe6e3e971492380087.jpg', '2017-04-16 22:01:30', 'available', 0, 'notfav'),
(54, 'Elite Desktop Drawer Set - 9 Drawers', 'Paper Size: A4/Foolscap. Colour: Grey/Blue. Suitable for A4 and documents measuring up to 260x350mm. Drawer stop. Handle on front right hand side. Modern and professional design', 5800, 'Desktop Accessories', 'Drawer Sets', '5-Star', 'itemimages/510bc9940c3bec18720237f9bd85d02f1492380338.jpg', '2017-04-16 22:05:45', 'available', 0, 'notfav'),
(55, 'Fellowes Bankers Box (A4) 4 Drawer Unit', 'Attractive drawer unit for organising your paperwork and personal items. FastFold outer shell will save you assembly time. Attractive design that would complement any office space. Made from FSC certified 100% recycled board ', 6200, 'Desktop Accessories', 'Drawer Sets', 'Fellowes ', 'itemimages/d29d11381014854c3605b0c60bd3765f1492380545.jpg', '2017-04-16 22:09:09', 'available', 0, 'notfav'),
(56, 'Raaco Cabinet Drawer Steel Frame Wall Mount', 'Cabinet with 30x150-00 drawers. Each drawer can be divided into 4 compartments. Cabinet made of painted steel and drawers made of polypropylene (PP). Blue Painted Steel. Clear Polypropylen drawers. 30 Draws ', 10800, 'Desktop Accessories', 'Drawer Sets', 'Raaco', 'itemimages/bf870133fc865bb1e9895475a0ffa74f1492380698.jpg', '2017-04-16 22:11:56', 'available', 0, 'notfav'),
(57, '5-Star Office Trimmer', 'Cuts up to 15 sheets. Steel cutting table. Safety cutting head. Size: A4. 360mm cutting length.', 5500, 'Desktop Accessories', 'Trimmers', '5-Star', 'itemimages/74f4244beeb9e320ca66bf58718ffcc71492380883.jpg', '2017-04-16 22:15:15', 'available', 0, 'notfav'),
(58, 'Mesh Front Load Letter Tray', 'Mesh Front Load Letter Tray (Foolscap) Silver is a Modern and stylish letter tray, for both A4 and foolscap paper. Trays can be stacked on each other without the need for risers. Corrosion and scratch-resistant ', 420, 'Desktop Accessories', 'Letter Trays', 'Mesh', 'itemimages/43f5074c49e3b0f0bd132b3e275717d81492506223.jpg', '2017-04-18 09:03:46', 'available', 0, 'notfav'),
(59, 'Mesh Side Load Letter Tray', 'Mesh Side Load Letter Tray (Foolscap) Black \r\nModern and stylish letter tray, accepts both A4 and foolscap paper. Trays can be stacked on each other without the need for risers. Corrosion and scratch-resistant', 450, 'Desktop Accessories', 'Letter Trays', 'Mesh', 'itemimages/7fac94820c934ef36562964d77f5a6031492506622.jpg', '2017-04-18 09:10:26', 'available', 0, 'notfav'),
(60, '5-Star Office Memo Box', '5 Star Note Holder (Black). \r\nTough Plastic. Approx 750 sheets 90x90mm square ', 500, 'Desktop Accessories', 'Letter Trays', '5-Star', 'itemimages/ce24068c505e2dd211933c32cbf02afa1492506800.jpg', '2017-04-18 09:13:40', 'available', 0, 'notfav'),
(61, 'Q-Connect Waste Basket Mesh', 'Ideal for disposing of waste paper at home, school, or in the office, this Q-Connect bin features a stylish, durable mesh design with a solid base and turned top rim. The bin has an 18 litre capacity and measures W295 x D295 x H345mm.', 400, 'Desktop Accessories', 'Office Bins', 'Q-Connect', 'itemimages/cf064a13485713e14a0ccbd1c97a6fdf1492506901.jpg', '2017-04-18 09:19:50', 'available', 0, 'notfav'),
(62, 'Durable Metal Waste Bin', 'This Durable waste basket is made from steel with a scratch resistant, epoxy polyester coating and 30mm perforation ring. Ideal for disposing of general waste at home, at school or in the office, the bin has a 15 litre capacity. This silver bin measures W260 x D260 x H315mm.', 640, 'Desktop Accessories', 'Office Bins', 'Durable', 'itemimages/94bedf12032716b3b2047e65f8e191af1492507240.jpg', '2017-04-18 09:21:18', 'available', 0, 'notfav'),
(63, 'Avery Waste Bin', 'This elegant oval bin with an 18 litre capacity allows you to keep your office space tidy with a touch of style. The blue base features a matching rim to hide liners and keep your workspace looking professional and shipshape.', 500, 'Desktop Accessories', 'Office Bins', 'Avery', 'itemimages/7fe8a7a4c787b9e08fcf83111fee0eb31492507386.jpg', '2017-04-18 09:23:44', 'available', 0, 'notfav'),
(64, '5-Star Elite Bin Polypropylene', '5 Star (300 x 363 x 323mm) 16 Litres Bin Polypropylene (Black). Simple, elegant shape with tapered walls. Lightweight yet robust ', 400, 'Desktop Accessories', 'Office Bins', '5-Star', 'itemimages/3bf228da83bb23a4652f13cd618529f11492507472.jpg', '2017-04-18 09:25:37', 'available', 0, 'notfav'),
(65, 'Elba A3 Black Lever Arch File', 'Suitable for filing A3 documents, this Elba lever arch file has a landscape orientation and 70mm filing capacity. The file features a robust compressor bar for security and a metal thumb hole for easy retrieval from a shelf. Made from durable board.', 220, 'Filing and Archiving', 'Lever Arch Files', 'Elba', 'itemimages/12c4dd10380a8794155016dcd8c49d261492507802.jpg', '2017-04-18 09:30:03', 'available', 0, 'notfav'),
(66, 'Elba A3 Upright Lever Arch File', 'The lever arch file is made from durable board with a marbled black paper covering. Suitable for filing A3 documents and has a portrait orientation , 70mm filing capacity. ', 250, 'Filing and Archiving', 'Lever Arch Files', 'Elba', 'itemimages/8b273400b03bcd54df53521205e27a4c1492507946.jpg', '2017-04-18 09:32:50', 'available', 0, 'notfav'),
(67, '5-Star Office Storage Box', 'Pack of 10 for 5 A4 Lever Arch Files. General purpose storage box with black lid. Double wall ends and single wall sides. Packed flat. Will hold 5 A4 lever arch files, 4 foolscap lever arch files, suspension files or 4 5 Star box files.', 200, 'Filing and Archiving', ' Archive Storage Boxes', '5-Star', 'itemimages/209c613c40177e8682d3f128d42557131492508057.jpg', '2017-04-18 09:38:14', 'available', 0, 'notfav'),
(68, '5-Star Value Archive Storage Boxes', '5 Star Value Archive Storage Box (Brown) Pack of 10 Boxes. WxDxH: 338x390x251mm. Packed 10 ', 450, 'Filing and Archiving', ' Archive Storage Boxes', '5-Star', 'itemimages/6bfedb2f418036b1c195fdc1aeff91731492508394.jpg', '2017-04-18 09:40:04', 'available', 0, 'notfav'),
(69, '5-Star Superstrong Archive Storage Box', 'Pack of 10. Elliptical design finish in modern colours. Extra strong construction, perfect for storing heavy files. Instant easy assembly. Tote-style handles for ease of carrying.', 420, 'Filing and Archiving', ' Archive Storage Boxes', '5-Star', 'itemimages/75a3d2789f0062c16114af6320f9ecc91492508557.jpg', '2017-04-18 09:42:43', 'available', 0, 'notfav'),
(70, 'Leitz Medium Storage Box', 'Hide your clutter and show off your beautiful storage solutions! Striking and stylish storage box for A4 documents and folders, pictures and other odds and endsSmart collapsible construction: fast and easy to assemble without any screws and to fold it back for space-saving storage when not needed.', 360, 'Filing and Archiving', ' Archive Storage Boxes', 'Leitz', 'itemimages/e37205ce50688891b4f393a7150185c61492508748.jpg', '2017-04-18 09:45:51', 'available', 0, 'notfav'),
(71, 'Leitz Archive Box for A4 Suspension Files', 'Archiving and transportation box for A4 suspension files. Collapsible for space saving storage when not in use. Sturdy metal handles for easy transportation. Label holder for indexing.', 1500, 'Filing and Archiving', ' Archive Storage Boxes', 'Leitz', 'itemimages/cb53556a5c15c773e773786de460ce871492508875.jpg', '2017-04-18 09:48:02', 'available', 0, 'notfav'),
(72, 'Fellowes Bankers Box System Roll Stand', 'For Rolled Documents Grey. Corrugated fiberboard construction with steel reinforcement Keeps up to 20 rolled documents. Documents are kept upright for easy retrieval. Each compartment is trimmed with plastic. Features a hand hole in the back for portability. ', 1200, 'Filing and Archiving', ' Archive Storage Boxes', 'Fellowes', 'itemimages/5842877591d62563f1a84411735b21b51492509388.jpg', '2017-04-18 09:56:29', 'available', 0, 'notfav'),
(73, '5-Star Office Box File', 'Box files with brightly coloured paper covering over a high quality board. Flush fitting lid with a strong press-button catch. Interior lock-spring secures loose papers. Ring pull on spine for easy retrieval. Spine label for easy identification of contents. Takes A4/foolscap. 70mm capacity.', 600, 'Filing and Archiving', 'Box Files', '5-Star', 'itemimages/cd9d7ef091c7c3c8a0b94c3c484875261492509518.jpg', '2017-04-18 09:59:12', 'available', 0, 'notfav'),
(74, '5-Star Office (A4) Document Box', 'Pack of 10. A4 Document Box Translucent in blue is a strong and practical product which stores and protects your document for a long time. It is made from strong, long-lasting wipe clean polypropylene. Integral business card holder for personalization.', 1500, 'Filing and Archiving', 'Box Files', '5-Star', 'itemimages/7000eed1d13b3cd0cf90d1b39e185c6c1492509677.jpg', '2017-04-18 10:02:46', 'available', 0, 'notfav'),
(75, 'Snopake A4 Clear Document Box', 'Strong and stylish, this Snopake DocBox is made from heavy gauge polypropylene that is welded for extra strength. A cutaway front provides easy access, with a push-lock clasp to keep contents secure. Suitable for A4 filing, the box also features a business card holder', 160, 'Filing and Archiving', 'Box Files', 'Snopake', 'itemimages/7e7b1964b41dd3cb3441cd97a7fd6d7d1492509809.jpg', '2017-04-18 10:04:44', 'available', 0, 'notfav'),
(76, 'Q-Connect Black Foolscap Box File', 'This pack of 5 Q-Connect Box Files provides a simple way to store your documents and loose papers neatly and securely. Featuring solid softwood construction covered with black paper, these files are ideal for storing loose papers and documents on shelves and in archive boxes.', 1600, 'Filing and Archiving', 'Box Files', 'Q-Connect', 'itemimages/dee7ecdd8ec34c74a6779ed9292f18c91492509961.jpg', '2017-04-18 10:06:21', 'available', 0, 'notfav'),
(77, '5-Star Office Standard Clipboard', 'PVC cover for durability. Pen holder. Foolscap. Black.', 250, 'Desktop Stationery', 'Clipboards', '5-Star', 'itemimages/fc8adef10990ed7c5cbec4b662ef8bfd1492510332.jpg', '2017-04-18 10:12:21', 'available', 0, 'notfav'),
(78, 'Rapesco Executive Clipboard', 'This Rapesco Executive foldover clipboard features a stylish grained outer cover and a smooth PVC inner cover for writing on the go. The strong, high capacity clip and anti-glare transparent pocket keep both A4 and foolscap documents secure. This pack contains 1 black clipboard.', 350, 'Desktop Stationery', 'Clipboards', 'Rapesco', 'itemimages/1d4858ee28bcf9e98079d1ae98939cfe1492510410.jpg', '2017-04-18 10:13:41', 'available', 0, 'notfav'),
(79, 'Rapesco Frosted Transparent Clipboard', 'These handy and yet wonderfully subtle clipboards have been formulated by the team at Rapesco in order to offer up a sturdy a base for work on the go. Plastic clipboards, designed from the very best shatterproof polypropylene boast a semi-translucent finish', 450, 'Desktop Stationery', 'Clipboards', 'Rapesco', 'itemimages/7807c256a86e65d569e5c6c53b20934f1492510525.jpg', '2017-04-18 10:15:37', 'available', 0, 'notfav'),
(80, 'Avery Filing Labels White', 'Pack of 600 Labels. For Elasticated FoldersFind items faster with clearly and professionally labelled files. Keep files smart and up to date even when the content changes; the labels are completely opaque and conceal old text perfectly', 1050, 'Filing and Archiving', 'Filing Labels', 'Avery', 'itemimages/7c6561502e416685234560667fab2deb1492510668.jpg', '2017-04-18 10:18:16', 'available', 0, 'notfav'),
(81, 'Q-Connect Premium A4 White Inkjet Paper', '90gsm. Save on cost but not on quality. Bright white, highly opaque with excellent ink retention, this paper is ideal for everyday printing and copying. Its ultra-smooth 90gsm finish shows up excellent contrast against ink or toner with almost no bleed through.', 480, 'Paper Products', 'Printer Paper', 'Q-Connect', 'itemimages/e2e7e0ff0904a05117e98e640e16297d1492589946.jpg', '2017-04-19 08:20:01', 'available', 0, 'notfav'),
(82, 'Xerox A4 Printing Paper White Ream', 'Xerox  guarantees the optimum performance from your printer in terms of quality, quantity and runnability. Designed for high volume throughput, the super smooth finish shows up greater richness and depth of colour. Impressive whiteness, 90gsm thickness', 540, 'Paper Products', 'Printer Paper', 'Xerox', 'itemimages/e857941205e54ca8336f3fab865fe54e1492590181.jpg', '2017-04-19 08:23:05', 'available', 0, 'notfav'),
(83, 'HP A4 White 120gsm Colour Laser Paper', 'If you want paper that will provide you with clean and sharply defined laser print-outs, then the HP White A4 120gsm Colour Laser Paper is the very best product. HP is an expert in all areas of printing and it is this breadth of knowledge that allows them to get the very best from this paper', 520, 'Paper Products', 'Printer Paper', 'hp', 'itemimages/912e532fd655021a5db72fb1e03edf6d1492590539.jpg', '2017-04-19 08:29:03', 'available', 0, 'notfav'),
(84, '5-Star Office A4 Copier Paper Multifunctional', 'A high quality multi-purpose paper that is ideal for more prestigious or important documents. Bright white, smooth finish produces excellent results across a wide range of machines including mono and colour laser printers. 80g/m', 450, 'Paper Products', 'Copiers and Printers Papers', '5-Star', 'itemimages/1ea0703c51fad27b4513eafba5159cce1492590757.jpg', '2017-04-19 08:33:08', 'available', 0, 'notfav'),
(85, '5-Star A4 Copier Paper High White', 'Premium office paper in a smooth, high white finish that is ideally suited for important documents and presentations. Designed to produce excellent results with most office printers including colour laser, colour copiers, mono laser and copiers, inkjet and plain paper fax machines.', 470, 'Paper Products', 'Copier Paper', '5-Star', 'itemimages/80dc72b397cbfb6c0632b13dd2cb47611492591003.jpg', '2017-04-19 08:36:46', 'available', 0, 'notfav'),
(86, 'HP A4 Multifunction Printing Paper 80gsm', 'Brighter and whiter than ordinary office papers. PEFC certified - a scheme for auditing forestry operations. ColorLok technology for improved inkjet printing results, bolder blacks, brighter colours and quicker ink drying time. Ideal for memos, meeting notes, handouts and data sheets.', 560, 'Paper Products', 'Printer Paper', 'hp', 'itemimages/6b9b9b1e01ee499d2c7c85ce535e17511492591140.jpg', '2017-04-19 08:40:46', 'available', 0, 'notfav'),
(87, '5-Star Office Paper clips', 'Polished steel paperclips. Large plain clips. Length: 33mm. Packed 100.', 150, 'Desktop Stationery', 'Paper Clips', '5-Star', 'itemimages/c26a67d417c6207f11b9ca820d0c828d1492591872.jpg', '2017-04-19 08:52:04', 'available', 0, 'notfav'),
(88, '5-Star Office Foldback Clips 19mm', 'Black - Pack of 12\r\nHigh quality all metal design with fold back action', 50, 'Desktop Stationery', 'Paper Clips', '5-Star', 'itemimages/c6bb2f8f380e8290f61f15ebc4320a361492592008.jpg', '2017-04-19 08:54:35', 'available', 0, 'notfav'),
(89, '5-Star Office Foldback Clips Assorted', '19 mm. Pack of 12 \r\nHigh quality all metal design with fold back action', 150, 'Desktop Stationery', 'Paper Clips', '5-Star', 'itemimages/bbff963c32500abe59ef6858b50aaa651492592219.jpg', '2017-04-19 08:57:18', 'available', 0, 'notfav'),
(90, 'TheMicke Paper Binders Tinned Steel', 'Tinned steel paper binders with washers. Quantity 200', 800, 'Desktop Stationery', 'Paper  Binders', 'TheMicke', 'itemimages/aaf028cf78828354880f77195db418ad1492592542.jpg', '2017-04-19 09:02:31', 'available', 0, 'notfav'),
(91, '5-Star Large Plain Paper Clips', ' 5 Star Large Plain Paper Clips\r\n Length: 51mm. Packed 10x100 ', 650, 'Desktop Stationery', 'Paper Clips', '5-Star', 'itemimages/0245f635eb87dbf7f9ecf5f28ed0f59b1492592729.jpg', '2017-04-19 09:05:53', 'available', 0, 'notfav'),
(92, '5-Star Office Desk Tidy', 'Black Desk tidy with 6 Compartment Tubes . Suitable for pens and other small items.', 250, 'Desktop Stationery', 'Desk Sets and Tidies', '5-Star', 'itemimages/909b999028109421689668bf3a8ea7d11492593177.jpg', '2017-04-19 09:16:40', 'available', 0, 'notfav'),
(93, 'Q-Connect Mesh Pen Pot', 'Silver. Keep your desktop or workspace organised and tidy with this Q-Connect Mesh Pen Pot. Store pens, pecils, highlighters, rulers and more in easy reach for quick access. The silver pen pot has a durable mesh construction and measures W86 x D86 x H105mm.', 320, 'Desktop Stationery', 'Desk Sets and Tidies', 'Q-Connect', 'itemimages/36808742d3a22479cea82d19caa6170a1492593460.jpg', '2017-04-19 09:18:43', 'available', 0, 'notfav'),
(94, 'Q-Connect Mesh Letter Sorter Black', 'Organise your communication with this Q-Connect Mesh Letter Sorter. Ideal for sorting letters, envelopes, compliment slips and more, the sorter is great for desktops, reception areas and retail. The sorter has 3 sections and features a durable mesh construction', 460, 'Desktop Stationery', 'Desk Sets and Tidies', 'Q-Connect', 'itemimages/cc42760e87570e2145184552bf4464c21492594167.jpg', '2017-04-19 09:29:56', 'available', 0, 'notfav'),
(95, '5-Star Office Push Pins Assorted', '20 pins in assorted opaque colours. Total length including pin 24mm. Quantity 20.', 300, 'Desktop Stationery', 'Drawing Pins', '5-Star', 'itemimages/4bc06ada0bae3e4561f72650eefb8a671492594459.jpg', '2017-04-19 09:34:30', 'available', 0, 'notfav'),
(96, 'Rapid Electronic Stapler', 'Electronic stapler with cassette loading (1500 staples), flat stapling, staple up to 25 sheets (80gsm), mains operated, LED staple guiding system. Safety feature prevents stapler operation when safety visor is removed.', 1020, 'Desktop Stationery', 'Staplers', 'Rapid', 'itemimages/ad51832ab050e2368d5717d1825a10411492594671.jpg', '2017-04-19 09:38:21', 'available', 0, 'notfav'),
(97, 'Loctite Super Glue Perfect Pen 3g', 'This Loctite Perfect Pen contains super glue in a handy applicator for simple clean and precise use. The universal instant adhesive is suitable for use on a variety of materials, including wood, leather, rubber, metal and most plastics.', 120, 'Desktop Stationery', 'Glues and Adhesives', 'Loctite', 'itemimages/b5b620fa952c98fd65868717781a2a6b1492594816.jpg', '2017-04-19 09:40:33', 'available', 0, 'notfav'),
(98, 'Q-Connect Glue Stick 20g', 'These solid glue sticks contain solvent-free, low odour glue ideal for eveyday use at home, work or in the classroom. Ideal for schoolwork and crafting, the glue will adhere cleanly to paper, card, photos and more. This bulk pack contains 12 x 20g glue sticks', 600, 'Desktop Stationery', 'Glues and Adhesives', 'Q-Connect', 'itemimages/66bc46ffe2216adc9c556cfca5b1a8701492594931.jpg', '2017-04-19 09:42:14', 'available', 0, 'notfav'),
(99, '5-Star Office Stapler Heavy Duty', 'All-steel frame with powerful lever arm for easy stapling. Rubber feet for stable stapling. Staples up to 100 sheets of paper. Takes staples 23/8, 23/10, 23/12.', 780, 'Desktop Stationery', 'Staplers', '5-Star', 'itemimages/adad2adc2414fc2d8c09e817281d26361492595054.jpg', '2017-04-19 09:44:17', 'available', 0, 'notfav'),
(100, 'Rexel Heavy Duty Stapler', 'Has a powerful handle to cope with weighty documents up to 100 sheets. The metal chassis and adjustable gauge ensure accuracy every time. With an adjustable throat paper depth of up to 70mm.', 850, 'Desktop Stationery', 'Staplers', 'Rexel', 'itemimages/b6edb948e3bdcb164af829ae6d6d45c11492595094.jpg', '2017-04-19 09:46:31', 'available', 0, 'notfav'),
(101, 'Leitz 25/10 Steel Staples (Pack of 1000)', 'For stapling up to 60 sheets (80 gsm). Each box contains 1,000 staples. Premium quality, recommended for use with all stapler brands. Up to 10 year guarantee on Leitz staplers when used with Leitz staples. 10 mm leg length ', 150, 'Desktop Stationery', 'Staplers And Staples', 'Leitz', 'itemimages/9defbb9c17de041c45cf47e84c96f0851492595526.jpg', '2017-04-19 09:52:13', 'available', 0, 'notfav'),
(102, '5-Star Office Highlighters Chisel Tip', 'Chisel tip with pocket clip on cap Water-based ink Line width: 1-4mm Yellow Packed 12 Pack Weight: 0.275 kg Pack Dimensions: 116x160x43 mm', 1500, 'Desktop Stationery', 'Highlighters', '5-Star', 'itemimages/5d70054c08b457deb17752995c039d571492595785.jpg', '2017-04-19 09:56:26', 'available', 0, 'notfav'),
(103, 'Q-Connect Assorted Highlighter Pens', 'Pack of 6. Mark important sections of documents with these vibrant Highlighters. The ink is bright and fade-resistant for long lasting results. Ideal for revision and general office and home use, this assored pack contains 6 highlighter pens in fluorescent yellow, pink, orange, green, blue and red.', 750, 'Desktop Stationery', 'Highlighters', 'Q-Connect', 'itemimages/a86a0a86f78020daa28c36de5680c9e41492595919.jpg', '2017-04-19 10:00:19', 'available', 0, 'notfav'),
(104, 'Q-Connect Blue Highlighter Pen', 'Pack of 10. The chisel tip highlighter allows for controlled and precise highlighting and underlining, and the ink is bright and fade-resistant for long lasting results. Ideal for revision and general office and home use, this pack contains 10 highlighter pens in fluorescent blue.', 1200, 'Desktop Stationery', 'Highlighters', 'Q-Connect', 'itemimages/4582f1600ef04cfe3f30025327ee158d1492596122.jpg', '2017-04-19 10:02:12', 'available', 0, 'notfav'),
(105, '5-Star Office Punch 2-Hole', 'Standard office hole punch. Non-slip plastic base. Adjustable paper guide. 5 year guarantee. Capacity: 30 sheets of 80g/m paper. ', 250, 'Desktop Stationery', 'Hole Punches', '5-Star', 'itemimages/0c0a45660c1567b1218e360d3793616e1492596364.jpg', '2017-04-19 10:06:28', 'available', 0, 'notfav'),
(106, '5-Star Office 2-Hole Heavy Duty', 'Standard office hole punch. Non-slip plastic base. Adjustable paper guide. 5 year guarantee. Capacity: 65 sheets of 80g/m paper. Black handle.', 1100, 'Desktop Stationery', 'Hole Punches', '5-Star', 'itemimages/ae6ce3cfe6731ac69a2ecc6602ca88f21492596449.jpg', '2017-04-19 10:07:46', 'available', 0, 'notfav'),
(107, 'Rexel 2-Hole Punch', 'The lightweight yet sturdy Ecodesk Punch, with 50% recycled content in the handle, is perfect for everyday home or office use. Easy to empty and with an adjustable guide for regular paper sizes, Ecodesk can handle up to 20 sheets at once.', 500, 'Desktop Stationery', 'Hole Punches', 'Rexel', 'itemimages/bb6ce10c6939bb034f3eb0491569d1661492596519.jpg', '2017-04-19 10:08:45', 'available', 0, 'notfav'),
(108, '5-Star Office Sticky Notes', 'Pack of 4. Self-adhesive, repositionable notes in a block. Neon Rainbow cube contains 400 sheets - 100 sheets of yellow, pink, green and orange. Size: 76x76mm (3 inch x 3 inch)', 280, 'Desktop Stationery', 'Sticky Notes', '5-Star', 'itemimages/f20adfefafd16626e24e5933d6d487a81492597051.jpg', '2017-04-19 10:18:31', 'available', 0, 'notfav'),
(109, 'Q-Connect Sticky Notes', 'Ideal for desktop use, this Q-Connect Quick Note Cube is designed for long lasting use, with 400 sheets per cube. The strong adhesive will adhere to most surfaces and removes cleanly, which is perfect for making notes or leaving messages and reminders.', 400, 'Desktop Stationery', 'Sticky Notes', 'Q-Connect', 'itemimages/a0a7d5d2bd70bcc4217d7e6b844234cc1492597193.jpg', '2017-04-19 10:20:38', 'available', 0, 'notfav'),
(110, '5-Star Office Rubber Bands', 'Contain 80 percent pure rubber taken from sustainable resources to protect the environment. Packed in resealable grip bag. Size: 152x6mm No.69. Natural colour. 0.45kg (1lb) bag. Approximately 141 Bands', 50, 'Desktop Stationery', 'Rubber Bands', '5-Star', 'itemimages/7221f73e4c30361d73100106db26bc291492597653.jpg', '2017-04-19 10:27:38', 'available', 0, 'notfav'),
(111, 'Q-Connect Ruler Shatterproof', 'This twin-use Q-Connect 300mm Ruler lets you measure and plot in both metric and imperial measurements. It features a bevelled edge that provides increased accuracy when measuring by shortening the distance between scale and paper. Sturdy clear acrylic provides durability for frequent use', 30, 'Desktop Stationery', 'Office Rulers and Geometric Sets', 'Q-Connect', 'itemimages/3afe27406db32f6cb96f6b7e4aa8389b1492597808.jpg', '2017-04-19 10:30:15', 'available', 0, 'notfav'),
(112, 'Q-Connect Clear Ruler', 'The twin-use scale lets you measure and plot in both metric and imperial measurements. It features a bevelled edge that provides increased accuracy when measuring by shortening the distance between scale and paper. Sturdy acrylic provides durability for frequent use', 100, 'Desktop Stationery', 'Office Rulers and Geometric Sets', 'Q-Connect', 'itemimages/6eb30b81a44ebc2c14c4fb5e9ab5a1521492597873.jpg', '2017-04-19 10:31:26', 'available', 0, 'notfav'),
(114, 'Helix Metric/Imperial Metre', 'This 100cm ruler features metric and imperial scales on one side and a vertical metric scale on the reverse.', 200, 'Desktop Stationery', 'Office Rulers and Geometric Sets', 'Helix', 'itemimages/a764dc15d2ab9b988b1dc730bf287a0b1492598673.jpg', '2017-04-19 10:44:37', 'available', 0, 'notfav'),
(115, 'Q-Connect All Purpose Scissors', 'These scissors have a comfortable, ergonomic plastic handle and steel blades which combine excellent cutting quality with safety conscious rounded edges. This scissors measure 210mm and are ideal for office environments.', 160, 'Desktop Stationery', 'Scissors', 'Q-Connect', 'itemimages/9ca595d6632ff4d187d695be8cc7f77f1492599247.jpg', '2017-04-19 10:54:27', 'available', 0, 'notfav'),
(116, '5-Star Office General Purpose Scissors', 'Suitable for cutting tougher materials. Features integral grooved centre grip to assist in the opening of bottles or jars. Size: 217mm ', 120, 'Desktop Stationery', 'Scissors', '5-Star', 'itemimages/666c16d0d64ed3ee37b29d1e7a6528ad1492599381.jpg', '2017-04-19 10:56:25', 'available', 0, 'notfav'),
(117, '5-Star Office Endorsing Ink', 'Endorsing ink 28ml bottle Colour Blue Pack Weight: 0.059 kg Pack Dimensions: 29x28x80 mm', 240, 'Desktop Stationery', 'Office Endorsing ink', '5-Star', 'itemimages/3eb18d8d6bb651f52efdc0b411aefe5e1492599492.jpg', '2017-04-19 10:58:14', 'available', 0, 'notfav'),
(118, '5-Star Office Stamp Pad', 'Foam pad, impregnated with ink. Sturdy plastic box. Re-inkable with washable endorsing ink (sold separately). Size: 110x70mm. Black', 300, 'Desktop Stationery', 'Office Stamps and Stamp Pads', '5-Star', 'itemimages/a4e6ee7228f5811b8758041b238b02e11492599613.jpg', '2017-04-19 11:01:17', 'available', 0, 'notfav'),
(119, 'Colop Self Inking Mini Dater', 'This handy, pocket-sized COLOP S120 Mini Dater features a 12 year date band and 4mm date height for organised records and filing. The mini dater is self-inking for long lasting use, with replacement ink pads available separately. The stamp prints an impression size of 20 x 4mm', 460, 'Desktop Stationery', 'Office Stamps and Stamp Pads', 'Colop', 'itemimages/ead2beae96bc5b55109f2f331d8821fc1492599743.jpg', '2017-04-19 11:02:30', 'available', 0, 'notfav'),
(120, '5-Star Office Staple Remover', '5-Star Office Staple Remover (Black). Classic traditional pinch type. Removes staples and pins easily', 120, 'Desktop Stationery', 'Staplers And Staples', '5-Star', 'itemimages/93bfacbc8cd9de8a819b9cc47b964fbc1492600339.jpg', '2017-04-19 11:04:17', 'available', 0, 'notfav'),
(123, 'Rapesco Staple Remover', 'The Rapesco 101 Staple Remover - the original and still the best. Safe and easy to use with a contoured grip - the 101 Staple Remover slides under the staple to remove and retain staple with ease. Colour: Black', 210, 'Desktop Stationery', 'Staplers And Staples', 'Rapesco', 'itemimages/da296f871f15258e45d53f53c7b774801492600532.jpg', '2017-04-19 11:15:36', 'available', 0, 'notfav'),
(124, '5-Star Office Stapler Half Strip', 'Lightweight, general purpose Half Strip office stapler. Plastic top and base', 650, 'Desktop Stationery', 'Staplers And Staples', '5-Star', 'itemimages/6f269cb5a54d51f7e8595b280231ba381492600627.jpg', '2017-04-19 11:17:09', 'available', 0, 'notfav'),
(125, '5-Star Office Stapler Long Arm', 'Full strip stapler. 300mm reach. Accepts 26/6 and 24/6 staples. 20 sheet capacity. Longer reach enables you to staple booklets, project folders and other large documents. ', 700, 'Desktop Stationery', 'Staplers And Staples', '5-Star', 'itemimages/76da9cb4f852b09eaaf5261f850d32ff1492600693.jpg', '2017-04-19 11:18:14', 'available', 0, 'notfav'),
(126, 'Rapesco Stand Up Space Saving Stapler', 'A convenient addition to your desktop workstation, this stapler uses less space and is easy to grab for quick use thanks to its upright positioning. Stylish and practical, this stand up/space saving stapler has a 20 sheet (80gsm) capacity, a 54mm throat depth and features a staple-refill indicator', 1400, 'Desktop Stationery', 'Staplers And Staples', 'Rapesco', 'itemimages/5add7633b06b0f5f72e22ca0aacac3c61492600761.jpg', '2017-04-19 11:19:23', 'available', 0, 'notfav'),
(127, '5-Star Office Staples 24-6', 'Fits full strip and half strip models, stand up and long arm. 24 gauge wire and 6mm shank. Boxed 5000. ', 180, 'Desktop Stationery', 'Staplers And Staples', '5-Star', 'itemimages/6cb7903563571c1a15d432f8aa76e2361492600856.jpg', '2017-04-19 11:21:01', 'available', 0, 'notfav'),
(128, 'Rapesco Staples 8mm 24/8', 'Pack of 5000. Made from the very best materials, these staples are designed to ensure that your documents never come unfastened without you wanting them to. These Rapesco staples fit into a wide variety of staplers, making them the perfect supplies whatever make of machine you have.', 145, 'Desktop Stationery', 'Staplers And Staples', 'Rapesco', 'itemimages/7ec41ad3400bf4ec3372e0c3e8cc7a001492600925.jpg', '2017-04-19 11:22:11', 'available', 0, 'notfav'),
(129, '5-Star Office Clear Tape', 'Made from polypropylene. 40 micron easy tear film. Size: 25mmx66m. Large Rolls. Clear. Pack of 12', 350, 'Desktop Stationery', 'Sticky Tapes And Cellotape', '5-Star', 'itemimages/88c31458225b48ed02eaae63a960d7011492601060.jpg', '2017-04-19 11:24:22', 'available', 0, 'notfav'),
(130, 'Scotch Easy Tear Adhesive Tape', 'Pack of 6 Rolls. This clear adhesive tape is the perfect way to hide those repairs or disguise document or parcel sealing. The high quality, transparent tape for light duty sealing, labelling and repair is virtually easy to tear when you need an instant quick fix. Best used on paper like envelopes', 350, 'Desktop Stationery', 'Sticky Tapes And Cellotape', 'Scotch', 'itemimages/d23e0de61c84d1eb629a83cfedf3e64b1492601278.jpg', '2017-04-19 11:28:21', 'available', 0, 'notfav'),
(131, '5-Star Office Tape Dispenser Desktop Roll', 'For rolls 33 metres long, up to 19mm wide Includes 1 core piece to accommodate 25mm internal diameter roll of tape Tape not included WxDxH: 166x70x77mm Black Pack Weight: 0.573 kg Pack Dimensions: 73x168x81 mm', 400, 'Desktop Stationery', 'Sticky Tapes And Cellotape', '5-Star', 'itemimages/40f02dcfacbd79805938627361d982131492601392.jpg', '2017-04-19 11:29:53', 'available', 0, 'notfav'),
(132, 'Q-Connect Carton Sealer', 'This Q-Connect Carton Sealer is ideal for a range of warehouse and mailroom uses. Providing an easy way to secure packages for transit, the dispenser features a fully adjustable brake for quick, efficient sealing, which reduces waste and saves you money.', 500, 'Desktop Stationery', 'Sealers', 'Q-Connect', 'itemimages/9e0a6c06374857d7b49e43dd4db45ff61492601585.jpg', '2017-04-19 11:33:07', 'available', 0, 'notfav');
INSERT INTO `items` (`itemId`, `itemName`, `description`, `price`, `itemCategory`, `subCategory`, `model`, `itemImage`, `dateAdded`, `availability`, `boughtTimes`, `favorite`) VALUES
(134, '5-Star Office Manilla envelopes', 'Pack of 100. Quality 120g/m2 manilla board backed envelopes. Rigid board keeps important documents safe. Hot Melt Peel and Seal closure', 1340, 'Paper Products', 'Envelopes', '5-Star', 'itemimages/218ea17a81dd437f99a09c40d7ab09291492601896.jpg', '2017-04-19 11:38:17', 'available', 0, 'notfav'),
(135, 'Guardian Manilla Peel and Seal Envelopes', 'Pack of 200. New Guardian Heavyweight Manilla Board Backed Envelopes. Send documents with confidence in these high quality manilla board backed envelopes which provide a combination of good looks and strength. Exceptionally strong 130g/m ribbed manilla paper across the whole range.', 1700, 'Paper Products', 'Envelopes', 'Guardian', 'itemimages/87861dced5ef585cf17fa8515b43a1f11492601998.jpg', '2017-04-19 11:40:16', 'available', 0, 'notfav'),
(136, '5-Star Office  Mediumweight Pocket Press Manilla Envelopes', 'Medium weight 90g/m Manilla Envelopes. Suitable for all kinds of general correspondence and mailings. Made from 100% recycled material. Press Seal. Pocket style. Size: C4 324x229mm. Boxed 250.', 1900, 'Paper Products', 'Envelopes', '5-Star', 'itemimages/33ed32b08990e7110982265d5e1e888c1492602410.jpg', '2017-04-19 11:43:45', 'available', 0, 'notfav'),
(137, '5-Star Office Envelopes Pocket Press Seal Window', 'Medium weight 90g/m2 Envelopes. Suitable for all kinds of general correspondence and mailings. Window 100x40mm, 62mm in, 25mm up. White with blue opaque interior for security. Self Seal. Pocket style. Size: C5 229x162mm. Boxed 500. ', 1600, 'Paper Products', 'Envelopes', '5-Star', 'itemimages/b154fc72681f7a13f3af4e10be38e2cd1492602312.jpg', '2017-04-19 11:46:11', 'available', 0, 'notfav'),
(138, '5-Star Office Internal Mail Envelopes Manilla', '5-Star (C4) Internal Mail Envelopes Manilla (Buff) Pack of 250. Manilla internal mail envelopes. Re-sealable with printed areas on both sides. Ideal for use in large organisations or multi-site businesses', 1800, 'Paper Products', 'Envelopes', '5-Star', 'itemimages/801ff3cec5518d36873517d00a0a18d91492602646.jpg', '2017-04-19 11:50:50', 'available', 0, 'notfav'),
(139, 'GPC Folding Lightweight Trolley', 'This strong and convenient trolley from GPC can be easily folded for efficient storage and ultimate portability. With a flat base made from pressed sheet steel the trolley is strong enough to handle a maximum load of 150 kilograms, while a non-slip, non-marking PVC surface helps to ensure stability.', 10500, 'Office Furniture', 'Trolleys', 'GPC', 'itemimages/eb489a0a89aa5f49f08a7675b35c1b411492611410.jpg', '2017-04-19 14:20:23', 'available', 0, 'notfav'),
(140, 'Jemini 4-Leg Desk With 2 Drawers', 'This 4 leg desk from the Jemini Intro range features an 18mm thick desktop with sturdy metal legs. The simple design is suitable for use at home, or in the office. The desk has a contemporary Warm Maple finish and comes with a modesty panel and double pedestals included as standard.', 14200, 'Office Furniture', 'Desks and Tables', 'Jemini', 'itemimages/c7f642dcd809bc02c6a2de03e1639a391492611723.jpg', '2017-04-19 14:23:05', 'available', 0, 'notfav'),
(141, 'Jemini Cupboard Bavarian', 'This Jemini Cupboard provides storage space for your files, books and documents. The cupboard comes in a contemporary Bavarian Beech finish with two shelves included as standard. Designed to accommodate both A4 and foolscap files', 9500, 'Office Furniture', 'Cupboards', 'Jemini', 'itemimages/88503ba2610dcc27931d1bcc6e97ed2b1492611879.jpg', '2017-04-19 14:24:53', 'available', 0, 'notfav'),
(142, 'Phoenix Filing Cabinet', 'The Phoenix World Class Vertical Fire File FS2250 Series offers unrivalled Protection for documents and Data in a stylish modern filing cabinet format. Ultra lightweight insulation materials mean the cabinet can be used on most standard floors without the need for support. Fire Protection (Paper)', 22500, 'Office Furniture', 'Filing Cabinet', 'Phoenix', 'itemimages/9fdcd8c8f09d5daa09f10fcf31fe54ac1492612025.jpg', '2017-04-19 14:27:12', 'available', 0, 'notfav'),
(143, 'Cappela Posture Chair Plus Arms', 'The Cappela posture chair is an entry level chair with a lumbar pump for increased support. The adjustable arms also provide added comfort for the user. Recommended usage time: 8 hours. Seat dimensions: W470 x D450mm. Back dimensions: W450 x H500mm. Adjustable seat height: 460-590mm. Colour: Black', 15000, 'Office Furniture', 'Office Chairs', 'Cappela', 'itemimages/9544a93dd646411b0a8f128754b1d6de1492612121.jpg', '2017-04-19 14:28:46', 'available', 0, 'favorite'),
(144, 'TheMicke Desk Screen Wave set', 'Made to order option available ---&gt; 2 Year Warranty. 25mm MFC Core.  UK Fire retardant fabric. Fixing Brackets supplied. 4 Fabric colours held in stock (Blue, Burgundy, Charcoal and Green). 3 additional fabric colours made to order (Black, Red, Grey) ', 201000, 'Office Furniture', 'Desks and Tables', 'TheMicke', 'itemimages/a661a53e174701f07e56efb6d2eade7c1492612338.jpg', '2017-04-19 14:35:27', 'available', 0, 'notfav'),
(145, 'Jemini Reception Desk Riser', 'This 1600mm riser creates a stylish Warm Maple finish counter for your reception. The counter also features shelving underneath for additional storage and measures W1600xD300xH405mm. ', 36000, 'Office Furniture', 'Reception Furniture', 'Jemini', 'itemimages/4a546359674bb4f14f589aa2830c0c241492612564.jpg', '2017-04-19 14:41:54', 'available', 0, 'favorite'),
(146, 'Jemini Corner Desk Riser', 'This 800mm radial riser creates a stylish Warm Maple finish counter for your reception. The curved counter also features shelving underneath for additional storage and measures W800xD300xH405mm.', 18600, 'Office Furniture', 'Reception Furniture', 'Jemini', 'itemimages/946a4269eb372894a4176f98ddfebf931492613034.jpg', '2017-04-19 14:44:23', 'available', 0, 'favorite'),
(147, '5-Star Office Binding Combs', '21 ring for A4 paper. For use with all comb binding machines. Size: 6mm. Sheet Capacity: 35. Black. Boxed 100. ', 2000, 'Office Machines and Electronics', 'Binding Machines & Accessories', '5-Star', 'itemimages/79537c7c083ff2a4f4a43b75512c81ee1492613494.jpg', '2017-04-19 14:51:18', 'available', 0, 'notfav'),
(148, '5-Star Office Comb Binding Machine', 'Comb binding machine with 8 page punch capacity for documents and presentation up to 115 x A4 sheets. \r\nPerfect bound documents with attractive plastic binding. Combs can be reopened for additional or removal of sheets. 8 sheet punching capacity at 80 gsm ', 5400, 'Office Machines and Electronics', 'Binding Machines & Accessories', '5-Star', 'itemimages/ef6a90a34ed30b5d2c6ffaed95e522c21492615362.jpg', '2017-04-19 15:24:45', 'available', 0, 'notfav'),
(149, 'Cash Register Ribbon Purple', 'Providing you with an easy way to make the most out of your cash register, this product is perfect for all retailers. With this product you can guarantee that your receipts will always be clear and easily read, preventing confusion. This cartridge guarantees that all of your printing is smooth', 2400, 'Office Machines and Electronics', 'Cash Registers and Accessories', 'TheMicke', 'itemimages/f418375d1812193e33c70154fdc6949e1492615543.jpg', '2017-04-19 15:27:57', 'available', 0, 'notfav'),
(150, '4-Way 13 Amp 2 Metre Extension', 'Lead White With Neon Light. With a 13 amp fuse, if there are ever any sudden power surges your delicate (and expensive) electronic items are protected against what can be lasting damage. A clear neon light indicates when the extension lead is on, preventing accidental electric shocks.', 1800, 'Office Machines and Electronics', 'Electrical Accessories', 'TheMicke', 'itemimages/42583e2831b34bf71e6e339e00b47c7d1492615736.jpg', '2017-04-19 15:30:52', 'available', 0, 'notfav'),
(151, 'Martin Yale 7200 Folding Machine', 'Automatic A4 desktop folding machine, 50 sheet feed table capacity, 4.000 speed (sheets/h), 60-105g/m paper weight. Accepts stapled sets, creates four different folds: letter, half, z-fold and double parallel, feed tray hold a 1.3cm stack of paper, automatically feed and folds a stack of documents ', 10500, 'Office Machines and Electronics', 'Folding Machines', 'Martin Yale', 'itemimages/9818e213bc9ee0ecd31a3099ced2115b1492616006.jpg', '2017-04-19 15:33:31', 'available', 0, 'notfav'),
(152, '5-Star Office A4 Hot and Cold Laminator', 'A4 Laminator with energy saving PTC Technology. laminates up to 2 x 100 micron pouches with ABS function to avoid paper jams. Unique design with separate pouch tray and cable organizer. Warm up time 4-5 minutes. Hot or cold pouch lamination', 6600, 'Office Machines and Electronics', 'Lamination', '5-Star', 'itemimages/e8882c202325796d90d27da8cf8a9bc61492616344.jpg', '2017-04-19 15:39:21', 'available', 0, 'notfav'),
(153, 'Brother HL Mono Laser Printer', 'Super-fast print speeds of up to 46ppm. 8,000 page inbox toner and optional super high yield 12,000 page toner cartridge. Intuitive 4.5cm touchscreen LCD display ', 14000, 'Office Machines and Electronics', 'Printers', 'Brother HL', 'itemimages/c71de9129bbeb9cb97f9bc4884ab35d11492616399.jpg', '2017-04-19 15:42:14', 'available', 0, 'notfav'),
(154, 'Connekt Network Cable RJ45 Cat6 Grey 2m', 'This Connekt network cable is rated for Gigabith Ethernet (up to 1 Gbit/s), with Category 6 cable. The design features moulded plastic connectors with a snagless boot to protect the clip from damage.', 250, 'Computing', 'Computer Networking', 'Connekt', 'itemimages/54be0419589cad2da35ac929d714d32a1492616610.jpg', '2017-04-19 15:47:01', 'available', 0, 'notfav'),
(155, '5-Star Office Mouse Mat', 'Clean, smooth surface for reliable tracking. 6mm rubber sponge backing. WxD: 248x220mm. Colour: Blue ', 500, 'Computing', 'Computer Accessories', '5-Star', 'itemimages/c7f3f3c09ef8f510290daa67a342d1a11492616951.jpg', '2017-04-19 15:49:14', 'available', 0, 'notfav'),
(156, 'Monolith Executive Backpack', 'Constructed from exceptionally tough nylon for protection from punctures and scrapes. Inside find a large internal compartment with divisions for your files and folders, plus a zipped organiser at the front for smaller accessories and a fully padded section for laptops and tablets', 3600, 'Computing', 'Bagpacks', 'Monolith', 'itemimages/b97de2908b01c5ec10a3de6728b6ed751492617303.jpg', '2017-04-19 15:55:05', 'available', 0, 'notfav'),
(157, '5-Star Office Computer Cleaning Kit', 'All you need in one kit to clean keyboards, screens and hard surfaces. Non-flammable. Anti-static. Contains: 200ml invertible air duster; 125ml surface, casing and keyboard cleaner; Keyboard tool; 10 absorbent wipes; 10 wet and dry screen sachets.', 5000, 'Computing', 'Computer Cleaning', '5-Star', 'itemimages/f80af2140258d7e7482224fb98c989771492617569.jpg', '2017-04-19 15:59:33', 'available', 0, 'notfav'),
(159, 'Toshiba 1TB inch External Hard Disk Drive USB 3.0', 'Quickly transfer files with SuperSpeed USB 3.0. Plu and Play- require no software installation, making it easier to start storing or backup all of your favourite files. 2.5 inch external hard drive.1 TB capacity. High speed USB 3.0 port ', 8500, 'Computing', 'Computer Accessories', 'Toshiba', 'itemimages/bd5ce2e03e2f9e6d3507cbe2e05305a31492618428.jpg', '2017-04-19 16:13:51', 'available', 0, 'notfav'),
(160, 'Verbatim CD-R Datalife 700MB 52X Spindle', 'Pack of 10. The white label surface can be used with compatible inkjet printers to print full-colour labels from the edge right up to the central hub. They have high compatibility with a range of devices, they are great for creating professional-looking music or data CDs for wide distribution', 1500, 'Computing', 'Computer Accessories', 'Verbatim', 'itemimages/6e785d66eb1244fa51322fa535bb30f31492618836.jpg', '2017-04-19 16:20:39', 'available', 0, 'notfav'),
(161, 'TheMicke HDMI 3M Cable', 'For high speed transmission of digital audio and video data, e.g. between a Blu-ray player, satellite receiver and TV. For perfect, high-resolution full HD quality (4096 x 2160 pixels). High speed transmission of up to 10.2 Gbit/s for all image and sound standards', 1420, 'Computing', 'Cables and Adapters', 'TheMicke', 'itemimages/f0395852cb7b0d98987a3e95c9bfad321492619039.jpg', '2017-04-19 16:24:01', 'available', 0, 'notfav'),
(162, '5-Star Office Keyboard USB Wired', 'Keyboard USB Wired Black. USB keyboard with multiple hot keys for enhanced consumer function ', 2500, 'Computing', 'Computer Accessories', '5-Star', 'itemimages/3a5610db6d18634266bc2fa7b92319661492619207.jpg', '2017-04-19 16:26:51', 'available', 0, 'notfav'),
(163, 'Logitech S-150 Speakers Black', 'Plugging directly into your USB port, Logitech S-150 Speakers are a better way to make the most out of your computer without difficulty. The speakers provide you with great quality sound Featuring adjustable volume and a mute button', 1800, 'Computing', 'Computer Accessories', 'Logitech', 'itemimages/aa9f2cd6be2c7687fc9a912d7d94f1c21492619322.jpg', '2017-04-19 16:29:06', 'available', 0, 'notfav'),
(164, 'Kensington Wired Mouse', 'For a reliable wired mouse and great everyday performance at an attractive price. The highly responsive 800 dots-per-inch optical sensor and integrated scrollwheel makes precision clicking and scrolling easier. An ambidextrous grip eases comfort and allows for better control', 800, 'Computing', 'Computer Accessories', 'Kensington', 'itemimages/ab6c9d2db1e1e11cd2b87897a3cf5f741492619486.jpg', '2017-04-19 16:31:28', 'available', 0, 'notfav'),
(165, 'Lightpak Executive Laptop Bag', 'Executive Line Laptop Bag 46029 LIMA handle and removable shoulder strap, zipper pocket and A4 device for attachment to the trolley rack on the back pocket with three compartments large slots, Zipped front pocket with pen loops and four other large slots. Interior: Padded laptop compartment', 5000, 'Computing', 'Bagpacks', 'Lightpak', 'itemimages/f6c5ac416d47c81bbdff0b57635307271492619639.jpg', '2017-04-19 16:34:04', 'available', 0, 'notfav'),
(166, 'Burco Filter Coffee Maker', 'This Burco Filter Coffee Machine provides you with delicious coffee, convenience and value for money. Brewing almost as quickly as instant coffee, but with a superior, quality taste, this machine provides you with a delicious beverage. With a 3.4 litre capacity. ', 6500, 'Kitchen Equipment', 'Coffee Makers', 'Burco', 'itemimages/67df7e28b4ee2b94b25a900b266ba1901492619779.jpg', '2017-04-19 16:36:20', 'available', 0, 'notfav'),
(167, 'Igenix Coffee Maker Black', 'With a large 1.5 litre (roughly 10 cup) capacity, this Filter Coffee Maker provides an easy way to make a large quantity of delicious and fresh coffee. The maker also features a swing out basket that allows you to easily refill the coffee for a simple coffee brewing process.', 4580, 'Kitchen Equipment', 'Coffee Makers', 'Igenix', 'itemimages/946eaa044079811c47d7b409844f45351492619892.jpg', '2017-04-19 16:38:14', 'available', 0, 'notfav'),
(168, 'Igenix Toaster 4-Slice', 'Cooking up to four slices of toast simultaneously, this toaster is the perfect product to deal with heavy demand. Working quickly with different heat settings, this toaster provides a variety of choice for multiple users. Easy to clean, due to the hinged crumb trays', 5400, 'Kitchen Equipment', 'Toasters', 'Igenix', 'itemimages/e15dbc5eea7a1280208fcdd0fe0c6ff51492620272.jpg', '2017-04-19 16:44:33', 'available', 0, 'notfav'),
(169, 'TheMicke Microwave Oven 800W', 'This 800W microwave features a 20 litre capacity, with easy to use digital controls and a digital timer for accurate cooking times. The microwave has 5 power levels, including a defrost function for versatile use. Great for shared staff kitchens, the microwave measures W440 x D330 x H259mm.', 10800, 'Kitchen Equipment', 'Microwaves', 'TheMicke', 'itemimages/06698cf6b6e2a7cbb3827e0e66c415ea1492620507.jpg', '2017-04-19 16:48:40', 'available', 0, 'notfav'),
(170, 'TheMicke Table Top Refrigerator', 'With a compact size, this Table Top Refrigerator is designed to fit comfortably onto a desk top, but uses space with maximum economy to enable sufficient room for your contents. Featuring a separate chill compartment, this product can also accommodate frozen items without any difficulty', 29800, 'Kitchen Equipment', 'Cooling Appliances', 'TheMicke', 'itemimages/c571dcaca6ef82e1031cf53e2ec446501492620642.jpg', '2017-04-19 16:50:49', 'available', 0, 'notfav'),
(171, '5-Star Facilities Twin Toilet Roll Dispenser', 'This popular two-roll design halves restocking time, as when one roll is finished the other cleverly drops into its place. The model accepts conventional toilet rolls which are easier to store than jumbo paper rolls Simple to restock, and the internal mechanism is very hard-wearing', 2600, 'Cleaning Products', 'Toilet Roll Dispensers', '5-Star', 'itemimages/81590a779ae764a9e78a385e22d9a2041492621033.jpg', '2017-04-19 16:57:14', 'available', 0, 'notfav'),
(172, 'Numatic Xtra-Compac Cleaning Trolley', 'With 3 Buckets and 2 Tray Units (Blue). The ideal choice of service trolley where space is at a premium and the need for mopping is limited. Complete with two deep tray units, two 6-litre storage buckets and an 18-litre mop bucket with wringer ', 8400, 'Cleaning Products', 'Cleaning Trolleys', 'Numatic', 'itemimages/f6baf00794f1422a9feea89b3e8219821492621075.jpg', '2017-04-19 17:01:26', 'available', 0, 'notfav'),
(173, 'PVC Sign Caution Wet Floor', 'Model WF S001 (new model SPC/FS01 to be introduced). PVC yellow warning sign. Message on both sides. Folds flat to store. Complete with carrying handle. Yellow flute polypropylene. Different message on each side:  Cleaning in Progress  /  Caution Wet Floor', 2100, 'Cleaning Products', 'PVC Signs', 'TheMicke', 'itemimages/27d73e964103b57c5cfadbdcdccab87a1492667915.jpg', '2017-04-20 05:58:36', 'available', 0, 'notfav'),
(174, 'Cloth Mop with Thick Absorbent Strands', 'Thick absorbent cloth strands. Easy change heads. Colour code: Red', 650, 'Cleaning Products', 'Cleaning Equipment', 'TheMicke', 'itemimages/06ab6d7d84aa4ad8041046407928c07d1492668061.jpg', '2017-04-20 06:01:02', 'available', 0, 'notfav'),
(175, 'Q-Connect Desktop Fan', 'This mains-powered fan features a sturdy desk stand that keeps it stable during use. You can manually tilt the fan to suit your needs, and the automatic oscillating function rotates the fan head back and forth to provide cooling to an entire room. ', 4500, 'Cooling and Heating', 'Fans', 'Q-Connect', 'itemimages/2481f086736656992057c5f048fe72b21492668503.jpg', '2017-04-20 06:08:24', 'available', 0, 'notfav'),
(176, '2kw Flat Fan Heater White', 'The unobtrusive mains powered heater has a low profile and features two different heat settings as well as a cool air setting, ideal for adjusting to the current temperature in the room. The adjustable thermostat lets you set your desired temperature and has a overheat safety cut off. ', 3500, 'Cooling and Heating', 'Fans', 'TheMicke', 'itemimages/16e12097ce3ab494b09bb7d7c99e1cf71492668609.jpg', '2017-04-20 06:10:09', 'available', 0, 'notfav'),
(177, 'Stanley High Output Professional Glue Gun', 'Fast Warm up - heats up in 60sec vs. current GR100140sec remains the same wattage even during pumping glue b/c of Ceramic Heater. High Glue Output - 2.5-3.3 lbs/per hr vs. current GR100 1.67 lbs/per hr. Hibernate Mode: Stores heating after 30 minutes of non use. Dual Color LED.', 4500, 'Office Maintenance', 'Maintenance Equipment', 'Stanley', 'itemimages/44e1c5cb5a0ef86a1d1e814df397bb621492668902.jpg', '2017-04-20 06:15:10', 'available', 0, 'notfav'),
(178, 'Folding Aluminium Ladder', 'Safety household ladder. Safety rail with bucket hook. Steel platform with non-slip ribbing and hinge spreader. Safe, high-tech riveted rail-step joins. Slip-resistant feet. Wide and deep aluminium steps Maximum load capacity: 150kg. Maximum working height: 2.60m ', 2800, 'Office Maintenance', 'Maintenance Equipment', '5-Star', 'itemimages/3e21bdb260d6833bfa0b13157ce5a7b61492669058.jpg', '2017-04-20 06:17:43', 'available', 0, 'notfav'),
(179, 'Coba Wheeled Line Marking Paint Applicator', 'Four wheel applicator for line marking paint. Allows fast accurate application of line marking paint for internal andamp; external use. Supplied with trigger nozzle to release paint ', 5400, 'Office Maintenance', 'Maintenance Equipment', 'Coba', 'itemimages/08f5e933517173b57972372bc70da52b1492669235.jpg', '2017-04-20 06:21:41', 'available', 0, 'notfav'),
(180, 'Stanley Retractable Tape Measure', 'For the precise and easy measurement up to 3 metres or 10 feet, the Stanley Retractable Tape Measure is the perfect solution for you. Unfurling from a plastic case, this tape measure is easy to use and will not tangle like fabric measures can. The tape can be locked for easy measurement.', 1200, 'Office Maintenance', 'Maintenance Equipment', 'Stanley', 'itemimages/e784e06b44ad23350a6e243791b271cf1492669341.jpg', '2017-04-20 06:22:40', 'available', 0, 'notfav'),
(181, 'IVG Extinguisher Refillable Dry Powder', 'Dry powder fire extinguisher. Complete with mounting bracket. Non-toxic and safe in confined space. Versatilefor most types of fire including: Class A (combustible materials, wood, paper etc), Class B (flammable liquid fires, petrol, paint, oil etc). Class C (gaseous fires fires and electrical fires', 5500, 'Health and Safety', 'Fire and Safety', 'IVG', 'itemimages/1858e433cd0b5a1e7dc3b02fb348334f1492669591.jpg', '2017-04-20 06:26:32', 'available', 0, 'notfav'),
(182, '5-Star Facilities First Aid Kit', '5-Star Facilities First Aid Kit HS1 1-50 People. Supplied complete with wall bracket.', 3100, 'Health and Safety', 'First Aid', '5-Star', 'itemimages/2921f08deab4b8672f6586534b2239271492669633.jpg', '2017-04-20 06:28:36', 'available', 0, 'notfav'),
(183, '5-Star Value Packaging Tape', '5-Star Value Packaging Tape 50mmx66m Colour: Buff - Pack of 6', 720, 'Desktop Stationery', 'Sticky Tapes And Cellotape', '5-Star', 'itemimages/c3ad8d3ae1990519eaaa91a365a13fbc1492669790.jpg', '2017-04-20 06:30:48', 'available', 0, 'notfav'),
(184, '5-Star Office Custom Self-Inking Imprinter Stamp', 'Lightweight yet robust. New formulation high density ink. No pad required. Up to 4 lines 40x15mm. Replacement ink pad', 500, 'Desktop Stationery', 'Office Stamps and Stamp Pads', '5-Star', 'itemimages/15436caaed7d9dd19530c0c853ff3a501492669965.jpg', '2017-04-20 06:32:48', 'available', 0, 'notfav'),
(185, 'Double Corrugated Dispatch Cartons', 'These dispatch cartons feature double corrugated walls for extra protection in transit. Delivered flat, the boxes are easy to store when not in use and easily constructed when you need them. Measuring 305 x 305 x 305mm, Ideal for shipping, packaging, transportation and storage. Pack of 15', 1400, 'Filing and Archiving', 'Packing Boxes', 'TheMicke', 'itemimages/7246e639c41cd4b2c81174c852f7d49d1492670158.jpg', '2017-04-20 06:35:29', 'available', 0, 'notfav'),
(186, 'Securikey Personal Alarm', 'With a portable size and 120 decibel alarm system, you can rest assured that if you were faced with a crime, you have an alarm system to alert others to help you and help to deter assailants. With a protective case that is designed to resist breakages.', 8000, 'Security Equipment', 'Alarm systems', 'Securikey', 'itemimages/af50d247b334964eac4e9ef9299e5c481492670299.jpg', '2017-04-20 06:39:32', 'available', 0, 'notfav'),
(187, 'Mechanical Digital Door Lock', 'Mechanical Digital Door Lock Zinc Alloy with Fail Safe and 4000 Possible Combinations. Prevent unauthorised entry to restricted areas. Mechanical operation - no wiring or batteries required', 10000, 'Security Equipment', 'Door Locks', 'TheMicke', 'itemimages/fb42cd3a97a749a8c11a657207bb767e1492670554.jpg', '2017-04-20 06:42:42', 'available', 0, 'notfav'),
(188, 'Nitrile gloves Large Size ', 'Black - Puncture Resistant, Textured, Powder-free -100 per Box\r\nMore than 3 times more puncture-resistant than latex or vinyl\r\nLong enough for protection over the wrist. Textured for a secure grip in both wet and dry conditions', 300, 'Cleaning Products', 'Cleaning Equipment', 'Nitrile', 'itemimages/3295a463357b462fb86bf187e37e3c021492957985.jpg', '2017-04-23 14:33:06', 'available', 0, 'notfav'),
(189, 'Steel Shackle lock', 'Features a double-armored stainless steel body and combination security for keyless convenience Maximum security, 3-digit dialing with 1,500 combinations and a black dial with easy-to-read numbers. Features a cut-resistant, hardened steel shackle and permanently lubricated rust-resistant mechanism', 2300, 'Security Equipment', 'Door Locks', 'TheMicke', 'itemimages/50c7662ff69b5d7b545e981e8ad291dc1492958221.jpg', '2017-04-23 14:37:02', 'available', 0, 'notfav'),
(190, 'Epson LQ-590 Dot Matrix Printer', '24-pin - 80 Column - 529 Mono - USB - Parallel. Dot Matrix color printer with 128KB standard memory and 24-pin printing. Print size ranges from 3.9" to 10.1" Prints up to 529. Connect the printer to your computer with the USB 2.0 or Type B Parallel connector', 8500, 'Office Machines and Electronics', 'Printers and Multifunction Machines', 'Epson', 'itemimages/08118ec8e48c4f35fda3118d75c143961492958413.jpg', '2017-04-23 14:40:22', 'available', 0, 'favorite'),
(191, 'Canon PIXMA iX6820 Inkjet Printer', '14.5 ipm Mono Print / 10.4 ipm Color Print (ISO) - 36 Second Photo - 150 sheets Standard Input Capacity - Ethernet - Wireless LAN - USB. 9600 x 2400 maximum color dpi delivers exceptional printing detail. 1-picoliter sized ink droplets produce sharp, exceptionally detailed photos', 10400, 'Office Machines and Electronics', 'Printers and Multifunction Machines', 'Canon', 'itemimages/0f6c2c8edb877f749e3f26552401fd971492958554.jpg', '2017-04-23 14:42:35', 'available', 0, 'notfav'),
(192, 'G2 Retractable Gel Ink Rollerball Pens', 'Fine Point Type - 0.7 mm Point Size - Refillable - Black Gel-based Ink - Clear Barrel - 1 Dozen. Proven No. 1 Longest Writing vs. average of top gel ink brands, Smooth writing and smearproof. Comfortable, latex-free rubber grip Retractable and refillable with visible ink supply', 200, 'Desktop Stationery', 'Pens and Pencils', 'G2', 'itemimages/d0b8d89b0ba6dccdb3f65d16c5ce19ba1492958800.jpg', '2017-04-23 14:46:52', 'available', 0, 'notfav'),
(193, 'Sharpie Pen-style Permanent Marker', 'Fine Point Type - Black Alcohol Based Ink. Writes on most hard-to-mark surface. Fine point tip produces thinner, detailed line. For use on multiple projects; ink is fade-resistant and water-resistant. Alcohol-based ink is quick-drying and nontoxic\r\nBlack', 250, 'Desktop Stationery', 'Pens and Pencils', 'Sharpie', 'itemimages/e83eba8153a049e235f304b4281a45bd1492959006.jpg', '2017-04-23 14:50:20', 'available', 0, 'notfav'),
(194, 'Dixon Woodcase No.2 Eraser Pencils Box', '#2 Lead Degree (Hardness) - Black Lead - Yellow Barrel - 144 / Box', 3500, 'Desktop Stationery', 'Pens and Pencils', 'Dixon', 'itemimages/83489e31849d971b6a44d16e16f67e5f1492959115.jpg', '2017-04-23 14:52:30', 'available', 0, 'notfav'),
(195, 'Eureka Airspeed Vacuum Cleaner', 'Bagless - 13" Cleaning Width - 27 ft Cable Length - 10 ft Hose Length - AC Supply - 12 A. Air path with limited bends and turns allow more air to pass through vacuum.Direct air path from floor to cup increases airflow for powerful suction.Multisurface design deep cleans carpcarpets, bare floors', 5200, 'Cleaning Products', 'Vacuum Cleaners', 'Eureka', 'itemimages/e1ead1fe43ea03a4f56997da28aa1c7a1492959391.jpg', '2017-04-23 14:56:43', 'available', 0, 'notfav'),
(196, 'Kleenex Moisturizing Hand Sanitizer', 'Fruit Scent - 8 fl oz (236.6 mL) - Pump Bottle Dispenser - Kill Germs - Hand - White - Moisturizing, Antimicrobial, Hygienic - 1 Each. Helps reduce the spread of germs at your business\r\nKills 99.9% of germs in as little as 15 seconds', 250, 'Cleaning Products', 'Hand Sanitizers', 'Kleenex', 'itemimages/585d7e9936205a7cf5c37855976664b21492959609.jpg', '2017-04-23 15:00:15', 'available', 0, 'notfav'),
(197, 'Genuine Joe 2-Ply Roll Paper Towels', '2 Ply - 8.80" x 11" - 80 Sheets/Roll - White - Perforated - For Food Service - 30 / Carton. Perforated, 2-ply for fast spill pickup and greater liquid capacity. Use in the kitchen, breakroom or anywhere else you need a sheet quickly', 180, 'Cleaning Products', 'Paper Towels', 'Genuine', 'itemimages/62c0db5ead6084a934f8ba0d640cf74b1492959824.jpg', '2017-04-23 15:03:55', 'available', 0, 'notfav'),
(198, 'Genuine Joe Heavy-Duty Trash Can Liners', 'Extra Large Size - 60 gal - 39" Width x 56" Length x 1.50 mil (38 Micron) Thickness - Low Density - Black - 50/Carton. 3 times more puncture-resistant than standard liners. 2-ply bag is folded for easy dispensing', 100, 'Cleaning Products', 'Trash Bags', 'Genuine', 'itemimages/37a01c3c74db39b1cbcf8555599202c31492960006.jpg', '2017-04-23 15:06:58', 'available', 0, 'notfav'),
(199, 'TheMicke fire extinguisher', 'A: Common Combustibles, B: Flammable Liquids, C: Live Electrical Equipment - Rechargeable, Impact Resistant - Red\r\nRechargeable\r\nDesigned to meet most commercial and industrial specifications.', 4600, 'Health and Safety', 'Fire and Safety', 'TheMicke', 'itemimages/df91c4d3cef6a451324112330824939e1492960091.jpg', '2017-04-23 15:08:51', 'available', 0, 'notfav'),
(200, 'Gel Mouse pads Black', 'Features an ergonomically contoured design filled with gel\r\nConforms to wrists and palms and reduces pressure points for exceptional forearm and wrist comfort. Nonskid base holds mouse pad firmly in place', 260, 'Computing', 'Computer Accessories', 'Gel', 'itemimages/69475145a69dad26d66c76748351bc661492960548.jpg', '2017-04-23 15:15:52', 'available', 0, 'notfav'),
(201, 'Kantek Widescreen Privacy Filter Black', 'For 24" Monitor, Notebook. Helps ensure the privacy of on-screen data with a built-in look. Image is only visible to those directly in front of the screen; side view is black. Use to reduce glare and increase contrast. Also protects your delicate LCD surface from damage', 350, 'Computing', 'Monitors', 'Kantek', 'itemimages/9b980790439fb80889c4a9d447ea286f1492960895.jpg', '2017-04-23 15:21:42', 'available', 0, 'notfav'),
(202, 'Kantek MS280B Monitor Riser', 'Raises monitor to eye level to reduce neck and eyestrain\r\nStore keyboard underneath to save valuable desk space\r\nMDF Wood top for added strength. Holds up to 21 inch monitors', 1500, 'Computing', 'Monitors', 'Kantek', 'itemimages/5d201239497bf0b5433158b975cdcf791492961012.jpg', '2017-04-23 15:23:41', 'available', 0, 'notfav'),
(203, '3M Easy Adjust Keyboard Tray', 'Keyboard tray will work in standard workstations and corner workstations that can accept a 23" track. Height adjusts up 6" and down 4". Has tilt range of +15/-15 degrees and 360-degree swivel. Easy adjust arm with height and tilt indicators help you achieve perfect settings.', 2400, 'Computing', 'Computer Accessories', '3M Easy', 'itemimages/073bb1964d97509427bae16fd2afd78b1492961141.jpg', '2017-04-23 15:25:50', 'available', 0, 'notfav'),
(204, 'BIC  CRISTAL BALL PENS', 'BIC-CRISTAL Multi-colour ball pens â€“ New colours. Everyday essentials designed with everyone in mind. Pack of 24', 400, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/c0a14e6f948bc0e91582cb1c0c26086a1493880500.jpg', '2017-05-04 06:48:24', 'available', 0, 'notfav'),
(205, 'Bic Fun Ball Pens ', 'Bic Fun Ball Pens â€“ New colours. Every BIC stationery product is designed for the longest use. Pack of 24', 960, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/6f7a4c7bf4e9eb3d22cd341ed36d7b6c1493880851.jpg', '2017-05-04 06:54:12', 'available', 0, 'notfav'),
(206, 'Bic Decor Ball Pen', 'By MYBICPEN FB Fans. Quality, Made to last long. Pack of 12', 750, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/c54561e94dba4cb533e323c13aff7f881493881118.jpg', '2017-05-04 06:58:39', 'available', 0, 'favorite'),
(207, 'Bic Retractable Refilable Pen and  Pencil', '3+1HB Bic Retractable Refilable Pen and  Pencil. Every BIC stationery product is designed for the longest use, meeting consumer needs at the office. Pack of 10', 900, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/3524c3bc65e6ac086f548109b2b10fe41493881612.jpg', '2017-05-04 07:06:54', 'available', 0, 'notfav'),
(208, 'Bic Atlantis Retractable ball pens', 'Multicolor Bic Atlantis Retractable ball pens. 1.6MM POINT. Made for classy feel with great precision. Pack of 10', 1200, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/9a0e7e4656e94dbf221a4a9c5976c2381493881826.jpg', '2017-05-04 07:10:27', 'available', 0, 'notfav'),
(209, 'Bic Atlantis Metal Retractable pens', 'High quality Bic Atlantis Metal Retractable pens made to last longer and pocket-friendly. Pack of 12', 720, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/75ce2235b5549a91436bf95f01ce171b1493881980.jpg', '2017-05-04 07:12:43', 'available', 0, 'notfav'),
(210, 'Bic Softfeel pens', 'BIC SOFTFEEL FUN â€“ NEW COLORS. Made for a classy feel. Multi-colour. Long-lasting. Pack of 12', 680, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/a600374db6c405167cbe623639c60cb21493882229.jpg', '2017-05-04 07:17:46', 'available', 0, 'notfav'),
(211, 'BIC Erasable Gel Pens', 'High quality Bic Gelocity Illusion Erasable Gel Pens. Pack of 10', 1020, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/d829f58917cc81e803e0b93e3a580f7b1493882428.jpg', '2017-05-04 07:20:29', 'available', 0, 'notfav'),
(212, 'Bic Intensity Fineliner Pens', 'Bic Intensity Fineliner Pens. High quality precision. Long lasting. Pack of 12', 1200, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/e6f8eaf001232b973ace3b523445c8e81493882589.jpg', '2017-05-04 07:23:11', 'available', 0, 'notfav'),
(213, 'Bic stripes graphite pencil', 'Bic Evolution stripes graphite pencil xtra fun. Classy feel. Great quality. Pack of 24', 1560, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/64b83285abcfd8b5b3b22d227c39a5021493882843.jpg', '2017-05-04 07:28:04', 'available', 0, 'notfav'),
(214, 'Bic Evolution graphite pencils', 'Bic Evolution graphite pencils brilliant new colours. High quality Long lasting pencils. Pack of 12', 840, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/0fd6de5b33d0e9f3891dcb734049a9b31493883062.jpg', '2017-05-04 07:31:04', 'available', 0, 'notfav'),
(215, 'Bic Refillable Mechanical Pencils', 'Bic Velocity Max Refillable Longlasting Mechanical Pencils. Pack of 10', 750, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/d3ae56a997c239f67f39bfaaf317ea581493883225.png', '2017-05-04 07:33:46', 'available', 0, 'favorite'),
(216, 'Bic Criterium refillable mechanical Pencils', 'Bic 2MM Criterium refillable mechanical Pencils made to llast long and give the best quality work of art. Pack of 10', 680, 'Desktop Stationery', 'Pens and Pencils', 'Bic', 'itemimages/b749d2688601e6da37c2641042f9b7e41493883383.jpg', '2017-05-04 07:36:24', 'available', 0, 'notfav'),
(217, 'Bic Glue Stick Coloured', 'Made with the guarantee of surety that products are of the highest quality. High performance Adhesive. Pack of 12', 1600, 'Desktop Stationery', 'Glues and Adhesives', 'Bic', 'itemimages/ffc20044c67fe97c8743d5658520feff1493883571.jpg', '2017-05-04 07:39:32', 'available', 0, 'favorite'),
(218, 'Bic Creative Permanent Markers', 'Bic Marking Permanent Markers Creative range â€“ New colours. pack of 6. Fine point', 560, 'Desktop Stationery', 'Highlighters', 'Bic', 'itemimages/36052d86cdd2425ce249543f3a741bc11493883771.jpg', '2017-05-04 07:42:52', 'available', 0, 'favorite'),
(219, 'Bic Brite Highlighter', 'Bic Highlighter Flex/Brite Liner Flex tip High quality Highlighters. Multicolours. Set of 6 ', 920, 'Desktop Stationery', 'Highlighters', 'Bic', 'itemimages/ad21c65d9f5da8c79ffbf7ba3c9f2e6b1493883917.jpg', '2017-05-04 07:45:19', 'available', 0, 'notfav'),
(220, 'Tipp Mini Pocket Mouse Decors', 'TIPP MINI POCKET MOUSEÂ® DECORS â€“ NEW DECORS. ', 450, 'Computing', 'Computer Accessories', 'Tipp', 'itemimages/a6437c43deb3232a1213191c4ed82cfb1493884042.jpg', '2017-05-04 07:47:51', 'available', 0, 'favorite'),
(221, 'lg hr5', 'ram 5gb 12mp front camera', 5000, 'Computing', 'Computers', 'lg', 'itemimages/f1d0ef23da1d759e91237a9b1aa9338b1494260210.jpg', '2017-05-08 16:16:58', 'available', 0, 'favorite');

-- --------------------------------------------------------

--
-- Table structure for table `itemsubcategories`
--

CREATE TABLE `itemsubcategories` (
  `subcatid` int(50) NOT NULL,
  `subcat` varchar(100) NOT NULL,
  `catid` int(50) NOT NULL,
  `itemcategory` varchar(100) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemsubcategories`
--

INSERT INTO `itemsubcategories` (`subcatid`, `subcat`, `catid`, `itemcategory`, `dateAdded`) VALUES
(2, 'Bookends', 1, 'Desktop Accessories', '2017-04-12 22:01:30'),
(3, 'Card Holders', 1, 'Desktop Accessories', '2017-04-12 22:02:04'),
(4, 'Desk Mats', 1, 'Desktop Accessories', '2017-04-12 22:02:21'),
(5, 'Drawer Sets', 1, 'Desktop Accessories', '2017-04-12 22:02:37'),
(6, 'Letter Trays', 1, 'Desktop Accessories', '2017-04-12 22:03:08'),
(7, 'Trimmers', 1, 'Desktop Accessories', '2017-04-12 22:04:32'),
(10, 'Printers', 8, 'Office Machines and Electronics', '2017-04-13 14:59:12'),
(15, 'Cash Boxes', 14, 'Security Equipment', '2017-04-14 12:43:57'),
(17, 'Sticky Tapes And Cellotape', 6, 'Desktop Stationery', '2017-04-14 14:05:31'),
(19, 'Pens and Pencils', 6, 'Desktop Stationery', '2017-04-14 14:06:16'),
(20, 'Clipboards', 6, 'Desktop Stationery', '2017-04-14 14:07:45'),
(21, 'Filing Labels', 7, 'Filing and Archiving', '2017-04-14 14:08:12'),
(22, 'Box Files', 7, 'Filing and Archiving', '2017-04-14 14:08:40'),
(23, 'Packing Boxes', 7, 'Filing and Archiving', '2017-04-14 14:09:05'),
(24, 'Binding Machines & Accessories', 8, 'Office Machines and Electronics', '2017-04-14 14:10:08'),
(25, 'Calculators', 8, 'Office Machines and Electronics', '2017-04-14 14:11:01'),
(27, 'Cash Registers and Accessories', 8, 'Office Machines and Electronics', '2017-04-14 14:14:14'),
(28, 'Electrical Accessories', 8, 'Office Machines and Electronics', '2017-04-14 14:14:39'),
(29, 'Folding Machines', 8, 'Office Machines and Electronics', '2017-04-14 14:14:56'),
(30, 'Lamination', 8, 'Office Machines and Electronics', '2017-04-14 14:15:08'),
(31, 'Printers and Multifunction Machines', 8, 'Office Machines and Electronics', '2017-04-14 14:15:46'),
(32, 'Projectors and Accessories', 8, 'Office Machines and Electronics', '2017-04-14 14:16:13'),
(33, 'Shredding', 8, 'Office Machines and Electronics', '2017-04-14 14:16:36'),
(34, 'Telecoms', 8, 'Office Machines and Electronics', '2017-04-14 14:16:47'),
(35, 'Printer and Fax Paper', 9, 'Paper Products', '2017-04-14 14:18:37'),
(36, 'Printer Paper', 9, 'Paper Products', '2017-04-14 14:19:03'),
(37, 'Copier Paper', 9, 'Paper Products', '2017-04-14 14:19:36'),
(38, 'Paper Clips', 6, 'Desktop Stationery', '2017-04-14 14:21:10'),
(39, 'Paper  Binders', 6, 'Desktop Stationery', '2017-04-14 14:21:27'),
(40, 'Computers', 11, 'Computing', '2017-04-14 14:21:55'),
(41, 'Cables and Adapters', 11, 'Computing', '2017-04-14 14:22:12'),
(42, 'Computer Accessories', 11, 'Computing', '2017-04-14 14:22:36'),
(43, 'Computer Cleaning', 11, 'Computing', '2017-04-14 14:23:33'),
(44, 'Computer Networking', 11, 'Computing', '2017-04-14 14:23:56'),
(45, 'Monitors', 11, 'Computing', '2017-04-14 14:24:07'),
(46, 'Computer Software', 11, 'Computing', '2017-04-14 14:24:32'),
(47, 'Laptop Accessories', 11, 'Computing', '2017-04-14 14:24:53'),
(48, 'Catering', 16, 'Kitchen Equipment', '2017-04-14 14:25:35'),
(49, 'Cleaning and Janitorial', 16, 'Kitchen Equipment', '2017-04-14 14:26:03'),
(50, 'Cooling Appliances', 16, 'Kitchen Equipment', '2017-04-14 14:26:29'),
(51, 'Kitchen Appliance', 16, 'Kitchen Equipment', '2017-04-14 14:26:54'),
(52, 'Fire and Safety', 17, 'Health and Safety', '2017-04-14 14:29:26'),
(53, 'First Aid', 17, 'Health and Safety', '2017-04-14 14:29:44'),
(54, 'Gloves', 17, 'Health and Safety', '2017-04-14 14:30:04'),
(55, 'Safety Signs', 17, 'Health and Safety', '2017-04-14 14:31:33'),
(56, 'Data Safes', 14, 'Security Equipment', '2017-04-14 14:32:07'),
(57, 'Alarm systems', 14, 'Security Equipment', '2017-04-14 14:32:40'),
(59, 'Safes', 14, 'Security Equipment', '2017-04-14 14:34:33'),
(60, 'Bookcases', 18, 'Office Furniture', '2017-04-14 14:35:52'),
(61, 'Cupboards', 18, 'Office Furniture', '2017-04-14 14:36:07'),
(62, 'Desks and Tables', 18, 'Office Furniture', '2017-04-14 14:36:26'),
(63, 'Filing Cabinet', 18, 'Office Furniture', '2017-04-14 14:36:45'),
(64, 'Mailroom Furniture', 18, 'Office Furniture', '2017-04-14 14:37:06'),
(65, 'Office Chairs', 18, 'Office Furniture', '2017-04-14 14:37:25'),
(66, 'Reception Furniture', 18, 'Office Furniture', '2017-04-14 14:37:51'),
(67, 'Copiers and Printers Papers', 9, 'Paper Products', '2017-04-16 13:24:15'),
(68, 'Toners and Cartridges', 8, 'Office Machines and Electronics', '2017-04-16 18:19:49'),
(69, 'Scanners', 8, 'Office Machines and Electronics', '2017-04-16 18:54:50'),
(70, 'Cameras and Accessories', 8, 'Office Machines and Electronics', '2017-04-16 19:11:49'),
(72, 'Notebooks and Notepads', 9, 'Paper Products', '2017-04-16 20:10:03'),
(73, 'Calendars and Organisation', 1, 'Desktop Accessories', '2017-04-16 20:28:46'),
(74, 'Books and Magazine Racks', 1, 'Desktop Accessories', '2017-04-16 21:02:20'),
(75, 'Office Bins', 1, 'Desktop Accessories', '2017-04-18 09:18:12'),
(76, 'Lever Arch Files', 7, 'Filing and Archiving', '2017-04-18 09:28:00'),
(77, ' Archive Storage Boxes', 7, 'Filing and Archiving', '2017-04-18 09:37:23'),
(78, 'Glues and Adhesives', 6, 'Desktop Stationery', '2017-04-19 08:48:20'),
(79, 'Desk Sets and Tidies', 6, 'Desktop Stationery', '2017-04-19 09:14:53'),
(80, 'Drawing Pins', 6, 'Desktop Stationery', '2017-04-19 09:32:20'),
(81, 'Staplers', 6, 'Desktop Stationery', '2017-04-19 09:36:29'),
(82, 'Staplers And Staples', 6, 'Desktop Stationery', '2017-04-19 09:51:22'),
(83, 'Envelopes', 9, 'Paper Products', '2017-04-19 09:55:01'),
(84, 'Highlighters', 6, 'Desktop Stationery', '2017-04-19 09:55:33'),
(85, 'Hole Punches', 6, 'Desktop Stationery', '2017-04-19 10:05:14'),
(86, 'Sticky Notes', 6, 'Desktop Stationery', '2017-04-19 10:16:51'),
(87, 'Rubber Bands', 6, 'Desktop Stationery', '2017-04-19 10:23:52'),
(88, 'Office Rulers and Geometric Sets', 6, 'Desktop Stationery', '2017-04-19 10:29:03'),
(89, 'Scissors', 6, 'Desktop Stationery', '2017-04-19 10:53:20'),
(90, 'Office Endorsing ink', 6, 'Desktop Stationery', '2017-04-19 10:57:26'),
(91, 'Office Stamps and Stamp Pads', 6, 'Desktop Stationery', '2017-04-19 10:59:28'),
(92, 'Sealers', 6, 'Desktop Stationery', '2017-04-19 11:32:09'),
(93, 'Trolleys', 18, 'Office Furniture', '2017-04-19 14:19:35'),
(94, 'Bagpacks', 11, 'Computing', '2017-04-19 15:50:03'),
(95, 'Coffee Makers', 16, 'Kitchen Equipment', '2017-04-19 16:35:35'),
(96, 'Toasters', 16, 'Kitchen Equipment', '2017-04-19 16:43:06'),
(97, 'Microwaves', 16, 'Kitchen Equipment', '2017-04-19 16:46:44'),
(98, 'Toilet Roll Dispensers', 19, 'Cleaning Products', '2017-04-19 16:56:45'),
(99, 'Cleaning Trolleys', 19, 'Cleaning Products', '2017-04-19 17:00:58'),
(100, 'PVC Signs', 19, 'Cleaning Products', '2017-04-20 05:55:37'),
(101, 'Cleaning Equipment', 19, 'Cleaning Products', '2017-04-20 06:00:26'),
(102, 'Fans', 20, 'Cooling and Heating', '2017-04-20 06:07:21'),
(103, 'Maintenance Equipment', 21, 'Office Maintenance', '2017-04-20 06:12:26'),
(104, 'Door Locks', 14, 'Security Equipment', '2017-04-20 06:42:05'),
(105, 'Vacuum Cleaners', 19, 'Cleaning Products', '2017-04-23 14:53:25'),
(106, 'Hand Sanitizers', 19, 'Cleaning Products', '2017-04-23 14:58:41'),
(107, 'Paper Towels', 19, 'Cleaning Products', '2017-04-23 15:02:05'),
(108, 'Trash Bags', 19, 'Cleaning Products', '2017-04-23 15:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `Customer_id`, `Creation_date`, `Status`) VALUES
(10001, 5454, '2017-05-03 08:38:20', 'pending'),
(10003, 888, '2017-05-03 08:40:59', 'pending'),
(10004, 555, '2017-05-03 08:45:13', 'pending'),
(10005, 5, '2017-05-03 19:53:16', 'pending'),
(10006, 5, '2017-05-03 20:00:38', 'pending'),
(10007, 5, '2017-05-03 20:15:34', 'pending'),
(10008, 5, '2017-05-03 20:17:15', 'pending'),
(10009, 5, '2017-05-03 20:19:51', 'pending'),
(10010, 5, '2017-05-03 20:20:50', 'pending'),
(10011, 5, '2017-05-03 20:21:07', 'pending'),
(10012, 5, '2017-05-03 20:24:40', 'pending'),
(10013, 6, '2017-05-03 20:25:50', 'pending'),
(10014, 6, '2017-05-03 20:32:09', 'pending'),
(10015, 5, '2017-05-04 09:55:15', 'pending'),
(10016, 5, '2017-05-04 12:48:44', 'pending'),
(10017, 6, '2017-05-08 13:55:33', 'pending'),
(10018, 5, '2017-05-20 12:09:51', 'pending'),
(10019, 5, '2017-06-01 16:48:04', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Id` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Product_name` varchar(200) NOT NULL,
  `Price` double(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Id`, `Order_id`, `Product_name`, `Price`, `Quantity`, `Date_added`) VALUES
(1, 10005, 'jihnjhjs', 154.00, 5, '2017-05-03 19:24:23'),
(2, 10005, 'Genuine Joe Heavy-Duty Trash Can Liners', 100.00, 10, '2017-05-03 19:53:17'),
(3, 10005, 'Sharpie Pen-style Permanent Marker', 250.00, 10, '2017-05-03 19:53:17'),
(4, 10006, 'Kantek MS280B Monitor Riser', 1500.00, 10, '2017-05-03 20:00:38'),
(5, 10006, 'Gel Mouse pads Black', 260.00, 2, '2017-05-03 20:00:38'),
(6, 10007, 'Eureka Airspeed Vacuum Cleaner', 5200.00, 10, '2017-05-03 20:15:34'),
(7, 10008, 'Kantek MS280B Monitor Riser', 1500.00, 10, '2017-05-03 20:17:15'),
(8, 10009, 'TheMicke fire extinguisher', 4600.00, 2, '2017-05-03 20:19:51'),
(9, 10009, 'Genuine Joe Heavy-Duty Trash Can Liners', 100.00, 2, '2017-05-03 20:19:51'),
(10, 10009, 'Genuine Joe 2-Ply Roll Paper Towels', 180.00, 12, '2017-05-03 20:19:51'),
(11, 10011, '3M Easy Adjust Keyboard Tray', 2400.00, 1, '2017-05-03 20:21:07'),
(12, 10012, 'Kantek Widescreen Privacy Filter Black', 350.00, 1, '2017-05-03 20:24:40'),
(13, 10012, 'G2 Retractable Gel Ink Rollerball Pens', 200.00, 10, '2017-05-03 20:24:40'),
(14, 10012, 'Dixon Woodcase No.2 Eraser Pencils Box', 3500.00, 22, '2017-05-03 20:24:40'),
(15, 10013, 'Genuine Joe 2-Ply Roll Paper Towels', 180.00, 10, '2017-05-03 20:25:50'),
(16, 10013, 'Kleenex Moisturizing Hand Sanitizer', 250.00, 10, '2017-05-03 20:25:50'),
(17, 10014, '5-Star Office Custom Self-Inking Imprinter Stamp', 500.00, 10, '2017-05-03 20:32:09'),
(18, 10014, 'Double Wall Brown Corrugated Dispatch Cartons', 1400.00, 5, '2017-05-03 20:32:10'),
(19, 10014, 'Canon PIXMA iX6820 Inkjet Printer', 10400.00, 1, '2017-05-03 20:32:10'),
(20, 10015, 'Bic Glue Stick Coloured', 1600.00, 10, '2017-05-04 09:55:15'),
(21, 10016, 'BIC Erasable Gel Pens', 1020.00, 10, '2017-05-04 12:48:44'),
(22, 10016, 'Bic Softfeel pens', 680.00, 10, '2017-05-04 12:48:44'),
(23, 10016, 'Gel Mouse pads Black', 260.00, 2, '2017-05-04 12:48:44'),
(24, 10016, 'Genuine Joe 2-Ply Roll Paper Towels', 180.00, 10, '2017-05-04 12:48:44'),
(25, 10017, 'Kantek MS280B Monitor Riser', 1500.00, 10, '2017-05-08 13:55:33'),
(26, 10017, 'Bic Decor Ball Pen', 750.00, 10, '2017-05-08 13:55:33'),
(27, 10017, 'Bic Atlantis Metal Retractable pens', 720.00, 10, '2017-05-08 13:55:33'),
(28, 10018, 'Micke ', 700.00, 1, '2017-05-20 12:09:51'),
(29, 10018, 'lg hr5', 5000.00, 1, '2017-05-20 12:09:51'),
(30, 10018, 'Tipp Mini Pocket Mouse Decors', 450.00, 1, '2017-05-20 12:09:51'),
(31, 10019, 'lg hr5', 5000.00, 10, '2017-06-01 16:48:04'),
(32, 10019, 'Bic Brite Highlighter', 920.00, 15, '2017-06-01 16:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `userLevel` int(1) NOT NULL DEFAULT '1',
  `email` varchar(50) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) DEFAULT NULL,
  `profileChange` timestamp NULL DEFAULT NULL,
  `bio` varchar(150) DEFAULT NULL,
  `profilePic` varchar(100) NOT NULL DEFAULT 'profile/images.png',
  `lastLogin` timestamp NULL DEFAULT NULL,
  `signupDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(30) NOT NULL DEFAULT 'Not Added',
  `office` varchar(10) NOT NULL DEFAULT 'Not Added',
  `branch` varchar(50) NOT NULL DEFAULT 'Not Added'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `userLevel`, `email`, `fName`, `lName`, `profileChange`, `bio`, `profilePic`, `lastLogin`, `signupDate`, `phone`, `office`, `branch`) VALUES
(1, 'Micke', 'ea499afdeef66ded657c70864f0c7b95', 2, 'mickemalonza@cib.co.ke', 'Michael', 'Malonza', '2017-04-27 08:55:44', 'Techie. #AchieveTheImpossible', 'uploads/d67d26b3b1fe170d2fa9c36a009a930d1493283318.jpg', '2017-06-06 06:20:53', '2017-01-10 15:14:50', '+254710533607', '3733', 'Capital Branch'),
(2, 'Naomi', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'yowmy@cib.co.ke', 'Naomi', 'Auma', '2017-04-17 11:21:39', 'I&#39;m Yowmy and I am Awesome!', 'uploads/9b30fa1604a55dc90e6026a433bdf1a31492428099.png', '2017-05-08 15:49:46', '2017-01-11 15:14:50', '+254720646359', '37332', 'Elite Branch'),
(3, 'Brian', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'brianw@cib.co.ke', 'Brian', 'Waema', NULL, NULL, '', '2017-02-10 13:05:20', '2017-01-10 15:14:50', '+254726997464', 'Not Added', 'Not Added'),
(4, 'Dchebet', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'dchebet@cib.co.ke', 'Dorothy', 'Chebet', NULL, NULL, '', NULL, '2017-01-10 15:14:50', '+254729161266', 'Not Added', 'Not Added'),
(5, 'JKRotich', '45ac78bf3d4882ac520f4e7fb08d55c5', 4, 'jkrotich@cib.co.ke', 'Joseph', 'Rotich', NULL, NULL, '', NULL, '2017-01-10 15:14:50', '+254726150087', 'Not Added', 'Not Added'),
(6, 'Quetta', '8745860dbebd9ba49be1175663c40167', 1, 'quetta@cib.co.ke', 'Quetta', 'Mbinya', NULL, NULL, '', NULL, '2017-01-18 15:14:50', '+254700213104', 'Not Added', 'Not Added'),
(7, 'Mjinga', '9aa990b7e4c594a1b452381d09957426', 2, 'mjinga@gmail.com', 'Mjinga', 'Mwerevu', '2017-03-15 21:40:41', NULL, '', NULL, '2017-01-20 15:14:50', '+254710533609', 'Not Added', 'Not Added'),
(10, 'twenzetu', '157ec3c9bbc4db6b29ca08594a57b6cc', 3, 'micccke@gmail.com', 'firstname', 'mylastname', '2017-03-15 21:54:32', NULL, '', NULL, '2017-01-29 15:14:50', '+254710533606', 'Not Added', 'Not Added'),
(16, 'hhih', '374fd2c0defd3559db40bd1b5907a005', 4, 'guguu@gmail.com', 'Wewe', 'GUGS', '2017-02-06 16:26:02', NULL, '', NULL, '2017-01-29 15:14:50', 'Not Added', 'Not Added', 'Not Added'),
(17, 'Jinamzuri', 'c20596edd9320039feb9b615467aab25', 1, 'gdgudg@gmail.com', 'Great', 'Micke', '2017-02-06 16:27:40', NULL, '', NULL, '2017-01-29 15:14:50', 'Not Added', 'Not Added', 'Not Added'),
(18, 'Mickey', 'ccb3183dad06b9b8f4efe906c9992f35', 3, 'kifjjjfi@gmail.com', 'Michael', 'last', '2017-02-07 16:50:34', NULL, '', NULL, '2017-02-07 16:50:03', 'Not Added', 'Not Added', 'Not Added'),
(19, 'Malach', '9cc892a13ab565e8b3fe353e0efbeca1', 1, 'malach@cib.com', 'mmmma', 'mofok', '2017-02-10 12:32:32', NULL, '', NULL, '2017-02-10 12:21:50', 'Not Added', 'Not Added', 'Not Added'),
(21, 'Alaine', '3c65bccf8d98634ca0d92cbd445639d1', 2, 'alainesinga@cib.co.ke', 'Alaine', 'Laughton', '2017-03-15 21:58:04', NULL, 'uploads/5b496c8ea6b9f63b8c830f920d9f8d841487937756.jpg', '2017-03-15 22:00:54', '2017-02-24 12:00:38', '+254710533608', 'Not Added', 'Not Added'),
(22, 'Cynthiak', 'e89ff618154db36c4cdb590fd880b96c', 2, 'cynthiakirigo@cib.co.ke', 'Cynthia', 'Kirigo', '2017-04-03 15:03:22', '#Dj #Model', 'uploads/5989c026bc4f40c6b5288fe87a06274a1490188324.png', '2017-04-03 15:00:42', '2017-03-19 11:14:02', '+254710533600', '42105', 'Capital Branch'),
(23, 'Mckaleym', '3c65bccf8d98634ca0d92cbd445639d1', 1, 'mckaleym@cib.co.ke', 'McKaley', 'Miller', '2017-06-06 07:33:33', 'Miller is  a competitive dancer, with more than six years of experience in jazz, hip hop, clogging, tap, lyrical and ballet.', 'uploads/f1f930eacde18cc46e803fe3e3f550551490190313.jpg', '2017-06-06 07:34:54', '2017-03-22 13:39:15', '+254712913462', '3586', 'Elite Branch'),
(24, 'Halston', '207728385a4528c10035fd6cf25f6710', 3, 'halstonsage@cib.co.ke', 'Halston', 'Sage', '2017-05-03 15:18:45', 'Kill em with dopeness!', 'uploads/5e6a87f69159885094fa311c3d1afb581491164257.jpg', '2017-06-06 04:13:46', '2017-03-29 13:41:47', '+254710599525', '4200', 'Capital Branch'),
(25, 'Mjomba', '207728385a4528c10035fd6cf25f6710', 2, 'mjomba@cib.co.ke', 'Mjomba', 'Norman', NULL, NULL, 'profile/images.png', NULL, '2017-03-31 14:32:35', 'Not Added', 'Not Added', 'Not Added'),
(26, 'Cat', '3901975ffbb9d2166346dfd934a2664b', 5, 'catvalentine@cib.co.ke', 'Ariana', 'Grande', '2017-06-06 06:43:28', 'The basis lies in the idea that if you&#39;re kind to others, good things will happen to you.', 'uploads/184fec35f2e41ab664166c350472f32a1496730811.jpg', '2017-06-06 06:21:05', '2017-06-06 05:23:39', '+254721471959', '2300', 'Head Office');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`BranchId`);

--
-- Indexes for table `deleteditems`
--
ALTER TABLE `deleteditems`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `itemcategories`
--
ALTER TABLE `itemcategories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `itemsubcategories`
--
ALTER TABLE `itemsubcategories`
  ADD PRIMARY KEY (`subcatid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `BranchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `itemcategories`
--
ALTER TABLE `itemcategories`
  MODIFY `catid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
--
-- AUTO_INCREMENT for table `itemsubcategories`
--
ALTER TABLE `itemsubcategories`
  MODIFY `subcatid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10020;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
