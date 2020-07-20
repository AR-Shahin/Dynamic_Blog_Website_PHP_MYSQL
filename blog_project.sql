-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 06:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `image`) VALUES
(14, ' Anisur Rahman Shahin', 'AR Shahin', 'arshahin@gmail.com', '123', '4517415shahin-formal.png'),
(16, ' Asik Newaz Sabbir', 'Asik', 'asik@gmail.com', '1234', '3768406asik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(3, 'PHP'),
(7, 'JAVA'),
(12, 'Python'),
(13, 'বাংলা'),
(14, 'WEB'),
(15, 'SPORTS'),
(16, 'English'),
(17, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `cat_id` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `title`, `description`, `image`, `date`) VALUES
(23, 13, 'আপনার শরীরকে কীভাবে ক্ষতিগ্রস্থ করে?', ' করোনাভাইরাস, যার আনুষ্ঠানিক নাম সার্স-সিওভি-২, আপনার নিশ্বাসের সাথে আপনার দেহে প্রবেশ করতে পারে (আশেপাশে কেউ হাঁচি বা কাশি দিলে) বা ভাইরাস সংক্রমিত কোনো জায়গায় হাত দেয়ার পর আপনার মুখে হাত দিলে।\r\n\r\nশুরুতে এটি আপনার গলা, শ্বাসনালীগুলো এবং ফুসফুসের কোষে আঘাত করে এবং সেসব জায়গায় করোনার কারখানা তৈরি করে। পরে শরীরের বিভিন্ন জায়গায় নতুন ভাইরাস ছড়িয়ে দেয় এবং আরো কোষকে আক্রান্ত করে।\r\n\r\nএই শুরুর সময়টাতে আপনি অসুস্থ হবেন না এবং কিছু মানুষের মধ্যে হয়তো উপসর্গও দেখা দেবে না।\r\n\r\nইনকিউবেশনের সময়ের - প্রথম সংক্রমণ এবং উপসর্গ দেখা দেয়ার মধ্যবর্তী সময় - স্থায়িত্ব একেকজনের জন্য একেকরকম হয়, কিন্তু গড়ে তা পাঁচদিন।', 'uploads/988585_111641731_gettyimages-1203613589.jpg', '2020-07-16'),
(25, 12, 'Machine learning', ' Machine learning (ML) is the study of computer algorithms that improve automatically through experience.[1][2] It is seen as a subset of artificial intelligence. Machine learning algorithms build a mathematical model based on sample data, known as &quot;training data&quot;, in order to make predictions or decisions without being explicitly programmed to do so.[3] Machine learning algorithms are used in a wide variety of applications, such as email filtering and computer vision, where it is difficult or infeasible to develop conventional algorithms to perform the needed tasks.\r\n\r\nMachine learning is closely related to computational statistics, which focuses on making predictions using computers. The study of mathematical optimization delivers methods, theory and application domains to the field of machine learning. Data mining is a related field of study, focusing on exploratory data analysis through unsupervised learning.[5][6] In its application across business problems, machine learning is also referred to as predictive analytics.', 'uploads/3355673download (1).jpg', '2020-07-16'),
(26, 12, 'Data science', ' Data science is an inter-disciplinary field that uses scientific methods, processes, algorithms and systems to extract knowledge and insights from many structural and unstructured data.[1][2] Data science is related to data mining, deep learning and big data.\r\n\r\nData science is a &quot;concept to unify statistics, data analysis, machine learning, domain knowledge and their related methods&quot; in order to &quot;understand and analyze actual phenomena&quot; with data.[3] It uses techniques and theories drawn from many fields within the context of mathematics, statistics, computer science, domain knowledge and information science. Turing award winner Jim Gray imagined data science as a &quot;fourth paradigm&quot; of science (empirical, theoretical, computational and now data-driven) and asserted that &quot;everything about science is changing because of the impact of information technology&quot; and the data deluge.[4][5]', 'uploads/1820924download (2).jpg', '2020-07-16'),
(27, 7, 'Robotics', ' Robotics is an interdisciplinary research area at the interface of computer science and engineering.[1] Robotics involves design, construction, operation, and use of robots. The goal of robotics is to design intelligent machines that can help and assist humans in their day-to-day lives and keep everyone safe. Robotics draws on the achievement of information engineering, computer engineering, mechanical engineering, electronic engineering and others.', 'uploads/5012306download (3).jpg', '2020-07-31'),
(28, 3, 'Web development', ' A web developer is a programmer who specializes in, or is specifically engaged in, the development of World Wide Web applications using a client–server model. The applications typically use HTML, CSS and JavaScript in the client, PHP, ASP.NET (C#), Python or Java in the server, and http for communications between client and server. A web content management system is often used to develop and maintain web applications.', 'uploads/1450212download (4).jpg', '2020-07-15'),
(29, 15, 'Stokes dig deep to give England solid start', ' Dom Sibley and Ben Stokes ground out patient half-centuries as England battled to 207 for three at the close on day one of the second test against the West Indies at Old Trafford on Thursday.\r\n\r\nEngland were wobbling on 81 for three before Sibley and Stokes shared an unbeaten 126-run stand to give the hosts the upper hand on a day when only 82 overs were bowled after rain delayed the start.\r\n\r\nOpener Sibley remained unbeaten on 86 while Stokes also took his time to get settled on a damp pitch before reaching 59 not out at stumps.', 'uploads/5105820stokes_sibley.jpg', '2020-07-17'),
(31, 16, 'The US ‘war’ on drugs', ' Afghanistan, yet never managed to fulfil the objective that was set, and Afghanistan remains the largest opium producer in the world — and one that is more and more actively filling demand not only in European markets for drugs, but in the American one. Heroin is a multi-billion dollar business, backed by the interests of powerful circles in the United States. From this it becomes evident that one of the goals for the occupation of Afghanistan was to restore the drug trafficking that was under their control back to its former level, and to assume complete control over drug delivery routes. In 2001, under the Taliban, 185 tonnes of opium was produced, whereas now, even given incomplete data, opium production has risen to 13,000 tonnes!', 'uploads/1646338111355_17.jpg', '2020-07-24'),
(32, 17, 'Public transport to ply during Eid holiday', ' Public transport to ply during Eid holiday\r\nPublic transport to ply during Eid holiday\r\n\r\n\r\nClearing the smokescreen created over plying of public transport during Eid-ul-Azha holiday, Road Transport and Bridges Minister Obaidul Quader on Thursday said mass transport will be allowed on roads.\r\n\r\n&quot;Public transport will be allowed during the Eid holiday, but, heavy vehicles will remain suspended three days ahead of Eid-ul-Azha,&quot; said the minister in a video message.\r\n\r\nMeanwhile, Shipping Ministry in a meeting on W', 'uploads/3279447observerbd.com_1580448537.jpg', '2020-07-17'),
(33, 17, 'Ministry rejects DGHS advice for Covid-19', ' The Ministry of Civil Aviation and Tourism has rejected a list of private health facilities prepared by the DGHS to run Covid-19 tests for air passengers. \r\n\r\nThe list excluded government institutions from facilitating Covid-19 clearance certificates for people going out of the country. \r\n\r\nThe list also surprised the ministry as the Directorate General of Health Services (DGHS) recommended that outbound passengers obtain the certificate from 33 listed private hospitals and diagnostic centres.', 'uploads/3927776unnamed-1586772570776.jpg', '2020-07-18'),
(34, 12, 'Photography', ' dc dkclvnfv;;;;;;;;;;;;;;;;;;;cccccccccccccccccccccccccccccccccccccccccccccccccccc', 'uploads/2684043shahin-formal.png', '2020-07-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
