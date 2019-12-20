<?php

require_once "models/courses.model.php";

function run(){
    $curso = array();
    $x=0;

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $loginData["tocken"] = md5("loginentry".time());
        $_SESSION["login_tocken"] = $loginData["tocken"];
        $curso["cod"] = $_GET["coursecod"];
        $curso["nom"] = obtenerNombreCursoUsuario($_GET["coursecod"]);
        $curso["nodos"] = obtenerNodos($_GET["coursecod"], $_SESSION["userCode"]);
        renderizar("curso_usuario", $curso);
    }   

}
run();

?>