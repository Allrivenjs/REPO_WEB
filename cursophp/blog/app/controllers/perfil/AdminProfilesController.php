<?php


namespace app\controllers\perfil;
use app\controllers\BaseController;
use app\models\Curriculum;

class AdminProfilesController extends BaseController
{
    function getIndex(){
        $curriculum = Curriculum::query()->orderBy('id', 'desc')->get();
        return $this->render('Jobs/index.twig', [
            'curriculum'=>$curriculum,
            'sesion'=>$this->sesion(),

        ]);
    }
}