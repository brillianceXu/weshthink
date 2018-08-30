# Host: localhost  (Version: 5.5.53)
# Date: 2018-08-30 08:07:22
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "ruochen_admin"
#

DROP TABLE IF EXISTS `ruochen_admin`;
CREATE TABLE `ruochen_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleid` int(11) DEFAULT '0' COMMENT '1超级管理员，2普通管理员',
  `username` varchar(255) DEFAULT '''''' COMMENT '用户名',
  `password` varchar(255) DEFAULT '' COMMENT '密码',
  `realname` varchar(255) DEFAULT NULL COMMENT '真名',
  `sex` int(11) DEFAULT NULL COMMENT '性别，1男，0女',
  `mobile` varchar(255) DEFAULT NULL COMMENT '手机',
  `email` varchar(255) DEFAULT '' COMMENT '邮箱',
  `note` varchar(255) DEFAULT NULL COMMENT '备注',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `status` int(11) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='管理员';

#
# Data for table "ruochen_admin"
#

INSERT INTO `ruochen_admin` VALUES (2,0,'admin','2138cb5b0302e84382dd9b3677576b24',NULL,NULL,NULL,'',NULL,NULL,2),(7,1,'qbjxw','79188bdd99b3d4e54c8060504bfbc83b',NULL,NULL,NULL,'','',1531367734,1);

#
# Structure for table "ruochen_class"
#

DROP TABLE IF EXISTS `ruochen_class`;
CREATE TABLE `ruochen_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '' COMMENT '班级名称',
  `professionid` int(10) DEFAULT '0' COMMENT '专业',
  `picture` varchar(255) DEFAULT NULL COMMENT '图片',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `status` int(11) DEFAULT '1' COMMENT '状态,0废弃，1可用',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `summary` text COMMENT '简介',
  `content` text COMMENT '详情',
  `builder` int(10) DEFAULT NULL COMMENT '创建人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='分类表';

#
# Data for table "ruochen_class"
#


#
# Structure for table "ruochen_course"
#

DROP TABLE IF EXISTS `ruochen_course`;
CREATE TABLE `ruochen_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '' COMMENT '课程名称',
  `professionid` int(11) DEFAULT '0' COMMENT '专业',
  `picture` varchar(255) DEFAULT NULL COMMENT '图片',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `status` int(11) DEFAULT '1' COMMENT '状态,0废弃，1可用',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `summary` text COMMENT '简介',
  `content` text COMMENT '详情',
  `builder` int(10) DEFAULT NULL COMMENT '创建人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='分类表';

#
# Data for table "ruochen_course"
#


#
# Structure for table "ruochen_image"
#

DROP TABLE IF EXISTS `ruochen_image`;
CREATE TABLE `ruochen_image` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT '0' COMMENT '关联id，status为1时，为分类id，status为2时为产品id',
  `name` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `route` varchar(255) DEFAULT NULL COMMENT '图片保存路径',
  `link` varchar(255) DEFAULT NULL COMMENT '图片链接',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `status` int(11) DEFAULT '1' COMMENT '状态，1广告图，2产品图，0已删除',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='图片表';

#
# Data for table "ruochen_image"
#

INSERT INTO `ruochen_image` VALUES (1,7,'首页轮播大图一','/Files/2018-07-19/5b503b1eabc53.png','',1531984670,1),(2,7,'首页轮播大图二','/Files/2018-07-17/5b4de259313ad.png','',1531830873,1),(3,7,'首页轮播大图三','/Files/2018-07-17/5b4de26240d40.png','',1531830882,1),(4,7,'首页轮播大图四','/Files/2018-07-19/5b502ca8e6afe.png','',1531980968,1),(5,7,'首页轮播大图五','/Files/2018-07-19/5b503b2773965.png','',1531984679,1),(6,11,'企业概况banner','/Files/2018-07-17/5b4de30329f68.png','',1531831043,1),(7,12,'产品中心banner','/Files/2018-07-17/5b4de311478f8.png','',1531831057,1),(8,13,'新闻资讯banner','/Files/2018-07-19/5b50323366d77.jpg','',1531982387,1),(9,15,'服务中心banner','/Files/2018-07-17/5b4de4208ac48.png','',1531831328,1),(10,16,'合作者关系banner','/Files/2018-07-19/5b503c4053646.png','',1531984960,1),(11,8,'狗年吉祥','/Files/2018-06-07/5b18bbdc7c522.jpg','',1532141526,1),(12,8,'happy new year','/Files/2018-06-07/5b18bbe618701.jpg','',1532141544,1),(13,8,'拜年啦','/Files/2018-06-07/5b18bbf2d07ac.gif','',1532141556,1),(14,8,'悬浮广告','/Files/2018-03-16/5aab30a46f563.jpg','http://www.zunyisp.com.cn/Home/News/detail/id/333.html',1521168548,0),(15,9,'办公环境','/Files/2018-07-03/5b3b86dc9ef3c.jpg','',1532141496,1),(18,10,'首页服务中心上图片','/Files/2018-07-03/5b3b874848646.jpg','',1531148280,1),(19,46,'新闻资讯广告图一','/Files/2018-07-17/5b4de37399432.png','',1531831540,1),(20,46,'新闻资讯广告图二','/Files/2018-07-19/5b50328e31cd1.png','',1531982478,1),(21,0,'2131323','/Files/2018-07-09/5b437222c1f0a.png',NULL,1531146786,2),(22,0,'12313','/Files/2018-07-09/5b437253ca907.jpg',NULL,1531146835,2),(30,3,'台酿盛宴十年经典','/Files/2018-07-20/5b519a048127c.jpg',NULL,1532074500,2),(31,3,'台酿盛宴十年经典','/Files/2018-07-20/5b519a398caf6.jpg',NULL,1532074553,2),(33,1,'台酿盛宴乐享财富','/Files/2018-07-20/5b519b0b2fee5.jpg',NULL,1532074763,2),(34,0,'12313','/Files/2018-07-20/5b519c063e768.jpg',NULL,1532075014,2),(35,2,'台酿盛宴贵州手礼','/Files/2018-07-20/5b519c823f446.jpg',NULL,1532075138,2);

#
# Structure for table "ruochen_log"
#

DROP TABLE IF EXISTS `ruochen_log`;
CREATE TABLE `ruochen_log` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT '0' COMMENT '管理员',
  `uip` varchar(255) DEFAULT NULL COMMENT '用户IP地址',
  `action` varchar(255) DEFAULT NULL COMMENT '操作行为',
  `status` int(11) DEFAULT '1' COMMENT '操作状态',
  `note` varchar(255) DEFAULT NULL COMMENT '备注',
  `dotime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=366 DEFAULT CHARSET=utf8 COMMENT='操作日志';

#
# Data for table "ruochen_log"
#


#
# Structure for table "ruochen_menu"
#

DROP TABLE IF EXISTS `ruochen_menu`;
CREATE TABLE `ruochen_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '‘’' COMMENT '菜单名称',
  `pid` int(11) DEFAULT '0' COMMENT '父级菜单，没有为0',
  `controller` varchar(255) DEFAULT '‘’' COMMENT '控制器',
  `action` varchar(255) DEFAULT '‘’' COMMENT '方法',
  `icon` varchar(255) DEFAULT '&#xe616;' COMMENT '图标代码',
  `level` int(11) DEFAULT '1' COMMENT '级别',
  `adtime` int(11) DEFAULT '0' COMMENT '添加时间',
  `status` int(11) DEFAULT '0' COMMENT '状态，1正常，0禁用',
  `builder` int(11) DEFAULT '0' COMMENT '创建人',
  `sort` int(10) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='菜单';

#
# Data for table "ruochen_menu"
#

INSERT INTO `ruochen_menu` VALUES (1,'专业管理',0,'Profession','index','&#xe616;',1,0,1,0,0),(2,'课程管理',0,'Course','index','&#xe616;',1,0,1,0,0),(3,'班级管理',0,'Grade','index','&#xe616;',1,0,1,0,0),(4,'学生管理',0,'Student','index','&#xe616;',1,0,1,0,0),(5,'成绩管理',0,'Score','index','&#xe616;',1,0,1,0,0),(7,'用户管理',0,'Manager','index','&#xe616;',1,0,1,0,0),(8,'系统管理',0,'System','index','&#xe616;',1,0,1,0,0);

#
# Structure for table "ruochen_profession"
#

DROP TABLE IF EXISTS `ruochen_profession`;
CREATE TABLE `ruochen_profession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '' COMMENT '专业名称',
  `picture` varchar(255) DEFAULT NULL COMMENT '专业图片',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `status` int(11) DEFAULT '1' COMMENT '状态,0废弃，1可用',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `summary` text COMMENT '简介',
  `content` text COMMENT '详情',
  `builder` int(10) DEFAULT NULL COMMENT '创建人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='分类表';

#
# Data for table "ruochen_profession"
#


#
# Structure for table "ruochen_score"
#

DROP TABLE IF EXISTS `ruochen_score`;
CREATE TABLE `ruochen_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` int(11) DEFAULT '0' COMMENT '课程',
  `studentid` int(10) DEFAULT '1' COMMENT '学生',
  `score` int(10) DEFAULT '0' COMMENT '分数',
  `level` int(10) DEFAULT NULL COMMENT '等级，1优，2良，3中，4差',
  `addtime` int(10) DEFAULT '0' COMMENT '添加时间',
  `status` int(11) DEFAULT '1' COMMENT '状态,0废弃，1正常',
  `sort` int(11) DEFAULT '9999' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类表';

#
# Data for table "ruochen_score"
#


#
# Structure for table "ruochen_student"
#

DROP TABLE IF EXISTS `ruochen_student`;
CREATE TABLE `ruochen_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT '‘’' COMMENT '姓名',
  `mobile` int(10) DEFAULT NULL COMMENT '手机号',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `classid` int(11) DEFAULT '0' COMMENT '班级',
  `summary` text COMMENT '简介',
  `picture` varchar(255) DEFAULT NULL COMMENT '图片',
  `content` text COMMENT '详情',
  `sex` int(11) DEFAULT NULL COMMENT '性别',
  `age` int(11) DEFAULT NULL COMMENT '年龄',
  `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
  `education` varchar(255) DEFAULT NULL COMMENT '学历',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1上架，0下架',
  `sort` int(11) NOT NULL DEFAULT '9999' COMMENT '排序，越小越靠前',
  `school` varchar(255) DEFAULT NULL COMMENT '毕业学校',
  `profess` varchar(255) DEFAULT NULL COMMENT '专业',
  `job` varchar(255) DEFAULT NULL COMMENT '职业',
  `company` varchar(255) DEFAULT NULL COMMENT '工作单位',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `nativeplace` varchar(255) DEFAULT NULL COMMENT '籍贯',
  `builder` int(11) DEFAULT NULL COMMENT '创建人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "ruochen_student"
#


#
# Structure for table "ruochen_system"
#

DROP TABLE IF EXISTS `ruochen_system`;
CREATE TABLE `ruochen_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) DEFAULT NULL COMMENT '公司名称',
  `address` varchar(255) DEFAULT NULL COMMENT '公司地址',
  `logo` varchar(255) DEFAULT NULL COMMENT '公司logo',
  `xy` varchar(255) DEFAULT NULL COMMENT '坐标',
  `tel` varchar(15) DEFAULT NULL COMMENT '公司电话',
  `website` varchar(255) DEFAULT NULL COMMENT '公司网址',
  `webname` varchar(255) DEFAULT NULL COMMENT '网站名称',
  `title` varchar(255) DEFAULT NULL COMMENT '网站标题',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `description` text COMMENT '网站描述',
  `ico` varchar(255) DEFAULT NULL COMMENT '网站ico',
  `copyright` varchar(255) DEFAULT NULL COMMENT '版权信息',
  `icp` varchar(255) DEFAULT NULL COMMENT '备案信息',
  `phone` varchar(255) DEFAULT NULL COMMENT '客服电话',
  `qq` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `weipic` varchar(255) DEFAULT NULL COMMENT '公众号二维码',
  `docount` text COMMENT '统计代码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统信息表，不可删除，';

#
# Data for table "ruochen_system"
#

INSERT INTO `ruochen_system` VALUES (1,'深圳大学心理在职研究生网站','遵义新蒲新区大学城平安街B2区1号楼1层','/Files/2018-07-17/5b4de2c421c93.jpg','','0851-28791834','http://www.zunyisp.com.cn','成绩查询系统','成绩查询系统','成绩查询系统','成绩查询系统','/Files/2018-07-17/5b4de452c9d43.jpg','Copyright ? 2018 若尘. All rights reserved.','黔ICP备12001935号-2','0851-28791834','88888888888','zsp201507@163.com','/Files/2017-03-07/58be28c13be98.jpg',' <script type=\"text/javascript\">\r\n \r\n    </script>');
