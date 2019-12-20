<?php


require_once("models/security/security.model.php");
require_once("libs/validadores.php");
require_once("controllers/mw/support.mw.php");

  function run(){



    $loginData = array(
      "errors" => array(),
      "tocken" => "",
      "txtEmail"=>"",
      "showerrors"=>false,
      "returnto"=>"?page=dashboard"
    );
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $loginData["tocken"] = md5("loginentry".time());
        $_SESSION["login_tocken"] = $loginData["tocken"];
        if (isset($_GET["returnUrl"])) {
            $loginData["returnto"] = $_GET["returnUrl"];
        }
        renderizar("security/signin", $loginData);
    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        //Validaciones
        if (isset($_POST["tocken"]) && isset($_SESSION["login_tocken"])) {
            if (($_POST["tocken"] === $_SESSION["login_tocken"]) && (!isEmpty($_SESSION["login_tocken"]))) {
                $loginData["txtEmail"] = $_POST["txtEmail"];
                $loginData["txtPswd"] = $_POST["txtPswd"];
                $loginData["returnto"]= $_POST["returnto"];

                if (isEmpty($loginData["txtEmail"]) || !isValidEmail($loginData["txtEmail"])) {
                    $loginData["errors"][] = "Correo Electrónico con formato incorrecto";
                }
                if (isEmpty($loginData["txtPswd"])) { //se elimina validacion de contraseña || !isValidPassword($loginData["txtPswd"])){
                    $loginData["errors"][] = "Debe ingresar una contraseña.";
                }


                if (count($loginData["errors"]) > 0) {
                    $loginData["tocken"] = md5("loginentry".time());
                    $_SESSION["login_tocken"] = $loginData["tocken"];
                    $loginData["showerrors"] = true;
                    renderizar("security/signin", $loginData);
                } else {
                    //Correr Login del modelo de datos y la insercion de datos

                    $fchingreso = time();
                    $pswdSalted = "";
          
                    if($fchingreso % 2 == 0){
                      $pswdSalted = $loginData["txtPswd"] . $fchingreso;
                    }else{
                      $pswdSalted = $fchingreso . $loginData["txtPswd"];
                    }
                    
                    $pswdSalted = md5($pswdSalted);
                    $lastId = insertUsuario("SinNombre",$loginData["txtEmail"],$fchingreso, $pswdSalted,
                                "STU", "ACT");
                    //agregarRolaUsuario("2", $lastId);
                    if( $lastId > 0 ){
                      addBitacora("SEC001","Insert User",$loginData,"INFO");
                    }else{
                      $loginData["errores"][] = "Error al crear el usuario";
                      $loginData["haserrores"] = true;
                    }

                    $tmperrors = validarLogin($loginData["txtEmail"], $loginData["txtPswd"]);
                    if (count($tmperrors)) {
                        $loginData["tocken"] = md5("loginentry".time());
                        $_SESSION["login_tocken"] = $loginData["tocken"];
                        foreach ($tmperrors as $terr) {
                            $loginData["errors"][] = $terr;
                        }
                        $loginData["showerrors"] = true;
                        renderizar("security/signin", $loginData);
                    } else {
                        //aqui es donde retorna una vez accede al sistema
                        header("Location:index.php" . $loginData["returnto"]);

                    }
                }
            } else {
                $loginData["tocken"] = md5("loginentry".time());
                $_SESSION["login_tocken"] = $loginData["tocken"];
                $loginData["errors"][] = "No pudo ser posible la creacion del usuario. Intente nuevamente";
                $loginData["showerrors"] = true;
                renderizar("security/signin", $loginData);
            }
        } else {
            $loginData["tocken"] = md5("loginentry".time());
            $_SESSION["login_tocken"] = $loginData["tocken"];
            $loginData["errors"][] = "No pudo ser posible la creacion del usuario. Intente nuevamente";
            $loginData["showerrors"] = true;
            renderizar("security/signin",$loginData);
        }
    }
  }

/**
 * Valida el Login de un usuario
 *
 * @param string $loginEmail correo electrónico del usuario
 * @param string $loginPswd  contraseña ingresada para validar
 *
 * @return void
 */

    function validarLogin($loginEmail, $loginPswd)
    {
    
        $usuario = obtenerUsuarioPorEmail($loginEmail);
        $errors = array();
        if (count($usuario)>0) {
            //verificacion de contraseña
            $salt = $usuario["userfching"];
            if ($salt % 2 == 0) {
                $loginPswd = $loginPswd . $salt;
            } else {
                $loginPswd = $salt . $loginPswd;
            }
    
            $loginPswd = md5($loginPswd);
    
            if ($usuario["userpswd"] == $loginPswd) {
                mw_setEstaLogueado(
                    $usuario["usercod"],
                    $usuario["username"],
                    $usuario["useremail"],
                    $usuario["usertipo"],
                    true
                );
            } else {
                $errors[] = "E002 : No se pudieron validar las credenciales ingresadas."; //Contraseña Incorrecta
            }
        } else {
            $errors[] = "E001: No se pudieron validar las credenciales ingresadas."; //No existe el usuario
        }
        return $errors;
    }
    
  
  run();
?>