<?php 
require "config.php";
$controller = "";
$method = "";
$params = "";
$url = $_GET["url"] ?? "Index/Index";
$arrayUrl = explode("/", $url);

//Obtenemos el controllador
if(isset($arrayUrl[0])){
    $controller = $arrayUrl[0];
}

//Obtenemos el metodo de accion
if(isset($arrayUrl[1])){
    if($arrayUrl[1] != ''){
        $method = $arrayUrl[1];
    }
}

//Obtenemos los parametros
if(isset($arrayUrl[2])){
    if($arrayUrl[2] != ''){
        $params = $arrayUrl[2];
    }
}

//Procedimiento para cargar todas las clases que estan en la carpeta libreria
spl_autoload_register(function($class){
    if(file_exists(LBS.$class.".php")){
        require LBS.$class.".php";
    }
});

require 'Controllers/ErrorController.php';
$error = new ErrorController();
//Procedimiento para instanciar los constrolladores
$controller = $controller.'Controller';
$controllersPath = "Controllers/".$controller.'.php';
if(file_exists($controllersPath)){
    require $controllersPath;
    $controller = new $controller();
    if(isset($method)){
        if(method_exists($controller, $method)){
            if(isset($params)){
                $controller->{$method}($params);
            }else{
                $controller->{$method}();
            }
        }else{
            $error->Error($url);
        }
    }
}else{
    $error->Error($url);
}
?>