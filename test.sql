CREATE TABLE `db09`.`title` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `text` TEXT NOT NULL,
    `sh` INT(5) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `db09`.`total` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `total` INT NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;