CREATE DATABASE IF NOT EXISTS auth CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS auth.users
(
    id INT(4) unsigned NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    date_created datetime NOT NULL default CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    UNIQUE (username)
) ENGINE=INNODB;