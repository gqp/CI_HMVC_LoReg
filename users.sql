CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `role`, `key`, `active`) VALUES
(1, 'admin', '0c7540eb7e65b553ec1ba6b20de79608', 'Admin2', 'Account', 'email@email.com', 100, '', 1);
