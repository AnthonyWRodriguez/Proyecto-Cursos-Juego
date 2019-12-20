<?php
/* Home Controller
 * 2019-11-21
 * Created By OJBA
 * Last Modification 2019-11-21 11:12
 */

require_once("models/courses.model.php");
function run(){
    $BDD = array();
    $BDD = obtenerTodosBDD();
    renderizar("BDD",Array());
  }
  run();
?>