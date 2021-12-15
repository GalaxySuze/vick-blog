/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : vick_blog

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 15/12/2021 20:52:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章标题',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '文章内容',
  `original_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '原始内容',
  `page_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '封面本地路径',
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文章描述',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '链接',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '文章状态：0 草稿 1 正常 2 置顶',
  `is_original` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否原创',
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '用户id',
  `category` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '文章类别',
  `label` json NULL COMMENT '文章标签',
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '浏览量',
  `release_time` date NULL DEFAULT NULL COMMENT '发布时间',
  `share` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '分享数',
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '文章关键词',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `outline` json NULL COMMENT '文章大纲',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `articles_title_index`(`title`) USING BTREE,
  INDEX `articles_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES (16, 'Hello World', '<h1>测试标题 1</h1>\n<h2>测试标题 2</h2>\n<h3>测试标题 3</h3>\n<h4 id=\'outline_Y6Mmu\'>测试标题 4</h4>\n<h5>测试标题 5</h5>\n<p>测试正文：Pandas DataFrame 是一个二维数组，跟数据库中的 Table 或 Excel 很相似，底层使用 Numpy 和 array 存储，Numpy 使用 C 语言编写，运行速度很快。在 <strong>Python</strong> 语言中，它们是必不可少的机器学习库。\n因为 Pandas 的高效，实际开发中，我更多的会借助它做抽样数据分析，然而生产环境的数据量巨大，需要集群部署，所以生产环境用 Spark 全量运行。Spark 和 Pandas 都可以集成 SQL 能力，但它们支持的 SQL 规范不一致，为保持操作统一，我们可能会选择其中的一种规范，也就有了 Pandas 和 <em>PySpark</em> 数据结构的转换需求。</p>\n<h4 id=\'outline_B53so\'>测试代码块</h4>\n<pre><code class=\"language-php\">&lt;?php\n    if ($life == null) {\n        foreach( $array as $k =&gt; $v) {\n            echo \'hello world\';\n        }\n    }\n</code></pre>\n<h4 id=\'outline_buAF9\'>测试列表</h4>\n<p>需要做的事情有：</p>\n<ul>\n<li>吃饭饭</li>\n<li>睡觉觉</li>\n<li>打豆豆</li>\n</ul>\n<ol>\n<li>吃饭饭</li>\n<li>睡觉觉</li>\n<li>打豆豆</li>\n</ol>\n<h4 id=\'outline_O1XpG\'>测试引用</h4>\n<blockquote>\n<p>数据预处理的目的在于减少数据集内数据分布的差异性，有减少类内距离的同时增加类间距离的实际效果。在人脸数据处理方面，常用的有人脸检测和对齐。由于人脸属性识别任务比较简单，在这里的验证中我只使用了人脸检测（抠出图像中的人脸）。</p>\n</blockquote>\n<h4 id=\'outline_f7DBz\'>测试图片</h4>\n<p><img src=\"https://developer.qiniu.com/assets/logo-white-b90d685a6b146884636382426d11b7236f5f7ca1c5dfafdb6fa777a0f976fc1f.png\" alt=\"demo\" /></p>', '# 测试标题 1\n## 测试标题 2\n### 测试标题 3\n#### 测试标题 4\n##### 测试标题 5\n\n测试正文：Pandas DataFrame 是一个二维数组，跟数据库中的 Table 或 Excel 很相似，底层使用 Numpy 和 array 存储，Numpy 使用 C 语言编写，运行速度很快。在 **Python** 语言中，它们是必不可少的机器学习库。\n因为 Pandas 的高效，实际开发中，我更多的会借助它做抽样数据分析，然而生产环境的数据量巨大，需要集群部署，所以生产环境用 Spark 全量运行。Spark 和 Pandas 都可以集成 SQL 能力，但它们支持的 SQL 规范不一致，为保持操作统一，我们可能会选择其中的一种规范，也就有了 Pandas 和 *PySpark* 数据结构的转换需求。\n\n#### 测试代码块\n```php\n<?php\n	if ($life == null) {\n		foreach( $array as $k => $v) {\n			echo \'hello world\';\n		}\n	}\n\n```\n\n#### 测试列表\n\n需要做的事情有：\n* 吃饭饭\n* 睡觉觉\n* 打豆豆\n\n1. 吃饭饭\n2. 睡觉觉\n3. 打豆豆\n\n#### 测试引用\n\n> 数据预处理的目的在于减少数据集内数据分布的差异性，有减少类内距离的同时增加类间距离的实际效果。在人脸数据处理方面，常用的有人脸检测和对齐。由于人脸属性识别任务比较简单，在这里的验证中我只使用了人脸检测（抠出图像中的人脸）。\n\n#### 测试图片\n\n![demo](https://developer.qiniu.com/assets/logo-white-b90d685a6b146884636382426d11b7236f5f7ca1c5dfafdb6fa777a0f976fc1f.png)', 'https://fuss10.elemecdn.com/d/e6/c4d93a3805b3ce3f323f7974e6f78jpeg.jpeg', 'Hello World', '测试文章排版', 2, 1, 1, 2, '{\"labels\": [1]}', 54, '2018-08-23', 0, '测试文章排版', '2018-08-23 07:33:30', '2021-12-15 11:47:21', NULL, '[{\"titleId\": \"outline_Y6Mmu\", \"outlineTitle\": \"测试标题 4\"}, {\"titleId\": \"outline_B53so\", \"outlineTitle\": \"测试代码块\"}, {\"titleId\": \"outline_buAF9\", \"outlineTitle\": \"测试列表\"}, {\"titleId\": \"outline_O1XpG\", \"outlineTitle\": \"测试引用\"}, {\"titleId\": \"outline_f7DBz\", \"outlineTitle\": \"测试图片\"}]');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '分类名',
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '分类描述',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, '前端', '万物基于JS', '2018-06-24 09:17:39', '2018-07-14 08:29:05', NULL);
INSERT INTO `categories` VALUES (2, '后端', 'PHP是世界上最好的语言', '2018-06-24 09:17:50', '2018-10-02 06:15:38', NULL);
INSERT INTO `categories` VALUES (3, '生活', '分享求知，分享感动', '2018-06-24 09:18:22', '2018-07-14 08:26:34', NULL);
INSERT INTO `categories` VALUES (4, '书籍', '学而不思则罔，思而不学则殆，不思不学则网贷', '2018-06-24 09:18:40', '2018-07-14 08:26:16', NULL);

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '游客昵称',
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '游客邮箱',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '评论内容',
  `target` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '评论目标：0:站内留言, >0:文章，',
  `reply_comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '回复的评论',
  `comment_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '评论类型：1 文章评论，2 站内留言',
  `ip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ip地址',
  `thumb` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '赞同数',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 'jack', 'jack@qq.com', '曾经我也这样去想，从头到尾自己去搭建一个只属于自己都屌炸天的博客网站，但是后面感觉想要的功能太多了，而且自适应的样式修改也复杂，简直没时间去做呀。于是开始找各种开源框架去做，什么wordpress，z-blog，帝国等等，发现并不是自己想要的那种。直到后面遇到了Hexo，各种功能样式，完全符合自己的预期要求，于是就暂时搁浅了自己开发博客网站的计划', 6, 0, 1, '127.0.0.1', 0, '2018-09-22 16:50:20', '2018-09-22 16:50:20', NULL);
INSERT INTO `comments` VALUES (2, 'rose', 'rose@qq.com', '@Jack 这个评论功能将呈现十分美妙的效果。敬请期待哟~', 6, 0, 1, '127.0.0.1', 0, '2018-09-22 16:54:46', '2018-09-22 16:54:46', NULL);
INSERT INTO `comments` VALUES (3, 'vick', 'vick@qq.com', '好看的个人博客，布局配色字体行间距适当的动画效果响应式都是要注意的，我建议有了比较完整的思路再动手，不要边写边想，浪费时间。如果技术都不足以支撑想法的话，那就踏踏实实再学习一段时间', 6, 0, 1, '127.0.0.1', 0, '2018-09-22 17:02:02', '2018-09-22 17:02:02', NULL);
INSERT INTO `comments` VALUES (4, 'bill', 'bill@qq.com', '我知道你很累，是那种看不见的，身体上的，精神上的，人际关系上的，面对未来那种无力感。 ​​​​', 8, 0, 1, '127.0.0.1', 0, '2018-09-23 09:33:28', '2018-09-23 09:33:28', NULL);
INSERT INTO `comments` VALUES (5, 'jack', 'jack@qq.com', '如果读者在你网站阅读了文章，想发表评论，这时就需要用到评论功能了。同样，评论功能不需要我们从头开始实现，有很多提供商提供了集成服务', 18, 0, 1, '127.0.0.1', 0, '2018-10-05 10:15:09', '2018-10-05 10:15:09', NULL);
INSERT INTO `comments` VALUES (6, 'rose', 'rose@qq.com', '整理之后就是以上的内容，最最最重要的是，明确你搭建博客的目的，是想认真的写点东西，还是只想折腾一下体验各种不同的框架或主题而已', 18, 0, 1, '127.0.0.1', 0, '2018-10-05 10:18:39', '2018-10-05 10:18:39', NULL);
INSERT INTO `comments` VALUES (7, 'demo', 'demo@qq.com', 'Artisan 是 Laravel 自带的命令行接口，它提供了许多实用的命令来帮助你构建 Laravel 应用。要查看所有可用的 Artisan 命令的列表，可以使用 list 命令', 18, 0, 1, '127.0.0.1', 0, '2018-10-05 11:33:09', '2018-10-05 11:33:09', NULL);
INSERT INTO `comments` VALUES (8, 'admin', '1577972852@qq.com', '海鸟和鱼相爱，只是一场意外', 16, 0, 1, '127.0.0.1', 0, '2019-02-22 06:36:43', '2019-02-22 06:36:43', NULL);
INSERT INTO `comments` VALUES (9, 'admin', '1577972852@qq.com', '最美的不是下雨天，而是和你一起躲过雨的屋檐', 16, 0, 1, '127.0.0.1', 0, '2019-02-22 06:38:26', '2019-02-22 06:38:26', NULL);
INSERT INTO `comments` VALUES (10, 'admin', '1577972852@qq.com', 'xxxxx', 13, 0, 1, '127.0.0.1', 0, '2019-08-30 09:09:55', '2019-08-30 09:09:55', NULL);
INSERT INTO `comments` VALUES (11, 'admin', '1577972852@qq.com', '棒棒哒', 6, 0, 1, '127.0.0.1', 0, '2019-10-09 11:18:01', '2019-10-09 11:18:01', NULL);
INSERT INTO `comments` VALUES (12, 'Jack', 'demo@qq.com', '最美的不是下雨天，而是与你一起躲过雨的屋檐', 8, 0, 1, '27.115.74.70', 0, '2019-11-11 08:50:33', '2019-11-11 08:50:33', NULL);
INSERT INTO `comments` VALUES (13, 'Jack', 'demo@qq.com', '最美的不是下雨天，而是与你一起躲过雨的屋檐', 8, 0, 1, '27.115.74.70', 0, '2019-11-11 08:50:36', '2019-11-11 08:50:36', NULL);
INSERT INTO `comments` VALUES (14, 'Jack', 'demo@qq.com', '最美的不是下雨天，而是与你一起躲过雨的屋檐', 8, 0, 1, '27.115.74.70', 0, '2019-11-11 08:50:47', '2019-11-11 08:50:47', NULL);

-- ----------------------------
-- Table structure for labels
-- ----------------------------
DROP TABLE IF EXISTS `labels`;
CREATE TABLE `labels`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '标签名',
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '标签描述',
  `label_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '标签图标',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `labels_label_unique`(`label`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of labels
-- ----------------------------
INSERT INTO `labels` VALUES (1, 'PHP', '全称：PHP：Hypertext Preprocessor，即“PHP：超文本预处理器”，是一种开源的通用计算机脚本语言，尤其适用于网络开发并可嵌入HTML中使用。PHP的语法借鉴吸收C语言、Java和Perl等流行计算机语言的特点，易于一般程序员学习。PHP的主要目标是允许网络开发人员快速编写动态页面，但PHP也被用于其他很多领域。', 'https://cdn.learnku.com//uploads/communities/WtC3cPLHzMbKRSZnagU9.png!/both/44x44', '2018-06-24 08:23:56', '2019-06-03 09:25:38', NULL);

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '名字',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '链接',
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '图片',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of links
-- ----------------------------
INSERT INTO `links` VALUES (1, '😃Laravel China', 'https://laravel-china.org/', 'https://lccdn.phphub.org/uploads/sites/hG5JuDSqZ7Y26Kuh0Qat8EYv6XNT0fGc.png', 1, '2018-10-05 07:13:46', '2018-10-05 10:13:40', NULL);
INSERT INTO `links` VALUES (2, '😉Vuejs Caff', 'https://vuejscaff.com/', 'https://vuejscaffcdn.phphub.org/uploads/sites/ByvFbNlQYVwhvTyBgLdqitchoacDNznN.jpg', 1, '2018-10-05 07:22:47', '2018-10-05 10:13:52', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (9, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (10, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (11, '2018_05_27_091136_create_articles_table', 1);
INSERT INTO `migrations` VALUES (12, '2018_05_27_144812_create_labels_table', 1);
INSERT INTO `migrations` VALUES (13, '2018_05_27_145256_create_categories_table', 1);
INSERT INTO `migrations` VALUES (14, '2018_05_27_145429_create_comments_table', 1);
INSERT INTO `migrations` VALUES (15, '2018_05_27_152034_create_links_table', 1);
INSERT INTO `migrations` VALUES (16, '2018_05_27_153014_create_systems_table', 1);
INSERT INTO `migrations` VALUES (17, '2018_10_04_070054_create_roles_table', 2);
INSERT INTO `migrations` VALUES (18, '2018_10_04_070628_create_permissions_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('vick@qq.com', '$2y$10$CSBcOWAQ7G9zfoYsADgMk./mkka5qiAj4J3ZIJOUdDO8539lpADzG', '2018-09-16 14:42:53');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `perm_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '权限名称',
  `perm_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '权限描述',
  `role_id` int(10) NOT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `create_user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `perm_name`(`perm_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, '文章管理', '文章管理', 1, NULL, '2018-10-04 15:22:28', '2018-10-04 15:22:28', 1);
INSERT INTO `permissions` VALUES (2, '分类管理', '分类管理', 1, NULL, '2018-10-04 15:22:40', '2018-10-04 15:22:40', 1);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '角色名称',
  `role_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '角色描述',
  `is_backstage` tinyint(1) NOT NULL DEFAULT 1 COMMENT '是否后台角色',
  `create_user_id` int(11) NOT NULL COMMENT '创建人',
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `role_name`(`role_name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, '管理员', '后台管理员', 2, 1, NULL, '2018-10-04 08:10:10', '2018-10-04 08:21:21');
INSERT INTO `roles` VALUES (2, '作者', '文章作者', 1, 1, NULL, '2018-10-04 08:19:22', '2018-10-04 08:19:22');

-- ----------------------------
-- Table structure for systems
-- ----------------------------
DROP TABLE IF EXISTS `systems`;
CREATE TABLE `systems`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `systems_key_unique`(`key`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '用户名',
  `nickname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '昵称',
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '头像',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否管理员',
  `role_id` int(10) NULL DEFAULT 0 COMMENT '用户角色',
  `email_notify_enabled` tinyint(1) NOT NULL DEFAULT 1 COMMENT '启用电子邮件通知',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', NULL, NULL, 'admin@demo.com', '$2y$10$xqtlhw43wZFykNZdzdoO6.a6AgPAFU1XMgPR1K0Yu747AopMf0p5m', 1, 1, 1, 1, 'cxK93GQRJoHwA680JUK9qtRI129MQr5VwNCiuiTxGBQrx1sP5PoFIHaGKBg7', '2018-09-08 08:05:51', '2019-10-28 11:44:45', NULL);
INSERT INTO `users` VALUES (2, 'vick', NULL, NULL, 'vick@qq.com', '$2y$10$ZMc7jFLuUm4bBZIG96KFXedNCiKGO2SE.oGz1x0yc.UWjtPaUP4TS', 1, 0, 2, 1, 'npfmLgYcH9WTQYkEmNQcO486Tq4ghh41L3Nz2gAkwdjSI64p3egzExSnNkKR', '2018-09-16 11:15:13', '2018-10-04 16:34:08', NULL);
INSERT INTO `users` VALUES (5, 'rose', 'rose', NULL, 'rose@163.com', '$2y$10$ZMc7jFLuUm4bBZIG96KFXedNCiKGO2SE.oGz1x0yc.UWjtPaUP4TS', 1, 0, 1, 0, NULL, '2018-10-04 16:32:07', '2018-10-04 16:32:07', NULL);
INSERT INTO `users` VALUES (9, 'bill', 'bill', NULL, 'bill@demo.com', '$2y$10$0THxeoIYOk3QFJNCSTvs/u/gqMSRHn/Q92lGiazlY8AgrA1.eImZ6', 1, 1, 0, 1, NULL, '2018-10-05 11:13:34', '2018-10-05 11:13:34', NULL);
INSERT INTO `users` VALUES (10, 'demo', NULL, NULL, 'demo@qq.com', '$2y$10$arDyM9lbS.YK5tSjSnbwM.mrRn9obhgAaEJtSM1CIq79punRlHtkS', 1, 0, 2, 1, 'XSIgSlmD9sb75movUfDMdvm2bgOuk5FFZdW5xVWCU30Z9t2uiToLQrKY7vt9', '2018-10-05 11:14:32', '2018-10-05 11:32:33', NULL);

SET FOREIGN_KEY_CHECKS = 1;
