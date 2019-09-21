<?php

require "../vendor/autoload.php";


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ["App\controllers\HomeController", "index"]);
    $r->addRoute('GET', '/create', ["App\controllers\HomeController", "create"]);
    $r->addRoute('POST', '/store', ["App\controllers\HomeController", "store"]);
    $r->addRoute('GET', '/show/{id:\d+}', ["App\controllers\HomeController", "show"]);
    $r->addRoute('GET', '/edit/{id:\d+}', ["App\controllers\HomeController", "edit"]);
    $r->addRoute('POST', '/edit/update/{id:\d+}', ["App\controllers\HomeController", "update"]);
    $r->addRoute('GET', '/delete/{id:\d+}', ["App\controllers\HomeController", "delete"]);





    /*    // {id} must be a number (\d+)
    $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');*/
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        call_user_func($handler,$vars);
/*            echo '<pre>';
            var_dump($handler, $vars);
            echo '</pre>';die;*/
        break;
}
