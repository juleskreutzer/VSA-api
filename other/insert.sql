/* INSERT INTO ha_module */
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`) VALUES ('Bitcoin Miner', 'money', 1, 'Default Bitcoin Miner', 0, 10, 0, 1000, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`) VALUES ('Bitcoin Miner', 'money', 2, 'Upgraded Bitcoin Miner (Tier 2)', 0, 50, 0, 5000, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`) VALUES ('Bitcoin Miner', 'money', 3, 'Upgraded Bitcoin Miner (Tier 3)', 0, 100, 0, 12000, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`) VALUES ('Software Injector', 'base', 1, 'Default Software Injector', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`) VALUES ('Software Injector', 'base', 2, 'Upgraded Software Injector (Tier 2)', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`) VALUES ('Software Injector', 'base', 3, 'Upgraded Software Injector (Tier 3)', 0, 0 ,0 ,0 ,0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`) VALUES ('CPU Upgrade', 'base', 1, 'Default CPU Upgrade', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`) VALUES ('CPU Upgrade', 'base', 2, 'Upgraded CPU Upgrade (Tier 2)', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`) VALUES ('CPU Upgrade', 'base', 3, 'Upgraded CPU Upgrade (Tier 3)', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`,
`type`, `effect`)
VALUES ('Bottlecap Antivirus', 'defense', 1, 'Default Bottlecap Antivirus', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`)
VALUES ('Bottlecap Antivirus', 'defense', 2, 'Upgraded Bottlecap Antivirus (Tier 2)', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`)
VALUES ('Bottlecap Antivirus', 'defense', 3, 'Upgraded Bottlecap Antivirus (Tier 3)', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`)
VALUES ('Muscle Antivirus', 'defense', 1, 'Default Muscle Antivirus', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`)
VALUES ('Muscle Antivirus', 'defense', 2, 'Upgraded Muscle Antivirus (Tier 2)', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`)
VALUES ('Muscle Antivirus', 'defense', 3, 'Upgraded Muscle Antivirus (Tier 3)', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`)
VALUES ('Scale Antivirus', 'defense', 1, 'Default Scale Antivirus', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`)
VALUES ('Scale Antivirus', 'defense', 2, 'Upgraded Scale Antivirus (Tier 2)', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`)
VALUES ('Scale Antivirus', 'defense', 3, 'Upgraded Scale Antivirus (Tier 3)', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`,`type`, `effect`)
VALUES ('Sniper Antivirus', 'defense', 1, 'Default Sniper Antivirus', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`)
VALUES ('Sniper Antivirus', 'defense', 2, 'Upgraded Sniper Anitvirus (Tier 2)', 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO ha_module (`name`, `class`, `tier`, `description`, `damage`, `frequency`, `damage_range`, `price`, `sell_price`, `type`, `effect`)
VALUES ('Sniper Antivirus', 'defense', 3, 'Upgraded Sniper Antivirus (Tier 3)', 0, 0, 0, 0, 0, NULL, NULL);

/* INSERT INTO ha_minion */
INSERT INTO ha_minion(`name`, `hp`, `damage`, `speed`, `encrypted`, `reward`) VALUES ('Byte', '100', '10', '3.5', 'false', '10');
INSERT INTO ha_minion(`name`, `hp`, `damage`, `speed`, `encrypted`, `reward`) VALUES ('KiloByte', '100', '20', '3', 'false', '20');
INSERT INTO ha_minion(`name`, `hp`, `damage`, `speed`, `encrypted`, `reward`) VALUES ('MegaByte', '100', '30', '2.5', 'false', '30');
INSERT INTO ha_minion(`name`, `hp`, `damage`, `speed`, `encrypted`, `reward`) VALUES ('GigaByte', '100', '40', '2', 'false', '40');
INSERT INTO ha_minion(`name`, `hp`, `damage`, `speed`, `encrypted`, `reward`) VALUES ('TeraByte', '100', '50', '1.5', 'false', '50');
INSERT INTO ha_minion(`name`, `hp`, `damage`, `speed`, `encrypted`, `reward`) VALUES ('PetaByte', '100', '60', '1', 'false', '60');

/* INSERT INTO ha_spell */
INSERT INTO ha_spell(`name`, `type`, `spell_range`, `cooldown`, `requiredLevel`) VALUES ('Corrupt', 'attack', '50', '0', '0');
INSERT INTO ha_spell(`name`, `type`, `spell_range`, `cooldown`, `requiredLevel`) VALUES ('Encrypt', 'attack', '50', '0', '0');
INSERT INTO ha_spell(`name`, `type`, `spell_range`, `cooldown`, `requiredLevel`) VALUES ('Disrupt', 'attack', '50', '0', '0');
INSERT INTO ha_spell(`name`, `type`, `cooldown`, `requiredLevel`) VALUES ('Lock-down', 'defense', '0', '0');
INSERT INTO ha_spell(`name`, `type`, `cooldown`, `requiredLevel`) VALUES ('Firewall', 'defense', '0', '0');
INSERT INTO ha_spell(`name`, `type`, `cooldown`, `requiredLevel`) VALUES ('Virus-scan', 'defense', '0', '0');
