<?php

require_once 'models/courses.model.php';
require_once 'libs/validadores.php';

function run(){
    $nodo = array();
    $nodo["coursecod"] = $_GET["coursecod"];
    $nodo["coursename"] = obtenerNombreCursoUsuario($_GET["coursecod"]);
    $nodo["nodecod"] = $_GET["nodecod"];
    $nodo["node"] = obtenerNodoCurso($_GET["coursecod"], $_GET["nodecod"]);
    $nodo["nodename"] = $nodo["node"]["0"]["node_name"];
    $nodo["nodedesc"] = $nodo["node"]["0"]["node_desc"];
    $nodo["nodedialogue"] = $nodo["node"]["0"]["node_dialogue"];

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        renderizar("nodo",$nodo);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["btnConfirm"])){
            if(!isValidRegex($nodo["node"]["0"]["node_regex"],$_POST["txtAnswer"]) || isEmpty($_POST["txtAnswer"])){
                $a = $_SESSION['userCode'];
                $b = $_GET['coursecod'];
                $c = $_GET['nodecod'];
                redirectWithMessage("Su respuesta ha sido incorrecta, intente nuevamente", 
                "index.php?page=nodo&usrcod=$a&coursecod=$b&nodecod=$c");
            }
            else{
                if(nodoCompletado($_GET["coursecod"], $_GET["nodecod"], $_SESSION["userCode"])){
                    $nodosNuevos = array();
                    $nodosNuevos = obtenerNodosRequisito($_GET["nodecod"], $_GET["coursecod"]);
                    foreach ($nodosNuevos as $a){
                        if(habilitarNodo($_GET["coursecod"], $a["node_cod"], $_SESSION["userCode"])){
                        }
                        else{
                            redirectWithMessage("Ha ocurrido un error al registrar la completacion del nodo", "index.php?page=dashboard");
                        }
                        redirectWithMessage("SU RESPUESTA ES CORRECTA!!! FELICIDADES!!!", "index.php?page=dashboard");
                    }
                }
                else{
                    redirectWithMessage("Ha ocurrido un error al registrar la completacion del nodo", "index.php?page=dashboard");
                }
            }
        }
    }    
    
}
run();

?>