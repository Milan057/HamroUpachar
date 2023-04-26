-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 04:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minorproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notice`
--

CREATE TABLE `admin_notice` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_notice`
--

INSERT INTO `admin_notice` (`id`, `title`, `description`, `image`) VALUES
(1, 'तपाईंले कोरोनाको भ्याक्सिन लगाउनुभयो ?', 'नेपालमा जम्मा ९ प्रकारका कोरोना खोपले स्वीकृति पाएका छन । जसमा Moderna Spikevax, Pfizer Comirnaty, Gamaleya Sputnik V, Johnson & Johnson, AstraZeneca, Covishield, Vaxzevria, Covaxin, Covilo,CoronaVac  पर्दछन । यसमध्ये कुनैपनि खोपको प्रयोगले कोरोनाको जोखिम कम गर्न सकिन्छ । साभारः https://covid19.trackvaccines.org/country/nepal/', '/hamroupachar/admindashboard/noticephotos/Covid-vaccine.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(250) DEFAULT NULL,
  `doctor_specailist` varchar(250) DEFAULT NULL,
  `doctor_available` varchar(250) DEFAULT NULL,
  `hospitals_id` int(11) DEFAULT NULL,
  `doctor_photo` text NOT NULL,
  `doctor_number` varchar(10) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `doctor_name`, `doctor_specailist`, `doctor_available`, `hospitals_id`, `doctor_photo`, `doctor_number`, `active`) VALUES
(1, 'Dr. Prativa Shrestha', 'Dermatogist', 'sunday, tuesday, friday', 1, '/hamroupachar/dashboard_files/doctor_images/pexels-gustavo-fring-4173251.jpg', '9864115196', 1),
(3, 'Dr.Parimal Acharya', 'orthopedic', 'sunday', 2, '/hamroupachar/dashboard_files/doctor_images/Parimal-Acharya-2.jpg', '9854624584', 1),
(4, 'Dr.Parimal Acharya', 'orthopedic', 'monday', 3, '/hamroupachar/dashboard_files/doctor_images/doctor-g2999004a8_1920.jpg', '984561237', 1),
(5, 'Dr. Sita Shrestha', 'gynecologist', 'Wednesday', 6, '/hamroupachar/dashboard_files/doctor_images/pexels-antoni-shkraba-5215024.jpg', '9865473245', 1);

-- --------------------------------------------------------

--
-- Table structure for table `firstaids`
--

CREATE TABLE `firstaids` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `firstaid` varchar(1000) NOT NULL,
  `photos` varchar(250) NOT NULL,
  `tags` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `firstaids`
--

INSERT INTO `firstaids` (`id`, `title`, `firstaid`, `photos`, `tags`) VALUES
(1, 'हृदयघातको लागि प्राथमिक उपचार:', 'व्यक्तिलाई बस्न दिनुहोस्, आराम गर्नुहोस्, र तिनीहरूलाई शान्त बनाउन प्रयास गर्नुहोस्। कुनै पनि टाइट लुगा खोल्नुहोस्। सोध्नुहोस् कि यदि व्यक्तिले छाती दुख्ने औषधि, जस्तै ज्ञात मुटुको अवस्थाको लागि नाइट्रोग्लिसरिन लिएको छ, र तिनीहरूलाई लिन मद्दत गर्नुहोस्। यदि आराम गर्दा वा नाइट्रोग्लिसरिन खाएको 3 मिनेट भित्र दुखाइ तुरुन्तै हट्दैन भने, आपतकालीन चिकित्सा सहायताको लागि कल गर्नुहोस्। नेपाल एम्बुलेन्स सेवा - 102 मा कल गर्नुहोस्', '/hamroupachar/admindashboard/firstaidsphotos/heart-attack.jpg', 'heart atract'),
(3, 'सर्पको टोकाइको लागि प्राथमिक उपचार:', 'सर्पको हड्तालको दूरी भन्दा पर जानुहोस्। शान्त रहनुहोस् र विषको फैलावटलाई सुस्त बनाउन मद्दत गर्नुहोस्। तपाईंले सुन्न सुरु गर्नु अघि गहना र टाइट लुगाहरू हटाउनुहोस्। यदि सम्भव छ भने आफैलाई स्थिति दिनुहोस्, ताकि टोकाइ तपाईंको हृदयको स्तरमा वा तल होस्। घाउलाई साबुन र पानीले सफा गर्नुहोस्। यसलाई सफा, सुख्खा ड्रेसिङले छोप्नुहोस्। आपतकालिन लागि कल गर्नुहोस्। नेपाल एम्बुलेन्स सेवा - 102 मा कल गर्नुहोस्', '/hamroupachar/admindashboard/firstaidsphotos/snakebite.jpg', 'firstaidsforsnakebite');

-- --------------------------------------------------------

--
-- Table structure for table `hospitaldetail`
--

CREATE TABLE `hospitaldetail` (
  `id` int(11) NOT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitaldetail`
--

INSERT INTO `hospitaldetail` (`id`, `detail`, `hospital_id`) VALUES
(1, 'Civil Service Hospital is located at Minbhawan, Kathmandu. It is an autonomous government institution under the Ministry of General Administration (MoGA). A seven-member Hospital Board with full executive powers to run the Hospital was constituted by the MoGA and endorsed by The Council Of Ministers', 1),
(2, 'Bir Hospital is the oldest and one of the busiest hospitals in Nepal. It is located at the center of Kathmandu city. The hospital is run by the National Academy of Medical Sciences, a government agency since 2003. The hospital provides medical and surgical treatments. It current has a capacity of 535 beds.', 2),
(3, 'Star Hospital was established in 2007 as a 50-bedded, multispecialty hospital. On May 30, 2017, the hospital shifted to its own premises in Sanepa-2, Lalitpur. It is the first hospital to meet the standards set by the Ministry of Health and Population of Nepal. Our 100-bedded hospital has 22 specialty centres and features state-of-the-art modular operation theatres. Star Hospital also owns and manages two educational institutions: Modern Technical College and Star Academy. ', 3),
(4, 'Norvic is the first Hospital in Nepal with NABL accreditation with its high-tech laboratory services and is also certified for ISO 9001:2015 standards. Designed as one of the advanced super specialty healthcare facility provider in the region, Norvic International Hospital takes pride in providing in-depth expertise in the spectrum of advanced medical & surgical interventions, comprehensive mix of inpatient and outpatient services. A combination of cutting edge technology in the hands of renowned doctors in and across the country has set new standards in healthcare.', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `notice_name` varchar(250) DEFAULT NULL,
  `notice_description` varchar(1000) DEFAULT NULL,
  `hospitals_id` int(11) DEFAULT NULL,
  `notice_photo` varchar(250) NOT NULL,
  `notice_tags` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice_name`, `notice_description`, `hospitals_id`, `notice_photo`, `notice_tags`) VALUES
(5, 'आँखा सिविर कार्यक्रम', '२०७९-३-२५ गते हाम्रो अस्पातल मा आँखा सिविर कार्यक्रम सन्चालन हुँदैछ ', 2, '/hamroupachar/dashboard_files/notice_images/eye-care-g0d55c6d09_1920.jpg', 'eye'),
(6, 'आँखा सिविर कार्यक्रम', '२०७९-३-२३ गते हाम्रो अस्पातल मा आँखा सिविर कार्यक्रम सन्चालन हुँदैछ ', 3, '/hamroupachar/dashboard_files/notice_images/eye-care-g0d55c6d09_1920.jpg', 'eye'),
(8, 'रक्त दान कार्यक्रम्! ', 'हाम्रो अस्पताल मा मिती २०७९-३-२० गते रक्त दान कार्यक्रम सन्चालन हुँदै छ! ', 6, '/hamroupachar/dashboard_files/notice_images/pexels-charliehelen-robinson-4531304.jpg', 'blood donation'),
(9, 'कोरोनाको भ्याक्सिन कार्यक्रम ', '२०७९-३-१० देखी २०७९-३-२५ सम्म हाम्रो अस्पताल म कोरोना को सबै किसिम को भ्याक्सिन लगाउँने कार्यक्रम सन्चालन हुँदै छ| मौकाको फैद उथाउनु हुन अनुरोध छ|', 1, '/hamroupachar/dashboard_files/notice_images/pexels-cottonbro-3952224.jpg', 'vaccine');

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) DEFAULT NULL,
  `service_description` varchar(1000) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `our_services`
--

INSERT INTO `our_services` (`id`, `service_name`, `service_description`, `hospital_id`) VALUES
(1, 'OPD', '24 hour OPD Services', 2),
(5, 'Ambulance', '24 hour ambulance service.', 2),
(7, 'X-ray', 'X-ray is done in working hours only!', 2),
(8, 'MRI ', 'MRI is done in working hours only!', 2),
(10, 'OPD', '24 hour OPD service.', 6),
(11, 'Ambulance', 'Ambulance service is available throughout Nepal.', 6),
(12, 'OPD', '24 hour OPD Services.', 3),
(13, 'OPD', '24 hour OPD Services.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `photos` varchar(500) DEFAULT NULL,
  `hospitalid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `photos`, `hospitalid`) VALUES
(1, '/hamroupachar/dashboard_files/hospital_images/birhospital.png', 2),
(2, '/hamroupachar/dashboard_files/hospital_images/civil.png', 1),
(3, '/hamroupachar/dashboard_files/hospital_images/star.jpg', 3),
(4, '/hamroupachar/dashboard_files/hospital_images/norvic-hospital.jpg', 6),
(5, '/hamroupachar/dashboard_files/hospital_images/star.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `userpassword` varchar(250) NOT NULL,
  `hospital` varchar(250) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `Email`, `phone_number`, `userpassword`, `hospital`, `Status`, `active`, `address`) VALUES
(1, 'civilhospital', 'civilhospital@gmail.com', '014107000', 'Civil123', 'Civil Service Hospital', 1, 1, 'Minbhawan Marg, Kathmandu 44600'),
(2, 'birhospital', 'birhospital@gmail.com', '9865412367', 'Abcd1234', 'Bir Hospital', 1, 1, 'Kanti Path, Kathmandu 44600'),
(3, 'starhospital', 'starhospital@gmail.com', '015450197', 'Abcd1234', 'Star Hospital Limited', 1, 1, 'Sanepa Heights Rd, Lalitpur'),
(6, 'norvichospital', 'norvichospital@gmail.com', '015970032', 'Abcd1234', 'Norvic International Hospital', 1, 1, 'Kathmandu 44617'),
(7, 'megahospital', 'meghahospital@gmail.com', '9843030742', 'Abcd1234', 'Megha Hospital', 1, 1, 'Kathmandu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notice`
--
ALTER TABLE `admin_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospitals_id` (`hospitals_id`);

--
-- Indexes for table `firstaids`
--
ALTER TABLE `firstaids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitaldetail`
--
ALTER TABLE `hospitaldetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospitals_id` (`hospitals_id`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_id` (`hospital_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospitalid` (`hospitalid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_notice`
--
ALTER TABLE `admin_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `firstaids`
--
ALTER TABLE `firstaids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hospitaldetail`
--
ALTER TABLE `hospitaldetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`hospitals_id`) REFERENCES `register` (`id`);

--
-- Constraints for table `hospitaldetail`
--
ALTER TABLE `hospitaldetail`
  ADD CONSTRAINT `hospitaldetail_ibfk_1` FOREIGN KEY (`hospital_id`) REFERENCES `register` (`id`);

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_ibfk_1` FOREIGN KEY (`hospitals_id`) REFERENCES `register` (`id`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`hospitalid`) REFERENCES `register` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
