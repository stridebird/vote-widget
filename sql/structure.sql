# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.50-community
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2013-05-22 11:25:32
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping structure for table votewidget.consty
DROP TABLE IF EXISTS `consty`;
CREATE TABLE IF NOT EXISTS `consty` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

# Dumping data for table votewidget.consty: ~2 rows (approximately)
/*!40000 ALTER TABLE `consty` DISABLE KEYS */;
INSERT INTO `consty` (`id`, `name`, `date_created`, `date_modified`) VALUES
	(1, 'battersea', '2013-05-22 11:01:59', '2013-05-22 11:02:02'),
	(2, 'lambeth', '2013-05-22 11:02:15', '2013-05-22 11:02:15');
/*!40000 ALTER TABLE `consty` ENABLE KEYS */;


# Dumping structure for table votewidget.party
DROP TABLE IF EXISTS `party`;
CREATE TABLE IF NOT EXISTS `party` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

# Dumping data for table votewidget.party: ~2 rows (approximately)
/*!40000 ALTER TABLE `party` DISABLE KEYS */;
INSERT INTO `party` (`id`, `name`, `date_created`, `date_modified`) VALUES
	(1, 'labour', '2013-05-22 11:01:17', '2013-05-22 11:01:18'),
	(2, 'conservative', '2013-05-22 11:01:36', '2013-05-22 11:01:36');
/*!40000 ALTER TABLE `party` ENABLE KEYS */;


# Dumping structure for table votewidget.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `ip` varchar(15) NOT NULL,
  `ua` varchar(255) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `date_voted` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

# Dumping data for table votewidget.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `ip`, `ua`, `hash`, `date_voted`, `date_created`, `date_modified`) VALUES
	(1, NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.0; WOW64) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.152 Safari/537.22', '95221c32d5957c566b794dd190aa63ce', NULL, '2013-05-22 11:24:45', '2013-05-22 11:24:45');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


# Dumping structure for table votewidget.vote
DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `consty_id` int(10) NOT NULL,
  `party_id` int(10) NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_votes_users` (`user_id`),
  KEY `FK_votes_constituencies` (`consty_id`),
  KEY `FK_vote_party` (`party_id`),
  CONSTRAINT `FK_vote_party` FOREIGN KEY (`party_id`) REFERENCES `party` (`id`),
  CONSTRAINT `FK_votes_constituencies` FOREIGN KEY (`consty_id`) REFERENCES `consty` (`id`),
  CONSTRAINT `FK_votes_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

# Dumping data for table votewidget.vote: ~0 rows (approximately)
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` (`id`, `user_id`, `consty_id`, `party_id`, `date_modified`) VALUES
	(1, 1, 1, 1, '2013-05-22 11:24:59');
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
