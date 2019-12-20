CREATE TABLE `nw201903`.`cursos` (
  `course_cod` INT NOT NULL AUTO_INCREMENT,
  `course_name` VARCHAR(45) NULL,
  `course_desc` VARCHAR(100) NULL,
  PRIMARY KEY (`course_cod`));

INSERT INTO `nw201903`.`cursos` (`course_name`, `course_desc`) VALUES ('Combobox', 'Crear un combobox usando PHP');
INSERT INTO `nw201903`.`cursos` (`course_cod`, `course_name`, `course_desc`) VALUES ('2', 'Tabla', 'Crear una tabla usando PHP y llenarla con datos de una Base de Datos MySQL');
