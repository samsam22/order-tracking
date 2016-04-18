--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8 NOT NULL,
  `order_id` varchar(10) CHARACTER SET utf8 NOT NULL,
  `zip_code` varchar(5) CHARACTER SET utf8 NOT NULL,
  `tracking_number` varchar(22) CHARACTER SET utf8 NOT NULL,
  `last_checked` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `order_id`, `zip_code`, `tracking_number`, `last_checked`) VALUES
(1, 'bob123', '38320434', '10001', '9405345394947569938474', '2016-04-18 06:45:32'),
(2, 'sally343', '77734172', '27703', '9405345394947569763908', '2016-04-18 06:45:32'),
(3, 'john996', '10353451', '69001', '9405345394947569390476', '2016-04-18 06:45:32');