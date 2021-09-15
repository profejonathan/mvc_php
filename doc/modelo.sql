SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `Turnos`;
DROP TABLE IF EXISTS `TurnosEstados`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `Turnos` (
    `TurnoId` INTEGER NOT NULL auto_increment,
    `Descripcion` VARCHAR(512) NOT NULL,
    `Fecha` DATETIME NOT NULL,
    `EstadoId` INTEGER NOT NULL,
    PRIMARY KEY (`TurnoId`)
);

CREATE TABLE `TurnosEstados` (
    `EstadoId` INTEGER NOT NULL auto_increment,
    `Descripcion` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`EstadoId`)
);

ALTER TABLE `Turnos` ADD FOREIGN KEY (`EstadoId`) REFERENCES `TurnosEstados`(`EstadoId`);