<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once '../vendor/autoload.php';
include_once '../config.php';

//Aqui obtenemos la ruta completa de donde se encuentra le usuario
function ruteC()
{
    $baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    $baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;



    define('BASE_URL', $baseUrl) ;
    return BASE_URL;
}
var_dump(ruteC());
use Phroute\Phroute\RouteCollector;
$router = new RouteCollector();


//Aqui obtenemos la ruta donde se encuentra el usuario.
function request_path()
{
    $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
    $parts = array_diff_assoc($request_uri, $script_name);
    if (empty($parts))
    {
        return '/';

    }
    $path = implode('/', $parts);
    if (($position = strpos($path, '?')) !== FALSE)
    {
        $path = substr($path, 0, $position);
    }
    return $path;
}


//Tomamos la informacion de la paguina y la guardamos en un subbufer,
//hastas que se termine de cargar y renderrear, para mostrarse
function render($fileName, $params = []){
        ob_start();
        extract($params);
        include $fileName;
        return ob_get_clean();
}

//Rutas de la app

//ruta principal
$router->controller('/', app\controllers\IndexController::class);

//ruta admin
$router->controller('/admin', app\controllers\admin\IndexController::class);

//ruta de los configuracion de posts
$router->controller('/admin/posts', app\controllers\admin\PostsControllers::class);

//Muestra de la paguina
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],request_path());
echo $response;