CREATE TABLE ha_auth
(
  id int PRIMARY KEY AUTO_INCREMENT,
  username varchar(225) NOT NULL,
  password varchar(225) NOT NULL,
  email text NOT NULL,
  authkey text NOT NULL,
  description text,
  UNIQUE('username'),
  UNIQUE('email')
);

CREATE TABLE ha_user
(
  id int PRIMARY KEY AUTO_INCREMENT,
  displayName varchar(225) NOT NULL,
  username varchar(225) NOT NULL,
  password varchar(225) NOT NULL,
  email varchar(225) NOT NULL,
  score int(1000) DEFAULT 0
);

CREATE TABLE ha_settings
(
  id int PRIMARY KEY AUTO_INCREMENT,
  site_name text NOT NULL DEFAULT "Hack Attack",
  support_email text NOT NULL DEFAULT "jules@nujules.nl",
  maintenance int(1) NOT NULL DEFAULT 0
);
