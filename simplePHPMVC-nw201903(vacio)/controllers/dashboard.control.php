<?php

require_once("libs/utilities.php");
require_once("models/security/security.model.php");

function run(){

  $RU = array();
  $RU["name"]="AWRT";
  $RU["rol1"] = estaEnRol($_SESSION["userCode"],"1"); 
  $RU["rol2"] = estaEnRol($_SESSION["userCode"],"2"); 
  renderizar("dashboard", $RU);

}

run();
?>
