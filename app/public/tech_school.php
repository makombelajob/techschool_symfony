<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.2.2
 */

/**
 * Database `tech_school`
 */

/* `tech_school`.`classes` */
$classes = array(
  array('id' => '1','name' => '6e A','level' => '6'),
  array('id' => '2','name' => '5e B','level' => '5'),
  array('id' => '3','name' => '4e C','level' => '4'),
  array('id' => '4','name' => '3e A','level' => '3'),
  array('id' => '5','name' => '3e B','level' => '3')
);

/* `tech_school`.`classes_users` */
$classes_users = array(
  array('classes_id' => '4','users_id' => '6'),
  array('classes_id' => '5','users_id' => '2')
);

/* `tech_school`.`contacts` */
$contacts = array(
);

/* `tech_school`.`courses` */
$courses = array(
  array('id' => '1','subjects_id' => '1','classes_id' => '4','name' => 'Introduction à kali linux','coefficient' => '2.5','day' => 'Lundi 11 mai','started_at' => '2025-06-09 09:21:14','end_at' => '2025-06-09 09:21:14','room' => '6B')
);

/* `tech_school`.`courses_users` */
$courses_users = array(
  array('courses_id' => '1','users_id' => '2'),
  array('courses_id' => '1','users_id' => '6')
);

/* `tech_school`.`doctrine_migration_versions` */
$doctrine_migration_versions = array(
  array('version' => 'DoctrineMigrations\\Version20250607084142','executed_at' => '2025-06-09 09:20:03','execution_time' => '2730'),
  array('version' => 'DoctrineMigrations\\Version20250607085601','executed_at' => '2025-06-09 09:20:06','execution_time' => '231'),
  array('version' => 'DoctrineMigrations\\Version20250607092914','executed_at' => '2025-06-09 09:20:06','execution_time' => '150'),
  array('version' => 'DoctrineMigrations\\Version20250607093448','executed_at' => '2025-06-09 09:20:07','execution_time' => '41'),
  array('version' => 'DoctrineMigrations\\Version20250607152635','executed_at' => '2025-06-09 09:20:07','execution_time' => '18')
);

/* `tech_school`.`messenger_messages` */
$messenger_messages = array(
);

/* `tech_school`.`ressources` */
$ressources = array(
  array('id' => '1','name' => 'Base de Linux','file_type' => 'pdf','uploaded_at' => '2025-06-09 09:22:22')
);

/* `tech_school`.`ressources_courses` */
$ressources_courses = array(
  array('ressources_id' => '1','courses_id' => '1')
);

/* `tech_school`.`results` */
$results = array(
  array('id' => '1','courses_id' => '1','users_id' => '6','note' => '7','monthly' => '7','yearly' => '7','remark' => 'Fait encore plus des efforts pour arrivé au bon résultat.')
);

/* `tech_school`.`subjects` */
$subjects = array(
  array('id' => '1','name' => 'Informatique'),
  array('id' => '2','name' => 'Electronique'),
  array('id' => '3','name' => 'Mathematique'),
  array('id' => '4','name' => 'Culture generale')
);

/* `tech_school`.`users` */
$users = array(
  array('id' => '1','email' => 'kverdier@legall.fr','roles' => '["ROLE_USER"]','password' => '$2y$13$bmY8KASvWNhzPnOlPTCuT.CDsMfFZ5f6rG1jVeFIHf.Qk6sALgcE2','lastname' => 'Colas','firstname' => 'Véronique','register_at' => '2024-09-28 09:20:25','lastlogin' => NULL),
  array('id' => '2','email' => 'brigitte.lambert@gmail.com','roles' => '["ROLE_USER"]','password' => '$2y$13$FySnr7wVXkSunidv3Vi7JeGm23.tmgr4P8MO.X/xJigFHYsz4JiUC','lastname' => 'Tanguy','firstname' => 'Adélaïde','register_at' => '2025-01-12 17:03:36','lastlogin' => NULL),
  array('id' => '3','email' => 'mcohen@barre.fr','roles' => '["ROLE_USER"]','password' => '$2y$13$bQcKeNejPZ5hSfDBOuj0R.cwN8Ox51KHTd.4Ef4rwdFKoHQyYbRyy','lastname' => 'Guilbert','firstname' => 'Nathalie','register_at' => '2024-07-23 01:11:25','lastlogin' => NULL),
  array('id' => '4','email' => 'ines68@laposte.net','roles' => '["ROLE_USER"]','password' => '$2y$13$n189ldA8Wug70wYtEmUjE.fiGs3sP5mKArDFVA3xXtSzA4OK5OKoy','lastname' => 'Gerard','firstname' => 'Guillaume','register_at' => '2025-02-14 18:03:25','lastlogin' => NULL),
  array('id' => '5','email' => 'qdeoliveira@dbmail.com','roles' => '["ROLE_USER"]','password' => '$2y$13$flnnyETskLX5nQp6FFppieAf84Q9MUnS6LXFDfq0qzctup8aY804y','lastname' => 'Gaillard','firstname' => 'Susan','register_at' => '2024-08-28 21:30:30','lastlogin' => NULL),
  array('id' => '6','email' => 'elise.gaudin@dbmail.com','roles' => '["ROLE_USER"]','password' => '$2y$13$B8kxaKs6QOsHi.lKF0Ivj.hP2LV1LC3gUsWWYybJR.PMQfVOJd6YW','lastname' => 'Marques','firstname' => 'Michèle','register_at' => '2025-03-24 15:49:36','lastlogin' => NULL),
  array('id' => '7','email' => 'yhamon@fouquet.com','roles' => '["ROLE_USER"]','password' => '$2y$13$8iJ5HAZTZuqcZRyAK7DVRuEAGMfmkSs7CqBI3yHgt2O/dOEF0uQr.','lastname' => 'Picard','firstname' => 'René','register_at' => '2025-04-20 07:31:38','lastlogin' => NULL),
  array('id' => '8','email' => 'njourdan@morin.com','roles' => '["ROLE_USER"]','password' => '$2y$13$kUn83GOG7HpBkwWUZ4cBO.UrBWnQG8IClTKOX38xmkJ31pjfix25y','lastname' => 'Gros','firstname' => 'Alain','register_at' => '2024-09-07 21:07:57','lastlogin' => NULL),
  array('id' => '9','email' => 'patrick.goncalves@loiseau.fr','roles' => '["ROLE_USER"]','password' => '$2y$13$KqG7XzrVkGW09I0MmjJILOYP8krzrxN0.51Vck8vO1XYC1oeGEUIy','lastname' => 'Gosselin','firstname' => 'Théophile','register_at' => '2025-01-27 09:34:48','lastlogin' => NULL),
  array('id' => '10','email' => 'auguste06@carre.com','roles' => '["ROLE_USER"]','password' => '$2y$13$yYCCcC346vkLlhWC4HA1UuTSTV92rA0RhzZuTajHaSoQ56DxQS73S','lastname' => 'Vallee','firstname' => 'Virginie','register_at' => '2025-03-03 23:27:54','lastlogin' => NULL),
  array('id' => '11','email' => 'qrousset@live.com','roles' => '["ROLE_USER"]','password' => '$2y$13$.zIPDMhGCA4XvDtA1y/.yONcwkASEkkvFF2dJWwUe5o.zol/2q94O','lastname' => 'Guillot','firstname' => 'Olivie','register_at' => '2024-07-29 19:13:44','lastlogin' => NULL)
);
