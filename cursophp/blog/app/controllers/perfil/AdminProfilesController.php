<?php


namespace app\controllers\perfil;
use app\controllers\BaseController;
use app\models\Curriculum;

class AdminProfilesController extends BaseController
{

    function getIndex(){
        $curriculum = Curriculum::query()->orderBy('id', 'desc')->get();
       // $json = Curriculum::query()->orderBy('id', 'desc')->select('habilidades')->get();
        //var_dump(json_decode($json));
        /*$array=array(
            "habilidades"=>array(
                '1'=> 'soy experto programando en php y mysql',
                '2'=> 'Resisto el trabajo bajo presion',
                '3'=> 'Dedicado a mis trabajos',
                '4'=> 'Eficiente en los trabajos'),
            "ropa"=>array(
                '1'=> 'soy experto programando en php y mysqla',
                '2'=> 'Resisto el trabajo bajo presiona',
                '3'=> 'Dedicado a mis trabajosa',
                '4'=> 'Eficiente en los trabajosa'
            )
        );


        foreach ($array['ropa'] as $row){
            echo "$row <br>";
        }*/

        return $this->render('Jobs/index.twig', [
            'curriculum'=>$curriculum,
            'sesion'=>$this->sesion(),

        ]);
    }

    function getCreate(){

        return $this->render('Jobs/newPerfil.twig', [
            'sesion'=>$this->sesion(),
        ]);
    }

    function postCreate(){
        $NEducation=$_POST['EduFields'];
        $education=[];

        echo "Numero de inputs: ".  $NEducation . " y su nombre es: " . $_POST['name'] ;

        for($i=1;$i<=$NEducation;$i++ ){
            $Education=$_POST['nEducation'.$i];
            $education[$i-1]=$Education;
        }
        echo "<pre>";
        print_r($education);
        echo "</pre>";

        return $this->render('Jobs/newPerfil.twig', [
            'sesion'=>$this->sesion(),
        ]);
    }
}