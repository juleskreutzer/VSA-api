CREATE TABLE ha_auth
(
  id int PRIMARY KEY AUTO_INCREMENT,
  username varchar(225) NOT NULL UNIQUE,
  password varchar(225) NOT NULL,
  email varchar(225) NOT NULL UNIQUE,
  authkey text NOT NULL,
  description text
);

CREATE TABLE ha_user
(
  id int PRIMARY KEY AUTO_INCREMENT,
  displayName varchar(225) NOT NULL,
  username varchar(225) NOT NULL UNIQUE,
  password varchar(225) NOT NULL,
  email varchar(225) NOT NULL UNIQUE,
  score int(255) DEFAULT 0
);

CREATE TABLE ha_settings
(
  id int PRIMARY KEY AUTO_INCREMENT,
  site_name varchar(225) NOT NULL DEFAULT "Hack Attack",
  support_email varchar(225) NOT NULL DEFAULT "jules@nujules.nl",
  maintenance int(1) NOT NULL DEFAULT 0
);
