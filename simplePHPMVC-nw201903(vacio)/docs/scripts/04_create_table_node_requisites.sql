CREATE TABLE `nw201903`.`requisitos_nodos` (
  `course_cod` INT NOT NULL,
  `node_cod` VARCHAR(2) NOT NULL,
  `node_requisite` VARCHAR(2) NULL,
  `node_importance` TINYINT(1) NULL,
  PRIMARY KEY (`course_cod`, `node_cod`, `node_requisite`));

ALTER TABLE `nw201903`.`requisitos_nodos` 
ADD COLUMN `node_name` VARCHAR(45) NULL AFTER `node_importance`,
ADD COLUMN `node_desc` VARCHAR(100) NULL AFTER `node_name`,
CHANGE COLUMN `node_importance` `node_importance` TINYINT(1) NOT NULL ,
DROP PRIMARY KEY,
ADD PRIMARY KEY (`course_cod`, `node_cod`);
;

ALTER TABLE `nw201903`.`requisitos_nodos` 
ADD COLUMN `node_regex` VARCHAR(200) NULL AFTER `node_desc`;

INSERT INTO `nw201903`.`requisitos_nodos` (`course_cod`, `node_cod`, `node_importance`, `node_name`, `node_desc`, `node_regex`) VALUES ('1', '1', '1', 'Inicio', 'Abrir y Cerrar PHP', '^\\s{0,}<php>\\s{0,}<\\/php>\\s{0,}$');
INSERT INTO `nw201903`.`requisitos_nodos` (`course_cod`, `node_cod`, `node_requisite`, `node_importance`, `node_name`, `node_desc`, `node_regex`) VALUES ('1', '2', '1', '1', 'Require_Once', 'Hacer referencia al archivo que tiene la mayoría de las funciones', '^\\s{0,}require_once\\s{1,}(\\({1}\\s{0,}\"libs\\s{0,}\\/dao.php\"\\s{0,}\\){1}|\\s{0,}\"libs\\s{0,}\\/dao.php\"\\s{0,})\\s{0,};$');
UPDATE `nw201903`.`requisitos_nodos` SET `node_regex` = '^\\s{0,}require_once\\s{1,}(\\(\\s{0,}\"libs\\s{0,}\\/dao\\.php\"\\s{0,}\\)|\\s{0,}\"libs\\s{0,}\\/dao\\.php\"\\s{0,}|\\(\\s{0,}\'libs\\s{0,}\\/dao\\.php\'\\s{0,}\\)|\\s{0,}\'libs\\s{0,}\\/dao\\.php\'\\s{0,})\\s{0,};\\s{0,}' WHERE (`course_cod` = '1') and (`node_cod` = '2');
INSERT INTO `nw201903`.`requisitos_nodos` (`course_cod`, `node_cod`, `node_requisite`, `node_importance`, `node_name`, `node_desc`, `node_regex`) VALUES ('1', '3', '2', '1', 'Funcion', 'Crear una funcion sin parametros que regresará el arreglo que se quiere mostrar en el combobox', '^\\s{0,}function\\s{0,}arregloComboBox\\s{0,}\\(\\s{0,}\\)\\s{0,}\\{\\s{0,}\\}\\s{0,}$');
UPDATE `nw201903`.`requisitos_nodos` SET `node_regex` = '^\\s{0,}require_once\\s{1,}(\\(\\s{0,}\"libs\\s{0,}\\/dao\\.php\"\\s{0,}\\)|\\s{0,}\"libs\\s{0,}\\/dao\\.php\"\\s{0,}|\\(\\s{0,}\'libs\\s{0,}\\/dao\\.php\'\\s{0,}\\)|\\s{0,}\'libs\\s{0,}\\/dao\\.php\'\\s{0,})\\s{0,};\\s{0,}$' WHERE (`course_cod` = '1') and (`node_cod` = '2');

INSERT INTO `nw201903`.`requisitos_nodos` (`course_cod`, `node_cod`, `node_importance`, `node_name`, `node_desc`, `node_regex`) VALUES ('2', '1', '1', 'Inicio', 'Abrir y Cerrar PHP', '^\\s{0,}<php>\\s{0,}<\\/php>\\s{0,}$');

ALTER TABLE `nw201903`.`requisitos_nodos` 
ADD COLUMN `node_dialogue` VARCHAR(300) NOT NULL AFTER `node_regex`,
CHANGE COLUMN `node_regex` `node_regex` VARCHAR(500) NOT NULL ;

UPDATE `nw201903`.`requisitos_nodos` SET `node_dialogue` = 'En este primer paso para el curso de creación de un combobox usando PHP, se procederá con una instrucción que es básica para tanto la parte del controllador como del modelo. Para empezar, se debe abrir una etiqueta PHP para poder ingresar codigo en PHP nativo. Para abrir esta etiqueta, primero se pone un simbolo de menor que, el cual es seguido de un signo de interrogación y las tres letras \"php\". Entre estas dos etiquetas irá toda la codificación necesaria. Para cerrar esta etiqueta se comienza con un signo de interrogación y se finaliza con un signo de mayor que.' WHERE (`course_cod` = '1') and (`node_cod` = '1');
UPDATE `nw201903`.`requisitos_nodos` SET `node_regex` = '^\\s{0,}<\\?php\\s{0,}\\?>\\s{0,}$' WHERE (`course_cod` = '1') and (`node_cod` = '1');

