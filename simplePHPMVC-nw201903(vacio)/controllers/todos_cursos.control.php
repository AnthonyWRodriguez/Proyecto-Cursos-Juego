<?php

require_once 'models/courses.model.php';

function run(){

    $Cursos = array();
    $Cursos["CursosBase"]=obtenerTodosCursos();
    $Cursos["totalCursos"] = obtenerTodosCursos();
    $x = 0;
    $y = 0;

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $loginData["tocken"] = md5("loginentry".time());
        $_SESSION["login_tocken"] = $loginData["tocken"];
        $Cursos["matriculadosNom"] = obtenerTodosCursosMatriculadosConNombre($_SESSION["userCode"]);
        foreach ($Cursos["matriculadosNom"] as $a){
            for ($x=0;$x<=count($Cursos["CursosBase"]);$x++){
                if(array_key_exists($x,$Cursos["CursosBase"])){
                    if($Cursos["CursosBase"][$x]["course_cod"] == $a["course_cod"])
                        unset($Cursos["totalCursos"][$x]);
                }
            }
        }
        renderizar("todos_cursos", $Cursos);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") { 
        for ($x=0;$x<=count($Cursos["CursosBase"]);$x++){
            if(isset($_POST["btnMatricular".$x])){
                if($_SESSION["userLogged"]){ 
                    if (agregarAlumnoCurso($x,$_SESSION["userCode"],"1","PND")){
                        $nodos = obtenerNodosTabla($x);
                        for ($y=2;$y<=count($nodos);$y++){
                            if(agregarAlumnoCurso($x,$_SESSION["userCode"],$y,"INA")){
                            }
                            else{
                                redirectWithMessage("Se ha producido un error al matricular la clase. Intentelo nuevamente", "index.php?page=todos_cursos");
                            }
                        }
                        redirectWithMessage("Exitosamente ha añadido el curso", "index.php?page=dashboard");
                    }
                    else{
                        redirectWithMessage("Se ha producido un error al matricular la clase. Intentelo nuevamente", "index.php?page=todos_cursos");
                    }
                }else{
                    redirectWithMessage("Ingrese con un usuario para poder matricluar una clase", "index.php?page=login");
                    die();
                }
            }
            if(isset($_POST["btnRetirar".$x])){
                if($_SESSION["userLogged"]){ 
                    if (retirarAlumnoCurso($x, $_SESSION["userCode"])){
                        redirectWithMessage("Exitosamente se ha retirado el curso", "index.php?page=dashboard");
                    }
                    else{
                        redirectWithMessage("Se ha producido un error al retirar la clase. Intentelo nuevamente", "index.php?page=todos_cursos");
                    }
                }else{
                    redirectWithMessage("Ingrese con un usuario para poder retirar una clase", "index.php?page=login");
                    die();
                }
            }
        }
    }
}
run();

?>  