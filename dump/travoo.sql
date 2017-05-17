/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.0.17-MariaDB : Database - travoo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `history` */

DROP TABLE IF EXISTS `history`;

CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `entity_id` int(10) unsigned DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `history_type_id_foreign` (`type_id`),
  KEY `history_user_id_foreign` (`user_id`),
  CONSTRAINT `history_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `history_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `history` */

insert  into `history`(`id`,`type_id`,`user_id`,`entity_id`,`icon`,`class`,`text`,`assets`,`created_at`,`updated_at`) values (1,1,1,4,'plus','bg-green','trans(\"history.backend.users.created\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"test\",4]}','2017-05-16 18:13:36','2017-05-16 18:13:36'),(2,1,1,5,'plus','bg-green','trans(\"history.backend.users.created\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"sdafads\",5]}','2017-05-16 18:47:16','2017-05-16 18:47:16'),(3,1,1,3,'save','bg-aqua','trans(\"history.backend.users.updated\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"Default User\",3]}','2017-05-17 11:17:27','2017-05-17 11:17:27'),(4,1,1,3,'save','bg-aqua','trans(\"history.backend.users.updated\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"Default User\",3]}','2017-05-17 11:22:34','2017-05-17 11:22:34'),(5,1,1,3,'save','bg-aqua','trans(\"history.backend.users.updated\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"Default User\",3]}','2017-05-17 11:23:03','2017-05-17 11:23:03'),(6,1,1,3,'save','bg-aqua','trans(\"history.backend.users.updated\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"Default User\",3]}','2017-05-17 11:25:30','2017-05-17 11:25:30'),(7,1,1,6,'plus','bg-green','trans(\"history.backend.users.created\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"dasdasd\",6]}','2017-05-17 11:31:37','2017-05-17 11:31:37'),(8,1,1,6,'trash','bg-maroon','trans(\"history.backend.users.deleted\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"dasdasd\",6]}','2017-05-17 11:36:06','2017-05-17 11:36:06'),(9,1,1,3,'times','bg-yellow','trans(\"history.backend.users.deactivated\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"Default User\",3]}','2017-05-17 11:36:18','2017-05-17 11:36:18'),(10,1,1,3,'check','bg-green','trans(\"history.backend.users.reactivated\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"Default User\",3]}','2017-05-17 11:36:25','2017-05-17 11:36:25'),(11,1,1,6,'refresh','bg-aqua','trans(\"history.backend.users.restored\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"dasdasd\",6]}','2017-05-17 11:36:32','2017-05-17 11:36:32'),(12,1,1,7,'plus','bg-green','trans(\"history.backend.users.created\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"test\",7]}','2017-05-17 13:10:42','2017-05-17 13:10:42'),(13,1,1,8,'plus','bg-green','trans(\"history.backend.users.created\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"test33\",8]}','2017-05-17 13:41:26','2017-05-17 13:41:26'),(14,1,1,8,'save','bg-aqua','trans(\"history.backend.users.updated\") <strong>{user}</strong>','{\"user_link\":[\"admin.access.user.show\",\"test33\",8]}','2017-05-17 13:58:53','2017-05-17 13:58:53');

/*Table structure for table `history_types` */

DROP TABLE IF EXISTS `history_types`;

CREATE TABLE `history_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `history_types` */

insert  into `history_types`(`id`,`name`,`created_at`,`updated_at`) values (1,'User','2017-05-16 11:13:26','2017-05-16 11:13:26'),(2,'Role','2017-05-16 11:13:26','2017-05-16 11:13:26');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2015_12_28_171741_create_social_logins_table',1),(4,'2015_12_29_015055_setup_access_tables',1),(5,'2016_07_03_062439_create_history_tables',1),(6,'2017_04_04_131153_create_sessions_table',1),(7,'2017_05_16_114915_ALTER_USERS',2),(8,'2017_05_17_072514_ALTER_USER_TABLE',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`id`,`permission_id`,`role_id`) values (1,1,2);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`display_name`,`sort`,`created_at`,`updated_at`) values (1,'view-backend','View Backend',1,'2017-05-16 11:13:25','2017-05-16 11:13:25');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`user_id`,`role_id`) values (1,1,1),(2,2,2),(9,3,3),(10,6,2),(11,7,1),(13,8,1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`all`,`sort`,`created_at`,`updated_at`) values (1,'Administrator',1,1,'2017-05-16 11:13:24','2017-05-16 11:13:24'),(2,'Executive',0,2,'2017-05-16 11:13:24','2017-05-16 11:13:24'),(3,'User',0,3,'2017-05-16 11:13:24','2017-05-16 11:13:24');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values ('b951Pn9xjoGtuJfNSHi7XC6v1UT4Oemma60u0wrT',1,'127.0.0.1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0','ZXlKcGRpSTZJbUpDY0U1QlpTdEhTVk5yZFZZeVlsTTJVRGRyTTFFOVBTSXNJblpoYkhWbElqb2labXRTU0VwQlEyTmhZazFyTTJoTlkzRkZOMDljTDFGTldURndNMHRKUkdWY0wzZFFaMEp6VGxabVEzSkhPRVp6Um1SaGFVWllVMHhxZEZOd1RFbEJNRXBjTDJFMFUxZDFSR3AxTlU5RFYwbzViVFl3VG5kNVpXOXNXVVJEVmxoY0x6VlVSa1J3ZGxKU2JtNUNWVVIzTW5kTVNXMW5jREZXVlhGcmNWUTRlR1I0TkVWa1ZEZG9NV1pWYUhvMlEzWm5ObGgwU0RaV1pXRmFXRWt5UjJaVFlrdzBiVXRPUkRCU2REQkNTM0ZXTXpjM1pFZEhka3BMY0d0aWQxTjZVM0psZW1OdmJGbEVjV04yTUdKRWJFcFljRXRWYjFwSVlWSmFTRWR3VGpKS2QzazVTMVkxVFZkM1lVNDJVakoxWW1WVlJtMU1jRmd3VFZselptbGtSRUUxVUhaRGQwUlpTMUZCYm5kaWExWnNaM1l4Y0Zsc2JXOWFla2hCV0N0RVoyTnFiM296WW5aU09XTktSWGx5VlRKa1ZHWkpUMlYyVVRkeFlWcHJaRUZQV0RsU01FWjNhVVZHVlUxWVluZHZNalZ0U25SQlprcFdTM05tVkZoWGEyRjBiRGR4YkhaSVdtUlBNRWRSWEM5RFpXcHBlRlpNTVRsd2RFOU9WRmhoVGtSNVdrRldLMGhGYzJOU1RFbE1jSFEyVkV4V2RrSlFNR05wTjBGMldrWm5aRlJ2Y21WeWNGRlNSREo2V0VwVmNHSTNTR0p6WWtGR2MwOUxaamhHUkRKaE4xaEpkM05UVFRoaWVEWlNYQzloYld0cVhDOTNZMFp6YUROak1YZDVlR3RUVFVKek5qRm5PRVp6UjNkaVJFOXFiV3gzUFNJc0ltMWhZeUk2SW1VMlpHRXhObU01WlROa1lUVTNOR0V3T0dZME9EWTNaakUwWkRBM05HVTJPV1V5WW1KaVpXTXdaamhqT1Rkall6bGpOR0l4TlRJelpHVXlabVl3TXpNaWZRPT0=',1495029722),('JLkHG4rVDW0SHHDccVUTEO5BmJgvv51Me4BQDrtU',1,'127.0.0.1','Mozilla/5.0 (Windows NT 6.2; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0','ZXlKcGRpSTZJbk1yVUV4aVl6QnlWRkJSUmtkTVkyeGxZazFsYTNjOVBTSXNJblpoYkhWbElqb2lNMFYxTVNzMGNHTjNTRGRqTVU1S1MwTkpiakJXWkcxV00yaGNMMDFUYUhGU1luVXhURlJWUjJKUmVVMXBaRTVKYzI1VGNVMDJVV3gwVUhORllrdG1ZMGhtUkd0cE5WRllkVzFUTmpKY0wwZFBjM2xLZDFwRE4yeFRiVGRDUWxSWVdWVTNVMVpoYWxoSlJHNWpkVWhaVUdvcldIVlBOR295VjBaWFUzSlhla1ZwU2xWTlVWVmhjVlZXU0VOcmFURlJSMmNyU2xSVlJ6Vk5NM0p5VkRKVmRXSlpkakZQYkU1TmFuRlZOblZ3VjBGSk0wMXBPWEZMVm5KV1YwaHpUa05hWnpNMlZHNXJSelU0V1hkT1JrcGphRE53SzFnNGRIaDBaVE54VkU5M2IwOUlUbFpjTDNkNGNFRkpkalpISzIxdlhDODBSazFpUlZKRE1HZHVaamxRYVcwNE9GTm5lVlprYkd0dE5qSkViVlZVUkZkbGFVUTBhR2tyU1VWVk9IUlROR1UyUVhGaFIzSmpORmczYVZCcVltNTVTbTFzVDBkeU5GRkRPVEJzWkRGTVNWRnFiRlpTVW1kSmJEaE9TMFZJVUVwTmJrSkhTVFpTY0RWVFRrWnphekZtUWxSMU9ETk9TRk52YkdsNmNVbE5abmw0ZDNkY0wxd3ZRbVkwVmpaY0wyMVVjM0ZqUkRWTWRHaEhSRFF5VUV0cGJqZHZORU5pYjNwUksxRjVhbFY0VDBkU09VbHVjVzVtYlVwYU9XOUJiamQzZVdGUVdIaDRiR0YyTjFkblQyUlhhRVpoTldFd2VHTkxURnA0WEM5alIzZHJOa1Y2YXpKalZVNHlaejA5SWl3aWJXRmpJam9pWkRZMU5ETmxaamRsTTJJd016RTVPVFV6WkRnek5EUTJOakk0TmpSa1l6VmpOekl6TW1OaU16bGtPR1F3TUdJM05URTROVGcwTlRjMVpXSm1aamc0TmlKOQ==',1495007088);

/*Table structure for table `social_logins` */

DROP TABLE IF EXISTS `social_logins`;

CREATE TABLE `social_logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_logins_user_id_foreign` (`user_id`),
  CONSTRAINT `social_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_logins` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `single` tinyint(2) DEFAULT NULL,
  `gender` tinyint(2) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `age` int(10) DEFAULT NULL,
  `profile_picture` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `nationality` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `public_profile` tinyint(1) DEFAULT NULL,
  `notifications` tinyint(1) DEFAULT NULL,
  `messages` tinyint(1) DEFAULT NULL,
  `sms` tinyint(1) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `travel_type` int(10) DEFAULT NULL,
  `display_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`username`,`email`,`address`,`single`,`gender`,`children`,`age`,`profile_picture`,`mobile`,`status`,`nationality`,`public_profile`,`notifications`,`messages`,`sms`,`password`,`confirmation_code`,`confirmed`,`remember_token`,`created_at`,`updated_at`,`deleted_at`,`last_login`,`travel_type`,`display_name`) values (1,'Admin Istrator','','admin@admin.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'$2y$10$bYCfkiUKdmCkKAk13reFOuCEhYecpr/B5O0qAV/FXrKwmqkXUEK8q','f252e56e91d0416d69599197c3abc0dc',1,'up2XCwkMyZl8nYCjbjJRRw7UOEaIv6NYmOOhABnsJFhjugzlxR9X0r0XLuYM','2017-05-16 11:13:23','2017-05-16 11:13:23',NULL,NULL,NULL,NULL),(2,'Backend User','','executive@executive.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'$2y$10$VxvKDihoP8qOj4k.w/mNi.SeYq9bHKqSGDc6Td6DwWQ/74puCJ3VO','f1f393f3da14da35a7be3474d9989f08',1,NULL,'2017-05-16 11:13:24','2017-05-16 11:13:24',NULL,NULL,NULL,NULL),(3,'Default User','test1','user@user.com','21212121',12,0,NULL,21,'1495020330_1821907.JPG','12121212121',1,'Afghanistan',NULL,NULL,1,1,'$2y$10$Z0AnB3nro8loaxVBme./2OGIpcx.dpazpCiyRTIy2/dTcfdteHlyi','bbcbc48b93c8f5e6ead19fad02f34ed4',1,'bZ2ELD2G3x2gk2qqqYaKaPNXo70kGtlOzMck8g5lXDdmeee3eBP8Ye6nUuA3','2017-05-16 11:13:24','2017-05-17 11:36:25',NULL,NULL,NULL,NULL),(6,'dasdasd','dasddsa','sdas@dsdsa.com','jhgjdsgfjdsgfhjsd',21,0,NULL,21,'1495020697_659189.png','21212121212121',1,'American Samoa',1,1,1,1,'$2y$10$mzLCyvYCCEqiEtlu9LSDveLv2TGFtEo9.Lgy/JvWXUXQumdi64wy.','04dba97edcb03a32b4ed291e747999aa',1,NULL,'2017-05-17 11:31:37','2017-05-17 11:36:32',NULL,NULL,NULL,NULL),(7,'test','test@test.com','test@test.com','wewewq',21,0,NULL,21,'1495026642_4422003.png','+923434010228',1,'Afghanistan',1,1,1,1,'$2y$10$XLGB.tyLzd07egDkvSjiL.1AWuTw5lSzpTU978aCiMzJFCkkBCp2O','5ce0b71e5c64e182f26f0ec63f59f3fe',1,NULL,'2017-05-17 13:10:42','2017-05-17 13:10:42',NULL,NULL,NULL,NULL),(8,'test33','test3232','test1@sasa.com','ajkhsajhskhak',21,0,NULL,21,NULL,'+92 343 4010200',1,'Afghanistan',1,1,1,1,'$2y$10$EGIzDXxyqe/9IWKqNEhQYOandaFh.8sqHLdc8ooA0iSe3aEWSrRBS','47edcd69b123c47bab3100385e5f43fb',1,NULL,'2017-05-17 13:41:26','2017-05-17 13:58:53',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
