# Host: localhost  (Version 5.7.19)
# Date: 2019-06-18 00:19:17
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "internship"
#

DROP TABLE IF EXISTS `internship`;
CREATE TABLE `internship` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `company` varchar(500) DEFAULT NULL,
  `detail` varchar(5000) DEFAULT NULL,
  `contact` varchar(500) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `boss` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

#
# Data for table "internship"
#

INSERT INTO `internship` VALUES (1,'百度数据分析师','百度','本科','182','2019-06-17','2019-06-17',''),(3,'凤凰网实习生','凤凰网','时间充足','188','2019-06-17','2019-06-17',NULL),(4,'阿里实习生','阿里巴巴','ACM优秀奖','000','2019-06-17','2019-06-17',NULL),(5,'数据产品实习生','勾正数据','熟练使用xmind、mysql、Excel','151','2019-06-17','2019-06-17',NULL),(6,'腾讯实习生','腾讯','暑期实习','000','2019-06-17','2019-06-17',NULL),(7,'数据分析实习生','360','大三','000','2019-06-17','2019-06-17',NULL),(8,'百度数据分析师','百度','超级黑客','123','2019-06-17','2019-06-17',NULL),(13,'百度数据分析师','百度','本科','123','2019-06-17','2019-06-17',NULL),(14,'121','12','123',NULL,'2019-06-17','2019-06-17',NULL),(15,'数据分析师','凤凰网','时间充足','000','2019-06-17','2019-06-17','hhh'),(16,'tx实习生','tx','ACM优秀奖','188','2019-06-17','2019-06-17','hhh'),(17,'百度数据分析师','tx','时间充足','182','2019-06-17','2019-06-17','HH'),(18,'凤凰网实习生','tx','熟练使用xmind、mysql、Excel','182','2019-06-17','2019-06-17','1'),(19,'tx实习生','阿里巴巴','研究生','186','2019-06-17','2019-06-17','1'),(20,'UI设计实习生','码卡','热爱前端UI设计','144','0000-00-00','0000-00-00','51');
