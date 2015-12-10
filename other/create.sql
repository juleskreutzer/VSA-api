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

CREATE TABLE ha_module
(
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  class varchar(50) NOT NULL,
  tier int(1) NOT NULL DEFAULT 1,
  description varchar(255) NOT NULL,
  damage double NOT NULL,
  frequency int NOT NULL,
  damage_range int NOT NULL,
  price int NOT NULL default 0,
  sell_price int NOT NULL default 0,
  type varchar(255),
  effect varchar(255),
  value int(10) DEFAULT 0
);

CREATE TABLE ha_minion
(
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  hp double NOT NULL,
  damage double NOT NULL,
  speed double NOT NULL,
  encrypted boolean DEFAULT false,
  reward double NOT NULL
);

CREATE TABLE ha_spell
(
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  type varchar(255) NOT NULL,
  spell_range int DEFAULT 0,
  cooldown int DEFAULT 0,
  requiredLevel int DEFAULT 0
);
