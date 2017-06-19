/*
Navicat MySQL Data Transfer

Source Server         : 公司web测试服务器
Source Server Version : 50173
Source Host           : 116.236.115.125:11211
Source Database       : futureshop

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2017-06-19 16:01:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `wp_commentmeta`
-- ----------------------------
DROP TABLE IF EXISTS `wp_commentmeta`;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_commentmeta
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_comments`
-- ----------------------------
DROP TABLE IF EXISTS `wp_comments`;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_comments
-- ----------------------------
INSERT INTO `wp_comments` VALUES ('1', '1', '一位WordPress评论者', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2017-06-19 15:57:52', '2017-06-19 07:57:52', '嗨，这是一条评论。\n要开始审核、编辑及删除评论，请访问仪表盘的“评论”页面。\n评论者头像来自<a href=\"https://gravatar.com\">Gravatar</a>。', '0', '1', '', '', '0', '0');

-- ----------------------------
-- Table structure for `wp_links`
-- ----------------------------
DROP TABLE IF EXISTS `wp_links`;
CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_links
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_options`
-- ----------------------------
DROP TABLE IF EXISTS `wp_options`;
CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_options
-- ----------------------------
INSERT INTO `wp_options` VALUES ('1', 'siteurl', 'http://116.236.115.125:9000/production/futureshop', 'yes');
INSERT INTO `wp_options` VALUES ('2', 'home', 'http://116.236.115.125:9000/production/futureshop', 'yes');
INSERT INTO `wp_options` VALUES ('3', 'blogname', '未来网络技术工作室', 'yes');
INSERT INTO `wp_options` VALUES ('4', 'blogdescription', '又一个WordPress站点', 'yes');
INSERT INTO `wp_options` VALUES ('5', 'users_can_register', '0', 'yes');
INSERT INTO `wp_options` VALUES ('6', 'admin_email', 'fmsdwifull@sina.com', 'yes');
INSERT INTO `wp_options` VALUES ('7', 'start_of_week', '1', 'yes');
INSERT INTO `wp_options` VALUES ('8', 'use_balanceTags', '0', 'yes');
INSERT INTO `wp_options` VALUES ('9', 'use_smilies', '1', 'yes');
INSERT INTO `wp_options` VALUES ('10', 'require_name_email', '1', 'yes');
INSERT INTO `wp_options` VALUES ('11', 'comments_notify', '1', 'yes');
INSERT INTO `wp_options` VALUES ('12', 'posts_per_rss', '10', 'yes');
INSERT INTO `wp_options` VALUES ('13', 'rss_use_excerpt', '0', 'yes');
INSERT INTO `wp_options` VALUES ('14', 'mailserver_url', 'mail.example.com', 'yes');
INSERT INTO `wp_options` VALUES ('15', 'mailserver_login', 'login@example.com', 'yes');
INSERT INTO `wp_options` VALUES ('16', 'mailserver_pass', 'password', 'yes');
INSERT INTO `wp_options` VALUES ('17', 'mailserver_port', '110', 'yes');
INSERT INTO `wp_options` VALUES ('18', 'default_category', '1', 'yes');
INSERT INTO `wp_options` VALUES ('19', 'default_comment_status', 'open', 'yes');
INSERT INTO `wp_options` VALUES ('20', 'default_ping_status', 'open', 'yes');
INSERT INTO `wp_options` VALUES ('21', 'default_pingback_flag', '1', 'yes');
INSERT INTO `wp_options` VALUES ('22', 'posts_per_page', '10', 'yes');
INSERT INTO `wp_options` VALUES ('23', 'date_format', 'Y年n月j日', 'yes');
INSERT INTO `wp_options` VALUES ('24', 'time_format', 'ag:i', 'yes');
INSERT INTO `wp_options` VALUES ('25', 'links_updated_date_format', 'Y年n月j日ag:i', 'yes');
INSERT INTO `wp_options` VALUES ('26', 'comment_moderation', '0', 'yes');
INSERT INTO `wp_options` VALUES ('27', 'moderation_notify', '1', 'yes');
INSERT INTO `wp_options` VALUES ('28', 'permalink_structure', '', 'yes');
INSERT INTO `wp_options` VALUES ('29', 'rewrite_rules', '', 'yes');
INSERT INTO `wp_options` VALUES ('30', 'hack_file', '0', 'yes');
INSERT INTO `wp_options` VALUES ('31', 'blog_charset', 'UTF-8', 'yes');
INSERT INTO `wp_options` VALUES ('32', 'moderation_keys', '', 'no');
INSERT INTO `wp_options` VALUES ('33', 'active_plugins', 'a:0:{}', 'yes');
INSERT INTO `wp_options` VALUES ('34', 'category_base', '', 'yes');
INSERT INTO `wp_options` VALUES ('35', 'ping_sites', 'http://rpc.pingomatic.com/', 'yes');
INSERT INTO `wp_options` VALUES ('36', 'comment_max_links', '2', 'yes');
INSERT INTO `wp_options` VALUES ('37', 'gmt_offset', '0', 'yes');
INSERT INTO `wp_options` VALUES ('38', 'default_email_category', '1', 'yes');
INSERT INTO `wp_options` VALUES ('39', 'recently_edited', '', 'no');
INSERT INTO `wp_options` VALUES ('40', 'template', 'twentyseventeen', 'yes');
INSERT INTO `wp_options` VALUES ('41', 'stylesheet', 'twentyseventeen', 'yes');
INSERT INTO `wp_options` VALUES ('42', 'comment_whitelist', '1', 'yes');
INSERT INTO `wp_options` VALUES ('43', 'blacklist_keys', '', 'no');
INSERT INTO `wp_options` VALUES ('44', 'comment_registration', '0', 'yes');
INSERT INTO `wp_options` VALUES ('45', 'html_type', 'text/html', 'yes');
INSERT INTO `wp_options` VALUES ('46', 'use_trackback', '0', 'yes');
INSERT INTO `wp_options` VALUES ('47', 'default_role', 'subscriber', 'yes');
INSERT INTO `wp_options` VALUES ('48', 'db_version', '38590', 'yes');
INSERT INTO `wp_options` VALUES ('49', 'uploads_use_yearmonth_folders', '1', 'yes');
INSERT INTO `wp_options` VALUES ('50', 'upload_path', '', 'yes');
INSERT INTO `wp_options` VALUES ('51', 'blog_public', '1', 'yes');
INSERT INTO `wp_options` VALUES ('52', 'default_link_category', '2', 'yes');
INSERT INTO `wp_options` VALUES ('53', 'show_on_front', 'posts', 'yes');
INSERT INTO `wp_options` VALUES ('54', 'tag_base', '', 'yes');
INSERT INTO `wp_options` VALUES ('55', 'show_avatars', '1', 'yes');
INSERT INTO `wp_options` VALUES ('56', 'avatar_rating', 'G', 'yes');
INSERT INTO `wp_options` VALUES ('57', 'upload_url_path', '', 'yes');
INSERT INTO `wp_options` VALUES ('58', 'thumbnail_size_w', '150', 'yes');
INSERT INTO `wp_options` VALUES ('59', 'thumbnail_size_h', '150', 'yes');
INSERT INTO `wp_options` VALUES ('60', 'thumbnail_crop', '1', 'yes');
INSERT INTO `wp_options` VALUES ('61', 'medium_size_w', '300', 'yes');
INSERT INTO `wp_options` VALUES ('62', 'medium_size_h', '300', 'yes');
INSERT INTO `wp_options` VALUES ('63', 'avatar_default', 'mystery', 'yes');
INSERT INTO `wp_options` VALUES ('64', 'large_size_w', '1024', 'yes');
INSERT INTO `wp_options` VALUES ('65', 'large_size_h', '1024', 'yes');
INSERT INTO `wp_options` VALUES ('66', 'image_default_link_type', 'none', 'yes');
INSERT INTO `wp_options` VALUES ('67', 'image_default_size', '', 'yes');
INSERT INTO `wp_options` VALUES ('68', 'image_default_align', '', 'yes');
INSERT INTO `wp_options` VALUES ('69', 'close_comments_for_old_posts', '0', 'yes');
INSERT INTO `wp_options` VALUES ('70', 'close_comments_days_old', '14', 'yes');
INSERT INTO `wp_options` VALUES ('71', 'thread_comments', '1', 'yes');
INSERT INTO `wp_options` VALUES ('72', 'thread_comments_depth', '5', 'yes');
INSERT INTO `wp_options` VALUES ('73', 'page_comments', '0', 'yes');
INSERT INTO `wp_options` VALUES ('74', 'comments_per_page', '50', 'yes');
INSERT INTO `wp_options` VALUES ('75', 'default_comments_page', 'newest', 'yes');
INSERT INTO `wp_options` VALUES ('76', 'comment_order', 'asc', 'yes');
INSERT INTO `wp_options` VALUES ('77', 'sticky_posts', 'a:0:{}', 'yes');
INSERT INTO `wp_options` VALUES ('78', 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('79', 'widget_text', 'a:0:{}', 'yes');
INSERT INTO `wp_options` VALUES ('80', 'widget_rss', 'a:0:{}', 'yes');
INSERT INTO `wp_options` VALUES ('81', 'uninstall_plugins', 'a:0:{}', 'no');
INSERT INTO `wp_options` VALUES ('82', 'timezone_string', 'Asia/Shanghai', 'yes');
INSERT INTO `wp_options` VALUES ('83', 'page_for_posts', '0', 'yes');
INSERT INTO `wp_options` VALUES ('84', 'page_on_front', '0', 'yes');
INSERT INTO `wp_options` VALUES ('85', 'default_post_format', '0', 'yes');
INSERT INTO `wp_options` VALUES ('86', 'link_manager_enabled', '0', 'yes');
INSERT INTO `wp_options` VALUES ('87', 'finished_splitting_shared_terms', '1', 'yes');
INSERT INTO `wp_options` VALUES ('88', 'site_icon', '0', 'yes');
INSERT INTO `wp_options` VALUES ('89', 'medium_large_size_w', '768', 'yes');
INSERT INTO `wp_options` VALUES ('90', 'medium_large_size_h', '0', 'yes');
INSERT INTO `wp_options` VALUES ('91', 'initial_db_version', '38590', 'yes');
INSERT INTO `wp_options` VALUES ('92', 'wp_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'yes');
INSERT INTO `wp_options` VALUES ('93', 'fresh_site', '1', 'yes');
INSERT INTO `wp_options` VALUES ('94', 'WPLANG', 'zh_CN', 'yes');
INSERT INTO `wp_options` VALUES ('95', 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('96', 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('97', 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('98', 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('99', 'widget_meta', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('100', 'sidebars_widgets', 'a:5:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}s:13:\"array_version\";i:3;}', 'yes');
INSERT INTO `wp_options` VALUES ('106', '_transient_doing_cron', '1497859155.1603009700775146484375', 'yes');
INSERT INTO `wp_options` VALUES ('107', '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:3:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:57:\"https://downloads.wordpress.org/release/wordpress-4.8.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:57:\"https://downloads.wordpress.org/release/wordpress-4.8.zip\";s:10:\"no_content\";s:68:\"https://downloads.wordpress.org/release/wordpress-4.8-no-content.zip\";s:11:\"new_bundled\";s:69:\"https://downloads.wordpress.org/release/wordpress-4.8-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:3:\"4.8\";s:7:\"version\";s:3:\"4.8\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.7\";s:15:\"partial_version\";s:0:\"\";}i:1;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:57:\"https://downloads.wordpress.org/release/wordpress-4.8.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:57:\"https://downloads.wordpress.org/release/wordpress-4.8.zip\";s:10:\"no_content\";s:68:\"https://downloads.wordpress.org/release/wordpress-4.8-no-content.zip\";s:11:\"new_bundled\";s:69:\"https://downloads.wordpress.org/release/wordpress-4.8-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:3:\"4.8\";s:7:\"version\";s:3:\"4.8\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.7\";s:15:\"partial_version\";s:0:\"\";s:9:\"new_files\";s:1:\"1\";}i:2;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.7.5.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.7.5.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-4.7.5-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-4.7.5-new-bundled.zip\";s:7:\"partial\";s:69:\"https://downloads.wordpress.org/release/wordpress-4.7.5-partial-4.zip\";s:8:\"rollback\";s:70:\"https://downloads.wordpress.org/release/wordpress-4.7.5-rollback-4.zip\";}s:7:\"current\";s:5:\"4.7.5\";s:7:\"version\";s:5:\"4.7.5\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.7\";s:15:\"partial_version\";s:5:\"4.7.4\";s:9:\"new_files\";s:0:\"\";}}s:12:\"last_checked\";i:1497859091;s:15:\"version_checked\";s:5:\"4.7.4\";s:12:\"translations\";a:1:{i:0;a:7:{s:4:\"type\";s:4:\"core\";s:4:\"slug\";s:7:\"default\";s:8:\"language\";s:5:\"zh_CN\";s:7:\"version\";s:5:\"4.7.4\";s:7:\"updated\";s:19:\"2017-01-26 15:54:45\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/translation/core/4.7.4/zh_CN.zip\";s:10:\"autoupdate\";b:1;}}}', 'no');
INSERT INTO `wp_options` VALUES ('108', '_site_transient_update_plugins', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1497859091;s:8:\"response\";a:1:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":8:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"3.3.2\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.3.3.2.zip\";s:6:\"tested\";s:5:\"4.7.5\";s:13:\"compatibility\";O:8:\"stdClass\":0:{}}}s:12:\"translations\";a:1:{i:0;a:7:{s:4:\"type\";s:6:\"plugin\";s:4:\"slug\";s:7:\"akismet\";s:8:\"language\";s:5:\"zh_CN\";s:7:\"version\";s:6:\"3.1.11\";s:7:\"updated\";s:19:\"2016-04-17 03:28:10\";s:7:\"package\";s:75:\"https://downloads.wordpress.org/translation/plugin/akismet/3.1.11/zh_CN.zip\";s:10:\"autoupdate\";b:1;}}s:9:\"no_update\";a:1:{s:9:\"hello.php\";O:8:\"stdClass\":6:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:3:\"1.6\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/hello-dolly.1.6.zip\";}}}', 'no');
INSERT INTO `wp_options` VALUES ('109', '_site_transient_timeout_theme_roots', '1497860892', 'no');
INSERT INTO `wp_options` VALUES ('110', '_site_transient_theme_roots', 'a:3:{s:13:\"twentyfifteen\";s:7:\"/themes\";s:15:\"twentyseventeen\";s:7:\"/themes\";s:13:\"twentysixteen\";s:7:\"/themes\";}', 'no');
INSERT INTO `wp_options` VALUES ('111', '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1497859093;s:7:\"checked\";a:3:{s:13:\"twentyfifteen\";s:3:\"1.7\";s:15:\"twentyseventeen\";s:3:\"1.2\";s:13:\"twentysixteen\";s:3:\"1.3\";}s:8:\"response\";a:2:{s:13:\"twentyfifteen\";a:4:{s:5:\"theme\";s:13:\"twentyfifteen\";s:11:\"new_version\";s:3:\"1.8\";s:3:\"url\";s:43:\"https://wordpress.org/themes/twentyfifteen/\";s:7:\"package\";s:59:\"https://downloads.wordpress.org/theme/twentyfifteen.1.8.zip\";}s:15:\"twentyseventeen\";a:4:{s:5:\"theme\";s:15:\"twentyseventeen\";s:11:\"new_version\";s:3:\"1.3\";s:3:\"url\";s:45:\"https://wordpress.org/themes/twentyseventeen/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/theme/twentyseventeen.1.3.zip\";}}s:12:\"translations\";a:1:{i:0;a:7:{s:4:\"type\";s:5:\"theme\";s:4:\"slug\";s:15:\"twentyseventeen\";s:8:\"language\";s:5:\"zh_CN\";s:7:\"version\";s:3:\"1.0\";s:7:\"updated\";s:19:\"2016-12-10 13:35:58\";s:7:\"package\";s:79:\"https://downloads.wordpress.org/translation/theme/twentyseventeen/1.0/zh_CN.zip\";s:10:\"autoupdate\";b:1;}}}', 'no');
INSERT INTO `wp_options` VALUES ('112', '_site_transient_timeout_browser_699dfc46f2edc5d25d73bee60c1bf7b9', '1498463894', 'no');
INSERT INTO `wp_options` VALUES ('113', '_site_transient_browser_699dfc46f2edc5d25d73bee60c1bf7b9', 'a:9:{s:8:\"platform\";s:7:\"Windows\";s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:13:\"58.0.3029.110\";s:10:\"update_url\";s:28:\"http://www.google.com/chrome\";s:7:\"img_src\";s:49:\"http://s.wordpress.org/images/browsers/chrome.png\";s:11:\"img_src_ssl\";s:48:\"https://wordpress.org/images/browsers/chrome.png\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;}', 'no');
INSERT INTO `wp_options` VALUES ('114', 'can_compress_scripts', '1', 'no');
INSERT INTO `wp_options` VALUES ('115', '_transient_timeout_feed_7d1d7866a17d17cf5f79e1f075b87a31', '1497902298', 'no');
INSERT INTO `wp_options` VALUES ('116', '_transient_timeout_feed_mod_7d1d7866a17d17cf5f79e1f075b87a31', '1497902298', 'no');
INSERT INTO `wp_options` VALUES ('117', '_transient_feed_mod_7d1d7866a17d17cf5f79e1f075b87a31', '1497859098', 'no');
INSERT INTO `wp_options` VALUES ('118', '_transient_timeout_feed_d117b5738fbd35bd8c0391cda1f2b5d9', '1497902300', 'no');
INSERT INTO `wp_options` VALUES ('119', '_transient_timeout_feed_mod_d117b5738fbd35bd8c0391cda1f2b5d9', '1497902300', 'no');
INSERT INTO `wp_options` VALUES ('120', '_transient_feed_mod_d117b5738fbd35bd8c0391cda1f2b5d9', '1497859100', 'no');
INSERT INTO `wp_options` VALUES ('121', '_transient_timeout_feed_b9388c83948825c1edaef0d856b7b109', '1497902310', 'no');
INSERT INTO `wp_options` VALUES ('122', '_transient_timeout_feed_mod_b9388c83948825c1edaef0d856b7b109', '1497902310', 'no');
INSERT INTO `wp_options` VALUES ('123', '_transient_feed_mod_b9388c83948825c1edaef0d856b7b109', '1497859110', 'no');
INSERT INTO `wp_options` VALUES ('124', '_transient_timeout_plugin_slugs', '1497945510', 'no');
INSERT INTO `wp_options` VALUES ('125', '_transient_plugin_slugs', 'a:2:{i:0;s:19:\"akismet/akismet.php\";i:1;s:9:\"hello.php\";}', 'no');
INSERT INTO `wp_options` VALUES ('126', '_transient_timeout_dash_5438fb5baf31c513fff2b9a1067656a6', '1497902310', 'no');
INSERT INTO `wp_options` VALUES ('127', '_transient_dash_5438fb5baf31c513fff2b9a1067656a6', '<div class=\"rss-widget\"><ul><li><a class=\'rsswidget\' href=\'https://cn.wordpress.org/2016/12/08/vaughan/\'>WordPress 4.7“Vaughan”</a> <span class=\"rss-date\">2016年12月8日</span><div class=\"rssSummary\">WordPress 4.7简体中文版现已开放下载，或在您的WordPress仪表盘中升级。我们将此版本命名为“ [&hellip;]</div></li></ul></div><div class=\"rss-widget\"><ul><li><a class=\'rsswidget\' href=\'https://ma.tt/2017/06/peak-tea-demand/\'>Matt: Peak Tea Demand</a></li><li><a class=\'rsswidget\' href=\'https://wptavern.com/wordcamp-europe-2017-draws-1900-attendees-from-79-countries\'>WPTavern: WordCamp Europe 2017 Draws 1900 Attendees from 79 Countries</a></li><li><a class=\'rsswidget\' href=\'https://wptavern.com/10-lessons-learned-from-five-years-of-selling-wordpress-products\'>WPTavern: 10 Lessons Learned From Five Years of Selling WordPress Products</a></li></ul></div><div class=\"rss-widget\"><ul><li class=\"dashboard-news-plugin\"><span>热门插件:</span> Yoast SEO&nbsp;<a href=\"plugin-install.php?tab=plugin-information&amp;plugin=wordpress-seo&amp;_wpnonce=525a61258b&amp;TB_iframe=true&amp;width=600&amp;height=800\" class=\"thickbox open-plugin-details-modal\" aria-label=\"安装Yoast SEO\">(安装)</a></li></ul></div>', 'no');
INSERT INTO `wp_options` VALUES ('101', 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('102', 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('103', 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('104', 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes');
INSERT INTO `wp_options` VALUES ('105', 'cron', 'a:3:{i:1497859087;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1497859091;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}', 'yes');

-- ----------------------------
-- Table structure for `wp_postmeta`
-- ----------------------------
DROP TABLE IF EXISTS `wp_postmeta`;
CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_postmeta
-- ----------------------------
INSERT INTO `wp_postmeta` VALUES ('1', '2', '_wp_page_template', 'default');

-- ----------------------------
-- Table structure for `wp_posts`
-- ----------------------------
DROP TABLE IF EXISTS `wp_posts`;
CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_posts
-- ----------------------------
INSERT INTO `wp_posts` VALUES ('1', '1', '2017-06-19 15:57:52', '2017-06-19 07:57:52', '欢迎使用WordPress。这是您的第一篇文章。编辑或删除它，然后开始写作吧！', '世界，您好！', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2017-06-19 15:57:52', '2017-06-19 07:57:52', '', '0', 'http://116.236.115.125:9000/production/futureshop/?p=1', '0', 'post', '', '1');
INSERT INTO `wp_posts` VALUES ('2', '1', '2017-06-19 15:57:52', '2017-06-19 07:57:52', '这是一个范例页面。它和博客文章不同，因为它的页面位置是固定的，同时会显示于您的博客导航栏（大多数主题中）。大多数人会新增一个“关于”页面向访客介绍自己。它可能类似下面这样：\n\n<blockquote>我是一个很有趣的人，我创建了工厂和庄园。并且，顺便提一下，我的妻子也很好。</blockquote>\n\n……或下面这样：\n\n<blockquote>XYZ装置公司成立于1971年，公司成立以来，我们一直向市民提供高品质的装置。我们位于北京市，有超过2,000名员工，对北京市有着相当大的贡献。</blockquote>\n\n作为一个新的WordPress用户，您可以前往<a href=\"http://116.236.115.125:9000/production/futureshop/wp-admin/\">您的仪表盘</a>删除这个页面，并建立属于您的全新内容。祝您使用愉快！', '示例页面', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2017-06-19 15:57:52', '2017-06-19 07:57:52', '', '0', 'http://116.236.115.125:9000/production/futureshop/?page_id=2', '0', 'page', '', '0');
INSERT INTO `wp_posts` VALUES ('3', '1', '2017-06-19 15:58:14', '0000-00-00 00:00:00', '', '自动草稿', '', 'auto-draft', 'open', 'open', '', '', '', '', '2017-06-19 15:58:14', '0000-00-00 00:00:00', '', '0', 'http://116.236.115.125:9000/production/futureshop/?p=3', '0', 'post', '', '0');

-- ----------------------------
-- Table structure for `wp_term_relationships`
-- ----------------------------
DROP TABLE IF EXISTS `wp_term_relationships`;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_term_relationships
-- ----------------------------
INSERT INTO `wp_term_relationships` VALUES ('1', '1', '0');

-- ----------------------------
-- Table structure for `wp_term_taxonomy`
-- ----------------------------
DROP TABLE IF EXISTS `wp_term_taxonomy`;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_term_taxonomy
-- ----------------------------
INSERT INTO `wp_term_taxonomy` VALUES ('1', '1', 'category', '', '0', '1');

-- ----------------------------
-- Table structure for `wp_termmeta`
-- ----------------------------
DROP TABLE IF EXISTS `wp_termmeta`;
CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_termmeta
-- ----------------------------

-- ----------------------------
-- Table structure for `wp_terms`
-- ----------------------------
DROP TABLE IF EXISTS `wp_terms`;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_terms
-- ----------------------------
INSERT INTO `wp_terms` VALUES ('1', '未分类', 'uncategorized', '0');

-- ----------------------------
-- Table structure for `wp_usermeta`
-- ----------------------------
DROP TABLE IF EXISTS `wp_usermeta`;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_usermeta
-- ----------------------------
INSERT INTO `wp_usermeta` VALUES ('1', '1', 'nickname', 'admin');
INSERT INTO `wp_usermeta` VALUES ('2', '1', 'first_name', '');
INSERT INTO `wp_usermeta` VALUES ('3', '1', 'last_name', '');
INSERT INTO `wp_usermeta` VALUES ('4', '1', 'description', '');
INSERT INTO `wp_usermeta` VALUES ('5', '1', 'rich_editing', 'true');
INSERT INTO `wp_usermeta` VALUES ('6', '1', 'comment_shortcuts', 'false');
INSERT INTO `wp_usermeta` VALUES ('7', '1', 'admin_color', 'fresh');
INSERT INTO `wp_usermeta` VALUES ('8', '1', 'use_ssl', '0');
INSERT INTO `wp_usermeta` VALUES ('9', '1', 'show_admin_bar_front', 'true');
INSERT INTO `wp_usermeta` VALUES ('10', '1', 'locale', '');
INSERT INTO `wp_usermeta` VALUES ('11', '1', 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}');
INSERT INTO `wp_usermeta` VALUES ('12', '1', 'wp_user_level', '10');
INSERT INTO `wp_usermeta` VALUES ('13', '1', 'dismissed_wp_pointers', '');
INSERT INTO `wp_usermeta` VALUES ('14', '1', 'show_welcome_panel', '1');
INSERT INTO `wp_usermeta` VALUES ('15', '1', 'session_tokens', 'a:1:{s:64:\"1f076f94a5dde3448056b0f3e343770cff475f8443776f60356c7c853acae7f7\";a:4:{s:10:\"expiration\";i:1498031890;s:2:\"ip\";s:14:\"114.95.187.190\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36\";s:5:\"login\";i:1497859090;}}');
INSERT INTO `wp_usermeta` VALUES ('16', '1', 'wp_dashboard_quick_press_last_post_id', '3');

-- ----------------------------
-- Table structure for `wp_users`
-- ----------------------------
DROP TABLE IF EXISTS `wp_users`;
CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_users
-- ----------------------------
INSERT INTO `wp_users` VALUES ('1', 'admin', '$P$BjxBhZcwxpRv6e3qEjF1Xznvax37lc/', 'admin', 'fmsdwifull@sina.com', '', '2017-06-19 07:57:52', '', '0', 'admin');
