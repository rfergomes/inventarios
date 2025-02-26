<?php

namespace app\controllers;
use League\Plates\Engine;

abstract class Controller
{
    protected function view(string $view, array $data = [])
    {
        extract($data);
        $pathViews = \dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views';
        // Create new Plates instance
        $templates = new Engine($pathViews);

        // Render a template
        echo $templates->render($view, $data);
    }
}
