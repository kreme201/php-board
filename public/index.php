<?php

use DI\Bridge\Slim\Bridge;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$container = require dirname(__DIR__) . '/app/container.php';
$app       = Bridge::create($container);
$twig      = Twig::create(dirname(__DIR__) . '/templates', [
    'cache' => false,
]);
$app->add(TwigMiddleware::create($app, $twig));
$app->get('/',
    function (
        ServerRequestInterface $request,
        ResponseInterface $response,
    ) {
        $view = Twig::fromRequest($request);

        return $view->render($response, 'home.twig', [
            'name' => 'John',
        ]);
    });
$app->run();
