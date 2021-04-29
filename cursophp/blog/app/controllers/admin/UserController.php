<?php


namespace app\controllers\admin;


use app\controllers\BaseController;
use app\models\User;

use Sirius\Validation\Validator;

class UserController extends BaseController
{
        function getIndex()
        {


                $users = User::all();
                return $this->render('admin/users.twig',[
                    'users' => $users,
                    'sesion'=>$this->sesion()
                ]);


        }
        function getCreate()
        {

                return $this->render('admin/insert-user.twig',['sesion'=>$this->sesion()]);

        }
        function postCreate()
        {

                $errors=[];

                $validator = new Validator();
                $validator->add('name', 'required');
                $validator->add('email', 'required');
                $validator->add('email', 'email');
                $validator->add('password', 'required');

                    $user = new User();
                    $user->name = $_POST['name'];
                    $user->email = $_POST['email'];
                    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $user->save();
                    $result =true;
                

                return $this->render('admin/insert-user.twig', [
                    'result'=>$result,
                    'errors'=>$errors,
                    'sesion'=>$this->sesion()
                ]);

        }
}