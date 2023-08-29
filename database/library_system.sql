-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 01:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `is_latest` int(1) NOT NULL,
  `is_trending` int(1) NOT NULL,
  `is_featured` int(1) NOT NULL,
  `featured_background` varchar(255) NOT NULL,
  `borrowed_times` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `cover`, `author`, `year`, `description`, `stock`, `available`, `pdf`, `genre_id`, `is_latest`, `is_trending`, `is_featured`, `featured_background`, `borrowed_times`) VALUES
(26, 'Harry', '16801759421680175814harrypotter and the philop.jpg', 'JK. Rowling', '1997', 'Harry Potter and the Philosopher&#039;s Stone is a 1997 fantasy novel written by British author J. K. Rowling. The first novel in the Harry Potter series and Rowling&#039;s debut novel, it follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to Hogwarts School of Witchcraft and Wizardry. Harry makes close friends and a few enemies during his first year at the school and with the help of his friends, Ron Weasley and Hermione Granger, he faces an attempted comeback by the dark wizard Lord Voldemort, who killed Harry&#039;s parents, but failed to kill Harry when he was just 15 months old.', 1, 0, 'GIGABYTE_G24F_UM_EN.pdf', 7, 1, 0, 0, '', 20),
(28, 'Harry Potter and the Order of the Phoenix', '16802817311680280677book1.jpg', 'JK. Rowling', '2003', 'Harry Potter and the Order of the Phoenix is a fantasy novel written by British author J. K. Rowling and the fifth novel in the Harry Potter series. It follows Harry Potter&#039;s struggles through his fifth year at Hogwarts School of Witchcraft and Wizardry, including the surreptitious return of the antagonist Lord Voldemort, O.W.L. exams, and an obstructive Ministry of Magic. The novel was published on 21 June 2003 by Bloomsbury in the United Kingdom, Scholastic in the United States, and Raincoast in Canada. It sold five million copies in the first 24 hours of publication.[1]\r\n\r\nHarry Potter and the Order of the Phoenix won several awards, including the American Library Association Best Book Award for Young Adults in 2003. The book was also made into a 2007 film, and a video game by Electronic Arts.', 33, 29, '05_Harry_Potter_and_the_Order_of_the_Phoenix_by_J.K._Rowling.pdf', 7, 1, 1, 1, '', 25),
(31, 'Learning PHP', '16808727751680160363learning php book cover.jpg', 'David Sklar', 'Unknown', 'If you want to get started with PHP, this book is essential. Author David Sklar (PHP Cookbook) guides you through aspects of the language you need to build dynamic server-side websites. By exploring features of PHP 5.x and the exciting enhancements in the latest release, PHP 7, you&rsquo;ll learn how to work with web servers, browsers, databases, and web services. End-of-chapter exercises help you make the lessons stick.\r\n\r\nWhether you&rsquo;re a hobbyist looking to build dynamic websites, a frontend developer ready to add server-side programs, or an experienced programmer who wants to get up to speed with this language, this gentle introduction also covers aspects of modern PHP, such as internationalization, using PHP from the command line, and package management.\r\n\r\nLearn how PHP interacts with browsers and servers\r\nUnderstand data types, variables, logic, looping, and other language basics\r\nExplore how to use arrays, functions, and objects\r\nBuild and validate web forms\r\nWork with databases and session management\r\nAccess APIs to interact with web services and other websites\r\nJumpstart your project with popular PHP web application frameworks', 2, 0, 'Learning PHP.pdf', 7, 1, 0, 1, '16818324741149777.jpg', 3),
(32, 'Data Structures and Algorithms Made Easy', '16808730011680162149datastructure bookcover.jpg', ' Narasimha Karumanchi ', '2020', 'Peeling Data Structures and Algorithms:\r\n\r\n&quot;Data Structures And Algorithms Made Easy: Data Structures and Algorithmic Puzzles&quot; is a book that offers solutions to complex data structures and algorithms. There are multiple solutions for each problem and the book is coded in C/C++, it comes handy as an interview and exam guide for computer scientists. It can be used as a reference manual by those readers in the computer science industry. This book serves as guide to prepare for interviews, exams, and campus work. In short, this book offers solutions to various complex data structures and algorithmic problems.\r\n\r\n\r\nTopics Covered:\r\n\r\n1. Introduction\r\n2. Recursion and Backtracking\r\n3. Linked Lists\r\n4.Stacks\r\nQueues\r\nTrees\r\nPriority Queue and Heaps\r\nDisjoint Sets ADT\r\nGraph Algorithms\r\nSorting   \r\nSearching   \r\nSelection Algorithms [Medians]   \r\nSymbol Tables   \r\nHashing   \r\nString Algorithms   \r\nAlgorithms Design Techniques   \r\nGreedy Algorithms   \r\nDivide and Conquer Algorithms   \r\nDynamic Programming   \r\nComplexity Classes   \r\nMiscellaneous Concepts   ', 1, 0, 'Data_Structures_and_Algorithms_Made_Easy_Data_Structures_and_Algorithmic.pdf', 7, 1, 0, 0, '', 1),
(33, 'From filth-ghost to Khmer-witch: Phi Krasue&rsquo;', '1680875817Screenshot 2023-04-07 205456.png', 'Benjamin Baumann', '2014', 'Depicted as a floating woman&rsquo;s head with drawn out and bloody entrails danglingbeneath it,\r\nphi krasue\r\n is one of the most iconic uncanny creatures of Thai horrorcinema. However, despite its position as one of Thailand&rsquo;s most striking and well-known\r\nphi\r\n , there is very little research investigating this specific phenomenon. Thisis remarkable given the commonality of encounters with this uncanny being in &lsquo;reallife&rsquo; and the continuous presence of its ghostly images in popular cultural media. Relating empirical data gathered during anthropological fieldwork in a rural commu-nity of Thailand&rsquo;s lower north-east to the analysis of two Thai ghost films that takethis ghostly image as their main subject and narrative force this article argues that theknowledge of vernacular ghostlore is essential to decipher the cinematic representations&rsquo; full symbolism. Thai ghost films are produced for the &lsquo;knowing spectator&rsquo; who hasimplicit knowledge of the cultural logics structuring ghostly classification in contem- porary Thailand. This embodied knowledge allows Thai audiences to make sense of\r\nphi krasue\r\n&rsquo;s ghostly image despite its cinematic transformation from &lsquo;Filth Ghost&rsquo; to&lsquo;Khmer Witch&rsquo;. Based on Kristeva&rsquo;s theory of abjection I will show that Thai audiencescontinue to see\r\nphi krasue\r\n first and foremost as uncanny &lsquo;matter out of place&rsquo;.', 2, 1, 'From_filth_ghost_to_Khmer_witch_Phi_Kras.pdf', 7, 1, 0, 0, '', 2),
(34, 'The 48 Laws of Power', '16808764429781804220238-us.jpg', 'Robert Greene', '2000', 'Amoral, cunning, ruthless, and instructive, this multi-million-copy New York Times bestseller is the definitive manual for anyone interested in gaining, observing, or defending against ultimate control &ndash; from the author of The Laws of Human Nature.\r\n\r\nIn the book that People magazine proclaimed &ldquo;beguiling&rdquo; and &ldquo;fascinating,&rdquo; Robert Greene and Joost Elffers have distilled three thousand years of the history of power into 48 essential laws by drawing from the philosophies of Machiavelli, Sun Tzu, and Carl Von Clausewitz and also from the lives of figures ranging from Henry Kissinger to P.T. Barnum.\r\n \r\nSome laws teach the need for prudence (&ldquo;Law 1: Never Outshine the Master&rdquo;), others teach the value of confidence (&ldquo;Law 28: Enter Action with Boldness&rdquo;), and many recommend absolute self-preservation (&ldquo;Law 15: Crush Your Enemy Totally&rdquo;). Every law, though, has one thing in common: an interest in total domination. In a bold and arresting two-color package, The 48 Laws of Power is ideal whether your aim is conquest, self-defense, or simply to understand the rules of the game.', 10, 9, 'The+48+Laws+Of+Power.pdf', 7, 1, 0, 0, '', 2),
(35, 'A Teaspoon of Earth and Sea', '168087695181MKQjxDI0L.jpg', 'Dina Nayeri', 'Unknown', 'Collecting forbidden paraphernalia in her fascination with America, young Saba Hafezi of 1980s Iran becomes convinced that her suddenly missing mother and twin sister have departed for America without her, a situation that compels her to envision her twin&#039;s Western life throughout subsequent years. Simultaneous.\r\n', 2, 1, 'sample.pdf', 7, 1, 0, 0, '', 2),
(36, 'The Martian', '16808770443566dc24c327c144d18dffbac7145d28--mark-watney-dust-storm.jpg', 'Andy Weir', 'Unknown', 'we don&#039;t know', 2, 1, 'sample.pdf', 13, 1, 0, 0, '', 1),
(37, 'Harry Potter and The Cursed Child', '1680877200Harry_Potter_and_the_Cursed_Child_Special_Rehearsal_Edition_Book_Cover.jpg', 'JK. Rowling', '2000', '&amp;N Top 15: What do the bestsellers book covers have in common?\r\nToday I would like to analyze the covers of the fifteen best-selling books from Barnes &amp; Noble to see if it is possible to distinguish some trends or common characteristics among them. This knowledge may prove useful for people designing their own cover, but it could also help me to create designs that could rival the covers of the world best-selling books.', 1, 0, 'sample.pdf', 11, 1, 0, 0, '', 2),
(38, 'Dinner with the Dissident', '1680877500a5dc628e7c1eac184adf34be31b3574c.jpg', 'John Tesarch', '2001', 'zin ', 1, 0, 'sample.pdf', 7, 1, 0, 0, '', 1),
(39, 'How the powerful took over identity politics', '1680877594FOsf6aNXMAINKth.png', 'Unknown', 'Unknown', 'yes', 1, 0, 'sample.pdf', 13, 1, 0, 0, '', 2),
(40, 'IDK', '1681832258Screenshot (28).png', 'IDK', '2000', 'Wdadawdaw', 1, 1, '05_Harry_Potter_and_the_Order_of_the_Phoenix_by_J.K._Rowling.pdf', 13, 1, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `book_id`) VALUES
(11, 'hi', 20, 34),
(12, 'HAHAHA', 20, 37),
(13, '1231313', 23, 34),
(14, 'wtdf', 23, 33);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `request` text NOT NULL,
  `url` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `request`, `url`, `user_id`) VALUES
(1, '', 'http://localhost:3000/admin/index.php#', 23);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `description`) VALUES
(7, 'Education', 'EDUs'),
(11, 'Fantasy', 'anh mix dg'),
(13, 'Other', 'dasdwad');

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `request_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fine` float NOT NULL,
  `issued_by` varchar(50) NOT NULL,
  `secret_code` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`id`, `title`, `cover`, `request_date`, `return_date`, `fine`, `issued_by`, `secret_code`) VALUES
(30, 'Harry', '16801759421680175814harrypotter and the philop.jpg', '2023-04-04', '2023-05-04', 0, 'Dustin21', '9c655980'),
(32, 'Harry 2', '16802817311680280677book1.jpg', '2023-04-04', '2023-04-19', 0.25, 'Dustin21', '089ba3af'),
(34, 'Learning PHP', '16808727751680160363learning php book cover.jpg', '2023-04-07', '2023-04-08', 0.05, 'browhat', 'd319d319'),
(35, 'Data Structures and Algorithms Made Easy', '16808730011680162149datastructure bookcover.jpg', '2023-04-07', '2023-04-08', 0.05, 'browhat', '0650ac44'),
(41, 'How the powerful took over identity politics', '1680877594FOsf6aNXMAINKth.png', '2023-04-07', '2023-04-08', 0.05, 'browhat', '81f1f88b'),
(42, 'Harry Potter and The Cursed Child', '1680877200Harry_Potter_and_the_Cursed_Child_Special_Rehearsal_Edition_Book_Cover.jpg', '2023-04-07', '2023-04-08', 0.05, 'browhat', '901b1293'),
(43, 'A Teaspoon of Earth and Sea', '168087695181MKQjxDI0L.jpg', '2023-04-07', '2023-04-08', 0.05, 'browhat', '28e23891'),
(44, 'The 48 Laws of Power', '16808764429781804220238-us.jpg', '2023-04-07', '2023-04-08', 0.05, 'browhat', '8829d098'),
(45, 'Dinner with the Dissident', '1680877500a5dc628e7c1eac184adf34be31b3574c.jpg', '2023-04-08', '2023-04-13', 0.25, 'browhat', '89f1a738'),
(46, 'From filth-ghost to Khmer-witch: Phi Krasue&rsquo;', '1680875817Screenshot 2023-04-07 205456.png', '2023-04-10', '2023-04-30', 1, 'Dustin', 'a9e1cf8e'),
(47, 'The Martian', '16808770443566dc24c327c144d18dffbac7145d28--mark-watney-dust-storm.jpg', '2023-04-18', '2023-04-21', 0.15, 'Dustin', '8685170f'),
(49, 'Learning PHP', '16808727751680160363learning php book cover.jpg', '2023-04-19', '2023-05-09', 1, 'Dustin21', 'e03e27ee');

-- --------------------------------------------------------

--
-- Table structure for table `reading_list`
--

CREATE TABLE `reading_list` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reading_list`
--

INSERT INTO `reading_list` (`id`, `title`, `cover`, `author`, `genre_id`, `book_id`, `user_id`) VALUES
(5, 'Harry', '16801759421680175814harrypotter and the philop.jpg', 'JK. Rowling', 7, 26, 20),
(6, 'The 48 Laws of Power', '16808764429781804220238-us.jpg', 'Robert Greene', 7, 34, 20),
(9, 'Harry Potter and The Cursed Child', '1680877200Harry_Potter_and_the_Cursed_Child_Special_Rehearsal_Edition_Book_Cover.jpg', 'JK. Rowling', 11, 37, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `utype` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_dark` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `avatar`, `utype`, `address`, `phone`, `is_admin`, `is_dark`) VALUES
(18, 'wtfbro?', 'wtfbro?', 'wdaw@w.com', '$2y$10$WwnGipOzknqlDtSfTecCwuxAv8DMmKcIEPgthcMrLhUeyuImBkQ0.', '1680494760Screenshot (51).png', 'Student', 'ffwada', 21321, 0, 0),
(19, 'Dustin21', 'Dustin21', 'webclasshomework1@gmail.com', '$2y$10$vSILCLe0qXzJgP0xmdkKKuCj2BfOaQgyU8Kd0xjT0dLKBV0sgEXwG', '1680512358Screenshot (11).png', 'Student', 'wdada', 2147483647, 0, 0),
(20, 'Dustin2121', 'Dustin', 'dustinadmin@gmail.com', '$2y$10$tFx4cZFUuE8HPH1Fpmux8.M0QcLejx5N6/5bOUautwray83pIyQZS', '1681831528photo_2023-02-04_22-12-44.jpg', '', 'wdawdawda', 85594168, 2, 0),
(23, 'Librarian', 'Librarian', 'Librarian@gmail.com', '$2y$10$OR0EoHlQmvQ/ayNTYcBYvuRefm4pChyhGKcW8nCUf7nOmoahqxK7q', '168112478616808794741680593283Screenshot (28).png', 'Student', 'Library', 90909090, 1, 0),
(24, 'sss', '123123123', 'dsada@ds.comdsad', '$2y$10$4F8Vrzf7x9keDMkgHTTb/uX28MQHwBu7n5tmUaAK/9GTKAN3n/FJm', '16818332431149777.jpg', 'Student', 'wadawawda', 2147483647, 1, 0),
(25, '123', '123', '123@s.v', '$2y$10$C7uxYjRql9q2G5Ha6DvXLOVQ/DCa05W4vprxRn6pgpZW6oCayU0Nq', '1693309655308590362_669057784616805_6948747350216670680_n.jpg', 'Student', '123', 123, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `waiting_books`
--

CREATE TABLE `waiting_books` (
  `id` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `request_by` varchar(50) NOT NULL,
  `request_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fine` float NOT NULL,
  `secret_code` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website_view`
--

CREATE TABLE `website_view` (
  `id` int(11) NOT NULL,
  `view` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_view`
--

INSERT INTO `website_view` (`id`, `view`) VALUES
(1, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reading_list`
--
ALTER TABLE `reading_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waiting_books`
--
ALTER TABLE `waiting_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_view`
--
ALTER TABLE `website_view`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `reading_list`
--
ALTER TABLE `reading_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `waiting_books`
--
ALTER TABLE `waiting_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `website_view`
--
ALTER TABLE `website_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
