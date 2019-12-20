<?php

require_once("models/courses.model.php");

function run(){
    $curso = array();
    $curso["cursosPersona"]=obtenerTodosCursosMatriculadosConNombre($_SESSION["userCode"]);
    
    renderizar("cursos_usuario",$curso);
}
run();

?>