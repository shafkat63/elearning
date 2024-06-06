-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 10:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-role-permissions`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `paper_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `subject_id`, `paper_id`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(14, 3, 10, 'Bangla 2nd Chapter 12', 'A', 'A', 'A', 'A', 'A'),
(15, 3, 10, 'Bangla 2nd Chapter', 'A', 'A', 'A', NULL, NULL),
(16, 3, 10, 'Here is a mathematical expression: \\( f(x) = \\int_{a}^{b} \\frac{x^2}{2}\\,  \\)', 'A', 'A', 'A', 'A', 'A'),
(17, 5, 2, 'English 1st Chapter', 'A', 'A', 'A', NULL, NULL),
(18, 7, 29, 'History Of Science', 'A', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(10) NOT NULL,
  `content_name` varchar(150) NOT NULL,
  `content_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `content_name`, `content_details`) VALUES
(6, 'Unfolding Fourth Industrial Revolution—waves of creative destructions', '<h1 class=\"entry-title\">Unfolding Fourth Industrial Revolution&mdash;waves of creative destructions</h1>\r\n<h2 class=\"post-subtitle\">Unleashing creative destruction of reinvention waves</h2>\r\n<p><img src=\"https://www.the-waves.org/wp-content/uploads/2020/07/fourth-indust.png\" alt=\"Unfolding fourth industrial revolution\"></p>\r\n<p class=\"has-drop-cap is-cnvs-dropcap-simple\">Prof. Klaus Martin Schwab has done an excellent job. He has made the &ldquo;fourth industrial revolution&rdquo; phrase quite known. From the media personalities to political leaders, everybody has become quite conversant with this phrase. Subsequently, 4IR has become part of our vocabulary. Thanks to the World Economic Forum to keep arranging events and making publications on it. However, the unfolding&nbsp;<span class=\"tooltipsall tooltipsincontent classtoolTips4\" data-hasqtip=\"1\">Fourth Industrial Revolution</span>&nbsp;causes job loss fear. Mainly, the job loss issue is a growing concern.</p>\r\n<p class=\"cnvs-block-core-paragraph-1594824106776\">Contrary to it, some people believe that, like in the past, there will be an increasing number of jobs. The debate appears to be non-conclusive. Will history repeat itself? For sure, tomorrow will be the next step of today. That does not necessarily mean that it will be an exact reproduction of today. In fact, the unfolding fourth industrial revolution will experience waves of creative destruction. Of course, they will not be powered by the same technology core. Consequently, unfolding implications will be significantly different. Moreover, many of the creative waves will have a disruptive effect on existing jobs, firms, and industries.</p>\r\n<p class=\"cnvs-block-core-paragraph-1594824106781\">Of course, we are aware and concerned about the fourth industrial revolution. Nonetheless, there appears to be a lack of clarity. Consequentially, it has led to incomplete as well as varying understanding. Due to likely high consequences, it may be wise for us to dig down to basics for developing further clarity. Moreover, we should develop a shared common understanding. So that we can collectively work together to maximize benefit while minimizing transformational pains.&nbsp;&nbsp;</p>\r\n<p class=\"cnvs-block-core-paragraph-1594824106781\">&nbsp;</p>\r\n<h2 id=\"the-genesis-of-the-fourth-industrial-revolution\" class=\"cnvs-block-core-heading-1594825708245 wp-block-heading\">The genesis of the fourth industrial revolution&nbsp;</h2>\r\n<p class=\"cnvs-block-core-paragraph-1594824106797\">Often, we attempt to pay tribute to some individuals and countries for the fourth industrial revolution. Indeed, it would be unfair to do so. The 4IR is the outcome of the collective efforts of the human race. Unlike all other creatures, human beings have an inherent urge to generate ideas to recreate existing products and create new ones. In ancient philosophical writings, observation of human beings&rsquo; such natural characteristics reoccurred many times. But why are people after it? Often, this urge of creation is for economic incentives. They would like to get their jobs done better at less cost. To do so, they need better products increasingly at decreasing costs. On the other hand, producers need to make an increasing profit.&nbsp;</p>\r\n<p class=\"cnvs-block-core-paragraph-1594824106803\">Therefore, the role of ideas came into address this conflicting issue. The role of ideas kept progressing for creating improved means of producing economic outputs. In fact, it has been progressing since the very origin of human presence on this planet. Consequentially, it has formed the dynamics of the industrial revolutions.&nbsp;</p>\r\n<h2 id=\"waves-of-creative-destruction\" class=\"cnvs-block-core-heading-1594825730549 wp-block-heading\">Waves of creative destruction</h2>\r\n<p class=\"cnvs-block-core-paragraph-1594824106812\">There have been major flows of ideas for improving the ability to produce higher quality products at decreasing costs. Each of these flows is called&nbsp;<span class=\"tooltipsall tooltipsincontent classtoolTips40\" data-hasqtip=\"3\">Breakthrough</span>&nbsp;or disruptive technology. For example, a stream of ideas has created an internal combustion engine-driven automobile technology. Similarly, the&nbsp;<span class=\"tooltipsall tooltipsincontent classtoolTips38\">Flow of Ideas</span>&nbsp;around the&nbsp;<span class=\"tooltipsall tooltipsincontent classtoolTips42\">Transistor</span>&nbsp;has created information technology. Upon inventing a breakthrough or&nbsp;<a href=\"https://www.the-waves.org/2020/06/29/disruptive-technologies-drive-creative-destruction/\">disruptive technology</a>, human beings keep generating ideas for refining that technology. Consequentially, this refinement leads to incremental innovations. Subsequently, each of these technologies matures. Consequently, progression slows down and comes to and. For overcoming this limitation, human beings invent alternative technology cores.&nbsp;</p>\r\n<p class=\"cnvs-block-core-paragraph-1594824106817\">For example, the transistor is an alternative to the vacuum tube. Similarly, the internal combustion engine-based automobile is an alternative to a horse wagon. The progression of the next-generation technology core keeps fueling the next wave of&nbsp;<span class=\"tooltipsall tooltipsincontent classtoolTips41\">Innovation</span>. Finally, the next wave grows to offer a better alternative at less cost to previous means of getting our job done. For example, the automobile became a better alternative to the horse wagon.</p>\r\n<p>Similarly, the digital camera became a better alternative to film cameras. Invariably, the growth of the next wave leads to the destruction of the demand for the products produced around the previous technology core. Consequentially, firms, jobs, and industries involved in producing and distributing those products suffer damage. Hence,&nbsp;<a href=\"https://www.the-waves.org/2020/07/02/schumpeters-creative-destruction-distills-from-praxis/\">Prof. Schumpeter termed this dynamic as creative destruction</a>.&nbsp;</p>\r\n<p class=\"cnvs-block-core-paragraph-1594824106827\">In fact, the&nbsp;<span class=\"tooltipsall tooltipsincontent classtoolTips36\" data-hasqtip=\"2\">Market Economy</span>&nbsp;offers the&nbsp;<a href=\"https://www.the-waves.org/2020/07/09/innovative-ideas-shape-market-economy/\">freedom to profit from ideas</a>&nbsp;for benefiting from creative destruction. The emergence of one after another wave of creative destruction is at the core of creating industrial revolutions. To make it happen, a set of technologies keeps forming for growing waves of creative destruction.&nbsp; &nbsp; &nbsp;</p>\r\n<h2 id=\"first-industrial-revolution\" class=\"cnvs-block-core-heading-1594825755396 wp-block-heading\">First industrial revolution&nbsp;</h2>\r\n<p class=\"cnvs-block-core-paragraph-1594824106841\">In the 18th century, the steam engine was the primary technology in forming waves of creative destruction. As opposed to wind power, the steam engine started powering ships. Similarly, as a replacement of the water wheel, the steam engine began rotating machinery and operating textile looms. Steam engines started forming waves of creative destruction in all major industries. Subsequently, the steam engine-powered rail network was developed. With the uprising of steam engine-powered technologies, many products and industries started suffering from creative destruction. For example, India&rsquo;s labor-based textile industry suffered from the uprising of England&rsquo;s steam-powered textile industry. The formation of steam engine-powered productive capacity is termed the first industrial revolution. Of course, it caused destructions to jobs, firms, and industries, primarily relying on animal energy, human labor, wind power, and water wheels.&nbsp;But it offered better quality products at less cost to get our jobs done better.</p>\r\n<h2 id=\"second-industrial-revolution\" class=\"cnvs-block-core-heading-1594825769550 wp-block-heading\">Second industrial revolution</h2>\r\n<p class=\"cnvs-block-core-paragraph-1594824106850\">The invention of electricity, internal combustion engines, electric motors, and job division &amp; specialization techniques, among others, started to fuel a series of innovation waves, causing creative destruction. For example, the internal combustion engine destroyed the demand for steam engines. Similarly, job division and specialization destroyed artisan jobs while creating low-skilled labor demand. On the other hand, electric light bulbs destroyed the oil lamp industry. There has been an uprising of endless innovation waves causing destructions to a series of products, firms, and industries. However, like the past one, this second industrial revolution made existing products better as well as cheaper. It also offered new products through this transformation.&nbsp;</p>\r\n<h2 id=\"third-industrial-revolution\" class=\"cnvs-block-core-heading-1594825783255 wp-block-heading\">Third industrial revolution</h2>\r\n<p class=\"cnvs-block-core-paragraph-1594824106873\">&nbsp;The invention of the transistor and wireless communication started to form a new set of technology cores. It all started in the 1930s and 1940s. With the uprising of creative waves of transistor-powered innovations, radio and television diffused in every segment. Sensors, electronics, and software kept powering&nbsp;<a href=\"https://www.the-waves.org/2020/07/30/robots-taking-over-jobs-is-there-a-smarter-perspective-and-response/\">automation and robotics</a>, forming&nbsp;<span class=\"tooltipsall tooltipsincontent classtoolTips1\" data-hasqtip=\"0\">Creative waves of destruction</span> in the manufacturing industry. On the other hand, Sony grew from the ash of the 2nd World War to create the business of digital cameras, TV, and Radios by causing creative destruction to American and European firms. Similarly, the wave of mobile phones has been growing while destroying many products and industries. This 3rd industrial revolution is full of creative waves of destruction.&nbsp;</p>'),
(7, 'MATHS-CUE', '<h1 style=\"text-align: center;\"><strong>MATHS-CUE</strong></h1>\r\n<h4><strong>Haiku is a three lines verse, which has its origin in Japan,Haikus are written with minimum words having no rhythm in it. Hyphen, in Haiku, divides the poem into two parts one being independent of the other. The three lines are the speciality of Haiku, where colon or dash is a must either after the first or after the second line. Generally, the lines are composed as short, long and short. Traditional Japanese poets used the 5, 7 and 5 syllables verse form. And each Haiku must contain a season word to indicate whence the Haiku is set. Haiku tells us what, where and when.</strong></h4>\r\n<details class=\"mce-accordion\">\r\n<summary>Click Here To See More Details</summary>\r\n<p><video controls=\"controls\" width=\"300\" height=\"150\">\r\n<source src=\"https://drive.google.com/file/d/1T7fEhC0sKWp8XACezj0OxrEyj2c3WQej/view?usp=drive_link\"></video></p>\r\n<p>&nbsp;</p>\r\n</details>\r\n<p>&nbsp;</p>\r\n<p><strong>(i) Translation of two traditional Japanese Haikus are given below:</strong></p>\r\n<table style=\"border-collapse: collapse; width: 100%; height: 153.953px; border-style: solid; margin-left: auto; margin-right: auto;\" border=\"0\"><colgroup><col style=\"width: 50%;\"><col style=\"width: 50%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 153.953px;\">\r\n<td>(a) One written by Matsuo Busho;</td>\r\n<td>(b) One written by Joso: a17&trade; Century Japanese poet, who &ldquo;Fields and mountain _ was famous for writing Haiku. the snow has eaten them all &ldquo;Atop the mushroom __ nothing remains.&rdquo; Who knows from where A leaf!&rdquo;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>(ii) A haiku written by a nine year old American boy named Alex Mason: &ldquo;Bat in the caves _ Hanging upside down alone On a winter day.&rdquo;<br><br>The short definitions of Mathematical terms though could not be composed in actual Haiku form, still, the shadow of Haiku could be enjoyed in my writings. In fact, my attempt is to ensure that Mathematics is learnt conceptually with entertainment and definitions or explanations of Mathematical terms should be learnt to conceive and comprehend the lesson we are practising. My belief is that &ldquo;Mathematics without Edutainment is a Big ZERO&rdquo;. As such, I did resort to Haiku, for defining the simple Mathematical terms. I reiterate that the three-line verse which I wrote should in no way be considered as Haiku. I dare not coin a new English word for such verses, still the word Maths-cue may be a justified word to denote or typify such verses.</p>\r\n<p><strong>1. QUANTITY: A quantity&mdash;</strong></p>\r\n<p>i) A basket of fruits is a quantity made up of parts r &lsquo; &deg; As is the whole.&nbsp;</p>\r\n<p>ii) A packet of flour is a quantity.</p>\r\n<p>iii) So is the number of students in a class.</p>\r\n<p>iv) Weight of a person. Here, the weight of the person is a quantity.</p>\r\n<hr>\r\n<p><strong>2. UNIT QUANTITY:</strong></p>\r\n<p>Unit is a quantity _</p>\r\n<p>Which compares the magnitude of other quantities Of the same kind.</p>\r\n<p>i) Paisa is the unit of currency in Bangladesh.</p>\r\n<p>il) Metre is the unit of length in the Metric system.</p>\r\n<p>iii) 1 (One) is the unit of counting anything.</p>\r\n<p><strong>03. MEASURE OF A QUANTITY: </strong></p>\r\n<p>i) 50 Paisa is 50 times its unit quantity, which is 1 paisa.</p>\r\n<p>ii) 210 grams is 210 times its unit quantity, which is one gram.</p>\r\n<p style=\"text-align: center;\">Note: In (i) the quantity is currency and in (ii) the quantity is weight.</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: left;\"><strong>04. NUMBER:</strong></p>\r\n<p style=\"text-align: left;\">One more than one&mdash; \"God created the natural numbers and all the rest is the work of man&rdquo; &mdash; Felix Klein. We begin with \'l\';</p>\r\n<p style=\"text-align: left;\">1 and 1 together is 2;</p>\r\n<p style=\"text-align: left;\">2 and 1 together makes</p>\r\n<p style=\"text-align: left;\">3, and so on are numbers formed.</p>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">Note: Our present number system is due to the Indians, who discovered zero and the nine digits from 1 to 9. The discovery of zero by the Indian is considered as the most remarkable invention in the History of Civilization, without it Mathematics, nay Civilizations, could have progressed no further. The Indian Mathematicians are also credited for the discovery of negative numbers. And the most important discovery by them was Algebra (See # 31) and Introductory Calculus (See # _ ).</p>'),
(13, 'TTTT', '<table style=\"border-collapse: collapse; width: 100%; border-style: none; height: 72.3438px;\" border=\"0\"><colgroup><col style=\"width: 63.5989%;\"><col style=\"width: 36.4011%;\"></colgroup>\r\n<tbody>\r\n<tr style=\"height: 36.1719px;\">\r\n<td>\r\n<p>A very lightweight plug-in based on a slightly modified version of the table editor plug-in included with the full version of TinyMCE. Only includes English localization; please let us know if you would like additional localizations added. The table editing toolbar will hide and display with the &ldquo;kitchen sink&rdquo; (activated with the button that looks like 3 rows of squares on the first toolbar row in the editor).</p>\r\n<p>Note that this should not be used with other plug-ins that significantly alter the editor&rsquo;s default behaviour. It is intended to be a simple, lightweight solution for editors who only want to add table management to WordPress&rsquo; included editor.</p>\r\n</td>\r\n<td><img style=\"float: right;\" src=\"https://user-images.githubusercontent.com/21060460/114027849-72e39a80-9895-11eb-951e-0bac76cc75ac.png\" alt=\"When Click table tool button only insert option show &middot; Issue #6720 &middot; tinymce /tinymce &middot; GitHub\" width=\"473\" height=\"106\"></td>\r\n</tr>\r\n<tr style=\"height: 36.1719px;\">\r\n<td>&nbsp;</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_13_181625_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 6),
(5, 'App\\Models\\User', 9),
(5, 'App\\Models\\User', 10),
(5, 'App\\Models\\User', 11),
(5, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(17, 'Dhali Abir', 'dhali@gmail.com', '014785223', 50, 'NO', 'Processing', '66071aa0e0580', 'BDT'),
(18, 'Dhali Abir', 'dhali@gmail.com', '014785223', 50, 'NO', 'Processing', '66071ce4d879e', 'BDT'),
(19, 'Dhali Abir', 'dhali@gmail.com', '014785223', 80, 'NO', 'Processing', '66071d2dd3caa', 'BDT'),
(20, 'Ashif', 'ashif@gmail.com', '01676735476', 80, 'NO', 'Processing', '66071dcf69d43', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `subject_id`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(2, 5, 'English 1st', 'A', 'A', 'A', 'A', 'A'),
(3, 5, 'English 2st', 'A', 'A', 'A', 'A', 'A'),
(4, 6, 'Math 1st', 'A', 'A', 'A', 'A', 'A'),
(10, 3, 'Bangla 1st', 'A', 'A', 'A', 'A', 'A'),
(29, 7, 'Science 1st', 'A', 'A', 'A', 'A', 'A'),
(30, 3, 'Bangla 2nd Paper', 'A', 'A', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-permission', 'web', '2024-03-14 23:43:20', '2024-03-25 15:46:28'),
(2, 'view-permission', 'web', '2024-03-14 23:44:37', '2024-03-25 15:46:35'),
(7, 'delete-permission', 'web', '2024-03-15 05:10:06', '2024-03-25 15:46:40'),
(11, 'update-permission', 'web', '2024-03-25 15:27:15', '2024-03-25 15:46:46'),
(12, 'create-role', 'web', '2024-03-25 15:29:06', '2024-03-25 15:46:53'),
(13, 'view-role', 'web', '2024-03-25 15:29:16', '2024-03-25 15:47:00'),
(14, 'update-role', 'web', '2024-03-25 15:29:50', '2024-03-25 15:47:06'),
(15, 'delete-role', 'web', '2024-03-25 15:30:00', '2024-03-25 15:47:12'),
(16, 'subject-create', 'web', '2024-03-25 16:11:14', '2024-03-25 16:11:14'),
(17, 'subject-view', 'web', '2024-03-25 16:11:25', '2024-03-25 16:11:25'),
(18, 'subject-update', 'web', '2024-03-25 16:11:35', '2024-03-25 16:11:35'),
(19, 'subject-delete', 'web', '2024-03-25 16:11:42', '2024-03-25 16:11:42'),
(20, 'paper-create', 'web', '2024-03-25 16:12:06', '2024-03-25 16:12:06'),
(21, 'paper-view', 'web', '2024-03-25 16:12:15', '2024-03-25 16:12:15'),
(22, 'paper-update', 'web', '2024-03-25 16:12:26', '2024-03-25 16:12:26'),
(23, 'paper-delete', 'web', '2024-03-25 16:12:33', '2024-03-25 16:12:33'),
(24, 'chapter-create', 'web', '2024-03-25 16:12:49', '2024-03-25 16:12:49'),
(25, 'chapter-view', 'web', '2024-03-25 16:12:56', '2024-03-25 16:12:56'),
(26, 'chapter-update', 'web', '2024-03-25 16:13:05', '2024-03-25 16:13:05'),
(27, 'chapter-delete', 'web', '2024-03-25 16:13:14', '2024-03-25 16:13:14'),
(28, 'question-create', 'web', '2024-03-25 16:13:37', '2024-03-25 16:13:37'),
(29, 'question-view', 'web', '2024-03-25 16:13:44', '2024-03-25 16:13:44'),
(30, 'question-update', 'web', '2024-03-25 16:13:59', '2024-03-25 16:13:59'),
(31, 'question-delete', 'web', '2024-03-25 16:14:08', '2024-03-25 16:14:08'),
(32, 'user-create', 'web', '2024-03-25 16:15:40', '2024-03-25 16:15:40'),
(33, 'user-view', 'web', '2024-03-25 16:15:48', '2024-03-25 16:15:48'),
(34, 'user-update', 'web', '2024-03-25 16:15:56', '2024-03-25 16:15:56'),
(35, 'user-delete', 'web', '2024-03-25 16:16:03', '2024-03-25 16:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL DEFAULT 0,
  `paper_id` int(10) NOT NULL DEFAULT 0,
  `chapter_id` int(10) NOT NULL,
  `question_name` longtext NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject_id`, `paper_id`, `chapter_id`, `question_name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(17, 3, 10, 14, 'Here is a mathematical expression: \\( f(x) = \\int_{a}^{b} \\frac{x^2}{2}\\, dx \\)', 'A', 'A', 'A', NULL, NULL),
(28, 3, 10, 14, 'Find the  mathematical expression: \\( f(x) = \\int_{a}^{b} \\frac{x^2}{2}\\,  \\)', 'A', 'A', 'A', NULL, NULL),
(34, 5, 2, 17, 'Test Question', 'A', 'A', '2024-03-21 22:51:21', 'A', '2024-03-22 11:02:26'),
(35, 5, 2, 17, 'Test Question 2', 'A', 'A', '2024-03-22 08:21:03', 'A', '2024-03-22 11:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `question_option`
--

CREATE TABLE `question_option` (
  `id` int(10) NOT NULL,
  `questions_id` int(10) NOT NULL,
  `options` longtext NOT NULL,
  `optionanser` int(2) NOT NULL DEFAULT 0,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_option`
--

INSERT INTO `question_option` (`id`, `questions_id`, `options`, `optionanser`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(13, 17, 'expression: \\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(14, 17, 'expression: \\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 1, 'A', 'A', 'A', NULL, NULL),
(15, 17, 'expression: \\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(16, 17, 'expression: \\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(21, 28, '\\( f(x) =  \\frac{x^2}{2}\\,  \\)', 1, 'A', 'A', 'A', NULL, NULL),
(22, 28, '\\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(23, 28, '\\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(24, 28, '\\( f(x) =  \\frac{x^2}{2}\\, dx \\)', 0, 'A', 'A', 'A', NULL, NULL),
(45, 34, 'Option 1', 0, 'A', 'A', '2024-03-21 22:51:21', 'A', '2024-03-22 11:02:26'),
(46, 34, 'Option 2', 0, 'A', 'A', '2024-03-21 22:51:21', 'A', '2024-03-22 11:02:26'),
(47, 34, 'Option 3', 1, 'A', 'A', '2024-03-21 22:51:21', 'A', '2024-03-22 11:02:26'),
(48, 34, 'Option 4', 0, 'A', 'A', '2024-03-21 22:51:21', 'A', '2024-03-22 11:02:26'),
(49, 35, 'A1', 0, 'A', 'A', '2024-03-22 08:21:03', 'A', '2024-03-22 11:02:53'),
(50, 35, 'A2', 1, 'A', 'A', '2024-03-22 08:21:03', 'A', '2024-03-22 11:02:53'),
(51, 35, 'A3', 0, 'A', 'A', '2024-03-22 08:21:03', 'A', '2024-03-22 11:02:53'),
(52, 35, 'A4', 0, 'A', 'A', '2024-03-22 08:21:03', 'A', '2024-03-22 11:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-03-15 02:24:22', '2024-03-25 15:30:23'),
(2, 'Admin', 'web', '2024-03-15 02:24:30', '2024-03-25 15:30:29'),
(3, 'Editor', 'web', '2024-03-15 02:24:36', '2024-03-25 13:52:35'),
(5, 'Student Free', 'web', '2024-03-15 16:55:10', '2024-03-25 13:53:01'),
(7, 'Student Silver', 'web', '2024-03-25 13:53:37', '2024-03-25 13:53:37'),
(8, 'Student  Platinum', 'web', '2024-03-25 13:53:46', '2024-03-25 13:53:46'),
(9, 'Student Gold', 'web', '2024-03-25 13:53:55', '2024-03-25 13:53:55'),
(11, 'Test', 'web', '2024-03-25 15:45:00', '2024-03-25 15:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(7, 1),
(7, 2),
(11, 1),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(17, 3),
(18, 1),
(18, 2),
(19, 1),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL,
  `name` varchar(80) NOT NULL,
  `status` varchar(10) NOT NULL,
  `create_by` varchar(10) NOT NULL,
  `create_date` varchar(20) NOT NULL,
  `update_by` varchar(10) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(3, 'Bangla', 'A', 'A', 'A', 'A', 'A'),
(5, 'Engilish', 'A', 'A', 'A', 'A', 'A'),
(6, 'Math', 'A', 'A', 'A', 'A', 'A'),
(7, 'Science', 'A', 'A', 'A', 'A', 'A'),
(23, 'adadad', 'A', 'A', 'A', NULL, NULL),
(24, 'adadad', 'A', 'A', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super User', 'root@gmail.com', '01315007287', NULL, '$2y$10$FJvqtKNhkaONv/aVH6K7W.L1.OyWk.XSX3HRWpvIEnC7QakzDRa3a', NULL, '2024-03-23 13:16:02', '2024-03-26 04:58:56'),
(4, 'Editor', 'editor@gmail.com', '0147852339', NULL, '$2y$10$GcPECm/wRYTWGevXnjhWMOEEn4yg.zo0cRcBzeK4YIBw8M0R6DP0i', NULL, '2024-03-25 15:36:28', '2024-03-25 16:34:37'),
(5, 'Admin User', 'admin@gmail.com', '0147852369', NULL, '$2y$10$SAwqJEMji.MSF6CN6tD/KuhQntltfArSiB2xVJAfMb8sr3NN61eBW', NULL, '2024-03-26 04:59:28', '2024-03-26 04:59:28'),
(6, 'Dhali Abir', 'dhali@gmail.com', '014785223', NULL, '$2y$10$1Kkl9mwbkzNfDukRfxJ4yuUnltrZfRrMxc5OQ3fZ8D4a6prJD45.W', NULL, '2024-03-26 05:17:12', '2024-03-26 05:17:12'),
(9, 'Abir Dhali', 'abir@gmail.com', '01315107287', NULL, '$2y$10$c8cpZruqXv7xq2d3Udv3wuNeUJ4rY6fEes8Wn/pczXiOBlawIFJSK', NULL, '2024-03-28 23:06:38', '2024-03-28 23:06:38'),
(10, 'Abir Dhali', 'abirdhali@gmail.com', '01500728745', NULL, '$2y$10$kN6/DWWzGPNvSECZ7sPYJ.TamUHIbGQSdeDsKIwETp7OYweC6aPuC', NULL, '2024-03-29 12:46:07', '2024-03-29 12:46:07'),
(11, 'Test Student 01', 'student1@gmail.com', '01478523', NULL, '$2y$10$77mm6TZB5EbPTDzEofZileMLyAXhvycklbJc2MVVsJ8s7AQyj2MWa', NULL, '2024-03-29 13:17:20', '2024-03-29 13:17:20'),
(12, 'Ashif', 'ashif@gmail.com', '01676735476', NULL, '$2y$10$evi5l55Qr4l3.8DENVWPjObUqGPREpaKFCVNi7lN6sVtemnQFgA7O', NULL, '2024-03-29 13:59:55', '2024-03-29 13:59:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_option`
--
ALTER TABLE `question_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `question_option`
--
ALTER TABLE `question_option`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
