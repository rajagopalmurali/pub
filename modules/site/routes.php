<?php

use Jenssegers\Blade\Blade;

$siteBlade = new Blade(array('modules/site/views'), 'cache');

$siteMapping = array(
    "/" => array("method" => "GET", "action" => "home"),
    "/pricing" => array("method" => "GET", "action" => "pricing"),
    "/unsubscribe" => array("method" => "GET", "action" => "unsubscribe"),
    "/privacy-policy" => array("method" => "GET", "action" => "privacy"),
    "/terms-of-service" => array("method" => "GET", "action" => "terms"),
    "/chat" => array("method" => "GET", "action" => "chat"),
);

foreach ($siteMapping as $key => $data) {
    $klein->respond($data['method'], $key, function ($request, $response, $service, $app) use ($data) {
        $request->__set("params", $request->params());
        $request->__set("action", $data['action']);
        $service->render('modules/site/controllers/site.php', $request->params());
        die;
    });
}
