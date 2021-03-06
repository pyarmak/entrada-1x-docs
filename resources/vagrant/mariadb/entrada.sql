CREATE DATABASE `entrada` CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE `entrada_auth` CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE `entrada_clerkship` CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE USER 'entrada'@'%' IDENTIFIED BY 'password';
CREATE USER 'entrada'@'localhost' IDENTIFIED BY 'password';
UPDATE `mysql`.`user` SET `max_questions` = 0, `max_updates` = 0, `max_connections` = 0 WHERE `User` = 'entrada' AND `Host` IN ('%', 'localhost');
GRANT ALL ON `entrada`.* TO 'entrada'@'%';
GRANT ALL ON `entrada_auth`.* TO 'entrada'@'%';
GRANT ALL ON `entrada_clerkship`.* TO 'entrada'@'%';
GRANT ALL ON `entrada`.* TO 'entrada'@'localhost';
GRANT ALL ON `entrada_auth`.* TO 'entrada'@'localhost';
GRANT ALL ON `entrada_clerkship`.* TO 'entrada'@'localhost';

FLUSH PRIVILEGES;
