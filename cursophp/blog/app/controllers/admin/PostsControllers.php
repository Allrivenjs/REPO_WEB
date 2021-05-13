<?php


namespace app\controllers\admin;


use app\controllers\BaseController;
use app\models\BlogPost;
use app\models\User;
use app\services\blogService;

use Sirius\Validation\Validator;

class PostsControllers extends BaseController
{
    protected $saveImg;
//blogService $saveImg
    public function __construct()
    {
        parent::__construct();
        $this->saveImg = new blogService();

    }

    function getIndex(){
        //admin/posts or admin/posts/index

            $blogPosts = BlogPost::withTrashed()->orderBy('id', 'desc')->get();


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
        $user = User::findOrFail($userId);
        if ($validator->validate($_POST)){
            //admin/posts/create -- posts
            $blogPost = new BlogPost([
                'title'=>$_POST['title'],
                'content'=>$_POST['content'],
                'creador'=>$user->name
            ]);

            //variables de la imagen
            $fileName=$_FILES['IMG']['name'];
            $path='files/ImagesPost/';
            $imageTemp= $_FILES['IMG']['tmp_name'];

            $imageUploadPath = $path . $fileName;
            $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

            $this->saveImg->Saveimg($fileType, $imageTemp, $imageUploadPath,$path);
            $blogPost->img_url=$imageUploadPath;
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
        $blogpost=BlogPost::findOrFail($id);
        $blogpost->delete();
        header('Location:' . BASE_URL . 'admin/posts');
    }

    function getEdit($id) {
        $blogPosts = BlogPost::where('id',$id)->select('title', 'content')->get();
        return $this->render('admin/insert-post.twig', [
            'blogPosts' => $blogPosts,
            'sesion'=>$this->sesion()
            ]);
    }

    function postEdit($id)
    {
        $errors=[];
        $validator = new Validator();
        $validator->add('title', 'required');
        $validator->add('content', 'required');


        if ($validator->validate($_POST)) {


                $postTitle = $_POST['title'];
                $postContent = $_POST['content'];

                //variables de la imagen
                $fileName=$_FILES['IMG']['name'];
                $path='files/ImagesPost/';
                $imageTemp= $_FILES['IMG']['tmp_name'];

                $imageUploadPath = $path . $fileName;
                $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
                $this->saveImg->Saveimg($fileType, $imageTemp, $imageUploadPath, $path);
                $postImage= $imageUploadPath;

                $blogPosts = BlogPost::findOrFail($id)->update(['title' => $postTitle, 'img_url' => $postImage, 'content' => $postContent]);
                $result = true;
                return $this->render('admin/insert-post.twig', [
                    'blogPosts' => $blogPosts,
                    'result' => $result,
                    'sesion'=>$this->sesion()
                ]);

        } else {
            $errors = $validator->getMessages();
        }

            return $this->render('admin/insert-post.twig', [
                'errors' => $errors,
                'sesion'=>$this->sesion()
            ]);


        }


    function getRestore($id){
        BlogPost::withTrashed()->findOrFail($id)->restore();
        header('Location:' . BASE_URL . 'admin/posts');
    }

    //Para hacer un forsedelet cambiamos el ->restore() por ->forceDelete()
    /*function getDeleteForce($id){
        $blogPosts= BlogPost::withTrashed()->where('id', $id)->forceDelete();

        header('Location:' . BASE_URL . 'admin/posts');
    }*/
}