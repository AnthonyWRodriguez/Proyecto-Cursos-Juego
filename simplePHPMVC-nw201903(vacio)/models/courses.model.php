<?php
    require_once "libs/dao.php";

    function obtenerTodosCursos(){
        $todos = array();
        $sqlstr = "SELECT * FROM cursos;";
        $todos = obtenerRegistros($sqlstr);
        return $todos;
    }

    function agregarAlumnoCurso($coursecod, $usercod, $nodecod, $nodecompletion){
        $strsql = "INSERT INTO `nw201903`.`curso_usuario` (
        `course_cod`, `user_cod`, `node_cod`,
        `node_completion`) VALUES (%d , %d ,'%s', '%s');";
        $strsql = sprintf($strsql, $coursecod,
                               $usercod,
                               valstr($nodecod),
                               $nodecompletion);
        if(ejecutarNonQuery($strsql)){
            return 1;
        }
        return 0;
    }        
    
    function obtenerTodosCursosMatriculadosConNombre($usercod){
        $todos = array();
        $sqlstr = "SELECT curso_usuario.course_cod, user_cod, node_cod, node_completion, course_name, course_desc 
                    from nw201903.curso_usuario
                    inner join nw201903.cursos on nw201903.cursos.course_cod = nw201903.curso_usuario.course_cod
                    where nw201903.curso_usuario.user_cod = $usercod
                    group by curso_usuario.course_cod;";
        $todos = obtenerRegistros($sqlstr);
        return $todos; 
    }

    function retirarAlumnoCurso($coursecod, $usercod){
        $strsql = "DELETE from nw201903.curso_usuario where course_cod = $coursecod and user_cod = $usercod;";
        $strsql = sprintf($strsql, $coursecod,
                               $usercod);
        if(ejecutarNonQuery($strsql)){
            return 1;
        }
        return 0;
    }  

    function obtenerNombreCursoUsuario($coursecod){
        $sqlstr = "SELECT  `course_name` from nw201903.cursos where course_cod = $coursecod;";
        $course = obtenerUnRegistro($sqlstr);
        return ($course["course_name"]);
    }

    function obtenerNodos($coursecod, $usercod){
        $sqlstr = "SELECT curso_usuario.node_cod, node_name, node_desc, user_cod, curso_usuario.course_cod, curso_usuario.node_completion
                    from nw201903.curso_usuario
                    inner join nw201903.requisitos_nodos on nw201903.requisitos_nodos.node_cod = nw201903.curso_usuario.node_cod  
                    where curso_usuario.course_cod = $coursecod and curso_usuario.user_cod = $usercod
                    and (curso_usuario.node_completion = 'CMP' or curso_usuario.node_completion = 'PND') 
                    group by curso_usuario.node_cod;";
        $nodos = obtenerRegistros($sqlstr);
        return $nodos;
    }

    function obtenerNodoCurso($coursecod, $nodecod){
        $sqlstr = "SELECT * from nw201903.requisitos_nodos where course_cod = $coursecod and node_cod = $nodecod;";
        $nodo = obtenerRegistros($sqlstr);
        return $nodo;
    }

    function obtenerNodosTabla($coursecod){
        $sqlstr = "SELECT * from nw201903.requisitos_nodos where course_cod = $coursecod;";
        $nodos = obtenerRegistros($sqlstr);
        return $nodos;
    }
    
    function nodoCompletado($coursecod, $nodecod, $usercod){
        $sqlstr = "UPDATE `nw201903`.`curso_usuario` 
                    SET `node_completion` = 'CMP' 
                    WHERE (`course_cod` = $coursecod) and (`user_cod` = $usercod) and (`node_cod` = $nodecod);";
        if(ejecutarNonQuery($sqlstr)){
            return 1;
        }
        return 0;        
    }

    function habilitarNodo($coursecod, $nodecod, $usercod){
        $sqlstr = "UPDATE `nw201903`.`curso_usuario` 
                    SET `node_completion` = 'PND' 
                    WHERE (`course_cod` = $coursecod) and (`user_cod` = $usercod) and (`node_cod` = $nodecod);";
        if(ejecutarNonQuery($sqlstr)){
            return 1;
        }
        return 0;        
    }

    function obtenerNodosRequisito($requisito, $coursecod){
        $sqlstr = "SELECT * from nw201903.requisitos_nodos where node_requisite = $requisito and course_cod = $coursecod;";
        $nodos = obtenerRegistros($sqlstr);
        return $nodos;        
    }

 ?>
