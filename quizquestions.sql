-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 05:57 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questions`
--

-- --------------------------------------------------------

--
-- Table structure for table `quizquestions`
--

CREATE TABLE `quizquestions` (
  `id` int(6) UNSIGNED NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `wrong1` text DEFAULT NULL,
  `wrong2` text DEFAULT NULL,
  `wrong3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizquestions`
--

INSERT INTO `quizquestions` (`id`, `question`, `answer`, `wrong1`, `wrong2`, `wrong3`) VALUES
(1, 'Who was the first US president?', 'George Washington', 'John Adams', 'John Quincy Adams', 'James Madison'),
(2, 'How many congressmen/women are there in the US House of Representatives?', '435', '100', '200', '336'),
(3, 'Once the US Constitution was ratified, where was the first US capital?', 'New York City', 'Boston', 'Philadelphia', 'Richmond'),
(4, 'How many ratified amendments are there in the US Constitution?', '27', '10', '15', '23'),
(5, 'What is one right or freedom from the First Amendment?', 'Freedom of speech', 'Right to bear arms', 'Abolition of slavery', 'Lame duck rule'),
(6, 'Which of the following isn\'t a branch of the US government?', 'Presidential', 'Judicial', 'Executive', 'Legislative'),
(7, 'What is the maximum number of terms a US president can serve?', '2', '1', '3', '4'),
(8, 'In what month do we vote for the US president?', 'November', 'January', 'June', 'December'),
(9, 'What is the political party of the current US president?', 'Republican', 'Democrat', 'Tea Party', 'Independent Party'),
(10, 'How old do citizens have to be to vote for the US president?', '18', '16', '21', '17'),
(11, 'Which of the following was not one of the original 13 states?', 'Maine', 'New Hampshire', 'Delaware', 'Georgia'),
(12, 'Name the US war between the North and the South', 'Civil War', 'War of 1812', 'Mexican-American War', 'Spanish-American War'),
(13, 'Who was the president during World War 1?', 'Woodrow Wilson', 'Harry Truman', 'Herbert Hoover', 'Gerald Ford'),
(14, 'During the Cold War, what was the primary concern of the United States?', 'Communism', 'Racism', 'Economics', 'Segregation'),
(15, 'Why does the US flag have 13 stripes?', 'There were 13 original colonies', 'The Federalist Papers had 13 proposals', 'It took 13 days to found the Plymouth Rock', '13 is a good number for a flag'),
(16, 'When is Independence Day?', 'July 4', 'June 10', 'December 25', 'August 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quizquestions`
--
ALTER TABLE `quizquestions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quizquestions`
--
ALTER TABLE `quizquestions`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
