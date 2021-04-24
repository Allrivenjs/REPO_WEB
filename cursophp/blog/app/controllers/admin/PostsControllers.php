<?php


namespace app\controllers\admin;


use app\controllers\BaseController;
use app\models\BlogPost;
use Illuminate\Database\Eloquent\Model;
use Sirius\Validation\Validator;

class PostsControllers extends BaseController
{
    function getIndex(){
        //admin/posts or admin/posts/index

        
            $blogPosts = BlogPost::all();


            return $this->render('admin/posts.twig', [
                'blogPosts'=>$blogPosts,
                'sesion'=>$this->sesion()
            ]);



    }
    function getCreate(){
        // admin/posts/create

            return $this->render('admin/insert-post.twig', ['sesion' => $this->sesion()]);

    }
    function postCreate(){
        $errors=[];
        $result=false;

        //Validacion de datos
        $validator = new Validator();
        $validator->add('title', 'required');
        $validator->add('content', 'required');

        if ($validator->validate($_POST)){
            //admin/posts/create -- posts
            $blogPost = new BlogPost([
                'title'=>$_POST['title'],
                'content'=>$_POST['content']
            ]);
            $blogPost->save();
            $result=true;

        }else{
            $errors = $validator->getMessages();
        }



        return $this->render('admin/insert-post.twig', [
            'result'=>$result,
            'errors'=>$errors,
            'sesion'=>$this->sesion()
        ]);
    }
}