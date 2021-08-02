/*
 Navicat Premium Data Transfer

 Source Server         : Zent_HW01
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : sneaker_laravel21

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 02/08/2021 16:16:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  UNIQUE INDEX `cache_key_unique`(`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cache
-- ----------------------------
INSERT INTO `cache` VALUES ('laravel_cachecategories', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":1:{s:8:\"\0*\0items\";a:7:{i:0;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Nike\";s:4:\"slug\";s:4:\"nike\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Nike\";s:4:\"slug\";s:4:\"nike\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:2;s:4:\"name\";s:6:\"Adidas\";s:4:\"slug\";s:6:\"adidas\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:3;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:2;s:4:\"name\";s:6:\"Adidas\";s:4:\"slug\";s:6:\"adidas\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:3;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:4:\"name\";s:8:\"Converse\";s:4:\"slug\";s:8:\"converse\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:4:\"name\";s:8:\"Converse\";s:4:\"slug\";s:8:\"converse\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:4;s:4:\"name\";s:4:\"Vans\";s:4:\"slug\";s:4:\"vans\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:1;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:4;s:4:\"name\";s:4:\"Vans\";s:4:\"slug\";s:4:\"vans\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:1;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:5;s:4:\"name\";s:10:\"Balenciaga\";s:4:\"slug\";s:10:\"balenciaga\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:5;s:4:\"name\";s:10:\"Balenciaga\";s:4:\"slug\";s:10:\"balenciaga\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:5;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:6;s:4:\"name\";s:5:\"Bitis\";s:4:\"slug\";s:5:\"bitis\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:6;s:4:\"name\";s:5:\"Bitis\";s:4:\"slug\";s:5:\"bitis\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:6;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:8;s:4:\"name\";s:7:\"Reebokz\";s:4:\"slug\";s:7:\"reebokz\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-06-20 15:55:16\";s:10:\"updated_at\";s:19:\"2021-06-24 14:28:03\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:8;s:4:\"name\";s:7:\"Reebokz\";s:4:\"slug\";s:7:\"reebokz\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-06-20 15:55:16\";s:10:\"updated_at\";s:19:\"2021-06-24 14:28:03\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}', 1624548341);
INSERT INTO `cache` VALUES ('laravel_cachemenus', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":1:{s:8:\"\0*\0items\";a:4:{i:0;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Nike\";s:4:\"slug\";s:4:\"nike\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Nike\";s:4:\"slug\";s:4:\"nike\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:4:\"name\";s:8:\"Converse\";s:4:\"slug\";s:8:\"converse\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:4:\"name\";s:8:\"Converse\";s:4:\"slug\";s:8:\"converse\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:5;s:4:\"name\";s:10:\"Balenciaga\";s:4:\"slug\";s:10:\"balenciaga\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:5;s:4:\"name\";s:10:\"Balenciaga\";s:4:\"slug\";s:10:\"balenciaga\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:6;s:4:\"name\";s:5:\"Bitis\";s:4:\"slug\";s:5:\"bitis\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:6;s:4:\"name\";s:5:\"Bitis\";s:4:\"slug\";s:5:\"bitis\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}', 1626363708);
INSERT INTO `cache` VALUES ('tunzsneaker_cachemenus', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":1:{s:8:\"\0*\0items\";a:2:{i:0;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:12;s:4:\"name\";s:16:\"Giày thể thao\";s:4:\"slug\";s:13:\"giay-the-thao\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-07-17 10:46:36\";s:10:\"updated_at\";s:19:\"2021-07-22 02:38:16\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:12;s:4:\"name\";s:16:\"Giày thể thao\";s:4:\"slug\";s:13:\"giay-the-thao\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-07-17 10:46:36\";s:10:\"updated_at\";s:19:\"2021-07-22 02:38:16\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Category\":28:{s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:13;s:4:\"name\";s:18:\"Giày thời trang\";s:4:\"slug\";s:15:\"giay-thoi-trang\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-07-17 10:47:04\";s:10:\"updated_at\";s:19:\"2021-07-22 02:38:29\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:13;s:4:\"name\";s:18:\"Giày thời trang\";s:4:\"slug\";s:15:\"giay-thoi-trang\";s:7:\"user_id\";i:6;s:9:\"parent_id\";i:0;s:5:\"depth\";i:0;s:10:\"created_at\";s:19:\"2021-07-17 10:47:04\";s:10:\"updated_at\";s:19:\"2021-07-22 02:38:29\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}', 1627897276);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `parent_id` int NOT NULL DEFAULT 0,
  `depth` int NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Nike', 'nike', 6, 12, 0, NULL, '2021-07-17 10:49:07');
INSERT INTO `categories` VALUES (2, 'Adidas', 'adidas', 6, 13, 0, NULL, '2021-07-17 10:49:21');
INSERT INTO `categories` VALUES (3, 'Converse', 'converse', 6, 12, 0, NULL, '2021-07-17 10:49:31');
INSERT INTO `categories` VALUES (4, 'Vans 4.0', 'vans-40', 6, 12, 0, NULL, '2021-07-17 10:47:43');
INSERT INTO `categories` VALUES (5, 'Balenciaga', 'balenciaga', 6, 12, 0, NULL, '2021-07-17 10:50:03');
INSERT INTO `categories` VALUES (6, 'Bitis', 'bitis', 6, 13, 0, NULL, '2021-07-17 10:49:53');
INSERT INTO `categories` VALUES (12, 'Giày thể thao', 'giay-the-thao', 6, 0, 0, '2021-07-17 10:46:36', '2021-07-22 02:38:16');
INSERT INTO `categories` VALUES (13, 'Giày thời trang', 'giay-thoi-trang', 6, 0, 0, '2021-07-17 10:47:04', '2021-07-22 02:38:29');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (10, 6, 'Cho em hỏi mẫu này còn không ạ ?', 33, '2021-06-26 13:50:06', '2021-06-26 13:50:06', 0);
INSERT INTO `comments` VALUES (11, 23, 'Size 34 bao giờ có hàng vậy ạ ?', 33, '2021-06-26 14:13:02', '2021-07-27 05:35:35', 1);
INSERT INTO `comments` VALUES (12, 23, 'Chất quá .....', 33, '2021-06-26 15:20:30', '2021-06-27 16:18:10', 0);
INSERT INTO `comments` VALUES (13, 6, 'Chất', 61, '2021-06-29 13:57:13', '2021-07-27 05:14:59', 1);
INSERT INTO `comments` VALUES (14, 6, 'Được đấy', 61, '2021-07-27 04:32:14', '2021-07-27 04:32:14', 0);
INSERT INTO `comments` VALUES (15, 6, 'Chất đấy', 61, '2021-07-27 04:32:32', '2021-07-27 04:32:32', 0);
INSERT INTO `comments` VALUES (16, 6, 'Đẹp', 61, '2021-07-27 04:33:49', '2021-07-27 04:33:49', 0);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 157 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES (1, 'San Pham', NULL, 'https://salt.tikicdn.com/cache/w444/ts/product/e4/be/7b/e3171402652708086f1b4791a8c832cf.jpg', 0, NULL, NULL);
INSERT INTO `images` VALUES (2, 'San Pham', NULL, 'https://salt.tikicdn.com/cache/w444/ts/product/e4/be/7b/e3171402652708086f1b4791a8c832cf.jpg', 1, NULL, NULL);
INSERT INTO `images` VALUES (3, 'San Pham', NULL, 'https://salt.tikicdn.com/cache/w444/ts/product/e4/be/7b/e3171402652708086f1b4791a8c832cf.jpg', 2, NULL, NULL);
INSERT INTO `images` VALUES (4, 'San Pham', NULL, 'https://salt.tikicdn.com/cache/w444/ts/product/e4/be/7b/e3171402652708086f1b4791a8c832cf.jpg', 3, NULL, NULL);
INSERT INTO `images` VALUES (5, 'San Pham', NULL, 'https://salt.tikicdn.com/cache/w444/ts/product/e4/be/7b/e3171402652708086f1b4791a8c832cf.jpg', 4, NULL, NULL);
INSERT INTO `images` VALUES (30, '1_259094_ZM_ALT1.jpg', 'public', 'images/1_259094_ZM_ALT1.jpg', 28, '2021-06-18 07:28:53', '2021-06-18 07:28:53');
INSERT INTO `images` VALUES (31, 'shoes-ia58863.jpg', 'public', 'images/shoes-ia58863.jpg', 28, '2021-06-18 07:28:53', '2021-06-18 07:28:53');
INSERT INTO `images` VALUES (32, 'shoes-ia58863.jpg', 'public', 'images/shoes-ia58863.jpg', 29, '2021-06-18 07:53:47', '2021-06-18 07:53:47');
INSERT INTO `images` VALUES (33, 'shoes-ia58863.jpg', 'public', 'images/shoes-ia58863.jpg', 30, '2021-06-18 08:14:44', '2021-06-18 08:14:44');
INSERT INTO `images` VALUES (57, 'shoes-ia58863.jpg', 'public', 'images/shoes-ia58863.jpg', 18, '2021-06-19 00:45:15', '2021-06-19 00:45:15');
INSERT INTO `images` VALUES (58, 'unnamed.jpg', 'public', 'images/unnamed.jpg', 18, '2021-06-19 00:45:15', '2021-06-19 00:45:15');
INSERT INTO `images` VALUES (61, 'balenciaga-triple-s-black-replica.jpeg', 'public', 'images/balenciaga-triple-s-black-replica.jpeg', 25, '2021-06-19 07:58:42', '2021-06-19 07:58:42');
INSERT INTO `images` VALUES (62, 'giay_balen_3s_full_den_02.jpg', 'public', 'images/giay_balen_3s_full_den_02.jpg', 25, '2021-06-19 07:58:42', '2021-06-19 07:58:42');
INSERT INTO `images` VALUES (63, 'balenciaga-triple-s-black-replica.jpeg', 'public', 'images/balenciaga-triple-s-black-replica.jpeg', 25, '2021-06-19 07:58:51', '2021-06-19 07:58:51');
INSERT INTO `images` VALUES (64, 'giay_balen_3s_full_den_02.jpg', 'public', 'images/giay_balen_3s_full_den_02.jpg', 25, '2021-06-19 07:58:52', '2021-06-19 07:58:52');
INSERT INTO `images` VALUES (67, 'balenciaga-triple-s-xam-vang-replica-6.jpg', 'public', 'images/balenciaga-triple-s-xam-vang-replica-6.jpg', 24, '2021-06-19 08:04:03', '2021-06-19 08:04:03');
INSERT INTO `images` VALUES (68, 'giay-balenciaga-triple-s-xam-vang-replica.jpg', 'public', 'images/giay-balenciaga-triple-s-xam-vang-replica.jpg', 24, '2021-06-19 08:04:03', '2021-06-19 08:04:03');
INSERT INTO `images` VALUES (73, 'balenciaga_triple_s_blue_grande.jpg', 'public', 'images/balenciaga_triple_s_blue_grande.jpg', 21, '2021-06-19 08:13:24', '2021-06-19 08:13:24');
INSERT INTO `images` VALUES (74, 'Balenciaga-Triple-S-Cool-Blue-Grey-2.jpg', 'public', 'images/Balenciaga-Triple-S-Cool-Blue-Grey-2.jpg', 21, '2021-06-19 08:13:24', '2021-06-19 08:13:24');
INSERT INTO `images` VALUES (92, 'balenciaga_triple_s_blue_grande.jpg', 'public', 'images/balenciaga_triple_s_blue_grande.jpg', 47, '2021-06-24 11:08:00', '2021-06-24 11:08:00');
INSERT INTO `images` VALUES (93, '62c55de7f4199d157bc1b9f331e33a7c.jpg', 'public', 'images/62c55de7f4199d157bc1b9f331e33a7c.jpg', 48, '2021-06-24 15:43:28', '2021-06-24 15:43:28');
INSERT INTO `images` VALUES (94, '62c55de7f4199d157bc1b9f331e33a7c.jpg', 'public', 'images/62c55de7f4199d157bc1b9f331e33a7c.jpg', 49, '2021-06-24 17:02:58', '2021-06-24 17:02:58');
INSERT INTO `images` VALUES (95, '62c55de7f4199d157bc1b9f331e33a7c.jpg', 'public', 'images/62c55de7f4199d157bc1b9f331e33a7c.jpg', 50, '2021-06-25 16:45:40', '2021-06-25 16:45:40');
INSERT INTO `images` VALUES (96, '62c55de7f4199d157bc1b9f331e33a7c.jpg', 'public', 'images/62c55de7f4199d157bc1b9f331e33a7c.jpg', 51, '2021-06-25 16:50:00', '2021-06-25 16:50:00');
INSERT INTO `images` VALUES (103, 'adidasfalcon2.jpg', 'public', 'images/adidasfalcon2.jpg', 56, '2021-06-28 01:07:59', '2021-06-28 01:07:59');
INSERT INTO `images` VALUES (105, 'adidasfalcon4.jpg', 'public', 'images/adidasfalcon4.jpg', 56, '2021-06-28 01:07:59', '2021-06-28 01:07:59');
INSERT INTO `images` VALUES (106, 'adidasfalcon1.jpg', 'public', 'images/adidasfalcon1.jpg', 56, '2021-06-28 02:41:00', '2021-06-28 02:41:00');
INSERT INTO `images` VALUES (108, 'ultraboost1.jpg', 'public', 'images/ultraboost1.jpg', 57, '2021-06-28 03:05:25', '2021-06-28 03:05:25');
INSERT INTO `images` VALUES (109, 'ultraboost2.jpg', 'public', 'images/ultraboost2.jpg', 57, '2021-06-28 03:05:25', '2021-06-28 03:05:25');
INSERT INTO `images` VALUES (110, 'ultraboost3.jpg', 'public', 'images/ultraboost3.jpg', 57, '2021-06-28 03:05:25', '2021-06-28 03:05:25');
INSERT INTO `images` VALUES (111, 'ultraboost4.jpg', 'public', 'images/ultraboost4.jpg', 57, '2021-06-28 03:05:25', '2021-06-28 03:05:25');
INSERT INTO `images` VALUES (112, 'stansmith1.jpg', 'public', 'images/stansmith1.jpg', 58, '2021-06-28 03:14:41', '2021-06-28 03:14:41');
INSERT INTO `images` VALUES (113, 'stansmith2.jpg', 'public', 'images/stansmith2.jpg', 58, '2021-06-28 03:14:41', '2021-06-28 03:14:41');
INSERT INTO `images` VALUES (114, 'stansmith3.jpg', 'public', 'images/stansmith3.jpg', 58, '2021-06-28 03:14:41', '2021-06-28 03:14:41');
INSERT INTO `images` VALUES (115, 'alphabounce1.jpg', 'public', 'images/alphabounce1.jpg', 59, '2021-06-28 03:24:01', '2021-06-28 03:24:01');
INSERT INTO `images` VALUES (116, 'alphabounce2.jpg', 'public', 'images/alphabounce2.jpg', 59, '2021-06-28 03:24:01', '2021-06-28 03:24:01');
INSERT INTO `images` VALUES (117, 'alphabounce3.jpg', 'public', 'images/alphabounce3.jpg', 59, '2021-06-28 03:24:01', '2021-06-28 03:24:01');
INSERT INTO `images` VALUES (118, 'alphabounce4.jpg', 'public', 'images/alphabounce4.jpg', 59, '2021-06-28 03:24:01', '2021-06-28 03:24:01');
INSERT INTO `images` VALUES (119, 'prophere1.jpg', 'public', 'images/prophere1.jpg', 60, '2021-06-28 03:32:05', '2021-06-28 03:32:05');
INSERT INTO `images` VALUES (120, 'prophere2.jpg', 'public', 'images/prophere2.jpg', 60, '2021-06-28 03:32:05', '2021-06-28 03:32:05');
INSERT INTO `images` VALUES (121, 'prophere3.jpg', 'public', 'images/prophere3.jpg', 60, '2021-06-28 03:32:05', '2021-06-28 03:32:05');
INSERT INTO `images` VALUES (122, 'prophere4.jpg', 'public', 'images/prophere4.jpg', 60, '2021-06-28 03:32:05', '2021-06-28 03:32:05');
INSERT INTO `images` VALUES (123, 'yeeze1.jpg', 'public', 'images/yeeze1.jpg', 61, '2021-06-28 03:40:18', '2021-06-28 03:40:18');
INSERT INTO `images` VALUES (124, 'yeeze2.jpg', 'public', 'images/yeeze2.jpg', 61, '2021-06-28 03:40:18', '2021-06-28 03:40:18');
INSERT INTO `images` VALUES (125, 'yeeze3.jpg', 'public', 'images/yeeze3.jpg', 61, '2021-06-28 03:40:19', '2021-06-28 03:40:19');
INSERT INTO `images` VALUES (126, 'yeeze4.jpg', 'public', 'images/yeeze4.jpg', 61, '2021-06-28 03:40:19', '2021-06-28 03:40:19');
INSERT INTO `images` VALUES (127, 'nikeair1.jpg', 'public', 'images/nikeair1.jpg', 62, '2021-06-30 07:16:28', '2021-06-30 07:16:28');
INSERT INTO `images` VALUES (128, 'nikeair2.jpg', 'public', 'images/nikeair2.jpg', 62, '2021-06-30 07:16:28', '2021-06-30 07:16:28');
INSERT INTO `images` VALUES (129, 'nikeair3.jpg', 'public', 'images/nikeair3.jpg', 62, '2021-06-30 07:16:28', '2021-06-30 07:16:28');
INSERT INTO `images` VALUES (130, 'nikeair4.jpg', 'public', 'images/nikeair4.jpg', 62, '2021-06-30 07:16:28', '2021-06-30 07:16:28');
INSERT INTO `images` VALUES (131, 'nikedragon1.jpg', 'public', 'images/nikedragon1.jpg', 63, '2021-06-30 11:15:15', '2021-06-30 11:15:15');
INSERT INTO `images` VALUES (132, 'nikedragon3.jpg', 'public', 'images/nikedragon3.jpg', 63, '2021-06-30 11:15:15', '2021-06-30 11:15:15');
INSERT INTO `images` VALUES (133, 'nikedragon4.jpg', 'public', 'images/nikedragon4.jpg', 63, '2021-06-30 11:15:15', '2021-06-30 11:15:15');
INSERT INTO `images` VALUES (134, 'jordan41.jpg', 'public', 'images/jordan41.jpg', 26, '2021-06-30 11:37:45', '2021-06-30 11:37:45');
INSERT INTO `images` VALUES (135, 'jordan42.jpg', 'public', 'images/jordan42.jpg', 26, '2021-06-30 11:37:45', '2021-06-30 11:37:45');
INSERT INTO `images` VALUES (136, 'jordan43.jpg', 'public', 'images/jordan43.jpg', 26, '2021-06-30 11:37:45', '2021-06-30 11:37:45');
INSERT INTO `images` VALUES (137, 'jordan44.jpg', 'public', 'images/jordan44.jpg', 26, '2021-06-30 11:37:45', '2021-06-30 11:37:45');
INSERT INTO `images` VALUES (138, 'jordandior1.jpg', 'public', 'images/jordandior1.jpg', 20, '2021-06-30 11:49:41', '2021-06-30 11:49:41');
INSERT INTO `images` VALUES (139, 'jordandior2.jpg', 'public', 'images/jordandior2.jpg', 20, '2021-06-30 11:49:41', '2021-06-30 11:49:41');
INSERT INTO `images` VALUES (140, 'jordandior3.jpg', 'public', 'images/jordandior3.jpg', 20, '2021-06-30 11:49:41', '2021-06-30 11:49:41');
INSERT INTO `images` VALUES (141, 'jordanhight1.jpg', 'public', 'images/jordanhight1.jpg', 19, '2021-06-30 12:00:39', '2021-06-30 12:00:39');
INSERT INTO `images` VALUES (142, 'jordanhight2.jpg', 'public', 'images/jordanhight2.jpg', 19, '2021-06-30 12:00:39', '2021-06-30 12:00:39');
INSERT INTO `images` VALUES (143, 'jordanhight3.jpg', 'public', 'images/jordanhight3.jpg', 19, '2021-06-30 12:00:39', '2021-06-30 12:00:39');
INSERT INTO `images` VALUES (144, 'jordanhight5.jpg', 'public', 'images/jordanhight5.jpg', 19, '2021-06-30 12:00:39', '2021-06-30 12:00:39');
INSERT INTO `images` VALUES (145, 'adidasfalcon3.jpg', 'public', 'images/adidasfalcon3.jpg', 56, '2021-06-30 12:13:59', '2021-06-30 12:13:59');
INSERT INTO `images` VALUES (151, 'balencle1.jpg', 'public', 'images/balencle1.jpg', 33, '2021-07-17 14:57:12', '2021-07-17 14:57:12');
INSERT INTO `images` VALUES (152, 'balencle2.jpg', 'public', 'images/balencle2.jpg', 33, '2021-07-17 14:57:12', '2021-07-17 14:57:12');
INSERT INTO `images` VALUES (153, 'balencle3.jpg', 'public', 'images/balencle3.jpg', 33, '2021-07-17 14:57:12', '2021-07-17 14:57:12');
INSERT INTO `images` VALUES (154, 'balentrack1.jpg', 'public', 'images/balentrack1.jpg', 27, '2021-07-17 15:01:37', '2021-07-17 15:01:37');
INSERT INTO `images` VALUES (155, 'balentrack2.jpg', 'public', 'images/balentrack2.jpg', 27, '2021-07-17 15:01:37', '2021-07-17 15:01:37');
INSERT INTO `images` VALUES (156, 'balentrack3.jpg', 'public', 'images/balentrack3.jpg', 27, '2021-07-17 15:01:37', '2021-07-17 15:01:37');

-- ----------------------------
-- Table structure for import_product
-- ----------------------------
DROP TABLE IF EXISTS `import_product`;
CREATE TABLE `import_product`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `size` int NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `import_price` int NOT NULL,
  `import_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of import_product
-- ----------------------------
INSERT INTO `import_product` VALUES (1, 'Balenciaga Triple S White', 10, 37, 'FFFFFF', 30000, 11, 33, '2021-07-11 06:02:44', '2021-07-11 06:02:44');
INSERT INTO `import_product` VALUES (2, 'Air Force 1 Low x G-Dragon', 10, 43, 'ffffff', 1650000, 12, 63, '2021-07-12 07:43:52', '2021-07-12 07:43:52');
INSERT INTO `import_product` VALUES (3, 'Balenciaga Triple S White', 15, 37, 'FFFFFF', 30000, 13, 33, '2021-07-12 08:45:39', '2021-07-12 08:45:39');
INSERT INTO `import_product` VALUES (4, 'This is Product Test 4', 10, 38, 'ffffff', 12000, 13, 67, '2021-07-12 08:45:39', '2021-07-12 08:45:39');
INSERT INTO `import_product` VALUES (5, 'Balenciaga Triple S White', 10, 37, 'FFFFFF', 30000, 14, 33, '2021-07-13 15:43:46', '2021-07-13 15:43:46');
INSERT INTO `import_product` VALUES (6, 'Balenciaga Triple S White', 10, 37, 'FFFFFF', 30000, 15, 33, '2021-07-13 16:10:35', '2021-07-13 16:10:35');
INSERT INTO `import_product` VALUES (7, 'This is Product Test 4', 10, 42, '8e4343', 12000, 15, 67, '2021-07-13 16:10:35', '2021-07-13 16:10:35');
INSERT INTO `import_product` VALUES (8, 'Yeezy Boost 350', 10, 38, 'ea4d4d', 990, 16, 61, '2021-07-18 08:30:30', '2021-07-18 08:30:30');

-- ----------------------------
-- Table structure for imports
-- ----------------------------
DROP TABLE IF EXISTS `imports`;
CREATE TABLE `imports`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of imports
-- ----------------------------
INSERT INTO `imports` VALUES (9, 'Công ty MCope', '0123456789', 'Tx. Long Xuyên , H. Trương Ba , TP. Khánh Phúc', 300000, 6, 1, NULL, '2021-07-10 05:10:58', '2021-07-10 05:11:00');
INSERT INTO `imports` VALUES (10, 'Công ty MCope', '0123456789', 'Tx. Long Xuyên , H. Trương Ba , TP. Khánh Phúc', 15900000, 6, 1, NULL, '2021-07-10 05:22:05', '2021-07-10 05:22:08');
INSERT INTO `imports` VALUES (11, 'Công ty MCope', '0123456789', 'Tx. Long Xuyên , H. Trương Ba , TP. Khánh Phúc', 300000, 6, 1, NULL, '2021-07-11 06:02:44', '2021-07-11 06:02:47');
INSERT INTO `imports` VALUES (12, 'Công ty TNHH Piscoz', '0345222515', 'Tx. Phú Nông , H. Thái An , TP. Hà Tuyên', 16500000, 6, 1, NULL, '2021-07-12 07:43:52', '2021-07-12 08:29:55');
INSERT INTO `imports` VALUES (13, 'Công ty MCope', '0123456789', 'Tx. Long Xuyên , H. Trương Ba , TP. Khánh Phúc', 570000, 6, 1, NULL, '2021-07-12 08:45:39', '2021-07-12 08:45:43');
INSERT INTO `imports` VALUES (14, 'Công ty TNHH Piscoz', '0345222515', 'Tx. Phú Nông , H. Thái An , TP. Hà Tuyên', 300000, 6, -1, NULL, '2021-07-13 15:43:45', '2021-07-13 16:09:48');
INSERT INTO `imports` VALUES (15, 'Công ty TNHH Piscoz', '0345222515', 'Tx. Phú Nông , H. Thái An , TP. Hà Tuyên', 420000, 6, 1, NULL, '2021-07-13 16:10:35', '2021-07-13 16:10:39');
INSERT INTO `imports` VALUES (16, 'Công ty MCope', '0123456789', 'Tx. Long Xuyên , H. Trương Ba , TP. Khánh Phúc', 9900, 6, 1, NULL, '2021-07-18 08:30:30', '2021-07-18 08:30:59');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 129 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (94, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (95, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (96, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (97, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (98, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (99, '2021_05_30_132056_create_products_table', 1);
INSERT INTO `migrations` VALUES (100, '2021_05_30_134614_create_images_table', 1);
INSERT INTO `migrations` VALUES (101, '2021_05_30_134626_create_categories_table', 1);
INSERT INTO `migrations` VALUES (102, '2021_06_03_131528_create_users_info_table', 1);
INSERT INTO `migrations` VALUES (103, '2021_06_03_150612_create_orders_table', 1);
INSERT INTO `migrations` VALUES (104, '2021_06_03_150744_create_order_product_table', 1);
INSERT INTO `migrations` VALUES (105, '2021_06_06_131829_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (106, '2021_06_13_144016_add_disk_column_images_table', 1);
INSERT INTO `migrations` VALUES (107, '2021_06_20_154746_add_user_id_column_categories_table', 2);
INSERT INTO `migrations` VALUES (109, '2021_06_24_101510_add_content_more_column_products_table', 3);
INSERT INTO `migrations` VALUES (110, '2021_06_24_143401_create_cache_table', 4);
INSERT INTO `migrations` VALUES (111, '2021_06_25_033333_create_comments_table', 5);
INSERT INTO `migrations` VALUES (112, '2021_06_25_143835_create_warehouses_table', 6);
INSERT INTO `migrations` VALUES (113, '2021_06_25_144836_add_product_id_column_warehouses_table', 7);
INSERT INTO `migrations` VALUES (115, '2021_07_03_091805_add_additional_data_column_orderproduct_table', 9);
INSERT INTO `migrations` VALUES (116, '2021_07_03_090446_add_additional_data_column_order_table', 10);
INSERT INTO `migrations` VALUES (117, '2021_07_03_105248_add_note_column_orders_table', 11);
INSERT INTO `migrations` VALUES (118, '2021_07_04_103232_add_inventory_column_warehouses_table', 12);
INSERT INTO `migrations` VALUES (119, '2021_07_09_021825_create_suppliers_table', 13);
INSERT INTO `migrations` VALUES (121, '2021_07_09_141929_create_imports_table', 14);
INSERT INTO `migrations` VALUES (125, '2021_07_11_060008_create_import_product_table', 15);
INSERT INTO `migrations` VALUES (126, '2021_07_11_060127_create_statisticals_table', 16);
INSERT INTO `migrations` VALUES (127, '2021_07_16_160911_add_updated_at_column_password_resets_table', 17);
INSERT INTO `migrations` VALUES (128, '2021_07_27_042024_add_status_column_comments_table', 18);

-- ----------------------------
-- Table structure for order_product
-- ----------------------------
DROP TABLE IF EXISTS `order_product`;
CREATE TABLE `order_product`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `size` int NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 113 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_product
-- ----------------------------
INSERT INTO `order_product` VALUES (77, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 69, 61, '2021-07-12 16:15:35', '2021-07-12 16:15:35');
INSERT INTO `order_product` VALUES (78, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 70, 61, '2021-07-13 01:08:56', '2021-07-13 01:08:56');
INSERT INTO `order_product` VALUES (79, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 71, 61, '2021-07-13 01:12:09', '2021-07-13 01:12:09');
INSERT INTO `order_product` VALUES (80, 'Adidas Prophere Triple', 1, 40, '000000', 1490000, 72, 60, '2021-07-13 01:14:20', '2021-07-13 01:14:20');
INSERT INTO `order_product` VALUES (81, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 73, 61, '2021-07-13 01:15:36', '2021-07-13 01:15:36');
INSERT INTO `order_product` VALUES (82, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 74, 61, '2021-07-13 01:16:44', '2021-07-13 01:16:44');
INSERT INTO `order_product` VALUES (83, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 75, 61, '2021-07-13 01:21:36', '2021-07-13 01:21:36');
INSERT INTO `order_product` VALUES (84, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 76, 61, '2021-07-13 04:07:18', '2021-07-13 04:07:18');
INSERT INTO `order_product` VALUES (85, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 77, 61, '2021-07-13 16:07:43', '2021-07-13 16:07:43');
INSERT INTO `order_product` VALUES (86, 'Air Force 1 Low x G-Dragon', 1, 37, '000000', 11250000, 78, 63, '2021-07-14 01:03:04', '2021-07-14 01:03:04');
INSERT INTO `order_product` VALUES (87, 'Adidas Ultra Boost 4.0', 1, 36, 'd1cccc', 1850000, 79, 57, '2021-07-14 01:04:39', '2021-07-14 01:04:39');
INSERT INTO `order_product` VALUES (88, 'Adidas Prophere Triple', 3, 40, '000000', 1490000, 80, 60, '2021-07-14 01:06:24', '2021-07-14 01:06:24');
INSERT INTO `order_product` VALUES (89, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 81, 61, '2021-07-14 01:07:49', '2021-07-14 01:07:49');
INSERT INTO `order_product` VALUES (90, 'Air Jordan 4 Retro', 1, 37, '000000', 11150000, 82, 26, '2021-07-14 01:10:44', '2021-07-14 01:10:44');
INSERT INTO `order_product` VALUES (91, 'Adidas Prophere Triple', 1, 40, '000000', 1490000, 83, 60, '2021-07-15 09:10:54', '2021-07-15 09:10:54');
INSERT INTO `order_product` VALUES (92, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 84, 61, '2021-07-15 09:29:45', '2021-07-15 09:29:45');
INSERT INTO `order_product` VALUES (93, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 85, 61, '2021-07-15 09:32:24', '2021-07-15 09:32:24');
INSERT INTO `order_product` VALUES (94, 'Adidas Falcon Crystal', 1, 37, 'ff0000', 1825000, 86, 56, '2021-07-15 14:33:34', '2021-07-15 14:33:34');
INSERT INTO `order_product` VALUES (95, 'Adidas Stan Smith', 1, 36, 'ffffff', 1725000, 87, 58, '2021-07-15 14:37:29', '2021-07-15 14:37:29');
INSERT INTO `order_product` VALUES (96, 'Adidas Stan Smith', 1, 36, 'ffffff', 1725000, 88, 58, '2021-07-15 14:39:40', '2021-07-15 14:39:40');
INSERT INTO `order_product` VALUES (97, 'Adidas  Alpha Bounce Instinct', 1, 38, 'ffffff', 1575000, 89, 59, '2021-07-15 14:42:06', '2021-07-15 14:42:06');
INSERT INTO `order_product` VALUES (98, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 90, 61, '2021-07-15 14:47:39', '2021-07-15 14:47:39');
INSERT INTO `order_product` VALUES (99, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 91, 61, '2021-07-15 14:48:53', '2021-07-15 14:48:53');
INSERT INTO `order_product` VALUES (100, 'Adidas Prophere Triple', 1, 40, '000000', 1490000, 92, 60, '2021-07-15 14:54:50', '2021-07-15 14:54:50');
INSERT INTO `order_product` VALUES (101, 'Nike Jordan Red', 1, 37, 'ff0000', 1959000, 93, 19, '2021-07-15 14:57:29', '2021-07-15 14:57:29');
INSERT INTO `order_product` VALUES (102, 'Adidas Prophere Triple', 1, 40, '000000', 1490000, 94, 60, '2021-07-15 15:35:13', '2021-07-15 15:35:13');
INSERT INTO `order_product` VALUES (103, 'Adidas Ultra Boost 4.0', 1, 36, 'd1cccc', 1850000, 95, 57, '2021-07-15 15:44:57', '2021-07-15 15:44:57');
INSERT INTO `order_product` VALUES (104, 'Adidas Ultra Boost 4.0', 1, 36, 'd1cccc', 1850000, 96, 57, '2021-07-15 15:48:06', '2021-07-15 15:48:06');
INSERT INTO `order_product` VALUES (105, 'Nike Air Force 1', 1, 44, '000000', 11899000, 97, 62, '2021-07-15 15:49:16', '2021-07-15 15:49:16');
INSERT INTO `order_product` VALUES (106, 'Nike Air Force 1', 1, 44, '000000', 11899000, 98, 62, '2021-07-15 16:12:34', '2021-07-15 16:12:34');
INSERT INTO `order_product` VALUES (107, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399000, 99, 61, '2021-07-15 16:50:11', '2021-07-15 16:50:11');
INSERT INTO `order_product` VALUES (108, 'Nike Air Force 1', 1, 44, '000000', 11899000, 100, 62, '2021-07-15 17:02:25', '2021-07-15 17:02:25');
INSERT INTO `order_product` VALUES (109, 'Air Force 1 Low x G-Dragon', 2, 37, '000000', 1125, 101, 63, '2021-07-18 08:17:21', '2021-07-18 08:17:21');
INSERT INTO `order_product` VALUES (110, 'Air Force 1 Low x G-Dragon', 3, 37, '000000', 1125, 102, 63, '2021-07-18 08:18:51', '2021-07-18 08:18:51');
INSERT INTO `order_product` VALUES (111, 'Balenciaga Track 3.0', 1, 36, 'ff0000', 315, 103, 27, '2021-07-22 04:03:14', '2021-07-22 04:03:14');
INSERT INTO `order_product` VALUES (112, 'Yeezy Boost 350', 1, 38, 'ea4d4d', 1399, 104, 61, '2021-07-28 10:33:58', '2021-07-28 10:33:58');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `user_id` int NOT NULL,
  `status` int NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 105 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (69, 'Lương Anh Tú', '0123456789', 'Việt Nam', 1399000, 6, -4, NULL, '2021-07-12 16:15:35', '2021-07-12 16:16:50');
INSERT INTO `orders` VALUES (70, 'mtklover1201', '0123456789', 'Ha Noi - Viet Nam', 1399000, 23, 3, NULL, '2021-07-13 01:08:56', '2021-07-13 04:00:52');
INSERT INTO `orders` VALUES (71, 'mtklover1201', '0123456789', 'Ha Noi - Viet Nam', 1399000, 23, -1, NULL, '2021-07-13 01:12:08', '2021-07-14 01:09:29');
INSERT INTO `orders` VALUES (72, 'mtklover1201', '0123456789', 'Ha Noi - Viet Nam', 1490000, 23, -1, NULL, '2021-07-13 01:14:19', '2021-07-14 01:09:33');
INSERT INTO `orders` VALUES (73, 'mtklover1201', '0123456789', 'Ha Noi - Viet Nam', 1399000, 23, -1, NULL, '2021-07-13 01:15:36', '2021-07-14 01:09:36');
INSERT INTO `orders` VALUES (74, 'mtklover1201', '0123456789', 'Ha Noi - Viet Nam', 1399000, 23, -1, NULL, '2021-07-13 01:16:44', '2021-07-14 01:09:39');
INSERT INTO `orders` VALUES (75, 'mtklover1201', '0123456789', 'Ha Noi - Viet Nam', 1399000, 23, -1, NULL, '2021-07-13 01:21:36', '2021-07-14 01:09:43');
INSERT INTO `orders` VALUES (76, 'mtklover1201', '0123456789', 'Ha Noi - Viet Nam', 1399000, 23, -5, NULL, '2021-07-13 04:07:17', '2021-07-13 04:07:25');
INSERT INTO `orders` VALUES (77, 'Lương Anh Tú', '0123456789', 'Việt Nam', 1399000, 6, -4, NULL, '2021-07-13 16:07:43', '2021-07-13 16:08:52');
INSERT INTO `orders` VALUES (78, 'Nguyễn Hữu Lộc', '0123456789', 'Ha Noi - Viet Nam', 11250000, 23, 3, NULL, '2021-07-14 01:03:03', '2021-07-14 01:03:20');
INSERT INTO `orders` VALUES (79, 'Phạm Thu Phương', '0345222515', 'Ha Noi - Viet Nam', 1850000, 20, 3, NULL, '2021-07-14 01:04:39', '2021-07-14 01:04:55');
INSERT INTO `orders` VALUES (80, 'Lê Thị Thùy Trang', '0264445211', 'Ha Noi', 4470000, 3, -4, NULL, '2021-07-14 01:06:24', '2021-07-15 07:53:52');
INSERT INTO `orders` VALUES (81, 'Lê Quang Lộc', '0123456789', 'Việt Nam', 1399000, 17, 3, NULL, '2021-07-14 01:07:49', '2021-07-14 01:08:02');
INSERT INTO `orders` VALUES (82, 'Chu Thị Linh', '0123456789', 'Việt Nam', 11150000, 16, 3, NULL, '2021-07-14 01:10:44', '2021-07-14 01:11:01');
INSERT INTO `orders` VALUES (83, 'Lê Thị Thùy Trang', '0264445211', 'Ha Noi', 1490000, 3, 3, NULL, '2021-07-15 09:10:53', '2021-07-15 09:13:05');
INSERT INTO `orders` VALUES (84, 'Lê Thị Thùy Trang', '0264445211', 'Ha Noi', 1399000, 3, 3, NULL, '2021-07-15 09:29:45', '2021-07-15 09:30:01');
INSERT INTO `orders` VALUES (85, 'Lê Thị Thùy Trang', '0264445211', 'Ha Noi', 1399000, 3, 3, NULL, '2021-07-15 09:32:24', '2021-07-15 09:32:40');
INSERT INTO `orders` VALUES (86, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1825000, 1, -4, NULL, '2021-07-15 14:33:34', '2021-07-23 02:20:55');
INSERT INTO `orders` VALUES (87, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1725000, 1, 1, NULL, '2021-07-15 14:37:29', '2021-07-15 14:37:39');
INSERT INTO `orders` VALUES (88, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1725000, 1, 1, NULL, '2021-07-15 14:39:40', '2021-07-15 14:39:49');
INSERT INTO `orders` VALUES (89, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1575000, 1, 1, NULL, '2021-07-15 14:42:06', '2021-07-15 14:42:23');
INSERT INTO `orders` VALUES (90, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1399000, 1, 1, NULL, '2021-07-15 14:47:39', '2021-07-15 14:47:52');
INSERT INTO `orders` VALUES (91, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1399000, 1, 1, NULL, '2021-07-15 14:48:53', '2021-07-15 14:49:04');
INSERT INTO `orders` VALUES (92, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1490000, 1, 1, NULL, '2021-07-15 14:54:50', '2021-07-15 14:55:00');
INSERT INTO `orders` VALUES (93, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1959000, 1, 1, NULL, '2021-07-15 14:57:29', '2021-07-15 14:59:57');
INSERT INTO `orders` VALUES (94, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1490000, 1, 1, NULL, '2021-07-15 15:35:13', '2021-07-15 15:35:25');
INSERT INTO `orders` VALUES (95, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1850000, 1, 1, NULL, '2021-07-15 15:44:57', '2021-07-15 15:45:22');
INSERT INTO `orders` VALUES (96, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1850000, 1, 1, NULL, '2021-07-15 15:48:06', '2021-07-15 15:48:17');
INSERT INTO `orders` VALUES (97, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 11899000, 1, 1, NULL, '2021-07-15 15:49:16', '2021-07-15 15:49:27');
INSERT INTO `orders` VALUES (98, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 11899000, 1, 1, NULL, '2021-07-15 16:12:34', '2021-07-15 16:12:54');
INSERT INTO `orders` VALUES (99, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 1399000, 1, 1, NULL, '2021-07-15 16:50:11', '2021-07-15 16:50:27');
INSERT INTO `orders` VALUES (100, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 11899000, 1, 1, NULL, '2021-07-15 17:02:25', '2021-07-15 17:02:33');
INSERT INTO `orders` VALUES (101, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 2250, 1, -5, NULL, '2021-07-18 08:17:21', '2021-07-18 08:18:02');
INSERT INTO `orders` VALUES (102, 'Đặng Anh Tú', '0698885777', 'Ha Noi', 3375, 1, -4, NULL, '2021-07-18 08:18:51', '2021-07-18 08:28:05');
INSERT INTO `orders` VALUES (103, 'Lương Anh Tú', '0123456789', 'Thái Hòa , Ba Vì , Hà Nội', 315, 6, -4, NULL, '2021-07-22 04:03:14', '2021-07-23 02:23:01');
INSERT INTO `orders` VALUES (104, 'Lương Anh Tú', '0123456789', 'Thái Hòa , Ba Vì , Hà Nội', 1399, 6, 3, NULL, '2021-07-28 10:33:57', '2021-07-28 10:41:43');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('dai.uy.mafia@gmail.com', 'S7fkZXzMhu9j6Y0kuoeCekkj3PPKYpJ5EcjAFwF6', '2021-07-22 04:18:42', '2021-07-22 04:18:42');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_price` int NOT NULL DEFAULT 0,
  `sale_price` int NOT NULL DEFAULT 0,
  `discount_percent` int NOT NULL DEFAULT 0,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `content_more` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `status` int NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (19, 'Nike Jordan Red', 'nike-jordan-red', 1250, 1959, 0, '<p> <span style = \"color: rgb (119, 119, 119); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px;\"> Là một sản phẩm Sản phẩm kết hợp tinh thần của Air Jordan với các chi tiết Off-White nổi bật. Đôi giày được trang bị điểm nhấn từ đường khâu, dấu ngoặc kép rải rác trên thân hay những chi tiết tái hiện táo bạo với chữ ký của Virgil Abloh. </span> <br> </p>', '{\"Form giày\": \"Đặc biệt nhất là sự hiện diện của câu nói nổi tiếng của Virgil về phần đệm và dây buộc.\", \"Đế dày\": \"Là điểm mạnh của Jordan 1 khi Nike ưu ái đệm \\\" túi khí \\ \"vào toàn bộ đế giày.\" Mềm mại và thoải mái là cảm giác mang cả ngày dài. \",\" Đặc biệt \":\" Đôi giày bóng rổ huyền thoại được đính các chi tiết. Các điểm nhấn nhỏ màu xanh và cam tạo điểm nhấn Swoosh, và phần gót cũng được bọc da với số \"85\" được in trên đó và một đế giữa màu trắng với từ “Air” để tượng trưng cho sự ra mắt của phiên bản Air Jordan 1 đầu tiên vào năm 1985. \"}', 6, 1, 0, NULL, '2021-07-18 05:57:07', NULL);
INSERT INTO `products` VALUES (20, 'Nike Jordan Dior', 'nike-jordan-dior', 1254, 3350, 0, '<p> <span style = \"color: rgb (119, 119, 119); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px;\"> Tất cả chi tiết chi tiết được thiết kế độc đáo với một màu trắng đồng nhất bao quanh toàn bộ thân giày. Sự xuất hiện của tông màu xám đến từ DIOR, vì đây là một trong những màu đặc trưng của hãng từ những ngày đầu thành lập năm 1947. </span> <br> </p>', '{\"Dây giày\": \"Màu be khác biệt, đậm phong cách thời trang\", \"Form giày\": \"Nike ưu ái đệm \\\" túi khí \\ \"vào toàn bộ đế giày. Mềm mại và thoải mái là cảm giác khi mang Air Force 1 cả ngày dài . \",\" Đế giày \":\" Đế 3cm giúp hack chiều cao đáng kể với họa tiết ngôi sao năm cánh in nổi giúp tăng độ bám và chống trượt khi di chuyển. \",\" Đặc biệt \":\" Thương hiệu cho cả hai hợp nhất với thiết kế Swoosh trên nền dệt Jacquard phía trên có chữ lồng của DIOR. \"}', 6, 1, 1, NULL, '2021-07-18 05:56:49', NULL);
INSERT INTO `products` VALUES (21, 'Converse Old K', 'converse-old-k', 2400, 3150, 0, '<p> <span style = \"color: rgb (119, 119, 119); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px;\"> Tất cả chi tiết chi tiết được thiết kế độc đáo với một màu trắng đồng nhất bao quanh toàn bộ thân giày. Sự xuất hiện của tông màu xám đến từ DIOR, vì đây là một trong những màu đặc trưng của hãng từ những ngày đầu thành lập năm 1947. </span> <br> </p>', '{\"Dây giày\": \"Dây phản quang đẹp\", \"Đế giày\": \"Đế giày được gia công khép kín, cao su chất lượng đạt tiêu chuẩn\", \"Hình thức\": \"Ôm chân, thoải mái thoáng mát\", \"Đặc biệt\": \"Mẫu mã đa dạng và màu sắc \"}', 6, 3, 1, '2021-06-15 04:02:26', '2021-07-18 05:56:23', NULL);
INSERT INTO `products` VALUES (24, 'Balenciaga Triple S', 'balenciaga-triple-s', 250, 450, 0, '<p> <span style = \"color: rgb (0, 0, 0); font-family:\" Roboto Condensed \"; text-align: center;\"> Yeezy Boost 350 được cho là một trong những thiết kế được yêu thích từ sự hợp tác giữa adidas và Kanye West. </span> <br> </p>', '{\"Ren\": \"Dây buộc chắc chắn\", \"Dạng giày\": \"Phần trên rèn với độ hỗ trợ cao\", \"Đế giày\": \"Đế ngoài bằng cao su lục địa cho lực kéo tuyệt vời ngay cả trên đường ướt và khô, Đế giữa có độ nảy linh hoạt\", \"Đặc biệt \":\" Công nghệ PINSI cho cảm giác thoải mái \"}', 6, 5, 1, '2021-06-16 09:02:56', '2021-07-18 06:03:22', NULL);
INSERT INTO `products` VALUES (25, 'Balenciaga Triple S Black', 'balenciaga-triple-s-black', 1660, 2500, 0, '<p> <span style = \"color: rgb (0, 0, 0); font-family: ChronicleText, Georgia, serif; letter-spacing: 0.4px;\"> Mỗi lần Balenciaga phát hành giày thể thao \'Triple S\' trong một colorway mới, nó bán hết nhanh - vì vậy đừng để đôi này trong danh sách mong muốn của bạn lâu. Được làm bằng đế cao su dày, được điêu khắc trông có vẻ đau khổ và mũ lưỡi trai lưới màu be nhạt, chúng có dây buộc sọc và tất nhiên, biểu tượng sans serif ở hai bên. </span> <br> </p>', '{\"Ren\": \"ATALIS Linh hoạt Ô\", \"Chất liệu\": \"Vải adidas Primeknit 360 hỗ trợ\", \"Đế ngoài giày\": \"Đế ngoài Stretchweb linh hoạt. Cao su lục địa. Đế giữa tăng cường độ nảy tốt. Công nghệ ổn định lò xo xoắn\", \"Đế giày Dạng \":\" Kiểu vòm: Bình thường. Gọng gót 3D nhẹ với khả năng thích ứng cao \"}', 6, 5, -1, '2021-06-16 09:31:37', '2021-07-18 05:55:39', NULL);
INSERT INTO `products` VALUES (26, 'Air Jordan 4 Retro', 'air-jordan-4-retro', 1065, 1115, 0, '<p> <span style = \"color: rgb (119, 119, 119); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px;\"> Đã cộng tác với De lệch Music, Virgil Abloh sẽ tặng 1 đôi Air Jordan 4 x OFF-WHITE phối màu “Sail”, chưa được phát hành, cho tổ chức này để gây quỹ cho chiến dịch Black Lives Matter. </span> </p>', '{\"Dây giày\": \"Dây phản quang đẹp\", \"Đế giày\": \"Đế giày được gia công khép kín, cao su chất lượng đạt tiêu chuẩn\", \"Hình thức\": \"Ôm chân, thoải mái thoáng mát\", \"Đặc biệt\": \"Mẫu mã đa dạng và màu sắc \"}', 6, 1, 1, '2021-06-16 11:11:05', '2021-07-18 05:55:12', NULL);
INSERT INTO `products` VALUES (27, 'Balenciaga Track 3.0', 'balenciaga-track-30', 250, 315, 0, '<p> <span style = \"color: rgb (0, 0, 0); font-family: ChronicleText, Georgia, serif; letter-spacing: 0.4px;\"> Mỗi lần Balenciaga phát hành giày thể thao \'Triple S\' trong một colorway mới, nó bán hết nhanh - vì vậy đừng để đôi này trong danh sách mong muốn của bạn lâu. Được làm bằng đế cao su dày, được điêu khắc trông có vẻ đau khổ và mũ lưỡi trai lưới màu be nhạt, chúng có dây buộc sọc và tất nhiên, biểu tượng sans serif ở hai bên. </span> <br> </p>', '{\"Dây giày\": \"Đế cao su có kích thước khoảng 60mm \\ / 2,5 inch\", \"Dạng giày\": \"Da và lưới màu be sáng\", \"Đế giày\": \"Mặt trước có ren\"}', 6, 5, 1, '2021-06-16 11:56:20', '2021-07-17 15:01:37', NULL);
INSERT INTO `products` VALUES (33, 'Balenciaga Triple S Pone', 'balenciaga-triple-s-pone', 250, 320, 0, '<p> <span style = \"color: rgb (0, 0, 0); font-family: ChronicleText, Georgia, serif; letter-spacing: 0.4px;\"> Mỗi lần Balenciaga phát hành giày thể thao \'Triple S\' trong một colorway mới, nó bán hết nhanh - vì vậy đừng để đôi này trong danh sách mong muốn của bạn lâu. Được làm bằng đế cao su dày, được điêu khắc trông có vẻ đau khổ và mũ lưỡi trai lưới màu be nhạt, chúng có dây buộc sọc và tất nhiên, biểu tượng sans serif ở hai bên. </span> <br> </p>', '{\"Dây giày\": \"Đế cao su có kích thước khoảng 60mm \\ / 2,5 inch\", \"Dạng giày\": \"Da và lưới màu be sáng\", \"Đế giày\": \"Mặt trước có ren\"}', 6, 5, 0, '2021-06-18 09:44:30', '2021-07-17 14:57:12', NULL);
INSERT INTO `products` VALUES (56, 'Adidas Falcon Crystal', 'adidas-falcon-crystal', 423, 650, 0, '<p> <span style = \"color: rgb (119, 119, 119); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px;\"> Adidas không khiến người hâm mộ bộ 3 -thương hiệu giày tiên tiến này gây thất vọng khi liên tục tung ra những mẫu giày thời trang, độc đáo và luôn cháy hàng trên mọi mặt trận. Falcon là một ví dụ điển hình về xu hướng đổi mới và không ngừng học hỏi của thương hiệu giày số 1 toàn cầu trong năm 2019. </span> <br> </p>', '{\"Ren\": \"Ren, có đầu bằng kim loại\", \"Dạng giày\": \"Phần trên giày có vảy rắn và các chi tiết dập nổi\", \"Đế\": \"Đế ngoài bằng cao su, hình bóng đậm, chất liệu EVA, lót in\", \"Nổi bật\" : \"Đường kẻ đậm và màu sắc nổi bật.\"}', 6, 2, 1, '2021-06-28 01:07:58', '2021-07-18 05:54:02', NULL);
INSERT INTO `products` VALUES (57, 'Adidas Ultra Boost 4.0', 'adidas-ultra-boost-40', 756, 1850, 0, '<p> <span style = \"color: rgb (0, 0, 0); font-family:\" Noto Sans \", AdihausDIN, Helvetica, Arial, sans-serif; white-space: pre-line;\"> Hoàn toàn mới kinh nghiệm chạy. Giày chạy trung tính hiệu suất cao này mang lại sự thoải mái và hồi phục năng lượng tối đa. Giày nhẹ có khả năng tạo lực đẩy. </span> <br> </p>', '{\"Ren\": \"ATALIS Linh hoạt Ô\", \"Chất liệu\": \"Vải adidas Primeknit 360 hỗ trợ\", \"Đế ngoài giày\": \"Đế ngoài Stretchweb linh hoạt. Cao su lục địa. Đế giữa tăng cường độ nảy tốt. Công nghệ ổn định lò xo xoắn\", \"Đế giày Dạng \":\" Kiểu vòm: Bình thường. Gọng gót 3D nhẹ với khả năng thích ứng cao \"}', 6, 2, 1, '2021-06-28 03:05:24', '2021-07-18 05:53:38', NULL);
INSERT INTO `products` VALUES (58, 'Adidas Stan Smith', 'adidas-stan-smith', 825, 1239, 0, '<p> <span style = \"color: rgb (0, 0, 0); font-family:\" Noto Sans \", AdihausDIN, Helvetica, Arial, sans-serif; white-space: pre-line;\"> Nhắc Khi nào nói đến dòng giày adidas Stan Smith thì phải nói đến thiết kế gọn gàng. Những đôi giày này được biết đến với vẻ ngoài tối giản, nhẹ nhàng. Một món đồ cổ điển trong 50 năm. </span> <br> </p>', '{\"Dây giày\": \"Dây buộc dày, siêu bền, tiêu chuẩn SMI 4.\", \"Dạng giày\": \"Giày làm bằng vật liệu tổng hợp\", \"Đế\": \"Đế ngoài bằng cao su: 95% cao su tự nhiên, 5% thành phần tái chế\", \"Đặc biệt\": \"Primegreen siêu bền\"}', 6, 2, 1, '2021-06-28 03:14:41', '2021-07-18 05:52:43', NULL);
INSERT INTO `products` VALUES (59, 'Adidas  Alpha Bounce Instinct', 'adidas-alpha-bounce-instinct', 995, 1575, 0, '<p> <span style = \"color: rgb (0, 0, 0); font-family:\" Noto Sans \", AdihausDIN, Helvetica, Arial, sans-serif; white-space: pre-line;\"> Chạy Mẫu giày được thiết kế cho những người chạy bộ muốn trở thành người giỏi nhất trong môn thể thao của họ. Lưới liền mạch phía trên với các vùng được gia cố để hỗ trợ chuyển động đa hướng. </span> <br> </p>', '{\"Ren\": \"Dây buộc chắc chắn\", \"Dạng giày\": \"Phần trên rèn với độ hỗ trợ cao\", \"Đế giày\": \"Đế ngoài bằng cao su lục địa cho lực kéo tuyệt vời ngay cả trên đường ướt và khô, Đế giữa có độ nảy linh hoạt\", \"Đặc biệt \":\" Công nghệ PINSI cho cảm giác thoải mái \"}', 6, 2, 1, '2021-06-28 03:24:01', '2021-07-18 05:52:26', NULL);
INSERT INTO `products` VALUES (60, 'Adidas Prophere Triple', 'adidas-prophere-triple', 920, 1490, 0, '<p> <span style = \"color: rgb (0, 0, 0); font-family:\" Noto Sans \", AdihausDIN, Helvetica, Arial, sans-serif; white-space: pre-line;\"> Apple Bold và không sợ hãi, giày Prophere được thiết kế cho những cá tính tỏa sáng trên đường phố. Giày có hình dáng nổi bật với đế giữa lượn sóng và phần hông được cắt cao. &nbsp; </span> <br> </p>', '{\"Ren\": \"Có dây buộc\", \"Dạng giày\": \"Phần trên dệt bằng da 3 sọc\", \"Đế ngoài của giày\": \"Đế ngoài bằng cao su; Đế giữa bằng cao su polyunrethane; Tận hưởng sự thoải mái và hiệu suất của lót OrthoLite\", \"Đặc biệt \":\" Cảm thấy được hỗ trợ và linh hoạt \"}', 6, 2, 0, '2021-06-28 03:32:05', '2021-07-18 05:52:15', NULL);
INSERT INTO `products` VALUES (61, 'Yeezy Boost 350', 'yeezy-boost-350', 990, 1399, 0, '<p> <span style = \"color: rgb (0, 0, 0); font-family:\" Roboto Condensed \"; text-align: center;\"> Yeezy Boost 350 được cho là một trong những thiết kế được yêu thích từ sự hợp tác giữa adidas và Kanye West. </span> <br> </p>', '{\"Dây giày\": \"Dây phản quang đẹp\", \"Đế giày\": \"Đế giày được gia công khép kín, cao su chất lượng đạt tiêu chuẩn\", \"Hình thức\": \"Ôm chân, thoải mái thoáng mát\", \"Đặc biệt\": \"Mẫu mã đa dạng và màu sắc \"}', 6, 2, 1, '2021-06-28 03:40:18', '2021-07-18 05:51:20', NULL);
INSERT INTO `products` VALUES (62, 'Nike Air Force 1', 'nike-air-force-1', 950, 1189, 0, '<p style = \"padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 1.5; color: rgb (0, 0, 0); font-family: & quot; Arial, Helvetica, sans-serif \"; font-size: 14px; \"> <span style =\" padding: 0px; lề: 0px; font-family: \"times new roman\", times, serif; font-size: 12pt; \"> Nike Air Force 1 được giới thiệu bởi nhà thiết kế lúc bấy giờ là Bruce Kilgore của Nike với định vị là dòng giày dành cho các vận động viên bóng rổ. Tất nhiên, sản phẩm đã cực kỳ thành công vào thời điểm đó. </span> </ p> <p style = \"padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; chiều cao dòng: 1,5; màu: rgb (0, 0, 0); font-family: \"Arial, Helvetica, sans-serif\"; font-size: 14px; \"> <span style =\" padding: 0px; lề: 0px; font-family: \"times new roman\", times, serif; font-size: 12pt; \"> Đôi giày được hâm mộ trên toàn thế giới nhờ công nghệ đế Air Unit lần đầu tiên được áp dụng trên rổ của dòng giày bóng, mang đến kết cấu chắc chắn khi mang. </span> </p>', '{\"Form giày\": \"Đặc biệt nhất là sự hiện diện của câu nói nổi tiếng của Virgil về phần đệm và dây buộc.\", \"Đế dày\": \"Là điểm mạnh của Jordan 1 khi Nike ưu ái đệm \\\" túi khí \\ \"vào toàn bộ đế giày.\" Mềm mại và thoải mái là cảm giác mang cả ngày dài. \",\" Đặc biệt \":\" Đôi giày bóng rổ huyền thoại được đính các chi tiết. Các điểm nhấn nhỏ màu xanh và cam tạo điểm nhấn Swoosh, và phần gót cũng được bọc da với số \"85\" được in trên đó và một đế giữa màu trắng với từ “Air” để tượng trưng cho sự ra mắt của phiên bản Air Jordan 1 đầu tiên vào năm 1985. \"}', 6, 1, 1, '2021-06-30 07:16:27', '2021-07-18 05:52:04', NULL);
INSERT INTO `products` VALUES (63, 'Air Force 1 Low x G-Dragon', 'air-force-1-low-x-g-dragon', 965, 1125, 0, '<p> <span style = \"color: rgb (119, 119, 119); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px; letter-spacing: 1px;\"> G-Dragon và Nike đã tạo ra một trong những chiến dịch sản phẩm và thương hiệu thành công nhất trên thị trường toàn thế giới & amp; đặc biệt là ở Châu Á. Nhiều người yêu mến Nike cũng như GD đã sẵn sàng chi mạnh để sở hữu bản collab đình đám này. </span> <br> </p>', '{\"Dây giày\": \"Thiết kế độc đáo\", \"Form giày\": \"Họa tiết ngôi sao năm cánh in nổi giúp tăng độ bám và chống trơn trượt khi di chuyển\", \"Đế giày\": \"Bộ đế hack chiều cao\", \"Đặc biệt\": \"Đặc biệt nhất điều có thể nhận thấy là lớp sơn đen sẽ bong ra sau một thời gian sử dụng để lộ tác phẩm nghệ thuật ẩn bên dưới chiếc Không quân 1 \"}', 6, 1, 1, '2021-06-30 11:15:15', '2021-07-18 05:51:54', NULL);

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id`) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('wTbZLC7FkBUK6mVIwHwzKQbXADpwlymJg7kVSrjM', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/96.0.230 Chrome/90.0.4430.230 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiMzdEeW5CM2VvVTNlaXFKYmJuMVhnUnBsbUN4eWNnR3JMOGNZZlZQTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly90dW56c25lYWtlci5jb206ODA4MCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRxSlA1WFBJS2c2NGxJNkJlcTdYTDVPdjNoOWoySFFYY1l2VVdkb2oyQ0JCdjN3TlhhSmYzMiI7czo0OiJjYXJ0IjthOjA6e31zOjU6ImFsZXJ0IjthOjA6e319', 1627475593);
INSERT INTO `sessions` VALUES ('XEzkky0hHqdwDokPXXbmauP09wELEgs4mO9t9Ll3', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) coc_coc_browser/96.0.230 Chrome/90.0.4430.230 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTGdjRlU5YVpXdHRaQjBoWXFkV1V6RnpVMGJESE1BSUFLbDZIZWhUeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly90dW56c25lYWtlci5jb206ODA4MCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiY2FydCI7YToxOntzOjEzOiJvcmRlci1wcm9kdWN0IjtPOjI5OiJJbGx1bWluYXRlXFN1cHBvcnRcQ29sbGVjdGlvbiI6MTp7czo4OiIAKgBpdGVtcyI7YToxOntzOjMyOiI1MTJjZTQ2YWJiNzc3NTRkY2ZkMDZjZmQ0YWMzMGI3NSI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjEwOntzOjU6InJvd0lkIjtzOjMyOiI1MTJjZTQ2YWJiNzc3NTRkY2ZkMDZjZmQ0YWMzMGI3NSI7czoyOiJpZCI7aTo2MjtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czoxNjoiTmlrZSBBaXIgRm9yY2UgMSI7czo1OiJwcmljZSI7ZDoxMTg5O3M6Njoid2VpZ2h0IjtkOjA7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjE6e3M6ODoiACoAaXRlbXMiO2E6Mzp7czo1OiJpbWFnZSI7czoxOToiaW1hZ2VzL25pa2VhaXIxLmpwZyI7czo0OiJzaXplIjtpOjQ0O3M6NToiY29sb3IiO3M6NjoiMDAwMDAwIjt9fXM6NzoidGF4UmF0ZSI7aToyMTtzOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtOO3M6NDY6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBkaXNjb3VudFJhdGUiO2k6MDt9fX19czo1OiJhbGVydCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHFKUDVYUElLZzY0bEk2QmVxN1hMNU92M2g5ajJIUVhjWXZVV2RvajJDQkJ2M3dOWGFKZjMyIjt9', 1627895393);

-- ----------------------------
-- Table structure for statisticals
-- ----------------------------
DROP TABLE IF EXISTS `statisticals`;
CREATE TABLE `statisticals`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `count_orders` int NOT NULL,
  `sales_volume` int NOT NULL,
  `revenue` bigint NOT NULL,
  `profit` bigint NOT NULL,
  `order_date` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of statisticals
-- ----------------------------
INSERT INTO `statisticals` VALUES (18, 1, 1, 0, 0, '2021-07-12 00:00:00', '2021-07-12 16:16:16', '2021-07-12 16:16:50');
INSERT INTO `statisticals` VALUES (19, 2, 2, 1399000, 409000, '2021-07-13 00:00:00', '2021-07-13 01:10:46', '2021-07-13 16:08:52');
INSERT INTO `statisticals` VALUES (20, 5, 5, 30119000, 64539000, '2021-07-14 00:00:00', '2021-07-14 01:03:20', '2021-07-14 01:11:01');
INSERT INTO `statisticals` VALUES (21, 4, 4, 3406000, 8106577, '2021-07-23 09:24:57', '2021-07-15 07:53:52', '2021-07-23 02:20:56');
INSERT INTO `statisticals` VALUES (22, 1, 1, 1825000, 925000, '2021-07-17 00:00:00', '2021-07-17 14:28:31', '2021-07-17 14:28:31');
INSERT INTO `statisticals` VALUES (23, 1, 1, 0, 0, '2021-07-18 00:00:00', '2021-07-18 08:26:58', '2021-07-18 08:28:05');
INSERT INTO `statisticals` VALUES (24, 1, 1, 0, 0, '2021-07-22 00:00:00', '2021-07-22 04:03:52', '2021-07-23 02:23:01');
INSERT INTO `statisticals` VALUES (25, 1, 1, 1399, 409, '2021-07-28 00:00:00', '2021-07-28 10:41:43', '2021-07-28 10:41:43');

-- ----------------------------
-- Table structure for suppliers
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `suppliers_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES (3, 'Công ty MCope', 'mcope.group@gmail.com', '0123456789', 'Tx. Long Xuyên , H. Trương Ba , TP. Khánh Phúc', '2021-07-09 03:27:56', '2021-07-10 04:09:24');
INSERT INTO `suppliers` VALUES (4, 'Công ty TNHH Piscoz', 'PiscoZ.group@gmail.com', '0345222515', 'Tx. Phú Nông , H. Thái An , TP. Hà Tuyên', '2021-07-09 07:33:28', '2021-07-10 04:11:01');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `role` int NOT NULL DEFAULT 0,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `current_team_id` bigint UNSIGNED NULL DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Đặng Anh Tú', 'dai.uy.mafia@gmail.com', NULL, '$2y$10$fGAK4YSYDJv7TEdN4rnRoOQ6rL.jgxUo67qMnFLXYpYkYmHtn07y.', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-18 08:14:15');
INSERT INTO `users` VALUES (2, 'Kiều Ngọc Hưng', 'hungzed1995@gmail.com', NULL, '$2y$10$bZeDPowHpzNrc48raSztneBuhkndNViE2R.z9qk3nAYPRQ3L2qxDy', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-14 00:59:52');
INSERT INTO `users` VALUES (3, 'Lê Thị Thùy Trang', 'trangzmooon@gmail.com', NULL, '$2y$10$K2nB4y/ilpt886y2IbTZnO1diJYS9S8sn5yqYqQvXOZNcI8jT.Y2S', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2021-07-14 00:58:59');
INSERT INTO `users` VALUES (4, 'Chúc Anh Hoàng', 'admin3@gmail.com', NULL, '$2y$10$THNH7Jd0O7P9vAJQVYmA1ejl1tFi01E3p/ZuovI41IJtjd3ryN1M2', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-07-13 09:28:42');
INSERT INTO `users` VALUES (6, 'Lương Anh Tú', 'kunyeuh2k1@gmail.com', NULL, '$2y$10$qJP5XPIKg64lI6Beq7XL5Ov3h9j2HQXcYvUWdoj2CBBv3wNXaJf32', NULL, NULL, 3, NULL, NULL, NULL, '2021-06-15 02:39:50', '2021-07-17 10:01:36');
INSERT INTO `users` VALUES (16, 'Chu Thị Linh', 'linhxinh56@gmail.com', NULL, '$2y$10$oHU6EQIi2knG5S6wVGuoh.qQuKyZlSKtwrefWJxxzjNkoIgaUwQyq', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-15 04:33:07', '2021-07-14 00:57:22');
INSERT INTO `users` VALUES (17, 'Lê Quang Lộc', 'loc.gtv92@gmail.com', NULL, '$2y$10$P7BP2MW1IMtc1l6QODRcX.y55RkcadjFRNIF1P5xLtBT4ny2TbC2C', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-15 04:37:13', '2021-07-15 04:21:52');
INSERT INTO `users` VALUES (18, 'Phan Dương Thùy', 'damo@gmail.com', NULL, '$2y$10$Fq5uBE6WbEgORAmobL9OEeBz6eBJybJgaAwQ2YSywna0rk6NN2YmW', NULL, NULL, 1, NULL, NULL, NULL, '2021-06-15 04:44:44', '2021-07-13 06:07:15');
INSERT INTO `users` VALUES (20, 'Phạm Thu Phương', 'phuongseven41@gmail.com', NULL, '$2y$10$C3BFvv5elAiIUrTWeVIUHuW1Iid4moDHDV3YPSKqGanGP7tCCJj6a', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-16 03:07:51', '2021-07-17 09:47:44');
INSERT INTO `users` VALUES (22, 'Phạm Thành Long', 'longpham124@gmail.com', NULL, '$2y$10$Ukvtnvy.yk98/1CZZ9sHHO3YhV7QOzhjFnsZyXT3UwjvBQthM2hLK', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-21 03:06:47', '2021-07-15 04:10:38');
INSERT INTO `users` VALUES (23, 'Nguyễn Hữu Lộc', 'locvannguyen@gmail.com', NULL, '$2y$10$XhAuS.2oA5Z3NMpK.zr/0OZ5IzJc1DGH0u5S8PqWa0s1jsYoVCb0a', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-22 09:43:59', '2021-07-16 06:04:16');
INSERT INTO `users` VALUES (29, 'Ngô Anh Hiếu', 'ngohieu@gmail.com', NULL, '$2y$10$72fs8hg5elZxwFgQW4mGx.WOBEc3Ci0D3sMnFakq8ZqjZqOJquYCu', NULL, NULL, 1, NULL, NULL, NULL, '2021-07-13 16:13:32', '2021-07-15 04:19:48');

-- ----------------------------
-- Table structure for users_info
-- ----------------------------
DROP TABLE IF EXISTS `users_info`;
CREATE TABLE `users_info`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gender` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_info
-- ----------------------------
INSERT INTO `users_info` VALUES (1, 'Ha Noi', '1224104', 'https://cdn3.vectorstock.com/i/1000x1000/30/97/flat-business-man-user-profile-avatar-icon-vector-4333097.jpg', 0, 0, NULL, NULL);
INSERT INTO `users_info` VALUES (2, 'Ha Noi', '0698885777', 'avatar/CochacYeulaDay-ST.jpg', 0, 1, NULL, '2021-07-18 08:19:22');
INSERT INTO `users_info` VALUES (3, 'Ha Noi', '0345556999', 'https://cdn3.vectorstock.com/i/1000x1000/30/97/flat-business-man-user-profile-avatar-icon-vector-4333097.jpg', 0, 2, NULL, '2021-07-14 00:59:52');
INSERT INTO `users_info` VALUES (4, 'Ha Noi', '0264445211', 'avatar/Amee.jpg', 1, 3, NULL, '2021-07-15 09:33:30');
INSERT INTO `users_info` VALUES (5, 'Ha Noi', '0344596214', 'avatar/HaAnhTuan.jpg', 0, 4, NULL, '2021-07-18 06:13:17');
INSERT INTO `users_info` VALUES (6, 'Thái Hòa , Ba Vì , Hà Nội', '0123456789', 'avatar/72958170_568975717239701_5378169326635319296_n.jpg', 0, 6, '2021-06-15 02:39:50', '2021-07-18 05:49:16');
INSERT INTO `users_info` VALUES (12, 'Việt Nam', '0123456789', 'avatar/DiVeNha-Den.jpg', 1, 16, '2021-06-15 04:33:07', '2021-06-16 06:34:52');
INSERT INTO `users_info` VALUES (13, 'Việt Nam', '0123456789', 'avatar/Gducky.jpg', 0, 17, '2021-06-15 04:37:14', '2021-07-15 06:05:43');
INSERT INTO `users_info` VALUES (14, 'Việt Nam', '0123456789', 'avatar/Gducky.jpg', 1, 18, '2021-06-15 04:44:44', '2021-07-18 06:11:55');
INSERT INTO `users_info` VALUES (15, 'Ha Noi - Viet Nam', '0345222515', 'avatar/Amee.jpg', 1, 20, '2021-06-16 03:07:51', '2021-07-15 07:08:50');
INSERT INTO `users_info` VALUES (17, 'Việt Nam', '0123456789', 'avatar/man.jpg', 0, 22, '2021-06-21 03:06:47', '2021-06-21 03:06:47');
INSERT INTO `users_info` VALUES (18, 'Ha Noi - Viet Nam', '0123456789', 'avatar/man.jpg', 0, 23, '2021-06-22 09:43:59', '2021-06-22 09:43:59');
INSERT INTO `users_info` VALUES (23, 'Phong Vân - Ba Vì - Hà Nội.', '0946552374', 'avatar/man.jpg', 1, 29, '2021-07-13 16:13:32', '2021-07-13 16:14:13');

-- ----------------------------
-- Table structure for warehouses
-- ----------------------------
DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE `warehouses`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` int NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `import_goods` int NOT NULL,
  `sold_goods` int NOT NULL DEFAULT 0,
  `inventory` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 171 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of warehouses
-- ----------------------------
INSERT INTO `warehouses` VALUES (1, 37, 'FFFFFF', 735, 0, 735, 33, '2021-06-25 16:45:40', '2021-07-13 16:10:39');
INSERT INTO `warehouses` VALUES (2, 36, '000000', 26, 0, 26, 33, '2021-06-25 16:45:40', '2021-07-04 07:11:51');
INSERT INTO `warehouses` VALUES (18, 36, 'ff0000', 25, 0, 25, 27, '2021-06-27 08:09:16', '2021-07-23 02:23:00');
INSERT INTO `warehouses` VALUES (19, 39, 'ff0000', 25, 0, 25, 27, '2021-06-27 08:09:16', '2021-06-27 08:09:16');
INSERT INTO `warehouses` VALUES (22, 36, '000000', 27, 0, 27, 21, '2021-06-27 08:11:30', '2021-07-11 05:22:19');
INSERT INTO `warehouses` VALUES (23, 38, '823535', 25, 0, 25, 21, '2021-06-27 08:11:30', '2021-06-27 08:11:30');
INSERT INTO `warehouses` VALUES (40, 36, 'd1cccc', 24, 3, 21, 57, '2021-06-28 03:05:25', '2021-07-15 15:48:17');
INSERT INTO `warehouses` VALUES (41, 37, '000000', 56, 0, 56, 57, '2021-06-28 03:05:25', '2021-06-28 03:05:25');
INSERT INTO `warehouses` VALUES (42, 41, 'c9c9c9', 19, 0, 19, 57, '2021-06-28 03:05:25', '2021-06-28 03:05:25');
INSERT INTO `warehouses` VALUES (43, 41, 'ffffff', 19, 0, 19, 57, '2021-06-28 03:05:25', '2021-06-28 03:05:25');
INSERT INTO `warehouses` VALUES (44, 37, 'c7c7c7', 71, 0, 71, 57, '2021-06-28 03:05:25', '2021-06-28 03:05:25');
INSERT INTO `warehouses` VALUES (45, 38, '000000', 34, 0, 34, 57, '2021-06-28 03:05:25', '2021-06-28 03:05:25');
INSERT INTO `warehouses` VALUES (50, 36, 'ffffff', 54, 2, 52, 58, '2021-06-28 03:14:41', '2021-07-15 14:39:49');
INSERT INTO `warehouses` VALUES (51, 37, 'ffffff', 34, 0, 34, 58, '2021-06-28 03:14:41', '2021-06-28 03:14:41');
INSERT INTO `warehouses` VALUES (52, 38, 'ffffff', 19, 0, 19, 58, '2021-06-28 03:14:42', '2021-06-28 03:14:42');
INSERT INTO `warehouses` VALUES (53, 40, 'ffffff', 23, 0, 23, 58, '2021-06-28 03:14:42', '2021-06-28 03:14:42');
INSERT INTO `warehouses` VALUES (54, 41, 'ffffff', 65, 0, 65, 58, '2021-06-28 03:14:42', '2021-06-28 03:14:42');
INSERT INTO `warehouses` VALUES (55, 42, 'ffffff', 13, 0, 13, 58, '2021-06-28 03:14:42', '2021-06-28 03:14:42');
INSERT INTO `warehouses` VALUES (62, 40, '000000', 24, 3, 21, 60, '2021-06-28 03:32:05', '2021-07-15 15:35:25');
INSERT INTO `warehouses` VALUES (63, 40, 'c03535', 17, 0, 17, 60, '2021-06-28 03:32:05', '2021-06-28 03:32:05');
INSERT INTO `warehouses` VALUES (64, 39, 'ffffff', 27, 0, 27, 60, '2021-06-28 03:32:05', '2021-06-28 03:32:05');
INSERT INTO `warehouses` VALUES (65, 42, '000000', 98, 0, 98, 60, '2021-06-28 03:32:05', '2021-06-28 03:32:05');
INSERT INTO `warehouses` VALUES (66, 43, '000000', 78, 0, 78, 60, '2021-06-28 03:32:05', '2021-06-28 03:32:05');
INSERT INTO `warehouses` VALUES (67, 41, 'd21414', 25, 0, 25, 60, '2021-06-28 03:32:05', '2021-06-28 03:32:05');
INSERT INTO `warehouses` VALUES (74, 38, 'ffffff', 25, 1, 24, 59, '2021-06-28 03:44:58', '2021-07-15 14:42:23');
INSERT INTO `warehouses` VALUES (75, 41, 'ffffff', 17, 0, 17, 59, '2021-06-28 03:44:58', '2021-06-28 03:44:58');
INSERT INTO `warehouses` VALUES (76, 37, '000000', 54, 0, 54, 59, '2021-06-28 03:44:58', '2021-06-28 03:44:58');
INSERT INTO `warehouses` VALUES (77, 39, '000000', 24, 0, 24, 59, '2021-06-28 03:44:58', '2021-06-28 03:44:58');
INSERT INTO `warehouses` VALUES (78, 43, 'ffffff', 43, 0, 43, 59, '2021-06-28 03:44:58', '2021-06-28 03:44:58');
INSERT INTO `warehouses` VALUES (79, 40, '000000', 46, 0, 46, 59, '2021-06-28 03:44:58', '2021-06-28 03:44:58');
INSERT INTO `warehouses` VALUES (80, 38, 'ea4d4d', 757, 8, 749, 61, '2021-06-28 03:47:46', '2021-07-28 10:34:12');
INSERT INTO `warehouses` VALUES (81, 37, '000000', 17, 0, 17, 61, '2021-06-28 03:47:46', '2021-06-28 03:47:46');
INSERT INTO `warehouses` VALUES (82, 39, '224572', 54, 0, 54, 61, '2021-06-28 03:47:46', '2021-06-28 03:47:46');
INSERT INTO `warehouses` VALUES (83, 40, 'f37e12', 17, 0, 17, 61, '2021-06-28 03:47:46', '2021-06-28 03:47:46');
INSERT INTO `warehouses` VALUES (84, 38, 'ffffff', 87, 0, 87, 61, '2021-06-28 03:47:46', '2021-06-28 03:47:46');
INSERT INTO `warehouses` VALUES (85, 43, 'f68888', 45, 0, 45, 61, '2021-06-28 03:47:46', '2021-06-28 03:47:46');
INSERT INTO `warehouses` VALUES (95, 37, '000000', 27, 1, 26, 63, '2021-06-30 11:15:15', '2021-07-18 08:28:04');
INSERT INTO `warehouses` VALUES (96, 38, 'ffffff', 54, 0, 54, 63, '2021-06-30 11:15:15', '2021-06-30 11:15:15');
INSERT INTO `warehouses` VALUES (97, 39, 'ffffff', 17, 0, 17, 63, '2021-06-30 11:15:15', '2021-06-30 11:15:15');
INSERT INTO `warehouses` VALUES (98, 40, 'ffffff', 17, 0, 17, 63, '2021-06-30 11:15:15', '2021-06-30 11:15:15');
INSERT INTO `warehouses` VALUES (99, 41, 'ffffff', 46, 0, 46, 63, '2021-06-30 11:15:15', '2021-06-30 11:15:15');
INSERT INTO `warehouses` VALUES (100, 42, 'ffffff', 98, 0, 98, 63, '2021-06-30 11:15:15', '2021-06-30 11:15:15');
INSERT INTO `warehouses` VALUES (101, 43, 'ffffff', 22, 0, 22, 63, '2021-06-30 11:15:15', '2021-07-12 08:29:55');
INSERT INTO `warehouses` VALUES (102, 44, '000000', 35, 3, 32, 62, '2021-06-30 11:24:27', '2021-07-15 17:02:33');
INSERT INTO `warehouses` VALUES (103, 38, '000000', 80, 0, 80, 62, '2021-06-30 11:24:27', '2021-07-05 13:12:43');
INSERT INTO `warehouses` VALUES (104, 40, 'ffffff', 41, 0, 41, 62, '2021-06-30 11:24:27', '2021-07-05 12:22:47');
INSERT INTO `warehouses` VALUES (105, 41, 'ffffff', 74, 0, 74, 62, '2021-06-30 11:24:27', '2021-06-30 11:24:27');
INSERT INTO `warehouses` VALUES (106, 41, 'ff0000', 24, 0, 24, 62, '2021-06-30 11:24:28', '2021-06-30 11:24:28');
INSERT INTO `warehouses` VALUES (107, 43, 'ffffff', 41, 0, 41, 62, '2021-06-30 11:24:28', '2021-06-30 11:24:28');
INSERT INTO `warehouses` VALUES (108, 40, 'ffdd00', 84, 0, 84, 62, '2021-06-30 11:24:28', '2021-06-30 11:24:28');
INSERT INTO `warehouses` VALUES (109, 39, '000000', 36, 0, 36, 62, '2021-06-30 11:24:28', '2021-06-30 11:24:28');
INSERT INTO `warehouses` VALUES (110, 41, '000000', 47, 0, 47, 62, '2021-06-30 11:24:28', '2021-06-30 11:24:28');
INSERT INTO `warehouses` VALUES (111, 37, '000000', 25, 1, 24, 26, '2021-06-30 11:37:43', '2021-07-14 01:10:57');
INSERT INTO `warehouses` VALUES (112, 38, '000000', 74, 0, 74, 26, '2021-06-30 11:37:43', '2021-06-30 11:37:43');
INSERT INTO `warehouses` VALUES (113, 39, '000000', 17, 0, 17, 26, '2021-06-30 11:37:44', '2021-06-30 11:37:44');
INSERT INTO `warehouses` VALUES (114, 40, '000000', 45, 0, 45, 26, '2021-06-30 11:37:44', '2021-06-30 11:37:44');
INSERT INTO `warehouses` VALUES (115, 41, '000000', 34, 0, 34, 26, '2021-06-30 11:37:44', '2021-06-30 11:37:44');
INSERT INTO `warehouses` VALUES (116, 37, 'ff0000', 46, 0, 46, 26, '2021-06-30 11:37:44', '2021-06-30 11:37:44');
INSERT INTO `warehouses` VALUES (117, 38, 'ff0000', 45, 0, 45, 26, '2021-06-30 11:37:44', '2021-06-30 11:37:44');
INSERT INTO `warehouses` VALUES (118, 39, 'ff0000', 46, 0, 46, 26, '2021-06-30 11:37:44', '2021-06-30 11:37:44');
INSERT INTO `warehouses` VALUES (119, 41, '00ccff', 46, 0, 46, 26, '2021-06-30 11:37:44', '2021-06-30 11:37:44');
INSERT INTO `warehouses` VALUES (120, 36, '00ccff', 68, 0, 68, 26, '2021-06-30 11:37:44', '2021-06-30 11:37:44');
INSERT INTO `warehouses` VALUES (121, 38, 'fcfcfc', 54, 0, 54, 26, '2021-06-30 11:37:44', '2021-06-30 11:37:44');
INSERT INTO `warehouses` VALUES (122, 43, 'ffffff', 24, 0, 24, 26, '2021-06-30 11:37:44', '2021-06-30 11:37:44');
INSERT INTO `warehouses` VALUES (123, 38, 'b1b3b2', 24, 0, 24, 20, '2021-06-30 11:49:40', '2021-07-10 05:22:08');
INSERT INTO `warehouses` VALUES (124, 39, 'b2b3b2', 46, 0, 46, 20, '2021-06-30 11:49:40', '2021-06-30 11:49:40');
INSERT INTO `warehouses` VALUES (125, 40, 'b2b4b3', 76, 0, 76, 20, '2021-06-30 11:49:40', '2021-06-30 11:49:40');
INSERT INTO `warehouses` VALUES (126, 41, 'b2b3b2', 61, 0, 61, 20, '2021-06-30 11:49:40', '2021-06-30 11:49:40');
INSERT INTO `warehouses` VALUES (127, 42, 'b1b3b2', 19, 0, 19, 20, '2021-06-30 11:49:40', '2021-06-30 11:49:40');
INSERT INTO `warehouses` VALUES (128, 43, 'b2b3b2', 35, 0, 35, 20, '2021-06-30 11:49:41', '2021-06-30 11:49:41');
INSERT INTO `warehouses` VALUES (129, 38, '8d9dad', 46, 0, 46, 20, '2021-06-30 11:49:41', '2021-06-30 11:49:41');
INSERT INTO `warehouses` VALUES (130, 39, '8d9dad', 54, 0, 54, 20, '2021-06-30 11:49:41', '2021-06-30 11:49:41');
INSERT INTO `warehouses` VALUES (131, 36, '8d9dad', 34, 0, 34, 20, '2021-06-30 11:49:41', '2021-06-30 11:49:41');
INSERT INTO `warehouses` VALUES (132, 36, '8d9dad', 24, 0, 24, 20, '2021-06-30 11:49:41', '2021-06-30 11:49:41');
INSERT INTO `warehouses` VALUES (133, 36, '8d9dad', 36, 0, 36, 20, '2021-06-30 11:49:41', '2021-06-30 11:49:41');
INSERT INTO `warehouses` VALUES (134, 37, 'ff0000', 42, 1, 41, 19, '2021-06-30 12:00:38', '2021-07-15 14:59:57');
INSERT INTO `warehouses` VALUES (135, 39, 'ff0000', 74, 0, 74, 19, '2021-06-30 12:00:38', '2021-06-30 12:00:38');
INSERT INTO `warehouses` VALUES (136, 40, 'ff0000', 56, 0, 56, 19, '2021-06-30 12:00:38', '2021-06-30 12:00:38');
INSERT INTO `warehouses` VALUES (137, 41, 'ff0000', 74, 0, 74, 19, '2021-06-30 12:00:38', '2021-06-30 12:00:38');
INSERT INTO `warehouses` VALUES (138, 42, 'ff0000', 36, 0, 36, 19, '2021-06-30 12:00:38', '2021-06-30 12:00:38');
INSERT INTO `warehouses` VALUES (139, 36, '006eff', 24, 0, 24, 19, '2021-06-30 12:00:38', '2021-06-30 12:00:38');
INSERT INTO `warehouses` VALUES (140, 36, '006eff', 17, 0, 17, 19, '2021-06-30 12:00:38', '2021-06-30 12:00:38');
INSERT INTO `warehouses` VALUES (141, 36, '006eff', 54, 0, 54, 19, '2021-06-30 12:00:39', '2021-06-30 12:00:39');
INSERT INTO `warehouses` VALUES (142, 41, '00b3ff', 17, 0, 17, 19, '2021-06-30 12:00:39', '2021-06-30 12:00:39');
INSERT INTO `warehouses` VALUES (143, 42, '00b3ff', 24, 0, 24, 19, '2021-06-30 12:00:39', '2021-06-30 12:00:39');
INSERT INTO `warehouses` VALUES (144, 38, '00b3ff', 46, 0, 46, 19, '2021-06-30 12:00:39', '2021-06-30 12:00:39');
INSERT INTO `warehouses` VALUES (145, 39, 'ff7b00', 17, 0, 17, 19, '2021-06-30 12:00:39', '2021-06-30 12:00:39');
INSERT INTO `warehouses` VALUES (146, 43, 'ff7b00', 17, 0, 17, 19, '2021-06-30 12:00:39', '2021-06-30 12:00:39');
INSERT INTO `warehouses` VALUES (151, 44, 'ffffff', 17, 0, 17, 62, '2021-06-30 12:13:59', '2021-07-05 12:16:56');
INSERT INTO `warehouses` VALUES (152, 37, 'ff0000', 28, 0, 28, 56, '2021-06-30 12:13:59', '2021-07-23 02:20:55');
INSERT INTO `warehouses` VALUES (153, 40, '000000', 48, 0, 47, 56, '2021-06-30 12:13:59', '2021-07-04 10:59:20');
INSERT INTO `warehouses` VALUES (154, 38, '000000', 54, 0, 54, 56, '2021-06-30 12:13:59', '2021-06-30 12:13:59');
INSERT INTO `warehouses` VALUES (170, 36, '1c1c1c', 0, 0, 0, 61, '2021-07-18 08:29:46', '2021-07-18 08:29:46');

SET FOREIGN_KEY_CHECKS = 1;
