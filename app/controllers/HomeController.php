<?php

namespace app\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home', ['title'=>'Página Home',"name" => "Rodrigo F G Lima"]);
    }

    public function faq()
    {
        echo ('FAQ');
    }

    public function howto()
    {
        echo ('HowTo');
    }

    public function phpinfo()
    {
        echo ('pgpinfo');
    }

    public function phpmyadmin()
    {
        echo ('phpMyAdmin');
    }
}