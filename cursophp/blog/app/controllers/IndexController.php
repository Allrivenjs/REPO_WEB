<?php
namespace app\controllers;

use app\models\User;
use app\models\BlogPost;

class IndexController extends BaseController {
    public function getIndex($page = 1){


        $limit = 3;

        $totalReg = BlogPost::all()->count();
        $totalPages = ceil($totalReg / $limit);
        $skip = ($limit * $page ) - $limit;

       $blogPosts=BlogPost::query()->orderBy('id', 'desc')
           ->skip($skip)
           ->take($limit)
           ->get();
        return $this->render('index.twig',[
            'blogPosts'=>$blogPosts,
            'sesion'=>$this->sesion(),
            'user'=>$this->sesion(),
            'totalPages' => $totalPages,
            'page' => $page

        ]);
    }
}
