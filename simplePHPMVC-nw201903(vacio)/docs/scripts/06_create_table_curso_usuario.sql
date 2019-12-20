CREATE TABLE `nw201903`.`curso_usuario` (
  `course_cod` INT NOT NULL,
  `user_cod` BIGINT(10) NOT NULL,
  `node_cod` VARCHAR(2) NOT NULL,
  `node_completion` TINYINT(1) NOT NULL,
  PRIMARY KEY (`course_cod`, `user_cod`, `node_cod`));

  ALTER TABLE `nw201903`.`curso_usuario` 
CHANGE COLUMN `node_completion` `node_completion` VARCHAR(3) NOT NULL ;

