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
                'users' => $users
            ]);
        }
        function getCreate()
        {
            return $this->render('admin/insert-user.twig');
        }
        function postCreate()
        {
            $errors=[];
            $result=false;
            $validator = new Validator();
            $validator->add('name', 'required');
            $validator->add('email', 'required');
            $validator->add('email', 'email');
            $validator->add('password', 'required');
            if($validator->validate($_POST)){
                $user = new User();
                $user->name = $_POST['name'];
                $user->email = $_POST['email'];
                $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->save();
                $result =true;
            }else{
                $errors = $validator->getMessages();
            }

            return $this->render('admin/insert-user.twig', [
                'result'=>$result,
                'errors'=>$errors
            ]);
        }
}