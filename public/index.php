<?php
//Define que todas las rutas van a ser relativas a la raiz del sitio.
chdir( dirname(__DIR__));

define("SYS_PATH","lib/");
define("APP_PATH","app/");

require SYS_PATH."Router.php";
require APP_PATH."http/routes.php";

$url = $_GET["url"];

try {
    $action = Router::getAction($url);
    $controllerName = $action["controller"];
    $method = $action["method"];

    require APP_PATH."controllers/".$controllerName.".php";

    $controller = new $controllerName();
    $controller->$method();

} catch (Exception $e){
    echo  $e->getMessage();
}