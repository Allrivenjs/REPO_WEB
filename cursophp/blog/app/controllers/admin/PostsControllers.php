<?php


namespace app\controllers\admin;


use app\controllers\BaseController;
use app\models\BlogPost;
use app\models\User;
use Illuminate\Database\Eloquent\Model;
use Sirius\Validation\Validator;

class PostsControllers extends BaseController
{
    function getIndex(){
        //admin/posts or admin/posts/index

        
            $blogPosts = BlogPost::query()->orderBy('id', 'desc')->get();


            return $this->render('admin/posts.twig', [
                'blogPosts'=>$blogPosts,
                'sesion'=>$this->sesion(),

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

        $userId = $_SESSION['userId'];
        $user = User::find($userId);

        if ($validator->validate($_POST)){
            //admin/posts/create -- posts
            $blogPost = new BlogPost([
                'title'=>$_POST['title'],
                'content'=>$_POST['content'],
                'creador'=>$user->name
            ]);
            if ($_POST['img']){
                $blogPost->img_url = $_POST['img'];
            }
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

    function getDelete($id){
        $blogPosts=BlogPost::where('id',$id)->delete();
        header('Location:' . BASE_URL . 'admin/posts');


    }

    public function getEdit($id) {
            $title='';
            $img_url='';
            $content='';
        $blogPosts = BlogPost::where('id', $id)->select('title', 'img_url', 'content')->get();

        return $this->render('admin/insert-post.twig', [
            'blogPosts' => $blogPosts
            ]);
    }

    public function postEdit($id) {

        $errors = [];
        $result = false;

        $validator = new Validator();
        $validator->add('title', 'required');
        $validator->add('img', 'required');
        $validator->add('content', 'required');


        if ($validator->validate($_POST)) {

            $postTitle = $_POST['title'];
            $postImage = $_POST['img'];
            $postContent = $_POST['content'];

            $blogPosts = BlogPost::where('id', $id)->update(['title' => $postTitle, 'img_url' => $postImage, 'content' => $postContent]);
            $result = true;

        }else{
            $errors = $validator->getMessages();
        }
        return $this->render('admin/insert-post.twig', [
            'blogPosts' => $blogPosts,
            'result' => $result,
            'errors'=> $errors
        ]);
    }
}