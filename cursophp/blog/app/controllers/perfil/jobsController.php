<?php


namespace app\controllers\perfil;


use app\controllers\BaseController;
use app\models\Curriculum;

class jobsController extends BaseController
{
    public function getIndex($id){

        $curriculum=Curriculum::where('id', $id)->select('nombre_c', 'carrera', 'foto', 'perfil_p', 'educacion',
            'año_e', 'correo', 'telefono', 'dirrecion', 'habilidades', 'exp_laboral')->get();

        return $this->render('Jobs/about.twig',[
            'curriculum'=>$curriculum
        ]);
    }
    
}