-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2022 at 08:56 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(1000) NOT NULL,
  `admin_pass` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin@username', 'admin@password'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cou_id` int(11) NOT NULL,
  `cou_name` varchar(1000) NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cou_id`, `cou_name`, `cou_created`) VALUES
(1, 'Информатика', '2021-11-23 04:58:57'),
(2, 'Физика', '2021-11-23 04:59:00'),
(3, 'Казахский язык', '2021-11-23 04:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `ex_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`ex_id`, `cou_id`, `ex_title`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
(11, 3, 'Казахский язык грамотность', '30', 2, 'Проверка грамотности учеников', '2021-11-23 05:00:44'),
(12, 2, 'Физика, тест за четверть', '60', 5, 'Оценивание учеников за четверть', '2021-11-23 05:01:33'),
(14, 1, 'Информатика пробный экзамен', '60', 1, 'Пробный тест для подготовки к основному тесту', '2021-11-23 05:02:00'),
(15, 1, 'Информатика 9', '40', 2, 'Тест для 9 класса', '2021-11-27 10:30:38'),
(16, 3, 'Тест на логику', '50', 15, 'Тест критического мышления учящихся', '2022-04-04 07:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
(331, 4, 15, 37, 'АЛУ', 'new', '2021-11-28 19:16:53'),
(332, 4, 15, 35, '1936', 'new', '2021-11-28 19:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempts`
--

CREATE TABLE `exam_attempts` (
  `examat_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_attempts`
--

INSERT INTO `exam_attempts` (`examat_id`, `student_id`, `exam_id`, `examat_status`) VALUES
(5, 4, 15, 'used');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `exam_ch1` varchar(1000) NOT NULL,
  `exam_ch2` varchar(1000) NOT NULL,
  `exam_ch3` varchar(1000) NOT NULL,
  `exam_ch4` varchar(1000) NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`eqt_id`, `exam_id`, `exam_question`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`) VALUES
(9, 12, 'In which decade was the American Institute of Electrical Engineers (AIEE) founded?', '1850s', '1880s', '1930s', '1950s', '1880s', 'active'),
(10, 12, 'What is part of a database that holds only one type of information?', 'Report', 'Field', 'Record', 'File', 'Field', 'active'),
(14, 12, 'OS computer abbreviation usually means ?', 'Order of Significance', 'Open Software', 'Operating System', 'Optical Sensor', 'Operating System', 'active'),
(15, 12, 'Who developed Yahoo?', 'Dennis Ritchie & Ken Thompson', 'David Filo & Jerry Yang', 'Vint Cerf & Robert Kahn', 'Steve Case & Jeff Bezos', 'David Filo & Jerry Yang', 'active'),
(16, 12, 'DB computer abbreviation usually means ?', 'Database', 'Double Byte', 'Data Block', 'Driver Boot', 'Database', 'active'),
(17, 12, '.INI extension refers usually to what kind of file?', 'Image file', 'System file', 'Hypertext related file', 'Image Color Matching Profile file', 'System file', 'active'),
(18, 12, 'What does the term PLC stand for?', 'Programmable Lift Computer', 'Program List Control', 'Programmable Logic Controller', 'Piezo Lamp Connector', 'Programmable Logic Controller', 'active'),
(19, 12, 'What do we call a network whose elements may be separated by some distance? It usually involves two or more small networks and dedicated high-speed telephone lines.', 'URL (Universal Resource Locator)', 'LAN (Local Area Network)', 'WAN (Wide Area Network)', 'World Wide Web', 'WAN (Wide Area Network)', 'active'),
(20, 12, 'After the first photons of light are produced, which process is responsible for amplification of the light?', 'Blackbody radiation', 'Stimulated emission', 'Plancks radiation', 'Einstein oscillation', 'Stimulated emission', 'active'),
(21, 12, '.TMP extension refers usually to what kind of file?', 'Compressed Archive file', 'Image file', 'Temporary file', 'Audio file', 'Temporary file', 'active'),
(22, 12, 'What do we call a collection of two or more computers that are located within a limited distance of each other and that are connected to each other directly or indirectly?', 'Inernet', 'Interanet', 'Local Area Network', 'Wide Area Network', 'Local Area Network', 'active'),
(24, 12, '	 In what year was the \"@\" chosen for its use in e-mail addresses?', '1976', '1972', '1980', '1984', '1972', 'active'),
(25, 12, 'What are three types of lasers?', 'Gas, metal vapor, rock', 'Pointer, diode, CD', 'Diode, inverted, pointer', 'Gas, solid state, diode', 'Gas, solid state, diode', 'active'),
(27, 15, 'Сколько битов в 2 байтах', '16', '8', '4', '32', '16', 'active'),
(28, 11, 'Question 1', 'q1', 'asd', 'fds', 'ytu', 'q1', 'active'),
(29, 11, 'Question 2', 'asd', 'sd', 'q2', 'dfg', 'q2', 'active'),
(30, 11, 'Question 3', 'sd', 'q3', 'asd', 'fgh', 'q3', 'active'),
(31, 14, 'Test question A', 'A', 'B', 'C', 'D', 'A', 'active'),
(32, 14, 'Test question B', 'A', 'B', 'C', 'D', 'B', 'active'),
(33, 14, 'Test question C', 'A', 'B', 'C', 'D', 'C', 'active'),
(34, 14, 'Test question D', 'A', 'B', 'C', 'D', 'D', 'active'),
(35, 15, 'Когда был а придумана машина тьюринга?', '1945', '1923', '1936', '1956', '1936', 'active'),
(37, 15, 'Что отвечает за выполнение команд?', 'АЛУ', 'Память', 'УУ', 'Счетчик команд', 'АЛУ', 'active'),
(38, 15, 'Что?', 'Да', 'Нет', 'Возможно', 'Брух', 'Брух', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `fb_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fb_student_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`fb_id`, `student_id`, `fb_student_as`, `fb_feedbacks`, `fb_date`) VALUES
(15, 4, 'Сағындық Пірәліұлы', 'Мне очень нравиться эта система. Она очень удобная для меня.', 'November 27, 2021'),
(16, 4, 'Дәурен Ахметов', '', 'April 04, 2022'),
(17, 4, '', '', 'April 04, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_fullname` varchar(1000) NOT NULL,
  `student_course` varchar(1000) NOT NULL,
  `student_gender` varchar(1000) NOT NULL,
  `student_birthdate` varchar(1000) NOT NULL,
  `student_year_level` varchar(1000) NOT NULL,
  `student_email` varchar(1000) NOT NULL,
  `student_password` varchar(1000) NOT NULL,
  `student_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_fullname`, `student_course`, `student_gender`, `student_birthdate`, `student_year_level`, `student_email`, `student_password`, `student_status`) VALUES
(4, 'Дәурен Ахметов', '1', 'Мужской', '2005-11-15', '11', 'bigboy69@mail.kz', 'dauren0511', 'Активен'),
(6, 'Мұрат Исаев', '1', 'Мужской', '2006-06-24', '10', 'murat.is@mail.ru', 'muratbek', 'Активен'),
(7, 'Мария Болатова', '3', 'Женский', '2007-06-25', '9', 'bolatova07@gmail.com', 'maria25', 'Активен'),
(8, 'Серик Каримов', '1', 'Мужской', '2004-12-16', '11', 'serik1616@gmail.com', 'serik2004', 'Активен');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Indexes for table `exam_attempts`
--
ALTER TABLE `exam_attempts`
  ADD PRIMARY KEY (`examat_id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `exam_attempts`
--
ALTER TABLE `exam_attempts`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
