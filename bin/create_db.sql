CREATE USER 'mysqltest'@'%' IDENTIFIED WITH mysql_native_password AS 'mysqltest';
CREATE USER 'mysqltest'@'localhost' IDENTIFIED WITH mysql_native_password AS 'mysqltest';
CREATE USER 'mysqltest'@'127.0.0.1' IDENTIFIED WITH mysql_native_password AS 'mysqltest';
GRANT USAGE ON *.* TO 'mysqltest'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `mysqltest`;
GRANT ALL PRIVILEGES ON `mysqltest`.* TO 'mysqltest'@'%' IDENTIFIED BY 'mysqltest';
GRANT ALL PRIVILEGES ON `mysqltest`.* TO 'mysqltest'@'localhost' IDENTIFIED BY 'mysqltest';
GRANT ALL PRIVILEGES ON `mysqltest`.* TO 'mysqltest'@'127.0.0.1' IDENTIFIED BY 'mysqltest';

CREATE TABLE `mysqltest`.`test` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `created` INT(11) NOT NULL,
  `updated` INT(11) NOT NULL,
  `deleted` INT(11) NULL,
  `first` VARCHAR(40) NULL,
  `last` VARCHAR(40) NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;
