/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50722
 Source Host           : 127.0.0.1
 Source Database       : mycms

 Target Server Type    : MySQL
 Target Server Version : 50722
 File Encoding         : utf-8

 Date: 08/16/2018 22:12:23 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `tt_admins`
-- ----------------------------
DROP TABLE IF EXISTS `tt_admins`;
CREATE TABLE `tt_admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `error` tinyint(255) NOT NULL DEFAULT '0',
  `login_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `tt_admins`
-- ----------------------------
BEGIN;
INSERT INTO `tt_admins` VALUES ('1', 'admin', '$2y$10$BwwQKu1m1er3zaQU6/zqxeUC9EoCkF9i3qiUub31EfYItbe/Qv7kW', 'QbLjGoYp2KEOd8seboWzdDqWY9mFNAv2r7B7jBWlKa4h9g9SpYB0F6FlTBIk', '2018-07-30 13:03:51', '2018-08-16 21:32:25', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `tt_albums`
-- ----------------------------
DROP TABLE IF EXISTS `tt_albums`;
CREATE TABLE `tt_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `albumtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `tt_albums`
-- ----------------------------
BEGIN;
INSERT INTO `tt_albums` VALUES ('6', '99900', '[{\"src\":\"\\/uploads\\/ueditor\\/php\\/upload\\/image\\/20180814\\/1534228605240093.png\",\"alt\":\"1534228605240093.png\"},{\"src\":\"\\/uploads\\/ueditor\\/php\\/upload\\/image\\/20180808\\/1533690222221263.jpeg\",\"alt\":\"1533690222221263.jpeg\"},{\"src\":\"\\/uploads\\/ueditor\\/php\\/upload\\/image\\/20180814\\/1534228605240093.png\",\"alt\":\"1534228605240093.png\"}]', '2018-08-16 21:56:38', '2018-08-16 21:56:38'), ('7', '范德萨范德萨', '[{\"src\":\"\\/uploads\\/ueditor\\/php\\/upload\\/image\\/20180808\\/1533690222221263.jpeg\",\"alt\":\"1533690222221263.jpeg\"}]', null, '2018-08-16 21:51:47'), ('8', '范德萨范德萨', '[{\"src\":\"\\/uploads\\/ueditor\\/php\\/upload\\/image\\/20180808\\/1533690222221263.jpeg\",\"alt\":\"1533690222221263.jpeg\"}]', null, '2018-08-16 21:51:47'), ('9', '范德萨范德萨', '[{\"src\":\"\\/uploads\\/ueditor\\/php\\/upload\\/image\\/20180808\\/1533690222221263.jpeg\",\"alt\":\"1533690222221263.jpeg\"}]', null, '2018-08-16 21:51:47'), ('12', '范德萨范德萨', '[{\"src\":\"\\/uploads\\/ueditor\\/php\\/upload\\/image\\/20180808\\/1533690222221263.jpeg\",\"alt\":\"1533690222221263.jpeg\"}]', null, '2018-08-16 21:51:47'), ('13', '999', '[{\"src\":\"\\/uploads\\/ueditor\\/php\\/upload\\/image\\/20180814\\/1534224444112317.png\",\"alt\":\"1534224444112317.png\"}]', null, '2018-08-16 21:51:47'), ('14', '999', '[{\"src\":\"\\/uploads\\/ueditor\\/php\\/upload\\/image\\/20180814\\/1534228605240093.png\",\"alt\":\"1534228605240093.png\"}]', null, '2018-08-16 21:51:47');
COMMIT;

-- ----------------------------
--  Table structure for `tt_article`
-- ----------------------------
DROP TABLE IF EXISTS `tt_article`;
CREATE TABLE `tt_article` (
  `id` bigint(20) NOT NULL,
  `categories_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `classname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '所属栏目名称',
  `subtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '副标题',
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '缩列图',
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '作者',
  `sort` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '排序',
  `examine` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '审核状态0待审 1通过',
  `hit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '点击率',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pubtime` varchar(0) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '发布日期',
  `source` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '来源',
  `content` longtext COLLATE utf8_unicode_ci COMMENT '内容',
  `extend` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '扩展',
  `publisher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '发布者',
  `auditor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '审核人',
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '文件or产品编号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `tt_categories`
-- ----------------------------
DROP TABLE IF EXISTS `tt_categories`;
CREATE TABLE `tt_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `sort` int(255) NOT NULL DEFAULT '50' COMMENT '排序',
  `catname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '栏目名称',
  `pname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '父栏目名称',
  `display` tinyint(255) DEFAULT NULL COMMENT '栏目状态',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '缩列图',
  `encatname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '英文名称',
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '别名',
  `content` longtext COLLATE utf8mb4_unicode_ci COMMENT '栏目内容',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '栏目模版类型',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  `index_view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '首页模版',
  `list_view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '列表模版',
  `page_view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '内页模版',
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '栏目链接',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '栏目外链',
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '模型',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `pid,display` (`pid`,`display`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `tt_categories`
-- ----------------------------
BEGIN;
INSERT INTO `tt_categories` VALUES ('27', '0', '50', '顶级栏目1', '顶级栏目', '1', 'uploads/timg.jpg', null, null, null, 'list', '2018-08-09 08:47:57', '2018-08-10 14:52:17', 'template.cate-index', 'template.cate-index', 'template.cate-index', null, null, 'article'), ('28', '0', '50', '顶级栏目2', '顶级栏目', '1', 'uploads/timg.jpg', '', '', '', 'list', '2018-08-09 08:49:45', '2018-08-09 08:49:45', 'template.cate-index', 'template.cate-list', 'template.cate-page', null, null, 'article'), ('33', '27', '50', '二级栏目1-1', '顶级栏目1', '1', 'uploads/timg.jpg', null, null, '<p>121</p>', 'list', '2018-08-09 08:56:19', '2018-08-10 15:14:05', 'template.cate-index', 'template.cate-index', 'template.cate-index', null, null, 'article'), ('34', '27', '50', '二级栏目1-2', '顶级栏目1', '1', 'uploads/timg.jpg', null, null, null, 'list', '2018-08-09 08:57:40', '2018-08-10 15:16:01', 'template.cate-index', 'template.cate-index', 'template.cate-index', null, null, 'article'), ('36', '27', '50', '二级栏目1-4', '顶级栏目1', '1', 'uploads/timg.jpg', null, null, null, 'list', '2018-08-09 09:08:18', '2018-08-10 15:15:40', 'template.cate-index', 'template.cate-index', 'template.cate-index', null, null, 'article'), ('37', '27', '50', '二级栏目1-5', '顶级栏目1', '1', 'uploads/timg.jpg', '', '', '', 'list', '2018-08-09 09:09:55', '2018-08-09 09:09:55', 'template.cate-index', 'template.cate-list', 'template.cate-page', null, null, 'article'), ('38', '37', '50', '三级栏目1-1-1', '二级栏目1-5', '1', 'uploads/timg.jpg', null, null, '<p>21212121</p>', 'list', '2018-08-09 09:10:12', '2018-08-10 15:22:31', 'template.cate-index', 'template.cate-index', 'template.cate-index', null, null, 'article');
COMMIT;

-- ----------------------------
--  Table structure for `tt_info`
-- ----------------------------
DROP TABLE IF EXISTS `tt_info`;
CREATE TABLE `tt_info` (
  `id` bigint(255) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '网站标题',
  `enterprise` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '企业名称',
  `mobile1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `index` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'template.index',
  `wap` tinyint(255) DEFAULT '0',
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `tt_info`
-- ----------------------------
BEGIN;
INSERT INTO `tt_info` VALUES ('1', '百航科技', '百航科技', '400-XXX-XXX', '1', '3', '4', '5', '6', '7', 'template.index', '0', null, '2018-08-10 14:43:38', '1', '2');
COMMIT;

-- ----------------------------
--  Table structure for `tt_logs`
-- ----------------------------
DROP TABLE IF EXISTS `tt_logs`;
CREATE TABLE `tt_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `tt_logs`
-- ----------------------------
BEGIN;
INSERT INTO `tt_logs` VALUES ('2', '账户:admin连续5次错误被系统锁定15分钟。', '2018-08-14 13:25:10', null);
COMMIT;

-- ----------------------------
--  Table structure for `tt_migrations`
-- ----------------------------
DROP TABLE IF EXISTS `tt_migrations`;
CREATE TABLE `tt_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `tt_migrations`
-- ----------------------------
BEGIN;
INSERT INTO `tt_migrations` VALUES ('1', '2018_08_07_141447_create_categories_table', '1');
COMMIT;

-- ----------------------------
--  Table structure for `tt_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `tt_sessions`;
CREATE TABLE `tt_sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `tt_sessions`
-- ----------------------------
BEGIN;
INSERT INTO `tt_sessions` VALUES ('0LD2FEMj6ljvqH8DwqLunw6aRzZm2glP52Kqlkuh', null, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQXBBdXVLbDRiajdCemJCYVRxMmx5aDYydUY2Z0ZWVzN3U3FFeWpDYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4OC9hZG1pbi9hbGJ1bS1hZGQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNToibG9naW5fc2Vzc2lvbmlkIjtzOjQwOiIwTEQyRkVNajZsanZxSDhEd3FMdW53NmFSelptMmdsUDUyS3Fsa3VoIjt9', '1534427929'), ('SRmzLPRNP3P54apgvwzBaXgJPqPKkgHheseJvvZ9', null, '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ090VFVWWEZCbkc2S2dIdzJieWdqdnNWemlUdmJwNk5Yd1d5Nm9MTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4OC9hZG1pbi9hbGJ1bS11cGRhdGUvNCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE1OiJsb2dpbl9zZXNzaW9uaWQiO3M6NDA6IlNSbXpMUFJOUDNQNTRhcGd2d3pCYVhnSlBxUEtrZ0hoZXNlSnZ2WjkiO30=', '1534410163');
COMMIT;

-- ----------------------------
--  Table structure for `tt_users`
-- ----------------------------
DROP TABLE IF EXISTS `tt_users`;
CREATE TABLE `tt_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
