-- MySQL Script generated by MySQL Workbench
-- sáb 20 mar 2021 14:49:51 CST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_devFinder
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_devFinder
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_devFinder` DEFAULT CHARACTER SET utf8 ;
USE `db_devFinder` ;

-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_TIPO_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_TIPO_USUARIO` (
  `id_tipo_usuario` INT NOT NULL AUTO_INCREMENT,
  `tipo_usuario` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_PAISES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_PAISES` (
  `id_pais` INT NOT NULL AUTO_INCREMENT,
  `pais` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_pais`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_USUARIO` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `id_tipo_usuario` INT NOT NULL,
  `id_pais` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NULL,
  `direccion` VARCHAR(100) NULL,
  `correo` VARCHAR(80) NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `contrasenia` VARCHAR(50) NOT NULL,
  `ruta_img_perfil` VARCHAR(45) NULL,
  `nombre_img_perfil` VARCHAR(45) NULL,
  PRIMARY KEY (`id_usuario`, `id_pais`),
  INDEX `fk_TBL_USUARIO_TBL_TIPO_USUARIO_idx` (`id_tipo_usuario` ASC) VISIBLE,
  INDEX `fk_TBL_USUARIO_TBL_PAISES1_idx` (`id_pais` ASC) VISIBLE,
  CONSTRAINT `fk_TBL_USUARIO_TBL_TIPO_USUARIO`
    FOREIGN KEY (`id_tipo_usuario`)
    REFERENCES `db_devFinder`.`TBL_TIPO_USUARIO` (`id_tipo_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TBL_USUARIO_TBL_PAISES1`
    FOREIGN KEY (`id_pais`)
    REFERENCES `db_devFinder`.`TBL_PAISES` (`id_pais`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_PRESUPUESTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_PRESUPUESTO` (
  `id_presupuesto` INT NOT NULL AUTO_INCREMENT,
  `presupuesto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_presupuesto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_CATEGORIA_PROYECTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_CATEGORIA_PROYECTO` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_ESTADO_PUBLICACION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_ESTADO_PUBLICACION` (
  `id_estado` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NULL,
  PRIMARY KEY (`id_estado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_PUBLICACION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_PUBLICACION` (
  `id_publicacion` INT NOT NULL AUTO_INCREMENT,
  `id_presupuesto` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  `id_categoria` INT NOT NULL,
  `id_estado` INT NOT NULL,
  `nombre_proyecto` VARCHAR(80) NOT NULL,
  `descripcion` VARCHAR(150) NOT NULL,
  `nombre_img` VARCHAR(80) NULL,
  `ruta_img` VARCHAR(100) NULL,
  PRIMARY KEY (`id_publicacion`, `id_usuario`, `id_estado`),
  INDEX `fk_TBL_PUBLICACION_TBL_PRESUPUESTO1_idx` (`id_presupuesto` ASC) VISIBLE,
  INDEX `fk_TBL_PUBLICACION_TBL_USUARIO1_idx` (`id_usuario` ASC) VISIBLE,
  INDEX `fk_TBL_PUBLICACION_TBL_CATEGORIA_PROYECTO1_idx` (`id_categoria` ASC) VISIBLE,
  INDEX `fk_TBL_PUBLICACION_TBL_ESTADO_PUBLICACION1_idx` (`id_estado` ASC) VISIBLE,
  CONSTRAINT `fk_TBL_PUBLICACION_TBL_PRESUPUESTO1`
    FOREIGN KEY (`id_presupuesto`)
    REFERENCES `db_devFinder`.`TBL_PRESUPUESTO` (`id_presupuesto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TBL_PUBLICACION_TBL_USUARIO1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `db_devFinder`.`TBL_USUARIO` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TBL_PUBLICACION_TBL_CATEGORIA_PROYECTO1`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `db_devFinder`.`TBL_CATEGORIA_PROYECTO` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TBL_PUBLICACION_TBL_ESTADO_PUBLICACION1`
    FOREIGN KEY (`id_estado`)
    REFERENCES `db_devFinder`.`TBL_ESTADO_PUBLICACION` (`id_estado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_COMENTARIOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_COMENTARIOS` (
  `id_comentario` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `id_publicacion` INT NOT NULL,
  `comentario` VARCHAR(150) NOT NULL,
  `fecha_comentario` DATE NOT NULL,
  PRIMARY KEY (`id_comentario`, `id_usuario`, `id_publicacion`),
  INDEX `fk_TBL_COMENTARIOS_TBL_USUARIO1_idx` (`id_usuario` ASC) VISIBLE,
  INDEX `fk_TBL_COMENTARIOS_TBL_PUBLICACION1_idx` (`id_publicacion` ASC) VISIBLE,
  CONSTRAINT `fk_TBL_COMENTARIOS_TBL_USUARIO1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `db_devFinder`.`TBL_USUARIO` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TBL_COMENTARIOS_TBL_PUBLICACION1`
    FOREIGN KEY (`id_publicacion`)
    REFERENCES `db_devFinder`.`TBL_PUBLICACION` (`id_publicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = big5;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_EXPERIENCIA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_EXPERIENCIA` (
  `id_experiencia` INT NOT NULL AUTO_INCREMENT,
  `id_publicacion` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_experiencia`, `id_publicacion`, `id_usuario`),
  INDEX `fk_TBL_EXPERIENCIA_TBL_PUBLICACION1_idx` (`id_publicacion` ASC) VISIBLE,
  INDEX `fk_TBL_EXPERIENCIA_TBL_USUARIO1_idx` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_TBL_EXPERIENCIA_TBL_PUBLICACION1`
    FOREIGN KEY (`id_publicacion`)
    REFERENCES `db_devFinder`.`TBL_PUBLICACION` (`id_publicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TBL_EXPERIENCIA_TBL_USUARIO1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `db_devFinder`.`TBL_USUARIO` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_TECNOLOGIAS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_TECNOLOGIAS` (
  `id_tecnologia` INT NOT NULL AUTO_INCREMENT,
  `tecnologia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tecnologia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_TEC_X_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_TEC_X_USUARIO` (
  `id_usuario` INT NOT NULL,
  `id_tecnologia` INT NOT NULL,
  PRIMARY KEY (`id_usuario`, `id_tecnologia`),
  INDEX `fk_TBL_USUARIO_has_TBL_TECNOLOGIAS_TBL_TECNOLOGIAS1_idx` (`id_tecnologia` ASC) VISIBLE,
  INDEX `fk_TBL_USUARIO_has_TBL_TECNOLOGIAS_TBL_USUARIO1_idx` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_TBL_USUARIO_has_TBL_TECNOLOGIAS_TBL_USUARIO1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `db_devFinder`.`TBL_USUARIO` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TBL_USUARIO_has_TBL_TECNOLOGIAS_TBL_TECNOLOGIAS1`
    FOREIGN KEY (`id_tecnologia`)
    REFERENCES `db_devFinder`.`TBL_TECNOLOGIAS` (`id_tecnologia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_devFinder`.`TBL_SOLICITUDES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_devFinder`.`TBL_SOLICITUDES` (
  `id_solicitud` INT NOT NULL AUTO_INCREMENT,
  `id_publicacion` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  `fecha_solicitud` DATE NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  INDEX `fk_TBL_SOLICITUDES_TBL_PUBLICACION1_idx` (`id_publicacion` ASC) VISIBLE,
  INDEX `fk_TBL_SOLICITUDES_TBL_USUARIO1_idx` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_TBL_SOLICITUDES_TBL_PUBLICACION1`
    FOREIGN KEY (`id_publicacion`)
    REFERENCES `db_devFinder`.`TBL_PUBLICACION` (`id_publicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TBL_SOLICITUDES_TBL_USUARIO1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `db_devFinder`.`TBL_USUARIO` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
