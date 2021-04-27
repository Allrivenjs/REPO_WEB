<?php


namespace app\controllers;

use app\controllers\BaseController;
use app\log;
use app\models\User;
use Sirius\Validation\Validator;

class AuthController extends  BaseController
{
    function getLogin()
    {
        if(isset($_SESSION['userId'])){
            header('Location: '.BASE_URL . '');
            return false;

        }else {
            return $this->render('Auth/login.twig');
        }
    }
    function postLogin()
    {
        $sesion = false;
        $errors=[];
        $validator= new Validator();
        $validator->add('email', 'required');
        $validator->add('email', 'email');
        $validator->add('password', 'required');

        if($validator->validate($_POST)){
            $user = User::where('email', $_POST['email'])->first();
            if($user){
                if (password_verify($_POST['password'],$user->password)){
                    $_SESSION['userId']=$user->id;
                    Log::logInfo('Login userId: ' .$user->name);
                    header('Location:' . BASE_URL . '');
                    $sesion= true;
                    return null;
                }
            }
                $validator->addMessage('email', 'Username and/or password does not match');


        }
        $errors = $validator->getMessages();


            return $this->render('Auth/login.twig', [

                'errors' => $errors
            ]);

    }

    function getLogout()
    {
        $user = User::find($_SESSION['userId']);
        Log::logInfo('Logout userId: '. $user->name);
        unset($_SESSION['userId']);
        header('Location:'.BASE_URL.'auth/login');
    }
}