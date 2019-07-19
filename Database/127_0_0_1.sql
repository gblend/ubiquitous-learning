-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 03:06 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4637976_ulearningsystem`
--
DROP DATABASE IF EXISTS `id4637976_ulearningsystem`;
CREATE DATABASE IF NOT EXISTS `id4637976_ulearningsystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `id4637976_ulearningsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

DROP TABLE IF EXISTS `blogpost`;
CREATE TABLE `blogpost` (
  `poster_id` int(100) NOT NULL,
  `poster_photo` varchar(200) NOT NULL,
  `poster_subject` varchar(200) NOT NULL,
  `poster_email` varchar(50) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `bloguser_uid` varchar(30) NOT NULL,
  `post_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`poster_id`, `poster_photo`, `poster_subject`, `poster_email`, `post`, `bloguser_uid`, `post_date`) VALUES
(20, 'images/ProfilepixUpload/S01_big.big.jpg', 'gb', 'gabriel@gmail.com', 'hhhhhhhhhhhhhhhhhhhhhhhh', 'gblend', '01:25:2018'),
(21, 'images/InstructorpixUpload/team_7.7.jpg', 'good', 'damsy@mail.com', 'testing', 'Damilola', '01:25:2018'),
(22, 'images/InstructorpixUpload/14590318_1192106474181931_5455592285147487830_n.jpg', 'great', 'gabriel@gmail.com', 'goodgoodgoodgood', 'damilola1', '01:26:2018'),
(24, 'images/ProfilepixUpload/26230382_103144867160008_4457105036766111169_n.jpg', 'gab', 'ggggggggggggggggggg@mail.com', 'gooood', 'gblend', '01:28:2018');

-- --------------------------------------------------------

--
-- Table structure for table `bookcontents`
--

DROP TABLE IF EXISTS `bookcontents`;
CREATE TABLE `bookcontents` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `book_description` varchar(100) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_path` varchar(150) NOT NULL,
  `bookcover` varchar(150) NOT NULL,
  `instructor_uid` varchar(30) NOT NULL,
  `date_modified` varchar(20) NOT NULL,
  `date_created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcontents`
--

INSERT INTO `bookcontents` (`book_id`, `book_title`, `book_description`, `book_author`, `book_path`, `bookcover`, `instructor_uid`, `date_modified`, `date_created`) VALUES
(7, 'Good', 'i have done my job for the day', 'gblend', 'Books/BooksUpload/materialize_tutorial.pdf', 'images/Bookcovers/clay-pot.jpg', 'Damilola', '23/01/18', '23/01/18'),
(8, 'Seminar', 'learn seminar documentation', 'gabriel', 'Books/BooksUpload/reactjs_tutorial.pdf', 'images/Bookcovers/DSXjAXbXkAAYtRR.jpg', 'Damilola', '23/01/18', '23/01/18'),
(10, 'Search Engine Optimization', 'All you need to know about seo', 'Google group', 'Books/BooksUpload/BasicCalculus.pdf', 'images/Bookcovers/26230382_103144867160008_4457105036766111169_n.jpg', 'Damilola', '23/01/18', '23/01/18');

-- --------------------------------------------------------

--
-- Table structure for table `contactmessage`
--

DROP TABLE IF EXISTS `contactmessage`;
CREATE TABLE `contactmessage` (
  `msg_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_subject` varchar(100) NOT NULL,
  `user_message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactmessage`
--

INSERT INTO `contactmessage` (`msg_id`, `user_name`, `user_email`, `user_subject`, `user_message`) VALUES
(1, 'saadarffsara', 'gabrielilo190@gmail.com', 'gpoood', 'qaeafftas rqaqttzzta qt tay');

-- --------------------------------------------------------

--
-- Table structure for table `coursecontents`
--

DROP TABLE IF EXISTS `coursecontents`;
CREATE TABLE `coursecontents` (
  `content_id` int(11) NOT NULL,
  `instructor_uid` varchar(30) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `course_description` varchar(150) NOT NULL,
  `course_duration` varchar(30) NOT NULL,
  `video_path` varchar(150) NOT NULL,
  `poster_path` varchar(150) NOT NULL,
  `upload_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mod_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursecontents`
--

INSERT INTO `coursecontents` (`content_id`, `instructor_uid`, `course_title`, `course_description`, `course_duration`, `video_path`, `poster_path`, `upload_date`, `mod_date`) VALUES
(1, 'Gblend', 'The Complete Android N Developer Course', 'Learn everything about android development, and become a professional android developer.', '30', 'Videos/CourseVideos/The Complete Java Developer Course - Udemy(1).mp4', 'Videos/coursePoster/951618_0839_2.jpg', '2018-01-31 19:23:45', ''),
(2, 'Gblend', 'The Web Developer Bootcamp', 'Learn everything about web development, and become a full stack web developer.', '5', 'Videos/CourseVideos/How to create a nice CSS3 Preloader.mp4', 'Videos/coursePoster/625204_436a_2.jpg', '2018-01-31 19:23:51', ''),
(3, 'Ade', 'The Complete Android & Java Developer Course - Build 21....', 'From java beginner to an expert. Ultimate course and  to becoming an android & java developer.', '3', 'Videos/CourseVideos/The Complete Java Developer Course - Udemy(35).mp4', 'Videos/coursePoster/360920_681f_20.jpg', '2018-01-31 19:23:57', ''),
(4, 'Ade', 'Ultimate Photoshop Training: From Beginner To Pro', 'The best exposure in learning and becoming a professional photoshop user.', '6', 'Videos/CourseVideos/Laser engraving photos from CorelDRAW.mp4', 'Videos/coursePoster/321410_d9c5_3.jpg', '2018-01-31 19:24:07', ''),
(7, 'Mc Bright', 'Algebra For A-Level Maths', 'This is a gentle introduction to algebra for A-level maths.', '22', 'Videos/CourseVideos/Integration_Logarithmic_Functions_2C_Natural_Logs_Integrating_By_Substitution_2C_Long_Division_2C_Calculus.mp4', 'Videos/coursePoster/112704_149a_6.jpg', '2018-01-31 19:24:21', ''),
(8, 'Mc Bright', 'PMP Certification 2017: 2 Realistic PMP Exams & Detailed...', 'This is a general and basic introduction to PMP.', '9', 'Videos/CourseVideos/How To Make a Calculator In Visual Basic (2008,2010,2015,2017) With Codes.mp4', 'Videos/coursePoster/774404_e171_3.jpg', '2018-01-31 19:24:26', ''),
(9, 'Jheerida', 'Beginning Algebra: Building A Foundation', 'The complete algebra beginner course for enthusiastic learners.', '1', 'Videos/CourseVideos/The Complete Java Developer Course - Udemy(60).mp4', 'Videos/coursePoster/75322_badc_5.jpg', '2018-01-31 19:24:36', ''),
(10, 'Jheerida', 'Beginner To Pro In Excel: Financial Modeling And...', 'The easiest way to learn excel  and become a pro within a few days.', '2', 'Videos/CourseVideos/Flavour_Power_To_Win.mp4', 'Videos/coursePoster/648826_f0e5_3.jpg', '2018-01-31 19:24:41', ''),
(11, 'Ragnal', 'Graphic Design Bootcamp', 'Learn everything you need to know about graphic design.', '5', 'Videos/CourseVideos/Diamond-Platnumz-Ft-Flavour-Nana(9jabaze.com).mp4', 'Videos/coursePoster/749542_4762_3.jpg', '2018-01-31 19:24:45', ''),
(12, 'Ragnal', 'Beast Android Development: Integrating A...', 'Learn everything you need to know about android.', '7', 'Videos/CourseVideos/Jason_Derulo_It_Girl-1.mp4', 'Videos/coursePoster/1046062_3878_3.jpg', '2018-01-31 19:24:48', ''),
(14, 'NathDaniel', 'Python In 30 Days', 'Expand your programming knowledge in python.', '5', 'Videos/CourseVideos/Create Tool Bar,Status Bar and Menu Bar using Visual Basic 6.0-Step By Step Tuto.mp4', 'Videos/coursePoster/58_01fb_3.jpg', '2018-01-31 19:24:57', ''),
(15, 'NathDaniel', 'Complete Java Masterclass', 'Expand your programming knowledge in java. Become a master soonest.', '5', 'Videos/CourseVideos/Miguel_Ft_Kendrick_Lamar_How_Many_Drinks.mp4', 'Videos/coursePoster/533682_c10c_4.jpg', '2018-01-31 19:25:03', ''),
(17, 'Gblend', 'Ultimate Java Script Bootcamp', 'Learn everything you need to become a professional java script programmer.', '8', 'Videos/CourseVideos/Wildlife.wmv', 'Videos/coursePoster/42_d546_3.jpg', '2018-01-31 19:25:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

DROP TABLE IF EXISTS `dashboard`;
CREATE TABLE `dashboard` (
  `dashboard_id` int(5) NOT NULL,
  `dashboard_uid` varchar(30) NOT NULL,
  `dashboard_email` varchar(40) NOT NULL,
  `dashboard_pwd` varchar(60) NOT NULL,
  `dashboard_photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`dashboard_id`, `dashboard_uid`, `dashboard_email`, `dashboard_pwd`, `dashboard_photo`) VALUES
(0, 'Gblend', 'Gabrielilo190@gmail.com', '43f2064a235d0aaad2563433fb8f302b', 'images/ProfilepixUpload/team_3.3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `instructortable`
--

DROP TABLE IF EXISTS `instructortable`;
CREATE TABLE `instructortable` (
  `instructor_id` int(11) NOT NULL,
  `instructor_first` varchar(30) NOT NULL,
  `instructor_last` varchar(30) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `instructor_email` varchar(40) NOT NULL,
  `i_number` varchar(13) NOT NULL,
  `country` varchar(30) NOT NULL,
  `instructor_specialization` varchar(100) NOT NULL,
  `i_quote` varchar(100) NOT NULL,
  `i_profilephoto` varchar(150) NOT NULL,
  `instructor_uid` varchar(30) NOT NULL,
  `instructor_pwd` varchar(50) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructortable`
--

INSERT INTO `instructortable` (`instructor_id`, `instructor_first`, `instructor_last`, `sex`, `instructor_email`, `i_number`, `country`, `instructor_specialization`, `i_quote`, `i_profilephoto`, `instructor_uid`, `instructor_pwd`, `regdate`) VALUES
(1, 'Ade', 'Akinniyi', 'male', 'dexy@gmail.com', '09088888888', 'Nigeria', 'Ass. Professor', 'Education is the greatest gift.', 'images/InstructorpixUpload/team_1.1.jpg', 'Ade', 'fcea920f7412b5da7be0cf42b8c93759', '2017-12-13 11:56:09'),
(2, 'Nwachukwu', 'Bright', 'male', 'bright@gmail.com', '09011111111', 'Nigeria', 'Ass. Professor', 'Project-Based learning is a flexible toll for framing.', 'images/InstructorpixUpload/team_2.2.jpg', 'Mc Bright', 'fcea920f7412b5da7be0cf42b8c93759', '2017-12-13 11:19:08'),
(3, 'Ilochi', 'Gabriel', 'male', 'gabrielilo190@gmail.com', '08166195490', 'Nigeria', 'Maths Instructor', 'I throw myself down among the tall grass by the stream', 'images/InstructorpixUpload/team_3.3.jpg', 'Gblend', 'c44dd1692605e1133c7186fa76736cd1', '2017-12-13 11:22:09'),
(4, 'Ifeanyi', 'Ernest', 'male', 'ragnal@mail.com', '08098765443', 'U.S.A', 'Maths Instructor', 'I lie close to a thousand unknown plants noticed.', 'images/InstructorpixUpload/team_4.4.jpg', 'Ragnal', 'fcea920f7412b5da7be0cf42b8c93759', '2017-12-13 11:25:30'),
(6, 'Jaji', 'Ranti', 'female', 'ranti@yahoo.com', '07033336666', 'Italy', 'Web Developer', 'The languages you understand best are the ones you practice', 'images/InstructorpixUpload/team_6.6.jpg', 'Jheerida', 'fcea920f7412b5da7be0cf42b8c93759', '2017-12-13 11:32:55'),
(7, 'Adelana', 'Damilola', 'female', 'dami@gmail.com', '08011112255', 'Spain', 'Motion Animations', 'The languages only differ in grammar, most common words', 'images/InstructorpixUpload/team_7.7.jpg', 'Damilola', 'fcea920f7412b5da7be0cf42b8c93759', '2017-12-13 11:36:14'),
(9, 'Akpuru ', 'Joseph', 'male', 'joe@yahoo.com', '08099334466', 'Italy', 'Android Programming', 'I must explain to you how all this idea of denouncing pleasure', 'images/InstructorpixUpload/team_9.9.jpg', 'Joe', 'fcea920f7412b5da7be0cf42b8c93759', '2017-12-13 11:42:18'),
(10, 'Sarah ', 'Ije', 'female', 'ij@gmail.com', '09077665522', 'Nigeria', 'Dance Instructor', 'The actual teachings of the great explorer of  the master-builder.', 'images/InstructorpixUpload/team_10.1.jpg', 'Ijsmart', 'fcea920f7412b5da7be0cf42b8c93759', '2017-12-13 11:57:05'),
(12, 'Nzewi', 'Ndubest', 'male', 'nd@mail.com', '07044335678', 'Ghana', 'Ass. Professor', 'Partake in that to which your interest is bonded.', 'images/InstructorpixUpload/team_12.12.jpg', 'Nzewi', 'fcea920f7412b5da7be0cf42b8c93759', '2017-12-13 11:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `newsletteremail`
--

DROP TABLE IF EXISTS `newsletteremail`;
CREATE TABLE `newsletteremail` (
  `newsletter_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletteremail`
--

INSERT INTO `newsletteremail` (`newsletter_id`, `user_email`) VALUES
(2, 'gabriel@mail.com33'),
(3, 'gabriel@mai7l.com22'),
(5, 'gabriel@mai7l.com55'),
(6, 'gabriel@mail.com00'),
(7, 'gabriel@mail.com909'),
(8, 'gabriel@mai7l.com458'),
(9, 'gabriel@mail.com888'),
(10, 'gstar@gmail.com'),
(11, 'gabriel@mail.com8989'),
(12, 'gstar@gmail.com8888'),
(13, 'gabriel@mail.com'),
(14, 'gblend@g1mail.com000'),
(15, 'gabriel@mail.com1010'),
(16, 'gabriel@mail.com77777'),
(17, 'gabriel@mail.com8888'),
(18, 'gabriel@mail.com6633'),
(19, 'gstar@gmail.com433'),
(20, 'gabriel@mail.com900'),
(21, 'gblen@w.com'),
(22, 'gabriel@mail.com000'),
(23, 'gabriel@mail.com8787');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(40) NOT NULL,
  `user_last` varchar(40) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_uid` varchar(40) NOT NULL,
  `user_pwd` varchar(50) NOT NULL,
  `profilephoto` varchar(150) NOT NULL,
  `user_sex` text NOT NULL,
  `regdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`, `profilephoto`, `user_sex`, `regdate`) VALUES
(19, 'gabriel', 'ilochi', 'gabrielilo190@gmail.com', 'gblend', 'c44dd1692605e1133c7186fa76736cd1', 'images/ProfilepixUpload/S01_big.big.jpg', 'male', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_coursecontents`
--

DROP TABLE IF EXISTS `users_coursecontents`;
CREATE TABLE `users_coursecontents` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coursecontent_id` int(11) NOT NULL,
  `modified_on` varchar(20) NOT NULL,
  `created_on` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_coursecontents`
--

INSERT INTO `users_coursecontents` (`course_id`, `user_id`, `coursecontent_id`, `modified_on`, `created_on`) VALUES
(3, 1, 2, '15:12:2017', '15/12/2017'),
(4, 1, 3, '15:12:2017', '15/12/2017'),
(5, 1, 9, '15:12:2017', '15/12/2017'),
(6, 1, 3, '15:12:2017', '15/12/2017'),
(7, 1, 7, '15:12:2017', '15/12/2017'),
(8, 1, 15, '16:12:2017', '16/12/2017'),
(9, 1, 10, '16:12:2017', '16/12/2017'),
(10, 1, 12, '18:12:2017', '18/12/2017'),
(11, 1, 11, '01:01:2018', '01/01/2018'),
(12, 10, 2, '22:01:2018', '22/01/2018'),
(13, 10, 6, '22:01:2018', '22/01/2018'),
(14, 14, 3, '22:01:2018', '22/01/2018'),
(15, 17, 2, '23:01:2018', '23/01/2018'),
(16, 17, 4, '23:01:2018', '23/01/2018'),
(17, 18, 3, '26:01:2018', '26/01/2018'),
(18, 1, 8, '26:01:2018', '26/01/2018'),
(22, 1, 5, '30:01:2018', '30/01/2018'),
(23, 1, 17, '30:01:2018', '30/01/2018'),
(24, 19, 7, '02:02:2018', '02/02/2018'),
(25, 19, 3, '04:02:2018', '04/02/2018'),
(26, 19, 12, '04:02:2018', '04/02/2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`poster_id`);

--
-- Indexes for table `bookcontents`
--
ALTER TABLE `bookcontents`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `contactmessage`
--
ALTER TABLE `contactmessage`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `coursecontents`
--
ALTER TABLE `coursecontents`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`dashboard_id`);

--
-- Indexes for table `instructortable`
--
ALTER TABLE `instructortable`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `newsletteremail`
--
ALTER TABLE `newsletteremail`
  ADD PRIMARY KEY (`newsletter_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_coursecontents`
--
ALTER TABLE `users_coursecontents`
  ADD PRIMARY KEY (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `poster_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `bookcontents`
--
ALTER TABLE `bookcontents`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contactmessage`
--
ALTER TABLE `contactmessage`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coursecontents`
--
ALTER TABLE `coursecontents`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `instructortable`
--
ALTER TABLE `instructortable`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `newsletteremail`
--
ALTER TABLE `newsletteremail`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users_coursecontents`
--
ALTER TABLE `users_coursecontents`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
