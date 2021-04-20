<?php


namespace app\controllers\admin;


use app\controllers\BaseController;

class PostsControllers extends BaseController
{
    function getIndex(){
        //admin/posts or admin/posts/index
        global $pdo;
        $query = $pdo->prepare('SELECT * FROM blog_posts ORDER BY id DESC');
        $query->execute();
        $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);


        return $this->render('admin/posts.twig', ['blogPosts'=>$blogPosts]);
    }
    function getCreate(){
        // admin/posts/create

        return $this->render('admin/insert-post.twig');
    }
    function postCreate(){
        //admin/posts/create -- posts
        global $pdo;
        $sql = 'INSERT INTO blog_posts (title, content) VALUES (:title, :content)';
        $query=$pdo->prepare($sql);
        $result=$query->execute([
            'title'=>$_POST['title'],
            'content'=>$_POST['content']
        ]);
        return $this->render('admin/insert-post.twig', ['result'=>$result]);
    }
}