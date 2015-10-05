/* INSERT INTO ha_module */
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`) VALUES ('Bitcoin Miner', 'money', 1, 'Default Bitcoin Miner', 0, 10, 0, 1000, 0);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`) VALUES ('Bitcoin Miner', 'money', 2, 'Upgraded Bitcoin Miner (Tier 2)', 0, 50, 0, 5000, 0);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`) VALUES ('Bitcoin Miner', 'money', 3, 'Upgraded Bitcoin Miner (Tier 3)', 0, 100, 0, 12000,0);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`) VALUES ('Software Injector', 'base', 1, 'Default Software Injector', 0, 0, 0, 0, 0);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`) VALUES ('Software Injector', 'base', 2, 'Upgraded Software Injector (Tier 2)', 0, 0, 0, 0, 0);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`) VALUES ('Software Injector', 'base', 3, 'Upgraded Software Injector (Tier 3)', 0, 0 ,0 ,0 ,0);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`) VALUES ('CPU Upgrade', 'base', 1, 'Default CPU Upgrade', 0, 0, 0, 0, 0);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`) VALUES ('CPU Upgrade', 'base', 2, 'Upgraded CPU Upgrade (Tier 2)', 0, 0, 0, 0, 0);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`) VALUES ('CPU Upgrade', 'base', 3, 'Upgraded CPU Upgrade (Tier 3)', 0, 0, 0, 0, 0);

/* INSERT INTO ha_minion */
INSERT INTO ha_minion(`name`, `hp`, `attack`, `speed`, `defense`) VALUES ('Byte', '100', '10', '60', '40');
INSERT INTO ha_minion(`name`, `hp`, `attack`, `speed`, `defense`) VALUES ('KiloByte', '100', '20', '50', '35');
INSERT INTO ha_minion(`name`, `hp`, `attack`, `speed`, `defense`) VALUES ('MegaByte', '100', '30', '40', '30');
INSERT INTO ha_minion(`name`, `hp`, `attack`, `speed`, `defense`) VALUES ('GigaByte', '100', '40', '30', '25');
INSERT INTO ha_minion(`name`, `hp`, `attack`, `speed`, `defense`) VALUES ('TerraByte', '100', '50', '20', '20');
INSERT INTO ha_minion(`name`, `hp`, `attack`, `speed`, `defense`) VALUES ('PetaByte', '100', '60', '10', '15');

/* INSERT INTO ha_spell */
INSERT INTO ha_spell(`name`, `type`, `range`) VALUES ('Corrupt', 'attack', '50');
INSERT INTO ha_spell(`name`, `type`, `range`) VALUES ('Encrypt', 'attack', '50');
INSERT INTO ha_spell(`name`, `type`, `range`) VALUES ('Disrupt', 'attack', '50');
INSERT INTO ha_spell(`name`, `type`) VALUES ('Lock-down', 'defense');
INSERT INTO ha_spell(`name`, `type`) VALUES ('Firewall', 'defense');
INSERT INTO ha_spell(`name`, `type`) VALUES ('Virus-scan', 'defense');
