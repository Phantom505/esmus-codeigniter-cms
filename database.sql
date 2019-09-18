DROP TABLE IF EXISTS `esmus_settings`;
CREATE TABLE IF NOT EXISTS `esmus_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` text NOT NULL,
  `lang` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


INSERT INTO `esmus_settings` (`id`, `section`, `lang`, `content`) VALUES
(1, 'about', 'az', '&lt;p&gt;Haqqımızda lorem ipsum dolor&lt;/p&gt;\r\n'),
(2, 'about', 'en', '&lt;p&gt;About lorem ipsum dolor&lt;/p&gt;\r\n'),
(3, 'about', 'ru', '&lt;p&gt;О нас lorem ipsum dolor&lt;/p&gt;\r\n'),
(4, 'contacts', 'az', '&lt;p&gt;E-mail: esmus@simbyte.az&lt;/p&gt;\r\n'),
(5, 'contacts', 'en', '&lt;p&gt;E-mail: esmus@simbyte.az&lt;/p&gt;\r\n'),
(6, 'contacts', 'ru', '&lt;p&gt;E-mail: esmus@simbyte.az&lt;/p&gt;\r\n');