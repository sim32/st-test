<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
$login = 'root';
$pass = '';
$db = 'st-test';

$connectHandle = mysql_connect('127.0.0.1', $login, $pass);
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $connectHandle);
mysql_select_db($db);

define('VIEW_DIR', $_SERVER['DOCUMENT_ROOT'] . '/views/');

$url = empty($_GET['url']) ? array('index') : explode('/', rtrim($_GET['url'], '/'));

require_once('./autolader.php');


$loader = new \Loader();

$loader->addNamespace('Models', __DIR__ . '\models')->register();
$loader->addNamespace('Controllers', __DIR__ . '\controllers')->register();

$class = $url[0];
$method = empty($url[1]) ? 'indexAction' : $url[1] . 'Action';

$params = [];
if(count($url) > 2) {
    for($i = 2; $i<=count($url)-1; $i++) {
        $params[] = $url[$i];
    }
}
$class = '\Controllers\\' . $class ;
$controller = new $class();

if(!in_array($method, get_class_methods($class))) {
    throw new Exception('404 not found');
}


empty($params)
    ? $controller->$method()
    : call_user_func_array(array($controller, $method), $params);

?>