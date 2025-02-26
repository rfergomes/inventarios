<?php

namespace app\Routes;

use Exception;
use app\helpers\Request;
use app\helpers\Uri;

class Router
{

    const CONTROLLER_NAMESPACE = 'app\\controllers';

    public static function load(string $controller, string $method)
    {
        try {
            $controllerNamespace = self::CONTROLLER_NAMESPACE . '\\' . $controller;

            if (!\class_exists($controllerNamespace)) {
                throw new Exception("Controller {$controller} não encontrado");
            }

            $controllerInstance = new $controllerNamespace;


            if (!\method_exists($controllerInstance, $method)) {
                throw new Exception("Método {$method} não encontrado no controller {$controller}");
            }

            $controllerInstance->$method((object)$_REQUEST);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


    public static function routes(): array
    {
        return [
            'get' => [
                '/' => fn() => self::load('HomeController', 'index'),
                '/faq' => fn() =>  self::load('HomeController', 'faq'),
                '/howto' => fn() =>  self::load('HomeController', 'howto'),
                '/phpinfo' => fn() =>  self::load('HomeController', 'phpinfo'),
            ],

            'post' => [
                '/phpmyadmin' => fn() => self::load('HomeController', 'phpmyadmin'),
            ],

            'put' => [
                '/phpmyadmin' => fn() => self::load('HomeController', 'phpmyadmin'),
            ],

            'delete' => [
                '/phpmyadmin' => fn() => self::load('HomeController', 'phpmyadmin'),
            ]
        ];
    }

    public static function execute()
    {
        try {
            $routes = self::routes();
            $request = Request::get();
            $Uri = Uri::get('path');

            if (!isset($routes[$request])) {
                throw new Exception("Rota não encontrada", 1);
            }

            if (!\array_key_exists($Uri, $routes[$request])) {
                throw new Exception("Rota não encontrada", 1);
            }

            $router = $routes[$request][$Uri];

            if(!\is_callable($router)){
                throw new Exception("Rota {$Uri} não pode ser acessada", 1);
            }
            $router();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
