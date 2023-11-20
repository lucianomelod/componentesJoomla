CREATE TABLE IF NOT EXISTS `#__cbturesolucoes_content` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`asset_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL ,
`created_by` INT(11)  NOT NULL ,
`modified_by` INT(11)  NOT NULL ,
`diretoria` VARCHAR(2)  NOT NULL ,
`ano` INT(4)  NOT NULL ,
`numresolucao` VARCHAR(6)  NOT NULL ,
`dataresolucao` DATE NOT NULL ,
`assunto` TEXT NOT NULL ,
`resolucao` TEXT NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

