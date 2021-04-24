<?php
namespace app\controllers;

use app\models\User;
use app\models\BlogPost;

class IndexController extends BaseController {
    public function getIndex(){


       $blogPosts=BlogPost::query()->orderBy('id', 'desc')->get();
        return $this->render('index.twig',[
            'blogPosts'=>$blogPosts,
            'sesion'=>$this->sesion(),
            'user'=>$this->sesion()

        ]);
    }
}
