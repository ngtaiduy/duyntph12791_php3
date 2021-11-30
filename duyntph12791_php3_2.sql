/*
 Navicat Premium Data Transfer
 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80025
 Source Host           : localhost:3306
 Source Schema         : we16101
 Target Server Type    : MySQL
 Target Server Version : 80025
 File Encoding         : 65001
 Date: 16/11/2021 13:42:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_cate_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES (1, 'Hải sản', NULL, NULL);
INSERT INTO `categories` VALUES (2, 'Rau thơm', NULL, NULL);
INSERT INTO `categories` VALUES (3, 'Thịt lợn', NULL, NULL);
INSERT INTO `categories` VALUES (4, 'Thịt bò', NULL, NULL);
INSERT INTO `categories` VALUES (5, 'Rau', NULL, NULL);
INSERT INTO `categories` VALUES (6, 'Gia vị', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for customer_info
-- ----------------------------
DROP TABLE IF EXISTS `customer_info`;
CREATE TABLE `customer_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `joined_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of customer_info
-- ----------------------------
BEGIN;
INSERT INTO `customer_info` VALUES (1, 'ha noi', 3, '2021-11-03 13:25:34', NULL, NULL);
INSERT INTO `customer_info` VALUES (2, 'nam dinh', 4, '2021-11-19 13:25:44', NULL, NULL);
INSERT INTO `customer_info` VALUES (3, 'ha nam', 5, '2021-11-01 13:25:56', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (8, '2021_11_04_052245_create_table_categories', 2);
INSERT INTO `migrations` VALUES (9, '2021_11_04_054602_create_table_products', 2);
INSERT INTO `migrations` VALUES (11, '2021_11_04_054953_alter_table_products_add_columns_2021-11-04', 3);
INSERT INTO `migrations` VALUES (12, '2021_11_04_061554_alter_table_categories_rename_columns_cate_name_to_name_2021-11-04', 3);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cate_id` bigint unsigned NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (1, 'Cameron Rempel', 1016, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 3, 'Suppress him! Pinch him! Off with his whiskers!\' For some minutes the whole thing very absurd, but they began running when they hit her; and the baby with some curiosity. \'What a pity it wouldn\'t.', '', 17);
INSERT INTO `products` VALUES (2, 'Kieran Satterfield', 3464, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'So she began: \'O Mouse, do you like the right way of speaking to it,\' she thought, \'till its ears have come, or at any rate, the Dormouse indignantly. However, he consented to go nearer till she.', '', 99);
INSERT INTO `products` VALUES (3, 'Ms. Kariane Armstrong PhD', 5969, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'Bill! the master says you\'re to go nearer till she heard was a dead silence instantly, and neither of the way--\' \'THAT generally takes some time,\' interrupted the Hatter: \'but you could only see.', '', 79);
INSERT INTO `products` VALUES (4, 'Evie Hilpert', 7186, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'I needn\'t be so stingy about it, so she began very cautiously: \'But I don\'t remember where.\' \'Well, it must make me smaller, I can reach the key; and if I fell off the mushroom, and raised herself.', '', 95);
INSERT INTO `products` VALUES (5, 'Daren Schmidt', 2363, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'English. \'I don\'t know the song, she kept fanning herself all the other side of WHAT?\' thought Alice \'without pictures or conversations in it, and yet it was done. They had a wink of sleep these.', '', 35);
INSERT INTO `products` VALUES (6, 'Manley Waelchi', 4577, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 3, 'Alice to herself, in a languid, sleepy voice. \'Who are YOU?\' Which brought them back again to the jury. They were just beginning to get out again. Suddenly she came in sight of the lefthand bit. * *.', '', 45);
INSERT INTO `products` VALUES (7, 'thienth update', 2000, '2021-11-04 06:54:31', '2021-11-13 05:32:23', 5, 'I\'ve been changed for Mabel! I\'ll try and say \"Who am I to do?\' said Alice. \'Of course twinkling begins with an air of great curiosity. \'Soles and eels, of course,\' said the Duck: \'it\'s generally a.', '', 50);
INSERT INTO `products` VALUES (8, 'Mertie Oberbrunner', 2949, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'Footman, and began whistling. \'Oh, there\'s no use going back to the Mock Turtle, and to stand on your head-- Do you think you could manage it?) \'And what an ignorant little girl or a worm. The.', '', 67);
INSERT INTO `products` VALUES (9, 'Mr. Alfred Fritsch', 1611, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'THE KING AND QUEEN OF HEARTS. Alice was just in time to see it trot away quietly into the air. \'--as far out to sea!\" But the insolence of his teacup and bread-and-butter, and then said, \'It was the.', '', 79);
INSERT INTO `products` VALUES (10, 'Gwendolyn Windler', 7131, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 3, 'VERY deeply with a knife, it usually bleeds; and she felt sure she would gather about her pet: \'Dinah\'s our cat. And she\'s such a nice soft thing to get out at the proposal. \'Then the Dormouse.', '', 59);
INSERT INTO `products` VALUES (11, 'Ludie Schmeler', 5902, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'She had just begun to think that will be much the same as the jury asked. \'That I can\'t be civil, you\'d better finish the story for yourself.\' \'No, please go on!\' Alice said with a kind of sob.', '', 100);
INSERT INTO `products` VALUES (12, 'Miss Jacquelyn Steuber I', 1837, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 2, 'I should think very likely to eat or drink under the window, and one foot up the conversation dropped, and the two creatures got so close to them, and just as the March Hare, \'that \"I like what I.', '', 99);
INSERT INTO `products` VALUES (13, 'Sheldon Leffler PhD', 7385, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'Alice,) and round Alice, every now and then, if I chose,\' the Duchess asked, with another hedgehog, which seemed to be a queer thing, to be true): If she should push the matter on, What would become.', '', 9);
INSERT INTO `products` VALUES (14, 'Michel Denesik', 3475, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'VERY remarkable in that; nor did Alice think it was,\' said the Queen, who was trembling down to them, and it\'ll sit up and say \"Who am I then? Tell me that first, and then she noticed that they.', '', 63);
INSERT INTO `products` VALUES (15, 'Jevon Shanahan Sr.', 1746, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 3, 'KNOW IT TO BE TRUE--\" that\'s the jury, in a languid, sleepy voice. \'Who are YOU?\' said the March Hare, \'that \"I like what I eat\" is the reason so many different sizes in a trembling voice to its.', '', 43);
INSERT INTO `products` VALUES (16, 'Prof. Cecil Rowe', 1565, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 2, 'I must go by the way, and the Queen said severely \'Who is it twelve? I--\' \'Oh, don\'t bother ME,\' said Alice timidly. \'Would you like the wind, and was going to begin at HIS time of life. The King\'s.', '', 50);
INSERT INTO `products` VALUES (17, 'Chad Brekke', 7079, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'Queen. \'Can you play croquet with the end of the accident, all except the Lizard, who seemed too much frightened to say it out loud. \'Thinking again?\' the Duchess said in an offended tone. And she.', '', 98);
INSERT INTO `products` VALUES (18, 'Kenton Bradtke', 1280, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 3, 'I can do no more, whatever happens. What WILL become of it; so, after hunting all about for a minute or two, and the little door: but, alas! either the locks were too large, or the key was lying on.', '', 45);
INSERT INTO `products` VALUES (40, 'Charley Legros', 3023, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'March Hare said in a deep, hollow tone: \'sit down, both of you, and don\'t speak a word till I\'ve finished.\' So they sat down, and the other queer noises, would change to tinkling sheep-bells, and.', '', 63);
INSERT INTO `products` VALUES (41, 'Esta Lang', 3287, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'Alice had got to the fifth bend, I think?\' \'I had NOT!\' cried the Gryphon, before Alice could see it trot away quietly into the garden, where Alice could think of what sort it was) scratching and.', '', 59);
INSERT INTO `products` VALUES (43, 'Yasmin Littel', 1429, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 2, 'Rabbit asked. \'No, I didn\'t,\' said Alice: \'allow me to introduce some other subject of conversation. While she was coming to, but it makes rather a hard word, I will just explain to you to get out.', '', 41);
INSERT INTO `products` VALUES (44, 'Mrs. Viola Wisoky II', 3872, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'Queen in a moment: she looked down at them, and just as usual. I wonder who will put on one knee as he could think of nothing better to say when I get it home?\' when it saw Alice. It looked.', '', 26);
INSERT INTO `products` VALUES (45, 'Cary Cruickshank', 2808, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'I am very tired of being all alone here!\' As she said to the garden door. Poor Alice! It was the Hatter. \'You MUST remember,\' remarked the King, and the little golden key in the pool, and the King.', '', 46);
INSERT INTO `products` VALUES (46, 'Mr. Emile Hermann I', 2373, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'Alice quite jumped; but she ran off as hard as he came, \'Oh! the Duchess, \'chop off her knowledge, as there was enough of me left to make ONE respectable person!\' Soon her eye fell upon a little.', '', 30);
INSERT INTO `products` VALUES (47, 'Elissa Aufderhar', 5450, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'Gryphon; and then I\'ll tell him--it was for bringing the cook was busily stirring the soup, and seemed to rise like a candle. I wonder who will put on her lap as if he thought it would,\' said the.', '', 68);
INSERT INTO `products` VALUES (48, 'Prof. Merle O\'Kon Jr.', 4901, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'Duchess; \'and the moral of that dark hall, and wander about among those beds of bright flowers and those cool fountains, but she had hoped) a fan and the moment she appeared; but she could remember.', '', 86);
INSERT INTO `products` VALUES (49, 'Keyon Ondricka', 5722, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 3, 'Hatter: \'I\'m on the Duchess\'s knee, while plates and dishes crashed around it--once more the pig-baby was sneezing on the bank--the birds with draggled feathers, the animals with their fur clinging.', '', 91);
INSERT INTO `products` VALUES (50, 'Mrs. Mercedes Terry', 4854, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'I\'ll manage better this time,\' she said, \'and see whether it\'s marked \"poison\" or not\'; for she had found her way through the air! Do you think you\'re changed, do you?\' \'I\'m afraid I am, sir,\' said.', '', 24);
INSERT INTO `products` VALUES (51, 'Prof. Sam Gutmann', 6484, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'INSIDE, you might knock, and I never understood what it was: at first she thought it had a door leading right into it. \'That\'s very important,\' the King repeated angrily, \'or I\'ll have you executed.', '', 35);
INSERT INTO `products` VALUES (52, 'Ms. Harmony Hammes DVM', 7760, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'While the Panther received knife and fork with a large cauldron which seemed to follow, except a little way out of the cakes, and was beating her violently with its mouth again, and all of you, and.', '', 82);
INSERT INTO `products` VALUES (53, 'Mr. Tony Erdman MD', 6966, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 3, 'Queen say only yesterday you deserved to be trampled under its feet, \'I move that the pebbles were all locked; and when she caught it, and yet it was done. They had not gone (We know it to half-past.', '', 89);
INSERT INTO `products` VALUES (54, 'Mark Tremblay', 3788, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 2, 'Alice\'s side as she could. \'The Dormouse is asleep again,\' said the Duchess; \'I never saw one, or heard of \"Uglification,\"\' Alice ventured to ask. \'Suppose we change the subject of conversation.', '', 90);
INSERT INTO `products` VALUES (55, 'Prof. Hudson Bins', 1237, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'Alice aloud, addressing nobody in particular. \'She\'d soon fetch it back!\' \'And who are THESE?\' said the Eaglet. \'I don\'t see any wine,\' she remarked. \'There isn\'t any,\' said the Caterpillar. Here.', '', 91);
INSERT INTO `products` VALUES (56, 'Gust Bradtke', 3849, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'I\'ll get into the court, by the time they were trying to put everything upon Bill! I wouldn\'t say anything about it, so she went on at last, and they lived at the top of his teacup and.', '', 93);
INSERT INTO `products` VALUES (57, 'Maybelle Wyman', 7114, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'Why, there\'s hardly room for her. \'Yes!\' shouted Alice. \'Come on, then,\' said the Gryphon. \'How the creatures argue. It\'s enough to drive one crazy!\' The Footman seemed to Alice to herself, \'I wish.', '', 69);
INSERT INTO `products` VALUES (58, 'Prof. Lafayette Denesik I', 6586, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'I don\'t believe there\'s an atom of meaning in it,\' but none of YOUR business, Two!\' said Seven. \'Yes, it IS his business!\' said Five, in a day or two: wouldn\'t it be murder to leave off this.', '', 29);
INSERT INTO `products` VALUES (59, 'Miss Felicita Torphy III', 5033, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'Alice! Come here directly, and get ready for your walk!\" \"Coming in a trembling voice to a day-school, too,\' said Alice; \'it\'s laid for a great hurry, muttering to himself in an offended tone, \'so I.', '', 45);
INSERT INTO `products` VALUES (60, 'Hilma Ziemann', 5331, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'Alice. \'Anything you like,\' said the Mouse, sharply and very soon came to ME, and told me you had been found and handed them round as prizes. There was no \'One, two, three, and away,\' but they were.', '', 39);
INSERT INTO `products` VALUES (62, 'Camylle Labadie', 1005, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'And yet I wish you could only see her. She is such a thing before, but she gained courage as she spoke, but no result seemed to be otherwise than what you mean,\' said Alice. \'Well, I never knew.', '', 65);
INSERT INTO `products` VALUES (63, 'Viola Dooley', 3091, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'Queen. \'I never thought about it,\' added the Dormouse, who seemed to be managed? I suppose it were white, but there was no \'One, two, three, and away,\' but they began solemnly dancing round and swam.', '', 2);
INSERT INTO `products` VALUES (64, 'Jerald Sporer', 1412, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'I only wish it was,\' he said. (Which he certainly did NOT, being made entirely of cardboard.) \'All right, so far,\' thought Alice, \'and if it makes me grow large again, for really I\'m quite tired and.', '', 33);
INSERT INTO `products` VALUES (66, 'Jasper Trantow', 3429, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'I\'m not Ada,\' she said, by way of expressing yourself.\' The baby grunted again, so that it would not join the dance? \"You can really have no answers.\' \'If you can\'t take LESS,\' said the Gryphon, and.', '', 13);
INSERT INTO `products` VALUES (67, 'Dr. Abelardo Kuhn DDS', 2944, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'Majesty?\' he asked. \'Begin at the Hatter, and he hurried off. Alice thought she had succeeded in curving it down into its face to see if he wasn\'t one?\' Alice asked. \'We called him a fish)--and.', '', 76);
INSERT INTO `products` VALUES (68, 'Prof. Preston Franecki DVM', 5213, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'Alice. \'And where HAVE my shoulders got to? And oh, I wish you could only hear whispers now and then quietly marched off after the birds! Why, she\'ll eat a bat?\' when suddenly, thump! thump! down.', '', 51);
INSERT INTO `products` VALUES (69, 'Lafayette Monahan', 5577, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'March Hare interrupted, yawning. \'I\'m getting tired of this. I vote the young Crab, a little bit of the suppressed guinea-pigs, filled the air, mixed up with the Duchess, \'as pigs have to turn into.', '', 99);
INSERT INTO `products` VALUES (70, 'Prof. Carmelo Weimann', 3363, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'Alice said to the Mock Turtle. Alice was soon left alone. \'I wish you wouldn\'t keep appearing and vanishing so suddenly: you make one quite giddy.\' \'All right,\' said the King, the Queen, who were.', '', 14);
INSERT INTO `products` VALUES (71, 'Dr. Frances Walter IV', 1827, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'KNOW IT TO BE TRUE--\" that\'s the jury, in a voice of thunder, and people began running about in the grass, merely remarking that a red-hot poker will burn you if you only walk long enough.\' Alice.', '', 32);
INSERT INTO `products` VALUES (72, 'Maudie Barrows', 6098, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'So she stood still where she was holding, and she crossed her hands on her toes when they had any sense, they\'d take the hint; but the Dodo had paused as if she meant to take the hint; but the Dodo.', '', 99);
INSERT INTO `products` VALUES (73, 'Selena Feest', 2136, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'The Hatter was out of the lefthand bit of stick, and held out its arms folded, quietly smoking a long way back, and barking hoarsely all the same, shedding gallons of tears, \'I do wish they COULD!.', '', 98);
INSERT INTO `products` VALUES (74, 'Angelita Lakin', 1772, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'Dodo solemnly, rising to its children, \'Come away, my dears! It\'s high time you were or might have been was not a VERY unpleasant state of mind, she turned the corner, but the great hall, with the.', '', 1);
INSERT INTO `products` VALUES (75, 'Sarah Kulas DVM', 2832, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'I shouldn\'t want YOURS: I don\'t put my arm round your waist,\' the Duchess said in a great deal to ME,\' said Alice loudly. \'The idea of having the sentence first!\' \'Hold your tongue!\' said the Lory.', '', 56);
INSERT INTO `products` VALUES (76, 'Rashad Farrell', 2584, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 2, 'The Duchess took her choice, and was going on, as she could, for the next moment she appeared; but she could get to the Cheshire Cat: now I shall have some fun now!\' thought Alice. The poor little.', '', 18);
INSERT INTO `products` VALUES (77, 'Mr. Mark Satterfield', 3396, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'King; \'and don\'t be particular--Here, Bill! catch hold of this pool? I am now? That\'ll be a very short time the Mouse only growled in reply. \'That\'s right!\' shouted the Queen. \'Can you play croquet.', '', 43);
INSERT INTO `products` VALUES (78, 'Euna Bauch', 7373, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 2, 'Alice in a very melancholy voice. \'Repeat, \"YOU ARE OLD, FATHER WILLIAM,\"\' said the Cat. \'I\'d nearly forgotten to ask.\' \'It turned into a large crowd collected round it: there were no tears. \'If.', '', 84);
INSERT INTO `products` VALUES (79, 'Dr. Mya Lesch', 5024, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'Alice heard the Queen\'s shrill cries to the puppy; whereupon the puppy jumped into the garden door. Poor Alice! It was all ridges and furrows; the balls were live hedgehogs, the mallets live.', '', 24);
INSERT INTO `products` VALUES (80, 'Kaylie Schamberger', 7285, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'Gryphon, the squeaking of the ground--and I should like to show you! A little bright-eyed terrier, you know, upon the other bit. Her chin was pressed so closely against her foot, that there was a.', '', 38);
INSERT INTO `products` VALUES (81, 'Telly Raynor', 7604, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'I\'m sure she\'s the best thing to get in at the top of his great wig.\' The judge, by the officers of the leaves: \'I should like to go from here?\' \'That depends a good opportunity for repeating his.', '', 83);
INSERT INTO `products` VALUES (82, 'Ms. Mara Lang', 1067, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 2, 'Dormouse into the way the people that walk with their fur clinging close to her, And mentioned me to sell you a song?\' \'Oh, a song, please, if the Mock Turtle said: \'I\'m too stiff. And the Gryphon.', '', 52);
INSERT INTO `products` VALUES (83, 'Daphnee Cremin', 4381, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'Cheshire Cat sitting on a summer day: The Knave shook his grey locks, \'I kept all my life!\' Just as she spoke. (The unfortunate little Bill had left off when they liked, and left off when they had a.', '', 51);
INSERT INTO `products` VALUES (84, 'Tiana Schaefer DDS', 2159, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 2, 'Turtle.\' These words were followed by a very decided tone: \'tell her something about the whiting!\' \'Oh, as to the dance. Would not, could not, would not, could not answer without a cat! It\'s the.', '', 40);
INSERT INTO `products` VALUES (85, 'Mr. Giovanny Green', 3992, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 3, 'YOU?\' Which brought them back again to the dance. Would not, could not stand, and she jumped up and leave the court; but on the floor: in another moment, when she heard something splashing about in.', '', 18);
INSERT INTO `products` VALUES (86, 'Nash Yundt', 6500, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 3, 'Do come back in a large piece out of its mouth, and addressed her in the other. \'I beg pardon, your Majesty,\' he began, \'for bringing these in: but I grow at a king,\' said Alice. \'Why, you don\'t.', '', 32);
INSERT INTO `products` VALUES (87, 'Dr. Savion McKenzie DDS', 6431, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'Gryphon. \'It all came different!\' Alice replied very solemnly. Alice was silent. The King turned pale, and shut his note-book hastily. \'Consider your verdict,\' he said to herself, as she tucked her.', '', 43);
INSERT INTO `products` VALUES (88, 'Ludwig Hansen', 1828, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'I should like to be an old woman--but then--always to have any pepper in my own tears! That WILL be a LITTLE larger, sir, if you drink much from a Caterpillar The Caterpillar and Alice thought to.', '', 2);
INSERT INTO `products` VALUES (89, 'Nicholaus Cartwright', 6074, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'Alice, as she could. The next witness would be as well as pigs, and was going to leave the room, when her eye fell upon a heap of sticks and dry leaves, and the pool as it didn\'t much matter which.', '', 7);
INSERT INTO `products` VALUES (90, 'Molly Mosciski', 6963, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'They very soon found herself in a pleased tone. \'Pray don\'t trouble yourself to say \'I once tasted--\' but checked herself hastily, and said anxiously to herself, as she went on: \'But why did they.', '', 50);
INSERT INTO `products` VALUES (91, 'Jesse Little', 6621, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 3, 'I never knew so much at this, but at the bottom of the court. All this time it all seemed quite natural); but when the race was over. However, when they liked, so that her shoulders were nowhere to.', '', 23);
INSERT INTO `products` VALUES (93, 'Lilla Gulgowski', 4019, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'King replied. Here the Dormouse said--\' the Hatter began, in a hurried nervous manner, smiling at everything that was said, and went on saying to herself, and once again the tiny hands were clasped.', '', 12);
INSERT INTO `products` VALUES (94, 'Louie Kilback', 4999, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'Queen. \'Sentence first--verdict afterwards.\' \'Stuff and nonsense!\' said Alice sadly. \'Hand it over a little animal (she couldn\'t guess of what work it would be very likely to eat or drink something.', '', 64);
INSERT INTO `products` VALUES (95, 'Gail Grady V', 6199, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'I!\' he replied. \'We quarrelled last March--just before HE went mad, you know--\' She had already heard her voice sounded hoarse and strange, and the whole party at once in the direction in which the.', '', 100);
INSERT INTO `products` VALUES (96, 'Mekhi Gottlieb', 6546, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 1, 'Gryphon; and then the different branches of Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never said I could let you out, you know.\' \'I don\'t know what a dear quiet thing,\'.', '', 81);
INSERT INTO `products` VALUES (97, 'Alexanne Leuschke', 1687, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 4, 'Alice was very hot, she kept fanning herself all the while, and fighting for the pool was getting very sleepy; \'and they drew all manner of things--everything that begins with an M, such as.', '', 72);
INSERT INTO `products` VALUES (98, 'Prof. Sigrid Huels V', 7168, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 6, 'So they began solemnly dancing round and swam slowly back again, and Alice joined the procession, wondering very much to-night, I should think very likely true.) Down, down, down. Would the fall.', '', 87);
INSERT INTO `products` VALUES (99, 'Dr. Fatima Maggio Jr.', 6101, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 5, 'And so it was perfectly round, she found herself at last came a rumbling of little animals and birds waiting outside. The poor little juror (it was exactly three inches high). \'But I\'m NOT a.', '', 52);
INSERT INTO `products` VALUES (100, 'Prof. Gerard Hoppe DDS', 4803, '2021-11-04 06:54:31', '2021-11-04 06:54:31', 2, 'I do it again and again.\' \'You are old,\' said the Mock Turtle replied; \'and then the different branches of Arithmetic--Ambition, Distraction, Uglification, and Derision.\' \'I never went to him,\' said.', '', 26);
INSERT INTO `products` VALUES (101, 'san pham 1', 10000, '2021-11-11 06:49:05', '2021-11-11 06:49:05', 4, 'adsfasfasfasfasdfasdf', NULL, 100);
INSERT INTO `products` VALUES (102, 'sp test 1', 1000, '2021-11-16 05:35:28', '2021-11-16 05:35:28', 4, 'Trong phát biểu mở đầu, Tổng thống Mỹ cho rằng cần các \"rào chắn\" để đảm bảo cạnh tranh giữa hai nước không trở thành xung đột, bất kể chủ ý hay ngoài ý muốn. Ông đồng thời bày tỏ lãnh đạo hai nền kinh tế lớn nhất thế giới sẽ có \"cuộc thảo luận thẳng thắn\".', 'storage/products/GBswaoK3avmtZ6G2zWwwgUbrv9pO4vccqjWu08eX.jpg', 100);
COMMIT;

-- ----------------------------
-- Table structure for staff_info
-- ----------------------------
DROP TABLE IF EXISTS `staff_info`;
CREATE TABLE `staff_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `identity_card_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of staff_info
-- ----------------------------
BEGIN;
INSERT INTO `staff_info` VALUES (1, '098765432234', 1, 1000, NULL, NULL);
INSERT INTO `staff_info` VALUES (2, '567890312123', 2, 2000, NULL, NULL);
INSERT INTO `staff_info` VALUES (3, '6789023212342', 3, 2500, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` int DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'Lane Murphy Jr.', 'fatima08@example.org', '2021-11-04 06:54:31', 2, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YcC8urCPIe', '2021-11-04 06:54:31', '2021-11-04 06:54:31');
INSERT INTO `users` VALUES (2, 'Mr. Dudley Murazik V', 'sydni.okuneva@example.net', '2021-11-04 06:54:31', 2, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iShUNITjF0', '2021-11-04 06:54:31', '2021-11-04 06:54:31');
INSERT INTO `users` VALUES (3, 'Daija Carter IV', 'florine76@example.com', '2021-11-04 06:54:31', 2, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IVoZ4fHkcS', '2021-11-04 06:54:31', '2021-11-04 06:54:31');
INSERT INTO `users` VALUES (4, 'Wilford Runte', 'padberg.alyce@example.com', '2021-11-04 06:54:31', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NMvm22Wh9k', '2021-11-04 06:54:31', '2021-11-04 06:54:31');
INSERT INTO `users` VALUES (5, 'Mrs. Alexa Durgan Sr.', 'bschumm@example.net', '2021-11-04 06:54:31', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Eg1x4Mjrsn', '2021-11-04 06:54:31', '2021-11-04 06:54:31');
INSERT INTO `users` VALUES (6, 'Aric Powlowski IV', 'feil.lelah@example.net', '2021-11-04 06:54:31', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1umgS7bXAn', '2021-11-04 06:54:31', '2021-11-04 06:54:31');
INSERT INTO `users` VALUES (7, 'Walter Dach', 'trycia.kiehn@example.net', '2021-11-04 06:54:31', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6LK4HzPr9H', '2021-11-04 06:54:31', '2021-11-04 06:54:31');
INSERT INTO `users` VALUES (8, 'Ms. Chloe Rice DVM', 'olarkin@example.org', '2021-11-04 06:54:31', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9uNIe5PWx2', '2021-11-04 06:54:31', '2021-11-04 06:54:31');
INSERT INTO `users` VALUES (9, 'Jalen Goodwin', 'senger.humberto@example.org', '2021-11-04 06:54:31', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ECNykgCu33', '2021-11-04 06:54:31', '2021-11-04 06:54:31');
INSERT INTO `users` VALUES (10, 'Miss April Rolfson', 'haylee60@example.net', '2021-11-04 06:54:31', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YkO9C9YeS5', '2021-11-04 06:54:31', '2021-11-04 06:54:31');
INSERT INTO `users` VALUES (11, 'Isidro Bradtke', 'wilhelm.jaskolski@example.com', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'V4zaOCEcuS', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (12, 'Monte Hoeger', 'elenora85@example.org', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pOec1iiWrd', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (13, 'Alexandre Connelly', 'pfannerstill.filomena@example.com', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SnRkBTKLEy', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (14, 'Janet Bradtke', 'olson.bradford@example.com', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TtXtS2LrhM', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (15, 'Berta Kilback', 'sawayn.natalie@example.com', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'u2QdLhRkTe', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (16, 'Keara Bogan', 'wdenesik@example.com', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UaI3DjNt9I', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (17, 'Beth Stehr', 'macejkovic.mohamed@example.com', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NaaTgbBG3S', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (18, 'Bernardo Beatty', 'buster30@example.com', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FunczKezTe', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (19, 'Arch Baumbach', 'jacky32@example.com', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8RbvIoBoQQ', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (20, 'Mr. Tomas Swift I', 'sboyer@example.org', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zglB8jVZ0X', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (21, 'Garrick Bergnaum', 'ghammes@example.org', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kvfI9mGL4A', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (22, 'Kirsten Nader', 'edgar.keebler@example.org', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AjuWY5eFOg', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (23, 'Dr. Major Watsica', 'ward66@example.org', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mPTNpgvdX1', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (24, 'Dr. Odie Feeney II', 'emile04@example.org', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OwDsn0uYBw', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (25, 'Jammie Rogahn', 'pierce05@example.com', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BVRacyWoUU', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (26, 'Gerda Adams', 'agustina.nienow@example.org', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DILswTWQaE', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (27, 'Izaiah Schimmel', 'trycia.parisian@example.org', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'o2KevBEE7B', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (28, 'Nikolas Gaylord', 'lacy.beahan@example.com', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AMcwFmSSln', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (29, 'Prof. Geraldine Rutherford I', 'monahan.eden@example.net', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QWjrt9Dg0F', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
INSERT INTO `users` VALUES (30, 'Prof. Guadalupe Murphy PhD', 'hartmann.davonte@example.org', '2021-11-06 05:34:17', 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BZEY4GItpw', '2021-11-06 05:34:17', '2021-11-06 05:34:17');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;