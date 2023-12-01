-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2023 at 12:02 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20164095_etutoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ACC_ID` int(11) NOT NULL,
  `ACC_NAME` text NOT NULL,
  `ACC_CNO` int(11) NOT NULL,
  `ACC_BAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ACC_ID`, `ACC_NAME`, `ACC_CNO`, `ACC_BAL`) VALUES
(1, 'immad', 123, 9914000);

-- --------------------------------------------------------

--
-- Table structure for table `addques`
--

CREATE TABLE `addques` (
  `ADDQ_ID` int(11) NOT NULL,
  `QUIZ_ID` int(11) NOT NULL,
  `QUIZ_QNO` text NOT NULL,
  `OP_1` text NOT NULL,
  `OP_2` text NOT NULL,
  `OP_3` text NOT NULL,
  `OP_4` text NOT NULL,
  `OP_C` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addques`
--

INSERT INTO `addques` (`ADDQ_ID`, `QUIZ_ID`, `QUIZ_QNO`, `OP_1`, `OP_2`, `OP_3`, `OP_4`, `OP_C`) VALUES
(1, 1, 'The revenues and expenses of a company are displayed in which statement?', 'Balance Sheet ', 'Cash Flow Statement ', 'Income Statement ', 'None of the above', 'Income Statement '),
(2, 1, 'The main Purpose of Financial Accounting is?', 'To Provide financial information to shareholders', 'To maintain balance sheet', 'To minimize taxes.', 'To keep track of liabilities', 'To Provide financial information to shareholders'),
(3, 1, 'The expanded accounting equation is used by which statement?', 'Cash Flow Statement', 'Balance Sheet ', 'Income Statement', 'None of the above', 'Income Statement'),
(4, 1, ' What type of balance do asset accounts have?', 'Contra', 'Credit Account', 'Debit ', 'All of the above', 'Debit '),
(5, 1, 'The kind of debts which are needed to be repaid in a short term is known as?', 'Fixed Liabilities ', 'Current Liabilities', 'Depreciating Assets', 'Intangible Assets', 'Current Liabilities');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMIN_ID` int(11) NOT NULL,
  `ADMIN_NAME` varchar(255) NOT NULL,
  `ADMIN_EMAIL` varchar(255) NOT NULL,
  `ADMIN_PASS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMIN_ID`, `ADMIN_NAME`, `ADMIN_EMAIL`, `ADMIN_PASS`) VALUES
(1, 'immad', 'immad', 'i');

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `AP_ID` int(11) NOT NULL,
  `AP_NAME` varchar(255) NOT NULL,
  `AP_CAT` varchar(255) NOT NULL,
  `AP_DESC` text NOT NULL,
  `AP_AUTHOR` varchar(255) NOT NULL,
  `AP_DURATION` varchar(255) NOT NULL,
  `AP_PRICE` varchar(255) NOT NULL,
  `AP_IMG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CAT_ID` int(11) NOT NULL,
  `CAT_NAME` text NOT NULL,
  `CAT_IMG` text NOT NULL,
  `CAT_FEA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CAT_ID`, `CAT_NAME`, `CAT_IMG`, `CAT_FEA`) VALUES
(1, 'IT & Software', '../image/catimg/it.PNG', 'FEATURED'),
(2, 'Bussiness', '../image/catimg/acc1.PNG', 'FEATURED'),
(3, 'Language Learning', '../image/catimg/lang.PNG', 'FEATURED'),
(4, 'Mathematics', '../image/catimg/maths.PNG', 'FEATURED'),
(5, 'Science & Engineering', '../image/catimg/sci.PNG', 'FEATURED'),
(6, 'Others', '../image/catimg/other.PNG', 'FEATURED');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `CONTENT_ID` int(11) NOT NULL,
  `CONTENT_NAME` text NOT NULL,
  `CONTENT_DESC` text NOT NULL,
  `CONTENT_LINK` text NOT NULL,
  `CONTENT_PDF` text NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `COURSE_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`CONTENT_ID`, `CONTENT_NAME`, `CONTENT_DESC`, `CONTENT_LINK`, `CONTENT_PDF`, `COURSE_ID`, `COURSE_NAME`) VALUES
(1, 'Statistics', 'Statistics is the study of the collection, analysis, interpretation, presentation, and organization of data. In other words, it is a mathematical discipline to collect.', '../contentvid/', '../contentpdf/lecture1.pdf', 1, 'Mathematics'),
(2, 'Trigonometry', 'trigonometry, the branch of mathematics concerned with specific functions of angles and their application to calculations.', '../contentvid/', '../contentpdf/lecture2.pdf', 1, 'Mathematics'),
(3, 'Accounting Basics', 'This course focuses on the process of auditing financial statements. It also includes discussions of the accounting concepts, profession, its regulatory and legal liability environments, plus the need for the audit function, professional standards and conduct.', '../contentvid/lec_1.mp4', '../contentpdf/', 2, 'Accounting Olevels'),
(4, 'Cost Accounting', 'The recording of all the costs incurred in a business in a way that can be used to improve its management.', '../contentvid/lec_2.mp4', '../contentpdf/', 2, 'Accounting Olevels'),
(5, 'financial accounting', 'Financial.', '../contentvid/lec_3.mp4', '../contentpdf/', 2, 'Accounting Olevels'),
(6, 'Accounting Basics', 'This course focuses on the process of auditing financial statements. It also includes discussions of the accounting concepts, profession, its regulatory and legal liability environments, plus the need for the audit function, professional standards and conduct.', '../contentvid/', '../contentpdf/AC_pdf_1.pdf', 2, 'Accounting Olevels');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `COURSE_ID` int(11) NOT NULL,
  `COURSE_NAME` text NOT NULL,
  `COURSE_CAT` text NOT NULL,
  `COURSE_DESC` text NOT NULL,
  `COURSE_AUTHOR` text NOT NULL,
  `COURSE_IMG` text NOT NULL,
  `COURSE_DURATION` text NOT NULL,
  `COURSE_PRICE` int(11) NOT NULL,
  `COURSE_FEA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`COURSE_ID`, `COURSE_NAME`, `COURSE_CAT`, `COURSE_DESC`, `COURSE_AUTHOR`, `COURSE_IMG`, `COURSE_DURATION`, `COURSE_PRICE`, `COURSE_FEA`) VALUES
(1, 'Mathematics', 'Mathematics ', 'Intended for students who plan to continue in the calculus sequence, this course involves the study of basic functions: polynomial, rational, exponential, logarithmic, and trigonometric.', ' Shahmir Sajid', '../image/courseimg/WhatsApp Image 2022-07-07 at 10.38.40 PM.jpeg', '3 weeks', 5000, ' NOT_FEATURED'),
(2, 'Accounting Olevels', 'Bussiness ', 'This course focuses on the process of auditing financial statements. It also includes discussions of the accounting concepts, profession, its regulatory and legal liability environments, plus the need for the audit function, professional standards and conduct.', ' Waleed Khan', '../image/courseimg/WhatsApp Image 2022-07-07 at 10.36.15 PM.jpeg', '4 weeks', 10000, ' NOT_FEATURED'),
(3, 'Python', 'IT & Software ', 'Python is a high-level, interpreted, interactive and object-oriented scripting language. Python is designed to be highly readable. It uses English keywords frequently where as other languages use punctuation, and it has fewer syntactical constructions than other languages.', ' Waleed Khan', '../image/courseimg/WhatsApp Image 2022-07-07 at 10.37.38 PM.jpeg', '12 hours', 2000, ' NOT_FEATURED'),
(4, 'C++', 'IT & Software ', 'C++ is a general-purpose programming language created by Danish computer scientist Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\".', ' Waleed Khan', '../image/courseimg/WhatsApp Image 2022-07-07 at 10.37.32 PM.jpeg', '48 hours', 5000, ''),
(5, 'Javascript', 'IT & Software ', 'The JavaScript Specialist course focuses on the fundamental concepts of the JavaScript language. This course will empower you with the skills to design client-side, platform-independent solutions that greatly increase the value of your Web site by providing interactivity and interest', ' Waleed Khan', '../image/courseimg/WhatsApp Image 2022-07-07 at 10.38.11 PM.jpeg', '2 week', 20000, ' NOT_FEATURED'),
(6, 'Cloud Computing ', 'IT & Software ', 'The course presents a top-down view of cloud computing, from applications and administration to programming and infrastructure. Its main focus is on parallel programming techniques for cloud computing and large scale distributed systems which form the cloud infrastructure.', ' Waleed Khan', '../image/courseimg/WhatsApp Image 2022-07-15 at 3.21.23 PM.jpeg', '1 week', 10000, 'FEATURED'),
(7, ' Business English', 'Select Option', 'This course aims to improve your Business English language skills by developing your vocabulary and reading skills and your understanding of tone, style and knowledge of communication methods. ', ' Waleed Khan', '../image/courseimg/WhatsApp Image 2022-07-15 at 3.26.34 PM.jpeg', '10 hours', 3000, ''),
(8, 'Graphic Designing', 'Others ', 'This course is focused on both theoretical and practical parts. The aim of the course is to develop design sense in trainees by the help of theoretical concepts and practice. The focus of practical part will be on designing software e.g. Adobe Photoshop and Illustrator.', ' Waleed Khan', '../image/courseimg/WhatsApp Image 2022-07-15 at 3.20.47 PM.jpeg', '24 hours', 5000, 'FEATURED'),
(9, 'Datascience', 'Science & Engineering ', 'The data science syllabus comprise Maths, statistics, business intelligence, coding, data analysis, machine learning, big data. Data science is an inter-disciplinary discipline that makes use of algorithms, data sets.', ' Waleed Khan', '../image/courseimg/WhatsApp Image 2022-07-15 at 3.19.46 PM.jpeg', '3 weeks', 10000, 'FEATURED'),
(10, 'Digital Marketing', 'Others ', 'Students in this course will explore the development, production and implementation of digital-marketing delivery methods including, but not limited to, email marketing, web-based marketing, search-engine optimization (SEO), online advertising, and social media.', ' Waleed Khan', '../image/courseimg/WhatsApp Image 2022-07-15 at 3.17.52 PM.jpeg', '12 hours', 7000, ''),
(11, 'Machine Learning:', 'Science & Engineering ', 'This course provides an introduction to the fundamental methods at the core of modern machine learning. It covers theoretical foundations as well as essential algorithms for supervised and unsupervised learning. ', ' Waleed Khan', '../image/courseimg/WhatsApp Image 2022-07-15 at 3.18.48 PM.jpeg', '3 weeks', 20000, '');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `DETAILS_ID` int(11) NOT NULL,
  `DETAILS_CNO` text NOT NULL,
  `DETAILS_EMAIL` text NOT NULL,
  `DETAILS_SITE` text NOT NULL,
  `SOCIAL_FB` text NOT NULL,
  `SOCIAL_IN` text NOT NULL,
  `SOCIAL_PI` text NOT NULL,
  `SOCIAL_TW` text NOT NULL,
  `ABOUT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`DETAILS_ID`, `DETAILS_CNO`, `DETAILS_EMAIL`, `DETAILS_SITE`, `SOCIAL_FB`, `SOCIAL_IN`, `SOCIAL_PI`, `SOCIAL_TW`, `ABOUT`) VALUES
(1, '+1235 2355 98', 'etutoring@hotmail.com', 'etutoring.com', '#', '#', '#', '#', 'To overcome this an E-tutoring website is going to be launched that will help you to find the best fit for you. It is an educational website, that serves as a tool to enhance learning and teaching.');

-- --------------------------------------------------------

--
-- Table structure for table `easyaccount`
--

CREATE TABLE `easyaccount` (
  `EASYACC_ID` int(11) NOT NULL,
  `EASYACC_NUM` int(11) NOT NULL,
  `EASYACC_EMAIL` text NOT NULL,
  `EASYACC_BAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `easyaccount`
--

INSERT INTO `easyaccount` (`EASYACC_ID`, `EASYACC_NUM`, `EASYACC_EMAIL`, `EASYACC_BAL`) VALUES
(1, 1, 'immad', 990000);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `F_ID` int(11) NOT NULL,
  `F_CONTENT` varchar(255) NOT NULL,
  `STU_ID` varchar(255) NOT NULL,
  `T_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`F_ID`, `F_CONTENT`, `STU_ID`, `T_NAME`) VALUES
(1, 'he is an excellent teacher! He provides both a great mix of listening, speaking and practical learning activities and a very safe, supportive learning environment', '1', ' Waleed Khan'),
(2, 'manner of teaching is so wonderful and refreshing!! He’s patient and supportive, but really knows how to motivate her/his students. She’s/He’s great at building confidence and keeping lessons fun', '4', ' Waleed Khan'),
(3, 'He is a calm and thoughtful tutor who really cares about students. He helped me through my final exams and I would highly recommend!', '2', ' Waleed Khan'),
(4, 'His teaching methods are great. Very clear and concise. Doesn’t waste your time explaining meaningless background information and always lectures with the intent to help you understand the material.', '9', ' Waleed Khan'),
(5, 'amazing at what you do! Your passion and dedication is beyond words! Thank you for getting me through this hard quick semester, I honestly would have never passed if it was not for your help!', '6', ' Waleed Khan'),
(6, 'she is an absolute life saver! 5 stars is not enough to describe how great of a tutor he is. I would give him 10 stars. He is extremely smart, helpful, and a great communicator.', '8', ' Waleed Khan'),
(7, 'I was having trouble with my engineering physics 1 class and  was able to make the material easy to understand', '5', ' Waleed Khan'),
(8, 'good ', '1', ' Waleed Khan');

-- --------------------------------------------------------

--
-- Table structure for table `helpdesk`
--

CREATE TABLE `helpdesk` (
  `HD_ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `COUNTRY` text NOT NULL,
  `SUB` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `helpdesk`
--

INSERT INTO `helpdesk` (`HD_ID`, `NAME`, `EMAIL`, `COUNTRY`, `SUB`) VALUES
(3, 'minahil', 'minahil@gmail.com', 'PK', 'how to apply for financial aid?'),
(4, 'minahil', 'minahil@gmail.com', 'BH', 'BH');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `HIS_ID` int(11) NOT NULL,
  `QUIZ_ID` int(11) NOT NULL,
  `RESULT` int(11) NOT NULL,
  `STU_EMAIL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`HIS_ID`, `QUIZ_ID`, `RESULT`, `STU_EMAIL`) VALUES
(1, 1, 4, 'Hamza497siddiqui@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `QUIZ_ID` int(11) NOT NULL,
  `QUIZ_NAME` text NOT NULL,
  `QUIZ_NO` text NOT NULL,
  `QUIZ_QUES` text NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `COURSE_NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`QUIZ_ID`, `QUIZ_NAME`, `QUIZ_NO`, `QUIZ_QUES`, `COURSE_ID`, `COURSE_NAME`) VALUES
(1, 'Accounting Basics', 'LAST', '5', 2, 'Accounting Olevels');

-- --------------------------------------------------------

--
-- Table structure for table `quizstat`
--

CREATE TABLE `quizstat` (
  `STAT_ID` int(11) NOT NULL,
  `QUIZ_ID` int(11) NOT NULL,
  `STU_EMAIL` text NOT NULL,
  `QUIZ_STAT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizstat`
--

INSERT INTO `quizstat` (`STAT_ID`, `QUIZ_ID`, `STU_EMAIL`, `QUIZ_STAT`) VALUES
(1, 1, 'Hamza497siddiqui@gmail.com', 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STU_ID` int(11) NOT NULL,
  `STU_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `STU_NAME` varchar(255) NOT NULL,
  `STU_EMAIL` varchar(255) NOT NULL,
  `STU_PASS` varchar(255) NOT NULL,
  `STU_OCC` varchar(255) NOT NULL,
  `STU_IMG` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STU_ID`, `STU_DATE`, `STU_NAME`, `STU_EMAIL`, `STU_PASS`, `STU_OCC`, `STU_IMG`) VALUES
(1, '2022-09-06 22:42:10', ' hamza', 'Hamza497siddiqui@gmail.com', 'h1', 'undergrad', '../image/stuimg/WhatsApp Image 2021-12-06 at 8.10.06 PM.jpeg'),
(2, '2022-09-06 22:49:16', ' Fariha', 'fa', 'f1', 'undergrad', '../image/stuimg/WhatsApp Image 2021-12-06 at 8.02.02 PM.jpeg'),
(4, '2022-09-06 22:50:17', ' maha aamir', 'maha_aamir@live.com', 'm1', 'postgrad', '../image/stuimg/WhatsApp Image 2021-12-27 at 7.21.16 PM.jpeg'),
(5, '2022-09-06 22:51:01', ' Sadia Aamir', 'sa', 's', 'student', '../image/stuimg/WhatsApp Image 2022-07-27 at 8.12.57 PM.jpeg'),
(6, '2022-09-06 22:51:59', ' sam', 'sams', 's', 'Data Analyst', '../image/stuimg/WhatsApp Image 2022-07-27 at 8.12.57 PM (1).jpeg'),
(8, '2022-09-06 22:52:56', ' Alex', 'a', 'a', 'undergrad', '../image/stuimg/WhatsApp Image 2022-07-27 at 8.12.56 PM.jpeg'),
(9, '2022-09-06 22:53:40', ' Maham Arshad', 'maham@gmail.com', 'm', 'Data Analyst', '../image/stuimg/WhatsApp Image 2022-07-21 at 11.30.31 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `T_ID` int(11) NOT NULL,
  `STU_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `COURSE_PRICE` int(11) NOT NULL,
  `COURSE_AUTHOR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`T_ID`, `STU_ID`, `COURSE_ID`, `COURSE_PRICE`, `COURSE_AUTHOR`) VALUES
(1, 1, 2, 10000, ' Waleed Khan'),
(2, 6, 1, 5000, ' Shahmir Sajid'),
(3, 6, 2, 10000, ' Waleed Khan'),
(11, 1, 6, 10000, ' Waleed Khan'),
(12, 1, 1, 5000, ' Shahmir Sajid'),
(13, 1, 8, 5000, ' Waleed Khan'),
(14, 1, 8, 5000, ' Waleed Khan');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `TUTOR_ID` int(11) NOT NULL,
  `TUTOR_DATE` datetime NOT NULL DEFAULT current_timestamp(),
  `TUTOR_NAME` varchar(255) NOT NULL,
  `TUTOR_EMAIL` varchar(255) NOT NULL,
  `TUTOR_PASS` varchar(255) NOT NULL,
  `TUTOR_OCC` varchar(255) NOT NULL,
  `TUTOR_IMG` text NOT NULL,
  `TUTOR_BIO` text NOT NULL,
  `TUTOR_FEA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`TUTOR_ID`, `TUTOR_DATE`, `TUTOR_NAME`, `TUTOR_EMAIL`, `TUTOR_PASS`, `TUTOR_OCC`, `TUTOR_IMG`, `TUTOR_BIO`, `TUTOR_FEA`) VALUES
(1, '2022-09-06 22:31:28', ' Megan kell', 'mee', 'm', 'PHD', '../image/tutor/c3.PNG', ' I am ambitious workaholic, but apart from that, pretty simple person.', 'FEATURED'),
(2, '2022-09-06 22:32:17', ' Barry Allen', 'bary@hotmail.com', 'b1', 'PROGRAMMER', '../image/tutor/Capture.PNG', ' I am ambitious workaholic, but apart from that, pretty simple person.', ' NOT_FEATURED'),
(3, '2022-09-06 22:28:24', ' Stella Smith', 'stella@gmail.com', 's2', 'DEVELOPER', '../image/tutor/c1.PNG', ' I am ambitious workaholic, but apart from that, pretty simple person.', 'FEATURED'),
(4, '2022-09-06 22:29:37', ' Peter Parker ', 'parker@hotmail.com', 'p1', 'PROGRAMMER', '../image/tutor/c2.PNG', ' I am ambitious workaholic, but apart from that, pretty simple person.', 'FEATURED'),
(7, '2022-09-06 22:01:06', ' Waleed Khan', 'waleed@gmail.com', 'w1', 'Accountant', '../image/tutor/WhatsApp Image 2022-07-13 at 10.30.07 PM.jpeg', ' I am ambitious workaholic, but apart from that, pretty simple person.', ''),
(8, '2022-09-06 21:46:54', ' Shahmir Sajid', 'ss', 's1', 'BUSINESS MAN', '../image/tutor/WhatsApp Image 2022-07-13 at 10.02.20 PM.jpeg', ' I am ambitious workaholic, but apart from that, pretty simple person.', ' NOT_FEATURED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ACC_ID`);

--
-- Indexes for table `addques`
--
ALTER TABLE `addques`
  ADD PRIMARY KEY (`ADDQ_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`AP_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`CONTENT_ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`COURSE_ID`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`DETAILS_ID`);

--
-- Indexes for table `easyaccount`
--
ALTER TABLE `easyaccount`
  ADD PRIMARY KEY (`EASYACC_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`F_ID`);

--
-- Indexes for table `helpdesk`
--
ALTER TABLE `helpdesk`
  ADD PRIMARY KEY (`HD_ID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`HIS_ID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`QUIZ_ID`);

--
-- Indexes for table `quizstat`
--
ALTER TABLE `quizstat`
  ADD PRIMARY KEY (`STAT_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`STU_ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`T_ID`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`TUTOR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ACC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addques`
--
ALTER TABLE `addques`
  MODIFY `ADDQ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `AP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `CONTENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `DETAILS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `easyaccount`
--
ALTER TABLE `easyaccount`
  MODIFY `EASYACC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `helpdesk`
--
ALTER TABLE `helpdesk`
  MODIFY `HD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `HIS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `QUIZ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quizstat`
--
ALTER TABLE `quizstat`
  MODIFY `STAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `STU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `T_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `TUTOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
