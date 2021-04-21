<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once '../vendor/autoload.php';

$dotenv =Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/..');
$dotenv->load();
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();


//Aqui obtenemos la ruta completa de donde se encuentra le usuario
function ruteC()
{
    $baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    $baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;




    return $baseUrl;
}
define('BASE_URL', ruteC());
//var_dump(BASE_URL);
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


//Rutas de la app

//ruta principal
$router->controller('/', app\controllers\IndexController::class);

//ruta admin
//$router->controller('/admin', app\controllers\admin\IndexController::class);

//ruta de los configuracion de posts
$router->controller('/admin/posts', app\controllers\admin\PostsControllers::class);

$router->controller('/admin/users', app\controllers\admin\UserController::class);

//Muestra de la paguina
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],request_path());
echo $response;