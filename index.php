<?php
// check if the user cookie exist or not if not redirect to the home
// if (empty($_COOKIE["user"]) && $_SERVER['REQUEST_URI'] != '/home') {
//     header("Location: /home");
//     die;
// }

include_once __DIR__ . "/connect.php";

use Jenssegers\Blade\Blade;

$blade = new Blade(array('views'), 'cache');

$klein = new \Klein\Klein();

$klein->with('/admin', function () use ($klein) {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/admin/routes.php";
});

$klein->with('/api', function () use ($klein) {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/api/routes.php";
});

$klein->with('/a/[:aCode]?', function () use ($klein) {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/dashboard/routes.php";
});

include_once $_SERVER['DOCUMENT_ROOT'] . "/modules/site/routes.php";

if ("prod" == $_ENV['ENVIRONMENT']) {
    $klein->onHttpError(function ($code, $router, $matched, $method_matched, $http_exception) {
        switch ($code) {
            case 404:
                $data['errorPage'] = true;
                $blade = new Blade(array('modules/site/views'), 'cache');
                $router->response()->body(
                    $blade->make("static/error_404", $data)->render()
                );
                break;
            case 405:
                var_dump($http_exception);
                $router->response()->body(
                    'You can\'t do that!'
                );
                break;
            default:
                $router->response()->body(
                    'Oh no, a bad error happened that caused a ' . $code
                );
        }
    });
}

$klein->dispatch();
