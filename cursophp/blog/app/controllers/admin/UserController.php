<?php


namespace app\controllers\admin;


use app\controllers\BaseController;

use app\models\User;

use Sirius\Validation\Validator;

class UserController extends BaseController
{
        function getIndex()
        {
                $users = User::withTrashed()->get();
                return $this->render('admin/users.twig',[
                    'users' => $users,
                    'sesion'=>$this->sesion()
                ]);
        }

        function getCreate()
        {
                return $this->render('admin/insert-user.twig', [
                    'sesion'=>$this->sesion()
                ]);
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

                return $this->render('admin/insert-user.twig', [
                    'result'=>true,
                    'errors'=>$errors,
                    'sesion'=>$this->sesion()
                ]);

        }

        function getEdit($id) {

        $User = User::where('id', $id)->select('name', 'email')->get();

        return $this->render('admin/insert-user.twig', [
            'user' => $User,
            'edit' => true,
            'sesion'=>$this->sesion()
        ]);
    }

        function postEdit($id) {

        $errors = [];
        $result = false;
        $validator = new Validator();
        $validator->add('name', 'required');
        $validator->add('email', 'required');
        $validator->add('email', 'email');

        if ($validator->validate($_POST)) {

            $postname = $_POST['name'];
            $postemail = $_POST['email'];
            $User = User::findOrFail($id)->update(['name' => $postname, 'email' => $postemail]);
            $result = true;

        }else{
            $errors = $validator->getMessages();
        }
        return $this->render('admin/insert-user.twig', [
            'user' => $User,
            'result' => $result,
            'errors'=> $errors
        ]);
    }

        function getDelete($id){
            User::findOrFail($id)->delete();

            header('Location:' . BASE_URL . 'admin/users');

        }

        function getRestore($id){
            User::withTrashed()->findOrFail($id)->restore();

            header('Location:' . BASE_URL . 'admin/users');
        }
}