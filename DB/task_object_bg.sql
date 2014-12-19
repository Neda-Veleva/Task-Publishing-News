-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task_object_bg`
--

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Политика', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Технологии', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Любопитно', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура на таблица `category_news`
--

CREATE TABLE IF NOT EXISTS `category_news` (
`id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `news_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Схема на данните от таблица `category_news`
--

INSERT INTO `category_news` (`id`, `category_id`, `news_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура на таблица `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_18_125805_create_news_table', 1),
('2014_12_18_130544_create_categories_table', 1),
('2014_12_18_130734_create_users_table', 1),
('2014_12_18_130836_create_category_news_table', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Схема на данните от таблица `news`
--

INSERT INTO `news` (`id`, `user_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 'First News', 'First news is lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at libero ante. Praesent elementum interdum tortor, in porta ex placerat eget. Fusce sed arcu ultrices, ornare ipsum a, commodo ex. Pellentesque tempus varius cursus. Nulla eget arcu leo. Phasellus nec nisl eu mi congue aliquam varius id turpis. Proin nec ipsum sit amet urna consectetur euismod ac in nibh. Donec vestibulum justo eget libero mollis, et porta ligula vestibulum. Fusce lobortis mauris at augue consectetur, sed convallis magna viverra. Fusce consequat porttitor congue. Nullam risus justo, aliquam ac commodo a, pharetra sed turpis. Maecenas sit amet nibh vitae nisi auctor varius. Phasellus malesuada leo nec volutpat pharetra. Aenean enim leo, lobortis id semper in, pellentesque ut leo.\r\n\r\nPhasellus maximus rhoncus metus et pharetra. Phasellus eu venenatis dui. Suspendisse eu lorem in urna gravida consectetur sed bibendum nisi. Duis rutrum quam a felis sodales scelerisque. Sed placerat suscipit volutpat. Integer laoreet magna elit. Proin sed nunc metus. Aenean ultrices vitae orci malesuada semper. Aenean egestas sagittis orci, sit amet gravida dolor dapibus vel. Ut vestibulum diam in justo dictum eleifend. In pulvinar eros lorem, id commodo odio placerat in. Fusce id risus eu justo efficitur efficitur sed vitae neque. Aliquam fermentum mauris et nunc fermentum condimentum quis sit amet magna.\r\n\r\nQuisque semper velit vel diam pellentesque posuere. Suspendisse lobortis risus in velit consequat, in pulvinar dui pretium. Sed consectetur turpis libero, ac malesuada metus imperdiet nec. Duis eu accumsan orci. Donec blandit nisi et quam fermentum euismod. Nulla euismod gravida mauris vel ultricies. Cras augue mauris, pretium a fermentum eget, condimentum id arcu. Mauris posuere, enim vitae pharetra ultricies, purus diam dapibus nulla, ac ullamcorper diam orci at metus. Mauris neque sapien, porttitor eget placerat id, bibendum sit amet nisi. Aliquam eleifend ligula ac accumsan semper. Pellentesque at ligula non diam egestas pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin consequat orci nulla, a mollis nisl sagittis eget.\r\n\r\nProin aliquam urna sed mi varius, ut condimentum orci aliquam. Mauris pulvinar velit at nisi bibendum, sit amet suscipit metus pellentesque. Sed nec mauris sed felis vulputate imperdiet vel ac risus. Aliquam ligula lorem, sodales ut dolor vitae, bibendum lacinia arcu. Cras porta est sed ligula venenatis, et maximus massa interdum. Aenean malesuada porta lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer porta commodo ultrices. Sed nec orci suscipit nulla blandit pretium. Praesent cursus velit augue, ut luctus est sodales et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent consectetur pellentesque quam et auctor. Integer magna lectus, placerat ornare semper a, placerat volutpat mauris.\r\n\r\nQuisque sem turpis, tempus ac sodales et, egestas in augue. Integer quis molestie purus. Vivamus a magna mattis, vestibulum nibh eget, porttitor nisi. Sed tristique, nisl et imperdiet fermentum, tortor nisi ultricies orci, id accumsan elit arcu id augue. Pellentesque turpis elit, aliquam eget ligula sed, consectetur dictum neque. Cras quis libero sit amet nisl sagittis volutpat. Morbi ac lectus pretium, finibus purus ac, dapibus arcu. Etiam nec tristique eros, at commodo leo. In accumsan lorem velit, et aliquet odio luctus sit amet. Mauris eu lorem vel ligula fringilla hendrerit. Vivamus consequat lacus pellentesque sapien tincidunt porttitor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec pharetra pharetra est. Cras gravida elit metus, non consequat ex viverra a. Fusce finibus tellus libero, quis scelerisque nibh suscipit a. Nam ac mi quis nisi tristique sodales.', '2014-12-19 08:40:08', '2014-12-19 08:40:08'),
(2, 1, 'Second News', 'Second news is lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at libero ante. Praesent elementum interdum tortor, in porta ex placerat eget. Fusce sed arcu ultrices, ornare ipsum a, commodo ex. Pellentesque tempus varius cursus. Nulla eget arcu leo. Phasellus nec nisl eu mi congue aliquam varius id turpis. Proin nec ipsum sit amet urna consectetur euismod ac in nibh. Donec vestibulum justo eget libero mollis, et porta ligula vestibulum. Fusce lobortis mauris at augue consectetur, sed convallis magna viverra. Fusce consequat porttitor congue. Nullam risus justo, aliquam ac commodo a, pharetra sed turpis. Maecenas sit amet nibh vitae nisi auctor varius. Phasellus malesuada leo nec volutpat pharetra. Aenean enim leo, lobortis id semper in, pellentesque ut leo.\r\n\r\nPhasellus maximus rhoncus metus et pharetra. Phasellus eu venenatis dui. Suspendisse eu lorem in urna gravida consectetur sed bibendum nisi. Duis rutrum quam a felis sodales scelerisque. Sed placerat suscipit volutpat. Integer laoreet magna elit. Proin sed nunc metus. Aenean ultrices vitae orci malesuada semper. Aenean egestas sagittis orci, sit amet gravida dolor dapibus vel. Ut vestibulum diam in justo dictum eleifend. In pulvinar eros lorem, id commodo odio placerat in. Fusce id risus eu justo efficitur efficitur sed vitae neque. Aliquam fermentum mauris et nunc fermentum condimentum quis sit amet magna.\r\n\r\nQuisque semper velit vel diam pellentesque posuere. Suspendisse lobortis risus in velit consequat, in pulvinar dui pretium. Sed consectetur turpis libero, ac malesuada metus imperdiet nec. Duis eu accumsan orci. Donec blandit nisi et quam fermentum euismod. Nulla euismod gravida mauris vel ultricies. Cras augue mauris, pretium a fermentum eget, condimentum id arcu. Mauris posuere, enim vitae pharetra ultricies, purus diam dapibus nulla, ac ullamcorper diam orci at metus. Mauris neque sapien, porttitor eget placerat id, bibendum sit amet nisi. Aliquam eleifend ligula ac accumsan semper. Pellentesque at ligula non diam egestas pulvinar. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin consequat orci nulla, a mollis nisl sagittis eget.\r\n\r\nProin aliquam urna sed mi varius, ut condimentum orci aliquam. Mauris pulvinar velit at nisi bibendum, sit amet suscipit metus pellentesque. Sed nec mauris sed felis vulputate imperdiet vel ac risus. Aliquam ligula lorem, sodales ut dolor vitae, bibendum lacinia arcu. Cras porta est sed ligula venenatis, et maximus massa interdum. Aenean malesuada porta lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer porta commodo ultrices. Sed nec orci suscipit nulla blandit pretium. Praesent cursus velit augue, ut luctus est sodales et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent consectetur pellentesque quam et auctor. Integer magna lectus, placerat ornare semper a, placerat volutpat mauris.\r\n\r\nQuisque sem turpis, tempus ac sodales et, egestas in augue. Integer quis molestie purus. Vivamus a magna mattis, vestibulum nibh eget, porttitor nisi. Sed tristique, nisl et imperdiet fermentum, tortor nisi ultricies orci, id accumsan elit arcu id augue. Pellentesque turpis elit, aliquam eget ligula sed, consectetur dictum neque. Cras quis libero sit amet nisl sagittis volutpat. Morbi ac lectus pretium, finibus purus ac, dapibus arcu. Etiam nec tristique eros, at commodo leo. In accumsan lorem velit, et aliquet odio luctus sit amet. Mauris eu lorem vel ligula fringilla hendrerit. Vivamus consequat lacus pellentesque sapien tincidunt porttitor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec pharetra pharetra est. Cras gravida elit metus, non consequat ex viverra a. Fusce finibus tellus libero, quis scelerisque nibh suscipit a. Nam ac mi quis nisi tristique sodales.', '2014-12-19 08:41:05', '2014-12-19 08:41:05');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$OUo/bAha596EAKQTYy.nPOsBbQgPC6j.CKOK5A9FU2bQzajLUNnQC', '', '2014-12-19 08:27:54', '2014-12-19 08:27:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
 ADD PRIMARY KEY (`id`), ADD KEY `category_news_category_id_index` (`category_id`), ADD KEY `category_news_news_id_index` (`news_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `category_news`
--
ALTER TABLE `category_news`
ADD CONSTRAINT `category_news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `category_news_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
