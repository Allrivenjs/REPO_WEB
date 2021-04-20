<?php


namespace app\controllers;


class BaseController
{
    protected $templateEngine;
    //contructor de twig
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('../view');
        $this->templateEngine = new \Twig\Environment($loader, [
            'debug' => true,
            'cache' => false
        ]);
        //firltros
        $this->templateEngine->addFilter(new \Twig\TwigFilter('url',function ($path){
            return BASE_URL .$path;
        }));
    }
        function render($fileName, $data=[]){
                return $this ->templateEngine->render($fileName, $data);
        }
}