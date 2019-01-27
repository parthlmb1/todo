CREATE TABLE `lists` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(191) DEFAULT NULL,
 `description` text,
 `status` int(11) DEFAULT '0',
 `created_at` timestamp NULL DEFAULT NULL,
 `updated_at` timestamp NULL DEFAULT NULL,
 `deleted_at` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
);