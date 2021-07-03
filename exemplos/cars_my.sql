CREATE TABLE `colors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `value` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `colors` (`id`, `color`, `date`, `value`) VALUES
(1,	'preto',	'2020-05-25',	10000),
(2,	'preto',	'2020-05-28',	15000),
(3,	'preto',	'2020-06-15',	16000),
(4,	'branco',	'2020-06-15',	10000),
(5,	'branco',	'2020-06-15',	15000),
(6,	'branco',	'2020-07-16',	55000),
(7,	'vermelho',	'2020-07-18',	52000),
(8,	'vermelho',	'2020-07-18',	10000),
(9,	'vermelho',	'2020-07-21',	40000);

